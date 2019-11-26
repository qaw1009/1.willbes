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
        .skybanner{position:fixed; top:220px; right:5px; z-index:1;}
        .skybanner li {margin-bottom:5px}
        .skybannerB{position: fixed; bottom:0; text-align:center; z-index: 1; background:#51d68e; width:100%}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/11/1408_top_bg.jpg) no-repeat center top;}     
        
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

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1408_top.gif" title="올백 모의고사"  />
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
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1408_04.jpg" title="올백모의 고사반"  />
        </div>

        <div class="evtCtnsBox evt04_1">           
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1408_04_1.jpg" usemap="#Map1408B" title="올백모의 고사반" border="0"  />
            <map name="Map1408B" id="Map1408B">
                <area shape="rect" coords="163,521,491,585" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&amp;subject_idx=1278&amp;campus_ccd=605001&amp;course_idx=1062" target="_blank" alt="9급" />
                <area shape="rect" coords="165,586,488,647" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3050&amp;subject_idx=1278&amp;campus_ccd=605001&amp;course_idx=1062" target="_blank" alt="소방공채" />
                <area shape="rect" coords="634,526,963,583" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3048&amp;subject_idx=1278&amp;campus_ccd=605001&amp;course_idx=1062" target="_blank" alt="군무원" />
                <area shape="rect" coords="637,584,958,646" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3050&amp;subject_idx=1278&amp;campus_ccd=605001&amp;course_idx=1062" target="_blank" alt="소방특채" />
                <area shape="rect" coords="164,903,492,966" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&amp;subject_idx=1278&amp;campus_ccd=605001&amp;course_idx=1062" target="_blank" alt="7급" />
                <area shape="rect" coords="634,906,962,965" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&amp;subject_idx=1278&amp;campus_ccd=605001&amp;course_idx=1062" target="_blank" alt="7급 외무영사직" />
                <area shape="rect" coords="166,1233,489,1295" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3052&amp;subject_idx=1278&amp;campus_ccd=605001&amp;course_idx=1062" target="_blank" alt="9급 공통" />
                <area shape="rect" coords="634,1235,959,1293" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&amp;subject_idx=1278&amp;campus_ccd=605001&amp;course_idx=1062" target="_blank" alt="7급공통" />
            </map>
        </div>
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