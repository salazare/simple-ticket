## simple-ticket


simple-ticket es un sistema de prueba elaborado en laravel 5.1

### Requisitos

* PHP >= 5.5.9
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* composer

### Instalacion
Primero clonar el proyecto
```sh
$ git clone https://github.com/salazare/simple-ticket.git
```

Acceder a la carpeta del proyecto y luego instalar las dependencias con composer
```sh
$ cd simple-ticket
$ composer install
```
Hacer una copia del archivo .env.example y renombrarla como .env
Luego generar una key para que nuestra aplicación pueda funcionar
```sh
$ cp .env.example .env
$ php artisan key:generate
```

### En caso de utilizar Homestead ejecutamos el siguiente comando (Ver documentacion de laravel Homestead)
#### Mac / Linux:
```sh
$ php vendor/bin/homestead make
```
#### Windows
```sh
vendor\bin\homestead make
```

Iniciamos Vagrant Homestead, accedemos por ssh a la maquina virtual y vamos a la carpeta del proyecto
```sh
$ vagrant up
$ vagrant ssh
$ cd simple-ticket
```


#### Instalar migraciones y seeders en la base de datos
Es importante restaurar tanto las migraciones como los seeders, ya que aparte de la estructura de la base de datos
hay datos iniciales que son necesarios para poder ejecutar la aplicacion
```sh
$ php artisan migrate:refresh --seed
```