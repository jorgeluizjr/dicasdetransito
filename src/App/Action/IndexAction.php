<?php
namespace App\Action;

use Telegram\Http\Client;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Base\Action\AbstractAction;

class IndexAction extends  AbstractAction
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $telegram = $this->getContainer()->get(Client::class);
        $telegram->setOptions(['sslverifypeer' => false]);
        $response  = $telegram->getUpdates();
        if ($response->getStatusCode() === 200) {
            $updates = json_decode($response->getBody())->result;
            var_dump($updates);exit;
            foreach ($updates as $update) {
                $telegram->sendMessage(['chat_id' => $update->message->chat->id, 'text' => "Hello " . $update->message->from->first_name]);
                var_dump($telegram->send()->getBody());exit;
            }
        } else {
            return new JsonResponse(['msg' => 'Error agora!']);
        }
    }
}