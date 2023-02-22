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
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .evt_top {background:#ffcd64}
        .evt_top span {position: absolute; top:650px; left:50%; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite;vertical-align:top;}
        @@keyframes upDown{
            from{transform:scale(1)}
            50%{transform:scale(0.9)}
            to{transform:scale(1)}
        }
        @@-webkit-keyframes upDown{
            from{transform:scale(1)}
            50%{transform:scale(0.9)}
            to{transform:scale(1)}
        }
        .evt_02 {background:#004751; margin-top:100px}


        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
            padding:0;
            
        }
        .b-close {
            position: absolute;
            right: -25px;
            top: -25px;
            display: inline-block;
            cursor: pointer;
            width:50px;
            height:50px;
            transform: rotate(0deg);
            transition: all 1s;
            z-index: 9999;
        }
        .b-close img {width:100%}
        .b-close:hover {transform: rotate(360deg); transition: all 1s;}

        .Pstyle .content {height:550px; width:auto; overflow-y: scroll;}
        .Pstyle .table_wrap {background:#fff; padding:50px; margin:0; border-radius:30px;}
        .Pstyle .p_title {font-size:20px; margin-bottom:20px}
        
        /************************************************************/
    </style>

	<div class="evtContent NSK">
		<div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2907_top.gif" alt="응원해"/>
            <span><img src="https://static.willbes.net/public/images/promotion/2023/02/2907_heart_01.png" alt=""/></span>
		</div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2907_01_01.jpg" alt=""/><br> 
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2907_01_02.jpg" alt=""/><br>
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2907_01_03.jpg" alt=""/> 
        </div>

        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial', array('login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www')))
        @endif

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/02/2907_02.jpg" alt=""/>
                <a href="javascript:go_popup1()" title="" style="position: absolute; left: 8.89%; top: 58.14%; width: 81.94%; height: 7.63%; z-index: 2;"></a>
            </div>
		</div>

        <div id="popup1" class="Pstyle NSK">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <img src="https://static.willbes.net/public/images/promotion/2023/02/2907_02_popup.jpg" alt=""/>
            </div>
        </div>
	</div>
    <!-- End Container -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        //팝업
        function go_popup1(){$('#popup1').bPopup();}

        $(document).ready(function(){
            AOS.init();
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop