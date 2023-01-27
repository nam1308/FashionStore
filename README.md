# INIT PROJECT
1. Create new .env
2. Down load nvm install window : https://github.com/coreybutler/nvm-windows/releases/download/1.1.10/nvm-setup.exe
3. Switch node version 16.17.0
3. Install redis : https://github.com/MicrosoftArchive/redis/releases/download/win-3.2.100/Redis-x64-3.2.100.msi
3. Fill info database .env
## Setup & Run

```
composer install
npm install
php artisan migrate
php artisan db:seed
php artisan serve
npm run watch

```


