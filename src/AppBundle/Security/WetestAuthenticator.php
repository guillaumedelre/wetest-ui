<?php
/**
 * Created by PhpStorm.
 * User: gdelre
 * Date: 23/10/17
 * Time: 16:54
 */

namespace AppBundle\Security;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

class WetestAuthenticator
{
    /**
     * @var Client
     */
    private $client;

    /**
     * WebserviceUserProvider constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $username
     * @param string $password
     * @param bool   $throwOnError
     *
     * @return mixed
     */
    public function authenticate(string $username, string $password, bool $throwOnError = true)
    {
        $response = $this->client->post('/app_dev.php/login_check', [
            RequestOptions::HTTP_ERRORS => $throwOnError,
            RequestOptions::FORM_PARAMS => [
                '_username' => $username,
                '_password' => $password,
            ],
        ]);

        return $this->getData($response);
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

}