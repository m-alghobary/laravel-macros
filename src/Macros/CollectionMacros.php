<?php

namespace Alghobary\LaravelMacros\Macros;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CollectionMacros
{
    public static function register()
    {
        /**
         * Add pagination support to laravel collections,
         * because by default laravel only support pagination on Eloquent/Query builder
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



        /**
         * Add a 'searchFor' method, to search in laravel collection, 
         * for items that has a search 'term' in one or more of its fields 
         * 
         */
        Collection::macro('searchFor', function (string $searchTerm, array $attributes = []) {
            $attributes = Arr::wrap($attributes);

            if (count($attributes) == 0) {
                return $this->filter(fn ($item) => str_contains($item, $searchTerm))->values();
            }

            return $this
                ->filter(function ($item) use ($attributes, $searchTerm) {

                    $included = false;
                    $isArray = is_array($item);

                    foreach ($attributes as $attr) {
                        $attrValue = $isArray && isset($item[$attr]) ? $item[$attr] : object_get($item, $attr);
                        if ($included || !$attrValue) break;

                        if (str_contains($item[$attr], $searchTerm)) {
                            $included = true;
                        }
                    }

                    return $included;
                })
                ->values();
        });
    }
}
