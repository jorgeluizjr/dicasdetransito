<?php
namespace App\Action;

use Psr\Http\Message\ServerRequestInterface;
use Telegram\Http\Client;
use Zend\Diactoros\Response\JsonResponse;
use Base\Action\AbstractAction;

class WebhookAction extends AbstractAction
{
    public function getAction(ServerRequestInterface $request)
    {
        $config = $this->getContainer()->get('config');
        if (array_key_exists('telegram', $config) && array_key_exists('webhook_enabled', $config['telegram'])) {
            if ($config['telegram']['webhook'] && is_array($config['telegram']['webhook'])) {
                $telegram = $this->getContainer()->get(Client::class);
                $telegram->setOptions(['sslverifypeer' => false]);
                $response = $telegram->setWebhook($config['telegram']['webhook']);
                return new JsonResponse(json_decode($response->getBody()), $response->getStatusCode());

            }
        }
        return new JsonResponse(['message' => 'Webhooks não habilitado!'], 400);
    }
}