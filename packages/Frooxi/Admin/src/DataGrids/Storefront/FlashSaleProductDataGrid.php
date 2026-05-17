<?php

namespace Frooxi\Admin\DataGrids\Storefront;

use Frooxi\Admin\DataGrids\Catalog\ProductDataGrid;
use Illuminate\Database\Query\Builder;

class FlashSaleProductDataGrid extends ProductDataGrid
{
    /**
     * Prepare query builder.
     *
     * @return Builder
     */
    public function prepareQueryBuilder()
    {
        $queryBuilder = parent::prepareQueryBuilder();

        $queryBuilder->where('products.flash_sale_discount', '>', 0)
            ->addSelect('products.flash_sale_discount as flash_sale_discount');

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
            'index' => 'flash_sale_discount',
            'label' => 'Discount (%)',
            'type' => 'integer',
            'searchable' => false,
            'filterable' => true,
            'sortable' => true,
            'closure' => function ($row) {
                return $row->flash_sale_discount.'%';
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
                'icon' => 'icon-edit',
                'title' => trans('admin::app.catalog.products.index.datagrid.edit'),
                'method' => 'GET',
                'url' => function ($row) {
                    return route('admin.catalog.products.edit', [
                        'id' => $row->product_id,
                        'flash_sale' => 1,
                    ]);
                },
            ]);
        }

        if (bouncer()->hasPermission('catalog.products.delete')) {
            $this->addAction([
                'icon' => 'icon-delete',
                'title' => trans('admin::app.catalog.products.index.datagrid.delete'),
                'method' => 'DELETE',
                'url' => function ($row) {
                    return route('admin.catalog.products.delete', $row->product_id);
                },
            ]);
        }
    }
}
