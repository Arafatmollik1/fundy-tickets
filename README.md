# Project Fundy: A Fundraising Web Application

## Overview

Project Fundy is a web application designed to simplify the process of creating and managing fundraising events. It provides a platform for organizers to create fundraising pages and for users to easily donate to causes they care about.

## Key Features

### For Organizers (Super Users)

- **Create Fundraising Events:** Organizers can create new fundraising events with details such as a title, description, donation amount, event date, and location.
- **Upload Event Images:** Each event can have a custom image to make it more appealing to potential donors.
- **Manage Events:** Organizers have access to a dashboard where they can view and manage their created events.
- **Track Donations:** Organizers can view a list of all donations made to their events.

### For Donors

- **View Fundraising Events:** Donors can browse and view the details of different fundraising events.
- **Make Donations:** The donation process is simple and straightforward. Donors can make a donation for a specific event.
- **View Donation History:** Donors can view a history of their past donations.

## How to Use

### As an Organizer (Super User)

1.  Log in to the application.
2.  Navigate to the "Super User" dashboard.
3.  Click on "Create Fund Event" to create a new fundraising event.
4.  Fill in the event details and upload an image.
5.  Submit the form to create the event.

### As a Donor

1.  Navigate to the application.
2.  You will be prompted to enter a "Fund ID" for the event you wish to support.
3.  Once you have entered a valid Fund ID, you will be taken to the event page.
4.  Click on the "Donate Now" button to proceed with the donation.
5.  Follow the instructions to complete your donation.

---

## Installation

Before proceeding, ensure you have Php, Composer, Node.js and npm installed on your machine.

### Clone the project

```bash
git clone <this_project_url>
```

### MYSQL installation

There is a mysql docker image, you can go there and run the following command

```bash
docker-compose up
```
and wait for the image to be build. The DB information can be found in the yml file

### Install PHP dependencies:

```bash
composer install
```

### Install JS dependencies:

```bash
npm install
```

### Create a `.env` file:

```bash
cp .env.example .env
```

### Generate app key and add to .env

```bash
php artisan key:generate --show
```

Add the generated key to the `APP_KEY` variable in the `.env` file.

### Migrate the database:

```bash
php artisan migrate
```

### Run the backend server:

```bash
php artisan serve
```

### Run the frontend server:

```bash
npm run dev
```
Now you should see the app in http://127.0.0.1:8000/
However, If you see error in the frontend such as "Failed to open stream: No such file"

Then run the following

```bash
mkdir -p storage/framework/{cache,sessions,views} \
  && mkdir -p bootstrap/cache \
  && chmod -R 775 storage bootstrap/cache \
  && sudo chown -R $USER:$USER storage bootstrap/cache

php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

