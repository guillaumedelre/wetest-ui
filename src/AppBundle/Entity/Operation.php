<?php
/**
 * Created by PhpStorm.
 * User: gdelre
 * Date: 23/10/17
 * Time: 16:44
 */

namespace AppBundle\Entity;


use Symfony\Component\Serializer\Annotation\Groups;

class Operation
{
    /**
     * @var string The entity Id
     * @Groups({"operation"})
     */
    protected $id;

    /**
     * @var Specification
     * @Groups({"operation"})
     */
    protected $specification;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Choice({"item", "collection"})
     * @Groups({"operation"})
     */
    protected $type;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Groups({"operation"})
     */
    protected $name;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Groups({"operation"})
     */
    protected $method;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Groups({"operation"})
     */
    protected $uri;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Groups({"operation"})
     */
    protected $resourceName;

    /**
     * @var string|null
     * @Groups({"operation"})
     */
    protected $description = null;

    /**
     * @var array
     * @Groups({"operation"})
     */
    protected $consumeFormats = [];

    /**
     * @var array
     * @Groups({"operation"})
     */
    protected $produceFormats = [];

    /**
     * @var string
     * @Groups({"operation"})
     */
    protected $parameters = '';

    /**
     * @var Response[]|array
     * @Groups({"operation"})
     */
    protected $responses;

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
     * @return Operation
     */
    public function setId(string $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Specification
     */
    public function getSpecification(): Specification
    {
        return $this->specification;
    }

    /**
     * @param Specification $specification
     *
     * @return Operation
     */
    public function setSpecification(Specification $specification)
    {
        $this->specification = $specification;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return Operation
     */
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Operation
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     *
     * @return Operation
     */
    public function setMethod(string $method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     *
     * @return Operation
     */
    public function setUri(string $uri)
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * @return string
     */
    public function getResourceName(): string
    {
        return $this->resourceName;
    }

    /**
     * @param string $resourceName
     *
     * @return Operation
     */
    public function setResourceName(string $resourceName)
    {
        $this->resourceName = $resourceName;

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
     * @return Operation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return array
     */
    public function getConsumeFormats(): array
    {
        return $this->consumeFormats;
    }

    /**
     * @param array $consumeFormats
     *
     * @return Operation
     */
    public function setConsumeFormats(array $consumeFormats)
    {
        $this->consumeFormats = $consumeFormats;

        return $this;
    }

    /**
     * @return array
     */
    public function getProduceFormats(): array
    {
        return $this->produceFormats;
    }

    /**
     * @param array $produceFormats
     *
     * @return Operation
     */
    public function setProduceFormats(array $produceFormats)
    {
        $this->produceFormats = $produceFormats;

        return $this;
    }

    /**
     * @return string
     */
    public function getParameters(): string
    {
        return $this->parameters;
    }

    /**
     * @param string $parameters
     *
     * @return Operation
     */
    public function setParameters(string $parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * @return Response[]|array
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * @param Response[]|array $responses
     *
     * @return Operation
     */
    public function setResponses($responses)
    {
        $this->responses = $responses;

        return $this;
    }
}