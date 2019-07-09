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

.wb_cts01{background:#1c1c1c url("https://static.willbes.net/public/images/promotion/2019/07/1313_top_bg.jpg") center top  no-repeat}
        

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
    <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_top.jpg"  title="윌비스 T-PASS" />
  </div>  
  <!--wb_cts01//-->  
  <div class="evtCtnsBox wb_cts02">
    <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_mid.jpg"  title="윌비스 T-PASS" />
    <ul class="tab">
        <li><a href="#tab1">국어</a></li>
        <li><a href="#tab2">행정학</a></li>
        <li><a href="#tab3">행정법</a></li>
        <li><a href="#tab4">한국사능력검정시험</a></li>
    </ul>
    <div id="tab1">       
        <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_tab_01.jpg" title="기미진" />      
    </div>
    <div id="tab2">       
        <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_tab_02.jpg" title="기미진" />      
    </div>
    <div id="tab3">       
        <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_tab_03.jpg" title="기미진" />      
    </div>
    <div id="tab4">       
        <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_tab_04.jpg" title="기미진" />      
    </div>   
    <div>
        <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_mid_curri.jpg" title="기미진" />
    </div>
    </div> 
  </div>  
  </div>
  <!--wb_cts02//-->  
  <div class="evtCtnsBox wb_cts03">
     <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_pass.jpg" title="기미진" />
  </div>
  <!--wb_cts03//-->  
  <div class="evtCtnsBox wb_cts04">
     <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_bot.jpg" title="기미진" />  
  </div>
  <!--wb_cts04//-->
  
  <div class="evtCtnsBox wb_cts05">
      
  </div>
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