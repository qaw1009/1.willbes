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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            bottom:20px;
            right:10px;
            z-index:1;
        }

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2020/09/1782_top_bg.jpg) no-repeat center top;}	
        .wb_cts01 .wb_popWrap {width:1120px; margin:0 auto; position:relative}

        .wb_cts01 .illust {position:absolute; width:1120px; margin:0 auto; animation:only 2s ease-in 0s infinite; z-index:11}
        @@keyframes only{
            0%{top:360px}
            50%{top:380px; opacity:1}
            100%{top:360px}
        }

        .wb_cts02 {background:#fff;}

        .wb_cts03 {background:#041e45; padding-bottom:118px;}
        .wb_cts03 ul{width:1120px; margin:0 auto}
        .wb_cts03 li {display:inline; width:40%; text-align:center;margin:0 auto;}
        .wb_cts03 ul:after {content:""; display:block; clear:both}		

        .wb_cts04 {background:#ececec}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_cts01" >
            <div class="wb_popWrap">
                <div class="illust">
                    <img src="https://static.willbes.net/public/images/promotion/2020/09/1782_top_img.png"  alt="" />
                </div>      
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1782_top.jpg"  alt="" />
            </div>          
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1782_01.jpg"  alt="" usemap="#Map1424B" border="0" />
            <map name="Map1424B" id="Map1424B">
                <area shape="rect" coords="252,1559,536,1619" href="javascript:certOpen()" alt="필기합격인증하기" />
                <area shape="rect" coords="582,1559,869,1619" href="javascript:gradOpen()" alt="나의성적입력하기" />
                <area shape="rect" coords="251,1649,538,1713" href="javascript:doEvent3()" alt="나의위치파악" />
                <area shape="rect" coords="581,1650,873,1712" href="javascript:doEvent2()" alt="실시간 참여현황" />              
            </map>    
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1782_02.jpg"  alt="" usemap="#Map1662A" border="0" />
            <map name="Map1662A" id="Map1662A">
                <area shape="rect" coords="320,940,801,1017" href="https://police.willbes.net/promotion/index/cate/3001/code/1747" target="_blank" alt="합격풀케어 서비스" />
            </map>  
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        function certOpen() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($cert_apply) === false)
                alert("이미 인증이 완료된 상태입니다.");return;
            @endif
            @if(empty($arr_promotion_params) === false)
                var url = '{{ site_url('/certApply/index/page/'.$arr_promotion_params['page'].'/cert/'.$arr_promotion_params['cert']) }}';
                window.open(url,'cert_popup', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=800,height=700');
            @endif
        }

        function gradOpen() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            var url = "{{ site_url('/predict/createGradeMember') }}";
            url += "?predict={{ $arr_promotion_params['PredictIdx'] }}&cert={{ $arr_promotion_params['cert'] }}";
            window.open(url,'popup1', 'scrollbars=yes,toolbar=no,resizable=yes,width=700,height=850');
        }
        
        function doEvent2() {
            var url = "{{ site_url('/predict/predictInfo') }}";
            url += "?predict={{ $arr_promotion_params['PredictIdx'] }}&cert={{ $arr_promotion_params['cert'] }}";
            window.open(url,'popup2', 'scrollbars=yes,toolbar=no,resizable=yes,width=700,height=910');
        }

        function doEvent3() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            var url = "{{ site_url('/predict/predictMyInfo') }}";
            url += "?predict={{ $arr_promotion_params['PredictIdx'] }}&cert={{ $arr_promotion_params['cert'] }}";
            window.open(url,'popup3', 'scrollbars=yes,toolbar=no,resizable=yes,width=700,height=850');
        }
    </script> 
   
@stop