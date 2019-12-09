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
        .skyBanner {position:fixed; width:162px; top:200px; right:0; z-index:10;}
        .skyBanner a {display:block; margin-bottom:5px}
       
        .evt00 {background:#404040}

        /*타이머*/
        .time {width:100%; text-align:center; background:#ebebeb}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:30px; color:#000;}
        .time .time_txt .up{font-size:20px;font-weight:bold;}
        .time .time_txt .down{padding-left:25px;}
        .time span {color:#000; font-size:30px; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time table td:last-child,
        .time table td:last-child span {font-size:36px}

        .evtTop,.evt02 {background:#9f8b6a;}

        .evt01 {background:#fef1e0;}       

        .evt03 {background:#161615;}
  
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
            <div class="skyBanner">               
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1473_sky.png" usemap="#Map1473sky" title="올공반 베너" border="0">
                <map name="Map1473sky" id="Map1473sky">
                    <area shape="rect" coords="1,2,160,171" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1465" target="_blank" />
                    <area shape="rect" coords="2,176,164,345" href="#to_go" />
                </map>
            </div>

            <div class="evtCtnsBox evt00">
                <img src="https://static.willbes.net/public/images/promotion/2019/10/1443_00.jpg" title="신광은 경찰팀">
            </div>

            <div class="evtCtnsBox time NGEB" id="newTopDday">
                <div>
                    <table>
                        <tr>                    
                        <td class="time_txt"><span class="up">프리미엄관리반 올.공.반</span><br><span class="down">접수 마감까지</span></td>
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
                        <td><span>남았습니다.</td>
                        </tr>
                    </table>                
                </div>
            </div>
            <!-- 타이머 //-->
            
            <div class="evtCtnsBox evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1473_top.jpg" title="올공반 올케어">
            </div>

            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1473_01.jpg" title="프리미엄 올공반">
            </div>

            <div class="evtCtnsBox evt02">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1473_02.jpg" title="시스템.커리큘럼">
            </div>

            <div class="evtCtnsBox evt03" id="to_go">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1473_03.jpg" usemap="#Map1473a" title="올공반 올케어 지금 바로 신청하기" border="0">
                <map name="Map1473a" id="Map1473a">
                    <area shape="rect" coords="378,1002,744,1113" href="https://police.willbes.net/pass/offPackage/index/type/agong?cate_code=3010&campus_ccd=605001&course_idx=1094" target="_blank" alt="지금 바로 신청하기" />
                </map>                   
            </div>          

        </form>
	</div>
    <!-- End Container -->

    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop