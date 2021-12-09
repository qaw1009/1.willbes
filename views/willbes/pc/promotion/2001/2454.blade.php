@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        /*.evtCtnsBox .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5);}*/
                
        /************************************************************/

        .sky {position:fixed;top:150px;right:10px;z-index:1;} 
        .sky a {display:block; margin-bottom:10px}

        .evtTop00 {background:#0a0a0a}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/12/2454_top_bg.jpg) no-repeat center top;}     

        .evt01 {background:#f1f1f1;} 

        .evt02 {background:#f1f1f1;}

        .Pstyle {
        opacity: 0;
        display: none;
        position: relative;
        width: auto;
        }
        .b-close {
        position: absolute;
        right: 0;
        top: -60px;
        display: inline-block;
        cursor: pointer;
        font-size: 40px;
        font-weight: bold;
        color:#fff;
        }
        .video_main {max-width: 786px; width: 80vw;}

        .evt03, .evt04, .evt05, .evt06{padding-bottom:100px;}

        .evt07 {background:#2ddbab;}
    
        .evt08 {padding-bottom:100px;}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#tip">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2454_sky.png" alt="경찰학 학습팁" >
            </a>          
        </div>

        <div class="evtCtnsBox evtTop00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1009_first.jpg" title="대한민국 경찰학원 1위">
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2454_top.jpg" title="장정훈 경찰학">                    
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2454_01.jpg" title="베테랑 장정훈">           
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">            
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2454_02.jpg" title="클릭 후기">
                <a href="javascript:videoPop('#vid1');" title="" style="position: absolute;left: 9.73%;top: 25.16%;width: 16.2%;height: 7.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid2');" title="" style="position: absolute;left: 41.73%;top: 25.16%;width: 16.2%;height: 7.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid3');" title="" style="position: absolute;left: 73.73%;top: 25.16%;width: 16.2%;height: 7.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid4');" title="" style="position: absolute;left: 24.73%;top: 57.16%;width: 16.2%;height: 7.31%;z-index: 2;"></a>
                <a href="javascript:videoPop('#vid5');" title="" style="position: absolute;left: 58.73%;top: 57.16%;width: 16.2%;height: 7.31%;z-index: 2;"></a>            
            </div>    
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2454_03.jpg" title="그룹강의1">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif       
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2454_04.jpg" title="그룹강의2">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif         
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2454_05.jpg" title="그룹강의3">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))
            @endif          
        </div>

        <div class="evtCtnsBox evt06" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2454_06.jpg" title="그룹강의4">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>4))
            @endif        
        </div>

        <div class="evtCtnsBox evt07" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2454_07.jpg" title="1등인 이유">           
        </div>

        <div class="evtCtnsBox evt08" data-aos="fade-up" id="tip">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2454_08.jpg" title="꿀팁 대방출">
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif       
        </div>

	</div>

     <!-- 비디오 영상팝업 리스트 -->

     <div id="vid1" style="display: none;">
        <span class="b-close"><i class="fa fa-times" aria-hidden="true"></i></span>
        <video id="movie1" class="video_main"  controls  poster="https://static.willbes.net/public/images/njob/promotion/2021/12/1034_poster_01.jpg">
            <source src="https://static.willbes.net/public/images/njob/promotion/2021/12/1034_video_01.mp4" type='video/mp4' />
        </video>
    </div>
    <div id="vid2" style="display: none;">
        <span class="b-close"><i class="fa fa-times" aria-hidden="true"></i></span>
        <video id="movie2" class="video_main" controls  poster="https://static.willbes.net/public/images/njob/promotion/2021/12/1034_poster_02.jpg">
            <source src="https://static.willbes.net/public/images/njob/promotion/2021/12/1034_video_02.mp4" type='video/mp4' />
        </video>
    </div>
    <div id="vid3" style="display: none;">
        <span class="b-close"><i class="fa fa-times" aria-hidden="true"></i></span>
        <video id="movie3" class="video_main" controls poster="https://static.willbes.net/public/images/njob/promotion/2021/12/1034_poster_03.jpg">
            <source src="https://static.willbes.net/public/images/njob/promotion/2021/12/1034_video_03.mp4" type='video/mp4' />
        </video>
    </div>
    <div id="vid4" style="display: none;">
        <span class="b-close"><i class="fa fa-times" aria-hidden="true"></i></span>
        <video id="movie4" class="video_main" controls poster="https://static.willbes.net/public/images/njob/promotion/2021/12/1034_poster_04.jpg">
            <source src="https://static.willbes.net/public/images/njob/promotion/2021/12/1034_video_04.mp4" type='video/mp4' />
        </video>
    </div>
    <div id="vid5" style="display: none;">
        <span class="b-close"><i class="fa fa-times" aria-hidden="true"></i></span>
        <video id="movie5" class="video_main" controls poster="https://static.willbes.net/public/images/njob/promotion/2021/12/1034_poster_05.jpg">
            <source src="https://static.willbes.net/public/images/njob/promotion/2021/12/1034_video_05.mp4" type='video/mp4' />
        </video>
    </div>
    <div id="vid6" style="display: none;">
        <span class="b-close"><i class="fa fa-times" aria-hidden="true"></i></span>
        <video id="movie6" class="video_main" controls poster="https://static.willbes.net/public/images/njob/promotion/2021/12/1034_poster_06.jpg">
            <source src="https://static.willbes.net/public/images/njob/promotion/2021/12/1034_video_06.mp4" type='video/mp4' />
        </video>
    </div>
    
     <!-- End evtContainer -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

        <script>
        $( document ).ready( function() {
            AOS.init();
        } );

        // 비디오팝업
        function videoPop(id) { 
            $(id).bPopup({
                positionStyle:'fixed',            
                onClose: function(){
                    $('video').each(function(){
                        $(this).get(0).pause();
                    });
                }
            });
        } 
        </script>
        
    </script>

    <iframe id="ne_tgmiframe_0" width="0" height="0" style="position:absolute;width:0px;height:0px;display:none;" src="about:blank"></iframe><div id="criteo-tags-div" style="display: none;"></div><div class="b-modal __b-popup1__" style="background-color: rgb(0, 0, 0); position: fixed; inset: 0px; opacity: 0.7; z-index: 9998; cursor: pointer;"></div><div id="vid1" style="left: 567px; position: fixed; top: 211.5px; z-index: 9999; opacity: 1; display: block;">
    <span class="b-close"><i class="fa fa-times" aria-hidden="true"></i></span>
    <video id="movie1" class="video_main" controls="">
    <source src="https://www.youtube.com/embed/PLp3fcmi4AE?rel=0" type="video/mp4">
    </video>
    </div></body>

    

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop