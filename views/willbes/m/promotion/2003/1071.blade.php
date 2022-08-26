@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {box-shadow:0 5px 20px rgba(0,0,0,.5); border-radius:6px}*/


    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {

    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {

    }

    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {

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
        <img src="https://static.willbes.net/public/images/promotion/2022/08/1071m_04.jpg" alt="">
        <a href="https://pass.willbes.net/m/periodPackage/show/cate/3028/pack/648001/prod-code/200840" target="_blank" title="통신기술직" style="position: absolute; left: 52.78%; top: 40.52%; width: 27.5%; height: 3.89%; z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/periodPackage/show/cate/3028/pack/648001/prod-code/200841
" target="_blank" title="전송기술직" style="position: absolute; left: 52.5%; top: 62.35%; width: 27.5%; height: 3.89%; z-index: 2;"></a>
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/200846
" target="_blank" title="전기직이론" style="position: absolute; left: 52.64%; top: 84.24%; width: 27.5%; height: 3.89%; z-index: 2;"></a>
    </div>
</div>
<!-- End Container -->


@stop