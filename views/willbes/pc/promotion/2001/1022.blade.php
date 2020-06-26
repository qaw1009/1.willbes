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
        min-width:1210px !important;
        background:#ccc;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

    /************************************************************/

    .wb_cts03 {background:#A7EFFF url(https://static.willbes.net/public/images/promotion/2020/06/1022_top_bg.png) no-repeat center top;  margin-top:20px; padding-bottom:100px;}

    .menuWarp {position:relative; width:1210px; height:630px; margin:0 auto; }
    .PeMenu {position:absolute; width:1210px;  top:0px; left:0px;}
    .PeMenu li {display:inline; float:left; margin-right:12px}
    .PeMenu li:last-child {margin:0}
    .PeMenu li a img.off {display:block}
    .PeMenu li a img.on {display:none}
    .PeMenu li a:hover img.off {display:none}
    .PeMenu li a:hover img.on {display:block}

    .skyBanner {position:fixed; top:350px;right:0;z-index:10;}
    .skyBanner ul li{padding-bottom:10px;}
</style>

<div class="evtContent NGR" id="evtContainer">

    <div class="evtCtnsBox wb_cts03" >
        <p><img src="https://static.willbes.net/public/images/promotion/2020/06/1022_top.png" alt=""  /></p>    
          
        <div class="skyBanner">
            <ul>            
                <li>
                    <a href="https://police.willbes.net/pass/support/notice/show?board_idx=280794&" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/06/1022_sky.jpg" title="합격이야기 바로보기"></a>
                </li>
            </ul>               
        </div>
      
        <div class="menuWarp">
            <div class="PeMenu">
                <ul>
                    <li>
                        <a href="/promotion/index/cate/3001/code/1692" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1022_01_6.jpg" class="off" alt="원유철 경찰한국사"  />
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1022_01_6on.jpg" class="on" alt="원유철 경찰한국사"  />
                        </a>
                    </li>
                    <li>
                        <a href="/promotion/index/cate/3001/code/1696" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1022_01_5.jpg" class="off" alt="오태진 경찰한국사"  />
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1022_01_5on.jpg" class="on" alt="오태진 경찰한국사"  />
                        </a>
                    </li>
                    <li>
                        <a href="/promotion/index/cate/3001/code/1703" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1022_01_3.jpg" class="off" alt="김원욱 형법"  />
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1022_01_3on.jpg" class="on" alt="김원욱 형법"  />
                        </a>
                    </li>
                    <li>
                        <a href="/promotion/index/cate/3001/code/1694" target="_blank">        
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1022_01_1.jpg" class="off" alt="신광은 형소법"  />
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1022_01_1on.jpg" class="on" alt="신광은 형소법"  />
                        </a>
                    </li>
                    <li>
                        <a href="javascript:alert('20년 1차 적중, 곧 공개됩니다!');" >
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1022_01_2.jpg" class="off" alt="장정훈 경찰학"  />
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1022_01_2on.jpg" class="on" alt="장정훈 경찰학"  />
                        </a>
                    </li>                   
                    <li>
                        <a href="/promotion/index/cate/3001/code/1690" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1022_01_4.jpg" class="off" alt="하승민 경찰영어"  />
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1022_01_4on.jpg" class="on" alt="하승민 경찰영어"  />
                        </a>
                    </li>                  
                    <li>
                        <a href="/promotion/index/cate/3001/code/1691" target="_blank">
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1022_01_7.jpg" class="off" alt="김현정 경찰영어"  />
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1022_01_7on.jpg" class="on" alt="김현정 경찰영어"  />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
<!-- End Container -->

@stop