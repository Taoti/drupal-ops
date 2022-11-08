# taoti/drupal-ops

This project provides managed/simplified updating of some of Taoti's Drupal standard ops aspects
for sites as well as taking care of some dev dependencies.

Depending on your hosting provider, you will likely want to also require:

- Pantheon: [taoti/drupal-pantheon](https://github.com/taoti/drupal-pantheon)
- Amazee: [taoti/drupal-amazee](https://github.com/taoti/drupal-amazee)

## Enabling this project

This project must be enabled in the top-level composer.json file, or it will be
ignored and will not perform any of its functions. `.lando.base.yml` should be
committed to the project to ensure those using lando don't have to run an
initial `composer install` outside of lando.

All files in `.github` should be committed to ensure availability on github.

Important! Make sure to include taoti/drupal-ops as an allowed package in 
`drupal-scaffold` settings in composer.json. ex:
```
{
...
    "extra": {
        "drupal-scaffold": {
            "allowed-packages": [
                "taoti/drupal-ops"
            ]
        }
    }
}
```

## Bad request blocking.

With most hosts that Taoti uses, we do not have direct access to server configuration.
There are at the same time, many paths that Drupal sites will *NEVER* have and waste
time with bot loads. settings.taoti.php attempts to pre-emptively block many of those
before Drupal is fully initiliazed. To use, add an include line to `settings.php` like
```php
include __DIR__ . "/settings.taoti.php";

```