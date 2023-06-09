@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5); border-radius:4px}*/

        /************************************************************/        

        .sky {position:fixed; top:200px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:15px}

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li .mock_test {font-size:16px;font-weight:400;line-height:1.75;}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none;padding-right:10px; padding-top:10px;width:30%;}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .wb_police {background:#0A0A0A}

        .evt_top {background:#00c73c;position:relative}
        .evt_top .ani{position:absolute;left:50%;top:-75px;margin-left:-75px}

        .wb_01 {position: relative; background:#f6f6f6}
        .wb_01 iframe {position:absolute; top:341px; left:50%; margin-left:-450px; width:900px; height:569px; z-index: 2;}     
        
        .wb_04 {background:#121212;} 

        .wb_06 {background:#7D7D7D;} 
        .wb_06 div p {position:absolute; width:100%; top:150px; left:0; text-align:center; font-size:42px; z-index:10}
        .wb_06 div p strong {color:#fff}
        .wb_06 div ul {position:absolute; width:88px; top:380px; left:527px; z-index:10}        
        .wb_06 div li {margin-bottom:20px}
        .wb_06 div li:nth-child(3) {margin-bottom:20px}
        .wb_06 div li:nth-child(4) {margin-bottom:20px}
        .wb_06 div li:nth-child(5) {margin-bottom:22px}
        .wb_06 div li:nth-child(6) {margin-bottom:22px}
        .wb_06 div li a {display:block; height:21px; line-height:21px; font-size:13px; letter-spacing:-1px; background:#231f20; color:#fff; border:1px solid #231f20; font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;}
        .wb_06 div li a:hover {background:#ffda38; color:#231f20}
        .wb_06 div span {position:absolute; display:block; height:31px; line-height:31px; padding:0 10px; background:#231f20; color:#fff; font-size:14px; border-radius:22px; border:1px solid #231f20; z-index:11; letter-spacing:-1px}
        .wb_06 div span em {font-size:11px}
        .wb_06 div span.on {background:#ffda38; color:#231f20}
        .wb_06 div span.area01 {top:438px; left:809px} /*본원*/
        .wb_06 div span.area02 {top:522px; left:764px} /*광주*/
        .wb_06 div span.area03 {top:490px; left:725px} /*인천*/        
        .wb_06 div span.area04 {top:727px; left:764px} /*광주*/
        .wb_06 div span.area05 {top:667px; left:795px} /*전주*/ 
        .wb_06 div span.area06 {top:675px; left:905px} /*대구*/
        .wb_06 div span.area07 {top:737px; left:944px} /*부산*/
        .wb_06 div span.area08 {top:750px; left:856px} /*진주*/
        .wb_06 div span.area09 {top:859px; left:754px} /*제주*/


        /*이용안내*/        
        .wb_ctsInfo {background:#848484; padding:100px 0}  
        .wb_ctsInfo div {
            width:980px; margin:0 auto; color:#fff; font-size:16px; line-height:1.5;
            font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;
        }
        .wb_ctsInfo div h3 {font-size:30px; margin-bottom:30px; color:#fff;} 
        .wb_ctsInfo div dt {font-size:19px; margin-bottom:10px; font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;
            text-decoration:underline;color:#fff; font-weight:500}  
        .wb_ctsInfo div dd {margin-bottom:30px}
        .wb_ctsInfo div dl {
            position: relative;
            padding-left:10px;
            color:#fff;
        }
        .wb_ctsInfo div dl:before{
            background: #fff none repeat scroll 0 0; 
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

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#evt_01"><img src="https://static.willbes.net/public/images/promotion/2022/04/2623_sky01.png" alt="일정안내" ></a>
            <a href="#evt_02"><img src="https://static.willbes.net/public/images/promotion/2022/04/2623_sky02.png" alt="신청하기" ></a>
        </div>        

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                        <span class="mock_test">2022년 경찰 2차 대비 전국모의고사</span><br>접수마감까지
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
        
        <div class="evtCtnsBox wb_police" data-aos="fade-down">
			<img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="경찰학원부문 1위" />
		</div>

        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2623_top.jpg" alt="전국모의고사">
            <div class="ani">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2623_top_book.png" alt="5월" data-aos="zoom-in">
            </div>
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/04/2623_01.jpg"  alt="본것과 안본것의 차이"/>
            <iframe webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" frameborder="false" scrolling="no" src="https://www.youtube.com/embed/Ks0XNnezIGQ?rel=0"></iframe>            
		</div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/04/2623_02.jpg"  alt="과목개편"/>           
		</div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/04/2623_03.jpg"  alt="출제비율"/>           
		</div>

        <div class="evtCtnsBox wb_04" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2022/04/2623_04.jpg"  alt="지금 응시하세요"/>           
		</div>

     
        <div class="evtCtnsBox wb_05" id="evt_01" data-aos="fade-up" >
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2623_05.jpg"  alt="시간표 및 장소" />
                <a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=355437&" target="_blank" title="응시방법 안내" style="position: absolute; left: 20.29%; top: 86.68%; width: 28.55%; height: 6.59%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/mockTestNew/apply/cate/" target="_blank" title="신청하기" style="position: absolute; left: 51.29%; top: 86.68%; width: 28.55%; height: 6.59%; z-index: 2;"></a>
            </div>
		</div>
       
		<div class="evtCtnsBox wb_06" id="table" data-aos="fade-up">			
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2623_06.jpg"  alt="전국모의고사 시험문의" />
                <p class="NSK-Black">2022년 2차 대비 <strong>전국모의고사</strong> 시험문의</p>
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

		<div class="evtCtnsBox wb_07" id="evt_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2623_07.jpg"  alt="전국모의고사 소문내기 이벤트"/>
                <a href="javascript:void(0)" onclick="giveCheck()" title="할인쿠폰 받기" style="position: absolute; left: 29.48%; top: 81.96%; width: 41.5%; height: 9.84%; z-index: 2;"></a>
            </div> 
		</div>

        <div class="evtCtnsBox wb_08" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2623_08.jpg"  alt="이미지 다운받기"/>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운" style="position: absolute; left: 56.88%; top: 19.46%; width: 29.5%; height: 13.84%; z-index: 2;"></a>               
            </div> 
		</div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

        <div class="wb_ctsInfo" id="ctsInfo" data-aos="fade-up">
            <div>
                <h3 class="NSK-Black">응시자 유의사항</h3>
                <dd>
                    <dt>유의사항</dt>
                    <dl>학원 실강패스 수강생은 응시 지역별 학원 상담실 문의해 주시기 바랍니다. 모든 고사장 주차 불가합니다.</dl> 
                    <dl>시험 응시생이 많아 혼잡이 예상되오니 대중교통을 이용해 주시기 바랍니다. 반드시 본인이 응시할 학원으로 신청 바랍니다.</dl>                   
                </dd>                
                <dd>
                    <dt>고사장 입실</dt>
                    <dl>교시험당일 09:40까지 해당 고사장으로 반드시 입실해야합니다.</dl>
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

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    <script type="text/javascript">
        $regi_form = $('#regi_form');

        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params) === false)
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params['give_type']}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params['comment_chk_yn']}}&arr_give_idx_chk={{$arr_promotion_params['arr_give_idx_chk']}}';
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('전국 모의고사 할인쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
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