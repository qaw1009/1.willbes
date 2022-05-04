@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
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
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /*****************************************************************/

        .evt00 {background:#0a0a0a}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/05/2648_top_bg.jpg) no-repeat center top; height:1650px}   
        .evt_top span {position: absolute; top:350px; left:50%; margin-left:-560px}

        .evt01 {padding-bottom:100px}
        .dateBox {display:flex; justify-content: space-between; width:776px; margin:0 auto; }
        .dateBox .item {width:140px; font-size:27px; border-radius:8px; background:url(https://static.willbes.net/public/images/promotion/2022/05/2648_01_bg.jpg); 
            padding:20px 0 10px; line-height:1.2; color:#fff; font-weight:600; overflow:hidden; text-shadow: 0 3px 6px rgba(0,0,0,0.1); position: relative;}
        .dateBox .item h5 {font-size:57px;}
        .dateBox .item .sbox {font-size:20px; padding:10px; border:1px solid #fff; border-radius:8px; margin:10px 10px 0}
        .dateBox .item .end {background:rgba(0,0,0,0.6) url(https://static.willbes.net/public/images/promotion/2022/05/2648_01_end.png) no-repeat center center; position: absolute; width:100%; height:100%; top:0; left:0; z-index: 10;}

        .request {width:776px; margin:150px auto 50px; font-size:14px; text-align:left}
        .request .stitle {font-size:20px; font-weight:600; margin-bottom:30px}
        .request .reqForm {border-top:1px solid #eaeaea; border-bottom:1px solid #eaeaea; padding:15px 0; margin-top:-15px; margin-bottom:30px}
        .request .reqForm span {margin:0 10px}
        .request .txtinfo {background:#f7f9fa; line-height:1.3; color:#3f3f3f; padding:30px; margin-top:-15px; margin-bottom:10px}
        .request .txtinfo li {margin-bottom:10px; list-style: decimal; margin-left:20px}

        .evtCtnsBox input[type=text] {height:40px; padding:0 10px; color:#494a4d; border:1px solid #eaeaea; vertical-align:middle; width:40%; background:#f7f9fa}
        .evtCtnsBox input[type=checkbox] {width:20px; height:20px} 

        .btn a {display:block; height:64px; line-height:64px; color:#fff; font-size:28px; font-weight:bold; text-align:center; border-radius:50px; 
            background:#000; width:460px; margin:50px auto}
        .btn a:hover {background:#80AE40}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div> 

        <div class="evtCtnsBox evt_top" data-aos="fade-up">  
            <span data-aos="flip-left" data-aos-delay="500" data-aos-duration="1500"><img src="https://static.willbes.net/public/images/promotion/2022/05/2648_top_img.png" alt="신광은 형법 각론"></span>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2648_01.jpg" alt="합격을 진심으로 축하드립니다.">

            <div class="dateBox">
                <div class="item">
                    <h5 class="NSK-Black">5.3</h5>
                    신광은<br>
                    형법 각론
                    <div class="sbox">
                    선착순<br>
                    1,000명
                    </div>
                    <div class="end"></div>
                </div>
                <div class="item">
                    <h5 class="NSK-Black">5.4</h5>
                    신광은<br>
                    형법 각론
                    <div class="sbox">
                    선착순<br>
                    1,000명
                    </div>
                </div>
                <div class="item">
                    <h5 class="NSK-Black">5.5</h5>
                    신광은<br>
                    형법 각론
                    <div class="sbox">
                    선착순<br>
                    1,000명
                    </div>
                </div>
                <div class="item">
                    <h5 class="NSK-Black">5.6</h5>
                    신광은<br>
                    형법 각론
                    <div class="sbox">
                    선착순<br>
                    1,000명
                    </div>
                </div>
                <div class="item">
                    <h5 class="NSK-Black">5.7</h5>
                    신광은<br>
                    형법 각론
                    <div class="sbox">
                    선착순<br>
                    1,000명
                    </div>
                </div>
            </div>

            <div class="request">
                <div class="stitle">📌 참여방법 : 회원가입 후 로그인 > 신청하기 버튼 클릭 > 장바구니 확인</div>
                <div class="stitle">📌 정보입력</div>
                <div class="reqForm">
                    <span>이름</span><input type="text" value="{{ sess_data('mem_name') }}" placeholder="이름을 입력해주세요." readonly onclick="loginCheck();">
                    <span>연락처</span><input type="text" value="{{ sess_data('mem_phone') }}" placeholder="(-)없이 숫자만 입력해주세요." readonly onclick="loginCheck();">
                </div>

                <div class="stitle">📌 개인정보 수집 및 이용에 대한 안내</div>
                <ul class="txtinfo">
                    <li>개인정보 수집 이용 목적 <br>
                    - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대<br>
                    - 이벤트 참여에 따른 강의 수강자 목록에 활용</li>
                    <li>개인정보 수집 항목 <br>
                    - 신청인의 이름,연락처</li>
                    <li>개인정보 이용기간 및 보유기간<br>
                    - 본 수집, 활용목적 달성 후 바로 파기</li>
                    <li>개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익 <br>
                    - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나, 위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.</li>
                </ul>
                <div><input name="is_chk" type="checkbox" value="Y" id="is_chk" onclick="loginCheck();"/> <label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label></div>
            </div>

            <div class="btn" data-aos="fade-up">
                <a href="#none">형법 교재 선착순 신청하기 ></a>
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

@stop