@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; font-size:14px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/03/1817_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#f7f6fa}

        .youtube {background:#141621 url(https://static.willbes.net/public/images/promotion/2021/03/2017_prof_bg.jpg) no-repeat center top; padding:150px 0}
        .youtube ul {width:1120px; margin:0 auto}
        .youtube li {display:inline; float:left;}
        .youtube li:last-child {margin-left:20px}
        .youtube li div {margin-bottom:70px; font-size:30px; font-weight:bold; color:#fec345}
        .youtube li div span {color:#fff;}
        .youtube li iframe {width:550px; height:310px}
        .youtube li.w100 {width:100%; margin:0}
        .youtube li.w100 iframe {width:887px; height:500px}
        .youtube ul:after {content:''; display:block; clear:both}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        @include('willbes.pc.promotion.2017.ssam_200130_skybanner')
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1817_top.jpg" alt="초등 배재민" />
        </div> 

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1817_01.jpg" alt="초등 배재민">                      
        </div>

        <div class="evtCtnsBox youtube">
            <ul>
                <li class="w100">
                    <div><span>배재민 교수의</span> 기본이론강의</div>
                    <iframe src="https://www.youtube.com/embed/1Tof3jVF__E?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </li>
            </ul>            
        </div>
    </div>
    <!-- End Container -->
@stop