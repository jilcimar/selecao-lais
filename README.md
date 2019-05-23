# Especificações do projeto
- Versão do PHP: 7.0 ou superior
- Laravel Framework 5.8.18


## Configuração

Tendo o PHP instalado na máquina, é preciso instalar o drive do PHP para o SQLITE, para
isso é só rodar o comando: 

```bash
sudo apt-get install php7.0-sqlite3
``` 

### Instalação das dependências

Para instalar as dependências do projeto o executável do composer deve estar disponível no PATH.
Caso esse requerimento seja satisfeito, basta rodar os seguintes comandos:

```bash
$ composer update
```


### Migração para ciração do banco de dados

Os seguintes comandos devem ser executados no setup do projeto:

```bash
$ php artisan migrate
```

Caso as migrações já tenham sido executadas elas podem ser desfeitas com o seguinte comando:

```bash
$ php artisan migrate:rollback
```

### Configuração do .env

Deve existir um arquivo .env no diretório raiz do projeto. Um arquivo `.env.example é fornecido contendo as configurações
padrões do projeto.

É preciso rodar o seguinte comando para preencher o campo `APP_KEY` no `.env`.

- `php artisan key:generate`

## Executar o projeto

Após essas configurações, o projeto pode ser executado normalmente! 


# Acesso ao sistema

Para acessar o sistema é preciso fazer o cadastro clicando no link "Cadastre-se"
e em seguida efetuar o login.  

##### JIlcimar da Silva Fernandes :)
