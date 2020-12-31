@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; font-size:14px; line-height:1.5; position:relative;}
    .evtCtnsBox img {width:100%; max-width:720px;}  

    .evt02 a {position: absolute; left: 8.75%; top: 84.07%; width: 83.47%; height: 8.06%; z-index: 2;}
    .evt04 a {position: absolute; left: 21.39%; width: 56.11%; height: 5.81%; z-index: 2;}
    .evt04 a.a01 { top: 26.05%;}
    .evt04 a.a02 { top: 55.46%;}
    .evt04 a.a03 { top: 85.26%;}

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
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1780m_02.jpg" alt="라이브모드">
        <a href="#evt04" title="소방직 라이브 모드"></a>
    </div>

    <div class="evtCtnsBox evt03" >
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1780m_03.jpg" alt="소방직">
    </div>

    <div class="evtCtnsBox evt04" id="evt04">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1780m_04.jpg" alt="소방직">
        <a href="https://pass.willbes.net/m/pass/offPackage/index?cate_code=3050&campus_ccd=605001" title="진도별 문풀 패스" class="a01"></a>
        <a href="https://pass.willbes.net/m/pass/offPackage/index?cate_code=3050&campus_ccd=605001&search_text=UHJvZE5hbWU665287J2067iM" title="라이브 진도별 문풀 패스" class="a02"></a>
        <a href="https://pass.willbes.net/m/pass/offPackage/index?cate_code=3050&campus_ccd=605001&search_text=UHJvZE5hbWU666y47ZKA" title="3개월 마무리 패스" class="a03"></a>
    </div>
</div>
<!-- End Container -->

@stop