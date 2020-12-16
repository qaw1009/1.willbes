@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; font-size:14px; line-height:1.5; position:relative;}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .evt02 {padding-bottom:50px; background:#ebebeb}
    .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0; }
    .slide_con .bx-wrapper .bx-pager {        
        width: auto;
        bottom: 40px;
        left:0;
        right:0;
        text-align: center;
        z-index:90;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a {
        background: #ccc;
        width: 14px;
        height: 14px;
        margin: 0 4px;
        border-radius:10px;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover, 
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #e82255;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 30px;
    }

 
    .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding:10px; z-index:999}
    .btnbuy a {display:block; width:100%; max-width:700px; margin:0 auto; font-size:1.5rem; background:#000; color:#fff; 
    padding:15px 0; text-align:center; border-radius:40px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}
    .btnbuy a:hover {background:#e82255;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    

    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
    }

</style>

<div id="Container" class="Container NSK c_both">  
    <div class="evtCtnsBox evtTop">
        <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1698" target="_blank" >
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1951m_01.jpg" alt="룰렛 이벤트" >
        </a> 
    </div>  
   
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1951m_02.jpg" alt="참여 방법" usemap="#Map1951" border="0" >
        <map name="Map1951">
            <area shape="rect" coords="284,614,435,664" href="https://www.willbes.net/member/join/?ismobile=1&sitecode=2014" target="_blank">
        </map>
    </div>

    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1951m_03.jpg" alt="강사진" >
        <div class="slide_con">
            <ul id="slidesImg1">
                <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1951m_03_01.jpg" alt="강사진"></li>                            
                <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1951m_03_02.jpg" alt="강사진"></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2020/12/1951m_03_03.jpg" alt="강사진"></li>
            </ul>
        </div>
    </div>
</div>

<div class="btnbuyBox">
    <div class="btnbuy NSK-Black">     
        <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1951" target="_blank" >
        이벤트 참여하기 >
        </a>
    </div>
</div>
<!-- End Container -->

<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var slidesImg1 = $("#slidesImg1").bxSlider({
            auto: true, 
            speed: 500, 
            pause: 4000, 
            mode:'fade', 
            autoControls: false, 
            controls:false,
            pager:true,
        });
    });
</script>
@stop