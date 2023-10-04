# Turn on maintenance mode
php artisan down || true

# Pull the latest changes from the git repository
# git reset --hard
# git clean -df
git pull

# Install/update composer dependecies
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# Run database migrations
# php artisan migrate --force
php artisan migrate

# Clear and cache routes
php artisan route:cache

# Clear and cache config
php artisan config:cache

# Clear and cache views
php artisan view:cache

# Clear and cache events
php artisan event:cache

# Restart queue worker
php artisan queue:restart

# Turn off maintenance mode
php artisan up
