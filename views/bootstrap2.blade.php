@if ($sidebars)

    @foreach($sidebars as $sidebar)

        <li class="nav-item @if($sidebar->_activity) active open @endif">

            <a @if($sidebar->url) href="{{ $sidebar->url }}" @else href="javascript:;" @endif  class="nav-link nav-toggle">
                <i class="@if(isset($sidebar->icon)) {{ $sidebar->icon }} @endif"></i>

                <span class="title">{{ $sidebar->title }}</span>

                @if($sidebar->_activity)  <span class="selected"></span> @endif

                @if(count($sidebar->child) != 0)

                    <span class="arrow @if($sidebar->_activity) open @endif"></span>

                @endif


            </a>

            @if(count($sidebar->child) != 0)

                <ul class="sub-menu">

                    @foreach($sidebar->child as $child)


                        <li class="nav-item @if($child->_activity) active open @endif">

                            <a href="{{ $child->url }}" class="nav-link ">

                                <span class="title">

                                    {{ $child->title }}

                                </span>

                                @if($child->_activity) <span class="selected"></span> @endif


                            </a>

                        </li>

                    @endforeach



                </ul>

            @endif


        </li>

    @endforeach

@endif