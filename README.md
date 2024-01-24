# API encurtador de URL's.

API feita em **Laravel** e **PHP**.

# Requisitos

Para conseguir executar a aplicação, será necessário a instalação do composer e do PHP.
Para a instalação do composer, basta seguir o passo a passo descrito nesse link -> `https://getcomposer.org/download/`. Após realizar a instalação do composer, será necessário colocá-lo nas variáveis de ambiente. Procure pela pasta `/bin` na pasta de instalação do composer e coloque-o no Path do sistema. Exemplo: `C:\ProgramData\ComposerSetup\bin`.

Para instalar o PHP, instale o arquivo zip listado nesse link <a href="https://windows.php.net/download#php-8.3">instalação do PHP</a>. Todas as configurações de variáveis de ambiente irão se repetir para a utilização do PHP.

# Instalação e execução do projeto

## Dependências globais

Clone o repositório e rode o comando `composer install` na pasta raiz do projeto.

## Execução da aplicação

Após a instalar todas as dependências, basta rodar o comando `php artisan serve` para iniciar a aplicação.
A porta de execução pode ser mudada. Basta passar a flag `--port=8080`, por exemplo, e a aplicação será executa na porta 8080.

Observações:

-   Para finalizar a execução da aplicação, basta utilizar as telcas `CTRL+C` dentro da pasta raiz do projeto.

## Rotas da aplicação

A aplicação possui apenas um controller. Esse controller é responsável por retornar todos as URL's, criar novas URL's e retornar a URL original para a interface redirecionar o usuário.

1. Método "getAllLink"

-   Esse método retorna todas as URL's com seus respectivos encurtamentos.

2. Método "createURLHash"

-   Esse método é responsável por encurtar uma URL. Esse método recebe, via corpo da requisição, uma URL normal e a encurta com base na geração de uma string aleatória (método Str::random()).

-   Após isso, a URL original, juntamente com seu encurtamento, serão salvos no banco de dados. O encurtamento da URL será retornado para o front_end onde o usuário terá a opção de ser redirecionado.

3. Método "redirectToOriginalURL"

-   Esse método é responsável por fazer o redicionamento do usuário usando como base a URL encurtada. Esse método é executado no botão "Redirecionar" que está dentro do formulário de encurtamento de URL no Front_End.
