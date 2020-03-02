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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/  
        .wb_top {background:#232325 url(https://static.willbes.net/public/images/promotion/2020/03/1139_top_bg.jpg) no-repeat center top;}
        .wb_top span.sp01 { position:absolute; left:50%; top:30px; margin-left:-560px; animation: sp01 1.5s linear infinite;}
        @@keyframes sp01{
		from{transform:scale(1)}50%{transform:scale(0.9)}to{transform:scale(1)}
        }

        .wb_cts01 {background:#2b2b2b url(https://static.willbes.net/public/images/promotion/2020/03/1139_01_bg.jpg) no-repeat center top;}

        .wb_cts02,.wb_cts03 {background:#242a1d url(https://static.willbes.net/public/images/promotion/2020/03/1139_02_bg.jpg) no-repeat center top;} 

        .skybanner {position:fixed;top:325px;right:0;z-index:1;}

    </style>

    <div class="evtContent" id="evtContainer">

        <div class="skybanner">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1139_sky.png" alt="스카이베너 빠르게가기" usemap="#Map1139" border="0" >
            <map name="Map1139" id="Map1139">
                <area shape="rect" coords="12,4,116,72" href="#go_top" />
                <area shape="rect" coords="10,81,118,145" href="#go_01" />
                <area shape="rect" coords="11,154,118,218" href="#go_02" />
                <area shape="rect" coords="10,224,118,289" href="#go_03" />
              <area shape="rect" coords="12,290,115,375" href="https://police.willbes.net/promotion/index/cate/3001/code/1556" target="_blank" alt="신광은경찰패스" />
            </map>
        </div>

        <div class="evtCtnsBox wb_top" id="go_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1139_top.jpg" alt="합격환승 이벤트"/>
            <span class="sp01">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1139_top_img.png">                    
            </span>
        </div>       

        <div class="evtCtnsBox wb_cts01" id="go_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1139_01.jpg" alt="합격"/>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1139_02.jpg" alt="타학원 수강이력 인증" usemap="#Map1139a" border="0" id="go_02"/>
            <map name="Map1139a" id="Map1139a">
                <area shape="rect" coords="337,923,766,1022" href="javascript:certOpen();" onfocus='this.blur()' alt="타학원 수강 인증">
            </map>
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1139_03.jpg" alt="이벤트 참여" usemap="#Map1139a" border="0" id="go_03"/>
        </div>      
              
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }
    </script>
    
@stop