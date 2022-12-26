@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2022/12/2855_top_bg.jpg) no-repeat center top;}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2022/12/2855_02_bg.jpg) no-repeat center top;}
        .evt03 .profList {width:1120px; margin:10px auto 0; display: flex; flex-wrap: wrap; justify-content: space-between; padding-bottom:140px}
        .evt03 .profList .profBox {width: 270px; margin-bottom:15px; position: relative;}
        .evt03 .profList .profBox:hover {box-shadow:5px 5px 10px rgba(0,0,0,.4); outline:1px solid #b28026;}
        .evt03 .profList .profBox .btns {position:absolute; bottom:15px; width:80%; left:50%; margin-left:-40%; z-index: 2; font-size:16px;}
        .evt03 .profList .profBox .btns a {display:block; padding:7px 0; margin-top:1px; background:rgba(1,65,75,.7); color:#fff}
        .evt03 .profList .profBox .btns a:last-child {background:rgba(0,0,0,.7);}
        .evt03 .profList .profBox .btns a:first-child {background:rgba(1,65,75,.7);}
        .evt03 .profList .profBox .btns a:hover {background:#000}
        .evt03 .profList .profBox:last-child:hover {box-shadow:0 0 0 rgba(0,0,0,.4); outline:0;}

        .evt03 .profList .profBox .NSK-Black {font-size:28px; display: flex; justify-content: center; align-items: center; width:100%; height:100%; color:#b28026; background:#f5f5f5;  line-height:1.2}
        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2022/12/2855_04_bg.jpg) no-repeat center top;}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/12/2855_top.jpg" alt="2023학년도 대비 윌비스 임용 합격전략 설명회"/>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/12/2855_01.jpg" alt=""/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
        	<img src="https://static.willbes.net/public/images/promotion/2022/12/2855_02.jpg" alt=""/>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03.jpg" alt=""/>
            <div class="profList">
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t01.jpg" alt="민정선 유아"/>
                    <div class="btns">
                        <a href="#none" onclick="javascript:alert('준비중입니다.');">설명회 보기</a>
                        <a href="@if($file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t02.jpg" alt="이경범 교육학"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('204050','1391334','HD');">설명회 보기</a>
                        <a href="@if($file_yn[2] == 'Y') {{ front_url($file_link[2]) }} @else {{ $file_link[2] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t03.jpg" alt="정현 교육학"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('204045','1391333','HD');">설명회 보기</a>
                        <a href="@if($file_yn[3] == 'Y') {{ front_url($file_link[3]) }} @else {{ $file_link[3] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t04.jpg" alt="송원영 국어"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('204085','1391331','HD');">설명회 보기</a>
                        <a href="@if($file_yn[4] == 'Y') {{ front_url($file_link[4]) }} @else {{ $file_link[4] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">                    
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t05.jpg" alt="구동언 국어"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('204060','1391330','HD');">설명회 보기</a>
                        <a href="@if($file_yn[5] == 'Y') {{ front_url($file_link[5]) }} @else {{ $file_link[5] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t06.jpg" alt="김유석 영어"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('204048','1391329','HD');">설명회 1 보기</a>
                        <a href="javascript:fnPlayerSample('204048','1391612','HD');">설명회 2 보기</a>
                        <a href="@if($file_yn[6] == 'Y') {{ front_url($file_link[6]) }} @else {{ $file_link[6] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t07.jpg" alt="김영문 영어"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('189551','1327523','HD');">설명회 보기</a>
                        <a href="@if($file_yn[7] == 'Y') {{ front_url($file_link[7]) }} @else {{ $file_link[7] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t08.jpg" alt="김철홍 수학"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('204066','1391549','HD');">설명회 1 보기</a>
                        <a href="javascript:fnPlayerSample('204066','1391550','HD');">설명회 2 보기</a>
                        <a href="@if($file_yn[8] == 'Y') {{ front_url($file_link[8]) }} @else {{ $file_link[8] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t09.jpg" alt="김현웅 수학"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('189555','1328677','HD');">설명회 보기</a>
                        <a href="@if($file_yn[9] == 'Y') {{ front_url($file_link[9]) }} @else {{ $file_link[9] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t10.jpg" alt="박태영 수학"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('204212','1392134','HD');">설명회 보기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t11.jpg" alt="박혜향 수학"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('204061','1391336','HD');">설명회 보기</a>
                        <a href="@if($file_yn[11] == 'Y') {{ front_url($file_link[11]) }} @else {{ $file_link[11] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t12.jpg" alt="양혜정 생물"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('174880','1258449','HD');">설명회 보기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t13.jpg" alt="강철 화학"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('203962','1391040','HD');">설명회 보기</a>
                        <a href="@if($file_yn[13] == 'Y') {{ front_url($file_link[13]) }} @else {{ $file_link[13] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t14.jpg" alt="도덕윤리 김병찬"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('174884','1256233','HD');">설명회 보기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t15.jpg" alt="일반사회 허역팀"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('204062','1391656','HD');">설명회 보기</a>
                        <a href="@if($file_yn[15] == 'Y') {{ front_url($file_link[15]) }} @else {{ $file_link[15] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t16.jpg" alt="허역 일반사회"/>
                    <div class="btns">
                        <a href="#none" onclick="javascript:alert('준비중입니다.');">설명회 보기</a>
                        <a href="@if($file_yn[16] == 'Y') {{ front_url($file_link[16]) }} @else {{ $file_link[16] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t17.jpg" alt="이웅재 일반사회"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('204055','1391326','HD');">설명회 보기</a>
                        <a href="@if($file_yn[17] == 'Y') {{ front_url($file_link[17]) }} @else {{ $file_link[17] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t18.jpg" alt="정인홍 일반사회"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('204055','1391328','HD');">설명회 보기</a>
                        <a href="@if($file_yn[18] == 'Y') {{ front_url($file_link[18]) }} @else {{ $file_link[18] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t19.jpg" alt="김현중 일반사회"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('204055','1391327','HD');">설명회 보기</a>
                        <a href="@if($file_yn[19] == 'Y') {{ front_url($file_link[19]) }} @else {{ $file_link[19] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t20.jpg" alt="김종권 역사"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('204063','1391325','HD');">설명회 보기</a>
                        <a href="@if($file_yn[20] == 'Y') {{ front_url($file_link[20]) }} @else {{ $file_link[20] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t21.jpg" alt="다이애나 음악"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('203875','1386842','HD');">설명회 보기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t22.jpg" alt="최우영 전기전자통신"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('204089','1391324','HD');">설명회 보기</a>
                    </div>
                </div>
                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_t23.jpg" alt="장영희 중국어"/>
                    <div class="btns">
                        <a href="javascript:fnPlayerSample('204064','1391322ㅊ','HD');">설명회 보기</a>
                        <a href="@if($file_yn[23] == 'Y') {{ front_url($file_link[23]) }} @else {{ $file_link[23] }} @endif" alt="자료 받기">설명회 자료 받기</a>
                    </div>
                </div>

                <div class="profBox">
                    <img src="https://static.willbes.net/public/images/promotion/2022/12/2855_03_end.jpg" alt=""/>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <a href="https://ssam.willbes.net/promotion/index/cate/3137/code/2822" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/12/2855_04.jpg" alt="연간패키지"/></a>
        </div>

    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
            AOS.init();
        });
    </script>
@stop