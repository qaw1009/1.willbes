@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {position:fixed; top:225px;right:10px;z-index:10;}
        .skybanner a{display:block; margin-bottom:10px;}

        .evt00 {background:#0a0a0a}
        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/08/1786_top_bg.jpg) no-repeat center}
        
        .evt01 {background:#fff}
        .evt02 {background:#f4f4f4}
        .evt03 {background:#fff}
        .evt03 .tabs {width:776px; margin:0 auto}
        .evt03 .tabs li {display:inline; float:left; width:33.33333%}
        .evt03 .tabs li a {display:block; border:6px solid #bfbfbf; color:#fff; background:#bfbfbf; border-radius:20px; text-align:center; 
        padding:15px 0; font-size:30px; margin-right:10px}
        .evt03 .tabs li a:hover,
        .evt03 .tabs li a.active {border:6px solid #e64960; color:#e64960; background:#fff}
        .evt03 .tabs li:last-child a {margin:0}
        .evt03 .tabs:after {content:''; display:block; clear:both}

        .evt04 {background:#555; padding-bottom:150px}
        .evt04 .evt04box {width:1120px; padding:20px; margin:0 auto; background:#fff}
        .evt05 {background:#fff}

        .evtInfo {padding:100px 0; background:#f4f4f4; color:#282828; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.5}
		.evtInfoBox h4 {font-size:40px; margin-bottom:30px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li { list-style:disc; margin-left:20px}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#none"> 
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1786_sky01.png" alt="9월 지텔프" >
            </a> 
            <a href="#none"> 
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1786_sky02.png" alt="지텔프 소문내기" >
            </a>               
        </div>   

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>   

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1786_top.jpg" title="추천강좌" />
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1786_01.jpg" usemap="#Map1744a" title="파이널패스" border="0" />
            <map name="Map1744a" id="Map1744a">
                <area shape="rect" coords="98,1173,1022,1278" href="https://police.willbes.net/promotion/index/cate/3001/code/1741" target="_blank" />
                <area shape="rect" coords="727,1073,927,1118" href="https://police.willbes.net/promotion/index/cate/3001/code/1741" target="_blank" />
            </map>
        </div>         
        
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1786_02.jpg"/>
        </div>

        <div class="evtCtnsBox evt03" id="evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1786_03_01.jpg" />
            <ul class="tabs NSK-Black">
                <li><a href="#tab01">김준기 교수님</a></li>
                <li><a href="#tab02">하승민 교수님</a></li>
                <li><a href="#tab03">김현정 교수님</a></li>
            </ul>
            <div class="tabcts" id="tab01">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1786_03_02.jpg" />
            </div>
            <div class="tabcts" id="tab02">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1786_03_03.jpg" />
            </div>
            <div class="tabcts" id="tab03">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1786_03_04.jpg" />
            </div>
        </div> 

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1786_04.jpg" />
            <div class="evt04box">
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @else
                   강의리스트
                @endif 
            </div>
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1786_05.jpg" usemap="#Map1786_01" border="0" />
            <map name="Map1786_01">
              <area shape="rect" coords="446,1849,678,1920" href="#none" alt="할인쿠폰받기">
              <area shape="rect" coords="358,2250,734,2297" href="@if($file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" alt="하이 지텔프 소문내기 이미지 다운받기">
            </map>
        </div> 

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif 

        <div class="evtCtnsBox evtInfo NGR" id="info">
			<div class="evtInfoBox">
				<h4 class="NGEB">NEW 윌비스 신광은경찰팀 G-TELP 런칭 이용안내</h4>
				<div class="infoTit NG"><strong>영어 전문 교수진</strong></div>
				<ul>
					<li>하승민 교수님 , 김현정 교수님 , 김준기 교수님</li>                    
				</ul>
				<div class="infoTit NG"><strong>하이~G-TELP 런칭기념 이벤트</strong></div>
				<ul>
                    <li>소문내기시 김준기교수님 9월강의  100%무료쿠폰(온라인 강의) 증정 > 쿠폰은 소문내기 진행시 장바구니 자동지급(유효기간 3일)
                    <li>김준기 교수님 9월강의 수강후기 작성시 15일 연장 (온라인 강의) > 결제후 수강후기 남겨주시면 익일 진행
                    <li>생애 첫 지텔프 50% 수험료 할인 >월요일~일요일 구매자 취합하여 그 다음주 월요일에  개별문자로 쿠폰번호 발송
                    <li>한능검 온라인 강의 할인쿠폰(추후 공지예정)
                    <li>2022년 과목개편 과목(형사법,헌법,경찰학) 온라인 강의할인쿠폰(추후공지예정)</li>
				</ul>
				<ul>
					<li><strong>온라인 고객센터 문의 1544-5006</strong></li>
				</ul>
			</div>
		</div>     

    </div>
    <!-- End Container -->

    <script>
        $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()})})}
        );
    </script>


@stop