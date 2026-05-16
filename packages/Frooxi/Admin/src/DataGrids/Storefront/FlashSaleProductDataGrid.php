<?php

namespace Frooxi\Admin\DataGrids\Storefront;

use Frooxi\Admin\DataGrids\Catalog\ProductDataGrid;
use Illuminate\Support\Facades\DB;

class FlashSaleProductDataGrid extends ProductDataGrid
{
    /**
     * Prepare query builder.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = parent::prepareQueryBuilder();

        // Join to find the flash_sale_discount attribute value
        $queryBuilder->join('product_attribute_values as flash_sale_attr', function($join) {
            $join->on('product_flat.product_id', '=', 'flash_sale_attr.product_id')
                 ->where('flash_sale_attr.attribute_id', function($query) {
                     $query->select('id')->from('attributes')->where('code', 'flash_sale_discount')->limit(1);
                 });
        })
        ->where('flash_sale_attr.integer_value', '>', 0)
        ->addSelect('flash_sale_attr.integer_value as flash_sale_discount');

        return $queryBuilder;
    }

    /**
     * Prepare columns.
     *
     * @return void
     */
    public function prepareColumns()
    {
        parent::prepareColumns();

        // Add Discount Percentage column
        $this->addColumn([
            'index'      => 'flash_sale_discount',
            'label'      => 'Discount (%)',
            'type'       => 'integer',
            'searchable' => false,
            'filterable' => true,
            'sortable'   => true,
            'closure'    => function ($row) {
                return $row->flash_sale_discount . '%';
            },
        ]);
    }

    /**
     * Prepare actions.
     *
     * @return void
     */
    public function prepareActions()
    {
        if (bouncer()->hasPermission('catalog.products.edit')) {
            $this->addAction([
                'icon'   => 'icon-edit',
                'title'  => trans('admin::app.catalog.products.index.datagrid.edit'),
                'method' => 'GET',
                'url'    => function ($row) {
                    return route('admin.catalog.products.edit', [
                        'id'         => $row->product_id,
                        'flash_sale' => 1,
                    ]);
                },
            ]);
        }

        if (bouncer()->hasPermission('catalog.products.delete')) {
            $this->addAction([
                'icon'   => 'icon-delete',
                'title'  => trans('admin::app.catalog.products.index.datagrid.delete'),
                'method' => 'DELETE',
                'url'    => function ($row) {
                    return route('admin.catalog.products.delete', $row->product_id);
                },
            ]);
        }
    }
}
