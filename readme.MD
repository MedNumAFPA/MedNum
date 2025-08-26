# ReservationAtelierMediationNumerique

A simple web application for booking time slots at digital mediation workshops.

## 🎯 Project Goal

The goal is to create a straightforward booking system. Users scan a QR code to access a web page where they can reserve an available time slot for workshops. A staff member, acting as an administrator, can log into a dashboard to add or remove these time slots and workshops.

## ✨ Key Features

-   **QR Code Access:** Users can instantly access the booking page with a simple scan.
-   **Simple Booking:** The reservation process is designed to be quick and easy.
-   **Admin Dashboard:** A secure area for staff to manage the schedule.
-   **Dynamic Schedule:** Admins can add or remove available workshops and time slots as needed.

## 🚀 How It Works

### User Flow
1.  **Scan** the QR code at the workshop location.
2.  **View** the list of available dates and times.
3.  **Select & Book** an open slot.

### Admin Flow
1.  **Log in** to the admin dashboard.
2.  **View** the complete schedule and all current reservations.
3.  **Add** new time slots or **remove** existing ones.

## 🛠️ Getting Started

To get a local copy up and running, follow these steps.

1.  **Clone the repository:**
    ```sh
    git clone https://github.com/your-username/MedNum.git
    ```

2.  **Navigate into the project directory:**
    ```sh
    cd MedNum
    ```

3.  **Install PHP dependencies with Composer:**
    This command will download all the necessary PHP libraries for the project.
    ```sh
    composer install
    ```

4.  **Configure your local environment:**
    The project uses `.env` files for configuration. You need to create a local override file for your machine.

    a. **Create your local environment file** by copying the template:
    ```sh
    cp .env .env.local
    ```
    *This `.env.local` file is ignored by Git and will contain your personal settings.*

    b. **Open the `.env.local` file** and find the `DATABASE_URL` line.

    c. **Update the line** to connect to your local database. **Important:** The database must be named `mednum`.

    Here is an example for a MariaDB/MySQL database:
    ```env
    # Replace 'username' and 'password' with your actual database user and password.
    # Make sure the database 'mednum' exists on your local server.
    DATABASE_URL="mysql://username:password@127.0.0.1:3306/mednum?serverVersion=11.8.2-MariaDB&charset=utf8mb4"
    ```

5.  **Set up the database:**
    Once your `.env.local` is configured, you can create the database and run migrations.
    ```sh
    # Creates the database if it doesn't exist
    symfony console doctrine:database:create

    # Runs all migrations to create the necessary tables
    symfony console doctrine:migrations:migrate
    ```

6.  **Run the application:**
    You can use the built-in Symfony web server to run the project locally.
    ```sh
    symfony serve
    ```
