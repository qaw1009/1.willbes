@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .dday {font-size:24px !important; padding:10px; background:#f5f5f5; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#3a99f0; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#000; font-size:14px !important;}

    .evt03 .boxYoutube {margin:40px auto}
    .evt03 .tabMenu {margin-right:-10px; margin-bottom:20px}
    .evt03 .tabMenu li {display:inline; float:left; width:33.33333%; }
    .evt03 .tabMenu a {display:block; opacity: 0.5; margin-right:10px; background:#000;}
    .evt03 .tabMenu a.active {box-shadow:0 10px 10px rgba(0,0,0,.2); opacity: 1;}
    .evt03 .tabMenu a img {width:100%}
    .evt03 .tabMenu:after {content:''; display:block; clear:both}

    .video-container {position:relative; padding-bottom:56.25%; padding-top:30px; height:0; overflow: hidden;}
    .video-container iframe,
    .video-container object,
    .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    .evt04 {background:#001d2f; padding-bottom:50px}
    .evt04 .ImgBox {position:relative;}
    .evt04 .btnLec {margin:50px auto; padding:20px; background:#000; color:#fff; font-size:30px; border-radius:40px}
    .evt04 .check {font-size:16px; text-align:center; line-height:1.5; color:#fff; margin:40px 20px 0;}
    .evt04 .check input {border:2px solid #000; margin-right:10px; height:20px; width:20px}
    .evt04 .check a {display:block; width:60%; padding:5px 20px; color:#fff; background:#0574c4; margin:20px auto 0; border-radius:20px}
    .evt04 .check a:hover {background:#fff200; color:#0574c4}
    .evt04 .info {margin:40px auto 0; padding:20px; color:#fff; line-height:1.4; text-align:left; font-size:14px}

    .evt05 {padding-bottom:100px;}

    .evtInfo {padding:80px 20px; background:#333; color:#fff; font-size:16px;}
    .evtInfoBox {text-align:left; line-height:1.5}
    .evtInfoBox li {list-style: decimal; margin-left:20px; font-size:14px; margin-bottom:10px; color:#ccc}
    .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
    .evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox .only {color:#E80000;vertical-align:top;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        .dday {font-size:18px !important;} 
        .dday a {padding:5px 10px;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       
        .dday {font-size:18px !important;} 
        .dday a {padding:5px 10px;}
    }

    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {

    }
</style>


<div id="Container" class="Container NSK c_both"> 
    <div class="evtCtnsBox dday NSK-Thin">
        <strong class="NSK-Black">2022 개편 PASS {{$arr_promotion_params['turn']}}기 판매종료까지 <span id="ddayCountText"></span> </strong>
        <a href="#evt04">수강신청 ></a>
    </div>

    <div class="evtCtnsBox evt00">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div>

    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2078m_top.jpg"  alt="개편패스"/>
    </div>


    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2078m_01.jpg"  alt="수험생에게 꼭 필요한 강의만!"/>
    </div>

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2078m_03_01.jpg"  alt="과목개편도 신광은 경찰팀과 함께"/>

        <div class="video-container-box">
            <div id="tab1" class="youtubeCts video-container">
                <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>

            <div id="tab2" class="youtubeCts video-container">
                <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>

            <div id="tab3" class="youtubeCts video-container">
                <iframe src="https://www.youtube.com/embed/KkESWQLjtq8?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div> 


        <div class="boxYoutube">
            <ul class="tabMenu">
                <li>
                    <a href="#tab1" class="active">
                        <img src="https://static.willbes.net/public/images/promotion/2021/02/2078_03_t01.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#tab2">
                        <img src="https://static.willbes.net/public/images/promotion/2021/02/2078_03_t02.jpg" alt="" />
                    </a>
                </li>                    
                <li>
                    <a href="#tab3">
                        <img src="https://static.willbes.net/public/images/promotion/2021/02/2078_03_t03.jpg" alt="" />
                    </a>
                </li>
            </ul>
        </div>

        <img src="https://static.willbes.net/public/images/promotion/2021/02/2078m_03_02.jpg"  alt="기본이론 종합반"/>
    </div>

    <div class="evtCtnsBox evt04" id="evt04">
        <div class="ImgBox">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2078m_04.jpg" alt="신청하기"/>
            <a href="javascript:go_PassLecture('179433');" title="경찰 개편 pass 수강신청하기" style="position: absolute; left: 10.56%; top: 84.41%; width: 78.19%; height: 16.34%; z-index: 2;"></a>
        </div>
        <div class="check">
            <label><input name="ischk" type="checkbox" value="Y" />페이지 하단 2022 신광은경찰 개편 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
            <a href="#careful">이용안내확인하기 ↓</a>               
        </div>
        <div class="info">
            ※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신 및 환급이 불가합니다.<br>
            ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br>
            ※ 한정 상품으로 할인쿠폰이 사용불가한 상품입니다.<br>
            ※ 쿠폰은 PASS 결제 후 [내강의실>결제관리>쿠폰/수강권관리] 에서 확인 가능합니다.<br>
        </div>
    </div>

    <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">2022 신광은경찰 개편 PASS 이용안내</h4>
                <div class="infoTit">2022 개편 PASS</div>
				<ul>
					<li>본 상품은 구매일로부터 12개월간 수강 가능한 상품입니다.</li>
                    <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                    - 2022 대비 형사법, 경찰학개론, 헌법 전 강좌<br>
                    - 2021년 1차 대비 신광은 형사소송법 기본이론 (20년 9월)<br>
                    - 2021년 1차 대비 장정훈 경찰학개론 기본이론 (20년 12월)<br>
                    - 2021년 1차 대비 김원욱 형법 기본이론 (20년 11월)<br>
                    - 2021년 1차 대비 신광은 형사소송법 심화이론 + OX (20년 10월)<br>
                    - 2020년 2차 대비 장정훈 경찰학개론 심화이론 (20년 5월)<br>
                    - 2020년 2차 대비 김원욱 형법 기본서 판례 심화이론 (20년 5월)<br>
                    - 2021년 1차 대비 신광은 형법 심화이론 (20년 10월)<br>
                    - (수강가능 교수진 확인하기 > 형사법 : 신광은 교수님, 헌법 : 김원욱 교수님, 경찰학개론(개편) : 장정훈 교수님)</li>
                    <li>선택한 신광은 경찰 개편PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강 할 수 있습니다.</li>
                    <li>신광은 경찰 개편PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                    <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>  
				</ul>
                <div class="infoTit">이벤트 혜택</div>
				<ul>
					<li>30일 수강기간 연장<br>
                    - 제공되는 수강기간 중 12개월은 정규 수강기간이며, 이 후 추가 제공되는 30일은 이벤트 수강기간입니다.<br>
                    - 이벤트로 제공되는 수강기간은 정규 수강기간이 아니며, 정규 수강기간(12개월)이 지나면 환불이 불가합니다.</li>
                    <li>입문서 증정<br>
                    - 형사법&경찰학개론&헌법 입문서가 무료로 제공됩니다.<br>
                    - 입문서는 3월 중순 일괄배송됩니다. (일정 추후 공지)<br>
                    - 중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                    <li>G-TELP&한능검 특강 100% 할인쿠폰<br>
                    - G-TELP&한능검 특강 100% 할인쿠폰은 2022 개편PASS 구매 시 자동 발급됩니다.<br>
                    - 수강기간 중 아래 강좌에 각 1회씩 사용 가능합니다.<br>
                    (G-TELP 주요문법강의, G-TELP 실전모의고사 강의, 오태진 한능검 요약강의 3급 대비)</li>
                    <li>전국모의고사 100% 할인쿠폰<br>
                    - 전국모의고사 할인쿠폰은 2022년 대비 전국모의고사에만 사용 가능합니다.<br>
                    - 무료 응시 쿠폰은 매 모의고사 전 일괄 발급되며, 접수기간에 맞추어 사용해주시기 바랍니다.</li>
                    <li>배송비 무료쿠폰<br>
                    - 배송비 무료쿠폰은 총 2매 지급됩니다.<br>
                    ※ 할인 쿠폰은 내강의실 > 쿠폰함 확인 바랍니다.</li>    
				</ul>
                <div class="infoTit">교재</div>
				<ul>
					<li>신광은 경찰PASS 수강에 필요한 교재는 별도로 구매 하셔야하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>  
				</ul>
                <div class="infoTit">환불</div>
				<ul>
					<li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 
                    사용일수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                    <li>이벤트로 제공되는 수강기간은 정규 수강기간이 아니며, 정규 수강기간(12개월)이 지나면 환불이 불가합니다.</li>
                    <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>  
				</ul>
                <div class="infoTit">PASS 수강</div>
				<ul>
					<li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                    <li>구매한 PASS 상품 선택 후 [강좌추가하기] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                    <li>신광은경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                    <li>신광은경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 
                        모바일 1대 또는 모바일 2대(신광은경찰PASS PMP강의는 제공하지 않습니다.)</li>
                    <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다.다만 추후 초기화가
                        필요할 시 내용 확인 후 가능 하오니 고객센터로 문의주시기 바랍니다. ([내강의실] 내 [무한PASS존] 에서 등록기기정보 확인)</li>
                    <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>  
				</ul>
                <div class="infoTit">유의사항</div>
				<ul>
					<li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                    <li>신광은경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공
                        예정이며, 이로 인한 환불은 불가합니다.</li>
                    <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. 
                    이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                    <li>온라인 모의고사는 무료로 제공되며, 학원에서 진행되는 일부 모의고사(불금, 올빼미, 옹달샘 등)는 제공되지 않습니다.</li>
                    <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 
                        제공 될 수 있습니다.</li>
                    <li>PASS 관련 발급 된 쿠폰은 이벤트가 변경되거나 종료 될 경우 자동 회수 될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>  
				</ul>
                <div class="infoTit">이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</div>
			</div>
		</div>  
</div>

<!-- End Container -->
<script type="text/javascript">
        function go_PassLecture(code) {
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            var url = '{{ front_url('/periodPackage/show/cate/3001/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        //유튜브
        var tab1_url = "https://www.youtube.com/embed/40LDBoOoD_k?rel=0&modestbranding=1&showinfo=0";
        var tab2_url = "https://www.youtube.com/embed/VHTrL5w2IF4?rel=0&modestbranding=1&showinfo=0";        
        var tab3_url = "https://www.youtube.com/embed/KkESWQLjtq8?rel=0&modestbranding=1&showinfo=0";

        $(function() {
        $(".youtubeCts").hide(); 
        $(".youtubeCts:first").show();
        $(".tabMenu li a").click(function(){ 
            var activeTab = $(this).attr("href"); 
            var html_str = "";
            if(activeTab == "#tab1"){
                html_str = "<iframe src='"+tab1_url+"' frameborder='0' allowfullscreen></iframe>";
            }else if(activeTab == "#tab2"){
                html_str = "<iframe src='"+tab2_url+"' frameborder='0' allowfullscreen></iframe>";
            }else if(activeTab == "#tab3"){
                html_str = "<iframe src='"+tab3_url+"' frameborder='0' allowfullscreen></iframe>";                   
            }
            $(".tabMenu a").removeClass("active"); 
            $(this).addClass("active"); 
            $(".youtubeCts").hide(); 
            $(".youtubeCts").html(''); 
            $(activeTab).html(html_str);
            $(activeTab).fadeIn(); 
            return false; 
            });
        });	

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
            }
    }
    </script> 

<!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
<script language='javascript'>
    var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
    var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
</script>
<noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
<!-- AceCounter Log Gathering Script End -->

@stop