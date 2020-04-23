<?php
/**
 * Delete
 *
 * @copyright Copyright © 2020 Alek. All rights reserved.
 * @author    beloualek2gmail.com
 */
namespace Fixstacks\Meeting\Controller\Adminhtml\Agenda;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Fixstacks\Meeting\Model\AgendaFactory;

class Delete extends Action
{
    /** @var agendaFactory $objectFactory */
    protected $objectFactory;

    /**
     * @param Context $context
     * @param AgendaFactory $objectFactory
     */
    public function __construct(
        Context $context,
        AgendaFactory $objectFactory
    ) {
        $this->objectFactory = $objectFactory;
        parent::__construct($context);
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Fixstacks_Meeting::agenda');
    }

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('entity_id', null);

        try {
            $objectInstance = $this->objectFactory->create()->load($id);
            if ($objectInstance->getId()) {
                $objectInstance->delete();
                $this->messageManager->addSuccessMessage(__('You deleted the record.'));
            } else {
                $this->messageManager->addErrorMessage(__('Record does not exist.'));
            }
        } catch (\Exception $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
        }
        
        return $resultRedirect->setPath('*/*');
    }
}
