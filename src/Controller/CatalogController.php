<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/catalog", name="catalog_", defaults={"sort"=null})
 */
class CatalogController extends AbstractController
{
    /**
     * @Route("/{sort}", name="index", defaults={"sort"=null})
     */
    public function index(ProductRepository $productRepository, ?string $sort, Request $request)
    {
        $minPrice = $request->query->get('min_price');
        $products = $productRepository->findBy([], $sort ? [$sort => 'ASC'] : null);

        return $this->render('catalog/index.html.twig', [
            'products' => $products,
        ]);
    }

    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function productShow(Product $product)
    {
        return $this->render('catalog/product.html.twig', [
            'product' => $product,
        ]);
    }
}
