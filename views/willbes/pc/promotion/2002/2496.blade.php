@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            min-width:2000px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        /*타이머*/
        .newTopDday {background:#f5f5f5; width:100%; padding:20px 0; font-size:24px; color:#000;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%; line-height:70px;}
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%; line-height:70px;}
        .newTopDday ul:after {content:""; display:block; clear:both}

        .sky {position:fixed;top:150px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:15px}
       
        .evt00 {background:#0a0a0a}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/01/2496_top_bg.jpg) no-repeat center top; }   
      
        .evt01 {background:#fff}

        .evt02 {background:#FAFAFC;position:relative;padding-bottom:100px;}
        .youtube {position:absolute; bottom:375px; left:50%; width:607px; z-index:1;margin-left:-430px}
        .youtube iframe {width:860px; height:485px;}

        .evt03 {background:#fff}

		.evt04 {background:#FAFAFC; padding-bottom:150px}
        .evt04 div {width:1120px; margin:0 auto}
        .evt04 .btn a {font-size:30px; height:80px; line-height:80px; color:#fff; background:#000; border-radius:10px; display:block; text-align:center}
        .evt04 .btn a:hover {background:#015637;}
        /*탭(이미지)*/
        .evt04 .tabBox {background:#FAFAFC}
        .evt04 .tabs {width:760px; margin:0 auto;}		
        .evt04 .tabs li {display:inline; float:left;padding-right:3px;}	
        .evt04 .tabs a img.off {display:block}
        .evt04 .tabs a img.on {display:none}
        .evt04 .tabs a.active img.off {display:none}
        .evt04 .tabs a.active img.on {display:block}
        .evt04 .tabs:after {content:""; display:block; clear:both}

        .evt05 {background:#ECEBF0}

        /*이용안내*/        
        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1120px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:10px; color:#c4feff}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox ul li {list-style: none; margin-left:20px}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">      

        <div class="sky" id="QuickMenu">
            <a href="#none" class="r_btn_tab" data-tab-id="1">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2496_sky01.png" alt="선접수 할인"/>
            </a>
            <a href="#none"class="r_btn_tab" data-tab-id="2">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2496_sky02.png" alt="추가할인 이벤트"/>
            </a>           
        </div>
        {{--
        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div id="ddaytime">
                <ul>
                    <li class="NSK-Black">
                        SUPER PASS
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
                    <li class="NSK-Black">
                        {{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} {{ $arr_promotion_params['etime'] or '' }} 마감!
                    </li>
                </ul>
            </div>
        </div>
        --}}

        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1864_first.jpg"  alt="경찰학원부분 1위" />
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2496_top.jpg" alt="2022 슈퍼 pass" />
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2496_01.jpg" alt="슈퍼패스를 말하다"  />
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-top">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2496_02.jpg" alt="2022년을 준비하다"  />
                <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" title="영상이 궁금하다면?" target="_blank" style="position: absolute;left: 29.45%;top: 85.92%;width: 41.14%;height: 3.25%;z-index: 2;"></a>
            </div>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/qkIw507IPpM?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2496_03.jpg" alt="합격 커리큘럼"  />   
        </div>
          
         <div class="evtCtnsBox evt04" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2496_04.jpg" alt="2022년 시험대비 합격반"  />
            <div class="tabBox">              
                <ul class="tabs">
                    <li>
                        <a href="#tab1" id="menu_tab1">
                            <img src="https://static.willbes.net/public/images/promotion/2022/01/2496_tab1_on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2022/01/2496_tab1_off.png" class="off"/>
                        </a>
                    </li>
                    <li>
                        <a href="#tab2" id="menu_tab2">
                            <img src="https://static.willbes.net/public/images/promotion/2022/01/2496_tab2_on.png" class="on"/>
                            <img src="https://static.willbes.net/public/images/promotion/2022/01/2496_tab2_off.png" class="off"/>
                        </a>
                    </li>                    
                </ul>
            </div>

            <div id="tab1" class="tabContents">       
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2496_04_01.jpg" alt="3월 개강반"/>
                <div class="NSK-Black btn"><a href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank">SUPER PASS 신청하기 ></a></div>     
            </div> 

            <div id="tab2" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2496_04_02.jpg" alt="4월 개강반"/>
                <div class="NSK-Black btn"><a href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605001&course_idx=1085" target="_blank">SUPER PASS 신청하기 ></a></div>
            </div> 

        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-top">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2496_05.jpg" alt="특별혜택"  /> 
        </div>

        <div class="evtCtnsBox evtInfo" data-aos="fade-top">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">유의사항</h4>
				<div class="infoTit"><strong>2022 슈퍼패스 경찰 전문 교수진</strong></div>
				<ul>
					<li>형사법 - 신광은 교수님</li>
                    <li>경찰학 - 장정훈 교수님</li>
                    <li>헌 법 – 김원욱 교수님 & 이국령 교수님(택1)</li>
                    <li>범죄학 – 박상민 교수님</li>
                    <li>G-TELP – 김준기 교수님</li>
                    <li>한능검 – 오태진 교수님</li>                      
				</ul>
                
                <div class="infoTit"><strong>3월 개강반) [기본형] 7개월, 6개월 슈퍼패스 유의사항</strong></div>
				<ul>
                    <li>① [기본형] 7개월 슈퍼패스, 6개월 슈퍼패스는 2022년 3월 7일부터 2022년 8월 20일까지 책정된 수강료로
                        시험 일정에 따라 추가 수강료가 부과될 수 있습니다.<br>
                        (1개월 연장 시 – 실강 10만원, 인강 5만원)<br>
                        *정규과정 : 2022년 과목개편대비 기본이론,심화과정,문제풀이,마무리 특강
                    </li>
                    <li>② 기본형 슈퍼패스를 등록한 경우 22년 4월에 진행되는 심화강의 실강은 수강이 불가합니다.</li>
                    <li>③ 22년 2월 인강 선지급은 7개월 슈퍼패스를 등록한 수강생에게 제공되는 혜택입니다.</li>
                    <li>④ 국가재난, 정부 지침 등으로 인한 학원 휴원으로 실강 진행이 어려울 경우 동영상 강의로 대체될 수 있으며, 
                        이로 인한 해당기간 환불은 불가합니다.
                    </li>
                    <li>⑤ G-TELP 특강은 수강기간 내에, 실강 1회에 한하여 50% 할인 적용됩니다.</li>
                    <li>⑥ 인강패스와 정규과정 외 특강 및 모의고사는 슈퍼패스 등록생에게 제공되는 무료 혜택입니다.</li>
                    <li>⑦ 일부 특강은 유료로 결제할 수 있습니다.</li>
                    <li>⑧ 중도 환불 시 수강기간만큼 차감 후, 무료 혜택 금액을 차감하여 환불됩니다.</li>	
				</ul>

                <div class="infoTit"><strong>3월 개강반) [기본/심화형] 7개월, 6개월 슈퍼패스 유의사항</strong></div>
                <ul>
                    <li>① [기본/심화형] 7개월 슈퍼패스, 6개월 슈퍼패스는 2022년 3월 7일부터 2022년 8월 20일까지 책정된 수강료로
                        시험 일정에 따라 추가 수강료가 부과될 수 있습니다.<br>
                        (1개월 연장 시 – 실강 10만원, 인강 5만원)<br>
                        *정규과정 : 2022년 과목개편대비 기본이론,심화과정,문제풀이,마무리 특강
                    </li>
                    <li>② 22년 2월 인강 선지급은 7개월 슈퍼패스를 등록한 수강생에게 제공되는 혜택입니다.</li>
                    <li>③ 국가재난, 정부 지침 등으로 인한 학원 휴원으로 실강 진행이 어려울 경우 동영상 강의로 대체될 수 있으며, 
                        이로 인한 해당기간 환불은 불가합니다.
                    </li>
                    <li>④ G-TELP 특강은 수강기간 내에, 실강 1회에 한하여 50% 할인 적용됩니다. </li>
                    <li>⑤ 인강패스와 정규과정 외 특강 및 모의고사는 슈퍼패스 등록생에게 제공되는 무료 혜택입니다.</li>
                    <li>⑥ 일부 특강은 유료로 결제할 수 있습니다.</li>
                    <li>⑦ 중도 환불 시 수강기간만큼 차감 후, 무료 혜택 금액을 차감하여 환불됩니다.</li>                   
                </ul>

                <div class="infoTit"><strong>4월 개강반) [심화시작반] 6개월, 5개월 슈퍼패스 유의사항</strong></div>
                <ul>
                    <li>① [심화시작반] 6개월 슈퍼패스, 5개월 슈퍼패스는 2022년 4월 4일부터 2022년 8월 20일까지 책정된 수강료로
                        시험 일정에 따라 추가 수강료가 부과될 수 있습니다.<br>
                        (1개월 연장 시 – 실강 10만원, 인강 5만원)<br>
                        *정규과정 : 2022년 과목개편대비 기본이론,심화과정,문제풀이,마무리 특강
                    </li>     
                    <li> ② 22년 2월 인강 선지급은 6개월 슈퍼패스를 등록한 수강생에게 제공되는 혜택입니다.</li>
                    <li> ③ 국가재난, 정부 지침 등으로 인한 학원 휴원으로 실강 진행이 어려울 경우 동영상 강의로 대체될 수 있으며, 
                         이로 인한 해당기간 환불은 불가합니다.
                    </li>
                    <li>④ G-TELP 특강은 수강기간 내에, 실강 1회에 한하여 50% 할인 적용됩니다.</li>
                    <li>⑤ 인강패스와 정규과정 외 특강 및 모의고사는 슈퍼패스 등록생에게 제공되는 무료 혜택입니다.</li>
                    <li>⑥ 일부 특강은 유료로 결제할 수 있습니다.</li>
                    <li>⑦ 중도 환불 시 수강기간만큼 차감 후, 무료 혜택 금액을 차감하여 환불됩니다.</li>
                </ul>

                <div class="infoTit"><strong>슈퍼패스 환승/ 재등록 이벤트</strong></div>
                <ul>
                    <li>환승 <br>
                    - 타 경찰학원 정규과정 실강 또는 인강 유료 수강이력이 1개월 이상 있는 수험생<br>
                    - 2021년 이후 자사 실강 수강이력이 없는 수험생</li>	
                    <li>재등록<br>
                    - 신광은 경찰팀 슈퍼패스를 1년 이내 재등록 하는 수강생</li>		
				</ul>
				<div class="strong">
					* 학원사정으로 이벤트 기간 및 금액변동이 있을 수 있습니다.<br>
					* 학원사정으로 강의 추가 및 변경이 있을수 있습니다.<br>
                    * 학원접수 문의 : 1544-0336
				</div>
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

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">          
        $(document).ready(function() {
            /*강의탭*/
        var $active, $links = $(this).find('.tabs li a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
            $links.not($active).each(function () {
                $(this.hash).hide()
        });

        $(".r_btn_tab").click(function () {
            var offset = $('.tabs').offset();
            $('html, body').animate({scrollTop : offset.top}, 400);

            var activeTab = $(this).data("tab-id");
            $(".tabs li a").removeClass("active");
            $('#menu_tab'+activeTab).addClass("active");
            $(".tabContents").hide();
            $('#tab'+activeTab).fadeIn();
            return false;
        });

        $(".tabs li a").click(function(){
            var activeTab = $(this).attr("href");
            $(".tabs li a").removeClass("active");
            $(this).addClass("active");
            $(".tabContents").hide();
            $(activeTab).fadeIn();
            return false;
        });

            /*디데이카운트다운*/
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        }); 
         
    </script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop