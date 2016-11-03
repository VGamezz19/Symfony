<?php

namespace AppBundle\Controller;

use AppBundle\Service\Calculator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CalculatorController extends Controller
{
    /**
     * @Route("/", name="app_calculator_index")
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($name)
    {
        return $this->render(':Calculator:Index.html.twig');
    }

    /**
     * @Route("/suma/{num1}/{num2}", name"app_calculator_sum")
     */
    public function indexputitaAction($num1, $num2)
    {
           $n1 =  new Calculator($num1, $num2);

        return $this->n1.sum();
    }
}
