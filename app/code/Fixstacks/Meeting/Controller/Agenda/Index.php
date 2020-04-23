<?php
/**
 * Index
 *
 * @copyright Copyright © 2020 Alek. All rights reserved.
 * @author    beloualek2gmail.com
 */

namespace Fixstacks\Meeting\Controller\Agenda;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * Index Action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->pageFactory->create();
        return $resultPage;
    }
}
//class Index extends \Magento\Framework\App\Action\Action
//{
//    protected $_pageFactory;
//
//    public function __construct(
//        \Magento\Framework\App\Action\Context $context,
//        \Magento\Framework\View\Result\PageFactory $pageFactory)
//    {
//        $this->_pageFactory = $pageFactory;
//        return parent::__construct($context);
//    }
//
//    public function execute()
//    {
//        return $this->_pageFactory->create();
//    }
//}
