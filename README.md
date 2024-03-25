# Laravel_user_management_app


## Table of Contents
- [Installation](#installation)
- [Seeding](#seeding)
- [Unit Testing](#unit-testing)
- [Credentials](#credentials)

## Installation
### Prerequisites
- PHP (version >= 8.1)
- Composer
- Node.js
- npm or Yarn

### Steps
1. Clone the repository.
2. Install PHP dependencies:
    ```bash
    composer install
    ```
3. Install Node.js dependencies:
    ```bash
    npm install
    # or
    yarn
    ```
4. Copy the `.env.example` file to `.env` and update the configuration.
5. Generate the application key:
    ```bash
    php artisan key:generate
    ```

## Seeding
To seed the database with default data, including an example user (e.g., Admin), run the following command:
```bash
php artisan db:seed
```


## Unit Test
```bash
php artisan test
```
## Credentials
Email: admin@example.com
Password: 12345678

