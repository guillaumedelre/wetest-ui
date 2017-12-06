<?php
/**
 * Created by PhpStorm.
 * User: gdelre
 * Date: 21/10/17
 * Time: 17:37
 */

namespace AppBundle\Service\Wetest;

use AppBundle\Entity\Project;
use AppBundle\Entity\Specification;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;

class ApiManager
{
    use DenormalizerAwareTrait;

    /**
     * @var Client
     */
    private $client;

    /**
     * ApiManager constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $options
     *
     * @return Project[]
     */
    public function getProjects(array $options = []): array
    {
        $response = $this->client->get('/app_dev.php/api/projects', $options);

        return $this->denormalizer->denormalize($this->getData($response), Project::class . '[]');
    }

    /**
     * @param string $id
     * @param array  $options
     *
     * @return Project
     */
    public function getProject(string $id, array $options = []): Project
    {
        $response = $this->client->get("/app_dev.php/api/projects/$id", $options);

        return $this->denormalizer->denormalize($this->getData($response), Project::class);
    }

    /**
     * @param ResponseInterface $response
     *
     * @return bool
     */
    private function isSuccessful(ResponseInterface $response): bool
    {
        return Response::HTTP_OK >= $response->getStatusCode()
            && Response::HTTP_BAD_REQUEST > $response->getStatusCode();
    }

    /**
     * @param ResponseInterface $response
     *
     * @return mixed
     */
    private function getData(ResponseInterface $response)
    {
        return \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @param array $options
     *
     * @return Specification[]
     */
    public function getSpecifications(array $options = [])
    {
        $response = $this->client->get('/app_dev.php/api/specifications', $options);

        return $this->isSuccessful($response)
            ? $this->denormalizer->denormalize(
                $this->getData($response),
                Specification::class . '[]')
            : [];
    }
}