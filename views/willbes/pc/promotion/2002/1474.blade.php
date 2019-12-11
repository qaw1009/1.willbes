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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/      
       
        .evt00 {background:#404040}        
        .evtTop{background:#234dc5;}
        .evt01 {background:#ddd;}
        .evt02 {background:#fff;}
        .evt03 {background:#555;} 
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">           
     
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1443_00.jpg" title="신광은 경찰팀">
        </div>
        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_top.jpg" title="열공인증 이벤트">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_01.jpg" title="문제풀이 1단계">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_02.jpg" usemap="#Map1474a" title="소문내기 이벤트 참여" border="0">
            <map name="Map1474a" id="Map1474a">
                <area shape="rect" coords="210,2478,280,2573" href="https://www.instagram.com" target="_blank" alt="인스타그램" />
                <area shape="rect" coords="312,2476,386,2574" href="https://twitter.com" target="_blank" alt="트위터" />
                <area shape="rect" coords="416,2475,493,2575" href="https://www.facebook.com" target="_blank" alt="페이스북" />
                <area shape="rect" coords="522,2473,601,2578" href="http://cafe.daum.net/policeacademy" target="_blank" alt="경사모" />
                <area shape="rect" coords="628,2473,710,2579" href="https://cafe.naver.com/polstudy" target="_blank" alt="경꿈사" />
                <area shape="rect" coords="738,2472,818,2582" href="https://gall.dcinside.com/board/lists/?id=government" target="_blank" alt="공무원갤러리" />
                <area shape="rect" coords="830,2470,934,2584" href="https://gall.dcinside.com/mgallery/board/lists/?id=policeofficer" target="_blank" alt="순경마이너갤러리" />
            </map>
            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial', array('bottom_cafe_type'=>'N'))
            @endif
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1474_03.jpg" title="이벤트 유의사항" >                      
        </div>          

	</div>
    <!-- End Container -->

    <script type="text/javascript">

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop