@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">   
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/     

        .evttop {background:url(https://static.willbes.net/public/images/promotion/2022/01/2505_top_bg.jpg) no-repeat center top;} 
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2022/01/2505_01_bg.jpg) no-repeat center top;} 
        .evt01 span {position:absolute; top:100px; left:50%; margin-left:100px; z-index: 10;}
       
        .evt03 {background:#f4f4f4}
        .evt04 {background:#7d39ce; margin-bottom:50px}
        .evt05 {background:#feda7a; margin-top:100px}

        .youtube {position:absolute; top:302px; left:50%; z-index:1;margin-left:-460px}
        .youtube iframe {width:900px; height:513px}  

    </style>

    <div class="evtContent NSK" id="evtContainer">  

        <div class="evtCtnsBox evttop" data-aos="fade-up">                 
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2505_top.jpg" alt="한덕현 동사구 업 데이">                                  
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2505_01.jpg" alt="">  
            <span data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2022/01/2505_01_01.png" alt="5분 투자"></span>                        
        </div> 

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2505_02.jpg" alt="영어 업 데이">              
        </div> 

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2505_03.jpg" alt="유튜브">
                <a href="https://www.youtube.com/watch?v=xV7WNdZ0zug&list=PLBXfMpjrxeIEqNC7pkyBjgb61nB06NjgA" target="_blank" title="공식채널" style="position: absolute; left: 16.25%; top: 74.72%; width: 67.14%; height: 12.98%; z-index: 2;"></a>
            </div>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/xV7WNdZ0zug?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>                
        </div> 

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2505_04.jpg" alt="기대평 이벤트">              
        </div> 
        {{-- 이모티콘 댓글 --}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_emoticon2_partial')
        @endif 

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2505_05.jpg" alt="소문내기 이벤트">             
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2505_06.jpg" alt="소문내기 이벤트 sns">
                <a href="https://gall.dcinside.com/board/lists?id=government" title="공갤" target="_blank" style="position: absolute; left: 5.89%; top: 39.64%; width: 16.34%; height: 50.3%; z-index: 2;"></a>
                <a href="https://top.cafe.daum.net" title="구꿈사" target="_blank" style="position: absolute; left: 24.64%; top: 39.64%; width: 16.34%; height: 50.3%; z-index: 2;"></a>
                <a href="https://section.cafe.naver.com/ca-fe/" title="네이버카페" target="_blank" style="position: absolute; left: 43.39%; top: 39.64%; width: 16.34%; height: 50.3%; z-index: 2;"></a>
                <a href="https://www.instagram.com" title="인스타그램"  target="_blank" style="position: absolute; left: 63.57%; top: 39.64%; width: 16.34%; height: 50.3%; z-index: 2;"></a>
            </div>
        </div>

        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
        @endif 
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
        function loginCheck(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
        }
    </script>
    
@stop