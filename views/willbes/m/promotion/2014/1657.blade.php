@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/05/1657_top_bg.jpg) no-repeat center top}
    .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/05/1657_01_bg.jpg) no-repeat center top}
    .evt02 {background:#15181c}
    .evt03 {background:#1e252e;}
    .evt04 {background:url(https://static.willbes.net/public/images/promotion/2020/05/1657_04_bg.jpg) no-repeat center top}
    .evt05 {background:url(https://static.willbes.net/public/images/promotion/2020/05/1657_05_bg.jpg) no-repeat center top}
    .evt06 {background:url(https://static.willbes.net/public/images/promotion/2020/05/1657_06_bg.jpg) no-repeat center top}
    .evt07 {background:url(https://static.willbes.net/public/images/promotion/2020/05/1657_07_bg.jpg) no-repeat center top}
    .evt08 {background:url(https://static.willbes.net/public/images/promotion/2020/05/1657_08_bg.jpg) no-repeat center top}
    .evt09 {background:url(https://static.willbes.net/public/images/promotion/2020/05/1657_09_bg.jpg) no-repeat center top}


    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {

    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
        .evt02 .price br {display:none}
        .evt05 .curriculum {column-count: 2; column-gap:40px; column-rule:1px solid #e4e4e4}        
    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>

<div id="Container" class="Container NSK c_both">            
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_top.jpg" alt="1억뷰 엔잡" > 
    </div> 
    
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_01.jpg" alt="1억뷰 엔잡" > 
    </div>

    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_02.jpg" alt="1억뷰 엔잡" > 
    </div>

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_03.jpg" alt="1억뷰 엔잡" > 
    </div>

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_04.jpg" alt="1억뷰 엔잡" > 
    </div>

    <div class="evtCtnsBox evt05">
        <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_05.jpg" alt="1억뷰 엔잡" > 
    </div>

    <div class="evtCtnsBox evt06">
        <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_06.jpg" alt="1억뷰 엔잡" > 
    </div>

    <div class="evtCtnsBox evt07">
        <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_07.jpg" alt="1억뷰 엔잡" > 
    </div>

    <div class="evtCtnsBox evt08">
        <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_08.jpg" alt="1억뷰 엔잡" > 
    </div>

    <div class="evtCtnsBox evt09">
        <img src="https://static.willbes.net/public/images/promotion/2020/05/1657_09.jpg" alt="1억뷰 엔잡" > 
    </div>
</div>
<!-- End Container -->
@stop