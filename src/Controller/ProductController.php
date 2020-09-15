<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        $product = new Product();
        $product->setNom('Clé USB ');
        $product->setPrice(10.30);

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    /**
     * @Route("/product/modification", name="product_modification")
     */
    public function productModification()
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find( 1 ); // récupération du post avec id 1
        $product->setNom('Clé USB 64Go'); // on set les différents champs
        $product->setPrice(9.99);

        $em = $this->getDoctrine()->getManager(); // on récupère le gestionnaire d'entité
        $em->flush(); // on effectue les différentes modifications sur la base de données
        // réelle

        return new Response('Sauvegarde OK sur : ' . $product->getId() );
    }
}
