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
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

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
 
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/01/2502_top_bg.jpg) no-repeat center top;}

        /*교수 롤링*/
        .section_pro {
        background:url(https://static.willbes.net/public/images/promotion/2022/01/2502_02_bg.jpg) no-repeat center top; 
                   position:relative;height:919px;clear:both;}      
        .section_pro .box_pro {position:absolute; top:380px; left:0; width:100%; z-index:1}
        .section_pro .box_pro .bx-wrapper{max-width:100% !important;}
        .section_pro .box_pro li {display:inline; float:left; height: 380px;}
        .section_pro .box_pro li img {
        width: 310px;
        height: 380px;
        -webkit-box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
        -moz-box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
        box-shadow: 10px 10px 50px 1px rgba(0,0,0,0.31);
        }

        .wb_cts03 {background:#F9F9F9}

        .wb_cts04 {padding-bottom:100px;}      
        .wb_cts04 .txtBtn {background:#444; color:#fff; padding:10px 20px; display:inline-block} 
        .wb_cts04 .txtBtn:hover {background:#000}
        
        .wb_cts05 {background:#43aaf8; padding-bottom:100px}
        .wb_cts05 .passlec {display:flex; width:1120px; margin:auto; justify-content: space-between; flex-wrap: wrap;}
        .wb_cts05 .passlec div {width:255px;position:relative; margin-bottom:20px}
        .wb_cts05 .passlec div label {display:block; width:255px; height:473px; font-size:0; cursor: pointer;}
        .wb_cts05 .passlec div:nth-child(1) label {background-image:url(https://static.willbes.net/public/images/promotion/2022/01/2502_apply1.png)}
        .wb_cts05 .passlec div:nth-child(2) label {background-image:url(https://static.willbes.net/public/images/promotion/2022/01/2502_apply2.png)}
        .wb_cts05 .passlec div:nth-child(3) label {background-image:url(https://static.willbes.net/public/images/promotion/2022/01/2502_apply3.png)}
        .wb_cts05 .passlec div:nth-child(4) label {background-image:url(https://static.willbes.net/public/images/promotion/2022/01/2502_apply4.png)}
        .wb_cts05 .passlec div:nth-child(5) label {background-image:url(https://static.willbes.net/public/images/promotion/2022/01/2502_apply5.png)}
        .wb_cts05 .passlec div:nth-child(6) label {background-image:url(https://static.willbes.net/public/images/promotion/2022/01/2502_apply6.png)}
        .wb_cts05 .passlec div:nth-child(7) label {background-image:url(https://static.willbes.net/public/images/promotion/2022/01/2502_apply7.png)}
        .wb_cts05 .passlec div:nth-child(8) label {background-image:url(https://static.willbes.net/public/images/promotion/2022/01/2502_apply8.png)}

        .wb_cts05 .passlec input[type="radio"] {height:26px; width:26px; position:absolute; top:20px; left:20px; visibility: hidden;}
        .wb_cts05 .passlec input:checked + label {background-position:right top}

        /*수강신청 체크*/
        .check { width:930px; margin:30px auto 50px;}
        .check p {margin-bottom:50px;padding-top:75px;}
        .check p a {display:block; width:525px; height:90px; line-height:90px; margin:0 auto; font-size:30px; color:#fff; background:#163C57; text-align:center; border-radius:90px;}
        .check p a:hover {color:#8d0033; background:#eee53b;}
        .check label {cursor:pointer;color:#fff;font-weight:bold;font-size:15px;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#1c2127; margin-left:50px; border-radius:20px;font-size:15px;font-weight:bold;}
        .wb_cts05 .passbuy a {display:block; width:400px; margin:0 auto; background:#1c2127; color:#fff; font-size:30px; border-radius:50px; padding:20px 0; font-weight:bold}  
        .wb_cts05 .passbuy a:hover {background:#fff; color:#1c2127;}

        /* 이용안내 */
        .wb_info {padding:100px 0;}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:13px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; 
        padding:5px 20px; font-weight:bold; font-size:17px; border-radius:30px;font-size:15px;}        
        .guide_box dd{color:#777; margin:0 0 20px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:none; margin-left:20px;}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px; font-size:12px}

    </style>


    <div class="evtContent NSK" id="evtContainer">

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday NG">        
            <div>
                <ul>
                    <li>
                    9급 PASS - {{$arr_promotion_params['turn']}}기<br />
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

        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2502_top.jpg" alt="윌비스 9급 패스"  />
                <a href="#lec_buy2022" title="22패스 구매하기" style="position: absolute;left: 4.91%;top: 82.61%;width: 34.78%;height: 8.31%;z-index: 2;"></a>
                <a href="#lec_buy2023" title="22~23패스 구매하기" style="position: absolute;left: 41.23%;top: 82.61%;width: 34.78%;height: 8.31%;z-index: 2;"></a>
            </div>     
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2502_01.jpg" alt="꼭 필요한 혜택"  />    
        </div>

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <div class="section_pro">                
                <div class="box_pro">
                    <ul class="slide_pro">
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/01/2502_pro1.png" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/01/2502_pro2.png" alt=""/></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/01/2502_pro3.png" alt=""/></li>  
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/01/2502_pro4.png" alt=""/></li>  
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/01/2502_pro5.png" alt=""/></li>  
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/01/2502_pro6.png" alt=""/></li>  
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/01/2502_pro7.png" alt=""/></li>  
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/01/2502_pro8.png" alt=""/></li>                    
                    </ul>
                </div>  
            </div>
        </div>

        <div class="evtCtnsBox wb_cts03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2502_03.jpg" alt="커리큘럼"  />    
        </div>

        <div class="evtCtnsBox wb_cts04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2502_04.jpg" alt="재도전&환승 이벤트" />    
                <a href="javascript:certOpen();" title="타 사이트 수강 인증하기" style="position: absolute; left: 29.64%; top: 89.97%; width: 40.09%; height: 6.83%; z-index: 2;"></a>                  
            </div>   
            <a href="#careful" class="txtBtn">유의사항 확인하기 →</a>   
        </div>

        <div class="evtCtnsBox wb_cts05" id="lecBuy" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2502_05.jpg" alt="수강신청" />
            <div class="passlec">
                <div id="lecBuy2022">
                    <input type="radio" name="y_pkg" id="pass01" value="180927"><label for="pass01">2022 행정직pass</label>
                </div>
                <div>
                    <input type="radio" name="y_pkg" id="pass02" value="176432"><label for="pass02">2022 세무직pass</label>
                </div>
                <div>
                    <input type="radio" name="y_pkg" id="pass03" value="190148"><label for="pass03">2022 교육행정직pass</label>
                </div>
                <div>
                    <input type="radio" name="y_pkg" id="pass04" value="190149"><label for="pass04">2022 사회복지직pass</label>
                </div>
                <div id="lecBuy2023">
                    <input type="radio" name="y_pkg" id="pass05" value="189930"><label for="pass05">2022~2023 행정직pass</label>
                </div>
                <div>
                    <input type="radio" name="y_pkg" id="pass06" value="189939"><label for="pass06">2022~2023 세무직pass</label>
                </div>
                <div>
                    <input type="radio" name="y_pkg" id="pass07" value="190056"><label for="pass07">2022~2023 교육행정직pass</label>
                </div>
                <div>
                    <input type="radio" name="y_pkg" id="pass08" value="190055"><label for="pass08">2022~2023 사회복지직pass</label>
                </div>
            </div>
            <div class="check" id="chkInfo">
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful" class="infotxt" > 이용안내 확인하기 ↓</a>
            </div> 
            <div class="passbuy">
                <a href="javascript:void(0);" onclick="javascript:go_PassLecture(); return false;">지금 바로 신청하기 ></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_info" id="careful" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">상품 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ul>
                            <li>- 2022 대비 상품의 경우 2021~2022 대비 진행 강의 제공,  2022~2023 대비 상품의 경우 2022~2023 대비 진행 강의 제공</li>
                            <li>- 수강 가능 교수진<br>
                            · 행정직 : 국어 오대혁, 영어 한덕현, 한국사 김상범, 행정법 신기훈, 행정학 김덕관/김철<br>
                            · 세무직 : 국어 오대혁, 영어 한덕현, 한국사 김상범, 회계학 이윤호, 세법 박창한<br>
                            · 교육행정직 : 국어 오대혁, 영어 한덕현, 한국사 김상범, 행정법 신기훈, 교육학 손영민<br>
                            · 사회복지직 : 국어 오대혁, 영어 한덕현, 한국사 김상범, 행정법 신기훈, 사회복지학 정형윤<br>
                            (*영어 한덕현 교수의 경우, [기본문법>제니스문법>기출리뷰>스나이퍼32>실전동형모의고사] 과정만 제공.)<br>
                            (* 교수진별 커리큘럼 진행은 상이할 수 있으며 학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경될 수 있습니다.<br>신규 과정이 진행되지 않는 경우에는 이전 연도 과정을 대체 제공 해드립니다.)
                            </li>
                            <li>- 수강기간<br>
                            · 2022 대비 PASS : 2022년 6월 30일까지<br>
                            · 2022~2023 대비 PASS : 2023년 4월 30일까지
                            </li>
                        </ul>
                    </dd>

                    <dt>수강 관련</dt>
                    <dd>
                        <ul>
                            <li>- [내강의실] – [무한PASS존] – 상품명 옆의 [강좌추가] 버튼 클릭, 원하는 과목/교수/강좌 선택 등록 후 수강</li>
                            <li>- 기기 제한 : PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)</li>
                            <li>- 본 상품은 특별 기획/할인 상품이므로 일시정지/수강연장/재수강 불가</li>
                        </ul>
                    </dd>

                    <dt>노량진 LIVE모드</dt>
                    <dd>
                        <ul>
                            <li>공무원학원 실강 중 LIVE로 진행되는 강좌만 제공 (*일부 특강 제외)                        
                                <a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1902" target="_blank">자세히보기 ></a><br>
                                · 국어 오대혁, 영어 한덕현, 한국사 김상범, 행정법 신기훈, 행정학 김덕관/김철</li>
                            </li>                       
                        </ul>
                    </dd>  

                    <dt>교재관련</dt>
                    <dd>
                        <ul>
                            <li>- 교재 별도 구매 ([강좌 소개] 및 [교재구매] 메뉴 이용)</li>
                            <li>- PASS 구매 시 지급되는 수강지원 포인트 3만점은 교재 구매 시 사용 가능 (수강기간 내에만 유효)</li>
                        </ul>
                    </dd>

                    <dt>유의사항</dt>
                    <dd>
                        <ul>
                            <li>- 선택한 교수의 강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의가 제공되며, 이로 인한 환불은 불가합니다.</li>
                            <li>- 아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하며, 추가적인 불법 공유 행위 적발 시 형사 고발 조치가 단행될 수 있습니다.</li>
                        </ul>
                    </dd>

                    <dt>재도전/환승 인증</dt>
                    <dd>
                        <ul>
                            <li>- 1아이디당 1회만 참여 가능.</li>
                            <li>- 인증 완료 처리는 신청 후, 24시간 이내에 처리. 단, 주말 및 공휴일 인증 건의 경우 평일 오전 중 처리.</li>
                            <li>- 1) 재도전 인증<br> · 본인의 이름이 명시된 수험표 또는 윌비스 PASS 수강생의 경우 [내강의실] 페이지 내 이름과 PASS명이 명시된 이미지 캡쳐 후 업로드 시 인증 가능<br>
                                  2) 환승 인증<br> · 본인의 이름, 수강내역, 결제내역 등이 명확하게 기재된 수강증 등의 캡쳐를 통해서만 인증 가능<br> (결제내역을 통한 인증 시, 수강자 이름과 결제 금액, 강좌명 필수)
                            </li>
                            <li>- 본 이벤트는 이벤트 참여자가 본인의 명의로 구매/응시한 내용에 한합니다.</li>
                            <li>- 등록 인증 정보는 이벤트 목적 외 용도로 사용되지 않습니다.</li>
                            <li>- 발급된 쿠폰의 사용 기간은 3일로, 본 페이지 내에서 판매 중인 PASS 상품에만 적용 가능합니다.</li>
                        </ul>
                    </dd>        

                    <dt>환불정책</dt>
                    <dd>
                        <ul>
                            <li>- 결제 후 7일 이내 전액 환불 가능</li>
                            <li>- 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능</li>
                            <li>- 자료 및 모바일 강의 다운로드 시 수강한 것으로 간주</li>
                            <li>- 본 상품은 특별 기획 상품으로, 수강시작일(결제 당일 포함)로부터 7일 경과 후 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감하고 환불됩니다. <br>
                                · 결제금액 - (강좌 정상가의 1일 이용대금*이용일수)<br> (* 수강지원 포인트 포함 상품 환불 시 포인트를 미사용한 경우는 회수 후 환불 처리하오나, 포인트를 사용하였다면 사용분만큼 결제금액에서 차감 후 환불됩니다.)
                            </li>
                        </ul>
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
        function go_PassLecture(){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            code = $('input[name="y_pkg"]:checked').val();
            if (typeof code == 'undefined' || code == '') {
                alert('강좌를 선택해 주세요.');
                return;
            }
            location.href = "{{ front_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}" + code;
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

        /*롤링*/
        $(document).ready(function() {
            var BxBook = $('.slide_pro').bxSlider({
                slideWidth: 310,
                slideMargin: 40,
                maxSlides:10,
                minSlides:1,
                moveSlides: 1,
                ticker:true,
                speed:40000,
                onSlideAfter: function() {
                    BxBook.stopAuto();
                    BxBook.startAuto();
                }
            });
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop