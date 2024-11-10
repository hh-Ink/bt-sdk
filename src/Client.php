<?php

declare(strict_types=1);
/**
 * This file is part of msmm.
 */

namespace Hhink\BtSdk;

use Hhink\BtSdk\Contract\RequestInterface;
use Hhink\BtSdk\Formatters\Formatter;
use Hhink\HttpCaller\AbstractServiceClient;
use Hhink\HttpCaller\Dto\Result;
use Hhink\HttpCaller\Formatters\FormatterInterface;
use Throwable;

class Client extends AbstractServiceClient
{
    protected string $appKey;

    /**
     * 设置域名.
     * @param mixed $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * 设置appKey.
     * @param mixed $appKey
     */
    public function setAppKey($appKey)
    {
        $this->appKey = $appKey;
    }

    /**
     * 请求
     * @throws Throwable
     */
    public function request(RequestInterface $request): Result
    {
        $data = $this->getParams($request->getApiParams());
        print_r($data);
        $method = strtoupper($request->getApiRequestMethod());
        if ($method == 'POST') {
            $option = [
                'form_params' => $data,
            ];
        } elseif ($method == 'POST_FILE') {
            $multipart = [];
            foreach ($data as $key => $value) {
                $multipart[] = [
                    'name' => $key,
                    'contents' => $value,
                ];
            }
            $option = [
                'multipart' => $multipart,
            ];
            $method = 'POST';
        } else {
            $option = [
                'query' => $data,
            ];
        }
        $url = trim($this->getBaseUri(), '/') . '/' . trim($request->getApiMethodName(), '/');
        return $this->call($method, $url, $option);
    }

    /**
     * 获取响应格式.
     */
    protected function getFormatter(): FormatterInterface
    {
        return new Formatter();
    }

    /**
     * 签名参数.
     * @param mixed $params
     * @return mixed
     */
    private function getParams($params)
    {
        $time = time();
        $params['request_token'] = md5($time . '' . md5($this->appKey));
        $params['request_time'] = $time;
        return $params;
    }
}
