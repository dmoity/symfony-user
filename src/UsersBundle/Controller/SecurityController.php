<?php

namespace UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
#use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
#use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class SecurityController extends Controller
{

  public function loginAction(Request $request)
  {
    // Si le visiteur est déjà identifié, on le redirige vers l'accueil
    if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
    //if ($this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
      return $this->redirectToRoute('users_home');
    }

    // Le service authentication_utils permet de récupérer le nom d'utilisateur
    // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide
    // (mauvais mot de passe par exemple)
    $authenticationUtils = $this->get('security.authentication_utils');
    //var_dump($authenticationUtils);

    return $this->render('UsersBundle:Users:login.html.twig', array(
      'last_username' => $authenticationUtils->getLastUsername(),
      'error'         => $authenticationUtils->getLastAuthenticationError(),
    ));
  }
}