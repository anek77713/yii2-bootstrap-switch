<?php

namespace hiqdev\bootstrap_switch;

use yii\helpers\ArrayHelper;
use yii\helpers\Json;

trait BootstrapSwitchTrait
{
    public $type = BootstrapSwitchAsset::TYPE_CHECKBOX;

    public $inlineLabel = true;

    public $items = [];

    public $itemOptions = [];

    public $labelOptions = [];

    public $separator = " &nbsp;";

    public $containerOptions = ['class'=>'form-group'];

    public $pluginOptions;

    public $checked = false;

    protected $selector;

    public function registerClientScript()
    {
        $view = $this->view;
        BootstrapSwitchAsset::register($view);
        $this->pluginOptions['animate'] = ArrayHelper::getValue($this->pluginOptions, 'animate', true);
        $options = Json::encode($this->pluginOptions);
        $view->registerJs(";jQuery('$this->selector').bootstrapSwitch($options);");
    }
}

