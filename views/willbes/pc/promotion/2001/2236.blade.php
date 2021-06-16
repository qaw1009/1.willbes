@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

        /************************************************************/

        .evt00 {background:#0a0a0a}

        .sky {position:fixed; top:225px;right:10px; width:120px; z-index:2;}
        .sky a{display:block; margin-bottom:10px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/06/2236_top_bg.jpg) no-repeat center top;position:relative;}
        .circle {position:absolute;left:50%;top:50%;margin-left:-188px;margin-top:-80px;animation: circle 6s linear infinite;}
        @@keyframes circle{
            0%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            25%{-webkit-transform:rotate3d(0,0,1,10deg);transform:rotate3d(0,0,1,10deg)}
            50%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            75%{-webkit-transform:rotate3d(0,0,1,-10deg);transform:rotate3d(0,0,1,-10deg)}
            100%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
        }

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/06/2236_01_bg.jpg) no-repeat center top;}

        .evt03 {background:#383838;}

        .evt04 {background:#4c4c4c;}

        .evt05 {background:#383838;position:relative;}
        .youtube {position:absolute; top:432px; left:50%;z-index:1;margin-left:-465px}
        .youtube iframe {width:493px; height:291px}

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
            right: 10px;
            top: 50px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
        }
        .Pstyle .content {height:auto; width:auto;}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <input type="hidden" name="msg" value="신쌤에게 전하고 싶은 말을 적어주세요.">
    </form>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>   

        <div class="sky">
            <a href="#evt_01"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_sky.jpg" alt="증정 이벤트" >
            </a>  
            <a href="#evt_02"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_sky2.jpg" alt="100% 할인쿠폰" >                
            </a> 
        </div>   

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_top.jpg"  alt="이국령 형법"/>
            <div class="circle">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_circle.png"  alt=""/>
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
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_no.png" class="off" alt="" /> 
            </div> 
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_03.jpg"  alt="학습가이드"/>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_04.jpg"  alt="걍약조절"/>
        </div>

        <div class="evtCtnsBox evt05">           
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_05.jpg"  alt="해결능력"/>
                <a href="javascript:go_popup2()" style="position: absolute;left: 45%;top: 60.15%;width: 10%;height: 3%;z-index: 2;"></a>
            </div>    
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/hFgv1FgRe3I?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt06" id="evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_06.jpg"  alt="증정 이벤트"/>
        </div>

        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif 

        <div class="evtCtnsBox evt07" id="evt_02">            
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2236_07.jpg"  alt="쿠폰 받기"/>
                <a href="javascript:;" onclick="giveCheck()" title="쿠폰받기" style="position: absolute;left: 54.5%;top: 42.35%;width: 33.25%;height: 5%;z-index: 2;"></a>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지다운" style="position: absolute;left: 23%;top: 76.75%;width: 31.25%;height: 4.5%;z-index: 2;"></a>
                <a href="http://cafe.daum.net/policeacademy" target="_blank" title="경시모" style="position: absolute;left: 26%;top: 92.15%;width: 16.25%;height: 7%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/polstudy" target="_blank" title="경꿈사" style="position: absolute;left: 46%;top: 92.15%;width: 16.25%;height: 7%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/kts9719" target="_blank" title="닥공사" style="position: absolute;left: 66%;top: 92.15%;width: 16.25%;height: 7%;z-index: 2;"></a>
            </div>    
        </div>
        
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif 

        <div class="evtCtnsBox evt08">
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
      </script> 
      
{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop   