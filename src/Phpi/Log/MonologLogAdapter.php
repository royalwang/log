<?php

namespace Phpi\Log;

use Monolog\Logger;

/**
 * Monolog log adapter
 *
 * @link https://github.com/Seldaek/monolog
 */
class MonologLogAdapter implements LogInterface
{
    /**
     * Syslog to Monolog mappings
     */
    private static $mapping = array(
        LOG_DEBUG   => Logger::DEBUG,
        LOG_INFO    => Logger::INFO,
        LOG_WARNING => Logger::WARNING,
        LOG_ERR     => Logger::ERROR,
        LOG_CRIT    => Logger::CRITICAL,
        LOG_ALERT   => Logger::ALERT
    );

    /**
     * @var Logger
     */
    protected $logger;

    /**
     * {@inheritdoc}
     */
    public function __construct($logger)
    {
        if (!$logger instanceof Logger) {
            throw new \InvalidArgumentException(
                'Object must be instance of Monolog\Logger'
            );
        }

        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function log($message, $priority = LOG_INFO)
    {
        if (!isset(self::$mapping[$priority])) {
            throw new \InvalidArgumentException('Invalid priority ' . $priority);
        }

        $this->logger->addRecord(self::$mapping[$priority], $message);
    }
}