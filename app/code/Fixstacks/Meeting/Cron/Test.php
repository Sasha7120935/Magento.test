<?php


namespace Fixstacks\Meeting\Cron;


class Test
{

    public function execute()
    {

        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/cron.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info(__METHOD__);

        return $this;

    }


}
//class Test {
//
//    protected $logger;
//
//    public function __construct(LoggerInterface $logger) {
//
//        $this->logger = $logger;
//
//    }
//
//    /**
//
//     * Write to system.log
//
//     *
//
//     * @return void
//
//     */
//
//    public function execute() {
//
//        // Do your Stuff
//
//        $this->logger->info('Cron Works');
//
//    }
//
//}
