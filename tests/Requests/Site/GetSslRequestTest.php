<?php

declare(strict_types=1);
/**
 * This file is part of msmm.
 */

namespace HyperfTest\Requests\Site;

use Hhink\BtSdk\Client;
use Hhink\BtSdk\Requests\Site\GetSslRequest;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class GetSslRequestTest extends TestCase
{
    public function testGetSslRequest()
    {
        $request = new GetSslRequest();
        $request->setSiteName('1-test-fulu-api.maishou88.com');
        $client = new Client();
        $client->setAppKey(file_get_contents(dirname(__DIR__, 3) . '/appKey.txt'));
        $client->setDomain(file_get_contents(dirname(__DIR__, 3) . '/domain.txt'));

        $result = $client->request($request);

        print_r($result->toArray());

        $this->assertTrue($result->getCode() == 200);
    }
}
