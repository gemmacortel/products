<?php

namespace App\Tests\acceptance\Ui;

use Hautelook\AliceBundle\PhpUnit\RefreshDatabaseTrait;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GetProductsControllerTest extends WebTestCase
{
    use RefreshDatabaseTrait;

    private $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $loader = static::$kernel->getContainer()->get('fidry_alice_data_fixtures.loader.doctrine');
        $loader->load(['tests/fixtures/products.yml']);
    }

    public function testEmptyBody(): void
    {
        $response = $this->doRequest();

        self::assertResponseIsSuccessful($response);
        self::assertNotEmpty(json_decode($response->getContent()));

    }

    private function doRequest(): Response
    {
        $this->client->request('GET', '/');

        return $this->client->getResponse();
    }
}
