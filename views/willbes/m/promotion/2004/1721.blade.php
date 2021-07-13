@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; font-size:14px; line-height:1.5;}
    .evtCtnsBox img {width:100%; max-width:720px;}  
    .evtCtnsBox .wrap { margin:0 auto; position:relative}
    .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

    .evt04 .slide_con {position:relative;}
    .evt04 .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0; padding-bottom:50px;}
    .evt04 .slide_con .bx-wrapper .bx-pager {        
        width: auto;
        bottom: -30px;
        left:0;
        right:0;
        text-align: center;
        z-index:90;
    }
    .evt04 .slide_con .bx-wrapper .bx-pager.bx-default-pager a {
        background: #ccc;
        width: 14px;
        height: 14px;
        margin: 0 4px;
        border-radius:10px;
    }
    .evt04 .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover, 
    .evt04 .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
    .evt04 .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #0072BB;
    }
    .evt04 .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 30px;
    }
    .evt04 .slide_con .bx-wrapper .bx-pager {     
        bottom: 0px;
    }   

    .evt05 {padding:75px 0 100px;}
    .evt05 .cts05 {padding-top:25px;}

    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
    }

</style>

<div id="Container" class="Container NSK c_both"> 

    <div class="evtCtnsBox evt_top">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/1721m_top.jpg" alt="역대급 성적상승">
    </div>

    <div class="evtCtnsBox evt01">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1721m_01.jpg" alt="신청하기">
            <a href="https://m.cafe.daum.net/sharkchoi/_rec" target="_blank" title="우영이집" style="position: absolute;left: 9.2%;top: 73%;width: 16.27%;height: 6.8%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/pass/offLecture/index?cate_code=3052&campus_ccd=605001&search_text=UHJvZE5hbWU6WzIxLjA4LTA5XQ%3D%3D" target="_blank" title="단과강의" style="position: absolute;left: 42.2%;top: 73%;width: 16.27%;height: 6.8%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/pass/offLecture/index?cate_code=3052&campus_ccd=605001&search_text=UHJvZE5hbWU6VC1QYXNz" target="_blank" title="t-pass" style="position: absolute;left: 74.79%;top: 73%;width: 16.27%;height: 6.8%;z-index: 2;"></a>
        </div>
    </div> 
   
    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2021/07/1721m_02.jpg" alt="직렬별 수험과목 안내">
    </div>

    <div class="evtCtnsBox evt03" >
        <img src="https://static.willbes.net/public/images/promotion/2021/07/1721m_03.jpg" alt="믿고 따라만 오세요">
    </div> 

    <div class="evtCtnsBox evt04" >   
        <img src="https://static.willbes.net/public/images/promotion/2021/07/1721m_04.jpg" alt="커리큘럼">
        <div class="slide_con">
            <div id="slidesImg1">
                <div><img src="https://static.willbes.net/public/images/promotion/2021/07/1721m_04_01.png" alt="전기"/></div>
                <div><img src="https://static.willbes.net/public/images/promotion/2021/07/1721m_04_02.png" alt="무선/통신"/></div>
                <div><img src="https://static.willbes.net/public/images/promotion/2021/07/1721m_04_03.png" alt="전자공학"/></div>
            </div>
        </div> 
    </div>

    <div class="evtCtnsBox evt05" >   
        <img src="https://static.willbes.net/public/images/promotion/2021/07/1721m_05.jpg" alt="대세">
        <div class="wrap cts05">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1721m_05_01.png" alt="대세">
            <a href="https://pass.willbes.net/m/pass/offLecture/index?cate_code=3052&search_text=UHJvZE5hbWU67LWc7Jqw7JiB" target="_blank" title="공무원" style="position: absolute;left: 21%;top: 80%;width: 57.27%;height: 11.8%;z-index: 2;"></a>
        </div>  
        <div class="wrap cts05">  
            <img src="https://static.willbes.net/public/images/promotion/2021/07/1721m_05_02.png" alt="대세">
            <a href="https://pass.willbes.net/m/pass/offLecture/index?cate_code=3048&search_text=UHJvZE5hbWU67LWc7Jqw7JiB" target="_blank" title="군무원" style="position: absolute;left: 21%;top: 81.5%;width: 57.27%;height: 11.8%;z-index: 2;"></a>
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