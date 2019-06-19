@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {
            position:fixed; 
            top:200px; 
            right:0;
            z-index:1;            
        }

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/06/1290_top_bg.jpg) no-repeat center;}

        .wb_01 {background:#00a8f6}	
        .wb_02 {background:#aeaeae;}
        .wb_03 {background:#ececec;}
        .wb_04 {background:#7d7d7d;}       
        .wb_04 div {width:1120px; margin:0 auto; position:relative}
        .wb_04 div ul {position:absolute; width:88px; top:380px; left:567px; z-index:10}
        .wb_04 div li {margin-bottom:20px}
        .wb_04 div li:nth-child(3) {margin-bottom:20px}
        .wb_04 div li:nth-child(4) {margin-bottom:20px}
        .wb_04 div li:nth-child(5) {margin-bottom:22px}
        .wb_04 div li:nth-child(6) {margin-bottom:22px}
        .wb_04 div li a {display:block; height:21px; line-height:21px; font-size:13px; font-weight:600; letter-spacing:-1px; background:#231f20; color:#fff; border:1px solid #231f20; font-family:'Noto Sans KR', Arial, Sans-serif}
        .wb_04 div li a:hover {background:#ffda38; color:#231f20}
        .wb_04 div span {position:absolute; display:block; height:31px; line-height:31px; padding:0 10px; background:#231f20; color:#fff; font-size:14px; font-weight:600; border-radius:22px; border:1px solid #231f20; z-index:11; letter-spacing:-1px}
        .wb_04 div span em {font-size:11px}
        .wb_04 div span.on {background:#ffda38; color:#231f20}
        .wb_04 div span.area01 {top:438px; left:809px} /*본원*/
        .wb_04 div span.area02 {top:490px; left:725px} /*신림*/
        .wb_04 div span.area03 {top:522px; left:764px} /*인천*/
        .wb_04 div span.area04 {top:737px; left:764px} /*광주*/
        .wb_04 div span.area05 {top:667px; left:795px} /*전주,익산*/
        .wb_04 div span.area06 {top:678px; left:915px} /*대구*/
        .wb_04 div span.area07 {top:737px; left:964px} /*부산*/
        .wb_04 div span.area08 {top:750px; left:856px} /*진주*/
        .wb_04 div span.area09 {top:859px; left:774px} /*제주*/

        .wb_05 {background:#fff;}       
        .wb_06 {background:#00a8f6}

        .content_guide_wrap{background:#fff; margin:0}
        .content_guide_box{ position:relative; width:900px; margin:0 auto; padding:50px 0 100px}
        .content_guide_box .guide_tit{margin-bottom:20px}
        .content_guide_box dl{ margin:0 20px; word-break:keep-all;border:2px solid #202020;padding:30px}
        .content_guide_box dt{ margin-bottom:10px}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-size:13px; font-weight:bold; margin-right:10px}
        .content_guide_box dt img.btn{padding:2px 0 0 0}
        .content_guide_box dd{ color:#777; font-size:13px; margin:0 0 20px 5px; line-height:17px}
        .content_guide_box dd strong{ color:#555}
        .content_guide_box dd p{ margin-bottom:3px}
        .content_guide_box dd p.guide_txt_01{margin:5px 0 5px 15px}

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:right; padding-right:10px; padding-top:10px; width:28%}
        .newTopDday ul li:first-child div {font-size:14px; color:#999;margin:5px 0; font-weight:normal;}
        .newTopDday ul li:first-child span {color:#fd6c38}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%}
        .newTopDday ul li:last-child a {display:inline-block; font-size:14px; padding:4px 20px; background:#999; color:#FFF; text-align:center; border-radius:20px;}
        .newTopDday ul li:last-child a:hover {background:#666}
        .newTopDday ul:after {content:""; display:block; clear:both}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#evt"><img src="https://static.willbes.net/public/images/promotion/2019/06/1290_skybanner.png" alt="스카이스크래퍼" ></a>
        </div>        

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div id="ddaytime">
                <ul>
                    <li>
                        <div>접수 마감까지</div>남은 시간
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        <div><a href="#go" target="_self">신청하기 &gt;</a><div>
                        <div class="mt5">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} 마감!</div>
                    </li>
                </ul>
            </div>
        </div>

        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <div class="evtCtnsBox wb_top" id="main">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/1290_top.jpg"  alt="메인" usemap="#link"/>
		</div>

        <div class="evtCtnsBox wb_01" >
			<img src="https://static.willbes.net/public/images/promotion/2019/06/1290_01.jpg"  alt="상금" usemap="#link2"/>
			<map name="link2" >
				<area shape="rect" coords="439,1413,679,1471" href="#ask" alt="응모안내" />
			</map>
		</div>

		<div class="evtCtnsBox wb_02" >
			<img src="https://static.willbes.net/public/images/promotion/2019/06/1290_02.jpg"  alt="3가지" />
		</div>
       
		<div class="evtCtnsBox wb_03" id="table">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/1290_03.jpg"  alt="시간표 및 장소" />
		</div>        

		<div class="evtCtnsBox wb_04" >
			<div>
                <img src="https://static.willbes.net/public/images/promotion/2019/03/1175_p5_re.png"  alt="전국학원"/>
                <ul>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="노량진" onmouseover="$('span.area01').addClass('on');" onmouseleave="$('span.area01').removeClass('on');">신청하기</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="신림" onmouseover="$('span.area02').addClass('on');" onmouseleave="$('span.area02').removeClass('on');">신청하기</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="인천" onmouseover="$('span.area03').addClass('on');" onmouseleave="$('span.area03').removeClass('on');">신청하기</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="광주" onmouseover="$('span.area04').addClass('on');" onmouseleave="$('span.area04').removeClass('on');">신청하기</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="전주" onmouseover="$('span.area05').addClass('on');" onmouseleave="$('span.area05').removeClass('on');">신청하기</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="익산" onmouseover="$('span.area05').addClass('on');" onmouseleave="$('span.area05').removeClass('on');">신청하기</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="대구" onmouseover="$('span.area06').addClass('on');" onmouseleave="$('span.area06').removeClass('on');">신청하기</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="부산" onmouseover="$('span.area07').addClass('on');" onmouseleave="$('span.area07').removeClass('on');">신청하기</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="진주" onmouseover="$('span.area08').addClass('on');" onmouseleave="$('span.area08').removeClass('on');">신청하기</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="제주" onmouseover="$('span.area09').addClass('on');" onmouseleave="$('span.area09').removeClass('on');">신청하기</a></li>
                </ul>
                <span class="area01">노량진</span>
                <span class="area02">신림</span>
                <span class="area03">인천</span>
                <span class="area04">광주</span>
                <span class="area05">전북<em>(전주,익산)</em></span>
                <span class="area06">대구</span>
                <span class="area07">부산</span>
                <span class="area08">진주</span>
                <span class="area09">제주</span>   
			</div>
		</div>

        <div class="evtCtnsBox wb_05" id="evt">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1290_04.jpg"  alt="접수하기" usemap="#Map1290A" border="0" />
            <map name="Map1290A" id="Map1290A">
                <area shape="rect" coords="374,1110,849,1183" href="#none" alt="모의고사 할인받기" />
                <area shape="rect" coords="491,2215,729,2293" href="javascript:;" onclick="giveCheck()"  alt="응시쿠폰 받기" />
            </map>
            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial')
            @endif
		</div>      


        <div class="evtCtnsBox wb_06">
        <img src="https://static.willbes.net/public/images/promotion/2019/06/1290_05.jpg"  alt="접수하기" usemap="#Map1290B"/>
            <map name="Map1290B" id="Map1290B">
                <area shape="rect" coords="309,464,812,566" href="https://police.willbes.net/pass/mockTest/apply/cate" target="_blank" alt="모의고사 신청하기"/>
            </map>
        </div>
        
        <div class="content_guide_wrap">
			<div class="content_guide_box" id="ask">
				<p class="guide_tit"><img src="http://file3.willbes.net/new_cop/2018/01/EV180104_p7.png"  alt="유의사항" /> </p>
				<dl>				
                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <p>학원 실강패스 수강생은 응시 지역별 학원 상담실 문의해 주시기 바랍니다. 모든 고사장 주차 불가합니다. 시험 응시생이 많아 혼잡이 예상되오니 대중교통을 이용해 주시기 바랍니다. 반드시 본인이 응시할 캠퍼스로 신청 바랍니다.</p>
                    </dd>
                    <dt>
                        <h3>고사장 입실</h3>
                    </dt>
                    <dd>
                        <p>1. 시험당일 09:40까지 해당 고사장으로 반드시 입실해야합니다.</p>
                        <p>2. 시험 종료 후 시험감독관의 지시가 있을때까지 퇴실할 수 없으며, 모든 답안지는 반드시 제출하여 주십시오.</p>
                        <p>3. 본인이 신청한 캠퍼스에서만 응시할 수 있습니다.</p>
                    </dd>
                    <dt>
                        <h3>신분증 지참</h3>
                    </dt>
                    <dd>
                        <p>본인 확인을 위해 응시표(응시 전 발송 된 문자 메시지 확인 가능)와 공공기관이 발행한 신분(주민등록증, 여권, 운전면허증, 주민등록번호가 포함된 장애인등록증(복지카드 중 하나)을 반드시 소지하여야 합니다.</p>
                    </dd>
                    <dd>
                        <p>※ 모의고사문의 : 각 캠퍼스에 문의</p>
                    </dd>
				</dl>
			</div>
		</div>
        </form>
	</div>
    <!-- End Container -->

    <script type="text/javascript">
        $regi_form = $('#regi_form');

        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}';
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('온라인 모의고사 무료 응시쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';
                }
            }, showValidateError, null, false, 'alert');
            @endif
        }

        {{--디데이카운트다운--}}
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop