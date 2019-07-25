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
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_top {background:#3d3f3d url(https://static.willbes.net/public/images/promotion/2019/07/1337_top_bg.jpg) no-repeat center top; position:relative}

        .wb_cts00 {background:#fff; padding-bottom:100px}
        .wb_cts00 iframe {width:870px; height:480px;}
        .wb_cts00 li:last-child {
            margin-top:10px;
        }
        .wb_cts01 {background:#f6f6f6;}
        .wb_cts02 {background:#f49168;position:relative;}
        .wb_cts03 {background:#f6f6f6;}

        .wb_top .check{ position:absolute; width:1000px; left:50%; top:1200px; margin-left:-500px; z-index:1;font-size:14px;text-align:center;line-height:1.5;
                        letter-spacing:-1px;}
        .check2{position:absolute;right:475px;top:900px;}  

        .evtCtnsBox .check label{color:#fff;font-size:16px;}
        .evtCtnsBox .check input {border: 2px solid #000;margin-right: 8px;height: 17px; width: 17px;} 
        .evtCtnsBox .check a {display: inline-block; padding:5px 20px; color: #111528;background: #d7d7d7;border-radius:20px; margin-left:20px}
        .evtCtnsBox .check a:hover {color: #fff;background: #000;}      

        .evtCtnsBox .check2 label {color:#000;font-size:16px;}
        .evtCtnsBox .check2 input {border: 2px solid #000;margin-right: 8px;height: 17px; width: 17px;} 
        .evtCtnsBox .check2 a {padding:5px 20px; color: #111528;background: #fff;border-radius:20px; margin-left:20px;font-weight:bold;}
        .evtCtnsBox .check2 a:hover {color: #fff;background: #000;}     

     

        /*타이머*/
        .time {width:100%; text-align:center; background:#e1e1e1}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {font-size:40px}
        .time table td img {width:80%}
        .time .time_txt {font-size:28px; color:#000; letter-spacing: -1px; font-weight:bold}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ff6600}
        to{color:#d63e4d}
        }
        @@-webkit-keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ff6600}
        to{color:#d63e4d}
        } 
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox time NGEB" id="newTopDday">
            <div>
                <table>
                    <tr>
                    <td class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }} </span>마감!</td>
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

        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1337_top.jpg" alt="한세훈 행정법" usemap="#Map1337a" border="0" />
                <map name="Map1337a" id="Map1337a">
                    <area shape="rect" coords="136,1051,987,1143" href="javascript:go_PassLecture(1);" target="_blank" alt="수강신청 이용약관동의"/>
                </map>

            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
  
            
        </div><!--WB_top//-->

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1337_01.jpg" alt="행정법 기본기"/>
        </div><!--WB_01//-->

        <div class="evtCtnsBox wb_cts02" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1337_02.jpg" alt="수강신청" usemap="#Map1337b" border="0"/>
                <map name="Map1337b" id="Map1337b">
                    <area shape="rect" coords="689,703,946,795"  href="javascript:go_PassLecture(1);" target="_blank" alt="수강신청 이용약관동의"/>
                </map>

            <div class="check2">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
        </div><!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03" id="careful" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1337_03.jpg" alt="이용안내 및 유의사항"/>
        </div><!--wb_cts03//-->
        {{--
        <div class="evtCtnsBox wb_cts00" >
            <ul>            
                <li>
                    <iframe src="https://www.youtube.com/embed/iku-4RrvuDE?rel=0" frameborder="0" allowfullscreen></iframe>
                </li>
            </ul>
        </div><!--WB_cts00//-->     
        --}}

    </div>
    <!-- End Container -->

    <script language="javascript">
         function go_PassLecture(no){

            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            var lUrl;
            if(no == 1){
                lUrl = "https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/155735";
            }
            location.href = lUrl;
            }

            function goDesc(tab){
            location.href = '#careful';
            }
            
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop