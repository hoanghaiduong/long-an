<?php $__env->startSection('title',  translate('register')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-4 __inline-7"
         style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
        <div class="login-card">
            <div class="mx-auto __max-w-760">
                <h2 class="text-center h4 mb-4 font-bold text-capitalize fs-18-mobile"><?php echo e(translate('sign_up')); ?></h2>
                <form class="needs-validation_" id="form-id" action="<?php echo e(route('customer.auth.sign-up')); ?>"
                        method="post" id="sign-up-form">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-semibold"><?php echo e(translate('first_name')); ?></label>
                                <input class="form-control" value="<?php echo e(old('f_name')); ?>" type="text" name="f_name"
                                        style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;" placeholder="<?php echo e(translate('Ex')); ?>: Jhone"
                                        required >
                                <div class="invalid-feedback"><?php echo e(translate('please_enter_your_first_name')); ?>!</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-semibold"><?php echo e(translate('last_name')); ?></label>
                                <input class="form-control" type="text" value="<?php echo e(old('l_name')); ?>" name="l_name"
                                        style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;" placeholder="<?php echo e(translate('Ex')); ?>: Doe" required>
                                <div class="invalid-feedback"><?php echo e(translate('please_enter_your_last_name')); ?>!</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-semibold"><?php echo e(translate('email_address')); ?></label>
                                <input class="form-control" type="email" value="<?php echo e(old('email')); ?>"  name="email"
                                        style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;" placeholder="<?php echo e(translate('enter_email_address')); ?>"
                                        autocomplete="off"
                                        required>
                                <div class="invalid-feedback"><?php echo e(translate('please_enter_valid_email_address')); ?>!</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-semibold"><?php echo e(translate('phone_number')); ?>

                                    <small class="text-primary">( * <?php echo e(translate('country_code_is_must_like_for_BD')); ?> 880 )</small></label>
                                <input class="form-control" type="number"  value="<?php echo e(old('phone')); ?>"  name="phone"
                                        style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                        placeholder="<?php echo e(translate('enter_phone_number')); ?>"
                                        required>
                                <div class="invalid-feedback"><?php echo e(translate('please_enter_your_phone_number')); ?>!</div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-semibold"><?php echo e(translate('password')); ?></label>
                                <div class="password-toggle rtl">
                                    <input class="form-control" name="password" type="password" id="si-password"
                                            style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                            placeholder="<?php echo e(translate('minimum_8_characters_long')); ?>"
                                            required>
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"><i
                                            class="tio-hidden password-toggle-indicator"></i><span
                                            class="sr-only"><?php echo e(translate('show_password')); ?> </span>
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label font-semibold"><?php echo e(translate('confirm_password')); ?></label>
                                <div class="password-toggle rtl">
                                    <input class="form-control" name="con_password" type="password"
                                            style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                            placeholder="<?php echo e(translate('minimum_8_characters_long')); ?>"
                                            id="si-password"
                                            required>
                                    <label class="password-toggle-btn">
                                        <input class="custom-control-input" type="checkbox"
                                                style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"><i
                                            class="tio-hidden password-toggle-indicator"></i><span
                                            class="sr-only"><?php echo e(translate('show_password')); ?> </span>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <?php if($web_config['ref_earning_status']): ?>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label font-semibold"><?php echo e(translate('refer_code')); ?> <small class="text-muted">(<?php echo e(translate('optional')); ?>)</small></label>
                                <input type="text" id="referral_code" class="form-control"
                                name="referral_code" placeholder="<?php echo e(translate('use_referral_code')); ?>">
                            </div>
                        </div>
                        <?php endif; ?>

                    </div>
                    <div class="col-12">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="rtl">
                                    <label class="custom-control custom-checkbox m-0 d-flex">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="inputCheckd">
                                        <span class="custom-control-label">
                                            <span><?php echo e(translate('i_agree_to_Your')); ?></span> <a class="font-size-sm" target="_blank" href="<?php echo e(route('terms')); ?>"><?php echo e(translate('terms_and_condition')); ?></a>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <?php ($recaptcha = \App\CPU\Helpers::get_business_settings('recaptcha')); ?>
                                <?php if(isset($recaptcha) && $recaptcha['status'] == 1): ?>
                                    <div id="recaptcha_element" class="w-100" data-type="image"></div>
                                <?php else: ?>
                                <div class="row">
                                    <div class="col-6 pr-2">
                                        <input type="text" class="form-control border __h-40" name="default_recaptcha_value_customer_regi" value=""
                                                placeholder="<?php echo e(translate('enter_captcha_value')); ?>" autocomplete="off">
                                    </div>
                                    <div class="col-6 input-icons mb-2 w-100 rounded bg-white">
                                        <a onclick="re_captcha();" class="d-flex align-items-center align-items-center">
                                            <img src="<?php echo e(URL('/customer/auth/code/captcha/1?captcha_session_id=default_recaptcha_id_customer_regi')); ?>" class="input-field rounded __h-40" id="default_recaptcha_id">
                                            <i class="tio-refresh icon cursor-pointer p-2"></i>
                                        </a>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div style="direction: <?php echo e(Session::get('direction')); ?>">
                        <div class="mx-auto mt-4 __max-w-356">
                            <button class="w-100 btn btn--primary" id="sign-up" type="submit" disabled>
                                <?php echo e(translate('sign_up')); ?>

                            </button>
                        </div>
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

                        <div class="text-black-50 mt-3 text-center">
                            <small>
                                <?php echo e(translate('Already_have_account ')); ?>?
                                <a class="text-primary text-underline" href="<?php echo e(route('customer.auth.login')); ?>">
                                    <?php echo e(translate('sign_in')); ?>

                                </a>
                            </small>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $('#inputCheckd').change(function () {
            // console.log('jell');
            if ($(this).is(':checked')) {
                $('#sign-up').removeAttr('disabled');
            } else {
                $('#sign-up').attr('disabled', 'disabled');
            }

        });

    </script>

    
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
            function re_captcha() {
                $url = "<?php echo e(URL('/customer/auth/code/captcha')); ?>";
                $url = $url + "/" + Math.random()+'?captcha_session_id=default_recaptcha_id_customer_regi';
                document.getElementById('default_recaptcha_id').src = $url;
                console.log('url: '+ $url);
            }
        </script>
    <?php endif; ?>
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\long-an\resources\themes\default/customer-view/auth/register.blade.php ENDPATH**/ ?>