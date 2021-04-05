@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; font-size:14px; line-height:1.5; position:relative;}
    .evtCtnsBox img {width:100%; max-width:720px;}   
    
    .evt02 a {position: absolute; left: 10.56%; top: 88.79%; width: 77.36%; height: 6.36%; z-index: 2;}
    .evt03 a {position: absolute; left: 12.22%; top: 86.35%; width: 77.08%; height: 6.44%; z-index: 2;}

    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
    }
</style>

<div id="Container" class="Container NSK c_both">  
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2021/04/1297m_01.jpg" alt="새벽 실전 모의고사" >
    </div>  
   
    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2021/04/1297m_02.jpg" alt="한덕현 모의고사">
        <a href="https://pass.willbes.net/m/pass/professor/show/prof-idx/50500?cate_code=3043&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4" title="한덕현 모의고사" target="_blank"></a>        
    </div>

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1297m_03.jpg" alt="기미진 모의고사" >
        <a href="javascript:alert('준비중입니다.');" title="기미진 모의고사"></a>
    </div>

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1297m_04.jpg" alt="새벽 실전 모의고사" >
    </div>
</div>
<!-- End Container -->
@stop