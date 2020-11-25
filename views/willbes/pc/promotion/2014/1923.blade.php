@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')  
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/11/1923_top_bg.jpg) no-repeat center top}

        .evt01 {padding-bottom:150px}   
        .evt01 ul {margin-top:100px}
        .evt01 li {font-size:20px; margin-bottom:20px}
        .evt01 li:nth-child(2) {font-size:30px; color:#000; margin-bottom:80px}
        .evt01 li a {padding:10px 80px; background:#000; color:#fff; font-size:30px; border-radius:50px}
        .evt01 li a:hover {background:#6699ff}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">    
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1923_top.jpg" alt="" > 
        </div>  

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1923_01.jpg" alt="" >   
            <ul>
                <li>1억뷰 N잡 강의 지원하기</li>
                <li class="NSK-Black">rose@willbes.com  .  070-4006-7240</li>
                <li class="NSK-Black"><a href="@if($file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" alt="다운로드" >지원서 다운받기 ></a></li>
            </ul>
        </div>
    </div>
    <!-- End Container -->
@stop