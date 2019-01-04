@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="mt40">

        <div class="static clearfix">
                    
            <script type="text/javascript">
                //<![CDATA[
                    $(function(){
                        $("#stoggleBtn").click(function(){
                            $(".onAirCt").slideToggle("slow"); //옵션 "slow", "fast", "normal", "밀리초(1000=1초)"
                            if($("#stoggleBtnNm").text().substring(0,2) == "닫기"){
                                $("#stoggleBtnNm").text("열기 ▲");
                            }else{
                                $("#stoggleBtnNm").text("닫기 ▼");
                            }

                        })
                    })
                //]]>
                    
                function textScroll(scroll_el_id) {
                    this.objElement = document.getElementById(scroll_el_id);
                    this.objElement.style.position = 'relative';
                    this.objElement.style.overflow = 'hidden';
                
                    this.objLi = this.objElement.getElementsByTagName('li');
                    this.height = this.objElement.offsetHeight; // li 엘리먼트가 움직이는 높이(외부에서 변경가능)
                    this.num = this.objLi.length; // li 엘리먼트의 총 갯수
                    this.totalHeight = this.height*this.num; // 총 높이
                    this.scrollspeed = 2; // 스크롤되는 px
                    this.objTop = new Array(); // 각 li의 top 위치를 저장
                    this.timer = null;

                    if(this.num == 1){
                        return;
                    }
                    
                    for(var i=0; i<this.num; i++){
                        this.objLi[i].style.position = 'absolute';
                        this.objTop[i] = this.height*i;
                        this.objLi[i].style.top = this.objTop[i]+"px";
                    }
                }

                textScroll.prototype.move = function(){
                    for(var i=0; i<this.num; i++) {
                        this.objTop[i] = this.objTop[i] - this.scrollspeed;
                        this.objLi[i].style.top = this.objTop[i]+"px";
                    }
                    if(this.objTop[0]%this.height == 0){
                        this.jump();
                    }else{
                        clearTimeout(this.timer);
                        this.timer = setTimeout(this.name+".move()",50);
                    }
                }

                textScroll.prototype.jump = function(){
                    for(var i=0; i<this.num; i++){
                        if(this.objTop[i] == this.height*(-2)){
                            this.objTop[i] = this.objTop[i] + this.totalHeight;
                            this.objLi[i].style.top = this.objTop[i]+"px";
                        }
                    }
                    clearTimeout(this.timer);
                    this.timer = setTimeout(this.name+".move()",3000);
                }

                textScroll.prototype.start = function() {
                    this.timer = setTimeout(this.name+".move()",3000);
                }
                
                function fn_60Live(url){
                    
                    if("" == '' ){
                        alert("로그인을 해야 이용 가능합니다.");
                        return;
                    }else{
                        window.open("http://www.willbescop.net/event/"+url,"_blank","width=600, height=338");
                    }
                    
                }
                
            </script>

            <div class="passLive">

                <div class="onAir">
                    <div class="onAirBar">
                        <span class="onAirBarBtn">
                            <a id="stoggleBtn"><p id="stoggleBtnNm">닫기 ▼</p></a>
                            <!-- <a id="stoggleBtn">닫기 ▲</a> -->
                        </span>
                        <span class="state"><img src="http://www.willbescop.net/assets/img/academy/main/onair.png" alt="방송중"></span>
                        <ul id="scroll" style="position: relative; overflow: hidden;"><li>현재 전국캠퍼스에 신광은 경찰팀의 라이브 강의가 실시간 송출 되고 있습니다.</li></ul>
                    </div><!--onAirBar//-->
                    
                    <div class="onAirCt" style="display: block;">
                        <ul class="tabWrap onAirTabs">
                            <li><a href="#tab_onAirLecBox1" class="on">한국사</a></li>
                            <li><a href="#tab_onAirLecBox2">한국사</a></li>
                        </ul>
                        <div class="onAirTabInto">
                            ※ 각 탭을 클릭 하시면 해당 정보를 확인 할 수 있습니다.
                        </div>
                        <div class="tabBox">
                            <div id="tab_onAirLecBox1" class="onAirLecBox tabLink">
                                <input type="hidden" class="top_text_item" value="현재 전국캠퍼스에 신광은 경찰팀의 라이브 강의가 실시간 송출 되고 있습니다./">
                                <ul class="onAirLec">
                                    <li class="li01">
                                        <p class="ptxt1">08:40 ~ 13:00</p>
                                        <p class="ptxt2">오태진 한국사 기본이론 수업중</p>
                                        <p class="ptxt3">믿어주셔서 감사합니다. 합격으로 보답하겠습니다.</p>
                                    </li>
                                    <li>  
                                        <img src="http://file3.willbes.net/board/20161219171917659.jpg">
                                    </li>
                                    <li> 
                                        <img src="http://file3.willbes.net/board/20161219171917675.jpg">
                                    </li>
                                </ul>
                                <div class="onAirProf">
                                    <img src="http://file3.willbes.net/new_cop/onair_prof_wc_007.png" alt="강사이미지" onerror="javascript:this.src='http://file3.willbes.net/new_cop/onair_prof.png'">
                                </div>
                                <div class="onAirBtn">
                                    <ul>
                                        <li><a href="#none"><img src="http://www.willbescop.net/assets/img/academy/main/onair_btn3.gif" alt="60초맛보기"></a></li>
                                        <li><a href="#none"><img src="http://www.willbescop.net/assets/img/academy/main/onair_btn1.gif" alt="강의시간표"></a></li>
                                        <li><a href="#none"><img src="http://www.willbescop.net/assets/img/academy/main/onair_btn2.gif" alt="학원수강"></a></li>
                                    </ul>
                                </div>
                            </div><!--onAirLecBox//-->
                            <div id="tab_onAirLecBox2" class="onAirLecBox tabLink">
                                <input type="hidden" class="top_text_item" value="현재 전국캠퍼스에 신광은 경찰팀의 라이브 강의가 실시간 송출 되고 있습니다./">
                                <ul class="onAirLec">
                                    <li class="li01">
                                        <p class="ptxt1">08:40 ~ 13:00</p>
                                        <p class="ptxt2">원유철 한국사 기본이론 수업중</p>
                                        <p class="ptxt3">믿어주셔서 감사합니다. 합격으로 보답하겠습니다.</p>
                                    </li>
                                    <li>
                                        <img src="http://file3.willbes.net/board/20161219171917659.jpg">
                                    </li>
                                    <li>
                                        <img src="http://file3.willbes.net/board/20161219171917675.jpg">
                                    </li>
                                </ul>
                                <div class="onAirProf">
                                    <img src="http://file3.willbes.net/new_cop/onair_prof_wc_005.png" alt="강사이미지" onerror="javascript:this.src='http://file3.willbes.net/new_cop/onair_prof.png'">
                                </div>
                                <div class="onAirBtn">
                                    <ul>
                                        <li><a href="#none"><img src="http://www.willbescop.net/assets/img/academy/main/onair_btn3.gif" alt="60초맛보기"></a></li>
                                        <li><a href="#none"><img src="http://www.willbescop.net/assets/img/academy/main/onair_btn1.gif" alt="강의시간표"></a></li>
                                        <li><a href="#none"><img src="http://www.willbescop.net/assets/img/academy/main/onair_btn2.gif" alt="학원수강"></a></li>
                                    </ul>
                                </div>
                            </div><!--onAirLecBox//-->
                        </div>
                        
                    </div><!--onAirCt//-->
                </div><!--onAir//-->
                
            </div><!--passLive//-->
     
        </div>
        <!--라이브방송//-->

    </div>
