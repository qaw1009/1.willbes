@extends('willbes.pc.layouts.master')

@section('content')
<style>
.gosi .tx-color {
    color: #ba5610;
}
.gosi .will_nTit {border:0; font-size:46px}
.gosi .will_nTit span {color:#ba5610}

.gosi .Menu h3 {border:0}

/**/
.gosi-bnfull-Sec {position:relative; margin:0; height: 90px !important;}
.gosi-bnfull {position: absolute;
    top:0;
    left:50%;
    margin-left:-1000px;
    width: 2000px;
    min-width: 1120px;
    max-width: 2000px;
    height: 90px; 
    overflow: hidden;}    
.gosi-bnfull .bx-wrapper .sliderBar img {width:2000px !important; height:90px}

/*상단 메인 배너*//
.gosi .gosi-Sec {
    width: 100%;
    max-width: 2000px;        
}
.gosi .gosi-bntop {position:relative; margin:0; height: 460px !important;}
.gosi .gosi-bntop .GositabBox {
    position: absolute;
    top:0;
    left:50%;
    margin-left:-1000px;
    width: 2000px;
    min-width: 1120px;
    max-width: 2000px;
    height: 460px; 
    overflow: hidden;
}

.gosi .gosi-bntop .GositabBox p {position:absolute; top:50%; left:50%; margin-top:-28px; width:32px; height:50px; cursor:pointer; 
    background: url(https://static.willbes.net/public/images/promotion/main/2012_arrow_01.png) no-repeat left center;  opacity:0.2; filter:alpha(opacity=20);}
.gosi .gosi-bntop .GositabBox p a {display:none;}
.gosi .gosi-bntop .GositabBox p.leftBtn {margin-left:-620px;}
.gosi .gosi-bntop .GositabBox p.rightBtn {margin-left:588px; background-position: right center;}	
.gosi .gosi-bntop .GositabBox p:hover {opacity:100; filter:alpha(opacity=100);}

.gosi .gosi-bntop .GositabList {
    position: absolute;
    top:404px;
    width:100%;
    z-index: 50;
    background-color: rgba(0,0,0,0.5);
    padding:10px 0;
}

.gosi .gosi-bntop .Gositab {width:1120px; margin:0 auto; text-align:center}
.gosi .gosi-bntop .Gositab:after {content:""; display:block; clear:both}
.gosi .gosi-bntop .Gositab li {display:inline-block;  width: calc(12.5% - 1.5px);}   
.gosi .gosi-bntop .Gositab li a {display:block; text-align:center; line-height:1.2; font-size: 15px; color:#b4b4b4;}
.gosi .gosi-bntop .Gositab li a:hover,
.gosi .gosi-bntop .Gositab li a.active {color:#fff; font-weight: bold;}

/**/
.gosi .gosi-bn02 {margin-top:100px}
.gosi .gosi-bn02 ul {margin-right:-20px}
.gosi .gosi-bn02 li {
    display: inline;
    float: left;    
    width: 265px;       
    margin-right:20px;
}
.gosi .gosi-bn02 ul:after {
    content: "";
    display: block;
    clear: both;
}
.gosi .gosi-bn02 .slider {width: 265px; height:123px; overflow:hidden;}
.gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager {
    width: auto;
    left: 0;
    bottom: -20px;
    text-align: center;
}
.gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager.bx-default-pager a {
    background: #e1e1e1;
}
.gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager.bx-default-pager a:hover, 
.gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager.bx-default-pager a.active,
.gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager.bx-default-pager a:focus {
    background: #898989 !important;
}

/**/
.gosi-bn03 {margin-top:120px; padding-bottom:100px}    
.gosi-bn03 ul {margin-top:60px; margin-right:-20px}
.gosi-bn03 li {display:inline; float:left; width:265px; margin-right:20px}
.gosi-bn03 li:first-child {width:550px;}
.gosi-bn03 ul:after {content: ""; display: block; clear:both}
.gosi-bn03 .sliderNum {height:303px; overflow:hidden;}
.gosi-bn03 .nSlider .bx-wrapper .bx-controls-direction {
    position: absolute;
    top: 310px;
    left:0;
    right: 0;
    width: 100%;
    height: 20px;
    text-align:center;
}
.gosi-bn03 .nSlider .bx-wrapper .bx-controls-direction a {
    width: 20px;
    height: 20px;
}
.gosi-bn03 .nSlider .bx-wrapper a.bx-prev {
    background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat right top;
    left:145px !important;
}
.gosi-bn03 .nSlider .bx-wrapper a.bx-next {
    background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat left top;   
    left:100px !important;     
}
.gosi-bn03 li:first-child .bx-wrapper a.bx-prev {
    left:290px !important;
} 
.gosi-bn03 li:first-child .bx-wrapper a.bx-next {
    left:240px !important;
} 
.gosi-bn03 .nSlider .bx-wrapper .bx-pager {
    width: auto;
    position: absolute;
    top: 315px;
    left:0;
    right: 0;
    bottom: 0;
    font-size: 11px;
    font-weight: 300;
    color: #000;
    margin: 0;
    padding: 0;
    letter-spacing: 0;
}

/* */
.gosi-bnfull-Sec02 {position:relative; height: 190px; background: url(https://static.willbes.net/public/images/promotion/main/2003/3019_1120x190_bg.jpg) repeat-x left bottom; }
.gosi-bnfull-Sec02 .gosi-bnfull02 {width: 1120px; height: 190px; margin:0 auto; overflow: hidden;}    
.gosi-bnfull-Sec02 p {position:absolute; top:70%; left:50%; margin-top:-19px; width:22px; height:38px; cursor:pointer; 
    background: url(https://static.willbes.net/public/images/promotion/main/arrow_w22.png) no-repeat left center;  opacity:0.4; filter:alpha(opacity=40);}
.gosi-bnfull-Sec02 p a {display:none;}
.gosi-bnfull-Sec02 p.leftBtn {margin-left:-620px;}
.gosi-bnfull-Sec02 p.rightBtn {margin-left:588px; background-position: right center;}
.gosi-bnfull-Sec02 p:hover {opacity:100; filter:alpha(opacity=100);}

/*교수진*/
.gosi-profWrap {background:#d3e0e4; padding:130px 0}
.gosi-profWrap .will_nTit {border:0;font-size:46px;color:#fff;padding-bottom:50px;}
.gosi-profWrap .will_nTit span {color:#4f6f7c;vertical-align:top;}

.gosi-tabs-contents-wrap {width:1120px; height:470px; overflow:hidden}
.gosi-gate-prof li {        
    display: inline;
    float: left;  
    margin-right:15px;  
    width: 208px;
    height:470px;
    background:#fff;                      
}   

.gosi-gate-prof li:last-child {margin:0}
.gosi-gate-prof:after {
    content: "";
    display: block;
    clear: both;
}
.gosi-gate-prof .nSlider {}  
.gosi-gate-prof .nSlider .sliderProf div {width: 208px !important; height:470px; position:relative;}
.gosi-gate-prof .nSlider .bx-wrapper .bx-controls-direction {
    position: absolute;
    top: 445px;
    left:0;
    right: 0;
    width: 100%;
    height: 20px;
    text-align:center;
}
.gosi-gate-prof .nSlider .bx-wrapper .bx-controls-direction a {
    width: 20px;
    height: 20px;
}
.gosi-gate-prof .nSlider .bx-wrapper a.bx-prev {
    background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat right top;
    left:120px !important;
}
.gosi-gate-prof .nSlider .bx-wrapper a.bx-next {
    background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat left top;   
    left:70px !important;     
}
.gosi-gate-prof .nSlider .bx-wrapper .bx-pager {
    width: auto;
    position: absolute;
    top: 450px;
    left:0;
    right: 0;
    bottom: 0;
    font-size: 11px;
    font-weight: 300;
    color: #000;
    margin: 0;
    padding: 0;
    letter-spacing: 0;
}

.Section4_hl .will-acadTit {font-size:19px;font-weight:600;color:#363636;line-height:60px;border-bottom: 2px solid #000;margin-bottom:20px;}
.Section4_hl .tx-color {color:#643fb5;}
.willbesNumber .tx-color {color:#643fb5;}

</style>

<!-- Container -->

<div id="Container" class="Container gosi NGR c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">공무원<span class="row-line">|</span></li>
                <li class="subTit">검찰직</li>
            </ul>
            <ul class="menu-List">
                <li class="dropdown">
                    <a href="#none">교수진소개</a>
                    <div class="drop-Box drop-Box-1120 list-drop-Box list-drop-Box-1120 gosi">
                        <div class="prof-drop-Box">
                            <h5>9급</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">기미진</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50661/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">김세령</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50053/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">권기태</a>
                                </li>
                                <li>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">한덕현</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50273/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김신주</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">성기건</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50383/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김영</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50651/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">박초롱</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50309/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">이아림</a>
                                </li>
                                <li>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">조민주</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50305/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">한경춘</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">오태진</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50003/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">원유철</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50015/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">김윤수</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50441/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">박민주</a>
                                </li>
                                <li>
                                    <span>[행정법]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50109/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">황남기</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50717/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">한세훈</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50615/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">이석준</a>
                                </li>
                                <li>
                                    <span>[행정학]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50559/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">김덕관</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50041/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">윤세훈</a>
                                    <span>[세법]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50187/?subject_idx=1123&subject_name=%EC%84%B8%EB%B2%95">고선미</a>
                                </li>
                                <li>
                                    <span>[회계학]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50227/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김영훈</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50057/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김현식</a>
                                    <span>[국제법]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50393/?subject_idx=1127&subject_name=%EA%B5%AD%EC%A0%9C%EB%B2%95">이상구</a>
                                </li>
                                <li>
                                    <span>[사회]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50181/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C">문병일</a>
                                    <a href="/professor/show/cate/3019/prof-idx/50313/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C">한수성</a>
                                    <span>[수학]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50201/?subject_idx=1135&subject_name=%EC%88%98%ED%95%99">곽윤근</a>
                                </li>
                                <li>
                                    <span>[공직선거법]</span>
                                    <a href="/professor/show/cate/3019/prof-idx/50109/?subject_idx=1137&subject_name=%EA%B3%B5%EC%A7%81%EC%84%A0%EA%B1%B0%EB%B2%95">황남기</a>
                                </li>
                            </ul>
                        </div>

                        <div class="prof-drop-Box">
                            <h5>7급</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">기미진</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50053/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">권기태</a>
                                </li>
                                <li>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">한덕현</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">성기건</a>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">조민주</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">오태진</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50015/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">김윤수</a>
                                </li>
                                <li>
                                    <span>[행정법]</span>                                    
                                    <a href="/professor/show/cate/3020/prof-idx/50717/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">한세훈</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50109/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">황남기</a>
                                    <span>[행정학]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50559/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">김덕관</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50041/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">윤세훈</a>
                                </li>
                                <li>
                                    <span>[헌법]</span>                                    
                                    <a href="/professor/show/cate/3020/prof-idx/50139/?subject_idx=1114&subject_name=%ED%97%8C%EB%B2%95">유시완</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50109/?subject_idx=1114&subject_name=%ED%97%8C%EB%B2%95">황남기</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50577/?subject_idx=1114&subject_name=%ED%97%8C%EB%B2%95">박기범</a>
                                    <span>[경제학]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50487/?subject_idx=1115&subject_name=%EA%B2%BD%EC%A0%9C%ED%95%99">황정빈</a>
                                </li>
                                <li>
                                    <span>[세법]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50187/?subject_idx=1123&subject_name=%EC%84%B8%EB%B2%95">고선미</a>    
                                    <span>[회계학]</span>                                    
                                    <a href="/professor/show/cate/3020/prof-idx/50227/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김영훈</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50057/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김현식</a>
                                    <span>[국제법]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50559/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">이상구</a>                                    
                                </li>
                                <li>
                                    <span>[국제정치학]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50393/?subject_idx=1128&subject_name=%EA%B5%AD%EC%A0%9C%EC%A0%95%EC%B9%98%ED%95%99">이상구</a>                                    
                                    <span>[공직선거법]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50109/?subject_idx=1137&subject_name=%EA%B3%B5%EC%A7%81%EC%84%A0%EA%B1%B0%EB%B2%95">황남기</a>    
                                    <span>[일본어]</span>                                    
                                    <a href="/professor/show/cate/3020/prof-idx/50726/?subject_idx=1161&subject_name=%EC%9D%BC%EB%B3%B8%EC%96%B4">황선아</a>
                                </li>
                                <li>
                                    <span>[G-TELP]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50713/?subject_idx=1177&subject_name=G-TELP">서민지</a>
                                    <a href="/professor/show/cate/3020/prof-idx/50275/?subject_idx=1177&subject_name=G-TELP">이유정</a>                                     
                                    <span>[프랑스어]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50001/?subject_idx=1178&subject_name=%ED%94%84%EB%9E%91%EC%8A%A4%EC%96%B4">박훈</a>    
                                </li>
                                <li>
                                    <span>[중국어]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50061/?subject_idx=1162&subject_name=%EC%A4%91%EA%B5%AD%EC%96%B4">조소현</a>                                    
                                    <span>[경영학]</span>
                                    <a href="/professor/show/cate/3020/prof-idx/50549/?subject_idx=1185&subject_name=%EA%B2%BD%EC%98%81%ED%95%99">전수환</a>    
                                    <span>[물리학개론]</span>                                    
                                    <a href="/professor/show/cate/3020/prof-idx/50127/?subject_idx=1226&subject_name=%EB%AC%BC%EB%A6%AC%ED%95%99%EA%B0%9C%EB%A1%A0">고진목</a>
                                </li>
                            </ul>
                        </div>

                        <div class="prof-drop-Box">
                            <h5>세무직</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3022/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">기미진</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50053/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">권기태</a>
                                </li>
                                <li>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3022/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">한덕현</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50273/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김신주</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">성기건</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50383/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김영</a>
                                </li>
                                <li>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3022/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">조민주</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">오태진</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50015/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">김윤수</a>
                                </li>
                                <li>
                                    <span>[세법]</span>
                                    <a href="/professor/show/cate/3022/prof-idx/50187/?subject_idx=1123&subject_name=%EC%84%B8%EB%B2%95">고선미</a>   
                                </li>
                                <li> 
                                    <span>[회계학]</span>                                    
                                    <a href="/professor/show/cate/3022/prof-idx/50227/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김영훈</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50057/?subject_idx=1124&subject_name=%ED%9A%8C%EA%B3%84%ED%95%99">김현식</a>                                 
                                </li>
                                <li>
                                    <span>[사회]</span>
                                    <a href="/professor/show/cate/3022/prof-idx/50181/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C">문병일</a>
                                    <a href="/professor/show/cate/3022/prof-idx/50313/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C">한수성</a>
                                </li>
                                <li>
                                    <span>[수학]</span>
                                    <a href="/professor/show/cate/3022/prof-idx/50201/?subject_idx=1135&subject_name=%EC%88%98%ED%95%99">곽윤근</a>
                                </li>
                                <li>&nbsp;</li>
                            </ul>
                        </div>

                        <div class="prof-drop-Box">
                            <h5>법원직</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3035/prof-idx/50065/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">이현나</a>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3035/prof-idx/50651/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">박초롱</a>
                                    <a href="/professor/show/cate/3035/prof-idx/50545/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김반이</a>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3035/prof-idx/50571/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">임진석</a>
                                </li>
                                <li>
                                    <span>[헌법]</span>
                                    <a href="/professor/show/cate/3035/prof-idx/50591/?subject_idx=1114&subject_name=%ED%97%8C%EB%B2%95">이국령</a>    
                                    <span>[형법]</span>                                    
                                    <a href="/professor/show/cate/3035/prof-idx/50073/?subject_idx=1116&subject_name=%ED%98%95%EB%B2%95">문형석</a>
                                    <span>[형사소송법]</span>
                                    <a href="/professor/show/cate/3035/prof-idx/50685/?subject_idx=1117&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95">유안석</a>
                                </li>
                                <li>
                                    <span>[민법]</span>
                                    <a href="/professor/show/cate/3035/prof-idx/50519/?subject_idx=1118&subject_name=%EB%AF%BC%EB%B2%95">김동진</a>    
                                    <span>[민사소송법]</span>                                    
                                    <a href="/professor/show/cate/3035/prof-idx/50145/?subject_idx=1119&subject_name=%EB%AF%BC%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95">이덕훈</a>
                                </li>
                            </ul>
                            <h5>소방직</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3023/prof-idx/50661/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">김세령</a>
                                </li>
                                <li>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3023/prof-idx/50309/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">이아림</a>
                                    <a href="/professor/show/cate/3023/prof-idx/50479/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">이현정</a>
                                    <a href="/professor/show/cate/3023/prof-idx/50565/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">제니</a>
                                    <a href="/professor/show/cate/3023/prof-idx/50273/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김신주</a>
                                </li>
                                <li>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3023/prof-idx/50305/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">한경준</a>
                                    <a href="/professor/show/cate/3023/prof-idx/50403/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">배준환</a>
                                </li>
                                <li>
                                    <span>[소방학개론]</span>
                                    <a href="/professor/show/cate/3023/prof-idx/50465/?subject_idx=1113&subject_name=%EC%86%8C%EB%B0%A9%ED%95%99%EA%B0%9C%EB%A1%A0">김종상</a>    
                                    <span>[사회]</span>                                    
                                    <a href="/professor/show/cate/3023/prof-idx/50181/?subject_idx=1133&subject_name=%EC%82%AC%ED%9A%8C">문병일</a>                                    
                                </li>
                                <li>
                                    <span>[소방관계법규]]</span>
                                    <a href="/professor/show/cate/3023/prof-idx/50465/?subject_idx=1138&subject_name=%EC%86%8C%EB%B0%A9%EA%B4%80%EA%B3%84%EB%B2%95%EA%B7%9C">김종상</a>
                                    <span>[체력]</span>
                                    <a href="/professor/show/cate/3023/prof-idx/50387/?subject_idx=1399&subject_name=%EC%B2%B4%EB%A0%A5">제이슨</a>                                   
                                </li>
                            </ul>
                        </div>

                        <div class="prof-drop-Box">
                            <h5>기술직</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">기미진</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50053/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">권기태</a>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">한덕현</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50273/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김신주</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50345/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">성기건</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50383/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">김영</a>                                    
                                </li>
                                <li>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50647/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">조민주</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50027/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">오태진</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50305/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">한경준</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50441/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">박민주</a>
                                    <a href="/professor/show/cate/3028/prof-idx/50015/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">김윤수</a>
                                </li>
                                <li>
                                    <span>[보건행정]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50395/?subject_idx=1129&subject_name=%EB%B3%B4%EA%B1%B4%ED%96%89%EC%A0%95">하재남</a>    
                                    <span>[공중보건]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50395/?subject_idx=1130&subject_name=%EA%B3%B5%EC%A4%91%EB%B3%B4%EA%B1%B4">하재남</a>
                                    <span>[전기기기]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50718/?subject_idx=1168&subject_name=%EC%A0%84%EA%B8%B0%EA%B8%B0%EA%B8%B0">최우영</a>
                                </li>
                                <li>
                                    <span>[재배학]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1171&subject_name=%EC%9E%AC%EB%B0%B0%ED%95%99">장사원</a>    
                                    <span>[식용작물]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1172&subject_name=%EC%8B%9D%EC%9A%A9%EC%9E%91%EB%AC%BC">장사원</a>
                                    <span>[통신이론]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50718/?subject_idx=1173&subject_name=%EC%A0%84%EA%B8%B0%EC%9D%B4%EB%A1%A0">최우영</a>
                                </li>
                                <li>
                                    <span>[전자공학]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50163/?subject_idx=1193&subject_name=%EC%A0%84%EC%9E%90%EA%B3%B5%ED%95%99">최우영</a>    
                                    <span>[무선공학]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50163/?subject_idx=1194&subject_name=%EB%AC%B4%EC%84%A0%EA%B3%B5%ED%95%99">최우영</a>
                                    <span>[통신이론]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50163/?subject_idx=1195&subject_name=%ED%86%B5%EC%8B%A0%EC%9D%B4%EB%A1%A0">최우영</a>
                                </li>
                                <li>
                                    <span>[회로이론]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50718/?subject_idx=1198&subject_name=%ED%9A%8C%EB%A1%9C%EC%9D%B4%EB%A1%A0">최우영</a>    
                                    <span>[전기자기학]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50163/?subject_idx=1210&subject_name=%EC%A0%84%EA%B8%B0%EC%9E%90%EA%B8%B0%ED%95%99">최우영</a>
                                    <span>[응용역학개론]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50435/?subject_idx=1214&subject_name=%EC%9D%91%EC%9A%A9%EC%97%AD%ED%95%99%EA%B0%9C%EB%A1%A0">장성국</a>
                                </li>
                                <li>
                                    <span>[토목설계]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50435/?subject_idx=1215&subject_name=%ED%86%A0%EB%AA%A9%EC%84%A4%EA%B3%84">장성국</a>    
                                    <span>[기계일반]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50463/?subject_idx=1216&subject_name=%EA%B8%B0%EA%B3%84%EC%9D%BC%EB%B0%98">김정배</a>
                                    <span>[기계설계]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50463/?subject_idx=1217&subject_name=%EA%B8%B0%EA%B3%84%EC%84%A4%EA%B3%84">김정배</a>
                                </li>
                                <li>
                                    <span>[작물생리학]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1220&subject_name=%EC%9E%91%EB%AC%BC%EC%83%9D%EB%A6%AC%ED%95%99">장사원</a>    
                                    <span>[생물]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1222&subject_name=%EC%83%9D%EB%AC%BC">장사원</a>
                                    <span>[물리학개론]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50127/?subject_idx=1226&subject_name=%EB%AC%BC%EB%A6%AC%ED%95%99%EA%B0%9C%EB%A1%A0">고진목</a>
                                </li>
                                <li>
                                    <span>[간호관리]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50539/?subject_idx=1227&subject_name=%EA%B0%84%ED%98%B8%EA%B4%80%EB%A6%AC">김명애</a>    
                                    <span>[지역사회간호]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50539/?subject_idx=1228&subject_name=%EC%A7%80%EC%97%AD%EC%82%AC%ED%9A%8C%EA%B0%84%ED%98%B8">김명애</a>
                                </li>
                                <li>
                                    <span>[농촌지도론]</span>
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1230&subject_name=%EB%86%8D%EC%B4%8C%EC%A7%80%EB%8F%84%EB%A1%A0">장사원</a>    
                                    <span>[유기농업기능사]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1232&subject_name=%EC%9C%A0%EA%B8%B0%EB%86%8D%EC%97%85%EA%B8%B0%EB%8A%A5%EC%82%AC">장사원</a>
                                    <span>[토양학]</span>                                    
                                    <a href="/professor/show/cate/3028/prof-idx/50429/?subject_idx=1243&subject_name=%ED%86%A0%EC%96%91%ED%95%99">장사원</a>
                                </li>
                            </ul>                            
                        </div>

                        <div class="prof-drop-Box">
                            <h5>군무원</h5>
                            <ul>
                                <li>
                                    <span>[국어]</span>
                                    <a href="/professor/show/cate/3024/prof-idx/50729/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">오훈</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50621/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">임재진</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50053/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4">권기태</a>
                                </li>
                                <li>
                                    <span>[행정법]</span>
                                    <a href="/professor/show/cate/3024/prof-idx/50615/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">이석준</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50639/?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95">변원갑</a>
                                    <span>[행정학]</span>
                                    <a href="/professor/show/cate/3024/prof-idx/50107/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">김헌</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50559/?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99">김덕관</a>
                                </li>
                                <li>
                                    <span>[공중보건]</span>
                                    <a href="/professor/show/cate/3024/prof-idx/50395/?subject_idx=1130&subject_name=%EA%B3%B5%EC%A4%91%EB%B3%B4%EA%B1%B4">하재남</a>    
                                    <span>[G-TELP]</span>                                    
                                    <a href="/professor/show/cate/3024/prof-idx/50713/?subject_idx=1177&subject_name=G-TELP">서민지</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50275/?subject_idx=1177&subject_name=G-TELP">이유정</a>                                 
                                </li>
                                <li>
                                    <span>[경영학]</span>
                                    <a href="/professor/show/cate/3024/prof-idx/50763/?subject_idx=1185&subject_name=%EA%B2%BD%EC%98%81%ED%95%99">고강유</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50549/?subject_idx=1185&subject_name=%EA%B2%BD%EC%98%81%ED%95%99">전수환</a>
                                    <span>[전자회로]</span>                                    
                                    <a href="/professor/show/cate/3024/prof-idx/50163/?subject_idx=1196&subject_name=%EC%A0%84%EC%9E%90%ED%9A%8C%EB%A1%9C">최우영</a>
                                </li>
                                <li>
                                    <span>[한국사검정능력시험]</span>
                                    <a href="/professor/show/cate/3024/prof-idx/50619/?subject_idx=1237&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC%EA%B2%80%EC%A0%95%EB%8A%A5%EB%A0%A5%EC%8B%9C%ED%97%98">김상범</a>
                                    <a href="/professor/show/cate/3024/prof-idx/50305/?subject_idx=1237&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC%EA%B2%80%EC%A0%95%EB%8A%A5%EB%A0%A5%EC%8B%9C%ED%97%98">한경준</a>
                                </li>
                            </ul>
                            <h5>부사관</h5>
                            <ul>
                                <li>
                                    <span>[영어]</span>
                                    <a href="/professor/show/cate/3030/prof-idx/50479/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4">이현정</a>
                                    <span>[한국사]</span>
                                    <a href="/professor/show/cate/3030/prof-idx/50649/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC">정훈의</a>
                                    <span>[언어논리]</span>
                                    <a href="/professor/show/cate/3030/prof-idx/50231/?subject_idx=1146&subject_name=%EC%96%B8%EC%96%B4%EB%85%BC%EB%A6%AC">이서연</a>
                                </li>
                                <li>
                                    <span>[자료해석/공간/지각/상환판단]</span>
                                    <a href="/professor/show/cate/3030/prof-idx/50239/?subject_idx=1197&subject_name=%EC%9E%90%EB%A3%8C%ED%95%B4%EC%84%9D%2F%EA%B3%B5%EA%B0%84%2F%EC%A7%80%EA%B0%81%2F%EC%83%81%ED%99%A9%ED%8C%90%EB%8B%A8">황두기</a>  
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">수강신청</a>
                    <div class="drop-Box drop-Box-1120 list-drop-Box list-drop-Box-1120 gosi2">
                        <div class="lec-drop-Box-gosi">
                            <h5>9급</h5>
                            <ul>
                                <li>
                                    <strong>직렬</strong>
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&series_ccd=614001')}}">일반행정직</a>
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&series_ccd=614002')}}">교육행정직</a>
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&series_ccd=614003')}}">출입국관리직</a>
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&series_ccd=614004')}}">선거행정직</a>
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&series_ccd=614005')}}">사회복지직</a>
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&series_ccd=614006')}}">9급견습직</a>                                  
                                </li>
                                <li>
                                    <strong>패키지</strong>
                                    <a href="{{front_url('/package/index/cate/3019/pack/648001')}}">추천패키지</a>
                                    <a href="{{front_url('/userPackage/show/cate/3019/prod-code/154935/lidx/3')}}">DIY패키지</a>
                                    <a href="{{front_url('/promotion/index/cate/3019/code/1281')}}">T-PASS</a> 
                                </li>                                
                                <li>
                                    <strong>과목</strong>
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1107')}}">국어</a>
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1108')}}">영어</a>
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1109')}}">한국사</a>
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1111')}}">행정법</a>
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1112')}}">행정학</a>
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1127')}}">국제법</a>
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=1133')}}">사회</a>
                                </li>
                                <li>
                                    <strong>과정</strong>
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&course_idx=1055')}}">기본과정</a>
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&course_idx=1097')}}">심화과정</a>   
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&course_idx=1098')}}">기출문제</a>   
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&course_idx=1056')}}">단원별문제</a>   
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&course_idx=1100')}}">모의고사</a>   
                                    <a href="{{front_url('/lecture/index/cate/3019/pattern/only?search_order=regist&subject_idx=&course_idx=1057')}}">특강(새벽/테마)</a>   
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box-gosi">
                            <h5>7급</h5>
                            <ul>
                                <li>
                                    <strong>직렬</strong>
                                    <a href="{{front_url('/home/index/cate/3103')}}">PSAT</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&series_ccd=614001')}}">일반행정직</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&series_ccd=614010')}}">세무직</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&series_ccd=614011')}}">검찰사무직</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&series_ccd=614004')}}">선거행정직</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&series_ccd=614003')}}">출입국관리직</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&series_ccd=614013')}}">외무영사직</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&series_ccd=614014')}}">감사직</a>                                  
                                </li>
                                <li>
                                    <strong>패키지</strong>
                                    <a href="{{front_url('/package/index/cate/3020/pack/648001')}}">추천패키지</a>
                                    <a href="{{front_url('/userPackage/show/cate/3020/prod-code/154961/lidx/3')}}">DIY패키지</a>
                                    <a href="{{front_url('/promotion/index/cate/3020/code/1519')}}">7급 PASS</a> 
                                    <a href="{{front_url('/promotion/index/cate/3020/code/1520')}}">외무영사 PASS</a> 
                                </li>
                                <li>
                                    <strong>과목</strong>
                                    <a href="{{front_url('pass.willbes.net/home/index/cate/3103')}}">PSAT</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1107')}}">국어</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1108')}}">영어</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1109')}}">한국사</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1111')}}">행정법</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1112')}}">행정학</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1114')}}">헌법</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1115')}}">경제학</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1123')}}">세법</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1124')}}">회계학</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1127')}}">국제법</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1128')}}">국제정치학</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1185')}}">경영학</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1162')}}">중국어</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=1178')}}">프랑스어</a>
                                </li>
                                <li>
                                    <strong>과정</strong>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&course_idx=1055')}}">기본과정</a>
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&course_idx=1097')}}">심화과정</a>   
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&course_idx=1098')}}">기출문제</a>   
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&course_idx=1056')}}">단원별문제</a>   
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&course_idx=1100')}}">모의고사</a>   
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&course_idx=1057')}}">특강(새벽/테마)</a>   
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box-gosi">
                            <h5>세무직</h5>
                            <ul>
                                <li>
                                    <strong>패키지</strong>
                                    <a href="{{front_url('/package/index/cate/3022/pack/648001')}}">추천패키지</a>
                                    <a href="{{front_url('/userPackage/show/cate/3022/prod-code/154935/lidx/3')}}">DIY패키지</a>
                                    <a href="{{front_url('/promotion/index/cate/3022/code/1281')}}">T-PASS</a> 
                                </li>
                                <li>
                                    <strong>과목</strong>
                                    <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=1107')}}">국어</a>
                                    <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=1108')}}">영어</a>
                                    <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=1109')}}">한국사</a>
                                    <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=1123')}}">세법</a>
                                    <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=1124')}}">회계학</a>
                                    <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=1112')}}">행정학</a>
                                    <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=1133')}}">사회</a>
                                </li>
                                <li>
                                    <strong>과정</strong>
                                    <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=&course_idx=1055')}}">기본과정</a>
                                    <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=&course_idx=1097')}}">심화과정</a>   
                                    <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=&course_idx=1098')}}">기출문제</a>   
                                    <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=&course_idx=1056')}}">단원별문제</a>   
                                    <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=&course_idx=1100')}}">모의고사</a>   
                                    <a href="{{front_url('/lecture/index/cate/3022/pattern/only?search_order=regist&subject_idx=&course_idx=1057')}}">특강(새벽/테마)</a>   
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box-gosi">
                            <h5>법원직</h5>
                            <ul>
                                <li>
                                    <strong>패키지</strong>
                                    <a href="{{front_url('/package/index/cate/3035/pack/648001')}}">순환별패키지</a>
                                    <a href="{{front_url('/promotion/index/cate/3035/code/1480')}}">법원직 PASS</a>
                                </li>
                                <li>
                                    <strong>과목</strong>
                                    <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=1107')}}">국어</a>
                                    <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=1108')}}">영어</a>
                                    <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=1109')}}">한국사</a>
                                    <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=1114')}}">헌법</a>
                                    <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=1118')}}">민법</a>
                                    <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=1119')}}">민사소송법</a>
                                    <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=1116')}}">형법</a>
                                    <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=1117')}}">형사소송법</a>
                                </li>
                                <li>
                                    <strong>과정</strong>
                                    <a href="{{front_url('/promotion/index/cate/3035/code/1485')}}">예비순환</a>
                                    <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D')}}">1순환(기본)</a>   
                                    <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MuyInO2ZmA%3D%3D')}}">2순환(심화)</a>   
                                    <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6M%2ByInO2ZmA%3D%3D')}}">3순환(핵심)</a>   
                                    <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NOyInO2ZmA%3D%3D')}}">4순환(진도별모고)</a>   
                                    <a href="{{front_url('/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NeyInO2ZmA%3D%3D')}}">5순환(실전모고)</a>   
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box-gosi">
                            <h5>소방직</h5>
                            <ul>
                                <li>
                                    <strong>패키지</strong>
                                    <a href="{{front_url('/package/index/cate/3023/pack/648001')}}">추천패키지</a>
                                    <a href="{{front_url('/promotion/index/cate/3023/code/1081')}}">T-PASS</a>
                                    <a href="{{front_url('/promotion/index/cate/3023/code/1060')}}">소방 PASS</a>
                                </li>
                                <li>
                                    <strong>과목</strong>
                                    <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=1107')}}">국어</a>
                                    <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=1108')}}">영어</a>
                                    <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=1109')}}">한국사</a>
                                    <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=1113')}}">소방학개론</a>
                                    <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=1138')}}">소방관계법규</a>
                                    <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=1133')}}">사회</a>
                                    <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=1111')}}">행정법</a>
                                </li>
                                <li>
                                    <strong>과정</strong>
                                    <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=&course_idx=1055')}}">기본과정</a>
                                    <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=&course_idx=1097')}}">심화과정</a>   
                                    <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=&course_idx=1098')}}">기출문제</a>   
                                    <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=&course_idx=1056')}}">단원별문제</a>   
                                    <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=&course_idx=1100')}}">모의고사</a>   
                                    <a href="{{front_url('/lecture/index/cate/3023/pattern/only?search_order=regist&subject_idx=&course_idx=1057')}}">특강(새벽/테마)</a>   
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box-gosi">
                            <h5>기술직</h5>
                            <ul>
                                <li>
                                    <strong>직렬</strong>
                                    <a href="{{front_url('/promotion/index/cate/3028/code/1071#tab3')}}">방송통신직</a>
                                    <a href="{{front_url('/promotion/index/cate/3028/code/1071#tab3')}}">통신직</a>
                                    <a href="{{front_url('/promotion/index/cate/3028/code/1071#tab3')}}">전기직</a>
                                    <a href="{{front_url('/promotion/index/cate/3028/code/1068#tab1')}}">9급농업직</a>
                                    <a href="{{front_url('/promotion/index/cate/3028/code/1068#tab2')}}">7급농업직</a>
                                    <a href="{{front_url('/promotion/index/cate/3028/code/1068#tab3')}}">농촌지도사</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1129&series_ccd=614025')}}">보건직</a> 
                                    <a href="{{front_url('/lecture/index/cate/3020/pattern/only?search_order=regist&subject_idx=&series_ccd=614014')}}">토목직</a>                                  
                                </li>
                                <li>
                                    <strong>패키지</strong>
                                    <a href="{{front_url('/package/index/cate/3028/pack/648001')}}">추천패키지</a>
                                    <a href="{{front_url('/promotion/index/cate/3028/code/1071')}}">전기직 패키지</a>
                                    <a href="{{front_url('/promotion/index/cate/3028/code/1071')}}">통신직 패키지</a>
                                    <a href="{{front_url('/promotion/index/cate/3028/code/1068')}}">농업직 패키지</a>
                                    <a href="{{front_url('/promotion/index/cate/3028/code/1068')}}">농촌지도사 패키지</a>
                                </li>
                                <li>
                                    <strong>과목</strong>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1107')}}">국어</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1108')}}">영어</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1109')}}">한국사</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1171')}}">재배학</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1172')}}">식물작물</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1243')}}">토양학</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1220')}}">작물생리학</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1222')}}">생물학</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1230')}}">농촌지도론</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1232')}}">유기농업기능사</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1130')}}">공중보건</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1129')}}">보건행정</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1229')}}">자동차구조론</a><br>
                                    <strong>&nbsp;</strong>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1168')}}">전기기기</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1173')}}">전기이론</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1193')}}">전자공학</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1194')}}">무선공학</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1195')}}">통신이론</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1210')}}">전기자기학</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1198')}}">회로이론</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1196')}}">전자회로</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1214')}}">응용역학</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1215')}}">토목설계</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1216')}}">기계일반</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=1217')}}">기계설계</a>
                                </li>
                                <li>
                                    <strong>과정</strong>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=&course_idx=1055')}}">기본과정</a>
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=&course_idx=1097')}}">심화과정</a>   
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=&course_idx=1098')}}">기출문제</a>   
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=&course_idx=1056')}}">단원별문제</a>   
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=&course_idx=1100')}}">모의고사</a>   
                                    <a href="{{front_url('/lecture/index/cate/3028/pattern/only?search_order=regist&subject_idx=&course_idx=1057')}}">특강(새벽/테마)</a>   
                                </li>
                            </ul>
                        </div>
                        <div class="lec-drop-Box-gosi">
                            <h5>군무원</h5>
                            <ul>
                                <li>
                                    <strong>패키지</strong>
                                    <a href="{{front_url('/package/index/cate/3024/pack/648001')}}">추천패키지</a>
                                    <a href="{{front_url('/userPackage/show/cate/3024/prod-code/155023/lidx/3')}}">DIY패키지</a>
                                    <a href="{{front_url('/promotion/index/cate/3024/code/1521')}}">군무원 PASS</a>
                                </li>
                                <li>
                                    <strong>과목</strong>
                                    <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=1107')}}">국어</a>
                                    <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=1111')}}">행정법</a>
                                    <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=1112')}}">행정학</a>
                                    <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=1185')}}">경영학</a>
                                    <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=1196')}}">전자회로</a>
                                    <a href="{{front_url('http://lang.willbes.net/home/index/cate/3093')}}">G-TELP</a>
                                    <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=1237')}}">한국사능력시험</a>
                                </li>
                                <li>
                                    <strong>과정</strong>
                                    <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=&course_idx=1055')}}">기본과정</a>
                                    <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=&course_idx=1097')}}">심화과정</a>   
                                    <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=&course_idx=1098')}}">기출문제</a>   
                                    <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=&course_idx=1056')}}">단원별문제</a>   
                                    <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=&course_idx=1100')}}">모의고사</a>   
                                    <a href="{{front_url('/lecture/index/cate/3024/pattern/only?search_order=regist&subject_idx=&course_idx=1057')}}">특강(새벽/테마)</a>   
                                </li>
                            </ul>
                        </div>

                        {{--
                        <div class="lec-drop-Box-gosi">
                            <h5>부사관</h5>
                            <ul>
                                <li>
                                    <a href="/promotion/index/cate/3030/code/1093">부사관PASS</a>   
                                </li>
                            </ul>
                        </div>
                        --}}
                    </div>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="#none">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">패키지</li>
                            <li><a href="#none">추천 패키지</a></li>
                            <li><a href="#none">선택 패키지</a></li>
                            <li><a href="#none">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">교재구매</a>
                </li>
                <li class="pass dropdown">
                    <a href="//pass.dev.willbes.net/pass/home/index" target="_self">
                        공무원학원
                        <span class="arrow-Btn">></span>
                    </a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">공무원학원</li>
                            <li><a href="//pass.dev.willbes.net/pass/campus/show/code/605001" target="_self">노량진(본원)</a></li>
                            <li><a href="//pass.dev.willbes.net/pass/campus/show/code/605003" target="_self">부산</a></li>
                            <li><a href="//pass.dev.willbes.net/pass/campus/show/code/605004" target="_self">대구</a></li>
                            <li><a href="//pass.dev.willbes.net/pass/campus/show/code/605005" target="_self">인천</a></li>
                            <li><a href="//pass.dev.willbes.net/pass/campus/show/code/605006" target="_self">광주</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </h3>
    </div>

    <div class="gosi-bnfull-Sec">
        <div class="gosi-bnfull">
            <div class="sliderBar">
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_fullx90_01.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_fullx90_02.jpg" alt="배너명"></a></div>
            </div>
        </div>
    </div>   

    <div class="Section gosi-Sec NSK">
        <div class="gosi-bntop">                        
            <div id="TechRollingSlider" class="GositabBox">
                <ul class="GositabSlider">
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3148_2000x440_01.png" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_02.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_03.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_04.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_01.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_02.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_04.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_03.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_02.jpg" alt="배너명"></a></li>
                </ul>                  
                <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
                <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p> 
            </div> 
            
            <div id="TechRollingDiv" class="GositabList">
                <div class="Gositab">
                    <li><a data-slide-index="0" href="javascript:void(0);" class="active">윌비스 검찰팀<br>예비합격생 모집</a></li>
                    <li><a data-slide-index="1" href="javascript:void(0);">농업전공X영어<br>PACKAGE</a></li>
                    <li><a data-slide-index="2" href="javascript:void(0);">전기/통신 5과목<br>PACKAGE</a></li>
                    <li><a data-slide-index="3" href="javascript:void(0);">농업직 5과목<br>PACKAGE</a></li>
                    <li><a data-slide-index="4" href="javascript:void(0);">축산/기계/조경<br>NEW 라인업</a></li>
                    <li><a data-slide-index="5" href="javascript:void(0);">환경직<br>PACKAGE</a></li>
                    <li><a data-slide-index="6" href="javascript:void(0);">전산직<br>PACKAGE</a></li>
                    <li><a data-slide-index="7" href="javascript:void(0);">임업직<br>PACKAGE</a></li>                                   
                </div>
            </div>           
        </div>        
    </div>   

    <div class="Section">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/2003/3148_01.jpg" alt="연간 커리큘럼">
        </div>
    </div>

    <div class="Section">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/2003/3148_02.jpg" alt="합격을 위한 운영방식">
        </div>
    </div>

    <div class="Section gosi-profWrap">
        <div class="widthAuto">
            <div class="will_nTit NSK-Black">합격을 책임질 <span>검찰 대표 교수진</span></div>       
            <div class="gosi-tabs-contents-wrap">
                <div class="gosi-tabs-content">
                    <ul class="gosi-gate-prof">
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/pro_208x470_01.png" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_02.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/pro_208x470_02.png" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_03.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/pro_208x470_03.png" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/pro_208x470_04.png" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/pro_208x470_05.png" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                    </ul>                
                </div>
            </div>
        </div>
    </div>

    <div class="Section NSK Section4_hl mb50">
        <div class="widthAuto">
            <div class="will-acadTit">윌비스 <span class="tx-color">공무원</span> 학원</div>
            <div class="noticeTabs campus c_both">
                <div class="tabBox noticeBox_campus">
                    <div id="campus1" class="tabContent">
                        <div class="map_img" id="map">지도영역</div>
                        <div class="map_img" id="alterMap1" style="display: none">
                            <img src="https://static.willbes.net/public/images/promotion/main/2003/3035_map.jpg" alt="김동진 법원팀">
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">학원</span> 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                    서울시 동작구 노량진로 196 노량빌딩 7층
                                </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1544-0330 > 2번</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="Section NSK mt90 mb90">
        <div class="widthAuto">
            <div class="CScenterBox">
                <dl>
                    <dt class="willbesNumber">
                        <ul>
                            <li>
                                <div class="nTit">온라인 수강문의</div>
                                <div class="nNumber tx-color">1544-5006 <span>▶</span> 2</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 18시 (점심시간12시~13시)<br/>
                                    공휴일/일요일휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">교재문의</div>
                                <div class="nNumber tx-color">1544-4944</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 17시 (점심시간12시~13시)<br/>
                                    공휴일/일요일휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">학원 고객센터</div>
                                <div class="nNumber tx-color">1544-0330</div>
                                <div class="nTxt">
                                    [전화/방문상담 운영시간]<br/>
                                    평일/주말: 09시~ 22시<br/>
                                </div>
                            </li>
                        </ul>
                    </dt>    
                    <dt class="willbesCenter">
                        <div class="centerTit">윌비스 공무원 사이트에 물어보세요!</div>
                        <ul>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                                    <div class="nTxt">자주하는<br/>질문</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter2.png') }}">
                                    <div class="nTxt">모바일<br/>서비스</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                                    <div class="nTxt">동영상<br/>상담실</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                                    <div class="nTxt">1:1<br/>고객지원</div>
                                </a>
                            </li>
                        </ul>
                    </dt>
                    
                </dl>
            </div>            
        </div>
    </div>
    <!-- CS센터 //-->

