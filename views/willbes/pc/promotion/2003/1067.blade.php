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
    .wb_top {background:#1e1e1e url(http://file3.willbes.net/new_gosi/2018/06/EV180626_c1_bg.jpg) no-repeat center top; position:relative; }
    .wb_cts01 {background:#fff;}
    .wb_cts01 .youtube {width:800px; margin:50px auto 0}
    .wb_cts02 {background:#f0efef;}
    .wb_cts03 {background:#ccbba2 url(http://file3.willbes.net/new_gosi/2018/06/EV180626_c6_bg.jpg) repeat;}
    .skybanner {
        position:fixed;
        top:200px;
        right:0;
        width:259px;
        animation:upDown 1s infinite;
        -webkit-animation:upDown 1s infinite;
        z-index:10;
    }
    @@keyframes upDown{
         from{margin-top:0}
         60%{margin-top:-30px}
         to{margin-top:0}
     }
    @@-webkit-keyframes upDown{
         from{margin-top:0}
         60%{margin-top:-30px}
         to{margin-top:0}
     }
</style>
@php
    $goSubmit = (date('YmdHis') >= '20190418140000') ? 'doEvent(); return false;' : 'javascript:alert("4.18(목) 14시부터 접수합니다.");';
@endphp

<div class="p_re evtContent NGR" id="evtContainer">
    <div class="skybanner">
        <div><a href="#event"><img src="http://file3.willbes.net/new_gosi/2018/06/EV180626_sky.png" title="첨삭지도반" ></a></div>
    </div>

    <div class="evtCtnsBox wb_top" >
        <img src="http://file3.willbes.net/new_gosi/2018/06/EV180626_c1.png" title="윌비스 매직아이 김신주 영어"  />
    </div><!--WB_top//-->

    <div class="evtCtnsBox wb_cts01" >
        <!--div class="youtube"><iframe width="800" height="450" src="https://www.youtube.com/embed/8KBfy1EXc0o" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div-->
        <img src="http://file3.willbes.net/new_gosi/2018/06/EV180626_c2.jpg" title="윌비스 빠른 합격을 위한 매직아이 영어"  />
        <img src="http://file3.willbes.net/new_gosi/2018/06/EV180626_c3.jpg" title=""  />
    </div><!--wb_cts01//-->

    <div class="evtCtnsBox wb_cts02" >
        <img src="http://file3.willbes.net/new_gosi/2018/06/EV180626_c4.jpg" title="윌비스 실전에 강한 매직아이 영어"  />
        <img src="http://file3.willbes.net/new_gosi/2018/06/EV180626_c5.jpg" title=""  />
    </div><!--wb_cts02//-->

    <div class="evtCtnsBox wb_cts03" id="event">
        <img src="http://file3.willbes.net/new_gosi/2018/06/EV180626_c6.jpg" title="예약 접수" usemap="#Map1067" border="0" />
        <map name="Map1067" id="Map1067">
            <area shape="rect" coords="664,674,938,777" href="#" onclick="{{ $goSubmit }}" />
        </map>
    </div><!--wb_cts03//-->

</div>
<!-- End Container -->

<script type="text/javascript">
    function doEvent() {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.', '') !!}

        var url = "{{ site_url('/promotion/popup/' . $arr_base['promotion_code']) }}" ;
        window.open(url,'event', 'scrollbars=no,toolbar=no,resizable=yes,width=400,height=300,top=100,left=100');
    }
</script>
@stop