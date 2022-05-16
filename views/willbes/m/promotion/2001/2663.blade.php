@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .wb_02 {font-size:3.2vh; color:#191919; line-height:1.4; padding-bottom:100px; letter-spacing:-1px} 
    .wb_02 .stitle {margin:80px 0 20px}
    .wb_02 span {color:#ff7e00}  
    .wb_02 .youtube {position:relative; padding-top:30px; padding-bottom:56.25%; margin:0 20px; height:0;background: #333;} 
    .wb_02 .youtube:before,
    .wb_02 .youtube:after{
        z-index: 0;
        width:90%;
        position: absolute;
        content: "";
        bottom: 35px;
        left: 5px;
        top: 80%;            
        box-shadow: 0 20px 15px rgba(0,0,0,.3);
        transform: rotate(-5deg);
    }
    .wb_02 .youtube:after{
        transform: rotate(5deg);
        right: 5px;
        left: auto;
    }
    .wb_02 .youtube iframe {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%; z-index: 2;}  


    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   

    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       

    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox"  data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2663m_top.jpg" alt="신광은경찰팀 기본이론 종합반" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2663m_01.jpg" alt="신광은경찰팀 기본이론 종합반" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2663m_02.jpg" alt="경찰 과목 개편" >
        <a href="https://police.willbes.net/promotion/index/cate/3001/code/1839" target="_blank" title="개편 과목 전략 확인" style="position: absolute; left: 10.28%; top: 83.98%; width: 37.78%; height: 10.66%; z-index: 2;"></a>
        <a href="https://police.willbes.net/promotion/index/cate/3001/code/1966" target="_blank" title="지텔프 확인" style="position: absolute; left: 51.67%; top: 83.98%; width: 37.78%; height: 10.66%; z-index: 2;"></a>
    </div> 



    <div class="evtCtnsBox wb_02 NSK-Black" data-aos="fade-up">
        <div class="stitle">형사법 신광은 교수님<br>
        강의의 <span>새로운 신세계</span>를 보여드리겠습니다.</div>
        <div class="youtube">
            <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="stitle">경찰학 장정훈 교수님<br>
        <span>베테랑의 노하우</span>로 최적화된 경찰학 강의.</div>
        <div class="youtube">
            <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="stitle">헌법 김원욱 교수님<br>
        <span>경찰 헌법의 새로운 시대</span>를 이끕니다.</div>
        <div class="youtube">
            <iframe src="https://www.youtube.com/embed/KkESWQLjtq8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>	
        <div class="stitle">헌법 이국령 교수님<br>
        <span>헌법도약으로 정답</span>을 찾아냅니다.</div>
        <div class="youtube">
            <iframe src="https://www.youtube.com/embed/_-XbBFVxK2Y?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="stitle">범죄학 박상민 교수님<br>
        <span>저스티스 박상민 범죄학</span>으로 통한다.</div>
        <div class="youtube">
            <iframe src="https://www.youtube.com/embed/8T1HxQ5PPhQ?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2663m_03.jpg" alt="5월 스케줄" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2663m_04.jpg" alt="5월 스케줄" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/05/2663m_05.jpg" alt="단과" >
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif 
    </div> 

</div>

<!-- End Container -->

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    <script>
    function popup(){
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
        var url = "{{ site_url('/pass/promotion/popup/' . $arr_base['promotion_code']) .'?cert='. $arr_promotion_params['cert'] }}";
        window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=868,height=630');
    }
</script>
@stop