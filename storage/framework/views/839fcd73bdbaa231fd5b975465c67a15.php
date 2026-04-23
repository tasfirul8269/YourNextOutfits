<?php if (isset($component)) { $__componentOriginal2643b7d197f48caff2f606750db81304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2643b7d197f48caff2f606750db81304 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.index','data' => ['hasHeader' => true,'hasFeature' => false,'hasFooter' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['has-header' => true,'has-feature' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'has-footer' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
     <?php $__env->slot('title', null, []); ?> 
        <?php echo app('translator')->get('shop::app.categories.index.title', ['default' => 'All Categories']); ?>
     <?php $__env->endSlot(); ?>

    <div style="padding: 28px 16px 100px; max-width: 1400px; margin: 0 auto; background: #fff; min-height: 100vh;">

        <!-- Page Heading -->
        <h1 style="font-size: 28px; font-weight: 400; letter-spacing: 0.06em; text-transform: uppercase; color: #14284a; margin: 0 0 24px 0; font-family: 'DM Serif Display', Georgia, serif; line-height: 1.2;">
            Explore Categories
        </h1>

        <!-- Responsive category grid — inline grid, JS swaps column count on resize -->
        <div
            id="cat-grid"
            style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px;"
        >
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a
                    href="<?php echo e($category->url); ?>"
                    style="display: block; text-decoration: none; border-radius: 14px; overflow: hidden; position: relative; aspect-ratio: 3/4; background: #e5e7eb;"
                    aria-label="<?php echo e($category->name); ?>"
                >
                    
                    <?php if($category->logo_url): ?>
                        <img
                            src="<?php echo e($category->logo_url); ?>"
                            alt="<?php echo e($category->name); ?>"
                            style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; border-radius: 0;"
                            loading="lazy"
                        >
                    <?php elseif($category->banner_url): ?>
                        <img
                            src="<?php echo e($category->banner_url); ?>"
                            alt="<?php echo e($category->name); ?>"
                            style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; border-radius: 0;"
                            loading="lazy"
                        >
                    <?php else: ?>
                        <div style="position: absolute; inset: 0; background: linear-gradient(135deg, #1a2a4a 0%, #2d4270 100%);"></div>
                    <?php endif; ?>

                    
                    <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.72) 0%, rgba(0,0,0,0.18) 50%, rgba(0,0,0,0) 100%);"></div>

                    
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 16px 14px 18px;">
                        <p style="margin: 0; font-size: 14px; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: #fff; font-family: Montserrat, sans-serif; line-height: 1.2;">
                            <?php echo e($category->name); ?>

                        </p>
                        <p style="margin: 4px 0 0; font-size: 12px; font-weight: 400; letter-spacing: 0.06em; text-transform: uppercase; color: rgba(255,255,255,0.82); font-family: Montserrat, sans-serif;">
                            <?php echo e($category->products_count); ?> Items
                        </p>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if($categories->isEmpty()): ?>
            <div style="text-align: center; padding: 64px 16px; color: #9ca3af; font-family: Montserrat, sans-serif; font-size: 15px;">
                No categories found.
            </div>
        <?php endif; ?>

    </div>

    <script>
        (function () {
            var grid = document.getElementById('cat-grid');
            if (!grid) return;

            function updateCols() {
                var w = window.innerWidth;
                if (w >= 1280) {
                    grid.style.gridTemplateColumns = 'repeat(5, 1fr)';
                    grid.style.gap = '20px';
                } else if (w >= 768) {
                    grid.style.gridTemplateColumns = 'repeat(4, 1fr)';
                    grid.style.gap = '16px';
                } else {
                    grid.style.gridTemplateColumns = 'repeat(2, 1fr)';
                    grid.style.gap = '12px';
                }
            }

            updateCols();
            window.addEventListener('resize', updateCols);
        })();
    </script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2643b7d197f48caff2f606750db81304)): ?>
<?php $attributes = $__attributesOriginal2643b7d197f48caff2f606750db81304; ?>
<?php unset($__attributesOriginal2643b7d197f48caff2f606750db81304); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2643b7d197f48caff2f606750db81304)): ?>
<?php $component = $__componentOriginal2643b7d197f48caff2f606750db81304; ?>
<?php unset($__componentOriginal2643b7d197f48caff2f606750db81304); ?>
<?php endif; ?>

<?php /**PATH /Users/tasfirulhaque/Frooxi/Iqbal Hossen/bagisto_ecom/packages/Frooxi/Shop/src/resources/views/home/all-categories.blade.php ENDPATH**/ ?>