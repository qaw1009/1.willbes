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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

        /************************************************************/

        .evt00 {background:#0a0a0a}

        .sky {position:fixed; top:225px;right:10px; width:120px; z-index:2;}
        .sky a{display:block; margin-bottom:15px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/07/2284_top_bg.jpg) no-repeat center top;}      

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/07/2284_01_bg.jpg) no-repeat center top;} 
        
        .evt10 {background:#3b3b3b}

        .evt11 {padding-bottom:100px;}
        .evtCtnsBox .title {color:#2a2a2a; font-size:30px; margin:50px 0 50px;}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <input type="hidden" name="comment_ccd" value="713002">
    </form>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>   

        <div class="sky">
            <a href="#evt_01"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2284_sky01.png" alt="학습팁" >
            </a>  
            <a href="#evt_02"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2284_sky02.png" alt="단강좌" >
            </a>
        </div>   

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2284_top.jpg"  alt="경찰헌법"/>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2284_01.jpg"  alt="헌법이란"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2284_02.jpg"  alt="헌법을 이해하기 힘든 이유"/>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2284_03.jpg"  alt="포괄적이고 추상적"/>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2284_04.jpg"  alt="비용이 많이 든다"/>
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2284_05.jpg"  alt="헌법의 방대한 양"/>
        </div>

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2284_06.jpg"  alt="헌법의 틀"/>
        </div>

        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2284_07.jpg"  alt="전문간의 도움"/>
        </div>

        <div class="evtCtnsBox evt08">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2284_08.jpg"  alt="헌법 학습"/>
        </div>

        <div class="evtCtnsBox evt09" id="evt_01">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2284_09.jpg"  alt="학습 팁"/>
                <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51146?subject_idx=1049&subject_name=%ED%97%8C%EB%B2%95%2822%EB%85%84%EB%8C%80%EB%B9%84%29" target="_blank" title="키헌법" style="position: absolute;left: 27.32%;top: 61.12%;width: 21.79%;height: 6.07%;z-index: 2;"></a>
                <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51259?subject_idx=1049&subject_name=%ED%97%8C%EB%B2%95%2822%EB%85%84%EB%8C%80%EB%B9%84%29" target="_blank" title="필헌법" style="position: absolute;left: 51.32%;top: 61.12%;width: 21.79%;height: 6.07%;z-index: 2;"></a>
            </div>    
        </div>

        <div class="evtCtnsBox evt10" id="evt_02">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2284_10.jpg"  alt="할인쿠폰받기"/>
                <a href="javascript:void(0);" title="" style="position: absolute;left: 50.32%;top: 63.02%;width: 26.79%;height: 8.07%;z-index: 2;"></a>
            </div>    
        </div>     

        <div class="evtCtnsBox evt11">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2284_11.jpg"  alt="강좌"/>
            <div class="title NSK-Black">경찰 헌법 강의 신청 ></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif  
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script>
    
        $regi_form = $('#regi_form');

        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용해주세요.','Y') !!}

            @if(empty($arr_promotion_params) === false)

                @if(strtotime(date('YmdHi')) >= strtotime($arr_promotion_params['edate']))
                    alert('이벤트가 종료되었습니다.');
                    return;
                @endif

                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params["comment_chk_yn"]}}';
                ajaxSubmit($regi_form, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    }
                }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }
       
      </script> 
      
{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop   