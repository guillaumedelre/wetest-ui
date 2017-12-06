<?php
/**
 * Created by PhpStorm.
 * User: gdelre
 * Date: 24/10/17
 * Time: 22:47
 */

namespace AppBundle\Twig;


use AppBundle\Security\User\WebserviceUser;
use AppBundle\Service\Wetest\MyData;

class MyDataExtension extends \Twig_Extension
{
    /**
     * @var MyData
     */
    private $myData;

    /**
     * MyDataExtension constructor.
     *
     * @param MyData $myData
     */
    public function __construct(MyData $myData)
    {
        $this->myData = $myData;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('projects', [$this, 'projects']),
            new \Twig_SimpleFunction('project', [$this, 'project']),
        ];
    }

    /**
     * @param WebserviceUser $user
     *
     * @return \AppBundle\Entity\Project[]
     */
    public function projects(WebserviceUser $user)
    {
        return $this->myData->getProjects($user);
    }

    /**
     * @param string $projectId
     *
     * @return \AppBundle\Entity\Project
     */
    public function project(string $projectId)
    {
        return $this->myData->getProject($projectId);
    }
}