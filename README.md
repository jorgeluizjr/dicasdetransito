# dicasdetransito
Dicas de Trânsito é uma api que interage com o bot do telegram @DicasDeTransitoBot

###Dependências
 - PHP 7
 - [Composer](https://getcomposer.org/)
 - Micro framework [Zend-Expressive](https://zendframework.github.io/zend-expressive/)
 - [Telegram](https://github.com/jorgeluizjr/telegram) para consumir os dados da API do Telegram
 
###Como utilizar
 - Clonar o repositório
 - Executar o composer
 - Copiar o arquivo e retirar o ".dist" do arquivo "telegram-api.local.php.dist" localizado em "vendor/jorgeluizjr/config/" para o diretório "config/autoload"
 - Inserir o token do seu Bot criado no telegram [Como criar um bot](https://core.telegram.org/bots)
 <pre><code>
     "telegram" => [
         "token" => 'insira seu token aqui'
     ]
     </code></pre>
 - Ativar o webhook"
 <pre><code>
    "telegram" => [
        "webhook_enabled" => true
    ]
    </code></pre>
 - Registar o webhook "http://seudominio.com.br/api/telegram/webhook"
