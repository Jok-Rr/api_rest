<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ProductController extends AbstractController
{
  #[Rest\Get('/products/{id}', name: "app_product_show")]
  #[Rest\View]
  #[ParamConverter("product", null, converter: "fos_rest.request_body")]
  public function viewProduct($id, ManagerRegistry $doctrine)
  {
    $entityManager = $doctrine->getManager();

    $data = $entityManager->getRepository(Product::class)->find($id);

    return $data;
  }
}
