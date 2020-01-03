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

        .wb_cts01 {position:relative; overflow:hidden; background:#020203 url("https://static.willbes.net/public/images/promotion/2020/01/1429_top_bg.gif") center top  no-repeat}
        .wb_cts02 {background:#0e0d17 url("https://static.willbes.net/public/images/promotion/2019/10/1429_01_bg.jpg") center top  no-repeat}
        .wb_cts03 {background:#f2f2f2;}
        .wb_cts04 {background:#eaeaea;padding-bottom:100px; position:relative}
        .wb_cts05 {background:#5f5f5f;}
		/* TAB */
        .tab {width:980px; margin:0 auto; position:absolute; bottom:100px; left:50%; margin-left:-490px; border:5px solid #000; z-index:10}		
        .tab li {display:inline; float:left;}	
        .tab a img.off {display:block}
        .tab a img.on {display:none}
        .tab a.active img.off {display:none}
        .tab a.active img.on {display:block}
        .tab:after {content:""; display:block; clear:both}

		/* txt_motion */
		.wb_cts01 > div {width:1120px; margin:0 auto; position:relative;}
		.wb_cts01 > div span {position:absolute; width:120px; z-index: 1;}
		.wb_cts01 > div span.txt1 {top:220px; left:300px; animation:slidein1 0.2s ease-in; -webkit-animation:slidein1 0.2s ease-in;}
		.wb_cts01 > div span.txt2 {top:300px; left:250px; animation:slidein2 0.4s ease-in; -webkit-animation:slidein2 0.4s ease-in;}
		.wb_cts01 > div span.txt3 {top:380px; left:280px; animation:slidein3 0.6s ease-in; -webkit-animation:slidein3 0.6s ease-in;}
		.wb_cts01 > div span.txt4 {top:440px; left:350px; animation:slidein4 0.8s ease-in; -webkit-animation:slidein4 0.8s ease-in;}
    .wb_cts01 > div span.txt5 {top:525px; left:220px; animation:slidein4 0.8s ease-in; -webkit-animation:slidein4 0.8s ease-in;}
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
    <div class style="height:625px;">
      <span class="txt1"><img src="https://static.willbes.net/public/images/promotion/2019/10/1429_txt1.png"></span>
      <span class="txt2"><img src="https://static.willbes.net/public/images/promotion/2019/10/1429_txt2.png"></span>
      <span class="txt3"><img src="https://static.willbes.net/public/images/promotion/2019/10/1429_txt3.png"></span>
      <span class="txt4"><img src="https://static.willbes.net/public/images/promotion/2019/10/1429_txt4.png"></span> 
      <span class="txt5"><img src="https://static.willbes.net/public/images/promotion/2019/10/1429_txt5.png"></span> 
	  </div>
  </div>

  <!--wb_cts01//-->
  
  <div class="evtCtnsBox wb_cts02">
    <img src="https://static.willbes.net/public/images/promotion/2019/10/1429_01.jpg"  title="윌비스 T-PASS" />
  </div>
  <!--wb_cts02//-->
  
  <div class="evtCtnsBox wb_cts03">
    <img src="https://static.willbes.net/public/images/promotion/2019/10/1429_02.jpg" title="전략적 계획 효율적 학습으로 " />
  </div>
  <!--wb_cts03//-->
  
  <div class="evtCtnsBox wb_cts04">
    <img src="https://static.willbes.net/public/images/promotion/2019/10/1429_03.jpg"  title="교수님"/>
    <ul class="tab">
      <li><a href="#tab1"><img src="https://static.willbes.net/public/images/promotion/2019/10/1429_03_t1.png" class="off" alt="김종상"/><img src="https://static.willbes.net/public/images/promotion/2019/10/1429_03_t1_on.png" class="on"  /></a></li>
      <li><a href="#tab2"><img src="https://static.willbes.net/public/images/promotion/2019/10/1429_03_t2.png" class="off" alt="김종상"/><img src="https://static.willbes.net/public/images/promotion/2019/10/1429_03_t2_on.png" class="on"  /></a></li>
      <li><a href="#tab3"><img src="https://static.willbes.net/public/images/promotion/2019/10/1429_03_t3.png" class="off" alt="김세령"/><img src="https://static.willbes.net/public/images/promotion/2019/10/1429_03_t3_on.png" class="on"  /></a></li>
      <li><a href="#tab4"><img src="https://static.willbes.net/public/images/promotion/2019/10/1429_03_t4.png" class="off" alt="이아림"/><img src="https://static.willbes.net/public/images/promotion/2019/10/1429_03_t4_on.png" class="on"  /></a></li>
      <li><a href="#tab5"><img src="https://static.willbes.net/public/images/promotion/2019/10/1429_03_t5.png" class="off" alt="한경준"/><img src="https://static.willbes.net/public/images/promotion/2019/10/1429_03_t5_on.png" class="on"  /></a></li>
    </ul>
    <div id="tab1">
        <a href="https://pass.willbes.net/promotion/index/cate/3023/code/1081" target="_blank">
        <img src="https://static.willbes.net/public/images/promotion/2019/10/1429_03_t_c1.jpg"  title="김종상">
        </a>
    </div>
    <div id="tab2">
        <a href="https://pass.willbes.net/promotion/index/cate/3023/code/1081" target="_blank">
        <img src="https://static.willbes.net/public/images/promotion/2019/10/1429_03_t_c2.jpg" title="김종상">
        </a>     
    </div>
    <div id="tab3">
        <a href="https://pass.willbes.net/periodPackage/show/cate/3023/pack/648001/prod-code/157430" target="_blank">
        <img src="https://static.willbes.net/public/images/promotion/2019/10/1429_03_t_c3.jpg" title="김세령">
        </a>
    </div>
    <div id="tab4">
        <a href="https://pass.willbes.net/periodPackage/show/cate/3023/pack/648001/prod-code/157432" target="_blank">
        <img src="https://static.willbes.net/public/images/promotion/2019/10/1429_03_t_c4.jpg" title="이아림">
        </a>        
    </div>
    <div id="tab5">
        <a href="https://pass.willbes.net/periodPackage/show/cate/3023/pack/648001/prod-code/157428" target="_blank">
        <img src="https://static.willbes.net/public/images/promotion/2019/10/1429_03_t_c5.jpg" title="한경준">
        </a>
    </div>   
  </div>
  <!--wb_cts04//-->
  
  <div class="evtCtnsBox wb_cts05"><img src="https://static.willbes.net/public/images/promotion/2019/10/1429_04.jpg"  title="이용안내및 유의사항"/></div>
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