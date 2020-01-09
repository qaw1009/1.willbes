@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

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

        .wb_00 {background:url(https://static.willbes.net/public/images/promotion/2019/12/1480_00_bg.jpg) no-repeat center top;}
        .wb_top {background:#f2f7f9 url(https://static.willbes.net/public/images/promotion/2019/12/1480_top_bg.jpg) no-repeat center top; position:relative;}
        .leclist {position:absolute; top:693px; left:50%; margin-left:-344px; width:600px; height:365px;  overflow:hidden}
        .slidesLec li {color:#ccc; font-size:16px; font-weight:bold; line-height:1.8; height:70px; overflow:hidden; display:inline; float:left; width:300px}
        .slidesLec li span {width:50px; display:inline-block}
        .slidesLec:after {content:""; display:block; clear:both}
        .wb_01 {background:#212121}
        .wb_02 {background:#fb5140; padding-bottom:150px}
            .check {margin-top:20px; color:#fff; font-size:14px}
            .check label {cursor:pointer}
            .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
            .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#000; margin-left:50px; border-radius:20px}
            .check a.infotxt:hover {background:#d9312b}   
        .wb_03 {background:#fff;}  
        
        .skybanner {
            position:fixed;
            bottom:0;
            left:50%;
            margin-left:-1000px;
            z-index:10;
        }

    </style>
    
    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox wb_00">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1480_00.gif" alt="출발부터 앞선 시작, 윌비스 김동진 법원팀!"/>
        </div>

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday NG">        
            <div>
                <ul>
                    <li>
                        2021 김동진 법원팀 - 4기<br />
                        <span class="NGEB">1.15(수) 마감!</span>
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
                        남았습니다
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1480_top.jpg" alt="김동진 법원팀"/>
            <div class="leclist">
                <ul class="slidesLec">
                    <li>
                        2018 합격	동행 1기	112***	서OO	<span></span>	2019 합격	동행 2기	11****	이OO	<br>
                        2018 합격	동행 1기	113***	이OO	<span></span>	2019 합격	동행 2기	11****	조OO	<br>
                        2018 합격	동행 1기	112***	박OO	<span></span>	2019 합격	동행 2기	15****	권OO	<br>
                        2018 합격	동행 1기	130***	안OO	<span></span>	2019 합격	동행 2기	11****	장OO	<br>
                        2018 합격	동행 1기	110***	김OO	<span></span>	2019 합격	동행 2기	11****	최OO	<br>
                        2018 합격	동행 1기	110***	강OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	112***	손OO	<span></span>	2019 합격	동행 2기	11****	정OO	<br>
                        2018 합격	동행 1기	112***	김OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	113***	권OO	<span></span>	2019 합격	동행 2기	11****	조OO	<br>
                        2018 합격	동행 1기	114***	송OO	<span></span>	2019 합격	동행 2기	11****	장OO	<br>
                        2018 합격	동행 1기	113***	정OO	<span></span>	2019 합격	동행 2기	11****	석OO	<br>
                        2018 합격	동행 1기	112***	홍OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	113***	강OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	114***	이OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	111***	김OO	<span></span>	2019 합격	동행 2기	11****	이OO	<br>
                        2018 합격	동행 1기	114***	표OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	112***	임OO	<span></span>	2019 합격	동행 2기	11****	정OO	<br>
                        2018 합격	동행 1기	111***	김OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	110***	김OO	<span></span>	2019 합격	동행 2기	11****	박OO	<br>
                        2018 합격	동행 1기	112***	윤OO	<span></span>	2019 합격	동행 2기	11****	장OO	<br>
                        2018 합격	동행 1기	114***	김OO	<span></span>	2019 합격	동행 2기	11****	이OO	<br>
                        2018 합격	동행 1기	111***	김OO	<span></span>	2019 합격	동행 2기	11****	소OO	<br>
                        2018 합격	동행 1기	110***	김OO	<span></span>	2019 합격	동행 2기	11****	박OO	<br>
                        2018 합격	동행 1기	112***	박OO	<span></span>	2019 합격	동행 2기	11****	강OO	<br>
                        2018 합격	동행 1기	110***	권OO	<span></span>	2019 합격	동행 2기	11****	윤OO	<br>
                        2018 합격	동행 1기	113***	전OO	<span></span>	2019 합격	동행 2기	11****	이OO	<br>
                        2018 합격	동행 1기	110***	이OO	<span></span>	2019 합격	동행 2기	11****	장OO	<br>
                        2018 합격	동행 1기	111***	전OO	<span></span>	2019 합격	동행 2기	11****	박OO	<br>
                        2018 합격	동행 1기	110***	김OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	113***	전OO	<span></span>	2019 합격	동행 2기	11****	이OO	<br>
                        2018 합격	동행 1기	112***	이OO	<span></span>	2019 합격	동행 2기	11****	박OO	<br>
                        2018 합격	동행 1기	113***	강OO	<span></span>	2019 합격	동행 2기	11****	이OO	<br>
                        2018 합격	동행 1기	112***	박OO	<span></span>	2019 합격	동행 2기	11****	이OO	<br>
                        2018 합격	동행 1기	110***	김OO	<span></span>	2019 합격	동행 2기	11****	정OO	<br>
                        2018 합격	동행 1기	110***	민OO	<span></span>	2019 합격	동행 2기	11****	이OO	<br>
                        2018 합격	동행 1기	150***	안OO	<span></span>	2019 합격	동행 2기	11****	추OO	<br>
                        2018 합격	동행 1기	112***	손OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	110***	이OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	114***	이OO	<span></span>	2019 합격	동행 2기	14****	이OO	<br>
                        2018 합격	동행 1기	112***	양OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	113***	장OO	<span></span>	2019 합격	동행 2기	11****	제OO	<br>
                        2018 합격	동행 1기	111***	최OO	<span></span>	2019 합격	동행 2기	11****	박OO	<br>
                        2018 합격	동행 1기	130***	김OO	<span></span>	2019 합격	동행 2기	11****	남OO	<br>
                        2018 합격	동행 1기	111***	박OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	111***	김OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	112***	김OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	112***	박OO	<span></span>	2019 합격	동행 2기	12****	문OO	<br>
                        2018 합격	동행 1기	140***	추OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	113***	권OO	<span></span>	2019 합격	동행 2기	12****	송OO	<br>
                        2018 합격	동행 1기	113***	조OO	<span></span>	2019 합격	동행 2기	11****	홍OO	<br>
                        2018 합격	동행 1기	112***	최OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	111***	지OO	<span></span>	2019 합격	동행 2기	12****	최OO	<br>
                        2018 합격	동행 1기	113***	김OO	<span></span>	2019 합격	동행 2기	11****	장OO	<br>
                        2018 합격	동행 1기	110***	권OO	<span></span>	2019 합격	동행 2기	11****	이OO	<br>
                        2018 합격	동행 1기	114***	박OO	<span></span>	2019 합격	동행 2기	13****	조OO	<br>
                        2018 합격	동행 1기	150***	박OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	113***	권OO	<span></span>	2019 합격	동행 2기	11****	유OO	<br>
                        2018 합격	동행 1기	110***	강OO	<span></span>	2019 합격	동행 2기	14****	김OO	<br>
                        2018 합격	동행 1기	112***	이OO	<span></span>	2019 합격	동행 2기	11****	문OO	<br>
                        2018 합격	동행 1기	114***	박OO	<span></span>	2019 합격	동행 2기	15****	정OO	<br>
                        2018 합격	동행 1기	110***	박OO	<span></span>	2019 합격	동행 2기	11****	양OO	<br>
                        2018 합격	동행 1기	120***	이OO	<span></span>	2019 합격	동행 2기	11****	박OO	<br>
                        2018 합격	동행 1기	150***	남OO	<span></span>	2019 합격	동행 2기	11****	홍OO	<br>
                        2018 합격	동행 1기	150***	황OO	<span></span>	2019 합격	동행 2기	11****	정OO	<br>
                        2018 합격	동행 1기	110***	서OO	<span></span>	2019 합격	동행 2기	11****	강OO	<br>
                        2018 합격	동행 1기	112***	황OO	<span></span>	2019 합격	동행 2기	11****	민OO	<br>
                        2018 합격	동행 1기	113***	오OO	<span></span>	2019 합격	동행 2기	14****	최OO	<br>
                        2018 합격	동행 1기	110***	정OO	<span></span>	2019 합격	동행 2기	11****	박OO	<br>
                        2018 합격	동행 1기	113***	안OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	111***	이OO	<span></span>	2019 합격	동행 2기	14****	박OO	<br>
                        2018 합격	동행 1기	110***	김OO	<span></span>	2019 합격	동행 2기	11****	임OO	<br>
                        2018 합격	동행 1기	112***	박OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	110***	최OO	<span></span>	2019 합격	동행 2기	13****	남OO	<br>
                        2018 합격	동행 1기	110***	전OO	<span></span>	2019 합격	동행 2기	11****	오OO	<br>
                        2018 합격	동행 1기	150***	최OO	<span></span>	2019 합격	동행 2기	15****	김OO	<br>
                        2018 합격	동행 1기	113***	김OO	<span></span>	2019 합격	동행 2기	11****	서OO	<br>
                        2018 합격	동행 1기	111***	최OO	<span></span>	2019 합격	동행 2기	11****	최OO	<br>
                        2018 합격	동행 1기	410***	박OO	<span></span>	2019 합격	동행 2기	11****	박OO	<br>
                        2018 합격	동행 1기	113***	양OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	111***	조OO	<span></span>	2019 합격	동행 2기	11****	윤OO	<br>
                        2018 합격	동행 1기	112***	박OO	<span></span>	2019 합격	동행 2기	11****	민OO	<br>
                        2018 합격	동행 1기	110***	이OO	<span></span>	2019 합격	동행 2기	11****	이OO	<br>
                        2018 합격	동행 1기	113***	최OO	<span></span>	2019 합격	동행 2기	11****	최OO	<br>
                        2018 합격	동행 1기	110***	이OO	<span></span>	2019 합격	동행 2기	11****	조OO	<br>
                        2018 합격	동행 1기	150***	김OO	<span></span>	2019 합격	동행 2기	11****	나OO	<br>
                        2018 합격	동행 1기	410***	조OO	<span></span>	2019 합격	동행 2기	11****	이OO	<br>
                        2018 합격	동행 1기	113***	박OO	<span></span>	2019 합격	동행 2기	11****	황OO	<br>
                        2018 합격	동행 1기	111***	송OO	<span></span>	2019 합격	동행 2기	11****	변OO	<br>
                        2018 합격	동행 1기	113***	원OO	<span></span>	2019 합격	동행 2기	11****	이OO	<br>
                        2018 합격	동행 1기	110***	윤OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	130***	박OO	<span></span>	2019 합격	동행 2기	11****	류OO	<br>
                        2018 합격	동행 1기	110***	박OO	<span></span>	2019 합격	동행 2기	11****	최OO	<br>
                        2018 합격	동행 1기	116***	황OO	<span></span>	2019 합격	동행 2기	11****	이OO	<br>
                        2018 합격	동행 1기	110***	최OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2018 합격	동행 1기	150***	김OO	<span></span>	2019 합격	동행 2기	11****	정OO	<br>
                        2018 합격	동행 1기	111***	김OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2019 합격	동행 2기	12****	장OO	<span></span>	2019 합격	동행 2기	11****	강OO	<br>
                        2019 합격	동행 2기	11****	오OO	<span></span>	2019 합격	동행 2기	11****	우OO	<br>
                        2019 합격	동행 2기	11****	김OO	<span></span>	2019 합격	동행 2기	11****	박OO	<br>
                        2019 합격	동행 2기	11****	하OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2019 합격	동행 2기	14****	유OO	<span></span>	2019 합격	동행 2기	11****	박OO	<br>
                        2019 합격	동행 2기	11****	윤OO	<span></span>	2019 합격	동행 2기	15****	권OO	<br>
                        2019 합격	동행 2기	11****	백OO	<span></span>	2019 합격	동행 2기	12****	김OO	<br>
                        2019 합격	동행 2기	11****	박OO	<span></span>	2019 합격	동행 2기	14****	안OO	<br>
                        2019 합격	동행 2기	11****	김OO	<span></span>	2019 합격	동행 2기	11****	강OO	<br>
                        2019 합격	동행 2기	11****	조OO	<span></span>	2019 합격	동행 2기	11****	이OO	<br>
                        2019 합격	동행 2기	11****	민OO	<span></span>	2019 합격	동행 2기	11****	이OO	<br>
                        2019 합격	동행 2기	14****	송OO	<span></span>	2019 합격	동행 2기	14****	박OO	<br>
                        2019 합격	동행 2기	11****	최OO	<span></span>	2019 합격	동행 2기	11****	최OO	<br>
                        2019 합격	동행 2기	11****	정OO	<span></span>	2019 합격	동행 2기	11****	김OO	<br>
                        2019 합격	동행 2기	11****	박OO	<span></span>	2019 합격	동행 2기	14****	윤OO	<br>
                        2019 합격	동행 2기	11****	조OO	<span></span>	2019 합격	동행 2기	11****	이OO	<br>
                    </li>			
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox wb_01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1480_01.jpg" alt="예비순환과 함께라면 단 1년 만에 합격!"/><Br>
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1480_01_01.gif" alt="혁신적인 커리큘럼"/><Br>
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1480_01_02.jpg" alt="김동진 법원팀 교수진" usemap="#Map1480A" border="0"/>
            <map name="Map1480A" id="Map1480A">
                <area shape="rect" coords="831,1090,922,1115" href="http://cafe.daum.net/LAW-KDJTEAM" target="_blank" alt="온라인상담" />
            </map>
        </div>

        <div class="evtCtnsBox wb_02" id="buyLec">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1480_02.jpg" alt="수강신청" usemap="#Map1480B" border="0">
            <map name="Map1480B" id="Map1480B">
                <area shape="rect" coords="757,938,893,1011" href="javascript:go_PassLecture('159559');"  alt="수강신청" />
            </map>  
            <div class="check" id="chkInfo">   
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 김동진법원팀PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#ctsInfo" class="infotxt">이용안내확인하기 ↓</a>
            </div>              
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1480_03.jpg" alt="이용안내" />
        </div>
        
        {{--
        <div class="skybanner">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1480_sky.png" alt="배너" usemap="#Map1480C" border="0" />
            <map name="Map1480C" id="Map1480C">
                <area shape="rect" coords="479,41,1490,142" href="#buyLec" alt="수강신청" />
            </map>
        </div>
        --}}

    </div>
    <!-- End Container -->
    <script type="text/javascript">  
        $(document).ready(function() {
            $(function() {
                //Count the number of li elements
                var bx_num01 = $(".slidesLec li").length;
                var ticker01 = $('.slidesLec').bxSlider({
                    minSlides: 0,
                    maxSlides: 100,
                    slideWidth: 980,
                    slideMargin: 0,
                    ticker: true,
                    mode: 'vertical',
                    tickerHover: true,
                    speed:70000*bx_num01
                });
            });
        });

        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3035/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop