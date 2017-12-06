<?php
/**
 * Created by PhpStorm.
 * User: gdelre
 * Date: 22/10/17
 * Time: 10:06
 */

namespace AppBundle\Security\User;

use AppBundle\Security\WetestAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

class WebserviceUserProvider implements UserProviderInterface
{
    /**
     * @var WetestAuthenticator
     */
    private $authenticator;

    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * @var Session
     */
    private $session;

    /**
     * WebserviceUserProvider constructor.
     *
     * @param WetestAuthenticator   $authenticator
     * @param RequestStack $requestStack
     * @param Session $session
     */
    public function __construct(
        WetestAuthenticator $authenticator,
        RequestStack $requestStack,
        Session $session
    ) {
        $this->authenticator = $authenticator;
        $this->requestStack = $requestStack;
        $this->session = $session;
    }

    /**
     * @param UserInterface $user
     *
     * @return UserInterface
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof WebserviceUser) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * @param string $username
     *
     * @return UserInterface
     */
    public function loadUserByUsername($username)
    {
        $request = $this->requestStack->getCurrentRequest();
        if ('security_login' === $request->attributes->get('_route')
            && Request::METHOD_POST === $request->getRealMethod()
        ) {
            $this->session->set('_username', $request->request->get('_username'));
            $this->session->set('_password', $request->request->get('_password'));
        }

        $_username = $this->session->get('_username');
        $_password = $this->session->get('_password');

        try {
            $userData = $this->authenticator->authenticate($_username, $_password, true);
        } catch (\Exception $e) {
            throw new UsernameNotFoundException(
                sprintf('Username "%s" does not exist.', $username)
            );
        }

        return (new WebserviceUser())
            ->setId($userData['data']['user']['id'])
            ->setToken($userData['token'])
            ->setUsername($userData['data']['user']['username'])
            ->setEmail($_username)
            ->setPassword($_password)
            ->setRoles($userData['data']['roles']);
    }

    /**
     * @param string $class
     *
     * @return bool
     */
    public function supportsClass($class)
    {
        return WebserviceUser::class === $class;
    }
}