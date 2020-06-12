<div id="Sticky" class="sticky-Title">
    <div class="sticky-Grid sticky-topTit">
        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            @if(empty($__cfg['SiteMenu']['ActiveMenu']) === false)
                @if(array_has($__cfg['SiteMenu'], 'TreeMenu.GNB') === true)
                    {{ str_first_pos_after($__cfg['SiteMenu']['ActiveMenu']['UrlRouteName'], ' > ', '') }}
                @else
                    {{ $__cfg['SiteMenu']['ActiveMenu']['UrlRouteName'] }}
                @endif
            @else
                @yield('page_title')
            @endif

            {{-- 별도 추가된 타이틀 표시 (교수진 상세) --}}
            @hasSection('add_title')
                @yield('add_title')
            @endif
        </div>
    </div>
</div>
