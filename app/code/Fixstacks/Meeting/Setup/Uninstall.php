<?php

/**
 * Uninstall.php
 *
 * @copyright Copyright © 2020 Alek. All rights reserved.
 * @author    beloualek2gmail.com
 */
namespace Fixstacks\Meeting\Setup;

use Magento\Framework\Setup\UninstallInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class Uninstall implements UninstallInterface
{
    /**
     * @var array
     */
    protected $tablesToUninstall = [
        AgendaSetup::ENTITY_TYPE_CODE . '_entity',
        AgendaSetup::ENTITY_TYPE_CODE . '_eav_attribute',
        AgendaSetup::ENTITY_TYPE_CODE . '_entity_datetime',
        AgendaSetup::ENTITY_TYPE_CODE . '_entity_decimal',
        AgendaSetup::ENTITY_TYPE_CODE . '_entity_int',
        AgendaSetup::ENTITY_TYPE_CODE . '_entity_text',
        AgendaSetup::ENTITY_TYPE_CODE . '_entity_varchar'
    ];

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context) //@codingStandardsIgnoreLine
    {
        $setup->startSetup();

        foreach ($this->tablesToUninstall as $table) {
            if ($setup->tableExists($table)) {
                $setup->getConnection()->dropTable($setup->getTable($table));
            }
        }

        $setup->endSetup();
    }
}
