@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            font-size:14px;
            line-height:1.4;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /************************************************************/

        .sky {position:fixed;top:250px;right:10px; width:120px; z-index:100;}
        .sky a {display:block; margin-bottom:10px; background:#fff; border:3px solid #ff384f; color:#ff384f; padding:15px; text-align:center; font-size:16px}
        .sky a:hover {color:#fff; background:#ff384f}

        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2022/10/2799_top_bg.jpg) no-repeat center top;}
        .evt01 {}
        .evt01 .wrap .choice {position:absolute; top:461px; width:1000px; left:65px; z-index: 2; display:flex; flex-wrap: wrap;}
        .evt01 .wrap .choice label {width:190px; height:88px; text-align:left; cursor: pointer; margin-right:10px; margin-bottom:35px; display:block; align-self: auto;}
        .evt01 .wrap .choice input {width:20px; height:20px; margin:8px 0 0 20px;}
        .evt01 .wrap .btn01 {display:block; position:absolute; top:842px; width:40%; left:50%; margin-left:-20%; padding:15px 0; font-size:24px; text-align:center; background:#333; color:#fff; border-radius:30px}
        .evt01 .wrap .btn01:hover {background:#3c8340;}
        .evt01 .wrap p {position:absolute; top:905px; width:100%; font-size:14px; text-align:center; z-index: 2;}
        .evt01 .wrap01 h4 {font-size:30px; color:#000; text-align:left; margin:50px 0 20px; padding-left:20px}

        .evt02 {width:1120px; margin:0 auto 50px; position:relative; text-align:left}
        .evt02 h5 {font-size:30px; margin-bottom:20px; }
        .evtMenu ul {display:flex; flex-wrap: wrap; justify-content: space-between; margin-bottom:20px; width:1120px; margin:0 auto}
        .evtMenu li {background:#000; margin-right:1px; width:calc(100% / 11 - 1px)}
        .evtMenu li a {display:block; width:100%; border:1px solid #fc384c; background:#ff6376; color:#fff; font-size:14px; text-align:center; padding:15px 0; line-height:1.4}
        .evtMenu li a:hover,
        .evtMenu li a.on {border-bottom:1px solid #fff; color:#454545; background:#fff}
        .evtMenu li:last-child {margin:0}
       
        .tabCts {width:1120px; margin:0 auto; /*margin-top:100px;*/ padding-top:100px}
        .tabCts .sTitle {font-size:18px; font-weight:bold; margin-bottom:10px}
        .tabCts:first-child {margin-top:30px; padding-top:0}

        .fixed {position:fixed; top:0; left:50%; width:1120px; margin-left:-560px; background:#fff; z-index:10}
        
        .evt03 {width:1120px; margin:100px auto 150px; position:relative; text-align:left}
        .evt03 h5 {font-size:30px; margin-bottom:20px; border-bottom:1px solid #333; padding-bottom:10px}
        .evt03 h5 strong {color:#ff6376}
        .evt03 h5 span {font-size:14px; vertical-align:bottom}
        .evt03 .infotext {height:200px; padding:30px; border:1px solid #ccc; overflow-y:scroll; margin-bottom:10px}
        .evt03 .infotext li {list-style: demical; margin-left:20px; margin-bottom:10px}
        .evt03 .checkinfo {font-size:16px; color:#b62335}
        .evt03 input[type=checkbox] {width:18px; height:18px}
        .evt03 table{width:100%; border:1px solid #c1c1c1}
        .evt03 table tr{border-bottom:1px solid #c1c1c1}
        .evt03 table th{background:#e4e4e4; color:#333; font-size:16px; padding:10px; text-align:center}
        .evt03 table td{font-size:14px; color:#000; font-weight:300; text-align:left; padding:10px}
        .evt03 table td:last-of-type{border-right:0}
        .evt03 input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; vertical-align:middle}
        .evt03 input[type=file] {height:30px; color:#494a4d; vertical-align:middle;}
        .evt03 .btns {margin-top:40px; text-align:center}
        .evt03 .btns a {display:inline-block; min-width:260px; text-align:center; font-size:20px; color:#fff; background:#7f7f7f; margin:0 10px; border-radius:40px; padding:15px 30px}
        .evt03 .btns a:first-child {background:#ff6376; }
        .evt03 .btns a:hover {background:#000}
        .freelecList {margin-top:100px}        
        .freelecwrap {display:flex; flex-flow: row wrap; justify-content: space-between; padding-left:40px; /*background:url(https://static.willbes.net/public/images/promotion/2022/10/2799_04.jpg) no-repeat 90% 85%;*/}   
        .freelecbox  {margin-bottom:30px; width:25%}   
        .freelecbox .lecimg {position: relative;}
        .freelecbox .lecimg div {position: absolute; top:15px; left:15px}
        .freelecbox .lecimg div p {margin-bottom:10px; color:#010101; text-shadow:1px 1px 1px #fff}
        .freelecbox .lecimg div p:nth-child(2) {font-size:18px; color:#b42235; font-weight:bold}
        .freelecbox .lecimg div p:nth-child(3) {font-size:18px; font-weight:bold}
        .freelecbox ul {margin-top:10px;}
        .freelecbox li {margin-bottom:5px; font-size:16px; letter-spacing:-1px;}
        .freelecbox label span {color:#b42235; vertical-align:top}
        .freelecbox label:hover {cursor:pointer}    
        
        .evt04 {margin-bottom:150px}

        .evtInfo {padding:150px 0; background:#333; color:#fff; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px;}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#warm_up">
                Warm-up<br>
                class<br>
                수강신청<br>
                👇
            </a>  
            <a href="#freelec">
                인강 2주<br>
                무료체험<br>
                신청하기<br>
                👇
            </a>  
        </div>  

        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2022/10/2799_top.jpg" alt="웜업 클래스"/>
        </div>

        <div class="evtCtnsBox evt01">
        	<img src="https://static.willbes.net/public/images/promotion/2022/10/2799_01.jpg" alt="웜업 클래스란?"/>
        </div>

        <div class="evtCtnsBox evt02" id="warm_up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/10/2799_02.jpg" alt="웜업 클래스 수강신청"/>
            <h5 class="NSK-Black">강좌선택</h5>
        </div>

        <nav class="evtMenu">
            <ul>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab01')" class="tab">전공국어<br>송원영 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab02')" class="tab">전공국어<br>권보민 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab03')" class="tab">전공국어<br>구동언 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab04')" class="tab">전공영어<br>김유석 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab05')" class="tab">전공영어<br>김영문 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab06')" class="tab">전공수학<br>김철홍 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab07')" class="tab">수학교육론<br>박태영 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab08')" class="tab">도덕윤리<br>김병찬 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab09')" class="tab">전공역사<br>김종권 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab10')" class="tab">전기.전자.통신<br>최우영 교수</a></li>
                <li><a href="javascript:void(0);" onClick="scrolling('.tab11')" class="tab">전공중국어<br>장영희 교수</a></li>
            </ul>
        </nav>

        <div>
            <section class="tabCts tab01">
                <div class="sTitle">전공국어 송원영 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif    
            </section>

            <section class="tabCts tab02">
                <div class="sTitle">전공국어 권보민 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                @endif    
            </section>

            <section class="tabCts tab03">
                <div class="sTitle">전공국어 구동언 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
                @endif    
            </section>
            
            <section class="tabCts tab04">
                <div class="sTitle">전공영어 김유석 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>4))
                @endif    
            </section>

            <section class="tabCts tab05">
                <div class="sTitle">전공영어 김영문 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>5))
                @endif    
            </section>

            <section class="tabCts tab06">
                <div class="sTitle">전공수학 김철홍 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>6))
                @endif    
            </section>

            <section class="tabCts tab07">
                <div class="sTitle">수학교육론 박태영 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>7))
                @endif    
            </section>

            <section class="tabCts tab08">
                <div class="sTitle">도덕윤리 김병찬 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>8))
                @endif    
            </section>

            <section class="tabCts tab09">
                <div class="sTitle">전공역사 김종권 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>9))
                @endif    
            </section>

            <section class="tabCts tab10">
                <div class="sTitle">전기.전자.통신 최우영 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>10))
                @endif    
            </section>

            <section class="tabCts tab11">
                <div class="sTitle">전공중국어 장영희 교수</div>
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>11))
                @endif    
            </section>
        </div>

        <div class="evtCtnsBox evt03" id="freelec"></div>

        <div class="evtCtnsBox evt04">
            <div class="wrap">
        	    <img src="https://static.willbes.net/public/images/promotion/2022/10/2799_05.jpg" alt="웜업 클래스란?"/>
                <a href="https://ssam.willbes.net/landing/show/lcode/1035/cate/3134/preview/Y" target="_blank" title="임용시험이란?" style="position: absolute; left: 40.89%; top: 17.05%; width: 12.77%; height: 68.18%; z-index: 2;"></a>
                <a href="https://ssam.willbes.net/examInfo/notice" target="_blank" title="시험공고문 확인" style="position: absolute; left: 54.02%; top: 17.05%; width: 12.77%; height: 68.18%; z-index: 2;"></a>
                <a href="https://ssam.willbes.net/support/examQuestion/index" target="_blank" title="임용시험 기출문제" style="position: absolute; left: 67.23%; top: 17.05%; width: 12.77%; height: 68.18%; z-index: 2;"></a>
                <a href="https://ssam.willbes.net/examInfo/trend" target="_blank" title="최근 10년 동향" style="position: absolute; left: 81.07%; top: 17.05%; width: 12.77%; height: 68.18%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">[Warm-Up class 수강] 시 유의사항</h4>
                <ul>
                    <li>본 강좌는 2024학년도 시험을 대비하기 위한 선행학습 과정으로 결제일(또는 수강 시작일)에 관계없이 2022년 12월31일[토]까지 수강할 수 있습니다.</li>
                    <li>본 강좌는 할인율이 큰 강좌로 모든 강의는 1배수로 제공됩니다.</li>
                    <li>본 강좌는 일시정지 및 유료 연장이 불가하며, 12월31일 이후 자동 종료됩니다. 학습 일정에 참고해 주시기 바랍니다.</li>
                    <li>환불 정책 <br>
                        - 본 강좌는  결제 후, 7일 이내의 강의 시작 전인 경우에는 100% 환불이 가능합니다.<br>
                        - 하지만, 결제 후 7일 이내임에도 불구하고, 강의가 시작되었다면 환불이 불가한 특별할인 강좌입니다. (신중하게 결정하시기 바랍니다.)</li>
                    <li>본 강좌에 필요한 교재는 별도로 구매하셔야 합니다. </li>
                    <li>본 이벤트로 인한 할인 결제한 강의는 양도 및 매매가 불가능하며, 위반(적발)시 처벌받을 수 있습니다.</li>
                </ul>
                <h4 class="NSK-Black mt100">[인강 2주 무료 체험하기] 유의사항</h4>
                <ul>
                    <li>본 이벤트는 교원임용시험을 처음 도전하는 대학교(원) 재학생만 참여 가능한 이벤트 입니다. (기존 수강생은 참여할 수 없습니다)<br>
                        - 본 이벤트는 상단의 “재학생 인증창”에 학교명과 학과명을 표기하고, 인증서류를 스캔하여 전송하는 절차를 진행한 후 참여 가능합니다.<br>
                        - 재학생임을 인증하는 서류로 학생증은 인정되지 않으며, 1개월 이내 발급된 재학증명서, 성적증명서 등 본인이 현재 재학생임을 입증하는 서류여야 합니다.</li>
                    <li>강의제공 방식<br>
                        - 재학생 인증절차 후, 체험하고자 하는 강의를 신청하시면 됩니다. (강의는 최대 4개 까지만 가능합니다)<br>
                        - 강좌별 체험기간은 7일이며, 강의시간은 1배수로 제공됩니다. (※ 1배수란? 강의진행 시간만큼만 재생이 가능합니다)<br>
                        - 강좌체험을 신청하면, 일정기간 심사 후, 개별 ID에 신청하신 과목의 강의가 14일간 제공됩니다.</li>
                    <li>본 이벤트는 재학중인 학과와 관련된 강좌만 제공받을 수 있습니다. </li>
                    <li>본 이벤트는 중등과정만 진행됩니다. (유치원, 초등은 진행되지 않습니다)</li>
                    <li>본 강의체험에 필요한 교재는 별도로 구매하셔야 합니다.</li>
                    <li>본 이벤트의 무료체험강의를 양도 및 매매가 불가능하며, 위반시 처벌받을 수 있습니다.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function (){
            let section02 = document.querySelector('.tab01');
            let evt03 = document.querySelector('.evt03');
            let navBar = document.querySelector('nav');
            window.addEventListener('scroll', function(){
                // nav 아래로 스크롤시 nav 상단고정
                if ( window.pageYOffset > section02.offsetTop ) {
                    navBar.classList.add('fixed');
                    if(window.pageYOffset > evt03.offsetTop){
                        $('.evtMenu').css('display', 'none');
                    }
                    else{
                        $('.evtMenu').css('display', 'block');
                    }
                } else {
                    navBar.classList.remove('fixed');
                }

                let tabs = $('.tab');
                let sections = $('section')
                sections.each( function(i,el){
                    if(window.pageYOffset >= el.offsetTop && window.pageYOffset < el.offsetTop + el.offsetHeight){
                        tabs.eq(i).addClass('on');
                        tabs.eq(i).parent('li').siblings().children().removeClass('on');
                    }
                })
            });

            //무료인강 html 호출
            var url = "{{ front_url("/authGive/index/cate/3134/code/{$arr_promotion_params['ag_idx']}/promo/{$arr_base['promotion_code']}") }}";
            var data = '';
            sendAjax(url,
                data,
                function(d){
                    $("#freelec").html(d).end();
                },
                function(ret, status){
                    //alert('진행중인 인강 무료체험 강좌가 없습니다. 관리자에게 문의해주세요.');
                    //location.href = '{{ front_url('/') }}';
                }, false, 'GET', 'html');
        });

        function scrolling(target){
            $('html, body').stop().animate({scrollTop: $(target).offset().top});
        }

        {{-- 강좌지급 인증 ajax 로 호출 시 사용--}}
        function fn_login_check() {
            {!! sess_data('is_login') !== true ?  login_check_inner_script('로그인 후 이용하여 주십시오.','Y') : 'return true;' !!}
        }
    </script>
@stop