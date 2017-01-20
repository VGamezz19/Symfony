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
     * @Route("/calculadora", name="app_calculator_index")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render(':Calculator:Index.html.twig');
    }
    /**
     * @Route("/suma", name="app_calculator_sum")
     *
     */
    public function sumAction()
    {
       /*  */

        return $this->render(':Calculator:Form.html.twig' ,
            [
            'action' => 'app_calculator_doSum'
        ]);

    }

    /**
     * @Route("/duSum", name="app_calculator_doSum")
     *
     */
    public function doSum(Request $request)
    { /*
        -- $num1= $_POST['op1'];
        $num1= $request->request->get('op1');

        -- $num2= $_POST['op2'];
        $num2= $request->request->get('op2');

        $n1 =  new Calculator($num1, $num2);
        $n1->sum();
        $result = $n1->getRes(); */

        $n1 = $this->get('Calculator');
        $n1->setOp1($request->request->get('op1'));
        $n1->setOp2( $request->request->get('op2'));
        $n1->sum();

        return $this->render(':Calculator:Result.html.twig',
            [
                'titulo'    => "Suma",
                'result'    => $n1->getRes(),
                'op1'       => $n1->getOp1(),
                'op2'       => $n1->getOp2(),
                'operacion' => "+"
            ]);
    }

    /**
     * @Route("/resta", name="app_calculator_res")
     *
     */
    public function resAction()
    {
        /*  */

        return $this->render(':Calculator:Form.html.twig' ,
            [
                'action' => 'app_calculator_doRes'
            ]);

    }

    /**
     * @Route("/duRes", name="app_calculator_doRes")
     *
     */
    public function doRes(Request $request)
    {
        /*$num1= $_POST['op1'];*/
        $num1= $request->request->get('op1');

        /*$num2= $_POST['op2'];*/
        $num2= $request->request->get('op2');

        $n1 =  new Calculator($num1, $num2);
        $n1->res();
        $result = $n1->getRes();

        return $this->render(':Calculator:Result.html.twig',
            [
                'titulo'    => "Resta",
                'result'    => $result,
                'op1'       => $num1,
                'op2'       => $num2,
                'operacion' => "-"
            ]);
    }
}