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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/
    /*****************************************************************/     
    
        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/01/2498_top_bg.jpg) no-repeat center top;} 
        .evt_01 {background:url(https://static.willbes.net/public/images/promotion/2022/01/2498_01_bg.jpg) no-repeat center top;} 
        .evt_02 {background:#ebe2d4}
        .evt_03 {background:url(https://static.willbes.net/public/images/promotion/2022/01/2498_03_bg.jpg) no-repeat center top;}
        .evt_04 {background:#ebe2d4}
        .evt_05 {width:1120px; margin:0 auto; padding-bottom:100px}

        .evt_05 .title {font-size:70px; color:#333; line-height:1.2; margin:100px 0 50px;}
        .evt_05 .lecwrap {font-size:20px; border:3px solid #1e1e1e; padding:30px 50px; position: relative; text-align:left; width:980px; margin:0 auto}
        .evt_05 .lecwrap > span {background:#1e1e1e; color:#fff; font-size:24px; padding:10px 30px; position:absolute; top:-22px; left:20px; width:auto; border-radius:30px; z-index: 2;}
        .evt_05 .lecwrap > div {border-bottom:1px solid #ccc; padding:20px 0; position: relative;}
        .evt_05 .lecwrap > div a {display:inline-block; background:#2a4aaa; color:#fff; padding:10px 20px; position:absolute; right:0; top:10px; font-size:18px}
        .evt_05 .lecwrap > div a:hover {background:#1e1e1e; color:#fff;}
        .evt_05 .lecwrap > div:last-child {border:0}

        .evt_06 {background:url(https://static.willbes.net/public/images/promotion/2022/01/2498_06_bg.jpg) no-repeat center top;}


        .evt08 {padding-top:100px}
        .evt08 .evtBtns{width:1120px; margin:0 auto 40px; display:flex;}
        .evt08 .evtBtns .tit{font-size:20px; font-weight:bold; color:#22417e; letter-spacing:-1px; margin:0 20px 0 80px; line-height:92px;}
        .evt08 .evtBtns a{color:#fff; font-size:16px; font-weight:bold; display:flex; align-items:center; justify-content:center; background-color:#22417e; width:92px; height:92px; border-radius:20px; margin-left:10px; line-height:22px;}
        .evt08 .evtBtns a:hover {background:#000}
    </style>


    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt_top" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2498_top.jpg" alt="7급 PSAT advanced" />
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2498_01.jpg" alt="7급 PSAT 강사진" />
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2498_02.jpg" alt="" />
        </div>   

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2498_03.jpg" alt="강의/수강특전" />           
        </div> 

        <div class="evtCtnsBox evt_04" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2498_04.jpg" alt="" />
        </div>  
        
        <div class="evtCtnsBox evt_05" data-aos="fade-up">  
            <div class="mt50">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2498_05_01.jpg" alt="" />
            </div>
            <div class="mt50">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2498_05_02.jpg" alt="" />
            </div>
            <div class="mt50">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2498_05_03.jpg" alt="" />
            </div>
            <div class="mt50">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2498_05_04.jpg" alt="" />
            </div>
            <div class="mt50">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2498_05_05.jpg" alt="" />
            </div>
            <div class="title NSK-Black">
                PSAT UP-GRADE!
            </div>
            <div class="lecwrap">
                <span>학원실강+동영상</span>
                <div>
                    7급 Advanced  PSAT CLASS PASS 반
                    <a href="https://pass.willbes.net/pass/offPackage/index?cate_code=3143" target="_blank">수강신청하기 ></a>
                </div>
                <div>
                    7급 석치수 자료해석 Advanced  CLASS
                    <a href="https://pass.willbes.net/pass/offLecture/show/cate/3143/prod-code/190126" target="_blank">수강신청하기 ></a>
                </div>
                <div>
                    7급 박준범 상황판단 Advanced  CLASS
                    <a href="https://pass.willbes.net/pass/offLecture/show/cate/3143/prod-code/190127" target="_blank">수강신청하기 ></a>
                </div>
                <div>
                    7급 이나우 언어논리 Advanced  CLASS  
                    <a href="https://pass.willbes.net/pass/offLecture/show/cate/3143/prod-code/190128" target="_blank">수강신청하기 ></a>
                </div>
                <div>
                    7급 한승아 언어논리 Advanced  CLASS  
                    <a href="https://pass.willbes.net/pass/offLecture/show/cate/3143/prod-code/190129" target="_blank">수강신청하기 ></a>
                </div>
            </div>

            <div class="lecwrap mt50">
                <span>동영상</span>
                <div>
                    7급 Advanced PSAT CLASS PASS 반
                    <a href="https://pass.willbes.net/package/show/cate/3103/pack/648002/prod-code/190120" target="_blank">수강신청하기 ></a>
                </div>
                <div>
                    7급 석치수 자료해석 Advanced  CLASS
                    <a href="https://pass.willbes.net/lecture/show/cate/3103/pattern/only/prod-code/190115" target="_blank">수강신청하기 ></a>
                </div>
                <div>
                    7급 박준범 상황판단 Advanced  CLASS
                    <a href="https://pass.willbes.net/lecture/show/cate/3103/pattern/only/prod-code/190116" target="_blank">수강신청하기 ></a>
                </div>
                <div>
                    7급 이나우 언어논리 Advanced  CLASS  
                    <a href="https://pass.willbes.net/lecture/show/cate/3103/pattern/only/prod-code/190117" target="_blank">수강신청하기 ></a>
                </div>
                <div>
                    7급 한승아 언어논리 Advanced  CLASS  
                    <a href="https://pass.willbes.net/lecture/show/cate/3103/pattern/only/prod-code/190118" target="_blank">수강신청하기 ></a>
                </div>
            </div>
        </div>    
        {{--
        <div class="evtCtnsBox evt_06" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2498_06.jpg" alt="" />
        </div>  

        
        <div class="evtCtnsBox evt08" data-aos="fade-up">
            <div class="evtBtns">
                <div class="tit">바로가기</div>
                <a href="https://cafe.naver.com/gugrade" title="공드림" target="_blank">공드림</a>
                <a href="https://cafe.naver.com/kkaebangjeong" title="7공9공" target="_blank">7공9공</a>
                <a href="https://bit.ly/3gzszmB" title="독공사" target="_blank">독공사</a>
                <a href="https://cafe.daum.net/9glade/O6Qh" title="9꿈사" target="_blank">9꿈사</a>
                <a href="https://gall.dcinside.com/mgallery/board/lists/?id=7gradekid" title="공무원갤러리" target="_blank">7급<br>공무원<br>갤러리</a>
                <a href="https://section.blog.naver.com/BlogHome.naver" title="네이버블로그" target="_blank">네이버<br>블로그</a>
                <a href="https://www.instagram.com/" title="인스타그램" target="_blank">인스타그램</a>
                <a href="https://facebook.com" title="페이스북" target="_blank">페이스북</a>
            </div>              
            <div class="wrap">                    
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2498_07.jpg" title="소문내기 이벤트">
                <a href="javascript:void(0);" title="링크복사" onclick="copyTxt();" style="position: absolute; left: 18.75%; top: 5.47%; width: 32.68%; height: 7.42%; z-index: 2;"></a>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="소문내기 다운" style="position: absolute; left: 52.5%; top: 5.47%; width: 32.68%; height: 7.42%; z-index: 2;"></a>
            </div>
        </div> 
        --}}

        <!--
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N', 'login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www'), 'is_public' => true)){{--기존SNS예외처리시, 로그인페이지 이동--}}
        @endif
        -->
        
         
    </div>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );    
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

   <!-- End Container -->

@stop