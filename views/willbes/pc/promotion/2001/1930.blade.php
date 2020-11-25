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

        .sky {position:fixed;top:250px;right:50px;z-index:1;}

        .wb_police {background:#0A0A0A}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/11/1930_top_bg.jpg) no-repeat center;}

        .wb_01,.wb_02,.wb_03,.wb_04,.wb_06{background:#FFF8E6;}	

        .wb_05 {background:#FF3552;}
       
        .wb_ctsInfo {background:#e9e9e9; padding:100px 0}  
        .wb_ctsInfo div {
            width:980px; margin:0 auto; color:#fff; font-size:14px; line-height:1.25;
            font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;
        }
        .wb_ctsInfo div h3 {font-size:30px; margin-bottom:30px; color:#555;} 
        .wb_ctsInfo div dt {font-size:18px; margin-bottom:10px; font-family: "NotoSansCJKkr-Regular", "Noto Sans KR", "sans-serif" !important;
            text-decoration:underline;color:#555;}  
        .wb_ctsInfo div dd {margin-bottom:30px}
        .wb_ctsInfo div dl {
            position: relative;
            padding-left:10px;
            color:#555;
        }
        .wb_ctsInfo div dl:before{
            background: #555 none repeat scroll 0 0; 
            border-radius: 2px;
            content: '';
            display: block;
            height: 4px;
            left: 0;
            position: absolute;
            top: 8px;
            width: 4px;
        }
        .wb_ctsInfo p {margin-top:40px;font-size:18px;}
        .wb_ctsInfo p span  {border:2px solid #fff; padding:10px 20px}

        /*타이머*/
        .newTopDday {clear:both;background:#f5f5f5; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-weight:600; color:#000}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:right; padding-right:10px; padding-top:10px; width:28%}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}
        .newTopDday ul:after {content:""; display:block; clear:both}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="p_re evtContent NSK" id="evtContainer">
    
        <div class="sky">
            <a href="@if(empty($file_yn) === false && $file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" alt="먼슬리 플래너 다운받기" ><img src="https://static.willbes.net/public/images/promotion/2020/11/1930_sky.png" alt="" ></a>
        </div>        

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div>
                <ul>
                    <li>
                        100% 무료쿠폰<br>누구나 받는시간!
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        남았습니다.
                    </li>
                </ul>
            </div>
        </div>  
        
        <div class="evtCtnsBox wb_police" >
			<img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="" />
		</div>     

        <div class="evtCtnsBox wb_top" id="main">
			<img src="https://static.willbes.net/public/images/promotion/2020/11/1930_top.jpg"  alt="" />
		</div>

        <div class="evtCtnsBox wb_01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1930_01.jpg"  alt="" usemap="#Map1930a" border="0" />
            <map name="Map1930a" id="Map1930a">
                <area shape="rect" coords="374,772,747,855" href="https://police.willbes.net/promotion/index/cate/3001/code/1839" target="_blank" />
            </map>
		</div>

		<div class="evtCtnsBox wb_02" >
			<img src="https://static.willbes.net/public/images/promotion/2020/11/1930_02.jpg"  alt="" />
		</div>
       
		<div class="evtCtnsBox wb_03" id="table">			
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1930_03.jpg"  alt="" usemap="#Map1930b" border="0" />
            <map name="Map1930b" id="Map1930b">
                <area shape="rect" coords="277,329,985,435" href="https://police.willbes.net/promotion/index/cate/3001/code/1801" target="_blank" />
                <area shape="rect" coords="278,479,983,585" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/174684" target="_blank" />
                <area shape="rect" coords="278,631,985,739" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/153524" target="_blank" />
                <area shape="rect" coords="279,781,982,887" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/171829" target="_blank" />
                <area shape="rect" coords="281,937,984,1043" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/171375" target="_blank" />
            </map>
		</div>        

		<div class="evtCtnsBox wb_04" >
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1930_04.jpg"  alt="" />          
		</div>   

        <div class="evtCtnsBox wb_05" >
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1930_05.jpg"  alt="" usemap="#Map1930c" border="0" />
            <map name="Map1930c" id="Map1930c">
                <area shape="rect" coords="159,597,399,665" href="javascript:alert('Comimg Soon :)')" />
                <area shape="rect" coords="436,595,680,667" href="javascript:alert('Comimg Soon :)')" />
                <area shape="rect" coords="721,595,959,668" href="javascript:alert('Comimg Soon :)')" />
            </map>            
		</div>           

        <div class="evtCtnsBox wb_06" >
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1930_06.jpg"  alt="" usemap="#Map1930d" border="0" />
            <map name="Map1930d" id="Map1930d">
                <area shape="rect" coords="408,911,715,973" href="javascript:;" onclick="giveCheck()" alt="응시쿠폰 받기" />
                <area shape="rect" coords="343,1295,781,1356" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="개편과목 개강 홍보 이미지 다운받기" />
                <area shape="rect" coords="293,1507,446,1595" href="http://cafe.daum.net/policeacademy" target="_blank" />
                <area shape="rect" coords="477,1504,645,1596" href="https://cafe.naver.com/polstudy" target="_blank" />
                <area shape="rect" coords="661,1502,836,1599" href="https://cafe.naver.com/kts9719" target="_blank" />
            </map>         
		</div>     

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
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
                    alert('전국 모의고사 50% 할인쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
                }
            }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('@if(empty($arr_promotion_params['edate'])===false) {{$arr_promotion_params['edate']}} @endif');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop