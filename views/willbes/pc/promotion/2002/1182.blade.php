@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        span {vertical-align:auto}
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/04/1182_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2019/04/1182_01_bg.jpg) no-repeat center top}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2019/04/1182_02_bg.jpg) repeat-x }

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1182_top.jpg" title="하승민 영어 독해특강">
        </div>
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1182_01.jpg"  title="합격생이 전한느 수업 후기" >
        </div>
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1182_02.jpg" usemap="#Map1182A" title="독해특강 신청하기" border="0">
            <map name="Map1182A">
            <area shape="rect" coords="363,877,756,974" href="{{ site_url('/pass/professor/show/prof-idx/50136/?cate_code=3010&subject_idx=1054&subject_name=%EC%98%81%EC%96%B4&tab=open_lecture') }}" target="_blank" alt="신청하기">
            </map>
        </div>

	</div>
    <!-- End Container -->

@stop