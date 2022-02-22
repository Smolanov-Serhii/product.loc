<?php

namespace App\Repositories;

use App\Models\ModuleItem;
use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class ModuleItemsRepository
{
    public function all()
    {
        return Role::all();
    }

    /**
     * @param array $params
     * @return LengthAwarePaginator
     */
    public function filter(array $params): LengthAwarePaginator
    {

        $query_builder = ModuleItem::query();

        if (isset($params['taxonomy_item']) && is_array($params['taxonomy_item'])) {

            $query_builder->whereHas('taxonomy_items', function (Builder $query) use ($params) {
                $query->whereIn('id', array_keys($params['taxonomy_item'] ?? []));
            });

        } else if (isset($params['module'])) {

            $query_builder->whereHas('module', function (Builder $query) use ($params) {
                $query->where('name', $params['module']);
            });

        }

        if (isset($params['category-search-text'])) {

            $query_builder->whereHas('props', function (Builder $query) use ($params) {
                $query->where('value', 'like', "%{$params['category-search-text']}%");
            });
        }

        $items = $query_builder->paginate(2);

        return $items;
    }
}