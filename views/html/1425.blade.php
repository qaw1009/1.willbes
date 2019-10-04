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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/10/1425_top_bg.jpg) no-repeat center top;}   
        .evt01 {background:#fff}       
        .evt02 {background:#d7d7d7}
        .evt03 {background:#fff}
    </style>

<div class="p_re evtContent NSK" id="evtContainer">
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2019/10/1425_top.jpg" usemap="#Map1425A" title="G-TELP 최단기 목표공략" border="0">
        <map name="Map1425A" id="Map1425A">
            <area shape="rect" coords="828,1081,1114,1156" href="#none" alt="수강신청" />
        </map>
	</div>

	<div class="evtCtnsBox evt01">
		<img src="https://static.willbes.net/public/images/promotion/2019/10/1425_01.jpg" title="국제 공인 영어시험 G-TELP">
	</div>

	<div class="evtCtnsBox evt02">
		<img src="https://static.willbes.net/public/images/promotion/2019/10/1425_02.jpg" title="1초비법">
	</div>

	<div class="evtCtnsBox evt03" >
        <img src="https://static.willbes.net/public/images/promotion/2019/10/1425_03.jpg" usemap="#Map1425B" title="교재" border="0">
        <map name="Map1425B" id="Map1425B">
            <area shape="rect" coords="281,830,805,907" href="http://www.willstory.co.kr/book/book_list.asp?search_text=G-TELP&amp;search_type=0&amp;x=0&amp;y=0" target="_blank" alt="교재구매하기" />
        </map>
	</div>
</div>
<!-- End Container -->
@stop