<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/post/create", name="post_create")
     */
    public function createPost()
    {
        $post = new Post();
        $post->setTitle('Post 2');
        $post->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sagittis vel odio vel egestas. Donec gravida ultrices est, ut fermentum nisl vestibulum in. Ut eget vestibulum arcu, id malesuada turpis. Aliquam suscipit maximus ante, id porta ligula commodo non. Nullam mollis nisl nec accumsan ultricies. Suspendisse ullamcorper odio ipsum, quis finibus orci tempus sed. Donec a finibus felis.

Morbi nec facilisis erat, ut placerat augue. Donec vitae lacinia risus. Sed iaculis erat nibh, semper bibendum dui fringilla at. Donec ultricies elementum nibh a gravida. Fusce auctor quis dui ac elementum. Suspendisse lobortis ex vel pretium volutpat. Mauris gravida pretium maximus. Mauris euismod odio ex. Sed leo magna, semper in leo vitae, volutpat accumsan tellus. Ut vitae odio nec tellus rhoncus laoreet at nec orci.

Etiam felis augue, suscipit in fermentum quis, egestas et nibh. Pellentesque ultricies ex molestie erat vulputate eleifend. Duis posuere tortor rutrum laoreet mollis. Fusce urna nibh, imperdiet non ante vitae, faucibus porta magna. Integer dictum lobortis ex. Vivamus pellentesque nunc aliquet, consequat lacus egestas, bibendum leo. Curabitur odio lacus, laoreet in nunc id, dapibus pellentesque elit.

Etiam nec orci a nisl euismod congue. Curabitur ornare felis vitae est cursus, at lobortis velit fringilla. Morbi euismod ipsum at ligula facilisis tristique. Integer ipsum nisl, porta at tellus a, pretium facilisis elit. Etiam gravida porta aliquet. Mauris feugiat ultrices lorem, quis molestie neque pharetra et. Sed interdum nunc eget congue semper. Suspendisse nec dui pretium, iaculis leo quis, pharetra elit. Etiam facilisis aliquam urna eget ultricies.

In a mi dictum, viverra lacus a, ullamcorper mi. Nulla nunc libero, sagittis non augue vitae, interdum iaculis ante. Praesent iaculis commodo euismod. Donec et diam non turpis gravida lobortis vel nec nisi. Donec tincidunt finibus eros, ac rhoncus felis scelerisque in. Integer pretium vel urna a rhoncus. Praesent finibus justo vel elit fermentum, ullamcorper molestie dui bibendum. Nam nulla ligula, rhoncus sed ante non, rutrum ultrices risus. Curabitur a dapibus felis. Mauris pellentesque, mauris ut vehicula sollicitudin, augue ex molestie massa, a maximus mauris ligula ac neque. Nam a mollis nibh. Nulla sed libero vel arcu feugiat imperdiet eget at lacus. Maecenas tincidunt, lectus sit amet porta luctus, nulla neque porta magna, eget tincidunt nibh eros a libero. Proin venenatis ante arcu, non pharetra lorem porttitor interdum. Donec venenatis sagittis consectetur. In urna ipsum, ultrices non purus suscipit, fermentum maximus sem.');
        $post->setEnable(1);
        $post->setDateCreated(new \DateTime());

        $em = $this->getDoctrine()->getManager();
        $em->persist($post);
        $em->flush();

        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    /**
     * @Route("/post/read", name="post")
     */
    public function GetPost()
    {
        $post = $this->getDoctrine()->getRepository(Post::class)->find(1);

        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
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
        ]);
    }
}
