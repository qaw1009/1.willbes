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

        .sky {position:fixed; top:250px; right:10px; z-index:100;}

        .evtTop {
            background:#C5C8CD url(https://static.willbes.net/public/images/promotion/2020/09/1804_top_bg.jpg) no-repeat center top;
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

        .evtMenu { position:absolute; left:50%; margin-left:-560px; bottom:0; z-index:10}
        .evtMenu ul {width:1120px; margin:0 auto;}
        .evtMenu li {display:inline; float:left; width:25%}
        .evtMenu li a {
            display:block; text-align:center; padding:30px 0; color:#fff; font-size:24px; 
            background:#869fbd; border:1px solid #869FF2; border-bottom:0; margin-right:4px
        }  
        .evtMenu li:last-child a {margin:0}
        .evtMenu li a span {font-size:16px}
        .evtMenu li a div {margin-top:8px;color:#3b6aa4}
        .evtMenu li:hover a,
        .evtMenu li a.active {background:#fff; color:#363636; border:1px solid #fff;}
        .evtMenu li:hover a span,
        .evtMenu li a.active span {color:#363636}
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
        .tabCts .youtube {width:100%; text-align:center; margin:3em 0}	
        .tabCts .youtube iframe {width:800px; height:453px; margin:0 auto}

        #content_1 {padding-bottom:100px;}
        #content_2_01 {padding-bottom:150px;}
        .download {font-weight:bold;font-size:17px;padding-bottom:35px;}

        .Cts02 a {display:inline-block; padding:5px 10px; color:#fff; background:#363636; font-size:90%; margin-left:20px}
        .Cts02 a:hover {background:#959595;color:#fff;}

        .tabMenu{width:360px;margin:0 auto 100px;}
        .tabMenu li{display:inline;float:left;width:50%;}
        .tabMenu li a{display:block;text-align:center;border:3px solid #959595;font-size:140%;
                     font-weight:500;margin-right:2px;padding:20px 0;color:#959595;background:#fff;border-radius:25px;}
        .tabMenu li a.active{color:#fff;background:#959595;}
        
        .boardD {width:980px; border-spacing:0px; border:1px solid #dedede; table-layout:auto; color:#666; margin:0 auto} 
        .boardD caption {display:none}
        .boardD th,
        .boardD td {font-size:14px}
        .boardD th {padding:15px 5px; background:#f5f5f5; border-right:1px solid #dedede; border-bottom:1px solid #dedede; color:#333}
        .boardD thead th {background:#eee; color:#333}
        .boardD td {padding:15px 5px; margin:0; border:none; text-align:center; border-right:1px solid #dedede; border-bottom:1px solid #dedede}
        .boardD td:nth-child(4) {color:#000}
        .boardD td:last-child {color:#C00}
        .boardD tr.gray th,
        .boardD tr.gray td {background:#f6f6f6}
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
            width:200px !important; border:1px solid #ccc;
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

        <div class="sky">
            <a href="https://pass.willbes.net/promotion/index/cate/3020/code/1750" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1804_sky.png" alt="" />
            </a>
        </div>         

        <div class="evtCtnsBox evtTop" >
            <span class="img01">
                <a href="/promotion/index/cate/3019/code/1804/SsIdx/10?tab=1#content_1">
                    <img src="https://static.willbes.net/public/images/promotion/2020/09/1804_top_img01.png" alt="신문">
                </a>
            </span>
            <span class="img02"><img src="https://static.willbes.net/public/images/promotion/2020/09/1804_top_img02.png" alt="상품"></span>
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1804_top.jpg" title="국가직 7급 풀캐어 서비스" />
            <div class="evtMenu" id="evtMenu">                
                <ul>
                    <li>
                        <a id='tab1' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1804/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=1#content_1') }}">
                            <span>행정/세무/외영직</span>
                            <div class="NSK-Black">적중모의고사 무료</div>
                        </a>
                    </li>
                    <li>
                        <a id='tab2' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1804/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=2#content_2') }}">
                            <span>경쟁률 및 체감난이도</span>
                            <div class="NSK-Black">지난 시험 완벽 분석</div>				
                        </a>
                    </li>
                    <li>
                        {{--<a id='tab3' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1804/SsIdx/2?tab=3#content_3') }}">--}}
                         <a id='tab3' href="javascript:alert('9.26(토) 오픈!')">
                            <span>시험 후 당충전 필수!</span>
                            <div class="NSK-Black">시험총평&이벤트</div>
                        </a>
                    </li>     
                    <li>
                        {{-- <a id='tab4' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1804/SsIdx/2?tab=4#content_4') }}">--}}
                        <a id='tab4' href="javascript:alert('9.28(월) 오픈!')">
                            <span>2020 국가직 7급</span>
                            <div class="NSK-Black">기출해설강의</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>        

        <div id="content_1" class="tabCts">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1804_01_01.jpg" usemap="#Map1804a" border="0">
            <map name="Map1804a" id="Map1804a">
                <area shape="rect" coords="228,891,538,992" href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" />
                <area shape="rect" coords="576,891,887,996" href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" />
            </map>
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1804_01_02.jpg" title="" /> 
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1804_01_03.jpg" title="" />          
            <div class="youtube">
                <iframe class="youtubePlayer" src="https://www.youtube.com/embed/gpppIN1ISaw?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div><a href="https://www.gosi.kr/?bbsId=BBSMSTR_000000000131" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/09/1804_btn01.png" title="필기시험 장소 안내 바로가기" /></a> </div>   
        </div>

        <!--완벽분석-->
        <div id="content_2" class="tabCts Cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1804_02_01.jpg" title="" id="content_2_01" />
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1804_02_02.jpg" title="" />           
            <div class="mt20 mb100">
                <p class="download">
                * 2020 국가직 7급 시험문제&가답안 다운로드 <a href="https://www.gosi.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000138" target="_blank">바로가기 ></a>
                </p>
                <ul class="tabMenu">
                	<li><a href="#tabs1" class="active">행정직</a></li>
                    <li><a href="#tabs2" class="">기술직</a></li>
                </ul>
                <div class="mt20" id="tabs1">
                    <table cellspacing="0" cellpadding="0" class="boardD">
                        <col width="190" />
                        <col width="101" span="7" />
                        <col width="177" />
                        <tr>
                            <td rowspan="2" width="190">　</td>
                            <td colspan="3" width="303">2020년</td>
                            <td colspan="5" width="581">2019년</td>
                        </tr>
                        <tr>
                            <td width="101"> 선발예정인원 </td>
                            <td width="101"> 접수인원 </td>
                            <td width="101">경쟁률</td>
                            <td width="101"> 선발예정인원 </td>
                            <td width="101"> 접수인원 </td>
                            <td width="101">경쟁률</td>
                            <td width="101">응시인원</td>
                            <td width="177">합격선</td>
                        </tr>
                        <tr>
                            <td width="190">소계(행정직) </td>
                            <td width="101">             562 </td>
                            <td width="101">         29,826 </td>
                            <td width="101">64.13:1</td>
                            <td width="101">             534 </td>
                            <td width="101">         30,310 </td>
                            <td width="101">86.39:1</td>
                            <td width="101">　</td>
                            <td width="177">　</td>
                        </tr>
                        <tr>
                            <td width="190">행정직(일반행정:일반)</td>
                            <td width="101">              185 </td>
                            <td width="101">          13,041 </td>
                            <td width="101">70.49:1</td>
                            <td width="101">              153 </td>
                            <td width="101">          13,073 </td>
                            <td width="101">85.44:1</td>
                            <td width="101">            9,298 </td>
                            <td width="177">80.83<br />
                            80.00(지방)</td>
                        </tr>
                        <tr>
                            <td width="190">행정직(일반행정:장애인)</td>
                            <td width="101">               15 </td>
                            <td width="101">              172 </td>
                            <td width="101">11.47:1</td>
                            <td width="101">               11 </td>
                            <td width="101">              178 </td>
                            <td width="101">16.18:1</td>
                            <td width="101">              119 </td>
                            <td width="177">64.16<br />
                            61.66(양성)</td>
                        </tr>
                        <tr>
                            <td width="190">행정직(우정사업본부:일반)</td>
                            <td width="101">               35 </td>
                            <td width="101">              857 </td>
                            <td width="101">24.49:1</td>
                            <td width="101">               27 </td>
                            <td width="101">              772 </td>
                            <td width="101">28.59:1</td>
                            <td width="101">              518 </td>
                            <td width="177">76.66<br />
                            75.83(양성)</td>
                        </tr>
                        <tr>
                            <td width="190">행정직(우정사업본부:장애인)</td>
                            <td width="101">                3 </td>
                            <td width="101">               21 </td>
                            <td width="101">7.00:1</td>
                            <td width="101">                2 </td>
                            <td width="101">               23 </td>
                            <td width="101">11.50:1</td>
                            <td width="101">               15 </td>
                            <td width="177">52.5</td>
                        </tr>
                        <tr>
                            <td width="190">행정직(인사조직)</td>
                            <td width="101">                3 </td>
                            <td width="101">            1,929 </td>
                            <td width="101">643.00:1</td>
                            <td width="101">                5 </td>
                            <td width="101">            2,178 </td>
                            <td width="101">435.60:1</td>
                            <td width="101">               87 </td>
                            <td width="177">86.66</td>
                        </tr>
                        <tr>
                            <td width="190">행정직(재경:일반)</td>
                            <td width="101">                9 </td>
                            <td width="101">              138 </td>
                            <td width="101">15.33:1</td>
                            <td width="101"> - </td>
                            <td width="101"> - </td>
                            <td width="101">-</td>
                            <td width="101"> - </td>
                            <td width="177">-</td>
                        </tr>
                        <tr>
                            <td width="190">행정직(재경:장애인)</td>
                            <td width="101">                1 </td>
                            <td width="101">                2 </td>
                            <td width="101">2.00:1</td>
                            <td width="101"> - </td>
                            <td width="101"> - </td>
                            <td width="101">-</td>
                            <td width="101"> - </td>
                            <td width="177">-</td>
                        </tr>
                        <tr>
                            <td width="190">행정직(고용노동:일반)</td>
                            <td width="101">               65 </td>
                            <td width="101">            1,210 </td>
                            <td width="101">18.62:1</td>
                            <td width="101">              109 </td>
                            <td width="101">            1,100 </td>
                            <td width="101">10.09:1</td>
                            <td width="101">              805 </td>
                            <td width="177">71.66<br />
                            71.33(지방) / 70.50(양성)</td>
                        </tr>
                        <tr>
                            <td width="190">행정직(고용노동:장애인)</td>
                            <td width="101">                5 </td>
                            <td width="101">               58 </td>
                            <td width="101">11.60:1</td>
                            <td width="101">                8 </td>
                            <td width="101">               52 </td>
                            <td width="101">6.50:1</td>
                            <td width="101">               27 </td>
                            <td width="177">50</td>
                        </tr>
                        <tr>
                            <td width="190">행정직(교육행정:일반)</td>
                            <td width="101">                4 </td>
                            <td width="101">              759 </td>
                            <td width="101">189.75:1</td>
                            <td width="101">                3 </td>
                            <td width="101">              689 </td>
                            <td width="101">229.67:1</td>
                            <td width="101">              451 </td>
                            <td width="177">81.66</td>
                        </tr>
                        <tr>
                            <td width="190">행정직(회계:일반)</td>
                            <td width="101">                3 </td>
                            <td width="101">               95 </td>
                            <td width="101">31.67:1</td>
                            <td width="101">                2 </td>
                            <td width="101">               68 </td>
                            <td width="101">34.00:1</td>
                            <td width="101">               40 </td>
                            <td width="177">71.66</td>
                        </tr>
                        <tr>
                            <td width="190">행정직(선거행정:일반)</td>
                            <td width="101">                9 </td>
                            <td width="101">              942 </td>
                            <td width="101">104.67:1</td>
                            <td width="101">                9 </td>
                            <td width="101">            1,063 </td>
                            <td width="101">118.11:1</td>
                            <td width="101">              722 </td>
                            <td width="177">84.16</td>
                        </tr>
                        <tr>
                            <td width="190">행정직(선거행정:장애인)</td>
                            <td width="101">                1 </td>
                            <td width="101">               19 </td>
                            <td width="101">19.00:1</td>
                            <td width="101">                1 </td>
                            <td width="101">               27 </td>
                            <td width="101">27.00:1</td>
                            <td width="101">               18 </td>
                            <td width="177">59.16</td>
                        </tr>
                        <tr>
                            <td width="190">세무직(세무:일반)</td>
                            <td width="101">               72 </td>
                            <td width="101">            2,713 </td>
                            <td width="101">37.68:1</td>
                            <td width="101">               76 </td>
                            <td width="101">            3,081 </td>
                            <td width="101">40.54:1</td>
                            <td width="101">            2,310 </td>
                            <td width="177">78.33<br />
                            77.50(지방)</td>
                        </tr>
                        <tr>
                            <td width="190">세무직(세무:장애인)</td>
                            <td width="101">                6 </td>
                            <td width="101">               72 </td>
                            <td width="101">12.00:1</td>
                            <td width="101">                6 </td>
                            <td width="101">               76 </td>
                            <td width="101">12.67:1</td>
                            <td width="101">               50 </td>
                            <td width="177">55.83</td>
                        </tr>
                        <tr>
                            <td width="190">관세직(관세:일반)</td>
                            <td width="101">                7 </td>
                            <td width="101">              503 </td>
                            <td width="101">71.86:1</td>
                            <td width="101">                7 </td>
                            <td width="101">              686 </td>
                            <td width="101">98.00:1</td>
                            <td width="101">              555 </td>
                            <td width="177">86.66</td>
                        </tr>
                        <tr>
                            <td width="190">관세직(관세:장애인)</td>
                            <td width="101">                1 </td>
                            <td width="101">               14 </td>
                            <td width="101">14.00:1</td>
                            <td width="101">                1 </td>
                            <td width="101">               15 </td>
                            <td width="101">15.00:1</td>
                            <td width="101">               10 </td>
                            <td width="177">65</td>
                        </tr>
                        <tr>
                            <td width="190">통계직(통계:일반)</td>
                            <td width="101">               13 </td>
                            <td width="101">              324 </td>
                            <td width="101">24.92:1</td>
                            <td width="101">               11 </td>
                            <td width="101">              295 </td>
                            <td width="101">26.82:1</td>
                            <td width="101">              212 </td>
                            <td width="177">81.66<br />
                            81.33(지방)</td>
                        </tr>
                        <tr>
                            <td width="190">통계직(통계:장애인)</td>
                            <td width="101">                1 </td>
                            <td width="101">               10 </td>
                            <td width="101">10.00:1</td>
                            <td width="101">                1 </td>
                            <td width="101">                9 </td>
                            <td width="101">9.00:1</td>
                            <td width="101">                3 </td>
                            <td width="177">전원과락</td>
                        </tr>
                        <tr>
                            <td width="190">감사직(감사:일반)</td>
                            <td width="101">               13 </td>
                            <td width="101">              856 </td>
                            <td width="101">65.85:1</td>
                            <td width="101">               26 </td>
                            <td width="101">            1,003 </td>
                            <td width="101">38.58:1</td>
                            <td width="101">              793 </td>
                            <td width="177">85.83</td>
                        </tr>
                        <tr>
                            <td width="190">감사직(감사:장애인)</td>
                            <td width="101">                1 </td>
                            <td width="101">               17 </td>
                            <td width="101">17.00:1</td>
                            <td width="101">                2 </td>
                            <td width="101">               23 </td>
                            <td width="101">11.50:1</td>
                            <td width="101">               16 </td>
                            <td width="177">73.33</td>
                        </tr>
                        <tr>
                            <td width="190">교정직(교정)</td>
                            <td width="101">               30 </td>
                            <td width="101">              756 </td>
                            <td width="101">25.20:1</td>
                            <td width="101">               30 </td>
                            <td width="101">              922 </td>
                            <td width="101">30.73:1</td>
                            <td width="101">              674 </td>
                            <td width="177">80</td>
                        </tr>
                        <tr>
                            <td width="190">보호직(보호)</td>
                            <td width="101">                5 </td>
                            <td width="101">              127 </td>
                            <td width="101">25.40:1</td>
                            <td width="101"> - </td>
                            <td width="101"> - </td>
                            <td width="101">-</td>
                            <td width="101"> - </td>
                            <td width="177">-</td>
                        </tr>
                        <tr>
                            <td width="190">검찰직(검찰)</td>
                            <td width="101">               10 </td>
                            <td width="101">            1,551 </td>
                            <td width="101">155.10:1</td>
                            <td width="101">               10 </td>
                            <td width="101">            1,434 </td>
                            <td width="101">143.40:1</td>
                            <td width="101">              921 </td>
                            <td width="177">85.83</td>
                        </tr>
                        <tr>
                            <td width="190">출입국관리직(출입국관리)</td>
                            <td width="101">               25 </td>
                            <td width="101">            1,276 </td>
                            <td width="101">51.04:1</td>
                            <td width="101">                2 </td>
                            <td width="101">            1,096 </td>
                            <td width="101">548.00:1</td>
                            <td width="101">              820 </td>
                            <td width="177">83.33</td>
                        </tr>
                        <tr>
                            <td width="190">외무영사직(일반)</td>
                            <td width="101">               37 </td>
                            <td width="101">            2,336 </td>
                            <td width="101">63.14:1</td>
                            <td width="101">               30 </td>
                            <td width="101">            2,415 </td>
                            <td width="101">80.50:1</td>
                            <td width="101">            2,103 </td>
                            <td width="177">87.5</td>
                        </tr>
                        <tr>
                            <td width="190">외무영사직(장애인)</td>
                            <td width="101">                3 </td>
                            <td width="101">               28 </td>
                            <td width="101">9.33:1</td>
                            <td width="101">                2 </td>
                            <td width="101">               32 </td>
                            <td width="101">16.00:1</td>
                            <td width="101">               22 </td>
                            <td width="177">70</td>
                        </tr>
                    </table>
                </div>
                <div class="mt20" id="tabs2">  
                    <table cellspacing="0" cellpadding="0" class="boardD">
                        <col width="190" />
                        <col width="101" span="7" />
                        <col width="177" />
                        <tr>
                            <td rowspan="2" width="190">　</td>
                            <td colspan="3" width="303">2020년</td>
                            <td colspan="5" width="581">2019년</td>
                        </tr>
                        <tr>
                            <td width="101"> 선발예정인원 </td>
                            <td width="101"> 접수인원 </td>
                            <td width="101">경쟁률</td>
                            <td width="101"> 선발예정인원 </td>
                            <td width="101"> 접수인원 </td>
                            <td width="101">경쟁률</td>
                            <td width="101">응시인원</td>
                            <td width="177">합격선</td>
                        </tr>
                        <tr>
                            <td width="190">소계(기술직) </td>
                            <td width="101">             193 </td>
                            <td width="101">           4,877 </td>
                            <td width="101">27.00:1</td>
                            <td width="101">             210 </td>
                            <td width="101">           4,928 </td>
                            <td width="101">19.21:1</td>
                            <td width="101">           3,304 </td>
                            <td width="177">　</td>
                        </tr>
                        <tr>
                            <td width="190">공업직(일반기계:일반)</td>
                            <td width="101">               25 </td>
                            <td width="101">              675 </td>
                            <td width="101">27.00:1</td>
                            <td width="101">               24 </td>
                            <td width="101">              600 </td>
                            <td width="101">25.00:1</td>
                            <td width="101">              405 </td>
                            <td width="177">75.00<br />
                            74.16(양성)</td>
                        </tr>
                        <tr>
                            <td width="190">공업직(일반기계:장애인)</td>
                            <td width="101">                2 </td>
                            <td width="101">                4 </td>
                            <td width="101">2.00:1</td>
                            <td width="101">                3 </td>
                            <td width="101">                5 </td>
                            <td width="101">1.67:1</td>
                            <td width="101">                2 </td>
                            <td width="177">44.16</td>
                        </tr>
                        <tr>
                            <td width="190">공업직(전기:일반)</td>
                            <td width="101">               21 </td>
                            <td width="101">              598 </td>
                            <td width="101">28.48:1</td>
                            <td width="101">               21 </td>
                            <td width="101">              606 </td>
                            <td width="101">28.86:1</td>
                            <td width="101">              380 </td>
                            <td width="177">75.00<br />
                            73.33(지방) / 72.50(양성)</td>
                        </tr>
                        <tr>
                            <td width="190">공업직(전기:장애인)</td>
                            <td width="101">                2 </td>
                            <td width="101">                8 </td>
                            <td width="101">4.00:1</td>
                            <td width="101">                3 </td>
                            <td width="101">                5 </td>
                            <td width="101">1.67:1</td>
                            <td width="101">                4 </td>
                            <td width="177">50</td>
                        </tr>
                        <tr>
                            <td width="190">공업직(화공:일반)</td>
                            <td width="101">               12 </td>
                            <td width="101">              584 </td>
                            <td width="101">48.67:1</td>
                            <td width="101">               19 </td>
                            <td width="101">              570 </td>
                            <td width="101">30.00:1</td>
                            <td width="101">              418 </td>
                            <td width="177">82.50<br />
                            80.00(양성)</td>
                        </tr>
                        <tr>
                            <td width="190">공업직(화공:장애인)</td>
                            <td width="101">                1 </td>
                            <td width="101">                8 </td>
                            <td width="101">8.00:1</td>
                            <td width="101">                2 </td>
                            <td width="101">                3 </td>
                            <td width="101">1.50:1</td>
                            <td width="101">                3 </td>
                            <td width="177">50.83</td>
                        </tr>
                        <tr>
                            <td width="190">농업직(일반농업:일반)</td>
                            <td width="101">                9 </td>
                            <td width="101">              546 </td>
                            <td width="101">60.67:1</td>
                            <td width="101">               18 </td>
                            <td width="101">              541 </td>
                            <td width="101">30.06:1</td>
                            <td width="101">              361 </td>
                            <td width="177">76.66</td>
                        </tr>
                        <tr>
                            <td width="190">농업직(일반농업:장애인)</td>
                            <td width="101">                1 </td>
                            <td width="101">                5 </td>
                            <td width="101">5.00:1</td>
                            <td width="101">                1 </td>
                            <td width="101">                5 </td>
                            <td width="101">5.00:1</td>
                            <td width="101">                4 </td>
                            <td width="177">55.83</td>
                        </tr>
                        <tr>
                            <td width="190">임업직(산림자원:일반)</td>
                            <td width="101">                5 </td>
                            <td width="101">              231 </td>
                            <td width="101">46.20:1</td>
                            <td width="101">                5 </td>
                            <td width="101">              234 </td>
                            <td width="101">46.80:1</td>
                            <td width="101">              147 </td>
                            <td width="177">78.33<br />
                            75.83(양성)</td>
                        </tr>
                        <tr>
                            <td width="190">임업직(산림자원:장애인)</td>
                            <td width="101">                1 </td>
                            <td width="101">                2 </td>
                            <td width="101">2.00:1</td>
                            <td width="101"> - </td>
                            <td width="101"> - </td>
                            <td width="101">-</td>
                            <td width="101">　</td>
                            <td width="177">　</td>
                        </tr>
                        <tr>
                            <td width="190">시설직(일반토목:일반)</td>
                            <td width="101">               30 </td>
                            <td width="101">              410 </td>
                            <td width="101">13.67:1</td>
                            <td width="101">               28 </td>
                            <td width="101">              468 </td>
                            <td width="101">16.71:1</td>
                            <td width="101">              321 </td>
                            <td width="177">73.33<br />
                            71.66(양성)</td>
                        </tr>
                        <tr>
                            <td width="190">시설직(일반토목:장애인)</td>
                            <td width="101">                3 </td>
                            <td width="101">                7 </td>
                            <td width="101">2.33:1</td>
                            <td width="101">                2 </td>
                            <td width="101">                9 </td>
                            <td width="101">4.50:1</td>
                            <td width="101">                5 </td>
                            <td width="177">전원과락</td>
                        </tr>
                        <tr>
                            <td width="190">시설직(건축:일반)</td>
                            <td width="101">               23 </td>
                            <td width="101">              480 </td>
                            <td width="101">20.87:1</td>
                            <td width="101">               30 </td>
                            <td width="101">              497 </td>
                            <td width="101">16.57:1</td>
                            <td width="101">              319 </td>
                            <td width="177">66.66</td>
                        </tr>
                        <tr>
                            <td width="190">시설직(건축:장애인)</td>
                            <td width="101">                2 </td>
                            <td width="101">                4 </td>
                            <td width="101">2.00:1</td>
                            <td width="101">                2 </td>
                            <td width="101">                6 </td>
                            <td width="101">3.00:1</td>
                            <td width="101">                5 </td>
                            <td width="177">48.83</td>
                        </tr>
                        <tr>
                            <td width="190">방재안전직(방재안전:일반)</td>
                            <td width="101">                5 </td>
                            <td width="101">              123 </td>
                            <td width="101">24.60:1</td>
                            <td width="101">                2 </td>
                            <td width="101">              152 </td>
                            <td width="101">76.00:1</td>
                            <td width="101">               84 </td>
                            <td width="177">77.5</td>
                        </tr>
                        <tr>
                            <td width="190">전산직(전산개발:일반)</td>
                            <td width="101">               33 </td>
                            <td width="101">              957 </td>
                            <td width="101">29.00:1</td>
                            <td width="101">               30 </td>
                            <td width="101">              980 </td>
                            <td width="101">32.67:1</td>
                            <td width="101">              691 </td>
                            <td width="177">74.16<br />
                            72.5(양성)</td>
                        </tr>
                        <tr>
                            <td width="190">전산직(전산개발:장애인)</td>
                            <td width="101">                2 </td>
                            <td width="101">               17 </td>
                            <td width="101">8.50:1</td>
                            <td width="101">                2 </td>
                            <td width="101">               17 </td>
                            <td width="101">8.50:1</td>
                            <td width="101">               13 </td>
                            <td width="177">58.33</td>
                        </tr>
                        <tr>
                            <td width="190">방송통신직(전송기술:일반)</td>
                            <td width="101">               15 </td>
                            <td width="101">              214 </td>
                            <td width="101">14.27:1</td>
                            <td width="101">               17 </td>
                            <td width="101">              226 </td>
                            <td width="101">13.29:1</td>
                            <td width="101">              141 </td>
                            <td width="177">65.83<br />
                            64.16(양성)</td>
                        </tr>
                        <tr>
                            <td width="190">방송통신직(전송기술:장애인)</td>
                            <td width="101">                1 </td>
                            <td width="101">                4 </td>
                            <td width="101">4.00:1</td>
                            <td width="101">                1 </td>
                            <td width="101">                4 </td>
                            <td width="101">4.00:1</td>
                            <td width="101">                1 </td>
                            <td width="177">전원과락</td>
                        </tr>
                    </table>                    
                    <p>&nbsp;</p>
                </div>  
            </div>
        </div>

        <!--시험총평 및 시험후기-->
        <div id="content_3" class="tabCts Cts03">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1804_03_01.jpg" title="시험 총평 및 시험후기, 적중이벤트" />
            @include('willbes.pc.survey.show_graph_partial')

            <div class="tx-center">
                <a href="javascript:pullOpen();">
                    <img src="https://static.willbes.net/public/images/promotion/2019/03/1140_btn02.png" title="설문하기" />
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

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2020/09/1804_03_02.jpg" title="시험후기 댓글 이벤트" /></div>
            {{--시험평가댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_evaluate_partial')
            @endif

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2020/09/1804_03_03.jpg" title="소름돋는 적중" /> </div>
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif

        </div>

        <!--기출해설강의-->
        <div id="content_4" class="tabCts Cts04">
            <div><img src="https://static.willbes.net/public/images/promotion/2020/09/1804_04_01.jpg" title="기출해설강의" /></div>
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
                                                <img src="https://static.willbes.net/public/images/promotion/2020/06/1804_btn03.png" title="해설강의">
                                            </a>
                                            @endif

                                            @if(empty($row['wUnitAttachFile']) === false)
                                                <a href="{{ site_url('/promotion/downloadReference?file_idx='.$row['wUnitIdx'].'&event_idx='.$data['ElIdx']) }}">
                                                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1804_btn04.png" title="해설자료">
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
         $('.tabMenu').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);

                $links.not($active).each(function(){
                    $(this.hash).hide();
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault();
                });
            });
            
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
            @if(empty($arr_promotion_params['SsIdx']) === true)
                alert('설문정보가 없습니다.');
                return;
            @else
                var url = "{{front_url('/survey/index/' . $arr_promotion_params['SsIdx'])}}";
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }
    </script>
@stop