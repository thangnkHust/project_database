{{-- Phan cau truc chinh khi route goi view --}}
@extends('admin.main')

{{-- Phan them le cua page slider --}}
@section('content')
{{-- @php
    use App\Helpers\template as template;
    // $xhtmlButtonFilter = template::showButtonFilter($controllerName, $itemsStatusCount, $params['filter']['status'], $params['search']);
    $xhtmlAreaSearch = template::showAreaSearch($controllerName, $params['search']);
@endphp --}}
<div class="page-header zvn-page-header clearfix">
    <div class="zvn-page-header-title">
        <h3>Question Management</h3>
    </div>
    <div class="zvn-add-new pull-right">
        <a href="{{route($controllerName.'/form')}}" class="btn btn-success"><i
                class="fa fa-plus-circle"></i> Add New</a>
    </div>
</div>

@include('admin/templates/notify')


<!--box-lists-->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('admin/templates.x-title', ['title' => 'List'])
            @include('admin/pages/question.list')
        </div>
    </div>
</div>
<!--end-box-lists-->
<!--box-pagination-->
@if(count($items) > 0)
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin/templates.x-title', ['title' => 'Pagination'])
                @include('admin/templates.pagination')
            </div>
        </div>
    </div>
@endif
<!--end-box-pagination-->
@endsection
