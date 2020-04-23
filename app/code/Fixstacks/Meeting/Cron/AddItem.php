<?php


namespace Fixstacks\Meeting\Cron;

use Fixstacks\Meeting\Model\ItemFactory;
class AddItem
{
  private $itemFactory;
  public function __construct(ItemFactory $itemFactory)
  {
      $this->itemFactory = $itemFactory;
  }
  public function execute()
  {
      $this->itemFactory->create()
          ->setName('Scheduled item')
          ->setDescription('Created at ' . time())
          ->save();
  }
}
