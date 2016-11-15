<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 15/11/16
 * Time: 19:38
 */

namespace AppBundle\Controller;
use AppBundle\Service\CalculatorRacional;
use AppBundle\Service\Racional;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class CalculatorRacionalController extends Controller
{
    /**
     * @Route("/racional", name="app_calculatorRacional_index")
     *
     *
     */
    public function indexAction()
    {
        return $this->render(':CalculatorRacional:Index.html.twig');
    }


    /**
     * @Route("/RacionalSuma", name="app_calculator_RaSum")
     *
     */
    public function sumAction()
    {
        /*  */

        return $this->render(':CalculatorRacional:Form.html.twig' ,
            [
                'action' => 'app_calculator_doRaSum'
            ]);

    }

    /**
     * @Route("/doRaSum", name="app_calculator_doRaSum")
     *
     */
    public function doSum(Request $request)
    {
        /*$num1= $_POST['op1'];*/
        $num1= $request->request->get('op1');

        /*$num2= $_POST['op2'];*/
        $num2= $request->request->get('op2');

        /*$num3= $_POST['op3'];*/
        $num3= $request->request->get('op3');

        /*$num4= $_POST['op4'];*/
        $num4= $request->request->get('op4');

        $n1 =  new CalculatorRacional($num1, $num2, $num3, $num4);
        $n1->sum();
        $resultOp1= $n1->getOp1();
        $resultOp2= $n1->getOp2();

        return $this->render(':CalculatorRacional:Result.html.twig',
            [
                'titulo'    => "Suma",
                'opRe1'     => $resultOp1,
                'opRe2'     => $resultOp2,
                'op1'       => $num1,
                'op2'       => $num2,
                'op3'       => $num3,
                'op4'       => $num4,
                'operacion' => "+"
            ]);
    }
}