@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox a:hover {box-shadow:0 5px 20px rgba(0,0,0,.5); border-radius:6px}

    .evt03 a {position: absolute; left: 70.69%; width: 19.03%; height: 2.32%; z-index: 2;}
    .evt03 a.b01 {top: 21.96%;}
    .evt03 a.b02 {top: 25.96%;}
    .evt03 a.b03 {top: 29.88%;}

    .evt03 a.b11 {left: 71.94%; top: 42.56%;}
    .evt03 a.b12 {left: 71.94%; top: 46.56%;}

    .evt03 a.b09 {top: 58.84%;}
    .evt03 a.b10 {top: 63.24%;}
    .evt03 a.b04 {top: 69.48%;}
    .evt03 a.b05 {top: 73.84%;}
    .evt03 a.b06 {top: 80.48%;}
    .evt03 a.b07 {top: 84.76%;}

    .evt03 a.b08 {top: 93.36%;}

    /* 폰 가로, 태블릿 세로*/
    @@media all and (min-width:320px) and (max-width:408px) {       

    }

    @@media all and (min-width:409px) and (max-width:588px) {       

    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {

    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>

<div id="Container" class="Container NSK c_both">   
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/1071m_top.jpg" alt="통신/전기 최우영" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/1071m_01.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/1071m_02.jpg" alt="" >
        <a href="https://youtube.com/embed/sC9TJfUNkyc" target="_blank" title="전기이론 기초강의" style="position: absolute; left: 6.53%; top: 25.28%; width: 42.78%; height: 15.32%; z-index: 2;"></a>
        <a href="https://youtube.com/embed/_crgLD0rmN8" target="_blank" title="전기회로 기본용어" style="position: absolute; left: 50.69%; top: 25.28%; width: 42.78%; height: 15.32%; z-index: 2;"></a>
        <a href="https://youtube.com/embed/1zATq2Kydwg" target="_blank" title="변조이론" style="position: absolute; left: 6.53%; top: 47.74%; width: 42.78%; height: 15.32%; z-index: 2;"></a>
        <a href="https://youtube.com/embed/37yjw2mC8wY" target="_blank" title="RLC회로의 특성" style="position: absolute; left: 50.69%; top: 47.74%; width: 42.78%; height: 15.32%; z-index: 2;"></a>
        <a href="https://youtube.com/embed/eiAKjkFjwtE" target="_blank" title="연산증폭기" style="position: absolute; left: 6.53%; top: 70.13%; width: 42.78%; height: 15.32%; z-index: 2;"></a>
        <a href="https://youtube.com/embed/wSaPEaVIbbo" target="_blank" title="기출 문풀" style="position: absolute; left: 50.69%; top: 70.13%; width: 42.78%; height: 15.32%; z-index: 2;"></a>
    </div> 
    
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/1071m_03.jpg" alt="">
    </div>   

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/1071m_04.jpg" alt="">
        <a href="https://pass.willbes.net/m/periodPackage/show/cate/3028/pack/648001/prod-code/184023" target="_blank" title="통신기술직" style="position: absolute; left: 53.19%; top: 41.4%; width: 26.67%; height: 3.33%; z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/periodPackage/show/cate/3028/pack/648001/prod-code/184024" target="_blank" title="전송기술직" style="position: absolute; left: 53.19%; top: 63.59%; width: 26.67%; height: 3.33%; z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/184021" target="_blank" title="전기직" style="position: absolute; left: 53.19%; top: 85.78%; width: 26.67%; height: 3.33%; z-index: 2;"></a>
    </div> 
</div>
<!-- End Container -->


@stop