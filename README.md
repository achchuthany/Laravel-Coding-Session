# Laravel Coding Session

Welcome to the Laravel Coding Session repository! This guide will walk you through the essential steps of building a Laravel application, covering installation, folder structure, CRUD operations, user authentication, and Bootstrap integration.

## Table of Contents

1. [Installation](#installation)
    1. [Create a Project](#create-a-project)
    2. [Change Initial Configuration](#change-initial-configuration)
    3. [Environment Based Configuration](#change-initial-configuration)
2. [Understanding Folder Structure](#folder-structure)
3. [Creating a Post Model](#post-model)
4. [Implementing CRUD Operations](#crud-operations)
5. [Implementing User Authentication](#user-authentication)
6. [Installing Bootstrap](#installing-bootstrap)

## Installation

### Create a Project

Follow these steps to install Laravel on your machine:

```bash
composer create-project laravel/laravel Laravel-Coding-Session
```

```
cd Laravel-Coding-Session
```

Start Laravel's local development server:

```
php artisan serve
```

### Change Initial Configuration

`config/app.php` : timezone and locale that you may wish to change according to your application.

### Environment Based Configuration

Create a copy of your `.env` file from `.env.example`

```
cp .env.example .env
```

Update `.env` based on you requirements.

generate the app encryption key: encrypting cookies and session

```
php artisan key:generate
```
