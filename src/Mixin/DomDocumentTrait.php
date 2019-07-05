<?php
/**
 * Copyright (c) 2010–2019 Ryan Parman <http://ryanparman.com>.
 * Copyright (c) 2016–2019 Contributors.
 *
 * http://opensource.org/licenses/Apache2.0
 */

declare(strict_types=1);

namespace SimplePie\UtilityPack\Mixin;

use DOMDocument;

/**
 * Shared code for working with `DOMDocument` objects.
 */
trait DomDocumentTrait
{
    /**
     * The DOMDocument object which is being used to parse the content.
     *
     * @var DOMDocument
     */
    protected $domDocument;

    /**
     * Gets the DOMDocument object which is being used to parse the content.
     */
    public function getDomDocument(): DOMDocument
    {
        return $this->domDocument;
    }

    /**
     * Gets the default (preferred) configuration for DOMDocument.
     */
    public function getDefaultDomConfig(DOMDocument $domDocument): DOMDocument
    {
        $domDocument->recover             = true;
        $domDocument->formatOutput        = false;
        $domDocument->preserveWhiteSpace  = false;
        $domDocument->resolveExternals    = true;
        $domDocument->substituteEntities  = true;
        $domDocument->strictErrorChecking = false;
        $domDocument->validateOnParse     = false;

        return $domDocument;
    }
}
