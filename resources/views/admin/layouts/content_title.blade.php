<!-- Page header -->
<div class="page-header page-header-default page-header-xs">
    @isset($page_title)
    <div class="page-header-content border-bottom-lg border-bottom-teal">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">{{ $page_title }}</span></h4>
        </div>
    </div>
    @endisset

    <div class="breadcrumb-line">
        {{ Breadcrumbs::render(Route::currentRouteName(), Route::current()->parameters()) }}
    </div>

    @if(session()->has('alert'))
    <div class="alert bg-{{ session()->get('alert.type') }} no-border-radius">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
        {!! session()->get('alert.message') !!}
    </div>
    @endif
</div>
<!-- /page header -->