@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
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

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/01/2522_top_bg.jpg) no-repeat center top; }

        @@import url('https://fonts.googleapis.com/css2?family=Black+Han+Sans&display=swap');
        .evt_02 {width:1120px; margin:0 auto; padding-bottom:150px; display:flex; justify-content: center; flex-wrap: wrap; align-items: center; font-family: 'Black Han Sans', sans-serif; letter-spacing:-1px}
        .evt_02 div {flex: 1 1 30%; border:2px solid #4057c9; padding:30px; font-size:50px; margin:10px 20px}
        .evt_02 div a {display:inline-block; border-radius:20px; background:#4057c9; color:#fff; font-size:30px; padding:0 20px; height:50px; line-height:50px; vertical-align:top; margin-top:-5px}
        .evt_02 div:hover {background:#4057c9; color:#fff;}
        .evt_02 div:hover a {background:#fff; color:#4057c9;}        
        /************************************************************/      
    </style> 

	<div class="evtContent NSK">        
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2522_top.jpg" alt="PSTA 패키지"/>
		</div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2522_01.jpg" alt=""/>            
		</div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <div>5급행정 <a href="https://gosi.willbes.net/userPackage/show/cate/3094/prod-code/189749" target="_blank">강의신청 ></a></div>
            <div>국립외교원 <a href="https://gosi.willbes.net/userPackage/show/cate/3095/prod-code/189751" target="_blank">강의신청 ></a></div>
            <div>PSAT <a href="https://gosi.willbes.net/userPackage/show/cate/3096/prod-code/190918" target="_blank">강의신청 ></a></div>
            <div>변호사 <a href="https://gosi.willbes.net/userPackage/show/cate/3099/prod-code/189768" target="_blank">강의신청 ></a></div>
            <div>법원행시 <a href="https://gosi.willbes.net/userPackage/show/cate/3098/prod-code/190919" target="_blank">강의신청 ></a></div>
		</div>
	</div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop