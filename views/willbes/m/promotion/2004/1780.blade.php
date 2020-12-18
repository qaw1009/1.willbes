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
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1780m_01.jpg" alt="소방직" >
    </div> 
   
    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1780m_02.jpg" alt="라이브모드" usemap="#Map1780A" border="0">
        <map name="Map1780A">
            <area shape="rect" coords="65,893,665,1008" href="#evt04" alt="소방직 라이브 모드">
        </map>
    </div>

    <div class="evtCtnsBox evt03" >
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1780m_03.jpg" alt="소방직">
    </div>

    <div class="evtCtnsBox evt04" id="evt04">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1780m_04.jpg" alt="소방직" usemap="#Map1780B" border="0">
        <map name="Map1780B">
            <area shape="rect" coords="163,342,563,417" href="https://pass.willbes.net/m/pass/offPackage/index?cate_code=3050&campus_ccd=605001" target="_blank" alt="진도별 문풀 패스">
            <area shape="rect" coords="158,726,560,802" href="https://pass.willbes.net/m/pass/offPackage/index?cate_code=3050&campus_ccd=605001&search_text=UHJvZE5hbWU665287J2067iM" target="_blank" alt="라이브 진도별 문풀 패스">
            <area shape="rect" coords="151,1118,567,1197" href="https://pass.willbes.net/m/pass/offPackage/index?cate_code=3050&campus_ccd=605001&search_text=UHJvZE5hbWU666y47ZKA" target="_blank" alt="3개월 마무리 패스">
        </map>
    </div>
</div>
<!-- End Container -->

@stop