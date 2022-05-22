### Author: José Roberto
#### Email: tekinforroberto@gmail.com

<br />

### About

`api-sisamorim` é uma API para gerenciar e vender peça de bicicletas.

<br />

### Tecnologia utilizadas

- PHP
- Laravel
- MySql
- Docker

#### Getting started

```bash
$ git clone https://github.com/roberto-reis/api-sisamorim.git
```

```bash
$ cd api-sisamorim
```

```bash
$ cp .env.example .env
```

Subir os containers do projeto
```bash
$ docker-compose up -d
```

Acessar o container
```bash
$ docker-compose exec app bash
```

Instalar as dependências do projeto
```bash
$ composer install
```

Gerar a key do projeto Laravel
```bash
$ php artisan key:generate
```

Defina a chave secreta JWTAuth usada para assinar os tokens
```bash
$ php artisan jwt:secret
```

Acesse o projeto http://localhost:9001

<br />

### About
`api-sisamorim` é um software de código aberto licenciado sob a [MIT license](https://opensource.org/licenses/MIT).
