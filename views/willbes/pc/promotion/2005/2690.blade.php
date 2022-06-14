@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /************************************************************/

    .evt_top {background:url("https://static.willbes.net/public/images/promotion/2022/06/2687_top_bg.jpg") no-repeat center top;}

    .evt01 {padding:100px 0;}

    .evt_tab {padding-bottom:100px;width:1120px; margin:auto}
    .tabs {width:1120px; margin:0 auto}
    .tabs li {display:inline; float:left; width:25%;} 
    .tabs li a {display:block; color:#fff; background:#000; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:18px;font-weight:bold;}
    .tabs li a:hover,
    .tabs li a.active {background:#0055e0;color:#fff;}    
    .tabs li:last-child a {margin:0}
    .tabs:after {content:""; display:block; clear:both}

    </style>

    <!-- Container -->

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2687_top.jpg" alt="psat 합격을 예측하다">
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2687_01.jpg" alt="신뢰할수 있는 합격 예상 커트라인">          
        </div>

        <div class="evtCtnsBox evt_tab" data-aos="fade-up">
            <ul class="tabs">
				<li><a href="javascript:tabMove(1);" id="mt1">메인</a></li>
				<li><a href="javascript:tabMove(2);" id="mt2">기본정보 및 답안입력</a></li>
				<li><a href="javascript:tabMove(3);" id="mt3">성적확인 및 분석</a></li>
				<li><a href="javascript:tabMove(4);" id="mt4">합격예측</a></li>			
			</ul>
			<div id="tab01">
           
			</div>
			<div id="tab02">
            
			</div>
			<div id="tab03">
           
			</div>
			<div id="tab04">
             
			</div>
        </div>        

    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            loginAlert();   {{-- 비로그인시 로그인 메세지 --}}
        });

        {{-- 초기 로그인 얼럿 --}}
        function loginAlert() {
            {!! login_check_inner_script('로그인 후 이벤트에 참여해주세요.','Y') !!}
        }
        /*탭*/
        function tabMove(num) {
        if(num == 1){
            var url = "{{ site_url('/promotion/index/cate/3095/code/2687') }}";
        } else if(num == 2) {
            var url = "{{ site_url('/promotion/index/cate/3095/code/2688') }}";
        } else if(num == 3) {
            var url = "{{ site_url('/promotion/index/cate/3095/code/2689') }}";
        } else {
            var url = "{{ site_url('/promotion/index/cate/3095/code/2690') }}";
        }
        location.href = url;
    }
    </script>
@stop