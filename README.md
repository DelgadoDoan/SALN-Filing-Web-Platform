# SALN Filing Web Platform
The Project is a Laravel 12 application that allows users to securely file their Statement of Assets, Liabilities, and Net Worth (SALN) online. It features a magic link authentication system (no passwords required), uses SQLite for lightweight data storage, and provides PDF export as well as JSON import/export of SALN forms.  

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

## Deployment and Access

### Live Application link
[https://saln-filing-web-platform.onrender.com](https://saln-filing-web-platform.onrender.com)


### Deployment Details
- **Containerization:** Docker
- **Hosting Platform:** Render

### Deployment Process
1. 


## How to Run the Project Locally

### Step 1: Clone the project
```zsh
git clone git@github.com:DelgadoDoan/SALN-Filing-Web-Platform.git
```

### Step 2: Install Dependencies

Navigate to the project directory and install PHP dependencies:

```zsh
composer install

```

### Step 3: Run Database Migrations

Set up the database tables:

```zsh
php artisan migrate
```

### Step 4: Run the Project 
```zsh
php artisan serve
```
