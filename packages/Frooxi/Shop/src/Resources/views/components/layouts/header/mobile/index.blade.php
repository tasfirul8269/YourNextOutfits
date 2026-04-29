
<div style="display:grid;grid-template-columns:1fr auto 1fr;align-items:center;gap:16px;padding:24px 16px 16px;background:transparent;">
    <!-- Left: Hamburger -->
    <div style="display:flex;align-items:center;justify-self:start;">
        {!! view_render_event('frooxi.shop.components.layouts.header.mobile.drawer.before') !!}

        <!-- Drawer -->
        <v-mobile-drawer></v-mobile-drawer>

        {!! view_render_event('frooxi.shop.components.layouts.header.mobile.drawer.after') !!}
    </div>

    <!-- Center: Logo -->
    <div style="display:flex;justify-content:center;">
        {!! view_render_event('frooxi.shop.components.layouts.header.mobile.logo.before') !!}

        <a
            href="{{ route('shop.home.index') }}"
            style="display:flex;align-items:center;"
            aria-label="{{ config('app.name') }}"
        >
            <img
                src="{{ request()->routeIs('shop.home.index') ? asset('themes/shop/logo.png') : asset('themes/shop/logo_black.png') }}"
                alt="{{ config('app.name') }}"
                width="100"
                height="auto"
                class="logo-image"
                style="max-height:40px;width:auto;"
            >
        </a>

        {!! view_render_event('frooxi.shop.components.layouts.header.mobile.logo.after') !!}
    </div>

    <!-- Right: Search + Mini-Cart -->
    <div style="display:flex;align-items:center;gap:16px;justify-self:end;">
        {!! view_render_event('frooxi.shop.components.layouts.header.mobile.search.before') !!}

        <v-search-toggle></v-search-toggle>

        {!! view_render_event('frooxi.shop.components.layouts.header.mobile.search.after') !!}

        {!! view_render_event('frooxi.shop.components.layouts.header.mobile.mini_cart.before') !!}

        @if(core()->getConfigData('sales.checkout.shopping_cart.cart_page'))
            @include('shop::checkout.cart.mini-cart', ['iconClass' => 'header-icon', 'iconColor' => request()->routeIs('shop.home.index') ? '#ffffff' : '#1a1a1a'])
        @endif

        {!! view_render_event('frooxi.shop.components.layouts.header.mobile.mini_cart.after') !!}
    </div>
</div>

<style>
    .mobile-drawer-header .icon-cancel {
        color: #fff !important;
    }
</style>

