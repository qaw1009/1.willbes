@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
<style type="text/css">
.subContainer {
    min-height:auto !important;
    margin-bottom:0 !important;
}
.evtContent { 
    position:relative;            
    width:100% !important;
    margin-top:20px !important;
    padding:0 !important;
    background:#fff;
}	
.evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
/*****************************************************************/  

/*타이머*/
.time {width:100%; text-align:center; background:#000}
.time {text-align:center; padding:20px 0}
.time table {width:1120px; margin:0 auto}
.time table td:first-child {font-size:40px}
.time table td img {width:80%}
.time .time_txt {font-size:28px; color:#fff; letter-spacing: -1px; font-weight:600}
.time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
.time p {text-alig:center}
@@keyframes upDown{
from{color:#d63e4d}
50%{color:#eebd8f}
to{color:#d63e4d}
}
@@-webkit-keyframes upDown{
from{color:#d63e4d}
50%{color:#eebd8f}
to{color:#d63e4d}
}

.top_bg {background:url(https://static.willbes.net/public/images/promotion/2019/07/1330_top_bg.jpg) no-repeat center top;}
.top_bg .check{
    position:absolute; width:1000px; left:50%; top:1200px; margin-left:-500px; z-index:1;font-size:14px;text-align:center;line-height:1.5;
    letter-spacing:-1px;
}

.evtCtnsBox .check label{color:#333;font-size:16px;}
.evtCtnsBox .check input {border: 2px solid #000;margin-right: 8px;height: 17px; width: 17px;} 
.evtCtnsBox .check a {display: inline-block; padding:5px 20px; color: #111528;background: #d7d7d7;border-radius:20px; margin-left:20px}
.evtCtnsBox .check a:hover {color: #fff;background: #000;}

.evt01 {background:#eef1f8}
.evt01 div {width:1120px; margin:0 auto; position:relative;}
.evt01 div span {position:absolute; z-index:5}
.evt01 div .img01 {width:441px; top:25px; left:306px;}
.evt01 div .img02 {width:176px; top:283px; left:160px;}
.evt01 div .img03 {width:191px; top:139px; left:795px;}

.evt04 {background:#2bb9a9}
.evt04 .check{
    position:absolute;width: 800px;left:50%;top:880px;margin-left:-400px;z-index:1;font-size:14px; text-align:center;line-height:1.5;
    letter-spacing:-1px;
}
.evt04 .check label{color:#333}
.evt05 {background:#eef1f8}

</style>


    <div class="evtContent NGR" id="evtContainer">  
        <!-- 타이머 -->
        <div class="evtCtnsBox time NGEB"  id="newTopDday">
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

        <div class="evtCtnsBox top_bg">  
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1330_top.jpg" alt="조민주 한국사" usemap="#Map1330a" border="0">
            <map name="Map1330a" id="Map1330a">
                <area shape="rect" coords="140,1061,975,1134" href="javascript:go_PassLecture(1);" target="_blank" alt="수강신청"/>
            </map>
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1330_01.jpg" alt="한국사 정복">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1330_02.jpg" alt="모니터">
                <span class="img01"><img src="https://static.willbes.net/public/images/promotion/2019/07/1330_02_1.gif" alt="강의1"></span>
                <span class="img02"><img src="https://static.willbes.net/public/images/promotion/2019/07/1330_02_2.gif" alt="강의2"></span>
                <span class="img03"><img src="https://static.willbes.net/public/images/promotion/2019/07/1330_02_3.gif" alt="강의3"></span>
            </div>
            <iframe width="853" height="480" src="https://www.youtube.com/embed/aj_BQRFRe4M" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1330_03.jpg" alt="커리큘럼"> 
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1330_04.jpg" alt="수강신청" usemap="#Map1330b" border="0">
            <map name="Map1330b" id="Map1330b">
                <area shape="rect" coords="702,710,963,798" href="javascript:go_PassLecture(1);" target="_blank" alt="수강신청" />
            </map> 
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
        </div>
        <div class="evtCtnsBox evt05" id="careful">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1330_05.jpg" alt="실전 모의고사"> 
        </div>    
                        
              
    </div>
    <!-- End Container --> 

    <script type="text/javascript">
        function go_PassLecture(no){

            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            var lUrl;
            if(no == 1){
                lUrl = "https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/155496";
            }
            location.href = lUrl;
        }

        function goDesc(tab){
            location.href = '#careful';
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop