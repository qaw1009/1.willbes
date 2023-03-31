@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox.wrap {position:relative}
    /*.evtCtnsBox a {border:1px solid #000}*/

    /*유튜브*/
    .youtube {position:relative; padding-bottom:56.25%; overflow: hidden; margin-top:-20px !important}
    .youtube object {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    .evt_04 .lecbuy {display:flex}
    .evt_04 .lecbuy a {display:block; background:#5907ca; color:#fff; font-size:3vh; padding:3vh; width:50%; text-align:center; line-height:1.4; position: relative; margin-right:1px}
    .evt_04 .lecbuy a span {color:#d3b4fe; text-decoration: line-through;}
    .evt_04 .lecbuy a strong {background:#fff; color:#5907ca; padding:1vh 2vh; border-radius:4vh; display:block; margin:1vh 2vh 0}
    .evt_04 .lecbuy a:hover {background:#000}

    .evt_05 ul {padding:10px; text-align:left; font-size:2vh; line-height:1.7;}
    .evt_05 li {list-style-type: disc; margin-left:20px; margin-bottom:20px;}
    .evt_05 li div {font-size:1.8vh; color:#666}   
    .evt_05 li div span {padding:2px 5px; font-size:1.4vh; color:#fff; border-radius:4px; vertical-align:middle; display:inline-block}
    .evt_05 li div span:nth-of-type(1) {background:#3957ac;}
    .evt_05 li div span:nth-of-type(2) {background:#40a028;}
    .evt_05 li div span:nth-of-type(3) {background:#c90f25;}
    .evt_05 li div span:nth-of-type(4) {background:#40a028;}    
</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox" data-aos="fade-up">        
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2902m_top.jpg" alt="상위 10%"/>        
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">    
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2902m_01.jpg" alt=""/>
            <a href="https://willbesedu.willbes.net/m/pass/offLecture/show/cate/3126/prod-code/206759" title="합격반" style="position: absolute; left: 67.22%; top: 17.59%; width: 29.17%; height: 15.59%; z-index: 2;"></a>
            <a href="https://willbesedu.willbes.net/m/pass/offLecture/show/cate/3126/prod-code/206753" title="합격보장반" style="position: absolute; left: 67.22%; top: 43.67%; width: 29.17%; height: 15.59%; z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">        
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2902m_02.jpg" alt=""/>           
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2902m_03.jpg" alt=""/>  
        <div class="wrap">            
            <a href="https://pass.willbes.net/m/pass/professor/show/prof-idx/51422/?cate_code=3050&subject_idx=1259" target="_blank" title="권나라 홈"><img src="https://static.willbes.net/public/images/promotion/2023/02/2902m_04.jpg"/></a>
            <a href="https://pass.willbes.net/m/pass/professor/show/prof-idx/51423?cate_code=3050&subject_idx=1284" target="_blank" title="오도희 홈"><img src="https://static.willbes.net/public/images/promotion/2023/02/2902m_05.jpg"/></a>
            <a href="https://pass.willbes.net/m/pass/professor/show/prof-idx/51215?cate_code=3050&subject_idx=1257" target="_blank" title="신기훈 홈"><img src="https://static.willbes.net/public/images/promotion/2023/02/2902m_06.jpg"/></a>
        </div>       
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">        
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2902m_07.jpg" alt="추가 학습혜택"/>           
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">   
        <a href="https://willbesedu.willbes.net/pass/promotion/index/cate/3126/code/2879" title="통합생활 관리반 더 알아보기" target="_blank">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2902m_08.jpg" alt="통합생활 관리반"/>
        </a>      
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">        
        <div class="youtube">
            <object data="https://www.youtube.com/embed/qzgc1l4EtGA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></object>
        </div> 
    </div>

    <div class="evtCtnsBox evt_04" data-aos="fade-up">        
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2902m_09.jpg" alt=""/> 
        <div class="lecbuy">
            <a class="NSK-Black" href="https://willbesedu.willbes.net/m/pass/offLecture/show/cate/3126/prod-code/206759" target="_blank">
                소방 합격반<br> <span class="NSK">350만원</span> 200만원
                <strong>신청하기 ></strong>
            </a>
            <a class="NSK-Black" href="https://willbesedu.willbes.net/m/pass/offLecture/show/cate/3126/prod-code/206753" target="_blank">
                소방 합격보장반<br> <span class="NSK">500만원</span> 380만원
                <strong>신청하기 ></strong>
            </a>
        </div>          
    </div>

    <div class="evtCtnsBox evt_05" data-aos="fade-up">        
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

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop