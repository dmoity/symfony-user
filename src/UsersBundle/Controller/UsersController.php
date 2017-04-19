<?php

namespace UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsersController extends Controller
{
    public function indexAction()
    {
        // Si le visiteur est déjà identifié, on le redirige vers l'accueil
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
          return $this->redirectToRoute('users_home');
        }
        return $this->render('UsersBundle:Users:login.html.twig');
    }

    public function homeAction()
    {
        return $this->render('UsersBundle:Users:home.html.twig');
    }
}
