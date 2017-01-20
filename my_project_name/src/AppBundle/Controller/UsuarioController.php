<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UsuarioController extends Controller
{
    /**
     * @Route("/UsuarioBBDD", name="app_anadir_index")
     */
    public function indexAction()
    {
        /*
        $m = $this->getDoctrine()->getManager(); //hay que hacerlo al principio para recuperar
                                                    //el manager

        $user1 = new Usuario();

        $user1
            ->setEmail('user1@gmail.com')
            ->setPassword('123')
            ->setUsername('User1')
        ;

        $m->persist($user1);  // se ha de poner siempre el persist

        $user2 = new Usuario();

        $user2
            ->setEmail('user2@gmail.com')
            ->setPassword('123')
            ->setUsername('User2')
        ;

        $m->persist($user2);

        $user3 = new Usuario();

        $user3
            ->setEmail('user3@gmail.com')
            ->setPassword('123')
            ->setUsername('User3')
        ;

        $m->persist($user3);

        $m->flush(); //insertara en la base de datos

        */

        return $this->render('::Index.html.twig', [
            'titulo' => 'Mi página web',
            'resultado' => '3',  // son variables
        ]);

    }
}
