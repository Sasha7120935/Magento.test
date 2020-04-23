<?php
namespace Fixstacks\Meeting\Block;


use Magento\Framework\Data\Collection\EntityFactory;
use Magento\Framework\View\Element\Template;

class Display extends Template
{
    protected $_agendaFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Fixstack\Meeting\Model\AgendaFactory $agendaFactory
    )
    {
        $this->_agendaFactory = $agendaFactory;
        parent::__construct($context);
    }

    public function sayAgenda()
    {
        return __('Agenda');
    }

    public function getAgendaCollection(){
        $entity = $this->_agendaFactory->create();
        return $entity->getCollection();
    }
}