</div>

<!-- End Container -->
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey={{ config_item('kakao_js_app_key') }}&libraries=services"></script>
<script type="text/javascript" src="/public/js/map_util.js?ver={{time()}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var info_txt = '<div style="padding:5px; 5px; background:#fff; border: 1px solid midnightblue">윌비스 <strong class="tx-color">한림법학원</strong><br>김동진법원팀(7~9층)</div>';
        var $kakaomap = new kakaoMap();
        $kakaomap.config.ele_id = 'map';
        $kakaomap.config.alter_id = 'alterMap1';
        $kakaomap.config.level = 4;
        $kakaomap.config.addr = '서울 동작구 노량진로 196';
        $kakaomap.config.info_txt = info_txt;
        $kakaomap.config.info_txt_x_anchor = 0.5;
        $kakaomap.config.info_txt_y_anchor = 2.2;
        $kakaomap.run();
    });
</script> 

<script type="text/javascript">
    $(function() {
        $('.sliderBar').bxSlider({
            mode:'fade',
            auto: true,
            touchEnabled: false,
            controls: false,
            sliderWidth:2000,
            pause: 3000,
            autoHover: true,
            pager: false,
        });
    });

    //상단 메인 배너
    $(function(){ 
        var slidesImg = $(".GositabSlider").bxSlider({
            mode:'horizontal',
            touchEnabled: false,
            speed:400,
            pause:5000,
            sliderWidth:2000,
            auto : true,	
            autoHover: true,						
            pagerCustom: '#TechRollingDiv',
            controls:false, 				
            onSliderLoad: function(){
                $("#TechRollingSlider").css("visibility", "visible").animate({opacity:1}); 
            }
        });	
        $("#imgBannerRight").click(function (){
            slidesImg.goToPrevSlide();
        });
    
        $("#imgBannerLeft").click(function (){
            slidesImg.goToNextSlide();
        });			
    }); 

    /*bar 배너 롤링 */
    $(function() {
        var slidesImg02 = $(".sliderBar02").bxSlider({
            mode:'fade',
            auto: true,
            touchEnabled: false,
            controls: false,
            sliderWidth:2000,
            pause: 3000,
            autoHover: true,
            pager: false,
        });
        $("#imgBannerRight02").click(function (){
            slidesImg02.goToPrevSlide();
        });
    
        $("#imgBannerLeft02").click(function (){
            slidesImg02.goToNextSlide();
        });	
    });

    /*교수진*/
    $(function() {
        $('.sliderProf').bxSlider({        
            auto: true,
            controls: true,
            pause: 4000,
            pager: true,
            pagerType: 'short',
            slideWidth: 208,
            minSlides:1,
            maxSlides:1,
            moveSlides:1,
            adaptiveHeight: true,
            infiniteLoop: true,
            touchEnabled: false,
            autoHover: true,
            onSliderLoad: function(){
                $(".gosi-gate-prof").css("visibility", "visible").animate({opacity:1}); 
            }  
        });
    });

    /*윌비스 강좌*/
    $(function(){ 
        $('.prof-subject').bxSlider({ 
            speed:800,  
            responsive:true,
            infiniteLoop:true,
            pager:false,
            slideWidth:78,
            minSlides:1,
            maxSlides:8
        });
    });

    /*수강후기*/
    $(function() {
        $('.sliderNumV').bxSlider({
            mode: 'vertical', 
            auto: true,
            controls: true,
            infiniteLoop: true,
            slideWidth: 1120,
            pagerType: 'short',
            minSlides: 3,
            pause: 3000,
            pager: true,
            onSliderLoad: function(){
                $(".vSlider").css("visibility", "visible").animate({opacity:1}); 
            } 
        });
    });
</script>
@stop