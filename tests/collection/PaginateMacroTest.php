<?php

use Illuminate\Pagination\LengthAwarePaginator;
use function PHPUnit\Framework\assertEquals;

it('can paginate collections', function () {
    $items = collect(range(1, 100));

    $paginated = $items->paginate(10);

    assert($paginated instanceof LengthAwarePaginator);
    assertEquals(count($paginated->toArray()['data']), 10);
    assertEquals($paginated->toArray()['per_page'], 10);
    assertEquals($paginated->toArray()['total'], 100);
});
