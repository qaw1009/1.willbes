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
.evtContent span {vertical-align:auto}
.evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
/*****************************************************************/  

.skybanner {position:fixed;top:220px;right:0;z-index:1;}

/*타이머*/
.time {width:100%; text-align:center; background:#000}
.time {text-align:center; padding:20px 0}
.time table {width:1120px; margin:0 auto}
.time table td:first-child {/*font-size:40px*/}
.time table td img {width:70%}
.time .time_txt {font-size:28px; color:#fff; letter-spacing: -1px; font-weight:600}
.time .time_txt a {font-size:14px; display:block; margin-top:10px; border:1px solid #fff; padding:5px; border-radius:15px}
.time .time_txt a:hover {background:#fff; color:#000}
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



.top1_bg {background:#514a48 url(https://static.willbes.net/public/images/promotion/2020/01/1333_top1_bg.jpg) no-repeat center top;}
.top2_bg {background:#514a48 url(https://static.willbes.net/public/images/promotion/2020/01/1333_top2_bg.jpg) no-repeat center top;}
.evt01 {background:#fff;}
.evt02 {background:#bac0cc;}
.evt02 ul {position:absolute; top:1242px; width:1014px; left:50%; margin-left:-507px; z-index:5}
.evt02 ul li {display:inline; float:left; margin-right:8px}
.evt02 ul li:last-child {margin-right:0}
.evt02 ul li a {display:block; width:138px; height:209px; font-size:0; text-indent:-9999px}
.evt02 ul li:nth-child(6) a {background:url(https://static.willbes.net/public/images/promotion/2020/01/1333_02_t6s_btn.jpg) no-repeat left top;width:198px;}
.evt02 ul li:nth-child(7) a {background:url(https://static.willbes.net/public/images/promotion/2019/07/1333_02_t7_btn.jpg) no-repeat left top;}
.evt02 ul li:nth-child(4) a {background:url(https://static.willbes.net/public/images/promotion/2019/07/1333_02_t4_btn.jpg) no-repeat left top;}
.evt02 ul li:nth-child(5) a {background:url(https://static.willbes.net/public/images/promotion/2019/07/1333_02_t5_btn.jpg) no-repeat left top;}
.evt02 ul li:nth-child(1) a {background:url(https://static.willbes.net/public/images/promotion/2019/07/1333_02_t1_btn.jpg) no-repeat left top;}
.evt02 ul li:nth-child(2) a {background:url(https://static.willbes.net/public/images/promotion/2019/07/1333_02_t2_btn.jpg) no-repeat left top;}
.evt02 ul li:nth-child(3) a {background:url(https://static.willbes.net/public/images/promotion/2019/07/1333_02_t3_btn.jpg) no-repeat left top;}
.evt02 ul li a.active,
.evt02 ul li a:hover {background-position:right top}
.evt02 ul:after {content:""; display:block; clear:both}
.evt02 .tabCts { width:1120px; margin:0 auto; height:837px; overflow:hidden; position:relative;}
.evt03 {background:#424242}
</style>


    <div class="evtContent NGR" id="evtContainer"> 
        <ul class="skybanner">
            <li><a href="#golec"><img src="https://static.willbes.net/public/images/promotion/2019/12/1333_sky01.png" alt="신광은 경찰팀 T-PASS"></a></li>
            <li style="padding-top:10px;"><a href="#golec"><img src="https://static.willbes.net/public/images/promotion/2020/01/1333_sky02.png" alt="신광은 경찰팀 T-PASS"></a></li>
        </ul> 
        <!-- 타이머 -->
        <div class="evtCtnsBox time NGEB"  id="newTopDday">
            <div>
                <table>
                    <tr>                       
                        <td class="time_txt">지금 구성 완전 마감까지</td>
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
                        <td class="time_txt">남았습니다.<br><a href="#evt02">지금 바로 신청하기 ></a></td>                     
                    </tr>
                </table>                
            </div>
        </div>
        
        <div class="evtCtnsBox top1_bg">  
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1333_top1.jpg" alt="신광은 경찰팀 T-PASS">  
        </div>

        <div class="evtCtnsBox top2_bg">  
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1333_top2.jpg" alt="신광은 경찰팀 T-PASS">  
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1333_01.jpg" alt="커리큘럼" usemap="#Map1333zy" border="0" />
            <map name="Map1333zy" id="Map1333zy">
                <area shape="rect" coords="33,707,190,745" href="https://police.willbes.net/promotion/index/cate/3001/code/1126" target="_blank" alt="커리큘럼 자세히보기" />
                <area shape="rect" coords="335,707,416,733" href="#none" alt="기본과정" onclick="fnPlayerSample('132199', '1019097', 'HD');" />
                <area shape="rect" coords="624,707,707,734" href="#none" alt="심화과정" onclick="fnPlayerSample('132216', '1019296', 'HD');" />
                <area shape="rect" coords="916,706,996,735" href="#none" alt="문제풀이과정" onclick="fnPlayerSample('131811', '1014607', 'HD');" />
            </map>          
        </div>  

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1333_02.jpg" alt="즉시 4만원 할인">
            <ul>
                <li><a href="#tab1">형소법 신광은</a></li>
                <li><a href="#tab2">형법 김원욱</a></li>
                <li><a href="#tab3">경찰학 장정훈</a></li>  
                <li><a href="#tab4">한국사 원유철</a></li>   
                <li><a href="#tab5">한국사 오태진</a></li>
                <li><a href="#tab6">영어 하승민</a></li>               
            </ul>
            <div id="tab1" class="tabCts">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1333_02_t1.jpg" alt="형소법 신광은" usemap="#Map1333A" border="0">
                <map name="Map1333A" id="Map1333A">
                    <area shape="rect" coords="66,528,464,572" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/159213" target="_blank" alt="수강신청" />
                </map>
            </div>
            <div id="tab2" class="tabCts">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1333_02_t2.jpg" alt="형법 김원욱" usemap="#Map1333B" border="0">
                <map name="Map1333B" id="Map1333B">
                    <area shape="rect" coords="66,528,464,572" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/159218" target="_blank" alt="수강신청" />
                </map>
            </div> 
            <div id="tab3" class="tabCts">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1333_02_t3.jpg" alt="경찰학 장정훈" usemap="#Map1333C" border="0">
                <map name="Map1333C" id="Map1333C">
                    <area shape="rect" coords="66,528,464,572" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/159214" target="_blank" alt="수강신청" />
                </map>
            </div> 
            <div id="tab4" class="tabCts">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1333_02_t4.jpg" alt="한국사 원유철" usemap="#Map1333D" border="0">
                <map name="Map1333D" id="Map1333D">
                    <area shape="rect" coords="66,528,464,572" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/159219" target="_blank" alt="수강신청" />
                </map>
            </div> 
            <div id="tab5" class="tabCts">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1333_02_t5.jpg" alt="한국사 오태진" usemap="#Map1333E" border="0">
                <map name="Map1333E" id="Map1333E">
                    <area shape="rect" coords="66,528,464,572" href="https://police.willbes.net/periodPackage/show/cate/3008/pack/648001/prod-code/159220" target="_blank" alt="수강신청" />
                </map>
            </div> 
            <div id="tab6" class="tabCts">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/1333_02_t6s.jpg" alt="영어 하승민.김현정" usemap="#Map1333F" border="0">
                <map name="Map1333F" id="Map1333F">
                    <area shape="rect" coords="70,530,510,573" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/161065" target="_blank" alt="수강신청" />
                </map>                
            </div> 
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1333_02_01.jpg">
            <div id="golec">                
                <img src="https://static.willbes.net/public/images/promotion/2020/01/1333_02_bottom.jpg" alt="패스 수강신청" usemap="#map190913" border="0">
                <map name="map190913" id="map190913">
                    <area shape="rect" coords="114,231,276,277" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/161066" target="_blank" alt="하승민/김현정/오태진" />
                    <area shape="rect" coords="321,231,488,279" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/161067" target="_blank" alt="하승민/김현정/원유철" />
                    <area shape="rect" coords="740,231,903,278" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/159225" target="_blank" alt="3법패스" />
                </map>
            </div>
        </div>
        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1333_03.jpg" alt="실전 모의고사">             
        </div>               
    </div>
    <!-- End Container --> 

    <script type="text/javascript">
        $(document).ready(function(){
            $('.evt02 ul').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
            
                $content = $($active[0].hash);
            
                $links.not($active).each(function () {
                $(this.hash).hide()});
            
                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                $active.removeClass('active');
                $content.hide();
            
                $active = $(this);
                $content = $(this.hash);
            
                $active.addClass('active');
                $content.show();
            
                e.preventDefault()})})}
        );

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop