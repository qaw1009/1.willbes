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
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}

        /************************************************************/

        .wb_top {background:#009726 url(https://static.willbes.net/public/images/promotion/2020/04/1600_top_bg.jpg) no-repeat center;}

        .wb_01 {background:#ebe9ea;}

        .wb_02 {background:#fff;}

        .wb_03{background:#f3f3f3;position:relative;}
        .checkWrap {position:absolute; bottom:100px;text-align:center; width:1120px; left:50%; margin-left:-560px; z-index:1}
        .checkWrap .check {padding:20px 0; font-size:120%; color:#000; font-weight:bold}
        .checkWrap .check input {border:2px solid #000; height:24px; width:24px; }
        .checkWrap .check a {display:inline-block; padding:10px 20px; color:#fff; background:#000; margin-left:50px; border-radius:20px}
        .checkWrap .red { padding:0 0 20px 0; font-size:120%; color:#ff0000; font-weight:bold;letter-spacing:-1px}

        .wb_04 {background:#fff;}     
     
    </style>

    <div class="evtContent NGR" id="evtContainer">

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1600_top.jpg"  alt="공득인 T-pass"  />
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1600_01.jpg"  alt="전문 교수진" />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1600_02.jpg"  alt="85% 할인" />
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1600_03.jpg"  alt="수강 신청하기" usemap="#Map1600a" border="0" />
            <map name="Map1600a" id="Map1600a">
                <area shape="rect" coords="905,499,988,522" href="#chkInfo" onclick="go_PassLecture('163917');" title="40만원 수강신청">
                <area shape="rect" coords="765,659,850,683" href="#chkInfo" onclick="go_PassLecture('163922');" title="50만원 수강신청">
                <area shape="rect" coords="904,660,987,683" href="#chkInfo" onclick="go_PassLecture('163923');" title="99만원 수강신청">
                <area shape="rect" coords="766,829,849,852" href="#chkInfo" onclick="go_PassLecture('163918');" title="51만원 수강신청">
                <area shape="rect" coords="904,828,989,852" href="#chkInfo" onclick="go_PassLecture('163919');" title="89만원 수강신청">
                <area shape="rect" coords="766,968,849,991" href="#chkInfo" onclick="go_PassLecture('163920');" title="51만원 수강신청2">
                <area shape="rect" coords="905,969,988,991" href="#chkInfo" onclick="go_PassLecture('163921');" title="89만원 수강신청2">
            </map>            
            <div class="checkWrap" id="chkInfo">
                <div class="check"><label><input name="ischk" type="checkbox" value="Y" /> 페이지 하단 윌비스 KCG 해양경찰 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label><a href="#info">이용안내확인하기 ↓</a></div>
                <div class="red">※ 강의공유, 콘텐츠 부정 사용 적발 시, 회원 자격 박탈 및 환불이 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 있을 수 있습니다.</div>
            </div>
        </div>

        <div class="evtCtnsBox wb_04" id="info">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1600_04.jpg"  alt="이용안내" />
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">

        function go_PassLecture(prod_code) {
			if($("input[name='ischk']:checked").length < 1) {
				alert("이용안내에 동의하셔야 합니다.");
				$("#chkInfo").focus();
				return;
			}
			location.href = "{{ site_url('/periodPackage/show/cate/3008/pack/648001/prod-code/') }}" + prod_code;
		}

    </script>
@stop