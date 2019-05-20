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
            min-width:1210px !important;
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
        .skybanner_sectionFixed {position:fixed; top:20px}

        .WB_con01 {background:#ebe4d2 url('https://static.willbes.net/public/images/promotion/2019/05/1044_01_bg.png') no-repeat center;}
        .WB_con02{background:#590100 url(https://static.willbes.net/public/images/promotion/2019/05/1044_02_bg.png) no-repeat center;}
        .WB_con03{background:#3e100c;}
        .WB_con04{background:#e8e8e8;}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/05/1044_sky.jpg" alt="영어지옥탈출반" /></a>
        </div>

        <div class="evtCtnsBox WB_con01">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1044_01.png" alt="#" />>
        </div>

        <div class="evtCtnsBox WB_con02">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1044_02.png" alt="#" /><
        </div>

        <div class="evtCtnsBox WB_con03">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1044_03.png" alt="#" />
        </div>

        <div class="evtCtnsBox WB_con04">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1044_04.png" alt="#" usemap="#Map_0219_lec" border="0" />
            <map name="Map_0219_lec">
                <area shape="rect" coords="209,794,921,870" href="{{ site_url('/pass/offLecture/index?cate_code=3010&subject_idx=1095#110779') }}" target="_blank">
            </map>
        </div>
        <!--//WB_con04-->

    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
        });
    </script>
@stop