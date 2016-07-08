<?php
namespace App\Action;

use Psr\Http\Message\ServerRequestInterface;
use Telegram\Http\Client;
use Zend\Diactoros\Response\JsonResponse;
use Base\Action\AbstractAction;

class TelegramAction extends AbstractAction
{
    public function getAction(ServerRequestInterface $request)
    {
        $telegram = $this->getContainer()->get(Client::class);
        $telegram->setOptions(['sslverifypeer' => false]);
        $response  = $telegram->getUpdates();

        return new JsonResponse(json_decode($response->getBody()), $response->getStatusCode());
    }
}