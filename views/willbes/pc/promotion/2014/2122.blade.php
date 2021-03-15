@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
    .evtContent {          
        width:100% !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }	
    .evtContent span {vertical-align:auto}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
    /*****************************************************************/ 
    .evt_top {background:url('https://static.willbes.net/public/images/promotion/2021/03/2122_top_bg.jpg') no-repeat center top; margin-top:20px;}   

    .evt01 {background:#e7ddd3; }
    .evt01 div {width:1120px; margin:0 auto; position:relative}
    .evt01 div a {position: absolute; top: 37.45%; width: 23.66%; height: 37.41%; z-index: 2;}
    .evt01 div a.link01 {left: 0.71%;}
    .evt01 div a.link02 {left: 25.8%;;}
    .evt01 div a.link03 {left: 50.54%;}
    .evt01 div a.link04 {left: 75.36%;}

    .evt02 {background:#d3e5e7;}
    .evt02 div {width:1120px; margin:0 auto; position:relative}
    .evt02 div a {position: absolute; top: 37.45%; width: 23.66%; height: 37.41%; z-index: 2;}
    .evt02 div a.link06 {left: 0.71%;}
    .evt02 div a.link07 {left: 25.8%;;}
    .evt02 div a.link08 {left: 50.54%;}
    .evt02 div a.link09 {left: 75.36%;}

    .evt03 {background:#e2dae3;}
    .evt03 div {width:1120px; margin:0 auto; position:relative}
    .evt03 div a {position: absolute; top: 37.45%; width: 23.66%; height: 37.41%; z-index: 2;}
    .evt03 div a.link11 {left: 0.71%;}
    .evt03 div a.link12 {left: 25.8%;;}
    .evt03 div a.link13 {left: 50.54%;}
    .evt03 div a.link14 {left: 75.36%;}

    .evt04 {background:#e2dae3; padding-bottom:150px}
    .evt04 a {font-size:30px; line-height:1.5; border:3px solid #48537d; border-radius:90px; padding:20px 100px; display:inline-block}
    .evt04 a:hover {color:#48537d; background:#fff}
    </style>

    <div class="evtContent NSK">        
        <div class="evtCtnsBox evt_top"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2122_top.jpg" alt="오픈 1주년 이벤트" >            
        </div>

        <div class="evtCtnsBox evt01"> 
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2122_01.jpg" alt="E커머스 강좌" >
                <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1564" title="김정한" class="link01" target="_blank"></a>
                <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1567" title="정문진" class="link02" target="_blank"></a>
                <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1566" title="김경은" class="link03" target="_blank"></a>
                <a href="https://njob.willbes.net/promotion/index/cate/3114/code/2024" title="이상욱" class="link04" target="_blank"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt02"> 
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2122_02.jpg" alt="인플루언서 강좌" >
                <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1712" title="안혜빈" class="link06" target="_blank"></a>
                <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1713" title="이기용" class="link07" target="_blank"></a>
                <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1711" title="이승기" class="link08" target="_blank"></a>
                <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1710" title="이시한" class="link09" target="_blank"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt03"> 
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2122_03.jpg" alt="커리어&취미 강좌" >
                <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1755" title="양원근" class="link11" target="_blank"></a>
                <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1849" title="김윤태" class="link12" target="_blank"></a>
                <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1968" title="임서현" class="link13" target="_blank"></a>
                <a href="https://njob.willbes.net/promotion/index/cate/3114/code/2057" title="이난우" class="link14" target="_blank"></a>
            </div>        
        </div>

        <div class="evtCtnsBox evt04 NSK-Black"> 
            <a href="https://njob.willbes.net/home/index/cate/3114">
                모두 30% 파격 할인!<br>
                1억뷰N잡만의 특별한 강의 더 확인하기 >
            </a>
        </div>

    </div>
    <!-- End Container -->
@stop