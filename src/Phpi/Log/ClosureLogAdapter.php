<?php

namespace Phpi\Log;

/**
 * Monolog log adapter
 *
 * @link https://github.com/Seldaek/monolog
 */
class ClosureLogAdapter implements LogInterface
{
    /**
     * @var \Callable
     */
    protected $logger;

    /**
     * {@inheritdoc}
     */
    public function __construct($logger)
    {
        if (!is_callable($logger)) {
            throw new InvalidArgumentException('Logger must be callable');
        }

        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function log($message, $priority = LOG_INFO)
    {
        call_user_func($this->logger, $message);
    }
}