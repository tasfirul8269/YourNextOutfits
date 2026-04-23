<?php if (isset($component)) { $__componentOriginal2643b7d197f48caff2f606750db81304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2643b7d197f48caff2f606750db81304 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.index','data' => ['hasHeader' => false,'hasFeature' => false,'hasFooter' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['has-header' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'has-feature' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'has-footer' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
     <?php $__env->slot('title', null, []); ?> 
        Verify Phone Number
     <?php $__env->endSlot(); ?>

    
    <div id="auth-outer" style="display:flex;min-height:100vh;font-family:'Montserrat',sans-serif;">

        
        <div id="auth-left" style="position:relative;flex:0 0 42%;background:#111;overflow:hidden;display:flex;flex-direction:column;justify-content:center;align-items:center;padding:56px 52px;">

            
            <div style="position:absolute;inset:0;background:linear-gradient(135deg,#1a1a2e 0%,#16213e 50%,#0f3460 100%);"></div>

            
            <div style="position:absolute;inset:0;opacity:.06;background-image:repeating-linear-gradient(45deg,#fff 0,#fff 1px,transparent 0,transparent 50%);background-size:28px 28px;"></div>

            
            <div style="position:relative;z-index:2;text-align:center;">
                <a href="<?php echo e(route('shop.home.index')); ?>" style="display:inline-block;margin-bottom:40px;" aria-label="<?php echo e(config('app.name')); ?>">
                    <img
                        src="<?php echo e(asset('themes/shop/logo_black.png')); ?>"
                        alt="<?php echo e(config('app.name')); ?>"
                        style="height:36px;width:auto;filter:brightness(0) invert(1);"
                    >
                </a>

                <h2 style="font-size:clamp(26px,3vw,40px);font-weight:500;line-height:1.1;letter-spacing:.05em;text-transform:uppercase;color:#fff;margin:0 0 20px;">
                    Almost There!
                </h2>

                <p style="font-size:13px;line-height:1.8;color:rgba(255,255,255,.5);max-width:320px;margin:0 auto;">
                    We've sent a verification code to your phone number. Enter it below to complete your registration.
                </p>
            </div>
        </div>

        
        <div id="auth-right" style="flex:1;background:#fff;display:flex;flex-direction:column;padding:56px 64px 64px;overflow-y:auto;">

            
            <div id="auth-mobile-logo" style="display:none;margin-bottom:40px;text-align:center;">
                <a href="<?php echo e(route('shop.home.index')); ?>" aria-label="<?php echo e(config('app.name')); ?>">
                    <img
                        src="<?php echo e(asset('themes/shop/logo_black.png')); ?>"
                        alt="<?php echo e(config('app.name')); ?>"
                        style="height:44px;width:auto;"
                    >
                </a>
            </div>

            
            <a href="<?php echo e(route('shop.home.index')); ?>" id="auth-desktop-logo" style="display:block;margin-bottom:40px;" aria-label="<?php echo e(config('app.name')); ?>">
                <img
                    src="<?php echo e(asset('themes/shop/logo_black.png')); ?>"
                    alt="<?php echo e(config('app.name')); ?>"
                    style="height:44px;width:auto;"
                >
            </a>

            <p style="font-size:10px;font-weight:700;letter-spacing:.24em;text-transform:uppercase;color:#9ca3af;margin:0 0 14px;">
                Verify Phone
            </p>

            <h1 style="font-size:clamp(22px,2.4vw,32px);font-weight:500;letter-spacing:.06em;text-transform:uppercase;color:#111;margin:0 0 8px;">
                Verify Your Phone
            </h1>

            <p style="font-size:13px;color:#6b7280;margin:0 0 28px;">
                Enter the 6-digit code sent to <strong><?php echo e($maskedPhone); ?></strong>
            </p>

            
            <?php if(session('success')): ?>
                <div style="margin-bottom:16px;padding:14px 18px;border-radius:8px;background:#f0fdf4;color:#15803d;font-size:13px;">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div style="margin-bottom:16px;padding:14px 18px;border-radius:8px;background:#fef2f2;color:#b91c1c;font-size:13px;">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('warning')): ?>
                <div style="margin-bottom:16px;padding:14px 18px;border-radius:8px;background:#fffbeb;color:#a16207;font-size:13px;">
                    <?php echo e(session('warning')); ?>

                </div>
            <?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal4d3fcee3e355fb6c8889181b04f357cc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.index','data' => ['action' => route('shop.customers.verify-otp.store')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.customers.verify-otp.store'))]); ?>
                <div style="margin-bottom:18px;">
                    <label style="display:block;font-size:11px;font-weight:600;letter-spacing:.14em;text-transform:uppercase;color:#374151;margin-bottom:7px;">
                        Verification Code
                        <span style="color:#ef4444;margin-left:2px;">*</span>
                    </label>
                    <?php if (isset($component)) { $__componentOriginal578beb4bb944f523450535628cf00b41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal578beb4bb944f523450535628cf00b41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if (isset($component)) { $__componentOriginal03b54b937596232babb8a12a8847d013 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal03b54b937596232babb8a12a8847d013 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.control','data' => ['type' => 'text','class' => '!rounded-lg !border-zinc-200 !bg-zinc-50 !px-4 !py-3 !text-sm !font-normal !text-center !tracking-[0.5em] !text-2xl','name' => 'otp','rules' => 'required|length:6','label' => 'OTP','placeholder' => '------','maxlength' => '6']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'text','class' => '!rounded-lg !border-zinc-200 !bg-zinc-50 !px-4 !py-3 !text-sm !font-normal !text-center !tracking-[0.5em] !text-2xl','name' => 'otp','rules' => 'required|length:6','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('OTP'),'placeholder' => '------','maxlength' => '6']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal03b54b937596232babb8a12a8847d013)): ?>
