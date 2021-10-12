<?php

namespace App\Tests\acceptance\Ui;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GetProductsControllerTest extends WebTestCase
{
    private $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    public function testEmptyBody(): void
    {
        $response = $this->doRequest();
        $this->assertResponseIsSuccessful($response);
    }

    private function doRequest(): Response
    {
        $this->client->request('GET', '/');

        return $this->client->getResponse();
    }
}
