@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both;}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox.wrap {position:relative}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .evtTop span {position: absolute; top:32%; width:100%; display:block; z-index:2; text-align:center}
    .evtTop span img {width:70%; max-width:412px}


    .lecbuy a {display:block; background:#2c312e; color:#fff; font-size:3vh; padding:3vh 0; width:80%; margin:3vh auto; text-align:center; border-radius:10px}

    .evt03 {padding-bottom:2vh; background:#2b2b2b}
    .evt03 .lecbuy a {background:#fff200; color:#2b2b2b;}

    .evtMap ul {padding:1vh; text-align:left; font-size:2vh; line-height:1.7;}
    .evtMap li {list-style-type: disc; margin-left:20px; margin-bottom:2vh;}
    .evtMap li div {color:#666}   
    .evtMap li div span {padding:2px 5px; color:#fff; border-radius:4px; font-size:1.8vh; vertical-align:middle; display:inline-block}
    .evtMap li div span:nth-of-type(1) {background:#3957ac;}
    .evtMap li div span:nth-of-type(2) {background:#40a028;}
    .evtMap li div span:nth-of-type(3) {background:#c90f25;}
    .evtMap li div span:nth-of-type(4) {background:#40a028;}    

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox evtTop" data-aos="fade-up">        
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2879m_top.jpg" alt="윌비스소방 통합생활관리반"/>  
        <span data-aos="flip-left"><img src="https://static.willbes.net/public/images/promotion/2023/03/2879m_top_img.png" alt="윌비스소방 통합생활관리반" ></span>      
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">        
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2879m_01.jpg" alt=""/>           
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">        
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2879m_02.jpg" alt=""/> 
        <div class="lecbuy">
            <a href="https://willbesedu.willbes.net/pass/consult/visitConsult/index?s_campus=605005" target="_blank">1:1 심층 방문상담 예약하기 ></a>
        </div>          
    </div>

    <div class="evtCtnsBox evt03" data-aos="fade-up">        
        <img src="https://static.willbes.net/public/images/promotion/2023/03/2879m_03.jpg" alt=""/> 
        <div class="lecbuy">
            <a href="https://willbesedu.willbes.net/pass/consult/visitConsult/index?s_campus=605005" target="_blank">1:1 심층 방문상담 예약하기 ></a>
        </div>          
    </div>

    <div class="evtCtnsBox evtMap" data-aos="fade-up">        
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2902m_10.jpg" alt=""/>
        <div>
            <img src="https://static.willbes.net/public/images/willbes/gosi_acad/map/map_so.jpg">
        </div> 
        <ul>
            <li>
                주소
                <div>서울시 동작구 만양로 105 한성빌딩 2층</div>
            </li>
            <li>
                관리반 문의
                <div>1522-6112</div>
            </li>
            <li>
                지하철 이용 시
                <div>노량진역 1번 출구 도보로 3분 / 3번 출구 도보로 4분</div>
            </li>
            <li>
                버스 이용 시
                <div>
                    <span>간선</span> 150, 360, 500, 504, 507, 605, 640, 654, 742<br>
                    <span>지선</span> 5516, 5517, 5531, 5535, 5536, 6211, 641<br>
                    <span>광역</span> 9480<br>
                    <span>마을</span> 동작01, 동작03, 동작08, 동작13
                </div>
            </li>
        </ul>	             
    </div>

</div>

<!-- End Container -->

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
    $(document).ready( function() {
        AOS.init();
    });    
</script>

@stop