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
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {width:100%; min-width:1210px; text-align:center; background:#a12932 url(https://static.willbes.net/public/images/promotion/2019/05/1081_top_bg.jpg) no-repeat center top; position:relative;  }
        .wb_cts01 {background:#f4f4f4}
        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#f9e6c8}
        .wb_cts04 {background:#fff}

        /*레이어팝업*/
        .Pstyle {
            opacity:0;
            display:none;
            position:relative;
            width:auto;
            padding: 20px;
            background:#fff;
        }
        .b-close {
            position:absolute;
            right:-35px;
            top:0;
            display:inline-block;
            padding:5px;
            cursor:pointer;
            background:#333;
        }
        .popcontent {height:auto; width:auto}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1081_top_01.png" alt="윌비스 행정학의 대세 김덕관 행정학 T-PASS " usemap="#Map18113_c1" border="0"  />
            <map name="Map18113_c1" >
                <area shape="rect" coords="409,996,606,1052" href="https://pass.willbes.net/periodPackage/show/cate/3023/pack/648001/prod-code/153462" target="_blank" onfocus="this.blur();" />
                <area shape="rect" coords="635,996,835,1052" href="https://pass.willbes.net/periodPackage/show/cate/3023/pack/648001/prod-code/153463" target="_blank" onfocus="this.blur();"/>
                <area shape="rect" coords="871,996,1067,1052" href="https://pass.willbes.net/periodPackage/show/cate/3023/pack/648001/prod-code/153464" target="_blank" onfocus="this.blur();"/>
            </map>
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1081_01.jpg" alt="기출문제, 이미 출제된 문제이기에 더욱 중요합니다." />
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1081_02.jpg" alt="소방학/관계법규는 필수입니다." /><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1081_03.jpg" alt="연간커리큘럼" /><br>
            <a onclick="go_popup()">
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1081_04.jpg" alt=" 커리큘럼 자세히 보기" />
            </a><br> 
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1081_05.jpg" alt="연간커리큘럼" /><br>           
        </div>

        <!--레이어팝업-->
        <div id="popup" class="Pstyle">
            <a class="b-close"><img src="https://static.willbes.net/public/images/promotion/common/popClose.png" alt="닫기"></a>
            <div class="content">
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1081_popup.jpg" alt="소방 커리큘럼"/>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1081_06.jpg" alt="윌비스 소방직의 새로운 합격 공식, 김종상!" usemap="#Map18113_c2" border="0" />
            <map name="Map18113_c2" >
                <area shape="rect" coords="434,857,598,908" href="https://pass.willbes.net/periodPackage/show/cate/3023/pack/648001/prod-code/153462" target="_blank" onfocus="this.blur();"/>
                <area shape="rect" coords="633,857,796,908" href="https://pass.willbes.net/periodPackage/show/cate/3023/pack/648001/prod-code/153463" target="_blank" onfocus="this.blur();"/>
                <area shape="rect" coords="840,857,1009,908" href="https://pass.willbes.net/periodPackage/show/cate/3023/pack/648001/prod-code/153464" target="_blank" onfocus="this.blur();"/>
            </map>
        </div>

        <div class="evtCtnsBox wb_cts04" id="event">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1081_07.jpg" alt="윌비스 김종상 소방학/관계법규 이용안내 및 유의사항 " />
        </div>

    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        function go_popup() {
            $('#popup').bPopup();
        };
    </script>
@stop