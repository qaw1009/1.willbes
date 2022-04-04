@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/    
        .sky {position:fixed; top:200px; width:190px; text-align:center; right:10px;z-index:20;}
        .sky a {display:block; margin-bottom:20px} 

        /*타이머*/
        .jbMenu {background:#000;}
        .time {width:1120px; margin:0 auto; text-align:center; padding:20px 0; font-size:32px; color:#fff; display:flex; height: 128px; justify-content: center; align-items: center;}
        .time div:nth-child(2) {margin-left:40px; color:#fcf159; font-size:35px;}
        .time a {padding:10px 30px; background:#fff; color:#000; border-radius:20px; font-size:25px; margin-left:40px}

        .evttop {background:url(https://static.willbes.net/public/images/promotion/2022/04/2611_top_bg.jpg) no-repeat center top; height:1142px} 
        .evttop img {position: absolute; top:100px; margin-left:-100px}
        .evt02 {background:#2a28ad} 
        .evt03 {background:#eedbd7} 
        .evt04 {background:#ededed} 
        .evt04 span {position: absolute; top:552px; width:416px; left:50%; z-index: 10;}
        .evt04 .img01 {margin-left:-447px}
        .evt04 .img02 {margin-left:32px}
    </style>


    <div class="evtContent NSK" id="evtContainer">  
        <div class="sky" id="QuickMenu">
            <a href="#evt03"><img src="https://static.willbes.net/public/images/promotion/2022/04/2611_sky.png" alt="세무직 반값" ></a>               
        </div>

        <div class="evtCtnsBox jbMenu"> 
            <div class="time NSK-Black" id="newTopDday">
                <div>혜택 종료 <strong>{{ (empty($arr_base['dday_data'][0]['DDay']) === false) ? 'D'.$arr_base['dday_data'][0]['DDay'] : '' }}</strong></div>
                <div>세무직 수험생이면 누구나 반값!</div>
                <div><a href="#evt03">혜택받기 ></a>  </div>     
            </div> 
        </div>

        <div class="evtCtnsBox evttop">                 
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2611_top_img.png" title="50% 반값" data-aos="zoom-out-up">              
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2611_01.jpg" title="">
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
             <img src="https://static.willbes.net/public/images/promotion/2022/04/2611_02.jpg" title="">
        </div> 

        <div class="evtCtnsBox evt03" data-aos="fade-up" id="evt03">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2611_03.jpg" title=""> 
                <a href="javascript:void(0);" onclick="giveCheck('{{$arr_promotion_params['give_idx1'] or ''}}'); return false;" title="강좌 50% 할인쿠폰 받기" style="position: absolute; left: 22.05%; top: 74.91%; width: 54.82%; height: 8.12%; z-index: 2;"></a>
            </div>                     
        </div> 

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2611_04.jpg" title=""> 
                <a href="javascript:void(0);" onclick="giveCheck('{{$arr_promotion_params['give_idx2'] or ''}}'); return false;" title="20% 할인쿠폰 받기" style="position: absolute; left: 16.25%; top: 75.78%; width: 67.86%; height: 7.28%; z-index: 2;"></a>
                <span class="img01"><img src="https://static.willbes.net/public/images/promotion/2022/04/2611_t2.gif" title="이윤호"></span>
                <span class="img02"><img src="https://static.willbes.net/public/images/promotion/2022/04/2611_t1.gif" title="박창한"></span>
                
            </div>                   
        </div> 

        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
        @endif  
	</div>
    <!-- End Container -->

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init({
				easing: 'ease-out-back',
				duration: 500
			});
        });

        {{--쿠폰발급--}}
        function giveCheck(give_idx) {
            $regi_form = $('#regi_form');
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            @if(empty($arr_promotion_params) === false)
                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?comment_chk_yn={{$arr_promotion_params['comment_chk_yn']}}&give_type={{$arr_promotion_params['give_type']}}&event_code={{$data['ElIdx']}}&give_idx=' + give_idx;
                ajaxSubmit($regi_form, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    }
                }, showValidateError, null, false, 'alert');
            @endif
        }
    </script>
@stop