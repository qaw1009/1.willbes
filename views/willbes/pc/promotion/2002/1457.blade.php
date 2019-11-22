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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evtTop00 {background:#404040}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/11/1457_top_bg.jpg) no-repeat center;}

        .wb_01 {background:url(https://static.willbes.net/public/images/promotion/2019/11/1457_01_bg.jpg) no-repeat center;position:relative;}
        .youtubeGod{width:100%;text-align:center;position:absolute;top:32.5%;}
        .youtubeGod iframe {width: 860px;height: 480px;margin:0 auto;}


        .wb_02 {background:#ECECEC;}

        .wb_03 {background:#7416C4;}       

        .wb_04 {background:#f4f4f4;} 
        
        #frm_713001{background:#f4f4f4;}

        .wb_05 {background:#fff;}

        .wb_06 {background:#f4f4f4;}

        .wb_07 {background:#fff;padding-bottom:75px;}    

    </style>
  

    <div class="p_re evtContent NSK" id="evtContainer">    

        <div class="evtCtnsBox evtTop00">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1284_00.jpg" title="대한민국 경찰학원 1위">        
        </div>

        <div class="evtCtnsBox wb_top">
			<img src="https://static.willbes.net/public/images/promotion/2019/11/1457_top.jpg"  alt="신의 한수 교재출간 이벤트">
		</div>

        <div class="evtCtnsBox wb_01" >
			<img src="https://static.willbes.net/public/images/promotion/2019/11/1457_01.jpg"  alt="소개영상"/>
                <div class="youtubeGod">
                    <iframe src="https://www.youtube.com/embed/B99HpGSVnEQ" frameborder="0" allowfullscreen=""></iframe>         
                </div>			
		</div>

		<div class="evtCtnsBox wb_02" >
			<img src="https://static.willbes.net/public/images/promotion/2019/11/1457_02.jpg"  alt="왜 선택해야 되나요" />
		</div>
       
		<div class="evtCtnsBox wb_03">	
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1457_03.jpg"  alt="스페셜 이벤트" />          
		</div>     

        <div class="evtCtnsBox wb_04">	
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1457_04.jpg"  alt="한줄 기대평" />          
		</div>    

        {{--댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif


        <div class="evtCtnsBox wb_05">	
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1457_05.jpg"  alt="문자 기대평" />          
		</div>  

        <div class="evtCtnsBox wb_06">	
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1457_06.jpg"  alt="수강신청" usemap="#Map1457a" border="0" />
            <map name="Map1457a" id="Map1457a">
                <area shape="rect" coords="700,832,979,906" href="https://police.willbes.net/promotion/index/cate/3001/code/1333" target="_blank" />
            </map>
		</div>  

        <div class="evtCtnsBox wb_07">	
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1457_07.jpg"  alt="이미지 다운받기" usemap="#Map1457b" border="0" />
            <map name="Map1457b" id="Map1457b">
                <area shape="rect" coords="318,783,842,865" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="소문내기 이벤트 이미지 다운받기" />
            </map>        
		</div>  

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif 
               
	</div>
    <!-- End Container -->

    <script type="text/javascript">
        $regi_form = $('#regi_form');

        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}';
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('전국 모의고사 무료 응시쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
                }
            }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }
       
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop