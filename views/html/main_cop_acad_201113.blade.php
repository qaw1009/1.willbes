@extends('willbes.pc.layouts.master')

@section('content')
<style>
    /*********************************************     Main Container : Cop Acad     *********************************************/       
.cop_acad .tx-color {
    color: #0c5dc0;
}
.PA .tx-color {
    color: #0c5dc0;
}
.cop_acad .Menu .menu-List li.Acad a {
    background: url("../../img/willbes/cop_acad/icon_acad.png") no-repeat 0 2px;
    color: #2784d2;
}
.cop_acad .Menu .menu-List li.Acad a .arrow-Btn {
    background: url("../../img/willbes/sub/icon_arrow.gif") no-repeat 0 0;
}
.cop_acad .Section2 {
    background: #f7f7f7;
}

/* Main Container : MainVisual : Cop Acad */
.MainVisual:after {
    content: "";
    display: block;
    clear: both;
}

.MainVisual_acad ul li {
    float: left;
    margin-left: 11px;
}
.MainVisual_acad ul li:first-child {
    margin-left: 0;
}


/* Main Container : Tit : Cop Acad */
.Section .will-acadTit {
    font-size: 19px;
    font-weight: 600;
    color: #363636;
    line-height: 60px;
}
.Section .will-acadTit span {
    vertical-align: baseline;
}


/* Main Container : 학원소식... : Cop Acad */
.sliderSuccess {
    float: left;
    width: 356px;    
    margin-right: 18px;
}
.sliderSuccessPlay {
    width: 356px;
    height: 200px;
    background: #000;
}
.sliderSuccess iframe {
    width: 356px;
    height: 200px;
}
.sliderInfo {
    float: left;
    width: 356x;
    margin-right: 32px;
}
.sliderInfo ul li {
    margin-top: 4px;
}
.sliderInfo ul li:first-child {
    margin-top: 0;
}

/* Main Container : acad_infoBox : Cop Acad */

.caProfBox li {
    position: relative;
    display: inline;
    float: left;
    width: 271px;
    height: 297px;
    margin-right:12px;
    margin-bottom: 12px;
    overflow: hidden;
    background: url("../../img/willbes/cop_acad/prof/prof_temp.jpg") no-repeat center center;
}

.caProfBox li:nth-child(4),
.caProfBox li:nth-child(8),
.caProfBox li:last-child {
    margin-right:0;
}

.caProfBox li img {
    position: absolute;
    left:50%;
    margin-left:-50%;
}
.caProfBox .caProfBtsn {
    position: absolute;
    top:170px;
    left:35px;
    font-size: 14px;
}
.caProfBox .caProfBtsn a {
    display: block;
    font-size: 16px;
    background: url("../../img/willbes/cop_acad/icon_arrow.png") no-repeat 95% 7px;
    padding:5px 30px 5px 5px;
    margin-left:-5px;
    margin-bottom: 5px
}
.caProfBox .caProfBtsn span {
    display: block;
    font-size: 13px;
    color:#fd6f31;
    margin-top: 4px;
}
.caProfBox .caProfBtsn a:hover {
    color:#fff !important;
    background: #0c5dc0 url("../../img/willbes/cop_acad/icon_arrow.png") no-repeat 95% 7px;
    border-radius: 0 5px 0 5px;
}
.caProfBox .caProfBtsn a:hover span {
    color:#fff;
}
.caProfBox:after {
    content: '';
    display: block;
    clear: both;
}

/* Main Container : 특별관리반 : Cop Acad */
.specialClass li {
    display: inline;
    float: left;
    margin-right: 12px;
}
.specialClass li:last-child {
    margin: 0;
}
.specialClass:after {
    content: '';
    display: block;
    clear: both;
}

/* Main Container : 합격커리큘럼 : Cop Acad */
.passCurriWrap {
    position:absolute;
    top:351px;
    left:36px;
    z-index: 1;
}
.passCurriWrap ul {
    position: relative;
}
.passCurriWrap li {
    position: absolute;
    z-index: 1;
}
.passCurriWrap li img.out {display: block}
.passCurriWrap li img.over {display: none}
.passCurriWrap li:hover img.over {display: block;}
.passCurriWrap li.curriStep1:hover img.over {    
    margin-top:-41px;
    margin-left:-24px;
}
.passCurriWrap li.curriStep2 {
    top: 40px;
    left: 170px;
}
.passCurriWrap li.curriStep2:hover img.over {    
    margin-top:-41px;
    margin-left:-6px;
}
.passCurriWrap li.curriStep3 {
    top: 80px;
    left: 340px;
}
.passCurriWrap li.curriStep3:hover img.over {    
    margin-top:-120px;
    margin-left:0;
}
.passCurriWrap li.curriStep4 {
    top: 120px;
    left: 340px;
}
.passCurriWrap li.curriStep4:hover img.over {    
    margin-top:-41px;
    margin-left:0;
}
.passCurriWrap li.curriStep5 {
    top: 160px;
    left: 709px;
}
.passCurriWrap li.curriStep5:hover img.over {    
    margin-top:-133px;
    margin-left:-2px;
}
.passCurriWrap li.curriStep6 {
    top: 200px;
    left: 879px;
}
.passCurriWrap li.curriStep6:hover img.over {    
    margin-top:-181px;
    margin-left:-1px;
}



/* Main Container : Notice : noticeTabs */
.noticeTabs.acad {
    float: right;
    width: 358px;
    margin-top: 27px;
}
.tabWrap.noticeWrap_acad {
    height: 34px;
    border-bottom: 1px solid #0c5dc0;
}
.tabWrap.noticeWrap_acad li {
    float: left;
    width: 100px;
    height: 34px;
    margin-right: -1px;
}
.tabWrap.noticeWrap_acad li a {
    display: block;
    width: 100%;
    height: 33px;
    line-height: 33px;
    background: none;
    font-size: 14px;
    color: #7c7c7c;
    text-align: center;
    letter-spacing: 0;
    border-top: 1px solid #e1e1e1;
    border-left: 1px solid #e1e1e1;
    border-right: 1px solid #e1e1e1;
}
.tabWrap.noticeWrap_acad li a.on {
    position: relative;
    z-index: 2;
    background: #fff;
    height: 34px;
    line-height: 33px;
    color: #0c5dc0;
    border-top: 1px solid #0c5dc0;
    border-left: 1px solid #0c5dc0;
    border-right: 1px solid #0c5dc0;
}
.tabBox.noticeBox_acad a.btn-add {
    position: absolute;
    top: -30px;
    right: 0;
}
.tabBox.noticeBox_acad .List-Table {
    padding: 9px 0 0;
}
.tabBox.noticeBox_acad .List-Table li {
    font-size: 13px;
    color: #3a3a3a;
    height: 37px;
    line-height: 37px;
    border-top: 1px solid #e3e3e3;
}
.tabBox.noticeBox_acad .List-Table li:first-child {
    border-top: none;
}
.tabBox.noticeBox_acad .List-Table li a {
    display: inline-block;
    width: 92%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}
.tabBox.noticeBox_acad .List-Table li a img {
    margin-right: 5px;
}


/* Main Container : campus : Cop Acad */
.tabWrap.noticeWrap_campus {
    height: 60px;
    border-bottom: none;
    border-top: 2px solid #000;
    clear: both;
}
.tabWrap.noticeWrap_campus li {
    float: left;
    width: auto;
    height: 60px;
    margin: 0 10px;
}
.tabWrap.noticeWrap_campus li a {
    display: block;
    width: 100%;
    height: 60px;
    line-height: 60px;
    background: none;
    font-size: 13px;
    color: #3a3a3a;
    text-align: center;
    letter-spacing: 0;
    border: none;
    padding-right: 20px;
}
.tabWrap.noticeWrap_campus li:first-child a {
    border-left: none;
} 
.tabWrap.noticeWrap_campus li a.on {
    position: relative;
    z-index: 2;
    background: none;
    height: 60px;
    line-height: 60px;
    font-weight: 600;
    color: #3a3a3a;
    border: none;
}
.tabWrap.noticeWrap_campus .row-line {
    float: right;
    background: #b7b7b7;
    width: 1px;
    height: 12px;
    margin: -36px 0 0;
}

.tabBox.noticeBox_campus {
    clear: both;
}
.tabBox.noticeBox_campus a.btn-add {
    position: relative;
    top: -1px;
    margin-left: 10px;
}
.tabBox.noticeBox_campus .List-Table {
    padding: 10px 0 20px;
}
.tabBox.noticeBox_campus .List-Table li {
    font-size: 14px;
    color: #3a3a3a;
    height: 37px;
    line-height: 37px;
}
.tabBox.noticeBox_campus .List-Table li a {
    display: inline-block;
    width: 100%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}

