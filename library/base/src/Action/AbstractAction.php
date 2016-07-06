<?php
/**
 * Created by PhpStorm.
 * User: junior
 * Date: 06/07/16
 * Time: 16:53
 */

namespace Base\Action;

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Base\Container\ContainerTrait;
use Zend\Diactoros\Response\JsonResponse;

abstract class AbstractAction
{
    use ContainerTrait;

    const HTTP_METHOD_GET = 'GET';
    const HTTP_METHOD_POST = 'POST';
    const HTTP_METHOD_DELETE = 'DELETE';
    const HTTP_METHOD_PATCH = 'PATCH';

    public function __construct(ContainerInterface $container)
    {
        $this->setContainer($container);
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        try {
            $return = null;
            switch ($request->getMethod()) {
                case self::HTTP_METHOD_GET :
                    $return =  $this->getAction($request);
                    break;
                case self::HTTP_METHOD_POST :
                    $return = $this->postAction($request);
                    break;
                case self::HTTP_METHOD_DELETE :
                    $return = $this->deleteAction($request);
                    break;
                case self::HTTP_METHOD_PATCH :
                    $return = $this->patchAction($request);
                    break;
                default :
                    return new JsonResponse(["method" => $request->getMethod(), "message" => "Metodo não permitido"], 405);
            }

            if (!$return instanceof JsonResponse)
                $return = new JsonResponse($return);

            return $return;
        } catch (\Exception $exception) {
            return new JsonResponse(['message' => $exception->getMessage(), 'code' => $exception->getCode()], 417);
        }

    }

    public function getAction()
    {
        return new JsonResponse(["method" => "GET", "message" => "Metodo não implementado!"], 405);
    }

    public function postAction()
    {
        return new JsonResponse(["method" => "POST", "message" => "Metodo não implementado!"], 405);
    }

    public function deleteAction()
    {
        return new JsonResponse(["method" => "DELETE", "message" => "Metodo não implementado!"], 405);
    }

    public function patchAction()
    {
        return new JsonResponse(["method" => "PATCH", "message" => "Metodo não implementado!"], 405);
    }

    public function optionsAction()
    {
        return new JsonResponse(["method" => "OPTIONS", "message" => "Metodo não implementado!"], 405);
    }
}