@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox.wrap {position:relative}
    /*.evtCtnsBox.wrap a {border:1px solid #000}*/

    .evt_07 {padding:100px 0;}
    .youtubeWrap {position:relative; padding-bottom:56.25%; overflow: hidden; margin-top:-20px !important}
    .youtubeWrap object {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    /*유트브 팝업창*/
        .Pstyle {
        opacity: 0;
        display: none;
        position: relative;
        width: auto;
        }
        .b-close {
        position: absolute;
        right: 0;
        top: -60px;
        display: inline-block;
        cursor: pointer;
        font-size: 40px;
        font-weight: bold;
        color:#fff;
        }       
        .videoBox{position: relative; padding-top: 60%; width:720px;}
        .videoBox iframe{position: absolute; top:0; left:0; width:100%; height:100%;}  

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        .videoBox{width:325px;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) { 
        .videoBox{width:500px;}
    }

    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        .videoBox{width:600px;}
    }

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox evt_top"  data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_top.jpg"  alt="윌비스 소방 119패스"/>
    </div>

    <div class="evtCtnsBox evt_01" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_01.jpg" title="수강신청">
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3023/pack/648001/prod-code/207036" target="_blank" title="24년 공채 0원 119 PASS" style="position: absolute;left: 13.73%;top: 19.16%;width: 35.71%;height: 26.31%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3023/pack/648001/prod-code/207037" target="_blank" title="4년 공채 119 PASS" style="position: absolute;left: 51.03%;top: 19.16%;width: 35.71%;height: 26.31%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3023/pack/648001/prod-code/207038" target="_blank" title="24년 구조/학과 경채 0원 PASS" style="position: absolute;left: 13.73%;top: 46.76%;width: 35.71%;height: 26.31%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3023/pack/648001/prod-code/207039" target="_blank" title="24년 구급 경채 0원 PASS" style="position: absolute;left: 51.03%;top: 46.76%;width: 35.71%;height: 26.31%;z-index: 2;"></a>
        </div>    
    </div>

    <div class="evtCtnsBox evt_02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_02.jpg" title="강사진">           
    </div>

    <div class="evtCtnsBox evt_03" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_03.jpg" title="교수진의 강의력">
            <a href="javascript:videoPop('#vid1');" title="" style="position: absolute;left: 0.73%;top: 30.16%;width: 31.71%;height: 20.31%;z-index: 2;"></a>
            <a href="javascript:videoPop('#vid2');" title="" style="position: absolute;left: 33.73%;top: 30.16%;width: 31.71%;height: 20.31%;z-index: 2;"></a>
            <a href="javascript:videoPop('#vid3');" title="" style="position: absolute;left: 66.73%;top: 30.16%;width: 31.71%;height: 20.31%;z-index: 2;"></a>
            <a href="javascript:videoPop('#vid4');" title="" style="position: absolute;left: 0.73%;top: 52.16%;width: 31.71%;height: 20.31%;z-index: 2;"></a>
            <a href="javascript:videoPop('#vid5');" title="" style="position: absolute;left: 33.73%;top: 52.16%;width: 31.71%;height: 20.31%;z-index: 2;"></a>
            <a href="javascript:videoPop('#vid6');" title="" style="position: absolute;left: 66.73%;top: 52.16%;width: 31.71%;height: 20.31%;z-index: 2;"></a>
            <a href="javascript:videoPop('#vid7');" title="" style="position: absolute;left: 0.73%;top: 74.16%;width: 31.71%;height: 20.31%;z-index: 2;"></a>
            <a href="javascript:videoPop('#vid8');" title="" style="position: absolute;left: 33.73%;top: 74.16%;width: 31.71%;height: 20.31%;z-index: 2;"></a>
            <a href="javascript:videoPop('#vid9');" title="" style="position: absolute;left: 66.73%;top: 74.16%;width: 31.71%;height: 20.31%;z-index: 2;"></a>
        </div>        
    </div>

    <div class="evtCtnsBox evt_04" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_04.jpg" title="커리큘럼">           
    </div>

    <div class="evtCtnsBox evt_05" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_05.jpg" title="자주 묻는 질문">           
    </div>

    <div class="evtCtnsBox evt_06" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/04/2949m_06.jpg" title="김윤정 교수">           
    </div>

    <div class="evtCtnsBox evt_07" data-aos="fade-up">
        <div class="youtubeWrap">
            <object data="https://www.youtube.com/embed/qzgc1l4EtGA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></object>
        </div>
    </div>

     <!-- 비디오 영상팝업 리스트 -->

    <div id="vid1" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/B11PSWKoBsY?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid2" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/8WuVy15dGw0?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid3" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/Z7PDrEhrY2o?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid4" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/HEVczcIriqw?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid5" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/W3wcvq26MuM?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid6" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/t6sfD77mE8Y?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid7" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/kiOvGUUzPhM?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid8" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/dTJ3jiCpx8Y?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>
    <div id="vid9" style="display: none;">
        <span class="b-close">X</span>
        <div class="videoBox">
            <iframe src="https://www.youtube.com/embed/rkkN4KuT4cQ?rel=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>

</div>

  <!-- End evtContainer -->

  <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>  
    <script type="text/javascript" src="https://pass.willbes.net/public/js/willbes/jquery.bpopup.min.js"></script>

        <script>
        $(document).ready( function() {
            AOS.init();
        });

        // 비디오팝업
        function videoPop(id) { 
            $(id).bPopup({
                positionStyle:'fixed',            
                onClose: function(){
                    $('video').each(function(){
                        $(this).get(0).pause();
                    });
                }
            });
        } 
        </script>
        
    </script>

    

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop