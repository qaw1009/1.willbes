@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {background:#f7f7f7}
        .wb_evt01 {background:#ffcd02;}  
    </style>    

    <div class="evtContent NSK" id="evtContainer">   
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1789_top.jpg" usemap="#Map1789" title="카톡 실시간 상담 오픈" border="0" />
            <map name="Map1789">
              <area shape="rect" coords="197,718,550,812" href="https://pf.kakao.com/_qAxoYC" target="_blank" alt="카톡 친구 추가하기">
              <area shape="rect" coords="571,717,921,810" href="https://accounts.kakao.com/login?continue=http%3A//pf.kakao.com/_kcZIu/chat" target="_blank" alt="바로 상담하기">
            </map>
        </div>

        <div class="evtCtnsBox wb_evt01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1789_01.jpg" title="카카오특 상담 이용안내" />            
        </div> 
    </div>
    <!-- End Container -->
@stop