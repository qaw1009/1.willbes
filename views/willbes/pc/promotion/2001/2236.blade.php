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
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

        /************************************************************/

        .evt00 {background:#0a0a0a}

        .sky {position:fixed; top:225px;right:10px; width:120px; z-index:2;}
        .sky a{display:block; margin-bottom:10px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/06/2236_top_bg.jpg) no-repeat center top;position:relative;}
        .circle {position:absolute;left:50%;top:50%;margin-left:-188px;margin-top:-100px;animation: circle 5s linear infinite;}
        @@keyframes circle{
            0%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            25%{-webkit-transform:rotate3d(0,0,1,25deg);transform:rotate3d(0,0,1,25deg)}
            50%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            75%{-webkit-transform:rotate3d(0,0,1,-25deg);transform:rotate3d(0,0,1,-25deg)}
            100%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
        }
        .constitution {position: absolute;left:50%;top: 50%;margin-left: -77px;margin-top: 35px;}

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/06/2236_01_bg.jpg) no-repeat center top;}

        .evt03 {background:#383838;}
        .evt03 .youtube {position:absolute; top:440px; left:50%; width:658px; z-index:1; margin-left:-329px; box-shadow:0 10px 20px rgba(0,0,0,.3);}  
        .evt03 .youtube iframe {width:658px; height:356px} 

        .evt04 {background:#4c4c4c;padding:150px 0;}
        .evt04 .area {width:1120px;margin:0 auto;}
        .evt04 .area::after {content:"";display:table;clear:both;}
        .evt04 .left_area {float:left;}
        .evt04 .right_area {float:right;}

        .evt04 .slide_con {width:487px; margin:0 auto; position:relative}
        .evt04 .slide_con p {position:absolute; top:35%; width:30px; z-index:90}
        .evt04 .slide_con p a {cursor:pointer}
        .evt04 .slide_con p.leftBtn {left:-100px; top:50%; width:62px; height:62px; margin-top:-30px;}
        .evt04 .slide_con p.rightBtn {right:-100px; top:50%; width:62px; height:62px; margin-top:-30px;} 

        .evt05 {background:#383838;position:relative;}
        .evt05 .youtube {position:absolute; top:432px; left:50%;z-index:1;margin-left:-465px}
        .evt05 .youtube iframe {width:493px; height:291px}

        .evt08 {background:#1a8884;padding-bottom:150px;}
        .tx-red {color:#f5f012 !important;}
        
         /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
        }
        .b-close {
            position: absolute;
            right: 0;
            top: 50px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
            color:#fff;
            font-size:50px;
        }
        .Pstyle .content {height:auto; width:auto;}

        
        

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <input type="hidden" name="comment_ccd" value="713002">
    </form>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>   

        <div class="sky">
            <a href="#evt_01"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2236_sky.jpg" alt="go 헌법 시작부터 제대로!" >
            </a>  
        </div>   

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_top.jpg"  alt="이국령 형법"/>
            <div class="circle">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_circle.png"  alt=""/>
            </div>
            <div class="constitution">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_constitution.png"  alt=""/>
            </div>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_01.jpg"  alt="경찰헌법 이국령"/>
        </div>

        <div class="evtCtnsBox evt02">  
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_02.jpg"  alt="박수친 이유"/>
                <a href="javascript:go_popup1()" style="position: absolute;left: 71%;top: 18.25%;width: 6.5%;height: 3%;z-index: 2;"></a>
            </div>    
        </div>

         <!--레이어팝업-->
         <div id="popup1" class="Pstyle">
            <span class="b-close">X</span>
            <div class="content1">                  
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_click.png" class="off" alt="" />    
            </div> 
        </div>    
        <div id="popup2" class="Pstyle">
            <span class="b-close">X</span>   
            <div class="content2">         
                {{--<img src="https://static.willbes.net/public/images/promotion/2021/06/2236_no.png" class="off" alt="" />--}}
            </div> 
        </div>

        <div class="evtCtnsBox evt03 p_re">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_03.jpg"  alt="학습가이드"/>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/_-XbBFVxK2Y?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt04">
            <div class="area">
                <div class="left_area">
                    <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_04_left.png"  alt="걍약조절"/>
                </div>
                <div class="right_area">
                    <div class="slide_con">
                        <ul id="slidesImg4">
                            <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2236_04_01.png" /></li>
                            <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2236_04_02.png" /></li>  
                            <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2236_04_03.png" /></li>     
                            <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2236_04_04.png" /></li>
                            <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2236_04_05.png" /></li>  
                            <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2236_04_06.png" /></li>     
                            <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2236_04_07.png" /></li>
                            <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2236_04_08.png" /></li>  
                            <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2236_04_09.png" /></li>     
                        </ul>
                        <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2021/06/2236_04_left_arrow.png"></a></p>
                        <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2021/06/2236_04_right_arrow.png"></a></p>
                    </div>
                </div>       
            </div>    
        </div>

        <div class="evtCtnsBox evt05 p_re">           
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_05.jpg"  alt="해결능력"/>
                <a href="javascript:go_popup2()" style="position: absolute;left: 45%;top: 60.15%;width: 10%;height: 3%;z-index: 2;"></a>
            </div>    
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/_BX3eP_CAtc?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt08" id="evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_08.jpg"  alt="신규 개설 강좌"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif  
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script>
    
        $regi_form = $('#regi_form');

        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용해주세요.','Y') !!}

            @if(empty($arr_promotion_params) === false)

                @if(strtotime(date('YmdHi')) >= strtotime($arr_promotion_params['edate']))
                    alert('이벤트가 종료되었습니다.');
                    return;
                @endif

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

        /*레이어팝업*/     

        function go_popup1() {
            $('#popup1').bPopup();
        }   
        function go_popup2() {
            $('#popup2').bPopup();
        }        

         /*슬라이드*/

        $(document).ready(function() {
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