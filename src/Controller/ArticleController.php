<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    #[Route('/articles', name: 'articles')]
    public function index(ArticleRepository $articleRepository)
    {
        $articles=$articleRepository->findAll();
        return $this->render('home.html.twig',[
            'articles'=> $articles

        ]
        );
    }
    
    #[Route('/article/add', name: 'create_product')]
    public function createArticle(EntityManagerInterface $entityManager): Response
    {
        $product = new Article();
        $product->setTitle('Pomme de terre');
        $product->setStep(1);
        $product->setPicture('https://odelices.ouest-france.fr/images/recettes/2024/03/poelee-pommes-terre-champignons-H.jpg');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());
    }

}


