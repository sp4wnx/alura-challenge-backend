<?php

namespace App\Tests\Unit\Smoke;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;

class VideosHttpStatusTest extends ApiTestCase
{
    public function testListAllVideosReturns200Test(): void
    {
        static::createClient()->request('GET', '/api/videos');

        self::assertResponseStatusCodeSame(200);
    }

    public function testCreateVideoShouldReturn201(): void
    {
        $this->createVideo();

        self::assertResponseStatusCodeSame(201);
    }

    public function testUpdateVideoShouldReturn200(): void
    {
        $video = $this->createVideo();

        static::createClient([], [
            'headers' => ['accept' => 'application/json'],
        ])->request('PUT', '/api/videos/' . $video->id, ['json' =>
            [
                'title' => 'First Video Test Updated',
                'description' => 'Description for first Video Test ever created! Updated',
                'url' => 'http://youtube.com/updated',
            ]
        ]);

        self::assertResponseStatusCodeSame(200);
    }

    public function testDeleteVideoShouldReturn204(): void
    {
        $video = $this->createVideo();

        static::createClient([], [
            'headers' => ['accept' => 'application/json'],
        ])->request('DELETE', '/api/videos/' . $video->id);

        self::assertResponseStatusCodeSame(204);
    }

    private function createVideo()
    {
        $response = static::createClient([], [
            'headers' => ['accept' => 'application/json'],
        ])->request('POST', '/api/videos', ['json' =>
            [
                'title' => 'First Video Test',
                'description' => 'Description for first Video Test ever created!',
                'url' => 'http://youtube.com',
            ]
        ]);

        return json_decode($response->getContent());
    }
}
