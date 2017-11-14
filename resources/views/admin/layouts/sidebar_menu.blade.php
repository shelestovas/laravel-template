
<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{ Sentinel::getUser()->name }}</span>
                        @if(Sentinel::getUser()->name != Sentinel::getUser()->email)
                        <div class="text-size-mini text-muted">
                            {{ Sentinel::getUser()->email }}
                        </div>
                        @endif
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="{{ route('admin.profile') }}"><i class="icon-cog3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                {!! $MainAdminMenu->asUl( ['class' => 'navigation navigation-main navigation-accordion'] ) !!}
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->