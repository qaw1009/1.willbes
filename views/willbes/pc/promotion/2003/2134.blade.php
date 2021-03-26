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

        .sky {position:fixed; top:310px; right:0; z-index:11;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/03/2134_top_bg.jpg) no-repeat center top; }
        .youtube {position:absolute; top:1050px; left:50%;z-index:12;margin-left:-450px}
        .youtube iframe {width:900px; height:525px;}
    

        .evtMenu { position:absolute; left:50%; margin-left:-560px; z-index:10;padding-top:550px;}
        .evtMenu ul {width:1120px; margin:0 auto;}
        .evtMenu li {display:inline; float:left; width:25%}
        .evtMenu li a {
            display:block; text-align:center; padding:30px 0; color:#7d7d7d; font-size:24px; 
            background:#e0dfdf;border-bottom:0; margin-right:4px;border:1px solid #bfbfbf;}  
        .evtMenu li:last-child a {margin:0}
        .evtMenu li a span {font-size:16px}
        .evtMenu li a div {margin-top:8px;color:#7d7d7d}
        .evtMenu li:hover a,
        .evtMenu li a.active {background:#fff; color:#363636; border:2px solid #b12f6f;}
        .evtMenu li:hover:after {content:"▼"; display:block; clear:both;color:#b12f6f;font-size:25px;}

        .evtMenu li:hover a span,
        .evtMenu li a.active span {color:#363636;font-weight:bold;}
        .evtMenu li:hover a div,
        .evtMenu li a.active div {color:#b12f6f}
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

        #content_1 {padding-bottom:100px;padding-top:500px;}
        #content_2_01 {padding-bottom:50px;padding-top:500px;}
        #content_3 {padding-top:600px;}
        #content_4 {padding-top:600px;}
        .download {font-weight:bold;font-size:17px;padding-bottom:35px;color:#b12f6f}

        .Cts02 a {display:inline-block; padding:5px 10px; color:#f1e0e7; background:#b12f6f; font-size:90%; margin-left:20px}

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
        .boardD td {padding:15px 5px; margin:0; border:none; text-align:center; border-right:1px solid #dedede; border-bottom:1px solid #dedede;color:#000;}
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
            <a href="#none;">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2134_sky.png" alt="커밍쑨" />
            </a>
        </div>         

        <div class="evtCtnsBox evtTop" >
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2134_top.jpg" title="소방직 풀케어 서비스" />
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/--iyzvZDf2M?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="evtMenu" id="evtMenu">                
                <ul>
                    <li>
                        <a id='tab1' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/2134/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=1#content_1') }}">
                            <span>수험생이면 누구나</span>
                            <div class="NSK-Black">적중모의고사 무료</div>
                        </a>
                    </li>
                    <li>
                        <a id='tab2' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/2134/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=2#content_2') }}">
                            <span>경쟁률 및 합격선</span>
                            <div class="NSK-Black">지난 시험 완벽 분석</div>				
                        </a>
                    </li>
                    <li>
                        <a id='tab3' href="@if(time() < strtotime('202104031140')) javascript:alert('4.03(토)오픈!') @else {{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/' . $arr_base['promotion_code'] . '/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=3#content_3') }}@endif">
                            <span>후기 나누고 간식 먹자!</span>
                            <div class="NSK-Black">시험 후기&이벤트</div>
                        </a>
                    </li>     
                    <li>
                        <a id='tab4' href="@if(time() < strtotime('202104051600')) javascript:alert('4.05(월)오픈!') @else {{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/' . $arr_base['promotion_code'] . '/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=4#content_4') }}@endif">
                            <span>2021 소방직</span>
                            <div class="NSK-Black">기출해설특강</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>        

        <div id="content_1" class="tabCts">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2134_01_01.jpg">
            <a href="@if($file_yn[0] == 'Y'){{ front_url($file_link[0]) }}@else{{ $file_link[0] }}@endif" @if($file_yn[0] == 'Y') target="_blank" @endif title="문제&해설 다운로드" style="position: absolute; left: 35.98%; top: 45.73%; width: 27.86%; height: 3.93%; z-index: 2;"></a>
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2134_01_02.jpg" title="유의사항" />        
        </div>

        <!--완벽분석-->
        <div id="content_2" class="tabCts Cts02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2134_02_01.jpg" title="" id="content_2_01" />
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2134_02_02.jpg" title="" />           
            <div class="mt20 mb100">
                <p class="download">
                2021 소방직 시험문제&가답안 다운로드 <a href="https://119gosi.kr:444/bbs/board.php?bo_table=040301" target="_blank">바로가기 ></a>
                </p>
                <div class="mt20" id="tabs1">
                    <table cellspacing="0" cellpadding="0" class="boardD">
                        <col width="72" span="15" />
                        <tr style="background:#BFBFBF">
                            <td rowspan="3" width="72">지역</td>
                            <td colspan="6" width="432">2021년도</td>
                            <td colspan="8" width="576">2020년도</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="background:#BDD7EE">남</td>
                            <td colspan="3" style="background:#F8CBAD">여</td>
                            <td colspan="4" style="background:#BDD7EE">남</td>
                            <td colspan="4" style="background:#F8CBAD">여</td>
                        </tr>
                        <tr>
                            <td style="background:#DEEBF7">선발예정</td>
                            <td style="background:#DEEBF7">접수인원</td>
                            <td style="background:#DEEBF7">경쟁률</td>
                            <td style="background:#FBE5D6">선발예정</td>
                            <td style="background:#FBE5D6">접수인원</td>
                            <td style="background:#FBE5D6">경쟁률</td>
                            <td style="background:#DEEBF7">선발예정</td>
                            <td style="background:#DEEBF7">접수인원</td>
                            <td style="background:#DEEBF7">경쟁률</td>
                            <td style="background:#DEEBF7">합격선</td>
                            <td style="background:#FBE5D6">선발예정</td>
                            <td style="background:#FBE5D6">접수인원</td>
                            <td style="background:#FBE5D6">경쟁률</td>
                            <td style="background:#FBE5D6">합격선</td>
                        </tr>
                        <tr>
                            <td>서울</td>
                            <td align="right">261</td>
                            <td align="right">1918</td>
                            <td align="right">7.3:1</td>
                            <td align="right">32</td>
                            <td align="right">819</td>
                            <td align="right">25.6:1</td>
                            <td>76</td>
                            <td>2,218</td>
                            <td>29.18:1</td>
                            <td style="color:#FF0000"> 80.93</td>
                            <td>10</td>
                            <td>373</td>
                            <td>37.3:1</td>
                            <td style="color:#FF0000">85.92</td>
                        </tr>
                        <tr>
                            <td>부산</td>
                            <td align="right">100</td>
                            <td align="right">1418</td>
                            <td align="right">14.2:1</td>
                            <td align="right">5</td>
                            <td align="right">309</td>
                            <td align="right">61.8:1</td>
                            <td>100</td>
                            <td>1,497</td>
                            <td>14.97:1</td>
                            <td style="color:#FF0000">386.05</td>
                            <td>5</td>
                            <td>208</td>
                            <td>41.6:1</td>
                            <td style="color:#FF0000">406.94</td>
                        </tr>
                        <tr>
                            <td>대구</td>
                            <td align="right">62</td>
                            <td align="right">1171</td>
                            <td align="right">18.9:1</td>
                            <td align="right">13</td>
                            <td align="right">460</td>
                            <td align="right">35.4:1</td>
                            <td>38</td>
                            <td>1,522</td>
                            <td>22.38:1</td>
                            <td style="color:#FF0000">388.67</td>
                            <td>8</td>
                            <td>242</td>
                            <td>30.25:1</td>
                            <td style="color:#FF0000">403.18</td>
                        </tr>
                        <tr>
                            <td>인천</td>
                            <td align="right">90</td>
                            <td align="right">1464</td>
                            <td align="right">16.3:1</td>
                            <td align="right">8</td>
                            <td align="right">246</td>
                            <td align="right">30.8:1</td>
                            <td>158</td>
                            <td>1,183</td>
                            <td>7.49:1</td>
                            <td style="color:#FF0000">355.72</td>
                            <td>8</td>
                            <td>169</td>
                            <td>21.13:1</td>
                            <td style="color:#FF0000">414.12</td>
                        </tr>
                        <tr>
                            <td>광주</td>
                            <td align="right">45</td>
                            <td align="right">927</td>
                            <td align="right">20.6:1</td>
                            <td align="right">3</td>
                            <td align="right">170</td>
                            <td align="right">56.7:1</td>
                            <td>64</td>
                            <td>788</td>
                            <td>12.31:1</td>
                            <td style="color:#FF0000">351.06</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td style="color:#FF0000">-</td>
                        </tr>
                        <tr>
                            <td>대전</td>
                            <td align="right">23</td>
                            <td align="right">517</td>
                            <td align="right">22.5:1</td>
                            <td align="right">2</td>
                            <td align="right">130</td>
                            <td align="right">65.0:1</td>
                            <td>38</td>
                            <td>732</td>
                            <td>19.26:1</td>
                            <td style="color:#FF0000">377.76</td>
                            <td>5</td>
                            <td>121</td>
                            <td>24.2:1</td>
                            <td style="color:#FF0000">411.3</td>
                        </tr>
                        <tr>
                            <td>울산</td>
                            <td align="right">20</td>
                            <td align="right">473</td>
                            <td align="right">23.7:1</td>
                            <td align="right">2</td>
                            <td align="right">92</td>
                            <td align="right">46.0:1</td>
                            <td>46</td>
                            <td>738</td>
                            <td>16.04:1</td>
                            <td style="color:#FF0000">76.94</td>
                            <td>3</td>
                            <td>41</td>
                            <td>13.67:1</td>
                            <td style="color:#FF0000">79.22</td>
                        </tr>
                        <tr>
                            <td>세종</td>
                            <td align="right">10</td>
                            <td align="right">189</td>
                            <td align="right">18.9:1</td>
                            <td align="right">1</td>
                            <td align="right">57</td>
                            <td align="right">57.0:1</td>
                            <td>25</td>
                            <td>228</td>
                            <td>9.12:1</td>
                            <td style="color:#FF0000">73.36</td>
                            <td>2</td>
                            <td>12</td>
                            <td>6:01</td>
                            <td style="color:#FF0000">67.01</td>
                        </tr>
                        <tr>
                            <td>경기</td>
                            <td align="right">463</td>
                            <td align="right">4745</td>
                            <td align="right">10.2:1</td>
                            <td align="right">10</td>
                            <td align="right">403</td>
                            <td align="right">40.3:1</td>
                            <td>500</td>
                            <td>4,528</td>
                            <td>9.06:1</td>
                            <td style="color:#FF0000">75.38</td>
                            <td>15</td>
                            <td>391</td>
                            <td>26.07:1</td>
                            <td style="color:#FF0000">84.02</td>
                        </tr>
                        <tr>
                            <td>강원</td>
                            <td align="right">205</td>
                            <td align="right">2533</td>
                            <td align="right">12.4:1</td>
                            <td align="right">15</td>
                            <td align="right">371</td>
                            <td align="right">24.7:1</td>
                            <td>302</td>
                            <td>2,127</td>
                            <td>7.04:1</td>
                            <td style="color:#FF0000">355.15</td>
                            <td>20</td>
                            <td>249</td>
                            <td>12.45:1</td>
                            <td style="color:#FF0000">407.81</td>
                        </tr>
                        <tr>
                            <td>충북</td>
                            <td align="right">216</td>
                            <td align="right">2088</td>
                            <td align="right">9.7:1</td>
                            <td align="right">12</td>
                            <td align="right">267</td>
                            <td align="right">22.3:1</td>
                            <td>140</td>
                            <td>902</td>
                            <td>6.44:1</td>
                            <td style="color:#FF0000">359.95</td>
                            <td>12</td>
                            <td>113</td>
                            <td>9.42:1</td>
                            <td style="color:#FF0000">394.59</td>
                        </tr>
                        <tr>
                            <td>충남</td>
                            <td align="right">155</td>
                            <td align="right">1351</td>
                            <td align="right">8.7:1</td>
                            <td align="right">9</td>
                            <td align="right">181</td>
                            <td align="right">20.1:1</td>
                            <td>90</td>
                            <td>1,232</td>
                            <td>13.69:1</td>
                            <td style="color:#FF0000">73.72</td>
                            <td>2</td>
                            <td>117</td>
                            <td>58.5:1</td>
                            <td style="color:#FF0000">80.02</td>
                        </tr>
                        <tr>
                            <td>전북</td>
                            <td align="right">119</td>
                            <td align="right">1556</td>
                            <td align="right">13.1:1</td>
                            <td align="right">6</td>
                            <td align="right">283</td>
                            <td align="right">47.2:1</td>
                            <td>174</td>
                            <td>1,625</td>
                            <td>9.34:1</td>
                            <td style="color:#FF0000">비공개</td>
                            <td>10</td>
                            <td>232</td>
                            <td>23.2:1</td>
                            <td style="color:#FF0000">비공개</td>
                        </tr>
                        <tr>
                            <td>전남</td>
                            <td align="right">253</td>
                            <td align="right">2713</td>
                            <td align="right">10.7:1</td>
                            <td align="right">10</td>
                            <td align="right">231</td>
                            <td align="right">23.1:1</td>
                            <td>335</td>
                            <td>3,129</td>
                            <td>9.34:1</td>
                            <td style="color:#FF0000">363.84</td>
                            <td>10</td>
                            <td>222</td>
                            <td>22.2:1</td>
                            <td style="color:#FF0000">413.7</td>
                        </tr>
                        <tr>
                            <td>경북</td>
                            <td align="right">224</td>
                            <td align="right">2891</td>
                            <td align="right">12.9:1</td>
                            <td align="right">10</td>
                            <td align="right">305</td>
                            <td align="right">30.5:1</td>
                            <td>337</td>
                            <td>3,003</td>
                            <td>8.91:1</td>
                            <td style="color:#FF0000">74.38</td>
                            <td>15</td>
                            <td>432</td>
                            <td>28.8:1</td>
                            <td style="color:#FF0000">83.19</td>
                        </tr>
                        <tr>
                            <td>경남</td>
                            <td align="right">233</td>
                            <td align="right">2268</td>
                            <td align="right">9.7:1</td>
                            <td align="right">10</td>
                            <td align="right">321</td>
                            <td align="right">32.1:1</td>
                            <td>260</td>
                            <td>2,112</td>
                            <td>8.12:1</td>
                            <td style="color:#FF0000">373.59</td>
                            <td>20</td>
                            <td>270</td>
                            <td>13.5:1</td>
                            <td style="color:#FF0000">410.92</td>
                        </tr>
                        <tr>
                            <td>제주</td>
                            <td align="right">56</td>
                            <td align="right">753</td>
                            <td align="right">13.4:1</td>
                            <td align="right">6</td>
                            <td align="right">156</td>
                            <td align="right">26.0:1</td>
                            <td>58</td>
                            <td>639</td>
                            <td>11.02:1</td>
                            <td style="color:#FF0000">비공개</td>
                            <td>3</td>
                            <td>50</td>
                            <td>16.67:1</td>
                            <td style="color:#FF0000">비공개</td>
                        </tr>
                        <tr>
                            <td>창원</td>
                            <td align="right">66</td>
                            <td align="right">958</td>
                            <td align="right">14.5:1</td>
                            <td align="right">4</td>
                            <td align="right">127</td>
                            <td align="right">31.8:1</td>
                            <td>45</td>
                            <td>341</td>
                            <td>7.58.1</td>
                            <td style="color:#FF0000">346.01</td>
                            <td>5</td>
                            <td>61</td>
                            <td>12.2:1</td>
                            <td style="color:#FF0000">397.19</td>
                        </tr>
                    </table>
                </div>               
            </div>
        </div>

        <!--시험총평 및 시험후기-->
        <div id="content_3" class="tabCts Cts03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2134_03_01.jpg" title="시험 체감난이도&이벤트" />
            @include('willbes.pc.eventsurvey.show_graph_partial')

            <div class="tx-center">
                <a href="javascript:pullOpen();">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2134_btn03.png" title="설문하기" />
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

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2021/03/2134_03_02.jpg" title="시험후기 댓글 이벤트" /></div>
            {{--시험평가댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_evaluate_partial')
            @endif

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2021/03/2134_03_03.jpg" title="기대평과 응원 메시지" /> </div>
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif

        </div>

        <!--기출해설강의-->
        <div id="content_4" class="tabCts Cts04">
            <div><img src="https://static.willbes.net/public/images/promotion/2021/03/2134_04_01.jpg" title="기출해설" /></div>
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
                                                <img src="https://static.willbes.net/public/images/promotion/2021/03/2134_btn04_01.png" title="해설강의">
                                            </a>
                                            @endif

                                            @if(empty($row['wUnitAttachFile']) === false)
                                                <a href="{{ site_url('/promotion/downloadReference?file_idx='.$row['wUnitIdx'].'&event_idx='.$data['ElIdx']) }}">
                                                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2134_btn04_02.png" title="해설자료">
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
                var url = "{{front_url('/eventSurvey/index/' . $arr_promotion_params['SsIdx'])}}";
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }
    </script>
@stop