</div>
<!-- End Container -->

<style>

    /* Reset */
    body,div,p,h1,h2,h3,h4,h5,h6,ul,ol,li,dl,dt,dd,table,th,td,form,fieldset,legend,input,textarea,a,button,select{margin:0;padding:0;font-weight:normal}
    body,input,textarea,select,button,table{font-family:'돋움',dotum,AppleGothic,sans-serif;color:#555}
    body{word-break:break-all;font-size:12px}
    img,fieldset,iframe{border:0}
    img{vertical-align:top}
    li{list-style:none}
    em,address{font-style:normal}
    input,select,button,label{vertical-align:middle}
    header, footer, section, aside, nav, article{display:block}
    label{display:inline-block}
    textarea{width:98%;padding:5px;border:1px solid #cfcfcf;line-height:1.5em}
    table{border-spacing:0;border-collapse:collapse}
    button{border:0;background:transparent;cursor:pointer}
    button::-moz-focus-inner{padding:0;border:0}


    /*161214 실시간방송*/
    .passLive {margin-bottom:20px}
        .onAir {background:#eaeaea}
            .onAirBar {position:relative; background:url(http://www.willbescop.net/assets/img/academy/main/onair_bar_bg.gif) no-repeat; height:40px}
            .onAirBar span.state {float:left; display:block; line-height:40px; margin-left:20px}
            .onAirBar span.state img {vertical-align:middle}
            .onAirBar span.onAirBarBtn {position:absolute; width:100px; top:0; right:10px; display:block; line-height:40px; margin-right:10px; width:50px; text-align:right; z-index:999}
            .onAirBar span.onAirBarBtn a {display:block; color:#fff; cursor:pointer}
            .onAirBar ul {position:absolute; top:0; width:660px; left:180px; z-index:2; overflow:hidden; height:40px}
            .onAirBar li {line-height:40px; font-weight:bold; color:#fff}
            .onAirCt {position:relative; background:#ececec; padding:0 0 14px}
                .onAirTabs.tabWrap {background:#FFF; border:none;height:40px}
                .onAirTabs.tabWrap li {display:inline; float:left;height: 40px}
                .onAirTabs.tabWrap a {display:block; padding:0 15px; height:40px; line-height:40px; font-weight:bold; color:#c4c3c3; border:none !important;}
                .onAirTabs.tabWrap a:hover,
                .onAirTabs.tabWrap a.on {background:#ececec; color:#f42412;z-index:auto; border:none;height:40px;line-height:40px}
                .onAirTabs.tabWrap:after {content:""; display:block; clear:both}
                
                .onAirTabInto {position:absolute; top:15px; right:0; text-align:right}
                
                .onAirLec {margin:14px 0 0 132px}
                .onAirLec li {display:inline; float:left; width:320px}
                .onAirLec li img {width:320px; height:180px}
                .onAirLec li.li01 {width:160px; padding:15px 20px; line-height:1.5; background:#fff; min-height:150px}
                .onAirLec li p.ptxt1 {color:#4d4d4d}
                .onAirLec li p.ptxt2 {color:#f42412; font-weight:bold; margin-bottom:15px}
                .onAirLec li p.ptxt3 {color:#acacac}
                .onAirLec:after {content:""; display:block; clear:both}
                .onAirProf {position:absolute; top:25px; left:0; width:175px; height:208px; overflow:hidden; z-index:1}
                .onAirBtn {position:absolute; top:190px; left:70px; width:230px; overflow:hidden; z-index:2}
                .onAirBtn li {display:inline; float:left; margin-right:1px}
        .onAirBar:after {content:""; display:block; clear:both}
        
        .offAir {}
            .offAirBar {position:relative; background:#aeaeae; height:40px}
            .offAirBar span.state {float:left; display:block; line-height:40px; margin-left:20px}		
            .offAirBar span.offAirBarBtn {float:right; isplay:block; color:#fff; line-height:40px; margin-right:10px}
            .offAirBar span img	{vertical-align:middle}
            .offAirBar ul {position:absolute; width:660px; left:180px; z-index:2; overflow:hidden; height:40px}
            .offAirBar li {line-height:40px; font-weight:bold; color:#fff}
</style>
@stop