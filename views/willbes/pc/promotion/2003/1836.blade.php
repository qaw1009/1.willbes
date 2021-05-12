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
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {background:#ececec url(https://static.willbes.net/public/images/promotion/2020/09/1836_top_bg.jpg) no-repeat center top;}

        .wb_01 {background:#fff url(https://static.willbes.net/public/images/promotion/2020/09/1836_01_bg.jpg) no-repeat center top;}

        .wb_03 {background:#EFEFEF;}           
        
    </style>
    
    <div class="p_re evtContent NGR" id="evtContainer">       

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1836_top.jpg" alt="지방직 7급 모의고사 패키지"/>            
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1836_01.jpg" alt="동형모의고사"/>           
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1836_02.jpg" alt="교수진"/>           
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1836_03.jpg" alt="수강신청" usemap="#Map1836a" border="0"/>
            <map name="Map1836a" id="Map1836a">
                <area shape="rect" coords="671,617,935,692" href="https://pass.willbes.net/package/show/cate/3020/pack/648001/prod-code/172449" target="_blank" />
            </map>            
        </div> 

    </div> 
    <!-- End Container -->
    <script type="text/javascript"> 

        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3024/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            @if(empty($arr_promotion_params['edate']) === false)
                dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
            @endif
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop