<?php
/**
 * Created by PhpStorm.
 * User: gdelre
 * Date: 23/10/17
 * Time: 13:32
 */

namespace AppBundle\Entity;

use Symfony\Component\Serializer\Annotation\Groups;

class Project
{
    /**
     * @var string The entity Id
     * @Groups({"project"})
     */
    protected $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Groups({"project"})
     */
    protected $title;

    /**
     * @var string|null
     * @Groups({"project"})
     */
    protected $description = null;

    /**
     * @var array
     * @Groups({"project"})
     */
    protected $specifications;

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
     * @return Project
     */
    public function setId(string $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Project
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     *
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return array
     */
    public function getSpecifications(): array
    {
        return $this->specifications;
    }

    /**
     * @param array $specifications
     *
     * @return Project
     */
    public function setSpecifications(array $specifications)
    {
        $this->specifications = $specifications;

        return $this;
    }

}