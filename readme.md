## simple-ticket


simple-ticket es un sistema de prueba elaborado en laravel 5.1

### Requisitos

PHP >= 5.5.9
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension
Tokenizer PHP Extension
composer

### Instalacion
Primero clonar el proyecto
git clone https://github.com/salazare/simple-ticket.git

Acceder a la carpeta del proyecto
cd simple-ticket

Instalar las dependencias con composer
composer install

Hacer una copia del archivo .env.example y renombrarla como .env
cp .env.example .env
Generar una key para que nuestra aplicación pueda funcionar
php artisan key:generate


### En caso de utilizar Homestead ejecutamos el siguiente comando (Ver documentacion de laravel Homestead)
Mac / Linux:
php vendor/bin/homestead make
Windows
vendor\bin\homestead make

Iniciamos Vagrant Homestead
vagrant up

Accedemos por ssh a la maquina virtual
vagrant ssh
Vamos a la carpeta del proyecto
cd simple-ticket

### Instalar migraciones y seeders en la base de datos
Es importante restaurar tanto las migraciones como los seeders, ya que aparte de la estructura de la base de datos
hay datos iniciales que son necesarios para poder ejecutar la aplicacion
php artisan migrate:refresh --seed