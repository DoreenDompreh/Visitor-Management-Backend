# Visitor-Management-Backend
# Visitor Management API

This is a RESTful API built with PHP Laravel that manages visitor check-in and check-out, captures visitor information and photos, and sends SMS notifications to the host. The API integrates AWS Rekognition for image processing and uses MySQL for data storage. SMS notifications are sent using Laravel's built-in HTTP client (Guzzle).

## Features
- Visitor check-in and check-out functionality
- Capture and process visitor photos with AWS Rekognition
- Store visitor information (e.g., name, purpose, host) in a MySQL database
- Send SMS notifications to the host using Laravel HTTP client (Guzzle)

## Prerequisites

Before you begin, ensure you have the following installed on your machine:

- [PHP >= 8.0](https://www.php.net/releases/)
- [Laravel 11](https://laravel.com/docs/11.x/installation)
- [MySQL >= 5.7](https://dev.mysql.com/downloads/)
- [Composer](https://getcomposer.org/download/)
- [AWS CLI](https://aws.amazon.com/cli/)
- [XAMPP or equivalent local development environment](https://www.apachefriends.org/index.html)

## Setup

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/visitor-management-api.git
    cd visitor-management-api
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Set up your `.env` file:
    - Copy the `.env.example` file to `.env`:
        ```bash
        cp .env.example .env
        ```
    - Update the following environment variables in `.env` with your credentials:
        ```plaintext
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=your_database_name
        DB_USERNAME=your_database_username
        DB_PASSWORD=your_database_password

        AWS_ACCESS_KEY_ID=your_aws_access_key
        AWS_SECRET_ACCESS_KEY=your_aws_secret_key
        AWS_REGION=your_aws_region
        AWS_REKOGNITION_BUCKET=your_bucket_name

        SMS_API_ENDPOINT=your_sms_api_endpoint
        SMS_API_KEY=your_sms_api_key
        ```

4. Run the migrations to set up the database:
    ```bash
    php artisan migrate
    ```

5. Serve the application:
    ```bash
    php artisan serve
    ```

## Usage

### Check-in Visitor
Send a POST request to `/api/visitors/checkin` with the visitor's information and image. This will:
- Capture the visitor's photo
- Use AWS Rekognition to analyze the image
- Store the visitor's information in the database
- Send an SMS notification to the host

### Check-out Visitor
Send a POST request to `/api/visitors/checkout` with the visitor's ID. This will:
- Mark the visitor as checked out in the database

## SMS Notifications
SMS notifications to the host are sent using Laravel's HTTP client (Guzzle). The API endpoint and credentials for the SMS service must be provided in the `.env` file.

## AWS Rekognition Integration
The visitor's photo is processed using AWS Rekognition to ensure that the image meets necessary criteria (e.g., face detection). Ensure that your AWS credentials are correctly configured in the `.env` file.

## Database Structure
The MySQL database includes the following tables:
- **visitors**: Stores visitor details (name, host, check-in/check-out timestamps, photo URL, etc.)

## Contributing
If you'd like to contribute to this project, feel free to submit a pull request or open an issue.

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
