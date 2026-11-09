
# Laravel POS - TFA7 Forms, Validation, and File Upload

## Features Implemented
- Create, edit, update customers (/customers/*)
- Create, edit, update users with avatar upload (/users/*)
- Form validation with old input preservation
- Avatar upload with GD image resize to 200x200 thumbnail
- Storage on public disk
- Migrations: customers table, users.avatar column
- Seeders for initial data

## Run locally
```
php artisan migrate --seed
php artisan serve
```

## Routes
- /customers (resource)
- /users (resource with avatar upload)
