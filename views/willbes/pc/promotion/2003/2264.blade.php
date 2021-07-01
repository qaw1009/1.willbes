@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">   
        .evtContent {margin-top:20px}
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,1); border-radius:8px}

        /************************************************************/     

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/06/2264_top_bg.jpg) no-repeat center top}  
        .evtTop span {position:absolute; left:50%; z-index:1;
            -webkit-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -moz-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -ms-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            -o-filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
            filter: drop-shadow(32px 32px 32px rgba(0,0,0,.5));
        }
        .evtTop span.img1 {top:80px; margin-left:-470px; width:532px; animation:iptimg1 0.5s ease-in;-webkit-animation:iptimg1 0.5s ease-in;}
        @@keyframes iptimg1{
        from{margin-left:-1200px; opacity: 0;}
        to{margin-left:-470px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
        from{margin-left:-1200px; opacity: 0;}
        to{margin-left:-470px; opacity: 1;}
        }
       
        .evt02 {background:#f0f0f0;}    

        .evt03 {}    

        .evt04 {background:#f3e4d1} 

        .evt05 {background:url(https://static.willbes.net/public/images/promotion/2021/06/2264_05_bg.jpg) repeat-x left top; padding-bottom:100px} 

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">  
        <div class="evtCtnsBox evtTop">          
            <div class="wrap">       
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2264_top.jpg" title="신기훈 행정법">
                <a href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/51206/?subject_idx=1111" title="교수홈" target="_blank" style="position: absolute; left: 84.11%; top: 82.62%; width: 9.29%; height: 8.12%; z-index: 2;"></a>
                <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2021/06/2264_top_txt.png" alt=" "></span>
            </div>
        </div>

        <div class="evtCtnsBox pt100">
            <iframe width="800" height="400" src="https://www.youtube.com/embed/nQFyta6T3SM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2264_01.jpg" title="필수가 된 행정법의 난이도를 잡아라">              
        </div> 

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2264_02.jpg" title="신기훈 행정법을 선택해야하는 이유">              
        </div> 

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2264_03.jpg" title="커리큘럼">                
        </div> 

        <div class="evtCtnsBox evt04">
            <div class="wrap"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2264_04.jpg" title="행정법 기본이론"> 
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/183418" title="수강신청" target="_blank" style="position: absolute; left: 9.46%; top: 72.61%; width: 33.75%; height: 8.08%; z-index: 2;"></a>     
            </div>        
        </div> 

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2264_05.jpg" title="댓글 이벤트"> 
            {{-- 이모티콘 댓글 --}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_emoticon2_partial', array('change_emoticon_img' => true))
            @endif
        </div> 
         
	</div>
    <!-- End Container -->
    
@stop