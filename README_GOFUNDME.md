# GoFundMe Clone - Laravel 12

A mini GoFundMe-like application built with Laravel 12, featuring user authentication, donation posts, and donation management.

## Features

### Users
- ✅ Register, login, logout
- ✅ Create donation posts (title, description, target amount, optional image)
- ✅ Share posts
- ✅ Edit and delete their own posts

### Donations
- ✅ Anyone can view posts
- ✅ Donate anonymously or with an account
- ✅ Show target vs filled amount with progress bars
- ✅ Show list of donors (hide anonymous donations)
- ✅ Mock donation/payment logic (no real payment integration)

### Technical Features
- ✅ Eloquent models and relationships
- ✅ Database migrations
- ✅ Controllers with proper authorization
- ✅ RESTful routes
- ✅ Beautiful Blade views with Bootstrap 5
- ✅ Sample data seeding
- ✅ Docker development environment

## Quick Start

### Option 1: Using the Setup Script
```bash
# Make the setup script executable and run it
chmod +x setup.sh
./setup.sh
```

### Option 2: Manual Setup
```bash
# Start Docker containers
docker compose -f compose.dev.yaml up -d

# Run migrations
docker compose -f compose.dev.yaml exec workspace php artisan migrate --force

# Seed the database with sample data
docker compose -f compose.dev.yaml exec workspace php artisan db:seed --force

# Create storage link for file uploads
docker compose -f compose.dev.yaml exec workspace php artisan storage:link
```

## Access the Application

- **Application**: http://localhost
- **Test User**: 
  - Email: test@example.com
  - Password: password

## Project Structure

### Models
- `User` - User authentication and profile
- `Post` - Donation posts with relationships
- `Donation` - Individual donations with donor information

### Controllers
- `PostController` - CRUD operations for posts
- `DonationController` - Handle donation creation and viewing

### Views
- `layouts/app.blade.php` - Main application layout
- `posts/` - Post listing, creation, editing, and viewing
- `donations/` - Donation forms and display
- `auth/` - Login and registration forms

### Database
- `posts` table - Stores donation posts
- `donations` table - Stores individual donations
- Proper foreign key relationships and constraints

## Key Features Implemented

### 1. User Authentication
- Laravel's built-in authentication system
- Login/register forms with Bootstrap styling
- User session management

### 2. Post Management
- Create posts with title, description, target amount, and image
- View all posts with progress indicators
- Edit/delete posts (authorized users only)
- Image upload with storage management

### 3. Donation System
- Anonymous and named donations
- Real-time progress tracking
- Donor list display (respecting anonymity)
- Mock payment processing

### 4. UI/UX Features
- Responsive Bootstrap 5 design
- Progress bars for donation goals
- Card-based layout for posts
- Interactive donation forms
- Success/error message handling

### 5. Data Relationships
- User has many Posts
- User has many Donations
- Post has many Donations
- Post belongs to User
- Donation belongs to User and Post

## Sample Data

The application includes seeders that create:
- 6 test users
- 8 sample donation posts with realistic content
- 3-8 donations per post with varied amounts
- Mix of anonymous and named donations

## Development Notes

- Uses Docker for development environment
- PostgreSQL database
- Redis for caching
- File storage for post images
- Laravel 12 with modern PHP 8.2+

## Extending the Application

The codebase is structured for easy extension:
- Add real payment processing (Stripe, PayPal)
- Implement email notifications
- Add post categories and tags
- Create user profiles and dashboards
- Add comment system for posts
- Implement search and filtering
- Add social sharing features

## Security Features

- CSRF protection on all forms
- Authorization policies for post editing/deletion
- Input validation and sanitization
- Secure file upload handling
- SQL injection prevention through Eloquent ORM

This application provides a solid foundation for a crowdfunding platform and demonstrates modern Laravel development practices with clean, maintainable code.
