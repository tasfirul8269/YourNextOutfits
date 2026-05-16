<?php

namespace Frooxi\Admin\Http\Controllers\Storefront;

use Frooxi\Admin\Http\Controllers\Controller;
use Frooxi\Product\Repositories\ProductRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\View\View;

class FlashSaleController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected ProductRepository $productRepository
    ) {}

    /**
     * Display the flash sale management page.
     */
    public function index()
    {
        if (request()->ajax()) {
            return app(\Frooxi\Admin\DataGrids\Storefront\FlashSaleProductDataGrid::class)->toJson();
        }

        return view('admin::storefront.flash-sale.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin::storefront.flash-sale.index', ['create_flash_sale' => 1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $product = $this->productRepository->findOrFail($id);

        return view('admin::catalog.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        return app(\Frooxi\Admin\Http\Controllers\Catalog\ProductController::class)->update($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Event::dispatch('catalog.product.delete.before', $id);

            $this->productRepository->delete($id);

            Event::dispatch('catalog.product.delete.after', $id);

            return response()->json([
                'message' => trans('admin::app.catalog.products.delete-success'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => trans('admin::app.catalog.products.delete-failed'),
            ], 400);
        }
    }
}
