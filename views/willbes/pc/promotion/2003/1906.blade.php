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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .evtTop {background: url("https://static.willbes.net/public/images/promotion/2020/11/1906_top_bg.jpg") center top no-repeat}
        .evt01  {background: url("https://static.willbes.net/public/images/promotion/2020/11/1906_01_bg.jpg") center top no-repeat}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">    
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1906_top.jpg" alt="유튜브 구독 이벤트" usemap="#Map1906_01" border="0" />
            <map name="Map1906_01" id="Map1906_01">
                <area shape="rect" coords="67,1553,257,1615" href="https://pass.willbes.net/lecture/index/cate/3103/pattern/free" target="_blank" alt="강의보기" > 
                <area shape="rect" coords="330,1555,522,1614" href="https://pass.willbes.net/lecture/index/cate/3103/pattern/free" target="_blank" alt="강의보기">
                <area shape="rect" coords="597,1553,785,1614" href="#none" onclick="javascript:alert('11월 중순 업로드 예정');">
                <area shape="rect" coords="863,1555,1052,1615" href="#none" onclick="javascript:alert('12월 업로드 예정');">
            </map>  
        </div>       

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1906_01.jpg" alt="이벤트 안내" usemap="#Map1906_02" border="0" />
            <map name="Map1906_02">
              <area shape="rect" coords="213,890,496,939" href="https://www.youtube.com/channel/UCM69uucXDSE66-8NDcyvIHA" target="_blank" alt="채널구독">
              <area shape="rect" coords="627,893,906,937" href="javascript:pullOpen()" alt="설문조사">
              <area shape="rect" coords="215,1083,495,1130" href="javascript:popup();" alt="구독인증">
              <area shape="rect" coords="625,1084,905,1131" href="#Map1906_01">
            </map>  
        </div>  
    </div>
    <!-- End Container -->

    <script>
        function pullOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            @if(empty($arr_promotion_params['SsIdx']) === true)
                alert('설문을 찾을 수 없습니다.');
                return;
            @else
                var url = "{{front_url('/eventSurvey/index/' . $arr_promotion_params['SsIdx'])}}";
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }

        function popup(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            @if($survey_count < 1)
                alert('설문조사 참여 후 인증이 가능합니다.');
                return;
            @elseif(empty($arr_promotion_params['cert']) === true)
                alert('인증 정보를 찾을 수 없습니다.');
                return;
            @else
                var url = "{{ site_url('/pass/promotion/popup/' . $arr_base['promotion_code']) .'?cert='. $arr_promotion_params['cert'] }}";
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=868,height=630');
            @endif
        }
    </script>

@stop