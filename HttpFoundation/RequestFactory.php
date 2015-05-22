<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bridge\PsrHttpMessage\HttpFoundation;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\UploadedFileInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

/**
 * Creates Symfony Request and UploadedFile instances from PSR-7 ServerRequest and UploadedFile.
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class RequestFactory
{
    /**
     * Creates a Symfony Request instance from a PSR-7 one.
     *
     * @param ServerRequestInterface $psrRequest
     *
     * @return Request
     */
    public function createRequest(ServerRequestInterface $psrRequest)
    {
        $parsedBody = $psrRequest->getParsedBody();
        $request = is_array($parsedBody) ? $parsedBody : array();

        return new Request(
            $psrRequest->getQueryParams(),
            $request,
            $psrRequest->getAttributes(),
            $psrRequest->getCookieParams(),
            $this->getFiles($psrRequest->getUploadedFiles()),
            $psrRequest->getServerParams(),
            $psrRequest->getBody()->__toString()
        );
    }

    /**
     * Converts to the input array to $_FILES structure.
     *
     * @param array $uploadedFiles
     *
     * @return array
     */
    private function getFiles(array $uploadedFiles)
    {
        $files = array();

        foreach ($uploadedFiles as $key => $value) {
            if ($value instanceof UploadedFileInterface) {
                $files[$key] = $this->createUploadedFile($value);
            } else {
                $files[$key] = $this->getFiles($value);
            }
        }

        return $files;
    }

    /**
     * Creates Symfony UploadedFile instance from PSR-7 ones.
     *
     * @param UploadedFileInterface $psrUploadedFile
     *
     * @return UploadedFile
     */
    public function createUploadedFile(UploadedFileInterface $psrUploadedFile)
    {
        $tempnam = $this->getTemporaryPath();
        $psrUploadedFile->moveTo($tempnam);

        $clientFileName = $psrUploadedFile->getClientFilename();

        return new UploadedFile(
            $tempnam,
            null === $clientFileName ? '' : $clientFileName,
            $psrUploadedFile->getClientMediaType(),
            $psrUploadedFile->getSize(),
            $psrUploadedFile->getError(),
            true
        );
    }

    /**
     * Gets a temporary file path.
     *
     * @return string
     */
    protected function getTemporaryPath()
    {
        return tempnam(sys_get_temp_dir(), uniqid('symfony', true));
    }
}
