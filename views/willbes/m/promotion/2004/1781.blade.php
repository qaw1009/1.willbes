@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; font-size:14px; line-height:1.5; position:relative;}
    .evtCtnsBox img {width:100%; max-width:720px;}  

    .evt02 a {position: absolute; left: 9.44%; top: 78.72%; width: 81.81%; height: 8.24%; z-index: 2;}
    .evt04 a {position: absolute; left: 21.11%; top: 73.02%; width: 58.06%; height: 11.69%; z-index: 2;}

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
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1781m_02.jpg" alt="라이브모드">
        <a href="#evt04" title="군무원 라이브 모드"></a>
    </div>

    <div class="evtCtnsBox evt03" >
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1781m_03.jpg" alt="군무원 행정직">
    </div>

    <div class="evtCtnsBox evt04" id="evt04">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1781m_04.jpg" alt="군무원 행정직">
        <a href="https://pass.willbes.net/m/pass/offPackage/index?cate_code=3048&campus_ccd=605001" title="군무원 행정직 수강신청" target="_blank"></a>
    </div>
</div>
<!-- End Container -->

@stop