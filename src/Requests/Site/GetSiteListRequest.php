<?php

declare(strict_types=1);
/**
 * This file is part of msmm.
 */

namespace Hhink\BtSdk\Requests\Site;

use Hhink\BtSdk\Requests\AbstractRequest;

class GetSiteListRequest extends AbstractRequest
{
    protected int $type = -1;

    /**
     * 页码
     */
    protected int $p = 1;

    /**
     * 每页数量.
     */
    protected int $limit = 10;

    /**
     * 搜索关键字.
     */
    protected ?string $search = null;

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function setP(int $p): void
    {
        $this->p = $p;
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * @param mixed $search
     */
    public function setSearch($search): void
    {
        $this->search = $search;
    }

    public function getApiMethodName(): string
    {
        return '/data?action=getData&table=sites';
    }
}