.map_img {
    position: relative;
    float: left;
}
.map_img span {
    position: absolute;
    padding:5px;
    background: #33373a;
    color:#fff;
    min-width: 50px;
    text-align: center;
    border:1px solid #000;
    border-radius: 10px;
    top:51%;
    left:50%;
    margin-left: -25px;
    box-shadow: 2px 2px 2px rgba(0,0,0,.5);
    z-index: 1;
}
.map_img span.origin {
    min-width: 80px;
    margin-left: -40px;
}

.campus_info {
    position: relative;
    float: right;
    width: 350px;
    height: 328px;
}
.campus_info dl dt {
    padding: 25px 0;
}
.campus_info dl dt:first-child {
    border-top: none;
    padding: 0;
}
.campus_info .c-tit {
    font-size: 16px;
    font-weight: 600;
    line-height: 30px;
}
.campus_info .c-tit span {
    vertical-align: baseline;
}
.campus_info .c-info {
    font-size: 14px;
    color: #3a3a3a;
    line-height: 18px;
}
.campus_info .c-info span {
    float: left;
    display: table;
}
.campus_info .c-info span.a-tit {
    width: 60px;
    text-align: left; 
}
.campus_info .c-info span.tx-color {
    font-weight: 600;
}
.campus_info .c-info div {
    clear: both;
}
.campus_info .c-info div:after {
    content: '';
    display: block;
    clear: both;
}
.campus_info .c-info div.tel {
    margin-top: 10px;
}
.campus_info .btn {
    position: absolute;
    left: 0;
    bottom: 0;
}
.campus_info .btn2 {
    top:440px;
}
.campus_info .btn a {
    display: inline-block; 
    font-size: 21px; 
    font-weight: 600;
    padding: 11px 47px;
    color: #0c5dc0;
    text-align: center;
    border: 1px solid #0c5dc0;
}

/*캠퍼스 메인 오시는 길*/
.PA .map_img {
    position: relative;
    float: left;
    width: 580px;
    height: 328px;
    overflow: hidden;
}
.PA .map_img img {
    position: absolute;
    left:50%;
    margin-left:-349px;
}

.PA .campus_info {
    position: relative;
    float: right;
    width: 320px;
    height: 328px;
}
.PA .campus_info dl dt {
    border-top: 1px solid #e3e3e3;
    padding: 25px 0;
}
.PA .campus_info dl dt:first-child {
    border-top: none;
    padding: 0 0 25px;
}

/* Main Container : QuickMenu : Cop */
.cop_acad .MainQuickMenu {
    position: fixed;
    top: 110px;
    right: 20px;
    width: 160px;
    height: auto;    
    z-index: 100;
}
.cop_acad .MainQuickMenu ul {
    padding:0 8px !important;
    background: #ececec;
    width:100%;
}
.cop_acad .MainQuickMenu li {
    border-top:1px solid #f6f6f6;
    border-bottom:1px solid #d4d4d4;
    height: 40px;
    line-height: 40px;
    background: url("../../img/willbes/cop_acad/icon_arrow02.png") no-repeat 95% center;
    margin: 0;
}
.cop_acad .MainQuickMenu li:first-child {
    border-top:0;
}
.cop_acad .MainQuickMenu li:last-child {
    border-bottom:0;
}
.cop_acad .MainQuickMenu li a {
    display: block; padding-left:30px; background-position: 5px center; background-repeat:no-repeat;
}
.cop_acad .MainQuickMenu li a:hover {
    color:#00acec; 
}
.cop_acad .MainQuickMenu li:nth-child(1) a {
    background-image: url("../../img/willbes/cop_acad/icon_rq01.png");
}
.cop_acad .MainQuickMenu li:nth-child(2) a {
    background-image: url("../../img/willbes/cop_acad/icon_rq07.png");
}
.cop_acad .MainQuickMenu li:nth-child(3) a {
    background-image: url("../../img/willbes/cop_acad/icon_rq02.png");
}
.cop_acad .MainQuickMenu li:nth-child(4) a {
    background-image: url("../../img/willbes/cop_acad/icon_rq03.png");
}
.cop_acad .MainQuickMenu li:nth-child(5) a {
    background-image: url("../../img/willbes/cop_acad/icon_rq05.png");
}
.cop_acad .MainQuickMenu li:nth-child(6) a {
    background-image: url("../../img/willbes/cop_acad/icon_rq10.png");
}
.cop_acad .MainQuickMenu li:nth-child(7) a {
    background-image: url("../../img/willbes/cop_acad/icon_rq06.png");
}
.cop_acad .MainQuickMenu li:nth-child(8) a {
    background-image: url("../../img/willbes/cop_acad/icon_rq08.png");
}

