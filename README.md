Steps And Commands To Follow After Clonning the Project

 => copy and paste .env.example to a new file name .env
 => composer install
 => npm install
 => npm run build
 => php artisan serve
 => npm run dev
 => php artisan key:generate
 => create a database , name it as saved in "DB_DATABASE" variable available in .env file
 => php artisan migrate
 => php artisan db:seed