@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtTop {position:relative}

    .evt00 {text-align:center;}
    .evt00 .dday {font-size:22px;padding:20px 0;}
    .evt00 .dday span {color:#435d96; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}

    .evt02 {padding-bottom:120px; background:#f6f6f6}
    .evt02 a {display:block; margin:0 auto; width:60%; font-size:20px; background:#293342; color:#fff; padding:15px 0; text-align:center; border-radius:50px; line-height:1.4}

    .tabMenu {width:100%; margin-bottom:30px}
    .tabMenu li {display:inline; float:left; width:50%}
    .tabMenu li a {display:block; padding:15px 0; text-align:center; border-radius:10px; background:#e1e1e1; color:#9d9d9d; font-size:22px}
    .tabMenu li span {display:block; font-size:14px}
    .tabMenu li a:hover,
    .tabMenu li a.active {background:#358c78; color:#fff}
    .tabMenu:after {content:""; display:block; clear:both}
    .embed-container {position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%;} 
    .embed-container iframe, 
    .embed-container object, 
    .embed-container embed {position: absolute; top: 0; left: 0; width: 100%; height: 100%;}

    .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding-top:10px}
    .btnbuy {max-width:720px; margin:0 auto}
    .btnbuy a {display:block; width:99%; max-width:700px; margin:0 auto 5px; font-size:1.2rem; background:#000; color:#fff; padding:15px 0; text-align:center; border-radius:10px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}
    .btnbuy a:hover {background:#3a99f0;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    .infoCheck {width:100%; max-width:720px; margin:10px auto; font-size:12px;}
    .infoCheck label {margin-right:30px; cursor: pointer; }
    .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
    .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; font-weight:bold; color:#0099ff} 
    .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
    .infoCheck a:hover {background:#0099ff;}

    .evtFooter {margin:0 auto; padding:30px 20px; text-align:left; color:#666; font-size:0.875rem; line-height:1.4 }
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
    .evtFooter p {margin-bottom:10px; color:#333; font-size:1.2rem;}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal;}


    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {        
        .btnbuy a {display:inline-block;width:49%; }  
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
        .evt00 .dday {font-size:30px;}
        .evt00 .dday span {box-shadow:inset 0 -20px 0 rgba(0,0,0,0.1);}  
        .btnbuy a {font-size:1.5rem;}  
    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>

<div id="Container" class="Container NSK c_both">      
    <div class="evtCtnsBox evt00 ddayArea">
        <div class="dday NSK-Thin">
            <strong class="NSK-Black">소방패스 마감까지 <br><span id="ddayCountText"></span> 남았습니다.</strong>
        </div>     
    </div>   

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1060m_top.jpg" alt="윌비스 신광은 경찰학원 파이널패스" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1060m_01.jpg" alt="윌비스 신광은 경찰학원 파이널패스" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1060m_02.jpg" alt="윌비스 신광은 경찰학원 파이널패스" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1060m_03.jpg" alt="윌비스 신광은 경찰학원 파이널패스" >
        <ul class="tabMenu">
            <li>
                <a href="#tab1" class="active">
                    <span>소방 합격 전문가</span>
                    이종오 교수님을 소개합니다.
                </a>
            </li>
            <li>
                <a href="#tab2">
                    <span>불꽃 같은 합격 커리큘럼</span>
                    이종오 소방직 공개설명회
                </a>
            </li>
        </ul>  
        <div class="embed-container">
            <div id="tab1" class="tabcts">
                <iframe src="https://www.youtube.com/embed/xBWCniTv_Ro?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>      
            </div>
            <div id="tab2" class="tabcts">
                <iframe src="https://www.youtube.com/embed/b06AI4w38gY?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>      
            </div>
        </div>
    </div>
    
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/09/1060m_04.jpg" alt="윌비스 신광은 경찰학원 파이널패스" >
    </div> 

    <div class="evtCtnsBox evtFooter" id="infoText">
        <h3 class="NSK-Black">윌비스 소방PASS 이용안내</h3>
        <p>● 상품구성 </p>
        <ul>
            <li>본 PASS는 수강신청 시 선택 직렬에 따라 소방직 공채, 구조/구급&관련학과 특채를 대비할 수 있는 상품입니다.</li>
            <li>수강가능 과목 :<br>
            [공채] 국어, 영어, 한국사, 소방학개론, 소방관계법규<br>
            [특채] 구조/구급 – 국어, 생활영어, 소방학ㅣ관련학과 – 국어, 소방학, 소방관계법규</li>
            <li>본PASS는 윌비스공무원학원 소방단독반 전문 교수진의 과정을 제공하는 상품입니다.<br>
            - 국어 김세령, 영어 [공채] 이아림, 영어[특채] 양익, 한국사 한경준, 소방학개론/소방관계법규 이종오/김종상</li>
            <li>2019년 7월부터 진행된 2020년 대비 전 과정 및 2021년 대비로 진행되는 신규 개강 강좌를 커리큘럼 진행에 따라 순차적으로 제공해드리는 상품입니다.<br>
            (일부 교수진의 경우, 신규 과정이 업데이트되지 않을 수 있으며 해당 경우에는 이전 연도 과정을 제공해드립니다.) </li>
            <li>본 PASS 이용 시 수강기간 내에 시행되는 소방직 대비 온라인 모의고사 응시권이 제공됩니다.</li>
        </ul>

        <p>● 수강관련</p>
        <ul>
            <li>[내강의실]-[무한PASS존]-[강좌추가]버튼을 클릭, 원하는 과목/교수/강좌를 선택 등록 후 수강할 수 있습니다.</li>
            <li>본 PASS는 일시정지/연장/재수강 기능을 제공하지 않습니다.</li>
            <li>본 PASS 수강 시 이용가능한 기기는 PC/모바일 총 2대입니다.</li>
            <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.</li>
        </ul>

        <p>● 환불정책</p>
        <ul>
            <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
            <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
            <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
            <li>고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, 정가 기준으로 계산하여 사용 일수만큼 차감하고 환불됩니다.</li>
        </ul>
        <div>※ 이용문의 : 1544-5006</div>
    </div>  
</div>
<!-- End Container -->

<div class="btnbuyBox">
    <div class="btnbuy NSK-Black">     
        <a href="javascript:goLecture('167765');">
        공채 12개월 신청 >
        </a>
        <a href="javascript:goLecture('167765');">
        특채 12개월 신청 >
        </a>
    </div>
    <div id="pass" class="infoCheck">
        <input type="checkbox" name="y_pkg" value="162748" style="display: none;" checked/>
        <input type="checkbox" id="is_chk" name="is_chk"><label for="is_chk">페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
        <a href="#infoText">이용안내 확인하기 ↓</a>
    </div>
</div>

<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
</form>


<script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
<script type="text/javascript">
    /*디데이카운트다운*/
    $(document).ready(function() {
        dDayCountDownText('{{$arr_promotion_params['edate']}}');
    });

    // 날짜차이 계산
    var dDayDateDiff = {
        inDays: function(dd1, dd2) {
            var tt2 = dd2.getTime();
            var tt1 = dd1.getTime();

            return Math.floor((tt2-tt1) / (1000 * 60 * 60 * 24));
        },
        inWeeks: function(dd1, dd2) {
            var tt2 = dd2.getTime();
            var tt1 = dd1.getTime();

            return parseInt((tt2-tt1)/(24*3600*1000*7));
        },
        inMonths: function(dd1, dd2) {
            var dd1Y = dd1.getFullYear();
            var dd2Y = dd2.getFullYear();
            var dd1M = dd1.getMonth();
            var dd2M = dd2.getMonth();

            return (dd2M+12*dd2Y)-(dd1M+12*dd1Y);
        },
        inYears: function(dd1, dd2) {
            return dd2.getFullYear()-dd1.getFullYear();
        }
    };

    {{--
        * 프로모션용 디데이카운터 텍스트
        * @@param end_date [마감일 (YYYY-MM-DD)]
    --}}
    function dDayCountDownText(end_date, ele_id) {
        if(!ele_id) ele_id = 'ddayCountText';
        var arr_end_date = end_date.split('-');
        var event_day = new Date(arr_end_date[0], parseInt(arr_end_date[1]) - 1, arr_end_date[2], 23, 59, 59);
        var now = new Date();
        var timeGap = new Date(0, 0, 0, 0, 0, 0, (event_day - now));
        var date_left = String( dDayDateDiff.inDays(now, event_day) );
        var hour_left = String( timeGap.getHours() );
        var minute_left = String( timeGap.getMinutes() );
        var second_left = String(  timeGap.getSeconds() );

        if(date_left.length == 1) date_left = '0' + date_left;
        if(hour_left.length == 1) hour_left = '0' + hour_left;
        if(minute_left.length == 1) minute_left = '0' + minute_left;
        if(second_left.length == 1) second_left = '0' + second_left;

        if ((event_day.getTime() - now.getTime()) > 0) {
            $('#'+ele_id).html(date_left + '일 ' + hour_left + ':' + minute_left + ':' + second_left);

            setTimeout(function() {
                dDayCountDownText(end_date, ele_id);
            }, 1000);
        } else {
            $('#'+ele_id).hide();
            $('.ddayArea').hide();
        }
    }

    {{-- 수강신청 이동 --}}
    function goLecture(prod_code) {
        if ($('#is_chk').is(':checked') === false) {
            alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
            return;
        }
        location.href = '{{ front_url('/periodPackage/show/cate/3023/pack/648001/prod-code/') }}' + prod_code;
    }

    var tab1_url = "https://www.youtube.com/embed/xBWCniTv_Ro?rel=0";
		var tab2_url = "https://www.youtube.com/embed/b06AI4w38gY?rel=0";

		$(document).ready(function(){
		$(".tabcts").hide(); 
		$(".tabcts:first").show();
		$(".tabMenu li a").click(function(){ 
			var activeTab = $(this).attr("href"); 
			var html_str = "";
			if(activeTab == "#tab1"){
				html_str = "<iframe src='"+tab1_url+"' allowfullscreen></iframe>";
			}else if(activeTab == "#tab2"){
				html_str = "<iframe src='"+tab2_url+"' allowfullscreen></iframe>";					
			}
			$(".tabMenu li a").removeClass("active"); 
			$(this).addClass("active"); 
			$(".tabcts").hide(); 
			$(".tabcts").html(''); 
			$(activeTab).html(html_str);
			$(activeTab).fadeIn(); 
			return false; 
			});
		});

</script>

<!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
<script language='javascript'>
    var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
    var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
</script>
<noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
<!-- AceCounter Log Gathering Script End -->

@stop