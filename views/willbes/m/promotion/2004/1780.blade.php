@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; font-size:14px; line-height:1.5; position:relative;}
    .evtCtnsBox img {width:100%; max-width:720px;}  

    .evt02 a {position: absolute; left: 8.75%; top: 84.07%; width: 83.47%; height: 8.06%; z-index: 2;}

    .evt04 a {position: absolute; left: 22.5%; top: 40.09%; width: 54.86%; height: 8.28%; z-index: 2;}
    .evt04 a.a02 { top: 84.97%;}

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
        <img src="https://static.willbes.net/public/images/promotion/2021/02/1780m_02.jpg" alt="라이브모드">
        <a href="https://pass.willbes.net/m/promotion/index/cate/3043/code/1902" target="_blank" title="소방직 라이브 모드"></a>
    </div>

    <div class="evtCtnsBox evt03" >
        <img src="https://static.willbes.net/public/images/promotion/2021/02/1780m_03.jpg" alt="소방직">
    </div>

    <div class="evtCtnsBox evt04" id="evt04">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/1780m_04.jpg" alt="소방직">
        <a href="https://pass.willbes.net/m/pass/offPackage/index?cate_code=3050&campus_ccd=605001" title="진도별 문풀 패스" class="a01"></a>
        <a href="https://pass.willbes.net/m/pass/offPackage/index?cate_code=3050&campus_ccd=605001&search_text=UHJvZE5hbWU6bGl2ZQ%3D%3D" title="라이브 진도별 문풀 패스" class="a02"></a>
    </div>
</div>
<!-- End Container -->

@stop