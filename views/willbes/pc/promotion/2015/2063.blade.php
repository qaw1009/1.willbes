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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/02/2063_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#eee}
        .evt02 {background:#eee}
        .evt03 {background:#fff}
        .evt04 {background:#fff; padding-bottom:150px}
        .evt04 div {width:1060px; margin:0 auto}
        .evt04 div a {display:inline-block; width:500px; background:#111; color:#fff; text-align:center;line-height:1.25;
                     font-size:25px; padding:40px 0;border-radius:80px; border:2px solid #000; border-bottom:10px solid #000;}
        .evt04 .big_txt {font-size:33px;}
        .evt04 div a:hover {background:#fff;color:#111;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2063_top.jpg" title="과목개편 완벽 대비">                    
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2063_01.jpg" title="빠른준비 빠른합격">           
        </div>
        
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2063_02.jpg" title="불꽃소방 단독반">           
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2063_03.jpg" title="커리큘럼">           
        </div>        
        
        <div class="evtCtnsBox evt04 NSK-Black">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2063_04.jpg" title="최종합격 시스템">
            <div>
                <a href="https://willbesedu.willbes.net/pass/offPackage/index?cate_code=3126&course_idx=" target="_blank">인천 불꽃소방팀<br><span class="big_txt">수강접수 바로가기 ></span></a>
            </div>
        </div>
	</div>
    <!-- End Container --> 

@stop