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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/04/1074_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#fdfdfd}
        .evt02 {background:#ebeff0}
        .evt03 {background:#fdfdfd}
        .evt04 {background:#20242d url(https://static.willbes.net/public/images/promotion/2019/04/1074_04_bg.jpg) no-repeat center top;}
        .evt05 {background:#fff}


        .skybanner {
            position:fixed;
            top:250px;
            right:10px;
            z-index:1;
        }
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1074_top.png" usemap="#Map_1074_lec" title="기미진T-PASS" border="0" />
            <map name="Map_1074_lec">
                <area shape="rect" coords="91,1143,539,1211" href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/152965') }}" target="_blank" alt="39만원수강신청">
                <area shape="rect" coords="575,1144,1035,1211" href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/152964') }}" target="_blank" alt="49만원수강신청">
            </map>
        </div>

        <div class="evtCtnsBox evt01">
		<img src="https://static.willbes.net/public/images/promotion/2019/04/1074_01.jpg" usemap="#Map_pass_go" title="현직근무자가 추천하는 기특한 국어" border="0" />
			<map name="Map_pass_go">
			  <area shape="rect" coords="723,861,1017,926" href="https://cafe.naver.com/pskorean" target="_blank" alt="합격수기">
			</map>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1074_02.jpg" title="기미진국어를 수식하는말 모음" />
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1074_03.jpg" title="기특한국어커리큘럼" />
        </div>

        <div class="evtCtnsBox wb_cts05" id="lec_go">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1074_04.jpg" usemap="#Map_1074_lec2" title="기미진T-PASS" border="0" />
			<map name="Map_1074_lec2">
                <area shape="rect" coords="485,771,705,825" href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/152965') }}" target="_blank" alt="39만원수강신청">
                <area shape="rect" coords="746,773,976,823" href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/152964') }}" target="_blank" alt="49만원수강신청">
            </map>
        </div>
        <!--wb_cts05//-->

        <div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1074_05.jpg" alt="이용안내 및 유의사항 " />
        </div>
        <!--wb_cts06//-->

    </div>
    <!-- End Container -->
@stop