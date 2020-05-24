<?php

namespace tigroid3\phpimaginary;

use Psr\Http\Message\ResponseInterface;
use tigroid3\phpimaginary\exceptions\ImaginaryException;

/**
 * Full list methods and params in documentation
 * https://github.com/h2non/imaginary
 *
 * Class Imaginary
 * @package common\components\imageCropper
 */
class Imaginary
{
    public const FORMAT_JPEG = 'jpeg';
    public const FORMAT_PNG = 'png';
    public const FORMAT_WEBP = 'webp';

    /**
     * @var string Uploaded uploadFilePath
     */
    private $uploadFilePath = '';
    /**
     * @var array
     */
    private $operations = [];

    /**
     * @return \tigroid3\phpimaginary\Imaginary
     */
    public static function new(): self
    {
        return new self();
    }

    /**
     * @param string $uploadFilePath
     * @return \tigroid3\phpimaginary\Imaginary
     */
    public function setUploadFilePath(string $uploadFilePath): self
    {
        $this->uploadFilePath = $uploadFilePath;

        return $this;
    }


    /**
     * @param string $operation
     * @param array $params
     * @return \tigroid3\phpimaginary\Imaginary
     */
    public function addOperation(string $operation, array $params = []): self
    {
        $this->operations[] = [
            'operation' => $operation,
            'params' => $params
        ];

        return $this;
    }

    /**
     * https://github.com/h2non/imaginary#get--post-crop
     * @param int $width
     * @param int $height
     * @param array $params
     * @return \tigroid3\phpimaginary\Imaginary
     */
    public function crop(int $width, int $height, array $params = []): self
    {
        $requiredParams = [
            'width' => $width,
            'height' => $height,
        ];

        $this->addOperation('crop', array_merge($requiredParams, $params));

        return $this;
    }

    /**
     * https://github.com/h2non/imaginary#get--post-smartcrop
     * @param int $width
     * @param int $height
     * @param array $params
     * @return \tigroid3\phpimaginary\Imaginary
     */
    public function smartCrop(int $width, int $height, array $params = []): self
    {
        $requiredParams = [
            'width' => $width,
            'height' => $height,
        ];

        $this->addOperation('smartcrop', array_merge($requiredParams, $params));

        return $this;
    }

    /**
     * https://github.com/h2non/imaginary#get--post-resize
     * @param int $width
     * @param int $height
     * @param array $params
     * @return \tigroid3\phpimaginary\Imaginary
     */
    public function resize(int $width, int $height, array $params = []): self
    {
        $requiredParams = [
            'width' => $width,
            'height' => $height,
        ];

        $this->addOperation('resize', array_merge($requiredParams, $params));

        return $this;
    }

    /**
     * https://github.com/h2non/imaginary#get--post-enlarge
     * @param int $width
     * @param int $height
     * @param array $params
     * @return \tigroid3\phpimaginary\Imaginary
     */
    public function enlarge(int $width, int $height, array $params = []): self
    {
        $requiredParams = [
            'width' => $width,
            'height' => $height,
        ];

        $this->addOperation('enlarge', array_merge($requiredParams, $params));

        return $this;
    }

    /**
     * https://github.com/h2non/imaginary#get--post-extract
     * @param int $top
     * @param int $left
     * @param int $areaWidth
     * @param int $areaHeight
     * @param array $params
     * @return \tigroid3\phpimaginary\Imaginary
     */
    public function extract(int $top, int $left, int $areaWidth, int $areaHeight, $params = []): self
    {
        $requiredParams = [
            'top' => $top,
            'left' => $left,
            'areawidth' => $areaWidth,
            'areaheight' => $areaHeight,
        ];

        $this->addOperation('extract', array_merge($requiredParams, $params));

        return $this;
    }

    /**
     * https://github.com/h2non/imaginary#get--post-zoom
     * @param int $factor
     * @param array $params
     * @return \tigroid3\phpimaginary\Imaginary
     */
    public function zoom(int $factor, $params = []): self
    {
        $requiredParams = [
            'factor' => $factor,
        ];

        $this->addOperation('zoom', array_merge($requiredParams, $params));

        return $this;
    }

    /**
     * https://github.com/h2non/imaginary#get--post-thumbnail
     * @param int $width
     * @param int $height
     * @param array $params
     * @return \tigroid3\phpimaginary\Imaginary
     */
    public function thumbnail(int $width, int $height, array $params = []): self
    {
        $requiredParams = [
            'width' => $width,
            'height' => $height,
        ];

        $this->addOperation('thumbnail', array_merge($requiredParams, $params));

        return $this;
    }

