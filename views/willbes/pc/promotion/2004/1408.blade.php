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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}

        /************************************************************/     
        .skybanner{position: fixed; top:200px; right:5px; z-index: 1;}
        .skybanner li {margin-bottom:5px}
        .skybannerB{position: fixed; bottom:0; text-align:center; z-index: 1; background:#51d68e; width:100%}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/09/1408_top_bg.jpg) no-repeat center top;}         
        
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1408_02_bg.jpg) no-repeat center top;}

        .evt03 {background:#f9f9f9;padding-bottom:100px;}
         /* 슬라이드배너 */
         .slide_con {position:relative; width:900px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; margin-top:-30px; width:67px; height:67px; z-index:10}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-100px;}
        .slide_con p.rightBtn {right:-100px;}
        #slidesImg4 li {display:inline; float:left}
        #slidesImg4 li img {width:100%}
        #slidesImg4:after {content::""; display:block; clear:both}           

        .evt04 {background:#eeede9;}  
        .evt04_1 {background:#51d68e;}  
        .evt04_1 ul {width:940px; margin:0 auto;} 
        .evt04_1 li {display:inline; float:left; width:50%} 
        .evt04_1 li a {display:block; padding:20px 0; font-size:20px; font-weight:bold; color:#fff; background:#52d58f; border:3px solid #fff; text-align:center;}    
        .evt04_1 li a:hover,
        .evt04_1 li a.active {background:#fff; color:#52d58f}
        .evt04_1 li:last-child a {margin-left:10px}  
        
        .evt05 {background:#fff;}
        .evt05 ul {width:980px; margin:50px auto}
        .evt05 li {display:inline; float:left; width:50%; text-align:center; background:#51d68e; height:70px; line-height:70px; font-size:18px; font-weight:bold; color:#fff}
        .evt05 input {width:20px; height:20px;}
        .evt05 li:last-child {background:#47bc7e}
        .evt05 ul:after {content:""; display:block; clear:both} 
        .evt06 {background:#fff;}   
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>
    <div class="p_re evtContent NGR" id="evtContainer"> 
        <ul class="skybanner">
            <li><a href="https://pass.willbes.net/pass/consultManagement/index" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_s2.jpg"/></a></li>
            <li><a href="https://pf.kakao.com/_kcZIu" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_s3.jpg"/></a></li>
            <li><a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1101" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_s4.jpg"/></a></li>
        </div>

        <div class="skybannerB">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1048_scroll_b.png" usemap="#Map1408a" title="소문내고 혜택받기" border="0"  />
            <map name="Map1408a" id="Map1408a">                
              <area shape="rect" coords="810,21,1030,103" href="#to_go" />
            </map>     
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1408_top.gif" title="올백 모의고사"  />
        </div>
      
        

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1408_02.jpg" title="고퀄리티 문항"  />
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1408_03.jpg" title="올백모의 고사반"  />
            <div class="slide_con">
                <ul id="slidesImg4">                    
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_con1.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_con2.jpg" /></li>  
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_con.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_con3.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_con4.jpg" /></li> 
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1408_con5.jpg" /></li>                 
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2019/09/arr_l.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2019/09/arr_r.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt04">           
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1408_04.jpg" title="올백모의 고사반"  />
        </div>

        <div class="evtCtnsBox evt04_1">           
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1408_04_1.jpg" usemap="#Map1408B" title="올백모의 고사반" border="0"  />
            <map name="Map1408B" id="Map1408B">
                <area shape="rect" coords="163,523,491,587" href="#none" alt="9급" />
                <area shape="rect" coords="635,524,961,588" href="#none" alt="군무원" />
                <area shape="rect" coords="157,792,494,856" href="#none" alt="7급" />
                <area shape="rect" coords="635,792,963,855" href="#none" alt="7급외무영사" />
            </map>
        </div>

        <div class="evtCtnsBox evt05" id="to_go">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1408_05.jpg" title="소문내고 무료쿠폰 받고"  />
            <ul>
                <li><input type="radio" name="register_data1" id="CT1" value="올백모의고사 1회 무료응시권" data-giveidx="{{$arr_promotion_params['give_idx']}}" checked="checked" /> <label for="CT1">올백모의고사 1회 무료응시권</label></li>
                <li><input type="radio" name="register_data1" id="CT2" value="올백모의고사반 1만원 할인쿠폰"  data-giveidx="{{$arr_promotion_params['give_idx2']}}" /> <label for="CT2">올백모의고사반 1만원 할인쿠폰</label></li>
            </ul>   
        </div>

        {{--홍보url댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif

    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $regi_form = $('#regi_form');
        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
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

         /*tab*/
         $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide();
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault()
                });
            });
        });

        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var give_idx = $('input:radio[name="register_data1"]:checked').data('giveidx');

            if(!give_idx){
                alert('쿠폰을 선택하지 않아서 발급에 실패하였습니다.');
                return;
            }

            //다건 쿠폰 중복 발급 체크
            //arr_give_idx_chk: 콤마(,)를 붙여서 생성
            var arr_give_idx_chk = '';
            var give_overlap_chk = '';
            @if(empty($arr_promotion_params['give_type']) === false && $arr_promotion_params['give_type'] == 'coupons')
                arr_give_idx_chk = '&arr_give_idx_chk={{$arr_promotion_params['give_idx']}},{{$arr_promotion_params['give_idx2']}}';
            @endif
            @if(empty($arr_promotion_params['give_overlap_chk']) === false)
                give_overlap_chk = '&give_overlap_chk={{$arr_promotion_params['give_overlap_chk']}}';
            @endif


    var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params['give_type']}}&give_idx='+give_idx+'&event_code={{$data['ElIdx']}}'+arr_give_idx_chk;
    ajaxSubmit($regi_form, _check_url, function (ret) {
        if (ret.ret_cd) {
            alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
            location.reload();
            {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
        }
    }, showValidateError, null, false, 'alert');
    @else
    alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
    @endif
}
</script>


@stop