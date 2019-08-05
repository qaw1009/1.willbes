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
        .evttop {background:url(https://static.willbes.net/public/images/promotion/2019/08/1351_p1_bg.jpg); }
        .evt01 {background:#e2e2e2}           
       
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox evttop" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1351_p1.jpg" alt="이상구 라이브 국제법/정치학"/>          
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1351_p2_1.jpg" title="출제가능한 문제만 모조리 정리한다"><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1351_p2_2.jpg"><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1351_p2_3.jpg" alt="장학생 신청서류 다운받기" usemap="#Map1351" border="0">
            <map name="Map1351" id="Map1351">
                <area shape="rect" coords="216,291,506,368" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="7기장학생지원서" />
                <area shape="rect" coords="509,292,766,369" href="@if(empty($file_yn) === false && $file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" alt="개인정보동의서" />
            </map>
        </div>
	</div>
    <!-- End Container -->

@stop