<?php


namespace App\Application;


use App\Domain\ProductRepository;

class GetProducts
{
    /** @var ProductRepository */
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): array
    {
        $products = $this->repository->findAll();

        $productsData = array_map(
            function ($product) {
                return ProductData::fromProduct($product);
                },
            $products
        );

        return $productsData;
    }
}
