@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; font-size:14px; line-height:1.5; position:relative;}
    .evtCtnsBox img {width:100%; max-width:720px;}  
    .evt03 .slide_con {margin-bottom:30px}
    .evt03 .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0}
    .evt03 .slide_con .bx-wrapper .bx-pager {        
        width: auto;
        bottom: 0;
        left:0;
        right:0;
        text-align: center;
        z-index:90;
    }
    .evt03 .slide_con .bx-wrapper .bx-pager.bx-default-pager a {
        background: #ccc;
        width: 14px;
        height: 14px;
        margin: 0 4px;
        border-radius:10px;
    }
    .evt03 .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover, 
    .evt03 .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
    .evt03 .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #fd898c;
    }
    .evt03 .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 30px;
    }
    .evt03 .slide_con .bx-wrapper .bx-pager {     
        bottom: 0px;
    }   


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