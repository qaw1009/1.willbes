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

        /************************************************************/

        .sky {position:fixed;  top:200px; right:25px; z-index:10;}
        .sky a {display:block; margin-bottom:15px}
        
        .wb_police {background:#0A0A0A}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/06/2235_top_bg.jpg) no-repeat center;} 

        .evt_area{width:1120px;margin:0 auto;z-index:1;position:relative;} 

        .main_box{position:relative;height:1435px}
        .main_box .ani{z-index:0;position:absolute;opacity: 0;}
        .main_box .ani.txt1{left:480px;top:50px;height:23px;}
        .main_box .ani.txt2{left:250px;top:130px;}
        .main_box .ani.txt3{left:170px;top:355px;}
        .main_box .ani.txt4{left:325px;top:615px;}
        .main_box .ani.txt5{left:900px;top:660px;}
        .main_box .ani.txt6{left:0;top:660px;}
        .main_box .ani.txt7{left:900px;top:870px;}
        .main_box .ani.txt8{left:0;top:870px;}

        .wb_02 {background:#fff;}

        /*탭(텍스트)*/
        .tabContaier{width:100%;background:#fff;padding:50px 0;}
        .tabContaier ul{width:1210px;margin:0 auto;height:75px;} 
        .tabContaier li{display:inline-block;width:605px;height:75px;line-height:75px;background:#b5b5b5;color:#fff;float:left;font-size:25px;font-weight:bold;}
        .tabContaier:after {content:""; display:block; clear:both}
        .tabContaier li a{display:block;}
        .tabContaier li a:hover,
        .tabContaier li a.active {color:#fff;font-size:30px;background:#0048fe}          

         /*탭(텍스트) - 2번째 */
        .tabContaier2 {width:100%;background:#fff;padding:50px 0;}
        .tabContaier2 ul{width:1065px;margin:0 auto;height:75px;} 
        .tabContaier2 li{display:inline-block;width:212px;height:75px;line-height:75px;background:#b5b5b5;color:#fff;float:left;font-size:25px;font-weight:bold;margin-right:1px;}
        .tabContaier2:after {content:""; display:block; clear:both}
        .tabContaier2 li a{display:block;}
        .tabContaier2 li a:hover,
        .tabContaier2 li a.active {color:#fff;font-size:30px;background:#0048fe}                  

        .wb_05 {background:#7D7D7D;}
        .wb_05 div {width:1120px; margin:0 auto; position:relative}
        .wb_05 div p {position:absolute; width:100%; top:150px; left:0; text-align:center; font-size:42px; z-index:10}
        .wb_05 div p strong {color:#fff}
        .wb_05 div ul {position:absolute; width:88px; top:380px; left:527px; z-index:10}        
        .wb_05 div li {margin-bottom:20px}
        .wb_05 div li:nth-child(3) {margin-bottom:20px}
        .wb_05 div li:nth-child(4) {margin-bottom:20px}
        .wb_05 div li:nth-child(5) {margin-bottom:22px}
        .wb_05 div li:nth-child(6) {margin-bottom:22px}
        .wb_05 div li a {display:block; height:21px; line-height:21px; font-size:13px; letter-spacing:-1px; background:#231f20; color:#fff; border:1px solid #231f20; font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;}
        .wb_05 div li a:hover {background:#ffda38; color:#231f20}
        .wb_05 div span {position:absolute; display:block; height:31px; line-height:31px; padding:0 10px; background:#231f20; color:#fff; font-size:14px; border-radius:22px; border:1px solid #231f20; z-index:11; letter-spacing:-1px}
        .wb_05 div span em {font-size:11px}
        .wb_05 div span.on {background:#ffda38; color:#231f20}
        .wb_05 div span.area01 {top:438px; left:809px} /*본원*/
        .wb_05 div span.area02 {top:522px; left:764px} /*광주*/
        .wb_05 div span.area03 {top:490px; left:725px} /*인천*/        
        .wb_05 div span.area04 {top:727px; left:764px} /*광주*/
        .wb_05 div span.area05 {top:667px; left:795px} /*전주*/ 
        .wb_05 div span.area06 {top:675px; left:905px} /*대구*/
        .wb_05 div span.area07 {top:737px; left:944px} /*부산*/
        .wb_05 div span.area08 {top:750px; left:856px} /*진주*/
        .wb_05 div span.area09 {top:859px; left:754px} /*제주*/

        .wb_07 {background:#001f6f;}
        
        .wb_05 div, .wb_06 div, .wb_07 div {position:relative; width:1120px; margin:0 auto}    
        .wb_05 div a:hover, .wb_06 div a:hover, .wb_07 div a:hover {background:rgba(0,0,0,.2)}

        /*이용안내*/        
        .wb_ctsInfo {background:#e9e9e9; padding:100px 0}  
        .wb_ctsInfo div {
            width:980px; margin:0 auto; color:#fff; font-size:14px; line-height:1.25;
            font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;
        }
        .wb_ctsInfo div h3 {font-size:30px; margin-bottom:30px; color:#555;} 
        .wb_ctsInfo div dt {font-size:18px; margin-bottom:10px; font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;
            text-decoration:underline;color:#555;}  
        .wb_ctsInfo div dd {margin-bottom:30px}
        .wb_ctsInfo div dl {
            position: relative;
            padding-left:10px;
            color:#555;
        }
        .wb_ctsInfo div dl:before{
            background: #555 none repeat scroll 0 0; 
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
        .newTopDday ul li:first-child {line-height:none;padding-right:10px; padding-top:10px;}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky">
            <a href="#evt_01"><img src="https://static.willbes.net/public/images/promotion/2021/06/2235_sky01.png" alt="일정안내" ></a>
            <a href="#evt_02"><img src="https://static.willbes.net/public/images/promotion/2021/06/2235_sky02.png" alt="신청하기" ></a>
        </div>        

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                        2022 기본완성 전국모의고사<br>접수마감까지
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
        
        <div class="evtCtnsBox wb_police" >
			<img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="경찰학원부문 1위" />
		</div>

        <div class="evt_top">
            <div class="evt_area">            
                <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>
                <div class="main_box">
                    <p class="ani txt1" style="width: 285px;opacity: 1;">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/main_txt01.png" alt="">
                    </p>
                    <p class="ani txt2" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0); transform-origin: center center 0px;">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/main_txt02.png" alt="">
                    </p>
                    <p class="ani txt3" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0); transform-origin: center center 0px;">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/main_txt03.png" alt="">
                    </p>
                    <p class="ani txt4" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0); transform-origin: center center 0px;">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/main_txt04.png" alt="">
                    </p>
                    <p class="ani txt5" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0); transform-origin: center center 0px;">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/main_txt05.png" alt="">
                    </p>
                    <p class="ani txt6" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0); transform-origin: center center 0px;">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/main_txt06.png" alt="">
                    </p>
                    <p class="ani txt7" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0); transform-origin: center center 0px;">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/main_txt07.png" alt="">
                    </p>
                    <p class="ani txt8" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0); transform-origin: center center 0px;">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/main_txt08.png" alt="">
                    </p>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_01" >
			<img src="https://static.willbes.net/public/images/promotion/2021/06/2235_01.jpg"  alt="커밍쑨"/>			
		</div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2235_02.jpg" title="팩트체크" >
            <div class="evtCtnsBox wb_tab">
                <div class="tabContaier">    
                    <ul>    
                        <li><a href="#tab1" class="active">2022년도 경찰과목 개편</a></li>                            
                        <li><a href="#tab2">2022년도 출제비율 </a></li>          
                    </ul>
                </div>                
                <div id="tab1" class="tabContents">       
                    <img src="https://static.willbes.net/public/images/promotion/2021/06/2235_02_01.jpg" title="2022년도 경찰과목 개편"/>
                </div>
                <div id="tab2" class="tabContents">       
                    <img src="https://static.willbes.net/public/images/promotion/2021/06/2235_02_02.jpg" title="2022년도 출제비율"/>
                </div> 
            </div>     
        </div>

        <div class="evtCtnsBox wb_03" >
			<img src="https://static.willbes.net/public/images/promotion/2021/06/2235_03.jpg"  alt="new" />
            <div class="evtCtnsBox wb_tab">
                <div class="tabContaier2">    
                    <ul>    
                        <li><a href="#tab01" class="active">경찰전문가</a></li>                            
                        <li><a href="#tab02">기본확인</a></li>        
                        <li><a href="#tab03">학습점검</a></li>                            
                        <li><a href="#tab04">업그레이드</a></li>         
                        <li><a href="#tab05">누구나 쉽게</a></li>                                 
                    </ul>
                </div>                
                <div id="tab01" class="tabContents2">       
                    <img src="https://static.willbes.net/public/images/promotion/2021/06/2235_03_01.jpg" title="경찰전문가"/>
                </div>
                <div id="tab02" class="tabContents2">       
                    <img src="https://static.willbes.net/public/images/promotion/2021/06/2235_03_02.jpg" title="기본확인"/>
                </div> 
                <div id="tab03" class="tabContents2">       
                    <img src="https://static.willbes.net/public/images/promotion/2021/06/2235_03_03.jpg" title="학습점검"/>
                </div>
                <div id="tab04" class="tabContents2">       
                    <img src="https://static.willbes.net/public/images/promotion/2021/06/2235_03_04.jpg" title="업그레이드"/>
                </div> 
                <div id="tab05" class="tabContents2">       
                    <img src="https://static.willbes.net/public/images/promotion/2021/06/2235_03_05.jpg" title="누구나 쉽게"/>
                </div>
            </div>     
		</div>

        <div class="evtCtnsBox wb_04" id="evt_01" >
			<img src="https://static.willbes.net/public/images/promotion/2021/06/2235_04.jpg"  alt="시간표 및 응시안내" />
		</div>
       
		<div class="evtCtnsBox wb_05" id="table">			
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2185_03.jpg"  alt="시간표 및 장소" />
                <p class="NSK-Black">2022년 과목개편대비 <strong>기본완성 모의고사</strong> 시험문의</p>
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

		<div class="evtCtnsBox wb_06">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2235_06.jpg"  alt="전국모의고사 이벤트"/>
                <a href="javascript:;" onclick="giveCheck()" title="쿠폰받기" style="position: absolute;left: 39.46%;top: 61.41%;width: 21.07%;height: 5.08%;z-index: 2;"></a>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지다운" style="position: absolute;left: 27.5%;top: 86.03%;width: 43.84%;height: 4.11%;z-index: 2;"></a> 
            </div> 
		</div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif 

        <div class="evtCtnsBox wb_07" id="evt_02">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2235_07.jpg"  alt="전국모의고사 신청하기" />
                <a href="https://police.willbes.net/pass/mockTest/apply/cate" target="_blank" title="신청하기" style="position: absolute; left: 28.21%; top: 75%; width: 43.93%; height: 12.26%; z-index: 2;"></a>
            </div>     
		</div>           
        
        <div class="wb_ctsInfo" id="ctsInfo">
            <div>
                <h3 class="NSK-Black">응시자 유의사항</h3>
                <dd>
                    <dt>유의사항</dt>
                    <dl>학원 실강패스 수강생은 응시 지역별 학원 상담실 문의해 주시기 바랍니다. 모든 고사장 주차 불가합니다.<br>
                        시험 응시생이 많아 혼잡이 예상되오니 대중교통을 이용해 주시기 바랍니다. 반드시 본인이 응시할 학원으로 신청 바랍니다.</dl>                   
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

    <script type="text/javascript">
        $regi_form = $('#regi_form');

        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}';
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('전국 모의고사 50% 할인쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
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

        /*탭(텍스터버전)*/
            $(document).ready(function(){
            $(".tabContents").hide();
            $(".tabContents:first").show();
            $(".tabContaier ul li a").click(function(){
            var activeTab = $(this).attr("href");
            $(".tabContaier ul li a").removeClass("active");
            $(this).addClass("active");
            $(".tabContents").hide();
            $(activeTab).fadeIn();
            return false;
            });
        });

            /*탭(텍스터버전)2*/
            $(document).ready(function(){
                $(".tabContents2").hide();
                $(".tabContents2:first").show();
                $(".tabContaier2 ul li a").click(function(){
                var activeTab = $(this).attr("href");
                $(".tabContaier2 ul li a").removeClass("active");
                $(this).addClass("active");
                $(".tabContents2").hide();
                $(activeTab).fadeIn();
                return false;
                });
            });

        /*애니메이션 스크립트*/
        $(document).ready(function () {
		var tl = new TimelineLite();
		tl.to('.main_box .txt1', .3, { opacity:1,width:592}, 0.2)
			.fromTo('.main_box .txt2', .6, { opacity:0,x:300,delay:.3},{ opacity:1,x:0, transformOrigin: "center center", ease: Power4.easeOut,delay:.3})
			.fromTo('.main_box .txt3', .6, { opacity:0,x:-300,delay:-.6},{ opacity:1,x:0, transformOrigin: "center center", ease: Power4.easeOut,delay:-.6})
			.fromTo('.main_box .txt4', .6, { opacity:0,y:300},{ opacity:1,y:0, transformOrigin: "center center", ease: Bounce.easeOut})
			.fromTo('.main_box .txt5', .6, { opacity:0,x:500},{ opacity:1,x:0, transformOrigin: "center center", ease: Circ.easeOut})
			.fromTo('.main_box .txt6', .6, { opacity:0,x:-500,delay:-.3},{ opacity:1,x:0, transformOrigin: "center center", ease: Circ.easeOut,delay:-.3})
			.fromTo('.main_box .txt7', .6, { opacity:0,x:500,delay:-.3},{ opacity:1,x:0, transformOrigin: "center center", ease: Circ.easeOut,delay:-.3})
			.fromTo('.main_box .txt8', .6, { opacity:0,x:-500,delay:-.3},{ opacity:1,x:0, transformOrigin: "center center", ease: Circ.easeOut,delay:-.3})

		fnSetExam(0,0);
		fnSetExam(1,2);
		fSchViewChg(2);

	});
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop