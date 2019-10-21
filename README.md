**Instalação do projeto**

1. Criar e configurar um novo arquivo .env a partir do .env.example com os dados do banco.

2. Executar: composer install

3. Executar: php artisan migrate --seed 
(tem que ser exatamente assim para criar o login inicial de admin)

4. Executar: php artisan key:generate

5. Executar: php artisan storage:link 

6. Agora só rodar: php artisan serve 

<br>
Fazer login:

Username:	admin@admin.com <br>
Password:	password 

<br>

**Pendências**

1. Aba listar chamados finalizados

2. Traduzir algumas coisas do template e comentar código

3. Corrigir bug de exibir as divs ao invés do conteúdo na listagem de "descrição"

4. Implementar novos widgets do dashboard no controller

5. Implementar notifications

6. Finalizar o esqueceu-se da senha no login

7. Validação de caracteres especiais nos forms

8. Implementar notificação de Sucesso, Falha, etc

9. Melhorias visuais -> user friendly com manuais na view

10. Configurar novos seed

11. Criar um item "novo chamado" no menu lateral para facilitar

12. Adicionar comentários nos chamados