@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">            
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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/03/2107_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2107_01_bg.jpg) no-repeat center top;}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2107_02_bg.jpg) no-repeat center top;}
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2107_03_bg.jpg) no-repeat center top;}
        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2107_04_bg.jpg) no-repeat center top;}
        .evt05 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2107_05_bg.jpg) no-repeat center top;}
        .evt06 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2107_06_bg.jpg) no-repeat center top;}
        .evt07 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2107_07_bg.jpg) no-repeat center top;}
        .evt08 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2107_08_bg.jpg) no-repeat center top;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2107_top.jpg" title="실전면접캠프">                    
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2107_01.jpg" title="소수정예">           
        </div>      

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2107_02.jpg" title="커리큘럼">           
        </div>  

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2107_03.jpg" title="시간표">           
        </div>  

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2107_04.jpg" title="합격수기">           
        </div>  

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2107_05.jpg" usemap="#Map2107a" title="카페 바로가기" border="0">
            <map name="Map2107a" id="Map2107a">
                <area shape="rect" coords="370,96,743,186" href="https://cafe.daum.net/liveinterview" target="_blank" />
            </map>          
        </div>  

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2107_06.jpg" title="실전연습">           
        </div>  

        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2107_07.jpg" title="최종합격자">           
        </div>  

        <div class="evtCtnsBox evt08">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2107_08.jpg" usemap="#Map2107b" title="수강 접수하기" border="0">
            <map name="Map2107b" id="Map2107b">
                <area shape="rect" coords="307,273,806,400" href="https://willbesedu.willbes.net/pass/offLecture/index?cate_code=3125&course_idx=1358" target="_blank" />
            </map>     
        </div>  
        
	</div>
    <!-- End Container --> 

@stop