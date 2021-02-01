@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
        .evtCtnsBox img {width:100%; max-width:720px;}

        /************************************************************/  

        .evt01 a {position: absolute; width:20%; height:4.22%; z-index: 2;}
        .evt01 a.a01 {left: 0%; top: 78.44%;}
        .evt01 a.a02 {left: 25.97%; top: 77.67%;}
        .evt01 a.a03 {left: 55%; top: 78%;}
        .evt01 a.a04 {left: 80.28%; top: 78.11%;}
        
        .evt03 {background:#fff; padding-bottom:100px}  
        .evtCtnsBox .txt01 {font-size:16px; margin-bottom:20px; padding:20px;}
        .evtCtnsBox .txt02 {background:#9b72e2; color:#fff; font-size:16px; margin:20px 20px 50px; padding:20px; position:relative}
        .evtCtnsBox .txt02 span {display:block; font-size:20px; color:#fafdb2}
        .evtCtnsBox .txt02 strong {position:absolute; bottom:0; right:10px; width:50px; z-index:1}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">        

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2056m_top.jpg" alt="사전예약 스타트" >
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2056m_01.jpg" alt="스페셜 리스트 4인" >
            <a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/2035" target="_blank" alt="권혁중" class="a01">
            <a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/2024" target="_blank" alt="이상욱" class="a02">
            <a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/2006" target="_blank" alt="안은재" class="a03">
            <a href="javascript:alert('COMING SOON! 2월 3일 공개됩니다.')" alt="최효진" class="a04">
        </div>    

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2056m_02.jpg" alt="이커머스 핵심키워드" >            
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2056m_03.jpg" alt="소문내기 이벤트" >     
            <div class="txt01">* 이벤트 참여는 PC 페이지에서만 가능합니다.</div>      
            <div class="txt02">
                <a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/2056" target="_blank">        
                    <span class="NSK-Black">강의 소문내고 수강권 받자!</span>             
                    <strong><img src="https://static.willbes.net/public/images/promotion/common/icon_pointer.png" alt="" ><strong>
                </a>
            </div>     
        </div>
      
    </div>
    <!-- End Container -->


    <script src="/public/vendor/jquery/bxslider/jquery.bxslider.min.js"></script> 
    <script>    

    </script>
@stop