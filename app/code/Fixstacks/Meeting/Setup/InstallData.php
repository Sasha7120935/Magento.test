<?php
/**
 * InstallData
 *
 * @copyright Copyright © 2020 Alek. All rights reserved.
 * @author    beloualek2gmail.com
 */

namespace Fixstacks\Meeting\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * Agenda setup factory
     *
     * @var AgendaSetupFactory
     */
    protected $agendaSetupFactory;

    /**
     * Init
     *
     * @param AgendaSetupFactory $agendaSetupFactory
     */
    public function __construct(AgendaSetupFactory $agendaSetupFactory)
    {
        $this->agendaSetupFactory = $agendaSetupFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) //@codingStandardsIgnoreLine
    {
        /** @var AgendaSetup $agendaSetup */
        $agendaSetup = $this->agendaSetupFactory->create(['setup' => $setup]);

        $setup->startSetup();

        $agendaSetup->installEntities();
        $entities = $agendaSetup->getDefaultEntities();
        foreach ($entities as $entityName => $entity) {
            $agendaSetup->addEntityType($entityName, $entity);
        }

        $setup->endSetup();
    }
}
