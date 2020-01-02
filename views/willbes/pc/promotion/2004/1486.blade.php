@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
<style type="text/css">
.subContainer {
    min-height:auto !important;
    margin-bottom:0 !important;
}
.evtContent { 
    position:relative;            
    width:100% !important;
    margin-top:20px !important;
    padding:0 !important;
    background:#fff;
}	
.evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
/*****************************************************************/  

.skyBanner {position:fixed; bottom:200px;right:0;z-index:10;}
.evt_top {background:#31373a url(https://static.willbes.net/public/images/promotion/2020/01/1486_top_bg.jpg) no-repeat center top;}
.evt01{background:#e8e8e8;}
.evt02{background:#2e54a7;position:relative;}
.youtube02{position:absolute;left:510px;top:860px;}
.evt03{background:#bd2b2b;position:relative;}
.youtube03{position:absolute;left:500px;top:860px;}
.evt04{background:#e8e8e8;}

</style>


    <div class="evtContent NGR" id="evtContainer">     

        <div class="skyBanner">
            <a href="#apply">
                <img src="https://static.willbes.net/public/images/promotion/2020/01/1486_sky.png"> 
            </a>          
        </div>

        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1486_top.gif" alt="0원 무료특강">   
        </div>

        <div class="evtCtnsBox evt01">          
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1486_01.jpg" alt="포인트">   
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1486_02.jpg" alt="세령국어" usemap="#Map1486b" border="0">
            <map name="Map1486b" id="Map1486b">
                <area shape="rect" coords="889,469,1019,544" href="#apply" />
            </map>
            <div class="youtube02">
                <iframe width="220" height="125" src="https://www.youtube.com/embed/rcpofnoU0dI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
                <iframe width="220" height="125" src="https://www.youtube.com/embed/p-2GNwdWw7U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
                <iframe width="220" height="125" src="https://www.youtube.com/embed/RrTcDw3LN_A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
                <iframe width="220" height="125" src="https://www.youtube.com/embed/e8t_WyToqlE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
            </div>    
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1486_03.jpg" alt="양익 생활영어">
            <div class="youtube03">
                <iframe width="180" height="100" src="https://www.youtube.com/embed/vpo520IqX98" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
                <iframe width="180" height="100" src="https://www.youtube.com/embed/s-wxPmbQimw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
                <iframe width="180" height="100" src="https://www.youtube.com/embed/8RjWtZo8yJE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
                <iframe width="180" height="100" src="https://www.youtube.com/embed/UhQz9zyvCDM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
                <iframe width="180" height="100" src="https://www.youtube.com/embed/v-BGrQrX3VM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
            </div>       
        </div>

        <div class="evtCtnsBox evt04" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1486_04.jpg" alt="신청하기" usemap="#Map1486a" border="0">
            <map name="Map1486a" id="Map1486a">
                <area shape="rect" coords="272,730,531,815" href="https://pass.willbes.net/pass/support/notice/show?board_idx=246583" target="_blank" />
            </map>  
        </div>                         
              
    </div>
    <!-- End Container --> 

    <script type="text/javascript">
        
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop