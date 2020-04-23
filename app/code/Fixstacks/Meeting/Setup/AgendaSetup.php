<?php
/**
 * AgendaSetup
 *
 * @copyright Copyright © 2020 Alek. All rights reserved.
 * @author    beloualek2gmail.com
 */

namespace Fixstacks\Meeting\Setup;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;

/**
 * @codeCoverageIgnore
 */
class AgendaSetup extends EavSetup
{
    /**
     * Entity type for Agenda EAV attributes
     */
    const ENTITY_TYPE_CODE = 'fixstacks_agenda';

    /**
     * Retrieve Entity Attributes
     *
     * @return array
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function getAttributes()
    {
        $attributes = [];

        $attributes['identifier'] = [
            'type' => 'static',
            'label' => 'identifier',
            'input' => 'text',
            'required' => true,
            'sort_order' => 10,
            'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
            'group' => 'General',
            'validate_rules' => 'a:2:{s:15:"max_text_length";i:100;s:15:"min_text_length";i:1;}'
        ];

        // Add your entity attributes here... For example:
        $attributes['is_active'] = [
            'type' => 'int',
            'label' => 'Is Active',
            'input' => 'select',
            'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
            'sort_order' => 20,
            'global' => ScopedAttributeInterface::SCOPE_STORE,
            'group' => 'General',
        ];
        $attributes['title'] = [
            'type' => 'varchar',
            'label' => 'Title',
            'input' => 'text',
            'required' => true,
            'sort_order' => 30,
            'global' => ScopedAttributeInterface::SCOPE_STORE,
            'group' => 'General',
        ];
        $attributes['description'] = [
            'type' => 'text',
            'label' => 'Description',
            'input' => 'textarea',
            'required' => true,
            'sort_order' => 40,
            'global' => ScopedAttributeInterface::SCOPE_STORE,
            'group' => 'General',
            'wysiwyg_enabled' => true,
        ];
        $attributes['task'] = [
            'type' => 'varchar',
            'label' => 'Task',
            'input' => 'text',
            'required' => true,
            'sort_order' => 50,
            'global' => ScopedAttributeInterface::SCOPE_WEBSITE,
            'group' => 'General',
        ];
        $attributes['date'] = [
            'type' => 'datetime',
            'label' => 'Date',
            'input' => 'date',
            'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\Datetime',
            'required' => true,
            'sort_order' => 60,
            'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
            'group' => 'General',
            'validate_rules' => 'a:1:{s:16:"input_validation";s:4:"date";}',
        ];
        return $attributes;
    }

    /**
     * Retrieve default entities: agenda
     *
     * @return array
     */
    public function getDefaultEntities()
    {
        $entities = [
            self::ENTITY_TYPE_CODE => [
                'entity_model' => 'Fixstacks\Meeting\Model\ResourceModel\Agenda',
                'attribute_model' => 'Fixstacks\Meeting\Model\ResourceModel\Eav\Attribute',
                'table' => self::ENTITY_TYPE_CODE . '_entity',
                'increment_model' => null,
                'additional_attribute_table' => self::ENTITY_TYPE_CODE . '_eav_attribute',
                'entity_attribute_collection' => 'Fixstacks\Meeting\Model\ResourceModel\Attribute\Collection',
                'attributes' => $this->getAttributes()
            ]
        ];

        return $entities;
    }
}
