# Personal Blog

A simple and elegant personal blog built with PHP, Docker, and Tailwind CSS. This blog features a clean, responsive design and includes both guest and admin sections.

## Features

### Guest Section
- Home page with a list of published articles
- Individual article pages with full content
- Responsive design using Tailwind CSS
- Markdown support for article content
- Clean and modern UI
- Mobile-friendly layout

### Admin Section
- Secure login system
- Dashboard to manage articles
- Create new articles with Markdown support
- Edit existing articles
- Delete articles with confirmation
- Preview articles before publishing
- One-click logout functionality

## Prerequisites

- Docker
- Docker Compose
- Apache with mod_rewrite enabled

## Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd php-personal-blog
```

2. Build and start the Docker container:
```bash
docker-compose up -d --build
```

3. Install PHP dependencies:
```bash
docker-compose exec web composer install
```

4. Create the articles storage directory:
```bash
docker-compose exec web mkdir -p storage/articles
docker-compose exec web chmod 777 storage/articles
```

5. Verify Apache configuration:
   - Ensure mod_rewrite is enabled
   - The .htaccess file in the public directory should be properly configured
   - Apache should have AllowOverride All set for the project directory

## URL Rewriting

The application uses Apache's mod_rewrite for clean URLs. The `.htaccess` file in the `public` directory contains the following configuration:

```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ index.php [QSA,L]
```

This configuration:
- Enables the rewrite engine
- Skips rewriting for existing files and directories
- Routes all other requests to index.php
- Preserves query string parameters
- Stops processing other rules after a match

## Usage

Once the application is running, you can access it at:
- Guest section: http://localhost:8080
- Admin section: http://localhost:8080/admin/login

### Default Admin Credentials
- Username: admin
- Password: admin123

**Note:** For production use, make sure to change the default admin credentials in `src/Controllers/AdminController.php`.

## Project Structure

```
php-personal-blog/
├── public/
│   ├── index.php         # Application entry point
│   └── .htaccess        # URL rewriting rules
├── src/
│   ├── Controllers/     # Application controllers
│   │   ├── AdminController.php
│   │   ├── ArticleController.php
│   │   └── HomeController.php
│   ├── Models/         # Application models
│   │   └── Article.php
│   └── Router.php      # Simple routing system
├── storage/
│   └── articles/       # JSON files for articles
├── templates/          # PHP templates
│   ├── admin/         # Admin section templates
│   │   ├── create.php
│   │   ├── dashboard.php
│   │   ├── edit.php
│   │   └── login.php
│   ├── article.php    # Single article template
│   ├── home.php       # Homepage template
│   └── layout.php     # Base layout template
├── docker-compose.yml  # Docker Compose configuration
├── Dockerfile         # Docker configuration
└── composer.json      # PHP dependencies
```

## Development

### Storage System
- Uses a simple file-based storage system with JSON files
- Each article is stored as a separate JSON file
- Files are stored in the storage/articles directory
- Automatic creation of storage directory on setup

### Frontend
- Tailwind CSS via CDN for styling
- Responsive design that works on all devices
- Modern UI components and transitions
- Clean typography with proper spacing
- Interactive elements with hover states

### Backend
- Simple and efficient routing system
- MVC-like architecture
- Session-based authentication
- Markdown parsing for article content
- Clean separation of concerns

## Security Notes

For production deployment:
1. Change the default admin credentials
2. Implement proper password hashing
3. Set up HTTPS
4. Configure proper session handling
5. Implement CSRF protection
6. Set up proper file permissions
7. Configure secure headers
8. Implement rate limiting
9. Set up proper error logging
10. Regular security updates

## Server Requirements

- PHP 8.0 or higher
- Apache 2.4 or higher
- mod_rewrite enabled
- JSON extension
- FileInfo extension
- proper file permissions for storage directory

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## License

This project is open-sourced software licensed under the MIT license.

## Troubleshooting

### Common Issues

1. **URL Rewriting Not Working**
   - Verify mod_rewrite is enabled
   - Check .htaccess file exists in public directory
   - Ensure Apache configuration allows .htaccess override

2. **Storage Permission Issues**
   - Run chmod commands as specified in installation
   - Verify web server user has write permissions

3. **Blank Page or 500 Error**
   - Check PHP error logs
   - Verify all dependencies are installed
   - Ensure PHP version compatibility