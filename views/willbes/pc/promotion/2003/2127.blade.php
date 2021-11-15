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
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/

        .sky {position:fixed; top:250px; right:10px; width:230px; z-index:1;}
        .sky a {display:block; margin-bottom:25px;}
 
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/11/2127_top_bg.jpg) no-repeat center top;}  
        .wb_top span {position:absolute; top:440px; left:50%; margin-left:-470px; z-index: 10;}

        .wb_cts02 {background:#f0514d}

        .wb_cts03 {background:#f2f0f1}

        .tabs {width:1120px; margin:0 auto}         
        .tabs li {display:inline; float:left;padding-right:25px;}
        .tabs li a {display:block;}
        .tabs li a img.off {display:block}
        .tabs li a img.on {display:none}
        .tabs li a:hover img.off,
        .tabs li a.active img.off {display:none}
        .tabs li a:hover img.on,
        .tabs li a.active img.on {display:block}
        .tabs ul:after {content:""; display:blockl; clear:both}	 

        .tab_cts {background:#e82e21;padding:100px 0;}

        /*수강신청 체크*/
        .check {position:absolute; width:1120px; bottom:60px; z-index: 100; left:50%; margin-left:-560px}
        .check p {margin-bottom:50px;padding-top:75px;}
        .check p a {display:block; width:525px; height:90px; line-height:90px; margin:0 auto; font-size:30px; color:#fff; background:#163C57; text-align:center; border-radius:90px;}
        .check p a:hover {color:#8d0033; background:#eee53b;}
        .check label {cursor:pointer;color:#585858;font-weight:bold;font-size:15px;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#504f4f; background:#ededed; margin-left:50px; border-radius:20px;font-size:15px;font-weight:bold;}

        .wb_cts05 {background:#FFC40E}

        .wb_cts06 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2127_06_bg.jpg) no-repeat center top;}  

        .wb_cts07 {background:#f2f0f1; padding-top:100px}

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
        .wb_info {padding:100px 0; background:#f4f4f4}
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
                        소방 PASS - {{$arr_promotion_params['turn']}}기<br />
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

        <div class="sky" id="QuickMenu">
            <a href="#transfer"><img src="https://static.willbes.net/public/images/promotion/2021/04/2127_sky01.png"  title="인증하고 할인받기" /></a>
            <a href="#transfer"><img src="https://static.willbes.net/public/images/promotion/2021/04/2127_sky02.png"  title="갈아타고 할일받기" /></a>
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2127_top.jpg" alt="소방 패스"  />
            <span data-aos="fade-right"><a href="#lecBuy"><img src="https://static.willbes.net/public/images/promotion/2021/11/2127_top_btn.png" alt="신청하기"/></a></span>
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2127_01.jpg" alt="왜 윌비스 소방 패스를 선택?" />          
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2127_02.jpg" alt="소방전문과목과 행정법" />          
        </div>

        <div class="evtCtnsBox wb_cts03" id="transfer">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2127_03.jpg" alt="합격 라인업" />
                <a href="javascript:certOpen();" title="인증하기" style="position: absolute; left: 29.64%; top: 80.24%; width: 40.09%; height: 5.71%; z-index: 2;"></a>
                <a href="#careful" title="유의사항" style="position: absolute; left: 41.34%; top: 86.78%; width: 14.64%; height: 3.84%; z-index: 2;"></a>
            </div>    
        </div>

        <div class="evtCtnsBox wb_cts04" id="lecBuy">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2127_04.jpg" alt="환승 이벤트" />
                <a href="javascript:go_PassLecture('180408');" target="_blank" title="공채" style="position: absolute; left: 27.5%; top: 74.1%; width: 17.95%; height: 6.78%; z-index: 2;"></a>
                <a href="javascript:go_PassLecture('180413');" target="_blank" title="특채" style="position: absolute; left: 71.16%; top: 74.1%; width: 17.95%; height: 6.78%; z-index: 2;"></a>
            </div>
            <div class="check" id="chkInfo">               
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful" class="infotxt" > 유의사항 자세히보기 ↓</a>
            </div> 
        </div>

        {{--
        <div class="evtCtnsBox wb_cts04">
            <ul class="tabs">
                <li>
                    <a href="#tab01">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_04_01_off.png" title="" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_04_01_on.png" title="" class="on"/> 
                    </a>
                </li>
                <li>
                    <a href="#tab02">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_04_02_off.png" title="" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_04_02_on.png" title="" class="on"/> 
                    </a>
                </li>
                <li>
                    <a href="#tab03">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_04_03_off.png" title="" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_04_03_on.png" title="" class="on"/> 
                    </a>
                </li>
                <li>
                    <a href="#tab04">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_04_04_off.png" title="" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_04_04_on.png" title="" class="on"/> 
                    </a>
                </li>
                <li>
                    <a href="#tab05">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_04_05_off.png" title="" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_04_05_on.png" title="" class="on"/> 
                    </a>
                </li>
                <li>
                    <a href="#tab06">
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_04_06_off.png" title="" class="off"/> 
                        <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_04_06_on.png" title="" class="on"/> 
                    </a>
                </li>
            </ul>
        </div>        

        <div class="tab_cts">   
            <div class="evtCtnsBox" id="tab01">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_04_01.png" title="이종오 교수" usemap="#2127_04_01"  border="0" />
                <map name="2127_04_01" id="2127_04_01">
                    <area shape="rect" coords="422,208,532,245" href="https://pass.willbes.net/professor/show/cate/3023/prof-idx/51068?subject_idx=1113&subject_name=%EC%86%8C%EB%B0%A9%ED%95%99%EA%B0%9C%EB%A1%A0" target="_blank" />
                </map>
            </div>

            <div class="evtCtnsBox" id="tab02">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_04_02.png" title="김종상 교수" usemap="#2127_04_02"  border="0" />
                <map name="2127_04_02" id="2127_04_02">
                    <area shape="rect" coords="422,208,532,245" href="https://pass.willbes.net/professor/show/cate/3023/prof-idx/50465?subject_idx=1113&subject_name=%EC%86%8C%EB%B0%A9%ED%95%99%EA%B0%9C%EB%A1%A0" target="_blank" />
                </map>
            </div>

            <div class="evtCtnsBox" id="tab03">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_04_03.png" title="이아림 교수" usemap="#2127_04_03"  border="0" />
                <map name="2127_04_03" id="2127_04_03">
                    <area shape="rect" coords="290,207,400,244" href="https://pass.willbes.net/professor/show/cate/3023/prof-idx/50309?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4" target="_blank" />
                </map>
            </div>

            <div class="evtCtnsBox" id="tab04">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_04_04.png" title="양익 교수" usemap="#2127_04_04"  border="0" />
                <map name="2127_04_04" id="2127_04_04">
                    <area shape="rect" coords="290,207,400,244" href="https://pass.willbes.net/professor/show/cate/3023/prof-idx/50071?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4" target="_blank" />
                </map>
            </div>

            <div class="evtCtnsBox" id="tab05">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_04_05.png" title="한경준 교수" usemap="#2127_04_05"  border="0" />
                <map name="2127_04_05" id="2127_04_05">
                    <area shape="rect" coords="290,207,400,244" href="https://pass.willbes.net/professor/show/cate/3023/prof-idx/50305?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC" target="_blank" />
                </map>
            </div>

            <div class="evtCtnsBox" id="tab06">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_04_06.png" title="이석준 교수" usemap="#2127_04_06"  border="0" />
                <map name="2127_04_06" id="2127_04_06">
                    <area shape="rect" coords="290,207,400,244" href="https://pass.willbes.net/professor/show/cate/3023/prof-idx/50615/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95" target="_blank" />
                </map>
            </div>
        </div>  

        <div class="evtCtnsBox wb_cts05">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_05.jpg" alt="소방 전용 커리큘럼" />          
        </div>

        <div class="evtCtnsBox wb_cts06">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2127_06.jpg" alt="q&a" />          
        </div>               

        <div class="evtCtnsBox wb_cts08">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2127_08.jpg" alt="수강신청" usemap="#2127b" border="0" />
            <map name="2127b" id="2127b">
                <area shape="rect" coords="316,1006,501,1083" href="" alt="수강신청" />
                <area shape="rect" coords="806,1007,991,1083" href="" alt="수강신청" />
            </map>        
        </div>
        --}} 

        <div class="evtCtnsBox wb_info" id="careful">
            <div class="guide_box">
                <h2 class="NSK-Black">윌비스 소방직 PASS 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 PASS는 소방직 대비 과정으로, 참여 교수진의 전 강좌를 배수 제한없이 무제한으로 수강 가능합니다.<br>
                            · 공채 : 영어 이아림, 한국사 한경준, 소방학/소방관계법규 : 이종오/김종상, 행정법 : 이석준<br>
                            · 특채 (구조/구급&관련학과) : 국어 김세령, 생활영어 양익, 소방학/소방관계법규 : 이종오, 김종상
                            </li>                         
                            <li>2021~2022년 대비로 진행된 신규 개강 강좌를 커리큘럼 진행에 따라 순차적으로 제공해드리는 상품입니다.<br>
                            (*국어 김세령 교수의 경우, 2022 대비 신규강의 업데이트 되지 않습니다.)
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

                    <dt>라이브모드 수강관련</dt>
                    <dd>
                        <ol>
                            <li>공무원학원 실강 내 LIVE로 진행되는 강좌만 제공됩니다. (*일부 특강 제외)<br>
                            - 영어 [공채] 이아림/[특채] 양익, 한국사 한경준, 소방학/소방관계법규 이종오, 행정법 이석준
                            </li>
                            <li>제공되는 강좌 및 진행일정은 우측 버튼 클릭 후 페이지 하단에서 확인 가능합니다.
                            <a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1902" target="_blank">자세히보기 ></a></li>
                            <li>본 상품은 실시간 진행되므로 일시정지/연장/재수강은 제공되지 않습니다. 촬영 및 편집된 강의는 익일 오후 2시 이전까지 업로드됩니다.</li>
                            <li>해당 혜택은 PASS 수강기간 내에만 이용 가능합니다.</li>
                        </ol>
                    </dd>    

                </dl>

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
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params["page"]) === false && empty($arr_promotion_params["cert"]) === false)
                var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });


        /*tab*/
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
        ) 

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop