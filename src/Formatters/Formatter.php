<?php

declare(strict_types=1);
/**
 * This file is part of msmm.
 */

namespace Hhink\BtSdk\Formatters;

use Hhink\HttpCaller\Dto\Result;
use Hhink\HttpCaller\Formatters\FormatterInterface;
use Hhink\HttpCaller\Response\ErrorCode;
use Hhink\HttpCaller\Response\HttpCode;
use Hhink\HttpCaller\Utils\StringUtil;
use Psr\Http\Message\ResponseInterface;

class Formatter implements FormatterInterface
{
    private ResponseInterface $response;

    public function setPsrResponse(ResponseInterface $response): FormatterInterface
    {
        $this->response = $response;
        return $this;
    }

    /**
     * 打包结果.
     */
    public function bind(): Result
    {
        $response = $this->statusCode();
        if ($response instanceof Result) {
            return $response;
        }
        return $this->body();
    }

    /**
     * 请求状态处理.
     */
    private function statusCode(): ?Result
    {
        $statusCode = $this->response->getStatusCode();
        if ($statusCode == HttpCode::HTTP_OK) {
            return null;
        }
        return new Result($statusCode, HttpCode::CODE_MAP[$statusCode]);
    }

    /**
     * 统一处理返回数据.
     */
    private function body(): Result
    {
        $content = $this->response->getBody()->__toString();
        // 返回值解析
        $body = StringUtil::isJson($content);
        if (!$body) {
            return new Result(
                ErrorCode::JSON_ERROR,
                ErrorCode::CODE_MAP[ErrorCode::JSON_ERROR],
                $content
            );
        }

        return new Result(ErrorCode::CODE_SUCCESS, 'Success!', $body);
    }
}
