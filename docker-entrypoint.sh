#!/bin/bash
set -e

# Wait for database if needed (optional)
# while ! nc -z db 3306; do
#   echo "Waiting for database connection..."
#   sleep 1
# done

# Run database migrations
php artisan migrate --force

# Start supervisor (if you're using it)
# supervisord -c /etc/supervisor/supervisord.conf

# Execute CMD
exec "$@"
