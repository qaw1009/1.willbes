@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .sky {position:fixed; top:225px;right:10px;z-index:10;}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/12/1982_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:#EBEBEB;}
        .wb_cts01 .tImg img {margin:0 5px 10px;width:343px;height:188px;}

        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1717_02_bg.jpg) no-repeat center top;}

        .wb_cts03 {background:#fff}

        .wb_cts04 {background:#703551}

        .wb_cts05 {background:#fff}
        .radio_apply {position:relative;}
        .radio_apply li.one{position:absolute;left:50%;margin-left:-220px;margin-top:-70px}
        .radio_apply li.two {position:absolute;left:50%;margin-left:140px;margin-top:-70px}
        .radio_apply li.three {position:absolute;left:50%;margin-left:-40px;margin-top:-105px}
        .radio_apply  li input {height:30px; width:30px;}

         /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#e4e4e4; width:100%; padding:15px 0 40px}
        .newTopDday ul {width:1120px; margin:0 auto;}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-size:28px; height:60px; line-height:60px; padding-top:10px !important; font-weight:bold; color:#000}
        .newTopDday ul li strong {line-height:60px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%; font-size:16px; color:#666; line-height:1.3; }
        .newTopDday ul li:first-child span { font-size:28px; color:#000; }
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%; line-height:60px}
        .newTopDday ul:after {content:""; display:block; clear:both}  

         /* TAB */
        .tab {width:1120px; margin:0 auto; bottom:120px;}		
        .tab li { float:left;}
        .tab a img.off {display:block}
        .tab a img.on {display:none}
        .tab a.active img.off {display:none}
        .tab a.active img.on {display:block;width:265px;height:100px;}
        .tab:after {content:""; display:block; clear:both}

        /*수강신청 체크*/
        .check p {margin-bottom:20px;padding-top:50px;}
        .check p a {display:block; width:525px; height:90px; line-height:90px; margin:0 auto; font-size:30px; color:#fff; background:#6e3550; text-align:center; border-radius:90px;}
        .check p a:hover {color:#8d0033; background:#eee53b;}
        .check label {cursor:pointer;color:#000;font-weight:bold;font-size:15px;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}
        .check a.infotxt:hover {background:#8d0033}   


        /* 이용안내 */
        .wb_info {padding:100px 0;}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:13px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; 
        padding:5px 20px; font-weight:bold; font-size:17px; border-radius:30px}        
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px; font-size:12px}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;} 

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday NG">        
            <div>
                <ul>
                    <li>
                        기술직 PASS - {{$arr_promotion_params['turn']}}기<br />
                        <span class="NGEB">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} 마감!</span>
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
                        남았습니다
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="sky">
            <a href="#apply"> 
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1982_sky01.png" alt="" >
            </a>             
        </div>   

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1982_top.jpg" alt=""  />
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1982_01.jpg" alt="" />
            <div class="tImg">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1982_02_01.gif" alt="" />
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1982_02_02.gif" alt="" />
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1982_02_03.gif" alt="" />
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1982_02.jpg" alt="" />
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1982_03.jpg" alt="" />
            <ul class="tab">
                <li><a href="#tab1"><img src="https://static.willbes.net/public/images/promotion/2020/12/1982_03_tab01_off.png" class="off" alt=""/><img src="https://static.willbes.net/public/images/promotion/2020/12/1982_03_tab01.png" class="on"  /></a></li>
                <li><a href="#tab2"><img src="https://static.willbes.net/public/images/promotion/2020/12/1982_03_tab02_off.png" class="off" alt=""/><img src="https://static.willbes.net/public/images/promotion/2020/12/1982_03_tab02.png" class="on"  /></a></li>
                <li><a href="#tab3"><img src="https://static.willbes.net/public/images/promotion/2020/12/1982_03_tab03_off.png" class="off" alt=""/><img src="https://static.willbes.net/public/images/promotion/2020/12/1982_03_tab03.png" class="on"  /></a></li>
                <li><a href="#tab4"><img src="https://static.willbes.net/public/images/promotion/2020/12/1982_03_tab04_off.png" class="off" alt=""/><img src="https://static.willbes.net/public/images/promotion/2020/12/1982_03_tab04.png" class="on"  /></a></li>
            </ul>
            <div id="tab1">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1982_03_01.jpg" title="" />
            </div>
            <div id="tab2">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1982_03_02.jpg" title="" />
            </div>   
            <div id="tab3">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1982_03_03.jpg" title="" />
            </div>
            <div id="tab4">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1982_03_04.jpg" title="" />
            </div>
        </div>

        <div class="evtCtnsBox wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1982_04.jpg" alt="" />
        </div>

        <div class="evtCtnsBox wb_cts05">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1982_05.jpg" alt="" />
                <ul class="tab" id="apply">
                    <li><a href="#tab1s"><img src="https://static.willbes.net/public/images/promotion/2020/12/1982_05_tab01_off.png" class="off" alt=""/><img src="https://static.willbes.net/public/images/promotion/2020/12/1982_05_tab01.png" class="on"  /></a></li>
                    <li><a href="#tab2s"><img src="https://static.willbes.net/public/images/promotion/2020/12/1982_05_tab02_off.png" class="off" alt=""/><img src="https://static.willbes.net/public/images/promotion/2020/12/1982_05_tab02.png" class="on"  /></a></li>
                    <li><a href="#tab3s"><img src="https://static.willbes.net/public/images/promotion/2020/12/1982_05_tab03_off.png" class="off" alt=""/><img src="https://static.willbes.net/public/images/promotion/2020/12/1982_05_tab03.png" class="on"  /></a></li>
                    <li><a href="#tab4s"><img src="https://static.willbes.net/public/images/promotion/2020/12/1982_05_tab04_off.png" class="off" alt=""/><img src="https://static.willbes.net/public/images/promotion/2020/12/1982_05_tab04.png" class="on"  /></a></li>
                </ul>
                <div id="tab1s">
                    <img src="https://static.willbes.net/public/images/promotion/2020/12/1982_05_01.jpg" title="" />
                    <ul class="radio_apply">
                        <li class="one"><input type="radio" id="y_pkg" name="y_pkg" value="176394" onClick=""/><label for="y_pkg"></label></li>   
                        <li class="two"><input type="radio" id="y_pkg" name="y_pkg" value="176396" onClick=""/><label for="y_pkg"></label></li>
                    </ul>
                </div>
                <div id="tab2s">
                    <img src="https://static.willbes.net/public/images/promotion/2020/12/1982_05_02.jpg" title="" />
                    <ul class="radio_apply">
                        <li class="one"><input type="radio" id="y_pkg" name="y_pkg" value="176411" onClick=""/><label for="y_pkg"></label></li>   
                        <li class="two"><input type="radio" id="y_pkg" name="y_pkg" value="176398" onClick=""/><label for="y_pkg"></label></li>
                    </ul>
                </div>   
                <div id="tab3s">
                    <img src="https://static.willbes.net/public/images/promotion/2020/12/1982_05_03.jpg" title="" />
                    <ul class="radio_apply">
                        <li class="three"><input type="radio" id="y_pkg" name="y_pkg" value="176409" onClick=""/><label for="y_pkg"></label></li>   
                    </ul>
                </div>
                <div id="tab4s">
                    <img src="https://static.willbes.net/public/images/promotion/2020/12/1982_05_04.jpg" title="" />
                    <ul class="radio_apply">
                        <li class="one"><input type="radio" id="y_pkg" name="y_pkg" value="176402" onClick=""/><label for="y_pkg"></label></li>   
                        <li class="two"><input type="radio" id="y_pkg" name="y_pkg" value="176397" onClick=""/><label for="y_pkg"></label></li>
                    </ul>
                </div>
            
            <div class="check" id="chkInfo">               
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#tip" class="infotxt" > 유의사항 자세히보기 ↓</a>
                <p class="NGEB"><a onclick="go_PassLecture(1);" target="_blank">지금 바로 신청하기 ></a></p>     
            </div>      
        </div>

        <div class="evtCtnsBox wb_info" id="tip">
            <div class="guide_box">
                <h2 class="NSK-Black">윌비스 기술직 PASS 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 PASS는 전산직/환경직(공채)/환경직(특채)/산림자원직 대비 과정으로, 참여 교수진의 전 강좌를 배수 제한없이 무제한으로 수강 가능합니다.<br>
                            * 국어 기미진, 영어 한덕현 일부과정 제외
                            </li>
                            <li>2021년 대비로 진행된 신규 개강 강좌를 커리큘럼 진행에 따라 순차적으로 제공해드리는 상품입니다.<br>
                            (해당 과정은 대방고시학원 제휴 과정으로, 국/영/한 교수진과 전공과목 교수진의 커리큘럼이 약간 상이합니다.)
                            </li>
                            <li>참여 교수진의 일정 및 진행 방식은 상이하게 진행될 수 있으며, 각 학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경될 수 있다는 점 숙지 부탁드립니다.<br>
                            (과목별 교수진의 제공 과정은 수강신청 상세안내 화면을 참고해주시기 바랍니다.)                         
                            </li>
                        </ol>
                    </dd>

                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>수강기간은 상품 상세 안내 페이지에 표시된 기간만큼 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</li>
                        </ol>
                    </dd>

                    <dt>수강관련</dt>
                    <dd>
                        <ol>
                            <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                            <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭,원하는 과목/교수님/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                            <li>본 PASS를 이용 중에는 일시 정지 기능을 사용할 수 없습니다.</li>
                            <li>본 PASS 수강 시 이용가능한 기기는 다음과 같이 제한됩니다.<br>
                            - PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)</li>
                            <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.</li>                           
                        </ol>
                    </dd>

                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>본 PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도로 구입 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>환불정책</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
                            <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
                            <li>본 상품은 특별 기획 상품으로, 수강시작일(결제 당일 포함)로부터 7일 경과 후 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감하고 환불됩니다.<br>
                                · 결제금액 - (강좌 정상가의 1일 이용대금×이용일수)
                            </li>
                        </ol>
                    </dd>

                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선/적립금 사용 등 혜택이 적용되지 않습니다.</li>
                            <li>선택한 교수의 강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의가 제공되며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하며, 추가적인 불법 공유 행위 적발 시 형사 고발 조치가 단행될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>라이브모드 수강관련</dt>
                    <dd>
                        <ol>
                            <li>공무원학원 실강 내 LIVE로 진행되는 강좌만 제공됩니다. (* 일부 특강 제외)<br>
                            - 국어 기미진, 영어 한덕현, 한국사 조민주</li>
                            <li>제공되는 강좌 및 진행일정은 우측 버튼 클릭 후 페이지 하단에서 확인 가능합니다.
                            <a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1902" target="_blank">자세히보기 ></a></li>
                            <li>본 상품은 실시간 진행되므로 일시정지/연장/재수강은 제공되지 않습니다. 촬영 및 편집된 강의는 익일 오후 2시 이전까지 업로드됩니다.</li>
                            <li>해당 혜택은 PASS 수강기간 내에만 이용 가능합니다. (* 이전 구매자 소급 적용) </li>
                        </ol>
                    </dd>                
                </dl>
                <div class="inquire">※ 이용 문의 : 윌비스 고객만족센터 1544-5006</div>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script>    

        /*탭*/
        $(document).ready(function(){
        $('.tab').each(function(){
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

        /*수강신청 동의*/ 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            if(code == 1){
                code = $('input[name="y_pkg"]:checked').val();
                if (typeof code == 'undefined' || code == '') {
                    alert('강좌를 선택해 주세요.');
                    return;
                }
            }
            location.href = "{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/') }}" + code;
        }

        /* 팝업창 */ 
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop