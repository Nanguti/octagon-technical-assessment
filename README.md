# Laravel Fingerprint Authentication

## Overview

This project aims to create a web application using Laravel that allows users to register by providing basic details such as name, email, password, and fingerprint data. Subsequently, users can log in using either their email/password combination or fingerprint authentication. The fingerprint data is securely stored and validated during the login process.

## Requirements

-   PHP >= 8.1
-   Laravel Breeze ^1.29
-   Laravel Framework ^10.10

## Features

1. **User Registration**: Users sign up by providing their name, email, password, and fingerprint data.
2. **Secure Fingerprint Storage**: Fingerprint data is securely stored in the database.
3. **Dual Authentication**: Users can choose between traditional email/password login or fingerprint authentication.
4. **Data Validation**: Proper error handling and validation are implemented to ensure data integrity and security.
5. **User-Friendly Interface**: The registration and login forms are designed to be clean and user-friendly.
6. **Built-in Laravel Functionalities**: Utilizes Laravel's built-in authentication and database functionalities for seamless development.

## Setup Instructions

1. Clone the repository:

    ```bash
    git clone git@github.com:Nanguti/octagon-technical-assessment.git
    ```

2. Install dependencies:

    ```bash
    composer install
    ```

3. Copy the `.env.example` file to `.env` and configure your environment variables, including database settings.

4. Generate application key:

    ```bash
    php artisan key:generate
    ```

5. Run database migrations:

    ```bash
    php artisan migrate
    ```

6. Serve the application:

    ```bash
    php artisan serve
    ```

7. Access the application in your web browser.

## Usage

1. **User Registration**:

    - Navigate to the registration page.
    - Fill in the required details (name, email, password).
    - Enter a random number or characters as fingerprint data (assuming uniqueness).
    - Submit the registration form.

2. **User Login**:
    - Navigate to http://localhost:8000; this will either take you to the dashboard or the login page if not logged in.
    - On the login page, select the desired authentication method.
    - Enter your email and password OR provide fingerprint data.
    - Click the login button.
    - If you do not have an account, there is a registration link available.
    - For forgotten passwords, we provide a password reset link.

## Additional Notes

For simulation purposes, during registration and fingerprint capture, a user enters a random number or characters (assuming that it is fingerprint data which will always be unique) that they are able to remember. If a real scanning device were available, data from the scanning device would be captured and stored in the database.

Fingerprint data is securely handled and stored. Fingerprint data is securely handled by Laravel's built-in `Hash::make()` method.

## Screenshots

![Login Form](/assets/img/screenshots/login-form.png)
![Registration Form](/assets/img/screenshots/registration-form.png)

## Credits

This project was developed by Kevin Wanyonyi for the purpose of a technical assessment.

## License

This project is licensed under the [MIT License](LICENSE).
