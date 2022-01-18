@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/


        /************************************************************/

        .eventTop {background:url("https://static.willbes.net/public/images/promotion/2022/01/2510_top_bg.jpg") no-repeat center top;}

        .event01 {background:#f8f8f8;}   

        .event02 {padding-bottom:100px; width:920px; margin:0 auto;}
        .event02 .txtTitle {font-size:32px; color:#5a5a5a; line-height:1.3; font-weight:bold; text-align:center; padding:100px 0 50px; letter-spacing:-1px}   
        .event02 .txtTitle p {font-size:46px;} 
        .event02 .txtTitle strong {color:#8813d8}
        .event02 .youtubetab {display:flex; justify-content: space-between; margin-bottom:10px}
        .event02 .youtubetab a {display:block; border:3px solid #3b393c; padding:15px 0; font-size:24px; color:#3b393c; width:50%; text-align:center; font-size:bold; line-height:1.2; margin-right:10px}
        .event02 .youtubetab a.active {background:#5e009e; color:#fff; border-color:#5e009e}
        .event02 .youtubetab a:last-child {margin:0}
        .event02 .youtubeBox iframe {width:920px; height:460px}

        .event02 .proftab {display:flex; flex-wrap: wrap; justify-content: space-between;}
        .event02 .proftab a {display:block; border:3px solid #3b393c; padding:15px 0; font-size:24px; color:#3b393c; text-align:center; font-size:bold; line-height:1.2; margin-right:10px; margin-bottom:10px; flex: 1 1 30%;}
        .event02 .proftab a.active {background:#5e009e; color:#fff; border-color:#5e009e}
        .event02 .proftab a:nth-child(3),
        .event02 .proftab a:last-child {margin-right:0}
   
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox eventTop" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2510_top.jpg" alt="지텔프 목표점수"/>    
                <a href="#lec" title="강의신청" style="position: absolute; left: 24.46%; top: 84.36%; width: 50.71%; height: 7.21%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox event01" data-aos="fade-up"> 
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2510_01.jpg" alt="수험생의 영어고민" />
            </div>
        </div>
      
        <div class="event02" data-aos="fade-up">
            <div>
                <div class="txtTitle">
                    G-TELP에 관심이 있지만,
                    <p class="NSK-Black"><strong>어떻게 시작할지 고민</strong>이라면 주목!</p>
                </div>
                <div class="youtubetab">
                    <a href="#tab1" class="active">
                        혹시, G-TELP가<br>
                        처음이신가요?
                    </a>
                    <a href="#tab2">
                        군무원 영어 시험,<br>
                        단 3시간이면 완성!
                    </a>
                </div>
                <div class="youtubeBox" id="tab1">
                    <iframe webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" frameborder="false" scrolling="no" src="https://www.youtube.com/embed/BT7sfyECChA?rel=0"></iframe>
                </div>
                <div class="youtubeBox" id="tab2">
                    <iframe webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" frameborder="false" scrolling="no" src="https://www.youtube.com/embed/sYw3MWvWhwM?rel=0"></iframe>
                </div>
            </div>

            <div>
                <div class="txtTitle">
                    여러분의 영어 고민을 한번에 날려줄,
                    <p class="NSK-Black"><strong>G-TELP 교수진을 소개</strong>합니다.</p>
                </div>

                <div class="proftab">
                    <a href="#tab01" class="active">서지혜 교수</a>
                    <a href="#tab02">김혜진 교수</a>
                    <a href="#tab03">방재윤 교수</a>
                    <a href="#tab04">김태은 교수</a>
                    <a href="#tab05">켈 리 교수</a>
                    <a href="#tab06">김윤성 교수</a>
                </div>
                <div id="tab01"><img src="https://static.willbes.net/public/images/promotion/2022/01/2510_02_01.jpg" alt="" /></div>
                <div id="tab02"><img src="https://static.willbes.net/public/images/promotion/2022/01/2510_02_02.jpg" alt="" /></div>
                <div id="tab03"><img src="https://static.willbes.net/public/images/promotion/2022/01/2510_02_03.jpg" alt="" /></div>
                <div id="tab04"><img src="https://static.willbes.net/public/images/promotion/2022/01/2510_02_04.jpg" alt="" /></div>
                <div id="tab05"><img src="https://static.willbes.net/public/images/promotion/2022/01/2510_02_05.jpg" alt="" /></div>
                <div id="tab06"><img src="https://static.willbes.net/public/images/promotion/2022/01/2510_02_06.jpg" alt="" /></div>
            </div>

            <div class="txtTitle">
                이제 G-TELP는 그냥 듣기만 하세요.
                <p class="NSK-Black">그리고, <strong>여러분은 필기시험에만 집중</strong>하세요.</p>
            </div>
        </div>  

        <div id="lec">
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
        </div>

    </div>
    <!-- End Container -->

    
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
            AOS.init();
        } );
    </script>

    <script>
        var tab1_url = "https://www.youtube.com/embed/BT7sfyECChA?rel=0&modestbranding=1&showinfo=0";
        var tab2_url = "https://www.youtube.com/embed/sYw3MWvWhwM?rel=0&modestbranding=1&showinfo=0";

        $(function() {
        $(".youtubeBox").hide(); 
        $(".youtubeBox:first").show();
        $(".youtubetab a").click(function(){ 
            var activeTab = $(this).attr("href"); 
            var html_str = "";
            if(activeTab == "#tab1"){
                html_str = "<iframe src='"+tab1_url+"' frameborder='0' allowfullscreen></iframe>";
            }else if(activeTab == "#tab2"){
                html_str = "<iframe src='"+tab2_url+"' frameborder='0' allowfullscreen></iframe>";
            }
            $(".youtubetab a").removeClass("active"); 
            $(this).addClass("active"); 
            $(".youtubeBox").hide(); 
            $(".youtubeBox").html(''); 
            $(activeTab).html(html_str);
            $(activeTab).fadeIn(); 
            return false; 
            });
        });

        /*탭*/
        $(document).ready(function(){
        $('.proftab').each(function(){
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
        
            e.preventDefault()})})}
        );

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop