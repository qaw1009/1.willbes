@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">     
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; margin:0 auto; position:relative}

        /************************************************************/
        .skybanner {position:fixed; top:225px; width:170px; right:10px;z-index:1;}
        .skybanner a {display:block; margin-bottom:10px}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/10/1893_top_bg.jpg) no-repeat center top;}
        .wb_01 {background:#dad8a7}
        .wb_03 {background:#030130}
        .wb_03 div {width:1120px; margin:0 auto; position:relative}
        .wb_03 div a:hover {background:rgba(0,0,0,0.3)}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1893_top.jpg" alt="개정과목시험"/>            
        </div>

        <div class="evtCtnsBox wb_01" id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1893_01.jpg" alt="한능검,지텔프"/>          
        </div>
      
        <div class="evtCtnsBox wb_03">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/05/1893_03.jpg" alt="강의신청"/>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/171830" target="_blank" title="한능검 벼락치기" style="position: absolute; left: 31.16%; top: 26.4%; width: 57.41%; height: 9.64%; z-index: 2;"></a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/182396" target="_blank" title="한능검 기본과정" style="position: absolute; left: 31.16%; top: 37.31%; width: 57.41%; height: 9.64%; z-index: 2;"></a>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/179962" target="_blank" title="G텔프" style="position: absolute; left: 31.16%; top: 77.79%; width: 57.41%; height: 9.64%; z-index: 2;"></a>  
            </div>       
        </div>  
    </div>
    <!-- End Container -->

@stop