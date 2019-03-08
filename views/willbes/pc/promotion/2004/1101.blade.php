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
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/


        /*2018-07-31 상단변경*/
        .layer {width:100%; height:800px; -ms-overflow:hidden;}
        .video {width:100%; height:800px; overflow:hidden; position:relative; opacity:0.4; box-shadow:0px rgba(0,0,0,0.4); background:#000}
        .pngimg	 {width:1210px; margin:0 auto; position:relative; top:-800px;}
        .pngimg-real {width:1210px; height:0px; position:absolute;top:0;}
        .wb_mp4 {width:100%; text-align:center; margin:0 auto; background:#000 /*url(http://file3.willbes.net/new_cop/2018/05/180523_EV00_bg.jpg) no-repeat center*/;  min-width:1210px;}
        .wb_mp4 ul {width:100%; margin:0 auto; min-width:1210px;}

        /* 상단탭 */
        .wb_top {background:#ddd;}
        .tab_box {position:relative; width:1210px; height:110px; display:block; margin:0 auto; }
        .tab_menu {position:absolute; width:1210px; height:110px; top:0px; text-align:center;}
        .tab_menu li {display:inline; float:left;}
        .tab_menu li a img.off {display:block}
        .tab_menu li a img.on {display:none}

        .wb_cts02 {background:#000 url(http://file3.willbes.net/new_gosi/2018/08/EV180806_1_bg.png) no-repeat center;}
        .wb_cts03 {background:#eee;padding:70px 0;}
        .wb_cts04 {background:#fff;}
        .wb_cts05 {background:#eee; padding:70px 0;}
        .wb_cts12 {background:#e1eaf1;}
        .wb_cts06 {background:#fff;}
        .wb_cts07 {background:#eee; padding:70px 0;}
        .wb_cts08 {background:#fff;}
        .wb_cts09 {background:#fff;}
        .wb_cts10 {background:#fff;}
        .wb_cts11 {background:#fff; padding-bottom:70px;}

        /* 슬라이드배너 */
        .bannerImg1 {position:relative; background:#eee; width:810px; margin:0 auto; z-index:10; }
        .bannerImg1 p {position:absolute; top:200px; width:50px; z-index:1000}
        .bannerImg1 img {width:100%;}
        .bannerImg1 p a {cursor:pointer}
        .bannerImg1 p.left_arr {left:-10%;  width:30px; height:30px;}
        .bannerImg1 p.right_arr {right:-10%;width:30px; height:30px;}

        /* 신청 팝업 */
        .Pstyle {opacity:0; display:none; position:relative; width:auto; padding:0px; background:#f2f2f2;}
        .b-close {position:absolute;right:5px;top:5px;padding:5px;display:inline-block;cursor: pointer; color:#000;}
        .popcontent {height:auto; width:auto; float:left;}
        .popcontent h2{margin-top:15px; font-size:21px; font-weight:bold; color:#fff; padding-top:0px; background-color:#0b0c18; line-height:46px; letter-spacing:-1px; text-align:center; font-family: 'Noto Sans KR'; }
        .popcontent h3{font-size:14px; font-weight:bold; color:#b3462e; padding:2px; background-color:#f2f2f2; line-height:25px; text-align:center; letter-spacing:-0.8px; padding-top:20px; font-family: 'Noto Sans KR'; border-bottom:1px #ccc solid;  }
        .tit {font-size:13px; font-weight:bold;  color:#000;}
        .inBx_con {padding-top:10px; border-top:0}
        .inBx_con ul {padding-top:10px;}
        .inBx_con ul li	{padding:4px 40px; border-top:0}
        .align_l {float:left; text-align:center !important;}
        .btn_lec {margin:20px; text-align:center !important;}
        .cursor1 {cursor:hand;}

        #nav {
            display:block;
            position:fixed;
            bottom:0;
            width:100%;
            min-width:1210px;
            text-align:center;
            background: url(http://file3.willbes.net/new_gosi/2018/10/EV181030_scroll_bn_bg.png) repeat-x;
            z-index:20;}
        #nav ul { width:100%; margin:0 auto;}

        .skybanner {
            position:absolute;
            top:20px;
            right:10px;
            z-index:1;
        }
        .skybanner_sectionFixed {position:fixed; top:20px}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180807_sky.png" alt="#" usemap="#Map_sky_go" border="0" />
            <map name="Map_sky_go">
                <area shape="rect" coords="10,18,90,65" href="http://willbesgosi.net/event/movie/event.html?event_cd=off_180426_01&topMenuType=F#lec_send" alt="자습형">
                <area shape="rect" coords="9,93,91,144" href="http://willbesgosi.net/event/movie/event.html?event_cd=off_180426_02&topMenuType=F#lec_send" alt="기숙형">
                <area shape="rect" coords="7,165,92,222" href="http://willbesgosi.net/event/movie/event.html?event_cd=off_180426_03&topMenuType=F#lec_send"alt="영어집중형">
            </map>
        </div>

        <div class="evtCtnsBox wb_mp4" id="main">
            <div class="layer">
                <div class="video">
                    <video style="width:100%;" autoplay loop muted="">
                        <source src="http://file3.willbes.net/new_gosi/2018/07/180629.mp4" type="video/mp4"></source>
                    </video>
                </div>
                <div class="pngimg">
                    <div class="pngimg-real">
                        <img src="http://file3.willbes.net/new_gosi/2018/07/EV180731_t.png" alt="윌비스 관리반" />
                    </div>
                </div>
            </div>
        </div>

        <div id="nav">
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181030_scroll_bn.png" alt="예약하기" usemap="#Map_1030_lec_go" border="0"  />
            <map name="Map_1030_lec_go">
                <area shape="rect" coords="813,16,1127,78" href="http://www.willbesgosi.net/notice/view.html?topMenuType=F&topMenuGnb=FM_008&topMenu=001&menuID=FM_008_004&BOARD_MNG_SEQ=&NOTICETYPE=event&INCTYPE=view&currentPage=1&BOARD_SEQ=&PARENT_BOARD_SEQ=&searchEventNo=1003&SEARCHKIND=&SEARCHTEXT=" target="_blank" alt="예약하기">
            </map>
        </div>

        <div class="evtCtnsBox wb_top">
            <div class="tab_box">
                <div class="tab_menu">
                    <ul>
                        <li><a href="<c:url value='/event/movie/event.html?event_cd=off_180426_01&topMenuType=F'/>"><img src="http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab1.png"  onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab1_on.png'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab1.png'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab1.png'" border="0"/></a></li>
                        <li><a href="<c:url value='/event/movie/event.html?event_cd=off_180426_02&topMenuType=F'/>"><img src="http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab2_on.png"  onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab2_on.png'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab2.png'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab2.png'" border="0"/></a></li>
                        <li><a href="<c:url value='/event/movie/event.html?event_cd=off_180426_03&topMenuType=F'/>"><img src="http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab3.png"  onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab3_on.png'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab3.png'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab3.png'" border="0"/></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180807_1.png" alt="#" />
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03">
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180807_2.png" alt="#" />
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04">
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180807_3.png"alt="#" />
        </div>
        <!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts05">
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180807_4.png"alt="#" />
        </div>
        <!--wb_cts05//-->

        <div class="evtCtnsBox wb_cts07">
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180807_4txt.png" alt="" />
            <div class="bannerImg1">
                <ul id="slidesImg1">
                    <li><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_03_4_tab1.png" alt="1"/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_03_4_tab9.png" alt="1"/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_03_4_tab2.png" alt="2"/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_03_4_tab3.png" alt="3"/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_03_4_tab4.png" alt="4"/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_03_4_tab5.png" alt="5"/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_03_4_tab6.png" alt="6"/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_03_4_tab7.png" alt="7"/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_03_4_tab8.png" alt="8"/></li>
                </ul>
                <p class="left_arr"><a id="imgBannerLeft"><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_arr_l.png"></a></p>
                <p class="right_arr"><a id="imgBannerRight"><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_arr_r.png"></a></p>
            </div>
        </div>
        <!--wb_cts07//-->

        <div class="evtCtnsBox wb_cts08">
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180807_7.png"alt="#" />
        </div>
        <!--wb_cts08//-->

        <div class="evtCtnsBox wb_cts11">
            <p id="lec_send"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181005_9.png" alt="신청방식" /></p>
            <p><a onclick="go_popup()"><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_btn.png" alt="입실상담신청하기"></a></p>
            <p><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_03_6_tel.png" alt="문의및 접수" /></p>
        </div>
        <!--wb_cts11//-->

        <!--팝업-->
        <div id="popup" class="Pstyle" alt="닫기">
            <span class="b-close"></span>
            <div class="popcontent">
                <form name="eventForm" id="eventForm">
                    <input type="hidden" name="searchEventNo"  id ="searchEventNo" value="892"/>
                    <input type="hidden" name="GUBUN"  id ="GUBUN" value="2"/>
                    <input type="hidden" name="SELECTED_OPTION_NO"  id ="SELECTED_OPTION_NO" value="1"/>
                    <input type="hidden" name="EVENT_TXT"  id ="EVENT_TXT" value=""/>
                    <h2>윌비스 관리반 상담신청</h2>
                    <div class="inBx_con">
                        <h3>상담구분</h3>
                        <ul>
                            <li><span class="tit"> - 강한학습관리반</span>
                                <label class="label_radio" for="radio-01">
                                    <input name=CATEGORY_INFO id="CATEGORY_INFO" value="강습반" type="radio" style="width:16px; height:16px;" />
                                </label>
                            </li>
                            <li><span class="tit"> - 통합생활관리반</span>
                                <label class="label_radio" for="radio-01">
                                    <input name="CATEGORY_INFO" id="CATEGORY_INFO" value="통합생활관리반" type="radio" style="width:16px; height:16px;"/>
                                </label>
                            </li>
                            <li><span class="tit"> - 김신주 영어 합격 관리반</span>
                                <label class="label_radio" for="radio-01">
                                    <input name="CATEGORY_INFO" id="CATEGORY_INFO" value="영어합격관리반" type="radio" checked style="width:16px; height:16px;"/>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="inBx_con">
                        <h3>상담자 정보 입력</h3>
                        <ul>
                            <li><span class="tit"><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_pop_layer1.png" alt="성명"/></span>
                                <input type="text" id="USER_NAME" name="USER_NAME" style="width:200px; height:30px;" value="${userInfo.USER_NM}">
                            </li>
                            <li><span class="tit"><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_pop_layer2.png" alt="전화번호"/></span>
                                <input type="text" id="PHONE_NO" name="PHONE_NO" style="width:200px; height:30px;" value="">
                            </li>
                            <li><span class="tit"><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_pop_layer3.png" alt="상담예약"/></span>
                                <input type="text" id="REQ_DATE" name="REQ_DATE" readonly style="width:100px; height:30px;">
                                <select id="REQ_HOUR" name="REQ_HOUR">
                                    <option value="">시간선택</option>
                                    <c:forEach varStatus="status" begin="9" end="18">
                                        <option value="${status.index}">${status.index}시</option>
                                    </c:forEach>
                                </select>
                        </ul>
                    </div>
                    <p class="btn_lec"><a href="javascript:fn_submit();"><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_btn_go.png" alt="신청하기"/></a></p>
                </form>
            </div>
        </div>
        <!--//팝업-->

    </div>
    <!-- End Container -->

    <script type="text/javascript" src="http://www.willbesgosi.net/resources/libs/jquery-timepicker/jquery.ui.timepicker.js"></script>
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $.datepicker.regional['ko'] = {
                closeText: '닫기',
                prevText: '이전',
                nextText: '다음',
                currentText: '오늘',
                monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
                monthNamesShort: ['1','2','3','4','5','6','7','8','9','10','11','12'],
                dayNames: ['일','월','화','수','목','금','토'],
                dayNamesShort: ['일','월','화','수','목','금','토'],
                dayNamesMin: ['일','월','화','수','목','금','토'],
                dateFormat: 'yymmdd',
                firstDay: 0,
                showMonthAfterYear: true,
                changeYear: true,
                yearSuffix: '년 ',
                autoSize: false};
            $.datepicker.setDefaults($.datepicker.regional['ko']);

            setDateFickerImageUrl("http://file3.willbes.net/new_gosi/2018/04/icon_calendar.png");
// 			$('img.ui-datepicker-trigger').attr('style','cursor:pointer;');
            initDatePicker("REQ_DATE");

        <c:if test="${not empty userInfo}">
                $.ajax({
                    type: "POST",
                    url : '/event/event_result_info',
                    data: $("#eventForm").serialize(),
                    cache: false,
                    dataType: "json",
                    success: function(res) {
                        if(res.returnMsg=="Y"){
                            if(res.eventResultInfo != null){
                                $("#USER_NAME").val(res.eventResultInfo.USER_NAME);
                                $("#PHONE_NO").val(res.eventResultInfo.PHONE_NO);
                                $('input:radio[name=CATEGORY_INFO]').attr('checked', false);
                                $('input:radio[name="CATEGORY_INFO"][value="'+res.eventResultInfo.CATEGORY_INFO+'"]').attr('checked', 'checked');
                                var eventStr = res.eventResultInfo.EVENT_TXT.replace(/시/gi, "").replace(/ /g, '');;
                                if(eventStr.indexOf('/') > -1){
                                    eventArr = eventStr.split('/');
                                    $("#REQ_DATE").val(eventArr[0]);
                                    $("#REQ_HOUR").val(eventArr[1]).attr("selected", "selected");
                                }
                            }
                        }
                    },error: function(){
                    }
                });
        </c:if>

        });

        var dateFickerImageUrl = '';

        function setDateFickerImageUrl(url) {
            dateFickerImageUrl = url;
        }
        /**
         * 기간설정 dateFicker one
         * @@param id
         */
        function initDatePicker(id) {
            var receiptDates = $("#"+id).datepicker({
                showMonthAfterYear: true,
                changeMonth: true,
                numberOfMonths: 1,
                showOn: "button",
                dateFormat: "yymmdd",
                buttonImageOnly: true,
                buttonImage: dateFickerImageUrl
            });
        }


        function go_popup() {
            if("<c:out value='${userInfo.USER_ID}' />" == ""){
                alert("로그인해 주세요.");
                location.href="#";
                return;
            }
            $('#popup').bPopup();
        }

        function fn_submit(){
            if("<c:out value='${userInfo.USER_ID}' />" == ""){
                alert("로그인해 주세요.");
                return;
            }

            if($("#PHONE_NO").val() == ""){
                alert("전화번호를 입력해주세요.");
                $("#PHONE_NO").focus();
                return;
            }
            if($("#REQ_DATE").val()=="" || $("#REQ_HOUR option:selected").val() == ""){
                alert("일정을  선택해주세요.");
                return;
            }
            var event_txt  = $("#REQ_DATE").val() + " / " + $("#REQ_HOUR option:selected").val() +"시";
            $("#EVENT_TXT").val(event_txt);

            if(!confirm("신청하시겠습니까?")) return;
            $.ajax({
                type: "POST",
                url : '/event/eventInsertResult',
                data: $("#eventForm").serialize(),
                cache: false,
                dataType: "json",
                success: function(res) {
                    if(res.returnMsg=="Y"){
                        alert("신청이 완료 되었습니다.");
                        location.href = "/event/movie/event.html?event_cd=off_180426_01&topMenuType=F";
                    }else if(res.returnMsg=="U"){
                        alert("신청정보 변경완료하였습니다.");
                        location.href = "/event/movie/event.html?event_cd=off_180426_01&topMenuType=F";
                    }else if(res.returnMsg=="N"){
                        alert("이미 신청한 내역이 있습니다.");
                        location.href = "/event/movie/event.html?event_cd=off_180426_01&topMenuType=F";
                    }
                },error: function(){
                    alert("신청 실패");
                    location.href = "/event/movie/event.html?event_cd=off_180426_01&topMenuType=F";
                }
            });
        }
    </script>



    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg1 = $("#slidesImg1").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:810,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
            });

            $("#imgBannerLeft").click(function (){
                slidesImg1.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg1.goToNextSlide();
            });
        });
    </script>

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });

        $( document ).ready( function() {
            var jbOffset = $( '.skybanner' ).offset();
            $( window ).scroll( function() {
                if ( $( document ).scrollTop() > jbOffset.top ) {
                    $( '.skybanner' ).addClass( 'skybanner_sectionFixed' );
                }
                else {
                    $( '.skybanner' ).removeClass( 'skybanner_sectionFixed' );
                }
            });
        } );

    </script>
@stop