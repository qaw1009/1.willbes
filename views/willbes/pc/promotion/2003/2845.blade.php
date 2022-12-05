@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
    .evtContent { 
        position:relative;            
        width:100% !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }	
    .evtContent span {vertical-align:top}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}        
    .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /*****************************************************************/

    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/12/2845_top_bg.jpg) no-repeat center top;}

    .evt01 {background:#f4d956;}
    .evt01 span {position: absolute; top:-30px; left:50%; margin-left:-450px; z-index: 2;}
    .evt02 {background:#ebe4d1;}

    .evt03 {background:#f5f5f5;}

    .evt05 {background:#966c3c;}
    .evt07 {background:url(https://static.willbes.net/public/images/promotion/2022/12/2845_07_bg.jpg) no-repeat center top;}
    .evt08 {background:url(https://static.willbes.net/public/images/promotion/2022/12/2845_08_bg.jpg) no-repeat center top;}

    </style>

    <div class="evtContent NSK">

        <div class="evtCtnsBox evt_top" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2845_top.jpg" title="2024년 법원직 합격 대비 선행학습">
        </div>
        
        <div class="evtCtnsBox evt01">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2845_01.jpg" title="예비순환 + 1~3순환 전과목 온라인 수강">
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" target="_blank" title="수강신청" style="position: absolute; left: 55.09%; top: 53.21%; width: 23.13%; height: 30.36%; z-index: 2;"></a>
            </div>
            <span data-aos="fade-down"><img src="https://static.willbes.net/public/images/promotion/2022/12/2845_01_img.png"></span>
        </div>

        <div class="evtCtnsBox evt02 pb50" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2845_02.jpg" title="">
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2845_03.jpg" title="">
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2845_04.jpg" title="">
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2845_05.jpg" title="">
        </div>

        <div class="evtCtnsBox evt06" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2845_06.jpg" title="">
                <a href="http://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="합격수기 확인하기" style="position: absolute; left: 34.55%; top: 84.62%; width: 30.63%; height: 6.32%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt07" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2845_07.jpg" title="">
                <a href="javascript:void(0);" onclick="showPopup();" title="설문 참여"  style="position: absolute; left: 34.38%; top: 76%; width: 30.8%; height: 12.77%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt08">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2845_08.jpg" title="예비순환 + 1~3순환 전과목 온라인 수강">
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" target="_blank" title="수강신청" style="position: absolute; left: 26.16%; top: 78.42%; width: 47.32%; height: 10.58%; z-index: 2;"></a>
            </div>
        </div>

    </div>

    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
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