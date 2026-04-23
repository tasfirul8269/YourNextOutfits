<?php if (isset($component)) { $__componentOriginal8001c520f4b7dcb40a16cd3b411856d1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.layouts.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('admin::app.dashboard.index.title'); ?>
     <?php $__env->endSlot(); ?>

    <!-- Dashboard - Modern AdminV2 Style -->
    <div class="p-6 space-y-6" style="font-family:'Montserrat',sans-serif;">

        <!-- Welcome Section + Date Filter -->
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2" v-pre>
                    Welcome, <?php echo e(auth()->guard('admin')->user()->name); ?>

                </h1>
                <p class="text-base text-gray-600">
                    Your store dashboard — monitor sales, orders, and inventory at a glance.
                </p>
            </div>

            <!-- Date Filter -->
            <div class="flex-shrink-0">
                <v-dashboard-filters>
                    <div class="flex gap-2">
                        <div class="shimmer h-[36px] w-[132px] rounded-md"></div>
                        <div class="shimmer h-[36px] w-[140px] rounded-md"></div>
                    </div>
                </v-dashboard-filters>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <?php echo view_render_event('frooxi.admin.dashboard.overall_details.before'); ?>

            <?php echo $__env->make('admin::dashboard.over-all-details', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo view_render_event('frooxi.admin.dashboard.overall_details.after'); ?>

        </div>

        <!-- Today's Status Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
            <!-- Today's Orders -->
            <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-base font-semibold text-gray-900">Today's Orders</h3>
                    <span class="text-2xl icon-shopping-bag text-gray-400"></span>
                </div>
                <p class="text-3xl font-bold text-gray-900 mb-1"><?php echo e($statistics['today_orders'] ?? 0); ?></p>
                <p class="text-sm text-gray-500">Orders placed today</p>
            </div>

            <!-- Today's Revenue -->
            <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-base font-semibold text-gray-900">Today's Revenue</h3>
                    <span class="text-2xl icon-currency text-gray-400"></span>
                </div>
                <p class="text-3xl font-bold text-gray-900 mb-1"><?php echo e(core()->formatPrice($statistics['today_revenue'] ?? 0)); ?></p>
                <p class="text-sm text-gray-500">Revenue earned today</p>
            </div>

            <!-- Pending Orders -->
            <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-base font-semibold text-gray-900">Pending Orders</h3>
                    <span class="text-2xl icon-clock text-gray-400"></span>
                </div>
                <p class="text-3xl font-bold text-gray-900 mb-1"><?php echo e($statistics['pending_orders'] ?? 0); ?></p>
                <p class="text-sm text-gray-500">Awaiting processing</p>
            </div>
        </div>

        <!-- Bottom Section: Stock Alerts + Best Selling Products -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Stock Alerts -->
            <div>
                <?php echo view_render_event('frooxi.admin.dashboard.stock_threshold.before'); ?>

                <?php echo $__env->make('admin::dashboard.stock-threshold-products', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php echo view_render_event('frooxi.admin.dashboard.stock_threshold.after'); ?>

            </div>

            <!-- Best Selling Products -->
            <div>
                <?php echo view_render_event('frooxi.admin.dashboard.top_selling.before'); ?>

                <?php echo $__env->make('admin::dashboard.top-selling-products', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php echo view_render_event('frooxi.admin.dashboard.top_selling.after'); ?>

            </div>
        </div>

        <!-- Recent Orders Table -->
        <div class="mt-6">
            <?php echo view_render_event('frooxi.admin.dashboard.todays_details.before'); ?>

            <?php echo $__env->make('admin::dashboard.todays-details', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo view_render_event('frooxi.admin.dashboard.todays_details.after'); ?>

        </div>

    </div>

    <?php if (! $__env->hasRenderedOnce('dfd757ef-d6f8-4531-bbd1-449a83c9afa0')): $__env->markAsRenderedOnce('dfd757ef-d6f8-4531-bbd1-449a83c9afa0');
$__env->startPush('scripts'); ?>
        <script
            type="text/x-template"
            id="v-dashboard-filters-template"
        >
            <div class="flex flex-wrap gap-2 items-center">
                <?php if (isset($component)) { $__componentOriginalfb6be9e824dd35fb24e37e299d255b9b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfb6be9e824dd35fb24e37e299d255b9b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.flat-picker.date','data' => ['class' => '!w-[140px]',':allowInput' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::flat-picker.date'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!w-[140px]',':allow-input' => 'false']); ?>
                    <input
                        class="flex h-[36px] w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm font-medium text-gray-700 transition-all hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        v-model="filters.start"
                        placeholder="<?php echo app('translator')->get('admin::app.dashboard.index.start-date'); ?>"
                    />
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfb6be9e824dd35fb24e37e299d255b9b)): ?>
<?php $attributes = $__attributesOriginalfb6be9e824dd35fb24e37e299d255b9b; ?>
<?php unset($__attributesOriginalfb6be9e824dd35fb24e37e299d255b9b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfb6be9e824dd35fb24e37e299d255b9b)): ?>
<?php $component = $__componentOriginalfb6be9e824dd35fb24e37e299d255b9b; ?>
<?php unset($__componentOriginalfb6be9e824dd35fb24e37e299d255b9b); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalfb6be9e824dd35fb24e37e299d255b9b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfb6be9e824dd35fb24e37e299d255b9b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.flat-picker.date','data' => ['class' => '!w-[140px]',':allowInput' => 'false']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::flat-picker.date'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!w-[140px]',':allow-input' => 'false']); ?>
                    <input
                        class="flex h-[36px] w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-sm font-medium text-gray-700 transition-all hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        v-model="filters.end"
                        placeholder="<?php echo app('translator')->get('admin::app.dashboard.index.end-date'); ?>"
                    />
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfb6be9e824dd35fb24e37e299d255b9b)): ?>
<?php $attributes = $__attributesOriginalfb6be9e824dd35fb24e37e299d255b9b; ?>
<?php unset($__attributesOriginalfb6be9e824dd35fb24e37e299d255b9b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfb6be9e824dd35fb24e37e299d255b9b)): ?>
<?php $component = $__componentOriginalfb6be9e824dd35fb24e37e299d255b9b; ?>
<?php unset($__componentOriginalfb6be9e824dd35fb24e37e299d255b9b); ?>
<?php endif; ?>

                <button
                    type="button"
                    class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-1.5 text-sm font-medium text-white transition-all hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    @click="applyFilter"
                >
                    <span class="icon-search text-base"></span>
                    <?php echo app('translator')->get('admin::app.dashboard.index.apply-filter'); ?>
                </button>
            </div>
        </script>

        <script type="module">
            app.component('v-dashboard-filters', {
                template: '#v-dashboard-filters-template',

                data() {
                    return {
                        filters: {
                            start: "<?php echo e($startDate->format('Y-m-d')); ?>",
                            end: "<?php echo e($endDate->format('Y-m-d')); ?>",
                        }
                    }
                },

                methods: {
                    applyFilter() {
                        // Reload dashboard with new date range
                        const params = new URLSearchParams({
                            start: this.filters.start,
                            end: this.filters.end
                        });
                        window.location.href = '<?php echo e(route('admin.dashboard.index')); ?>?' + params.toString();
                    }
                }
            });
        </script>
    <?php $__env->stopPush(); endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1)): ?>
<?php $attributes = $__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1; ?>
<?php unset($__attributesOriginal8001c520f4b7dcb40a16cd3b411856d1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8001c520f4b7dcb40a16cd3b411856d1)): ?>
<?php $component = $__componentOriginal8001c520f4b7dcb40a16cd3b411856d1; ?>
<?php unset($__componentOriginal8001c520f4b7dcb40a16cd3b411856d1); ?>
<?php endif; ?>
<?php /**PATH /var/www/YourNextOutfits/packages/Frooxi/Admin/src/Providers/../Resources/views/dashboard/index.blade.php ENDPATH**/ ?>