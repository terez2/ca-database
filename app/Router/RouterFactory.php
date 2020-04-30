<?php

declare(strict_types=1);

namespace App\Router;

use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;
use Ublaboo\ApiRouter\ApiRoute;


final class RouterFactory
{

    private $router;

	public function createRouter(): RouteList
	{
        $this->router = new RouteList();

        /**
         * This is because of CORS. So any route will be redirect to OptionsPresenter and if methods is options there will be response.
         */
        $metadata = array(
            'presenter' => 'Api:V1:Options',
            'action' => 'options',
            'anything' => array(
                Route::PATTERN => '.+', // tento regulár zahrnuje i lomítka, jinak je výchozí '[^/]+'
            ),
        );
        $this->router->addRoute("/api/v1/<anything>", $metadata);

		return  $this->router;
	}
}
