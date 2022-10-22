<?php

/**
 * The namespace exist just to prevent class names conflicts 
 */

namespace Alghobary\Tests\Collection\SearchFor;

use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\assertEquals;


it('can search in collection of objects', function () {
    class MyModel extends Model
    {
        protected $guarded = [];
    }

    $items = collect([
        new MyModel(['id' => 1, 'name' => 'Ali', 'job' => 'Doctor']),
        new MyModel(['id' => 2, 'name' => 'Nasser', 'job' => 'Musical']),
        new MyModel(['id' => 3, 'name' => 'Ahmed', 'job' => 'Photographer']),
        new MyModel(['id' => 4, 'name' => 'Mohamed', 'job' => 'Engineer']),
    ]);

    $result = $items->searchFor('to', ['name', 'job']);

    assertEquals($result->count(), 2);
    assertEquals($result[0]->name, 'Ali');
    assertEquals($result[0]->job, 'Doctor');
    assertEquals($result[1]->name, 'Ahmed');
    assertEquals($result[1]->job, 'Photographer');
});


it('can search in collection of associated arrays', function () {
    $items = collect([
        ['id' => 1, 'name' => 'Ali', 'job' => 'Doctor'],
        ['id' => 2, 'name' => 'Nasser', 'job' => 'Musical'],
        ['id' => 3, 'name' => 'Ahmed', 'job' => 'Photographer'],
        ['id' => 4, 'name' => 'Mohamed', 'job' => 'Engineer'],
    ]);

    $result = $items->searchFor('to', ['name', 'job']);

    assertEquals($result->count(), 2);
    assertEquals($result[0]['name'], 'Ali');
    assertEquals($result[0]['job'], 'Doctor');
    assertEquals($result[1]['name'], 'Ahmed');
    assertEquals($result[1]['job'], 'Photographer');
});


it('can search in collection of indexed arrays', function () {
    $items = collect([
        'Doctor',
        'Musical',
        'Photographer',
        'Engineer',
    ]);

    $result = $items->searchFor('to');

    assertEquals($result->count(), 2);
    assertEquals($result[0], 'Doctor');
    assertEquals($result[1], 'Photographer');
});
