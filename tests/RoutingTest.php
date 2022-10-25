<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RoutingTest extends WebTestCase
{
    public function provideUrisWithStatusCode(): \Generator
    {
        yield ['/', 200];
        yield ['/login', 200];
        yield ['/logout', 302];
    }

    /**
     * @param string $uri
     * @param int $expectedStatusCode
     * @return void
     * @dataProvider provideUrisWithStatusCode
     */
    public function testApplicationRoutes(string $uri, int $expectedStatusCode): void
    {
        $client = static::createClient();
        $client->request('GET', $uri);

        $this->assertResponseStatusCodeSame($expectedStatusCode);
    }
}
