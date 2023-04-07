#!/bin/bash
sudo docker exec -it docker_myapp_1 composer dump-autoload

sudo docker exec -it docker_myapp_1 /opt/bitnami/php/bin/php artisan cache:clear
sudo docker exec -it docker_myapp_1 /opt/bitnami/php/bin/php artisan cache:clear
sudo docker exec -it docker_myapp_1 /opt/bitnami/php/bin/php artisan config:clear
sudo docker exec -it docker_myapp_1 /opt/bitnami/php/bin/php artisan migrate
sudo docker exec -it docker_myapp_1 /opt/bitnami/php/bin/php artisan key:generate
sudo docker exec -it docker_myapp_1 /opt/bitnami/php/bin/php artisan migrate:fresh --seed
sudo docker exec -it docker_myapp_1 /opt/bitnami/php/bin/php artisan db:seed --class=UserTableSeeder
mysql -u root -h 127.0.0.1 bitnami_myapp < ProjectSemester2Stations.sql
