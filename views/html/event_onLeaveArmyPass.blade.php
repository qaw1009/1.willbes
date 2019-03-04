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

        .rLnb {
            position:absolute; width:190px; top:100px; right:10px; z-index:1;
        }
        .rLnb ul {background:#fff; border:1px solid #2f2f2f; margin-bottom:10px;
            -webkit-box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.21);
            -moz-box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.21);
            box-shadow:5px 5px 10px 0px rgba(0,0,0,0.21);
        }
        .rLnb li {}
        .rLnb li:first-child {
            background:#cdcdcd;
            color:#000;
            text-align:center;
            padding:12px 0;
            font-weight:bold;
            font-size:15px;
			letter-spacing:-1px			
        }
        .rLnb .typeA a {
            border-bottom:1px solid #bfbfbf; display:block; padding:10px 10px 10px 15px; line-height:1.4; font-weight:bold; 
            background:url(http://file3.willbes.net/new_gosi/2019/leave_army/leaveArmylnb_arrow.jpg) no-repeat 93% center;}
        .rLnb .typeA a:hover {
            font-weight: 600;
            background:#ebebeb url(http://file3.willbes.net/new_gosi/2019/leave_army/leaveArmylnb_arrow.jpg) no-repeat 93% center;
        }
        .rLnb .typeA li:last-child a {border:0}
        .rLnb .typeB li {            
            text-align:center;
            padding:15px 0;
            line-height: 1.4;
        }
        .rLnb .typeB a {display:block; background:#000; color:#fff; border-radius: 20px; padding:8px 0; margin:0 20px}
        .rLnb_sectionFixed {position:fixed; top:20px}	
        
        .LAeventA01 {background:url(http://file3.willbes.net/new_gosi/2019/leave_army/la_on_top_bg.jpg) no-repeat center top; position:relative;}
        /*플립 애니메이션*/
        .LAeventA01 .main_img {position:absolute; width:601px; top:1000px; left:50%; margin-left:-488px; z-index:10; opacity:0;filter:alpha(opacity=0);-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-fill-mode: both;animation-fill-mode: both}
        @@keyframes flipInX {
        from {
            -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
            transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
            -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
            opacity: 0;
        }
        40% {
            -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
            transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
            -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
        }
        60% {
            -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
            transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
            opacity: 1;
        }
        80% {
            -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
            transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
        }
        to {
            -webkit-transform: perspective(400px);
            transform: perspective(400px);
        }
        }
        
        .LAeventA01 .flipInX {
        -webkit-backface-visibility: visible !important;
        backface-visibility: visible !important;
        -webkit-animation-name: flipInX;
        animation-name: flipInX;
        }
        
        .LAeventA02 {width:100%; text-align:center; background:#ececec}
        .LAeventA02 ul {width:1034px; margin:0 auto; }
        .LAeventA02 li {margin-bottom:13px; margin-right:13px; display:inline; float:left;}
        .LAeventA02 li:nth-child(3n+3) {margin:0}
        .LAeventA02 ul:after {
            content:'';
            display:block;
            clear:both;
        }
        .LAeventA03 {width:100%; text-align:center; background:#252525}		
    </style>
    
    <div class="p_re evtContent" id="evtContainer">
        <div class="rLnb">
            @include('html.event_onLeaveArmyPassRlnb')
            <ul class="typeB">
                <li class="NSK-Black">전역(예정)간부 가입/인증</li> 
                <!--인증 전-->
                <li><a href="javascript:openArmConfirm(0);">가입 및 인증하기 &gt;</a></li>   
                 <!--인증 후-->            
                <li><strong>홍길동</strong>님은<br /><span>인증완료</span><br />상태입니다.</li>                              	
            </ul>
            <div>
            	<img src="http://file3.willbes.net/new_gosi/2019/leave_army/la_q_bnr02.jpg" alt=""/> 
            </div>
        </div>

        <div class="evtCtnsBox LAeventA01">
		  	<div class="main_img flipInX animated" style="opacity:1;">
                <img src="{{ img_url('leave_army/la_on_top_txt.png') }}" alt="윌비스 PASS 혜택">  
			</div>
            <img src="{{ img_url('leave_army/la_on_top.jpg') }}" alt="윌비스 PASS">                          
		</div>
        
        <div class="LAeventA02">
        	<img src="{{ img_url('leave_army/la_on_01.jpg') }}" alt=""/>
			<ul>
            	<li><a href="#none"><img src="{{ img_url('leave_army/la_on_01_m1.jpg') }}" alt="소방직"/></a></li>
                <li><a href="#none"><img src="{{ img_url('leave_army/la_on_01_m2.jpg') }}" alt="경찰직"/></a></li>
                <li><a href="#none"><img src="{{ img_url('leave_army/la_on_01_m3.jpg') }}" alt="군무원"/></a></li>
                <li><a href="#none"><img src="{{ img_url('leave_army/la_on_01_m4.jpg') }}" alt="기술직"/></a></li>
                <li><a href="#none"><img src="{{ img_url('leave_army/la_on_01_m5.jpg') }}" alt="일반행정직"/></a></li>
                <li><a href="#none"><img src="{{ img_url('leave_army/la_on_01_m6.jpg') }}" alt="소방(산업)기사 자격증"/></a></li>
            </ul>
            <img src="{{ img_url('leave_army/la_on_02.jpg') }}"  alt="" usemap="#Mappass02"/>
            <map name="Map" id="Mappass02">
                <area shape="rect" coords="194,1063,398,1102" href="javascript:openArmConfirm(0);"/>
                <area shape="rect" coords="714,1063,922,1102" href="https://www.local.willbes.net/home/html/event_onLeaveArmyPassLec" />
            </map>
        </div>
        <div class="LAeventA03">
        	<img src="{{ img_url('leave_army/la_on_03.jpg') }}" alt="합격을 위한 너무나 다영한 선택! 윌비스 PASS"/>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
    function openArmConfirm(){
        var url = 'https://www.local.willbes.net/home/html/event_onLeaveArmyPassConfirmPop' ;
        window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
    }


    function armLoginCheck() {
        var url = window.location.pathname+window.location.search;
        $("#url_path").val(url);
        $('#armFrm').attr("action","<c:url value='/user/confirmEventLogin'/>");
        $('#armFrm').submit();
    }

    function suvreyPop(){
        if("<c:out value='${userInfo.USER_ID}' />" == ""){
            alert("로그인 후 이용해주세요.");
            return;
        }
        if(parseInt('${armCount}')<1){
            alert("먼저 제대군인 인증을 해주세요.");
            return;
        }
        var surveyid = 1;
        $.ajax({		     
            type: "POST", 
            url : '<c:url value="/survey/user_survey_chk"/>?SURVEYID='+surveyid,
            dataType: "text",  
            async : false,
            beforeSubmit: function (data, frm, opt) {
            },
            success: function(RES) {
                if($.trim(RES)=="N"){           
                    alert("이미 참여하였습니다.");
                    return;
                }else if($.trim(RES)=="Y"){
                    var url = '<c:url value="/survey/view.html?event_cd=On_leaveArmySurveyPop"/>&SURVEYID='+surveyid;
                    window.open(url,'survey', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=600,height=700');
                }else{
                    alert("참여 실패하였습니다.");
                    return;
                }
            },complete: function(){
            },error: function(){
                alert("참여 실패하였습니다.");
                return;
            }
        });
    }



    $( document ).ready( function() {
                var jbOffset = $( '.rLnb' ).offset();
                $( window ).scroll( function() {
                if ( $( document ).scrollTop() > jbOffset.top ) {
                    $( '.rLnb' ).addClass( 'rLnb_sectionFixed' );
                }
                else {
                    $( '.rLnb' ).removeClass( 'rLnb_sectionFixed' );
                }
                });
            } );

            $(document).ready(function() {
                $('.rLnb').onePageNav({
                    currentClass: 'hvr-shutter-out-horizontal_active'
                });
            });

    $(function(e){
        var targetOffset= $("#gridContainer").offset().top;
        $('html, body').animate({scrollTop: targetOffset}, 1000);
        /*e.preventDefault(); */   
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
            var jbOffset = $( '.rLnb' ).offset();
            $( window ).scroll( function() {
              if ( $( document ).scrollTop() > jbOffset.top ) {
                $( '.rLnb' ).addClass( 'rLnb_sectionFixed' );
              }
              else {
                $( '.rLnb' ).removeClass( 'rLnb_sectionFixed' );
              }
            });
          } );

        $(document).ready(function() {
            $('.rLnb').onePageNav({
                currentClass: 'hvr-shutter-out-horizontal_active'
            });
        });       
    </script>

@stop