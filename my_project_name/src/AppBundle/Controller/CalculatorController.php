<?php
namespace AppBundle\Controller;
use AppBundle\Service\Calculator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class CalculatorController extends Controller
{
    /**
     * @Route("/", name="app_calculator_index")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render(':Calculator:Index.html.twig');
    }
    /**
     * @Route("/suma/{num1}/{num2}", name="app_calculator_sum")
     *
     */
    public function sumAction($num1, $num2)
    {
        $n1 =  new Calculator($num1, $num2);
        $n1->sum();
        return new Response($n1->getRes());

    }
}