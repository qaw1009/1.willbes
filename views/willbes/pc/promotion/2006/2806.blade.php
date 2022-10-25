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

		.evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/10/2806_top_bg.jpg) no-repeat center top;}	
		.evt_01 {padding-bottom:100px} 

      
        /************************************************************/

    </style>
    
	<div class="evtContent NSK">
    
		<div class="evtCtnsBox evt_top" data-aos="fade-down">
			<img src="https://static.willbes.net/public/images/promotion/2022/10/2806_top.jpg" alt="손해평가사 소문내기 이벤트" />
		</div>

		<div class="evtCtnsBox evt_01" data-aos="fade-up">
			<div class="wrap">
				<img src="https://static.willbes.net/public/images/promotion/2022/10/2806_01.jpg" alt="이벤트 참여" />
				<a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운로드" style="position: absolute; left: 25%; top: 20.36%; width: 48.04%; height: 8.27%; z-index: 2;"></a>	
				<a href="href="javascript:void(0);" title="링크복사" onclick="copyTxt();" title="" style="position: absolute; left: 70.18%; top: 66.67%; width: 12.86%; height: 8.27%; z-index: 2;"></a>

				<a href="https://m.facebook.com" title="페이스북" style="position: absolute; left: 25%; top: 80.66%; width: 7.32%; height: 13.49%; z-index: 2;"></a>
				<a href="https://www.instagram.com" title="인스타그램" style="position: absolute; left: 35.71%; top: 80.66%; width: 7.32%; height: 13.49%; z-index: 2;"></a>
				<a href="https://section.cafe.naver.com/ca-fe" title="네이버카페" style="position: absolute; left: 46.34%; top: 80.66%; width: 7.32%; height: 13.49%; z-index: 2;"></a>
				<a href="https://top.cafe.daum.net/_c21_/home" title="다음카페" style="position: absolute; left: 57.14%; top: 80.66%; width: 7.32%; height: 13.49%; z-index: 2;"></a>
				<a href="https://section.blog.naver.com/BlogHome.naver" title="블로그" style="position: absolute; left: 67.77%; top: 80.66%; width: 7.32%; height: 13.49%; z-index: 2;"></a>
			</div>
			
			{{--홍보url--}}
			@if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
				@include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N', 'login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www'), 'is_public' => true)){{--기존SNS예외처리시, 로그인페이지 이동--}}
			@endif
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