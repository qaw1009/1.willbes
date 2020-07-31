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
        .evt03 .sampleView .viewBtns a:hover {background:#333}
        .evt03 .sampleView .viewBtns a:last-child {margin:0}
        .evt03 .sampleView ul:after {content:''; display:block; clear:both}
        
        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2020/07/1626_04_bg.jpg) no-repeat center top}
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

        <div class="evtCtnsBox evt02">
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
            </div>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1626_04.jpg" alt="coming soon" >
        </div>
    </div>
    <!-- End Container -->



@stop