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
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .skybanner {
            position:fixed;
            bottom:20px;
            right:10px;
            z-index:1;
            width:138px;
        }
        .skybanner a {display:block; margin-bottom:5px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/07/1626_top_bg.jpg) no-repeat center top}

        .evt01 {background:#303030}         

        .evt02 {background:#f4f4f4;}

        .evt03 {background:#fff; padding-bottom:100px}
        .evt03 .sampleView {width:840px; margin:0 auto; text-align:left}
        .evt03 h4 {margin-bottom:20px; font-size:20px; color:#c06b0c;}
        .evt03 h4 span {color:#303030}
        .evt03 .sampleView ul {margin-bottom:70px; margin-right:-10px}
        .evt03 .sampleView li {display:inline; float:left; margin-right:10px}
        .evt03 .sampleView .viewBtns {margin-top:15px; text-align:center}
        .evt03 .sampleView .viewBtns a {display:inline-block; height:30px; line-height:30px; text-align:center; color:#fff; background:#f79601; border-radius:6px;
        width:70px; margin-right:8px; font-size:14px}
        .evt03 .sampleView .viewBtns a:last-child {margin:0}
        .evt03 .sampleView ul:after {content:''; display:block; clear:both}
        .evt03 .evt03Txt01 {font-size:14px; line-height:1.4; margin-top:20px; text-align:center; letter-spacing:-1px; color:#333;}
        


        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2020/07/1626_04_bg.jpg) no-repeat center top}
        .evt05 {background:#484c57}       
        .evt06 {background:url(https://static.willbes.net/public/images/promotion/2020/07/1626_05_bg.jpg) repeat}
        .evt07 {background:#a1774f}
        .evt09 {background:#c2c2c2}

        .evt10 {padding:120px 0 0; text-align:left;}
        .evt10 .copy {width:720px; margin:0 auto;}
        .evt10 h5 {color:#a0774e; font-size:46px; line-height:1; margin-bottom:20px; letter-spacing:-1px;}
        .evt10 .evt10Txt01 {font-size:28px; margin:20px auto 80px}
        .evt10 .sample {width:720px; margin:0 auto}
        .evt10 .sample li {display:inline; float:left; width:49%; padding:20px; margin-right:1%; border-radius:10px; 
            background:#acacac; color:#fff; font-size:20px; font-weight:600; text-align:center}
        .evt10 .sample li p {margin-bottom:15px;}
        .evt10 .sample li a {display:inline-block; padding:10px 20px; font-size:16px; margin-right:10px; border-radius:8px; background:#000; color:#fff;}
        .evt10 .sample li a:hover {background:#fff; color:#000}
        .evt10 .sample li:last-child {margin:0}
        .evt10 .sample:after {content:""; display:block; clear:both}
        

        .evtCurri {width:720px; margin:50px auto 100px; text-align:left}
        .evtCurri li {font-size:20px; margin-bottom:15px; color:#232323; letter-spacing:-1px; line-height:1.3}
        .evtCurri li.cTitle {color:#a0774e; font-size:28px; margin:50px 0 30px; font-family: "Noto Sans KR Black", "Noto Sans KR", "sans-serif" !important;}

        .evtFooter {padding:100px 0; text-align:left; line-height:1.5; font-size:14px; color:#3a3a3a; background:#c2c2c2 !important}
        .evtFooter h3 {width:720px; margin:0 auto;font-size:1.5rem; margin-bottom:30px; }
        .evtFooter p {width:720px; margin:0 auto;font-size:1.1rem; margin-bottom:10px;}
        .evtFooter div,
        .evtFooter ul {width:720px; margin:0 auto 30px; padding-left:10px}
        .evtFooter li {margin-left:20px; list-style-type: decimal; }


        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000; line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:right; padding-right:10px; padding-top:5px; width:28%;}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%;}
        .newTopDday ul:after {content:""; display:block; clear:both}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">    
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1626_top.jpg" alt="신규 회원가입 이벤트" > 
        </div>  

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1626_01.jpg" alt="혜택" usemap="#Map1626A" border="0" >
            <map name="Map1626A">
                <area shape="rect" coords="242,468,865,568" href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2014" target="_blank" alt="회원가입하기">
            </map>             
        </div>

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1626_02.jpg" alt="신규회원 웰컴팩" >
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1626_03.jpg" alt="강의맛보기" >
            <div class="sampleView">
                <h4 class="NSK-Black">이커머스 <span>(온라인창업)</span></h4>
                <ul>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/07/1626_03_01.jpg" alt="김정환" >
                        <div class="viewBtns">
                            <a href="#none">1강</a>
                            <a href="#none">2강</a>
                        </div>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/07/1626_03_02.jpg" alt="김경은" >
                        <div class="viewBtns">
                            <a href="#none">1강</a>
                            <a href="#none">2강</a>
                        </div>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/07/1626_03_03.jpg" alt="황채영" >
                        <div class="viewBtns">
                            <a href="#none">1강</a>
                            <a href="#none">2강</a>
                        </div>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/07/1626_03_04.jpg" alt="정문진" >
                        <div class="viewBtns">
                            <a href="#none">1강</a>
                            <a href="#none">2강</a>
                        </div>
                    </li>                    
                </ul>
                <h4 class="NSK-Black">SNS <span>인풀루언서</span></h4>
                <ul>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/07/1626_03_05.jpg" alt="이시한" >
                        <div class="viewBtns">
                            <a href="#none">1강</a>
                            <a href="#none">2강</a>
                        </div>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/07/1626_03_06.jpg" alt="이승기" >
                        <div class="viewBtns">
                            <a href="#none">1강</a>
                            <a href="#none">2강</a>
                        </div>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/07/1626_03_07.jpg" alt="안혜빈" >
                        <div class="viewBtns">
                            <a href="#none">1강</a>
                            <a href="#none">2강</a>
                        </div>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/07/1626_03_08.jpg" alt="이기용" >
                        <div class="viewBtns">
                            <a href="#none">1강</a>
                            <a href="#none">2강</a>
                        </div>
                    </li>                    
                </ul>
                <h4 class="NSK-Black">지식창업 <span>(책쓰기)</span></h4>
                <ul>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/2020/07/1626_03_09.jpg" alt="양원근" >
                        <div class="viewBtns">
                            <a href="#none">1강</a>
                            <a href="#none">2강</a>
                        </div>
                    </li>                   
                </ul>

                <div class="evt03Txt01">
                    * 동영상 수강을 위해서는 스타플레이어 설치 후 재생하셔야 합니다.<br>
                    * 스타플레이어 미설치 경우 맛보기 수강버튼 클릭시 설치 메시지가 팝업으로 뜹니다.<br>
                    * 팝업 확인이 안 될 경우 팝업 해제 후 다시 진행하시면 됩니다.
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1626_04.jpg" alt="doming soon" >
        </div>
    </div>
    <!-- End Container -->



@stop