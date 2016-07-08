<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\ZendRouter::class,
            App\Action\PingAction::class => App\Action\PingAction::class,
            App\Action\HomePageAction::class => App\Action\HomePage::class,
        ],
        'factories' => [
            App\Action\TelegramAction::class => App\Factory\TelegramFactory::class,
            App\Action\WebhookAction::class => App\Factory\WebhookFactory::class,
        ],
    ],

    'routes' => [
        [
            'name' => 'home',
            'path' => '/',
            'middleware' => App\Action\HomePageAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.ping',
            'path' => '/api/ping',
            'middleware' => App\Action\PingAction::class,
            'allowed_methods' => ['GET'],
        ],
        [
            'name' => 'api.telegram',
            'path' => '/api/telegram',
            'middleware' => App\Action\TelegramAction::class,
            'allowed_methods' => ['GET', 'POST'],
        ],
        [
            'name' => 'api.webhooks',
            'path' => '/api/telegram/webhook',
            'middleware' => App\Action\WebhookAction::class,
            'allowed_methods' => ['GET'],
        ],
    ],
];
