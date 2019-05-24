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

### Configuração do .env

Deve existir um arquivo .env no diretório raiz do projeto. Um arquivo `.env.example é fornecido contendo as configurações
padrões do projeto.

É preciso rodar o seguinte comando para preencher o campo `APP_KEY` no `.env`.

 ```bash 
$ php artisan key:generate
```


### Migração para ciração do banco de dados
Para o SQLITE funcionar é preciso adicionar um arquivo 
com o nome `database.sqlite` no diretório`database` do projeto:

```bash 
database/database.sqlite
```


Os seguintes comandos devem ser executados no setup do projeto:

```bash
$ php artisan migrate
$ php artisan db:seed
```

Caso as migrações já tenham sido executadas elas podem ser desfeitas com o seguinte comando:

```bash
$ php artisan migrate:rollback
```


## Executar o projeto

Após essas configurações, o projeto pode ser executado normalmente! 

```bash
$ php artisan serve
```
ou 

```bash
$ ./artisan serve
```

O sistema irá rodar locamente na porta 8000.

# Acesso ao sistema

Para acessar o sistema use as seguintes credenciais:

- Login: admin@gmail.com
- Senha: 123456



##### JIlcimar da Silva Fernandes :)
