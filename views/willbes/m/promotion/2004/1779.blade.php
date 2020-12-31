@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; font-size:14px; line-height:1.5; position:relative;}
    .evtCtnsBox img {width:100%; max-width:720px;}  

    .evt02 a {position: absolute; left: 8.19%; top: 83.32%; width: 82.5%; height: 9.82%; z-index: 2;}
    .evt05 a {position: absolute; left: 7.64%; top: 84.49%; width: 84.03%; height: 7.59%; z-index: 2;}
    .evt06 a {position: absolute; left: 8.19%; top: 47.78%; width: 83.47%; height: 12.08%; z-index: 2;}

    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
    }

</style> 

<div id="Container" class="Container NSK c_both">  
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1779m_01.jpg" alt="" >
    </div> 
   
    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1779m_02.jpg" alt="">
        <a href="#evt06" title="라이브모드"></a>
    </div>

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1779m_03.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1779m_04.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox evt05">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1779m_05.jpg" alt="" >
        <a href="https://pass.willbes.net/m/pass/offPackage/index?cate_code=3043&campus_ccd=605001" title="합격의파란불 수강신청" target="_blank"></a>
    </div> 

    <div class="evtCtnsBox evt06" id="evt06">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1779m_06.jpg" alt="">
        <a href="https://pass.willbes.net/m/pass/offPackage/index?cate_code=3043&campus_ccd=605001&search_text=UHJvZE5hbWU665287J2067iM" title="라이브 수강신청" target="_blank"></a>
    </div> 
</div>
<!-- End Container -->

@stop