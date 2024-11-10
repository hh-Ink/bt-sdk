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
class SetSiteSslRequest extends AbstractRequest
{
    /**
     * 站点名称.
     */
    protected string $siteName;

    /**
     * 类型.
     */
    protected string $type = '1';

    /**
     * 密钥.
     */
    protected string $csr;

    /**
     * 公钥.
     */
    protected string $key;

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function setCsr(string $csr): void
    {
        $this->csr = $csr;
    }

    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    public function setSiteName(string $siteName): void
    {
        $this->siteName = $siteName;
    }

    public function getApiMethodName(): string
    {
        return 'site?action=SetSSL';
    }
}
