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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/  

        .evt00 {background:#0a0a0a}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/03/1139_top_bg.jpg) no-repeat center top;}
        .wb_top span.sp01 { position:absolute; left:50%; top:30px; margin-left:-560px; animation: sp01 1.5s linear infinite;}
        @@keyframes sp01{
		    from{transform:scale(1)}50%{transform:scale(0.9)}to{transform:scale(1)}
        }       

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2020/03/1139_01_bg.jpg) no-repeat center top;}

        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2021/10/1139_02_bg.jpg) no-repeat center top;} 

        .skybanner {position:fixed;top:325px;right:10px;z-index:1;}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="skybanner" id="QuickMenu">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/1139_sky.png" alt="스카이베너 빠르게가기" usemap="#Map1139" border="0" >
            <map name="Map1139" id="Map1139">
                <area shape="rect" coords="4,78,108,146" href="#go_01" />
                <area shape="rect" coords="0,153,108,217" href="#go_02" />
                <area shape="rect" coords="1,224,108,288" href="#go_03" />
            </map>
        </div>

        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1864_first.jpg"  alt="경찰학원부분 1위" />
        </div>

        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1139_top.jpg" alt="합격환승 이벤트"/>
            <span class="sp01">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1139_top_img.png">                    
            </span>
        </div>       

        <div class="evtCtnsBox wb_cts01" id="go_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1139_01.jpg" alt="합격"/>
        </div>

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <div class="wrap" id="go_02">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/1139_02.jpg" alt="타학원 수강이력 인증"/>
                <a href="javascript:certOpen();" title="타학원 수강 인증" style="position: absolute;left: 30.13%;top: 82.56%;width: 38.15%;height: 7.89%;z-index: 2;"></a>
            </div>
            <div>
            <img src="https://static.willbes.net/public/images/promotion/2021/10/1139_03.jpg" alt="이벤트 참여" usemap="#Map1139a" border="0" id="go_03"/>
    </div>
        </div>      
              
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
            AOS.init();
        } ); 

        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }
    </script>
    
@stop