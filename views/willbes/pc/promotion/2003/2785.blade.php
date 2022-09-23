@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/ 

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/09/2785_top_bg.jpg) no-repeat center top; height: 1363px;}        
        .wb_top .imgA {position: absolute; top:225px; left:50%; margin-left:-466.5px; z-index: 2;}

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2022/09/2785_01_bg.jpg) no-repeat center top;}

        .evt02 {background:#D2E0E3;}
        
        .evt04 {background:#13161B;}

        .evt05 {background:#ECECEC;}

        /* 이용안내 */
        .evtInfo {padding:100px 0; background:#f4f4f4; color:#363636; line-height:1.5}
        .guide_box{width:1120px; margin:0 auto; padding:0 50px; text-align:left; word-break:keep-all; font-size:14px; color:#555;}
        .guide_box h2 {font-size:30px; margin-bottom:30px; color:#000}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#000; display:inline-block; padding:5px 10px; font-weight:bold; margin-right:10px; font-size:16px;}        
        .guide_box dd{margin-bottom:50px;}
        .guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px;}
        .guide_box dd li.none {list-style:none; margin-left:0}
        .guide_box dd:last-child {margin:0}
        .evtInfo p {font-size:16px; color:#000; font-weight:bold; margin-top:30px}

        /************************************************************/
        
    </style>

	<div class="evtContent NSK">

        <div class="evtCtnsBox wb_top">
           <span class="imgA" data-aos="flip-down" data-aos-duration="1000"><img src="https://static.willbes.net/public/images/promotion/2022/09/2785_top.png" alt="실전 모의고사"/></span>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2785_01.jpg" alt="지금,바로 응시하세요" />
		</div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2785_02.jpg" alt="교수진" />
		</div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2785_03.jpg" alt="서비스 제공">
                <a href="http://open.kakao.com/o/sm2o7cVd" target="_blank" title="오픈카톡 바로가기" style="position: absolute;left: 6.73%;top: 61.95%;width: 86.38%;height: 28.06%;z-index: 2;"></a>                                 
            </div>   
		</div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2785_04.jpg" alt="신청하기"/>
                <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" title="실전모의고사 신청하기" style="position: absolute;left: 28.73%;top: 61.95%;width: 42.38%;height: 7.06%;z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2785_05.jpg" alt="이미지 다운 및 소문내기" />
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운" style="position: absolute;left: 28.73%;top: 58.35%;width: 42.38%;height: 5.06%;z-index: 2;"></a>
                <a href="#none" title="네이버" style="position: absolute;left: 8.73%;top: 90.95%;width: 15.38%;height: 7.06%;z-index: 2;"></a>
                <a href="#none" title="다음" style="position: absolute;left: 27.23%;top: 90.95%;width: 15.38%;height: 7.06%;z-index: 2;"></a>
                <a href="#none" title="디씨" style="position: absolute;left: 46.73%;top: 90.95%;width: 20.38%;height: 7.06%;z-index: 2;"></a>
                <a href="#none" title="인스타그램" style="position: absolute;left: 68.73%;top: 90.95%;width: 21.88%;height: 7.06%;z-index: 2;"></a>
            </div>
		</div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
        @endif

        <div class="evtCtnsBox evtInfo" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">이용안내</h2>
                <dl>
                    <dt>응시자 유의사항</dt>
                    <dd>
                        <ol>                       
                            <li>모든 글은 [전체공개]로 작성해야 하며, 소문내기 이미지+URL을 정상적으로 포함해야 참여한 것으로 인정됩니다.<br>
                                Ex)비로그인 시에도 확인 가능한 게시글만 인정
                            </li>
                            <li>동일한 커뮤니티에 게시글 복수로 작성하는 경우 1개만 인정</li>
                            <li>이벤트 URL 기입 오류에 대한 문제로 혜택 대상자에서 제외되는 경우 윌비스에서는 책임지지 않습니다.</li>
                        </ol>
                    </dd>
                  
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