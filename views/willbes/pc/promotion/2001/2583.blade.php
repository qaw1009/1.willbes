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
        /*.evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}*/

        /************************************************************/

        .evt00 {background:#0a0a0a}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/03/2583_top_bg.jpg) no-repeat center top;}

        .evt01 {padding-bottom:100px;}
        /*슬라이드*/
        .slide_con {width:930px; margin:0 auto; position:relative}
        .slide_con p {position:absolute; top:50%; margin-top:-45px; width:39px; height:97px; z-index:90}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-100px;}
        .slide_con p.rightBtn {right:-63px;}

        .mark {width:860px; margin:90px auto 0;}
        .mark a {display:block; background:#000; font-size:44px; color:#fff; padding:20px; background:#000; border-radius:5px; box-shadow:10px rgba(0,0,0,.5);}
        .mark a:hover {background:#533fd1}

        .evt02 {background:#ededed;}

        .youtube {position:absolute; top:409px; left:50%;z-index:1;margin-left:-490px}
        .youtube iframe {width:980px; height:490px}

        .evt04 {background:#ededed;}      
       
        .evt_apply {padding-bottom:100px;}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt00"  data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>       

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2583_top.jpg"  alt="경찰헌법 이국령"/>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2583_01.jpg"  alt="100% 완벽적중"/>
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/04/2583_01_01.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/04/2583_01_02.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/04/2583_01_03.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/04/2583_01_04.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2022/04/2583_01_05.jpg" /></li>                                    
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2022/03/2583_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2022/03/2583_right.png"></a></p>
            </div>
            <div class="mark NSK-Black" data-aos="fade-up">
                <a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=396476&" target="_blank" title="이국령 헌법 적중 자세히 보기">이국령 헌법 적중 자세히 보기 ></a>
            </div>
        </div>        

        <div class="evtCtnsBox evt02" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2583_02.jpg"  alt="오답을 피해가는 능력"/>            
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div class="wrap">          
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2583_03.jpg"  alt="커리큘럼"/>
                <div class="youtube">
                    <iframe src="https://www.youtube.com/embed/-uuLC2sLTg0?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <a href="https://www.youtube.com/channel/UCDjImsjLcG6H9y9jonFF84Q" target="_blank" title="헌법도약 유튜브" style="position: absolute;left: 15.19%;top: 73.03%;width: 32.88%;height: 9.34%;z-index: 2;"></a>
                <a href="https://cafe.daum.net/doyag" target="_blank" title="이국령 카페" style="position: absolute;left: 52.19%;top: 73.03%;width: 32.88%;height: 9.34%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <div class="wrap">          
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2583_04.jpg"  alt="교재구매"/>
                <a href="https://police.willbes.net/book/index/cate/3001?cate_code=3001&subject_idx=1049&prof_idx=51259" target="_blank" title="교재구매 바로가기" style="position: absolute;left: 31.19%;top: 47.53%;width: 37.88%;height: 5.34%;z-index: 2;"></a>
            </div>     
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">    
            <div class="wrap">          
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2583_05.jpg"  alt="소문내기 이벤트"/>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운" style="position: absolute;left: 56.29%;top: 69.31%;width: 30.88%;height: 6.34%;z-index: 2;"></a>
            </div>   
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'Y'))
        @endif

        <div class="evtCtnsBox evt_btn" data-aos="fade-up">
            <div class="wrap">            
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2583_btn.jpg"  alt="워크북 교재받기"/>
                <a href="javascript:void(0)" title="워크북 교재받기" onclick="fn_promotion_etc_submit(); return false;" style="position: absolute;left: 25.19%;top: 29.53%;width: 49.88%;height: 40.34%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt_apply" data-aos="fade-up">     
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2583_apply.jpg"  alt="수강신청"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif       
        </div>

    </div>
    <!-- End Container -->

    <form id="add_apply_form" name="add_apply_form">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
        <input type="hidden" name="msg" value="소문내기 댓글을 입력해 주세요."/>
    </form>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script type="text/javascript">
        {{-- 무료 교재지급 --}}
        var $add_apply_form = $('#add_apply_form');
        function fn_promotion_etc_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params['cart_prod_code']) === false)
                var _url = '{!! front_url('/event/promotionEtcStore') !!}';

                if (!confirm('장바구니에 담으시겠습니까?')) { return true; }
                ajaxSubmit($add_apply_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert(ret.ret_msg);
                        location.href = '{!! front_url('/cart/index?tab=book') !!}';
                    }
                }, function(ret, status, error_view) {
                    alert(ret.ret_msg);
                }, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            AOS.init();

            /*슬라이드*/
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:false,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });
        });
      </script> 
      
{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop   