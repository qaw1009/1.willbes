@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {position:relative; width:100%; max-width:720px; margin:0 auto; text-align:center; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    .dday {font-size:2.4vh !important; padding:10px; background:#ebebeb; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#3a99f0; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#3a99f0; font-size:1.4vh !important;}

    .evtTop p {color:#e80127; margin-bottom:10px}
    .evtTop .shinyBtn a {position: relative; overflow: hidden; display:block; width:80%; margin:0 auto; background:#e80127; color:#fff; font-size:2vh; padding:15px; text-align:center; border-radius:30px}
    .evtTop .shinyBtn a:after{
        content:'';
        position: absolute;
        top:0;
        left:0;
        background-color: #fff;
        width: 100%;
        height: 100%;
        z-index: 1;
        transform: skewY(129deg) skewX(-60deg);
    }
    .evtTop .shinyBtn a:after{animation:shinyBtn 3s ease-in-out infinite;}


    .event05 {padding:50px 0}

    .lecWrap {display:flex; flex-wrap: wrap; line-height:1.5; font-size:1.5vh; width:100%}
    .lecWrap .pass {margin:0 10px 10px; flex: 1 1 100%; position: relative;}
    .lecWrap .pass div {font-size:2vh}
    .lecWrap .pass div:nth-child(1) {font-size:2.2vh; font-weight:600; color:#c23227}
    .lecWrap .pass div:nth-child(2) {font-size:2.2vh; font-weight:600;}
    .lecWrap .pass div:nth-child(3) {font-size:1.4vh; font-weight:600;}
    .lecWrap .pass div:nth-child(4) {font-size:2.2vh; color:#c23227}
    .lecWrap .pass div:nth-child(4) strong {font-size:3vh;}
    .lecWrap .pass div span {box-shadow:inset 0 -10px 0 #fde1df; color:#c23227}
    .lecWrap .pass ul {margin-top:30px; display:none}
    .lecWrap .pass li {list-style:disc; margin-left:20px; margin-bottom:10px; font-weight:bold}
    .lecWrap .pass li span {font-weight:normal; color:#666; vertical-align:top}

    .lecWrap .pass input[type="radio"] {height:26px; width:26px; position:absolute; top:20px; left:20px; visibility: hidden;}
    .lecWrap .pass label{display:block; border:1px solid #d7d7d7; padding:20px; text-align:left; box-sizing: border-box; height: 100%; }
    .lecWrap .pass label:hover {cursor: pointer;}
    .lecWrap .pass input:checked + label {border:1px solid #c23227; background:#c23227; color:#fff; box-shadow:5px 5px 10px rgba(0,0,0,.3)}
    .lecWrap .pass input:checked + label div,
    .lecWrap .pass input:checked + label span{color:#fff; box-shadow:none}
    .lecWrap .pass input:checked + label ul {margin-top:30px; display:block}

    .check {margin:50px auto;}
    .check label {cursor:pointer; font-size:1.5vh;color:#000;font-weight:bold;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a {display:inline-block; padding:5px 10px; color:#fff; background:#2d2d2d; margin-left:10px; border-radius:4px;font-size:1.2vh;} 

    .event05 .passbuy a {display:block; width:80%; margin:0 auto; background:#1c2127; color:#fff; font-size:2.4vh; border-radius:40px; padding:10px 0; font-weight:bold}  
    .event05 .passbuy a:hover {background:#c23227; color:#fff;}

    /* 이용안내 */
    .evtInfo {padding:50px 20px; background:#f4f4f4; color:#3a3a3a; font-size:1.6vh}
    .evtInfoBox h4 {font-size:2.6vh; margin-bottom:30px}
    .evtInfoBox {text-align:left; line-height:1.4}
    .evtInfoBox li {list-style:disc; margin-left:20px;}
    .evtInfoBox .infoTit {font-size:1.8vh; margin-bottom:10px;}
    .evtInfoBox .infoTit strong {padding:5px 10px; border-radius:30px; background:#333; color:#fff}
    .evtInfoBox ul {margin-bottom:30px}

    @@keyframes shinyBtn {
        0% { transform: scale(0) rotate(45deg); opacity: 0.1; }
        80% { transform: scale(0) rotate(45deg); opacity: 0.5; }
        81% { transform: scale(4) rotate(45deg); opacity: 0.8; }
        100% { transform: scale(50) rotate(45deg); opacity: 0.1; }
    }
   
    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        .lecWrap .pass div:nth-child(3) {position:absolute; top:20px; right:20px; z-index: 2;}
        .lecWrap .pass div:nth-child(4) {position:absolute; top:40px; right:20px; z-index: 2;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       
        .lecWrap .pass div:nth-child(3) {position:absolute; top:20px; right:20px; z-index: 2;}
        .lecWrap .pass div:nth-child(4) {position:absolute; top:40px; right:20px; z-index: 2;}
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        .lecWrap .pass {margin:0 5px 10px; flex: 1 1 40%;}
        .lecWrap .pass div:nth-child(2) { margin-bottom:20px}
        .lecWrap .pass:nth-child(even) {margin-right:0}
        .lecWrap .pass ul {display:block}
        .check br {display:none}
    }

</style>

<div id="Container" class="Container NSK c_both">
    {{--
    <div class="evtCtnsBox dday NSK-Thin">
        <strong>마감까지 <span id="ddayCountText" class="NSK-Black"></span> </strong>
        <a href="#transfer">신청하기 ></a>
    </div>
    --}}

    <div class="evtCtnsBox evtTop" data-aos="fade-down">            
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2256m_top.jpg" alt=" " />
    </div>

    <div class="evtCtnsBox" data-aos="fade-up"> 
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2256m_01.gif" alt="" />
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2256m_02.jpg" alt="" />
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2256m_03.jpg" alt="" />
    </div>

    <div class="evtCtnsBox event05" id="transfer" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2256_05.jpg" alt="" />
        <div>
            <div class="lecWrap">
                <div class="pass">
                    <input type="radio" name="y_pkg" id="pass01" value="198399">
                    <label for="pass01">
                        <div>통신직 9급</div>
                        <div>전과목 T-PASS</div>
                        <div><span>★ 7월 한정 포인트 혜택 ★</span></div>
                        <div><strong class="NSK-Black">120</strong>만원</div>
                        <ul>
                            <li>2023. 7월까지 통신직 9급 전 강좌 제공 <span>(9급 국가직/지방직/군무원 대비 가능)</span></li>
                            <li>PC+모바일 총 2대</li>
                            <li>3배수 제한</li>
                            <li>수강지원 포인트 5만점 <span>(교재 구매 시 사용 가능)</span></li>
                        </ul>
                    </label>
                </div>

                <div class="pass">
                    <input type="radio" name="y_pkg" id="pass02" value="198398">
                    <label for="pass02">
                        <div>전기직 9급</div>
                        <div>전과목 T-PASS</div>
                        <div><span>★ 7월 한정 포인트 혜택 ★</span></div>
                        <div><strong class="NSK-Black">76</strong>만원</div>
                        <ul>
                            <li>2023. 6월까지 전기직 9급 전 강좌 제공 <span>(9급 국가직/지방직 대비 가능)</span></li>
                            <li>PC+모바일 총 2대</li>
                            <li>3배수 제한</li>
                            <li>수강지원 포인트 5만점 <span>(교재 구매 시 사용 가능)</span></li>
                        </ul>
                    </label>
                </div>

                <div class="pass">
                    <input type="radio" name="y_pkg" id="pass03" value="198401">
                    <label for="pass03">
                        <div>전기직 9·7급</div>
                        <div>전과목 T-PASS</div>
                        <div><span>★ 7월 한정 포인트 혜택 ★</span></div>
                        <div><strong class="NSK-Black">100</strong>만원</div>
                        <ul>
                            <li>2023. 10월까지 전기직 9·7급 전 강좌 제공 <span>(9급 국가직/지방직 대비 가능)</span></li>
                            <li>PC+모바일 총 2대</li>
                            <li>3배수 제한</li>
                            <li>수강지원 포인트 5만점 <span>(교재 구매 시 사용 가능)</span></li>
                        </ul>
                    </label>
                </div>

                <div class="pass">
                    <input type="radio" name="y_pkg" id="pass04" value="198400">
                    <label for="pass04">
                        <div>전자직 9급</div>
                        <div>전과목 T-PASS</div>
                        <div><span>★ 7월 한정 포인트 혜택 ★</span></div>
                        <div><strong class="NSK-Black">70</strong>만원</div>
                        <ul>
                            <li>2023. 7월까지 전자직 9급 전 강좌 제공 <span>(9급 전자직 대비 가능)</span></li>
                            <li>PC+모바일 총 2대</li>
                            <li>3배수 제한</li>
                            <li>수강지원 포인트 5만점 <span>(교재 구매 시 사용 가능)</span></li>
                        </ul>
                    </label>
                </div>
            </div>

            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 T-PASS 이용안내를 모두 확인하였고, <br>이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인 ↓</a>
            </div>

            <div class="passbuy">
                <a href="javascript:void(0);" onclick="javascript:go_PassLecture(); return false;">지금 바로 신청하기 ></a>
            </div>

        </div>
    </div>

    <div class="evtCtnsBox evtInfo" id="careful" data-aos="fade-up">
        <div class="evtInfoBox">
            <h4 class="NSK-Black">T-PASS 이용안내 및 유의사항</h4>

            <div class="infoTit"><strong>상품구성</strong></div>
            <ul>
                <li>최우영 T-PASS 제공 과정<br>
                - 통신직 : 2022년도 대비 이론+2023년도 9급 국가직·지방직/군무원 대비 신규 개강 전 과정<br>
                - 전기직 : 2022년도 대비 이론 및 문제풀이+2023년도 9/7급 국가직·지방직/군무원 전기직 대비 신규 개강 전 과정<br>
                - 전자직 : 2022년도 대비 이론 및 문제풀이+2023년도 군무원 전자직 대비 신규 개강 전 과정
                    </li>   
                <li>개강 일정 및 교수님 사정에 따라 커리큘럼 및 강의 일정의 변동이 있을 수 있습니다.</li>
                <li>본 T-PASS 내 제공되는 과정 중 신규 개강이 진행되지 않는 경우, 전년도 진행 과정으로 대체 제공될 수 있습니다.</li>
                <li>본 T-PASS를 통한 강의 수강 시, 각 과정당 3배수 제한이 적용됩니다.</li>
                <li>본 상품의 이용기간은 수강신청 상세 안내화면에 표시된 기간 만큼 제공됩니다.</li>
            </ul>
            <div class="infoTit"><strong>교재안내</strong></div>
            <ul>
                <li>교재는 별도로 제공되지 않으며, 각 강좌별 교재는 강좌소개 및 홈페이지 상단의 [교재구매] 메뉴에서 별도로 구매 가능합니다.</li>       
            </ul>
            <div class="infoTit"><strong>기기제한</strong></div>
            <ul>
                <li>본 PASS 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                    - PC+모바일 수강 시 : PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)
                </li>
                <li>계정당 최초 1회에 한해 직접 기기정보 초기화 진행 가능하며, 별도 기기정보 초기화가 추가로 필요하신 경우 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.</li>       
            </ul>
            <div class="infoTit"><strong>수강안내</strong></div>
            <ul>
                <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 과목/교수/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                <li>본 PASS 이용 중에는 일시정지/재수강/연장 기능을 사용할 수 없습니다.</li>
            </ul>
            <div class="infoTit"><strong>결제/환불</strong></div>
            <ul>
                <li>결제 후 7일 이내 전액 환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                <li>강의자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                <li>본 상품은 특별 기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일 수 만큼 차감되고 환불 됩니다.<br>
                    - 결제금액 - (강좌 정상가의 1일 이용대금*이용일수)<br>
                    * 수강지원 포인트 포함 상품 환불 시 포인트를 미사용한 경우는 회수 후 환불 처리하오나, 포인트를 사용하였다면 사용분만큼 결제금액에서 차감 후 환불됩니다.
                </li>
                <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>             				
            </ul>

            <div class="infoTit"><strong>윌비스 고객만족센터 1544-5006</strong></div>
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

<script>    
    /* 팝업창 */ 
    function certOpen(){
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
        @if(empty($arr_promotion_params) === false)
        var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
        window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
        @endif
    }

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
        location.href = "{{ front_url('/periodPackage/show/cate/3028/pack/648001/prod-code/') }}" + code;
    }     
    
    /*디데이카운트다운*/
    $(document).ready(function() {
        dDayCountDown('{{$arr_promotion_params['edate']}}', '{{$arr_promotion_params['etime'] or "00:00"}}', 'txt');
    });
</script>


{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')
@stop