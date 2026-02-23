# Laravel 11 Internship Project

A comprehensive Laravel 11 project demonstrating backend development fundamentals, PHP OOP principles, and best practices for new developer interns.

## Project Structure Overview

```
laravel-11-internship/
├── app/
│   ├── Classes/              # Custom PHP classes demonstrating OOP
│   │   ├── PaymentInterface.php
│   │   ├── Payment.php
│   │   ├── CreditCardPayment.php
│   │   └── DigitalWalletPayment.php
│   ├── Models/              # Eloquent models
│   └── Http/
│       ├── Controllers/     # Controllers
│       └── Middleware/      # Custom middleware
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/            # Database seeders
├── resources/
│   └── views/              # Blade templates
│       ├── layouts/
│       ├── about.blade.php
│       ├── welcome.blade.php
│       └── payment-demo.blade.php
├── routes/
│   └── web.php            # Web routes
├── config/                # Configuration files
├── .env                   # Environment configuration
├── .env.example          # Example environment file
├── composer.json         # PHP dependencies
├── STUDY_PLAN.md        # 2-week curriculum
└── README.md            # This file
```

## Key Features

### 1. PHP OOP Demonstration
The project includes a complete payment processing system showcasing:
- **PaymentInterface**: Contract for all payment processors
- **Payment**: Abstract base class with common functionality
- **CreditCardPayment**: Concrete implementation for card payments
- **DigitalWalletPayment**: Concrete implementation for wallet payments

These classes demonstrate:
- Interfaces and contracts
- Abstract classes
- Inheritance
- Polymorphism
- Encapsulation

### 2. Laravel Routes
```php
GET  /                    # Home page
GET  /about              # About page with project info
GET  /payment-demo       # OOP and payment system demo
```

### 3. Blade Templates
- Master layout (`layouts/app.blade.php`)
- Home page (`welcome.blade.php`)
- About page (`about.blade.php`)
- Payment demo page (`payment-demo.blade.php`)

### 4. Environment Configuration
Configured `.env` file with:
- Database connection settings
- Application configuration
- Mail configuration
- Cache and session drivers

## Installation & Setup

### Prerequisites
- PHP 8.2 or higher
- Composer
- MySQL/MariaDB (or SQLite)
- Web browser

### Installation Steps

1. **Clone or download the project**
   ```bash
   cd laravel-11-internship
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Configure environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database** (edit `.env`)
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel_internship
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Create database**
   ```bash
   mysql -u root -p
   CREATE DATABASE laravel_internship;
   EXIT;
   ```

6. **Run migrations** (if migrations exist)
   ```bash
   php artisan migrate
   ```

7. **Start development server**
   ```bash
   php artisan serve
   ```

8. **Access the application**
   Open browser: `http://localhost:8000`

## Usage

### Viewing the Application
- **Home Page**: `http://localhost:8000/` - Overview and quick start guide
- **About Page**: `http://localhost:8000/about` - Project information
- **Payment Demo**: `http://localhost:8000/payment-demo` - OOP concepts explained

### Exploring the Code

1. **View Payment Classes**
   Navigate to `app/Classes/` directory to see:
   - `PaymentInterface.php` - The contract
   - `Payment.php` - Abstract base class
   - `CreditCardPayment.php` - First implementation
   - `DigitalWalletPayment.php` - Second implementation

2. **Review Routes**
   Check `routes/web.php` for route definitions

3. **Study Blade Templates**
   Examine `resources/views/` for templating examples

### Running Code Examples

The payment system can be used like this:
```php
// Credit card payment
$payment = new CreditCardPayment(
    '1234-5678-9012-3456',
    'John Doe',
    '12/25',
    '123'
);

if ($payment->pay(150.00)) {
    echo "Payment successful!";
}

// Digital wallet
$wallet = new DigitalWalletPayment('user_123', 'PayPal', 500.00);
$wallet->pay(75.00);
```

## Learning Path

Follow the **2-Week Study Plan** (STUDY_PLAN.md) covering:

### Week 1: Fundamentals
- Day 1: Environment Setup & PHP Basics
- Day 2: Laravel Routing & Blade Views
- Day 3: Object-Oriented Programming
- Days 4-5: Database Configuration & Setup

