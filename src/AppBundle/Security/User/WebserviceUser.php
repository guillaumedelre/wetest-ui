<?php
/**
 * Created by PhpStorm.
 * User: gdelre
 * Date: 22/10/17
 * Time: 09:56
 */

namespace AppBundle\Security\User;

use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

class WebserviceUser implements UserInterface, EquatableInterface
{
    /**
     * @var string
     * @Groups({"user"})
     */
    protected $id;

    /**
     * @var array
     * @Groups({"user"})
     */
    protected $roles;

    /**
     * @var string
     * @Groups({"user"})
     */
    protected $email;

    /**
     * @var string
     * @Groups({"user"})
     */
    protected $password;

    /**
     * @var string
     * @Groups({"user"})
     */
    protected $fullname;

    /**
     * @var string
     * @Groups({"user"})
     */
    protected $username;

    /**
     * @var string
     * @Groups({"user"})
     */
    protected $token;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return WebserviceUser
     */
    public function setId(string $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     *
     * @return WebserviceUser
     */
    public function setRoles(array $roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return WebserviceUser
     */
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullname(): string
    {
        return $this->fullname;
    }

    /**
     * @param string $fullname
     *
     * @return WebserviceUser
     */
    public function setFullname(string $fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return WebserviceUser
     */
    public function setUsername(string $username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return WebserviceUser
     */
    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     *
     * @return WebserviceUser
     */
    public function setToken(string $token)
    {
        $this->token = $token;

        return $this;
    }

    public function getSalt()
    {
    }

    /**
     * @param UserInterface $user
     *
     * @return bool
     */
    public function isEqualTo(UserInterface $user): bool
    {
        if (!$user instanceof WebserviceUser ) {
            return false;
        }

        if ($this->email !== $user->getEmail()) {
            return false;
        }

        if ($this->username !== $user->getUsername()) {
            return false;
        }

        return true;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

}