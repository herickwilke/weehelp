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