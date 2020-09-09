<?php
// src/Controller/Color.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Color extends AbstractController
{
    private $color = ['blue', 'yellow', 'red', 'green', 'purple', 'salmon'];

    /**
    * @Route("/color/{color}", name="app_lucky_color")
    */
    public function get_color($color)
    {
        return $this->render('color/color.html.twig', array(
            'color' => $color,
            'colors' => $this->color
        ));
    }
}
?>