<?php $attributes = $__attributesOriginal03b54b937596232babb8a12a8847d013; ?>
<?php unset($__attributesOriginal03b54b937596232babb8a12a8847d013); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal03b54b937596232babb8a12a8847d013)): ?>
<?php $component = $__componentOriginal03b54b937596232babb8a12a8847d013; ?>
<?php unset($__componentOriginal03b54b937596232babb8a12a8847d013); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.error','data' => ['controlName' => 'otp']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['control-name' => 'otp']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf)): ?>
<?php $attributes = $__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf; ?>
<?php unset($__attributesOriginal72f1d7ac608c1db7c92b56fb85299dbf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf)): ?>
<?php $component = $__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf; ?>
<?php unset($__componentOriginal72f1d7ac608c1db7c92b56fb85299dbf); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal578beb4bb944f523450535628cf00b41)): ?>
<?php $attributes = $__attributesOriginal578beb4bb944f523450535628cf00b41; ?>
<?php unset($__attributesOriginal578beb4bb944f523450535628cf00b41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal578beb4bb944f523450535628cf00b41)): ?>
<?php $component = $__componentOriginal578beb4bb944f523450535628cf00b41; ?>
<?php unset($__componentOriginal578beb4bb944f523450535628cf00b41); ?>
<?php endif; ?>
                </div>

                
                <button
                    type="submit"
                    style="width:100%;height:52px;background:#111;color:#fff;border:none;border-radius:8px;font-family:'Montserrat',sans-serif;font-size:12px;font-weight:600;letter-spacing:.2em;text-transform:uppercase;cursor:pointer;margin-bottom:24px;"
                    onmouseover="this.style.background='#333'"
                    onmouseout="this.style.background='#111'"
                >
                    Verify & Create Account
                </button>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc)): ?>
<?php $attributes = $__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc; ?>
<?php unset($__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d3fcee3e355fb6c8889181b04f357cc)): ?>
<?php $component = $__componentOriginal4d3fcee3e355fb6c8889181b04f357cc; ?>
<?php unset($__componentOriginal4d3fcee3e355fb6c8889181b04f357cc); ?>
<?php endif; ?>

            <div style="display:flex;align-items:center;justify-content:space-between;">
                <form action="<?php echo e(route('shop.customers.resend-otp')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button
                        type="submit"
                        style="background:none;border:none;cursor:pointer;font-size:13px;font-weight:600;color:#0f3460;font-family:'Montserrat',sans-serif;padding:0;"
                        onmouseover="this.style.textDecoration='underline'"
                        onmouseout="this.style.textDecoration='none'"
                    >
                        Resend OTP
                    </button>
                </form>

                <a
                    href="<?php echo e(route('shop.customers.register.index')); ?>"
                    style="font-size:13px;color:#6b7280;text-decoration:none;font-family:'Montserrat',sans-serif;"
                    onmouseover="this.style.color='#374151'"
                    onmouseout="this.style.color='#6b7280'"
                >
                    Back to Registration
                </a>
            </div>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <script>
            function authResponsive() {
                var left       = document.getElementById('auth-left');
                var right      = document.getElementById('auth-right');
                var mobileLogo = document.getElementById('auth-mobile-logo');
                var desktopLogo = document.getElementById('auth-desktop-logo');
                var isMob      = window.innerWidth < 768;

                if (left)  left.style.display   = isMob ? 'none' : 'flex';
                if (right) right.style.padding  = isMob ? '40px 24px 60px' : '56px 64px 64px';
                if (mobileLogo) mobileLogo.style.display  = isMob ? 'block' : 'none';
                if (desktopLogo) desktopLogo.style.display = isMob ? 'none' : 'block';
            }

            authResponsive();
            window.addEventListener('resize', authResponsive);
        </script>
    <?php $__env->stopPush(); ?>
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
<?php /**PATH /Users/tasfirulhaque/Frooxi/Iqbal Hossen/bagisto_ecom/packages/Frooxi/Shop/src/resources/views/customers/verify-otp.blade.php ENDPATH**/ ?>