<?php

declare(strict_types=1);
/**
 * This file is part of msmm.
 */

namespace Hhink\BtSdk\Requests\Site;

use Hhink\BtSdk\Requests\AbstractRequest;

class GetSslRequest extends AbstractRequest
{
    protected string $siteName;

    public function setSiteName(string $siteName): void
    {
        $this->siteName = $siteName;
    }

    public function getApiMethodName(): string
    {
        return 'site?action=GetSSL';
    }
}
