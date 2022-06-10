@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    .evt01 {background:#272f4c; padding-bottom:100px}
    .evt01 .tabbtn {margin:0 20px; display:flex; position: absolute; top:27% }
    .evt01 .tabbtn a img.on {display:none}
    .evt01 .tabbtn a img.off {display:block}
    .evt01 .tabbtn a.active img.on {display:block; box-shadow:0 5px 5px rgba(0,0,0,.1)}
    .evt01 .tabbtn a.active img.off {display:none}

    .evt02 {background:#c71544;}
    .evt03 {background:#175583;}

    .video-container {position:relative; padding-bottom:56.25%; overflow:hidden; margin:0 4.03%}
    .video-container iframe {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    
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

<div id="Container" class="Container NSK">
    <div class="evtCtnsBox" data-aos="fade-up">            
        <img src="https://static.willbes.net/public/images/promotion/2022/06/1787m_top.jpg" alt="농업, 전기통신" />        
    </div>

    <div class="evtCtnsBox evt01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/1787m_01.jpg" alt="기술직은 윌비스" />
        <div class="tabbtn">
            <div>
                <a href="#tab01">
                    <img src="https://static.willbes.net/public/images/promotion/2022/06/1787m_01_tab01.png" class="off"/>                
                    <img src="https://static.willbes.net/public/images/promotion/2022/06/1787m_01_tab01_on.png" class="on"/>
                </a>
            </div>
            <div>
                <a href="#tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2022/06/1787m_01_tab02.png" class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2022/06/1787m_01_tab02_on.png" class="on"/>
                </a>
            </div>
        </div>
        <div id="tab01" class="tabimg"><img src="https://static.willbes.net/public/images/promotion/2022/06/1787m_01_t01.jpg" /></div>
        <div id="tab02" class="tabimg"><img src="https://static.willbes.net/public/images/promotion/2022/06/1787m_01_t02.jpg" /></div>
    </div>

    <div class="evtCtnsBox evt02" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/1787m_02_01.jpg" alt="장사원" />
            <a href="https://pass.willbes.net/m/professor/show/cate/3028/prof-idx/50429?subject_idx=1171" target="_blank" title="교수홈" style="position: absolute; left: 71.67%; top: 85.59%; width: 23.33%; height: 9.75%; z-index: 2;"></a>
        </div>
        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/chEceiSyKOg?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/1787m_02_02.jpg" alt="장사원" />
            <a href="https://pass.willbes.net/m/promotion/index/cate/3028/code/1068" target="_blank" title="구매하기" style="position: absolute; left: 22.08%; top: 60.64%; width: 55.56%; height: 19.68%; z-index: 2;"></a> 
        </div>
    </div>
    <div class="evtCtnsBox evt03" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/1787m_03_01.jpg" alt="장사원" />
            <a href="https://pass.willbes.net/m/professor/show/cate/3028/prof-idx/50163" target="_blank" title="교수홈" style="position: absolute; left: 4.58%; top: 84.33%; width: 25.14%; height: 11.04%; z-index: 2;"></a>
        </div>
        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/_RDnE7u4k8U?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/1787m_03_02.jpg" alt="장사원" />
            <a href="https://pass.willbes.net/m/promotion/index/cate/3028/code/1071" target="_blank" title="구매하기" style="position: absolute; left: 22.08%; top: 60.64%; width: 55.56%; height: 19.68%; z-index: 2;"></a> 
        </div>
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

<script type="text/javascript">
    $(document).ready(function(){
        $('.tabbtn').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');

            $content = $($active[0].hash);

            $links.not($active).each(function () {
                $(this.hash).hide()});

            // Bind the click event handler
            $(this).on('click', 'a', function(e){
                $active.removeClass('active');
                $content.hide();

                $active = $(this);
                $content = $(this.hash);

                $active.addClass('active');
                $content.show();

                e.preventDefault()}
            )}
        )}
    );         
</script>


{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')
@stop