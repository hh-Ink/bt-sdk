<?php

declare(strict_types=1);
/**
 * This file is part of msmm.
 */

namespace Hhink\BtSdk\Requests;

use Hhink\BtSdk\Contract\RequestInterface;
use ReflectionClass;

abstract class AbstractRequest implements RequestInterface
{
    public function getApiParams(): array
    {
        // 使用反射类获取类的详细信息
        $reflectionClass = new ReflectionClass($this);
        // 获取所有属性
        $properties = $reflectionClass->getProperties();
        $params = [];
        foreach ($properties as $property) {
            $name = $property->getName();
            $value = $this->{$name};
            if (is_null($value)) {
                continue;
            }
            // 将属性名添加到数组中
            $params[$name] = $value;
        }
        return $params;
    }

    public function getApiRequestMethod(): string
    {
        return 'POST';
    }
}
