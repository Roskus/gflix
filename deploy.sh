git fetch
# Update branch
git pull origin main
# Install dependencies
composer install --no-dev --optimize-autoloader
# Run DB migration
php artisan migrate --force
