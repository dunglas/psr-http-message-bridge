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

use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Response;
use Zend\Diactoros\Response as DiactorosResponse;

/**
 * Creates PSR-7 Response instances from Symfony Response.
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class ResponseFactory
{
    /**
     * Creates a PSR-7 Response instance from a Symfony one.
     *
     * @param Response $symfonyResponse
     *
     * @return ResponseInterface
     */
    public function createResponse(Response $symfonyResponse)
    {
        return new DiactorosResponse(

        );
    }
}
