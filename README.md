# De-minimis

Tool for managing de-minimis grants.

### Installation

- ``git clone git@github.com:joschaefer/de-minimis.git`` and cd into ``de-minimis``
- create `.env` file with all environment specific configuration
- ``php artisan key:generate`` to generate a unique app secret key
- ``composer install``
- ``npm install``

### Run for development

- ``npm run dev`` to run laravel mix to compile css, js and other assets
- ``php artisan storage:link`` to link storage folder to public assets
- ``php artisan migrate:fresh --seed`` to (re-)fill database with test data
- ``php artisan serve`` to run the development server at ``http://127.0.0.1:8000``
- ``php artisan queue:work`` to run the queue worker

### Run for production

- ``npm run prod`` to run laravel mix to compile css, js and other assets
- ``php artisan storage:link`` to link storage folder to public assets
- ``php artisan migrate`` to create all migrations
- Point nginx or other server to ``/public`` ([more info here](https://laravel.com/docs/0.x/deployment))
- Install Supervisor to run the queue worker ([more info here](https://ekn.me/2019-11-05/how-to-use-laravel-queue-worker-with-supervisor))