/*sub 메인*/
.PA .subSection01 {
    clear: both;
    width: 940px;
    height: 304px;
    overflow: hidden;
}

.PA .subSection02 {
    clear: both;
    width: 940px !important;
    height: 105px;
    overflow: hidden;
}
.PA .subSection02 ul li {
    float: left;
    width: 468px !important;
    margin-left: 4px;
}
.PA .subSection02 ul li:first-child {
    margin-left: 0;
}

/* sub Main Container : Notice : noticeTabs */
.PA .noticeTabs.acad {
    width: 100%;
    margin-top: 50px;
}

#notice3 .mapWrap {
    margin-top: 40px;
    background: #606060;
}
#notice3 .mapWrap .mapImg {
    position: relative;
    float: left;
    width: 534px;
    height: 250px;
    overflow: hidden;
    margin-bottom: 40px;
}
#notice3 .mapWrap .mapImg img {
    position: absolute;
    top:-39px;
    left:-82px;
}
#notice3 .mapWrap .add {
    float: right;
    width: 40%;
    font-size: 13px;
}
#notice3 .mapWrap .add ul li span {
    display: inline-block;
    width: 70px;
    height: 38px;
    line-height: 38px;
    text-align: center;
    background: #f9f9f9;
    float: left;
    margin-right:8px;
}
#notice3 .mapWrap .add ul li {
    border-top:1px solid #959595 !important;
    border-bottom:1px solid #efefef !important;
    margin-bottom:1px;
    height: 40px;
    line-height: 40px;
    letter-spacing: normal;
}
#notice3 .mapWrap .add ul li.mapTit {
    font-size: 16px;
    border:0 !important;
}
#notice3 .mapWrap .add ul li:last-child {
    border-top:0 !important;
    border-bottom:1px solid #959595 !important;
}
#notice3 .mapWrap:after {
    conternt:'';
    display: block;
    clear: both;
}
</style>
<!-- Container -->
<div id="Container" class="Container cop_acad NSK c_both">
    <div class="Menu widthAuto NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">경찰학원</li>                
            </ul>
            <ul class="menu-List">
                <li class="dropdown">
                    <a href="#none">교수진소개</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">형사소송법</li>
                            <li><a href="#none">신광은</a></li>
                            <li class="Tit">경찰학개론</li>
                            <li><a href="#none">장정훈</a></li>
                            <li class="Tit">형법</li>
                            <li><a href="#none">김원욱</a></li>
                            <li class="Tit">영어</li>
                            <li><a href="#none">하승민</a></li>
                            <li><a href="#none">김현정</a></li>
                            <li class="Tit">한국사</li>
                            <li><a href="#none">오태진</a></li>
                            <li><a href="#none">원유철</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">종합반</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">PASS</li>
                            <li><a href="#none">0원 PASS</a></li>
                            <li><a href="#none">6개월 PASS</a></li>
                            <li><a href="#none">12개월 PASS</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">단과</a>
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
                    <a href="#none">수험정보</a>
                </li>
                <li>
                    <a href="#none">상담실</a>
                </li>
                <li>
                    <a href="#none">학원안내</a>
                </li>
                <li>
                    <a href="#none">이벤트</a>
                </li>
                <li class="dropdown">
                    <a href="#none">전국캠퍼스</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">전국캠퍼스</li>
                            <li><a href="#none">신림</a></li>
                            <li><a href="#none">인천</a></li>
                            <li><a href="#none">대구</a></li>
                            <li><a href="#none">부산</a></li>
                            <li><a href="#none">광주</a></li>
                            <li><a href="#none">제주</a></li>
                            <li><a href="#none">전북</a></li>
                            <li><a href="#none">전주</a></li>
                        </ul>
                    </div>
                </li>
                <li class="Acad">
                    <a href="#none">신광은경찰 온라인 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>

    <div class="Section MainVisual MainVisual_acad mb20 mt20">
        <div class="widthAuto">
            <ul>
                <li class="VisualsubBox_acad">
                    <a href="#none"><img src="{{ img_url('cop_acad/visual/visual_secB01.jpg') }}" title="기본이론종합반"></a>
                </li>
                <li class="VisualsubBox_acad">
                    <a href="#none"><img src="{{ img_url('cop_acad/visual/visual_secB02.jpg') }}" title="superpass"></a>
                </li>
                <li class="VisualsubBox_acad">
                    <a href="#none"><img src="{{ img_url('cop_acad/visual/visual_secB03.jpg') }}" title="문제풀이패키지"></a>
                </li>
                <li class="VisualsubBox_acad">                    
                    <div class="bSlider acad">
                        <div class="bSlider slider">
                            <div><a href="#none"><img src="{{ img_url('cop_acad/visual/visual_secB04_01.jpg') }}" title="합격전략설명회"></a></div>
                            <div><a href="#none"><img src="{{ img_url('cop_acad/visual/visual_secB04_02.jpg') }}" title="황세웅면접캠프"></a></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="Section mb50">
        <div class="widthAuto">
            <ul class="specialClass">   
                <li><a href="#none"><img src="{{ img_url('cop_acad/banner/bnr_A01.jpg') }}" title="스파르타"></a></li>
                <li><a href="#none"><img src="{{ img_url('cop_acad/banner/bnr_A02.jpg') }}" title="영어지옥 탈출반"></a></li>
                <li><a href="#none"><img src="{{ img_url('cop_acad/banner/bnr_A03.jpg') }}" title="통합생활 관리반"></a></li>
                <li><a href="#none"><img src="{{ img_url('cop_acad/banner/bnr_A04.jpg') }}" title="특별체력 관리반"></a></li>
            </ul>
        </div>
    </div>

    <div class="Section mb50">
        <div class="widthAuto">
            <div class="will-acadTit">교수별 <span class="tx-color">빠른강좌</span> 찾기</div>
            <ul class="caProfBox">
                <li>
                    <img src="{{ img_static_url('promotion/main/2002/2002_prof_ske.jpg') }}" usemap="#MapProf01" title="배너명" alt="배너명" border="0">
                    <map name="MapProf01">
                        <area shape="rect" coords="22,173,183,217" href="#">
                        <area shape="rect" coords="21,220,182,261" href="#">
                    </map>
                </li>
                <li>
                    <img src="{{ img_static_url('promotion/main/2002/2002_prof_jjh.jpg') }}" usemap="#MapProf02" title="배너명" alt="배너명" border="0">
                    <map name="MapProf02">
                        <area shape="rect" coords="22,173,183,217" href="#">
                        <area shape="rect" coords="21,220,182,261" href="#">
                    </map>
                </li>
                <li>
                    <img src="{{ img_static_url('promotion/main/2002/2002_prof_wyc.jpg') }}" usemap="#MapProf03" title="배너명" alt="배너명" border="0">
                    <map name="MapProf03">
                        <area shape="rect" coords="22,173,183,217" href="#">
                        <area shape="rect" coords="21,220,182,261" href="#">
                    </map>
                </li>
                <li>
                    <img src="{{ img_static_url('promotion/main/2002/2002_prof_otj.jpg') }}" usemap="#MapProf04" title="배너명" alt="배너명" border="0">
                    <map name="MapProf04">
                        <area shape="rect" coords="22,173,183,217" href="#">
                        <area shape="rect" coords="21,220,182,261" href="#">
                    </map>
                </li>
                <li>
                    <img src="{{ img_static_url('promotion/main/2002/2002_prof_kwu.jpg') }}" usemap="#MapProf05" title="배너명" alt="배너명" border="0">
                    <map name="MapProf05">
                        <area shape="rect" coords="22,173,183,217" href="#">
                        <area shape="rect" coords="21,220,182,261" href="#">
                    </map>
                </li>
                <li>
                    <img src="{{ img_static_url('promotion/main/2002/2002_prof_hsm.jpg') }}" usemap="#MapProf06" title="배너명" alt="배너명" border="0">
                    <map name="MapProf06">
                        <area shape="rect" coords="22,173,183,217" href="#">
                        <area shape="rect" coords="21,220,182,261" href="#">
                    </map>
                </li>                                        
                <li>
                    <img src="{{ img_static_url('promotion/main/2002/2002_prof_khj.jpg') }}" usemap="#MapProf07" title="배너명" alt="배너명" border="0">
                    <map name="MapProf07">
                        <area shape="rect" coords="22,173,183,217" href="#">
                        <area shape="rect" coords="21,220,182,261" href="#">
                    </map>
                </li>
                <li>
                    <img src="{{ img_static_url('promotion/main/2002/2002_prof_kjk.jpg') }}" usemap="#MapProf08" title="배너명" alt="배너명" border="0">
                    <map name="MapProf08">
                        <area shape="rect" coords="22,173,183,217" href="#">
                        <area shape="rect" coords="21,220,182,261" href="#">
                    </map>
                </li>                  
            </ul>
        </div>
    </div>
    <!-- 교수별 빠른강좌 //--> 
    

    <div class="Section Section2 pb110">     
        <div class="widthAuto tx-center pt80 pb80">    
            <img src="{{ img_url('cop_acad/visual/visual_curri_tit.png') }}" title="최적의 합격 커리큘럼">
        </div> 
        <div class="widthAuto CurriStepBox">
            <div class="CurriView"><a href="{{ site_url('/promotion/index/cate/3001/code/1126') }}" target="_blank">커리큘럼 자세히보기 &gt;</a></div>
            <ul class="CurriStep">
                <li class="active">
                    <div class="curriculumBox">
                        <span><img src="{{ img_url('cop/icon_bubble.gif') }}" title="2019대비 진행중"> </span>
                        <div class="Tit">기본과정</div>
                        <div class="subTit">집중연강식 진행</div>
                        <ul class="info">
                            <li>기초개념 정리</li>
                            <li>지속적인 복습테스트</li>
                            <li>초시생 필수 수강과정</li>
                        </ul>
                    </div>
                    <a href="#none" onclick="fnPlayerSample('132199', '1019097', 'HD');">OT보기 &gt;</a>
                </li>
                <li>&nbsp;</li>
                <li>
                    <div class="curriculumBox">
                        <div class="Tit">심화과정</div>
                        <div class="subTit">프리미엄 심화과정</div>
                        <ul class="info">
                            <li>실력업그레이드</li>
                            <li>심화 l 이론/기출학습</li>
                            <li>고득점 합격발판 마련</li>
                        </ul>
                    </div>
                    <a href="#none" onclick="fnPlayerSample('132216', '1019296', 'HD');">OT보기 &gt;</a>
                </li>
                <li>&nbsp;</li>
                <li>
                    <div class="curriculumBox">
                        <div class="Tit">문제풀이 과정</div>
                        <div class="subTit">(실전 1+2+3 단계)</div>
                        <ul class="info">
                            <li>1단계 진도별 핵심정리</li>
                            <li>2단계 전범위 동형모의고사</li>
                            <li>3단계 FINAL 실전 모의고사</li>
                        </ul>
                    </div>
                    <a href="#none" onclick="fnPlayerSample('131811', '1014607', 'HD');">OT보기 &gt;</a>
                </li>
            </ul>
            <div class="curriculumTxt">
                <span class="cop-color">모든 강의</span>를 평생 0원 PASS 하나로 <span class="cop-color">평생 수강</span>하실 수 있습니다.
                <span class="btn"><a href="{{ site_url('/promotion/index/cate/3001/code/1009') }}" target="_blank">평생 0원 PASS 구매하기</a></span>
            </div>
        </div>
        <!-- CurriStepBox //--> 
        <div class="widthAuto curri_schedule">
            <img src="https://static.willbes.net/public/images/promotion/main/3001_curri_schedule.png" alt="커리큘럼 시간표">               
            <ul class="curri_schedules">
                <li>
                    <span>12.30~1.31</span>
                </li>
                <li>
                    <span>6월 중순 예정</span>
                </li>
                <li>
                    <span>2.3~3.13</span>
                </li>    
                <li>
                    <span>7월 예정</span> 
                </li>
                <li>
                    <span>3.23~3.27</span>
                </li>
                <li>
                    <span>8월 예정</span>
                </li>
                <li>
                    <span>2.22</span>
                </li>
                <li>
                    <span>3.14</span>
                </li>
                <li>
                    <span>5~6월 예정</span>
                </li>
                <li>
                    <span>7월 예정</span>
                </li>
                <li>
                    <span>8월 예정</span>
                </li>
                <li>
                    <span>예정</span>
                </li>
                <li>
                    <span>예정</span>
                </li>
                <li>
                    <span>예정</span>
                </li>
                <li>
                    <span>예정</span>
                </li>
            </ul>                
        </div>      
    </div>

    {{-- on air include --}}
    @include('willbes.pc.site.main_partial.on_air')

    <div class="Section mt40">
        <div class="widthAuto">
            <div class="sliderSuccess">
                <div class="will-acadTit"><span class="tx-color">신광은경찰</span> 학원소식</div>
                <div class="sliderSuccessPlay">
                    <iframe src="https://www.youtube.com/embed/lrZxQV21DE8?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
                </div>
            <div class="sliderInfo">
                <div class="will-acadTit"><span class="tx-color">왜</span> 노량진 실강인가?</div>
                <a href="#none" target="_blank"><img src="{{ img_url('cop_acad/banner/bnr_B01.jpg') }}" title="노량진24시"></a>
            </div>
            <div class="noticeTabs acad">
                <ul class="tabWrap noticeWrap_acad two">
                    <li><a href="#notice1" class="on">공지사항</a></li>
                    <li><a href="#notice2" class="">수험뉴스</a></li>
                </ul>
                <div class="tabBox noticeBox_acad">
                    <div id="notice1" class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}" title="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none"><img src="{{ img_url('cop/icon_hot.png') }}" title="HOT"> 공지사항 제목이 출력됩니다. 공지사항 제목이 출력됩니다.</a></li>
                            <li><a href="#none"><img src="{{ img_url('cop/icon_hot.png') }}" title="HOT"> 3월 31일(금) 새벽시스템점검안내 안내안내안내 새벽시스템점검안내 안내안내안내</a></li>
                            <li><a href="#none">설연휴학원고객센터운영안내 고객센터운영안내</a></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내 고객센터운영안내</a></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내 고객센터운영안내</a></li>
                        </ul>
                    </div>
                    <div id="notice2" class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}" title="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none"><img src="{{ img_url('cop/icon_hot.png') }}" title="HOT"> 공지사항 제목이 출력됩니다.</a></li>
                            <li><a href="#none">3월 31일(금) 새벽시스템점검안내222</a></li>
                            <li><a href="#none">설연휴학원고객센터운영안내22</a></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내22</a></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내22</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="Section Section4 mb50 mt30">
        <div class="widthAuto">
            <div class="will-acadTit">윌비스 <span class="tx-color">신광은경찰</span> 캠퍼스</div>
            <div class="noticeTabs campus c_both">
                <ul class="tabWrap noticeWrap_campus">
                    <li><a href="#campus1" class="on">노량진(본원)</a><span class="row-line">|</span></li>
                    <li><a href="#campus2" class="">신림</a><span class="row-line">|</span></li>
                    <li><a href="#campus3" class="">인천</a><span class="row-line">|</span></li>
                    <li><a href="#campus4" class="">대구</a><span class="row-line">|</span></li>
                    <li><a href="#campus5" class="">부산</a><span class="row-line">|</span></li>
                    <li><a href="#campus6" class="">광주</a><span class="row-line">|</span></li>
                    <li><a href="#campus7" class="">제주</a><span class="row-line">|</span></li>
                    <li><a href="#campus8" class="">전북</a><span class="row-line">|</span></li>
                    <li><a href="#campus9" class="">진주</a></li>
                </ul>

                <div class="tabBox noticeBox_campus">
                    <div id="campus1" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map_cop_origin.jpg') }}" title="노량진">
                            <span class="origin">노량진(본원)</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">노량진</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}" title="더보기"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">노량진</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                서울시동작구만양로105 2층<br/>
                                                (서울시동작구노량진동116-2 2층)
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1544-0336</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 노량진//-->

                    <div id="campus2" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map_cop_sl.jpg') }}" title="신림">
                            <span>신 림</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">신림</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">신림</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                서울 관악구 신림로 23길 16 4층
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1544-4006</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 신림 //-->

                    <div id="campus3" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map_cop_ic.jpg') }}" title="인천">
                            <span>인 천</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">인천</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">인천</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                인천 부평구 부평동 534-28 중보빌딩 10층
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1544-1661</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 인천 //-->

                    <div id="campus4" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map_cop_dg.jpg') }}" title="대구">
                            <span>대 구</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">대구</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">대구</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                            대구 중구 중앙대로 412(남일동) CGV 2층
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1522-6112</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 대구// -->

                    <div id="campus5" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map_cop_bs.jpg') }}" title="부산">
                            <span>부 산</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">부산</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">부산</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                            부산 진구 부정동 223-8
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1522-8112</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 부산 //-->

                    <div id="campus6" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map_cop_kj.jpg') }}" title="광주">
                            <span>광 주</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">광주</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">광주</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                            광주 북구 호동로 6-11
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">062-722-8140</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 광주 //-->
        
                    <div id="campus7" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map_cop_jj.jpg') }}" title="제주">
                            <span>제 주</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">제주</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">제주</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                            제주도 제주시 동광로 56 3층
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">064-722-8140</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 제주//-->

                    <div id="campus8" class="tabContent">
                        <div>
                            <div class="map_img">
                                <img src="{{ img_url('cop_acad/map/map_cop_jbjj.jpg') }}" title="전북 전주">
                                <span>전북 전주</span>                       
                            </div>
                            <div class="campus_info">
                                <dl>
                                    <dt>
                                        <div class="c-tit">
                                            <span class="tx-color">전북 </span> 캠퍼스 공지사항
                                            <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                        </div>
                                        <div class="c-info p_re">
                                            <ul class="List-Table">
                                                <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                                <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                            </ul>
                                        </div>
                                    </dt>
                                    <dt>
                                        <div class="c-tit"><span class="tx-color">전북 전주</span> 캠퍼스 오시는 길</div>
                                        <div class="c-info">
                                            <div class="address">
                                                <span class="a-tit">주소</span>
                                                <span>
                                                    전북 전주시 덕진동2가 전북대학교 농생대1호관 303호
                                                </span>
                                            </div>
                                            <div class="tel">
                                                <span class="a-tit">연락처</span>
                                                <span class="tx-color">063-270-4144</span>
                                            </div>
                                        </div>
                                    </dt>
                                    <dt>
                                        <div class="c-tit"><span class="tx-color">전북 익산</span> 캠퍼스 오시는 길</div>
                                        <div class="c-info">
                                            <div class="address">
                                                <span class="a-tit">주소</span>
                                                <span>
                                                전북 익산시 신용동 원광대학교 학생지원관 4층
                                                </span>
                                            </div>
                                            <div class="tel">
                                                <span class="a-tit">연락처</span>
                                                <span class="tx-color">063-270-4144</span>
                                            </div>
                                        </div>
                                    </dt>
                                </dl>
                                <div class="btn btn2 NSK-Black">
                                    <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                                </div>
                            </div>
                        </div>

                        <div class="c_both pt30">
                            <div class="map_img">
                                <img src="{{ img_url('cop_acad/map/map_cop_jbis.jpg') }}" title="전북 익산">
                                <span>전북 익산</span>                       
                            </div>
                        </div>
                    </div>
                    <!-- 전북 //-->

                    <div id="campus9" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map_cop_jinj.jpg') }}" title="진주">
                            <span>진 주</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">진주</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">진주</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                경남 진주시 칠암동 490-8 엠코아빌딩 4층
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">055-755-7771</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 진주//-->
                </div>
                <!-- noticeBox_campus //-->
            </div>
        </div>
    </div>
    <!-- 캠퍼스//-->

    <div id="QuickMenu" class="MainQuickMenu">
        <ul>
            <li><a href="{{ front_url('/offinfo/boardInfo/index/78') }}">이달의 개강안내</a></li>
            <li><a href="{{ front_url('/support/notice/index') }}">공지사항</a></li>
            <li><a href="{{ front_url('/offinfo/boardInfo/index/80') }}">강의 시간표</a></li>
            <li><a href="{{ front_url('/offinfo/boardInfo/index/82') }}">강의실 배정표</a></li>
            <!--li><a href="#map_campus">학원 오시는 길</a></li-->
            <li><a href="{{ front_url('/consultManagement/index') }}">1:1 방문상담</a></li>
            <li><a href="{{ front_url('/offinfo/gallery/index') }}">학원 갤러리</a></li>
            <li><a href="{{ site_url('/lecture/index/cate/3001/pattern/free?course_idx=1077') }}" target="_blank">보강동영상</a></li>
        </ul>
    </div>
</div>
<!-- End Container -->
@stop