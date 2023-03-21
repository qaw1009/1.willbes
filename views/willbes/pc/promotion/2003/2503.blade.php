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

        .sky {position:fixed; top:200px; right:10px; width:137px; z-index:1; text-align:right}
        .sky a {display:block; margin-bottom:10px;}
 
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2023/03/2503_top_bg.jpg) no-repeat center top;}
        
        .wb_cts02 {
            background:#323943; padding-bottom:150px;
        }
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

        .wb_cts04 {background:#f4f4f4;}

        .wb_cts05 {padding:150px 0; line-height:1.4; background:#323943; }
        .wb_cts05 .ctTilte {letter-spacing:-1px; font-size:26px; margin-bottom:50px; color:#c2c2c2}
        .wb_cts05 .ctTilte h5 {font-size:48px;}
        .wb_cts05 .ctTilte p {font-size:18px; margin-top:10px}
        .wb_cts05 .ctTilte strong {color:#efc126}

        .wb_cts05 .passbuy a {display:block; width:400px; margin:0 auto; background:#e8cb56; color:#323943; font-size:30px; border-radius:50px; padding:20px 0; font-weight:bold}  
        .wb_cts05 .passbuy a:hover {background:#fff;}

        .lecWrap {display:flex; width:900px; margin:auto; font-size:16px; }
        .lecWrap .pass {margin:10px auto; position: relative;}
        .lecWrap .pass:last-child {margin-right:0}
        .lecWrap .pass div {font-size:22px}
        .lecWrap .pass h5 {font-size:46px; margin-bottom:30px}
        .lecWrap .pass h5 span {color:#b47607}
        .lecWrap .pass div:nth-child(1) {font-size:20px;}
        .lecWrap .pass div:nth-child(3) {font-size:18px; font-weight:600;}
        .lecWrap .pass div:nth-child(4) {font-size:24px; color:#b47607}
        .lecWrap .pass div strong {font-size:40px;}
        .lecWrap .pass div span {box-shadow:inset 0 -15px 0 #fbeacb; color:#b47607}
        .lecWrap .pass ul {margin-top:30px; display:flex; flex-wrap: wrap; }
        .lecWrap .pass li {list-style:disc; margin-left:20px; margin-bottom:10px; font-weight:bold; width:calc(50% - 20px)}
        .lecWrap .pass li span {color:#b47607; vertical-align:top}

        .lecWrap .pass input[type="radio"] {height:26px; width:26px; position:absolute; top:20px; left:20px; /*visibility: hidden;*/}
        .lecWrap .pass label{display:block; padding:40px; text-align:left;  box-sizing: border-box; height: 100%; border-radius:20px; background:#fff}
        .lecWrap .pass label:hover {cursor: pointer;}
        .lecWrap .pass input:checked + label {background:#efc126; color:#323943; box-shadow:5px 5px 10px rgba(0,0,0,.3)}
        .lecWrap .pass input:checked + label div,
        .lecWrap .pass input:checked + label span{color:#323943; box-shadow:none}
        .lecWrap .pass p {position: absolute; bottom:-20px; width:80%; left:10%; padding:5px; text-align:center; font-size:18px; background:#43AAF7; color:#fff; border-radius:10px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;} 
        @@keyframes upDown{
            from{background:#b47607}
            50%{background:#865908}
            to{background:#b47607}
        }
        @@-webkit-keyframes upDown{
            from{background:#b47607}
            50%{background:#865908}
            to{background:#b47607}
        }
        
        /*수강신청 체크*/
        .check {width:980px; margin:50px auto;}
        .check label {cursor:pointer; font-size:15px;color:#fff;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:5px 10px; color:#fff; background:#7f7d7e; margin-left:50px; border-radius:4px;font-size:14px;}  
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
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:14px;}
        .guide_box h2 {font-size:30px; margin-bottom:40px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; 
        padding:5px 20px; font-weight:bold; font-size:18px; border-radius:30px}        
        .guide_box dd{color:#777; margin:0 0 30px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px; font-size:12px}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;} 

    </style>


    <div class="evtContent NSK" id="evtContainer">
        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">        
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
            <a href="#transfer"><img src="https://static.willbes.net/public/images/promotion/2022/05/2503_sky.jpg" title="대학생 할인" /></a>
            <a href="#transfer"><img src="https://static.willbes.net/public/images/promotion/2022/05/2503_sky2.jpg" title="재도전 할인" /></a>
            <a href="#transfer"><img src="https://static.willbes.net/public/images/promotion/2022/05/2503_sky3.jpg" title="환승 헐안" /></a>
        </div>

        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2503_top.jpg" alt="소방 패스"  />
                <a href="#apply" title="22년 패스" style="position: absolute; left: 20%; top: 74.27%; width: 58.21%; height: 9.39%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2503_01.jpg" alt="꼭 필요한 혜택" />          
        </div>

        <div class="evtCtnsBox wb_cts02"  data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2503_02.jpg" alt="교수진" />
            <div class="box-prof">
                <ul class="slide_pro">
                    <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2503_02_04.jpg" alt="권나라"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/08/2503_02_01.jpg" alt="이종오"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2503_02_05.jpg" alt="오도희"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/08/2503_02_03.jpg" alt="이종오"/></li> 
                    <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2503_02_06.jpg" alt="신기훈"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/08/2503_02_02.jpg" alt="이석준"/></li>         
                </ul>
            </div>  
        </div> 


        <div class="evtCtnsBox wb_cts03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2503_03.jpg" alt="커리큘럼" />          
        </div>

        <div class="evtCtnsBox wb_cts04" id="transfer" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2503_04.jpg" alt="재도전/환승 이벤트" />
                <a href="javascript:certOpen();" title="인증하기" style="position: absolute; left: 30%; top: 74.34%; width: 39.29%; height: 8.53%; z-index: 2;"></a>
                <a href="#careful" title="유의사항" style="position: absolute; left: 42.14%; top: 84.83%; width: 15%; height: 4.01%; z-index: 2;"></a>
            </div>    
        </div>

        <div class="evtCtnsBox wb_cts05" id="apply" data-aos="fade-up">
            <div class="ctTilte">
                <h5>
                    <strong class="NSK-Black">2023~2024년도 시험일까지!<br>
                    윌비스 소방직 전 강좌</strong>를 합리적인 가격에!</h5>
                <p>2023, 2024년 합격도, 치열하게 질주하고 싶다면<br>
                    더 이상 고민하지 말고 윌비스 공무원에서 시작하세요!</p>
            </div>

            <div>
                <div class="lecWrap">
                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass02" value="204388">
                        <label for="pass02">
                            <div class="NSK-Black">2024 공채/경채</div>
                            <h5 class="NSK-Black"><span>소방직</span> PASS</h5>
                            <div><span>재도전/환승/대학생 5만원 할인</span></div>
                            <div><strong class="NSK-Black">199,000</strong>원</div>
                            <ul>
                                <li>
                                    22~23 소방직 [공/경채] 대비 커리큘럼 무제한<br>
                                    <span>(2024년 시험일까지 수강)</span></li>
                                <li>배수 제한 없는 무제한 반복 수강</li>
                                <li>온라인모의고사 무료 응시<br>
                                    <span>(윌비스 전국모의고사 시행 시 제공)</span></li>
                                <li><span>G-TELP</span> Level.2 강좌 제공 </li>
                                <li><span>한국사능력검정시험</span> 강좌 제공</li>
                                <li>수강지원 포인트 5만점</li>
                            </ul>
                        </label>
                    </div>
                </div>

                <div class="check">
                    <label>
                        <input name="ischk"  type="checkbox" value="Y" />
                        페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                    </label>
                    <a href="#careful">이용안내확인하기 ↓</a>
                </div>

                <div class="passbuy">
                    <a href="javascript:void(0);" onclick="javascript:go_PassLecture(); return false;">지금 바로 신청하기 ></a>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_info" id="careful" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">윌비스 소방직 PASS 이용안내</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 PASS 과정은 2023년 대비 및 2024년 대비를 위한 과정입니다.</li>
                            <li>수강 가능 교수진<br>
                            · 소방 [공/경채] : 소방학 권나라/이종오, 소방관계법규 오도희/이종오, 행정법 신기훈 이석준, G-TELP 김혜진, 한능검 오태진
                            (* 교수진별 커리큘럼 진행은 상이할 수 있으며 학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경될 수 있습니다. 신규 과정이 진행되지 않는 경우에는 이전 연도 과정을 대체 제공 해드립니다.)</li>
                            <li>수강기간 : 2023년도 대비 과정 시험일까지, 2024년도 대비 과정 24년 4월까지</li>
                        </ol>
                    </dd>

                    <dt>수강관련</dt>
                    <dd>
                        <ol>
                            <li>[내강의실] - [무한PASS존] - 상품명 옆의 [강좌추가] 버튼 클릭, 원하는 과목/교수/강좌 선택 등록 후 수강<br>
                            - 기기 제한 : PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)<br>
                            - 본 상품은 특별 기획/할인 상품이므로 일시정지/수강연장/재수강 불가</li>                           
                        </ol>
                    </dd>

                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>교재 별도 구매 ([강좌 소개] 및 [교재구매] 메뉴 이용)</li>
                            <li>PASS 구매 시 지급되는 수강지원 포인트 3만점은 교재 구매 시 사용 가능 (수강기간 내에만 유효)</li>
                        </ol>
                    </dd>

                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>선택한 교수의 강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의가 제공되며, 이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하며, 추가적인 불법 공유 행위 적발 시 형사 고발 조치가 단행될 수 있습니다.</li>
                        </ol>
                    </dd>   

                    <dt>재도전/환승 인증 이벤트 유의사항</dt>
                    <dd>
                        <ol>
                            <li>1아이디당 1회만 참여 가능</li>
                            <li>인증 완료 처리는 신청 후, 24시간 이내에 처리. 단, 주말 및 공휴일 인증 건의 경우 평일 오전 중 처리.<br>
                            1) 재도전 인증<br>
                            · 본인의 이름이 명시된 수험표 또는 윌비스 PASS 수강생의 경우 [내강의실] 페이지 내 이름과 PASS명이 명시된 이미지 캡쳐 후 업로드 시 인증 가능<br>
                            2) 환승 인증<br>
                            · 본인의 이름, 수강내역, 결제내역 등이 명확하게 기재된 수강증 등의 캡쳐를 통해서만 인증 가능 (결제내역을 통한 인증 시, 수강자 이름과 결제 금액, 강좌명 필수)<br>
                            3) 대학생 인증<br>
                            · 본인의 이름, 학번이 명시된 학생증 등의 사진을 통해서만 인증 가능</li>
                            <li>이벤트 참여자가 본인의 명의로 구매/응시한 내용에 한합니다.</li>
                            <li>등록 인증 정보는 이벤트 목적 외 용도로 사용되지 않습니다.</li>
                            <li>발급된 쿠폰의 사용 기간은 3일로, 본 페이지 내에서 판매 중인 PASS 상품에만 적용 가능합니다.</li>
                        </ol>
                    </dd>    
                    
                    <dt>환불정책</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 전액 환불 가능</li>
                            <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능</li>
                            <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주</li>
                            <li>본 상품은 특별 기획 상품으로, 수강시작일(결제 당일 포함)로부터 7일 경과 후 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감하고 환불됩니다.<br>
                            · 결제금액 - 강좌 정상가의 1일 이용대금*이용일수<br>
                            </li>
                        </ol>
                    </dd>     
                </dl>
                <div class="inquire">※ 이용 문의 : 윌비스 고객만족센터 1544-5006</div>
            </div>
        </div>
    </div>
    <!-- End Container -->

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
            location.href = "{{ front_url('/periodPackage/show/cate/3023/pack/648001/prod-code/') }}" + code;
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

        $(document).ready(function() {
            var BxProf = $('.slide_pro').bxSlider({
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

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop