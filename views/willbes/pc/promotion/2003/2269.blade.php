@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,1); border-radius:8px}

        /************************************************************/

        .sky {position:fixed;top:250px;right:0;z-index:1;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/07/2269_top_bg.jpg) no-repeat center top}  
        .evtTop span {position:absolute; left:50%; top:80px; z-index:1;
            -webkit-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -moz-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -ms-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -o-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
        }
        .evtTop span.img1 {margin-left:-503px; width:406px; animation:iptimg1 0.5s ease-in;-webkit-animation:iptimg1 0.5s ease-in;}
        @@keyframes iptimg1{
        from{margin-left:-1000px; opacity: 0;}
        to{margin-left:-503px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
        from{margin-left:-1000px; opacity: 0;}
        to{margin-left:-503px; opacity: 1;}
        }

        .evt_01 {background:#f5f5f5}
        .evt_02 {background:#eee}
        .evt_03 {background:#f5f5f5} 
        .evt_04 {background:url(https://static.willbes.net/public/images/promotion/2021/07/2269_04_bg.jpg) no-repeat center top} 
        .evt_05 {background:url(https://static.willbes.net/public/images/promotion/2021/07/2269_05_bg.jpg) repeat-x center top} 
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">  
        <div class="evtCtnsBox evtTop">          
            <div class="wrap">       
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2269_top.jpg" title="오대혁 고갱이 국어">
                <a href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/50157?subject_idx=1107" title="교수홈" target="_blank" style="position: absolute; left: 84.2%; top: 84.47%; width: 9.29%; height: 10.19%; z-index: 2;"></a>
                <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2021/07/2269_top_txt.png" alt=" "></span>
            </div>
        </div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2269_01.jpg" title="오대혁 고갱이 국어">
        </div>

        <div class="evtCtnsBox evt_02">
            <div class="wrap"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2269_02.jpg"  alt="오대혁 고갱이 국어" />
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/183420" title="수강신청" target="_blank" style="position: absolute;  left: 9.29%; top: 76.59%; width: 33.93%; height: 8.49%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2269_03.jpg" title="오대혁 국어 커리큘럼"> 
        </div>

        <div class="evtCtnsBox evt_04">
            <div class="wrap"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2269_04.jpg"  alt="오대혁 국어 기본이론" />
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/183421" title="수강신청" target="_blank" style="position: absolute;  left: 9.29%; top: 76.59%; width: 33.93%; height: 8.49%; z-index: 2;"></a>
            </div>
        </div>
        <!--
        <div class="evtCtnsBox evt_05 pb100">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2269_05.jpg" title="댓글 이벤트"> 
            {{-- 이모티콘 댓글 --}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_emoticon2_partial')
            @endif
        </div>
        -->
    </div>
    <!-- End Container -->

@stop