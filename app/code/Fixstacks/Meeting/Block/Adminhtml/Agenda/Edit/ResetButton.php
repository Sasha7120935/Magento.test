<?php


namespace Fixstacks\Meeting\Block\Adminhtml\Agenda\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
class ResetButton implements ButtonProviderInterface{

    public function getButtonData(){
        return[
            'label' => __('Reset'),
            'class' => 'reset',
            'on_click' => 'Location.reload();',
            'sort_order' => 20,
        ];
    }
}
