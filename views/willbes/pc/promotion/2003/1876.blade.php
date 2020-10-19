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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; margin:0 auto;}

        /************************************************************/
        .wb_top {background:#3F49F6 url(https://static.willbes.net/public/images/promotion/2020/10/1876_top_bg.jpg) no-repeat center top;}

        .wb_01 {background:#fff url(https://static.willbes.net/public/images/promotion/2020/10/1876_01_bg.jpg) no-repeat center top;}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1876_top.jpg" alt="렛츠 피셋"/>            
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1876_01.jpg" alt="이벤트" usemap="#Map1876_reply" border="0"/>
            <map name="Map1876_reply" id="Map1876_reply">
                <area shape="rect" coords="352,1592,769,1650" href="javascript:pullOpen()" alt="댓글 이벤트 설문조사 참여" />
            </map>  
        </div>        

        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif    
        
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        function pullOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            @if(empty($arr_promotion_params['SsIdx']) === true)
            alert('설문정보가 없습니다.');
            return;
            @else
            var url = "{{front_url('/eventSurvey/index/' . $arr_promotion_params['SsIdx'])}}";
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }
       
    </script>
    
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop