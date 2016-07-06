<?php
namespace App\Action;

use Psr\Http\Message\ServerRequestInterface;
use Telegram\Http\Client;
use Zend\Diactoros\Response\JsonResponse;
use Base\Action\AbstractAction;

class IndexAction extends AbstractAction
{
    public function getAction(ServerRequestInterface $request)
    {
        $telegram = $this->getContainer()->get(Client::class);
        $telegram->setOptions(['sslverifypeer' => false]);
        $response  = $telegram->getUpdates();
        if ($response->getStatusCode() === 200) {
            return new JsonResponse($response->getBody());
        } else {
            throw new \Exception($response->getBody(), $response->getStatusCode());
        }
    }
}