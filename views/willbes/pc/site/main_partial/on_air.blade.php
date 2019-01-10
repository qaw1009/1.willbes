<div class="widthAuto mt40">
    <div class="static clearfix">
        <div class="passLive">
            <div class="onAir">
                @if(empty($arr_base['onAirData']) === true)
                    <div class="offAir">
                        <div class="offAirBar">
                            <span class="state"><img src="{{ img_url('sample/onair_off.png') }}" alt="방송중이아닙니다."></span>
                            <ul>
                                <li>현재 진행중인 라이브 강의가 없습니다.</li>
                            </ul>
                            <span class="offAirBarBtn">
                                <a href="{{front_url('/offinfo/boardInfo/index')}}"><img src="{{ img_url('sample/onair_btn1.gif') }}" alt="강의시간표"></a>
                                <a href="{{front_url('/offLecture/index')}}"><img src="{{ img_url('sample/onair_btn2.gif') }}" alt="학원수강"></a>
                            </span>
                        </div>
                    </div>
                @else
                    <div class="onAirBar">
                        <span class="onAirBarBtn">
                            <a id="stoggleBtn"><p id="stoggleBtnNm">닫기 ▲</p></a>
                            <!-- <a id="stoggleBtn">닫기 ▲</a> -->
                        </span>
                        <span class="state"><img src="{{ img_url('sample/onair.png') }}" alt="방송중"></span>
                        <ul id="scroll" class="on_air_title" style="position: relative; overflow: hidden;">
                            @php $i=0; @endphp
                            @foreach($arr_base['onAirData'] as $key => $row)
                                @php
                                    $arr_onAirTitle = explode('|', $row['OnAirTitle']);
                                @endphp
                                @foreach($arr_onAirTitle as $t_key => $t_val)
                                    <li class="onair_rolling" id="onair_rolling_{{$i}}" data-onair-title-id="{{$row['OaIdx']}}">{{$t_val}}</li>
                                    @php $i++; @endphp
                                @endforeach
                            @endforeach
                        </ul>
                    </div><!--onAirBar//-->

                    <div class="onAirCt" style="display: block;">
                        <ul class="tabWrap onAirTabs">
                            @foreach($arr_base['onAirData'] as $key => $row)
                                <li>
                                    <a id="tab_onAirLecBox{{$row['OaIdx']}}" href="#onAirLecBox{{$row['OaIdx']}}" class="tab_onAirLecBox{!! $key == 0 ? ' on' : '' !!}" data-onair-box-id="{{$row['OaIdx']}}">
                                        {{$row['OnAirTabName']}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="onAirTabInto">
                            ※ 각 탭을 클릭 하시면 해당 정보를 확인 할 수 있습니다.
                        </div>
                        <div class="tabBox">
                            @foreach($arr_base['onAirData'] as $key => $row)
                                @php
                                    $arr_onAirTitle = explode('|', $row['OnAirTitle']);
                                @endphp
                                <div id="onAirLecBox{{$row['OaIdx']}}" class="onAirLecBox tabLink">
                                    @foreach($arr_onAirTitle as $key => $val)
                                        <span class="top_text_item d_none" id="top_text_item_{{$row['OaIdx']}}_{{$key}}">{{$val}}/</span>
                                    @endforeach
                                    <ul class="onAirLec">
                                        <li class="li01">
                                            <p class="ptxt1">@if($row['OnAirStartType'] == 'D'){{$row['OnAirStartTime']}} ~ {{$row['OnAirEndTime']}}@endif</p>
                                            <p class="ptxt2">{{$row['OnAirName']}}</p>
                                            <p class="ptxt3">{{$row['ProfTitle']}}</p>
                                        </li>
                                        @if($row['LeftExposureType'] == 'I')
                                        <li>
                                            <img src="{{$row['LeftFileFullPath'] . $row['LeftFileName']}}">
                                        </li>
                                        @else
                                            <li>
                                                <div id="jw-player-left"></div>
                                                <script src="/public/vendor/jwplayer/jwplayer.js"></script>
                                                <div id="jw-player-left">
                                                    <script type="text/javascript">jwplayer.key="kl6lOhGqjWCTpx6EmOgcEVnVykhoGWmf4CXllubWP5JwYq6K34m5XnpF0KGiCbQN";</script>
                                                    <script type="text/javascript">
                                                        jwplayer("jw-player-left").setup({
                                                            width: '100%',
                                                            //image: "",
                                                            aspectratio: "16:9",
                                                            autostart: false,
                                                            file: "{{$row['LeftLink']}}"
                                                        });
                                                    </script>
                                                </div>
                                            </li>
                                        @endif
                                        @if($row['RightExposureType'] == 'I')
                                        <li>
                                            <img src="{{$row['RightFileFullPath'] . $row['RightFileName']}}">
                                        </li>
                                        @else
                                            <li>
                                                <script src="/public/vendor/jwplayer/jwplayer.js"></script>
                                                <div id="jw-player-right">
                                                    <script type="text/javascript">jwplayer.key="kl6lOhGqjWCTpx6EmOgcEVnVykhoGWmf4CXllubWP5JwYq6K34m5XnpF0KGiCbQN";</script>
                                                    <script type="text/javascript">
                                                        jwplayer("jw-player-right").setup({
                                                            width: '100%',
                                                            //image: "",
                                                            aspectratio: "16:9",
                                                            autostart: false,
                                                            file: "{{$row['RightLink']}}"
                                                        });
                                                    </script>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                    <div class="onAirProf">
                                        <img src="{{$row['ProfImgFullPath']}}" alt="강사이미지" onerror="javascript:this.src='{{ img_url('sample/onair_prof.png') }}'">
                                    </div>
                                    <div class="onAirBtn">
                                        <ul>
                                            <li><a href="javascript:void(0);" class="sample btn-video" data-oa-idx="{{$row['OaIdx']}}" data-login-type="{{$row['LoginType']}}" data-play-count="{{$row['VideoPlayCount']}}">{{$row['VideoPlayTime']}}초맛보기</a></li>
                                            <li><a href="{{front_url('/offinfo/boardInfo/index')}}"><img src="{{ img_url('sample/onair_btn1.gif') }}" alt="강의시간표"></a></li>
                                            <li><a href="{{front_url('/offLecture/index')}}"><img src="{{ img_url('sample/onair_btn2.gif') }}" alt="학원수강"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div><!--onAirCt//-->
                @endif
            </div><!--onAir//-->
        </div><!--passLive//-->
    </div>
</div>
<span id="onAirPlay"></span>

<script type="text/javascript">
    var real_search_keyword;

    //<![CDATA[
    $(document).ready(function(){
        //tab 클리 시 타이틀 동적 변경
        $(document).on('click', '.tab_onAirLecBox', function () {
            if ($(this).hasClass('on') == true) {
                onair_line_title();
            }
        });

        $("#stoggleBtn").click(function(){
            $(".onAirCt").slideToggle("slow"); //옵션 "slow", "fast", "normal", "밀리초(1000=1초)"
            if($("#stoggleBtnNm").text().substring(0,2) == "닫기"){
                $("#stoggleBtnNm").text("열기 ▼");
            }else{
                $("#stoggleBtnNm").text("닫기 ▲");
            }
        });

        //라이브송출 스크립트
        $(".btn-video").click(function () {
            var is_login = '{{sess_data('is_login')}}', oa_idx = $(this).data('oa-idx'), login_type = $(this).data('login-type'), play_count = $(this).data('play-count');
            var popWidth = 980, popHeight = 555;    //팝업창 사이즈
            var mtWidth = window.outerWidth;        //윈도우width
            var mtHeight = window.outerHeight;      //윈도우height
            var scX = window.screenLeft;            //현재 브라우저의 x 좌표
            var scY = window.screenTop;            //현재 브라우저의 y 좌표
            var popX = scX + (mtWidth - popWidth) / 2 - 50;
            var popY = scY + (mtHeight - popHeight) / 2 - 50;

            var _url = '{{ front_url("/onAir/onAirPlay") }}?oa_idx='+oa_idx;
            window.open(_url,'on_air', 'status=no, width='+ popWidth +', height='+ popHeight +', toolbar=no, menubar=no, scrollbars=no, resizable=no, left='+ popX + ', top='+ popY);
        });
    })
    //]]>

    //온에어 타이틀 적용
        function onair_line_title() {
        var temp_on_box_id = 0;
        $('.tab_onAirLecBox').each(function(){
            if ($(this).hasClass('on') == true) {
                temp_on_box_id = $(this).data('onair-box-id');
            }
        });
    };

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
            var top_text = $("#"+id).find(".top_text_item").text();
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

    onair_line_title();
</script>