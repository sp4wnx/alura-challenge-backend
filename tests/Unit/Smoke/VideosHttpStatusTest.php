<?php

namespace App\Tests\Unit\Smoke;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class VideosHttpStatusTest extends ApiTestCase
{
    public function testListAllVideosReturns200Test(): void
    {
        $response = static::createClient()->request('GET', '/api/videos');

        self::assertResponseStatusCodeSame(200);
    }
}
