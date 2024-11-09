<?php

declare(strict_types=1);
/**
 * This file is part of msmm.
 */

namespace Hhink\BtSdk\Requests\Site;

use Hhink\BtSdk\Requests\AbstractRequest;

class GetSiteDomainsRequest extends AbstractRequest
{
    protected string $id;

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getApiMethodName(): string
    {
        return 'site?action=GetSiteDomains';
    }
}
