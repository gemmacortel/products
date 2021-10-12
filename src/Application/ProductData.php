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

    private function __construct($sku, $name, $category)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->category = $category;
    }

    public static function fromProduct(Product $product) {
        return new self($product->sku(), $product->name(), $product->category());
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

    public function toArray()
    {
        return [
            'sku' => $this->sku,
            'name' => $this->name,
            'category' => $this->category
        ];
    }
}