### Week 2: Intermediate Concepts
- Day 6: Controllers and Models
- Day 7: Validation and Error Handling
- Day 8: Authentication & Authorization
- Day 9: Advanced Features
- Day 10: Testing and Deployment

## Key Concepts Covered

### PHP Object-Oriented Programming
- Classes and objects
- Inheritance and abstract classes
- Interfaces and contracts
- Polymorphism
- Encapsulation

### Laravel Framework
- Routing and controllers
- Blade templating engine
- Eloquent ORM
- Database migrations
- Middleware

### Web Development
- HTTP methods (GET, POST, PUT, DELETE)
- MVC architecture
- RESTful principles
- Request/response cycle

## Directory Structure Details

### `/app/Classes/`
Custom PHP classes demonstrating OOP concepts:
```php
interface PaymentInterface { }      // Contract
abstract class Payment { }          // Base class
class CreditCardPayment { }        // Implementation 1
class DigitalWalletPayment { }     // Implementation 2
```

### `/app/Models/`
Eloquent models for database tables (add as needed):
- User model
- Post model
- Any other domain models

### `/database/`
Database-related files:
- **migrations/** - Schema definitions
- **seeders/** - Initial data

### `/resources/views/`
Blade template files:
- **layouts/** - Master templates
- Individual view files

### `/routes/`
Route definitions:
- `web.php` - Web routes (this project)
- `api.php` - API routes (if building API)

## Configuration Files

### .env
Environment variables for different environments:
- Database credentials
- Application settings
- Mail configuration
- Cache and session drivers

### composer.json
PHP package dependencies and autoloading configuration

### app/
Application configuration and code:
- Models
- Controllers
- Classes
- Providers

## Common Commands

```bash
# Development server
php artisan serve

# Create new controller
php artisan make:controller ControllerName

# Create new model
php artisan make:model ModelName

# Create migration
php artisan make:migration create_table_name

# Run migrations
php artisan migrate

# Database seeding
php artisan db:seed

# Clear cache
php artisan cache:clear

# Create new Blade view
php artisan make:view view-name
```

## Security Considerations

1. **Never commit .env file** - Contains sensitive data
2. **Use CSRF tokens** in forms - Laravel does this automatically
3. **Validate all user input** - Use form requests
4. **Hash passwords** - Use Laravel's Hash facade
5. **Sanitize output** - Blade automatically escapes by default
6. **Use HTTPS in production**
7. **Keep dependencies updated** - Run `composer update`

## Database Setup (Optional)

If you want to set up a full database:

1. **Create migration files**
   ```bash
   php artisan make:migration create_users_table
   php artisan make:migration create_posts_table
   ```

2. **Define schema in migration files**

3. **Run migrations**
   ```bash
   php artisan migrate
   ```

4. **Create models**
   ```bash
   php artisan make:model User
   php artisan make:model Post
   ```

## Testing

To add testing:
```bash
php artisan make:test ExampleTest --unit
php artisan test
```

## Troubleshooting

### "No .env file found"
```bash
cp .env.example .env
php artisan key:generate
```

### "Database connection refused"
- Check MySQL/MariaDB is running
- Verify DB_HOST, DB_USERNAME, DB_PASSWORD in .env
- Ensure database exists

### "Class not found"
- Run `composer dump-autoload`
- Check namespace matches file path

### "Port 8000 already in use"
```bash
php artisan serve --port=8001
```

## Further Learning

### Recommended Resources
- [Laravel 11 Official Docs](https://laravel.com/docs/11.x)
- [Laravel Best Practices](https://github.com/alexeymezenin/laravel-best-practices)
- [PHP PSR Standards](https://www.php-fig.org/psr/)
- [Design Patterns](https://refactoring.guru/design-patterns)

### Next Steps
1. Add database migrations
2. Create models and controllers
3. Build authentication
4. Implement feature tests
5. Deploy to production

## Project Information

- **Laravel Version**: 11.x
- **PHP Version**: 8.2+
- **Created**: February 2026
- **Purpose**: Intern training and onboarding

## License

This project is open source and available under the MIT License.

## Support

For questions about the project or study plan, refer to:
1. STUDY_PLAN.md - Detailed curriculum
2. Code comments in class files
3. Laravel documentation
4. PHP documentation

---

**Happy Learning!** 🚀
