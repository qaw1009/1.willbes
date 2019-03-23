@if($__cfg['SiteCode'] == '2001')
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
            if (div.style.display === "block") {
                div.style.display = "none";
            } else {
                div.style.display = "block";
            }
        }
    </script>
@endif
@if($__cfg['CateCode'] == '3019')
    {{-- 공무원 9급 사이트일 경우만 적용 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="{{ img_url('gosi/banner/1119-70-3019.gif') }}" alt="9급"></a>
        </div>
    </div>
@endif
@if($__cfg['CateCode'] == '3020')
    {{-- 공무원 7급 사이트일 경우만 적용 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="{{ img_url('gosi/banner/1119-70-3020.gif') }}" alt="7급"></a>
        </div>
    </div>
@endif
@if($__cfg['CateCode'] == '3022')
    {{-- 공무원 세무직 사이트일 경우만 적용 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="{{ img_url('gosi/banner/1119-70-3022.gif') }}" alt="세무직"></a>
        </div>
    </div>
@endif
@if($__cfg['CateCode'] == '3023')
    {{-- 공무원 소방직 사이트일 경우만 적용 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="{{ img_url('gosi/banner/1119-70-3023.gif') }}" alt="소방직"></a>
        </div>
    </div>
@endif
@if($__cfg['CateCode'] == '3024')
    {{-- 공무원 군무원 사이트일 경우만 적용 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="{{ img_url('gosi/banner/1119-70-3024.gif') }}" alt="군무원"></a>
        </div>
    </div>
@endif
@if($__cfg['CateCode'] == '3030')
    {{-- 공무원 부사관 사이트일 경우만 적용 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="{{ img_url('gosi/banner/1119-70-3030.gif') }}" alt="군무원"></a>
        </div>
    </div>
@endif