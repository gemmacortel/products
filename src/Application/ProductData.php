<?php

namespace App\Application;

use App\Domain\Product;

class ProductData
{
    /**
     * @var string
     */
    private $sku;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $category;

    /**
     * @var array
     */
    private $priceData;

    private function __construct(string $sku, string $name, string $category, array $priceData)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->category = $category;
        $this->priceData = $priceData;
    }

    public static function fromProduct(Product $product) {
        return new self($product->sku(), $product->name(), $product->category(), $product->getPriceData());
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function priceData(): array
    {
        return $this->priceData;
    }

    public function setSku(string $sku): self
    {
        $this->sku = $sku;
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;
        return $this;
    }

    public function setPriceData(array $priceData): void
    {
        $this->priceData = $priceData;
    }

    public function toArray(): array
    {
        return [
            'sku' => $this->sku,
            'name' => $this->name,
            'category' => $this->category,
            'price' => $this->priceData,
        ];
    }
}
