<?php

declare(strict_types=1);
/**
 * This file is part of msmm.
 */

namespace HyperfTest\Requests\Ssl;

use Hhink\BtSdk\Client;
use Hhink\BtSdk\Requests\Ssl\ApplyCertApiRequest;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class ApplyCertApiRequestTest extends TestCase
{
    public function testApplyCertApiRequest()
    {
        $request = new ApplyCertApiRequest();
        $request->setDomains(['1-test-fulu-api.maishou88.com']);
        $request->setAuthType('http');
        $request->setAuthTo(['http://1-test-fulu-api.maishou88.com']);
        $request->setAutoWildcard(0);
        $request->setId(1);

        $client = new Client();
        $client->setAppKey(file_get_contents(dirname(__DIR__, 3) . '/appKey.txt'));
        $client->setDomain(file_get_contents(dirname(__DIR__, 3) . '/domain.txt'));
        $result = $client->request($request);
        print_r($result->toArray());
        $this->assertTrue($result->getCode() == 200);
    }
}
