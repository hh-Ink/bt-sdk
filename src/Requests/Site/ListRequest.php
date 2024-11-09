<?php

declare(strict_types=1);
/**
 * This file is part of msmm.
 */

namespace Hhink\BtSdk\Requests\Site;

use Hhink\BtSdk\Requests\AbstractRequest;

class ListRequest extends AbstractRequest
{
    protected int $type = -1;

    protected int $p = 1;

    protected int $limit = 10;

    protected $search;

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

    public function setTable(string $table): void
    {
        $this->table = $table;
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
