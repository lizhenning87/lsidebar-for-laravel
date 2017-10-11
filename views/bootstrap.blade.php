@if ($sidebars)

    @foreach($sidebars as $sidebar)

        <li @if($sidebar->_activity) class="active" @endif>
            <a href="{{ $sidebar->url }}">
                <i class="@if(isset($sidebar->icon)) {{ $sidebar->icon }} @endif"></i>
                <span class="nav-label">{{ $sidebar->title }}</span>

                @if(count($sidebar->child) != 0)

                    <span class="fa arrow"></span>

                @endif


            </a>

            @if(count($sidebar->child) != 0)

                <ul class="nav nav-second-level @if(!$sidebar->_activity) collapse @endif">

                    @foreach($sidebar->child as $child)


                        <li @if($child->_activity) class="active" @endif><a href="{{ $child->url }}">{{ $child->title }}</a></li>

                    @endforeach



                </ul>

            @endif


        </li>

    @endforeach

@endif