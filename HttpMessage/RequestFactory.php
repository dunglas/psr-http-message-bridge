<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bridge\PsrHttpMessage\HttpMessage;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Zend\Diactoros\ServerRequest as DiactorosRequest;
use Zend\Diactoros\UploadedFile as DiactorosUploadedFile;

/**
 * Creates PSR-7 ServerRequest and UploadedFile instances from Symfony Request and UploadedFile.
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class RequestFactory
{
    /**
     * Creates a PSR-7 Request instance from a Symfony one.
     *
     * @param Request $symfonyRequest
     *
     * @return ServerRequestInterface
     */
    public function createRequest(Request $symfonyRequest)
    {
        return new DiactorosRequest(

        );
    }

    /**
     * Creates a PSR-7 UploadedFile instance from a Symfony one.
     *
     * @param UploadedFile $symfonyUploadedFile
     *
     * @return UploadedFileInterface
     */
    public function createUploadedFile(UploadedFile $symfonyUploadedFile)
    {
        return new DiactorosUploadedFile(
            null,
            null,
            null
        );
    }
}
