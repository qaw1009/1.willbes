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
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {
            position:fixed; 
            top:200px; 
            right:0;
            z-index:1;            
        }

        .wb_top {background:#111416 url(https://static.willbes.net/public/images/promotion/2020/03/1546_top_bg.jpg) no-repeat center;}

        .wb_01 {background:#40afdb;}	
        .wb_02 {background:#aeaeae;}
        .wb_03 {background:#ececec;}

        .wb_04 {background:#7d7d7d;}  
        .wb_04 div {width:1120px; margin:0 auto; position:relative}
        .wb_04 div ul {position:absolute; width:88px; top:380px; left:527px; z-index:10}
        .wb_04 div li {margin-bottom:20px}
        .wb_04 div li:nth-child(3) {margin-bottom:20px}
        .wb_04 div li:nth-child(4) {margin-bottom:20px}
        .wb_04 div li:nth-child(5) {margin-bottom:22px}
        .wb_04 div li:nth-child(6) {margin-bottom:22px}
        .wb_04 div li a {display:block; height:21px; line-height:21px; font-size:13px; letter-spacing:-1px; background:#231f20; color:#fff; border:1px solid #231f20; font-family:'Noto Sans KR', Arial, Sans-serif}
        .wb_04 div li a:hover {background:#ffda38; color:#231f20}
        .wb_04 div span {position:absolute; display:block; height:31px; line-height:31px; padding:0 10px; background:#231f20; color:#fff; font-size:14px; border-radius:22px; border:1px solid #231f20; z-index:11; letter-spacing:-1px}
        .wb_04 div span em {font-size:11px}
        .wb_04 div span.on {background:#ffda38; color:#231f20}
        .wb_04 div span.area01 {top:438px; left:809px} /*본원*/
        .wb_04 div span.area02 {top:522px; left:764px} /*광주*/
        .wb_04 div span.area03 {top:490px; left:725px} /*인천*/        
        .wb_04 div span.area04 {top:727px; left:764px} /*광주*/
        .wb_04 div span.area05 {top:667px; left:795px} /*전주*/ 
        .wb_04 div span.area06 {top:675px; left:905px} /*대구*/
        .wb_04 div span.area07 {top:737px; left:944px} /*부산*/
        .wb_04 div span.area08 {top:750px; left:856px} /*진주*/
        .wb_04 div span.area09 {top:859px; left:754px} /*제주*/

                
        .wb_05 {background:#fff;}       
        .wb_06 {background:#009bd8;}

        .wb_ctsInfo {background:#2b2b2b; padding:100px 0}  
        .wb_ctsInfo div {
            width:980px; margin:0 auto; color:#fff; font-size:14px; line-height:1.5;
            font-family: "NanumGothic-Regular", "Nanum Gothic", "나눔고딕", "sans-serif" !important;
        }
        .wb_ctsInfo div h3 {font-size:30px; margin-bottom:30px; color:#f97f7a} 
        .wb_ctsInfo div dt {font-size:18px; margin-bottom:10px; font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;
            text-decoration:underline}  
        .wb_ctsInfo div dd {margin-bottom:30px}
        .wb_ctsInfo div dl {
            position: relative;
            padding-left:10px;
        }
        .wb_ctsInfo div dl:before{
            background: #f97f7a none repeat scroll 0 0; 
            border-radius: 2px;
            content: '';
            display: block;
            height: 4px;
            left: 0;
            position: absolute;
            top: 8px;
            width: 4px;
        }
        .wb_ctsInfo p {margin-top:40px;font-size:18px;}
        .wb_ctsInfo p span  {border:2px solid #fff; padding:10px 20px}

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:right; padding-right:10px; padding-top:10px; width:28%}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#evt"><img src="https://static.willbes.net/public/images/promotion/2020/03/1546_sky.png" alt="스카이베너" ></a>
        </div>        

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                        전국모의고사<br>접수마감까지
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
                        남았습니다.
                    </li>
                </ul>
            </div>
        </div>       

        <div class="evtCtnsBox wb_top" id="main">
			<img src="https://static.willbes.net/public/images/promotion/2020/03/1546_top.jpg"  alt="메인" usemap="#link"/>
		</div>

        <div class="evtCtnsBox wb_01" >
			<img src="https://static.willbes.net/public/images/promotion/2020/01/1530_01.jpg"  alt="상금" usemap="#link2"/>			
		</div>

		<div class="evtCtnsBox wb_02" >
			<img src="https://static.willbes.net/public/images/promotion/2020/01/1530_02.jpg"  alt="3가지" />
		</div>

        <div class="evtCtnsBox wb_03" >
			<img src="https://static.willbes.net/public/images/promotion/2020/03/1546_03.jpg"  alt="3가지" />
		</div>
       
		<div class="evtCtnsBox wb_04" id="table">			
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2020/02/1546_04.jpg"  alt="시간표 및 장소" />
                <ul>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="노량진" onmouseover="$('span.area01').addClass('on');" onmouseleave="$('span.area01').removeClass('on');">신청하기</a></li>
                    <li><a href="#none" alt="광주(참수리)" onmouseover="$('span.area02').addClass('on');" onmouseleave="$('span.area02').removeClass('on');">학원문의</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="인천" onmouseover="$('span.area03').addClass('on');" onmouseleave="$('span.area03').removeClass('on');">신청하기</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="광주" onmouseover="$('span.area04').addClass('on');" onmouseleave="$('span.area04').removeClass('on');">신청하기</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="전주" onmouseover="$('span.area05').addClass('on');" onmouseleave="$('span.area05').removeClass('on');">신청하기</a></li>
                   
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="대구" onmouseover="$('span.area06').addClass('on');" onmouseleave="$('span.area06').removeClass('on');">신청하기</a></li>
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="부산" onmouseover="$('span.area07').addClass('on');" onmouseleave="$('span.area07').removeClass('on');">신청하기</a></li>
                   
                    <li><a href="{{ site_url('/pass/mockTest/apply/cate') }}" alt="제주" onmouseover="$('span.area09').addClass('on');" onmouseleave="$('span.area09').removeClass('on');">신청하기</a></li>
                </ul>
                <span class="area01">노량진</span>
                <span class="area02">광주(참수리)</span>
                <span class="area03">인천</span>
                <span class="area04">광주</span>
                <span class="area05">전북<em>(전주)</em></span>
                <span class="area06">대구</span>
                <span class="area07">부산</span>
                <span class="area09">제주</span>   
			</div>
		</div>        

		<div class="evtCtnsBox wb_05" >     
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1546_05.jpg"  alt="전국모의고사 이벤트" usemap="#Map1530ab" border="0">
            <map name="Map1530ab" id="Map1530ab">
                <area shape="rect" coords="444,938,677,1005" href="javascript:;" onclick="giveCheck()" alt="응시쿠폰 받기" />
                <area shape="rect" coords="374,1332,747,1392" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="전국모의고사 이미지 다운받기" />
            </map>               
		</div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif 

        <div class="evtCtnsBox wb_06" id="evt">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1546_06.jpg"  alt="전국모의고사 신청하기" usemap="#Map1530b" border="0" />
            <map name="Map1530b" id="Map1530b">
                <area shape="rect" coords="315,464,806,580" href="https://police.willbes.net/pass/mockTest/apply/cate" target="_blank" />
            </map>          
		</div>        
        
        <div class="wb_ctsInfo NGR" id="ctsInfo">
            <div>
                <h3 class="NGEB">응시자 유의사항</h3>
                <dd>
                    <dt>유의사항</dt>
                    <dl>학원 실강패스 수강생은 응시 지역별 학원 상담실 문의해 주시기 바랍니다. 모든 고사장 주차 불가합니다.<br>
                        시험 응시생이 많아 혼잡이 예상되오니 대중교통을 이용해 주시기 바랍니다. 반드시 본인이 응시할 학원으로 신청 바랍니다.</dl>                   
                </dd>                
                <dd>
                    <dt>고사장 입실</dt>
                    <dl>시험당일 09:40까지 해당 고사장으로 반드시 입실해야합니다.</dl>
                    <dl>시험 종료 후 시험감독관의 지시가 있을때까지 퇴실할 수 없으며, 모든 답안지는 반드시 제출하여 주십시오.</dl>
                    <dl>본인이 신청한 학원에서만 응시할 수 있습니다.</dl>
                </dd>
                <dd>
                    <dt>신분증 지참</dt>
                    <dl>본인 확인을 위해 응시표(응시 전 발송 된 문자 메시지 확인 가능)와 공공기관이 발행한 
                    신분증(주민등록증, 여권, 운전면허증, 주민등록번호가 포함된 장애인등록증(복지카드 중 하나)을 반드시 소지하여야 합니다.</dl>
                </dd>
                <dd>
                    <dt>기타사항</dt>
                    <dl>모의고사문의 : 각 학원에 문의</dl>
                    <dl>성적공지일 추후공지</dl>
                </dd>
            </div>
        </div>
       
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
                    alert('전국 모의고사 무료 응시쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
                }
            }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop