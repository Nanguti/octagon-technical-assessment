# Laravel Fingerprint Authentication

## Live Link

Check out the live link: [Live Link](https://octagon.jv.co.ke/)

## Overview

This project aims to create a web application using Laravel that allows users to register by providing basic details such as name, email, password, and fingerprint data. Subsequently, users can log in using either their email/password combination or fingerprint authentication. The fingerprint data is securely stored and validated during the login process.

For simulation purposes, during registration and fingerprint capture, users enter a number or character sequence to represent fingerprint data. This assumes that real fingerprints are unique. Fingerprint data, when collected, it is securely handled and stored using Laravel's built-in Hash::make() method for encryption.

This project uses Laravel Breeze, a minimalistic yet comprehensive authentication solution provided by Laravel. Laravel Breeze simplifies the implementation of authentication functionalities by providing features such as login, registration, password reset, email verification, and password confirmation out of the box. Additionally, it includes a user-friendly "profile" page where users can update their name, email address, and password with ease.

The default view layer of Laravel Breeze is composed of simple Blade templates styled with Tailwind CSS, ensuring a clean and modern user interface.

## Requirements

-   PHP >= 8.1
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

    - Navigate to http://localhost:8000 and click on registration link.
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
    - After successful authentication, the session is regenerated to prevent session fixation attacks.
    - On logout, the session data is invalidated, and the CSRF token is regenerated to prevent CSRF attacks.

## Screenshots

![Registration Form](/screenshots/registration-form.png)
![Login Form](/screenshots/login-form.png)
![Login Using Email](/screenshots/login-form-email.png)
![Login Using Fingerprint](/screenshots/login-form-fingerprint.png)
![Forgot Password ](/screenshots/forgot-password.png)
![Dashboard ](/screenshots/dashboard.png)

## Credits

This project was developed by Kevin Wanyonyi for the purpose of a technical assessment.

## License

This project is licensed under the [MIT License](LICENSE).
