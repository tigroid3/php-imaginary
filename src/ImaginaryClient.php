<?php

namespace tigroid3\phpimaginary;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use tigroid3\phpimaginary\exceptions\ImaginaryException;

/**
 * Class ImaginaryClient
 * @package tigroid3\phpimaginary
 */
class ImaginaryClient
{
    /** @var string */
    private static $serviceUri = '';
    /**
     * @var string Uploaded uploadFilePath
     */
    private $uploadFilePath = '';

    /**
     * @param string $serviceUri
     * @return \tigroid3\phpimaginary\ImaginaryClient
     */
    public function setServiceUri(string $serviceUri): self
    {
        self::$serviceUri = $serviceUri;

        return $this;
    }

    /**
     * @param string $uploadFilePath
     * @return \tigroid3\phpimaginary\ImaginaryClient
     */
    public function setUploadFilePath(string $uploadFilePath): self
    {
        $this->uploadFilePath = $uploadFilePath;

        return $this;
    }

    /**
     * @param string $method
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \tigroid3\phpimaginary\exceptions\ImaginaryException
     */
    public function send(string $method, array $params = []): ResponseInterface
    {
        if (empty(self::$serviceUri)) {
            throw new ImaginaryException('Service imaginary uri not set');
        }

        $params = [
            'multipart' => [
                [
                    'name' => 'file',
                    'contents' => fopen($this->uploadFilePath, 'r'),
                ],
            ],
            'query' => $params,
        ];

        $client = new Client(['base_uri' => self::$serviceUri]);
        $response = $client->request('POST', $method, $params);

        if ($response->getStatusCode() !== 200) {
            throw new ImaginaryException($response->getStatusCode(), "Service responded error '{$response->getBody()->getContents()}'");
        }

        return $response;
    }
}
