@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">       
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
            line-height:1.3;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
        .sky {position:fixed; top:200px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}


        .evttop {background:url("https://static.willbes.net/public/images/promotion/2022/09/2760_top_bg.jpg");}
        .evt01 {background:#101d26}
        .evt03 {background:#f2f2f2}        

        .Visual {padding-bottom:150px; width:100%; background:#000; text-align:center;}
        .VisualBox {width:860px; margin:0 auto;}

        .VisualBox .RollingTab {
            margin-top:30px;            
            display: flex;
            justify-content: space-between;
        }

        .VisualBox .RollingTab a{
            display: block;
            width:20%;
            height: 64px;
            font-size: 24px;
            line-height: 64px;
            color: #cdcdcd;
            background:#363636;
            text-align: center;
            margin-right:5px;
        }

        .VisualBox .RollingTab a:last-child {
            margin-right:0;
        }

        .VisualBox .RollingTab a.active,
        .VisualBox .RollingTab a:hover {
            color: #363636;
            font-weight: 600; background:#fff
        }

        .evt05 {background:#373737}
        .evt07 {padding:100px 0}

        .endpop {position: absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,.9); color:#fff; font-size:80px; display:flex; justify-content: center; align-items: center; z-index: 10; }
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            {{--<a href="#evt06"><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_sky_02.png" title="소문내기 이벤트"></a>--}}
            <a href="#evt07"><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_sky_01.png" title="이론완성반"></a>            
        </div>

        <div class="evtCtnsBox evttop">           
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2760_top.jpg" title="9.13일 개강 올인원 이론완성반">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2760_01.jpg" title="교수진" data-aos="fade-left">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2760_02.jpg" title="왜 올인원이론반인가?" data-aos="fade-right">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2760_03.jpg" title="합격커리큘럼" data-aos="fade-left">
        </div>

        <div class="Visual" data-aos="fade-up">
            <div><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_04.jpg"></div>
            <div class="VisualBox">            
                <div id="RollingSlider">
                    <ul class="tabSlider">
                        <li><a href="https://police.willbes.net/promotion/index/cate/3001/code/2236" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_04_01.jpg" alt="헌법 이국령"></a></li>
                        <li><a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51394?subject_idx=2127" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_04_02.jpg" alt="형사법 임종희"></a></li>
                        <li><a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51392?subject_idx=2127" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_04_03.jpg" alt="배너명"></a></li>
                        <li><a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51389?subject_idx=2127" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_04_04.jpg" alt="배너명"></a></li>
                        <li><a href="https://police.willbes.net/promotion/index/cate/3001/code/2737" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_04_05.jpg" alt="배너명"></a></li>
                    </ul>
                </div> 
                <div id="RollingDiv" class="tabList">
                    <div class="RollingTab">
                        <a data-slide-index="0" href="javascript:void(0);" class="active">헌법 이국령</a>
                        <a data-slide-index="1" href="javascript:void(0);" class="">형사법 임종희</a>
                        <a data-slide-index="2" href="javascript:void(0);" class="">형사법 문형석</a>
                        <a data-slide-index="3" href="javascript:void(0);" class="">형사법 김한기</a>
                        <a data-slide-index="4" href="javascript:void(0);" class="">경찰학 박우찬</a>
                    </div>
                </div>           
            </div>        
        </div>

        <div class="evtCtnsBox evt05">
            <div class="wrap" data-aos="fade-left">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2760_05.jpg" title="스케줄" >
                <a href="https://police.willbes.net/pass/offinfo/boardInfo/index/80" target="_blank" title="강의시간표" style="position: absolute; left: 30.63%; top: 77.44%; width: 38.66%; height: 10.01%; z-index: 2;"></a>
            </div>
        </div>

        {{--
        <div class="evtCtnsBox" data-aos="fade-right" id="evt06">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2760_06.jpg" title="소문내기 이벤트">
                <a href="javascript:void(0);" onclick="giveCheck(); return false;" title="쿠폰받기" style="position: absolute; left: 27.32%; top: 57.02%; width: 45.18%; height: 5.05%; z-index: 2;"></a>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이벤트 이미지 다운로드" style="position: absolute; left: 57.32%; top: 73.93%; width: 29.46%; height: 5.05%; z-index: 2;"></a>
            </div>
            <div class="endpop NSK-Black">이벤트 종료</div>
        </div> 
        --}}



        <div class="evtCtnsBox evt07" id="evt07" data-aos="fade-up">
            <div class="mb20"><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_07_01.jpg" title="단과"></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
            <div class="mt100 mb20"><img src="https://static.willbes.net/public/images/promotion/2022/09/2760_07_02.jpg" title="종합반"></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif
        </div>

	</div>
    <!-- End Container -->

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <script type="text/javascript"> 
        //상단배너
        $(function(){ 
            var slidesImg = $(".tabSlider").bxSlider({
                mode:'horizontal',
                touchEnabled: false,
                slideWidth: 860,
                speed:400,
                pause:3000,
                auto : true,	
                autoHover: true,						
                pagerCustom: '#RollingDiv',
                controls:false, 				
                onSliderLoad: function(){
                    $("#RollingSlider").css("visibility", "visible").animate({opacity:1}); 
                }
            });			
        }); 
    </script>

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );

      var $regi_form = $('#regi_form');
      function giveCheck() {
          {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
          @if(empty($arr_promotion_params['give_type']) === false && empty($arr_promotion_params['give_idx']) === false)
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
@stop