<?php
/**
 * Created by PhpStorm.
 * User: gdelre
 * Date: 21/10/17
 * Time: 18:56
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SecurityController
 * @package AppBundle\Controller
 * @Route("/security")
 */
class SecurityController extends Controller
{
    /**
     * @Route("/login", name="security_login")
     */
    public function loginAction(Request $request, AuthenticationUtils $authUtils)
    {
        // if user already logged, redirect on other route
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('app_dashboard_index');
        }

        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('@App/Security/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    /**
     * @Route("/register", name="security_register")
     */
    public function registerAction(Request $request)
    {
        return $this->render('@App/Security/register.html.twig', [
            'error' => null,
        ]);
    }

    /**
     * @Route("/forgotten-password", name="security_forgotten_password")
     */
    public function forgottenPasswordAction(Request $request)
    {
        return $this->render('@App/Security/forgotten-password.html.twig', [
            'error' => null,
        ]);
    }
}