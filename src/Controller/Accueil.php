<?php
// src/Controller/Accueil.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Accueil extends AbstractController
{
    private $color = ['blue', 'yellow', 'red', 'green', 'purple', 'salmon'];

    /**
     * @Route("/", name="app_accueil")
     */
    public function accueil()
    {
        return $this->render('accueil/accueil.html.twig', [
            'colors' => $this->color
    ]);

    }
}
?>
