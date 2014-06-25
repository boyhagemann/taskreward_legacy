
## TaskReward
Check out [Shopzoo] (/boyhagemann/shopzoo) that acts as a data provider.

### Dev Requirements
- Laravel Homestead
- Elasticsearch 1.*
- NodeJs
- Bower
- Gulp

### Install
* create a new database named `taskreward`
* use `php artisan app:install` to migrate and seed the database
* add alias in the `Homestead.yml` file pointing to the public application folder.
* update the Windows hosts file (e.g. taskreward.app 127.0.0.1)
* use [Shopzoo] (/boyhagemann/shopzoo) to add tasks to the system using the API.

### Stylesheets
* First install Nodejs.
* Then install bower using `npm install bower`.
* Install the Bower dependencies using `bower install`.
* Use `gulp watch` or `gulp sass` to compile the .scss files into one `main.min.css` file.
This stylesheet is used in all layouts.


## API for data providers
To add tasks to the system:
`POST /api/tasks/create`
This accepts one or more Task objects, containing:


To grant a reward you call this uri:
`POST /api/rewards/create`
This accepts one or more Reward objects, containing:
* uid (string) : unique identifier for the product
* token (string) : token used in the system that references the user and task
* value (float) : the reward value
* currency (string) : the currency used for the value



