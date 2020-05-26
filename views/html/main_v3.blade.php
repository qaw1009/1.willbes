@extends('willbes.pc.layouts.master')

@section('content')
<style type="text/css">
    /*********************************************     Main Container : Main     *********************************************/

/*ver3*/
.mainV3 .tx-color {
    color: #009ef5;
}
.mainV3 {/*background:url("https://static.willbes.net/public/images/promotion/main/gate_v3_bg.jpg") no-repeat center top;*/
    background-repeat: no-repeat; background-position: center top;
}
.mainV3 .will-Tit {
    font-size: 18px !important; color:#595959 !important; border-color:#d5d5d5 !important;
}
.mainV3 .will-subTit {color:#a09994 !important; float:none !important}

.mainV3 .Area1 {border-bottom:1px solid #ccc; border-top:1px solid #ccc; position: relative;}
.mainV3 .Area1 .addList {width:1120px; margin: 0 auto; padding:7px 0}
.mainV3 .Area1 .addList li { position:relative; display: inline; float: left; font-size: 14px; color:#737373; height: 33px; line-height: 33px; border-radius: 30px; padding:0 30px 0 20px; margin-right:10px}
.mainV3 .Area1 .addList li:hover {color:#0a6db0; background:#f0f0f0;}
.mainV3 .Area1 .addList li span {display:none; position:absolute; width:24px; height:24px; line-height:24px; text-align:center; top:3px; right:5px; 
    vertical-align: top; cursor:pointer; font-size:16px; font-weight:bold; z-index:5;}
.mainV3 .Area1 .addList li:hover span {display:block; color:#ff6565;}
.mainV3 .Area1 span a.add { position: absolute; top:0; left:50%; margin-left:470px; height: 47px; line-height: 47px;
    background:url("https://static.willbes.net/public/images/promotion/main/gate_icon01.png") no-repeat left center; padding-left:20px;
}
.mainV3 .Area1 .addList:after {content: ""; display: block; clear:both}

.mainV3 .gateSearch {width:700px; margin:0 auto; text-align: center; padding-top:60px}
.mainV3 .gateSearch div {position: relative; margin-top:24px}
.mainV3 .gateSearch input[type=search] {border:10px solid #2364fe; width:700px; height:44px; line-height: 44px; color:#ccc; 
    font-size:16px; float: left; padding-left:20px; border-radius: 50px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
@@keyframes upDown{
from{border-color:#2364fe}
50%{border-color:#072877}
to{border-color:#2364fe}
}
@@-webkit-keyframes upDown{
from{border-color:#2364fe}
50%{border-color:#072877}
to{border-color:#2364fe}
}

.mainV3 .gateSearch input:focus {border:10px solid #2364fe !important; color:#333}
.mainV3 .gateSearch button {display:block; position: absolute; width:80px; font-size:0; text-indent: -9999px; top:10px; right:0; height:44px; line-height: 44px;
    background:url("https://static.willbes.net/public/images/promotion/main/gate_v3_search.png") no-repeat center center; 
     z-index: 1;}
.mainV3 .gateSearch:after {content: ""; display: block; clear: both;}

.gate-add-popup .willbes-Layer-CartBox {height:auto;}
.gate-add-popup .Layer-Tit {background: #333; text-align: center; color:#fff; height: 50px !important; line-height: 50px !important; font-weight: 900;}
.gate-add-popup .gate-add-cts {overflow-y:scroll !important; padding:30px; height: 430px;}
.gate-add-popup .gate-add-cts h5 {font-size:16px; font-weight: 900; margin-bottom: 10px;}
.gate-add-popup .gate-add-cts ul {margin-bottom:20px}
.gate-add-popup .gate-add-cts li {display: inline; float:left; width: 25%;}
.gate-add-popup .gate-add-cts li a {display: block; border:1px solid #d0d0d0; text-align: center; height: 32px; line-height: 32px; margin-bottom:5px; margin-right:5px}
.gate-add-popup .gate-add-cts li a:hover,
.gate-add-popup .gate-add-cts li a.active {color:#fff; background:#0396cf; border:1px solid #0396cf;}
.gate-add-popup .gate-add-cts ul:after {content: ""; display: block; clear:both} 
.gate-add-popup .addBtn {width: 180px; margin:30px auto}
.gate-add-popup .addBtn a {display: block; color:#fff; background:#0396cf; text-align: center; height: 40px; line-height: 40px; font-size: 18px; font-weight: 900;}

.mainV3 .Area7 { background:#fff; margin-top:70px; padding-top:70px; margin-bottom:70px}
.mainV3 .bar-banner {width:560px; height:106px; overflow: hidden; float: left;}
.mainV3 .bar-banner .bx-wrapper .bx-pager {
    float: right;
    width: auto;
    right: 8px;
    bottom: 8px;
    text-align: right;
}
.mainV3 .bar-banner .bx-wrapper .bx-pager {
    bottom: inherit;
    top: 8px;
    padding-top: 0;
}
.mainV3 .bar-banner .bx-wrapper .bx-pager.bx-default-pager a {
    background: #fff;
    width: 8px;
    height: 8px;
    margin: 0 2px;
}
.mainV3 .bar-banner .bx-wrapper .bx-pager.bx-default-pager a:hover, 
.mainV3 .bar-banner .bx-wrapper .bx-pager.bx-default-pager a.active,
.mainV3 .bar-banner .bx-wrapper .bx-pager.bx-default-pager a:focus {
    background: #ffda38;
    width: 30px;
}
.mainV3 .bar-banner .bx-wrapper .bx-pager.bx-default-pager a {
    background: #acacac;
}

.mainV3 .Area2 .will-Tit {
    font-size: 18px !important; color:#2364fe !important;
}
.mainV3 .Area2 table {background: rgba(0,0,0,.65); display: block;}
.mainV3 .Area2 table:hover {box-shadow: 10px 10px 20px 1px rgba(0,0,0,.2); }
.mainV3 .Area2 th {background: rgba(0,0,0,.35); font-size: 14px; padding:20px 0; text-align: center; font-weight: bold; color:#fff; border-bottom:1px solid #403d3c}
.mainV3 .Area2 td {padding:0 10px; border-bottom:1px solid #5a5855}
.mainV3 .Area2 td a {display: inline-block; font-size:14px; margin-right:40px; color:#c7c6c6}
.mainV3 .Area2 td a:hover {color:#fff;}
.mainV3 .Area2 td a:last-child {margin-right:0}
.mainV3 .Area2 td a img {vertical-align: top;}

/* Main Container : Act3 */
.mainV3 .Area3 {background: #eee; padding:70px 0}
.mainV3 .Area3 .will-Tit {border:0}
.mainV3 .Area3 span {display: inline-block;}
.mainV3 .Area3 .sliderDayList {margin-left:-14px}
.mainV3 .Area3 li {display: inline; float:left; width:calc(25% - 14px); margin-left:14px; margin-bottom:14px; cursor: pointer;}
.mainV3 .Area3 .dDayBox { 
    padding:30px;  
    background: #fff;   
}
.mainV3 .Area3 .dTit {
    font-size: 14px;
    color: #464646;
    line-height: 20px;
    text-align: left;
}
.mainV3 .Area3 .dTit .w-date {font-size: 12px;}
.mainV3 .Area3 .dDay {
    font-size: 32px;
    color:#0a6db0;
    text-align: right;
    float: right;
    font-family: "Noto Sans KR Thin", "Noto Sans KR", "sans-serif" !important;
}
.mainV3 .Area3 .dDayBox:after,
.mainV3 .Area3 .sliderDayList:after {content: ""; display: block; clear:both}
.mainV3 .Area3 li:hover .dDayBox {background: #0a6db0; }
.mainV3 .Area3 li:hover .dTit {color:#fff}
.mainV3 .Area3 li:hover .dDay {color:#ffd200}


.mainV3 .Area4 .NowWillbes {
    float: left;
    width: 540px;
}
.mainV3 .Area4 .NowWillbes .will-Tit {position: relative; margin-bottom:5px;}
.mainV3 .Area4 .NowWillbes .will-Tit a {display: inline-block; float:right; text-align:right; font-size:13px; width: 50px; color:#737373}
.mainV3 .Area4 .NowWillbes li {
    line-height:27px; font-size: 13px; list-style:disc inside;
}
.mainV3 .Area4 .NowWillbes li a {
    width: 100%;
    color:#595959;
}
.mainV3 .Area4 .NowWillbes span {
    display: inline-block;
}
.mainV3 .Area4 .NowWillbes .w-tit {
    width: 400px;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}
.mainV3 .Area4 .NowWillbes .w-new {font-size: 10px; padding:3px 5px; background: #009ef5; color:#fff; display: inline; border-radius: 4px; margin-left:5px}
.mainV3 .Area4 .NowWillbes .w-date {
    width: 90px;
    text-align: right;
    float: right;
    color:#a3a3a3;
}
.mainV3 .Area4 .WhyWillbes {
    float: right;
    width: 556px;
}
.mainV3 .Area4 .WhyWillbes div {display: inline-block; width:270; height: 180px; overflow: hidden;}
.mainV3 .Area4 .WhyWillbes div:first-child {margin-right:10px}

.mainV3 .Area4 dl:after {content: ""; display: block; clear: both;}


.mainV3 .Area5 .acadList li {display:inline; float:left; width: 40%; font-size: 14px;; margin-bottom:10px}
.mainV3 .Area5 .acadList li:nth-of-type(even) {width:60%;}
.mainV3 .Area5 .acadList li strong { width: 120px; display: inline-block; text-align: center; font-weight: bold; background:#9c9c9c; color:#fff;
    height: 30px; line-height: 30px; margin-right:15px}
.mainV3 .Area5 .acadList li a {display: inline-block; color:#595959}
.mainV3 .Area5 .acadList li span {padding:0 10px; color:#ccc}
.mainV3 .Area5 .acadList ul:after {content: ""; display: block; clear: both;}

.mainV3 .Area5 .imgBox {
    margin-top:50px;
}
.mainV3 .Area5 .imgBox li {
    display: inline;float: left;width: 50%;
}
.mainV3 .Area5 .imgBox li a {display: block; text-align: center; border:1px solid #ccc; padding:10px 0 }
.mainV3 .Area5 .imgBox li:last-child a {border-left:0}
.mainV3 .Area5 .imgBox ul:after {content: ""; display: block; clear: both;}


.mainV3 .Area6 .will-Tit {margin-bottom: 0; border:0}
.mainV3 .Area6 .CScenterBox {
    padding: 50px 0 50px 90px;
    border:7px solid #e3e3e3;   
    color:#595959;
}
.mainV3 .Area6 .CScenterBox li {display: inline; float: left; font-size: 18px; line-height:32px;}
.mainV3 .Area6 .CScenterBox li span {vertical-align: top; color:#ff0000} 
.mainV3 .Area6 .CScenterBox li:last-child span {color:#009ef5}
.mainV3 .Area6 .CScenterBox li strong {font-size: 40px; vertical-align: bottom; font-family: "Noto Sans KR Thin", "Noto Sans KR", "sans-serif" !important; margin-right:30px; color:#009ef5; letter-spacing:2px;}
.mainV3 .Area6 .CScenterBox ul:after {content: ""; display: block; clear: both;}

.njobBn {
    width:100%; bottom:0; position: fixed; left:50%; margin-left:-1000px; text-align: center; z-index: 100;
}
</style>

<!-- Container -->
<div id="Container" class="Container mainV3 NG c_both">
    <div class="Section Area1">
        <ul class="addList">            
            <li><a href="#none">일반경찰</a><span>x</span></li>
            <li><a href="#none">9급공무원</a><span>x</span></li>
            <li><a href="#none">기술직</a><span>x</span></li>
            <li><a href="#none">법원직</a><span>x</span></li>
            <li><a href="#none">경찰간부</a><span>x</span></li>          
        </ul>
        <span><a href="#none" onclick="openWin('addArea')" class="add">관심분야 설정</a></span>
        {{--//추가팝업--}}
        <div id="addArea" class="willbes-Layer-Black gate-add-popup">
            <div class="willbes-Layer-CartBox">
                <a class="closeBtn" href="#none" onclick="closeWin('addArea')">
                    <img src="{{ img_url('cart/close_cart.png') }}">
                </a>
                <div class="Layer-Tit NG">나의 관심분야를 선택해 주세요!</div>
                <div class="gate-add-cts">
                    <div>
                        <h5>ㆍ 공무원</h5>
                        <ul>
                            <li><a href="#none">9급공무원</a></li>
                            <li><a href="#none" class="active">7급 공무원</a></li>
                            <li><a href="#none">7급PSAT</a></li>
                            <li><a href="#none">세무직</a></li>                                                               
                            <li><a href="#none">법원직</a></li>
                            <li><a href="#none">소방직</a></li>
                            <li><a href="#none">기술직</a></li>
                            <li><a href="#none">군무원</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5>ㆍ 경찰</h5>
                        <ul>
                            <li><a href="#none">일반경찰</a></li>
                            <li><a href="#none">경행경채</a></li>
                            <li><a href="#none">경찰승진</a></li>
                            <li><a href="#none">해양경찰</a></li>                                                               
                            <li><a href="#none">해양경찰특채</a></li>
                            <li><a href="#none">경찰간부(간부후보생)</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5>ㆍ 교원임용</h5>
                        <ul>
                            <li><a href="#none">교원임용</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5>ㆍ 취업</h5>
                        <ul>
                            <li><a href="#none">공기업</a></li>
                        </ul>
                    </div>
                    <div>
                        <h5>ㆍ N잡</h5>
                        <ul>
                            <li><a href="#none">e-커머스</a></li>
                        </ul>
                    </div>                   
                </div>
                <div class="addBtn">
                    <a href="#none">관심분야 추가하기</a>
                </div>
            </div>
        </div>
        {{--추가팝업//--}}
    </div>

    <div class="Section gateSearch">
        <img src="https://static.willbes.net/public/images/promotion/main/gate_v3_01.png">
        <div>
            <input type="search" id="search" name="" value="" placeholder="검색어를 입력하세요." />
            <label for="search"><button title="검색">검색</button></label>
        </div>
    </div>    

    <div class="Section Area2 mt50">
        <div class="widthAuto">
            <div class="will-Tit mb-zero">윌비스 1등 대표 과정 <span class="will-subTit">더 나은 미래, 윌비스가 책임지겠습니다.</span></div>
            <div class="NSK">
                <table>
                    <col width="18%">
                    <col width="">
                    <col width="15%">
                    <col width="">
                    <col width="15%">
                    <col width="">
                    <tr>
                        <th scope="row">공무원</th>
                        <td colspan="5">
                            <a href="https://pass.willbes.net/home/index/cate/3019" target="_blank">9급 공무원</a>
                            <a href="https://pass.willbes.net/home/index/cate/3020" target="_blank">7급 공무원</a> 
                            <a href="https://pass.willbes.net/home/index/cate/3103" target="_blank">7급PSAT</a>
                            <a href="https://pass.willbes.net/home/index/cate/3022" target="_blank">세무직</a>                                                               
                            <a href="https://pass.willbes.net/home/index/cate/3025" target="_blank">법원직</a>
                            <a href="https://pass.willbes.net/home/index/cate/3023" target="_blank">소방직</a>
                            <a href="https://pass.willbes.net/home/index/cate/3028" target="_blank">기술직</a>
                            <a href="https://pass.willbes.net/home/index/cate/3024" target="_blank">군무원 </a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">경찰</th>
                        <td colspan="5">
                            <a href="https://police.willbes.net/home/index/cate/3001" target="_blank">일반경찰</a>
                            <a href="https://police.willbes.net/home/index/cate/3002" target="_blank">경행경채</a>
                            <a href="https://police.willbes.net/home/index/cate/3005" target="_blank">경찰승진</a>
                            <a href="https://police.willbes.net/home/index/cate/3007" target="_blank">해양경찰</a>
                            <a href="https://police.willbes.net/home/index/cate/3008" target="_blank">해양경찰특채</a> 
                            <a href="https://police.willbes.net/home/index/cate/3100" target="_blank">경찰간부(간부후보생)</a> 
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">임용</th>
                        <td colspan="3">
                            <a href="http://ssam.willbes.net/main/index.html" target="_blank">교육학</a>
                            <a href="http://ssam.willbes.net/main/index.html" target="_blank">유아.초등</a>
                            <a href="http://ssam.willbes.net/main/index.html" target="_blank">중등</a>
                        </td>
                        <th>어학</th>
                        <td><a href="https://lang.willbes.net/home/index/cate/3093" target="_blank">G-TELP</a></td>
                    </tr>
                    <tr>
                        <th scope="row">고등고시</th>
                        <td colspan="5">
                            <a href="https://gosi.willbes.net/home/index/cate/3094" target="_blank">5급행정(입법고시)</a>
                            <a href="https://gosi.willbes.net/home/index/cate/3095" target="_blank">국립외교원</a>
                            <a href="https://pass.willbes.net/home/index/cate/3096" target="_blank">PSAT</a>
                            <a href="https://gosi.willbes.net/home/index/cate/3097" target="_blank">5급헌법</a>
                            <a href="https://gosi.willbes.net/home/index/cate/3098" target="_blank">법원행시</a> 
                            <a href="https://gosi.willbes.net/home/index/cate/3099" target="_blank">변호사</a>   
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">전문자격증</th>
                        <td colspan="5">
                            <a href="https://job.willbes.net/home/index/cate/309002" target="_blank">공인노무사</a>
                            <a href="https://job.willbes.net/home/index/cate/309003" target="_blank">감정평가사</a>
                            <a href="https://job.willbes.net/home/index/cate/309004" target="_blank">변리사</a>  
                            <a href="https://job.willbes.net/home/index/cate/309006" target="_blank">세무사</a>                             
                            <a href="https://job.willbes.net/home/index/cate/309005" target="_blank">관세사</a>                                
                            <a href="https://job.willbes.net/home/index/cate/309001" target="_blank">스포츠지도사</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">기타자격증</th>
                        <td colspan="5">
                            <a href="https://job.willbes.net/home/index/cate/308901" target="_blank">소방(산업)기사</a>
                            <a href="https://job.willbes.net/home/index/cate/308902" target="_blank">전기(산업)기사</a>
                            <a href="https://job.willbes.net/home/index/cate/310101" target="_blank">소프트웨어자산관리사</a>  
                            <a href="https://job.willbes.net/home/index/cate/310102" target="_blank">경제교육지도사</a>                             
                            <a href="https://job.willbes.net/home/index/cate/310103" target="_blank">진로직업체험지도사</a>                                
                            <a href="https://job.willbes.net/home/index/cate/309101" target="_blank">한국사능력시험</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">나무경영아카데미</th>
                        <td colspan="5">
                            <a href="http://www.namucpa.com" target="_blank">회계사</a>
                            <a href="http://www.namucpa.com" target="_blank">세무사</a>
                            <a href="http://www.namucpa.com" target="_blank">관세사</a> 
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">N잡</th>
                        <td><a href="https://lang.willbes.net/home/index/cate/3093" target="_blank">e-커머스 <img src="https://static.willbes.net/public/images/promotion/main/gate_icon03.png"></a></td>
                        <th>취업</th>
                        <td><a href="https://work.willbes.net/home/index/cate/3102" target="_blank">공기업</a></td>
                        <th>학점은행</th>
                        <td><a href="https://lang.willbes.net/home/index/cate/3093" target="_blank">학점은행</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>   
    
    <div class="Section Area7">
        <div class="widthAuto">
            <div class="bar-banner">
                <div class="slider">
                    <div><a href="none" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/gate_bn_560x106_01.jpg"></a></div>
                    <div><a href="none" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/gate_bn_560x106_02.jpg"></a></div>
                </div>
            </div>
            <div class="bar-banner">
                <div class="slider">
                    <div><a href="none" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/gate_bn_560x106_02.jpg"></a></div>
                    <div><a href="none" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/gate_bn_560x106_01.jpg"></a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="Section Area3">
        <div class="widthAuto">
            <div class="will-Tit mb-zero">시험일정</div>
            <ul class="sliderDayList">
                <li>
                    <div class="dDayBox">
                        <span class="dTit">
                            2018 경찰 3차
                            <div class="w-date">2018-11-23</div>
                        </span>
                        <span class="dDay">D-349</span>
                    </div>
                </li>
                <li>
                    <div class="dDayBox">
                        <span class="dTit">
                            2018 지방직
                            <div class="w-date">2019-04-18</div>
                        </span>
                        <span class="dDay">D-94</span>
                    </div>
                </li>   
                <li>
                    <div class="dDayBox">
                        <span class="dTit">
                            2018 경찰 3차
                            <div class="w-date">2018-11-23</div>
                        </span>
                        <span class="dDay">D-349</span>
                    </div>
                </li>
                <li>
                    <div class="dDayBox">
                        <span class="dTit">
                            2018 지방직
                            <div class="w-date">2019-04-18</div>
                        </span>
                        <span class="dDay">D-94</span>
                    </div>
                </li>
                <li>
                    <div class="dDayBox">
                        <span class="dTit">
                            2018 경찰 3차
                            <div class="w-date">2018-11-23</div>
                        </span>
                        <span class="dDay">D-349</span>
                    </div>
                </li>
                <li>
                    <div class="dDayBox">
                        <span class="dTit">
                            2018 지방직
                            <div class="w-date">2019-04-18</div>
                        </span>
                        <span class="dDay">D-94</span>
                    </div>
                </li>             
            </ul>
        </div>
    </div>    

    <div class="Section Area4 mt50">
        <div class="widthAuto">
            <dl>
                <dt class="NowWillbes">
                    <div class="will-Tit">윌비스 소식 <a href="https://www.willbes.net/support/notice/index?s_cate_code=&s_campus=&s_keyword=&prof_idx=&subject_idx=&view_type=&page=&s_cate_code_disabled=" target="_blank">+ 더보기</a></div>
                    <ul>
                        <li><a href="#none"><span class="w-tit">2019 대비 9-10월 신규강좌 선접수 이벤트<span class="w-new">N</span></span><span class="w-date">2018.03.06</span></a></li>
                        <li><a href="#none"><span class="w-tit">신광은 경찰학원 '광은 장학회 4기' 합격자 발표</span><span class="w-date">2018.03.05</span></a></li>
                        <li><a href="#none"><span class="w-tit">면접 A반(월수금)과 면접스파르타반 마감! B반(화목토) 101단</span><span class="w-date">2018.03.04</span></a></li>
                        <li><a href="#none"><span class="w-tit">체력관리 이벤트 당첨자 발표</span><span class="w-date">2018.03.03</span></a></li>
                        <li><a href="#none"><span class="w-tit">2018년 9~11월 모의고사반 개강 안내</span><span class="w-date">2018.03.02</span></a></li>                       
                    </ul>
                </dt>
                <dt class="WhyWillbes">
                    <div><a href="#none" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/gate_bn_270x180_01.jpg"></a></div>
                    <div><a href="#none" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/gate_bn_270x180_02.jpg"></a></div>
                </dt>          
            </dl>
        </div>
    </div>
    
    <div class="Section Area5 mt50">
        <div class="widthAuto">
            <div class="will-Tit">윌비스 직영학원</div>
            <div class="acadList">
                <ul>
                    <li>
                        <strong>공무원</strong>
                        <a href="{{ app_url('/pass/home/index/cate/3001', 'pass') }}" target="_blank">노량진</a><span>|</span>
                        <a href="http://willbesedu.co.kr" target="_blank">인천</a><span>|</span>
                        <a href="{{ app_url('/pass/home/index/cate/3001', 'pass') }}" target="_blank">대구</a><span>|</span>
                        <a href="{{ app_url('/pass/home/index/cate/3001', 'pass') }}" target="_blank">부산</a>
                    </li>
                    <li>
                        <strong>경찰</strong>
                        <a href="{{ app_url('/pass/campus/show/code/605001', 'police') }}" target="_blank">노량진</a><span>|</span>
                        <a href="{{ app_url('/pass/campus/show/code/605005', 'police') }}" target="_blank">인천</a><span>|</span>
                        <a href="{{ app_url('/pass/campus/show/code/605004', 'police') }}" target="_blank">대구</a><span>|</span>
                        <a href="{{ app_url('/pass/campus/show/code/605003', 'police') }}" target="_blank">부산</a><span>|</span>
                        <a href="{{ app_url('/pass/campus/show/code/605006', 'police') }}" target="_blank">광주</a><span>|</span>
                        <a href="{{ app_url('/pass/campus/show/code/605009', 'police') }}" target="_blank">제주</a><span>|</span>
                        <a href="https://blog.naver.com/als9946" target="_blank">전북</a><span>|</span>
                        <a href="{{ app_url('/pass/campus/show/code/605010', 'police') }}" target="_blank">경기 광주(기숙형)</a>
                    </li>
                    <li>
                        <strong>경찰간부</strong>
                        <a href="http://wpa.willbes.net/main_spo.asp?category_id=912" target="_blank">신림(한림법학원)</a>
                    </li>
                    <li>
                        <strong>교원임용</strong>
                        <a href="http://ssam.willbes.net" target="_blank">노량진</a>
                    </li>
                    <li>
                        <strong>고등고시</strong>
                        <a href="{{ app_url('/home/index/cate/3094', 'gosi') }}">신림(한림법학원)</a>
                    </li>
                    <li>
                        <strong>전문자격</strong>
                        <a href="{{ app_url('/home/index/cate/309002', 'job') }}">감평/노무 - 신림(한림법학원)</a><span>|</span>
                        <a href="http://www.namucpa.com" target="_blank">세무/회계 종로(나무아카데미)</a><span>|</span>
                        <a href="{{ app_url('/home/index/cate/309004', 'job') }}">변리사-강남</a>
                    </li>
                </ul>                
            </div>
            <div class="imgBox">
                <ul>
                    <li><a href="http://www.willstory.co.kr" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/gate_willstory.jpg" alt="온라인 서점 윌스토리"></a></li>
                    <li><a href="http://www.willbeslife.net" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/gate_willbeslife.jpg" alt="학점은행"></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="Section Area6 mt50 mb50">
        <div class="widthAuto">
            <div class="will-Tit">윌비스 고객센터</div>
            <div class="CScenterBox">
                <ul>
                    <li>ㆍ <span>수강</span>문의 <strong>1544-5006</strong></li>
                    <li>ㆍ <span>교재</span>문의 <strong>1544-4944</strong> [운영시간] 평일 9시 ~ 18시 | 주말, 공휴일 휴무</li>
                </ul>
            </div>
        </div>
    </div> 
    
    <div class="njobBn">
        <a href="https://njob.willbes.net/home/index/cate/3114"><img src="https://static.willbes.net/public/images/promotion/main/3114_bn_full.gif" alt="N job"></a>
    </div>
</div>
<!-- End Container -->

<script type="text/javascript"> 
    var images = ['gate_v3_bg1.jpg', 'gate_v3_bg2.jpg', 'gate_v3_bg3.jpg']; 
    $('.mainV3').css({'background-image': 'url(https://static.willbes.net/public/images/promotion/main/' + images[Math.floor(Math.random() * images.length)] + ')'}); 
</script>
@stop