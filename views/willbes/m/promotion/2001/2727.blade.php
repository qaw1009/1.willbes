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
        .evt_youtube {background:#f6f6f6; padding-bottom:150px}        
        .evt_youtube .youtubeWraps {width:720px;position:absolute;left:50%;margin-left:-360px;margin-top:-465px;}
        .evt_youtube .youtubetab {display:flex;padding-top:50px;}
        .evt_youtube .youtubetab li {width:50%; text-align:center;margin-right:10px}
        .evt_youtube .youtubetab li span {font-size:16px;vertical-align:middle;}   
        .evt_youtube .youtubetab li {width:20%}
        .evt_youtube .youtubetab a {color:#b9b9b9;background:#e1e1e1; font-size:24px; border:1px solid #d2d2d2;padding:20px 0; text-align:center; display:block; letter-spacing:-2px}
        .evt_youtube .youtubetab a.active,
        .evt_youtube .youtubetab a:hover {color:#fff;background:#3bc0f3;border-color:#3bc0f3;font-weight:bold;}
        .evt_youtube .youtubetab li:last-child a {margin:0}
        .evt_youtube .youtubeBox {position:relative; padding-bottom:56.25%;max-width: 100%; } 
        .evt_youtube .youtubeBox iframe {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    /*유튜브*/
        .video-container {position:relative; padding-bottom:56.25%; overflow: hidden; margin-top:-20px !important}
        .video-container iframe {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

     /* 폰 세로*/
        @@media only screen and (max-width: 374px)  {
        .evt_youtube .youtubeWraps {width:325px;margin-left:-162.5px;margin-top:-207px;} 
        .evt_youtube .youtubetab a {font-size:12px;}
    }

    /* 폰 가로 */
    @@media only screen and (min-width: 375px) and (max-width: 499px) {    
        .evt_youtube .youtubeWraps {width:375px;margin-left:-187.5px;margin-top:-231px;}    
        .evt_youtube .youtubetab a {font-size:13px;}
    }

    /* 태블릿 세로 */
        @@media only screen and (min-width: 500px) and (max-width: 640px) {    
        .evt_youtube .youtubeWraps {width:500px;margin-left:-250px;margin-top:-311px;}    
        .evt_youtube .youtubetab a {font-size:16px;}
    }

    /* 태블릿 가로, PC */
        @@media only screen and (min-width: 641px) and (max-width: 719px) {
        .evt_youtube .youtubeWraps {width:640px;margin-left:-320px;margin-top:-435px;}       
        .evt_youtube .youtubetab a {font-size:17px;}
    }

    </style>

<div class="evtContent NSK" id="evtContainer">  

    <div class="evtCtnsBox evt_top" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/07/2727m_top.jpg"  alt="happy event"/>
    </div>      

    <div class="evtCtnsBox evt_youtube" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/07/2727m_youtube.jpg" alt="각 교수 유튜브" />
        <div class="youtubeWraps" id="apply">           
            <div id="tab1" class="youtubeBox"><iframe src='https://www.youtube.com/embed/_-XbBFVxK2Y?rel=0' frameborder='0' allowfullscreen></iframe></div>
            <div id="tab2" class="youtubeBox"></div>
            <div id="tab3" class="youtubeBox"></div>
            <div id="tab4" class="youtubeBox"></div>
            <div id="tab5" class="youtubeBox"></div>
            <ul class="youtubetab">   
                <li><a href="#tab1"  class="active"><span>헌법</span><br> 이국령</a></li> 
                <li><a href="#tab2"><span>경찰학</span><br> OOO</a></li>                            
                <li><a href="#tab3"><span>형사법</span><br> OOO</a></li>
                <li><a href="#tab4"><span>범죄학</span><br> OOO</a></li>        
                <li><a href="#tab5"><span>G-TELP</span><br> OOO</a></li>               
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

    var tab1_url = "https://www.youtube.com/embed/_-XbBFVxK2Y?rel=0";
    var tab2_url = "";        
    var tab3_url = "";
    var tab4_url = "";        
    var tab5_url = "";

    $(function() {
    $(".youtubeBox").hide(); 
    $(".youtubeBox:first").show();
    $(".youtubetab li a").click(function(){ 
            var activeTab = $(this).attr("href"); 
            var html_str = "";
            if(activeTab == "#tab1"){
                html_str = "<iframe src='"+tab1_url+"' frameborder='0' allowfullscreen></iframe>";
            }else if(activeTab == "#tab2"){
                html_str = "";
            }else if(activeTab == "#tab3"){
                html_str = "";                   
            }else if(activeTab == "#tab4"){
                html_str = "";                   
            }else if(activeTab == "#tab5"){
                html_str = "";                   
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

</script>
@stop