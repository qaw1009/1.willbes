@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; word-break: keep-all;}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .evt03 {padding-bottom:100px}
    .evt03 div {font-size:1.6rem; margin:50px 0 30px}
    .evt03 li {display:inline;float:left; width:calc(50% - 20px); margin:0 10px 20px; position:relative;}
    .evt03 li a {display:block; border:1px solid #2e7bfb; border-radius:10px}
    .evt03 li span {display:block; width:100%; position:absolute; bottom:0; background:rgba(255,255,255,.7); padding: 10px; margin:1px}
    .evt03 li strong {display:block; position:absolute; top:0; background:#2e7bfb; color:#fff; padding: 10px; border-radius:10px 0 10px 0}
    .evt03 ul:after {content:''; display:block; clear:both}

    .evt04{padding-bottom:100px}
    .evt04 ul {margin-bottom:15px}
    .evt04 li {display:inline;float:left; width:31.33333%; margin:0 1%;}
    .evt04 ul:after {content:''; display:block; clear:both}
   
    .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding:10px 0}
    .btnbuy a {display:block; width:94%; max-width:700px; margin:0 auto; font-size:1.5rem; background:#000; color:#fff; padding:15px 0; text-align:center; border-radius:50px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}

    .evtFooter {margin:0 auto; padding:30px 20px; text-align:left; color:#666; font-size:0.875rem; line-height:1.4 }
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
    .evtFooter p {margin-bottom:10px; color:#333; font-size:1.2rem;}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal;}


    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {        
        
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
        .evt03 li {width:calc(33.33333% - 20px)}
    }
    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>

<div id="Container" class="Container NSK c_both"> 
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1744m_top.jpg" alt="윌비스 신광은 경찰팀 추천강좌" >
    </div> 

    {{--
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1744m_01.jpg" alt="파이널패스" >
        <a href="https://police.willbes.net/m/promotion/index/cate/3001/code/1741" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/08/1744m_02.jpg" alt="파이널패스" ></a>
    </div>
    --}} 

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1744m_03.jpg" alt="기본이론 집중완성" >
    </div>

    @if(empty($arr_base['display_product_data']) === false)
        @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
    @endif

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2020/08/1744m_04.jpg" alt="기본이론 종합반" >
        <ul>
            <li>
                <a href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/169703" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2020/08/1744m_05.jpg" alt="기본이론 원유철" >
                </a>
            <li>
            <li>
                <a href="https://police.willbes.net/m/package/show/cate/3001/pack/648001/prod-code/169704" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2020/08/1744m_06.jpg" alt="기본이론 오태진" >
                </a>
            <li>
            <li>
                <a href="https://police.willbes.net/m/package/show/cate/3002/pack/648001/prod-code/169705" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2020/08/1744m_07.jpg" alt="기본이론 경행경채" >
                </a>
            <li>
        </ul>
        <a href="https://police.willbes.net/m/promotion/index/cate/3001/code/1556"  target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/08/1744m_08.jpg" alt="경찰패스" ></a>
    </div>
</div>
<!-- End Container -->

@stop