<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class ProductoController extends Controller
{

    public $count = 0;

    /**
     * @Route("/", name="app_producto_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */


    public function indexAction()
    {
        //GIFF
            $gif = '';
        //
        $m = $this->getDoctrine()->getManager();
        $report = $m->getRepository('AppBundle:Product');
        $products = $report->findAll();

        //Pregunta por el gift

            if ($this->count = 3) {
                $gif = 'img/putoAmo3.gif';
            } else if ($this->count = 1) {
                $gif = 'img/putoAmo2.gif';
            } else if ($this->count =2 ) {
                $gif = 'img/putoAmo6.gif';
            } else {
                $gif = 'img/putoAmo.gif';
            }

        return $this->render('Producto/index.html.twig',
            [
                'productos' => $products, //le vamos a pasar un array
                'gif' => $gif
            ]);
    }

    /**
     *
     * @Route("/update/{id}", name="app_product_update")
     *
     */
    public function updateAction(Request $request,$id)
    {
        $this->count = 1;

        $m = $this->getDoctrine()->getManager();
        $report = $m->getRepository('AppBundle:Product');

        $p = $report->find($id);

        $form = $this->createForm(ProductType::class, $p);

        return $this->render('Producto/form.html.twig',
            [
                'form' => $form->createView(),
                'action' => $this->generateUrl('app_product_createAction', ['id' => $id])
            ]); //PONER UN GIF DIFERENTE



    }

    /**
     * @Route("/updateAction/{id}", name="app_producto_updateAction")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doUpdateAction(Request $request, $id)
    {
        $this->count = 1;
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

        $this->addFlash('messages','Tu eres tonto o que payaso? cara sardina');

        return $this->render(':Producto:form.html.twig',
            [
                'form' => $form->createView(),
                'action' => $this->generateUrl('app_producto_updateAction', ['id' => $id]),
                'gif' => ''

            ]); // PASAR UN GIF

    }

    /**
     * @Route("/delete/{id}", name="app_product_delete")
     *
     * @ParamConverter(name="producto", class="AppBundle:Product")
     */

    public function deleteAction ($producto) {
        $this->count = 2;
        $m = $this->getDoctrine()->getManager();
        $m->remove($producto);
        $m->flush();

        $this->addFlash('messages', 'Producto eliminao CHAACHO');

        return $this->redirectToRoute('app_producto_index');

    }

    /**
     * @Route("/create", name="app_product_create")
     *
     */

    public function createAction (){
        $this->count = 3;
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
                'action' => $this->generateUrl('app_product_createAction')
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
        $this->count = 3;

        $producto = new Product();
        $form = $this->createForm(ProductType::class, $producto);

        $form->handleRequest($request);

        if ($form -> isValid()){
            $m = $this->getDoctrine()->getManager();
            $m->persist($producto);
            $m->flush();

            $this->addFlash('messages', 'Producto añadido TETE');

            return $this->redirectToRoute('app_producto_index'); //para generar otravez la tabla principal

        }

        $this->addFlash('messages', 'XAVAL! QUE TE HAS "EJIBOJAO"');

        return $this->render('Producto/form.html.twig',
            [
                'for' => $form->createView(),
                'action' => $this->generateUrl('app_product_createAction')

            ]); //PASARLE UN GIF DIFERENTE


    }
}
