<?php

declare(strict_types=1);
/**
 * This file is part of msmm.
 */

namespace Hhink\BtSdk\Requests\Ssl;

use Hhink\BtSdk\Requests\AbstractRequest;

/**
 * 验证域名.
 */
class ValidateDomainRequest extends AbstractRequest
{
    /**
     * 域名索引.
     */
    protected string $index;

    public function getApiMethodName(): string
    {
        return '/acme?action=validate_domain';
    }
}
