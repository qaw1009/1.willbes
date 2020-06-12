@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#fff;
            margin-top:20px !important;
            padding:0 !important;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skybanner {position:fixed;top:240px;right:10px;z-index:1}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/06/1683_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/06/1683_01_bg.jpg) no-repeat center top}	
        .evt02 {background:#b39d6c; position:relative}
        .evt02 a {position:absolute; width:408px; top:445px; left:50%; margin-left:-10px;
            -webkit-animation: bounce-top 2s 1s 5 ;
	        animation: bounce-top 2s 1s 5 alternate;
        }
        @@-webkit-keyframes bounce-top {
            0% {
                -webkit-transform: translateY(-45px);
                        transform: translateY(-45px);
                -webkit-animation-timing-function: ease-in;
                        animation-timing-function: ease-in;
                opacity: 1;
            }
            24% {
                opacity: 1;
            }
            40% {
                -webkit-transform: translateY(-24px);
                        transform: translateY(-24px);
                -webkit-animation-timing-function: ease-in;
                        animation-timing-function: ease-in;
            }
            65% {
                -webkit-transform: translateY(-12px);
                        transform: translateY(-12px);
                -webkit-animation-timing-function: ease-in;
                        animation-timing-function: ease-in;
            }
            82% {
                -webkit-transform: translateY(-6px);
                        transform: translateY(-6px);
                -webkit-animation-timing-function: ease-in;
                        animation-timing-function: ease-in;
            }
            93% {
                -webkit-transform: translateY(-4px);
                        transform: translateY(-4px);
                -webkit-animation-timing-function: ease-in;
                        animation-timing-function: ease-in;
            }
            25%,
            55%,
            75%,
            87% {
                -webkit-transform: translateY(0px);
                        transform: translateY(0px);
                -webkit-animation-timing-function: ease-out;
                        animation-timing-function: ease-out;
            }
            100% {
                -webkit-transform: translateY(0px);
                        transform: translateY(0px);
                -webkit-animation-timing-function: ease-out;
                        animation-timing-function: ease-out;
                opacity: 1;
            }
            }
            @@keyframes bounce-top {
            0% {
                -webkit-transform: translateY(-45px);
                        transform: translateY(-45px);
                -webkit-animation-timing-function: ease-in;
                        animation-timing-function: ease-in;
                opacity: 1;
            }
            24% {
                opacity: 1;
            }
            40% {
                -webkit-transform: translateY(-24px);
                        transform: translateY(-24px);
                -webkit-animation-timing-function: ease-in;
                        animation-timing-function: ease-in;
            }
            65% {
                -webkit-transform: translateY(-12px);
                        transform: translateY(-12px);
                -webkit-animation-timing-function: ease-in;
                        animation-timing-function: ease-in;
            }
            82% {
                -webkit-transform: translateY(-6px);
                        transform: translateY(-6px);
                -webkit-animation-timing-function: ease-in;
                        animation-timing-function: ease-in;
            }
            93% {
                -webkit-transform: translateY(-4px);
                        transform: translateY(-4px);
                -webkit-animation-timing-function: ease-in;
                        animation-timing-function: ease-in;
            }
            25%,
            55%,
            75%,
            87% {
                -webkit-transform: translateY(0px);
                        transform: translateY(0px);
                -webkit-animation-timing-function: ease-out;
                        animation-timing-function: ease-out;
            }
            100% {
                -webkit-transform: translateY(0px);
                        transform: translateY(0px);
                -webkit-animation-timing-function: ease-out;
                        animation-timing-function: ease-out;
                opacity: 1;
            }
            }
 
    </style>


    <div class="evtContent" id="evtContainer">
        <div class="skybanner">
            <a href="#lecgo"><img src="https://static.willbes.net/public/images/promotion/2020/06/1683_sky.png" alt="전국모의고사 신청하기" /></a>
        </div>
            
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1683_top.jpg" alt="전국모의고사"  />
        </div>
        
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1683_01.jpg"  alt="전국모의고사 필요성" />
        </div>
        
        <div class="evtCtnsBox evt02" id="lecgo">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1683_02.jpg"  alt="모의고사 신청"/>
            <a href="{{ site_url('pass/mockTestNew/apply/cate') }}" target="_blank" >
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1683_btnLecgo.png"  alt="전국모의고사 필요성" />
            </a>            
        </div>	
    </div>
    <!-- End Container -->      

@stop