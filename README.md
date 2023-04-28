# Employee Management System

This is a web-based employee management system built using Laravel and Vue.js. It allows managers to manage employees, shift schedules, and attendance records.

## Installation

To install and run this project locally, follow these steps:

1. Clone the repository to your local machine:

```
git clone https://github.com/your-username/employee-management-system.git
```

2. Navigate to the project directory:

```
cd employee-management-system
```

3. Install the necessary dependencies:

```
composer install
npm install
```

4. Create a `.env` file by copying the `.env.example` file:

```
cp .env.example .env
```

5. Generate a new app key:

```
php artisan key:generate
```

6. Set up your database in the `.env` file:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_management_system
DB_USERNAME=root
DB_PASSWORD=
```

7. Migrate the database:

```
php artisan migrate
```

8. Seed the database with sample data:

```
php artisan db:seed
```

9. Start the development server:

```
php artisan serve
```

10. Visit `http://localhost:8000` in your browser to view the application.

## Usage

To use the application, follow these steps:

1. Log in as a manager using the credentials provided in the `DatabaseSeeder` file.

2. Add employees by clicking the "Add Employee" button and filling out the form.

3. Set up shift schedules by clicking the "Add Shift" button and filling out the form.

4. Record employee attendance by clicking the "Check In" or "Check Out" buttons next to each employee's name.

## Credits

This project was created by [Your Name Here](https://github.com/your-username).

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).