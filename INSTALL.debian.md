# Deming installation procedure

## Recommended configuration

- OS : Debian 12 stable
- RAM : 2G
- Disk : 20G
- VCPU 2

## Installation

Install Debian :
- without Debian desktop environment
- with Web server
- with SSH Web server
- with the usual system utilities

Update the distribution

    su root -c "apt update
    su root -c "apt upgrade

Install Apache, git, php and composer

    su root -c "apt-get install git composer apache2 libapache2-mod-php php php-mysql php-zip php-gd php-mbstring php-curl php-xml"

Create the project directory

    cd /var/www
    su root -c "mkdir deming
    su root -c "chown $USER:$GROUP deming"

Clone project from Github to /var/www

    cd /var/www
    git clone https://www.github.com/dbarzin/deming

Create temporary directories

    cd deming
    mkdir -p storage/framework/views
    mkdir -p storage/framework/cache
    mkdir -p storage/framework/sessions
    mkdir -p bootstrap/cache


Install packages with composer

    composer install

Publish all publishable assets from vendor packages

    php artisan vendor:publish --all

## MariaDB

Install MariaDB

    su root -c "apt install mariadb-server"

Launch MariaDB with root rights

    su root -c mariadb

Create the _deming_ database and the _deming_user_ user

    CREATE DATABASE deming CHARACTER SET utf8 COLLATE utf8_general_ci;
	CREATE USER 'deming_user'@'localhost' IDENTIFIED BY 'demPasssword-123';
    GRANT ALL ON deming.* TO deming_user@localhost;
    GRANT PROCESS ON *.* TO 'deming_user'@'localhost';

    FLUSH PRIVILEGES;
    EXIT;

## Configuration

Create an .env file in the project root directory:

    cd /var/www/deming
    cp .env.example .env

Set database connection parameters :

    vi .env

    ## .env file
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=deming
    DB_USERNAME=deming_user
    DB_PASSWORD=demPasssword-123

## Create database

Run migrations

    LANG=en php artisan migrate --seed

Note: the seed is important (--seed), as it will create the first administrator user for you.

Generate application key

    php artisan key:generate

Create storage link

	php artisan storage:link

## Populating the database

To import the database with 27001:2022 security attributes (optional)

    LANG=en php artisan db:seed --class=AttributeSeeder

Populate database with ISO 27001:2022 standard and generate test set (optional)

    php artisan deming:import-framework ./storage/app/repository/ISO27001-2022.en.xlsx
    php artisan deming:generate-tests

Start application with PHP

    php artisan serve

or to access the application from another server

    php artisan serve --host 0.0.0.0 --port 8000

The application can be accessed at URL [http://127.0.0.1:8000]

    user : admin@admin.localhost
    password : admin

The administrator's default language is English. To change language, go to the user profile page
(top right of the main page).

To import a repository and generate test data, go to "Configuration" -> "Import" (optional).

## Apache

To configure Apache, modify the Deming directory properties and grant appropriate permissions to the hive with the following command:

    su root -c "chown -R www-data:www-data /var/www/deming"
    su root -c "chmod -R 775 /var/www/deming/storage"

Next, create a new Apache virtual host configuration file to serve the application:

    su root -c "vi /etc/apache2/sites-available/deming.conf"

Add the following lines:

    <VirtualHost *:80>
    ServerName deming.local
    ServerAdmin admin@example.com
    DocumentRoot /var/www/deming/public
    <Directory /var/www/deming>
    AllowOverride All
    </Directory>
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
    </VirtualHost>

Save and close the file when finished. Next, activate the Apache virtual host and rewrite module with the following commands:

    su - root -c "a2enmod rewrite"
    su - root -c "a2dissite 000-default.conf
    su - root -c "a2ensite deming.conf"

Finally, restart the Apache service to activate the changes:

    su - root -c "systemctl restart apache2"

## PHP

You must define the values for upload_max_filesize and post_max_size in your php.ini (/etc/php/8.2/apache2/php.ini):

    ; Maximum size allowed for uploaded files.
    upload_max_filesize = 10M

    ; Must be greater than or equal to upload_max_filesize
    post_max_size = 10M

After modifying the php.ini file(s), you must restart the Apache service to use the new configuration.


## PHP

You must set the values for upload_max_filesize and post_max_size in your php.ini file (/etc/php/8.2/apache2/php.ini):

    ; Maximum size allowed for uploaded files.
    upload_max_filesize = 10M

    ; Must be greater than or equal to upload_max_filesize
    post_max_size = 10M

After modifying the php.ini file(s), you must restart the Apache service to use the new configuration.

    su - root -c "systemctl restart apache2"

## Mail configuration

If you want to send notification e-mails from Deming.

Install postfix and mailx

    su root -c "apt install postfix mailutils"

Configure postfix

    su root -c "dpkg-reconfigure postfix"

Then restart postfix

    su - root -c "systemctl reload postfix"

Send a test mail with

    echo "Test mail body" | mailx -r "deming@yourdomain.local" -s "Subject Test" yourname@yourdomain.local

Don't forget to [configure](https://dbarzin.github.io/deming/config.fr/#notifications) the content and frequency of mail sending.

## Sheduler

Modify crontab

    sudo crontab -e

add this line to crontab

    * * * * * cd /var/www/deming && php artisan schedule:run >> /dev/null 2>&1

## Update

To update Deming, go to the Deming directory and retrieve the sources

    cd /var/www/deming
    git pull

Migrate database

    php artisan migrate

Update composer

    composer self-update

Update libraries

    composer update

Empty caches

    php artisan optimize:clear

## Reset to zero

To start from an empty database with the ISO 27001:2022 standard.

Here's the command to recreate the DB:

    php artisan migrate:fresh --seed

Then import the attributes

    php artisan db:seed --class=AttributeSeeder

Populate the database with the ISO 27001:2022 standard

    php artisan deming:import-framework ./storage/app/repository/ISO27001-2022.en.xlsx