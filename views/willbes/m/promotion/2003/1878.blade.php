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

    .evt04 {position:relative;}
    .evt04 .a01 {position: absolute; left: 53.06%; top: 86.11%; width: 24.03%; height: 6.44%; margin:0; padding:0; z-index: 5;}

    .check {background:#062C5D; padding:20px 0px 40px 10px; letter-spacing:0; color:#fff; z-index:5}
    .check label {cursor:pointer; font-size:14px;color:#fff;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check > a {display:block; width:80%; padding:10px 20px; color:#000; background:#fff; margin:20px auto 0; border-radius:20px; font-size:14px;font-weight:bold;}

    .evtFooter {margin:0 auto; padding:30px 20px; text-align:left; color:#666; font-size:0.875rem; line-height:1.4 }
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
    .evtFooter p {margin-bottom:10px; color:#333; font-size:1.2rem;}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal;}

    /* 폰 가로, 태블릿 세로*/
    @@media all and (min-width:320px) and (max-width:408px) {       

    }

    @@media all and (min-width:409px) and (max-width:588px) {       

    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
        .evt00 .dday {font-size:30px;}
        .evt00 .dday span {box-shadow:inset 0 -20px 0 rgba(0,0,0,0.1);}       
    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style> 

<div id="Container" class="Container NSK c_both">     
    
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/10/1878m_top.jpg" alt="" >
    </div>

    <div class="evtCtnsBox evt00 ddayArea">
        <div class="dday NSK-Thin">
            <strong class="NSK-Black">PASS 마감까지<br><span id="ddayCountText"></span> 남았습니다.</strong>
        </div>     
    </div>      

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/10/1878m_01.gif" alt="" >
    </div> 
    
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/10/1878m_02.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/10/1878m_03.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2020/10/1878m_04.jpg" alt="" >
        <a href="javascript:go_PassLecture('173499');" class="a01"></a>           
    </div> 

    <div class="evtCtnsBox check">
        <label>
            <input name="ischk" type="checkbox" value="Y" />
            페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
        </label>
        <a href="#infoText">이용안내 확인하기 ↓</a>
    </div>  

    <div class="evtCtnsBox evtFooter" id="infoText">
        <h3 class="NSK-Black">2021 국가직 7급 전문과목 PASS 이용안내</h3>
        <p>● 상품구성 </p>
        <ul>
            <li>본 PASS는 2021년도 국가직 7급 2차 전문과목 대비 과정으로, 참여 교수진의 강좌를 배수 제한없이 무제한으로 수강 가능합니다.</li>
            <li>수강가능 교수진/강좌<br>
                (과목별 교수진의 제공되는 상세 강좌 리스트는 수강신청 상세 안내 화면을 확인해주시기 바랍니다.)<br>
                - 헌법/행정법 황남기 교수 / 2020~2021 전 과정 제공<br>
                - 헌법 유시완 교수 / 2020 대비 과정만 제공<br>
                - 행정법 이석준 교수 / 2021 대비 전 과정 제공<br>
                - 행정법 한세훈 교수 / 2020 대비 전 과정 제공<br>
                - 행정학 김덕관 교수 / 2020~2021 전 과정 제공<br>
                - 경제학 황정빈 교수 / 2019~2020 대비 진행 과정만 제공
            </li>
            <li>참여 교수진의 일정 및 진행방식은 상이하게 진행될 수 있으며, 학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경 될 수 있다는 점 숙지 부탁드립니다.</li>
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
    </div>  

</div>
<!-- End Container -->

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

    {{-- 수강신청 동의 --}}
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/m/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
            location.href = url;
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