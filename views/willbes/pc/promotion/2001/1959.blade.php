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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        /************************************************************/
        .evt00 {background:#0a0a0a}

        .sky {position:fixed; top:225px;right:10px;z-index:10;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/11/1959_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#EBF5FF;}
        .evtLec {width:1120px; margin:0 auto; text-align:left}

        .evt03 {background:#F7F3F2;}

        .evt06 {background:url(https://static.willbes.net/public/images/promotion/2020/11/1959_06_bg.jpg) no-repeat center top;}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>     

        <div class="sky">
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1952" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2020/11/1959_sky.png" alt="" >
            </a>             
        </div>   

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1959_top.jpg"  alt="12월 추천강좌" usemap="#Map1959a" border="0" />
            <map name="Map1959a">
              <area shape="rect" coords="835,799,1077,909" href="https://police.willbes.net/promotion/index/cate/3001/code/1976" target="_blank" alt="0원패스">
            </map>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1959_01.jpg"  alt=""/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1959_02.jpg"  alt="" usemap="#Map1959b" border="0"/>
            <map name="Map1959b" id="Map1959b">
                <area shape="rect" coords="314,586,430,620" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/175823" target="_blank" />
                <area shape="rect" coords="682,586,794,620" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/175824" target="_blank" />
                <area shape="rect" coords="96,927,186,953" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/175825" target="_blank" />
                <area shape="rect" coords="371,927,460,953" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/175826" target="_blank" />
                <area shape="rect" coords="658,927,747,954" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/175827" target="_blank" />
                <area shape="rect" coords="930,926,1020,954" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/175828" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1959_03.jpg"  alt=""/>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1959_04.jpg"  alt=""/>
        </div>

        <div class="evtCtnsBox evtLec">
            {{--프로모션 동영상 단과 불러오기 모바일--}}
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
        </div>
        
        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1959_05.jpg"  alt="" usemap="#Map1959c" border="0"/>
            <map name="Map1959c" id="Map1959c">
                <area shape="rect" coords="257,563,516,611" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/173091" target="_blank" />
                <area shape="rect" coords="600,562,863,612" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/173090" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox evtLec">
            {{--프로모션 동영상 단과 불러오기 모바일--}}
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif 
        </div>

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1959_06.jpg"  alt="" usemap="#Map1959d" border="0"/>
            <map name="Map1959d" id="Map1959d">
                <area shape="rect" coords="217,225,337,264" href="https://police.willbes.net/package/index/cate/3001/pack/648001?course_idx=1004" target="_blank" />
                <area shape="rect" coords="785,227,900,262"  href="javascript:alert('Comimg Soon :)')" />
            </map>
        </div>

    </div>
    <!-- End Container -->
@stop