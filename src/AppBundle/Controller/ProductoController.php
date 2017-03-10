<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints\DateTime;

class ProductoController extends Controller
{



    /**
     * @Route("/", name="app_producto_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */



    public function indexAction()
    {
        $sesion = new Session();

        //$sesion -> start();
        //$sesion ->get('gif', '');

       // $sesion->getFlashBag()->get('gif')

       $gifRedirect = $sesion->get('gif');

        $m = $this->getDoctrine()->getManager();
        $report = $m->getRepository('AppBundle:Product');
        $products = $report->findAll();


        return $this->render('Producto/index.html.twig',
            [
                'productos' => $products, //le vamos a pasar un objeto
                'gif' => $gifRedirect

            ]);
    }

    /**
     *
     * @Route("/update/{id}", name="app_product_update")
     *
     */
    public function updateAction(Request $request,$id)
    {
        $sesion = new Session();

        $sesion->set('gif','img/putoAmo3.gif');

        //$sesion->getFlashBag()->add('gif', 'img/putoAmo3.gif');

        $m = $this->getDoctrine()->getManager();
        $report = $m->getRepository('AppBundle:Product');

        $p = $report->find($id);

        $form = $this->createForm(ProductType::class, $p);




        return $this->render('Producto/form.html.twig',
            [
                'form' => $form->createView(),
                'action' => $this->generateUrl('app_producto_updateAction', ['id' => $id]),
                'gif' => ''
            ]); //PONER UN GIF DIFERENTE



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

        $form = $this->createForm(ProductType::class, $p);

        $form->handleRequest($request);

        if ($form->isValid()){
            $m->flush();
            $this->addFlash('messages', 'Producto UPDATEAO PAYOOO');


            return $this->redirectToRoute('app_producto_index');
        }

        $this->addFlash('messages','Tu eres tonto o que payaso? caranchoa');

        return $this->render(':Producto:form.html.twig',
            [
                'form' => $form->createView(),
                'action' => $this->generateUrl('app_producto_updateAction', ['id' => $id]),
                'gif' => 'img/putoAmo5.gif'

            ]); // PASAR UN GIF

    }

    /**
     * @Route("/delete/{id}", name="app_product_delete")
     *
     * @ParamConverter(name="producto", class="AppBundle:Product")
     */

    public function deleteAction ($producto) {

        $sesion = new Session();

        $sesion->set('gif','img/putoAmo2.gif');

        //$sesion->getFlashBag()->add('gif', 'img/putoAmo2.gif');

        $m = $this->getDoctrine()->getManager();
        $m->remove($producto);
        $m->flush();

        $this->addFlash('messages', 'Producto eliminao CHAACHO');
        //$this->addFlash('gif', 'img/putoAmo2.gif');

        return $this->redirectToRoute('app_producto_index');

    }

    /**
     * @Route("/create", name="app_product_create")
     *
     */

    public function createAction (){

        /*
        return $this->render('Producto/create.html.twig',
            [
                'action' => "app_product_createAction",
            ]);
        */

        $producto = new Product();

        $form = $this->createForm(ProductType::class, $producto);

        //Estamos creando un formulario pasandole un PRODUCTO VACIO! entonces, estara listo para que se rellene
        //y escribir los datos en el formulario creado, solo tendremos que pedirselo al $form.

        return $this->render('Producto/form.html.twig',
            [
                'form' => $form->createView(),
                'action' => $this->generateUrl('app_product_createAction'),
                'gif' => ''

            ]

            //Con CreateVIEW generamos el form

            //generateURL no lo entiendo.!!!"!!"

        ); //PASARLE UN GIF
    }
    /**
     * @Route("/createAction/", name="app_product_createAction")
     *
     */

    public function doCreateAction (Request $request){

        $sesion = new Session();

        $sesion->set('gif','img/putoAmo6.gif');

        //$sesion->getFlashBag()->add('gif', 'img/putoAmo6.gif');
        /*
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

        */



        $producto = new Product();
        $form = $this->createForm(ProductType::class, $producto);

        $form->handleRequest($request);

        if ($form -> isValid()){
            $m = $this->getDoctrine()->getManager();
            $m->persist($producto);
            $m->flush();

            $this->addFlash('messages', 'Producto añadido TETE');
            //$this->addFlash('gif', 'img/putoAmo6.gif');

            return $this->redirectToRoute('app_producto_index'); //para generar otravez la tabla principal

        }

        $this->addFlash('messages', 'XAVAL! QUE TE HAS "EJIBOJAO"');

        return $this->render('Producto/form.html.twig',
            [
                'form' => $form->createView(),
                'action' => $this->generateUrl('app_product_createAction'),
                'gif' => 'img/putoAmo7.gif'

            ]);


    }
}
