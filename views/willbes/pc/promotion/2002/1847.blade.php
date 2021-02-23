@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">    
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
        .skyBanner {position:fixed; width:170px; top:200px; right:10px; z-index:10;}
        .skyBanner a {display:block; margin-bottom:5px}
       
        .evt00 {background:#0a0a0a}

        /*타이머*/
        .time {width:100%; text-align:center; background:#f5f5f5;}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td {line-height:1.2}        
        .time table td img {width:65%}
        .time .time_txt {font-size:30px; color:#000; text-align:right}        
        .time span {color:#000; font-size:30px;}
        .time .time_txt span{padding-left:25px;}
        .time table td:last-child,
        .time table td:last-child span {font-size:36px}

        .evtTop {background: url(https://static.willbes.net/public/images/promotion/2021/02/1847_top_bg.jpg) no-repeat center top;}
        .evtTop span {position:absolute; top:200px; left:50%; margin-left:-500px; -webkit-animation:swing 2s linear infinite;animation:swing 2s linear infinite}
        @@keyframes swing{
            0%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            25%{-webkit-transform:rotate3d(0,0,1,10deg);transform:rotate3d(0,0,1,10deg)}
            50%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            75%{-webkit-transform:rotate3d(0,0,1,-10deg);transform:rotate3d(0,0,1,-10deg)}
            100%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
        }
        .evt01 {background:#2d395a;}   
        .evt02 {background:#fef1e0;}
        .evt03 {background:#d7e3ef;} 
        .evt04 {background:#2d395a;}  
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
            <div class="skyBanner">               
                <a href="#to_go"><img src="https://static.willbes.net/public/images/promotion/2021/02/1847_sky.png" title="올공반 베너"></a>
            </div>

            <div class="evtCtnsBox evt00">
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
            </div>
            
            <div class="evtCtnsBox time NSK-Black" id="newTopDday">
                <div>
                    <table>
                        <tr>                    
                        <td class="time_txt"><span>올.공.반<br>접수 마감까지</span></td>
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
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1847_top.jpg" title="올공반 올케어">
                <span><img src="https://static.willbes.net/public/images/promotion/2021/02/1847_sky02.png" title="올공반 2기"></span>
            </div>

            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1847_01.jpg" title="경찰합격">
            </div>

            <div class="evtCtnsBox evt02">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1847_02.jpg" title="시스템">
            </div>

            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1847_03.jpg" title="시스템">                           
            </div>    
            
            <div class="evtCtnsBox evt04" id="to_go">
                <img src="https://static.willbes.net/public/images/promotion/2021/02/1847_04.jpg" usemap="#Map1847a" title="올공반 올케어 지금 바로 신청하기" border="0">
                <map name="Map1847a">
                    <area shape="rect" coords="370,1185,743,1302" href="https://police.willbes.net/pass/offPackage/index/type/agong?cate_code=3010&campus_ccd=605001&course_idx=1094" target="_blank" alt="지금 바로 신청하기" />
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