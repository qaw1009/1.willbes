@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/ 
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2339_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#F2F2F2}

        .evt02 {background:#fed2e1}

        .evt03 {background:#F2F2F2}

        .evt04 {padding:100px 0; width:1120px; margin:0 auto}
        .evt04 .sTitle {margin:100px 0 30px; font-size:20px; text-align:left; color:#464646}

    </style> 

	<div class="evtContent NGR">

		<div class="evtCtnsBox evtTop" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2339_top.jpg" alt="오픈 피셋 클라스" />
		</div>

        <div class="evtCtnsBox evt01" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2339_01.jpg" alt="교수진" />   
		</div>

        <div class="evtCtnsBox evt02" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2339_02.jpg" alt="강의특징" />   
		</div>

        <div class="evtCtnsBox evt03" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2339_03.jpg" alt="강사 포부" />   
		</div>

        <div class="evtCtnsBox evt04" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2339_04.jpg" alt="강좌 신청하기" />   
            <div class="sTitle NSK-Black">2022년대비 7급 PSAT OPEN CLASS(기본강의) 종합반</div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
            <div class="sTitle NSK-Black">2022년대비 7급 PSAT OPEN CLASS(기본강의) 단과반</div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif 
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