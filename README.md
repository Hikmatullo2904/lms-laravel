# LMS System

## Description
The LMS System is a learning management platform where:

- Mentors can create, manage, and sell courses to students.
- Students can buy courses, access their lessons, and interact with mentors via chat.
- The application is designed to provide a seamless learning experience with essential features for both mentors and students.

## Features
- Mentors can create and sell courses.
- Students can purchase and access courses.
- Integrated chat system for student-mentor interaction.
- Essential features to enhance the learning experience.

## Technical Details
- **Framework**: Laravel
- **Database**: PostgreSQL
- **API Documentation**: Swagger (accessible at `/api/docs`)

## Getting Started

## You can application in two ways. You can run it using docker or install it on your local machine


### Using docker. 
- You should have docker installed on your machine.
- Run the following command to start the application:

Copy the `.env.example file` to `.env`:

```
cp .env.example .env
```
Then run this command
```
docker-compose up --build -d
```
then run the following command to migrate the database:

```
docker exec -it Laravel_php php artisan migrate
```
Now you can access the application at `http://localhost:8000`.


### Installing on your local machine
You should have the following installed:
- [Laravel](https://laravel.com/)
- [PostgreSQL](https://www.postgresql.org/)
- [Composer](https://getcomposer.org/)
- [Git](https://git-scm.com/)
- [PHP](https://www.php.net/)
- [Nginx](https://www.nginx.com/)

### 1. Clone the Repository

```
git clone https://github.com/Hikmatullo2904/lms-laravel.git
cd lms-laravel
```
### 2. Install Dependencies

```
composer install
```
### 3. Configure the Environment
Copy the `.env.example file` to `.env`:

```
cp .env.example .env
```
Update the `.env` file with your database configuration:

```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 4. Run Database Migrations
Run the following command to migrate the database:

```
php artisan migrate
```

### 5. Start the Application
Run the following command to start the application:

```
php artisan serve
```

### 6. Access the Application
Open your web browser and navigate to `http://localhost:8000` to access the LMS System.

you can access swagger documentation at `http://localhost:8000/api/docs`

## License
This project is licensed under the [MIT License](https://choosealicense.com/licenses/mit/).

## Author
- [Hikmatullo Anvarbekov](https://github.com/Hikmatullo2904)

