<?php


namespace App\ApiModule\V1Module\Presenters;


class OptionsPresenter extends ModuleBasePresenter
{


    /**
     * @throws BadRequestException
     * @throws \Nette\Application\AbortException
     */
    public function actionOptions()
    {
        if ($this->getHttpRequest()->getMethod() === 'OPTIONS') {
            $this->terminate();
        } else {
            throw new BadRequestException();
        }
    }


}
