# Laravel currency package

## Installation

cd to project.

```shell script
mkdir -p packages/sun

cd packages/sun

git clone https://github.com/KudryavtsevSergey/laravel-currency.git currency
```

in your composer.json

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "packages/sun/currency",
            "options": {
                "symlink": true
            }
        }
    ],
    "require": {
      "sun/currency": "dev-master"
    }
}
```

After updating composer, add the service provider to the ```providers``` array in ```config/app.php```

```php
Sun\Currency\CurrencyServiceProvider::class,
```

And add alias:
```php
'Currency' => Sun\Currency\Facade::class,
```

Then:

```shell script
php artisan migrate
```
