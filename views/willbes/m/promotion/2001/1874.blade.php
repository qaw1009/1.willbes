@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; word-break: keep-all;}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .title {font-size:30px;  margin:20px 10px; text-align:left; color:#65069b}

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
        <img src="https://static.willbes.net/public/images/promotion/2020/10/1874m_top.jpg" alt="10월 추천강좌" >
    </div> 

    <div class="evtCtnsBox">
        <a href="https://police.willbes.net/promotion/index/cate/3001/code/1864" target="_blank">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1874m_01.jpg" alt="0원패스" >
        </a>
    </div>     

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/10/1874m_02.jpg" alt="심화이론,기출 단과" >
    </div>

    @if(empty($arr_base['display_product_data']) === false)
        @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
    @endif
    
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/10/1874m_03.jpg" alt="심화이론,기출 패키지" usemap="#Map1874_01" border="0" >
        <map name="Map1874_01">
          <area shape="rect" coords="64,592,327,656" href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/173091" target="_blank" alt="오태진 패키지">
          <area shape="rect" coords="396,595,661,655" href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/173090" target="_blank" alt="원유철패키지">
        </map>
    </div>

    @if(empty($arr_base['display_product_data']) === false)
        @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
    @endif

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/10/1874m_04.jpg" alt="기본이론 종합반" usemap="#Map1874_02" border="0" >
        <map name="Map1874_02">
          <area shape="rect" coords="28,581,224,626" href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/169703" target="_blank" alt="원유철">
          <area shape="rect" coords="266,579,457,626" href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/169704" target="_blank" alt="오태진">
          <area shape="rect" coords="502,582,690,625" href="https://police.willbes.net/m/package/show/cate/3002/pack/648001/prod-code/169705" target="_blank" alt="경행경채">
        </map>
    </div>   
<!-- End Container -->
@stop