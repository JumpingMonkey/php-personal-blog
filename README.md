# Personal Blog

A simple and elegant personal blog built with PHP, Docker, and Tailwind CSS. This blog features a clean, responsive design and includes both guest and admin sections.

## Features

- **Guest Section**
  - Home page with a list of published articles
  - Individual article pages with full content
  - Responsive design using Tailwind CSS
  - Markdown support for article content

- **Admin Section**
  - Secure login system
  - Dashboard to manage articles
  - Create new articles
  - Edit existing articles
  - Delete articles
  - Markdown editor for content

## Prerequisites

- Docker
- Docker Compose

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
│   └── index.php          # Application entry point
├── src/
│   ├── Controllers/       # Application controllers
│   ├── Models/           # Application models
│   └── Router.php        # Simple routing system
├── storage/
│   └── articles/         # JSON files for articles
├── templates/            # PHP templates
│   ├── admin/           # Admin section templates
│   └── layout.php       # Base layout template
├── docker-compose.yml    # Docker Compose configuration
├── Dockerfile           # Docker configuration
└── composer.json        # PHP dependencies
```

## Development

- The application uses a simple file-based storage system with JSON files
- Articles are written in Markdown format
- Tailwind CSS is included via CDN for styling
- The router supports basic pattern matching for URLs

## Security Notes

For production deployment:
1. Change the default admin credentials
2. Implement proper password hashing
3. Set up HTTPS
4. Configure proper session handling
5. Implement CSRF protection
6. Set up proper file permissions

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a new Pull Request


## Project URL
[roadmap.sh PHP Personal Blog Project](https://roadmap.sh/projects/personal-blog)