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
            background:#fff;
            font-size:14px;
            line-height:1.4;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed;top:200px;right:10px; width:120px; z-index:1;}     
        .sky a {display:block; margin-bottom:10px}    

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2023/01/2866_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#f5f5f7}

        .youtube {position:absolute; top:636px; left:50%; width:800px; height:450px; margin-left:-400px; z-index: 2;}
        .youtube object {width:800px; height:450px}  


        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
        }
        .b-close {
            position: absolute;
            right: -39px;
            top: -39px;
            display: inline-block;
            cursor: pointer;
            width: 78px;
            height: 78px;
            transform: rotate(0deg);
            transition: all 1s;
            z-index: 9999;
        }
        .b-close:hover {transform: rotate(360deg); transition: all 1s;}

        .Pstyle .content {height:auto; width:auto;}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2866_top.jpg" alt="김재규 경찰학 백지노트"/>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2866_01s.jpg" alt="예시"/>
                <a href="javascript:go_popup1()" title="" style="position: absolute; left: 78.48%; top: 36.39%; width: 12.77%; height: 4.58%; z-index: 2;"></a>
                <a href="javascript:go_popup2()" title="" style="position: absolute; left: 35.76%;top: 55.65%;width: 12.77%;height: 4.58%;z-index: 2;"></a>
                <a href="javascript:go_popup3()" title="" style="position: absolute; left: 78.76%;top: 55.65%;width: 12.77%;height: 4.58%;z-index: 2;"></a>
                <a href="javascript:go_popup4()" title="" style="position: absolute;left: 35.76%;top: 74.75%;width: 12.77%;height: 4.58%;z-index: 2;"></a>
                <a href="javascript:go_popup5()" title="" style="position: absolute;left: 78.76%;top: 74.75%;width: 12.77%;height: 4.58%;z-index: 2;"></a>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="테마3종 다운받기" style="position: absolute;left: 23.56%;top: 84.85%;width: 52.97%;height: 5.58%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">            
            <div class="wrap">     
                <div class="youtube">
                    <object data="https://www.youtube.com/embed/270p7AXQBi4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></object>
                </div>

                <img src="https://static.willbes.net/public/images/promotion/2023/01/2866_02.jpg" alt="백지노트란?"/>
                <a href="https://cafe.daum.net/policeacademy" target="_blank" title="경시모" style="position: absolute; left: 9.2%; top: 94.09%; width: 19.82%; height: 3.12%; z-index: 2;"></a>
                <a href="https://cafe.naver.com/polstudy" target="_blank" title="경꿈사" style="position: absolute; left: 29.82%; top: 94.09%; width: 19.82%; height: 3.12%; z-index: 2;"></a>
                <a href="https://www.instagram.com" target="_blank" title="" style="position: absolute; left: 50.45%; top: 94.09%; width: 19.82%; height: 3.12%; z-index: 2;"></a>
                <a href="https://ko-kr.facebook.com" target="_blank" title="" style="position: absolute; left: 70.89%; top: 94.09%; width: 19.82%; height: 3.12%; z-index: 2;"></a>
            </div>

            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N')){{--기존SNS예외처리시--}}
            @endif 
        </div>

        <div id="popup1" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <div class="sample">
                    <img src="https://static.willbes.net/public/images/promotion/2023/01/2866_01_01.jpg" alt="" />
                </div>
            </div>
        </div>
        <div id="popup2" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <div class="sample">
                    <img src="https://static.willbes.net/public/images/promotion/2023/01/2866_01_02.jpg" alt="" />
                </div>
            </div>
        </div>
        <div id="popup3" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <div class="sample">
                    <img src="https://static.willbes.net/public/images/promotion/2023/01/2866_01_03.jpg" alt="" />
                </div>
            </div>
        </div>
        <div id="popup4" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <div class="sample">
                    <img src="https://static.willbes.net/public/images/promotion/2023/01/2866_01_04.jpg" alt="" />
                </div>
            </div>
        </div>
        <div id="popup5" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <div class="sample">
                    <img src="https://static.willbes.net/public/images/promotion/2023/01/2866_01_05.jpg" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>

    <script type="text/javascript">
        $(document).ready( function() {
            AOS.init();
        });

        //팝업
        function go_popup1(){$('#popup1').bPopup();}
        function go_popup2(){$('#popup2').bPopup();}
        function go_popup3(){$('#popup3').bPopup();}
        function go_popup4(){$('#popup4').bPopup();}
        function go_popup5(){$('#popup5').bPopup();}
    </script>
@stop