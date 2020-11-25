@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
        .evtCtnsBox img {width:100%; max-width:720px;}

        /************************************************************/

        .evtCtnsBox ul {margin:50px 0 100px}
        .evtCtnsBox li {font-size:20px; margin-bottom:20px}
        .evtCtnsBox li:nth-child(2) {font-size:30px; color:#000; margin-bottom:60px}
        .evtCtnsBox li a {padding:10px 80px; background:#000; color:#fff; font-size:30px; border-radius:50px}
        .evtCtnsBox li a:hover {background:#6699ff}

        @@media only screen and (max-width: 640px) {
        .evtCtnsBox li {font-size:16px; margin-bottom:10px}
        .evtCtnsBox li:nth-child(2) {font-size:20px; margin-bottom:40px}
        .evtCtnsBox li a {padding:10px 40px; font-size:24px; border-radius:50px}
        }
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1923m_top.jpg" alt="" > 
        </div> 
        
        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1923m_01.jpg" alt="" >       
            <ul>
                <li>1억뷰 N잡 강의 지원하기</li>
                <li class="NSK-Black">rose@willbes.com  <br>  070-4006-7240</li>
                <li class="NSK-Black"><a href="@if($file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" alt="다운로드" >지원서 다운받기 ></a></li>
            </ul>    
        </div>
    </div>
    <!-- End Container -->
@stop