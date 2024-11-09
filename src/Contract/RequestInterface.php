<?php
/**
 * Created by PhpStorm.
 * User: sunrunpu
 * Date: 2023/9/4
 * Time: 3:30 PM.
 */

declare(strict_types=1);
/**
 * This file is part of msmm.
 */

namespace Hhink\BtSdk\Contract;

interface RequestInterface
{
    public function getApiMethodName();

    public function getApiParams();

    public function getApiRequestMethod();
}
