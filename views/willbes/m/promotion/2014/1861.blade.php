@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; position:relative}
        .evtCtnsBox img {width:100%; max-width:720px;}
        .evtTop {overflow:hidden}
        .evtTop span {position:absolute; left:50%; z-index:1;}
        .evtTop span.img1 {top:25%; margin-left:-60%; width:146px; animation:iptimg1 10s infinite;-webkit-animation:iptimg1 10s infinite;}
        .evtTop span.img2 {top:30%; margin-left:120%%; width:379px; animation:iptimg2 8s infinite;-webkit-animation:iptimg2 8s infinite;}
        @@keyframes iptimg1{
            0%{margin-left:-65%; opacity: 0;}
            50%{margin-left:-55%; opacity: 1;}
            100%{margin-left:-50%; opacity: 0;}
        }
        @@-webkit-keyframes iptimg1{
            0%{margin-left:-65%; opacity: 0;}
            50%{margin-left:-55%; opacity: 1;}
            100%{margin-left:-50%; opacity: 0;}
        }
        
        @@keyframes iptimg2{
            0%{margin-left:30%; opacity: 0;}
            50%{margin-left:20%; opacity: 1;}
            100%{margin-left:15%; opacity: 0;}
        }
        @@-webkit-keyframes iptimg2{
            0%{margin-left:30%; opacity: 0;}
            50%{margin-left:20%; opacity: 1;}
            100%{margin-left:15%; opacity: 0;}
        }
        .evtCtnsBox .txt01 {font-size:16px; margin-bottom:20px; padding:20px;}
        .evtCtnsBox .txt02 {background:#9b72e2; color:#fff; font-size:16px; margin:20px 20px 50px; padding:20px; position:relative}
        .evtCtnsBox .txt02 span {display:block; font-size:20px; color:#fafdb2}
        .evtCtnsBox .txt02 strong {position:absolute; bottom:30px; right:10px; width:50px; z-index:1}

        /************************************************************/
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1861m_top.jpg" alt="" > 
            <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2020/09/1861_top_img01.png" title="" /></span>      
            <span class="img2"><img src="https://static.willbes.net/public/images/promotion/2020/09/1861_top_img02.png" title="" /></span>
        </div> 
        
        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1861m_01.jpg" alt="" > 
            <div class="txt01">* 이벤트 참여(댓글 작성)는 PC 페이지에서만 가능합니다.</div>      
            <div class="txt02">
                <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1861" target="_blank">
                    댓글만 남기면
                    <span class="NSK-Black">5만원 할인쿠폰 전원 제공!</span>
                    <br>
                    또, 보름달에 소원 빌고
                    <span class="NSK-Black">1억뷰N잡 무료수강권도 받자!</span>
                    <strong><img src="https://static.willbes.net/public/images/promotion/common/icon_pointer.png" alt="" ><strong>
                </a>
            </div>     
        </div>

        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1861m_02.jpg" alt="" usemap="#Map1861A" border="0" >
            <map name="Map1861A">
                <area shape="rect" coords="35,1330,148,1367" href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1564" target="_blank" alt="김정환">
                <area shape="rect" coords="211,1330,328,1368" href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1566" target="_blank" alt="김경은">
                <area shape="rect" coords="394,1328,506,1370" href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1565" target="_blank" alt="황채영">
                <area shape="rect" coords="576,1329,687,1368" href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1567" target="_blank" alt="정문진">
                <area shape="rect" coords="37,1908,142,1946" href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1710" target="_blank" alt="이시한">
                <area shape="rect" coords="215,1909,327,1946" href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1711" target="_blank" alt="이승기">
                <area shape="rect" coords="395,1906,509,1947" href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1712" target="_blank" alt="안혜빈">
                <area shape="rect" coords="574,1909,684,1950" href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1713" target="_blank" alt="이기용">
                <area shape="rect" coords="34,2498,147,2539" href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1755" target="_blank" alt="양원근">
                <area shape="rect" coords="215,2499,328,2536" href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1797" target="_blank" alt="김윤태">
            </map> 
        </div>
    </div>
    <!-- End Container -->
@stop