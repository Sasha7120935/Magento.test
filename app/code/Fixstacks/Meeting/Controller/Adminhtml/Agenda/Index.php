<?php
/**
 * index.php
 *
 * @copyright Copyright © 2020 Alek. All rights reserved.
 * @author    beloualek2gmail.com
 */
namespace Fixstacks\Meeting\Controller\Adminhtml\Agenda;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    
    /**
     * Check the permission to run it
     *
     * @return boolean
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Fixstacks_Meeting::agenda');
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Fixstacks_Meeting::agenda');
        $resultPage->getConfig()->getTitle()->prepend(__('Agenda'));

        return $resultPage;
    }
}
