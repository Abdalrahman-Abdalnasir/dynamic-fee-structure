<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). -->
# Dynamic Fee Structure System Documentation

## 1. Database Schema

The database schema for the Dynamic Fee Structure System consists of four main tables: `fee_presets`, `services`, `thresholds`, and `fee_percentages`. Below is a brief description of each table and its columns.

### 1.1. Fee Presets Table

- **Table Name**: `fee_presets`
- **Columns**:
  - `id`: Primary key (auto-incrementing integer).
  - `name`: String (the name of the fee preset, e.g., "Standard", "Premium").
  - `created_at`: Timestamp (automatically managed by Laravel).
  - `updated_at`: Timestamp (automatically managed by Laravel).

### 1.2. Services Table

- **Table Name**: `services`
- **Columns**:
  - `id`: Primary key (auto-incrementing integer).
  - `name`: String (the name of the service, e.g., "Delivery", "Subscription").
  - `created_at`: Timestamp (automatically managed by Laravel).
  - `updated_at`: Timestamp (automatically managed by Laravel).

### 1.3. Thresholds Table

- **Table Name**: `thresholds`
- **Columns**:
  - `id`: Primary key (auto-incrementing integer).
  - `amount`: Decimal (the total amount spent that determines different fee percentages).
  - `percentage`: Decimal (the fee percentage associated with this threshold).
  - `created_at`: Timestamp (automatically managed by Laravel).
  - `updated_at`: Timestamp (automatically managed by Laravel).

### 1.4. Fee Percentages Table

- **Table Name**: `fee_percentages`
- **Columns**:
  - `id`: Primary key (auto-incrementing integer).
  - `fee_preset_id`: Foreign key (references `fee_presets.id`).
  - `service_id`: Foreign key (references `services.id`).
  - `threshold_id`: Foreign key (references `thresholds.id`).
  - `percentage`: Decimal (the fee percentage for the combination of preset, service, and threshold).
  - `created_at`: Timestamp (automatically managed by Laravel).
  - `updated_at`: Timestamp (automatically managed by Laravel).

## 2. Code Structure

The code is organized into the following main components:

### 2.1. Controllers

- **FeePercentageController**: Manages the CRUD operations for fee percentages and handles the logic for calculating fees based on user input.
- **FeePresetController**: Manages the CRUD operations for fee presets.
- **ServiceController**: Manages the CRUD operations for services.
- **ThresholdController**: Manages the CRUD operations for thresholds.

### 2.2. Views

The views are organized in the `resources/views` directory and follow a naming convention based on the controller names. Each view corresponds to the actions in the controllers:

- **fee_percentages**: Contains views for listing, creating, and editing fee percentages.
- **fee_presets**: Contains views for listing, creating, and editing fee presets.
- **services**: Contains views for listing, creating, and editing services.
- **thresholds**: Contains views for listing, creating, and editing thresholds.

### 2.3. Routes

The routes are defined in the `routes/web.php` file, using resource routes for CRUD operations. The routes are organized as follows:


## 3. Logic Behind Fee Calculations

The fee calculation logic is implemented in the `FeePercentageController`. The key components are:

1. **Determine Percentage**: The `determinePercentage` method calculates the fee percentage based on the total amount spent. The logic is as follows:
   - If the total spent is less than 500, the percentage is 5%.
   - If the total spent is between 500 and 1000, the percentage is 4%.
   - If the total spent is greater than 1000, the percentage is 3%.

2. **Store Fee Percentage**: When a fee percentage is created, the system retrieves the corresponding threshold and calculates the percentage using the `determinePercentage` method.

3. **Calculate Fees**: The `calculate` method takes user input (preset, service, and total spent) and returns the calculated fee based on the determined percentage.

## 4. Running the Project Locally

To run the project locally, follow these steps:

1. **Clone the Repository**:
   ```bash
   git clone <repository-url>
   cd <project-directory>
   ```

2. **Install Dependencies**:
   Make sure you have Composer installed, then run:
   ```bash
   composer install
   ```

3. **Set Up Environment**:
   Copy the `.env.example` file to `.env` and configure your database settings:
   ```bash
   cp .env.example .env
   ```

4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**:
   ```bash
   php artisan migrate
   ```

6. **Serve the Application**:
   ```bash
   php artisan serve
   ```

7. **Access the Application**:
   Open your web browser and go to `http://localhost:8000`.

## 5. User Experience Considerations

- **Tooltips**: Use tooltips to provide guidance on form fields and actions. This can be implemented using libraries like Bootstrap or jQuery UI.
- **Validation Messages**: Ensure that users receive clear feedback on form submissions, including validation errors.
- **Dynamic Updates**: Use AJAX to dynamically update parts of the page without full reloads, enhancing the user experience.

## Conclusion

This document provides an overview of the database schema, code structure, fee calculation logic, and instructions for running the project locally. By following these guidelines, you can ensure a smooth and intuitive user experience in the Dynamic Fee Structure System. If you have any questions or need further assistance, feel free to reach out!
