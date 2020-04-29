<?php



namespace App\Utils\Http;

use Nette\SmartObject;
use Nette\Utils\Json;

class HttpClient
{

    use SmartObject;

    /**
     *
     * @var array
     */
    private $headers;

    /**
     *
     * @param Request $request
     * @return Response
     */
    public function sendRequest(Request $request)
    {
        $ch = curl_init();
        $curlHeaders = $this->createCurlHeaders(array_merge($request->getHeaders(), $this->createDefaultHeaders()));
        $url = $request->getUrl();
        if ($request->hasParameters()) {
            $url .= '?' . http_build_query($request->getParameters());
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HEADERFUNCTION, [$this, 'storeHeader']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $curlHeaders);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if ($request->hasContent()) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request->getContent());
        }
        if ($request->isPost()) {
            curl_setopt($ch, CURLOPT_POST, true);
        } elseif ($request->isDelete()) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, Request::HTTP_METHOD_DELETE);
        } elseif ($request->isPut()) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, Request::HTTP_METHOD_PUT);
        }
        $responseData = curl_exec($ch);
        $response = $this->createResponse($ch, $responseData);
        curl_close($ch);
        return $response;
    }

    /**
     *
     * @param $ch
     * @param string $response
     * @return Response
     */
    private function createResponse($ch, $response)
    {
        $responseData = new Response();
        $responseData->setHttpCode(curl_getinfo($ch, CURLINFO_HTTP_CODE));
        if ($responseData->isOk()) {
            if (!$responseData->isNoContent()) {
                $responseData->setContent($response);
            }
        } else {
            $this->processError($responseData, $response);
        }
        $responseData->setHeaders($this->headers);
        $responseData->setHttpCode(curl_getinfo($ch, CURLINFO_HTTP_CODE));
        return $responseData;
    }

    function processError(Response $responseData, $response)
    {
        $responseContent = Json::decode($response);
        switch ($responseData->getHttpCode()) {
            case 401:
                throw new \Exception($responseData->getHttpCode() . ' ' . $responseContent->message);
            case 405:
                throw new \Exception($responseData->getHttpCode() . " Method not allowed.");
            default:
                throw new \Exception($responseData->getHttpCode() . ": " . $response);
        }
    }

    /**
     * Storing headers from curl
     * @param $ch
     * @param $str
     * @return int
     */
    function storeHeader($ch, $str)
    {
        $strex = explode(": ", $str);
        if (count($strex) == 2) {
            $this->headers[$strex[0]] = trim($strex[1]);
        } else {
            $this->headers[] = trim($str);
        }
        return strlen($str);
    }

    function createDefaultHeaders()
    {
        $headers = [];
        $headers["Content-Type"] = "application/json";
        return $headers;
    }

    function createCurlHeaders($headers)
    {
        $curlHeaders = [];
        foreach ($headers as $headerName => $value) {
            $curlHeaders[] = $headerName . ": " . $value;
        }
        return $curlHeaders;
    }

}
