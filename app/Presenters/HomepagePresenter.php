<?php


namespace App\Presenters;

use Nette\Http\IResponse;

final class HomepagePresenter extends BasePresenter
{
    /**
     * @throws \Nette\Application\AbortException
     */
    public function actionDefault()
	{
        $this->terminate();
	}

}
