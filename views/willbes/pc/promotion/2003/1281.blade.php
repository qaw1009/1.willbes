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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_cts01 {position:relative; overflow:hidden; background:#1c1c1c url("https://static.willbes.net/public/images/promotion/2019/12/1281_top_bg.gif") center top  no-repeat;height:720px;}
        .wb_cts02 {background:#25c2f7 url("https://static.willbes.net/public/images/promotion/2019/12/1281_01_bg.jpg") center top  no-repeat}
  
        .wb_cts04 {background:#eaeaea;padding-bottom:100px; position:relative}
        .wb_cts05 {background:#494949;}
		/* TAB */
        .tab {width:980px; margin:0 auto; bottom:120px; left:50%;border-left:4px solid #a8a8aa; border-right:4px solid #a8a8aa;border-top:4px solid #a8a8aa; }		
        .tab li {display:inline; float:left; border-right:1px solid #a8a8aa}
        /*.tab li:last-child {border:0}	*/
        .tab a img.off {display:block}
        .tab a img.on {display:none}
        .tab a.active img.off {display:none}
        .tab a.active img.on {display:block}
        .tab:after {content:""; display:block; clear:both}

		/* txt_motion */
		.wb_cts01 > div {width:1120px; margin:0 auto; position:relative;}
		.wb_cts01 > div span {position:absolute; width:120px; z-index: 1;}
		.wb_cts01 > div span.txt1 {top:185px; left:150px; animation:slidein1 0.2s ease-in; -webkit-animation:slidein1 0.2s ease-in;}
		.wb_cts01 > div span.txt2 {top:275px; left:150px; animation:slidein2 0.4s ease-in; -webkit-animation:slidein2 0.4s ease-in;}
		.wb_cts01 > div span.txt3 {top:365px; left:150px; animation:slidein3 0.6s ease-in; -webkit-animation:slidein3 0.6s ease-in;}
		.wb_cts01 > div span.txt4 {top:430px; left:150px; animation:slidein4 0.8s ease-in; -webkit-animation:slidein4 0.8s ease-in;}
		@@keyframes slidein1 {from {left:605px; opacity: 0;}to {left:150px; opacity: 1}}
		@@keyframes slidein2 {from {left:605px; opacity: 0;}to {left:150; opacity: 1}}
		@@keyframes slidein3 {from {left:605px; opacity: 0;}to {left:150; opacity: 1}}
		@@keyframes slidein4 {from {left:605px; opacity: 0;}to {left:150; opacity: 1}}

		/* txt_motion */
		.time {width:100%; text-align:center; background:#000}
    .time {text-align:center; padding:20px 0}
    .time table {width:1120px; margin:0 auto}
    .time table td:first-child {font-size:40px}
    .time table td img {width:70%}
    .time .time_txt {font-size:24px; color:#f2f2f2; letter-spacing: -1px; font-weight:bold}
    .time .time_txt span {color:#ead4b5; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
    @@keyframes upDown{
    from{color:#ead4b5}
    50%{color:#ff6600}
    to{color:#ead4b5}
    }
    @@-webkit-keyframes upDown{
    from{color:#ead4b5}
    50%{color:#ff6600}
    to{color:#ead4b5}
    } 

 </style>

 <div class="p_re evtContent NGR" id="evtContainer">
  <div class="evtCtnsBox time NGEB" id="newTopDday">
    <div id="ddaytime">
      <table>
        <tr>
          <td class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }} </span>마감!</td>
          <td class="time_txt">마감까지<br>
           <span>남은 시간은</span></td>
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
  
  <div class="evtCtnsBox wb_cts01">
    <div class style="height:640px;">
      <span class="txt1"><img src="https://static.willbes.net/public/images/promotion/2019/06/1281_txt1.png" title="공무원 수험계에는 수험생들을 고민하게하는 수많은 PASS 상품이 존재하고 있습니다." /></span>
      <span class="txt2"><img src="https://static.willbes.net/public/images/promotion/2019/06/1281_txt2.png" title="하지만 우리에게는 PASS에 있는 모든 교수진의 강의를 수강할 수 있는 시간도, 여유도 없습니다." /></span>
      <span class="txt3"><img src="https://static.willbes.net/public/images/promotion/2019/06/1281_txt3.png" title="그렇기 때문에 보다 더 효율적인, 합격에 최적화된 강의만을 제공하고자 합니다." /></span>
      <span class="txt4"><img src="https://static.willbes.net/public/images/promotion/2019/06/1281_txt4.png" title="원하는 교수의 전 과정을 보다 합리적으로 수강할 수 있는 고득점 합격에 최적화된 학습, 윌비스 T-PASS라면 가능합니다" /></span> 
	  </div>
  </div>

  <!--wb_cts01//-->
  
  <div class="evtCtnsBox wb_cts02">
    <img src="https://static.willbes.net/public/images/promotion/2019/12/1281_01.jpg"  title="윌비스 T-PASS" />
  </div>
  <!--wb_cts02//-->  
 
  
  <div class="evtCtnsBox wb_cts04">
    <img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03.jpg"  title="교수님"/>
    <ul class="tab">
      <li><a href="#tab1"><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t1.png" class="off" alt="기미진"/><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t1_on.png" class="on"  /></a></li>
      <li><a href="#tab2"><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t2.png" class="off" alt="한덕현"/><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t2_on.png" class="on"  /></a></li>
      <li><a href="#tab3"><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t3.png" class="off" alt="성기건"/><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t3_on.png" class="on"  /></a></li>
      <li><a href="#tab4"><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t4.png" class="off" alt="오태진"/><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t4_on.png" class="on"  /></a></li>
      <li><a href="#tab5"><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t5.png" class="off" alt="조민주"/><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t5_on.png" class="on"  /></a></li>
      <li><a href="#tab6"><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t6.png" class="off" alt="한세훈"/><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t6_on.png" class="on"  /></a></li>
      <li><a href="#tab7"><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t7.png" class="off" alt="김덕관"/><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t7_on.png" class="on"  /></a></li>
      <li><a href="#tab8"><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t8.png" class="off" alt="문병일"/><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t8_on.png" class="on"  /></a></li>
      <li><a href="#tab9"><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t9.png" class="off" alt="황남기"/><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t9_on.png" class="on"  /></a></li>
      <li><a href="#tab10"><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t10.png" class="off" alt="이상구"/><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t10_on.png" class="on"  /></a></li>
      <li><a href="#tab11"><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t11.png" class="off" alt="고선미"/><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t11_on.png" class="on"  /></a></li>
      <li><a href="#tab12"><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t12.png" class="off" alt="김영훈"/><img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t12_on.png" class="on"  /></a></li>
    </ul>
    <div id="tab1">
        <img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t_c1.jpg" usemap="#Map1281_1" title="기미진" border="0" />
        <map name="Map1281_1" id="Map1281_1">
          <area shape="rect" coords="175,373,461,445" href="https://pass.willbes.net/promotion/index/cate/3019/code/1467" target="_balnk">
        </map>       
    </div>
    <div id="tab2">
        <img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t_c2.jpg" usemap="#Map1281_2" title="한덕현" border="0"/>
        <map name="Map1281_2" id="Map1281_2">
          <area shape="rect" coords="174,368,462,447" href="https://pass.willbes.net/promotion/index/cate/3019/code/1193" target="_balnk">  
        </map>
    </div>
    <div id="tab3">
        <img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t_c3.jpg" usemap="#Map1281_3" title="성기건" border="0"/>
        <map name="Map1281_3" id="Map1281_3">
          <area shape="rect" coords="174,372,464,446" href="https://pass.willbes.net/promotion/index/cate/3019/code/1078" target="_balnk">
        </map>
    </div>
    <div id="tab4">
        <img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t_c4.jpg" usemap="#Map1281_4" title="오태진" border="0"/>
        <map name="Map1281_4" id="Map1281_4">
          <area shape="rect" coords="171,368,463,450" href="https://pass.willbes.net/promotion/index/cate/3019/code/1392" target="_balnk">
        </map>     
    </div>
    <div id="tab5">
        <img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t_c5.jpg" usemap="#Map1281_5" title="조민주" border="0"/>
        <map name="Map1281_5" id="Map1281_5">
            <area shape="rect" coords="171,369,465,453" href="https://pass.willbes.net/promotion/index/cate/3019/code/1330" target="_balnk">
        </map>   
    </div>
    <div id="tab6">
        <img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t_c6.jpg" usemap="#Map1281_6" title="한세훈" border="0"/>
        <map name="Map1281_6" id="Map1281_6">
          <area shape="rect" coords="173,368,464,447" href="https://pass.willbes.net/promotion/index/cate/3019/code/1337" target="_balnk">
        </map>   
    </div>
    <div id="tab7">
        <img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t_c7.jpg" usemap="#Map1281_7" title="김덕관" border="0"/>
        <map name="Map1281_7" id="Map1281_7">
          <area shape="rect" coords="177,366,458,452" href="https://pass.willbes.net/promotion/index/cate/3019/code/1080" target="_balnk">
        </map>    
    </div>
    <div id="tab8">
        <img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t_c8.jpg" usemap="#Map1281_8" title="문병일" border="0"/>
        <map name="Map1281_8" id="Map1281_8">
          <area shape="rect" coords="176,369,464,448" href="https://pass.willbes.net/promotion/index/cate/3019/code/1334" target="_balnk">
        </map>  
    </div>
    <div id="tab9">
        <img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t_c9.jpg" usemap="#Map1281_9" title="황남기" border="0"/>
          <map name="Map1281_9" id="Map1281_9">
            <area shape="rect" coords="173,371,461,447" href="https://pass.willbes.net/promotion/index/cate/3019/code/1077" target="_balnk">
          </map>
    </div>
    <div id="tab10">
        <img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t_c10.jpg" usemap="#Map1281_10" title="이상구" border="0"/>
        <map name="Map1281_10" id="Map1281_10">
          <area shape="rect" coords="162,372,466,446" href="https://pass.willbes.net/promotion/index/cate/3020/code/1456" target="_balnk">
        </map>   
    </div>
    <div id="tab11">
        <img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t_c11.jpg" usemap="#Map1281_11" title="고선미" border="0"/>
        <map name="Map1281_11" id="Map1281_11">
          <area shape="rect" coords="172,370,474,447" href="https://pass.willbes.net/promotion/index/cate/3022/code/1477" target="_balnk">
        </map>
    </div>
    <div id="tab12">
        <img src="https://static.willbes.net/public/images/promotion/2019/12/1281_03_t_c12.jpg" usemap="#Map1281_12" title="김영훈" border="0"/>
        <map name="Map1281_12" id="MMap1281_12ap">
          <area shape="rect" coords="173,369,467,450" href="https://pass.willbes.net/promotion/index/cate/3022/code/1478" target="_balnk">
        </map>    
    </div>
  </div>
  <!--wb_cts04//-->
  
  <div class="evtCtnsBox wb_cts05"><img src="https://static.willbes.net/public/images/promotion/2019/06/1281_04.jpg"  title="이용안내및 유의사항"/></div>
  <!--wb_cts04//--> 
  
</div>
<!-- End Container -->

<script type="text/javascript">
$(document).ready(function(){
        $('.tab').each(function(){
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
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
</script>
{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop