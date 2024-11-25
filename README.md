## Requirements

Before starting, ensure you have the following installed on your machine:

- **PHP** (Version 8.1 or higher)
- **Composer** (Dependency management for PHP)
- **Node.js** (Version 16 or higher) and **npm** or **yarn** for frontend dependencies
- **MySQL** (or your preferred database system)
- **Git** (Version control)

## Installation Steps

### Clone the Repository

```bash
git clone https://github.com/your-repo/quest-of-middle-earth.git
cd quest-of-middle-earth
```

### Install backend dependencies

```bash
composer install
```

### Edit environment variables

Edit the .env file to match your local environment settings.

### Set up database and populate it

```bash
php artisan migrate
```
```bash
php artisan db:seed
```

### Install frontend assets

```bash
npm install
```
For a production build of frontend assets, use:
```bash
npm run build
```
