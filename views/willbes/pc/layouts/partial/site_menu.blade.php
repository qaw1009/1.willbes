@if(empty($__cfg['SiteTreeMenu']) === false)
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">{{ $__cfg['SiteActiveMenu']['UrlRouteNames'][0] }}<span class="row-line">|</span></li>
                <li class="subTit">{{ $__cfg['SiteActiveMenu']['UrlRouteNames'][1] }}</li>
            </ul>
            <ul class="menu-List">
                {{-- 3depth 메뉴부터 표기 --}}
                @foreach(current(current($__cfg['SiteTreeMenu'])['Children'])['Children'] as $menu_idx => $menu_row)
                    @if($menu_row['MenuType'] == 'GN')
                        <li class="@if(isset($menu_row['Children']) === true) dropdown @endif">
                            <a href="{{ $menu_row['MenuUrl'] }}" target="_{{ $menu_row['UrlTarget'] }}">{{ $menu_row['MenuName'] }}</a>
                            @if(isset($menu_row['Children']) === true)
                                <div class="drop-Box list-drop-Box">
                                    <ul>
                                        <li class="Tit">{{ $menu_row['MenuName'] }}</li>
                                            @foreach($menu_row['Children'] as $child_menu_idx => $child_menu_row)
                                                <li><a href="{{ $child_menu_row['MenuUrl'] }}" target="_{{ $child_menu_row['UrlTarget'] }}">{{ $child_menu_row['MenuName'] }}</a></li>
                                            @endforeach
                                    </ul>
                                </div>
                            @endif
                        </li>
                    @elseif($menu_row['MenuType'] == 'GA')
                        <li class="Acad">
                            <a href="{{ $menu_row['MenuUrl'] }}" target="_{{ $menu_row['UrlTarget'] }}">{{ $menu_row['MenuName'] }} <span class="arrow-Btn">></span></a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </h3>
    </div>
@endif