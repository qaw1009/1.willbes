@if($__cfg["IsPassSite"] === false)
{{--온라인 사이트의 경우 검색 창 노출--}}
<div class="Section widthAuto">
    <div class="onSearch NGR">
        <form id="unifiedSearch_form" name="unifiedSearch_form" method="GET">
            <input type="hidden" name="cate" id="unifiedSearch_cate" value="{{$__cfg['CateCode']}}">
            <input type="text" name="" class="d_none">
            <input type="search" class='unifiedSearch' data-form="unifiedSearch_form" id="unifiedSearch_text" name="searchfull_text" value="" placeholder="온라인강의 검색" title="온라인강의 검색" maxlength="100"/>
            <label for="onsearch"><button title="검색" type="button" id="btn_unifiedSearch" class='btn_unifiedSearch' data-form="unifiedSearch_form">검색</button></label>
        </form>
    </div>
</div>
@endif
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
                            {{-- 일반메뉴 (전체보기) 메뉴 --}}
                            @yield('mega_menu_' . $menu_row['MenuSubType'])
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