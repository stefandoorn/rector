<?php

namespace RectorPrefix20220221\Psr\Log;

/**
 * Basic Implementation of LoggerAwareInterface.
 */
trait LoggerAwareTrait
{
    /**
     * The logger instance.
     *
     * @var LoggerInterface|null
     */
    protected $logger;
    /**
     * Sets a logger.
     *
     * @param LoggerInterface $logger
     */
    public function setLogger(\RectorPrefix20220221\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}
