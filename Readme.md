<a name="readme-top"></a>

<div align="center">

  <h3 align="center">>YouCan Challenge (Junior-Software-Engineer---Fullstack-LaravelVueJS-)</h3>

  <p align="center">
    A simple product management system;
  </p>
</div>


## Built With
<a href="https://laravel.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/laravel/laravel-plain-wordmark.svg" alt="laravel" width="40" height="40"/>
<a href="https://vuejs.org/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/vuejs/vuejs-original-wordmark.svg" alt="vuejs" width="40" height="40"/>
<a href="https://tailwindcss.com/" target="_blank" rel="noreferrer"> <img src="https://www.vectorlogo.zone/logos/tailwindcss/tailwindcss-icon.svg" alt="tailwind" width="40" height="40"/> </a>
<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Get it up and running.

After you clone this project, do the following:

```bash
# go into the project backend part
cd backend

# create a .env file
cp .env.example .env

# install composer dependencies
composer install

# install npm dependencies
npm install

# generate a key for your application
php artisan key:generate

# add the database connection config to your .env file
DB_CONNECTION=mysql
DB_DATABASE=youcan_test
DB_USERNAME=root
DB_PASSWORD=

# run the migration files to generate the schema
php artisan migrate

# seed your databse
php artisan db:seed

# run the server
php artisan serve

# go into the project frontend part
npm install

# set your base url in axios instance
# start your development server
npm run dev

```
## Commands
```bash
# php artisan product:create 
{name : Product name} {description : Product description} {price : Product price} {categories* : Category IDs} {--image= : Image Src (optional)}
```

## Testing 
```bash
# php artisan test 
```


### Endpoints

Route:list
Endpoint | Description
----------|------------
POST /products | Create a products
GET /products/{categoryID?}  | Get a listing of products
GET /category  | Get a listing of categories

<p align="right">(<a href="#readme-top">back to top</a>)</p>

