@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .Container {font-size:62.5%;}
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size: calc(1.4rem + (((100vw - 1.4rem) / (90 - 20))) * (2.0 - 1.4)); line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    /*유튜브*/
    .youtube {position:relative; padding-bottom:56.25%; overflow: hidden; margin-top:-20px !important}
    .youtube object {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    .evt_05 ul {width:800px; margin:0 auto; padding:10px; text-align:left; font-size:20px; line-height:1.7;}
    .evt_05 li {list-style-type: disc; margin-left:20px; margin-bottom:20px; width:calc(50% - 20px)}
    .evt_05 li div {font-size:18px; color:#666}   
    .evt_05 li div span {padding:2px 5px; font-size:14px; color:#fff; border-radius:4px; vertical-align:middle; display:inline-block}
    .evt_05 li div span:nth-of-type(1) {background:#3957ac;}
    .evt_05 li div span:nth-of-type(2) {background:#40a028;}
    .evt_05 li div span:nth-of-type(3) {background:#c90f25;}
    .evt_05 li div span:nth-of-type(4) {background:#40a028;}

    .loadmap {position: relative; /*padding-bottom:56.25%;*/ overflow: hidden; max-width:100%; height:500px; }
    .loadmap iframe {position:absolute; top: 0; left: 0; width:100%; height:100%;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        .evt_05 li div {font-size:13px;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       
        .evt_05 li div {font-size:15px;}
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        .evt_05 li div {font-size:17px;}
    }
    
</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox" data-aos="fade-down">        
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2889m_top.jpg" alt="0원 패스"/>        
    </div>

    <div class="evtCtnsBox">
        <a href="https://willbesedu.willbes.net/m/pass/offLecture/show/cate/3126/prod-code/205021" target="_blank">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2889m_apply.jpg" alt="신청하기"/>
        </a>      
    </div>

    <div class="evtCtnsBox">
        <div class="wrap">    
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2889m_01.jpg" alt="0원패스란"/>
            <a href="https://willbesedu.willbes.net/m/pass/offLecture/show/cate/3126/prod-code/205021" target="_blank" title="수강신청하기" style="position: absolute;left: 16.75%;top: 83.63%;width: 42.87%;height: 8.82%;z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2889m_02.jpg" alt="불꽃소방팀"/>
            <a href="https://pass.willbes.net/m/pass/professor/show/prof-idx/51422/?cate_code=3050&subject_idx=1259" target="_blank" title="권나라 홈" style="position: absolute;left: 47.75%;top: 37.63%;width: 32.17%;height: 2.92%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/pass/professor/show/prof-idx/51423?cate_code=3050&subject_idx=1284" target="_blank" title="오도희 홈" style="position: absolute;left: 8.25%;top: 65.63%;width: 32.17%;height: 2.92%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/pass/professor/show/prof-idx/51215?cate_code=3050&subject_idx=1257" target="_blank" title="신기훈 홈" style="position: absolute;left: 43.75%;top: 93.63%;width: 32.17%;height: 2.92%;z-index: 2;"></a>
        </div>       
    </div>

    <div class="evtCtnsBox">        
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2889m_02_curri.jpg" alt="커리큘럼"/>           
    </div>

    <div class="evtCtnsBox">        
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2889m_03.jpg" alt="추가 학습혜택"/>           
    </div>

    <div class="evtCtnsBox">   
        <a href="https://willbesedu.willbes.net/pass/promotion/index/cate/3126/code/2879" title="통합생활 관리반 더 알아보기" target="_blank">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2889m_04.jpg" alt="통합생활 관리반"/>
        </a>      
    </div>

    <div class="evtCtnsBox">        
        <div class="youtube">
            <object data="https://www.youtube.com/embed/qzgc1l4EtGA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></object>
        </div> 
    </div>

    <div class="evtCtnsBox evt_05">        
        <img src="https://static.willbes.net/public/images/promotion/2023/02/2890m_05.jpg" alt="히어로"/>
        <div class="loadmap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1881.7990872517546!2d126.94238635957505!3d37.51272428677447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c9fe8a0a1e2a5%3A0x3bc432e93a6e20c1!2zKOyjvCnsnIzruYTsiqQ!5e0!3m2!1sko!2skr!4v1669167778104!5m2!1sko!2skr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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