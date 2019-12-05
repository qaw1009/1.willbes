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

        .wb_top {background:#feff04 url(https://static.willbes.net/public/images/promotion/2019/12/1468_top_bg.jpg) no-repeat center top;}

        .wb_cts01{background:#eef9ff;}    

        .wb_cts02 {background:#2babdc;position:relative;}   
        .gif_area{position:absolute;left:37.4%;top:29.9%;}   

        .wb_cts03 {background:#fff;}

    </style>
    <div class="p_re evtContent NGR" id="evtContainer">        

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1468_top.jpg" alt="최우영 통신/전기직 합격패키지"  >                  
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1468_01.jpg" alt="꿈의 직업"  > 
        </div>    

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1468_02.jpg" alt="안정적인 합격으로 도약"  > 
            <div class="gif_area">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1468_02s.gif" alt="최우영 강의"  > 
            </div>
        </div>    

        <div class="evtCtnsBox wb_cts03"> 
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1468_03.jpg" alt="수강신청" usemap="#Map" border="0"  >
            <map name="Map" id="Map">
                <area shape="rect" coords="778,409,1003,547" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/158470" target="_blank" />
                <area shape="rect" coords="778,636,1004,777" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/158470" target="_blank" />
            </map> 
        </div>       
                 
    </div>
    <!-- End Container -->

    <script type="text/javascript">
       
    </script>

@stop