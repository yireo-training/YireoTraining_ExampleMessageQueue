<?php
declare(strict_types=1);

namespace YireoTraining\ExampleMessageQueue\Model\Queue\Handler;

use Psr\Log\LoggerInterface;

class Handler
{
    public function __construct(
        private LoggerInterface $logger
    ) {
    }

    public function execute(string $request)
    {
        echo 'Handling: '.$request."\n";
        $this->logger->notice('ExampleMessageQueue handler is called', var_export($request, true));
    }
}
