<?php

namespace Frooxi\Shop\Http\Resources;

use Frooxi\Product\Helpers\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource)
    {
        $this->reviewHelper = app(Review::class);

        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  Request
     * @return array
     */
    public function toArray($request)
    {
        $productTypeInstance = $this->getTypeInstance();

        $prices = $productTypeInstance->getProductPrices();
        $calculated_discount = 0;
        if (isset($prices['final']) && isset($prices['regular']) && $prices['final']['price'] < $prices['regular']['price'] && $prices['regular']['price'] > 0) {
            $calculated_discount = round((($prices['regular']['price'] - $prices['final']['price']) / $prices['regular']['price']) * 100);
        }

        $data = [
            'id' => $this->id,
            'sku' => $this->sku,
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
            'url_key' => $this->url_key,
            'base_image' => product_image()->getProductBaseImage($this),
            'images' => product_image()->getGalleryImages($this),
            'is_new' => (bool) $this->new,
            'is_featured' => (bool) $this->featured,
            'on_sale' => (bool) $productTypeInstance->haveDiscount(),
            'is_saleable' => (bool) $productTypeInstance->isSaleable(),
            'is_wishlist' => (bool) auth()->guard()->user()?->wishlist_items
                ->where('channel_id', core()->getCurrentChannel()->id)
                ->where('product_id', $this->id)->count(),
            'min_price' => core()->formatPrice($productTypeInstance->getMinimalPrice()),
            'prices' => $prices,
            'price_html' => $productTypeInstance->getPriceHtml(),
            'ratings' => [
                'average' => $this->reviewHelper->getAverageRating($this),
                'total' => $this->reviewHelper->getTotalRating($this),
            ],
            'reviews' => [
                'total' => $this->reviewHelper->getTotalReviews($this),
            ],
            'flash_sale_discount' => $this->flash_sale_discount,
            'discount_percentage' => $productTypeInstance instanceof \Frooxi\Product\Type\Configurable && $productTypeInstance->getDefaultVariant()
                ? $productTypeInstance->getDefaultVariant()->discount_percentage
                : $this->discount_percentage,
            'calculated_discount' => $calculated_discount,
        ];

        return $data;
    }
}
