# Hospital Triage Application

CSI3140 (WWW Structures, Techniques and Standards) - Assignment 4

## Developers
- Richa Kewalramani - 300284124
- Fay Lee - 300287876

## Overview
This is a web application designed to help hospital staff and patients better understand wait times in the emergency room. The application allows administrators to manage patient information and provides patients with an approximate wait time based on their name and a 3-letter code.

## Features
- Administrator panel for adding patients with their severity of injuries.
- Patient portal for checking approximate wait times.
- Real-time updates for patient list and wait times.

## Technologies Used
- HTML/CSS for front-end design
- JavaScript for client-side interactions
- PHP (server-side) for data processing
- PostgreSQL for database management

## Getting Started

### Prerequisites
- **PHP**: Make sure PHP is installed and configured.
- **PostgreSQL**: Ensure PostgreSQL is installed and running.
- **Web Server**: Use a local web server like XAMPP or WAMP.

### Setup Instructions

1. **Clone the Repository**
   ```bash
   git clone https://github.com/fayy-lee/hospital-triage-app

2. **Set up Database**
- Navigate to the sql directory: cd hospital-triage-app/sql
- Create the database and tables by running the SQL script: psql -U your_postgres_user -f create_db.sql

3. **Configure Database Connection**
- Open db_config.php and update the database credentials:
$host = 'localhost';
$dbname = 'hospital_triage';
$user = 'your_username';
$pass = 'your_password';

4. **Place Files in Web Server Directory**
- Copy the project files to your web server's root directory (htdocs for XAMPP or www for WAMP).

5. **Access the Application**
- Open your web browser and navigate to http://localhost/hospital-triage-app/index.html

## Usage

### Admin Perspective
1. **Adding Patients**
   - Go to the **Administrator Panel**.
   - Enter the patient’s name and select the severity of their injury.
   - Click **Add Patient**.
   - The patient’s information will be added to the database.

2. **Viewing Patients**
   - Admins can view the list of patients and their details directly in the database.

### Patient Perspective
1. **Checking Wait Time**
   - Go to the **Patient Portal**.
   - Enter your name and 3-letter code provided by the administration.
   - Click **Check Wait Time**.
   - Your approximate wait time will be displayed.

## Notes
- Ensure your web server is running before accessing the application.
- Make sure the `db_config.php` file contains the correct database credentials.

### Past Course Assignments
- **Assignment 1: [Link to A1 Repository](https://github.com/fayy-lee/portfolio)**
- **Assignment 2 and Assignment 3: [Link to A2 and A3 Repository (A2 is under versions)](https://github.com/fayy-lee/yatzygame)**
