@extends('layouts.back-end.app')


@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('title', translate('posts_type')) @section('content')

<section class="section-content pt-5">
    <div class="container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img
                    src="{{
                        asset('public/assets/back-end/img/add-new-delivery-man.png')
                    }}"
                    alt=""
                />
                {{ translate("add_post_type") }}
            </h2>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form
                class="post-type-form text-start"
                action="{{ route('admin.posts.post_type_store') }}"
                method="POST"
                enctype="multipart/form-data"
                id="post_type_form"
            >
            @csrf
                <div class="card">
                    <div class="px-4 pt-3">
                        @php($language = \App\Model\BusinessSetting::where('type', 'pnc_language')->first())
                        @php($language = $language->value ?? null)
                        @php($default_lang = 'en')
    
                        @php($default_lang = json_decode($language)[0])
                        <ul class="nav nav-tabs w-fit-content mb-4">
                            @foreach (json_decode($language) as $lang)
                                <li class="nav-item">
                                    <a class="nav-link text-capitalize lang_link {{ $lang == $default_lang ? 'active' : '' }}"
                                        href="#"
                                        id="{{ $lang }}-link">{{ \App\CPU\Helpers::get_language_name($lang) . '(' . strtoupper($lang) . ')' }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        @foreach (json_decode($language) as $lang)
                        <div class="{{ $lang != $default_lang ? 'd-none' : '' }} lang_form" id="{{ $lang }}-form">
    
                             <div class="form-group">
                            <label class="title-color" for="{{ $lang }}_name"
                                >{{ translate("post_type_title") }} ({{
                                    strtoupper($lang)
                                }})
                            </label>
                            <input
                            type="hidden"
                            name="lang[]"
                            value="{{ $lang }}"
                        />
                            <input type="text"
                            {{ $lang == $default_lang ? "required" : "" }}
                            name="name[]" id="{{ $lang }}_name"
                            class="form-control" placeholder="New post type name">
                        </div>
                        </div>
                        @endforeach
                       
                    </div>
                </div>
                <div class="row justify-content-end gap-3 mt-3 mx-1">
                    <button type="reset" class="btn btn-secondary px-5">
                        {{ translate("reset") }}
                    </button>
                    <button
                        type="button"
                        onclick="check()"
                        class="btn btn--primary px-5"
                    >
                        {{ translate("submit") }}
                    </button>
                </div>
            </form>
            </div>
        </div>
        <div class="row mt-20" id="cate-table">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="row align-items-center">
                            <div class="col-sm-4 col-md-6 col-lg-8 mb-2 mb-sm-0">
                                <h5 class="text-capitalize d-flex gap-1">
                                    {{ translate('list_post_type')}}
                                    <span class="badge badge-soft-dark radius-50 fz-12">{{ $post_types->total() }}</span>
                                </h5>
                            </div>
                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <!-- Search -->
                                <form action="{{ url()->current() }}" method="GET">
                                    <div class="input-group input-group-custom input-group-merge">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="" type="search" name="search" class="form-control"
                                            placeholder="{{ translate('search_here')}}" value="{{ $search }}" required>
                                        <button type="submit" class="btn btn--primary">{{translate('search')}}</button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};"
                            class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                            <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th>{{ translate('ID')}}</th>
                           
                                    <th>{{ translate('name')}}</th>

                                    <th class="text-center">{{ translate('action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($post_types as $key=>$post_type)
                                    <tr>
                                        <td >{{$post_type['id']}}</td>
                                        <td >{{$post_type['name']}}</td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-10">
                                                <a class="btn btn-outline-info btn-sm square-btn"
                                                  title="{{ translate('edit')}}"
                                                      href="{{route('admin.posts.post_type_edit',[$post_type['id']])}}"
                                                    >
                                                    <i class="tio-edit"></i>
                                                </a>
                                                <a class="btn btn-outline-danger btn-sm delete square-btn"
                                                    title="{{ translate('delete')}}"
                                                    id="{{$post_type['id']}}"
                                                    >
                                                    <i class="tio-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')


<script>

    function check() {
        Swal.fire({
            title: '{{ translate("are_you_sure") }}?',
            text: '{{ translate("want_to_add_this_product") }}!',
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: 'default',
            confirmButtonColor: '#377dff',
            cancelButtonText: '{{ translate("no") }}',
            confirmButtonText: '{{ translate("yes") }}',
            reverseButtons: true
        }).then((result) => {

            if (result.value) {


                var submit_status = 1;
                if (submit_status == 1) {
                    var formData = new FormData(document.getElementById('post_type_form'));
               
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
              
                    $.post({
                        url: '{{ route('admin.posts.post_type_store') }}',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            if (data.errors) {
                                for (var i = 0; i < data.errors.length; i++) {
                                    toastr.error(data.errors[i].message, {
                                        CloseButton: true,
                                        ProgressBar: true
                                    });
                                }
                            } else {
                                toastr.success(
                                    '{{ translate("posts_added_successfully") }}!', {
                                    CloseButton: true,
                                    ProgressBar: true
                                });
                                $('#post_type_form').submit();
                            }
                        }
                    });
                }


            }

        })
    };
</script>
@endpush
