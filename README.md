# WeeHelp - Sistema de Chamados

![alt text](https://i.imgur.com/wkOEzlZ.png)

## Requisitos para rodar
Laravel 6.0 + <br>
PHP 7.2 + <br>
Composer <br>
Banco de dados SQL

## Instalação do projeto

1. Clonar o projeto;

2. Criar e configurar um novo arquivo .env a partir do .env.example com os dados do banco;

3. Na pasta raiz do projeto, executar em sequência: 

``` 
composer install
php artisan migrate --seed 
php artisan key:generate
php artisan storage:link

```

4. Após este procedimento, ir para "Área de trabalho" ou outro destino que não seja a raiz do projeto e clonar o repositório:
```
git clone https://repositorio.faers.com.br/herickwilke/vendor
```

5. Copiar a pasta clonada chamada "vendor" para a pasta raíz do trabalho. Confirmar para *substituir* os arquivos.

<br>

## Executar o projeto:

- Rodar o comando na raiz do projeto:

```
php artisan serve
```

O mesmo estará rodando no seu http://localhost:8000.

## Fazer login: 
Usuário: admin@admin.com <br>
Senha: password 

<br>


## API REST

<p> Foram criadas rotas e controladores capazes de efetuar ações para qualquer CRUD do sistema, utilizando o Laravel Resources.
É necessário instalar o Laravel Passport, que providenciará um token para cada usuário poder se autenticar e trocar informações. <br><br>
Vamos instalar o Laravel Passport:

```
php artisan passport:install
```

<p>Ele retornará um código como este:

```
Encryption keys generated successfully.
Personal access client created successfully.
Client ID: 1
Client secret: KAY4k312yebafievTzWNQWuY4nUEDfvAqFRSQo0b
Password grant client created successfully.
Client ID: 2
Client secret: 1OSbOGyJsXgA1QlbCzL3cPv7LhJAUZuTcIRSbKmm
``` 
<p>(O código acima é um exemplo. Cada nova instalação e perfil recebe um hash aleatório)<br>
<p>No banco de dados, foi criada uma tabela chamada "oauth_clients", onde ficam essas informações.<br>
<p>Estas credenciais serão usadas para mandar uma requisição POST para o sistema de autenticação retornar o token que vamos utilizar para comunicar com a API.
<br><br>

1. Para pegar o token de acesso, execute sua ferramenta de requisição favorita (Postman, Insomnia.. etc);
2. Configure-a para fazer exatamente a seguinte requisição POST, passando os parâmetros no BODY (multipart):

```
grant_type : password
client_id : 2
client_secret : (aqui você insere o client secret que gerou no passport logo acima)
username : admin@admin.com
password : password
scope : *
```


![alt text](https://i.imgur.com/jwO3U8b.png)

<br>

3. A resposta da API nos dá o "access_token". Copie o mesmo, vamos utilizá-lo agora para pegar os dados.
4. Configure agora uma requisição GET, para o CRUD que desejar, por exemplo, http://localhost:8000/api/v1/chamados
5. Configure no cabeçalho (HEAD) uma autenticação do tipo BEARER e cole seu acces_token. 

<br>

![alt text](https://i.imgur.com/WwAfJ95.png)

Pronto! Sua API REST está funcionando.

## Notifications e E-mail

<p> Para dispararmos notifications e enviar e-mails de redefinição de senhas, é necessário configurar no arquivo .env o servidor SMTP de envio de mensagens. Enquanto em desenvolvimento, o servidor utilizado está sendo o de testes "mailtrap.io". Para configurá-lo: </p>

```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=a9139062930e35
MAIL_PASSWORD=85f4871f08c256
MAIL_ENCRYPTION=
```

<p> Os campos MAIL_USERNAME e MAIL_PASSWORD devem ser configurados de acordo com a sua própria conta no servidor de e-mails, que pode ser criada acessando: https://mailtrap.io. </p>

**Pendências**

- (X) Notifications
- (X) API
- (X) Comentários

**Menores**

(X) 1. Aba listar chamados finalizados

2. Comentar código

3. Corrigir bug de exibir as divs ao invés do conteúdo na listagem de "descrição"

4. Implementar novos widgets do dashboard no controller

(X) 5. Finalizar o esqueceu-se da senha no login

6. Implementar notificação de Sucesso, Falha, etc

7. Melhorias visuais -> user friendly com manuais na view

8. Criar um item "novo chamado" no menu lateral para facilitar

9. Auto preenchimento de forms, vir por padrão.

10. Visualização de documentos

11. Configurar Lifetime

11. **TESTAR**