@extends('layouts.back-end.app')

@section('title', translate('posts_Preview'))

@push('css_or_js')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('public/assets/back-end/css/tags-input.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/assets/select2/css/select2.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('public/richtexteditor/rte_theme_default.css') }}" />
<style>
    .rte-modern.rte-desktop.rte-toolbar-default{
    min-width: inherit !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #dedede;
        border: 1px solid #dedede;
        border-radius: 2px;
        color: #222;
        display: flex;
        gap: 4px;
        align-items: center;
    }
    .pair-list .key {
        min-width: 100px;
        --flex-basis: 100px;
        flex-basis: var(--flex-basis);
        text-wrap: nowrap;
    }
</style>
@endpush

@section('title', translate('edit_posts')) 
@section('content')
<section class="section-content pt-5">
    <div class="container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="{{
                        asset('public/assets/back-end/img/add-new-delivery-man.png')
                    }}" alt="" />
                {{ translate("edit_post") }}
            </h2>
        </div>

        

    </div>

</section>
@endsection

@push('script_2')

    <script type="text/javascript" src="{{ asset('public') }}/richtexteditor/rte.js"></script>
    <script>RTE_DefaultConfig.url_base='{{ asset('public') }}/richtexteditor'</script>
    <script type="text/javascript" src='{{ asset('public') }}/richtexteditor/plugins/all_plugins.js'></script>
    <script src="{{asset('public/assets/back-end')}}/js/tags-input.min.js"></script>
    <script src="{{ asset('public/assets/select2/js/select2.min.js')}}"></script>
    <script>
        $('input[name="colors_active"]').on('change', function () {
            if (!$('input[name="colors_active"]').is(':checked')) {
                $('#colors-selector').prop('disabled', true);
            } else {
                $('#colors-selector').prop('disabled', false);
            }
        });
        $(document).ready(function () {
            $('.color-var-select').select2({
                templateResult: colorCodeSelect,
                templateSelection: colorCodeSelect,
                escapeMarkup: function (m) {
                    return m;
                }
            });

            function colorCodeSelect(state) {
                var colorCode = $(state.element).val();
                if (!colorCode) return state.text;
                return "<span class='color-preview' style='background-color:" + colorCode + ";'></span>" + state.text;
            }
        });
    </script>
@endpush
