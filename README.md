# AI Form Builder

## Overview

This project is built using Laravel 11. It allows users to create dynamic forms, publish them, collect submissions, and export submissions as CSV.

---

## Tech Stack

- Laravel 11
- PHP 8+
- MySQL
- Livewire
- Bootstrap
- Laravel Excel

---

# Part A Features

### 1. Dynamic Form Builder
- Create new forms
- Add dynamic fields
- Edit field labels
- Save form schema

### 2. Public Form
- Public URL for every form
- Users can submit responses

### 3. Store Submissions
- Save form submissions in the database
- Store submitted field values

### 4. Search
- Search submissions by submitted values

### 5. Pagination
- Display submissions with pagination

### 6. CSV Export
- Export all submissions of a form into a CSV file using Laravel Excel

---

## Installation

```bash
git clone <repository-url>

cd ai-form-builder

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan serve
```

---

## Database

Run:

```bash
php artisan migrate
```

---

## CSV Export

Open the submissions page and click **Export CSV** to download all submissions of the selected form.

---

## Author

Toshi Singh