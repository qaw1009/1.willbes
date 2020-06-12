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
            position:relative;            
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative; margin:0 auto}

        /************************************************************/

        .skybanner {
            position:absolute; 
            top:400px; 
            right:10px;
            z-index:1;            
        }
        .skybanner_sectionFixed {position:fixed; top:20px}
               
        .wb_pop2 {background:#1a2236 url(http://file3.willbes.net/new_cop/2018/08/EV180830_p5_1_bg.jpg) no-repeat center top}
        
        .wb_new {background:#13695a url(http://file3.willbes.net/new_cop/2018/08/EV180830_p1_bg3_3.jpg) no-repeat center top; padding-bottom:50px;}
        .wb_new .check {width:980px; margin:0 auto; background:#13695a; padding:20px 0; font-size:120% !important; color:#fff; font-weight:bold}
        .wb_new .check input {border:2px solid #000; height:24px; width:24px }
        .wb_new .check a {display:inline-block; padding:10px 20px; color:#fff; background:#000; margin-left:50px; border-radius:20px}

        .wb_cts01 {width:100%; text-align:center; background:#fff;min-width:1210px}	            
        .wb_cts02 {background:#434343 url(http://file3.willbes.net/new_cop/2018/10/EV181025_p2_bg.jpg) no-repeat center;}        
        .wb_cts03 {background:#1d2025 url(http://file3.willbes.net/new_cop/2018/10/EV181025_p4_bg.jpg) no-repeat center}        
        .wb_cts04 {background:#eee}        



        /* 이용안내 */
        .content_guide_wrap{background:#fff; width:1210px; margin:0 auto; padding:50px 0}
        .content_guide_wrap .guide_tit{margin-bottom:20px;width:1210px;margin:0 auto;text-align:center; }
        .content_guide_wrap ul {width:960px; margin:0 auto;}
        .content_guide_wrap ul li {display:inline; float:left; width:480px}
        .content_guide_wrap ul li a {display:block; text-align:center; height:60px; line-height:60px; font-size:160% !important; border:2px solid #f3f3f3; border-bottom:2px solid #202020; background:#f3f3f3}
        .content_guide_wrap ul li a:hover,
        .content_guide_wrap ul li a.active {border:2px solid #202020; border-bottom:2px solid #fff; color:#202020; background:#fff; font-weight:600}
        .content_guide_wrap ul:after {content:""; display:block; clear:both}
        .content_guide_box{width:960px; margin:0 auto; border:2px solid #202020;  padding-top:30px; border-top:0;} 
        .content_guide_box ul li { width:780px;}
        .content_guide_box dl{margin:0 20px; word-break:keep-all; padding:30px}
        .content_guide_box dt{margin-bottom:10px}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-weight:bold; margin-right:10px; font-size:120%}
        .content_guide_box dt img.btn{padding:2px 0 0 0}
        .content_guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .content_guide_box dd strong {color:#555}
        .content_guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px}        
    </style>

    <div class="evtContent NSK" id="evtContainer"> 

        <div class="evtCtnsBox wb_pop2" id="main">
            <img src="http://file3.willbes.net/new_cop/2018/08/EV180830_p5_1.png"  alt="인터뷰바로가기" usemap="#Map180920" border="0" />
            <map name="Map180920" id="Map180920">
                <area shape="rect" coords="406,252,565,284" href="http://willbescop.net/boardCustomerOn/board_view.html?topMenuType=O&topMenuGnb=OM_008&topMenu=MAIN&menuID=OM_008_001&topMenuName=ÀÏ¹Ý°æÂû&BOARDTYPE=1&INCTYPE=view&BOARD_MNG_SEQ=NOTICE_013&currentPage=&BOARD_SEQ=138466&PARENT_BOARD_SEQ=&SEARCHKIND=&SEARCHTEXT=" alt="2018년 3차 시행 과목별 만점자 수기 바로가기" target="_blank"/>
            </map>
        </div>

        <div class="evtCtnsBox wb_new">
            <img src="http://file3.willbes.net/new_cop/2018/08/EV180830_p1_5.png" alt="" /><br>
            <img src="http://file3.willbes.net/new_cop/2018/08/EV180830_p1_4_3.png" alt="문풀 PASS" usemap="#Map180830" border="0" /><br>
            <map name="Map180830" id="Map180830">
            <area shape="rect" coords="186,486,343,524" href="javascript:go_PassLecture(1);"  alt="동영상"/>
            <area shape="rect" coords="640,484,801,527"href="javascript:go_PassLecture(2);"    alt="학원실강"/>
            </map>
        <div class="check"><label><input name="ischk" type="checkbox" value="Y" /> 페이지 하단 신광은경찰PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label><a href="#tabsEvt">이용안내확인하기 ↓</a></div>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_cop/2018/08/EV180830_p2.png"  alt="실전" />
        </div>
        
        <div class="evtCtnsBox wb_cts03" >
            <img src="http://file3.willbes.net/new_cop/2018/08/EV180830_p3.png"  alt="필수" />
        </div>
        
        <div class="evtCtnsBox wb_cts04" >
            <img src="http://file3.willbes.net/new_cop/2018/08/EV180830_p4_2.jpg"  alt="합격시스템" />
        </div>
        
        <div class="content_guide_wrap">
            <ul class="tabsEvt" id="tabsEvt">
                <li><a href="#tab1">실전 문풀 풀패키지 이용안내</a></li>
                <li><a href="#tab2">문풀패키지 학원 실강 이용안내</a></li>
            </ul>
            <div class="content_guide_box" id="tab1">	
                <dl>
                    <dt>
                        <h3>상품구성</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 패스 상품의 표기된 기간 동안 신규 촬영되는 동영상 문제풀이 전 강좌를 무제한 수강 할 수 있습니다.</li>
                            <li>패스 강좌는 결제 완료되는 즉시 수강이 시작됩니다. 문제풀이 강의는 2월 25일부터 진행됩니다.</li>
                            <li>김현정 아침특강은 제공되지 않습니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>수강관련</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>먼저 내 강의실 메뉴에서 패스존으로 접속합니다.</li>
                            <li>구매하신 실전 문풀 풀패키지 상품명 선택 후 [강좌추가하기] 버튼 클릭, 원하시는 강좌를 선택 등록 한 후 수강할 수 있습니다.</li>
                            <li>실전 문풀 풀패키지 수강시에는 일시정지 기능을 이용할 수 없습니다.</li>
                            <li>실전 문풀 풀패키지 수강시에는 이용 가능한 기기는 다음과 같이 제한됩니다.<br />
                                <strong>PC+Mobile 신광은경찰PASS 수강 시</strong> : PC 2대 또는 PC 1대+모바일 1대 또는 모바일 2대 가능 (PMP 신광은경찰PASS는 제공하지 않습니다.)</li>
                            <li>PC, 모바일 기기변경 등 단말기 초기화가 필요한 경우 내용 확인 후 초기화 진행가능하오니 고객센터로 문의주시기 바랍니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>교재구매</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li><strong>실전 문풀 풀패키지</strong>는 교재를 별도로 구매하셔야 하며, .각 강좌별 교재는 강좌소개 및  [교재구매] 메뉴에서 별도 구매 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>환불안내</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다. 학습자료 및 모바일 다운로드 이용시 수강한 것으로  간주됩니다.</li>
                            <li>고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, 신광은경찰PASS 정가기준으로 계산하여 사용일수만큼 차감하고 환불됩니다.(가산점 특강, 온라인모의고사 등 이용 시에도 차감)</li>
                            <li>실전 문풀 풀패키지는 차감액이 결제 금액을 초과할 시 환불 불가합니다.</li>
                        </ol>
                    </dd>

                    <dt>
                        <h3>유의사항</h3>
                    </dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선할인/적립금사용 등 혜택이 적용되지 않으니 양해 및 참조 부탁 드립니다.</li>
                            <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인양도 등 부정사용 적발 시 회원 자격 박탈 및 환불 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</li>
                            <li>온라인 모의고사는 전범위 모의고사가 무료로 제공되며 학원에서 진행되는 일부 모의고사(올빼미, 옹달샘)는 혜택에서 제외됩니다.</li>    
                            <li>온.오프라인 동시 시행되는 이벤트, 무료특강의 경우 해당강좌는 미지급되거나 이벤트 종료 후 제공될 수 있습니다.</li>                        
                        </ol>
                    </dd>
                    <dd>
                        <p>※ 이용문의 : 고객만족센터 1544-5006</p>
                    </dd>
                </dl>
            </div><!--tab1//-->
            
            <div class="content_guide_box" id="tab2">	
                <dl>
                    <dt>
                        <img src="http://file3.willbes.net/new_cop/2018/08/EV180830_p7.jpg"  alt="학원실강 진행일정" />
                    </dt>
                    <dt>
                        <h3>문제풀이 1단계 진도별 정리</h3>
                    </dt>
                    <dd>
                        <ul >
                            <li>- 강의일정: 2/25(월)~3/23(토), 총 25회 강의(과목별 5회)</li>
                            <li>- 강의시간: 매주 월~토 [09:00~13:00](※3/3(일) 1단계 영어 수업 진행)</li>
                        </ul>
                    </dd>

                    <dt>
                        <h3>문제풀이 2단계 전범위 모의고사</h3>
                    </dt>
                    <dd>
                        <ul>
                            <li>① 전범위에서 매회 20문제씩 출제하여 3회 모의고사 실시 후 해설이 진행되는 강좌</li>
                            <li>② 과목별로 실제시험과 동일한 형태로 전범위에서 예상문제풀이</li>
                            <li>③ 강의일정: 3/25(월)~4/20(토), 총 25회 강의(과목별 5회)</li>
                            <li>④ 강의시간: 매주 월~토 [09:00~13:00] (※3/29(금) 2단계 경찰학 오후 수업 진행)</li>
                        </ul>
                    </dd>

                    <dt>
                        <h3>문제풀이 3단계 파이널 실전모의고사</h3>
                    </dt>
                    <dd>
                        <ul>
                            <li>① 실제 시험과 동일한 방식으로 100문제 100분!</li>
                            <li>② 매일 각과목 필출예상문제 20문제씩 5과목 100문제를 100분간 시험실시 OMR마킹</li>
                            <li>③ 시험 후 신광은 경찰팀 전 과목 교수님의 해설강의 진행</li>
                            <li>④ 강의일정: 4/21(일)~4/24(수), 총 4회 진행(4/21~4/22 -해설강의 진행, 4/23~4/24-해설지 배부)</li>
                            <li>⑤ 강의시간: 10:00~11:40(100분) 시험 후 12:30부터 순차적으로 과목별 해설강의 진행</li>
                            <li>※해설지가 배부되면 해설강의를 진행하지 않습니다.</li>
                        </ul>
                    </dd>

                    <dt>
                        <h3>수강료</h3>
                    </dt>
                    <dd>
                        <ul>
                            <li>비수강생 660,000원 / 수강생 650,000원(2018.1~신광은 경찰학원 실강 수강생,인강PASS 수강생)/<br />
                            스파르타 현재 등록생 or 2018년 이후 실강PASS 수강생 or 필합자(2018년 1차/2018년 2차/2018년 3차) or<br />
                            18년 3차대비 필합 풀패키지 수강생 600,000원 
                            </li>
                        </ul>
                    </dd>

                </dl>
            </div><!--tab2//-->

            
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
		/*tab*/
		$(document).ready(function(){
            $('ul.tabsEvt').each(function(){
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
	
        /**/
        function go_PassLecture(no){
            
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            
            if(no == 1){
                lUrl = "http://willbescop.net/yearpackagelecture/yearpackagelectureDetail.html?topMenu=081&topMenuName=&topMenuType=O&searchCategoryCode=081&searchLeccode=Y201900017&leftMenuLType=M0001&lecKType=Y";
            }else if(no == 2){
                lUrl = "http://willbescop.net/lecture/passLectuerSJong.html?topMenu=081&topMenuName=일반경찰&topMenuType=F&leftMenuLType=M0302&newlearningCD=M0321&lecKType=N";
            }else if(no == 3){
                lUrl = "http://willbescop.net/yearpackagelecture/yearpackagelectureDetail.html?topMenu=081&topMenuName=&topMenuType=O&searchCategoryCode=081&searchLeccode=Y201800117&leftMenuLType=M0001&lecKType=Y";
            }else if(no == 4){
                lUrl = "http://willbescop.net/yearpackagelecture/yearpackagelectureDetail.html?topMenu=082&topMenuName=&topMenuType=O&searchCategoryCode=082&searchLeccode=Y201800118&leftMenuLType=M0001&lecKType=Y";
            }else if(no == 5){
                lUrl = "http://willbescop.net/yearpackagelecture/yearpackagelectureDetail.html?topMenu=081&topMenuName=&topMenuType=O&searchCategoryCode=081&searchLeccode=Y201800050&leftMenuLType=M0001&lecKType=Y";
            }else if(no == 6){
                lUrl = "http://willbescop.net/yearpackagelecture/yearpackagelectureDetail.html?topMenu=082&topMenuName=&topMenuType=O&searchCategoryCode=082&searchLeccode=Y201800051&leftMenuLType=M0001&lecKType=Y";
            }else if(no == 7){
                lUrl = "http://willbescop.net/yearpackagelecture/yearpackagelectureDetail.html?topMenu=081&topMenuName=&topMenuType=O&searchCategoryCode=081&searchLeccode=Y201800052&leftMenuLType=M0001&lecKType=Y";
            }else if(no == 8){
                lUrl = "http://willbescop.net/yearpackagelecture/yearpackagelectureDetail.html?topMenu=082&topMenuName=&topMenuType=O&searchCategoryCode=082&searchLeccode=Y201800053&leftMenuLType=M0001&lecKType=Y";
            }
            
        //	var newWindow = window.open("about:blank");
        //	newWindow.location.href = lUrl;
        location.href = lUrl;
        }

    </script>   
    
    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>      
         $( document ).ready( function() {
            var jbOffset = $( '.skybanner' ).offset();
            $( window ).scroll( function() {
              if ( $( document ).scrollTop() > jbOffset.top ) {
                $( '.skybanner' ).addClass( 'skybanner_sectionFixed' );
              }
              else {
                $( '.skybanner' ).removeClass( 'skybanner_sectionFixed' );
              }
            });
          } );

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);  
	    });       
    </script>    
@stop