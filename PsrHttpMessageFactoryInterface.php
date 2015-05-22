<?php

namespace Symfony\Bridge\PsrHttpMessage;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UploadedFileInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Creates PSR HTTP Request and Response instances from Symfony ones.
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
interface PsrHttpMessageFactoryInterface
{

    public function createRequest(Request $symfonyRequest);


    public function createUploadedFile(UploadedFile $symfonyUploadedFile);


    public function createResponse(Response $symfonyResponse);
}
