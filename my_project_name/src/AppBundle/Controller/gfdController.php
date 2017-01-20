<?php

namespace AppBundle\Controller;

use AppBundle\Entity\gfd;
use AppBundle\Form\gfdType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Validator\Constraints\DateTime;

class gfdController extends Controller
{

    /**
     * @Route("/", name="app_gfd_index")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function indexAction()
    {
        $sesion = new Session();
        $gifRedirect = $sesion->get('gif'); //pasarle el gif

        $m = $this->getDoctrine()->getManager();
        $report = $m->getRepository('AppBundle:gfd');
        $gfd = $report->findAll();


        return $this->render('gfd/index.html.twig',
            [
                'gfds' => $gfd,
                'gif' => $gifRedirect

            ]);
    }

    /**
     * @Route("/create", name="app_gfd_create")
     *
     */

    public function createAction (){

        $gfd = new gfd();
        $form = $this->createForm(gfdType::class, $gfd);

        return $this->render('gfd/form.html.twig',
            [
                'form' => $form->createView(),
                'action' => $this->generateUrl('app_gfd_createAction'),
                'gif' => ''
            ]
        );
    }

    /**
     * @Route("/createAction/", name="app_gfd_createAction")
     *
     */

    public function doCreateAction (Request $request){

        $sesion = new Session();
        $sesion->set('gif','img/putoAmo6.gif');

        $gfd = new gfd();
        $form = $this->createForm(gfdType::class, $gfd);
        $form->handleRequest($request);

        if ($form -> isValid()){
            $m = $this->getDoctrine()->getManager();
            $m->persist($gfd);
            $m->flush();

            $this->addFlash('messages', 'Añadido correctamente');

            return $this->redirectToRoute('app_gfd_index');
        }

        $this->addFlash('messages', 'Error');

        return $this->render('gfd/form.html.twig',
            [
                'form' => $form->createView(),
                'action' => $this->generateUrl('app_gfd_createAction'),
                'gif' => 'img/putoAmo7.gif'
            ]);
    }

    /**
     *
     * @Route("/update/{id}", name="app_gfd_update")
     *
     */
    public function updateAction(Request $request,$id)
    {
        $sesion = new Session();
        $sesion->set('gif','img/putoAmo3.gif');

        $m = $this->getDoctrine()->getManager();
        $report = $m->getRepository('AppBundle:gfd');
        $gfd = $report->find($id);

        $form = $this->createForm(gfdType::class, $gfd);

        return $this->render('gfd/form.html.twig',
            [
                'form' => $form->createView(),
                'action' => $this->generateUrl('app_gfd_updateAction', ['id' => $id]),
                'gif' => ''
            ]);
    }

    /**
     * @Route("/updateAction/{id}", name="app_gfd_updateAction")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function doUpdateAction(Request $request, $id)
    {

        $m = $this->getDoctrine()->getManager();
        $report = $m->getRepository('AppBundle:Product');
        $gfd = $report->find($id);

        $form = $this->createForm(gfdType::class, $gfd);

        $form->handleRequest($request);

        if ($form->isValid()){
            $m->flush();
            $this->addFlash('messages', 'Update correcto');
            return $this->redirectToRoute('app_gfd_index');
        }

        $this->addFlash('messages','Error Update');

        return $this->render('gfd/form.html.twig',
            [
                'form' => $form->createView(),
                'action' => $this->generateUrl('app_gfd_updateAction', ['id' => $id]),
                'gif' => 'img/putoAmo5.gif'

            ]);
    }

    /**
     * @Route("/delete/{id}", name="app_gfd_delete")
     *
     * @ParamConverter(name="gfd", class="AppBundle:gfd")
     */

    public function deleteAction ($gfd) {

        $sesion = new Session();
        $sesion->set('gif','img/putoAmo2.gif');

        $m = $this->getDoctrine()->getManager();
        $m->remove($gfd); // $gfd = id, lo transformamos "@ParamConverter"
        $m->flush();

        $this->addFlash('messages', 'Eliminado correctamente');

        return $this->redirectToRoute('app_gfd_index');

    }
}
