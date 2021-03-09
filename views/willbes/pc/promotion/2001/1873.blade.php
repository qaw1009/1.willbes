@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
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

        .skybanner {position:fixed; top:225px;right:10px;z-index:10;}
        .skybanner a{display:block; margin-bottom:10px;}

        .evt00 {background:#0a0a0a}

        .evt_top {background:#3057CE url(https://static.willbes.net/public/images/promotion/2020/10/1873_top_bg.jpg) no-repeat center}
        
        .evt01 {background:#fff}
        .youtube {position:absolute; top:235px; left:50%;z-index:1;margin-left:-492px}
        .youtube iframe {width:980px; height:550px}

        .evt02 {background:#f4f4f4}

        .evt03 {background:#fff}
        /* 탭 */
        .tabContaier {width:920px; margin:0 auto;padding-top:50px;}
        .tabContaier ul {margin-bottom:10px}
        .tabContaier li {display:inline; float:left; width:25%}
        .tabContaier ul:after {content:""; display:block; clear:both}
        .tabContaier a {display:block; text-align:center; font-size:24px; font-weight:bold; background:#112c85; color:#04fb16;
                        padding:14px 0; border:1px solid #112c85; margin-right:2px;height:80px;line-height:55px;}
        .tabContaier li:last-child a {margin:0}
        .tabContaier a:hover,
        .tabContaier a.active {background:#fff; color:#000; border:1px solid #666;}       

        .youtubes {position:absolute; top:490px; left:50%;z-index:1;margin-left:-490px}
        .youtubes iframe {width:980px; height:550px}}
        
        .evt_05 {background:#555;padding-bottom:150px;}

        .evtInfo {padding:100px 0; background:#f4f4f4; color:#282828; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.5}
		.evtInfoBox h4 {font-size:40px; margin-bottom:30px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li { list-style:disc; margin-left:20px}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#evt01"> 
                <img src="https://static.willbes.net/public/images/promotion/2020/10/1873_sky_1.png" alt="" >
            </a> 
            <a href="https://www.youtube.com/channel/UCz_3g63yWTYjg6_Ko5QRK1g?view_as=subscriber" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2020/10/1873_sky_3.png" alt="" >
            </a>               
        </div>   

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>   

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1873_top_01.jpg" usemap="#Map1873_02" title="" border="0" />
            <map name="Map1873_02">
              <area shape="rect" coords="313,1264,800,1339" href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51135?subject_idx=1003&subject_name=형법&tab=material" target="_blank" alt="학습자료실">
            </map>
        </div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1873_01.jpg" title="" />
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/5A-cMTBiosg?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1873_02.jpg" title="" />
        </div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1873_03.jpg" title="" />
            <div class="tabContaier">  
                <ul class="NGEB">
                    <li><a href="#tab01" class="active">실무자 경험</a></li>
                    <li><a href="#tab02">형법 신세계</a></li>
                    <li><a href="#tab03">공범&신분</a></li>
                    <li><a href="#tab04">법률 용어</a></li>
                </ul>
            </div>
            <div id="tab01" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2020/10/1873_on_tab_c1.jpg" alt="실무자 경험"/>
                <div class="youtubes">
                    <iframe src="https://www.youtube.com/embed/Ws01SIhfmEg?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div id="tab02" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2020/10/1873_on_tab_c2.jpg" alt="형법 신세계"/>
                <div class="youtubes">
                    <iframe src="https://www.youtube.com/embed/26RYrHD5GfU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>        
            </div>
            <div id="tab03" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2020/10/1873_on_tab_c3.jpg" alt="공범&신분"/>
                <div class="youtubes">
                    <iframe src="https://www.youtube.com/embed/AjBcO9dlTa0?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>    
            </div>
            <div id="tab04" class="tabContents">
                <img src="https://static.willbes.net/public/images/promotion/2020/10/1873_on_tab_c4.jpg" alt="법률 용어"/>
                <div class="youtubes">
                    <iframe src="https://www.youtube.com/embed/ly7Csmd3uiw?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>        
            </div>
        </div>

        <div class="evtCtnsBox evt_04">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1873_04.jpg" title="" />
        </div>

        <div class="evtCtnsBox evt_05" style="background:#555;padding-bottom:150px;" id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1873_05.jpg" />
            {{--프로모션 동영상 단과 불러오기 모바일--}}
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
        </div>

        <div class="evtCtnsBox evt_06" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1873_06_01.jpg" usemap="#Map1872b" title="" border="0" />
            {{--
            <map name="Map1872b" id="Map1872b">
                <area shape="rect" coords="357,1209,734,1258" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="신광은 형법 심화이론 이미지 다운받기" />
            </map>
            --}}
        </div>

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif 

    </div>
    <!-- End Container -->

    <script>
        var $regi_form = $('#regi_form');
        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}';
                ajaxSubmit($regi_form, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                        {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
                    }
                }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

        $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()})})}
        );

        $(document).ready(function(){
            $(".tabContents").hide();
            $(".tabContents:first").show();
            $(".tabContaier ul li a").click(function(){
                var activeTab = $(this).attr("href");
                $(".tabContaier ul li a").removeClass("active");
                $(this).addClass("active");
                $(".tabContents").hide();
                $(activeTab).fadeIn();
                return false;
            });
        });
    </script>


@stop