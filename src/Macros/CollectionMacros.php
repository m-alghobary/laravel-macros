<?php

namespace Alghobary\LaravelMacros\Macros;

use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CollectionMacros
{
    public static function register()
    {

        /**
         * Add pagination support to laravel collections, 
         * because by default laravel only support pagination on Eloquent/Query builder
         * 
         */
        Collection::macro('paginate', function ($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

            return new LengthAwarePaginator(
                $total ? $this : $this->forPage($page, $perPage)->values(),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
    }
}
