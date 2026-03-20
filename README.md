# Kaithy Portfolio

A clean, minimalist, and artistic portfolio built with Laravel and Tailwind CSS.

## Features

- **Artistic Gallery**: Optimized display of artworks with categories.
- **Admin Dashboard**: Full control over content, categories, and image metadata.
- **Optimized Media**: Automatic image conversions for fast loading and high quality.
- **Production Ready**: Configured for Railway deployment with secure HTTPS and optimized server settings.

## Deployment on Railway

The application is deployed on Railway using Nixpacks.

### Environment Requirements
- PHP 8.4
- Postgres database
- `APP_KEY`
- `DATABASE_URL`

### Custom Configuration
- `php.ini`: Increased upload limit to 32MB.
- `post-deploy.sh`: Automated migrations and storage link setup.

## License

This project is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
