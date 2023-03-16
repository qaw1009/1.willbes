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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/             
        .sky {position:fixed; top:200px; width:216px; text-align:center; right:10px;z-index:10;}
        .sky a {display:block; margin-bottom:20px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2023/03/2932_top_bg.jpg) no-repeat center top; overflow:hidden}
        .evtTop span {position: absolute; top:150px; left:50%; margin-left:200px; width:153px; z-index: 2;
            -webkit-animation: slide-in-blurred-top 0.6s cubic-bezier(0.230, 1.000, 0.320, 1.000) both;
	        animation: slide-in-blurred-top 0.6s cubic-bezier(0.230, 1.000, 0.320, 1.000) both;
        }
        @@-webkit-keyframes slide-in-blurred-top {
            0% {
                -webkit-transform: translateY(-1000px) scaleY(2.5) scaleX(0.2);
                        transform: translateY(-1000px) scaleY(2.5) scaleX(0.2);
                -webkit-transform-origin: 50% 0%;
                        transform-origin: 50% 0%;
                -webkit-filter: blur(40px);
                        filter: blur(40px);
                opacity: 0;
            }
            100% {
                -webkit-transform: translateY(0) scaleY(1) scaleX(1);
                        transform: translateY(0) scaleY(1) scaleX(1);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
                -webkit-filter: blur(0);
                        filter: blur(0);
                opacity: 1;
            }
        }
        @@keyframes slide-in-blurred-top {
            0% {
                -webkit-transform: translateY(-1000px) scaleY(2.5) scaleX(0.2);
                        transform: translateY(-1000px) scaleY(2.5) scaleX(0.2);
                -webkit-transform-origin: 50% 0%;
                        transform-origin: 50% 0%;
                -webkit-filter: blur(40px);
                        filter: blur(40px);
                opacity: 0;
            }
            100% {
                -webkit-transform: translateY(0) scaleY(1) scaleX(1);
                        transform: translateY(0) scaleY(1) scaleX(1);
                -webkit-transform-origin: 50% 50%;
                        transform-origin: 50% 50%;
                -webkit-filter: blur(0);
                        filter: blur(0);
                opacity: 1;
            }
        }
        .evtTop a {display:block; width:500px; padding:20px; color:#fff; position: absolute; top:510px; left:50%; margin-left:-250px; z-index: 3; font-size:24px; background:#000; border-radius:50px; overflow:hidden}
        .evtTop a strong {color:#fff799}



        .evt01 {background:#299000}  

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2022/03/2568_03_bg.jpg) repeat-x left top; padding-bottom:100px}       

        .evt03 .shinyBtn {position: absolute; top:780px; left:50%; margin-left:-430px; width:860px; z-index: 3; display:flex; justify-content: space-between;}
        .evt03 .shinyBtn a {display:block; width:420px; padding:18px 0; color:#fff; font-size:20px; background:#000; border-radius:50px; overflow:hidden; position: relative;}
        .shinyBtn a:after{
            content:'';
            position: absolute;
            top:0;
            left:0;
            background-color: #fff;
            width: 30px;
            height: 100%;
            z-index: 1;
            transform: skewY(129deg) skewX(-60deg);
        }
        .shinyBtn a:after{animation:shinyBtn 2s ease-in-out infinite;}
        @@keyframes shinyBtn {
            0% { transform: scale(0) rotate(45deg); opacity: 0; }
            80% { transform: scale(0) rotate(45deg); opacity: 0.2; }
            81% { transform: scale(4) rotate(45deg); opacity: 0.5; }
            100% { transform: scale(60) rotate(45deg); opacity: 0; }
        }
        .evt03 a strong {color:#fff799}
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>
    <div class="evtContent NSK" id="evtContainer">             

        <div class="sky" id="QuickMenu">
            <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2932_sky01.png" alt="전국모의고사 접수" >
            </a>   
            <a href="#event03"> 
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2932_sky02.png" alt="댓글참여" >
            </a>                   
        </div>

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2932_top.jpg" alt="전국 모의고사" />
            <span><img src="https://static.willbes.net/public/images/promotion/2023/03/2932_top_01.png" alt="무료" /></span>
            <div class="shinyBtn"><a href="#event03" title="모의고사 신청">무료 쿠폰받고 <strong>온라인 모의고사</strong> 신청하기 ></a></div>
        </div>
      
        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2932_01.jpg" alt="시험 미리 만나기" /> 
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2932_02.jpg" alt="접수 및 시행일정" />              
        </div>

        <div class="evtCtnsBox evt03" id="event03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2932_03.jpg" alt="시험 미리 만나기"  data-aos="fade-up"/> 

            <div class="shinyBtn">                
                <a href="javascript:;" onclick="giveCheck()">댓글 작성했다면? <strong>무료 응시 쿠폰</strong> 받기 ></a>
                <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank">쿠폰 받았다면? <strong>모의고사 신청</strong>하기 ></a>
            </div>
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif
        </div>
        
    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });
    </script>

    <script type="text/javascript">

        $regi_form = $('#regi_form');               

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