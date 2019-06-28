@extends('willbes.pc.layouts.master')

@section('content')

    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .zero100_01 {background:url(https://static.willbes.net/public/images/promotion/2019/06/zero100_01_bg.jpg) no-repeat center top;}
        .zrCts01 {position:relative; width:1120px; margin:0 auto;}        
        
        .zrCts01 span {position:absolute;}
        .zrCts01 span.img01 {width:696px; top:650px; left:567px; z-index:2;}        
        
        .zrCts01 span.img02 {width:702px; top:572px; left:56px; z-index:1; animation:ani02 1s ease-in; -webkit-animation:ani02 1s ease-in;}
        @@keyframes ani02{
		0%{left:567px; opacity: 0;}
		90%{left:0; opacity: .9;}
		100%{left:56px; opacity: 1;}
        }
        .zero100_02 {background:url(https://static.willbes.net/public/images/promotion/2019/06/zero100_02_bg.jpg) no-repeat center top;}
        .zrCts02 {position:relative; width:1120px; margin:0 auto;}               
        .zrCts02 span {position:absolute; width:204px; top:710px; left:335px; z-index:1; animation:ani03 1s infinite;}
        @@keyframes ani03{
		0%{-webkit-transform:scale3d(1,1,1);transform:scale3d(1,1,1)}
		50%{-webkit-transform:scale3d(1.15,1.15,1);transform:scale3d(1.15,1.15,1)}
		100%{-webkit-transform:scale3d(1,1,1);transform:scale3d(1,1,1)}
        }        
        .zero100_03 {background:#fbfa00}
        .zero100_04 {}
        .zero100_05 {}
    </style>


    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox zero100_01">
            <div class="zrCts01">
                <img src="https://static.willbes.net/public/images/promotion/2019/06/zero100_01.jpg" alt="공무원 시작은 윌비스 ‘제로백’과 함께"  />
                <span class="img01"><img src="https://static.willbes.net/public/images/promotion/2019/06/zero100_img01.png" alt="zero100"  /></span>
                <span class="img02"><img src="https://static.willbes.net/public/images/promotion/2019/06/zero100_img02.png" alt="자동차"  /></span>
            </div>      
        </div>

        <div class="evtCtnsBox zero100_02">
            <div class="zrCts02">
                <img src="https://static.willbes.net/public/images/promotion/2019/06/zero100_02.jpg" alt="공무원 시작은 윌비스 ‘제로백’과 함께"  />
                <span><img src="https://static.willbes.net/public/images/promotion/2019/06/zero100_img03.png" alt="조건없이"  /></span>
            </div>      
        </div>

        <div class="evtCtnsBox zero100_03">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/zero100_03.jpg" alt="제로100 기본서 시리즈"  />    
        </div>

        <div class="evtCtnsBox zero100_04">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/zero100_04.jpg" alt="제로100 소문내기" usemap="#Map1286A" border="0"  />
            <map name="Map1286A" id="Map1286A">
                <area shape="rect" coords="725,491,872,557" href="http://cafe.daum.net/9glade" target="_blank" alt="구꿈사" />
                <area shape="rect" coords="723,579,880,648" href="https://cafe.naver.com/gugrade" target="_blank" alt="공드림" />
                <area shape="rect" coords="726,673,895,738" href="https://gall.dcinside.com/board/lists?id=government" target="_blank" alt="공무원갤러리" />
            </map>      
        </div>
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_emoticon_url_partial')
        @endif

        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif

        <div class="evtCtnsBox zero100_05">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/zero100_05.jpg" alt="이벤트 유의사항"  />    
        </div>        
    </div> 
    <!-- End Container -->    
@stop
