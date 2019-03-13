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
            position:relative;
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {position:fixed; top:250px; right:10px; z-index:1;}

        .wb_top {background:#28282a url(http://file3.willbes.net/new_cop/2019/03/EV190311_c1_bg.jpg) no-repeat center;}
        .wb_01 {background:#fff;}	        
        .wb_02 {background:#ececec;}
        .wb_03 {background:#7d7d7d;}
        .wb_03 div {width:1120px; margin:0 auto; position:relative}
        .wb_03 div ul {position:absolute; width:88px; top:378px; left:567px; z-index:10}
        .wb_03 div li {margin-bottom:18px}
        .wb_03 div li:nth-child(3) {margin-bottom:20px}
        .wb_03 div li:nth-child(4) {margin-bottom:20px}
        .wb_03 div li:nth-child(5) {margin-bottom:20px}
        .wb_03 div li:nth-child(6) {margin-bottom:20px}
        .wb_03 div li a {display:block; height:21px; line-height:21px; font-size:13px; font-weight:600; letter-spacing:-1px; background:#231f20; color:#fff; border:1px solid #231f20; font-family:'Noto Sans KR', Arial, Sans-serif}
        .wb_03 div li a:hover {background:#ffda38; color:#231f20}
        .wb_03 div li a.end {background:#666; color:#000}
        .wb_03 div span {position:absolute; display:block; height:31px; line-height:31px; padding:0 10px; background:#231f20; color:#fff; font-size:14px; font-weight:600; border-radius:22px; border:1px solid #231f20; z-index:11; letter-spacing:-1px}
        .wb_03 div span em {font-size:11px}
        .wb_03 div span.on {background:#ffda38; color:#231f20}
        .wb_03 div span.area01 {top:438px; left:809px} /*본원*/
        .wb_03 div span.area02 {top:490px; left:725px} /*신림*/
        .wb_03 div span.area03 {top:522px; left:764px} /*인천*/
        .wb_03 div span.area04 {top:737px; left:764px} /*광주*/
        .wb_03 div span.area05 {top:667px; left:795px} /*전주,익산*/
        .wb_03 div span.area06 {top:678px; left:915px} /*대구*/
        .wb_03 div span.area07 {top:737px; left:964px} /*부산*/
        .wb_03 div span.area08 {top:750px; left:856px} /*진주*/
        .wb_03 div span.area09 {top:859px; left:774px} /*제주*/	

        .wb_04 {background:#282828;}
        .wb_06 {background:#fff;}        
        .wb_05 {background:#c69c6d;}	

        .content_guide_wrap{ margin-bottom:50px;}
        .content_guide_box{ position:relative; width:1000px; margin:0 auto; padding:50px 0;}
        .content_guide_box .guide_tit{margin-bottom:20px;}
        .content_guide_box dl{ margin:0 20px; word-break:keep-all;border:2px solid #202020;padding:30px;}
        .content_guide_box dt{ margin-bottom:10px;}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-size:13px; font-weight:bold; margin-right:10px;}
        .content_guide_box dt img.btn{padding:2px 0 0 0;}
        .content_guide_box dd{ color:#777; font-size:13px; margin:0 0 20px 5px; line-height:17px;}
        .content_guide_box dd strong{ color:#555;}
        .content_guide_box dd p{ margin-bottom:3px;}
        .content_guide_box dd p.guide_txt_01{margin:5px 0 5px 15px;}
        	
    </style>


<div class="p_re evtContent" id="evtContainer">
    <div class="skybanner">
        <div><a href="#go"><img src="http://file3.willbes.net/new_cop/2019/03/EV190311_sky.jpg" alt="스카이스크래퍼"></a></div>
    </div>
		
    <div class="evtCtnsBox wb_top" id="main">
        <img src="http://file3.willbes.net/new_cop/2019/03/EV190311_c1.png"  alt="메인" usemap="#link"/>
        <map name="link" >
            <area shape="rect" coords="731,1018,926,1181" href="#link3" onfocus='this.blur()' alt="온라인모의고사안내" />
        </map>
    </div>
		
    <div class="evtCtnsBox wb_01" >
        <img src="http://file3.willbes.net/new_cop/2019/03/EV190311_c2.jpg" alt="설명" /><br>
        <img src="http://file3.willbes.net/new_cop/2019/03/EV190311_c3.jpg"  />
    </div>
       
    <div class="evtCtnsBox wb_02" id="table">
        <img src="http://file3.willbes.net/new_cop/2019/03/EV190311_c4.jpg"  alt="시간표 및 장소" />
    </div>
		
    <div class="evtCtnsBox wb_03" >
        <div>
            <img src="http://file3.willbes.net/new_cop/2019/03/EV190311_c5.jpg"  alt="전국학원"/>
            <ul>
                <li><a href="{{ site_url('/pass/offPackage/index?cate_code=3073') }}" alt="노량진" onmouseover="$('span.area01').addClass('on');" onmouseleave="$('span.area01').removeClass('on');">신청하기</a></li>
                <li><a href="{{ site_url('/pass/offPackage/index?cate_code=3073') }}" alt="신림" onmouseover="$('span.area02').addClass('on');" onmouseleave="$('span.area02').removeClass('on');">신청하기</a></li>
                <li><a href="{{ site_url('/pass/offPackage/index?cate_code=3073') }}" alt="인천" onmouseover="$('span.area03').addClass('on');" onmouseleave="$('span.area03').removeClass('on');">신청하기</a></li>
                <li><a href="{{ site_url('/pass/offPackage/index?cate_code=3073') }}" alt="광주" onmouseover="$('span.area04').addClass('on');" onmouseleave="$('span.area04').removeClass('on');">신청하기</a></li>
                <li><a href="{{ site_url('/pass/offPackage/index?cate_code=3073') }}" alt="전주" onmouseover="$('span.area05').addClass('on');" onmouseleave="$('span.area05').removeClass('on');">신청하기</a></li>
                <li><a href="{{ site_url('/pass/offPackage/index?cate_code=3073') }}" alt="익산" onmouseover="$('span.area05').addClass('on');" onmouseleave="$('span.area05').removeClass('on');">신청하기</a></li>
                <!--li><a href="#none" alt="익산" onmouseover="$('span.area05').addClass('on');" onmouseleave="$('span.area05').removeClass('on');" class="end">마감</a></li-->
                <li><a href="{{ site_url('/pass/offPackage/index?cate_code=3073') }}" alt="대구" onmouseover="$('span.area06').addClass('on');" onmouseleave="$('span.area06').removeClass('on');">신청하기</a></li>
                <li><a href="{{ site_url('/pass/offPackage/index?cate_code=3073') }}" alt="부산" onmouseover="$('span.area07').addClass('on');" onmouseleave="$('span.area07').removeClass('on');">신청하기</a></li>
                <li><a href="{{ site_url('/pass/offPackage/index?cate_code=3073') }}" alt="진주" onmouseover="$('span.area08').addClass('on');" onmouseleave="$('span.area08').removeClass('on');">신청하기</a></li>
                <li><a href="{{ site_url('/pass/offPackage/index?cate_code=3073') }}" alt="제주" onmouseover="$('span.area09').addClass('on');" onmouseleave="$('span.area09').removeClass('on');">신청하기</a></li>
            </ul>
            <span class="area01">노량진</span>
            <span class="area02">신림</span>
            <span class="area03">인천</span>
            <span class="area04">광주</span>
            <span class="area05">전북<em>(전주,익산)</em></span>
            <span class="area06">대구</span>
            <span class="area07">부산</span>
            <span class="area08">진주</span>
            <span class="area09">제주</span>   
        </div>
    </div>

    <div class="evtCtnsBox wb_04" >
        <a name="link3"><img src="http://file3.willbes.net/new_cop/2019/03/EV190311_c6.jpg"  alt="경품" /></a>
    </div>
		
    <div class="evtCtnsBox wb_06" id="go">
        <img src="http://file3.willbes.net/new_cop/2019/03/EV190311_c7_01.jpg" alt="윌비스 이벤트를 여기저기 소문내개" usemap="#Map180212_c2"/>
        <map name="Map180212_c2" >
            <area shape="rect" coords="169,1375,326,1436" href="http://cafe.daum.net/policeacademy" onFocus="this.blur();" target="_blank" alt="다음카페 경시모"/>
            <area shape="rect" coords="339,1378,489,1438" href="http://cafe.naver.com/polstudy" onFocus="this.blur();" target="_blank" alt="네이버카페 경꿈사"/>
            <area shape="rect" coords="528,1379,678,1439" href="https://section.blog.naver.com/BlogHome.nhn?directoryNo=0&currentPage=1&groupId=0"  onFocus="this.blur();" target="_blank" alt="네이버 블로그"/>
            <area shape="rect" coords="713,1381,901,1437" href="http://gall.dcinside.com/board/lists/?id=government" onFocus="this.blur();" target="_blank" alt="공무원갤러리"/>
        </map>              
    </div>
        
    @include('html.event_replyUrl')

    <div class="evtCtnsBox wb_05">
        <img src="http://file3.willbes.net/new_cop/2019/03/EV190311_c8.jpg"  alt="접수하기" usemap="#go"/>
        <map name="go">
            <area shape="rect" coords="414,343,707,420" href="{{ site_url('/pass/offPackage/index?cate_code=3073') }}" onfocus='this.blur()' alt="접수하기" target="_self"/>
        </map>
    </div>

    <div class="content_guide_wrap">
        <div class="content_guide_box" id="ask">
            <p class="guide_tit"><img src="http://file3.willbes.net/new_cop/2018/01/EV180104_p7.png"  alt="유의사항" /> </p>
            <dl>            
                <dt>
                    <h3>유의사항</h3>
                </dt>
                <dd>
                    <p>학원 실강패스 수강생은 응시 지역별 학원 상담실 문의해 주시기 바랍니다. 모든 고사장 주차 불가합니다. 시험 응시생이 많아 혼잡이 예상되오니 대중교통을 이용해 주시기 바랍니다. 반드시 본인이 응시할 캠퍼스로 신청 바랍니다.</p>
                </dd>

                <dt>
                    <h3>고사장 입실</h3>
                </dt>
                <dd>
                    <p>1. 시험당일 09:40까지 해당 고사장으로 반드시 입실해야합니다.</p>
                    <p>2. 시험 종료 후 시험감독관의 지시가 있을때까지 퇴실할 수 없으며, 모든 답안지는 반드시 제출하여 주십시오.</p>
                    <p>3. 본인이 신청한 캠퍼스에서만 응시할 수 있습니다.</p>
                </dd>

                <dt>
                    <h3>신분증 지참</h3>
                </dt>
                <dd>
                    <p>본인 확인을 위해 응시표(응시 전 발송 된 문자 메시지 확인 가능)와 공공기관이 발행한 신분(주민등록증, 여권, 운전면허증, 주민등록번호가 포함된 장애인등록증(복지카드 중 하나)을 반드시 소지하여야 합니다.</p>
                </dd>
                
                <dd>
                    <p>※ 모의고사문의 : 각 캠퍼스에 문의</p>
                </dd>
            </dl>
        </div>
    </div>
</div>
<!-- End Container -->       

@stop