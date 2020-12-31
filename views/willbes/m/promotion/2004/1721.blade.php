@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; font-size:14px; line-height:1.5; position:relative;}
    .evtCtnsBox img {width:100%; max-width:720px;}  

    .evt01 a {position: absolute; top: 84.78%; width: 37.22%; height: 7.85%; z-index: 2;}
    .evt01 a.a01 {left: 12.22%;}
    .evt01 a.a02 {left: 50.97%;}   

    .evt03 .slide_con {margin-bottom:30px}
    .evt03 .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0}
    .evt03 .slide_con .bx-wrapper .bx-pager {        
        width: auto;
        bottom: 0;
        left:0;
        right:0;
        text-align: center;
        z-index:90;
    }
    .evt03 .slide_con .bx-wrapper .bx-pager.bx-default-pager a {
        background: #ccc;
        width: 14px;
        height: 14px;
        margin: 0 4px;
        border-radius:10px;
    }
    .evt03 .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover, 
    .evt03 .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
    .evt03 .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #fd898c;
    }
    .evt03 .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 30px;
    }
    .evt03 .slide_con .bx-wrapper .bx-pager {     
        bottom: 0px;
    }   
    .evt03 .p_re a {position: absolute; top: 83.5%; width: 40.14%; height: 8.25%; z-index: 2;}
    .evt03 .p_re a.b01 {left: 5.42%;}
    .evt03 .p_re a.b02 {left: 54.86%;}


    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
    }

</style>

<div id="Container" class="Container NSK c_both">  
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1721m_01.jpg" alt="전기전자통신 최우영">
        <a href="#evt03" title="티패스 신청" class="a01"></a>
        <a href="http://cafe.daum.net/sharkchoi" title="카페" target="_blank" class="a02"></a>
    </div> 
   
    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1721m_02.jpg" alt="과목안내">
    </div>

    <div class="evtCtnsBox evt03" >
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1721m_03_top.jpg" alt="전기전자통신 최우영 신규강좌">
        <div class="slide_con">
            <div id="slidesImg1">
                <div><img src="https://static.willbes.net/public/images/promotion/2020/12/1721m_03_01.jpg" alt="전기직9급"/></div>
                <div><img src="https://static.willbes.net/public/images/promotion/2020/12/1721m_03_02.jpg" alt="전기직7급"/></div>
                <div><img src="https://static.willbes.net/public/images/promotion/2020/12/1721m_03_03.jpg" alt="통신직"/></div>
                <div><img src="https://static.willbes.net/public/images/promotion/2020/12/1721m_03_04.jpg" alt="전자직"/></div>
            </div>
        </div> 
        <div class="p_re">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1721m_03.jpg" alt="전기전자통신 최우영 신규강좌" id="evt03">        
            <a href="https://pass.willbes.net/m/pass/offLecture/index?cate_code=3052&search_text=UHJvZE5hbWU67LWc7Jqw7JiB" title="공무원" target="_blank" class="b01"></a>
            <a href="https://pass.willbes.net/m/pass/offLecture/index?cate_code=3048&search_text=UHJvZE5hbWU67LWc7Jqw7JiB" title="군무원" target="_blank" class="b02"></a>
        </div>
    </div>
</div>
<!-- End Container -->

<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var slidesImg1 = $("#slidesImg1").bxSlider({
            auto: true, 
            speed: 100, 
            pause: 3000, 
            mode:'fade', 
            autoControls: false, 
            adaptiveHeight: true,
            controls:false,
            pager:true,
        });
    });
</script>

@stop