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
            background:#fff           
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #fff}*/

        /************************************************************/        

        .evt_top {background:#012eaf url(https://static.willbes.net/public/images/promotion/2022/04/2642_top_bg.jpg) no-repeat center top; padding-bottom:100px}	
        .evtCtnsBox .title {color:#11153a; font-size:36px; margin:100px 0 50px;}
        .evt_01 {width:1120px; margin:0 auto;}
        .lecinfo {font-size:24px; margin:50px auto; border-top:1px solid #e3e3e3; border-bottom:1px solid #e3e3e3; padding:30px; text-align:left; line-height:1.4}
        .lecinfo p {font-weight:bold; color:#f72739}
        .lecinfo a {height:40px; line-height:40px; padding-left:20px; background:#012eaf; color:#fff; font-size:20px; display:inline-block; margin-top:10px }
        .lecinfo a span {background:#f72739; display:inline-block; padding:0 20px; margin-left:20px}
        .lecinfo a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}
        .evt_02 {background:#f1f1f1}

        .evt_03 {padding:100px 0}
        .tabMenu {font-size:20px; width:1120px; margin:0 auto; display: flex; justify-content: space-between; margin-top:50px}
        .tabMenu a {display:block; width:25%; background:#333; color:#ccc; padding:20px 0; margin-right:1px}
        .tabMenu a:last-child {margin:0}
        .tabMenu a.active {background:#efefef; color:#000; border-top:2px solid #333}
 
        /************************************************************/      
    </style> 
	<div class="evtContent NSK">
		<div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2642_top.jpg" alt="" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2642_top_01.jpg" alt="" />
		</div> 

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2642_01_01.jpg" alt="" />
            <div class="lecinfo">
                ‣ 강의시간_(시험지 출력) 오전 8:00~8:20 (시험) 오전 8:30~9:30 (강의) 9:50~12:00
                <p>※ 자세한 진행방식은 수강안내를 참조하시기 바랍니다. </p>               
                <a href="https://pass.willbes.net/support/notice/show/cate/3019?board_idx=335962&s_cate_code=3103" target="_blank" title="">실시간온라인모의고사+라이브동영상 <span>수강안내 바로가기 ></span></a>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2642_01_02.jpg" alt="" />
		</div> 

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2642_02.jpg" alt="" />
		</div>        

        <div class="evtCtnsBox evt_03" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2642_03_01.jpg" alt="" />
            <div class="tabMenu">
                <a href="#tab01">석치수 <strong>자료해석</strong></a>
                <a href="#tab02">박준범 <strong>상황판단</strong></a>
                <a href="#tab03">이나우 <strong>언어논리</strong></a>
                <a href="#tab04">한승아 <strong>언어논리</strong></a>
            </div>
            <div id="tab01"><img src="https://static.willbes.net/public/images/promotion/2022/04/2642_03_t01.jpg" alt="석치수 자료해석" /></div>
            <div id="tab02"><img src="https://static.willbes.net/public/images/promotion/2022/04/2642_03_t02.jpg" alt="박준범 상황판단" /></div>
            <div id="tab03"><img src="https://static.willbes.net/public/images/promotion/2022/04/2642_03_t03.jpg" alt="이나우 언어논리" /></div>
            <div id="tab04"><img src="https://static.willbes.net/public/images/promotion/2022/04/2642_03_t04.jpg" alt="한승아 언어논리" /></div>
        </div> 
        
        <div class="evtCtnsBox evt_04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2642_04.jpg" alt="" />
		</div>   
        
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
        @endif 
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
        $('.tabMenu').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
            $content = $($active[0].hash);

            $links.not($active).each(function(){
                $(this.hash).hide();
            });

            // Bind the click event handler
            $(this).on('click', 'a', function(e){
                $active.removeClass('active');
                $content.hide();
                $active = $(this);
                $content = $(this.hash);
                $active.addClass('active');
                $content.show();
                e.preventDefault();
            });
        });
    </script>

@stop