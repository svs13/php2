<?php

require __DIR__ . '/autoload.php';

use Psr\Log\LoggerInterface;

class Foo
{
    private $logger;

    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger;
    }

    public function doSomething()
    {
        if ($this->logger) {
            $this->logger->info('Doing work');
        }

        // do something useful
    }
}

class Logger extends \Psr\Log\AbstractLogger
{

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function log($level, $message, array $context = array())
    {
        echo 'Level: ' . $level . ' Message: ' . $message;
    }
}

$logger = new Logger();

$foo = new Foo($logger);

$logger->alert('hello world!!!'); //Level: alert Message: hello world!!!

$foo->doSomething();



