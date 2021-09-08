<?php

namespace Tests\Functional;

use PHPUnit\Framework\TestCase;
use Dotenv\Dotenv;

class WebTest extends TestCase
{
    private string $baseUrl;

    private string $port;

    public function setUp(): void
    {
        parent::setUp();

        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->safeLoad();

        $this->baseUrl = $_SERVER['TEST_URL'] ?? 'http://localhost';
        $this->port = $_SERVER['TEST_PORT'] ?? '80';
    }

    public function testGetRule(): void
    {
        $client = new \GuzzleHttp\Client(['port' => $this->port]);
        $response = $client->request('GET', $this->baseUrl . '/110');

        $this->assertSame(200, $response->getStatusCode());
        $this->assertStringContainsString('text/html', $response->getHeaderLine('content-type'));
        $this->assertStringContainsString('Rule: 110', $response->getBody());
    }
}
