@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1278px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .eventWrap {width:100%; text-align:center; min-width:1278px; position:relative;}

        /************************************************************/

        .btnBox {width:100%; text-align:center}
        .btnBox a {width:420px; margin:0 auto; display:inline-block; color:#fff; background:#b9689d; font-size:24px; font-weight:bold; height:60px; line-height:60px; border-radius:30px; border-bottom:3px solid #682c53; text-align:center}
        .btnBox a:hover {background:#682c53;}

        .subCon_wrap {width:100% !important; background:#fff;}

        .eventWrap {width:100%; min-width:1278px; margin:0 auto; text-align:center; font-size:14px; line-height:1.4}

        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2020/10/200911_top_bg.jpg) no-repeat center top;}

        .event01 {background:url(https://static.willbes.net/public/images/promotion/2020/10/200911_01_bg.jpg) repeat-x center top;}

        .event02 {background:#464243}

        .event04 {background:#292929;}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="eventWrap eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2020/10/200911_top.jpg" alt=""/>
        </div>

        <div class="eventWrap event01">
        	<img src="https://static.willbes.net/public/images/promotion/2020/10/200911_01.jpg" alt=""/>
        </div>

        <div class="eventWrap event02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/200911_02.jpg" alt=""/>
        </div>

        <div class="eventWrap event03">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/200911_03.jpg" alt="" usemap="#Map0911" border="0"/>
            <map name="Map0911" id="Map0911">
              <area shape="rect" coords="963,183,1129,238" href="javascript:alert('신청기간이 종료되었습니다.');" alt="이인재" />
              <area shape="rect" coords="964,394,1128,445" href="javascript:alert('신청기간이 종료되었습니다.');" alt="이원근" />
              <area shape="rect" coords="962,575,1128,628" href="javascript:alert('신청기간이 종료되었습니다.');" alt="권보민" />
              <area shape="rect" coords="962,709,1129,762" href="javascript:alert('신청기간이 종료되었습니다.');" alt="권보민" />
              <area shape="rect" coords="963,887,1127,940" href="javascript:alert('신청기간이 종료되었습니다.');" alt="김영문" />
              <area shape="rect" coords="963,1051,1127,1104" href="javascript:alert('신청기간이 종료되었습니다.');" alt="공훈 영어학" />
              <area shape="rect" coords="964,1167,1131,1221" href="javascript:alert('신청기간이 종료되었습니다.');" alt="공훈 영어교육론" />
              <area shape="rect" coords="962,1388,1129,1439" href="javascript:alert('신청기간이 종료되었습니다.');" alt="김철홍" />
              <area shape="rect" coords="964,1657,1128,1709" href="javascript:alert('신청기간이 종료되었습니다.');" alt="박태영" />
              <area shape="rect" coords="964,1876,1130,1927" href="javascript:alert('신청기간이 종료되었습니다.');" alt="김병찬" />
              <area shape="rect" coords="963,2039,1128,2092" href="javascript:alert('신청기간이 종료되었습니다.');" alt="최용림 역사이론" />
              <area shape="rect" coords="963,2153,1129,2205" href="javascript:alert('신청기간이 종료되었습니다.');" alt="최용림 기출" />
              <area shape="rect" coords="961,2319,1130,2368" href="javascript:alert('신청기간이 종료되었습니다.');" alt="다이애나" />
              <area shape="rect" coords="963,2555,1128,2609" href="javascript:alert('신청기간이 종료되었습니다.');" alt="중국어" />
            </map>
        </div>

        <div class="eventWrap event04">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/200911_04.jpg" alt=""/>
        </div>
    </div>
    <!-- End Container -->
@stop