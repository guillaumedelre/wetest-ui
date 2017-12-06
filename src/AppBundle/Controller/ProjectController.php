<?php

namespace AppBundle\Controller;

use AppBundle\Service\Wetest\MyData;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ProjectController
 * @package AppBundle\Controller
 * @Route("/wetest-project")
 */
class ProjectController extends Controller
{
    /**
     * @Security(expression="is_granted('ROLE_USER')")
     * @Route("/{projectId}", name="app_project_index")
     */
    public function indexAction(string $projectId)
    {
        return $this->render(
            'AppBundle:Project:index.html.twig',
            [
                'project' => $this->get(MyData::class)->getProject($projectId)
            ]
        );
    }
}
