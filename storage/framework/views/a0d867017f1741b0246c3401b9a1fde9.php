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
        <?php echo app('translator')->get('admin::app.catalog.categories.edit.title'); ?>
     <?php $__env->endSlot(); ?>

    <?php
        $currentLocale = core()->getRequestedLocale();
    ?>

    <?php echo view_render_event('frooxi.admin.catalog.categories.edit.before', ['category' => $category]); ?>


    <!-- Category Edit Form -->
    <?php if (isset($component)) { $__componentOriginal81b4d293d9113446bb908fc8aef5c8f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.index','data' => ['action' => route('admin.catalog.categories.update', $category->id),'enctype' => 'multipart/form-data','method' => 'PUT']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.catalog.categories.update', $category->id)),'enctype' => 'multipart/form-data','method' => 'PUT']); ?>

        <?php echo view_render_event('frooxi.admin.catalog.categories.edit.edit_form_controls.before', ['category' => $category]); ?>


        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap">
            <h1 class="font-serif text-2xl font-bold text-gray-900">
                <?php echo app('translator')->get('admin::app.catalog.categories.edit.title'); ?>
            </h1>

            <div class="flex items-center gap-x-2.5">
                <!-- Back Button -->
                <a
                    href="<?php echo e(route('admin.catalog.categories.index')); ?>"
                    class="transparent-button hover:bg-gray-200 dark:text-white dark:hover:bg-gray-800"
                >
                    <?php echo app('translator')->get('admin::app.catalog.categories.edit.back-btn'); ?>
                </a>

                <!-- Save Button -->
                <button
                    type="submit"
                    class="primary-button"
                >
                    <?php echo app('translator')->get('admin::app.catalog.categories.edit.save-btn'); ?>
                </button>
            </div>
        </div>

        <!-- Hidden required defaults -->
        <input type="hidden" name="locale" value="<?php echo e($currentLocale->code); ?>">
        <input type="hidden" name="position" value="<?php echo e($category->position ?: 1); ?>">
        <input type="hidden" name="display_mode" value="<?php echo e(in_array($category->display_mode, ['products_and_description', 'description_only']) ? 'products_only' : ($category->display_mode ?: 'products_only')); ?>">
        <input type="hidden" name="status" value="1">
        <?php $selectedAttributes = old('attributes') ?: $category->filterableAttributes->pluck('id')->toArray() ?>
        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="hidden" name="attributes[]" value="<?php echo e($attribute->id); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!-- Simplified Panel -->
        <div class="mt-6 flex flex-col gap-4 max-w-2xl">

            <?php echo view_render_event('frooxi.admin.catalog.categories.edit.card.general.before', ['category' => $category]); ?>


            <!-- General -->
            <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
                <p class="mb-4 text-base font-semibold text-gray-900 pb-3 border-b border-gray-50">
                    <?php echo app('translator')->get('admin::app.catalog.categories.edit.general'); ?>
                </p>

                <!-- Name -->
                <?php if (isset($component)) { $__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php if (isset($component)) { $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.label','data' => ['class' => 'required']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required']); ?>
                        <?php echo app('translator')->get('admin::app.catalog.categories.edit.name'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8)): ?>
