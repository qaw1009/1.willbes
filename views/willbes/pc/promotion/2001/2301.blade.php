@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

        /************************************************************/

        .sky {position:fixed; top:200px;right:10px; width:120px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}
        
        .evt00 {background:#0a0a0a}       

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2301_top_bg.jpg) no-repeat center top; position:relative; height:1183px}
        .evtTop span {position:absolute; top:525px; left:50%; width:775px; margin-left:-387px}       

        .evt01 {background:#37302a; padding-bottom:100px}
        .evt01 .evtTab {width:40px; position:absolute; top:397px; left:50%; margin-left:477px}
        .evt01 .evtTab li {margin-bottom:1px}
        .evt01 .evtTab li a {display:block; color:#37302a; font-size:20px; text-align:center; padding:30px 0; border-radius:0 15px 15px 0}
        .evt01 .evtTab li:nth-child(1) a {background:#ff9933}
        .evt01 .evtTab li:nth-child(2) a {background:#ffec8e}
        .evt01 .evtTab li:nth-child(3) a {background:#67c599}
        .evt01 .evtTab li a.active {color:#000;}
    </style> 

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#evt04"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2301_sky.jpg" alt="8월 BEST 강좌" >
            </a>       
        </div> 

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg" alt="경찰학원부분 1위"/>
        </div>              

        <div class="evtCtnsBox evtTop">
            <span data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2021/08/2301_top_img.png" alt="기초 입문서 무료 배포 이벤트"/></span>            
        </div>

        <div class="evtCtnsBox evt01 p_re" >
            <div data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2301_01.jpg" alt="살펴보기"/>
                <ul class="evtTab NSK-Black">
                    <li><a href="#tab01">형<br>사<br>법</a></li>
                    <li><a href="#tab02">경<br>찰<br>학</a></li>
                    <li><a href="#tab03">헌<br>법</a></li>
                </ul>
                <div id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2301_01_01.jpg" alt=""/>
                </div>
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2301_01_02.jpg" alt=""/>
                </div>
                <div id="tab03">
                    <img src="https://static.willbes.net/public/images/promotion/2021/08/2301_01_03.jpg" alt=""/>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2301_02.jpg" alt=""/>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2301_03.jpg"  alt=""/>
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-left" id="evt04">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2301_04.jpg" alt="8월 BEST 강좌"/>
                <a href="#none" title="2022 기초입문서" style="position: absolute; left: 16.43%; top: 49.81%; width: 20.54%; height: 7.04%; z-index: 2;"></a>
                
                <a href="#none" title="3법 기초입문강의" style="position: absolute; left: 41.43%; top: 27.87%; width: 20.54%; height: 4.12%; z-index: 2;"></a>
                <a href="#none" title="G-TELP 문법강의" style="position: absolute; left: 62.32%; top: 27.79%; width: 20.54%; height: 4.12%; z-index: 2;"></a>
                <a href="#none" title="한능검 기본개념편" style="position: absolute; left: 51.96%; top: 40.3%; width: 20.54%; height: 4.12%; z-index: 2;"></a>
                <a href="#none" title="PASS 10%쿠폰" style="position: absolute; left: 41.52%; top: 52.66%; width: 20.54%; height: 4.12%; z-index: 2;"></a>
                <a href="#none" title="단과 20%쿠폰" style="position: absolute; left: 62.23%; top: 52.66%; width: 20.54%; height: 4.12%; z-index: 2;"></a>
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