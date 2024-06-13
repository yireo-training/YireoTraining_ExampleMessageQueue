<?php

namespace YireoTraining\ExampleMessageQueue\Console\Command;

use Magento\Framework\MessageQueue\PublisherInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    public function __construct(
        private PublisherInterface $publisher,
        ?string $name = null) {
        parent::__construct($name);
    }

    /**
     * Initialization of the command.
     */
    protected function configure()
    {
        $this->setName('yireo_example:message:publish');
        $this->setDescription('Publish message');
        parent::configure();
    }

    /**
     * CLI command description.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $data = ['foo' => 'bar'];
        $request = json_encode($data);
        $this->publisher->publish('example', $request);
        $output->writeln('Message added to queue');
        return Command::SUCCESS;
    }
}
