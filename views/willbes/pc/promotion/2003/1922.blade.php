@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    
<!-- Container -->
<style type="text/css">
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

  .wb_cts01 {position:relative; height:1090px; overflow:hidden; background:url("https://static.willbes.net/public/images/promotion/2020/11/1922_top_bg.jpg") center top  no-repeat;height:1025px;}
  /* txt_motion */
  .wb_cts01 span {position:absolute; left:50%; width:1120px; text-align:center; margin-left:-560px; z-index: 1;}
  .wb_cts01 span.txt1 {top:75px; animation:slidein1 0.3s ease-in; -webkit-animation:slidein1 0.5s ease-in;}
  .wb_cts01 span.txt2 {top:300px; animation:slidein2 0.6s ease-in; -webkit-animation:slidein2 0.8s ease-in;}
  .wb_cts01 span.txt3 {top:425px; animation:slidein3 0.9s ease-in; -webkit-animation:slidein3 1.2s ease-in;}
    
  @@keyframes slidein1 {from {opacity: 0;}to {opacity: 1}}
  @@keyframes slidein2 {from {opacity: 0;}to {opacity: 1}}
  @@keyframes slidein3 {from {opacity: 0;}to {opacity: 1}}	
  
  .wb_cts02 {background:#203B7A url("https://static.willbes.net/public/images/promotion/2020/11/1922_01_bg.jpg") center top  no-repeat}
  .wb_cts03 {background:#2c343c;}  
  .wb_cts04 {background:#f5f5f5;}
  .wb_cts05 {background:#78b6a7;}
</style>

 <div class="p_re evtContent NGR" id="evtContainer">
  
  <div class="evtCtnsBox wb_cts01">
      <span class="txt1"><img src="https://static.willbes.net/public/images/promotion/2020/11/1922_txt_01.png" title="" /></span>
      <span class="txt2"><img src="https://static.willbes.net/public/images/promotion/2020/11/1922_txt_02.png" title="" /></span>
      <span class="txt3"><img src="https://static.willbes.net/public/images/promotion/2020/11/1922_txt_03.png" title="" /></span>
  </div>
  
  <div class="evtCtnsBox wb_cts02">
    <img src="https://static.willbes.net/public/images/promotion/2020/11/1922_01.jpg"  title="" />
  </div> 

  <div class="evtCtnsBox wb_cts03">
    <img src="https://static.willbes.net/public/images/promotion/2020/11/1922_02.jpg"  title="" />
  </div> 

  <div class="evtCtnsBox wb_cts04">
    <img src="https://static.willbes.net/public/images/promotion/2020/11/1922_03.jpg"  title="" />
  </div> 

  <div class="evtCtnsBox wb_cts05">
    <img src="https://static.willbes.net/public/images/promotion/2020/11/1922_04.jpg" usemap="#Map1922a"  title="" border="0" />
    <map name="Map1922a" id="Map1762a">
        <area shape="rect" coords="280,747,843,863" href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/50133/?subject_idx=1116&subject_name=%ED%98%95%EB%B2%95&tab=open_lecture" target="_blank" alt="김원욱 형법과 함께하기" />
    </map>
  </div> 

</div>
<!-- End Container -->

@stop