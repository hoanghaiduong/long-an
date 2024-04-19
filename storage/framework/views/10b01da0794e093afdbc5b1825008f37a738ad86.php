<?php $__env->startSection('title', translate('login')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <style>
        .password-toggle-btn .custom-control-input:checked ~ .password-toggle-indicator {
            color: <?php echo e($web_config['primary_color']); ?>;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container py-4 py-lg-5 my-4"
         style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
         <div class="login-card">
            <div class="mx-auto __max-w-360">
                <h2 class="text-center h4 mb-4 font-bold text-capitalize fs-18-mobile"><?php echo e(translate('login')); ?></h2>
                <form class="needs-validation mt-2" autocomplete="off" action="<?php echo e(route('customer.auth.login')); ?>"
                        method="post" id="form-id">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label class="form-label font-semibold"><?php echo e(translate('email')); ?>

                            / <?php echo e(translate('phone')); ?></label>
                        <input class="form-control" type="text" name="user_id" id="si-email"
                                style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                value="<?php echo e(old('user_id')); ?>"
                                placeholder="<?php echo e(translate('enter_email_address_or_phone_number')); ?>"
                                required>
                        <div class="invalid-feedback"><?php echo e(translate('please_provide_valid_email_or_phone_number')); ?> .</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label font-semibold"><?php echo e(translate('password')); ?></label>
                        <div class="password-toggle rtl">
                            <input class="form-control" name="password" type="password" id="si-password" placeholder="<?php echo e(translate('password must be 7+ Character')); ?>"
                                    style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                    required>
                            <label class="password-toggle-btn">
                                <input class="custom-control-input" type="checkbox">
                                    <i class="tio-hidden password-toggle-indicator"></i>
                                    <span class="sr-only"><?php echo e(translate('show_password')); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group d-flex flex-wrap justify-content-between">
                        <div class="rtl">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="remember"
                                        id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                <label class="custom-control-label text-primary" for="remember"><?php echo e(translate('remember_me')); ?></label>
                            </div>
                        </div>
                        <a class="font-size-sm text-primary text-underline" href="<?php echo e(route('customer.auth.recover-password')); ?>">
                            <?php echo e(translate('forgot_password')); ?>?
                        </a>
                    </div>
                    <?php ($recaptcha = \App\CPU\Helpers::get_business_settings('recaptcha')); ?>
                    <?php if(isset($recaptcha) && $recaptcha['status'] == 1): ?>
                        <div id="recaptcha_element" class="w-100" data-type="image"></div>
                        <br/>
                    <?php else: ?>
                        <div class="row py-2">
                            <div class="col-6 pr-2">
                                <input type="text" class="form-control border __h-40" name="default_recaptcha_id_customer_login" value=""
                                    placeholder="<?php echo e(translate('enter_captcha_value')); ?>" autocomplete="off">
                            </div>
                            <div class="col-6 input-icons mb-2 w-100 rounded bg-white">
                                <a onclick="re_captcha();" class="d-flex align-items-center align-items-center">
                                    <img src="<?php echo e(URL('/customer/auth/code/captcha/1?captcha_session_id=default_recaptcha_id_customer_login')); ?>" class="input-field rounded __h-40" id="customer_login_recaptcha_id">
                                    <i class="tio-refresh icon cursor-pointer p-2"></i>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <button class="btn btn--primary btn-block btn-shadow"
                            type="submit"><?php echo e(translate('log_in')); ?></button>
                </form>
                <div class="text-center m-3 text-black-50">
                    <small><?php echo e(translate('or_continue_with')); ?></small>
                </div>
                <div class="d-flex justify-content-center my-3 gap-2">
                <?php $__currentLoopData = \App\CPU\Helpers::get_business_settings('social_login'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialLoginService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($socialLoginService) && $socialLoginService['status']==true): ?>
                        <div>
                            <a class="d-block" href="<?php echo e(route('customer.auth.service-login', $socialLoginService['login_medium'])); ?>">
                                <img src="<?php echo e(asset('/public/assets/front-end/img/icons/'.$socialLoginService['login_medium'].'.png')); ?>" alt="">
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="text-black-50 text-center">
                    <small>
                        <?php echo e(translate('Enjoy_New_experience')); ?>

                        <a class="text-primary text-underline" href="<?php echo e(route('customer.auth.sign-up')); ?>">
                            <?php echo e(translate('sign_up')); ?>

                        </a>
                    </small>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    
    <?php if(isset($recaptcha) && $recaptcha['status'] == 1): ?>
        <script type="text/javascript">
            var onloadCallback = function () {
                grecaptcha.render('recaptcha_element', {
                    'sitekey': '<?php echo e(\App\CPU\Helpers::get_business_settings('recaptcha')['site_key']); ?>'
                });
            };
        </script>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async
                defer></script>
        <script>
            $("#form-id").on('submit', function (e) {
                var response = grecaptcha.getResponse();

                if (response.length === 0) {
                    e.preventDefault();
                    toastr.error("<?php echo e(translate('please_check_the_recaptcha')); ?>");
                }
            });
        </script>
    <?php else: ?>
        <script type="text/javascript"> 
        
            
            // <img src="<?php echo e(URL('/customer/auth/code/captcha/1?captcha_session_id=default_recaptcha_id_customer_login')); ?>"
            function re_captcha() {
                $url = "<?php echo e(URL('/customer/auth/code/captcha')); ?>";
                var randomNumber = Math.floor(Math.random() * 1000); // Tạo một số ngẫu nhiên từ 0 đến 999
                $url = $url + "/" + randomNumber +'?captcha_session_id=default_recaptcha_id_customer_login';
                document.getElementById('customer_login_recaptcha_id').src = $url;
                console.log('url: '+ $url);
            }
           
    
          
        </script>
    <?php endif; ?>
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\long-an\resources\themes\default/customer-view/auth/login.blade.php ENDPATH**/ ?>