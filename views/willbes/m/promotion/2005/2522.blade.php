@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox span { vertical-align:top} 

    /************************************************************/

    @@import url('https://fonts.googleapis.com/css2?family=Black+Han+Sans&display=swap');
    .evt_02 {padding-bottom:100px; display:flex; justify-content: center; flex-wrap: wrap; align-items: center; font-family: 'Black Han Sans', sans-serif; letter-spacing:-1px}
    .evt_02 div {flex: 1 1 40%; border:2px solid #4057c9; padding:20px 0; font-size:30px; margin:5px}
    .evt_02 div a {display:block; width:60%; margin:auto; border-radius:20px; background:#4057c9; color:#fff; font-size:20px; padding:5px 10px; }
    .evt_02 div:hover {background:#4057c9; color:#fff;}
    .evt_02 div:hover a {background:#fff; color:#4057c9;}    
    @@media only screen and (max-width: 374px)  {
        .evt_02 div a {width:70%;}
    }

    
    </style>

    <div id="Container" class="Container NSK c_both">
        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2522m_01.jpg" alt="PSTA 패키지">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/2522m_02.jpg" alt="">
        </div>    
        
        <div class="evtCtnsBox evt_02 " data-aos="fade-up">
            <div>5급행정 <a href="https://gosi.willbes.net/m/userPackage/show/cate/3094/prod-code/189749" target="_blank">강의신청 ></a></div>
            <div>국립외교원 <a href="https://gosi.willbes.net/m/userPackage/show/cate/3095/prod-code/189751" target="_blank">강의신청 ></a></div>
            <div>PSAT <a href="https://gosi.willbes.net/m/userPackage/show/cate/3096/prod-code/190918" target="_blank">강의신청 ></a></div>
            <div>변호사 <a href="https://gosi.willbes.net/m/userPackage/show/cate/3099/prod-code/189768" target="_blank">강의신청 ></a></div>
            <div>법원행시 <a href="https://gosi.willbes.net/m/userPackage/show/cate/3098/prod-code/190919" target="_blank">강의신청 ></a></div> 
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