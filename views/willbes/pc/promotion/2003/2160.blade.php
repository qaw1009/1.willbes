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

        .sky {position:fixed; top:250px; right:10px; z-index:1;}
        .sky a {display:block; margin-bottom:10px;}
 
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/10/2160_top_bg.jpg) no-repeat center top;}
        .wb_top .tImg {position:absolute;left:50%;top:71.5%;margin-left:-220px;}
        .wb_top .tImg img {width:440px;height:240px;}

        .wb_cts01 {background:#f7f6fa;padding-bottom:150px;}  
        .wb_cts01 .tImg img {margin:0 5px 10px}

        .wb_cts02 {background:#f2f0f1;padding-bottom:150px;}      
        .wb_cts02 .txtBtn {background:#444; color:#fff; padding:10px 20px; display:inline-block} 
        .wb_cts02 .txtBtn:hover {background:#000}

        .wb_cts03 {background:#854797;padding-bottom:100px;}
        .check {width:980px; margin:0 auto; padding:20px 0px 20px 10px; letter-spacing:3; color:#fff; z-index:5}
        .check label {cursor:pointer; font-size:15px;color:#FFF;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#2d2d2d; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
        .check a:hover {background:#000}

        /*타이머*/
        .time {width:800px; margin:0 auto; text-align:center; padding:20px 0}
        .time ul {width:100%;}
        .time ul:after {content:''; display:block; clear:both}
        .time li {display:inline; float:left; line-height:61px; font-size:24px; margin-right:10px}
        .time li:first-child {margin-left:80px}
        .time li img {width:44px}
        .time .time_txt {color:#000; letter-spacing:-1px}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .d_day {color:#fff;font-size:30px;} 

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
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1531" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/11/2160_sky.png"  title="9급 문풀 pass" /></a>
            <a href="#event02"><img src="https://static.willbes.net/public/images/promotion/2022/01/2160_sky01.png"  title="재도전" /></a>
            <a href="#event02"><img src="https://static.willbes.net/public/images/promotion/2022/01/2160_sky02.png"  title="환승" /></a>
        </div>

        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2160_top.jpg" alt="9급 패스"  />
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2160_01.jpg" alt="년도별 출원인원"  data-aos="fade-up"/>
            <div class="tImg"  data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2160_t01.gif" alt="국어 오대혁" />
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2160_t02.gif" alt="영어 한덕현" /><br>
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2160_t04.gif" alt="행정학 김철" />
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2160_t05.gif" alt="행정법 신기훈" />
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2160_t06.gif" alt="행정학 김덕관" />
            </div>
        </div>

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up" id="event02">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2160_02.jpg" alt="교수진 및 커리큘럼" />    
                <a href="javascript:certOpen();" title="타 사이트 수강 인증하기" style="position: absolute; left: 29.64%; top: 89.97%; width: 40.09%; height: 6.83%; z-index: 2;"></a>                  
            </div>   
            <a href="#careful" class="txtBtn">유의사항 확인하기 →</a>   
        </div>

        <div class="evtCtnsBox wb_cts03" id="transfer" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2160_03.jpg" alt="환승 이벤트" />        
            <div class="time NSK-Black" id="newTopDday">
                <ul>
                    <li><span class=d_day>D-DAY</li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">일</li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>             
                </ul>
            </div>         
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2160_03_01.jpg" alt="환승 이벤트" />
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1531" target="_blank" title="신청하기" style="position: absolute; left: 28.66%; top: 71.15%; width: 15.36%; height: 16.89%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('180927');" title="수강 신청하기" style="position: absolute; left: 71.61%; top: 71.15%; width: 15.36%; height: 16.89%; z-index: 2;"></a>                
            </div>
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 윌비스 9급 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>
        </div>

        <div class="evtCtnsBox wb_info" id="careful" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">윌비스 9급 PASS 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 PASS는 9급 일반행정직 대비 과정으로, 참여 교수진의 전 강좌를 배수 제한 없이 무제한으로 수강 가능합니다.<br>
                                *국어 기미진 [새벽실전모의고사] 제외, 영어 한덕현 [기본문법>제니스문법>기출리뷰>스나이퍼32>실전동형모의고사] 과정만 제공. </li>
                            <li>수강 가능 교수진 : 국어 오대혁/기미진, 영어 한덕현, 한국사 김상범/오태진/조민주, 행정법 신기훈/황남기/이석준, 행정학 김덕관/김철<br>
                                *국어 기미진, 한국사 조민주, 행정법 이석준 교수의 경우 9급 일반행정직 신규 과정 진행하지 않으므로 기존 과정만 제공됩니다.</li>
                            <li>2020년 7월부터 진행된 2021년 대비 전 과정 및 2022년 대비로 진행되는 신규 개강 강좌를 커리큘럼 진행에 따라 순차적으로 제공해드리는 상품입니다.<br>
                            (일부 교수진의 경우, 신규 과정이 업데이트 되지 않을 수 있으며 해당 경우에는 이전 연도 과정을 제공해드립니다.)</li>
                            <li>참여 교수진의 일정 및 진행 방식은 상이하게 진행될 수 있으며, 학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경될 수 있다는 점 숙지 부탁드립니다.<br>
                            (과목별 교수진의 제공 과정은 수강신청 상세안내 화면을 참고해주시기 바랍니다.)</li>
                            <li>이벤트 해당 상품 (전과목PASS) 구매 시  지급되는 추가 포인트의 경우, 교재 구매 시 사용할 수 있으며 결제완료 후 익일 담당자 확인 후에 지급해드릴 예정입니다.</li>
                        </ol>
                    </dd>

                    <dt>수강기간</dt>
                    <dd>
                        <ol>
                            <li>수강기간은 상품 상세 안내 페이지에 표시된 기간만큼 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</li>
                            <li>수강관련<br>
                                - 먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.<br>
                                - 구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭,원하는 과목/교수님/강좌를 선택 등록 후 수강할 수 있습니다.<br>
                                - 본 PASS를 이용 중에는 일시정지/수강연장/재수강 기능을 사용할 수 없습니다.</li>
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
                            - 국어 오대혁, 영어 한덕현, 한국사 김상범, 행정법 신기훈, 행정학 김덕관/김철</li>
                            <li>제공되는 강좌 및 진행일정은 우측 버튼 클릭 후 페이지 하단에서 확인 가능합니다.
                            <a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1902" target="_blank">자세히보기 ></a></li>
                            <li>본 상품은 실시간 진행되므로 일시정지/연장/재수강은 제공되지 않습니다. 촬영 및 편집된 강의는 익일 오후 2시 이전까지 업로드됩니다.</li>
                            <li>해당 혜택은 PASS 수강기간 내에만 이용 가능합니다. (* 이전 구매자 소급 적용) </li>
                        </ol>
                    </dd>  
                    
                    <dt>재도전&amp;환승 인증 이벤트 유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 이벤트는 1아이디당 1회만 참여 가능합니다.</li>
                            <li>인증 완료 처리는 신청 후, 24시간 이내에 처리됩니다. 단, 주말 및 공휴일 인증 건의 경우 평일 오전 중으로 처리됩니다.</li>
                            <li>1) 재도전 인증<br>
                                - 본인의 이름이 명시된 수험표 또는 윌비스 PASS 수강생의 경우 [내강의실] 페이지 내 이름과 PASS명이 명시된 이미지 캡쳐 후 업로드 시 인증 가능합니다.<br>
                                2) 환승 인증<br>
                                - 본인의 이름, 수강내역, 결제내역 등이 명확하게 기재된 수강증 등의 캡쳐를 통해서만 인증이 가능합니다.<br>
                                (결제내역을 통한 인증 시, 수강자 이름과 결제 금액, 강좌명이 필수로 기재되어 있어야 합니다.)
                            </li>
                            <li>본 이벤트는 이벤트 참여자가 본인의 명의로 구매/응시한 내용에 한합니다.</li>
                            <li>등록 인증 정보는 이벤트 목적 외 용도로 사용되지 않습니다.</li>
                            <li>발급된 쿠폰의 사용 기간은 3일로, 본 페이지 내에서 판매 중인 PASS 상품에만 적용 가능합니다.</li>
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

        /*수강신청 동의*/ 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
            location.href = url;
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