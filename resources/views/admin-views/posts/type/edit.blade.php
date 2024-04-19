@extends('layouts.back-end.app')
@section('title', translate('edit_post_type'))
@push('css_or_js')

@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="{{asset('/public/assets/back-end/img/add-new-seller.png')}}" alt="">
                {{translate('post_type_Update')}}
            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Content Row -->
        <div class="card">
            <div class="card-body">
                <form id="submit-create-post-type" action="{{route('admin.posts.post_type_update',[$post_type['id']])}}" method="post"
                      style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="name" class="title-color">{{translate('post_type_name')}}</label>
                                <input type="text" name="name" value="{{$post_type['name']}}" class="form-control" id="name"
                                       placeholder="{{translate('ex')}} : {{translate('store')}}">
                            </div>
                        </div>
                    </div>

               
                    <div class="d-flex justify-content-end gap-3">
                        <button type="reset" class="btn btn-secondary">{{translate('reset')}}</button>
                        <button type="submit" class="btn btn--primary">{{translate('update')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>

$('#submit-create-post-type').on('submit', function (e) {
    // Prevent the default form submission
    e.preventDefault();

    // Show the confirmation dialog
    Swal.fire({
        title: '{{ translate("are_you_sure") }}?',
        text: '{{ translate("want_to_edit_this_post_type") }}!',
        type: 'warning',
        showCancelButton: true,
        cancelButtonColor: 'default',
        confirmButtonColor: '#377dff',
        cancelButtonText: '{{ translate("no") }}',
        confirmButtonText: '{{ translate("yes") }}',
        reverseButtons: true
    }).then((result) => {
        // console.log(result);
        if (result.value===true) {
            // If the user confirms, then submit the form
             this.submit();  // Submit the form directly// Remove the event listener to prevent multiple submissions
            
        }
    });
});

    </script>

  
@endpush
