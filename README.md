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

## License

[MIT](https://github.com/Ayctor/SireneApi/blob/master/LICENSE)
