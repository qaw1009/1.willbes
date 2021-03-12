@if($__cfg['SiteCode'] == '2001')
    {{-- 경찰온라인 사이트일 경우만 적용--}}
    {{--<div id="topBannerLayer">
        <div class="topBanner">
            <!--a id="show_topBanner" href="javascript:showOrHidefigure(0);"-->
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_00.jpg" alt="적중! 적중! 또 다시 적중!">
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
     --}}
     {{--
     <div id="topBannerLayer">
        <div class="topBanner">
            <a href="{{site_url('/promotion/index/cate/3001/code/1853')}}">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1022_top_ban.jpg" alt="적중! 적중! 또 다시 적중!">
            </a>
        </div>
    </div>
    --}}
@endif
@if($__cfg['SiteCode'] == '2002')
    {{-- 경찰학원
    <div id="topBannerLayer">
        <div class="topBanner">
            <a href="{{site_url('/promotion/index/cate/3001/code/1853')}}">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1022_top_ban.jpg" alt="적중! 적중! 또 다시 적중!">
            </a>
        </div>
    </div>
    --}}
@endif

@if($__cfg['CateCode'] == '3019')
    {{-- 공무원 9급 사이트일 경우만 적용 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2020_top_bn.gif" alt="9급"></a>
        </div>
    </div>
@endif
@if($__cfg['CateCode'] == '3020')
    {{-- 공무원 7급 사이트일 경우만 적용 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3020_top_bn.gif" alt="7급"></a>
        </div>
    </div>
@endif
@if($__cfg['CateCode'] == '3022')
    {{-- 공무원 세무직 사이트일 경우만 적용 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3022_top_bn.gif" alt="세무직"></a>
        </div>
    </div>
@endif
@if($__cfg['CateCode'] == '3023')
    {{-- 공무원 소방직 사이트일 경우만 적용 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3023_top_bn.gif" alt="소방직"></a>
        </div>
    </div>
@endif
@if($__cfg['CateCode'] == '3024')
    {{-- 공무원 군무원 사이트일 경우만 적용 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3024_top_bn.gif" alt="군무원"></a>
        </div>
    </div>
@endif
@if($__cfg['CateCode'] == '3028')
    {{-- 공무원 기술직 사이트일 경우만 적용 
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3028_top_bn.gif" alt="기술직"></a>
        </div>
    </div>--}}
@endif
@if($__cfg['CateCode'] == '3030')
    {{-- 공무원 부사관 사이트일 경우만 적용 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3024_top_bn.gif" alt="부사관"></a>
        </div>
    </div>
@endif
@if($__cfg['CateCode'] == '3035')
    {{-- 공무원 법원직 사이트일 경우만 적용 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3035_top_bn.gif" alt="법원직"></a>
        </div>
    </div>
@endif
@if($__cfg['CateCode'] == '3092')
    {{-- 공무원 무료인강 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3092_top_bn.gif" alt="무료인강 제로백"></a>
        </div>
    </div>
@endif
@if($__cfg['SiteCode'] == '2004')
    {{-- 공무원 학원 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1902"><img src="https://static.willbes.net/public/images/promotion/main/2004_top_bn.gif" alt=""></a>
        </div>
    </div>
@endif
@if($__cfg['SiteCode'] == '2014')
    {{-- 엔잡
    <div id="topBannerLayer" class="njob">
        <div class="topBanner">
            <!--김상구본부장님 요청으로 배너와 같은 프로모션페이지에서 상단 배너 미노출 : TODO  해당 배너 변경시 예외조건 소스 제거-->
            @if($_SERVER['REQUEST_URI'] != '/promotion/index/cate/3114/code/1768')
            <a href="{{site_url('/promotion/index/cate/3114/code/1768')}}"><img src="https://static.willbes.net/public/images/promotion/main/2014/3114_top_bn.jpg" alt=""></a>
            @endif
        </div>
    </div> --}}
@endif
@if($__cfg['SiteCode'] == '2017')
    {{-- 임용 --}}
    <div id="topBannerLayer" class="ssam">
        <div class="topBanner">
            <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_top_bn.jpg" alt="실전모의고사" usemap="#Map2017" border="0">
            <map name="Map2017">
              <area shape="rect" coords="829,11,1020,62" href="{{ front_url('/promotion/index/cate/3137/code/1973') }}" target="_blank" alt="2022대비실전모의고사다시보기">
            </map>
        </div>
    </div>
@endif