<?php $attributes = $__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8; ?>
<?php unset($__attributesOriginal8378211f70f8c39b16d47cecdac9c7c8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8378211f70f8c39b16d47cecdac9c7c8)): ?>
<?php $component = $__componentOriginal8378211f70f8c39b16d47cecdac9c7c8; ?>
<?php unset($__componentOriginal8378211f70f8c39b16d47cecdac9c7c8); ?>
<?php endif; ?>

                    <v-field
                        type="text"
                        name="<?php echo e($currentLocale->code); ?>[name]"
                        value="<?php echo e(old($currentLocale->code)['name'] ?? ($category->translate($currentLocale->code)['name'] ?? '')); ?>"
                        label="<?php echo e(trans('admin::app.catalog.categories.edit.name')); ?>"
                        rules="required"
                        v-slot="{ field }"
                    >
                        <input
                            type="text"
                            name="<?php echo e($currentLocale->code); ?>[name]"
                            id="<?php echo e($currentLocale->code); ?>[name]"
                            v-bind="field"
                            :class="[errors['<?php echo e($currentLocale->code); ?>[name]'] ? 'border border-red-600 hover:border-red-600' : '']"
                            class="flex min-h-[39px] w-full rounded-md border px-3 py-2 text-sm text-gray-600 transition-all hover:border-gray-400 focus:border-gray-400 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300 dark:hover:border-gray-400 dark:focus:border-gray-400"
                            placeholder="<?php echo e(trans('admin::app.catalog.categories.edit.name')); ?>"
                            v-slugify-target:<?php echo e($currentLocale->code.'[slug]'); ?>="setValues"
                        />
                    </v-field>

                    <?php if (isset($component)) { $__componentOriginal8da25fb6534e2ef288914e35c32417f8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8da25fb6534e2ef288914e35c32417f8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.form.control-group.error','data' => ['controlName' => ''.e($currentLocale->code).'[name]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => ''.e($currentLocale->code).'[name]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8da25fb6534e2ef288914e35c32417f8)): ?>
<?php $attributes = $__attributesOriginal8da25fb6534e2ef288914e35c32417f8; ?>
<?php unset($__attributesOriginal8da25fb6534e2ef288914e35c32417f8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8da25fb6534e2ef288914e35c32417f8)): ?>
<?php $component = $__componentOriginal8da25fb6534e2ef288914e35c32417f8; ?>
<?php unset($__componentOriginal8da25fb6534e2ef288914e35c32417f8); ?>
<?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3)): ?>
<?php $attributes = $__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3; ?>
<?php unset($__attributesOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3)): ?>
<?php $component = $__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3; ?>
<?php unset($__componentOriginal7b1bc76a00ab5e7f1bf2c6429dae85a3); ?>
<?php endif; ?>

                <!-- Slug (hidden, auto-filled) -->
                <div style="display:none;">
                    <v-field
                        type="text"
                        name="<?php echo e($currentLocale->code); ?>[slug]"
                        rules="required"
                        value="<?php echo e(old($currentLocale->code)['slug'] ?? ($category->translate($currentLocale->code)['slug'] ?? '')); ?>"
                        label="<?php echo e(trans('admin::app.catalog.categories.edit.slug')); ?>"
                        v-slot="{ field }"
                    >
                        <input
                            type="text"
                            id="<?php echo e($currentLocale->code); ?>[slug]"
                            name="<?php echo e($currentLocale->code); ?>[slug]"
                            v-bind="field"
                            v-slugify-target:<?php echo e($currentLocale->code.'[slug]'); ?>

                        />
                    </v-field>
                </div>

                <!-- Parent category -->
                <?php if($categories->count()): ?>
                    <div class="mt-4">
                        <label class="mb-2.5 block text-xs font-medium leading-6 text-gray-700">
                            <?php echo app('translator')->get('admin::app.catalog.categories.edit.select-parent-category'); ?>
                        </label>

                        <div class="flex flex-col gap-3 text-sm text-gray-700">
                            <?php if (isset($component)) { $__componentOriginal52aaa072e73f9e8f086096eec28d0063 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal52aaa072e73f9e8f086096eec28d0063 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.tree.view','data' => ['inputType' => 'radio','nameField' => 'parent_id','valueField' => 'id','idField' => 'id','items' => json_encode($categories),'value' => json_encode($category->parent_id),'fallbackLocale' => config('app.fallback_locale')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::tree.view'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['input-type' => 'radio','name-field' => 'parent_id','value-field' => 'id','id-field' => 'id','items' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(json_encode($categories)),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(json_encode($category->parent_id)),'fallback-locale' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(config('app.fallback_locale'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal52aaa072e73f9e8f086096eec28d0063)): ?>
<?php $attributes = $__attributesOriginal52aaa072e73f9e8f086096eec28d0063; ?>
<?php unset($__attributesOriginal52aaa072e73f9e8f086096eec28d0063); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal52aaa072e73f9e8f086096eec28d0063)): ?>
<?php $component = $__componentOriginal52aaa072e73f9e8f086096eec28d0063; ?>
<?php unset($__componentOriginal52aaa072e73f9e8f086096eec28d0063); ?>
<?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <?php echo view_render_event('frooxi.admin.catalog.categories.edit.card.general.after', ['category' => $category]); ?>


            <!-- Category Image (Logo) -->
            <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm">
                <p class="mb-4 text-base font-semibold text-gray-900 pb-3 border-b border-gray-50">
                    Category Image
                </p>

                <p class="mb-3 text-xs text-gray-500">
                    <?php echo app('translator')->get('admin::app.catalog.categories.edit.logo-size'); ?>
                </p>

                <div class="rounded-xl border-2 border-dashed border-gray-200 bg-gray-50/50 p-6 text-center hover:border-[#D4A84B] transition-colors">
                    <?php if (isset($component)) { $__componentOriginal0d8f93bc2c41813121bcd9fcb7359a7d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0d8f93bc2c41813121bcd9fcb7359a7d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'admin::components.media.images','data' => ['name' => 'logo_path','uploadedImages' => $category->logo_path ? [['id' => 'logo_path', 'url' => $category->logo_url]] : []]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin::media.images'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'logo_path','uploaded-images' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category->logo_path ? [['id' => 'logo_path', 'url' => $category->logo_url]] : [])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0d8f93bc2c41813121bcd9fcb7359a7d)): ?>
<?php $attributes = $__attributesOriginal0d8f93bc2c41813121bcd9fcb7359a7d; ?>
<?php unset($__attributesOriginal0d8f93bc2c41813121bcd9fcb7359a7d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0d8f93bc2c41813121bcd9fcb7359a7d)): ?>
<?php $component = $__componentOriginal0d8f93bc2c41813121bcd9fcb7359a7d; ?>
<?php unset($__componentOriginal0d8f93bc2c41813121bcd9fcb7359a7d); ?>
<?php endif; ?>
                </div>
            </div>

        </div>

        <?php echo view_render_event('frooxi.admin.catalog.categories.edit.edit_form_controls.after', ['category' => $category]); ?>


     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6)): ?>
<?php $attributes = $__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6; ?>
<?php unset($__attributesOriginal81b4d293d9113446bb908fc8aef5c8f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal81b4d293d9113446bb908fc8aef5c8f6)): ?>
<?php $component = $__componentOriginal81b4d293d9113446bb908fc8aef5c8f6; ?>
<?php unset($__componentOriginal81b4d293d9113446bb908fc8aef5c8f6); ?>
<?php endif; ?>

    <?php echo view_render_event('frooxi.admin.catalog.categories.edit.after', ['category' => $category]); ?>


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
<?php /**PATH /var/www/YourNextOutfits/packages/Frooxi/Admin/src/Providers/../Resources/views/catalog/categories/edit.blade.php ENDPATH**/ ?>