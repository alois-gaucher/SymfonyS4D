<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostCategoryRepository;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/post/create", name="post_create")
     */
    public function createPost(PostCategoryRepository $postCategoryRepository, EntityManagerInterface  $em)
    {
        $category = $postCategoryRepository->find(1);

        $post = new Post();
        $post->setTitle('Post 1');
        $post->setEnable(true);
        $post->setContent('Loreum ipsum...');
        $post->setDateCreated(new \DateTime());
        $post->setCategory($category);//on doit passer une entité PostCategory

        $em->persist($post);
        $em->flush();

        return $this->render('post/index.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * @Route("/supprimer/{post}", name="supprimer_post")
     */
    public function supprimerPost(EntityManagerInterface $entityManager, Post $post)
    {
        $entityManager->remove($post);
        $entityManager->flush();

        return $this->redirectToRoute('post-post-category');
    }

    /**
     * @Route("/post/read/{id}", name="post_read")
     */
    public function GetPost($id)
    {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($id);

        return $this->render('post/index.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * @Route("/post/delete/{id}", name="post_delete")
     */
    public function DeletePost($id)
    {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($id);

        return $this->render('post/index.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * @Route("/post/read/", name="post_read_all")
     */
    public function GetPosts()
    {
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();

        return $this->render('post/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/category/show/{id}", name="category_show")
     */
    public function GetCategory($id)
    {
        $postCategory = $this->getDoctrine()->getRepository(PostCategory::class)->find($id);

        return $this->render('post_category/index.html.twig', [
            'postCategory' => $postCategory,
        ]);
    }

    /**
     * @Route("/post-post-category", name="post-post-category")
     */
    public function affichePostCategory(PostRepository $postRepository, PostCategoryRepository $postCategoryRepository)
    {
        // ligne ci-dessous inutile car injection de dépendance dans la méthode)
        //$postRepository = $this->getDoctrine()->getRepository(Post::class);
        $posts = $postRepository->findAll(); //récupère tous les posts
        $postCategory = $postCategoryRepository->find(1);

        return $this->render('post/post-post-category.html.twig', [
            'postCategory' => $postCategory,
            'posts' => $posts
        ]);
    }

    /**
     * @Route("/post", name="post")
     */
    public function index()
    {
        $post = $this->getDoctrine()->getRepository(Post::class)->findAll();

        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
            'post' => $post
        ]);
    }
}
