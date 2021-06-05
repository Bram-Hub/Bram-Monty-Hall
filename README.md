<p align="center"><a href="https://laravel.com" target="_blank"><img src="http://scer.rpi.edu/sites/default/files/logo-with-tag.jpg" width="400"></a></p>

# Developer Installation Guide
The website is currently being hosted on Heroku with a Laravel backend implementation and MySQL as the database. As such, backend developers will need to install PHP7, Composer, MySQL, and Git. Frontend developers will need to install PHP7, Composer, and Git.

## Installing Git
1. For easy installation, it is recommend to install the [GitHub Desktop](https://desktop.github.com/) Client for Mac and Windows Machines
2. On Debian machines, running `sudo apt install git` should install the git CLI. As a note, you will need to authenticate your terminal by generating a token. Please refer to the [GitHub Docs](https://docs.github.com/en/github/authenticating-to-github/keeping-your-account-and-data-secure/creating-a-personal-access-token) for details.

## Install PHP

### Windows
1. Head to the official [PHP](https://www.php.net/downloads.php) download page and down the current stable PHP7 version.
2. Extract the folder on your desktop.
3. Run `php.exe`
4. Open `command prompt` and verify installation by running `php --verison`

### Mac
1. Download the [brew](https://docs.brew.sh/Installation) package manager for Mac
2. Run in Terminal `brew install php`
2. Verify installation by running `php -v`

### Debian/Ubuntu
1. Open terminal and run the following command `sudo apt install php libapache2-mod-php`
2. Verify installation by running `php -v`

## Install MySQL

### Debian/Ubuntu
1. Open the terminal and issue the following command: `sudo apt install mysql-server`
2. This will install the MySQL server package (you can use `apt info mysql-server` to see package into)
3. Verify the package is installed by running `mysql --version`

### Mac
1. Download the [brew](https://docs.brew.sh/Installation) package manager for Mac
2. Run in Terminal `brew install mysql`
2. Verify the package is installed by running `mysql --version`

### Windows
1. TBD

## Install Composer

### Debian / Ubuntu
1. Open the terminal and run the following: `sudo apt install composer`
2. Check to see that composer was installed successfully: `composer --version`

## Running a local Laravel server
Laravel comes built-in with the ability to run a local webserver using just PHP. In order to run a local version of the website and see your changes, please clone the Git repository. 


### Setting up the Laravel environment
1. Open the root file directory of the project using your terminal (`cd location\of\your\folder`)
2. Copy the file `.env.example` and rename it as `.env`, make sure this file is hidden!
3. Run `composer install` to install required packages
4. Run `php aritsan generate:key` to generate a valid `APP_KEY`
5. Run `php artisan serve` to actually run the webserver. Use this command after setup.

# Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

# License

Open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
