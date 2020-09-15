<?php

namespace App\Controller;

use App\Entity\PostCategory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostCategoryController extends AbstractController
{
    /**
     * @Route("/post/category/create", name="post_category_create")
     */
    public function createCategory()
    {
        $category = new PostCategory();
        $category->setTitle('Catégorie 1');

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->flush();

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    /**
     * @Route("/post/category", name="post_category")
     */
    public function index()
    {
        return $this->render('post_category/index.html.twig', [
            'controller_name' => 'PostCategoryController',
        ]);
    }
}
