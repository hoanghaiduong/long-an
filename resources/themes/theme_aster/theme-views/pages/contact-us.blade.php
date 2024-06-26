@extends('theme-views.layouts.app')

@section('title', translate('contact_us').' | '.$web_config['name']->value.' '.translate('ecommerce'))

@section('content')
    <!-- Main Content -->
    <main class="main-content d-flex flex-column gap-3 pt-3 mb-sm-5">
        <div class="container">
            <div class="card">
                <div class="card-body px-lg-5">
                    <h2 class="text-center mb-5 fs-30">{{ translate('get_In') }}<span class="text-primary">{{ translate('touch') }}</span></h2>
                    <div class="row g-4 mb-5 pb-4">
                        <div class="col-md-6 col-lg-4">
                            <div class="media gap-3">
                                <div class="px-3 py-2 bg-primary rounded">
                                    <i class="bi bi-phone-fill fs-4 absolute-white"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="mb-2">{{ translate('call_us') }}</h4>
                                    <a class="fs-18" href="tel:{{$web_config['phone']->value}}">{{$web_config['phone']->value}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="media gap-3">
                                <div class="px-3 py-2 bg-primary rounded">
                                    <i class="bi bi-envelope-fill fs-4 absolute-white"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="mb-2">{{ translate('mail_us') }}</h4>
                                    <a href="mailto:{{\App\CPU\Helpers::get_business_settings('company_email')}}">{{\App\CPU\Helpers::get_business_settings('company_email')}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="media gap-3">
                                <div class="px-3 py-2 bg-primary rounded">
                                    <i class="bi bi-pin-map-fill fs-4 absolute-white"></i>
                                </div>
                                <div class="media-body">
                                    <h4 class="mb-2">{{ translate('Find_us') }}</h4>
                                    <p>{{ \App\CPU\Helpers::get_business_settings('shop_address')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pb-3">
                        <h4 class="col-12 mb-3 order-1">{{ translate('type_here') }}</h4>
                        <div class="col-lg-7 col-xl-8 order-1">
                            <form action="{{route('contact.store')}}" method="POST" id="getResponse">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-4">
                                            <label for="name">{{ translate('name') }}</label>
                                            <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="{{ translate('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-4">
                                            <label for="email">{{ translate('email_address') }}</label>
                                            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ translate('email_address') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-4">
                                            <label for="message">{{ translate('contact_number') }}</label>
                                            <input type="text" name="mobile_number" value="{{ old('mobile_number') }}" class="form-control" rows="6" placeholder="{{ translate('contact_number') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-4">
                                            <label for="message">{{ translate('Subject') }}</label>
                                            <input type="text" name="subject" value="{{ old('subject') }}" class="form-control" rows="6" placeholder="{{ translate('short_title') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="message">{{ translate('message') }}</label>
                                    <textarea name="message" id="message" class="form-control" rows="6" placeholder="{{ translate('type_your_message_here..') }}"> {{ old('subject') }} </textarea>
                                </div>
                                @if(isset($recaptcha) && $recaptcha['status'] == 1)
                                    <div id="recaptcha_element_contact" class="w-100" data-type="image"></div>
                                    <br/>
                                @else
                                    <div class="row p-2">
                                        <div class="col-6 pr-0">
                                            <input type="text" class="form-control form-control-lg border-0" name="default_captcha_value" value=""
                                                   placeholder="{{translate('Enter_captcha_value')}}" autocomplete="off">
                                        </div>
                                        <div class="col-6 input-icons rounded">
                                            <a onclick="javascript:re_captcha();">
                                                <img src="{{ URL('/contact/code/captcha/1') }}" class="input-field __h-40" id="default_recaptcha_id">
                                                <i class="bi bi-arrow-repeat icon cursor-pointer p-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary rounded px-5">{{ translate('submit') }}</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-5 col-xl-4 mb-4 mb-lg-0 order-0 order-lg-2">
                            <div class="d-flex justify-content-lg-end text-primary">
                                <img width="400" class="dark-support svg" src="{{ theme_asset('assets/img/media/contact.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End Main Content -->
@endsection

@push('script')
    {{-- recaptcha scripts start --}}
    @if(isset($recaptcha) && $recaptcha['status'] == 1)
        <script type="text/javascript">
            var onloadCallback = function () {
                grecaptcha.render('recaptcha_element_contact', {
                    'sitekey': '{{ \App\CPU\Helpers::get_business_settings('recaptcha')['site_key'] }}'
                });
            };
        </script>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async
                defer></script>
        <script>
            $("#getResponse").on('submit', function (e) {
                var response = grecaptcha.getResponse();

                if (response.length === 0) {
                    e.preventDefault();
                    toastr.error("{{ translate('Please_check_the_recaptcha') }}");
                }
            });
        </script>
    @else
        <script type="text/javascript">
            function re_captcha() {
                $url = "{{ URL('/contact/code/captcha') }}";
                var randomNumber = Math.floor(Math.random() * 1000); // Tạo một số ngẫu nhiên từ 0 đến 999
                $url = $url + "/" + randomNumber;
                document.getElementById('default_recaptcha_id').src = $url;
                console.log('url: '+ $url);
            }
        </script>
    @endif
    {{-- recaptcha scripts end --}}
@endpush

