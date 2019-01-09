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
                        <span class="state"><img src="{{ img_url('sample/onair.png') }}" alt="방송중"></span>
                        <ul id="scroll" style="position: relative; overflow: hidden;">
                            <li>111현재 전국캠퍼스에 신광은 경찰팀의 라이브 강의가 실시간 송출 되고 있습니다.</li>
                            <li>222현재 전국캠퍼스에 신광은 경찰팀의 라이브 강의가 실시간 송출 되고 있습니다.</li>
                        </ul>
                    </div><!--onAirBar//-->
                    
                    <div class="onAirCt" style="display: block;">
                        <ul class="tabWrap onAirTabs">
                            <li><a href="#onAirLecBox1" id="tab_onAirLecBox1" class="on">한국사</a></li>
                            <li><a href="#onAirLecBox2" id="tab_onAirLecBox2">한국사</a></li>
                        </ul>
                        <div class="onAirTabInto">
                            ※ 각 탭을 클릭 하시면 해당 정보를 확인 할 수 있습니다.
                        </div>
                        <div class="tabBox">
                            <div id="onAirLecBox1" class="onAirLecBox tabLink">
                                <input type="hidden" class="top_text_item" value="aa현재 전국캠퍼스에 신광은 경찰팀의 라이브 강의가 실시간 송출 되고 있습니다./">
                                <ul class="onAirLec">
                                    <li class="li01">
                                        <p class="ptxt1">08:40 ~ 13:00</p>
                                        <p class="ptxt2">오태진 한국사 기본이론 수업중</p>
                                        <p class="ptxt3">믿어주셔서 감사합니다. 합격으로 보답하겠습니다.</p>
                                    </li>
                                    <li>  
                                        <img src="{{ img_url('sample/20161219171917659.jpg') }}">
                                    </li>
                                    <li> 
                                        <img src="{{ img_url('sample/20161219171917675.jpg') }}">
                                    </li>
                                </ul>
                                <div class="onAirProf">
                                    <img src="{{ img_url('sample/onair_prof_wc_007.png') }}" alt="강사이미지" onerror="javascript:this.src='{{ img_url('sample/onair_prof.png') }}'">
                                </div>
                                <div class="onAirBtn">
                                    <ul>
                                        <li><a class="sample" href="#none">60초맛보기</a></li>
                                        <li><a href="#none"><img src="{{ img_url('sample/onair_btn1.gif') }}" alt="강의시간표"></a></li>
                                        <li><a href="#none"><img src="{{ img_url('sample/onair_btn2.gif') }}" alt="학원수강"></a></li>
                                    </ul>
                                </div>
                            </div><!--onAirLecBox//-->
                            <div id="onAirLecBox2" class="onAirLecBox tabLink">
                                <input type="hidden" class="top_text_item" value="bb현재 전국캠퍼스에 신광은 경찰팀의 라이브 강의가 실시간 송출 되고 있습니다./">
                                <ul class="onAirLec">
                                    <li class="li01">
                                        <p class="ptxt1">08:40 ~ 13:00</p>
                                        <p class="ptxt2">원유철 한국사 기본이론 수업중</p>
                                        <p class="ptxt3">믿어주셔서 감사합니다. 합격으로 보답하겠습니다.</p>
                                    </li>
                                    <li>
                                        <img src="{{ img_url('sample/20161219171917659.jpg') }}">
                                    </li>
                                    <li>
                                        <img src="{{ img_url('sample/20161219171917675.jpg') }}">
                                    </li>
                                </ul>
                                <div class="onAirProf">
                                    <img src="{{ img_url('sample/onair_prof_wc_005.png') }}" alt="강사이미지" onerror="javascript:this.src='{{ img_url('sample/onair_prof.png') }}'">
                                </div>
                                <div class="onAirBtn">
                                    <ul>
                                        <li><a class="sample" href="#none">60초맛보기</a></li>
                                        <li><a href="#none"><img src="{{ img_url('sample/onair_btn1.gif') }}" alt="강의시간표"></a></li>
                                        <li><a href="#none"><img src="{{ img_url('sample/onair_btn2.gif') }}" alt="학원수강"></a></li>
                                    </ul>
                                </div>
                            </div><!--onAirLecBox//-->
                        </div>
                        
                    </div><!--onAirCt//-->
                </div><!--onAir//-->

                <div class="offAir">
                    <div class="offAirBar">
                        <span class="state"><img src="{{ img_url('sample/onair_off.png') }}" alt="방송중이아닙니다."></span>
                        <ul>
                            <li>현재 진행중인 라이브 강의가 없습니다.</li>
                        </ul>
                        <span class="offAirBarBtn">
                            <a href="#none"><img src="{{ img_url('sample/onair_btn1.gif') }}" alt="강의시간표"></a>
                            <a href="#none"><img src="{{ img_url('sample/onair_btn2.gif') }}" alt="학원수강"></a>
                        </span>
                    </div><!--offAirBar//-->
                </div><!--offAir//-->
                
            </div><!--passLive//-->

            <script type="text/javascript">
                var real_search_keyword;
                scroll_top_text();
                function scroll_top_text(){
                    if(parseInt('1')>0){
                        real_search_keyword = new textScroll('scroll'); // 스크롤링 하고자하는 ul 엘리먼트의 id값을 인자로 넣습니다
                        real_search_keyword.name = "real_search_keyword"; // 인스턴스 네임을 등록합니다
                        real_search_keyword.start(); // 스크롤링 시작
                    }
                }
                $(document).ready(function(){
                    $(".onAirTabs > li").find("a").click(function(){
                        $(".onAirTabs > li").find("a").removeClass("active");
                        $(this).addClass("active");
                        var id = $(this).attr("id").replace("tab_","");
                        $(".onAirLecBox").hide();
                        $("#"+id).show();
                        var top_text = $("#"+id).find(".top_text_item").val();
                        var html = "";
                        var top_arr = top_text.split("/");
                        var i=0;
                        for(i=0;i<top_arr.length;i++){
                            if($.trim(top_arr[i])!=null&&$.trim(top_arr[i])!=""){
                                html += "<li>"+top_arr[i]+"</li>"
                            }
                        }
                        $("#scroll").html(html);
                        scroll_top_text();
                        
                    });
                });
            </script>
     
        </div>
        <!--라이브방송//-->

    </div>
</div>
<!-- End Container -->
@stop