<?php

namespace Alghobary\Tests\Builder;

use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\assertEqualsIgnoringCase;
use function PHPUnit\Framework\assertIsString;
use function PHPUnit\Framework\assertStringNotContainsString;

it('should get the builder sql query with the actual values', function () {
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
