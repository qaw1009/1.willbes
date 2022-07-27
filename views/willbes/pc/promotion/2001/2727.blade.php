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
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed;top:200px;right:10px;z-index:100;}
        .sky a {display:block; margin-bottom:10px}
        
        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/07/2727_top_bg.jpg) no-repeat center top;}

        .evt_youtube {background:#f6f6f6;padding-bottom:150px;}
        .evt_youtube .tabs {width:860px; margin:0 auto; display:flex}		
        .evt_youtube .tabs li {width:50%; text-align:center;margin-right:10px}
        .evt_youtube .tabs li span {font-size:16px;vertical-align:middle;}
        .evt_youtube .tabs li a {color:#b9b9b9;background:#e1e1e1; font-size:24px; border:1px solid #d2d2d2;padding:20px 0; text-align:center; display:block; letter-spacing:-2px}
        .evt_youtube .tabs li a:hover,
        .evt_youtube .tabs li a.active {color:#fff;background:#3bc0f3;border-color:#3bc0f3;font-weight:bold;}
        .evt_youtube .youtubeBox {width:860px; margin:50px auto 0;position:absolute;left:50%;margin-left:-430px;margin-top:-543px;}
        .evt_youtube .youtube iframe {width:860px; height:484px;}
                
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#evt_01">
                <img src="https://static.willbes.net/public/images/promotion/2022/07/2727_sky01.png" alt="소문내기 이벤트 참여하기">
            </a>  
            <a href="#evt_02">
                <img src="https://static.willbes.net/public/images/promotion/2022/07/2727_sky02.png" alt="기대평 이벤트 참여하기">
            </a>            
        </div>     

        <div class="evtCtnsBox evt_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2727_top.jpg"  alt="happy event"/>
        </div>      

        <div class="evtCtnsBox evt_youtube" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2727_youtube.jpg" alt="각 교수 유튜브" />          
            <div id="tab1">
                <div class="youtubeBox">
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/_-XbBFVxK2Y?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>                 
                </div>
             
            </div>
            <div id="tab2">
                <div class="youtubeBox">
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>                 
                </div>
            </div>
            <div id="tab3">
                <div class="youtubeBox">
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>                 
                </div>
            </div>
            <div id="tab4">
                <div class="youtubeBox">
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/8T1HxQ5PPhQ?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>                 
                </div>
            </div>
            <div id="tab5">
                <div class="youtubeBox">
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/WeOyg1YPDfw?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>                 
                </div>
            </div>
            <ul class="tabs">
                <li><a href="#tab1"><span>헌법</span>&nbsp;&nbsp; 이국령</a></li>
                <li><a href="#tab2"><span>경찰학</span>&nbsp;&nbsp; OOO</a></li>
                <li><a href="#tab3"><span>형사법</span>&nbsp;&nbsp; OOO</a></li>
                <li><a href="#tab4"><span>범죄학</span>&nbsp;&nbsp; OOO</a></li>
                <li><a href="#tab5"><span>G-TELP</span>&nbsp;&nbsp; OOO</a></li>                
            </ul>
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up" id="evt_01">
            <div class="wrap">            
                <img src="https://static.willbes.net/public/images/promotion/2022/07/2727_01.jpg"  alt="소문내기 이벤트"/>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="그랜드 오픈 이미지" style="position: absolute;left: 57.49%;top: 58.22%;width: 28.69%;height: 3.48%;z-index: 2;"></a>
                {{--홍보url--}}
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'Y'))
                @endif
            </div>    
        </div>

        <div class="evtCtnsBox evt_02 pb100" data-aos="fade-up" id="evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2727_02.jpg"  alt="기대평 이벤트"/>
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif
        </div>     

    </div>

    <!-- End evtContainer -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>

    <script type="text/javascript">  
        $(document).ready(function(){
            $('.tabs').each(function(){
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