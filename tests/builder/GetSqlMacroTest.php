<?php

/**
 * The namespace exist just to prevent class names conflicts 
 */

namespace Alghobary\Tests\Builder\GetSql;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\assertIsString;
use function PHPUnit\Framework\assertEqualsIgnoringCase;
use function PHPUnit\Framework\assertStringNotContainsString;


it('should get the eloquent builder sql query with the actual values', function () {
    class MyModel extends Model
    {
    }

    $result = MyModel::query()
        ->where('id', 1)
        ->orWhere('name', 'LIKE', '%Ali%')
        ->latest()
        ->getSql();

    assertIsString($result);
    assertStringNotContainsString('?', $result);
    assertEqualsIgnoringCase($result, "select * from `my_models` where `id` = '1' or `name` LIKE '%Ali%' order by `created_at` desc");
});


it('should get the query builder sql query with the actual values', function () {

    $result = DB::table('users')
        ->where('id', 1)
        ->orWhere('name', 'LIKE', '%Ali%')
        ->latest()
        ->getSql();

    assertIsString($result);
    assertStringNotContainsString('?', $result);
    assertEqualsIgnoringCase($result, "select * from `users` where `id` = '1' or `name` LIKE '%Ali%' order by `created_at` desc");
});
