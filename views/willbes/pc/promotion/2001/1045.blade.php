@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative; margin:0 auto}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:250px;
            right:10px;
            z-index:1;
        }

        .WB_con01 {background:#ebe4d2 url('https://static.willbes.net/public/images/promotion/2019/06/1045_top_bg.png') no-repeat center;}
        .WB_con02{background:#590100 url('https://static.willbes.net/public/images/promotion/2019/06/1045_01_bg.png') no-repeat center;}
        .WB_con03{background:#f8f9fb;}
        .WB_con04{background:#e8e8e8;}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#0219_lecgo"><img src="https://static.willbes.net/public/images/promotion/2019/06/1045_skybanner.png" alt="영어지옥탈출반" /></a>
        </div>

        <div class="evtCtnsBox WB_con01">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1045_top.png" alt="#" />
        </div>

        <div class="evtCtnsBox WB_con02">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1045_01.png" alt="#" />
        </div>

        <div class="evtCtnsBox WB_con03">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1045_02.png" alt="#" />
        </div>

        <div class="evtCtnsBox WB_con04" id="0219_lecgo">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1045_03.png" usemap="#Map_0219_lec" border="0" />
            <map name="Map_0219_lec" id="Map_0219_lec">
                <area shape="rect" coords="209,687,909,790" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1106&subject_idx=1054" target="_blank" />
            </map>          
        </div>
        <!--//WB_con04-->

    </div>
    <!-- End Container -->

    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
        });
    </script>
@stop