# Laravel Macros

Add missing reusable functionality to Laravel through macros

## Installation

I haven't published this package to packagist yet, because the number of macros currently available in this package is not worth it.
Once the package contains enough macros to be really useful to large groups of developers I will publish it.

If you want to use it as it now, you can clone the repo and install it locally.

## Usage

The list of available macros until now:

-   Collection `paginate` method

```php
// method defination
function paginate($perPage, $total = null, $page = null, $pageName = 'page'): LengthAwarePaginator
```

```php
$items = collect(range(1, 100));
$paginated = $items->paginate(10);
```

-   Collection `searchFor` method, which will performe a search for a search term, in the specified collection item attributes. It works with collections of objects, associated arrays, or indexed arrays

```php
// method defination
function searchFor(string $searchTerm, array $attributes = []): Collection
```

```php
$items = collect([
    new MyModel(['id' => 1, 'name' => 'Ali', 'job' => 'Doctor']),
    new MyModel(['id' => 2, 'name' => 'Nasser', 'job' => 'Musical']),
    new MyModel(['id' => 3, 'name' => 'Ahmed', 'job' => 'Photographer']),
    new MyModel(['id' => 4, 'name' => 'Mohamed', 'job' => 'Engineer']),
]);

$result = $items->searchFor('to', ['name', 'job']);

/*
result:
[
    new MyModel(['id' => 1, 'name' => 'Ali', 'job' => 'Doctor']),
    new MyModel(['id' => 3, 'name' => 'Ahmed', 'job' => 'Photographer']),
]
*/

// with indexed arrays the seconed argument is not required
$items = collect([
    'Doctor',
    'Musical',
    'Photographer',
    'Engineer',
]);

$result = $items->searchFor('to');

/*
result:
[
    'Doctor',
    'Photographer',
]
*/
```

-   Query & Eloquent builder `getSql` method, which will return the current sql query with its parameter values instead of '?'

```php
// method defination
function getSql(): string
```

```php
$result = MyModel::query()
    ->where('id', 1)
    ->orWhere('name', 'LIKE', '%Ali%')
    ->latest()
    ->getSql();

/*
result:
select * from `my_models` where `id` = '1' or `name` LIKE '%Ali%' order by `created_at` desc
*/
```

-   Query & Eloquent builder `whereLike` method, which will performe a where 'LIKE' condition on the list of columns you provide

```php
// method defination
function whereLike(array $attributes, string $searchTerm): Builder
```

```php
$result = MyModel::query()
    ->where('id', 1)
    ->whereLike(['name', 'email'], 'ali')
    ->getSql();

/*
result:
select * from `my_models` where `id` = '1' and (`name` LIKE '%ali%' or `email` LIKE '%ali%')
*/
```

## Testing

```bash
composer test
```

## Credits

-   [Mohamed Alghobary](https://github.com/m-alghobary)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
