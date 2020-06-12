<?php
/**
 * installSchema.php
 *
 * @copyright Copyright © 2020 Alek. All rights reserved.
 * @author    beloualek2gmail.com
 */
namespace Fixstacks\Meeting\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Fixstacks\Meeting\Setup\EavTablesSetupFactory;
use Fixstacks\Meeting\Setup\AgendaSetup;
/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @var EavTablesSetupFactory
     */
    protected $eavTablesSetupFactory;

    /**
     * Init
     *
     * @internal param EavTablesSetupFactory $EavTablesSetupFactory
     */
    public function __construct(EavTablesSetupFactory $eavTablesSetupFactory)
    {
        $this->eavTablesSetupFactory = $eavTablesSetupFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) //@codingStandardsIgnoreLine
    {
        $setup->startSetup();

        $tableName = AgendaSetup::ENTITY_TYPE_CODE . '_entity';
        /**
         * Create entity Table
         */
        $table = $setup->getConnection()
            ->newTable($setup->getTable($tableName))
            ->addColumn(
                'entity_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )->setComment('Entity Table');

        $table->addColumn(
            'identifier',
            Table::TYPE_TEXT,
            100,
            ['nullable' => false],
            'Identifier'
        )->addIndex(
            $setup->getIdxName($tableName, ['identifier']),
            ['identifier']
        );
        $table->addColumn(
            'is_active',
            Table::TYPE_INTEGER,
            null,
            ['nullable' => false, 'default' => ''],
            'Is_active'
        )->addIndex(
            $setup->getIdxName($tableName, ['is_active']),
            ['is_active']
        );
        $table->addColumn(
            'title',
            Table::TYPE_TEXT,
            100,
            ['nullable' => false, 'default' => ''],
            'Title'
        )->addIndex(
            $setup->getIdxName($tableName, ['title']),
            ['title']
        );
        $table->addColumn(
            'description',
            Table::TYPE_TEXT,
            250,
            ['nullable' => false, 'default' => ''],
            'Description'
        )->addIndex(
            $setup->getIdxName($tableName, ['description']),
            ['description']
        );
        $table->addColumn(
            'task',
            Table::TYPE_TEXT,
            100,
            ['nullable' => false, 'default' => ''],
            'Task'
        )->addIndex(
            $setup->getIdxName($tableName, ['task']),
            ['task']
        );
        $table->addColumn(
            'date',
            Table::TYPE_DATETIME,
            100,
            ['nullable' => false, 'default' => ''],
            'Date'
        )->addIndex(
            $setup->getIdxName($tableName, ['date']),
            ['date']
        );

        // Add more static attributes here...

        $table->addColumn(
            'created_at',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
            'Creation Time'
        )->addColumn(
            'updated_at',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
            'Update Time'
        );

        $setup->getConnection()->createTable($table);

        /** @var \Fixstacks\Meeting\Setup\EavTablesSetup $eavTablesSetup */
        $eavTablesSetup = $this->eavTablesSetupFactory->create(['setup' => $setup]);
        $eavTablesSetup->createEavTables(AgendaSetup::ENTITY_TYPE_CODE);

        $setup->endSetup();
    }
}
