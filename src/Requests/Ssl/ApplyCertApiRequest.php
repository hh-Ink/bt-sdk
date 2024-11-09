<?php

declare(strict_types=1);
/**
 * This file is part of msmm.
 */

namespace Hhink\BtSdk\Requests\Ssl;

use Hhink\BtSdk\Requests\AbstractRequest;

class ApplyCertApiRequest extends AbstractRequest
{
    protected array $domains;

    protected string $auth_type = 'http';

    protected array $auth_to;

    protected int $auto_wildcard = 0;

    protected int $id;

    public function setDomains(array $domains): void
    {
        $this->domains = $domains;
    }

    public function setAuthType(string $auth_type): void
    {
        $this->auth_type = $auth_type;
    }

    public function setAuthTo(array $auth_to): void
    {
        $this->auth_to = $auth_to;
    }

    public function setAutoWildcard(int $auto_wildcard): void
    {
        $this->auto_wildcard = $auto_wildcard;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getApiMethodName(): string
    {
        return 'acme?action=apply_cert_api';
    }
}
