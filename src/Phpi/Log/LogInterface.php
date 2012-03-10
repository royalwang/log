<?php

namespace Phpi\Log;

/**
 * A log that messages can be written to at a certain priority
 */
interface LogInterface
{
    /**
     * Create a new log object
     *
     * @param object $logger A log adapter
     *
     * @throws \InvalidArgumentException If the adapter is not an instance
     *                                   of the proper class
     */
    function __construct($logger);

    /**
     * Log a message at a priority
     *
     * @param string  $message  The message to log
     * @param integer $priority (optional) Priority of message
     *                          Use the internal PHP \LOG_ constants (0–7).
     */
    function log($message, $priority = \LOG_INFO);
}