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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/06/2694_top_bg.jpg) no-repeat center top;}
        .wb_01 span {position:absolute; left:50%; top:-200px; margin-left:-235px; z-index: 2;}

        .wb_01 {background:#ffe1c8;}
        .wb_02 {background:#242424;}
        .wb_03 {background:#ffcf00; padding-bottom:130px}
        .wb_03 a {display:block; width:600px; margin:30px auto 0; font-size:30px; background:#000; color:#fff; padding:20px 0; text-align:center; border-radius:50px; animation: colorBlink 1s ease-in-out infinite}
        .wb_04 {background:#335ce8;}

        /* 이용안내 */
        .wb_info {padding:100px 0; color:#3a3a3a; line-height:1.4; background:#f4f4f4}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all}
        .guide_box h2 {font-size:30px; margin-bottom:30px; }
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:18px;}        
        .guide_box dd{color:#3a3a3a; margin:0 0 20px 5px;}
        .guide_box dd li{margin-bottom:3px; list-style:decimal; margin-left:20px;font-size:15px;font-weight:bold;}

        @@keyframes colorBlink {
        0% {background:#335ce8;}
        80% {background:#000;}
        100% {background:#335ce8;}
        }
         
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2694_top.jpg" alt="기초입문 무료배포"/>                         
        </div>

        <div class="evtCtnsBox wb_01">
            <span data-aos="fade-down-left" data-aos-duration="500"><img src="https://static.willbes.net/public/images/promotion/2022/06/2694_top_img.png" alt=""/> </span> 
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2694_01.jpg" alt="기초입문" data-aos="fade-up"/>
		</div>

        <div class="evtCtnsBox wb_02">            
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2694_02.jpg" alt="30일간 무료" data-aos="fade-up"/>              
		</div>

        <div class="evtCtnsBox wb_03"> 
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2694_03.jpg"  alt="신청"  data-aos="fade-up"/> 
            <a href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/199343" class="NSK-Black">지금 바로 무료로 받기 ▶</a>      
        </div>

        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
        @endif 

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2694_04.jpg"  alt="소문내기 이벤트" />  
		</div>

        <div class="evtCtnsBox pb100">
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif
        </div>


        <div class="evtCtnsBox wb_info" id="info">
            <div class="guide_box">
                <h2 class="NSK-Black">이벤트 유의사항</h2>
                <dl>
                    <dd>
                        <ol>
                            <li>본 이벤트는 2022년 7월 31일까지 진행됩니다.</li>
                            <li>이벤트 대상 강좌 리스트 (*수강기간 30일)<br>
                            · 2023 오대혁 국어 기초입문 강의<br>
                            · 한덕현 영어 기초입문 강의 [쌩기초 탈출 프로젝트]<br>
                            · 2023 김상범 한국사 기초입문 강의<br>
                            · 2023 김철 행정학 기초입문 강의<br>
                            · 2023 이윤호 회계학 기초입문 강의<br>
                            · 2023 박창한 세법 기초입문 강의<br>
                            · 2023 이석준 소방행정법 기초입문 강의<br>
                            · 2023 이종오 소방학개론 기초입문 강의<br>
                            · 2023 이종오 소방관계법규 기초입문 강의<br>
                            · 2023 이윤주 조경직 기초입문 강의<br>
                            · 2023 윤용범 가축사양학 기초입문 강의<br>
                            · 2023 윤용범 가축육종학 기초입문 강의</li>
                            <li>원하는 강좌를 선택 후 0원으로 결제한 후 [내강의실]-[수강중강의]에서 수강할 수 있습니다.</li>
                            <li>같은 내용을 반복적으로 작성하거나 수강후기와 연관없는 댓글로 이벤트 참여 시 무통보 삭제 및 이벤트 정상 참여로 인정되지 않습니다.</li>
                        </ol>
                    </dd>
                </dl>
            </div>
        </div>


    </div>

    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>
    
@stop