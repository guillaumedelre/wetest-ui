<?php
/**
 * Created by PhpStorm.
 * User: gdelre
 * Date: 23/10/17
 * Time: 16:47
 */

namespace AppBundle\Entity;


use Symfony\Component\Serializer\Annotation\Groups;

class Definition
{
    /**
     * @var string The entity Id
     * @Groups({"definition"})
     */
    protected $id;

    /**
     * @var Specification
     * @Groups({"definition"})
     */
    protected $specification;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Groups({"definition"})
     */
    protected $name;

    /**
     * @var array
     * @Assert\NotBlank()
     * @Groups({"definition"})
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
     * @return Definition
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
     * @return Definition
     */
    public function setSpecification(Specification $specification)
    {
        $this->specification = $specification;

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
     * @return Definition
     */
    public function setName(string $name)
    {
        $this->name = $name;

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
     * @return Definition
     */
    public function setJsonSchema(array $jsonSchema = [])
    {
        $this->jsonSchema = $jsonSchema;

        return $this;
    }

}