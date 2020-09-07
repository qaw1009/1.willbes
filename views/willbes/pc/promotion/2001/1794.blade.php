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
    .evtContent span {vertical-align:auto}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
    /*****************************************************************/ 
    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/09/1794_top_bg.jpg) no-repeat center top;}
    .evt00 {background:#0a0a0a}
    .evt01 {background:#f1f1f1;}
    .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/09/1794_02_bg.jpg) no-repeat center top;}
    .evt03 {background:#898989}
    .evt04 {background:#202020; padding-bottom:150px}
    /* 슬라이드배너 */
    .slide_con {position:relative; width:971px; margin:0 auto}	
    .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
    .slide_con p a {cursor:pointer}
    .slide_con p.leftBtn {left:-100px; top:46%; width:67px; height:67px;}
    .slide_con p.rightBtn {right:-100px;top:46%; width:67px; height:67px;}
    
    .evt05 {background:#fff;}
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}" readonly="readonly"/>
        <input type="hidden" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명" {{(sess_data('is_login') === true) ? 'readonly="readonly"' : ''}}/>
        <input type="hidden" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" maxlength="11" readonly="readonly">
        <input type="hidden" name="register_type" value="promotion" readonly="readonly"/>

        @foreach($arr_base['register_list'] as $key => $val)
            @if(empty($val['RegisterExpireStatus']) === false && $val['RegisterExpireStatus'] == 'Y')
                <input type="hidden" name="register_chk[]" id="campus{{$key}}" value="{{$val['ErIdx']}}" readonly="readonly"/>
            @endif
        @endforeach
    </form>

    <div class="evtContent NGR" id="evtContainer">  
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1794_00.jpg" alt="대한민국 경찰학원 1위">
        </div> 

        <div class="evtCtnsBox evt_top">  
            <div><img src="https://static.willbes.net/public/images/promotion/2020/09/1794_top.jpg" alt="코로나 19 극복 긴급지원프로젝트"></div>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1794_01.jpg" alt="강사진">
        </div>  

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1794_02.jpg" alt="경찰영어 지원 프로젝트">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1794_03.jpg" alt="김폴영어">
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1794_04.jpg" alt="적중">
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1794_04_01.jpg" alt="적중" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1794_04_02.jpg" alt="적중" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1794_04_03.jpg" alt="적중" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1794_04_04.jpg" alt="적중" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/1794_04_05.jpg" alt="적중" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2020/09/1794_arrow_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2020/09/1794_arrow_next.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1794_05.jpg" alt="코로나19 극복 이벤트" usemap="#Map1794" border="0">
            <map name="Map1794">
                <area shape="rect" coords="255,1105,864,1200" href="javascript:fn_submit();" alt="할인쿠폰 받기">
                <area shape="rect" coords="363,1561,749,1609" href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="이벤트이미지받운받기">
            </map>
        </div> 
        
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $regi_form = $('#regi_form');

        {{--무료 강좌발급--}}
        function fn_submit() {
            var _url = '{!! front_url('/event/registerStore') !!}?comment_chk_yn={{$arr_promotion_params["comment_chk_yn"]}}&event_code={{$data["ElIdx"]}}';

            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert('강좌가 지급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:1120,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
                });
            
                $("#imgBannerLeft3").click(function (){
                    slidesImg3.goToPrevSlide();
                });
            
                $("#imgBannerRight3").click(function (){
                    slidesImg3.goToNextSlide();
                });
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop