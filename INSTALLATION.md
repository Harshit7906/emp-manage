## 🚀 Installation Guide

Follow the steps below to set up the project on your local environment.

### 1. Install Dependencies
Install required PHP packages using Composer:
composer install

### 2. Install Dependencies
Open phpMyAdmin or your preferred MySQL client.
Create a new database named: emp_manage

### 3. Configure the Database
Edit the file config/db.php to match your MySQL credentials:
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=emp_manage',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];

### 4. Run Migrations
Apply the migration to create the employee table:
php yii migrate

### 5. Launch the Application
Open your browser and go to: http://localhost/emp-manage/web/employee