@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/


        /************************************************************/

        .sky {position:fixed;top:200px;right:10px;z-index:100;}
        .sky a {display:block; margin-bottom:10px}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/11/2826_top_bg.jpg) no-repeat center;}

        .evt01 {background:#2D57A3}

        .evt02 {background:#37383A;position:relative;}
        .youtube {position:absolute; top:582px; left:50%;z-index:1;margin-left:-430px}
        .youtube iframe {width:860px; height:484px}

        .evt03 {background:#F5F5F5}

        .evt05 {background:#F5F5F5;padding-bottom:250px;}
        .evt05 .infoText {margin-top:50px; color:#fff; font-size:30px}        
        /*교수 롤링*/
        .section_pro {
        background:url(https://static.willbes.net/public/images/promotion/2022/11/2826_05_bg.jpg) no-repeat center top; 
                   position:relative;height:1000px;clear:both;}      
        .section_pro .box_pro {position:absolute; top:700px; left:0; width:100%; z-index:1}
        .section_pro .box_pro .bx-wrapper{max-width:100% !important;}
        .section_pro .box_pro li {display:inline; float:left;height:492px;}
        .section_pro .box_pro li img {
        width: 100%;
        height: 100%;        
        }

        .evt06 {background:#F5F5F5;}

        .evt07 {padding-bottom:100px; width:1120px; margin:0 auto}
        .evt07 .title {font-size:30px; font-weight:bold; margin-bottom:10px; text-align:left}        
        .pass_apply {margin:0 auto;width:500px; height:80px; line-height:80px; left:50%; }
        .pass_apply a {display:block; border-radius:50px; color:#fff; background:#001334; font-size:40px}
        .pass_apply a:hover {box-shadow: 10px 10px 20px 1px rgba(0,0,0,0.2); color:#fff455}

        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
        }
        .b-close {
            right: 10px;
            top: 50px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
        }
        .Pstyle .content {height:auto; width:auto;}

    </style>
    
    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2827" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/11/2826_sky01.png" alt="경찰학 스페셜 이벤트"></a>
            <a href="#coupon"><img src="https://static.willbes.net/public/images/promotion/2022/11/2826_sky03.png" title="소문내기"></a> 
            <a href="#lec"><img src="https://static.willbes.net/public/images/promotion/2022/11/2826_sky02.png" title="경찰학 완성반 신청하기"></a> 
        </div>

        <div class="evtCtnsBox wb_top" data-aos="fade-down">           
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2826_top.jpg"  alt="100일 완성반" />   
		</div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2826_01.jpg"  alt="오리지날 경찰학"/>    
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/ojZcGpQXrcs?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>         
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2826_02.jpg"  alt="합격률"/>               
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">      
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2826_03.jpg"  alt="커리큘럼"/>    
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2826_04.jpg"  alt="경찰학 교재"/>
                <a href="javascript:go_popup1()" title="핵심 서브노트" style="position: absolute;left: 40.66%;top: 45.25%;width: 14.69%;height: 2.89%;z-index: 2;"></a>
                <a href="javascript:go_popup2()" title="21개년 총알기출 ox" style="position: absolute;left: 40.66%;top: 65.65%;width: 14.69%;height: 2.89%;z-index: 2;"></a>
                <a href="javascript:go_popup3()" title="플러스 100제" style="position: absolute;left: 40.66%;top: 86.05%;width: 14.69%;height: 2.89%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <div class="section_pro">                
                <div class="box_pro">
                    <ul class="slide_pro">
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment01.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment02.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment03.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment04.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment05.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment06.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment07.png" alt="" /></li>
                        <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825_comment08.png" alt="" /></li>                                                           
                    </ul>
                </div>  
            </div>
        </div>

        <div class="evtCtnsBox evt06">      
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2826_06.jpg"  alt="그레이스 호퍼 명언"/>    
        </div>

        <div class="evtCtnsBox evt08" data-aos="fade-up" id="coupon">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2826_08.jpg" title="소문내기 이벤트">
                <a href="javascript:void(0);" onclick="giveCheck(); return false;" title="쿠폰받기" style="position: absolute;left: 24.32%;top: 66.77%;width: 51.58%;height: 5.05%;z-index: 2;"></a>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이벤트 이미지 다운로드" style="position: absolute;left: 57.32%;top: 77.62%;width: 26.46%;height: 6.55%;z-index: 2;"></a>
            </div>
        </div>

        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif 

        <div class="evtCtnsBox evt07" data-aos="fade-up" id="lec">                     
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2826_07.jpg"  alt="후회없는 선택"/>
            <div class="pass_apply NSK-Black"><a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1043" target="_blank">신청하기 ></a></div> 
        </div>

        <!--레이어팝업-->
        <div id="popup1" class="Pstyle">
            <span class="b-close"></span>
            <div class="content1">                  
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_textbook01.png" class="off" alt="" />    
            </div> 
        </div>    
        <div id="popup2" class="Pstyle">
            <span class="b-close"></span>   
            <div class="content2">         
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_textbook02.png" class="off" alt="" />  
            </div> 
        </div>
        <div id="popup3" class="Pstyle">    
            <span class="b-close"></span>
            <div class="content3">            
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2825_textbook03.png" class="off" alt="" />  
            </div>
        </div>

    </div>

    <!-- End Container -->
    
    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });

      /*롤링*/
      $(document).ready(function() {
            var BxBook = $('.slide_pro').bxSlider({
                slideWidth: 533,
                slideMargin: 40,
                maxSlides:10,
                minSlides:1,
                moveSlides: 1,
                ticker:true,
                speed:40000,
                onSlideAfter: function() {
                    BxBook.stopAuto();
                    BxBook.startAuto();
                }
            });
        });

        /*레이어팝업*/     

        function go_popup1() {
            $('#popup1').bPopup();
        }   
        function go_popup2() {
            $('#popup2').bPopup();
        }
        function go_popup3() {
            $('#popup3').bPopup();
        }

    </script>
      
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop