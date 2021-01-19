# TableField

A Laravel Nova field.

## Installation

```
composer require ayctor/table-field
```

## Usage

The field return a JSON value.

```php
use Ayctor\TableField\Table;

return [
    Table::make('Table', 'table')
        ->stacked()
        ->rows(4)
        ->columns(4)
        ->headers([
            'Lorem ipsum',
            'Lorem ipsum',
            'Lorem ipsum',
        ])
        ->addRowButtonLabel('Add')
        ->addColumnButtonLabel('Add')
        ->removeRowButtonLabel('Remove')
        ->removeColumnButtonLabel('Remove'),
    ];
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ayctor](https://github.com/ayctor)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
