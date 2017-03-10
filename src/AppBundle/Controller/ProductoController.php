<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

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
        $products = $report->findAll();


        return $this->render('Producto/index.html.twig',
            [
                'productos' => $products, //le vamos a pasar un array
            ]);
    }

    /**
     *
     * @Route("/update/{id}", name="app_product_update")
     *
     */
    public function updateAction(Request $request,$id)
    {
        $m = $this->getDoctrine()->getManager();
        $report = $m->getRepository('AppBundle:Product');

        $p = $report->find($id);


        return $this->render('Producto/update.html.twig' ,
            [
                'action' => 'app_producto_updateAction',
                'producto' => $p,
            ]);

    }

    /**
     * @Route("/updateAction/{id}", name="app_producto_updateAction")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doUpdateAction(Request $request, $id)
    {
        $m = $this->getDoctrine()->getManager();
        $report = $m->getRepository('AppBundle:Product');

        $p = $report->find($id);
        $p
            ->setName($request->request->get('name'))
            ->setDescription( $request->request->get('description'))
            ->setPrice($request->request->get('price'))
            ->setUpdatedAt(new \DateTime());

        $m->persist($p);
        $m->flush();
        $products = $report->findAll();
        return $this->render('Producto/index.html.twig',
            [
                'productos' => $products, //le vamos a pasar un array
            ]);
    }

    /**
     * @Route("/delete/{id}", name="app_product_delete")
     *
     */

    public function deleteAction (Request $request, $id) {
        $m = $this->getDoctrine()->getManager();
        $report = $m->getRepository('AppBundle:Product');

        $p = $report->find($id);

        $m->remove($p);
        $m->flush();

        $products = $report->findAll();
        return $this->render('Producto/index.html.twig',
            [
                'productos' => $products, //le vamos a pasar un array
            ]);
    }

    /**
     * @Route("/create", name="app_product_create")
     *
     */

    public function createAction () {
        return $this->render('Producto/create.html.twig',
            [
                'action' => "app_product_createAction",
            ]);
    }

    /**
     * @Route("/createAction/", name="app_product_createAction")
     *
     */

    public function doCreateAction (Request $request){
        $m = $this->getDoctrine()->getManager();
        $report = $m->getRepository('AppBundle:Product');

        $p = new Product();

        $p
            ->setName($request->request->get('name'))
            ->setDescription( $request->request->get('description'))
            ->setPrice($request->request->get('price'));

        $m->persist($p);
        $m->flush();

        $products = $report->findAll();
        return $this->render('Producto/index.html.twig',
            [
                'productos' => $products, //le vamos a pasar un array
            ]);


    }
}
