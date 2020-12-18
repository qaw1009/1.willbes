@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; font-size:14px; line-height:1.5; position:relative;}
    .evtCtnsBox img {width:100%; max-width:720px;}  

    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
    }

</style>

<div id="Container" class="Container NSK c_both">  
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1781m_01.jpg" alt="군무원 행정직" >
    </div> 
   
    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1781m_02.jpg" alt="라이브모드" usemap="#Map1781A" border="0">
        <map name="Map1781A">
          <area shape="rect" coords="68,929,668,1044" href="#evt04" alt="군무원 라이브 모드">
        </map>
    </div>

    <div class="evtCtnsBox evt03" >
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1781m_03.jpg" alt="군무원 행정직">
    </div>

    <div class="evtCtnsBox evt04" id="evt04">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1781m_04.jpg" alt="군무원 행정직" usemap="#Map1981B" border="0">
        <map name="Map1981B">
          <area shape="rect" coords="143,402,581,476" href="https://pass.willbes.net/m/pass/offPackage/index?cate_code=3048&campus_ccd=605001" target="_blank" alt="군무원 행정직 수강신청">
        </map>
    </div>
</div>
<!-- End Container -->

@stop