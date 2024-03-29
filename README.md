# API encurtador de URL's.

API feita em **Laravel** e **PHP**.

# Requisitos

Para conseguir executar a aplicação, será necessário a instalação do composer e do PHP.
Para a instalação do composer, basta seguir o passo a passo descrito nesse link <a href="https://getcomposer.org/download/">instalação do composer</a>. Após realizar a instalação do composer, será necessário colocá-lo nas variáveis de ambiente. Procure pela pasta `/bin` na pasta de instalação do composer e coloque-o no Path do sistema. Exemplo: `C:\ProgramData\ComposerSetup\bin`.

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

-   Após isso, a URL original, juntamente com seu encurtamento, serão salvos no banco de dados. O encurtamento da URL será retornado para o front end onde o usuário terá a opção de ser redirecionado.

3. Método "redirectToOriginalURL"

-   Esse método é responsável por fazer o redicionamento do usuário usando como base a URL encurtada. Esse método é executado no botão "Redirecionar" que está dentro do formulário de encurtamento de URL no front end.

4. Método "incrementCountClicks"

Esse método é responsável por alterar a quantidade de click's nos link's curtos que existem no front end. Vamos apenas filtrar o elemento no banco de dados com base no hash que será enviado pelo corpo da requisição e incrementar "click+1".

## Migrações e banco de dados

Teremos apenas uma tabela na aplicação. Essa tabela terá as colunas de id, original_url, hash, created_at e updated_at (essas duas últimas são criadas por padrão pelo Laravel).

Para criar a base de dados, basta executar a migration com o comando `php artisan migrate`. Todas as migrações criadas serão executadas por esse comando.

O sistema está usando o SQLite como banco de dados em memória.

Mais informações na <a href="https://laravel.com/docs/10.x/migrations#introduction">documentação do Laravel</a>.
