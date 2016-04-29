Sistema para Reservas de Salas
============================

Sistema Web desenvolvido para o cadastro de usuários e reservas de salas.

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      components/         contains components
      config/             contains application configurations
      controllers/        contains Web controller classes
      dump/               contains DB SQL
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources


REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install from an Archive File

Extract the archive file downloaded from [yiiframework.com](http://www.yiiframework.com/download/) to
a directory named `basic` that is directly under the Web root.

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

You can then access the application through the following URL:

~~~
http://localhost/prova_reserva_salas/
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=prova_reserva_salas',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTE:** 

Para se logar no sistema utilize os seguintes logins:

ADMININSTRADOR

Usuário: admin
Senha: 123456

GERENTE

Usuário: pedro
Senha: 123456

USUÁRIO

Usuário: ana_paula
Senha: 123456
