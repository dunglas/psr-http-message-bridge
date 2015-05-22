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

use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Creates Symfony Response instances from PSR-7 Response.
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class ResponseFactory
{

    /**
     * Creates a Symfony Response instance from a PSR-7 one.
     *
     * @param ResponseInterface $psrResponse
     *
     * @return Response
     */
    public function createResponse(ResponseInterface $psrResponse)
    {
        return new Response(

        );
    }
}
