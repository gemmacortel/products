<?php

namespace App\UI\Rest;

use App\Application\GetProducts;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class GetProductsController extends AbstractController
{
    /**
     * @var GetProducts
     */
    private $getProducts;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(GetProducts $getProducts, SerializerInterface $serializer)
    {
        $this->getProducts = $getProducts;
        $this->serializer = $serializer;
    }

    public function __invoke(): JsonResponse
    {
        $productsData = $this->getProducts->execute();

        return JsonResponse::fromJsonString($this->serializer->serialize($productsData, 'json'), Response::HTTP_OK);
    }
}