    /**
     * https://github.com/h2non/imaginary#get--post-fit
     * @param int $width
     * @param int $height
     * @param array $params
     * @return \tigroid3\phpimaginary\Imaginary
     */
    public function fit(int $width, int $height, array $params = []): self
    {
        $requiredParams = [
            'width' => $width,
            'height' => $height,
        ];

        $this->addOperation('fit', array_merge($requiredParams, $params));

        return $this;
    }

    /**
     * https://github.com/h2non/imaginary#get--post-rotate
     * @param int $deg
     * @param array $params
     * @return \tigroid3\phpimaginary\Imaginary
     */
    public function rotate(int $deg, array $params = []): self
    {
        $requiredParams = [
            'rotate' => $deg,
        ];

        $this->addOperation('rotate', array_merge($requiredParams, $params));

        return $this;
    }

    /**
     * https://github.com/h2non/imaginary#get--post-flip
     * @param int $width
     * @param int $height
     * @param array $params
     * @return \tigroid3\phpimaginary\Imaginary
     */
    public function flip(int $width, int $height, array $params = []): self
    {
        $requiredParams = [
            'width' => $width,
            'height' => $height,
        ];

        $this->addOperation('flip', array_merge($requiredParams, $params));

        return $this;
    }

    /**
     * https://github.com/h2non/imaginary#get--post-flop
     * @param int $width
     * @param int $height
     * @param array $params
     * @return \tigroid3\phpimaginary\Imaginary
     */
    public function flop(int $width, int $height, array $params = []): self
    {
        $requiredParams = [
            'width' => $width,
            'height' => $height,
        ];

        $this->addOperation('flop', array_merge($requiredParams, $params));

        return $this;
    }

    /**
     * https://github.com/h2non/imaginary#get--post-convert
     * @param string $type
     * @param array $params
     * @return \tigroid3\phpimaginary\Imaginary
     */
    public function convert(string $type, array $params = []): self
    {
        $requiredParams = [
            'type' => $type,
        ];

        $this->addOperation('convert', array_merge($requiredParams, $params));

        return $this;
    }

    /**
     * https://github.com/h2non/imaginary#get--post-watermark
     * @param string $text
     * @param array $params
     * @return \tigroid3\phpimaginary\Imaginary
     */
    public function watermark(string $text, array $params = []): self
    {
        $requiredParams = [
            'text' => $text,
        ];

        $this->addOperation('watermark', array_merge($requiredParams, $params));

        return $this;
    }

    /**
     * https://github.com/h2non/imaginary#get--post-watermarkimage
     * @param string $image Url watermark, NOT PATH
     * @param int $top
     * @param int $left
     * @param array $params
     * @return \tigroid3\phpimaginary\Imaginary
     */
    public function watermarkImage(string $image, int $top, int $left, array $params = []): self
    {
        $requiredParams = [
            'image' => $image,
            'top' => $top,
            'left' => $left,
        ];

        $this->addOperation('watermarkImage', array_merge($requiredParams, $params));

        return $this;
    }

    /**
     * https://github.com/h2non/imaginary#get--post-blur
     * @param float $sigma
     * @param array $params
     * @return \tigroid3\phpimaginary\Imaginary
     */
    public function blur(float $sigma, array $params = []): self
    {
        $requiredParams = [
            'sigma' => $sigma,
        ];

        $this->addOperation('blur', array_merge($requiredParams, $params));

        return $this;
    }

    /**
     * @return \tigroid3\phpimaginary\ImaginaryResource
     * @throws \tigroid3\phpimaginary\exceptions\ImaginaryException
     */
    public function execute(): ImaginaryResource
    {
        $responseImage = $this->sendQuery('pipeline')->getBody()->getContents();

        return new ImaginaryResource($responseImage);
    }

    /**
     * https://github.com/h2non/imaginary#get--post-info
     * @return array
     * @throws \tigroid3\phpimaginary\exceptions\ImaginaryException
     */
    public function info(): array
    {
        $response = $this->sendQuery('info')->getBody()->getContents();

        return json_decode($response, true);
    }

    /**
     * @param string $method
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \tigroid3\phpimaginary\exceptions\ImaginaryException
     */
    private function sendQuery(string $method): ResponseInterface
    {
        if (!is_file($this->uploadFilePath)) {
            throw new ImaginaryException('Upload file not exists');
        }

        $client = new ImaginaryClient();
        $client->setUploadFilePath($this->uploadFilePath);

        return $client->send($method, ['operations' => json_encode($this->operations)]);
    }
}
