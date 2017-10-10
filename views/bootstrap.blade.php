@if ($sidebars)

    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">

        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <ul class="page-sidebar-menu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">

                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <!-- END SIDEBAR TOGGLER BUTTON -->


                <li class="heading">
                    <h3 class="uppercase">功能列表</h3>
                </li>

                @foreach($sidebars as $sidebar)

                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-home"></i>
                            <span class="title">{{ $sidebar->title }}</span>
                        </a>
                        <ul class="sub-menu">


                            @foreach($sidebar->child as $child)

                                <li class="nav-item">
                                    <a href="{{ $child->url }}" class="nav-link ">
                                        <span class="title">{{ $child->title }}</span>
                                    </a>
                                </li>

                            @endforeach

                        </ul>
                    </li>

                @endforeach


            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->


    </div>
    <!-- END SIDEBAR -->


@endif
