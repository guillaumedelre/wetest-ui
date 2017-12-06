<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DashboardController
 * @package AppBundle\Controller
 * @Route("/wetest-dashboard")
 */
class DashboardController extends Controller
{
    /**
     * @Security(expression="is_granted('ROLE_USER')")
     * @Route("/", name="app_dashboard_index")
     */
    public function indexAction()
    {
        return $this->render(
            'AppBundle:Dashboard:index.html.twig',
            []
        );
    }
}
