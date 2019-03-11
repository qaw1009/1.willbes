@if(config_app('SiteCode') == '2001')
    {{-- 경찰온라인 사이트일 경우만 적용 --}}
    <div id="topBannerLayer">
        <div class="topBanner">
            <a id="show_topBanner" href="javascript:showOrHidefigure(0);"><img src="{{ img_url('cop/banner/onTopBnar_190123C_01.gif') }}" alt="배너명"></a>
        </div>

        <div id="topBannerWarp" style="display:none">
            <div class="myToggle">
                <div id="frame">
                    <div id="bannerList">
                        <a href="{{ site_url('/promotion/index/cate/3001/code/1022') }}" target="_blank"><img src="{{ img_url('cop/banner/onTopBnar_190123C_02.png') }}" alt="신광은 경찰팀 적중" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type='text/javascript'>
        function showOrHidefigure(id_dummy) {
            var div = document.getElementById('topBannerWarp');
            var button = document.getElementById('show_topBanner');
            if (div.style.display == "block") {
                div.style.display = "none";
            } else {
                div.style.display = "block";
            }
        }
    </script>
@endif
@if(config_app('SiteCode') == '2003')
    <div id="topBannerLayer">
        <div class="topBanner">
            <a href="#none"><img src="{{ img_url('gosi/banner/onTopBnar_190123C_01.gif') }}" alt="배너명"></a>
        </div>
    </div>
@endif