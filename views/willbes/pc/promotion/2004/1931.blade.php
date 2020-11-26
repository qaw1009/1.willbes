@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/11/1931_top_bg.jpg) center top no-repeat; height:978px}  
        .wb_top span {position:absolute; left:50%; z-index:10}
        .wb_top span.img01 {margin-left:-107px; top:524px; animation:iptimg1 1s ease-in;-webkit-animation:iptimg1 1s ease-in;}
        .wb_top span.img02 {margin-left:-103px; top:549px; animation:iptimg2 1s ease-in;-webkit-animation:iptimg2 1s ease-in;}
        .wb_top span.img03 {animation:iptimg3 1s ease-in; 1s;-webkit-animation:iptimg3 1s ease-in; margin-left:239px; top:247px;}
        @@keyframes iptimg1{
        from{margin-left:-200px; opacity: 0;}
        to{margin-left:-107px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
        from{margin-left:-200px; opacity: 0;}
        to{margin-left:-107px; opacity: 1;}
        }
        
        @@keyframes iptimg2{
        from{margin-left:100px; opacity: 0;}
        to{margin-left:-103px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg2{
        from{margin-left:100px; opacity: 0;}
        to{margin-left:-103px; opacity: 1;}
        }

        @@keyframes iptimg3{
            from{opacity: 0; margin-left:209px; top:277px;}
            to{opacity: 1;}
        }
        @@-webkit-keyframes iptimg3{
            from{opacity: 0; margin-left:209px; top:277px;}
            to{opacity: 1;}
        }

        .wb_01  {background:#f7f7f7}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">   
        <div class="evtCtnsBox wb_top">             
            <span class="img01"><img src="https://static.willbes.net/public/images/promotion/2020/11/1931_top_01.png" alt="" /> </span>
            <span class="img02"><img src="https://static.willbes.net/public/images/promotion/2020/11/1931_top_02.png" alt="" /> </span>
            <span class="img03"><img src="https://static.willbes.net/public/images/promotion/2020/11/1931_top_03.png" alt="" /> </span>
        </div>       

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1931_01.jpg" alt="이섬가 영어 끝장 문풀" />  
        </div>  
    </div>
    <!-- End Container -->

    <script>

    </script>

@stop