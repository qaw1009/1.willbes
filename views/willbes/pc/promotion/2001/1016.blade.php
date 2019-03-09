@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')

    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_top {background:#441e1f url(http://file3.willbes.net/new_cop/2019/01/EV190104_p1_bg.jpg) no-repeat center;}
        .wb_01 {background:#5a5e65}
        .wb_02 {background:#afb1b6}
        .wb_03 {background:#cbccd1}
        .wb_04 {background:#e2e2e2; font-size:120%; background:#e2e2e2; padding-bottom:100px;}
        .wb_04 .wb_04_c {width:880px; margin:0 auto; border:1px solid #d6d6d6; background:#fff; padding:48px 58px; text-align:left; margin-bottom:80px}
        .wb_04 .wb_04_c span {display:inline-block; font-size:140%; font-weight:500; background:#712019; color:#fff; height:36px; line-height:36px; padding:0 20px}
        .wb_04 .wb_04_c p {border-top:1px solid #c2c2c2; margin-bottom:20px}
        .wb_04 table {width:100%; margin-bottom:30px}
        .wb_04 td {padding:8px 20px; color:#272727}
        .wb_04 td a {display:inline-block; padding:3px 10px; border:1px solid #272727; color:#272727}
        .wb_04 td a:hover {background:#272727; color:#fff}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top"  id="main">
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190104_p1.png"  alt="프리미엄 심화이론/심화기출 " />
        </div>

        <div class="evtCtnsBox wb_01" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190104_p2.png"  alt="01" />
        </div>

        <div class="evtCtnsBox wb_02" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190104_p3.png"  alt="02" />
        </div>

        <div class="evtCtnsBox wb_03" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190104_p4.png"  alt="03" />
        </div>

        <div class="evtCtnsBox wb_04" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190104_p5_1.png"  alt="프리미엄 심화이론/심화기출 구매" />
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190104_p5_2.png"  alt="심화이론" />
            <div class="wb_04_c">
                <span>NEW 심화 단과</span>
                <table>
                    <col />
                    <col width="20%" />
                    <tr>
                        <td>2019년 신광은 형사소송법 심화이론</td>
                        <td><a href="{{ front_url('/lecture/show/cate/3001/pattern/only/prod-code/132216') }}" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>2019년 장정훈 경찰학개론 심화기출</td>
                        <td><a href="{{ front_url('/lecture/show/cate/3001/pattern/only/prod-code/132221') }}" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>2019년 김원욱 형법 원기총</td>
                        <td><a href="{{ front_url('/lecture/show/cate/3001/pattern/only/prod-code/132224') }}" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>2019년 하승민 영어 심화영어</td>
                        <td><a href="{{ front_url('/lecture/show/cate/3001/pattern/only/prod-code/132229') }}" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>2019년 오태진 한국사 심화과정(기출)</td>
                        <td><a href="{{ front_url('/lecture/show/cate/3001/pattern/only/prod-code/132233') }}" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>2019년 원유철 한국사 심화과정(이론)</td>
                        <td><a href="{{ front_url('/lecture/show/cate/3001/pattern/only/prod-code/132231') }}" target="_blank">수강신청</a></td>
                    </tr>
                </table>
                <p>&nbsp;</p>
                <span>NEW 심화 패키지</span>
                <table>
                    <col />
                    <col width="20%" />
                    <tr>
                        <td>2019년 일반경찰 심화과정 패키지 (史 오태진)</td>
                        <td><a href="{{ front_url('/package/show/cate/3001/pack/648001/prod-code/149540') }}" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>2019년 일반경찰 심화과정 패키지 (史 원유철)</td>
                        <td><a href="{{ front_url('/package/show/cate/3001/pack/648001/prod-code/149539') }}" target="_blank">수강신청</a></td>
                    </tr>
                </table>
                <div>
                    ※ 패키지는 결제완료시 수강이 자동시작됩니다.<br>
                </div>
            </div><!--wb_04_c//-->
        </div><!--wb_04//-->
    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });
    </script>
@stop