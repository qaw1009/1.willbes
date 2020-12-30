@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {position:fixed; top:225px;right:10px;z-index:10;}
        .skybanner a{display:block; margin-bottom:10px;}

        .evt00 {background:#0a0a0a}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/12/2007_top_bg.jpg) no-repeat center}
        
        .evt01 {background:#E3E3E3}

        .evt02 {background:#fff}

        .evt03 {background:#F4F4F4}

        .evt04 {background:#fff;position:relative;}
        .youtube {position:absolute; top:465px; left:50%;z-index:1;margin-left:-145px}
        .youtube iframe {width:590px; height:345px}

        .evt05 {background:#555; padding-bottom:150px}
        .evt05 .evt05_box {width:1120px; padding:20px; margin:0 auto; background:#fff}
        
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/1966" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2020/12/2007_sky01.png" alt="" >
            </a> 
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/1786" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2020/12/2007_sky02.png" alt="" >
            </a>                       
        </div>   

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div> 

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/2007_top.jpg" alt="" />
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/2007_01.jpg" alt="" />
        </div>         
        
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/2007_02.jpg" alt="" />
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/2007_03.jpg" alt="" />         
        </div> 

        <div class="evtCtnsBox evt04">           
            <img src="https://static.willbes.net/public/images/promotion/2020/12/2007_04.jpg" alt="" />  
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/hFgv1FgRe3I?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div> 

        <div class="evtCtnsBox evt05" id="">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/2007_05.jpg" alt="" />  
            <div class="evt05_box">
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @else
                   강의리스트
                @endif 
            </div>
        </div> 

    </div>
    <!-- End Container -->

    <script>

    </script>


@stop