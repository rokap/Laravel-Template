<div class="sidebar">
    <div class="sidebar-inner">
        <!-- ### $Sidebar Header ### -->
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a class="sidebar-link td-n" href="{{route('dashboard')}}">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo">
                                    <img src="{{asset('images/logo.png')}}" alt="">
                                </div>
                            </div>
                            <div class="peer peer-greed">
                                <h5 class="lh-1 mB-0 logo-text">Rokap Inc</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle">
                        <a href="" class="td-n">
                            <i class="ti-arrow-circle-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ### $Sidebar Menu ### -->
        <ul class="sidebar-menu scrollable pos-r">
            @foreach($mainMenu as $key => $menuItem)
                @if(count($menuItem['sub_menu']))
                    <li class="nav-item dropdown{{($menuItem['active'])?' open':null}}">
                        <a class="dropdown-toggle" href="{{$menuItem['href']}}">
                            <span class="icon-holder"><i class="{{$menuItem['icon']}}"></i></span>
                            <span class="title"><b>{{$menuItem['label']}}</b></span>
                            <span class="arrow"><i class="ti-angle-right"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach($menuItem['sub_menu'] as $subMenuItem )
                                <li><a class='sidebar-link{{($subMenuItem['active'])?' actived':null}}' href="{{$subMenuItem['href']}}">{{$subMenuItem['label']}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown{{($key=="Dashboard")?' mT-30':null}}{{($menuItem['active'])?' open':null}}">
                        <a class="sidebar-link" href="{{$menuItem['href']}}">
                        <span class="icon-holder">
                          <i class="{{$menuItem['icon']}}"></i>
                        </span>
                            <span class="title"><b>{{$menuItem['label']}}</b></span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>