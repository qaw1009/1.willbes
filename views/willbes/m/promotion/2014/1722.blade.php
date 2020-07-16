@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtTop {position:relative}

    .evt01 {}

    .evt02 { text-align:center;}
    .evt02 .dday {font-size:22px;padding:20px 0;}
    .evt02 .dday span {color:#a0774e; box-shadow:inset 0 -25px 0 rgba(0,0,0,0.1);}

    .evt03 {background:#252525; padding-bottom:80px}      

    .evt04 {margin-top:80px}
    .evt04 div {font-size:16px; font-weight:600; margin-top:20px}

    .video-container {position:relative; padding-bottom:56.25%; padding-top:30px; height:0; overflow: hidden;}
    .video-container iframe,
    .video-container object,
    .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    .evtCtnsBox .btn {width:90%; margin:30px auto 0}
    .evtCtnsBox .btn a {display:block; color:#282f4c; background:#fff; border-radius:30px; font-size:20px; padding:15px 0; border:1px solid #333;
        box-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc, 0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc, 0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3)
    }
    .evtCtnsBox .btn a:hover {color:#fff; background:#282f4c;}


    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {        
        .evt02 .dday strong {font-size:32px}
        .evt02 .dday br {display:none} 
        .evt03 .btn a {font-size:30px;}        
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {       
        .evt03 .btn a br {display:none}
    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>

<div id="Container" class="Container NSK c_both">            
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_top.jpg" alt="이승기 PD" >        
    </div> 
    
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_01.jpg" alt="이시한 교수" >
    </div> 
    
    <div class="evtCtnsBox evt02">
        <div class="dday NSK-Thin">
            <strong class="NSK-Black">사전예약 마감까지 <br><span id="ddayCountText"></span> 남았습니다.</strong>
        </div> 
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_02.jpg" alt="" >       
    </div>

    <div class="evtCtnsBox evt03">
        <div class="video-container-box">
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/CsqieWAVZi4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="btn NSK-Black"><a href="javascript:goLecture();">지금, 사전 예약하고<br> 끝장 혜택받기 ></a></div>
    </div> 

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_04.jpg" alt="" ><br>
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_05.jpg" alt="" ><br>
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_06.jpg" alt="" ><br>
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_07.jpg" alt="" ><br>  
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1722m_08.jpg" alt="" > 
        <div>소문내기 이벤트는 PC버전에서 참여 가능합니다.</div>
        <div class="btn NSK-Black"><a href="https://njob.willbes.net/promotion/index/cate/3114/code/1722" target="_blank">소문내기 이벤트 참여하기 ></a></div>       
    </div>  

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1722_09.jpg" alt="" >
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
                $('#'+ele_id).html(hour_left + ':' + minute_left + ':' + second_left);
                $('#ddayCountDayText').html(date_left + '일 ');

                setTimeout(function() {
                    dDayCountDownText(end_date, ele_id);
                }, 1000);
            } else {
                $('#'+ele_id).hide();
            }
        }

        function goLecture() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            location.href = 'https://njob.willbes.net/lecture/show/cate/3114/pattern/only/prod-code/169144';
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