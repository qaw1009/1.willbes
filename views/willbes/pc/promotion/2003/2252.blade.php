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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/06/2252_top_bg.jpg) no-repeat center top;}
        
        .evt01 {background:#fff;}    

        .evt02 {background:#e9e9e9;padding-bottom:50px;}    
        /************************************************************/      
    </style> 

	<div class="evtContent NGR">

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2252_top.jpg" alt="석치수 자료해석" />
		</div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2252_01.jpg" alt="6월 전격출간" />
		</div>

        <div class="evtCtnsBox evt02">
            <div class="wrap"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2252_02.jpg" alt="합격 이벤트" />       
                <a href="https://cafe.naver.com/gugrade" target="_blank" title="공드림" style="position: absolute;left: 14.86%;bottom: 2.95%;width: 9.75%;height: 6.48%;z-index: 2;"></a>
                <a href=" https://cafe.naver.com/kkaebangjeong" target="_blank" title="7공9공" style="position: absolute;left: 24.86%;bottom: 2.95%;width: 9.75%;height: 6.48%;z-index: 2;"></a>
                <a href="https://bit.ly/3gzszmB" target="_blank" title="독공사" style="position: absolute;left: 34.86%;bottom: 2.95%;width: 9.75%;height: 6.48%;z-index: 2;"></a>
                <a href="https://cafe.daum.net/9glade/O6Qh" target="_blank" title="9꿈사" style="position: absolute;left: 44.86%;bottom: 2.95%;width: 9.75%;height: 6.48%;z-index: 2;"></a>
                <a href="https://gall.dcinside.com/board/lists/?id=government" target="_blank" title="공무원갤러리" style="position: absolute;left: 54.86%;bottom: 2.95%;width: 9.75%;height: 6.48%;z-index: 2;"></a>
                <a href="https://section.blog.naver.com/BlogHome.naver" target="_blank" title="네이버블로그" style="position: absolute;left: 64.86%;bottom: 2.95%;width: 9.75%;height: 6.48%;z-index: 2;"></a>
                <a href="javascript:void(0);" title="링크복사하기" onclick="copyTxt();" style="position: absolute;left: 74.86%;bottom: 2.95%;width: 9.75%;height: 6.48%;z-index: 2;"></a>
            </div>                  
		</div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
        @endif

	</div>
    <!-- End Container -->

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop