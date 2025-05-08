# Re-Authentication

> ⚠️ **Note**: This is a temporary educational project that will be updated soon with more features and improvements.

## About The Project

This is an educational PHP-based authentication system designed to demonstrate fundamental concepts of web security and user management. The project serves as a learning resource for understanding:

- User authentication and authorization
- Session management
- Database security
- PHP best practices
- Modern web development concepts

## Features

- User registration and login system
- Role-based access control (Admin/User)
- Session management
- Remember me functionality
- Responsive modern UI
- Secure password handling

## Local Setup

### Prerequisites

- PHP 7.4 or higher
- MySQL 8.0 or higher
- Web server (Apache/Nginx)

### Database Setup

1. Create a new MySQL database:
```sql
CREATE DATABASE login_system;
```

2. Import the database schema:
```bash
mysql -u your_username -p login_system < login_system.sql
```

3. Configure database connection:
   - Open `config.php` (create if not exists)
   - Add your database credentials:
```php
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
define('DB_NAME', 'login_system');
?>
```

### Running the Project

1. Clone the repository:
```bash
git clone https://github.com/yourusername/Re-Authentication.git
cd Re-Authentication
```

2. Place the project in your web server's root directory:
   - For XAMPP: `htdocs/`
   - For WAMP: `www/`
   - For MAMP: `htdocs/`

3. Access the project through your web browser:
```
http://localhost/Re-Authentication
```

## Default Credentials

For testing purposes, the system comes with a default admin account:
- Username: `admin`
- Password: `admin123`

**Important**: Change these credentials immediately after setup for security purposes.

## Upcoming Updates

This project is under active development. Planned updates include:

### Authentication Enhancements
- JWT (JSON Web Token) based authentication
- Re-authentication flow using JWT
- Multiple authentication methods:
  - Google OAuth 2.0 integration
  - Social login providers
  - Single Sign-On (SSO) support
- Enhanced security features
- Password reset functionality
- Email verification
- Two-factor authentication

### Technical Improvements
- API integration
- More user management features
- Improved session handling
- Rate limiting
- Security headers implementation

## Contributing

Feel free to contribute to this educational project. Your suggestions and improvements are welcome!

## License

This project is open-source and available for educational purposes.