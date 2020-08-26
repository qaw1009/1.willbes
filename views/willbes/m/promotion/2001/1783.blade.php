@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; word-break: keep-all;}
    .evtCtnsBox img {width:100%; max-width:720px;}

    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {        
        
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {

    }
    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>

<div id="Container" class="Container NSK c_both"> 
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1783m_01.jpg" alt="신광은 경찰 9월 추천강좌" >
    </div> 

    @if(empty($arr_base['display_product_data']) === false)
        @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
    @endif

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1783m_02.jpg" alt="모의고사 패키지" usemap="#Map1783a" border="0" >
        <map name="Map1783a">
            <area shape="rect" coords="31,274,248,506" href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/171153" target="_blank" alt="원유철">
            <area shape="rect" coords="253,273,464,509" href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/171152" target="_blank" alt="오태진">
            <area shape="rect" coords="473,275,685,509" href="https://police.willbes.net/m/package/show/cate/3002/pack/648001/prod-code/171154" target="_blank" alt="경행경채">
        </map>
    </div> 

    @if(empty($arr_base['display_product_data']) === false)
        @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
    @endif

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1783m_03.jpg" alt="초시생 베스트" usemap="#Map1783b" border="0" >
        <map name="Map1783b">
            <area shape="rect" coords="30,453,247,687" href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/169703" target="_blank" alt="원유철">
            <area shape="rect" coords="252,449,467,689" href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/169704" target="_blank" alt="오태진">
            <area shape="rect" coords="472,449,687,688" href="https://police.willbes.net/m/package/show/cate/3002/pack/648001/prod-code/169705" target="_blank" alt="경행경채">
            <area shape="rect" coords="30,704,691,942" href="https://police.willbes.net/m/promotion/index/cate/3001/code/1556" alt="경찰패스">
        </map>
    </div> 
<!-- End Container -->

@stop