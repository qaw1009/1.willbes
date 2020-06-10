@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
        .evtCtnsBox img {width:100%; max-width:720px;}

        /************************************************************/

        .evtTop .embed-container {position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%;} 
        .evtTop .embed-container iframe,
        .evtTop .embed-container object, 
        .evtTop .embed-container embed {position: absolute; top: 0; left: 0; width: 100%; height: 100%;}

        .evt02 {position:relative}
        .evt02 a {display:block; text-align:center; position:absolute; width:100%; bottom:6%}
        .evt02 a img {max-width:518px; width:80%}

        @@media only screen and (max-width: 640px) {

        }
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1666m_top.jpg" alt="" > 
            <div class='embed-container'>
                <iframe src='https://www.youtube.com/embed/NZLPO-a3JxY' frameborder='0' allowfullscreen></iframe> 
            </div>
        </div> 
        
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1666m_01.jpg" alt="" >            
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1665m_02.jpg" alt="" > 
            <a href="/m/promotion/index/cate/3114/code/1664" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/06/1665m_btn.png" alt="" ></a>
        </div>
    </div>
    <!-- End Container -->
@stop