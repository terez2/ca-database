<?php

//###INSERT-LICENSE-HERE###

namespace App\Presenters;


use Components\BaseComponent;
use Nette\Application\UI\ITemplate;
use Nette\ComponentModel\IComponent;
use Nette\Forms\Form;

abstract class BasePresenter extends \Nette\Application\UI\Presenter
{

    const FLASH_MESSAGE_SUCCESS = 'success';
    const FLASH_MESSAGE_INFO = 'info';
    const FLASH_MESSAGE_WARNING = 'warning';
    const FLASH_MESSAGE_ERROR = 'danger';

    /** @persistent */
    public $lang = 'cs';

    protected $templateData;


    protected function startup()
    {
        parent::startup();
    }


    protected function getSignalModifiedName()
    {
        $signal = $this->getSignal();
        return $signal[1] . '!';
    }

    protected function beforeRender()
    {
        $this->setNamesToTemplate();
        if (isset($this->templateData)) {
            foreach ($this->templateData as $key => $data) {
                $this->template->$key = $data;
            }
        }
        $this->template->lang = $this->lang;
    }

    private function setNamesToTemplate()
    {
        $this->template->viewName = preg_replace('/\//', '\/', $this->view);
        $this->template->pageName = $this->getName();
        $this->template->robots = 'noindex, nofollow';
        $a = strrpos($this->name, ':');
        if ($a === false) {
            $this->template->moduleName = '';
            $this->template->presenterName = $this->name;
        } else {
            $this->template->moduleName = substr($this->name, 0, $a + 1);
            $this->template->presenterName = substr($this->name, $a + 1);
        }
    }

    protected function createComponent(string $name): ?IComponent
    {
        $component = parent::createComponent($name);
        if ($component instanceof BaseComponent || $component instanceof Form) {
            $component->setTranslator($this->translator);
        }
        return $component;
    }

    protected function createTemplate($class = null): ITemplate
    {
        $template = parent::createTemplate($class);
        //$template->addFilter('printf', 'sprintf');
        $template->addFilter(null, 'App\Utils\Filters\BasicFilters::common');

        $set = new \Latte\Macros\MacroSet($template->getLatte()->getCompiler());
        $set->addMacro("alink", "\App\Router\ArticleLink::link(%node.args, \$_presenter);");

        return $template;
    }

    public function flashMessage($message,string $type = self::FLASH_MESSAGE_INFO): \stdClass
    {
        $message = $this->translator->translate($message);
        return parent::flashMessage($message, $type);
    }

    protected function isSignal()
    {
        return $this->getSignal() !== null;
    }


}
