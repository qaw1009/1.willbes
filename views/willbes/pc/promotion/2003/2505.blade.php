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
        .sky {position:fixed;top:200px;right:5px;z-index:11;}
        .sky a {display:block; margin-top:5px}  

        .evttop {background:url(https://static.willbes.net/public/images/promotion/2022/01/2505_top_bg.jpg) no-repeat center top;} 
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2022/01/2505_01_bg.jpg) no-repeat center top;} 
        .evt01 span {position:absolute; top:100px; left:50%; margin-left:100px; z-index: 10;}
       
        .evt03 {background:#f4f4f4; padding-bottom:100px}
        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2022/02/2505_04_bg.jpg) repeat-x center top;} 


        /*분할 유튜브*/
        .youtube_contents {position:relative;width:1050px;margin:0 auto 50px; z-index:1;}
        .youtube_divide {margin:30px -15px 0;padding: 40px 0 0 30px;background:#fff;border-radius: 5px;box-shadow: -10px 10px 30px rgba(0,0,0,.1);}
        .youtube_divide .preview_area {display:inline-block;padding-bottom:40px;text-align:left;}
        .youtube_divide .preview_area .avi_box {width:730px;height:411px;margin-bottom:20px;} 
        .youtube_divide .preview_area h2 {display:block;font-size:24px;font-weight:700;line-height:32px;color:#000;overflow:hidden;text-overflow:ellipsis;word-wrap:normal;margin-bottom:4px;max-width:730px;}

        .youtube_divide .preview_list_area {display:inline-block;vertical-align:top;padding-left:12px;width:304px;text-align:left;}
        .youtube_divide .preview_list_area .preview_list {height:455px;box-sizing:border-box;overflow-y:scroll;}
        .youtube_divide .preview_list_area .preview_list ul li {margin-bottom:10px;}
        .youtube_divide .preview_list_area .preview_list ul li .num_box {width:25px;display:inline-block; color:#666;padding-right:10px; vertical-align:middle;box-sizing:border-box;}
        .youtube_divide .preview_list_area .preview_list ul li .thum_box {display: inline-block; width: 120px;height: 70px;box-sizing: border-box;vertical-align: middle;overflow: hidden;}
        /*.youtube_divide .preview_list_area .preview_list ul li.on .thum_box {border:3px solid #00E752;}*/
        .youtube_divide .preview_list_area .preview_list ul li .thum_box img {width:100%;transition:0.5s;}
        .youtube_divide .preview_list_area .preview_list ul li .text_box {padding-left:10px;display:inline-block;width:123px;box-sizing:border-box;vertical-align: middle;}
        .youtube_divide .preview_list_area .preview_list ul li .text_box p {font-size:13px;font-weight:400;line-height:18px;color:#000;margin-bottom: 2px;
                                                                            overflow:hidden;text-overflow:ellipsis;word-wrap:break-word;display:-webkit-box;-webkit-line-clamp:2;}
        .youtube_divide .preview_list_area .preview_list ul li .text_box span {font-size:12px;font-weight:400;line-height:18px;color:#666;}     

        #Popup2505 {position:fixed; top:100px; left:50%; width:850px; height:482px; margin-left:-425px; display: block;}
    </style>

    <div class="evtContent NSK" id="evtContainer"> 
        {{--유튜브 모달팝업--}}
        <div id="Popup2505" class="PopupWrap modal willbes-Layer-popBox">
            <div class="Layer-Cont" id="youtube_box">
                <iframe width="850" height="482" src="https://www.youtube.com/embed/xV7WNdZ0zug" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <ul class="btnWrapbt popbtn mt10">
                <li class="subBtn black"><a href="#none" class="btn-popup-close" data-popup-idx="2505" data-popup-hide-days="1">하루 보지않기</a></li>
                <li class="subBtn black"><a href="#none" class="btn-popup-close" data-popup-idx="2505" data-popup-hide-days="">Close</a></li>
            </ul>
        </div>
        <div id="PopupBackWrap" class="willbes-Layer-Black"></div>        
    
        {{--
        <div class="sky" id="QuickMenu">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2505_sky.png" alt="런칭기념event">
            <a href="#evt04"><img src="https://static.willbes.net/public/images/promotion/2022/01/2505_sky2.png" alt="기대평남기기"></a>
            <a href="#evt04"><img src="https://static.willbes.net/public/images/promotion/2022/01/2505_sky3.png" alt="소문내고 선물받기"></a>
        </div>
        --}}

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
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2505_03.jpg" alt="유튜브">
            <div class="youtube_contents">
                <div class="youtube_divide">             
                    <div class="preview_area">
                        <div class="avi_box">
                            <iframe webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="730" height="411" frameborder="false" scrolling="no" src="https://www.youtube.com/embed/O-3vSZOagkI?rel=0"></iframe>
                        </div>
                        <h2 class="avi_title">의존의 전치사 「on」이 포함된 동사구를 알아보자!</h2>
                    </div>
                    <div class="preview_list_area">
                        <div class="preview_list">
                            <ul>
                                <li class="on">
                                    <a href="#tab1" class="active">
                                        <span class="num_box" data-num="1">1</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2022/02/2505_03_s01.jpg" alt="의존의 전치사 「on」이 포함된 동사구를 알아보자!"></div>
                                        <div class="text_box">
                                            <p>의존의 전치사 「on」이 포함된 동사구를 알아보자!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab2">
                                        <span class="num_box" data-num="2">2</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2022/02/2505_03_s02.jpg" alt="의존의 전치사 「to」가 포함된 동사구를 알아보자!"></div>
                                        <div class="text_box">
                                            <p>의존의 전치사 「to」가 포함된 동사구를 알아보자! </p>
                                        </div>
                                    </a>
                                </li>    
                                
                                <li class="">
                                    <a href="#tab3">
                                        <span class="num_box" data-num="3">3</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2022/02/2505_03_s03.jpg" alt="발생의 부사「up」이 포함된 동사구를 알아보자!"></div>
                                        <div class="text_box">
                                            <p>발생의 부사「up」이 포함된 동사구를 알아보자!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab4">
                                        <span class="num_box" data-num="4">4</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2022/03/2505_03_s04.png" alt="유발(시작)의 부사「off」가 포함된 공무원 영어 필수 동사구를 알아보자!"></div>
                                        <div class="text_box">
                                            <p>유발(시작)의 부사「off」가 포함된 공무원 영어 필수 동사구를 알아보자!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab5">
                                        <span class="num_box" data-num="5">5</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2022/03/2505_03_s05.png" alt="이용의 전치사「on」이 포함된 공무원 영어 필수 동사구를 알아보자!"></div>
                                        <div class="text_box">
                                            <p>이용의 전치사「on」이 포함된 공무원 영어 필수 동사구를 알아보자!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab6">
                                        <span class="num_box" data-num="6">6</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2022/04/2505_03_s06.jpg" alt="이전의 부사「over」가 포함된 동사구를 알아보자!"></div>
                                        <div class="text_box">
                                            <p>이전의 부사「over」가 포함된 동사구를 알아보자!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab7">
                                        <span class="num_box" data-num="7">7</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2022/04/2505_03_s07.jpg" alt="숙고의 부사 「over」가 포함된 동사구를 알아보자!"></div>
                                        <div class="text_box">
                                            <p>숙고의 부사 「over」가 포함된 동사구를 알아보자!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab8">
                                        <span class="num_box" data-num="8">8</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2022/04/2505_03_s08.jpg" alt="지탱, 지지의 부사 「up」이 포함된 동사구를 알아보자!"></div>
                                        <div class="text_box">
                                            <p>지탱, 지지의 부사 「up」이 포함된 동사구를 알아보자!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab9">
                                        <span class="num_box" data-num="9">9</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2022/04/2505_03_s09.jpg" alt="향상, 증진의 부사「up」이 포함된 동사구를 알아보자!"></div>
                                        <div class="text_box">
                                            <p>향상, 증진의 부사「up」이 포함된 동사구를 알아보자!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab10">
                                        <span class="num_box" data-num="10">10</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2022/04/2505_03_s10.jpg" alt="전부, 완성의 부사「up」이 포함된 동사구를 알아보자!"></div>
                                        <div class="text_box">
                                            <p>전부, 완성의 부사「up」이 포함된 동사구를 알아보자!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab11">
                                        <span class="num_box" data-num="11">11</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2022/04/2505_03_s11.jpg" alt="접근의 부사「up」이 포함된 동사구를 알아보자!"></div>
                                        <div class="text_box">
                                            <p>접근의 부사「up」이 포함된 동사구를 알아보자!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab12">
                                        <span class="num_box" data-num="12">12</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2022/04/2505_03_s12.jpg" alt="접근의 부사「up」이 포함된 동사구를 알아보자!"></div>
                                        <div class="text_box">
                                            <p>해결, 제조의 부사「out」이 포함된 동사구를 알아보자!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab13">
                                        <span class="num_box" data-num="13">13</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2022/05/2505_03_s13.jpg" alt="조사, 참견의 전치사「into」가 포함된 동사구를 알아보자!"></div>
                                        <div class="text_box">
                                            <p>조사, 참견의 전치사「into」가 포함된 동사구를 알아보자!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab14">
                                        <span class="num_box" data-num="14">14</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2022/05/2505_03_s14.jpg" alt="요청, 찾기의 전치사「for」가 포함된 동사구를 알아보자!"></div>
                                        <div class="text_box">
                                            <p>요청, 찾기의 전치사「for」가 포함된 동사구를 알아보자!</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="#tab15">
                                        <span class="num_box" data-num="15">15</span>
                                        <div class="thum_box"><img src="https://static.willbes.net/public/images/promotion/2022/05/2505_03_s15.png" alt="분리의 부사 「away」가 포함된 동사구를 알아보자!"></div>
                                        <div class="text_box">
                                            <p>분리의 부사 「away」가 포함된 동사구를 알아보자!</p>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>          
                </div>
            </div>
            <div>
            <a href="https://www.youtube.com/watch?v=xV7WNdZ0zug&list=PLBXfMpjrxeIEqNC7pkyBjgb61nB06NjgA" target="_blank" title="신규영상" ><img src="https://static.willbes.net/public/images/promotion/2022/02/2505_03_btn.png" alt="신규영상"></a>     
            </div>         
        </div> 

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/02/2505_04.jpg" alt="갓덕현 강좌 할인받아 열공하세요!">
        </div>

        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif

        <!--
        <div class="evtCtnsBox evt04" id="evt04">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2505_04.jpg"  alt="기대평 이벤트">              
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
        -->
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

        //유튜브
        var tab1_url = "https://www.youtube.com/embed/O-3vSZOagkI?rel=0";
        var tab2_url = "https://www.youtube.com/embed/OMQ-M2ncBKk?rel=0"; 
        var tab3_url = "https://www.youtube.com/embed/aGnegIlcaZs?rel=0";
        var tab4_url = "https://www.youtube.com/embed/CMAQY5L9O0Q?rel=0"; 
        var tab5_url = "https://www.youtube.com/embed/L8Qgx36delE?rel=0";
        var tab6_url = "https://www.youtube.com/embed/qbFtvuEkOi4?rel=0";
        var tab7_url = "https://www.youtube.com/embed/h7BFfXFEMg4?rel=0";
        var tab8_url = "https://www.youtube.com/embed/EE5tuqTCr6s?rel=0";
        var tab9_url = "https://www.youtube.com/embed/PuKBhLoy2vM?rel=0";
        var tab10_url = "https://www.youtube.com/embed/zjjeBmpGCnE?rel=0";
        var tab11_url = "https://www.youtube.com/embed/5p3JeCnmDhk?rel=0";
        var tab12_url = "https://www.youtube.com/embed/xONg4pHjcUY?rel=0";
        var tab13_url = "https://www.youtube.com/embed/j5vOgjlYmA0?rel=0";
        var tab14_url = "https://www.youtube.com/embed/J2pu3DCvqlA?rel=0";
        var tab15_url = "https://www.youtube.com/embed/_qUiLoyII0Q?rel=0";

        $(function() {
            $(".preview_list ul li a").click(function(){
                var activeTab = $(this).attr("href");
                var video_tab_url = '';
                var html_str = '';
                if(activeTab == "#tab1"){
                    video_tab_url = tab1_url;
                }else if(activeTab == "#tab2"){
                    video_tab_url = tab2_url; 
                }else if(activeTab == "#tab3"){
                    video_tab_url = tab3_url;                
                }else if(activeTab == "#tab4"){
                    video_tab_url = tab4_url;                
                }else if(activeTab == "#tab5"){
                    video_tab_url = tab5_url;                
                }else if(activeTab == "#tab6"){
                    video_tab_url = tab6_url;                
                }else if(activeTab == "#tab7"){
                    video_tab_url = tab7_url;                
                }else if(activeTab == "#tab8"){
                    video_tab_url = tab8_url;                
                }else if(activeTab == "#tab9"){
                    video_tab_url = tab9_url;              
                }else if(activeTab == "#tab10"){
                    video_tab_url = tab10_url;                
                }else if(activeTab == "#tab11"){
                    video_tab_url = tab11_url;              
                }else if(activeTab == "#tab12"){
                    video_tab_url = tab12_url;    
                }else if(activeTab == "#tab13"){
                    video_tab_url = tab13_url;           
                }else if(activeTab == "#tab14"){
                    video_tab_url = tab14_url;           
                }else if(activeTab == "#tab15"){
                    video_tab_url = tab15_url;           
                }
                html_str = '<iframe src="' + video_tab_url + '" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="730" height="411" frameborder="false" scrolling="no"></iframe>'
                $(this).addClass("active");
                $('.avi_box').html(html_str);
                $('.avi_title').html($(this).find('p').html());
            });
        });
    </script>

    <script type="text/javascript">  
        //유튜브 모달팝업 close 버튼 클릭
        var youtube_html;
        $(document).ready(function() {
            $('.PopupWrap').on('click', '.btn-popup-close', function() {
                youtube_html = $('#youtube_box');
                $('#youtube_box').html('');

                var popup_idx = $(this).data('popup-idx');
                var hide_days = $(this).data('popup-hide-days');

                // 팝업 close
                $(this).parents('.PopupWrap').fadeOut();

                //하루 보지않기
                if (hide_days !== '') {
                    var domains = location.hostname.split('.');
                    var domain = '.' + domains[domains.length - 2] + '.' + domains[domains.length - 1];
                    $.cookie('_wb_client_popup_' + popup_idx, 'done', {
                        domain: domain,
                        path: '/',
                        expires: hide_days
                    });
                }

                // 모달팝업창이 닫힐 경우 백그라운드 레이어 숨김 처리
                if ($(this).parents('.PopupWrap').hasClass('modal') === true) {
                    $('#PopupBackWrap').fadeOut();
                }
            });

            // 백그라운드 클릭 --}}
            $('#PopupBackWrap.willbes-Layer-Black').on('click', function() {
                youtube_html = $('#youtube_box');
                $('#youtube_box').html('');
                $('.PopupWrap.modal').fadeOut();
                $(this).fadeOut();
            });

            // 팝업 오늘하루안보기 하드코딩
            if($.cookie('_wb_client_popup_2505') !== 'done') {
                $('.PopupWrap').fadeIn();
                $('#PopupBackWrap').fadeIn();
            } else {
                $('#Popup2505').hide();
            }
        });
    </script>
    
@stop