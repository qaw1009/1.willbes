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
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5); border-radius:8px}

        /************************************************************/ 
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2299_top_bg_n1.jpg) no-repeat center top;}
        .evt01 .evtBtns{position:absolute; top:562px; left:50%; transform:translateX(-50%); display:flex; width:100%;}
        .evt01 .evtBtns .tit{font-size:20px; font-weight:bold; color:#22417e; letter-spacing:-1px; margin:10px 15px 0 80px; position: relative;}
        .evt01 .evtBtns  a{color:#fff; font-size:16px; font-weight:bold; display:flex; align-items:center; justify-content:center; background-color:#22417e; width:92px; height:92px; border-radius:20px; margin-left:10px; line-height:22px;}
        .evt02 h3{font-size:30px; color:#fff; font-weight: bold; text-align: center; background-color: #244180; padding: 20px 0; margin-bottom: 20px;}
        .evt02 .goods{margin-bottom: 50px;}
    </style> 

	<div class="evtContent NGR">

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2299_top_n1.jpg" alt=how to psat" />
		</div>

        <div class="evtCtnsBox evt01">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2299_01_n1.jpg" alt="석치수 자료해석" />
                <div class="evtBtns">
                    <div class="tit">바로가기</div>
                    <a href="https://cafe.naver.com/gugrade" title="공드림" target="_blank">공드림<br>바로가기</a>
                    <a href="https://cafe.naver.com/kkaebangjeong" title="7공9공" target="_blank">7공9공<br>바로가기</a>
                    <a href="https://bit.ly/3gzszmB" title="독공사" target="_blank">독공사<br>바로가기</a>
                    <a href="https://cafe.daum.net/9glade/O6Qh" title="9꿈사" target="_blank">9꿈사<br>바로가기</a>
                    <a href="https://gall.dcinside.com/board/lists/?id=government" title="공무원갤러리" target="_blank">공무원<br>갤러리<br>바로가기</a>
                    <a href="https://section.blog.naver.com/BlogHome.naver" title="네이버블로그" target="_blank">네이버<br>블로그<br>바로가기</a>
                    <a href="https://www.instagram.com/" title="인스타그램" target="_blank">인스타그램<br>바로가기</a>
                    <a href="https://m.facebook.com/" title="페이스북" target="_blank">페이스북<br>바로가기</a>
                </div>
                <a href="javascript:void(0);" title="링크복사" onclick="copyTxt();" style="position: absolute; left: 17.05%; top: 41%; width: 32.14%; height: 4%; z-index: 2;"></a>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="소문내기 다운" style="position: absolute; left: 50.71%; top: 41%; width: 32.32%; height: 4%; z-index: 2;"></a>
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2299_02.jpg" alt="유의사항" />
            </div>
		</div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N', 'login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www'), 'is_public' => true)){{--기존SNS예외처리시, 로그인페이지 이동--}}
        @endif

        {{--상품--}}
        <div class="evtCtnsBox evt02">
            <div class="wrap">
                <h3>7급 PSAT 기출분석을 통한 공부방법론 특강</h3>
                <div class="goods">
                    @if(empty($arr_base['display_product_data']) === false)
                        @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                    @endif 
                </div>
                <h3>7급 PSAT CORE PSAT CLASS</h3>
                <div class="goods">
                    @if(empty($arr_base['display_product_data']) === false)
                        @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                    @endif 
                </div>
            </div>
        </div>
	</div>
    <!-- End Container -->

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop