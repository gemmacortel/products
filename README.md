**To start the application**

1. Enter the docker folder and run `docker-compose up -d` and `docker exec -it docker_php-fpm_1 composer update`
2. Your site is ready at localhost
3. To run a command `docker exec -it docker_php-fpm_1 bin/console app:basic-command`

**To run the tests**
After having started the application, run `docker exec -it docker_php-fpm_1 ./bin/phpunit `

Docker files from https://dev.to/martinpham/symfony-5-development-with-docker-4hj8
