# Student Management System

A Student Management System developed using Laravel 12, PHP and MySQL to manage student records through a user-friendly web interface.

## Project Overview

This project is designed to manage student information efficiently. Users can register and log in to access the dashboard, manage student records and view student details.

The dashboard displays student statistics and recently added students.

## Technologies Used

- Laravel 12
- PHP 8.2
- MySQL
- HTML
- CSS
- Bootstrap
- JavaScript
- Blade Templates

## Features

### Authentication
- User Registration
- User Login
- Authentication and Protected Routes

### Dashboard
- Dashboard with Statistics Cards
- Total Students and Department Statistics
- Gender-wise Student Statistics
- Recently Added Students

### Student Management
- Add New Students
- View Student Records
- Edit Student Details
- Delete Student Records
- Search Students
- Pagination

### Additional Features
- Student Image Upload
- Image Update and Management
- Form Validation
- Department/Course Selection from Database
- Database Relationships

## Database

The project uses MySQL to store student and department information.

- Students Table
- Departments Table

## Installation and Setup

1. Clone the repository:

   ```bash
   git clone https://github.com/Nandini2003-tech/student-management-system-laravel.git
   ```

2. Open the project directory:

   ```bash
   cd student-management-system-laravel
   ```

3. Install dependencies:

   ```bash
   composer install
   ```

4. Create the environment file:

   ```bash
   copy .env.example .env
   ```

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Configure your MySQL database in the `.env` file.

7. Run migrations:

   ```bash
   php artisan migrate
   ```

8. Add the required department/course records to the departments table.

9. Create the storage link:

   ```bash
   php artisan storage:link
   ```

10. Install frontend dependencies:

    ```bash
    npm install
    npm run build
    ```

11. Start the Laravel development server:

    ```bash
    php artisan serve
    ```

## Author

**Nandini**

GitHub: https://github.com/Nandini2003-tech