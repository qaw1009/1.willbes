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

    .evt03 a {position: absolute; width: 41.94%; height: 3.88%; z-index: 2;}
    .evt03 a.a01 {left: 51.81%; top: 8.4%;}
    .evt03 a.a02 {left: 51.81%; top: 22.08%;}
    .evt03 a.a03 {left: 51.81%; top: 35.6%;}
    .evt03 a.a04 {left: 51.81%; top: 49.32%;}
    .evt03 a.a05 {left: 51.81%; top: 62.68%;}
    .evt03 a.a06 {left: 51.81%; top: 76.48%;}
    .evt03 a.a07 {left: 51.81%; top: 90%;}

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
        <img src="https://static.willbes.net/public/images/promotion/2020/10/1842m_top.jpg" alt="윌비스 티패스" >
    </div>

    <div class="evtCtnsBox evt00 ddayArea">
        <div class="dday NSK-Thin">
            <strong class="NSK-Black"> 지금 T-PASS 구매하면 추가 10%할인 쿠폰 지급! <br><span id="ddayCountText"></span> 남았습니다.</strong>
        </div>     
    </div>      

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/10/1842m_top2.jpg" alt="고득점 완성" >
    </div> 
    
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/10/1842m_step.jpg" alt="전략적 계획, 효율적 학습" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/10/1842m_pass.jpg" alt="고득점 합격" >
    </div> 

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2020/10/1842m_apply.jpg" alt="교수진">
        <a title="국어 기미진" href="https://pass.willbes.net/promotion/index/cate/3019/code/1623" target="_blank" class="a01"></a>
        <a title="영어 한덕현" href="https://pass.willbes.net/promotion/index/cate/3019/code/1614" target="_blank" class="a02"></a>
        <a title="한국사 조민주" href="https://pass.willbes.net/promotion/index/cate/3019/code/1788" target="_blank" class="a03"></a>
        <a title="한국사 오태진" href="https://pass.willbes.net/promotion/index/cate/3019/code/1392" target="_blank" class="a04"></a>
        <a title="행정법 이석준" href="https://pass.willbes.net/promotion/index/cate/3019/code/1792" target="_blank" class="a05"></a>
        <a title="행정법/헌법 황남기" href="https://pass.willbes.net/promotion/index/cate/3019/code/1077" target="_blank" class="a06"></a>
        <a title="행정학 김덕관" href="https://pass.willbes.net/promotion/index/cate/3019/code/1080" target="_blank" class="a07"></a>
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

</script>

<!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
<script language='javascript'>
    var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
    var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
</script>
<noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
<!-- AceCounter Log Gathering Script End -->

@stop