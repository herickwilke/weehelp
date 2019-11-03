# Instalação do projeto

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
## Fazer login: 
- Usuário: admin@admin.com
- Senha: password 

<br>

**Pendências**
Requisitos

- ( ) Notifications
- ( ) API
- (X) Comentários

***Menores***

1. Aba listar chamados finalizados

2. Comentar código

3. Corrigir bug de exibir as divs ao invés do conteúdo na listagem de "descrição"

4. Implementar novos widgets do dashboard no controller

5. Implementar notifications

6. Finalizar o esqueceu-se da senha no login

8. Implementar notificação de Sucesso, Falha, etc

9. Melhorias visuais -> user friendly com manuais na view

11. Criar um item "novo chamado" no menu lateral para facilitar

15. Auto preenchimento de forms, vir por padrão.

16. Visualização de documentos

16. ***TESTAR***