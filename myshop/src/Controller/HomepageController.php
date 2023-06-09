<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Controller\HomepageController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('homepage/index.html.twig', [
            // findBy allows to render selected books, here ordered by descending id for the most recent book added to appear first
            'products' => $productRepository->findBy(array(), array('id' => 'desc'))

        ]);
    }
}
