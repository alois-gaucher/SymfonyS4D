<?php
// src/Controller/LuckyController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Time extends AbstractController
{
    /**
     * @Route("/time/now", name="app_time")
     */
    public function get_time()
    {
        $time = date('d F Y G:i:s');;
        return $this->render('time/now.html.twig', array(
            'time' => $time,
        ));
    }
}
?>
