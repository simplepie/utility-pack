<?php
/**
 * Copyright (c) 2010–2019 Ryan Parman <http://ryanparman.com>.
 * Copyright (c) 2016–2019 Contributors.
 *
 * http://opensource.org/licenses/Apache2.0
 */

declare(strict_types=1);

namespace SimplePie\UtilityPack\Mixin;

use Psr\Log\LoggerInterface;
use SimplePie\UtilityPack\Util\Types;

/**
 * Shared code for working with the logger.
 */
trait LoggerTrait
{
    /**
     * A PSR-3 logger.
     *
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Sets the PSR-3 logger.
     *
     * @param LoggerInterface $logger A PSR-3 compatible logger.
     */
    public function setLogger(LoggerInterface $logger): self
    {
        $this->logger = $logger;

        // What are we logging with?
        $this->logger->debug(\sprintf(
            'Class `%s` configured to use `%s`.',
            Types::getClassOrType($this),
            Types::getClassOrType($this->logger)
        ));

        return $this;
    }

    /**
     * Retrieves the PSR-3 logger.
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }
}
