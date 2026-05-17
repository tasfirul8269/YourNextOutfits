<x-shop::layouts
    :has-header="true"
    :has-feature="false"
    :has-footer="false"
>
    <x-slot:title>
        Flash Sale
    </x-slot>

    @php
        $productsJson = json_encode(\Frooxi\Shop\Http\Resources\ProductResource::collection($flashSaleProducts)->resolve());
    @endphp

    <v-flash-sale-grid :initial-products="{{ $productsJson }}"></v-flash-sale-grid>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-flash-sale-grid-template">
            <div style="min-height: 100vh; background: #fff; padding: 40px 16px 100px;">
                <!-- Page Header -->
                <div style="text-align: center; margin-bottom: 40px;">
                    <!-- Heading -->
                    <h1 style="margin: 0 0 32px 0; font-family: Montserrat, sans-serif; font-size: clamp(26px, 4vw, 42px); font-weight: 500; line-height: 1.05; letter-spacing: .08em; text-transform: uppercase; color: #111;">
                        BIGGEST SALE
                    </h1>

                    <!-- Dynamic Filter Tags -->
                    <div 
                        v-if="discounts.length > 0" 
                        style="display: flex; justify-content: center; flex-wrap: wrap; gap: 12px; margin-bottom: 48px;"
                    >
                        <button 
                            :class="{'bg-[#D63044] text-white': currentFilter === null, 'bg-[#f3f4f6] text-[#1f2937] hover:bg-[#e5e7eb]': currentFilter !== null}"
                            @click="currentFilter = null"
                            style="padding: 8px 24px; border: none; border-radius: 4px; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.2s;"
                        >
                            All
                        </button>

                        <button 
                            v-for="discount in discounts" 
                            :key="discount"
                            :class="{'bg-[#D63044] text-white': currentFilter === discount, 'bg-[#f3f4f6] text-[#1f2937] hover:bg-[#e5e7eb]': currentFilter !== discount}"
                            @click="currentFilter = discount"
                            style="padding: 8px 24px; border: none; border-radius: 4px; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.2s;"
                        >
                            @{{ discount }}% Off
                        </button>
                    </div>
                </div>

                <!-- Flash Sale Products Grid -->
                <div 
                    v-if="filteredProducts.length > 0" 
                    style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px;"
                >
                    <x-shop::products.card
                        v-for="product in filteredProducts"
                        :key="product.id"
                        ::product="product"
                    />
                </div>
                
                <div v-else style="text-align: center; padding: 48px; color: #6b7280; font-size: 18px;">
                    No products found for this discount.
                </div>
            </div>
        </script>

        <script type="module">
            app.component('v-flash-sale-grid', {
                template: '#v-flash-sale-grid-template',

                props: ['initialProducts'],

                data() {
                    return {
                        products: this.initialProducts || [],
                        currentFilter: null
                    };
                },

                computed: {
                    discounts() {
                        const allDiscounts = this.products.map(product => window.flashSaleDiscountsMap[product.id] || 0);
                        // Filter out 0/null and get unique values, then sort descending
                        return [...new Set(allDiscounts)]
                            .filter(discount => discount > 0)
                            .sort((a, b) => b - a);
                    },
                    filteredProducts() {
                        if (!this.currentFilter) {
                            return this.products;
                        }
                        return this.products.filter(product => window.flashSaleDiscountsMap[product.id] == this.currentFilter);
                    }
                }
                
                mounted() {
                    // Because ProductResource doesn't include 'flash_sale_discount' by default, 
                    // we'll fetch it from the blade view via a global variable.
                }
            });
        </script>
    @endPushOnce
    
    <!-- Inject discounts map for Vue component -->
    <script>
        window.flashSaleDiscountsMap = {
            @foreach($flashSaleProducts as $p)
                "{{ $p->id }}": {{ $p->getAttributeValue('flash_sale_discount') ?? 0 }},
            @endforeach
        };
    </script>
</x-shop::layouts>
