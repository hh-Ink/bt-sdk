<?php

declare(strict_types=1);
/**
 * This file is part of msmm.
 */

namespace Hhink\BtSdk\Requests\Ssl;

use Hhink\BtSdk\Requests\AbstractRequest;

/**
 *  为站点申请证书.
 */
class ApplyCertApiRequest extends AbstractRequest
{
    /**
     * 域名.
     */
    protected string $domains;

    /**
     * 认证方式 (http 文件).
     */
    protected string $auth_type = 'http';

    /**
     * 认证.
     */
    protected string $auth_to;

    /**
     * 是否自动生成泛域名证书.
     */
    protected int $auto_wildcard = 0;

    /**
     * 站点ID.
     */
    protected int $id;

    public function setDomains(array $domains): void
    {
        $this->domains = json_encode($domains);
    }

    public function setAuthType(string $auth_type): void
    {
        $this->auth_type = $auth_type;
    }

    public function setAuthTo(string $auth_to): void
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

    public function getApiRequestMethod(): string
    {
        return 'POST_FILE';
    }
}
