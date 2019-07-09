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

/*타이머*/
.time {width:100%; text-align:center; background:#e1e1e1}
.time {text-align:center; padding:20px 0}
.time table {width:1120px; margin:0 auto}
.time table td:first-child {font-size:40px}
.time table td img {width:80%}
.time .time_txt {font-size:28px; color:#000; letter-spacing: -1px}
.time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}

.wb_cts01{background:#1c1c1c url("https://static.willbes.net/public/images/promotion/2019/07/1313_top_bg.jpg") center top  no-repeat}

.wb_cts02{background:#ccc}
.wb_cts03{background:#f4f4f4}

.tabContaier{width:1120px;margin:0 auto;}
.tabContaier li{display:inline-block;width:280px;height:84px;line-height:84px;background:#fff;color:#000;float:left;font-size:18px;font-weight:bold;}
.tabContaier:after {content:""; display:block; clear:both}
.tabContaier li a{display:block;}
.tabContaier li a:hover,
.tabContaier li a.active {background:#b6061b;color:#fff;}
 </style>

 <div class="p_re evtContent NGR" id="evtContainer">
    <div class="evtCtnsBox time NGEB" id="newTopDday">
        <div>
            <table>
                <tr>
                <td class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}</span> 마감!</td>
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
  
  <div class="evtCtnsBox wb_cts01">
    <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_top.jpg"  title="군무원 0원 패스" />
  </div>  
  <!--wb_cts01//-->  
  <div class="evtCtnsBox wb_cts02">
        <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_mid.jpg"  title="윌비스 교수진과 함께" />
        <div class="tabContaier">    
            <ul>    
                <li><a href="#tab1" class="active">국어</a></li>
                <li><a href="#tab2">행정학</a></li>
                <li><a href="#tab3">행정법</a></li>
                <li><a href="#tab4">한국사능력검정시험</a></li>
            </ul>
        </div> 
        <div id="tab1" class="tabContents">       
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_tab_01.jpg" title="국어탭" />      
        </div>
        <div id="tab2" class="tabContents">       
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_tab_02.jpg"  title="행정학탭" />      
        </div>
        <div id="tab3" class="tabContents">       
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_tab_03.jpg"  title="행정법탭" />      
        </div>
        <div id="tab4" class="tabContents">       
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_tab_04.jpg" title="한극사능력검정시험탭" />      
        </div>   
    <div>
        <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_mid_curri.jpg" title="커리큘럼" />
    </div>
    </div> 
  </div>  
  </div>
  <!--wb_cts02//-->  
  <div class="evtCtnsBox wb_cts03">
     <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_pass.jpg" title="수강신청" />
  </div>
  <!--wb_cts03//-->  
  <div class="evtCtnsBox wb_cts04">
     <img src="https://static.willbes.net/public/images/promotion/2019/07/1313_bot.jpg" title="이용안내" />  
  </div>
  <!--wb_cts04//-->
  
  <div class="evtCtnsBox wb_cts05">
      
  </div>
  <!--wb_cts04//--> 
  
</div>
<!-- End Container -->

<script type="text/javascript">
$(document).ready(function(){
			$(".tabContents").hide(); 
			$(".tabContents:first").show();

			$(".tabContaier ul li a").click(function(){ 

			var activeTab = $(this).attr("href"); 
			$(".tabContaier ul li a").removeClass("active"); 
			$(this).addClass("active"); 
			$(".tabContents").hide(); 
			$(activeTab).fadeIn(); 

			return false; 
			});
		});						
 /*디데이카운트다운*/
 $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });
</script>
{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop