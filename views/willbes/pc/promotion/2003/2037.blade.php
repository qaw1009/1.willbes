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

        /************************************************************/             
        .sky {position:fixed; top:200px; width:216px; text-align:center; right:10px;z-index:10;}
        .sky a {display:block; margin-bottom:20px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/11/2037_top_bg.jpg) no-repeat center top;}	    
        .evt01 {background:#fdb8b3}

        .evt02 {padding-bottom:100px;}
        .tabs { margin-left:-490px; width:980px; z-index:10;margin:0 auto;padding-top:25px;}
        .tabs ul{width:789px;margin:0 auto;display: flex; justify-content: space-around;}
        .tabs li {width:16.6666%}
        .tabs li a {display:block; text-align:center; height:45px; line-height:45px; background:#b7b7b7; color:#fff; font-size:16px; margin-right:4px;border-radius:16px;}
        .tabs li a:hover,
        .tabs li a.active {background:#fdb8b3; color:#89443f; font-weight:bold}
        .tabs li:last-child a {margin:0}
        .tabs div {width:840px; margin:25px 0 0 70px}
        .tabs div a {display:block; width:400px; margin:160px auto 0; background:#0a0f25; color:#fff; font-size:22px; padding:15px 0; border-radius:40px}
        .tabs div a:hover {background:#c6b269;}       

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2021/11/2037_03_bg.jpg) repeat-x left top; padding-bottom:100px}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>
    <div class="p_re evtContent NGR" id="evtContainer">             

        <div class="sky" id="QuickMenu">
            <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2037_sky01.png" alt="윌비스 전국모의고사 접수하기" >
            </a>   
            <a href="#event03"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2037_sky02.png" alt="윌비스 전국모의고사 접수하기" >
            </a>                   
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2037_top.jpg" alt="전국 모의고사" />
                <a href="#event03" title="모의고사 신청" style="position: absolute; left: 35.36%; top: 59.18%; width: 31.16%; height: 9.24%; z-index: 2;"></a>
            </div>
        </div>
      
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2037_01.jpg" alt="시험 미리 만나기"  data-aos="fade-up"/> 
        </div>

        <div class="evtCtnsBox evt02">  
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2037_02.jpg" alt="접수 및 시행일정"  data-aos="fade-up"/>  
            <div class="tabs">
                <ul>
                    <li><a href="#tab01">서울(노량진)</a></li>
                    <li><a href="#tab02">인천</a></li>                
                    <li><a href="#tab03">광주</a></li>
                    <li><a href="#tab04">대구</a></li>
                    <li><a href="#tab05">부산</a></li>
                    <li><a href="#tab06">전북</a></li>
                </ul>
                <div id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01_tab01.jpg" alt="서울(노량진)" />
                </div>
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01_tab02.jpg" alt="인천" />
                </div>    
                <div id="tab03">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01_tab04.jpg" alt="광주" />
                </div>
                <div id="tab04">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01_tab05.jpg" alt="대구" />
                </div>
                <div id="tab05">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01_tab06.jpg" alt="부산" />
                </div>
                <div id="tab06">
                    <img src="https://static.willbes.net/public/images/promotion/2019/09/1414_01_tab03.jpg" alt="전북" />
                </div>
            </div>	       
        </div>

        <div class="evtCtnsBox evt03" id="event03">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2037_03.jpg" alt="시험 미리 만나기"  data-aos="fade-up"/> 
                <a href="javascript:;" onclick="giveCheck()" title="쿠폰" style="position: absolute; left: 12.41%; top: 68.62%; width: 37.23%; height: 8.14%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" title="모의고사 신청" target="_blank" style="position: absolute; left: 50.45%; top: 68.62%; width: 37.23%; height: 8.14%; z-index: 2;"></a>
            </div>
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif
        </div>
        
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $( document ).ready( function() {
        AOS.init();
    } );
    </script>

    <script type="text/javascript">
        $regi_form = $('#regi_form');
         /*tab*/
         $(document).ready(function(){
            $('.tabs ul').each(function(){
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

        /*쿠폰발급*/
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}';
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('온라인 모의고사 무료 응시쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';
                }
            }, showValidateError, null, false, 'alert');
            @endif
        }

    </script>    
@stop