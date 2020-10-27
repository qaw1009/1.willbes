@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')  
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .evtTop {background:#FEDB4D url(https://static.willbes.net/public/images/promotion/2020/10/1890_top_bg.jpg) no-repeat center top}

        .evt01 {background:#29304A;position:relative;}
        .youtube1 {position:absolute; top:436px; left:50%;z-index:1;margin-left:-355px}
        .youtube1 iframe {width:710px; height:410px}
        .youtube2 {position:absolute; bottom:236px; left:50%;z-index:1;margin-left:-355px}
        .youtube2 iframe {width:710px; height:410px}

        .evt02 {background:#A78265;}

        .evt03 {background:#fff;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1890_top.jpg" alt="혜택 받기" usemap="#Map1890a" border="0" >
            <map name="Map1890a" id="Map1890a">
                <area shape="rect" coords="285,1484,834,1556" href="#certification" />
            </map>             
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1890_01.jpg" alt="대표 유튜브" >   
            <div class="youtube1">
                <iframe src="https://www.youtube.com/embed/v8vHoj2Cpt8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtube2">
                <iframe src="https://www.youtube.com/embed/C-HvQpui8xI?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>          
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1890_02.jpg" alt="혜택 바로 제공" >             
        </div>

        <div class="evtCtnsBox evt03" id="certification">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1890_03.jpg" alt="인증 이벤트" usemap="#Map1890b" border="0" >
            <map name="Map1890b" id="Map1890b">
                <area shape="rect" coords="281,1422,839,1499" href="javascript:certOpen();" />
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript"> 

     /* 팝업창 */ 
     function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }
        
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

    <!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
    <script language='javascript'>
        var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
        var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
    </script>
    <noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
    <!-- AceCounter Log Gathering Script End -->
@stop