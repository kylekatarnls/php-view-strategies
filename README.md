# php-view-strategies
Multi template engine driver for PHP

## Installation
```
composer require rush/view-strategies
```

## Getting started
```php
<?php

use Rush\View;

View::configure([
    'base_path' => '/path/to/view',
    'default_extension' => 'php',
    'strategies' => [
        'php' => 'View\\Strategy\\Plate',
        'jade' => 'View\\Strategy\\Jade',
    ],
]);

echo new View('index.php')->render([ 'name' => 'John', 'age' => 30 ]);
echo new View('relative/path/to/view.jade')->render();
```

See [more example](https://github.com/Leko/php-view-strategies/blob/master/example)

## Testing
```
composer test
```

## License
The MIT License (MIT). Please see [License File](https://github.com/Leko/php-view-strategies/blob/master/LICENSE) for more information.
