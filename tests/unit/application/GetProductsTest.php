<?php

namespace App\Tests\unit\application;

use App\Application\GetProducts;
use App\Application\ProductData;
use App\Domain\Product;
use App\Domain\ProductRepository;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class GetProductsTest extends TestCase
{
    /** @var ProductRepository | MockObject */
    private $repository;
    private $getProducts;

    protected function setUp(): void
    {
        $this->repository = $this->createMock(ProductRepository::class);
        $this->getProducts = new GetProducts($this->repository);
    }

    public function testHappyPath(): void
    {
        $product = new Product('a', 'b', 'c', 12);
        $foundProducts = [$product];
        $this->repository
            ->expects(self::once())
            ->method('findAll')
            ->willReturn($foundProducts);

        $actualResponse = $this->getProducts->execute([]);

        self::assertEquals([ProductData::fromProduct($product)], $actualResponse);
    }
}
