# ReservationAtelierMediationNumerique

A simple web application for booking time slots at digital mediation workshops.

## 🎯 Project Goal

The goal is to create a straightforward booking system. Users scan a QR code to access a web page where they can reserve an available time slot ("atelier"). A staff member, acting as an administrator, can log into a dashboard to add or remove these time slots.

## ✨ Key Features

-   **QR Code Access:** Users can instantly access the booking page with a simple scan.
-   **Simple Booking:** The reservation process is designed to be quick and easy.
-   **Admin Dashboard:** A secure area for staff to manage the schedule.
-   **Dynamic Schedule:** Admins can add or remove available hours as needed.

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

3.  **Install dependencies:**
    ```sh
    # This command will depend on your project's package manager
    npm install
    ```

4.  **Configure your environment:**
    -   Create a `.env` file if required by the project.
    -   Add any necessary configuration variables (like database URLs or admin credentials).

5.  **Run the application:**
    ```sh
    # This command will start the development server
    npm start
    ```
