@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    @@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap');
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox.wrap {position:relative}
    .evtCtnsBox.wrap a {border:1px solid #000}

    .dday {font-size:2.4vh !important; padding:10px; background:#ebebeb; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#75a612; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#3a99f0; font-size:1.4px !important;}

  
    .event05 {padding:50px 0}
    .event05 .title {font-size:40px; line-height:1.2; margin-bottom:40px; color:#373737}

    .lecWrap {display:flex; flex-wrap: wrap; line-height:1.5; font-size:1.5vh; width:100%}
    .lecWrap .pass {margin:0 10px 10px; flex: 1 1 100%; position: relative;}
    .lecWrap .pass div {font-size:2vh}
    .lecWrap .pass div:nth-child(1) {font-size:2.2vh; font-weight:600; color:#fb6250}
    .lecWrap .pass div:nth-child(2) {font-size:2.2vh; font-weight:600;}
    .lecWrap .pass div:nth-child(3) {font-size:2.2vh; color:#fb6250}
    .lecWrap .pass div:nth-child(3) strong {font-size:2vh; font-family: 'Oswald', sans-serif;}
    .original {text-decoration:line-through;}
    .lecWrap .pass ul {margin-top:30px; display:none}
    .lecWrap .pass li {list-style:disc; margin-left:20px; margin-bottom:10px; font-weight:bold}
    .lecWrap .pass li span {color:#fb6250; vertical-align:top}

    .lecWrap .pass input[type="radio"] {height:26px; width:26px; position:absolute; top:20px; left:20px; visibility: hidden;}
    .lecWrap .pass label{display:block; border:1px solid #d7d7d7; border-radius:20px; padding:20px; text-align:left; box-sizing: border-box; height: 100%; }
    .lecWrap .pass label:hover {cursor: pointer;}
    .lecWrap .pass input:checked + label {border:1px solid #fb6250; background:#fb6250; color:#fff; box-shadow:5px 5px 10px rgba(0,0,0,.3)}
    .lecWrap .pass input:checked + label div,
    .lecWrap .pass input:checked + label span{color:#fff; box-shadow:none}
    .lecWrap .pass input:checked + label ul {margin-top:30px; display:block}

    .lecWrap .pass p {position: absolute; width:70%; left:50%; top:-20px; margin-left:-35%; color:#fff; background:#fb6250; padding:10px; border-radius:20px 20px 0 0; font-size:1.6vh; z-index: 10;}

    .lecWrapB {font-size:2vh; background:#f3f3f3; border-radius:20px; margin-bottom:30px; padding:30px 50px; text-align:left; line-height:1.3; border:5px solid #fb6250; animation:bdColor 2s infinite;-webkit-animation:bdColor 2s infinite;}
    @@keyframes bdColor{
        from{border-color:#000}
        50%{border-color:#fb6250}
        to{border-color:#000}
    }
    @@-webkit-keyframes bdColor{
        from{border-color:#000}
        50%{border-color:#fb6250}
        to{border-color:#000}
    }
    .lecWrapB .txtInfo p {margin-top:10px; font-size:34px}
    .lecWrapB .price {text-align:right}
    .lecWrapB .price strong {font-size:4vh; font-family: 'Oswald', sans-serif;}
    .lecWrapB .price a {display:block; background:#fb6250; color:#fff; border-radius:30px; padding:10px 20px; margin-top:10px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite; text-align:center}
    @@keyframes upDown{
        from{background:#000}
        50%{background:#fb6250}
        to{background:#000}
    }
    @@-webkit-keyframes upDown{
        from{background:#000}
        50%{background:#fb6250}
        to{background:#000}
    }

    .check {margin:50px auto;}
    .check label {cursor:pointer; font-size:1.6vh;color:#000;font-weight:bold;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a {display:inline-block; padding:5px 10px; color:#fff; background:#2d2d2d; margin-left:10px; border-radius:4px;font-size:1.4vh;} 

    .event05 .passbuy a {display:block; width:80%; margin:0 auto; background:#1c2127; color:#fff; font-size:2.4vh; border-radius:40px; padding:10px 0; font-weight:bold}  
    .event05 .passbuy a:hover {background:#fb6250; color:#fff;}    

    /* 이용안내 */
    .evtInfo {padding:50px 20px; background:#f4f4f4; color:#3a3a3a; font-size:1.6vh;}
    .evtInfo {text-align:left; line-height:1.4}
    .evtInfo h4 {font-size:3.5vh; margin-bottom:50px}
    .evtInfo .infoTit {margin-bottom:10px;}
    .evtInfo .infoTit strong {padding:5px 20px; border-radius:50px; background:#333; color:#fff}
    .evtInfo ul {margin-bottom:30px}   
    .evtInfo li {list-style:disc; margin-left:20px;}
    
    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        .lecWrap .pass div:nth-child(3) {position:absolute; top:20px; right:20px; z-index: 2;}
        .lecWrap .pass div:nth-child(4) {position:absolute; top:40px; right:20px; z-index: 2;}
        .lecWrapB {margin:10px}
        .event05 .title {font-size:25px; line-height:1.2; margin-bottom:40px; color:#373737}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       
        .lecWrap .pass div:nth-child(3) {position:absolute; top:20px; right:20px; z-index: 2;}
        .lecWrap .pass div:nth-child(4) {position:absolute; top:40px; right:20px; z-index: 2;}
        .lecWrapB {margin:10px}
        .event05 .title {font-size:30px; line-height:1.2; margin-bottom:40px; color:#373737}
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        .lecWrap .pass {margin:0 5px 10px; flex: 1 1 40%;}
        .lecWrap .pass div:nth-child(2) { margin-bottom:20px}
        .lecWrap .pass:nth-child(even) {margin-right:0}
        .lecWrap .pass ul {display:block}
        .check br {display:none}
        .event05 .title {font-size:35px; line-height:1.2; margin-bottom:40px; color:#373737}
    }

</style>

<div id="Container" class="Container NSK c_both">
<div class="evtCtnsBox dday NSK-Thin">
        <strong>{{$arr_promotion_params['turn']}}기 마감 <span id="ddayCountText" class="NSK-Black"></span> </strong>      
    </div>   

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2719m_00.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2719m_top.jpg" alt="장사원 T-PASS" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-left">
        <img src="https://static.willbes.net/public/images/promotion/2022/07/2719m_01.jpg" alt="" />
    </div> 

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2719m_02.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/07/2719m_03.jpg" alt=""/>
    </div> 

    <div class="evtCtnsBox wrap" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/07/2719m_04.jpg" alt=" "/>
    </div>

    <div class="evtCtnsBox event05" id="transfer" data-aos="fade-up">

        <div class="title" data-aos="fade-down">
            2023~2024년도, <span class="NSK-Black">농업직렬의 대세<br>
            장사원 교수님</span>과 함께 하세요!
        </div>

        <div class="lecWrapB" data-aos="fade-up">
            <div class="txtInfo">
                타 기술직 대비 커트라인이 높은 농업직, 가산점은 필수!<br>
                가산점 자격증도 농업직렬 최고에게 배우세요!
                <p class="NSK-Black">장사원 유기농업기능사 [필기]</p>
            </div>
            <div class="price">
                <strong>150,000</strong>원
                <a href="https://pass.willbes.net/m/lecture/show/cate/3028/pattern/only/prod-code/203152" target="_blank">지금 바로 신청하기</a>
            </div>
        </div>

        <div>
            <div class="lecWrap">
                <div class="pass" data-aos="fade-right">
                    <input type="radio" name="y_pkg" id="pass02" value="204385">
                    <label for="pass02">
                        <div>23~24 대비 농업직</div>
                        <div>[국가직/지방직 대비] T-PASS</div>
                        <div><strong><span class="original">150</span> -> 120</strong>만원</div>
                        <ul>
                            <li>2024. 6월까지 수강</li>
                            <li>PC+모바일 총 2대</li>
                            <li>3배수 제한</li>
                            <li><span>인증시 3만원 할인</span></li>
                        </ul>
                    </label>                    
                </div>

                <div class="pass" data-aos="fade-right">
                    <input type="radio" name="y_pkg" id="pass03" value="202015">
                    <label for="pass03">
                        <div>농촌지도사</div>
                        <div>[경기/인천 등] T-PASS</div>
                        <div><strong>120</strong>만원</div>
                        <ul>
                            <li>2023.10월까지 수강</li>
                            <li>PC+모바일 총 2대</li>
                            <li>3배수 제한</li>
                            <li><span>인증시 3만원 할인</span></li>
                        </ul>
                    </label>
                </div>

                <div class="pass" data-aos="fade-left">
                    <input type="radio" name="y_pkg" id="pass04" value="202013">
                    <label for="pass04">
                        <div>농촌지도사</div>
                        <div>[경기/인천 외] T-PASS</div>
                        <div><strong>120</strong>만원</div>
                        <ul>
                            <li>2023.10월까지 수강</li>
                            <li>PC+모바일 총 2대</li>
                            <li>3배수 제한</li>
                            <li><span>인증시 3만원 할인</span></li>
                        </ul>
                    </label>
                </div>

                <div class="pass" data-aos="fade-left">
                    <input type="radio" name="y_pkg" id="pass01" value="203596">
                    <label for="pass01">
                        <div>농업직 9급[국가/지방직]</div>
                        <div>문제풀이 T-PASS</div>
                        <div><strong>69</strong>만원</div>
                        <ul>
                            <li>2023. 6월까지 수강</li>
                            <li>PC+모바일 총 2대</li>
                            <li>3배수 제한</li>
                            <li><span>인증시 3만원 할인</span></li>
                        </ul>
                    </label>
                </div>

                <div class="pass" data-aos="fade-right">
                    <input type="radio" name="y_pkg" id="pass05" value="202014">
                    <label for="pass05">
                        <div>농촌지도사 [경기/인천]</div>
                        <div>문제풀이 T-PASS</div>
                        <div><strong>79</strong>만원</div>
                        <ul>
                            <li>2023. 10월까지 수강</li>
                            <li>PC+모바일 총 2대</li>
                            <li>3배수 제한</li>
                            <li><span>인증시 3만원 할인</span></li>
                        </ul>
                    </label>
                </div>

                <div class="pass" data-aos="fade-right">
                    <input type="radio" name="y_pkg" id="pass06" value="203592">
                    <label for="pass06">
                        <div>농촌지도사 [경기/인천 외]</div>
                        <div>문제풀이 T-PASS</div>
                        <div><strong>79</strong>만원</div>
                        <ul>
                            <li>2023. 10월까지 수강</li>
                            <li>PC+모바일 총 2대</li>
                            <li>3배수 제한</li>
                            <li><span>인증시 3만원 할인</span></li>
                        </ul>
                    </label>
                </div>
            </div>

            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, <br>이에 동의합니다.
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
                <li>장사원 T-PASS 제공 과정<br>
                    - 2023 9급 장사원 농업직 [국가직 대비] T-PASS : 2022년도 과정+2023년도 국가직 대비 신규 개강 전 과정<br>
                    - 2023 9급 장사원 농업직 [지방직 대비] T-PASS : 2022년도 과정+2023년도 지방직 대비 신규 개강 전 과정<br>
                    - 2023 장사원 농촌지도사 T-PASS : 2022년도 과정+2023년도 신규 개강 전 과정  
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
    });

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