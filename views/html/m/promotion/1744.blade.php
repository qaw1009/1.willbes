@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; word-break: keep-all;}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .evt01 {position:relative; width:device-width;}
    .evt01 img {display:block}

    .evt03 {padding-bottom:100px}
    .evt03 div {font-size:1.6rem; margin:50px 0 30px}
    .evt03 li {display:inline;float:left; width:calc(50% - 20px); margin:0 10px 20px; position:relative;}
    .evt03 li a {display:block; border:1px solid #2e7bfb; border-radius:10px}
    .evt03 li span {display:block; width:100%; position:absolute; bottom:0; background:rgba(255,255,255,.7); padding: 10px; margin:1px}
    .evt03 li strong {display:block; position:absolute; top:0; background:#2e7bfb; color:#fff; padding: 10px; border-radius:10px 0 10px 0}
    .evt03 ul:after {content:''; display:block; clear:both}

    .evt04{padding-bottom:100px}
    .evt04 ul {margin-bottom:15px}
    .evt04 li {display:inline;float:left; width:31.33333%; margin:0 1%;}
    .evt04 ul:after {content:''; display:block; clear:both}
   
    .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding:10px 0}
    .btnbuy a {display:block; width:94%; max-width:700px; margin:0 auto; font-size:1.5rem; background:#000; color:#fff; padding:15px 0; text-align:center; border-radius:50px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}

    .evtFooter {margin:0 auto; padding:30px 20px; text-align:left; color:#666; font-size:0.875rem; line-height:1.4 }
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
    .evtFooter p {margin-bottom:10px; color:#333; font-size:1.2rem;}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal;}


    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {        
        
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
        .evt03 li {width:calc(33.33333% - 20px)}
    }
    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>

<div id="Container" class="Container NSK c_both"> 
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1744m_top.jpg" alt="윌비스 신광은 경찰팀 추천강좌" >
    </div> 

    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1744m_01.jpg" alt="파이널패스" usemap="#Map1744" border="0" >
        <map name="Map1744">
          <area shape="rect" coords="29,527,179,599" href="#" alt="1단계">
          <area shape="rect" coords="197,524,352,599" href="#" alt="2단계">
          <area shape="rect" coords="366,527,521,602" href="#" alt="3단계">
          <area shape="rect" coords="540,527,694,598" href="#" alt="4단계">
        </map>
        <a href="https://police.willbes.net/m/promotion/index/cate/3001/code/1741" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/08/1744m_02.jpg" alt="파이널패스" ></a>
    </div> 

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1744m_03.jpg" alt="기본이론 집중완성" >
    </div> 

    <div class="mb100">
        <div class="pd20">
            <div class="NSK-Black tx22 mb10">단과 강좌</div>
            <div class="tx-red tx14 mb10">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능합니다.</div>
        </div>
        <div>
            <div class="passProfTabs c_both">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                    <tbody>
                        <tr>
                            <td>
                                <div class="w-prof p_re">
                                    <img src="{{ img_url('m/sample/prof2.jpg') }}">
                                    <div class="cover"><img src="{{ img_url('m/mypage/profImg-cover.png') }}"></div>
                                </div>
                                <div class="w-data tx-left pl15">
                                    <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                    <dl class="w-info pt-zero">
                                        <dt>심화이론<span class="row-line">|</span>영어<span class="row-line">|</span>한덕현</dt>
                                    </dl>
                                    <div class="w-tit">
                                        <a href="#none">2018 한덕현 제니스 영어 실전 동형 모의고사 (4-5월)</a>
                                    </div>
                                    <div class="w-info tx-gray">
                                        <dl>
                                            <dt class="h27"><strong>강의촬영(실강)</strong>2020년 1월</dt><br/>
                                            <dt class="h27"><strong>강의수</strong>32강 / 55강</dt><br/>
                                            <dt class="h27"><strong>수강기간</strong><span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">무제한</span> <span class="NSK nBox n2">진행중</span></dt><br>
                                            <dt class="h27">
                                                <strong>맛보기</strong><a href="#none" class="tBox black NSK">HIGH</a> <a href="#none" class="tBox gray NSK">LOW</a>
                                            </dt><br/>
                                            <dt class="h27">
                                                <input type="checkbox" id="checkA" name="checkA"><label for="checkA" class="pl10">PC+모바일 : <span class="tx-blue">90,000원</span>(↓0%)</label>
                                            </dt>
                                        </dl>
                                    </div>
                                    <div class="w-buy">       
                                        <ul class="two">
                                            <li><a href="#none" class="btn_gray">장바구니</a></li>
                                            <li><a href="#none" onclick="openWin('LecBuyMessagePop')" class="btn_blue">바로결제</a></li>
                                        </ul> 
                                    </div>
                                </div>                          
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="lec-info bg-light-gray">  
                <ul>
                    <li>
                        <span class="chk">
                            <label>[판매]</label>
                            <input type="checkbox" id="" name="">
                        </span>
                        <div class="priceWrap NG">
                            주교재  <span class="NGR">신광은 형사소송법 신정8판</span><br>
                            <p class="NGR">[판매] <span class="tx-blue">42,000원</span>(↓10%)</p>
                        </div>
                    </li>
                    <li>
                        <span class="chk">
                            <label>[품절]</label>
                            <input type="checkbox" id="" name="" disabled>
                        </span>
                        <div class="priceWrap NG">
                            부교재  <span class="NGR">신광은 형사소송법 신정8판</span><br>
                            <p class="NGR">[품절] <span class="tx-blue">42,000원</span>(↓10%)</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="passProfTabs c_both">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                    <tbody>
                        <tr>
                            <td>
                                <div class="w-prof p_re">
                                    <img src="{{ img_url('m/sample/prof2.jpg') }}">
                                    <div class="cover"><img src="{{ img_url('m/mypage/profImg-cover.png') }}"></div>
                                </div>
                                <div class="w-data tx-left pl15">
                                    <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                    <dl class="w-info pt-zero">
                                        <dt>심화이론<span class="row-line">|</span>영어<span class="row-line">|</span>한덕현</dt>
                                    </dl>
                                    <div class="w-tit">
                                        <a href="#none">2018 한덕현 제니스 영어 실전 동형 모의고사 (4-5월)</a>
                                    </div>
                                    <div class="w-info tx-gray">
                                        <dl>
                                            <dt class="h27"><strong>강의촬영(실강)</strong>2020년 1월</dt><br/>
                                            <dt class="h27"><strong>강의수</strong>32강 / 55강</dt><br/>
                                            <dt class="h27"><strong>수강기간</strong><span class="tx-blue">50일</span> <span class="NSK ml10 nBox n1">무제한</span> <span class="NSK nBox n2">진행중</span></dt><br>
                                            <dt class="h27">
                                                <strong>맛보기</strong><a href="#none" class="tBox black NSK">HIGH</a> <a href="#none" class="tBox gray NSK">LOW</a>
                                            </dt><br/>
                                            <dt class="h27">
                                                <input type="checkbox" id="checkA" name="checkA"><label for="checkA" class="pl10">PC+모바일 : <span class="tx-blue">90,000원</span>(↓0%)</label>
                                            </dt> 
                                        </dl>
                                    </div>

                                    <div class="w-buy">       
                                        <ul class="two">
                                            <li><a href="#none" class="btn_gray">장바구니</a></li>
                                            <li><a href="#none" onclick="openWin('LecBuyMessagePop')" class="btn_blue">바로결제</a></li>
                                        </ul> 
                                    </div>
                                </div>                          
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="lec-info bg-light-gray">  
                <ul>
                    <li>
                        <span class="chk">
                            <label>[판매]</label>
                            <input type="checkbox" id="" name="">
                        </span>
                        <div class="priceWrap NG">
                            주교재  <span class="NGR">신광은 형사소송법 신정8판</span><br>
                            <p class="NGR">[판매] <span class="tx-blue">42,000원</span>(↓10%)</p>
                        </div>
                    </li>
                    <li>
                        <span class="chk">
                            <label>[품절]</label>
                            <input type="checkbox" id="" name="" disabled>
                        </span>
                        <div class="priceWrap NG">
                            부교재  <span class="NGR">신광은 형사소송법 신정8판</span><br>
                            <p class="NGR">[품절] <span class="tx-blue">42,000원</span>(↓10%)</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="mb100">
        <div class="pd20">
            <div class="NSK-Black tx22 mb10">운영자 패키지 강좌</div>
            <div class="tx-red tx14 mb10">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능합니다.</div>
        </div>
        <div class="lineTabs lecListTabs c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                <colgroup>
                    <col style="width: 87%;">
                    <col style="width: 13%;">
                </colgroup>
                <tbody>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <dl class="w-info">
                                <dt>기본이론</dt>
                            </dl>
                            <div class="w-tit">
                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>개강일 <span class="tx-blue">2019년 5월</span> <span class="row-line">|</span></dt>
                                <dt>수강기간 <span class="tx-blue">30일</span> <span class="NSK ml10 nBox n1">1.5배수</span></dt><br>
                                <dt><span class="tx-blue">90,000원</span>(↓0%)</dt>
                            </dl>
                            <div class="w-buy">       
                                <ul class="two">
                                    <li><a href="#none" class="btn_gray">수강신청</a></li>
                                </ul> 
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <dl class="w-info">
                                <dt>문풀1단계핵심요약/진도별</dt>
                            </dl>
                            <div class="w-tit">
                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>개강일 <span class="tx-blue">2019년 5월</span> <span class="row-line">|</span></dt>
                                <dt>수강기간 <span class="tx-blue">30일</span> <span class="NSK ml10 nBox n1">1.5배수</span></dt><br>
                                <dt><span class="tx-blue">90,000원</span>(↓0%)</dt>
                            </dl>
                            <div class="w-buy">       
                                <ul class="two">
                                    <li><a href="#none" class="btn_gray">수강신청</a></li>
                                </ul> 
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <dl class="w-info">
                                <dt>기본이론</dt>
                            </dl>
                            <div class="w-tit">
                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>개강일 <span class="tx-blue">2019년 5월</span> <span class="row-line">|</span></dt>
                                <dt>수강기간 <span class="tx-blue">30일</span> <span class="NSK ml10 nBox n1">1.5배수</span></dt><br>
                                <dt><span class="tx-blue">90,000원</span>(↓0%)</dt>
                            </dl>
                            <div class="w-buy">       
                                <ul class="two">
                                    <li><a href="#none" class="btn_gray">수강신청</a></li>
                                </ul> 
                            </div>
                        </td>
                    </tr>                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="mb100">
        <div class="pd20">
            <div class="NSK-Black tx22 mb10">기간제 패키지 강좌</div>
            <div class="tx-red tx14 mb10">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능합니다.</div>
        </div>
        <div class="lineTabs lecListTabs c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                <colgroup>
                    <col style="width: 87%;">
                    <col style="width: 13%;">
                </colgroup>
                <tbody>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <div class="w-tit">
                                <a href="#none">2020 [합격을 깨우는 0교시] 기미진 기특한 국어 새벽실전모의고사 PASS</a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>개강일 <span class="tx-blue">2019년 5월</span> <span class="row-line">|</span></dt>
                                <dt>수강기간 <span class="tx-blue">30일</span> <span class="NSK ml10 nBox n1">1.5배수</span></dt><br>
                                <dt><span class="tx-blue">90,000원</span>(↓0%)</dt>
                            </dl>
                            <div class="w-buy">       
                                <ul class="two">
                                    <li><a href="#none" class="btn_gray">수강신청</a></li>
                                </ul> 
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <div class="w-tit">
                                <a href="#none">2020 7급[국가직] 실전마스터 PASS</a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>개강일 <span class="tx-blue">2019년 5월</span> <span class="row-line">|</span></dt>
                                <dt>수강기간 <span class="tx-blue">30일</span> <span class="NSK ml10 nBox n1">1.5배수</span></dt><br>
                                <dt><span class="tx-blue">90,000원</span>(↓0%)</dt>
                            </dl>
                            <div class="w-buy">       
                                <ul class="two">
                                    <li><a href="#none" class="btn_gray">수강신청</a></li>
                                </ul> 
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w-data tx-left" colspan="2">
                            <div class="w-tit">
                                <a href="#none">2020 7급[국가직] 실전마스터 PASS</a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>개강일 <span class="tx-blue">2019년 5월</span> <span class="row-line">|</span></dt>
                                <dt>수강기간 <span class="tx-blue">30일</span> <span class="NSK ml10 nBox n1">1.5배수</span></dt><br>
                                <dt><span class="tx-blue">90,000원</span>(↓0%)</dt>
                            </dl>
                            <div class="w-buy">       
                                <ul class="two">
                                    <li><a href="#none" class="btn_gray">수강신청</a></li>
                                </ul> 
                            </div>
                        </td>
                    </tr>                    
                </tbody>
            </table>
        </div>
    </div> 

    <div id="LecBuyMessagePop" class="willbes-Layer-Black">
        <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h250 fix">
            <a class="closeBtn" href="#none" onclick="closeWin('LecBuyMessagePop')">
                <img src="{{ img_url('m/calendar/close.png') }}">
            </a>
            <div class="Message NG">
                도서구입비 소득공제 시행에 따라 강좌와 교재는 동시 결제가 불가능 합니다.<Br>
                선택한 교재는 장바구니에 자동으로 담기며, <Br>
                강좌 선 결제 후 장바구니에 담긴 교재를 결제하실 수 있습니다.
            </div>
            <div class="MessageBtns">
                <a href="#none" class="btn_gray">확인</a>
            </div>
        </div>
        <div class="dim" onclick="closeWin('LecBuyMessagePop')"></div>
    </div>
</div>
<!-- End Container -->

<script src="/public/js/willbes/jquery.rwdImageMaps.js"></script>
<script> 
    $(function(){ 
        $(document).ready(function(e) { 
            $('img[usemap]').rwdImageMaps(); 
        }); 
    });
</script> 

@stop