<?php
// src/Controller/LuckyController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class LuckyController extends AbstractController
{
    private $color = ['blue', 'yellow', 'red', 'green', 'purple', 'salmon'];
    /**
     * @Route("/lucky/number", name="app_lucky_number")
     */
    public function number()
    {
        $number = mt_rand(0, 150);
        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
            'colors' => $this->color
        ));
    }

    /**
     * @Route("/lucky/ip", name="app_lucky_ip")
     */
    public function ip()
    {
        $client_ip = 1;
        return $this->render('lucky/ip.html.twig', array(
            'client_ip' => $client_ip,
        ));
    }
}
?>
