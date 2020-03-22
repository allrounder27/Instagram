# Instagram

> This is a Instagram clone based on MVC architecture.

## Setup

1.  Clone the repository and `cd` into it.

2.  Install composer using:

    ```console
    > curl -s https://getcomposer.org/installer | php
    > sudo mv composer.phar /usr/local/bin/composer
    ```

3.  Install dependencies and dump-autoload:

    ```console
    > composer install
    > composer dump-autoload
    ```

4.  Copy `config/sample.config.php` as `config/config.php` and edit it accordingly:

    ```console
    > cp config/sample.config.php config/config.php
    # Edit the file using your mysql database credentials
    ```

5.  Import schema present in `schema/schema.sql` in your database.

6.  Serve the public folder at any port (say 8000):
    ```console
    > cd public
    > php -S localhost:8000
    ```
