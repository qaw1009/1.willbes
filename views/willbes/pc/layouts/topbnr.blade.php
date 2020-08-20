@if($__cfg['SiteCode'] == '2001')
    {{-- 경찰온라인 사이트일 경우만 적용
    <div id="topBannerLayer">
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
@endif
@if($__cfg['SiteCode'] == '2002')
    {{-- 경찰학원--}}
    <div id="topBannerLayer">
        <div class="topBanner">
            <a href="{{site_url('/promotion/index/cate/3001/code/1022')}}">
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1022_top_ban.jpg" alt="적중! 적중! 또 다시 적중!">
            </a>
        </div>
    </div>
@endif

@if($__cfg['CateCode'] == '3019')
    {{-- 공무원 9급 사이트일 경우만 적용 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/top_1120_200310.gif" alt="9급"></a>
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
@if($__cfg['CateCode'] == '3028')
    {{-- 공무원 기술직 사이트일 경우만 적용 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="{{ img_url('gosi/banner/1119-70-3028.gif') }}" alt="기술직"></a>
        </div>
    </div>
@endif
@if($__cfg['CateCode'] == '3030')
    {{-- 공무원 부사관 사이트일 경우만 적용 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="{{ img_url('gosi/banner/1119-70-3030.gif') }}" alt="부사관"></a>
        </div>
    </div>
@endif
@if($__cfg['CateCode'] == '3035')
    {{-- 공무원 법원직 사이트일 경우만 적용 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none">
                <img src="https://static.willbes.net/public//images/willbes/gosi/banner/M_TopBan200325.gif" alt="필기 합격자">
            </a>
        </div>
    </div>
@endif
@if($__cfg['CateCode'] == '3092')
    {{-- 공무원 무료인강 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3092_1120x70.gif" alt="무료인강 제로백"></a>
        </div>
    </div>
@endif
@if($__cfg['SiteCode'] == '2004')
    {{-- 공무원 무료인강 --}}
    <div id="topBannerLayer" class="gosi">
        <div class="topBanner">
            <a href="https://pass.willbes.net/pass/offPackage/index?cate_code=3043&campus_ccd=605001"><img src="https://static.willbes.net/public/images/promotion/main/1119-70-2004.gif" alt="10월 대개강"></a>
        </div>
    </div>
@endif
@if($__cfg['SiteCode'] == '2014')
    {{-- 엔잡 --}}
    <div id="topBannerLayer" class="njob">
        <div class="topBanner">
            {{--김상구본부장님 요청으로 배너와 같은 프로모션페이지에서 상단 배너 미노출 : TODO  해당 배너 변경시 예외조건 소스 제거--}}
            @if($_SERVER['REQUEST_URI'] != '/promotion/index/cate/3114/code/1768')
            <a href="{{site_url('/promotion/index/cate/3114/code/1768')}}"><img src="https://static.willbes.net/public/images/promotion/main/2014/3114_top_bn.jpg" alt=""></a>
            @endif
        </div>
    </div>
@endif