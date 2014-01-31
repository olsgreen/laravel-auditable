# Auditable #
An easy to implement attribute audit log for Eloquent ORM in Laravel 4.X.

## Installation
Add the repository to your `composer.json`:

	"repositories": [
	    {
	        "type": "vcs",
	        "url": "https://github.com/olsgreen/laravel-auditable"
	    }
	],

and also require `Auditable`:

	
	"require": {
		"laravel/framework": "4.1.*",
		"olsgreen/laravel-guardian": "dev-master",
	},
Run `composer update` to update your app or `composer install` to install.

After install / update you will need to run the packages migrations like so:

	php artisan migrate --package="olsgreen/auditable"

and also add `Auditable` as a service provider within your `app/config/app.php`:

	'providers' => array(

		'Illuminate\Foundation\Providers\ArtisanServiceProvider',
		'Illuminate\Auth\AuthServiceProvider',
		..........

		// Auditable - add this line below the others
		'Olsgreen\Auditable\AuditableServiceProvider',
	),

After this you'll be ready to go.

## Getting started
Auditable offers two methods of implementation:

1. Inheritance, by using our `AuditableModel` as a base class.
2. Adding a model event observer.

### Using Auditable via inheritance
To come.

### Using Auditable via a model event observer
To come.

## License
Copyright (c) 2014 Oliver Green

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.