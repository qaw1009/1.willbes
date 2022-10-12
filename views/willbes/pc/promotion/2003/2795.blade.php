@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
    .evtContent { 
        position:relative;            
        width:100% !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }	
    .evtContent span {vertical-align:auto}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}        
    .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

    /*****************************************************************/

    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/10/2795_top_bg.jpg) no-repeat center top; height: 1450px;}
    .evt_top .imgA {position: absolute; top:125px; left:50%; margin-left:-600px; z-index: 2;}
    .evt_top .imgB {position: absolute; top:125px; left:50%; margin-left:400px; z-index: 2;}

    .heart {            
        animation:upDown 1s infinite;
        -webkit-animation:upDown 1s infinite;
        z-index:10;
    }
    @@keyframes upDown{
        from{margin-top:0}
        60%{margin-top:-10px}
        to{margin-top:0}
    }
    @@-webkit-keyframes upDown{
        from{margin-top:0}
        60%{margin-top:-10px}
        to{margin-top:0}
    }

    .evt01,.evt02 {background:#555EDF}

    </style>

    <div class="evtContent NSK">

        <div class="evtCtnsBox evt_top" data-aos="fade-down">  
            <span class="imgA heart" data-aos="flip-down" data-aos-duration="1000"><img src="https://static.willbes.net/public/images/promotion/2022/10/2795_top01.png" alt=""/></span>
            <span class="imgB heart" data-aos="flip-down" data-aos-duration="1000"><img src="https://static.willbes.net/public/images/promotion/2022/10/2795_top02.png" alt=""/></span>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2795_01.jpg" title="교수진 최강팀">
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2795_02.jpg" title="참여방법">
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="소문내기 이미지 다운" style="position:absolute;left: 2.56%;top: 11.15%;width: 31.01%;height: 29.82%; z-index:2;"></a>
                <a href="#sns" title="소문내기 및 인증하기" style="position:absolute;left: 34.56%;top: 11.15%;width: 31.01%;height: 29.82%; z-index:2;"></a>
                <a href="#comment" title="댓글로 링크 남기기" style="position:absolute;left: 66.76%;top: 11.15%;width: 31.01%;height: 29.82%; z-index:2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up" id="sns">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2795_03.jpg" title="소문내기">
                <a href="https://section.blog.naver.com/BlogHome.naver?directoryNo=0&currentPage=1&groupId=0" target="_blank" title="개인블로그" style="position:absolute;left: 13.36%;top: 62.45%;width: 15.46%;height: 22.32%; z-index:2;"></a>
                <a href="https://www.instagram.com/willbes_gong" target="_blank" title="인스타그램" style="position:absolute;left: 33.16%;top: 62.45%;width: 15.46%;height: 22.32%; z-index:2;"></a>
                <a href="https://cafe.naver.com/gugrade" target="_blank" title="공드림" style="position:absolute;left: 53.06%;top: 62.45%;width: 15.46%;height: 22.32%; z-index:2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03_comment" data-aos="fade-up" id="comment">
            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
            @endif
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2795_04.jpg" title="수강신청 바로가기">
                <a href="https://pass.willbes.net/pass/offPackage/show/prod-code/201485" target="_blank" title="실강 종합반" style="position:absolute;left: 71.86%;top: 37.75%;width: 24.96%;height: 11.32%; z-index:2;"></a>
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3143&course_idx=1427" target="_blank" title="실강 기본이론강의" style="position:absolute;left: 71.86%;top: 49.95%;width: 24.96%;height: 11.32%; z-index:2;"></a>
                <a href="https://pass.willbes.net/Package/index/cate/3103/pack/648001" target="_blank" title="동영상 종합반" style="position:absolute;left: 71.86%;top: 62.25%;width: 24.96%;height: 11.32%; z-index:2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3103/pattern/only?search_order=regist&subject_idx=1147&course_idx=1364&school_year=2022" target="_blank" title="동영상 기본이론강의" style="position:absolute;left: 71.86%;top: 74.45%;width: 24.96%;height: 11.32%; z-index:2;"></a>
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