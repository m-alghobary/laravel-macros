<?php

/**
 * The namespace exist just to prevent class names conflicts
 */

namespace Alghobary\Tests\Builder\WhereLike;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\assertIsString;
use function PHPUnit\Framework\assertStringContainsStringIgnoringCase;

it('should add the right sql where LIKE conditions to the eloquent query builder', function () {
    class MyModel extends Model
    {
    }

    $result = MyModel::query()
        ->where('id', 1)
        ->whereLike(['name', 'email'], 'ali')
        ->getSql();

    assertIsString($result);
    assertStringContainsStringIgnoringCase("and (`name` LIKE '%ali%' or `email` LIKE '%ali%')", $result);
});

it('should add the right sql where LIKE conditions to the database query builder', function () {
    $result = DB::table('users')
        ->where('id', 1)
        ->whereLike(['name', 'email'], 'ali')
        ->getSql();

    assertIsString($result);
    assertStringContainsStringIgnoringCase("and (`name` LIKE '%ali%' or `email` LIKE '%ali%')", $result);
});
