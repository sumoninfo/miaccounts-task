# Miaccounts-backend

## Installation

### Clone the repository

    git clone https://github.com/sumoninfo/miaccounts-task.git

### Switch to the repo folder

    cd miaccounts-task

### Install all the dependencies using composer

    composer install

### Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

### Database configuration

    DB_DATABASE=your_database_name
    DB_USERNAME=your_user_name
    DB_PASSWORD=your_password

### Generate a new application key & optimize clear

    php artisan key:generate 
    php artisan o:c

### Create table & dummy data from seeder

    php artisan migrate --seed

### Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

#
#===========================================#

# Miaccounts-frontend

## Installation

### Switch to the repo folder

    cd frontend

### Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

### Install all the dependencies using npm
    npm install 

### Compiles and hot-reloads for development
    npm run dev

You can now access the server at http://localhost:5173
