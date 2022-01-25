@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100%;
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
        .sky {position:fixed; top:200px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}

        .evt00 {background:#0a0a0a}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/01/2515_top_bg.jpg) no-repeat center top;}

        .evt_01 {background:#fff6ed;}

        .evt_03 {background:url(https://static.willbes.net/public/images/promotion/2022/01/2515_03_bg.jpg) no-repeat center top;}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2467" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/01/2515_sky1.png" alt="기프티콘 받자"/></a>
            <a href="javascript:alert('Coming Soon!')"><img src="https://static.willbes.net/public/images/promotion/2022/01/2515_sky2.png" alt="즉시 할인"/></a>          
        </div>

        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2515_top.jpg"  alt="소문내고 강의할인받자" />            
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2515_01.jpg"  alt="설문 조사" />            
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2515_02.jpg"  alt="열공지원 선물" />
                <a href="https://police.willbes.net/lecture/index/cate/3001/pattern/only?search_order=course&school_year=2022" target="_blank" title="단강좌 신청 바로가기" style="position: absolute;left: 15.21%;top: 40.82%;width: 25.21%;height: 5.35%;z-index: 2;"></a>
                <a href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1004&school_year=&prod_name=22%EB%85%84+1%EC%9B%94" target="_blank" title="기본종합반 신청 바로가기" style="position: absolute;left: 15.44%;top: 65.45%;width: 20.01%;height: 4.35%;z-index: 2;"></a>
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/2446#lec04" target="_blank" title="문제풀이 종합반 신청 바로가기" style="position: absolute;left: 36.24%;top: 65.45%;width: 23.31%;height: 4.35%;z-index: 2;"></a>
            </div>                    
        </div>  

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2515_03.jpg"  alt="이벤트 방법" />
                <a href="javascript:void(0)" onclick="giveCheck();" title="쿠폰받기" style="position: absolute;left: 26.91%;top: 57.62%;width: 45.71%;height: 6.25%;z-index: 2;"></a>
                <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운받기" style="position: absolute;left: 26.91%;top: 82.32%;width: 45.71%;height: 6.25%;z-index: 2;"></a>
            </div>       
        </div>              
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'Y'))
        @endif        
    </div>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            easing: 'ease-out-back',
            duration: 1000
        });
    </script>

    <script type="text/javascript">
        $regi_form = $('#regi_form');

        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params) === false)
                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params['give_type']}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params['comment_chk_yn']}}&arr_give_idx_chk={{$arr_promotion_params['arr_give_idx_chk']}}';
                ajaxSubmit($regi_form, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                        {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
                    }
                }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }
    </script>
    
@stop