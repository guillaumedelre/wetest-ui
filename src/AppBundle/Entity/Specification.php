<?php
/**
 * Created by PhpStorm.
 * User: gdelre
 * Date: 23/10/17
 * Time: 16:42
 */

namespace AppBundle\Entity;


use Symfony\Component\Serializer\Annotation\Groups;

class Specification
{
    /**
     * @var string The entity Id
     * @Groups({"specification"})
     */
    protected $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Groups({"specification"})
     */
    protected $title;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Groups({"specification"})
     */
    protected $version;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Groups({"specification"})
     */
    protected $baseUri;

    /**
     * @var string
     * @Groups({"specification"})
     */
    protected $project;

    /**
     * @var array
     * @Groups({"specification"})
     */
    protected $operations;

    /**
     * @var array
     * @Groups({"specification"})
     */
    protected $definitions;

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
     * @return Specification
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
     * @return Specification
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     *
     * @return Specification
     */
    public function setVersion(string $version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return string
     */
    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    /**
     * @param string $baseUri
     *
     * @return Specification
     */
    public function setBaseUri(string $baseUri)
    {
        $this->baseUri = $baseUri;

        return $this;
    }

    /**
     * @return string
     */
    public function getProject(): string
    {
        return $this->project;
    }

    /**
     * @param string $project
     *
     * @return Specification
     */
    public function setProject(string $project)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * @return array
     */
    public function getOperations(): array
    {
        return $this->operations;
    }

    /**
     * @param array $operations
     *
     * @return Specification
     */
    public function setOperations(array $operations)
    {
        $this->operations = $operations;

        return $this;
    }

    /**
     * @return array
     */
    public function getDefinitions(): array
    {
        return $this->definitions;
    }

    /**
     * @param array $definitions
     *
     * @return Specification
     */
    public function setDefinitions(array $definitions)
    {
        $this->definitions = $definitions;

        return $this;
    }

}