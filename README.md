# Laravel Excel API

This is a Laravel-based API project that allows you to import students' records from an Excel file, save them in a MySQL database, send registration confirmation emails in the background, and retrieve paginated student data through API endpoints.

## Requirements

- PHP >= 7.4
- Laravel >= 8.x
- MySQL/SQLite or any prefred db

## Installation

1. Clone the repository to your local machine:

```bash
git clone https://github.com/NikkyAmresh/excel-api.git
```

2. Navigate to the project directory:

```bash
cd excel-api
```

3. Install the dependencies using Composer:

```bash
composer install
```

4. Set up the environment variables by creating a `.env` file. You can duplicate the `.env.example` file and modify the necessary configurations, such as database credentials.
   1. database setup
   2. mail setup with credentials

5. Create a new database for the project in MySQL.

6. Run the database migrations to set up the required tables:

```bash
php artisan migrate
```

## Usage

### Import Students' Records

To import students' records from an Excel file, use the following API endpoint:

```http
POST /api/import-students
```

- Request Body: The request body should contain a `file` parameter with the selected Excel file.

- Example using cURL:

```bash
curl -X POST \
  -H 'Content-Type: multipart/form-data' \
  -F 'file=@/path/to/excel/file.xlsx' \
  http://localhost:8000/api/import-students
```

### Retrieve Students' Data

To retrieve paginated students' data, use the following API endpoint:

```http
GET /api/students
```

- Example using cURL:

```bash
curl -X GET http://localhost:8000/api/students
```

The response will be a JSON object containing the paginated student data.

## Background Job

The registration confirmation email is sent in the background using Laravel's queue and job system to avoid affecting the API response time. The job is dispatched when importing students' records, and it is processed asynchronously.

## Customize Email Template

The email template for the registration confirmation can be customized by modifying the `registration_confirmation.blade.php` file located in the `resources/views/emails` directory.
