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
            background:#faffb1;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/             

        .evtTop {overflow:hidden}
        .evtTop div {position: absolute; top:230px; left:50%; margin-left:-356px; width:712px; z-index: 4;
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

        .evtTop span {position:absolute; left:50%; width:370px; top:280px; height:370px; margin-left:-185px; z-index: 2; animation:circle 2s ease-in-out infinite;}
        @@keyframes circle {
            0% { transform: scale(0.9);}
            50% { transform: scale(1.1);}
            100% { transform: scale(0.9);}
        }



        .evt01 {background:#9762f8;}

        .evt01 .shinyBtn {width:860px; margin:0 auto; display:flex; justify-content: space-between;}
        .evt01 .shinyBtn a {display:block; width:420px; padding:18px 0; color:#000; font-size:20px; background:#fd9d1e; border-radius:6px; overflow:hidden; position: relative; border:3px solid #000; font-weight:bold}
        .evt01 .shinyBtn a:hover {color:#fd9d1e; background:#000; }
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

        .evt02 {padding-bottom:150px}     



        .evt03 a strong {color:#fff799}
        
    </style>


    <div class="evtContent NSK" id="evtContainer">    
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2930_top.jpg" alt="psat 3일 체험팩" />
            <div><img src="https://static.willbes.net/public/images/promotion/2023/03/2930_top_01.png" alt="" /></div>
            <span><img src="https://static.willbes.net/public/images/promotion/2023/03/2930_top_02.png" alt="" /></span>
        </div>
      
        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2930_01.jpg" alt="참여방법" /> 
            <div class="shinyBtn">                
                <a href="javascript:void(0);" onclick="copyTxt();">링크 복사하기 ></a>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif">소문내기 이미지 다운받기 ></a>
            </div>
            <div>
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N')){{--기존SNS예외처리시--}}
            @endif 
            </div>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2930_02.jpg" alt="후기 작성" />     
            <div>
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial', array('login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www')))
            @endif
            </div>         
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

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script') 
@stop