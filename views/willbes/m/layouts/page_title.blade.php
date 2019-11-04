<div id="Sticky" class="sticky-Title">
    <div class="sticky-Grid sticky-topTit">
        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            @if(empty($__cfg['SiteMenu']['ActiveMenu']) === false)
                {{ $__cfg['SiteMenu']['ActiveMenu']['UrlRouteName'] }}
            @else
                @yield('page_title')
            @endif
        </div>
    </div>
</div>