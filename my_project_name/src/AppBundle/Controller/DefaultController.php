<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/name/{name}", name="App_Index_Defauld")
     */
    public function indexAction($name)
    {
        return new Response('Hello'. $name);
    }

    /**
     * @Route("prueba1", name="app_defauld_pruebaVista")
     */
    public function indexpeneAction()
    {
        return $this->render(':default:vista1.html.twig', [
            'titulo' => 'Mi página web',
            'resultado' => '3',  // son variables


            ]);

    }
}
