<x-shop::layouts
    :has-header="true"
    :has-feature="false"
    :has-footer="false"
>
    <x-slot:title>
        Flash Sale
    </x-slot>

    <div style="min-height: 100vh; background: #fff; padding: 40px 16px 100px;">
        <!-- Page Header -->
        <div style="text-align: center; margin-bottom: 40px;">
            <!-- Heading -->
            <h1 style="margin: 0 0 32px 0; font-family: Montserrat, sans-serif; font-size: clamp(26px, 4vw, 42px); font-weight: 500; line-height: 1.05; letter-spacing: .08em; text-transform: uppercase; color: #111;">
                Flash Sale
            </h1>

            <!-- Dynamic Filter Tags -->
            @php
                $discounts = $flashSaleProducts->map(function($product) {
                    return $product->getAttributeValue('flash_sale_discount');
                })->unique()->filter()->sortDesc();
            @endphp

            @if ($discounts->count() > 0)
                <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 16px; margin-bottom: 48px;">
                    <button 
                        class="filter-tag active" 
                        onclick="filterFlashSale(null, this)"
                        style="padding: 16px 32px; background: #D63044; color: white; border: none; border-radius: 12px; font-size: 24px; font-weight: 600; cursor: pointer; transition: all 0.2s;"
                    >
                        All
                    </button>

                    @foreach ($discounts as $discount)
                        <button 
                            class="filter-tag" 
                            onclick="filterFlashSale({{ $discount }}, this)"
                            style="padding: 16px 32px; background: #f3f4f6; color: #1f2937; border: none; border-radius: 12px; font-size: 24px; font-weight: 600; cursor: pointer; transition: all 0.2s;"
                        >
                            {{ $discount }}% Off
                        </button>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Flash Sale Products Grid -->
        @if ($flashSaleProducts->count() > 0)
            <div id="flash-sale-grid" style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px;">
                @foreach ($flashSaleProducts as $product)
                    <div class="flash-sale-card" 
                         data-discount="{{ $product->getAttributeValue('flash_sale_discount') }}"
                         style="position: relative; display: block; border-radius: 12px; overflow: hidden; background: #f9fafb; transition: all 0.3s ease; border: 1px solid #e5e7eb;"
                         onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 12px 24px rgba(0,0,0,0.1)'"
                         onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                        
                        <!-- Discount Badge - Top Left -->
                        <div style="position: absolute; top: 0; left: 0; z-index: 10; background: #D63044; color: white; padding: 6px 12px; font-size: 14px; font-weight: 700; border-radius: 0 0 12px 0;">
                            -{{ $product->getAttributeValue('flash_sale_discount') }}%
                        </div>

                        <!-- Product Image -->
                        <a href="{{ route('shop.product_or_category.index', $product->url_key) }}" style="display: block; width: 100%; aspect-ratio: 1/1; overflow: hidden; background: #e5e7eb; position: relative;">
                            @php
                                $productBaseImage = product_image()->getProductBaseImage($product);
                            @endphp
                            
                            <img src="{{ $productBaseImage['medium_image_url'] }}" 
                                    alt="{{ $product->name }}" 
                                    loading="lazy"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                        </a>

                        <!-- Product Info -->
                        <div style="padding: 16px;">
                            <!-- Product Name -->
                            <h3 style="font-size: 16px; font-weight: 600; color: #1f2937; margin: 0 0 12px 0; font-family: Montserrat, sans-serif; line-height: 1.4; min-height: 44px; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                {{ $product->name }}
                            </h3>

                            <!-- Price Display -->
                            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                                <span style="font-size: 14px; color: #9ca3af; text-decoration: line-through;">
                                    {{ core()->currencySymbol(core()->getCurrentCurrencyCode()) }}{{ number_format($product->price, 2) }}
                                </span>
                                <span style="font-size: 20px; font-weight: 700; color: #D63044; font-family: Montserrat, sans-serif;">
                                    {{ core()->currencySymbol(core()->getCurrentCurrencyCode()) }}{{ number_format($product->special_price, 2) }}
                                </span>
                            </div>

                            <!-- Stock Info -->
                            <div style="font-size: 12px; color: #6b7280; margin-bottom: 12px;">
                                @if ($product->inventories->sum('qty') > 0)
                                    <span style="color: #10b981;">✓ In Stock ({{ $product->inventories->sum('qty') }})</span>
                                @else
                                    <span style="color: #ef4444;">✗ Out of Stock</span>
                                @endif
                            </div>

                            <!-- Add to Cart Button -->
                            <button onclick="addToCart({{ $product->id }})" 
                                    style="width: 100%; padding: 12px; background: #D63044; color: white; border: none; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer; transition: background 0.2s; font-family: Montserrat, sans-serif;"
                                    onmouseover="this.style.background='#b91c32'"
                                    onmouseout="this.style.background='#D63044'"
                                    @if ($product->inventories->sum('qty') <= 0) disabled style="opacity: 0.5; cursor: not-allowed;" @endif>
                                @if ($product->inventories->sum('qty') > 0)
                                    Add to Cart
                                @else
                                    Out of Stock
                                @endif
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div style="text-align: center; padding: 80px 20px;">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-bottom: 24px;">
                    <path d="M13 2L4.5 13.5H11L10 22L20.5 10.5H14L13 2Z" fill="#d1d5db" stroke="#d1d5db" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h2 style="font-size: 24px; font-weight: 400; color: #6b7280; margin: 0 0 8px; font-family: 'DM Serif Display', Georgia, serif;">
                    No Flash Sales Available
                </h2>
                <p style="font-size: 14px; color: #9ca3af; margin: 0; font-family: Montserrat, sans-serif;">
                    Check back soon for exciting deals!
                </p>
            </div>
        @endif
    </div>

    @push('scripts')
        <script>
            function filterFlashSale(discount, element) {
                // Update active state of tags
                document.querySelectorAll('.filter-tag').forEach(tag => {
                    tag.style.background = '#f3f4f6';
                    tag.style.color = '#1f2937';
                    tag.classList.remove('active');
                });

                element.style.background = '#D63044';
                element.style.color = 'white';
                element.classList.add('active');

                // Filter cards
                const cards = document.querySelectorAll('.flash-sale-card');
                
                cards.forEach(card => {
                    if (discount === null || card.getAttribute('data-discount') == discount) {
                        card.style.display = 'block';
                        // Trigger a small animation
                        card.style.opacity = '0';
                        setTimeout(() => {
                            card.style.opacity = '1';
                        }, 50);
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            function addToCart(productId) {
                // Standard Bagisto add to cart can be used here if needed
                alert('Adding product ' + productId + ' to cart...');
            }
        </script>
    @endpush

    @push('styles')
        <style>
            .flash-sale-card {
                opacity: 1;
                transition: opacity 0.3s ease;
            }

            .filter-tag:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            }

            /* Mobile: 1 card per row */
            @media (max-width: 768px) {
                #flash-sale-grid {
                    grid-template-columns: 1fr !important;
                    gap: 16px !important;
                }
            }

            /* Tablet: 2 cards per row */
            @media (min-width: 769px) and (max-width: 1024px) {
                #flash-sale-grid {
                    grid-template-columns: repeat(2, 1fr) !important;
                }
            }

            /* Desktop: 3-4 cards per row */
            @media (min-width: 1025px) {
                #flash-sale-grid {
                    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)) !important;
                }
            }
        </style>
    @endpush

</x-shop::layouts>
