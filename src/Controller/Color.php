<?php
// src/Controller/Color.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Color extends AbstractController
{
    /**
    * @Route("/color/{color}", name="color")
    */
    public function get_color($color)
    {
        $color = $color;
        return $this->render('color/color.html.twig', array(
            'color' => $color,
        ));
    }
}
?>
