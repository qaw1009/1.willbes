@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/10/2793_top_bg.jpg) no-repeat center top; height:1553px; overflow:hidden;}
        .wb_top .topimg {display:block; position: absolute; left:50%; margin-left:-395px; width:790px; top:150px; z-index: 2; position:relative}
        .wb_top .topimg a {border:1px solid #000}
        .wb_top .no7 {position: absolute; width:780px; left:50%; margin-left:-385px; top:700px; z-index: 1;}
        .wb_01 {background:#477e82}
        .wb_02 {background:#f2f2f2; font-size:16px; padding:50px; line-height:1.5}
        .wb_02 ul {width:980px; margin:0 auto; text-align:left}
        .wb_02 li {margin-bottom:10px}
        .wb_02 li span {color:red}
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top">
            <span class="topimg">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2793_top01.png" alt="검찰직 체험 팩" data-aos="fade-up"/>
                <a href="javascript:void(0);" onclick="showPopup();" title="설문 참여"  style="position: absolute; left: 0%; top: 81.53%; width: 98.23%; height: 12.09%; z-index: 2;"></a>
            </span>
            <span class="no7"><img src="https://static.willbes.net/public/images/promotion/2022/10/2793_top02.png" alt="7" data-aos="fade-up" /></span>
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2793_01.jpg" alt="수강후기 작성후 플래너 받기" data-aos="fade-up"/>
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <ul>
                <li>※ 체험팩 수강 후 수강후기를 작성해주셔야 하며, 작성 완료 후 <span>[검찰직 홈페이지] [내강의실]의 [검찰팀 스터디플래너] 강의의 [교재구매]를 통해 신청</span>하실 수 있습니다.</li>
                <li>※ 회원정보 내 정보로 스터디플래너가 발송되며 배송비는 본인부담입니다.</li>
                <li>※ 배송정보 오류 시 재발송되지 않으니 회원정보를 확인하여 주시기 바랍니다.</li>
                <li>※ 플래너 증정 이벤트는 한정수량으로 재고 상황에 따라 조기 종료 될 수 있습니다.</li>
            </ul>
        </div>

        <div>
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif 
        </div>
    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });

        function showPopup(){
            @if(empty($arr_promotion_params['SsIdx']) === true)
            alert('설문정보가 없습니다.');
            return;
            @else
                var url = "{{front_url('/eventSurvey/index/' . $arr_promotion_params['SsIdx'])}}";
                window.open(url,'survey_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=800,height=700');
            @endif
        }
    </script>

    

@stop