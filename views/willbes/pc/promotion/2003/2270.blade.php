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

        /************************************************************/
        
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/07/2270_top_bg.jpg) no-repeat center top}  
        .evtTop span {position:absolute; left:50%; top:150px; z-index:1;
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

        .evt_04 {background:url(https://static.willbes.net/public/images/promotion/2021/07/2270_04_bg.jpg) no-repeat center top} 
        .evt_05 {background:url(https://static.willbes.net/public/images/promotion/2021/07/2270_05_bg.jpg) repeat-x center top} 
        
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">  
        <div class="evtCtnsBox evtTop">          
            <div class="wrap">       
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2270_top.jpg" title="한국사 김상범">
                <a href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/50619?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC" title="교수홈" target="_blank" style="position: absolute; left: 84.2%; top: 77.97%; width: 9.29%; height: 10.19%; z-index: 2;"></a>
                <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2021/07/2270_top_txt.png" alt=" "></span>
            </div>
        </div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2270_01.jpg" title="한국사 김상범 정답이 보입니다.">
        </div>

        <div class="evtCtnsBox evt_02">           
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2270_02.jpg"  alt="기본에 충실한 한국사" />       
        </div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2270_03.jpg" title="김상범 관한국사 커리큘럼"> 
        </div>

        <div class="evtCtnsBox evt_04">
            <div class="wrap"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2270_04.jpg"  alt="김상범 한국사 기본이론" />
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/183501" title="수강신청" target="_blank" style="position: absolute;  left: 9.29%; top: 76.59%; width: 33.93%; height: 8.49%; z-index: 2;"></a>
            </div>
        </div>
        <!--
        <div class="evtCtnsBox evt_05 pb100">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2270_05.jpg" title="댓글 이벤트"> 
            {{-- 이모티콘 댓글 --}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_emoticon2_partial')
            @endif
        </div>
        -->
    </div>
    <!-- End Container -->

@stop