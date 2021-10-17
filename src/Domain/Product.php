<?php

namespace App\Domain;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true, nullable=false)
     * @var string
     */
    private $sku;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     * @var string
     */
    private $category;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=false)
     */
    private $originalPrice;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="App\Domain\Discount", mappedBy="product")
     */
    private $discounts;

    public function __construct($sku, $name, $category, $originalPrice)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->category = $category;
        $this->originalPrice = $originalPrice;
        $this->discounts = new ArrayCollection();
    }

    public function sku(): string
    {
        return $this->sku;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function category(): string
    {
        return $this->category;
    }

    private function applicableDiscount(): ?Discount
    {
        if ($this->discounts->isEmpty()) {
            return null;
        }

        $validDiscounts = [];

        foreach ($this->discounts->toArray() as $discount) {
            if ($discount->isValid()) {
                $validDiscounts[] = $discount;
            }
        }

        //TODO order by percentage amount, DESC

        return reset($validDiscounts);
    }

    public function getPriceData(): array
    {
        $discount = $this->applicableDiscount();
        $finalPrice = $discount ? $this->originalPrice - (($discount->percentage()/100) * $this->originalPrice) : $this->originalPrice;

        //TODO use DTO
        return [
            'original' => $this->originalPrice,
            'final' => $finalPrice,
            'discount_percentage' => $discount ? $discount->percentage() . '%': null,
            'currency' => 'EUR'
        ];
    }
}
