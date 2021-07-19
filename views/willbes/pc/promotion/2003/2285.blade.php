@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            position:relative
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,1);}

        /************************************************************/
        .sky {position:fixed;top:225px;right:15px;z-index:200;}
        .sky a {display:block;margin-top:10px;}
 
        .evtTop {background:#e5effb url(https://static.willbes.net/public/images/promotion/2021/07/2285_top_bg.jpg) no-repeat center top;}
        .evtTop .bigBtn {display:block; font-size:24px; color:#fff; background:#1f2059; width:700px; margin:20px auto 30px; padding:20px 0; border-radius:40px}
        .evtTop .sBtn {display:block; font-size:16px; color:#fff; background:#222; width:200px; margin:0 auto; padding:10px 0;}

        .evt02 {background:#e5effb url(https://static.willbes.net/public/images/promotion/2021/07/2285_02_bg.jpg) repeat-x center top;}
        .evt04 {background:#354251}

    </style>


    <div class="evtContent NSK" id="evtContainer">
        <div class="sky">
            <a href="javascript:certOpen();">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2285_sky.png" alt="타사 수강증 인증">
            </a>
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2285_top.jpg" alt="환승 이벤트" />          
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2285_01.jpg" alt="" />
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2285_02.jpg" alt="" />
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2285_03.jpg" alt="" />
        </div>

        <div class="evtCtnsBox evt04">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2285_04.jpg" alt="" />
                <a href="https://job.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/184027" target="_blank" title="환승인증 후 수강신청" style="position: absolute; left: 55.98%; top: 20.39%; width: 21.43%; height: 4.38%; z-index: 2;"></a>
                <a href="https://job.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/184028" target="_blank" title="환승인증 후 수강신청" style="position: absolute; left: 55.98%; top: 37.65%; width: 21.43%; height: 4.38%; z-index: 2;"></a>
                <a href="https://job.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/184029" target="_blank" title="체험팩 신청하기" style="position: absolute; left: 18.3%; top: 79.8%; width: 63.39%; height: 6.14%; z-index: 2;"></a>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script>    
        /* 팝업창 */ 
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }
    </script>


@stop