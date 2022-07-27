@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
        .evtCtnsBox img {width:100%; max-width:720px;}     
        .wrap {position:relative;}
        /*.wrap a {border:1px solid #000}*/

    /************************************************************/

    /*탭(텍스트)*/     
    .tabContaier {background:#fff; border-radius:10px; margin:0 3%; box-shadow: 10px 10px 20px 1px rgba(0,0,0,0.1); padding:15px}
    .tabContaier ul{display:flex;padding-top:50px;} 
    .tabContaier li {width:20%;} 
    .tabContaier li a{display:block; background:#e1e1e1; color:#b9b9b9; font-size:16px; padding:15px 0; margin-right:2px; line-height:1.2;border:1px solid #d2d2d2;}
    .tabContaier li a.active {color:#fff; background:#3bc0f3;}
    .tabContaier li:last-child a {margin:0}

    /*유튜브*/
    .video-container {position:relative; padding-bottom:56.25%; overflow: hidden; margin-top:-20px !important}
    .video-container iframe {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    .tabContaier .tabContents div {font-size:3.6vh; color:#000; font-weight:bold; margin-top:20px; text-align:left; position: relative;}
    .tabContaier .tabContents div > a {color:#3bc0f3; font-size:2vh; background:url("https://static.willbes.net/public/images/promotion/2022/03/2595_icon01.png") no-repeat right center; padding-right:25px}
    .tabContaier .tabContents div span {position: absolute; bottom:0px; right:0}
    .tabContaier .tabContents div span a {font-size:2vh; font-weight:bold; color:#fff; background:#000; border-radius:30px; padding: 2px 10px}
    .tabContaier .tabContents div span a:hover {background:#3bc0f3}

    /* 태블릿 가로, PC */
    @@media only screen and (max-width: 374px)  {
        .tabContaier li a{font-size:12px;}
        .tabContaier .tabContents div {font-size:20px;}
        .tabContaier .tabContents div a {font-size:14px;}
    }

    @@media only screen and (min-width: 375px) and (max-width: 640px) {
        .tabContaier li a{font-size:12px;}
    }
    </style>

<div class="evtContent NSK" id="evtContainer">  

    <div class="evtCtnsBox evt_top" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/07/2727m_top.jpg"  alt="happy event"/>
    </div>      

    <div class="evtCtnsBox evt_youtube" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/07/2727m_youtube.jpg" alt="각 교수 유튜브" />
        <div class="tabContaier" id="apply">           
            <div id="tab1" class="tabContents">
                <div class="wrap">                       
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/_-XbBFVxK2Y?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>                   
                </div>                                 
            </div>
            <div id="tab2" class="tabContents">
                <div class="wrap">                       
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>                   
                </div>                                 
            </div>      
            <div id="tab3" class="tabContents">
                <div class="wrap">                       
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>                   
                </div>                                 
            </div>      
            <div id="tab4" class="tabContents">
                <div class="wrap">                       
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/8T1HxQ5PPhQ?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>                   
                </div>                                 
            </div>      
            <div id="tab5" class="tabContents">
                <div class="wrap">                       
                    <div class="video-container">
                        <iframe src="https://www.youtube.com/embed/WeOyg1YPDfw?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>                   
                </div>                                 
            </div>
            <ul>
                <li><a href="#tab1"  class="active">헌법<br> 이국령</a></li> 
                <li><a href="#tab2">경찰학<br> OOO</a></li>                            
                <li><a href="#tab3">형사법<br> OOO</a></li>
                <li><a href="#tab4">범죄학<br> OOO</a></li>        
                <li><a href="#tab5">G-TELP<br> OOO</a></li>               
            </ul>                
        </div>      
    </div>

    <div class="evtCtnsBox evt_01" data-aos="fade-up" id="evt_01">
        <div class="wrap">            
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2727m_01.jpg"  alt="소문내기 이벤트"/>
            <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="그랜드 오픈 이미지" style="position: absolute;left: 9.49%;top: 70.72%;width: 81.22%;height: 4.48%;z-index: 2;"></a>            
        </div>    
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.m.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'Y'))
        @endif
    </div>

    <div class="evtCtnsBox evt_02 pb100" data-aos="fade-up" id="evt_02">
        <img src="https://static.willbes.net/public/images/promotion/2022/07/2727m_02.jpg"  alt="기대평 이벤트"/>      
    </div>

    <div class="evtCtnsBox pb100" data-aos="fade-up">
        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.m.promotion.show_comment_list_normal_partial')
        @endif
    </div>

</div>

  <!-- End evtContainer -->
      
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

          //교수 tab
          $(document).ready(function(){
            $(".tabContents").hide();
            $(".tabContents:first").show();
            $(".tabContaier ul li a").click(function(){
            var activeTab = $(this).attr("href");
            $(".tabContaier ul li a").removeClass("active");
            $(this).addClass("active");
            $(".tabContents").hide();
            $(activeTab).fadeIn();
            return false;
            });
        });

    </script>

@stop