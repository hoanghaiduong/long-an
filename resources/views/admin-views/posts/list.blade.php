@extends('layouts.back-end.app')

@section('title', translate('posts_List'))


@push('css_or_js')
<link href="{{ asset('public/assets/select2/css/select2.min.css') }}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #dedede;
        border: 1px solid #dedede;
        border-radius: 2px;
        color: #222;
        display: flex;
        gap: 4px;
        align-items: center;
    }
</style>
@endpush

@section('content')
<div class="content container-fluid">
    <!-- Page Title -->
    <div class="mb-3">
        <h2 class="h1 mb-0 text-capitalize d-flex gap-2">
            <img src="{{asset('/public/assets/back-end/img/inhouse-product-list.png')}}" alt="">
                {{translate('posts_List')}}
            <span class="badge badge-soft-dark radius-50 fz-14 ml-1">{{ $posts->total() }}</span>
        </h2>
    </div>
    <!-- End Page Title -->
    <!-- Filter -->
    <div class="card">
        <div class="card-body">
            <form action="{{ url()->current() }}"  method="GET">
                <div class="row gx-2">
                    <div class="col-12">
                        <h4 class="mb-3">{{translate('filter_Posts')}}</h4>
                    </div>
                
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="form-group">
                            <label class="title-color" for="post_type_id">{{translate('post_type')}}</label>
                            <select name="post_type_id"  class="form-control text-capitalize js-select2-custom">
                                <option value=""  selected>{{translate('all_posts')}}</option>
                                @foreach ($post_types as $pts)
                                    <option value="{{$pts->id}}"{{request('post_type_id')==$pts->id ? 'selected' :''}}>
                                        {{ $pts->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="form-group">
                            <label class="title-color" for="status">{{translate('post_status')}}</label>
                            <select name="status" class="form-control js-select2-custom">
                                <option value="" selected disabled>{{translate('all_post_status')}}</option>
                                @foreach ($statusValues as $status)
                                    <option value="{{ $status }}"{{ request('status') == $status ? 'selected' : '' }}>
                                        {{ translate($status) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="form-group">
                            <label class="title-color" for="author_id">{{translate('Authors')}}</label>
                            <select name="author_id"  class="form-control text-capitalize js-select2-custom">
                                <option value=""  selected>{{translate('all_authors')}}</option>
                                @foreach ($admins as $admin)
                                    <option value="{{$admin->id}}"{{request('author_id')==$admin->id ? 'selected' :''}}>
                                        {{ $admin->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex gap-3 justify-content-end">
                            <a href="{{ route('admin.posts.list')}}" class="btn btn-secondary px-5">
                                {{translate('reset')}}
                            </a>
                            <button type="submit" class="btn btn--primary px-5" onclick="formUrlChange(this)" data-action="{{ url()->current() }}">
                                {{translate('show_data')}}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Filter -->

    <div class="row mt-20">
        <div class="col-md-12">
            <div class="card">
                <div class="px-3 py-4">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <!-- Search -->
                            <form action="{{ url()->current() }}" method="GET">
                                <div class="input-group input-group-custom input-group-merge">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tio-search"></i>
                                        </div>
                                    </div>
                                    <input id="datatableSearch_" type="search" name="search" class="form-control"
                                           placeholder="{{translate('search_Product_Name')}}" aria-label="Search orders"
                                           value="{{ request('search') }}" >
                                
                                    <button type="submit" class="btn btn--primary">{{translate('search')}}</button>
                                </div>
                            </form>
                            <!-- End Search -->
                        </div>
                        <div class="col-lg-8 mt-3 mt-lg-0 d-flex flex-wrap gap-3 justify-content-lg-end">

                                <div>
                                    <button type="button" class="btn btn-outline--primary" data-toggle="dropdown">
                                        <i class="tio-download-to"></i>
                                        {{translate('export')}}
                                        <i class="tio-chevron-down"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.posts.export-excel')}}">
                                                <img width="14" src="{{asset('/public/assets/back-end/img/excel.png')}}" alt="">
                                                {{translate('excel')}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                         
                            
                                <a href="{{route('admin.posts.add-new')}}" class="btn btn--primary">
                                    <i class="tio-add"></i>
                                    <span class="text">{{translate('add_new_post')}}</span>
                                </a>
                          
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};" class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                        <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th>{{translate('title')}}</th>
                                <th>{{translate('sub_title')}}</th>
                                <th>{{translate('thumbnail')}}</th>
                                <th>{{translate('post_status')}}</th>
                                <th class="text-center">{{translate('action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $key=>$post)
                            
                            <tr>
                               
                                <td>{{$post->title}}</td>
                                <td>{{$post->sub_title}}</td>
                                <td>
                                    <a href="{{route('admin.posts.view',[$post['id']])}}" class="media align-items-center gap-2">
                                        <img src="{{\App\CPU\PostManager::post_image_path('thumbnail')}}/{{$post['thumbnail']}}"
                                             onerror="this.src='{{asset('/public/assets/back-end/img/brand-logo.png')}}'"class="avatar border" alt="">
                                        <span class="media-body title-color hover-c1">
                                            {{\Illuminate\Support\Str::limit($post['name'],20)}}
                                        </span>
                                    </a>
                                </td>
                                <td>{{$post->status}}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a class="btn btn-outline-info btn-sm square-btn" title="{{ translate('barcode') }}"
                                            href="{{ route('admin.posts.view', [$post['id']]) }}">
                                            <i class="tio-barcode"></i>
                                        </a>
                                        <a class="btn btn-outline-info btn-sm square-btn" title="View" href="{{route('admin.posts.view',[$post['id']])}}">
                                            <i class="tio-invisible"></i>
                                        </a>
                                        <a class="btn btn-outline--primary btn-sm square-btn"
                                            title="{{translate('edit')}}"
                                            href="{{route('admin.posts.edit',[$post['id']])}}">
                                            <i class="tio-edit"></i>
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm square-btn" href="javascript:"
                                            title="{{translate('delete')}}"
                                            onclick="form_alert('posts-{{$post['id']}}','{{translate('want_to_delete_this_item?')}}')">
                                            <i class="tio-delete"></i>
                                        </a>
                                    </div>
                                    <form action="{{route('admin.posts.view',[$post['id']])}}"
                                            method="post" id="posts-{{$post['id']}}">
                                        @csrf @method('delete')
                                    </form>
                                </td>
                            </tr>

                            
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive mt-4">
                    <div class="px-4 d-flex justify-content-lg-end">
                        <!-- Pagination -->
                        {{$posts->links()}}
                    </div>
                </div>

                @if(count($posts)==0)
                    <div class="text-center p-4">
                        <img class="mb-3 w-160" src="{{asset('public/assets/back-end')}}/svg/illustrations/sorry.svg" alt="Image Description">
                        <p class="mb-0">{{translate('no_data_to_show')}}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection


@push('script')
    <!-- Page level plugins -->
    <script src="{{asset('public/assets/back-end')}}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('public/assets/back-end')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script>
        function getRequest(route, id, type) {
            $.get({
                url: route,
                dataType: 'json',
                success: function(data) {
                    if (type == 'select') {
                        $('#' + id).empty().append(data.select_tag);
                    }
                },
            });
        }

        // Call the dataTables jQuery plugin
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });

        $('.product_status_form').on('submit', function(event){
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('admin.product.status-update')}}",
                method: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    if(data.success == true) {
                        toastr.success('{{translate("status_updated_successfully")}}');
                    }
                    else if(data.success == false) {
                        toastr.error('{{translate("Status_updated_failed.")}} {{translate("Product_must_be_approved")}}');
                        setTimeout(function(){
                            location.reload();
                        }, 2000);
                    }
                }
            });
        });

        $('.product_featured_form').on('submit', function(event){
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('admin.product.featured-status')}}",
                method: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    toastr.success('{{translate("featured_status_updated_successfully")}}');
                }
            });
        });
    </script>
@endpush
