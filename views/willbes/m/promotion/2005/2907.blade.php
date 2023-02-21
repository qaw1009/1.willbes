@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.4vh; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .evt_top span {position: absolute; top:70%; left:45%; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite;vertical-align:top; }
    .evt_top span img {max-width:124px}
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
        .evt_02 {background:#004751; margin-top:10vh}

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
            right: 10px;
            top: -15px;
            display: inline-block;
            cursor: pointer;
            width:30px;
            height:30px;
            transform: rotate(0deg);
            transition: all 1s;
            z-index: 9999;
        }
        .b-close img {width:100%}
        .b-close:hover {transform: rotate(360deg); transition: all 1s;}

        .Pstyle .content {height:55vh; width:95%; margin:0 auto; overflow-y: scroll;}
        .Pstyle .content img {width:100%; max-width:640px}


    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  { 
        .evt_top span img {max-width:60px}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) { 
        .evt_top span img {max-width:80px}
    }
</style>

<div id="Container" class="Container NSK c_both">
    <div class="evtCtnsBox evt_top" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2907m_top.gif" alt="응원해"/>
        <span><img src="https://static.willbes.net/public/images/promotion/2023/02/2907_heart_01.png" alt=""/></span>
    </div>

    <div class="evtCtnsBox evt_01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2907_01_01.jpg" alt=""/><br> 
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2907_01_02.jpg" alt=""/><br>
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2907_01_03.jpg" alt=""/> 
    </div>

    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.m.promotion.show_comment_list_normal_partial')
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

    $(document).ready( function() {
        AOS.init();
    });
</script>

@stop




