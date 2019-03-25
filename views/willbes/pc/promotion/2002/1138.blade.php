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
        .wb_top {background:#293342 url(http://file3.willbes.net/new_cop/2019/03/EV190312P_01_bg.jpg) no-repeat center top;}
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
        @if(empty($cert_apply))
            <li><a href="javascript:certOpen();">가입 및 인증하기 &gt;</a></li>
        @else
            <li><strong>{{sess_data('mem_name')}}</strong>님은<br /><span>인증완료</span><br />상태입니다.</li>
        @endif
        <div class="m_img1">
            <img src="http://file3.willbes.net/new_cop/2019/03/EV190312P_skybanner.png" alt="라이브토크쇼" usemap="#Map190308A" border="0">
            <map name="Map190308A" id="Map190308A">
                            <area shape="rect" coords="13,23,173,138" href="#event01" />
                            <area shape="rect" coords="15,159,175,276" href="#event02" />
                            <area shape="rect" coords="16,290,176,425" href="#event03" />
                            <area shape="rect" coords="15,434,175,558" @if(empty($cert_apply))href="javascript:certOpen();"@else href="javascript:alert('이미 이벤트에 참가하셨습니다.')" @endif />
            </map>			
        </div>
		
		<div class="wbCommon wb_top">
			<img src="http://file3.willbes.net/new_cop/2019/03/EV190321P_01.jpg"  alt="경찰면접 꿀팁 대방출" />
            <div class="wb_top_01">
                <img src="http://file3.willbes.net/new_cop/2019/03/EV190321P_02.jpg" alt="단언컨데, 지금까지 이런 혜택은 없었다!" usemap="#Map190308B" border="0" />
                <map name="Map190308B" id="Map190308B">
                  <area shape="rect" coords="299,1850,819,1931" @if(empty($cert_apply))href="javascript:certOpen();"@else href="javascript:alert('이미 이벤트에 참가하셨습니다.')" @endif alt="필기합격 인증하기" />
                  <area shape="rect" coords="711,689,863,727" href="#event05" alt="상품혜택 상세보기" />
                  <area shape="rect" coords="575,173,729,198" href="{{ site_url('/pass/support/notice/show?board_idx=214877&s_campus=605001&s_keyword') }}" target="_blank" alt="당첨자발표" />
                </map>
                <!--ul>
					<li><img id="t1" src="http://file3.willbes.net/new_cop/2019/03/EV190312P_num00.png"  alt="숫자" /></li>
                    <li><img id="t2" src="http://file3.willbes.net/new_cop/2019/03/EV190312P_num00.png"  alt="숫자" /></li>
                </ul-->
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
        
        {{--@include('html.event_replyNotice') : 댓글 주석처리--}}
        
      	<div class="wbCommon wb_03" id="event03">
			<img src="http://file3.willbes.net/new_cop/2019/03/EV190308P_07_new.jpg"  alt="황세웅 실시간 기출분석" />
			<img src="http://file3.willbes.net/new_cop/2019/03/EV190308P_08_end.jpg"  alt="황세웅 실시간 기출분석" />
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

            {{--@include('html.event_replyUrl') : 댓글 주석처리--}}

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

        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
                var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=800,height=700');
            @endif
        }



	$(document).ready(function() {


	});

	function inZero(p1,p2){
	    var zero = "";
	    for(var i=0; i<p2; i++){
	        zero += "0";
	  	}
	    return zero.toString().concat(p1).match(new RegExp("\\d{"+p2+"}$"));
	}

</script>
    
@stop