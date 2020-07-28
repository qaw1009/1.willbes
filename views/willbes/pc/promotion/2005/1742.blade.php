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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/
        
        .evt_top {background:#0C1D23 url(https://static.willbes.net/public/images/promotion/2020/07/1742_top_bg.jpg) no-repeat center top;}

        .evt_02, .evt_04 {background:#ececec;}

        .check { position:absolute; bottom:50px; left:50%; margin-left:-490px; width:980px; padding:20px 0px 20px 10px; letter-spacing:3; color:#fff; z-index:5}
        .check label {cursor:pointer; font-size:15px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#393939 ; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1742_top.gif" alt="기본실력완성 패키지 이벤트"/>
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1742_01.jpg" alt="예비순환 패키지" usemap="#Map1742a" border="0" />
            @if(empty($__cfg['CateCode']) === false && $__cfg['CateCode'] == '3094')
            <map name="Map1742a" id="Map1742a">
                <area shape="rect" coords="310,519,808,624" href="{{ site_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?search_order=regist&course_idx=1315') }}" target="_blank"/>
            </map>
            @elseif(empty($__cfg['CateCode']) === false && $__cfg['CateCode'] == '3095')
            <map name="Map1742a" id="Map1742a">
                <area shape="rect" coords="310,519,808,624" href="{{ site_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/only?search_order=regist&course_idx=1315') }}" target="_blank"/>
            </map>
            @endif 
		</div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1742_02.jpg" alt="예비순환 패키지 유의사항" />
		</div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1742_03.jpg" alt="예비순환 패키지 gs1순환 패키지" usemap="#Map1742_apply" border="0" />
            <map name="Map1742_apply" id="Map1742_apply">
                <area shape="rect" coords="720,594,913,657" href="javascript:go_PassLecture('169733');">
                <area shape="rect" coords="721,741,912,807" href="javascript:go_PassLecture('169737');">
                <area shape="rect" coords="717,890,916,953" href="javascript:go_PassLecture('169740');">
                <area shape="rect" coords="718,1038,915,1104" href="javascript:go_PassLecture('169742');">
                <area shape="rect" coords="720,1184,914,1251" href="javascript:go_PassLecture('169743');">
                <area shape="rect" coords="720,1332,912,1398" href="javascript:go_PassLecture('169749');">
                <area shape="rect" coords="721,1483,914,1547" href="javascript:go_PassLecture('169751');">
                <area shape="rect" coords="721,1629,912,1695" href="javascript:go_PassLecture('169755');">
                <area shape="rect" coords="720,1776,914,1843" href="javascript:go_PassLecture('169757');">
                <area shape="rect" coords="720,1928,914,1993" href="javascript:go_PassLecture('169758');">
                <area shape="rect" coords="720,2074,914,2140" href="javascript:go_PassLecture('169760');">
                <area shape="rect" coords="720,2222,913,2286" href="javascript:go_PassLecture('169765');">
                <area shape="rect" coords="720,2372,915,2437" href="javascript:go_PassLecture('169771');">
                <area shape="rect" coords="722,2518,912,2585" href="javascript:go_PassLecture('169773');">
                <area shape="rect" coords="720,2665,915,2734" href="javascript:go_PassLecture('169778');">
                <area shape="rect" coords="718,2813,918,2879" href="javascript:go_PassLecture('169780');">
            </map>
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    기본실력완성 패키지 이벤트 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#notice">이용안내확인하기 ↓</a>
            </div>   
		</div>

        <div class="evtCtnsBox evt_04" id="notice">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1742_04.jpg" alt="예비순환 패키지 gs1순환 패키지 유의사항" />
		</div>
                        
	</div>
    <!-- End Container -->

    <script type="text/javascript">
     /*수강신청 동의*/ 
     function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/package/show/cate/3094/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }    

    </script>
@stop