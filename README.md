
# ForRent website

# Link : [https://test.careerna.com/](https://test.careerna.com)


## Features

-   Fully functional store website front-end and back-end built from scratch.
-   javascript, jquery, bootstrap and css for the front-end.
-   php and laravel for back-end.
-   mysql for database.
-   An artisan command to seed the database with all neccessary dummy data, even for voyager tables.
-   Different user roles and privileges(employee and employer).
-   share the job using link.
-   search for jobs.
-   add jobs
-   And much more features.


### Feature Includes

#### Employer

- **employer can add job**
- **complete profile**
- **update profile )**
- **change name**
- **change password**
- **employer can manage their own jobs**
- **edit job**
- **delete job**
- **show employees applied for a job and download cvs**

#### employee

- **Employee can apply for a job**
- **Employee can manage their profile (add education levels - experiences - skills and languages**
- **Employee can upload thier cv**
- **Employee can add the job to saved list**
- **Manage saved jobs**
- **delete job from saved list**
---

## Installation Guide

1. clone this repo to your local machine
2. copy `.example.env` to `.env` file
3. add your database credentials
4. run `composer install`
5. run `php artisan key:generate`
6. run `php artisan migrate --seed`

