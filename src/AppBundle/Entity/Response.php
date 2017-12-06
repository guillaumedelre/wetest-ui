<?php
/**
 * Created by PhpStorm.
 * User: gdelre
 * Date: 23/10/17
 * Time: 16:46
 */

namespace AppBundle\Entity;


use Symfony\Component\Serializer\Annotation\Groups;

class Response
{
    /**
     * @var string The entity Id
     * @Groups({"response"})
     */
    protected $id;

    /**
     * @var Operation
     * @Groups({"response"})
     */
    protected $operation;

    /**
     * @var integer
     * @Assert\NotBlank()
     * @Assert\Type("integer")
     * @Groups({"response"})
     */
    protected $statusCode;

    /**
     * @var string|null
     * @Groups({"response"})
     */
    protected $description = null;

    /**
     * @var array
     * @Groups({"response"})
     */
    protected $jsonSchema = [];

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
     * @return Response
     */
    public function setId(string $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Operation
     */
    public function getOperation(): Operation
    {
        return $this->operation;
    }

    /**
     * @param Operation $operation
     *
     * @return Response
     */
    public function setOperation(Operation $operation)
    {
        $this->operation = $operation;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     *
     * @return Response
     */
    public function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;

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
     * @return Response
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return array
     */
    public function getJsonSchema(): array
    {
        return $this->jsonSchema;
    }

    /**
     * @param array $jsonSchema
     *
     * @return Response
     */
    public function setJsonSchema(array $jsonSchema)
    {
        $this->jsonSchema = $jsonSchema;

        return $this;
    }
}