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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative; background:#fff}
        /************************************************************/

        .sky {position:fixed;top:200px;right:15px;z-index:200;}
        .sky a {display:block;margin-top:10px;}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/10/2382_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:#eaeaea;}
        .youtube {width:945px; margin:0 auto;}
        .youtube iframe {width:945px; height:531px}

        .wb_cts03 {background:#f5f5f5;}
        .wb_cts04 {background:#75caef url(https://static.willbes.net/public/images/promotion/2021/10/2382_04_bg.jpg) repeat-x; padding:150px 0}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#event"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2382_sky.png" alt="무료수강권">
            </a>
        </div>

        <div class="evtCtnsBox wb_top" data-aos="fade-up">           
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2382_top.jpg" alt="신기훈 행정법" />         
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2382_01.jpg" alt="q&a" data-aos="fade-left"/>        
        </div>  

        <div class="evtCtnsBox wb_cts02" data-aos="fade-right">         
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2382_02_01.jpg" alt="합격의 길" />      
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/nQFyta6T3SM?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>  
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2382_02_02.jpg" alt="커리큘럼" />
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2382_03.jpg" alt="q&a" data-aos="fade-left"/>        
        </div>    

        <div class="evtCtnsBox wb_cts04">
            <div data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2382_04_01.gif" alt=""/>
                <div class="wrap" id="event">                  
                    <img src="https://static.willbes.net/public/images/promotion/2021/10/2382_04_02.jpg" alt="수강신청" /> 
                    <a href="https://pass.willbes.net/book/index/cate/3019?cate_code=3019&subject_idx=1111&prof_idx=51206" target="_blank" title="강좌보기" style="position: absolute; left: 11.61%; top: 67.7%; width: 36.43%; height: 10.68%; z-index: 2;"></a>
                </div>   
                <div class="wrap mt50">                  
                    <img src="https://static.willbes.net/public/images/promotion/2021/10/2382_04_03.jpg" alt="이벤트" /> 
                    <a href="https://gall.dcinside.com/board/lists?id=government" title="디씨" target="_blank" style="position: absolute; left: 7.68%; top: 84.86%; width: 15.98%; height: 11.69%; z-index: 2;"></a>
                    <a href="https://cafe.daum.net/9glade" title="다음카페" target="_blank" style="position: absolute; left: 24.55%; top: 84.86%; width: 15.98%; height: 11.69%; z-index: 2;"></a>
                    <a href="https://cafe.naver.com/gugrade" title="네이버카페" target="_blank" style="position: absolute; left: 40.63%; top: 84.86%; width: 15.98%; height: 11.69%; z-index: 2;"></a>
                </div>
                <div class="wrap">   
                    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                        @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N')){{--기존SNS예외처리시--}}
                    @endif 
                </div>
            </div>

        </div>           

    </div>
    <!-- End Container -->
 
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $( document ).ready( function() {
        AOS.init();
    } );
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop