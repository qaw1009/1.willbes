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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/

        .evtTop {background:#5E42D5;}
        .evtTop span {position: absolute; left:50%; margin-left:-35px; top: 700px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite; letter-spacing:-1px; text-align:center; z-index: 2;}
        @@keyframes upDown{
            from{color:#fff}
            50%{color:#ffe87d; scale:1.1}
            to{color:#fff}
        }
        @@-webkit-keyframes upDown{
            from{color:#fff}
            50%{color:#ffe87d; scale:1.1}
            to{color:#fff}
        }

        .evt02 {background:#707070}        
       
    </style> 

	<div class="evtContent NSK">

		<div class="evtCtnsBox evtTop" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2929_top.jpg" alt="피셋 실전팩" />
            <span><img src="https://static.willbes.net/public/images/promotion/2023/03/2926_top_01.png" alt="마감유의" /></span>
		</div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2929_01.jpg" alt="한번의 수강 등록으로" />   
		</div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2929_02.jpg" alt="수강신청" />
                <a href="https://pass.willbes.net/pass/offPackage/show/prod-code/206094" target="_blank" title="수강신청하기" style="position: absolute;left: 19.86%;top: 83.51%;width: 60.21%;height: 10.69%;z-index: 2;"></a>
            </div>
		</div>

	</div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
            AOS.init();
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop