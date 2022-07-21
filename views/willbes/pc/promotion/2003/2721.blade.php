@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed; top:200px; right:10px; z-index:1;}
        .sky a {display:block; margin-bottom:10px;}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/07/2721_top_bg.jpg) no-repeat center top; height: 962px;}
        .wb_top span {position:absolute; left:50%}
        .wb_top .img01 {position:absolute; width:1461px; margin-left:-700px; z-index: 1;}
        .wb_top .img02 {position:absolute; width:723px; top:300px; margin-left:-361px; z-index: 2;}
  
        .wb_cts01 {padding-top:100px}

        .wb_cts02 {width:1120px; margin:0 auto}
        .tabs {width:980px; margin:0 auto; display:flex; justify-content: space-between;}
		.tabs a {display:block;}
        .tabs img.on {display:none}
        .tabs img.off {display:block}
        .tabs a.active img.on {display:block}
        .tabs a.active img.off {display:none}
        .tabCts {position:relative; height: 877px;}
        .tabCts:nth-child(1) {background:url(https://static.willbes.net/public/images/promotion/2022/07/2721_02_tab01_img.jpg) no-repeat center top; }
        .tabCts:nth-child(2) {background:url(https://static.willbes.net/public/images/promotion/2022/07/2721_02_tab02_img.jpg) no-repeat center top; }
        .tabCts:nth-child(3) {background:url(https://static.willbes.net/public/images/promotion/2022/07/2721_02_tab03_img.jpg) no-repeat center top; }
        .tabCts iframe {position:absolute; top:435px; left:50%; margin-left:-50px; width:512px; height:288px; background:#000}

        .wb_cts03 {background:#f2f2f2}

        .wb_cts04 {background:#4d62df; position: relative;padding-bottom:100px}

        .check {width:980px; margin:0 auto; padding:20px 0px 20px 10px; letter-spacing:3; color:#fff; z-index:5}
        .check label {cursor:pointer; font-size:15px;color:#FFF;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#2d2d2d; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}


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


    <div class="evtContent NSK" id="evtContainer">
        
        <div class="sky" id="QuickMenu">
            <a href="https://pass.willbes.net/promotion/index/cate/3024/code/1655" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/11/2099_sky.png"  title="군무원 문풀 pass" /></a>
        </div>
        
        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">        
            <div>
                <ul>
                    <li>
                        군무원 PASS - {{$arr_promotion_params['turn']}}기<br />
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
                        남았습니다.
                    </li>
                </ul>
            </div>
        </div>    

        <div class="evtCtnsBox wb_top">
            <span class="img02" data-aos-offset="300" data-aos="zoom-in"><img src="https://static.willbes.net/public/images/promotion/2022/07/2721_top02.png" alt="군무원 패스"/></span>
            <span class="img01" data-aos="fade-down"><img src="https://static.willbes.net/public/images/promotion/2022/07/2721_top01.png" alt="군무원 패스"/></span>
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2721_01.jpg" alt="혜택" />
        </div>

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2721_02.jpg" alt="직렬별 교수진" />
            <div class="tabs">
                <a href="#tab01" class="active">
                    <img src="https://static.willbes.net/public/images/promotion/2022/07/2721_02_tab01.jpg" alt="오대혁" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2022/07/2721_02_tab01_on.jpg" alt="오대혁" class="on"/>
                </a>
                <a href="#tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2022/07/2721_02_tab02.jpg" alt="김철" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2022/07/2721_02_tab02_on.jpg" alt="김철" class="on"/>
                </a>
                <a href="#tab03">
                    <img src="https://static.willbes.net/public/images/promotion/2022/07/2721_02_tab03.jpg" alt="임병주" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2022/07/2721_02_tab03_on.jpg" alt="임병주" class="on"/>
                </a>
            </div>
            <div >
                <div id="tab01" class="tabCts">
                    <iframe src="https://www.youtube.com/embed/r8sOeBFLW10" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div id="tab02" class="tabCts">
                    <iframe width="512" height="288" src="https://www.youtube.com/embed/hXd1wL6nURY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div id="tab03" class="tabCts">
                    {{--<iframe width="512" height="288" src="https://www.youtube.com/embed/r8sOeBFLW10" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2721_03.jpg" alt="혜택" />
        </div>

        <div class="evtCtnsBox wb_cts04" id="apply" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/07/2721_04.jpg" alt="수강신청"/>    
                <a href="javascript:go_PassLecture('179756');" style="position: absolute; left: 50.71%; top: 79.63%; width: 20.63%; height: 9.03%; z-index: 2;"></a>
            </div>    
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>
        </div>

        <div class="evtCtnsBox wb_info" id="careful" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">윌비스 군무원PASS 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 PASS는 군무원 행정직 9급 대비 과정으로, 참여 교수진의 2022~2023 대비 전 강좌를 배수 제한 없이 무제한으로 수강 가능합니다.<br>
                            - 국어 오대혁, 행정학 김철/김덕관, 행정법 임병주/신기훈<br>
                                (행정학 김덕관, 행정법 신기훈 교수의 강의는 2022 대비 과정만 제공합니다.)</li>
                            <li>2022년 7월부터 진행된 2022년 대비 전 과정 및 2023년 대비로 진행되는 신규 개강 강좌를 커리큘럼 진행에 따라 순차적으로 제공해드리는 상품입니다.<br>
                            (일부 교수진의 경우, 신규 과정이 업데이트 되지 않을 수 있으며 해당 경우에는 이전 연도 과정을 제공해드립니다.)
                            </li>
                            <li>참여 교수진의 일정 및 진행 방식은 상이하게 진행될 수 있으며, 학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경될 수 있다는 점 숙지 부탁드립니다.<br>
                            (과목별 교수진의 제공 과정은 수강신청 상세안내 화면을 참고해주시기 바랍니다.)</li>
                            <li>이벤트 해당 상품 (전과목PASS) 구매 시  지급되는 추가 포인트의 경우, 교재 구매 시 사용할 수 있으며 결제완료 후 익일 담당자 확인 후에 지급해드릴 예정입니다.</li>
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
                                · 결제금액 - (강좌 정상가의 1일 이용대금*이용일수)<br>
                                * 수강지원 포인트 포함 상품 환불 시 포인트를 미사용한 경우는 회수 후 환불 처리하오나, 포인트를 사용하였다면 사용분만큼 결제금액에서 차감 후 환불됩니다.
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
                            - 국어 오대혁, 영어 한덕현, 한국사 김상범
                            </li>
                            <li>제공되는 강좌 및 진행일정은 우측 버튼 클릭 후 페이지 하단에서 확인 가능합니다.
                            <a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1902" target="_blank">자세히보기 ></a></li>
                            <li>본 상품은 실시간 진행되므로 일시정지/연장/재수강은 제공되지 않습니다. 촬영 및 편집된 강의는 익일 오후 2시 이전까지 업로드됩니다.</li>
                            <li>해당 혜택은 PASS 수강기간 내에만 이용 가능합니다.</li>
                        </ol>
                    </dd>                
                </dl>
                <div class="inquire">※ 이용 문의 : 윌비스 고객만족센터 1544-5006</div>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $( document ).ready( function() {
        AOS.init();
    } );
    </script>

    <script>    
        var tab1_url = "https://www.youtube.com/embed/r8sOeBFLW10";
        var tab2_url = "https://www.youtube.com/embed/hXd1wL6nURY";        
        var tab3_url = "https://www.youtube.com/embed/VEmBnYu8tcc";
        $(function() {
        $(".tabCts").hide(); 
        $(".tabCts:first").show();
        $(".tabs a").click(function(){ 
                var activeTab = $(this).attr("href"); 
                var html_str = "";
                if(activeTab == "#tab01"){
                    html_str = "<iframe src='"+tab1_url+"' frameborder='0' allowfullscreen></iframe>";
                }else if(activeTab == "#tab02"){
                    html_str = "<iframe src='"+tab2_url+"' frameborder='0' allowfullscreen></iframe>";
                }else if(activeTab == "#tab03"){
                    html_str = "";                   
                }
                $(".tabs a").removeClass("active"); 
                $(this).addClass("active"); 
                $(".tabCts").hide(); 
                $(".tabCts").html(''); 
                $(activeTab).html(html_str);
                $(activeTab).fadeIn(); 
                return false; 
                });
            });	

        /*수강신청 동의*/ 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }    
        
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop