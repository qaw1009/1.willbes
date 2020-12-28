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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/12/2004_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#fff;}
        .evt02 {background:#F1F1F1;}

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2020/12/2004_03_bg.jpg) no-repeat center top;}

        .evt04 .title {width:1120px; font-size:25px;  margin:0 auto 20px; text-align:left; color:#464646}
        .evt04 .evt04_box {width:1120px; padding:20px 0; margin:0 auto 50px; background:#fff;} 	
        .evt04 .evt04_box .dis{color:#222;vertical-align:baseline;font-size:36px;}        
        .evt04 .evt04_box .evt{color:#fff;vertical-align:baseline;border-radius:30px;background:#f35a61;padding:0 10px;}

        .evt06 {background:url(https://static.willbes.net/public/images/promotion/2020/11/1959_06_bg.jpg) no-repeat center top;}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>     

        <div class="sky">
            <a href="javascript:alert('곧 공개됩니다.')" > 
                <img src="https://static.willbes.net/public/images/promotion/2020/12/2004_sky.png" alt="" >
            </a>             
        </div>   

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/2004_top.jpg"  alt=""/>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/2004_01.jpg"  alt=""/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/2004_02.jpg"  alt="" usemap="#Map1959b" border="0"/>
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
            <img src="https://static.willbes.net/public/images/promotion/2020/12/2004_03.jpg"  alt=""/>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/2004_04.jpg"  alt=""/>
            <div class="evt04_box" id="apply">       
            <div class="title NSK-Black"><span class="dis">50%할인</span></div>                 
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @endif  
            <div class="title NSK-Black" style="padding:75px 0 25px;"><span class="dis">단과 40%할인</span></div>    
                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
                @endif                  
            </div>
        </div>   
        
        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/2004_05.jpg"  alt="" usemap="#Map2004_apply" border="0"/>
            <map name="Map2004_apply" id="Map2004_apply">
                <area shape="rect" coords="814,116,951,157" href="javascript:alert('곧 공개됩니다.')" > 
            </map>
        </div>

   
    </div>
    <!-- End Container -->
@stop