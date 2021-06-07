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
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
  
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2021/06/2242_top_bg.jpg) no-repeat center top;}
        .event01 {background:#f0f0f0}
        .event01 .tabs {width:1030px; margin:0 auto 10px}
        .event01 .tabs li {display:inline; float:left; width:33.3333%}
        .event01 .tabs a {display:block; text-align:center; background:#9f9f9f; color:#fff; height:80px; line-height:80px; margin-right:10px; font-size:28px}
        .event01 .tabs a.active,
        .event01 .tabs a:hover {background:#292929;}
        .event01 .tabs li:last-child a {margin:0}
        .event01 .tabs:after {content:''; display:block; clear:both}
        .event01 .title {color:#383838; font-size:30px; margin-bottom:40px}
        .event01 .evt_table {width:1030px; margin:50px auto 0; border:1px solid #333; padding:50px}
        .evt_table table{width:100%;border-top:1px solid #e9e9e9;}
        .evt_table table tr {border-bottom:1px solid #e9e9e9}
        .evt_table table th,
        .evt_table table td {margin:10px 0; font-size:16px; color:#666}
        .evt_table table th {background:#f9f9f9; color:#000;}
        .evt_table table td{text-align:left; padding:15px}
        .evt_table label {margin-right:10px; line-height:28px;}
        .evt_table input {vertical-align:middle}
        .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; background:#f5f5f5; vertical-align:middle; width:80%; margin-bottom:5px}
        .evt_table td input[type=text]:last-child {margin-bottom:0}
        .evt_table input[type=checkbox] {height:20px; width:20px}
        .evt_table td li {display:inline-block; float:left; width:50%; margin-bottom:10px}
        .evt_table .btns {margin-top:40px}
        .evt_table .btns a {display:inline-block; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#42425b; margin:0 10px; border-radius:40px; padding:0 50px}
        .evt_table .btns a:hover {background:#fe544a}

        .event01 .txtinfo {width:1030px; margin:0 auto; color:#fff; background:#42425b; line-height:1.5; padding:50px; text-align:left; font-size:14px}
        .txtinfo .addbtn { display:inline-block; padding:0 20px; background:#ffe401; color:#42425b; border-radius:10px }

        .evt_table .popup {position:absolute; top:0; left:0; width:100%; height: 100%; background-color:rgba(0,0,0,.7);}
        .evt_table .popup span {display:block; margin-top:280px; font-size:48px; color:#fff; text-shadow: 0 5px 5px rgba(0,0,0,.5);}   

        .event02 {padding-bottom:150px}
        .event02 .btn {margin-top:50px}
        .event02 .btn a {display:block; width:400px; margin:0 auto; background:#2b2a25; color:#fff; padding:15px 0; font-size:26px}
        .event02 .btn a:hover {background:#000; color:#f7c8b8}

        .event03 {background:#f7c8b8; padding:150px 0}
        .event03 .wrap {width:1030px; margin:0 auto;}
        .event03 .tabs {width:200px; float:left}
        .event03 .tabs a {display:block; text-align:left; font-size:16px; border:1px solid #2b2a25; border-bottom:0; height:40px; line-height:40px; padding:0 15px}
        .event03 .tabs a:last-child {border-bottom:1px solid #2b2a25}
        .event03 .tabs a span {float:right}
        .event03 .tabs a:hover,
        .event03 .tabs a.active {background:#2b2a25; color:#fff} 
        .event03 .tabCts {float:right; position:relative}
        .event03 .tabCts a {position:absolute; z-index: 2;}
        .event03 .tabCts span {position:absolute; left:70px; bottom:35px; z-index: 2;}
        .event03 .tabCts span a {border:1px solid #2f2f2f; color:#2f2f2f; height:40px; line-height:40px; display:inline-block; position:relative; margin-right:10px; padding:0 15px; font-size:15px}
        .event03 .wrap:after {content:''; display:block; clear:both}

        .event03 .urlWrap {width:1030px; margin:0 auto}
        .urlWrap .urladd {padding:20px; background:#2e2e3c; color:#fff; margin:40px auto 20px; font-size:14px}
        .urlWrap .urladd input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; background:#f5f5f5; vertical-align:middle; width:70%; margin:0 10px; color:#000}
        .urlWrap .urladd a {display:inline-block; height:28px; line-height:28px; color:#2e2e3c; background:#ffc943; padding:0 20px; vertical-align:middle}
        .urlWrap .evt_table {width:100%; background-color:#fff !important; padding:20px 0}
        .urlWrap .evt_table table td {font-size:14px; text-align:center}
        .urlWrap .evt_table table td:nth-child(2) {text-align:left}
        .urlWrap .txtinfo {line-height:1.4; text-align:left; font-size:16px; margin-top:50px; color:#fff}
        .urlWrap .txtinfo h4 {font-size:30px; margin-bottom:20px; font-weight:bold}
        .urlWrap .txtinfo li {list-style-type: disc; margin-left:20px; margin-bottom:5px}

        .evtBox {width:1120px; margin:0 auto; position:relative}
        .evtBox a:hover {background:rgba(0,0,0,.2)}

        .evtInfo {padding:80px 0; background:#494949; font-size:16px; color:#fff}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}
        .evtInfoBox li a {display:inline-block; border:1px solid #fff; font-size:12px; padding:3px 10px; margin-left:10px;}
        .evtInfoBox li a:hover {background:#fff; color:#333}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:980px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; width:22px; height:37px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-80px; top:46%;}
        .slide_con p.rightBtn {right:-80px;top:46%;}
    </style>

    <div class="p_re evtContent NSK">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2021/06/2242_top.jpg" alt="윌비스임용 하반기 패키지"/>
        </div>

        <div class="evtCtnsBox event01">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2242_01.jpg" alt="문제풀이의 중요성"/>
        </div>        

        <div class="evtCtnsBox event02">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2242_02.jpg" alt="수강후기"/>   
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2242_02_01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2242_02_02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2242_02_03.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2242_02_04.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2021/06/2242_arrow_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2021/06/2242_arrow_next.png"></a></p>
            </div> 
            <div class="btn"><a href="#none">합격수기 자세히 보기 ></a></div>        
        </div> 

        <div class="evtCtnsBox event03">
            <div class="wrap">
                <div class="tabs">
                    <a href="#tab01">초등 <span>배재민</span></a>
                    <a href="#none">교육학논술 <span>이인재</span></a>
                    <a href="#none">전공국어 <span>송원영</span></a>
                    <a href="#none">전공국어 <span>권보민</span></a>
                    <a href="#none">전공영어 <span>김유석</span></a>
                    <a href="#none">전공영어 <span>김영문</span></a>
                    <a href="#none">수학교육론 <span>박태영</span></a>
                    <a href="#none">도덕윤리 <span>김병찬</span></a>
                    <a href="#none">전공역사 <span>최용림</span></a>
                    <a href="#none">전공음악 <span>다이애나</span></a>
                    <a href="#none">전기전자통신 <span>최우영</span></a>
                    <a href="#none">정보컴퓨터 <span>송광진</span></a>
                    <a href="#none">전공중국어 <span>정경미</span></a>
                </div>
                <div class="tabCts">
                    <div id="tab01">
                        <img src="https://static.willbes.net/public/images/promotion/2021/06/2242_03_t01.png" alt="배재민" />
                        <a href="" title="" style="left: 8.15%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <a href="" title="" style="left: 36.79%; top: 68.06%; width: 28.02%; height: 12.26%;"></a>
                        <span>
                            <a href="#none" class="view">설명회보기</a>
                            <a href="#none" class="sample">샘플강의보기</a>
                            <a href="#none" class="home">교수페이지</a>
                        </span>
                    </div>
                </div>
            </div>            
        </div> 

        <div class="eventWrap evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">하반기 패키지 강의 신청시 유의사항</h4>
                <ul>
                    <li>학원강의를 신청하신 경우, 개강일 및 강의 교재 등을 꼼꼼히 확인하시기 바랍니다. </li>
                    <li>온라인 강의를 신청하신 경우, 제공되는 기간 및 배수 등을 꼼꼼히 확인하기 바랍니다. (과목별 상이합니다.)</li>
                    <li>패키지 강의의 수강 기간은 시험일까지 충분하게 제공됩니다. 수강 기간 중 일시정지 및 강의 연장이 불가합니다. </li>
                    <li>7월 이후 진행되는 문제풀이 및 모의고사 강의는 강의 자료를 다운받는 행위 자체가 '강의수강'으로 간주 됩니다.</li>
                    <li>수강료의 총액을 동영상강의(50%)와 프린트(50%)로 간주하여 강의 승인 후 프린트를 다운로드 한 경우 수강료의 50%를 공제한 후 
                        학원의 설립·운영 및 과외교습에 관한 법률 시행령(약칭: 학원법 시행령) 18조 3항의 규정에 따라 환불 절차가  진행됩니다. </li>
                    <li>할인혜택을 받아서 수강하신 경우에도 환불 시, 원 수강료에서 기산 됩니다. </li>
                    <li>수강 환불 문의는 홈페이지 1:1상담 게시판을 통하여 문의하시면 신속한 답변을 얻을 수 있습니다. <a href="https://ssam.willbes.net/support/qna/index
" target="_blank">1:1 상담 게시판 바로가기</a></li>
                    <li>학원의 수강증 및 동영상의 ID는 양도 및 매매 또는 공유가 불가능하며, 위반시 처벌을 받게 됩니다. </li>
                    <li>상기 강의 일정 및 동영상 업로드 일정은 학원의 사정상 변경될 수 있습니다.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">  
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1,
                adaptiveHeight: true,
                slideWidth:980,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });

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

                    e.preventDefault()}
                )}
            )}
        );
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop