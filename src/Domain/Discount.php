<?php

namespace App\Domain;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Discount
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=false)
     */
    private $percentage;

    /**
     * @var Product
     * @ORM\ManyToOne(targetEntity="App\Domain\Product", inversedBy="discounts")
     */
    private $product;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $startDate;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $endDate;

    public function __construct(int $percentage, Product $product, DateTime $startDate, DateTime $endDate)
    {
        $this->percentage = $percentage;
        $this->product = $product;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function percentage(): int
    {
        return $this->percentage;
    }

    public function product(): Product
    {
        return $this->product;
    }

    public function startDate(): DateTime
    {
        return $this->startDate;
    }

    public function endDate(): DateTime
    {
        return $this->endDate;
    }

    public function isValid(): bool
    {
        $now = new \DateTime();

        return $now >= $this->startDate && $now <= $this->endDate;
    }
}
