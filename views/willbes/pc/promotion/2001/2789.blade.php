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

        .evtTop {background:#000e63; height:1244px}
        .evtTop .mainImg {position:absolute; top:430px; left:50%; width:743px; margin-left:-371px; z-index: 2;}
        .evtTop .mainImg2 {position:absolute; top:100px; left:50%; width:886px; margin-left:-443px; z-index: 2;}

        .evt01,
        .evt03 {background:#e1e1e1}

        .evt02 {background:#c2c2c2;}
        .evt04 {background:#ebebeb; padding-bottom:150px}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2789_top_img02.png"  alt="윌비스 경찰" data-aos="fade-left" class="mainImg2"/>
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2789_top_img.png"  alt="소통 프로젝트" data-aos="fade-right" class="mainImg"/>            
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2789_01.jpg"  alt="01. 자료실 무료 개방" data-aos="fade-up"/>         
        </div>

        <div class="evtCtnsBox evt02">
            <div class="wrap" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2789_02.jpg"  alt="02. 과목별 질문게시판 운영" />
                <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51395?subject_idx=2128&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%2823%EB%85%84%EB%8C%80%EB%B9%84%29&tab=qna" title="경찰학 박우찬" target="_blank" style="position: absolute; left: 18.66%; top: 55.29%; width: 9.64%; height: 3.81%; z-index: 2;"></a>
                <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51259?subject_idx=1049&subject_name=%ED%97%8C%EB%B2%95%2823%EB%85%84%EB%8C%80%EB%B9%84%29&tab=qna" title="헌법 이국령" style="position: absolute; left: 40.18%; top: 55.29%; width: 9.64%; height: 3.81%; z-index: 2;"></a>
                <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51394?subject_idx=2127&subject_name=%ED%98%95%EC%82%AC%EB%B2%95%2823%EB%85%84%EB%8C%80%EB%B9%84%29&tab=qna" title="형사법 임종희"  target="_blank" style="position: absolute; left: 61.52%; top: 55.29%; width: 9.64%; height: 3.81%; z-index: 2;"></a>
                <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51392?subject_idx=2127&subject_name=%ED%98%95%EC%82%AC%EB%B2%95%2823%EB%85%84%EB%8C%80%EB%B9%84%29&tab=qna" title="형법 문형석"  target="_blank" style="position: absolute; left: 83.04%; top: 55.29%; width: 9.64%; height: 3.81%; z-index: 2;"></a>

                <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51389?subject_idx=2127&subject_name=%ED%98%95%EC%82%AC%EB%B2%95%2823%EB%85%84%EB%8C%80%EB%B9%84%29&tab=qna" title="형사법 김한기"  target="_blank" style="position: absolute; left: 18.66%; top: 79.36%; width: 9.64%; height: 3.81%; z-index: 2;"></a>
                <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51398?subject_idx=2178&subject_name=%EB%B2%94%EC%A3%84%ED%95%99%2823%EB%85%84%EB%8C%80%EB%B9%84%29&tab=qna" title="범죄학 김한기"  target="_blank" style="position: absolute; left: 40.18%; top: 79.36%; width: 9.64%; height: 3.81%; z-index: 2;"></a>
                <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51397?subject_idx=2012&subject_name=G-TELP&tab=qna" title="지텔프 제니"  target="_blank" style="position: absolute; left: 61.52%; top: 79.36%; width: 9.64%; height: 3.81%; z-index: 2;"></a>
                <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51126?subject_idx=2088&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC%EB%8A%A5%EB%A0%A5%EA%B2%80%EC%A0%95%EC%8B%9C%ED%97%98&tab=qna" title="한능검 오태진"  target="_blank" style="position: absolute; left: 83.04%; top: 79.36%; width: 9.64%; height: 3.81%; z-index: 2;"></a>
            </div>    
        </div>

        <div class="evtCtnsBox evt03">
            <div class="wrap" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2789_03.jpg"  alt="03. 공부 루틴" />  
                <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank" title="윌비스경찰 채널" style="position: absolute; left: 37.32%; top: 66.34%; width: 34.82%; height: 9.46%; z-index: 2;"></a>      
            </div> 
        </div>

        <div class="evtCtnsBox evt04" id="special_lecture">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2789_04.jpg"  alt="04. 학습강의 지원" data-aos="fade-up"/>
                <a href="https://police.willbes.net/lecture/index/cate/3001/pattern/free?search_order=course&course_idx=1072&subject_idx=2127&prof_idx=51393" title="온라인 무료특강 바로가기"  target="_blank" style="position: absolute;left: 27.04%;top: 86.36%;width: 45.94%;height: 7.81%;z-index: 2;"></a>
            </div>
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif       
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
      
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop   