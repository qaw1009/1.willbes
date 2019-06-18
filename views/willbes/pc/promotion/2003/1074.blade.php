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
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/04/1074_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#fdfdfd}
        .evt02 {background:#ebeff0}
        .evt03 {background:#fdfdfd}
        .evt04 {background:#20242d url(https://static.willbes.net/public/images/promotion/2019/04/1074_04_bg.jpg) no-repeat center top;}
        .evt05 {background:#fff}

        .time {width:100%; text-align:center; background:#e9e7e8}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {font-size:40px}
        .time table td img {width:70%}
        .time .time_txt {font-size:24px; color:#000; letter-spacing: -1px; font-weight:bold}
        .time .time_txt span {color:#ea263e}

        .skybanner {
            position:fixed;
            top:250px;
            right:10px;
            z-index:1;
        }
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox time" id="newTopDday">
            <div id="ddaytime">
                <table>
                    <tr>
                    <td class="time_txt NGEB"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }} 마감!</span></td>
                    <td class="time_txt">마감까지<br><span>남은 시간은</span></td>
                    <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">일 </td>
                    <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td class="time_txt">:</td>
                    <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                    </tr>
                </table>                
            </div>
        </div>
        <!-- 타이머 //-->

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1074_top2.png" usemap="#Map_1074_lec" title="기미진T-PASS" border="0" />
            <map name="Map_1074_lec">
                <area shape="rect" coords="105,796,532,910" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/152965" target="_blank">
                <area shape="rect" coords="584,796,1034,912" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/152964" target="_blank">
            </map>
        </div>

        <div class="evtCtnsBox evt01">
		<img src="https://static.willbes.net/public/images/promotion/2019/04/1074_01.jpg" usemap="#Map_pass_go" title="현직근무자가 추천하는 기특한 국어" border="0" />
			<map name="Map_pass_go">
			  <area shape="rect" coords="773,866,1045,914" href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4&board_idx=225216&tab=notice" target="_blank" alt="합격수기">
			</map>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1074_02.jpg" title="기미진국어를 수식하는말 모음" />
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1074_03.jpg" title="기특한국어커리큘럼" />
        </div>

        <div class="evtCtnsBox evt04" id="lec_go">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1074_04.jpg" usemap="#Map_1074_lec2" title="기미진T-PASS" border="0" />
			<map name="Map_1074_lec2">
                <area shape="rect" coords="485,771,705,825" href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/152965') }}" target="_blank" alt="39만원수강신청">
                <area shape="rect" coords="746,773,976,823" href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/152964') }}" target="_blank" alt="49만원수강신청">
            </map>
        </div>
        <!--wb_cts05//-->

        <div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1074_05.jpg" alt="이용안내 및 유의사항 " />
        </div>
        <!--wb_cts06//-->

    </div>
    <!-- End Container -->

    <script>
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop