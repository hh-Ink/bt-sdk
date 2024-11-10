<?php

declare(strict_types=1);
/**
 * This file is part of msmm.
 */

namespace Hhink\BtSdk\Requests\Site;

use Hhink\BtSdk\Requests\AbstractRequest;

/**
 * 获取站点SSL证书信息.
 */
class GetSiteSslRequest extends AbstractRequest
{
    /**
     * 站点名称.
     */
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
