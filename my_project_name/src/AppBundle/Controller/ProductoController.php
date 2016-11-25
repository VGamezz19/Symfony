<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ProductoController extends Controller
{
    /**
     * @Route("/", name="app_producto_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $m = $this->getDoctrine()->getManager();

        $report = $m->getRepository('AppBundle:Product');
        //esto es para poder hacer sentencias sql
        //el objeto que necesitamos para hacer consultas

       /*  $p = new Product();
        $p
            ->setName('Meizu MX5')
            ->setDescription('Chino con cierta garancia')
            ->setPrice('300');
        $m->persist($p); */
        //$m->flush();

        //$p = $report->find(1); //por la ID del producto
        //$p = $report->findOneBy([
         //   'name' => 'Meizu MX5',
        //]);
        // busca solo UNO (find ONE BY) y ponemos la condicion



        //Esto es para recoger un dato de la base de datos
        //y modifica el precio del objeto con la id = 1
       /* $p = $report->find(1);

        $p->setPrice('1100');
        $p->setDescription('Blanck Friday -Que nos lo quitan de las manos');

        $m->flush(); */

       $p1 = $report->findOneBy([
           'name' => 'Meizu MX5'

       ]);

        $m->remove($p1);

        $m->flush();
        
        $products = $report->findAll();


        return $this->render('Producto/index.html.twig',
            [
                'productos' => $products, //le vamos a pasar un array
            ]);
    }
}
