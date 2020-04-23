<?php

/**
 * Agenda.php
 *
 * @copyright Copyright © 2020 Alek. All rights reserved.
 * @author    beloualek2gmail.com
 */

namespace Fixstacks\Meeting\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Agenda extends AbstractModel implements IdentityInterface
{
    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'fixstacks_meeting_agenda';

    /**
     * @var string
     */
    protected $_cacheTag = 'fixstacks_meeting_agenda';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'fixstacks_meeting_agenda';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('Fixstacks\Meeting\Model\ResourceModel\Agenda');
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Save from collection data
     *
     * @param array $data
     * @return $this|bool
     */
    public function saveCollection(array $data)
    {
        if (isset($data[$this->getId()])) {
            $this->addData($data[$this->getId()]);
            $this->getResource()->save($this);
        }
        return $this;
    }


}
