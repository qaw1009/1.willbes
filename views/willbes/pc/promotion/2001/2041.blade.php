@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .sky {position:fixed;top:250px;right:25px;z-index:1;}
        .sky a {display:block;padding-top:10px;}

        .wb_police {background:#0A0A0A}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/01/2041_top_bg.jpg) no-repeat center;}      

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="#evt_01"><img src="https://static.willbes.net/public/images/promotion/2021/01/2041_sky.png" alt="열공인증" ></a>
            <a href="#evt_02"><img src="https://static.willbes.net/public/images/promotion/2021/01/2041_sky2.png" alt="소문내기" ></a>
        </div>      
        
        <div class="evtCtnsBox wb_police" >
			<img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="신광은 경찰학원" />
		</div>     

        <div class="evtCtnsBox wb_top">
			<img src="https://static.willbes.net/public/images/promotion/2021/01/2041_top.jpg"  alt="열공지원 패키지"/>
		</div>

        <div class="evtCtnsBox wb_01" id="evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2041_01.jpg"  alt="열공 인증하고,에어팟받자" usemap="#Map2041_sns" border="0"/>
            <map name="Map2041_sns" id="Map2041_sns">
                <area shape="rect" coords="272,1449,452,1539" href="https://www.instagram.com/willbescop/" target="_blank" />
                <area shape="rect" coords="487,1446,657,1541" href="http://blog.naver.com/PostList.nhn?blogId=willbes79&from=postList&categoryNo=65" target="_blank" />
                <area shape="rect" coords="694,1445,872,1541" href="https://www.facebook.com/willbescop" target="_blank" />
            </map>	
		</div>        
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
        @endif

        <div class="evtCtnsBox wb_02" id="evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2041_02.jpg"  alt="열공 지원이벤트 소문내기" usemap="#Map2041_image" border="0"/>
            <map name="Map2041_image" id="Map2041_image">
                <area shape="rect" coords="327,902,792,957" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="설날 열공지원 이벤트 이미지 다운받기" />
            </map>	
		</div>  
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif       
       
	</div>
    <!-- End Container -->

    <script type="text/javascript">       

    </script> 

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop