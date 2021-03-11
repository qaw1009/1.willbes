@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
<!-- content -->
<!-- Container -->
<style type="text/css">
    .evtContent {
        position:relative;
        width:100% !important;
        min-width:1110px !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

    /************************************************************/

    .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2111_top_bg.jpg) no-repeat center top;  margin-top:20px; padding-bottom:100px;}

    .menuWarp {position:relative; width:1210px; height:630px; margin:0 auto; }
    .PeMenu {position:absolute; width:1210px;  top:0px; left:0px;}
    .PeMenu li {display:inline; float:left; margin-right:12px}
    .PeMenu li:last-child {margin:0}
    .PeMenu li a img.off {display:block}
    .PeMenu li a img.on {display:none}
    .PeMenu li a:hover img.off {display:none}
    .PeMenu li a:hover img.on {display:block}

    .skyBanner {position:fixed; top:350px;right:0;z-index:10;}
    .skyBanner a { dispaly:block; padding-bottom:10px;}
</style>

<div class="evtContent NGR" id="evtContainer">
    <div class="evtCtnsBox wb_cts01" >
        <p><img src="https://static.willbes.net/public/images/promotion/2021/03/2111_top.png" alt="적중은 역시 신광은 경찰팀"/></p>    
        {{--
        <div class="skyBanner">
             <a href="https://police.willbes.net/pass/support/notice/show?board_idx=280794&" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/1853_sky.jpg" title="합격이야기 바로보기">
            </a>             
        </div>
        --}}
      
        <div class="menuWarp">
            <div class="PeMenu">
                <ul>
                    <li>
                        <a href="#none" onclick="javascript:alert('Coming Soon!');">
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1853_01_6.png" class="off" alt="원유철 경찰한국사"  />
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1853_01_6on.png" class="on" alt="원유철 경찰한국사"  />
                        </a>
                    </li>
                    <li>
                        <a href="#none" onclick="javascript:alert('Coming Soon!');">
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1853_01_5.png" class="off" alt="오태진 경찰한국사"  />
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1853_01_5on.png" class="on" alt="오태진 경찰한국사"  />
                        </a>
                    </li>
                    <li>
                        <a href="#none" onclick="javascript:alert('Coming Soon!');">
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1853_01_3.png" class="off" alt="김원욱 형법"  />
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1853_01_3on.png" class="on" alt="김원욱 형법"  />
                        </a>
                    </li>
                    <li>
                        <a href="#none" onclick="javascript:alert('Coming Soon!');">   
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1853_01_1.png" class="off" alt="신광은 형소법"  />
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1853_01_1on.png" class="on" alt="신광은 형소법"  />
                        </a>
                    </li>
                    <li>
                        <a href="#none" onclick="javascript:alert('Coming Soon!');">
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1853_01_2.png" class="off" alt="장정훈 경찰학"  />
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1853_01_2on.png" class="on" alt="장정훈 경찰학"  />
                        </a>
                    </li>                   
                    <li>
                        <a href="https://police.willbes.net/promotion/index/cate/3001/code/2117" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1853_01_4.png" class="off" alt="하승민 경찰영어"  />
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1853_01_4on.png" class="on" alt="하승민 경찰영어"  />
                        </a>
                    </li>                  
                    <li>
                        <a href="https://police.willbes.net/promotion/index/cate/3001/code/2117" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1853_01_7.png" class="off" alt="김현정 경찰영어"  />
                            <img src="https://static.willbes.net/public/images/promotion/2020/09/1853_01_7on.png" class="on" alt="김현정 경찰영어"  />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
<!-- End Container -->

@stop