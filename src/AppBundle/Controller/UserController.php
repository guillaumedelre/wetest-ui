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

/**
 * Class UserController
 * @package AppBundle\Controller
 * @Route("/wetest-user")
 */
class UserController extends Controller
{
    /**
     * @Route("/profile", name="user_profile")
     */
    public function profileAction(Request $request)
    {
        return $this->render('@App/User/profile.html.twig', []);
    }

    /**
     * @Route("/lock", name="user_lock")
     */
    public function lockAction(Request $request)
    {
        return $this->render('@App/User/lock.html.twig', []);
    }

}