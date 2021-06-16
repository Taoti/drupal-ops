# taoti/drupal-ops

This project provides managed/simplified updating of some of Taoti ops aspects
for Drupal sites as well as taking care of dev dependencies.

## Choosing your version:
Depending on your desired provider and Drupal version you may need to use
different versions of this. The default case should be `9.x-pantheon`

- Pantheon
  - Drupal 9: `9.x-pantheon`
  - Drupal 8: `8.x-pantheon`

## Enabling this project

This project must be enabled in the top-level composer.json file, or it will be
ignored and will not perform any of its functions. `.lando.base.yml` should be
committed to the project to ensure those using lando don't have to run an
initial `composer install` outside of lando.
```
{
    ...
    "require-dev": {
        "taoti/drupal-ops"
    },
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
