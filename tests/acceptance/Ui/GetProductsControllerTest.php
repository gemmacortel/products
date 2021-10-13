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

    public function testHappyPath(): void
    {
        $response = $this->doRequest();
        $actualResponseContent = json_decode($response->getContent(), true);

        $expectedResponseContent = [
            [
                'sku' => '001',
                'name' => 'boots',
                'category' => 'boots'
            ],
            [
                'sku' => '002',
                'name' => 'boots',
                'category' => 'boots'
            ]
        ];

        self::assertResponseIsSuccessful($response);
        self::assertEquals($expectedResponseContent, $actualResponseContent);

    }

    public function testFilterNotFound(): void
    {
        $response = $this->doRequest('?name=bananas');
        $actualResponseContent = json_decode($response->getContent(), true);

        self::assertResponseIsSuccessful($response);
        self::assertEmpty($actualResponseContent);

    }

    public function testFilterFound(): void
    {
        $response = $this->doRequest('?sku=001');
        $actualResponseContent = json_decode($response->getContent(), true);

        $expectedResponseContent = [
            [
                'sku' => '001',
                'name' => 'boots',
                'category' => 'boots'
            ],
        ];

        self::assertResponseIsSuccessful($response);
        self::assertEquals($expectedResponseContent, $actualResponseContent);

    }

    private function doRequest(string $queryParams = ''): Response
    {
        $uri = '/' . $queryParams;
        $this->client->request('GET', $uri);

        return $this->client->getResponse();
    }
}
