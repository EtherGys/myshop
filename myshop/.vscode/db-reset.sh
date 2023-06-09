# Reset Database
# --

# Clear shell history
clear;

# Drop database
php bin/console doctrine:database:drop --force

# Delete the \"/migrations\" directory
rm -r migrations/*

# Delete the \"/public/uploads\" directory
# rm -r public/uploads;

# Create database
php bin/console doctrine:database:create

# Create Migration
# mkdir migrations
php bin/console make:migration
php bin/console doctrine:migrations:migrate --no-interaction