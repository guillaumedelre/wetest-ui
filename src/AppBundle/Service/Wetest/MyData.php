<?php
/**
 * Created by PhpStorm.
 * User: gdelre
 * Date: 24/10/17
 * Time: 22:38
 */

namespace AppBundle\Service\Wetest;


use AppBundle\Domain\Headers;
use AppBundle\Entity\Project;
use AppBundle\Entity\Specification;
use AppBundle\Security\User\WebserviceUser;
use GuzzleHttp\RequestOptions;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class MyData
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var ApiManager
     */
    private $apiManager;

    /**
     * MyData constructor.
     *
     * @param TokenStorageInterface $tokenStorage
     * @param ApiManager            $apiManager
     */
    public function __construct(TokenStorageInterface $tokenStorage, ApiManager $apiManager)
    {
        $this->tokenStorage = $tokenStorage;
        $this->apiManager = $apiManager;
    }

    /**
     * @return WebserviceUser
     */
    private function getUser(): WebserviceUser
    {
        static $user = null;

        if (null === $user) {
            /** @var WebserviceUser $user */
            $user = $this->tokenStorage->getToken()->getUser();
        }

        return $user;
    }

    /**
     * @param WebserviceUser|null $user
     *
     * @return Project[]
     */
    public function getProjects(WebserviceUser $user = null)
    {
        $projectUser = $user ?? $this->getUser();

        if (null === $projectUser) {
            throw new \InvalidArgumentException('No user available.');
        }

        $options = [
            RequestOptions::QUERY   => ['user' => $projectUser->getId()],
            RequestOptions::HEADERS => [
                Headers::AUTHORIZATION => "Bearer {$projectUser->getToken()}",
                Headers::ACCEPT        => "application/json",
            ],
        ];

        return $this->apiManager->getProjects($options);
    }

    /**
     * @param string              $id
     * @param WebserviceUser|null $user
     *
     * @return Project
     */
    public function getProject(string $id, WebserviceUser $user = null)
    {
        $projectUser = $user ?? $this->getUser();

        if (null === $projectUser) {
            throw new \InvalidArgumentException('No user available.');
        }

        $options = [
            RequestOptions::HEADERS => [
                Headers::AUTHORIZATION => "Bearer {$projectUser->getToken()}",
                Headers::ACCEPT        => "application/json",
            ],
        ];

        return $this->apiManager->getProject($id, $options);
    }

    /**
     * @param string $project
     *
     * @return Specification[]
     */
    public function getSpecifications(string $project)
    {
        $options = [
            RequestOptions::QUERY   => ['project' => $project],
            RequestOptions::HEADERS => [
                Headers::AUTHORIZATION => "Bearer {$this->getUser()->getToken()}",
                Headers::ACCEPT        => "application/json",
            ],
        ];

        return $this->apiManager->getSpecifications($options);
    }
}