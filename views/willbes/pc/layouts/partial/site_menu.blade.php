{{-- 사이트 검색창 --}}
@include('willbes.pc.layouts.partial.site_search')

@if(empty($__cfg['SiteMenu']['TreeMenu']) === false)
    {{-- 일반메뉴 (전체보기) 메뉴 설정 --}}
    @include('willbes.pc.layouts.partial.site_mega_menu')
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">{{ $__cfg['SiteMenu']['ActiveMenu']['UrlRouteNames'][0] }}<span class="row-line">|</span></li>
                {{--<li class="subTit">{{ $__cfg['SiteMenu']['ActiveMenu']['UrlRouteNames'][1] }}</li>--}}
                <li class="subTit"><a href="{{ ($__cfg['IsPassSite'] === true) ? front_url('/home/index') : front_url('/home/index/cate/'.$__cfg['CateCode']) }}">{{ $__cfg['SiteMenu']['ActiveMenu']['UrlRouteNames'][1] }}</a></li>
            </ul>
            <ul class="menu-List">
                @foreach($__cfg['SiteMenu']['TreeMenu'] as $menu_idx => $menu_row)
                    <li class="@if($menu_row['MenuType'] == 'GA') {{ SUB_DOMAIN }} @endif @if(isset($menu_row['Children']) === true || $menu_row['MenuType'] == 'GM') dropdown @endif">
                        <a href="{{ $menu_row['MenuUrl'] }}" target="_{{ $menu_row['UrlTarget'] }}">
                            {{ $menu_row['MenuName'] }}
                            @if($menu_row['MenuType'] == 'GA')
                                <span class="arrow-Btn">></span>
                            @endif
                        </a>
                        @if($menu_row['MenuType'] == 'GM' && empty($menu_row['MenuSubType']) === false)
                            @if($menu_row['MenuSubType'] == 'sort_mapping')
                                {{-- 일반메뉴 (전체보기) > 전체메뉴(소트매핑) 메뉴 --}}
                                @if(empty($menu_row['Children']) === false)
                                    @include('willbes.pc.layouts.partial.site_sort_mapping_menu', ['_sort_mapping_menu' => $menu_row['Children']])
                                @endif
                            @else
                                {{-- 일반메뉴 (전체보기) > 교수진소개, 수강신청 메뉴 --}}
                                @yield('mega_menu_' . $menu_row['MenuSubType'])
                            @endif
                        @else
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
                        @endif
                    </li>
                @endforeach
            </ul>
        </h3>
    </div>
@endif