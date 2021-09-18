# Laravel Application

> website to provide complete information about the station-restaurants and the formation of orders

## Quick Start

```bash
# download or clone repository
git clone https://github.com/kibo13/vokzal.git

# install dependencies
composer install
npm ci

# copy file .env
copy .env.example .env

# generate a key
php artisan key:generate

# create a new mysql database via phpmyadmin or GUI
# import to created database file
static/database.sql

# database configuration
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=database_username
DB_PASSWORD=database_password

# url configuration
APP_URL=site_name

# mail configuration
MAIL_DRIVER=smtp
MAIL_HOST=smtp.email_service
MAIL_PORT=465
MAIL_USERNAME=email_username
MAIL_PASSWORD=email_password
MAIL_FROM_ADDRESS=email_username
MAIL_FROM_NAME="VOKZAL GASTROBAR"

# queue configuration
QUEUE_CONNECTION=database

# run supervisor to track queue
php artisan queue:work

# add domain name to TinyMCE
link: https://www.tiny.cloud/
mail: voyikor122@asmm5.com
pass: 2CxL0R2gwq

```
