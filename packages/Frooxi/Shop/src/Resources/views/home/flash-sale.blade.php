<x-shop::layouts
    :has-header="true"
    :has-feature="false"
    :has-footer="false"
>
    <x-slot:title>
        Flash Sale
    </x-slot>

    @php
        $discounts = $flashSaleProducts
            ->pluck('flash_sale_discount')
            ->unique()
            ->filter(fn($d) => $d > 0)
            ->sortDesc()
            ->values();
    @endphp

    <v-flash-sale-page></v-flash-sale-page>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-flash-sale-page-template">
            <div style="min-height: 100vh; background: #fff; padding: 40px 16px 100px;">
                <!-- Page Header -->
                <div style="text-align: center; margin-bottom: 40px;">
                    <h1 style="margin: 0 0 24px 0; font-family: Montserrat, sans-serif; font-size: clamp(26px, 4vw, 42px); font-weight: 500; line-height: 1.05; letter-spacing: .08em; text-transform: uppercase; color: #111;">
                        BIGGEST SALE
                    </h1>

                    <!-- Filter Tags -->
                    <div v-if="discounts.length > 0" style="display: flex; justify-content: center; flex-wrap: wrap; gap: 10px; margin-bottom: 40px;">
                        <button
                            @click="currentFilter = null"
                            :style="currentFilter === null
                                ? 'padding: 6px 20px; background: #D63044; color: white; border: 2px solid #D63044; border-radius: 20px; font-size: 13px; font-weight: 600; cursor: pointer;'
                                : 'padding: 6px 20px; background: #fff; color: #D63044; border: 2px solid #D63044; border-radius: 20px; font-size: 13px; font-weight: 600; cursor: pointer;'"
                        >
                            All
                        </button>

                        <button
                            v-for="discount in discounts"
                            :key="discount"
                            @click="currentFilter = discount"
                            :style="currentFilter === discount
                                ? 'padding: 6px 20px; background: #D63044; color: white; border: 2px solid #D63044; border-radius: 20px; font-size: 13px; font-weight: 600; cursor: pointer;'
                                : 'padding: 6px 20px; background: #fff; color: #D63044; border: 2px solid #D63044; border-radius: 20px; font-size: 13px; font-weight: 600; cursor: pointer;'"
                        >
                            @{{ discount }}% Off
                        </button>
                    </div>

                    <!-- Sort + Filter Bar -->
                    <div style="max-width: 1200px; margin: 0 auto 24px; display: flex; justify-content: space-between; align-items: center;">
                        <div style="display: flex; align-items: center; gap: 6px; cursor: pointer; font-size: 14px; color: #374151;">
                            <span>&#9776;</span> Filter
                        </div>
                        <div style="display: flex; align-items: center; gap: 6px; font-size: 14px; color: #374151;">
                            Sort by:
                            <select v-model="sortBy" @change="sortProducts" style="border: 1px solid #d1d5db; border-radius: 4px; padding: 4px 8px; font-size: 13px;">
                                <option value="featured">Featured</option>
                                <option value="price_low">Price: Low to High</option>
                                <option value="price_high">Price: High to Low</option>
                                <option value="discount">Highest Discount</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                <div
                    v-if="filteredProducts.length > 0"
                    class="container mt-5 max-lg:px-8 max-sm:!px-4"
                >
                    <div class="flex flex-wrap gap-8 max-md:gap-7 max-sm:gap-4">
                        <x-shop::products.card
                            class="min-w-[291px] max-w-[291px] max-md:min-w-56 max-sm:min-w-[192px]"
                            v-for="product in filteredProducts"
                        />
                    </div>
                </div>

                <div v-else style="text-align: center; padding: 48px; color: #6b7280; font-size: 18px;">
                    No products found for this filter.
                </div>
            </div>
        </script>

        <script type="module">
            app.component('v-flash-sale-page', {
                template: '#v-flash-sale-page-template',

                data() {
                    return {
                        products: [],
                        discounts: @json($discounts),
                        discountsMap: @json($flashSaleProducts->pluck('flash_sale_discount', 'id')),
                        currentFilter: null,
                        sortBy: 'featured',
                        isLoading: true,
                    };
                },

                computed: {
                    filteredProducts() {
                        if (!this.currentFilter) {
                            return this.products;
                        }
                        return this.products.filter(p => this.discountsMap[p.id] == this.currentFilter);
                    }
                },

                mounted() {
                    this.getProducts();
                },

                methods: {
                    getProducts() {
                        this.$axios.get("{{ route('shop.api.products.index') }}", {
                            params: {
                                is_flash_sale_page: 1,
                                status: 1,
                                limit: 100
                            }
                        })
                        .then(response => {
                            this.isLoading = false;
                            this.products = response.data.data;
                        })
                        .catch(error => {
                            this.isLoading = false;
                            console.error('Failed to load flash sale products:', error);
                        });
                    },

                    sortProducts() {
                        if (this.sortBy === 'price_low') {
                            this.products.sort((a, b) => parseFloat(a.min_price.replace(/[^0-9.]/g, '')) - parseFloat(b.min_price.replace(/[^0-9.]/g, '')));
                        } else if (this.sortBy === 'price_high') {
                            this.products.sort((a, b) => parseFloat(b.min_price.replace(/[^0-9.]/g, '')) - parseFloat(a.min_price.replace(/[^0-9.]/g, '')));
                        } else if (this.sortBy === 'discount') {
                            this.products.sort((a, b) => (this.discountsMap[b.id] || 0) - (this.discountsMap[a.id] || 0));
                        }
                    }
                }
            });
        </script>
    @endPushOnce
</x-shop::layouts>
