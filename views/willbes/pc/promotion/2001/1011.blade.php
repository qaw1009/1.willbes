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
            position:relative;
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_cts01 {background:#0b53af url(http://file3.willbes.net/new_cop/2018/12/EV181228_p_01_bg.jpg) no-repeat center top;}
        .wb_cts01 .wb_popWrap {width:1210px; margin:0 auto; position:relative}

        .wb_cts01 .illust {position:absolute; width:1210px; margin:0 auto; top:100px; animation:only 2s ease-in 0s infinite; z-index:11}
        @@keyframes only{
             0%{top:340px}
             50%{top:360px; opacity:1}
             100%{top:340px}
         }

        .wb_cts02 {background:#0b0b0b;}

        .wb_cts03 {background:#0b0b0b; padding-bottom:118px;}
        .wb_cts03 ul{width:1210px; margin:0 auto}
        .wb_cts03 li {display:inline; width:40%; text-align:center;margin:0 auto;}
        .wb_cts03 ul:after {content:""; display:block; clear:both}

        .wb_cts04 {background:#fff;}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_cts01" >
            <div class="wb_popWrap">
                <div class="illust">
                    <img src="http://file3.willbes.net/new_cop/2018/09/EV180905_p_illust.png"  alt="" />
                </div>
                <img src="http://file3.willbes.net/new_cop/2018/12/EV181228_p_01.jpg"  alt="" />
            </div>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_cop/2018/12/EV181228_p_02.png"  alt="" />
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <ul>
                <li><a href="javascript:doEvent2()"><img src="http://file3.willbes.net/new_cop/2018/12/EV181228_p_02_btn2.gif"  alt="" /></a></li>
            </ul>
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="http://file3.willbes.net/new_cop/2018/12/EV181228_p_04.jpg"  alt="" />
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        function doEvent1() {
            /*if("<c:out value='${userInfo.USER_ID}' />" == "") {
                alert("로그인을 해주세요.");
                return;
            }*/

            var url = 'https://www.local.willbes.net/home/html/event_onCop181228_p_pop1' ;
            window.open(url,'gosi_event', 'scrollbars=yes,toolbar=no,resizable=yes,width=500,height=850');
        }

        function doEvent2() {
            var url = 'https://www.local.willbes.net/home/html/event_onCop181228_p_pop2' ;
            window.open(url,'gosi_event', 'scrollbars=yes,toolbar=no,resizable=yes,width=500,height=850');
        }
    </script>

    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
            /*e.preventDefault(); */
        });
    </script>
@stop