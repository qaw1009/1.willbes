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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .wbCommon {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/  

        .m_img1 {position:fixed; bottom:20px;right:10px;z-index:100;}
        .wb_top {background:#293342 url(http://file3.willbes.net/new_cop/2019/03/EV190312P_01_bg.jpg) no-repeat center top; margin-top:20px;}
        .wb_top .wb_top_01 {width:1120px; margin:0 auto; position:relative}
        .wb_top .wb_top_01 ul {position:absolute; top:56px; left:758px; z-index:10}
        .wb_top .wb_top_01 ul li {display:block; float:left; width:98px; margin-right:4px; text-align:center}
        .wb_01 {background:#005ecc}		
        .wb_02 {background:#ececec url(http://file3.willbes.net/new_cop/2019/03/EV190312P_03_bg.jpg) no-repeat center top; padding-bottom:100px; position:relative}	
        .wb_03 {background:#cbc7c0; padding-bottom:100px; position:relative}
        .wb_04 {background:#fff;}
        .wb_05 {background:#ececec; margin-top:100px}
        
        .wb_02_01,
        .wb_03_01 {position:relative}
        .wb_02_01 a,
        .wb_03_01 a {position:absolute; display:block; width:220px; left:50%; margin-left:-110px; top:470px;}
        .wb_02_01 iframe {
            width:854px;
            height:480px;
        }
        
        .movieFrame {width:1120px; height:710px; margin:0 auto; background:url(http://file3.willbes.net/new_cop/2019/03/EV190308P_08.jpg) no-repeat center top;}
        .embedWrap {width:980px; margin:0 auto; padding-top:13px;}
        .embed-container {position:absolute; padding-bottom:46.25%; height:0; overflow:hidden; width:980px; height:auto; margin:0 auto}
        
        .mobileCh {width:980px; margin:0 auto 50px;}
        .mobileCh li {width:50%; display:inline; float:left}
        .mobileCh li a {display:block; text-align:center; font-size:150%; font-weight:bold; color:#FFF; background:#1e162b; padding:22px 0}
        .mobileCh li a.ch2 {color:#6CF}
        .mobileCh li a:hover {color:#FC0}
        .mobileCh:after {content:""; display:block; clear:both}

        
        /*크롬*/
        @@media screen and (-webkit-min-device-pixel-ratio:0) {
        .wbCommon {width:100%; text-align:center; min-width:1210px}
        .movieFrame {width:1120px; height:710px; margin:0 auto; background:url(http://file3.willbes.net/new_cop/2019/03/EV190308P_08.jpg) no-repeat center top;}
        .embedWrap {width:980px; margin:0 auto; position:relative; margin-left:-420px;}
        .embed-container {position:absolute; width:980px; height:auto; padding-bottom:46.25%; height:551px; overflow:hidden;}
        }
        	
    </style>


    <div class="evtContent" id="evtContainer">

        <div class="m_img1">
            <img src="http://file3.willbes.net/new_cop/2019/03/EV190312P_skybanner.png" alt="라이브토크쇼" usemap="#Map190308A" border="0">
            <map name="Map190308A" id="Map190308A">
                <area shape="rect" coords="8,11,168,126" href="#event01" />
                <area shape="rect" coords="8,143,168,260" href="#event02" />
                <area shape="rect" coords="8,274,168,409" href="#event03" />
                <area shape="rect" coords="8,442,168,558" href="#event04" />
                <area shape="rect" coords="8,569,168,693"href="javascript:doEvent()" />              
            </map>			
        </div>
		
		<div class="wbCommon wb_top">
			<img src="http://file3.willbes.net/new_cop/2019/03/EV190321P_01.jpg"  alt="경찰면접 꿀팁 대방출" />
            <div class="wb_top_01">
                <img src="http://file3.willbes.net/new_cop/2019/03/EV190321P_02.jpg" alt="단언컨데, 지금까지 이런 혜택은 없었다!" usemap="#Map190308B" border="0" />
                <map name="Map190308B" id="Map190308B">
                  <area shape="rect" coords="299,1850,819,1931" href="javascript:doEvent()" alt="필기합격 인증하기" />
                  <area shape="rect" coords="711,689,863,727" href="#event05" alt="상품혜택 상세보기" />
                  <area shape="rect" coords="575,173,729,198" href="{{ site_url('#none') }}" target="_blank" alt="당첨자발표" />
                </map>
                <ul>
					<li><img id="t1" src="http://file3.willbes.net/new_cop/2019/03/EV190312P_num00.png"  alt="숫자" /></li>
                    <li><img id="t2" src="http://file3.willbes.net/new_cop/2019/03/EV190312P_num00.png"  alt="숫자" /></li>
                </ul>
            </div>
		</div>

	    <div class="wbCommon wb_01" id="event01">
			<img src="http://file3.willbes.net/new_cop/2019/03/EV190308P_03_new.jpg" alt="3법면접 무료특강" />
		</div>       
        
	    <div class="wbCommon wb_02" id="event02">
			<img src="http://file3.willbes.net/new_cop/2019/03/EV190312P_03.jpg"  alt="신광은x황세웅 면접 Q&amp;A" usemap="#Map190314"/>
            <map name="Map190308B" id="Map190314">
                <area shape="rect" coords="432,1224,692,1287" href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank" alt="더많은영상확인하기" />
            </map>
			
            <!-- 인증전 -->
            <div class="wb_02_01">
                <!--img src="http://file3.willbes.net/new_cop/2019/03/EV190308P_05.jpg"  alt="신광은x황세웅 면접 Q&amp;A" />                        
                <a href="javascript:doEvent()"><img src="http://file3.willbes.net/new_cop/2019/03/EV190308P_btn.png"  alt="참여하기" /></a-->
                <!--img src="http://file3.willbes.net/new_cop/2019/03/EV190312P_04.jpg"  alt="종료" /-->
				<p class="mv"><iframe src="https://www.youtube.com/embed/rnGkHw8FJvE?rel=0" frameborder="0" allowfullscreen></iframe></p>
            </div>
		</div>
        
        @include('html.event_replyNotice') 
        
      	<div class="wbCommon wb_03" id="event03">
			<img src="http://file3.willbes.net/new_cop/2019/03/EV190308P_07_new.jpg"  alt="황세웅 실시간 기출분석" />
			
            <!-- Live 프레임 작업 영역 시작 20190313 -->           
			<c:import url="/event/movie/live.html?EVENT_NO=220&Gosi_Cd=2018_MST_3_Live&TeacherID=wc_020" />
            <!-- Live 프레임 작업 영역 시작 -->           
            
            <img src="http://file3.willbes.net/new_cop/2019/03/EV190312P_05.jpg"  alt="라이브강의 안내" /><br />                            		        	 		        	 
			<img src="http://file3.willbes.net/new_cop/2019/03/EV190308P_09.jpg"  alt="기출분석 라이브 특강 일정" />
		</div>
        
        <div class="wbCommon wb_04" id="event04">
		  <img src="http://file3.willbes.net/new_cop/2019/03/EV190308P_10_re.jpg" alt="경찰면접 꿀팁 소문내기이벤트" usemap="#Map190308C" border="0" />
          <map name="Map190308C" id="Map190308C">
            <area shape="rect" coords="139,2489,280,2552" href="http://cafe.daum.net/policeacademy" target="_blank" />
            <area shape="rect" coords="309,2489,461,2552" href="https://cafe.naver.com/polstudy" target="_blank" />
            <area shape="rect" coords="486,2489,651,2552" href="https://gall.dcinside.com/board/lists/?id=government" target="_blank" />
            <area shape="rect" coords="666,2489,862,2552" href="https://gall.dcinside.com/mgallery/board/lists/?id=policeofficer&page=1" target="_blank" />
          </map>
		</div> 
        
        @include('html.event_replyUrl')
    
        <div class="wbCommon wb_05" id="event05">
			<img src="http://file3.willbes.net/new_cop/2019/03/EV190308P_11.jpg" alt="상품혜택 및 유의사항 안내" />
		</div> 
        
    </div>
    <!-- End Container --> 

    <script src="/public/js/willbes/jwplayer/jwplayer.js"></script>
    <script type="text/javascript">
        function daycountDown() {
            event_day = new Date(2019,3,25,23,59,59);
            now = new Date();
            var t1, t2;
            
            var Dateleft = event_day.getDate() - now.getDate();
            if (Dateleft <10){
                t1 = 0;
                t2 = Dateleft;
            }else{
                t1 = 1;
                t2 = Dateleft-10;
            }
        
            $("#t1").attr("src", "http://file3.willbes.net/new_cop/2019/03/EV190312P_num0"+t1+".png");
            $("#t2").attr("src", "http://file3.willbes.net/new_cop/2019/03/EV190312P_num0"+t2+".png");
        }
    </script>
    <script type="text/javascript">
	function doEvent() {
		if("<c:out value='${userInfo.USER_ID}' />" == ""){
			alert("로그인을 해주세요.");
		    var targetOffset= $("#header").offset().top;
		    $('html, body').animate({scrollTop: targetOffset}, 0);
			loginFrm.USER_ID.focus();  
			return;
		}
		var url = '<c:url value="1138_pop2"/>' ;
		window.open(url,'event', 'scrollbars=no,toolbar=no,resizable=yes,width=590,height=550,top=50,left=100');
	}

	$(document).ready(function() {
		
		if("<c:out value='${userInfo.USER_ID}' />" != "") {
			$.ajax({
				type: "POST",
				url: '<c:url value="/event/eventCount.json"/>',
				data: $("#eventCnt").serialize(),
				cache: false,
				dataType: "json",
				error: function (request, status, error) {
				},
				success: function (response, status, request) {
				}
			}); 
		}
	});

	function inZero(p1,p2){
	    var zero = "";
	    for(var i=0; i<p2; i++){
	        zero += "0";
	  	}
	    return zero.toString().concat(p1).match(new RegExp("\\d{"+p2+"}$"));
	}

	function fn_live(p_type){
		
		if("<c:out value='${userInfo.USER_ID}' />" == "") {
			alert("회원만 라이브특강을 시청하실수 있습니다.");
			return;
		}	
		
		var isMobile;
		
		if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
			    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
			   
			isMobile = "M";
		}else{
			isMobile = "P";
		}

	    var isVw;	    
		
		$.ajax({
			type: "POST",
			url: '<c:url value="/event/getVodEndDate.json"/>',
			data: $("#eventCnt").serialize(),
			dataType: "text",
			async : false,
			success: function(RES) {
				if($.trim(RES)=="Y"){
				//정상적인 라이브 수강시간
					isVw = "Y";
				}else{
					isVw = "N";
				}				   
			},error: function(){
				isVw = "N";
			}
	 	});				
		
		if (isVw != "Y"){
			alert("라이브특강 시간을 확인해주세요.");
	   		return;
		}

		$.ajax({
			type: "POST",
			url: '<c:url value="/event/eventCount.json"/>',
			data: $("#eventCnt").serialize(),
			cache: false,
			dataType: "json",
			error: function (request, status, error) {
			},
			success: function (response, status, request) {
				if(response.result == "1") {

				}
			}
		}); 
		
		if(isMobile == "P"){			
			location.href = "/pass/promotion/index/cate/3010/code/1138#movieFrame";
		}else{
			if(p_type == "hd"){
				location.href = "http://willbes.flive.skcdn.com/willbeslive/livestreamcop5011/Playlist.m3u8";
			}else{
				location.href = "http://willbes.flive.skcdn.com/willbeslive/livestreamcop5012/Playlist.m3u8";
			}	
		}
		
	}
	
	function fn_EventCount(){
		
		if("<c:out value='${userInfo.USER_ID}' />" == "") {
			return;
		}
		
		$.ajax({
			type: "POST",
			url: '<c:url value="/event/eventCount.json"/>',
			data: $("#eventCnt").serialize(),
			cache: false,
			dataType: "json",
			error: function (request, status, error) {
			},
			success: function (response, status, request) {
				if(response.result == "1") {

				}
			}
		}); 
	}
	
</script>
    
@stop