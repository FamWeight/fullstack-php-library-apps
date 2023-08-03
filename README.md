# Project Name: fullstack-php-library-apps / Why Library

## Description

This repository is created to fulfill the assignments of the Vocational School Graduate Academy (VSGA) program, specifically for the Junior Web Developer (JWD) class. The application aims to meet the requirements of the tasks and demonstrate the ability to implement web technologies such as PHP Native, JavaScript, HTML, and CSS. The Library Management System aims to provide an efficient and organized platform for managing books, user accounts, and transactions in a library setting.

## Database Setup

The necessary database structure and initial data have been provided in the `dbpus.sql` file. The file contains templates for the required tables.

## Admin Authorization

The system allows an admin to log in using the following credentials:

- Username: admin
- Password: admin

The admin has several authorizations, including:

- Adding user data (where the password for users will be set as the same as their username).
- Modifying user data (with the option to reset the password if the data is changed).
- Removing user memberships.
- Adding book data.
- Modifying book data.
- Removing books.
- Viewing and generating a PDF report of transaction records.

## User Capabilities

Users of the system have the following capabilities:

- Logging in using the username and password set by the admin.
- Viewing their profile details created by the admin.
- Changing their default password, which is initially the same as their username.
- Browsing available books and making borrowing requests.
- Viewing currently borrowed books on the homepage.
- All borrow-return transactions will be recorded in the transaction list accessible to the admin.

## Getting Started

To set up and run the application:

1. Clone this repository to your local machine.
2. Import the provided `dbpus.sql` file into your database management system.
3. Make sure you have a PHP development environment installed on your server.
4. Run the application on your web server.

## Usage

- Access the application through the URL of your web server.
- Admin and user login options are available on the login page.
- Admins can access their dashboard to manage users, books, and transactions.
- Users can log in and view their profile, borrow books, and check their borrowing history.

## Note

This project was developed to the best of my abilities. If there are any shortcomings, I apologize for any inconvenience caused.

Thank you for using the Library Management System!
