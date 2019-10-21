**Instalação do projeto**

1. Criar e configurar o arquivo .env com os dados do banco.

2. Executar: composer install

3. Executar: php artisan migrate --seed 
(tem que ser exatamente assim para criar o login inicial de admin)

4. Executar: php artisan key:generate

5. Executar: php artisan storage:link 

E está pronto. Agora só rodar php artisan serve e fazer login:

Username:	admin@admin.com <br>
Password:	password 

<br>

**Pendências**

1. Aba listar chamados finalizados

2. Traduzir algumas coisas do template e comentar código

3. Corrigir bug de exibir as divs ao invés do conteúdo na listagem de "descrição"

3. Implementar novos widgets do dashboard no controller

4. Implementar notifications

5. Finalizar o esqueceu-se da senha no login

6. Validação de caracteres especiais nos forms

7. Implementar notificação de Sucesso, Falha, etc

8. Melhorias visuais