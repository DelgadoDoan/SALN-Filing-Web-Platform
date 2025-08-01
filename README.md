# SALN Filing Web Platform
The Project is a Laravel 12 application that allows users to securely file their Statement of Assets, Liabilities, and Net Worth (SALN) online.

## Table of Contents
- [Description](#description)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Deployment and Access](#deployment-and-access)
- [Running Locally](#running-locally)
- [Authors](#authors)
- [Acknowledgements](#acknowledgements)

---
## Description
The SALN (Statement of Assets, Liabilities, and Net Worth) is a transparency document required of public officials, but the process of filling it up manually may be error-prone and tedious. This project introduces a web-based SALN filing platform to streamline the process, offering digital form entry, JSON import/export, PDF generation/export, and a passwordless authentication method via a magic link. This ensures that all information supplied by the user is both correct and consistent. The app only aids in digital SALN form generation and does not handle official submission of the document. 

The app is mainly built using the Laravel 12 web framework, with PHP version 8.4.

---
## Features

### Authentication 
- **Magic Link Login:** The users can create and access accounts using third-party providers such as Google, GitHub, and Apple with no passwords involved

### SALN Form Creation 
- The users can start a SALN form wherein it covers all required sections such as personal information, family details, assets, liabilities, business interests, and relatives in government

### Storage
- All SALN forms and related user data are securely stored in a **SQLite database**

### PDF Generation
- The users can preview and generate a printable A4 PDF version of their SALN form. The generated PDF will follow the official layout of the government-issued form.

### Import and Export JSON
- SALN Forms can be exported and imported as JSON files for local backup or transfer between devices

---
## Tech Stack
- **Backend:** Laravel 12 (PHP 8.4)
- **Frontend:** Blade
- **Database:** SQLite
- **Deployment:** Docker + Render
- **Libraries:**
  - **DomPDF** – PDF generation

---
## Deployment and Access

### Live Application Link
Live version of the application can be accessed thorugh this link: [https://saln-filing-web-platform.onrender.com](https://saln-filing-web-platform.onrender.com)


### Deployment Details
- **Containerization:** Docker
- **DockerHub Repo:** [doandelgado/saln-filing-web-platform](https://hub.docker.com/r/doandelgado/saln-filing-web-platform)
- **Hosting Platform:** Render

---
## Running Locally

### Step 1: Clone the Repo
```zsh
git clone git@github.com:DelgadoDoan/SALN-Filing-Web-Platform.git
```

### Step 2: Install Dependencies

Navigate to the project directory and install PHP dependencies:

```zsh
composer install
```

### Step 3: Setup the Environment
> 💡 **Note:** Make sure you’ve enabled 2FA on your Gmail account.

To configure email for authentication:
1. Copy the example environment file:
   ```bash
   cp .env.example .env
   ```
2. Generate app key:
   ```bash
   php artisan key:generate
   ```
2. Enable 2FA on your Gmail account.
3. Generate an app password.
4. Configure your `.env` file:
   ```dotenv
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.gmail.com
   MAIL_PORT=465
   MAIL_USERNAME=your-email@gmail.com
   MAIL_PASSWORD=your-app-password    # Gmail app password
   MAIL_FROM_ADDRESS=your-email@gmail.com
   MAIL_FROM_NAME="${APP_NAME}"```

### Step 4: Run Database Migrations
Setup the database tables:
```zsh
php artisan migrate
```

### Step 5: Start the Web Server 
```zsh
php artisan serve
```

---
## Authors
- [Doan Delgado](https://github.com/DelgadoDoan)
- [Anton Chio](https://github.com/antonbc)
- [Daniel Yap](https://github.com/DayiYap)

---
## Acknowledgements
- [Laravel 12 Documentation](https://laravel.com/docs/12.x) for clear and comprehensive documentation.
- [DomPDF](https://github.com/barryvdh/laravel-dompdf) for PDF generation.
- [Render.com](https://render.com) for free web service hosting.
- [Magic Link Authentication with Laravel](https://tuts.codingo.me/magic-link-login-laravel)
- [Laravel containerization with Docker](https://youtu.be/uYhowDSkwyk?feature=shared)
- [List of Philippine Regions](https://github.com/flores-jacob/philippine-regions-provinces-cities-municipalities-barangays.git)