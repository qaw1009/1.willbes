@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height:auto !important;
            margin-bottom:0 !important;
        }
        .evtContent { 
            position:relative;            
            width:100% !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	

        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative; }
        
        /*****************************************************************/  

        .sky {position:fixed; top:250px; right:10px; z-index:1;}
        .sky ul li {padding-bottom:15px;}

        .evtTop {
            background:url(https://static.willbes.net/public/images/promotion/2020/07/1706_top_bg.jpg) no-repeat center top;
        }
        .evtTop > span { position:absolute; left:50%; z-index:10}
        .evtTop span.img01 {top:770px; margin-left:-700px; width:465px; animation:iptimg1 1s ease-in;-webkit-animation:iptimg1 1s ease-in;}
        .evtTop span.img02 {top:750px; margin-left:250px; width:418px; animation:iptimg2 1s ease-in;-webkit-animation:iptimg2 1s ease-in;}
        @@keyframes iptimg1{
        from{margin-left:-1200px; opacity: 0;}
        to{margin-left:-700px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
        from{margin-left:-1200px; opacity: 0;}
        to{margin-left:-700px; opacity: 1;}
        }
        
        @@keyframes iptimg2{
        from{margin-left:600px; opacity: 0;}
        to{margin-left:250px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg2{
        from{margin-left:600px; opacity: 0;}
        to{margin-left:250px; opacity: 1;}
        }

        .giftPopupWrap {
            position:absolute; 
            background: rgba(0, 0, 0, 0.6);
            filter: alpha(opacity=60);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;            
            width: 100%;
            height: 100%;  
            z-index: 105;        
        }
        .giftPop {width:786px; margin:100px auto 0; position:relative}
        .giftPop span {display:block; position:absolute; top:276px; width:100%; text-align:center; z-index:10}

        /*룰렛박스*/        
        .rulletBox {position:absolute; top:551px; width:698px; height:698px; left:50%; margin-left:-349px; z-index:5;}
        .rulletBox .btn-roulette {position:absolute; top:268px; width:164px; 
            height:164px; left:50%; padding:0; margin:0; margin-left:-82px; background:none; z-index:6}
        .rulletBox a {position:absolute; top:520px; left:580px; width:80px; height:80px; line-height:60px; color:#000; background:#fff; 
            border-radius:40px;
            border:10px solid #000; z-index:6}
        .rulletBox a:hover {background:#52fee7; color:#000}

        

        .evtMenu { position:absolute; left:50%; margin-left:-560px; bottom:0; z-index:10}
        .evtMenu ul {width:1120px; margin:0 auto;}
        .evtMenu li {display:inline; float:left; width:25%}
        .evtMenu li a {
            display:block; text-align:center; padding:30px 0; color:#fff; font-size:24px; 
            background:#204f57; border:1px solid #204f57; border-bottom:0; margin-right:4px
        }  
        .evtMenu li:last-child a {margin:0}
        .evtMenu li a span {font-size:16px}
        .evtMenu li a div {margin-top:8px}
        .evtMenu li:hover a,
        .evtMenu li a.active {background:#fff; color:#204f57; border:1px solid #fff;}
        .evtMenu li:hover a span,
        .evtMenu li a.active span {color:#204f57}
        .evtMenu ul:after {content:""; display:block; clear:both}

        .tabCts {
            position:relative; width:1120px; margin:0 auto; text-align:center; font-size:14px;
        }
        .tabCts .download span {position:absolute; top:660px; display:block; width:72px; height:24px; line-height:24px; text-align:center; z-index:1}
        .tabCts .download span:nth-child(1) {left:160px;}
        .tabCts .download span:nth-child(2) {left:362px;}
        .tabCts .download span:nth-child(3) {left:572px;}
        .tabCts .download span:nth-child(4) {left:760px;}
        .tabCts .download span:nth-child(5) {left:940px;}
        .tabCts .download span a {display:block; color:#fff; background:#d18f04; border-radius:14px;}
        .tabCts .download span a:hover {background:#e50001}
        .tabCts .youtube {width:100%; text-align:center; margin:0}	
        .tabCts .youtube iframe {width:980px; height:551px; margin:0 auto}

        .Cts02 .mt20 > a {display:inline-block; padding:5px 10px; color:#fff; background:#363636; margin-left:20px}
        .Cts02 a:hover {background:#e50001}
        
        .boardD {width:980px; border-spacing:0px; border:1px solid #dedede; table-layout:auto; color:#666; margin:0 auto} 
        .boardD caption {display:none}
        .boardD th,
        .boardD td {font-size:14px}
        .boardD th {padding:15px 5px; background:#f5f5f5; border-right:1px solid #dedede; border-bottom:1px solid #dedede; color:#333}
        .boardD thead th {background:#eee; color:#333}
        .boardD td {padding:15px 5px; margin:0; border:none; text-align:center; border-right:1px solid #dedede; border-bottom:1px solid #dedede}
        .boardD td:nth-child(1) {background:#f6f6f6;}
        .boardD td:nth-child(4) {color:#000}
        .boardD td:last-child {color:#C00}
        .boardD tr.gray th,
        .boardD tr.gray td{background:#f6f6f6}
        
        .boardD th a {display:inline; padding:5px 10px; color:#333; background:#fff; border:1px solid #ccc; border-radius:4px; margin:0 auto}
        .boardD th a:hover {background:#e50001; color:#fff}

        .Cts03 {margin-bottom:100px; text-align:left}
        
        .Cts03 h3 {font-size:16px;}
        .Cts03 h3 span {color:#fa7738; vertical-align: top;}
            .graphWrap {width:100%; margin-top:50px; font-size:14px; line-height:1.5;}
            .graphWrap li {position:relative; display:inline; float:left; width:48%; text-align:left; margin:0 0.5%;}
            .graphWrap select {position:absolute; top:5px; right:0}
            .graphWrap:after {content:""; display:block; clear:both}                
            .graphbox {width:90%; margin:20px auto; border:1px solid #000;}
            .graphbox .subTit {font-size:120%; color:#F30}
            .graph {width:20%; float:left; text-align:center; background:url(http://file.willbes.net/new_image/2015/04/graphBg.png) repeat;}
            .graph p {padding:10px 0; background:#fff}
            .graph p:last-child {border-top:1px solid #333}
            .graph div {position:relative; width:45px; height:250px; margin:0 auto;}
            .graph div img {position:absolute; bottom:0; left:0; width:100%; background:#e2be43 url(https://static.willbes.net/public/images/promotion/common/patternA.png) repeat;}
            .graph2 div img {background:#bdbdcc url(https://static.willbes.net/public/images/promotion/common/patternB.png) repeat;}
            .graphbox:after {content:""; display:block; clear:both}
            .graphWrap:after {content:""; display:block; clear:both}
        .Cts03_01 {width:1120px; text-align:left; margin:80px auto 0}
        .Cts03_01 div {border:1px solid #e4e4e4; padding:20px; margin-top:20px}
        
        .Cts04 {padding-bottom:100px}
        .Cts04 .lecture {
            width:1000px; margin:0 auto;
        }
        .Cts04 .lecture li {
            display:inline; float:left; width:25%; text-align:center; margin-bottom:20px; min-height:330px;
        }
        .Cts04 .lecture li:hover {background:#fff url(https://static.willbes.net/public/images/promotion/common/patternB.png) repeat}
        .Cts04 .lecture li img.prof {
            width:199px !important; border:1px solid #ccc;
        }
        .Cts04 .t_tilte {
           line-height:1.5; padding:10px 0; color:#666; width:200px; margin:0 auto
        }
        .Cts04 .t_tilte p {border-top:1px solid #e4e4e4; padding-top:10px; margin-top:10px}
        .Cts04 .t_tilte span {
            color:#36374d; font-size:14px; ;
        }

        .Cts04 .lecture ul:after {
            content:""; display:block; clear:both;
        }
    </style>

    <div class="evtContent NSK" id="evtContainer">
        {{--
        <div class="sky">
            <ul>          
                <li><a href="https://pass.willbes.net/promotion/index/cate/3020/code/1700" target="_blank" ><img src="https://static.willbes.net/public/images/promotion/2020/07/1706_sky.png"  title="실전모의고사 패키지 바로가기" /></a></li>
                <li><a href="https://pass.willbes.net/pass/support/notice/show?board_idx=284682&" target="_blank" ><img src="https://static.willbes.net/public/images/promotion/2020/07/1706_sky02.png"  title="실전모의고사 패키지 바로가기" /></a></li>
            </ul>
        </div>
        --}} 
        <div class="evtCtnsBox evtTop" >
            <span class="img01"><img src="https://static.willbes.net/public/images/promotion/2020/07/1706_top_img01.png" alt="신문"></span>
            <span class="img02"><img src="https://static.willbes.net/public/images/promotion/2020/07/1706_top_img02.png" alt="상품"></span>
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1706_top.jpg" title="2019 국가직 9급 풀캐어 서비스" />
            <div class="evtMenu" id="evtMenu">                
                <ul>
                    <li>
                        <a id='tab1' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/' . $arr_base['promotion_code'] . '/spidx/' . (empty($arr_promotion_params['SpIdx']) === false ? $arr_promotion_params['SpIdx'] : '') . '?tab=1#content_1') }}">
                            <span>100% 당첨!</span>
                            <div class="NSK-Black">FINAL 합격 룰렛</div>
                        </a>
                    </li>
                    <li>
                        <a id='tab2' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/' . $arr_base['promotion_code'] . '/spidx/' . (empty($arr_promotion_params['SpIdx']) === false ? $arr_promotion_params['SpIdx'] : '') . '?tab=2#content_2') }}">
                            <span>경쟁률 및 체감난이도</span>
                            <div class="NSK-Black">지난 시험 완벽분석</div>				
                        </a>
                    </li>
                    <li>
                        <a id='tab3' href="@if(time() < strtotime('202007111140'))javascript:alert('7/11(토) 11:40 오픈!');@else{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/' . $arr_base['promotion_code'] . '/spidx/' . (empty($arr_promotion_params['SpIdx']) === false ? $arr_promotion_params['SpIdx'] : '') . '?tab=3#content_3') }}@endif">
                            <span>시험 후 당충전 필수!</span>
                            <div class="NSK-Black">시험총평&이벤트</div>
                        </a>
                    </li>     
                    <li>
                        <a id='tab4' href="@if(time() < strtotime('202007131600'))javascript:alert('7/13(월) 16:00 오픈!');@else{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/' . $arr_base['promotion_code'] . '/spidx/' . (empty($arr_promotion_params['SpIdx']) === false ? $arr_promotion_params['SpIdx'] : '') . '?tab=4#content_4') }}@endif">
                            <span>2020 국가직 9급</span>
                            <div class="NSK-Black">기출해설강의</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>        

        <!--최종 마무리 전략-->
        <div id="content_1" class="tabCts">
            <div class="giftPopupWrap" id="giftPopupWrap" style="display:none;">
                <div class="giftPop">
                    <img src="https://static.willbes.net/public/images/promotion/2020/07/1706_rull_popup.png" alt="당첨팝업" usemap="#Map1706pop" border="0"/>
                    <map name="Map1706pop" id="Map1706pop">
                        <area shape="rect" coords="568,81,646,159" href="#none" onClick="closeWin('giftPopupWrap')" alt="닫기" />
                    </map>
                    {{-- 상품이미지 01 ~ 08 --}}
                    <span id="gift_box_id"></span>
                </div>
            </div>

            <div class="download">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1706_01.jpg" title="합격 룰렛" />  
                <div class="rulletBox">
                    <canvas id="box_roulette" class="tutCanvas" width="698" height="698">Canvas not supported</canvas>
                    <button id="btn_roulette" class="btn-roulette" onclick="startRoulette(); this.disabled=true;">
                        <img src="https://static.willbes.net/public/images/promotion/2020/07/1706_rull_start.png" alt="start" />
                    </button>
                    <a id="reset_roulette" href="javascript:;" onclick="resetRoulette();" >Reset</a>
                </div>
            </div>       
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1706_01_01.jpg" title="유의 사항" />      
        </div>

        <!--완벽분석-->
        <div id="content_2" class="tabCts Cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1706_02.jpg" title="" />           
            <div class="mt20 mb100">
                * 2020 국가직 시험문제&가답안 다운로드 <a href="https://www.gosi.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000138" target="_blank">바로가기</a>
                <div class="mt20">
                <table class="boardD">
                    <col width="222" />
                    <col width="91" span="8" />
                    <tr class="gray">
                        <td rowspan="2" width="222">모집단위</td>
                        <td colspan="3" width="273">2020년</td>
                        <td colspan="5" width="455">2019년</td>
                    </tr>
                    <tr class="gray">
                        <td width="91">선발예정인원</td>
                        <td width="91">접수인원</td>
                        <td width="91">경쟁률</td>
                        <td width="91">선발예정인원</td>
                        <td width="91">접수인원</td>
                        <td width="91">경쟁률</td>
                        <td width="91">응시인원</td>
                        <td width="91">합격선</td>
                    </tr>
                    <tr class="gray">
                        <td width="222">총 계</td>
                        <td width="91">         4,985 </td>
                        <td width="91">      185,203 </td>
                        <td width="91">37:1</td>
                        <td width="91">         4,987 </td>
                        <td width="91">      195,322 </td>
                        <td width="91">39:1</td>
                        <td width="91">      154,331 </td>
                        <td width="91">-</td>
                    </tr>
                    <tr class="gray">
                        <td width="222">행정직 계</td>
                        <td width="91">         4,209 </td>
                        <td width="91">      160,830 </td>
                        <td width="91">38:1</td>
                        <td width="91">         4,350 </td>
                        <td width="91">      171,562 </td>
                        <td width="91">39:1</td>
                        <td width="91">      136,166 </td>
                        <td width="91">-</td>
                    </tr>
                    <tr>
                        <td width="222" class="gray">행정직(일반행정:전국:일반)</td>
                        <td width="91">            279 </td>
                        <td width="91">        35,198 </td>
                        <td width="91">126:1</td>
                        <td width="91">            294 </td>
                        <td width="91">        33,539 </td>
                        <td width="91">114:1</td>
                        <td width="91">        25,204 </td>
                        <td width="91">407.37</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(일반행정:전국:장애)</td>
                        <td width="91">             24 </td>
                        <td width="91">            640 </td>
                        <td width="91">27:1</td>
                        <td width="91">             23 </td>
                        <td width="91">            677 </td>
                        <td width="91">29:1</td>
                        <td width="91">            530 </td>
                        <td width="91">336.59</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(일반행정:전국:저소득)</td>
                        <td width="91">              9 </td>
                        <td width="91">            364 </td>
                        <td width="91">40:1</td>
                        <td width="91">              9 </td>
                        <td width="91">            687 </td>
                        <td width="91">76:1</td>
                        <td width="91">            488 </td>
                        <td width="91">367.14</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(일반행정:지역:일반)</td>
                        <td width="91">            115 </td>
                        <td width="91">        13,075 </td>
                        <td width="91">114:1</td>
                        <td width="91">            123 </td>
                        <td width="91">        14,184 </td>
                        <td width="91">115:1</td>
                        <td width="91">        10,941 </td>
                        <td width="91">414.09</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(일반행정:지역:장애)</td>
                        <td width="91">              9 </td>
                        <td width="91">            341 </td>
                        <td width="91">38:1</td>
                        <td width="91">              7 </td>
                        <td width="91">            404 </td>
                        <td width="91">58:1</td>
                        <td width="91">            316 </td>
                        <td width="91">383.54</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(우정사업본부:전국:저소득)</td>
                        <td width="91">             16 </td>
                        <td width="91">            271 </td>
                        <td width="91">17:1</td>
                        <td width="91">             19 </td>
                        <td width="91">            374 </td>
                        <td width="91">20:1</td>
                        <td width="91">            304 </td>
                        <td width="91">343.92</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(우정사업본부:지역:일반)</td>
                        <td width="91">            527 </td>
                        <td width="91">        13,386 </td>
                        <td width="91">25:1</td>
                        <td width="91">            595 </td>
                        <td width="91">        16,570 </td>
                        <td width="91">28:1</td>
                        <td width="91">        13,937 </td>
                        <td width="91">397.11</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(우정사업본부:지역:장애)</td>
                        <td width="91">             44 </td>
                        <td width="91">            315 </td>
                        <td width="91">7:1</td>
                        <td width="91">             48 </td>
                        <td width="91">            392 </td>
                        <td width="91">8:1</td>
                        <td width="91">            336 </td>
                        <td width="91">287.86</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(병무청:전국:일반)</td>
                        <td width="91"> - </td>
                        <td width="91"> - </td>
                        <td width="91">-</td>
                        <td width="91">             31 </td>
                        <td width="91">          1,042 </td>
                        <td width="91">34:1</td>
                        <td width="91">            787 </td>
                        <td width="91">379.41</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(병무청:전국:장애)</td>
                        <td width="91"> - </td>
                        <td width="91"> - </td>
                        <td width="91">-</td>
                        <td width="91">              3 </td>
                        <td width="91">             21 </td>
                        <td width="91">7:1</td>
                        <td width="91">             17 </td>
                        <td width="91">269.22</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(병무청:전국:저소득)</td>
                        <td width="91"> - </td>
                        <td width="91"> - </td>
                        <td width="91">-</td>
                        <td width="91">              1 </td>
                        <td width="91">             19 </td>
                        <td width="91">19:1</td>
                        <td width="91">             15 </td>
                        <td width="91">325.96</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(경찰청:전국:일반)</td>
                        <td width="91">            409 </td>
                        <td width="91">        10,031 </td>
                        <td width="91">25:1</td>
                        <td width="91">            344 </td>
                        <td width="91">        15,894 </td>
                        <td width="91">46:1</td>
                        <td width="91">        13,617 </td>
                        <td width="91">404.09</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(경찰청:전국:장애)</td>
                        <td width="91">             33 </td>
                        <td width="91">            292 </td>
                        <td width="91">9:1</td>
                        <td width="91">             27 </td>
                        <td width="91">            366 </td>
                        <td width="91">14:1</td>
                        <td width="91">            297 </td>
                        <td width="91">287.53</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(경찰청:전국:저소득)</td>
                        <td width="91">             13 </td>
                        <td width="91">            196 </td>
                        <td width="91">15:1</td>
                        <td width="91">             11 </td>
                        <td width="91">            301 </td>
                        <td width="91">27:1</td>
                        <td width="91">            240 </td>
                        <td width="91">360.76    / 357.83(양성)</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(고용노동:전국:일반)</td>
                        <td width="91">            409 </td>
                        <td width="91">        13,835 </td>
                        <td width="91">34:1</td>
                        <td width="91">            273 </td>
                        <td width="91">          6,120 </td>
                        <td width="91">22:1</td>
                        <td width="91">          4,921 </td>
                        <td width="91">388.88</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(고용노동:전국:장애)</td>
                        <td width="91">             35 </td>
                        <td width="91">            314 </td>
                        <td width="91">9:1</td>
                        <td width="91">             22 </td>
                        <td width="91">            233 </td>
                        <td width="91">11:1</td>
                        <td width="91">            190 </td>
                        <td width="91">271.76</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(고용노동:전국:저소득)</td>
                        <td width="91">             13 </td>
                        <td width="91">            207 </td>
                        <td width="91">16:1</td>
                        <td width="91">              8 </td>
                        <td width="91">            119 </td>
                        <td width="91">15:1</td>
                        <td width="91">             92 </td>
                        <td width="91">350.86</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(교육행정:일반)</td>
                        <td width="91">             52 </td>
                        <td width="91">        11,641 </td>
                        <td width="91">224:1</td>
                        <td width="91">             60 </td>
                        <td width="91">        10,292 </td>
                        <td width="91">172:1</td>
                        <td width="91">          7,935 </td>
                        <td width="91">409.44    / 406.88(양성)</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(교육행정:장애)</td>
                        <td width="91">              4 </td>
                        <td width="91">            202 </td>
                        <td width="91">51:1</td>
                        <td width="91">              5 </td>
                        <td width="91">            206 </td>
                        <td width="91">41:1</td>
                        <td width="91">            162 </td>
                        <td width="91">370.96</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(교육행정:저소득)</td>
                        <td width="91">              2 </td>
                        <td width="91">            166 </td>
                        <td width="91">83:1</td>
                        <td width="91">              1 </td>
                        <td width="91">            140 </td>
                        <td width="91">140:1</td>
                        <td width="91">             96 </td>
                        <td width="91">361.57</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(선거행정:일반)</td>
                        <td width="91">             70 </td>
                        <td width="91">          1,211 </td>
                        <td width="91">17:1</td>
                        <td width="91">             60 </td>
                        <td width="91">          1,590 </td>
                        <td width="91">27:1</td>
                        <td width="91">          1,189 </td>
                        <td width="91">416.35</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(선거행정:장애)</td>
                        <td width="91">              7 </td>
                        <td width="91">             41 </td>
                        <td width="91">6:1</td>
                        <td width="91">              5 </td>
                        <td width="91">             55 </td>
                        <td width="91">11:1</td>
                        <td width="91">             44 </td>
                        <td width="91">356.94</td>
                    </tr>
                    <tr>
                        <td width="222">행정직(선거행정:저소득)</td>
                        <td width="91">              2 </td>
                        <td width="91">             16 </td>
                        <td width="91">8:1</td>
                        <td width="91">              1 </td>
                        <td width="91">             23 </td>
                        <td width="91">23:1</td>
                        <td width="91">             18 </td>
                        <td width="91">398.03</td>
                    </tr>
                    <tr>
                        <td width="222">직업상담직(직업상담:일반)</td>
                        <td width="91">             36 </td>
                        <td width="91">          1,369 </td>
                        <td width="91">38:1</td>
                        <td width="91">             48 </td>
                        <td width="91">          2,660 </td>
                        <td width="91">55:1</td>
                        <td width="91">          1,940 </td>
                        <td width="91">397.96    / 396.39(양성)</td>
                    </tr>
                    <tr>
                        <td width="222">직업상담직(직업상담:장애)</td>
                        <td width="91">              3 </td>
                        <td width="91">             52 </td>
                        <td width="91">17:1</td>
                        <td width="91">              4 </td>
                        <td width="91">             40 </td>
                        <td width="91">10:1</td>
                        <td width="91">             33 </td>
                        <td width="91">221.12</td>
                    </tr>
                    <tr>
                        <td width="222">직업상담직(직업상담:저소득)</td>
                        <td width="91">              1 </td>
                        <td width="91">             26 </td>
                        <td width="91">26:1</td>
                        <td width="91">              1 </td>
                        <td width="91">             38 </td>
                        <td width="91">38:1</td>
                        <td width="91">             26 </td>
                        <td width="91">354.81</td>
                    </tr>
                    <tr>
                        <td width="222">세무직(세무:일반)</td>
                        <td width="91">            652 </td>
                        <td width="91">        16,094 </td>
                        <td width="91">25:1</td>
                        <td width="91">            855 </td>
                        <td width="91">        19,319 </td>
                        <td width="91">23:1</td>
                        <td width="91">        15,754 </td>
                        <td width="91">387.19</td>
                    </tr>
                    <tr>
                        <td width="222">세무직(세무:장애)</td>
                        <td width="91">             56 </td>
                        <td width="91">            296 </td>
                        <td width="91">5:1</td>
                        <td width="91">             69 </td>
                        <td width="91">            343 </td>
                        <td width="91">5:1</td>
                        <td width="91">            273 </td>
                        <td width="91">212.52</td>
                    </tr>
                    <tr>
                        <td width="222">세무직(세무:저소득)</td>
                        <td width="91">             21 </td>
                        <td width="91">            311 </td>
                        <td width="91">15:1</td>
                        <td width="91">             27 </td>
                        <td width="91">            353 </td>
                        <td width="91">13:1</td>
                        <td width="91">            275 </td>
                        <td width="91">333.82</td>
                    </tr>
                    <tr>
                        <td width="222">관세직(관세:일반)</td>
                        <td width="91">             68 </td>
                        <td width="91">          3,088 </td>
                        <td width="91">45:1</td>
                        <td width="91">            194 </td>
                        <td width="91">          4,820 </td>
                        <td width="91">25:1</td>
                        <td width="91">          4,072 </td>
                        <td width="91">399.72    / 399.06(양성)</td>
                    </tr>
                    <tr>
                        <td width="222">관세직(관세:장애)</td>
                        <td width="91">              6 </td>
                        <td width="91">             77 </td>
                        <td width="91">13:1</td>
                        <td width="91">             16 </td>
                        <td width="91">             84 </td>
                        <td width="91">5:1</td>
                        <td width="91">             61 </td>
                        <td width="91">221.65</td>
                    </tr>
                    <tr>
                        <td width="222">관세직(관세:저소득)</td>
                        <td width="91">              2 </td>
                        <td width="91">             42 </td>
                        <td width="91">21:1</td>
                        <td width="91">              7 </td>
                        <td width="91">             56 </td>
                        <td width="91">8:1</td>
                        <td width="91">             47 </td>
                        <td width="91">344.91</td>
                    </tr>
                    <tr>
                        <td width="222">통계직(통계:일반)</td>
                        <td width="91">             79 </td>
                        <td width="91">          1,416 </td>
                        <td width="91">18:1</td>
                        <td width="91">             78 </td>
                        <td width="91">          1,331 </td>
                        <td width="91">17:1</td>
                        <td width="91">          1,052 </td>
                        <td width="91">397.29</td>
                    </tr>
                    <tr>
                        <td width="222">통계직(통계:장애)</td>
                        <td width="91">              8 </td>
                        <td width="91">             28 </td>
                        <td width="91">4:1</td>
                        <td width="91">              7 </td>
                        <td width="91">             30 </td>
                        <td width="91">4:1</td>
                        <td width="91">             20 </td>
                        <td width="91">270.26</td>
                    </tr>
                    <tr>
                        <td width="222">통계직(통계:저소득)</td>
                        <td width="91">              2 </td>
                        <td width="91">             17 </td>
                        <td width="91">9:1</td>
                        <td width="91">              3 </td>
                        <td width="91">             39 </td>
                        <td width="91">13:1</td>
                        <td width="91">             32 </td>
                        <td width="91">391.34</td>
                    </tr>
                    <tr>
                        <td width="222">교정직(교정:남)</td>
                        <td width="91">            554 </td>
                        <td width="91">          6,113 </td>
                        <td width="91">11:1</td>
                        <td width="91">            219 </td>
                        <td width="91">          6,992 </td>
                        <td width="91">32:1</td>
                        <td width="91">          5,443 </td>
                        <td width="91">379.04</td>
                    </tr>
                    <tr>
                        <td width="222">교정직(교정:여)</td>
                        <td width="91">             20 </td>
                        <td width="91">          1,054 </td>
                        <td width="91">53:1</td>
                        <td width="91">             20 </td>
                        <td width="91">          1,132 </td>
                        <td width="91">57:1</td>
                        <td width="91">            937 </td>
                        <td width="91">382.7</td>
                    </tr>
                    <tr>
                        <td width="222">교정직(교정:저소득)</td>
                        <td width="91">             17 </td>
                        <td width="91">            146 </td>
                        <td width="91">9:1</td>
                        <td width="91">              7 </td>
                        <td width="91">            148 </td>
                        <td width="91">21:1</td>
                        <td width="91">            120 </td>
                        <td width="91">343.53</td>
                    </tr>
                    <tr>
                        <td width="222">보호직(보호:남)</td>
                        <td width="91">            135 </td>
                        <td width="91">          2,706 </td>
                        <td width="91">20:1</td>
                        <td width="91">            177 </td>
                        <td width="91">          3,296 </td>
                        <td width="91">19:1</td>
                        <td width="91">          2,668 </td>
                        <td width="91">376.79</td>
                    </tr>
                    <tr>
                        <td width="222">보호직(보호:여)</td>
                        <td width="91">             59 </td>
                        <td width="91">          3,341 </td>
                        <td width="91">57:1</td>
                        <td width="91">             77 </td>
                        <td width="91">          3,286 </td>
                        <td width="91">43:1</td>
                        <td width="91">          2,671 </td>
                        <td width="91">382.29</td>
                    </tr>
                    <tr>
                        <td width="222">보호직(보호:저소득)</td>
                        <td width="91">              6 </td>
                        <td width="91">            127 </td>
                        <td width="91">21:1</td>
                        <td width="91">              7 </td>
                        <td width="91">            132 </td>
                        <td width="91">19:1</td>
                        <td width="91">            106 </td>
                        <td width="91">315.87</td>
                    </tr>
                    <tr>
                        <td width="222">검찰직(검찰:일반)</td>
                        <td width="91">            170 </td>
                        <td width="91">        10,726 </td>
                        <td width="91">63:1</td>
                        <td width="91">            250 </td>
                        <td width="91">        12,031 </td>
                        <td width="91">48:1</td>
                        <td width="91">          9,216 </td>
                        <td width="91">396.84</td>
                    </tr>
                    <tr>
                        <td width="222">검찰직(검찰:저소득)</td>
                        <td width="91">              5 </td>
                        <td width="91">            157 </td>
                        <td width="91">31:1</td>
                        <td width="91">              7 </td>
                        <td width="91">            213 </td>
                        <td width="91">30:1</td>
                        <td width="91">            158 </td>
                        <td width="91">374.75</td>
                    </tr>
                    <tr>
                        <td width="222">마약수사직(마약수사:일반)</td>
                        <td width="91">             11 </td>
                        <td width="91">            698 </td>
                        <td width="91">63:1</td>
                        <td width="91">              9 </td>
                        <td width="91">            576 </td>
                        <td width="91">64:1</td>
                        <td width="91">            402 </td>
                        <td width="91">395.85    / 382.53(양성)</td>
                    </tr>
                    <tr>
                        <td width="222">마약수사직(마약수사:저소득)</td>
                        <td width="91">              1 </td>
                        <td width="91">             31 </td>
                        <td width="91">31:1</td>
                        <td width="91"> - </td>
                        <td width="91"> - </td>
                        <td width="91">-</td>
                        <td width="91"> - </td>
                        <td width="91">-</td>
                    </tr>
                    <tr>
                        <td width="222">출입국관리직(출입국관리:일반)</td>
                        <td width="91">            213 </td>
                        <td width="91">        10,053 </td>
                        <td width="91">47:1</td>
                        <td width="91">            261 </td>
                        <td width="91">          9,956 </td>
                        <td width="91">38:1</td>
                        <td width="91">          8,133 </td>
                        <td width="91">400.39    / 398.42(양성)</td>
                    </tr>
                    <tr>
                        <td width="222">출입국관리직(출입국관리:저소득)</td>
                        <td width="91">              6 </td>
                        <td width="91">            128 </td>
                        <td width="91">21:1</td>
                        <td width="91">              8 </td>
                        <td width="91">            167 </td>
                        <td width="91">21:1</td>
                        <td width="91">            139 </td>
                        <td width="91">362.69</td>
                    </tr>
                    <tr>
                        <td width="222">철도경찰직(철도경찰:일반)</td>
                        <td width="91">              6 </td>
                        <td width="91">            722 </td>
                        <td width="91">120:1</td>
                        <td width="91">             28 </td>
                        <td width="91">          1,255 </td>
                        <td width="91">45:1</td>
                        <td width="91">            901 </td>
                        <td width="91">374.54</td>
                    </tr>
                    <tr>
                        <td width="222">철도경찰직(철도경찰:저소득)</td>
                        <td width="91"> - </td>
                        <td width="91"> - </td>
                        <td width="91">-</td>
                        <td width="91">              1 </td>
                        <td width="91">             17 </td>
                        <td width="91">17:1</td>
                        <td width="91">             11 </td>
                        <td width="91">305.23</td>
                    </tr>
                    <tr>
                        <td width="222">기술직 계</td>
                        <td width="91">           776 </td>
                        <td width="91">       24,363 </td>
                        <td width="91">31:1</td>
                        <td width="91">           637 </td>
                        <td width="91">       23,760 </td>
                        <td width="91">37:1</td>
                        <td width="91">       18,165 </td>
                        <td width="91">-</td>
                    </tr>
                    <tr>
                        <td width="222">공업직(일반기계:일반)</td>
                        <td width="91">             87 </td>
                        <td width="91">          2,713 </td>
                        <td width="91">31:1</td>
                        <td width="91">             44 </td>
                        <td width="91">          2,493 </td>
                        <td width="91">57:1</td>
                        <td width="91">          1,849 </td>
                        <td width="91">80.00    / 77.00(양성)</td>
                    </tr>
                    <tr>
                        <td width="222">공업직(일반기계:장애)</td>
                        <td width="91">              8 </td>
                        <td width="91">             28 </td>
                        <td width="91">4:1</td>
                        <td width="91">              4 </td>
                        <td width="91">             31 </td>
                        <td width="91">8:1</td>
                        <td width="91">             25 </td>
                        <td width="91">52 </td>
                    </tr>
                    <tr>
                        <td width="222">공업직(일반기계:저소득)</td>
                        <td width="91">              2 </td>
                        <td width="91">             41 </td>
                        <td width="91">21:1</td>
                        <td width="91">              1 </td>
                        <td width="91">             26 </td>
                        <td width="91">26:1</td>
                        <td width="91">             18 </td>
                        <td width="91">58</td>
                    </tr>
                    <tr>
                        <td width="222">공업직(전기:일반)</td>
                        <td width="91">             54 </td>
                        <td width="91">          2,584 </td>
                        <td width="91">48:1</td>
                        <td width="91">             30 </td>
                        <td width="91">          2,287 </td>
                        <td width="91">76:1</td>
                        <td width="91">          1,616 </td>
                        <td width="91">85.00    / 82.00(양성)</td>
                    </tr>
                    <tr>
                        <td width="222">공업직(전기:장애)</td>
                        <td width="91">              4 </td>
                        <td width="91">             23 </td>
                        <td width="91">6:1</td>
                        <td width="91">              3 </td>
                        <td width="91">             22 </td>
                        <td width="91">7:1</td>
                        <td width="91">             14 </td>
                        <td width="91">52</td>
                    </tr>
                    <tr>
                        <td width="222">공업직(전기:저소득)</td>
                        <td width="91">              3 </td>
                        <td width="91">             22 </td>
                        <td width="91">7:1</td>
                        <td width="91">              1 </td>
                        <td width="91">             35 </td>
                        <td width="91">35:1</td>
                        <td width="91">             25 </td>
                        <td width="91">75</td>
                    </tr>
                    <tr>
                        <td width="222">공업직(화공:일반)</td>
                        <td width="91">             21 </td>
                        <td width="91">          1,558 </td>
                        <td width="91">74:1</td>
                        <td width="91">             26 </td>
                        <td width="91">          1,414 </td>
                        <td width="91">54:1</td>
                        <td width="91">          1,111 </td>
                        <td width="91">84</td>
                    </tr>
                    <tr>
                        <td width="222">공업직(화공:장애)</td>
                        <td width="91">              2 </td>
                        <td width="91">              7 </td>
                        <td width="91">4:1</td>
                        <td width="91">              3 </td>
                        <td width="91">              6 </td>
                        <td width="91">2:1</td>
                        <td width="91">              5 </td>
                        <td width="91">76</td>
                    </tr>
                    <tr>
                        <td width="222">공업직(화공:저소득)</td>
                        <td width="91">              1 </td>
                        <td width="91">             11 </td>
                        <td width="91">11:1</td>
                        <td width="91">              1 </td>
                        <td width="91">             16 </td>
                        <td width="91">16:1</td>
                        <td width="91">             12 </td>
                        <td width="91">64</td>
                    </tr>
                    <tr>
                        <td width="222">농업직(일반농업:일반)</td>
                        <td width="91">             77 </td>
                        <td width="91">          3,114 </td>
                        <td width="91">40:1</td>
                        <td width="91">            122 </td>
                        <td width="91">          3,452 </td>
                        <td width="91">28:1</td>
                        <td width="91">          2,683 </td>
                        <td width="91">85</td>
                    </tr>
                    <tr>
                        <td width="222">농업직(일반농업:장애)</td>
                        <td width="91">              6 </td>
                        <td width="91">             39 </td>
                        <td width="91">7:1</td>
                        <td width="91">              9 </td>
                        <td width="91">             30 </td>
                        <td width="91">3:1</td>
                        <td width="91">             25 </td>
                        <td width="91">52</td>
                    </tr>
                    <tr>
                        <td width="222">농업직(일반농업:저소득)</td>
                        <td width="91">              2 </td>
                        <td width="91">             49 </td>
                        <td width="91">25:1</td>
                        <td width="91">              4 </td>
                        <td width="91">             36 </td>
                        <td width="91">9:1</td>
                        <td width="91">             27 </td>
                        <td width="91">49</td>
                    </tr>
                    <tr>
                        <td width="222">임업직(산림자원:일반)</td>
                        <td width="91">             57 </td>
                        <td width="91">          1,651 </td>
                        <td width="91">29:1</td>
                        <td width="91">             47 </td>
                        <td width="91">          1,842 </td>
                        <td width="91">39:1</td>
                        <td width="91">          1,527 </td>
                        <td width="91">83</td>
                    </tr>
                    <tr>
                        <td width="222">임업직(산림자원:장애)</td>
                        <td width="91">              4 </td>
                        <td width="91">             14 </td>
                        <td width="91">4:1</td>
                        <td width="91">              4 </td>
                        <td width="91">             12 </td>
                        <td width="91">3:1</td>
                        <td width="91">              9 </td>
                        <td width="91">56</td>
                    </tr>
                    <tr>
                        <td width="222">임업직(산림자원:저소득)</td>
                        <td width="91">              2 </td>
                        <td width="91">             14 </td>
                        <td width="91">7:1</td>
                        <td width="91">              1 </td>
                        <td width="91">             19 </td>
                        <td width="91">19:1</td>
                        <td width="91">             18 </td>
                        <td width="91">69</td>
                    </tr>
                    <tr>
                        <td width="222">시설직(일반토목:일반)</td>
                        <td width="91">             98 </td>
                        <td width="91">          3,865 </td>
                        <td width="91">39:1</td>
                        <td width="91">             97 </td>
                        <td width="91">          3,863 </td>
                        <td width="91">40:1</td>
                        <td width="91">          3,083 </td>
                        <td width="91">77.00    / 74.00(양성)</td>
                    </tr>
                    <tr>
                        <td width="222">시설직(일반토목:장애)</td>
                        <td width="91">              9 </td>
                        <td width="91">             25 </td>
                        <td width="91">3:1</td>
                        <td width="91">              8 </td>
                        <td width="91">             35 </td>
                        <td width="91">4:1</td>
                        <td width="91">             31 </td>
                        <td width="91">50</td>
                    </tr>
                    <tr>
                        <td width="222">시설직(일반토목:저소득)</td>
                        <td width="91">              4 </td>
                        <td width="91">             26 </td>
                        <td width="91">7:1</td>
                        <td width="91">              3 </td>
                        <td width="91">             27 </td>
                        <td width="91">9:1</td>
                        <td width="91">             22 </td>
                        <td width="91">61</td>
                    </tr>
                    <tr>
                        <td width="222">시설직(건축:일반)</td>
                        <td width="91">             83 </td>
                        <td width="91">          3,035 </td>
                        <td width="91">37:1</td>
                        <td width="91">             26 </td>
                        <td width="91">          2,660 </td>
                        <td width="91">102:1</td>
                        <td width="91">          2,021 </td>
                        <td width="91">82</td>
                    </tr>
                    <tr>
                        <td width="222">시설직(건축:장애)</td>
                        <td width="91">              6 </td>
                        <td width="91">             19 </td>
                        <td width="91">3:1</td>
                        <td width="91">              3 </td>
                        <td width="91">             29 </td>
                        <td width="91">10:1</td>
                        <td width="91">             16 </td>
                        <td width="91">55</td>
                    </tr>
                    <tr>
                        <td width="222">시설직(건축:저소득)</td>
                        <td width="91">              2 </td>
                        <td width="91">             19 </td>
                        <td width="91">10:1</td>
                        <td width="91">              1 </td>
                        <td width="91">             25 </td>
                        <td width="91">25:1</td>
                        <td width="91">             18 </td>
                        <td width="91">51</td>
                    </tr>
                    <tr>
                        <td width="222">시설직(시설조경:일반)</td>
                        <td width="91">              6 </td>
                        <td width="91">            720 </td>
                        <td width="91">120:1</td>
                        <td width="91"> - </td>
                        <td width="91"> - </td>
                        <td width="91">-</td>
                        <td width="91"> - </td>
                        <td width="91">-</td>
                    </tr>
                    <tr>
                        <td width="222">시설직(시설조경:장애인)</td>
                        <td width="91">              1 </td>
                        <td width="91">              6 </td>
                        <td width="91">6:1</td>
                        <td width="91"> - </td>
                        <td width="91"> - </td>
                        <td width="91">-</td>
                        <td width="91"> - </td>
                        <td width="91">-</td>
                    </tr>
                    <tr>
                        <td width="222">방재안전직(방재안전)</td>
                        <td width="91">              3 </td>
                        <td width="91">            476 </td>
                        <td width="91">159:1</td>
                        <td width="91">              3 </td>
                        <td width="91">            593 </td>
                        <td width="91">198:1</td>
                        <td width="91">            420 </td>
                        <td width="91">83</td>
                    </tr>
                    <tr>
                        <td width="222">전산직(전산개발:일반)</td>
                        <td width="91">             97 </td>
                        <td width="91">          2,705 </td>
                        <td width="91">28:1</td>
                        <td width="91">             83 </td>
                        <td width="91">          3,218 </td>
                        <td width="91">39:1</td>
                        <td width="91">          2,458 </td>
                        <td width="91">83</td>
                    </tr>
                    <tr>
                        <td width="222">전산직(전산개발:장애)</td>
                        <td width="91">              8 </td>
                        <td width="91">             42 </td>
                        <td width="91">5:1</td>
                        <td width="91">              7 </td>
                        <td width="91">             55 </td>
                        <td width="91">8:1</td>
                        <td width="91">             37 </td>
                        <td width="91">52</td>
                    </tr>
                    <tr>
                        <td width="222">전산직(전산개발:저소득)</td>
                        <td width="91">              3 </td>
                        <td width="91">             17 </td>
                        <td width="91">6:1</td>
                        <td width="91">              3 </td>
                        <td width="91">             39 </td>
                        <td width="91">13:1</td>
                        <td width="91">             24 </td>
                        <td width="91">69</td>
                    </tr>
                    <tr>
                        <td width="222">전산직(정보보호:일반)</td>
                        <td width="91">             46 </td>
                        <td width="91">            491 </td>
                        <td width="91">11:1</td>
                        <td width="91">              8 </td>
                        <td width="91">            268 </td>
                        <td width="91">34:1</td>
                        <td width="91">            160 </td>
                        <td width="91">75</td>
                    </tr>
                    <tr>
                        <td width="222">전산직(정보보호:장애)</td>
                        <td width="91">              4 </td>
                        <td width="91">              4 </td>
                        <td width="91">1:1</td>
                        <td width="91"> - </td>
                        <td width="91"> - </td>
                        <td width="91">-</td>
                        <td width="91"> - </td>
                        <td width="91">-</td>
                    </tr>
                    <tr>
                        <td width="222">전산직(정보보호:저소득)</td>
                        <td width="91">              1 </td>
                        <td width="91">              4 </td>
                        <td width="91">4:1</td>
                        <td width="91"> - </td>
                        <td width="91"> - </td>
                        <td width="91">-</td>
                        <td width="91"> - </td>
                        <td width="91">-</td>
                    </tr>
                    <tr>
                        <td width="222">방송통신직(전송기술:일반)</td>
                        <td width="91">             68 </td>
                        <td width="91">          1,030 </td>
                        <td width="91">15:1</td>
                        <td width="91">             85 </td>
                        <td width="91">          1,205 </td>
                        <td width="91">14:1</td>
                        <td width="91">            895 </td>
                        <td width="91">74</td>
                    </tr>
                    <tr>
                        <td width="222">방송통신직(전송기술:장애)</td>
                        <td width="91">              5 </td>
                        <td width="91">              9 </td>
                        <td width="91">2:1</td>
                        <td width="91">              7 </td>
                        <td width="91">             11 </td>
                        <td width="91">2:1</td>
                        <td width="91">              8 </td>
                        <td width="91">57</td>
                    </tr>
                    <tr>
                        <td width="222">방송통신직(전송기술:저소득)</td>
                        <td width="91">              2 </td>
                        <td width="91">              2 </td>
                        <td width="91">1:1</td>
                        <td width="91">              3 </td>
                        <td width="91">             11 </td>
                        <td width="91">4:1</td>
                        <td width="91">              8 </td>
                        <td width="91">전원과락</td>
                    </tr>
                </table>
                </div>  
            </div>
        </div>

        <!--시험총평 및 시험후기-->
        <div id="content_3" class="tabCts Cts03">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1706_03_01.jpg" title="시험 총평 및 시험후기, 적중이벤트" />
            @include('willbes.pc.survey.show_graph_partial')

            <div class="tx-center">
                <a href="javascript:pullOpen();">
                    <img src="https://static.willbes.net/public/images/promotion/2020/07/1706_btn02.png" title="설문하기" />
                </a>
            </div>

            <!--
            <div class="Cts03_01">
                <h3>2020년 6월 13일 시행 <span>지방직 9급 시험 총평</span></h3>
                <div>
                    {!! $data['Content'] !!}
                </div>
            </div>
            -->

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2020/07/1706_03_02.jpg" title="시험후기 댓글 이벤트" /></div>
            {{--시험평가댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_evaluate_partial')
            @endif

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2020/07/1706_03_03.jpg" title="소름돋는 적중" /> </div>
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif

        </div>

        <!--기출해설강의-->
        <div id="content_4" class="tabCts Cts04">
            <div><img src="https://static.willbes.net/public/images/promotion/2020/07/1706_04_01.jpg" title="기출해설강의" /></div>
            <div class="lecture">
                <ul>
                    @if(empty($arr_base['promotion_otherinfo_data']) === false)
                        @foreach($arr_base['promotion_otherinfo_data'] as $row)
                            <li>
                                @if(empty($row['ReferValue']) === false)<img src="{{ $row['ReferValue'] }}" title="{{ $row['ProfNickName'] }}" class="prof">@endif
                                <div class="t_tilte">
                                    {{ $row['SubjectName'] }} {{ $row['ProfNickName'] }} 교수<br>
                                    <span>{{ $row['OtherData2'] }}</span>
                                    <p>
                                        @if(empty($row['wUnitIdx']) === true && empty($row['wUnitAttachFile']) === true)
                                            추후 제공 예정입니다.
                                        @else
                                            @if(empty($row['wHD']) === false)
                                            <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','WD');">
                                                <img src="https://static.willbes.net/public/images/promotion/2020/06/1660_btn03.png" title="해설강의">
                                            </a>
                                            @endif

                                            @if(empty($row['wUnitAttachFile']) === false)
                                                <a href="{{ site_url('/promotion/downloadReference?file_idx='.$row['wUnitIdx'].'&event_idx='.$data['ElIdx']) }}">
                                                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1660_btn04.png" title="해설자료">
                                                </a>
                                            @endif
                                        @endif
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->   

    <script type="text/javascript">
        /*tab*/
        $(document).ready(function(){
            var cnt;
            var tab_id = '{{ $arr_base['tab_id'] }}';
            $('#tab'+tab_id).addClass('active');
            $('.evtMenu ul > li').each(function(item){
                cnt = item + 1;
                $("#content_"+cnt).hide();
                if (tab_id == cnt) {
                    $("#content_"+cnt).show();
                }
            });
        });

        function fn_FileDownload(path){
            if(confirm("다운로드 하시겠습니까?")){
                location.href = "/download.do?path="+path;
            }
        }

        function pullOpen(){
            @if(empty($arr_promotion_params['SpIdx']) === true)
                alert('설문정보가 없습니다.');
                return;
            @else
                var url = "{{front_url('/survey/index/' . $arr_promotion_params['SpIdx'])}}";
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }
    </script>

@include('willbes.pc.promotion.roulette_script')
@stop