@pushOnce('scripts')
    <script type="text/x-template" id="v-mobile-drawer-template">
            <x-shop::drawer
                position="left"
                width="100%"
                @close="onDrawerClose"
            >
                <x-slot:toggle>
                    <span class="text-2xl cursor-pointer icon-hamburger header-icon" style="color: {{ request()->routeIs('shop.home.index') ? '#ffffff' : '#1a1a1a' }} !important;"></span>
                </x-slot>

                <x-slot:header class="mobile-drawer-header" style="background-color: #D63044 !important; color: #fff !important; display:flex; align-items:center; min-height:60px;">
                    <div class="flex items-center justify-between w-full">
                        <a href="{{ route('shop.home.index') }}">
                            <img
                                src="{{ asset('themes/shop/logo.png') }}"
                                alt="{{ config('app.name') }}"
                                width="60"
                                height="auto"
                            >
                        </a>
                    </div>
                </x-slot>

                <x-slot:content class="!p-0">
                    {!! view_render_event('frooxi.shop.components.layouts.header.mobile.drawer.categories.before') !!}

                    <!-- Home Link -->
                    <div style="border-bottom:1px solid #e5e7eb;">
                        <a
                            href="{{ route('shop.home.index') }}"
                            class="block px-6 py-4 text-base font-medium text-black transition-colors duration-200 hover:bg-gray-50"
                        >
                            Home
                        </a>
                    </div>

                    <!-- Mobile category view -->
                    <v-mobile-category ref="mobileCategory"></v-mobile-category>

                    {!! view_render_event('frooxi.shop.components.layouts.header.mobile.drawer.categories.after') !!}

                    <!-- Flash Sale Link -->
                    <div style="border-top:1px solid #e5e7eb;">
                        <a
                            href="{{ route('shop.flash-sale.index') }}"
                            class="flex items-center justify-between px-6 py-4 transition-colors duration-200 hover:bg-gray-50"
                        >
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
                                </svg>
                                <span class="text-base font-medium text-black">Flash Sale</span>
                            </div>
                            <span class="icon-arrow-right rtl:icon-arrow-left text-lg"></span>
                        </a>
                    </div>

                    <!-- Trade License Section -->
                    <div style="border-top:1px solid #e5e7eb;">
                        <div
                            class="flex items-center justify-between px-6 py-4 transition-colors duration-200 hover:bg-gray-50 cursor-pointer"
                            @click="showTradeLicense = !showTradeLicense"
                        >
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                    <line x1="16" y1="13" x2="8" y2="13"/>
                                    <line x1="16" y1="17" x2="8" y2="17"/>
                                    <polyline points="10 9 9 9 8 9"/>
                                </svg>
                                <span class="text-base font-medium text-black">Trade License</span>
                            </div>
                            <span
                                class="text-lg transition-transform duration-200"
                                :class="showTradeLicense ? 'icon-arrow-up' : 'icon-arrow-down'"
                            ></span>
                        </div>

                        <!-- Trade License Number (Expandable) -->
                        <div
                            class="overflow-hidden transition-all duration-300"
                            :class="showTradeLicense ? 'max-h-20 opacity-100' : 'max-h-0 opacity-0'"
                        >
                            <div class="px-6 pb-4">
                                <p class="text-sm text-zinc-600" style="padding-left: 33px;">
                                    TRAD/DNCC/ 048012/2025
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Store Locations Section (Non-collapsible) -->
                    <div style="border-top:1px solid #e5e7eb;">
                        <div class="px-6 py-4">
                            <div class="flex items-center gap-3 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                                <span class="text-base font-medium text-black">Visit Our Store</span>
                            </div>
                            <div style="padding-left: 33px;">
                                <p class="text-sm text-black mb-2">Gulshan, Dhaka</p>
                                <a href="tel:01880932952" class="flex items-center gap-2 text-sm text-zinc-500 hover:text-zinc-700 transition-colors duration-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                    </svg>
                                    <span>01880 932952</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </x-slot>

                <x-slot:footer>
                    <!-- Localization & Currency Section -->
                @if(core()->getCurrentChannel()->locales()->count() > 1 || core()->getCurrentChannel()->currencies()->count() > 1 )
                                    <div class="fixed bottom-0 z-[1100] grid w-full max-w-full grid-cols-[1fr_auto_1fr] items-center justify-items-center border-t border-zinc-200 bg-white px-5 ltr:left-0 rtl:right-0">
                                        <!-- Filter Drawer -->
                                        <x-shop::drawer
                                            position="bottom"
                                            width="100%"
                                        >
                                            <!-- Drawer Toggler -->
                                            <x-slot:toggle>
                                                <div
                                                    class="flex cursor-pointer items-center gap-x-2.5 px-2.5 py-3.5 text-lg font-medium uppercase max-md:py-3 max-sm:text-base"
                                                    role="button"
                                                    v-pre
                                                >
                                                    {{ core()->getCurrentCurrency()->symbol . ' ' . core()->getCurrentCurrencyCode() }}
                                                </div>
                                            </x-slot>

                                            <!-- Drawer Header -->
                                            <x-slot:header>
                                                <div class="flex items-center justify-between">
                                                    <p class="text-lg font-semibold">
                                                        @lang('shop::app.components.layouts.header.mobile.currencies')
                                                    </p>
                                                </div>
                                            </x-slot>

                                            <!-- Drawer Content -->
                                            <x-slot:content class="!px-0">
                                                <div
                                                    class="overflow-auto"
                                                    :style="{ height: getCurrentScreenHeight }"
                                                >
                                                    <v-currency-switcher></v-currency-switcher>
                                                </div>
                                            </x-slot>
                                        </x-shop::drawer>

                                        <!-- Seperator -->
                                        <span class="h-5 w-0.5 bg-zinc-200"></span>

                                        <!-- Sort Drawer -->
                                        <x-shop::drawer
                                            position="bottom"
                                            width="100%"
                                        >
                                            <!-- Drawer Toggler -->
                                            <x-slot:toggle>
                                                <div
                                                    class="flex cursor-pointer items-center gap-x-2.5 px-2.5 py-3.5 text-lg font-medium uppercase max-md:py-3 max-sm:text-base"
                                                    role="button"
                                                    v-pre
                                                >
                                                    <img
                                        src="{{ ! empty(core()->getCurrentLocale()->logo_url)
                        ? core()->getCurrentLocale()->logo_url
                        : frooxi_asset('images/default-language.svg')
                                                            }}"
                                                        class="h-full"
                                                        alt="Default locale"
                                                        width="24"
                                                        height="16"
                                                    />

                                                    {{ core()->getCurrentChannel()->locales()->orderBy('name')->where('code', app()->getLocale())->value('name') }}
                                                </div>
                                            </x-slot>

                                            <!-- Drawer Header -->
                                            <x-slot:header>
                                                <div class="flex items-center justify-between">
                                                    <p class="text-lg font-semibold">
                                                        @lang('shop::app.components.layouts.header.mobile.locales')
                                                    </p>
                                                </div>
                                            </x-slot>

                                            <!-- Drawer Content -->
                                            <x-slot:content class="!px-0">
                                                <div
                                                    class="overflow-auto"
                                                    :style="{ height: getCurrentScreenHeight }"
                                                >
                                                    <v-locale-switcher></v-locale-switcher>
                                                </div>
                                            </x-slot>
                                        </x-shop::drawer>
                                    </div>
                    @endif
                </x-slot>
            </x-shop::drawer>
        </script>

    <script
        type="text/x-template"
        id="v-mobile-category-template"
    >
            <!-- Wrapper with transition effects -->
    <div class="relative h-full overflow-hidden">
        <!-- Sliding container -->
            <div
                class="flex h-full transition-transform duration-300"
                :class="{
                        'ltr:translate-x-0 rtl:translate-x-0': currentViewLevel !== 'third',
                        'ltr:-translate-x-full rtl:translate-x-full': currentViewLevel === 'third'
                }"
            >
            <!-- First level view -->
            <div class="flex-shrink-0 w-full h-full px-6 overflow-auto">
                <div class="py-4">
                        <div
                            v-for="(category, index) in categories"
                            :key="category.id"
                            :class="{'mb-2': category.children && category.children.length}"
                            :style="{ borderBottom: index < categories.length - 1 ? '1px solid #e5e7eb' : 'none' }"
                        >
                        <div
                            class="flex items-center justify-between py-2 transition-colors duration-200 cursor-pointer"
                            @click="category.children && category.children.length ? toggleCategory(category.id) : null"
                        >
                            <a
                                :href="category.children && category.children.length ? 'javascript:void(0)' : category.url"
                                class="text-base font-medium text-black"
                                @click.stop="category.children && category.children.length ? toggleCategory(category.id) : null"
                            >
                                @{{ category.name }}
                            </a>

                            <span
                                v-if="category.children && category.children.length"
                                class="transition-transform duration-200"
                                :class="expandedCategories[category.id] ? 'icon-arrow-down' : 'icon-arrow-right'"
                                style="font-size: 18px;"
                            ></span>
                        </div>

                        <!-- Second Level Categories - collapsed by default -->
                            <div
                                v-if="category.children && category.children.length"
                                v-show="expandedCategories[category.id]"
                                class="overflow-hidden"
                            >
                                <div
                                    v-for="secondLevelCategory in category.children"
                                    :key="secondLevelCategory.id"
                                >
                                    <div
                                        class="flex items-center justify-between py-2 pl-4 transition-colors duration-200 cursor-pointer"
                                        @click="showThirdLevel(secondLevelCategory, category, $event)"
                                    >
                                    <a :href="secondLevelCategory.url" class="text-sm font-normal">
                                        @{{ secondLevelCategory.name }}
                                    </a>

                                        <span
                                            v-if="secondLevelCategory.children && secondLevelCategory.children.length"
                                            class="icon-arrow-right rtl:icon-arrow-left"
                                        ></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Third level view -->
                <div
                    class="flex-shrink-0 w-full h-full"
                    v-if="currentViewLevel === 'third'"
                >
                <div class="px-6 py-4 border-b border-gray-200">
                        <button
                            @click="goBackToMainView"
                            class="flex items-center justify-center gap-2 focus:outline-none"
                            aria-label="Go back"
                        >
                        <span class="text-lg icon-arrow-left rtl:icon-arrow-right"></span>
                        <div class="text-base font-medium text-black">
                            @lang('shop::app.components.layouts.header.mobile.back-button')
                        </div>
                    </button>
                </div>

                <!-- Third Level Content -->
                <div class="px-6 py-4">
                        <div
                            v-for="thirdLevelCategory in currentSecondLevelCategory?.children"
                            :key="thirdLevelCategory.id"
                            class="mb-2"
                        >
                            <a
                                :href="thirdLevelCategory.url"
                                class="block py-2 text-sm transition-colors duration-200"
                            >
                            @{{ thirdLevelCategory.name }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </script>

    <script type="module">
        app.component('v-mobile-category', {
            template: '#v-mobile-category-template',

            data() {
                return  {
                    categories: [],
                    currentViewLevel: 'main',
                    currentSecondLevelCategory: null,
                    currentParentCategory: null,
                    expandedCategories: {},
                }
            },

            mounted() {
                this.initCategories();
            },

            computed: {
                getCurrentScreenHeight() {
                    return window.innerHeight - (window.innerWidth < 920 ? 61 : 0) + 'px';
                },
            },

            methods: {
                initCategories() {
                    try {
                        const stored = localStorage.getItem('categories_v3');
                        const timestamp = localStorage.getItem('categories_v3_timestamp');

                        // Cache expires after 1 hour (3600000 ms)
                        const CACHE_TTL = 3600000;

                        if (stored && timestamp) {
                            const age = Date.now() - parseInt(timestamp);

                            if (age < CACHE_TTL) {
                                this.categories = JSON.parse(stored);
                                this.autoExpandFirst();
                                return;
                            } else {
                                // Cache expired, remove it
                                localStorage.removeItem('categories_v3');
                                localStorage.removeItem('categories_v3_timestamp');
                            }
                        }

                    } catch (e) {
                        console.error('Error loading categories from cache:', e);
                    }

                    this.getCategories();
                },
                getCategories() {
                    this.$axios.get("{{ route('shop.api.categories.tree') }}")
                        .then(response => {
                            this.categories = response.data.data;
                            localStorage.setItem('categories_v3', JSON.stringify(this.categories));
                            localStorage.setItem('categories_v3_timestamp', Date.now().toString());
                            this.autoExpandFirst();
                        })
                        .catch(error => {
                            console.log(error);
                        });
                },

                autoExpandFirst() {
                    if (this.categories.length > 0) {
                        const first = this.categories[0];
                        if (first.children && first.children.length) {
                            this.expandedCategories = { [first.id]: true };
                        }
                    }
                },

                showThirdLevel(secondLevelCategory, parentCategory, event) {
                    if (secondLevelCategory.children && secondLevelCategory.children.length) {
                        this.currentSecondLevelCategory = secondLevelCategory;
                        this.currentParentCategory = parentCategory;
                        this.currentViewLevel = 'third';

                        if (event) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                    }
                },

                goBackToMainView() {
                    this.currentViewLevel = 'main';
                },

                toggleCategory(categoryId) {
                    this.expandedCategories = {
                        ...this.expandedCategories,
                        [categoryId]: !this.expandedCategories[categoryId],
                    };
                },
            },
        });

        app.component('v-mobile-drawer', {
            template: '#v-mobile-drawer-template',

            data() {
                return {
                    showTradeLicense: false,
                };
            },

            methods: {
                onDrawerClose() {
                    this.$refs.mobileCategory.currentViewLevel = 'main';
                }
            },
        });
    </script>
@endPushOnce
