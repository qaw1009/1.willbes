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

        .kim_gtelp {background:#E12237 url(https://static.willbes.net/public/images/promotion/2020/10/kim_gtelp_bg.jpg) no-repeat center}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/10/1786_top_bg.jpg) no-repeat center}
        
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

        .evt03s {position:relative;}
        .youtube {position:absolute; top:180px; left:50%;z-index:1;margin-left:-145px}
        .youtube iframe {width:585px; height:345px}

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

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#evt04"> 
                <img src="https://static.willbes.net/public/images/promotion/2020/10/1786_sky01.png" alt="10월 지텔프" >
            </a> 
            <a href="#evt05"> 
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1786_sky02.png" alt="지텔프 소문내기" >
            </a>               
        </div>   

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>   

        <div class="evtCtnsBox kim_gtelp">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/kim_gtelp.jpg" title="기초영어X G-TELP" />
        </div>

        <div class="evtCtnsBox kim_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/kim_01.jpg" title="누구에게 필요한 강의?" />
        </div>

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1786_top.jpg" title="추천강좌" />
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1786_01.jpg" />
        </div>         
        
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1786_02.jpg"/>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1786_03_01.jpg" />           
        </div> 

        <div class="evtCtnsBox evt03s">           
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1786_03_02.jpg" />
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/hFgv1FgRe3I?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div> 

        <div class="evtCtnsBox evt04" id="evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1786_04.jpg" />
            <div class="evt04box">
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @else
                   강의리스트
                @endif 
            </div>
        </div>

        <div class="evtCtnsBox evt05" id="evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1786_05.jpg" usemap="#Map1786_01" border="0" />
            <map name="Map1786_01" id="Map1786_01">
                <area shape="rect" coords="441,1845,682,1917" href="javascript:giveCheck();" alt="할인쿠폰받기">
                <area shape="rect" coords="357,2243,732,2294" href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="하이 지텔프 소문내기 이미지 다운받기">
            </map>
        </div> 

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif 

        <div class="evtCtnsBox evtInfo NGR" id="info">
			<div class="evtInfoBox">
				<h4 class="NGEB">NEW 윌비스 신광은경찰팀 기초영어 X G-TELP 이용안내</h4>
				<div class="infoTit NG"><strong>영어 전문 교수진</strong></div>
				<ul>
					<li>하승민 교수님 , 김현정 교수님 , 김준기 교수님</li>                    
				</ul>
				<div class="infoTit NG"><strong>하이~G-TELP 런칭기념 이벤트</strong></div>
				<ul>
                    <li>소문내기시 김준기 교수님 10월 강의 100%무료쿠폰(온라인 강의)증정> 쿠폰은 소문내기 진행시 장바구니 자동지급( 11/8까지 사용가능)
                    <li>김준기 교수님 11월 G-TELP강의 수강후기 작성시 15일연장(온라인 강의)>결제후 수강후기 남겨주시면 개강후 순차 진행
                    <li>생애 첫 지텔프 50% 수험료 할인 >월요일~일요일 구매자 취합하여 그 다음주 월요일에  개별문자로 쿠폰번호 발송
                    <li>한능검 온라인강의 할인쿠폰( G-TELP 문법강의 결제시 자동으로 지급 – 내강의실 확인 (11/8 까지 사용가능) 
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
        var $regi_form = $('#regi_form');
        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}';
                ajaxSubmit($regi_form, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                        {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
                    }
                }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

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