@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            font-size:14px;          
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .skybanner {position:fixed;top:200px; width:120px; right:10px; z-index:1;}        
        .skybanner a {display:block;}

        .evt00 {background:#0a0a0a}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/12/2469_top_bg.jpg) no-repeat center;}  
        .evt_top span {position:absolute; top:1274px; left:50%; z-index:10;}
        .evt_top span.img01 {width:253px; margin-left:-440px}
        .evt_top span.img02 {width:275px; margin-left:180px}        
        
        .evt_01 {background:#f0f0f0; padding-bottom:120px}
        .evtTab {position:absolute; top:-130px; left:50%; z-index:10; width:840px; margin-left:-420px; display: flex; justify-content: space-between;}
        .evtTab li {width:410px}
        .evtTab li a {display:block; background:#1b1b1b; color:#fff; font-size:30px; margin:0 5px; border-radius:10px; padding:20px 0; box-shadow:0 15px 0 rgba(0,0,0,.1)}
        .evtTab li a span {color:#ffed5d}
        .evtTab li a.active {background:#f0f0f0; color:#000}
        .evtTab li a.active span {color:#000}    

        .evt_02 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2469_02_bg.jpg) no-repeat center;}   
        .evt_03 {width:1120px; margin:0 auto;}
        .evt_03 .title {font-size:26px; text-align:left; margin:80px 0 20px}
        .evt_03 .title span {color:#fc5777;  box-shadow:inset 0 -20px 0 rgba(252,87,119,.1)}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer"> 
        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>    

        <div class="evtCtnsBox evt_top" data-aos="fade-up">    
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2469_top.jpg" alt="새해 추천강좌"/>
            <span class="img01" data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2021/12/2469_top_img01.png"/></span>
            <span class="img02" data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2021/12/2469_top_img02.png"/></span>
		</div>        

        <div class="evtCtnsBox evt_01">
            <ul class="evtTab NSK-Black">
                <li><a href="#tab01">22년 <span>1차 준비</span> 수험생</a></li>
                <li><a href="#tab02">22년 <span>2차 준비</span> 수험생</a></li>
            </ul>
            <div class="wrap" id="tab01" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2469_01_01.jpg" alt="문제풀이"/>    
            </div>  
            <div class="wrap" id="tab02" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2469_01_02.jpg" alt="기본이론"/>    
            </div>  	
		</div>   
        
        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2469_02.jpg" alt="합격기원팩"/>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/171830" target="_blank" title="한국사" style="position: absolute; left: 18.48%; top: 33.89%; width: 16.88%; height: 2.73%; z-index: 2;"></a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/184584" target="_blank" title="지텔프" style="position: absolute; left: 18.48%; top: 51.1%; width: 16.88%; height: 2.73%; z-index: 2;"></a>
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/2332" target="_blank" title="가산점" style="position: absolute; left: 18.48%; top: 68.47%; width: 16.88%; height: 2.73%; z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2469_03.jpg" alt="경찰교수진"/> 
            <div class="title NSK-Black">2022대비 온라인 <span>문제풀이 1단계</span> 신청 ></div> 
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
            <div class="title NSK-Black">2022대비 온라인 <span>기본이론</span> 신청 ></div>     
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
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

        $(document).ready(function(){
            $('.evtTab').each(function(){
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
@stop