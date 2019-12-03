@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1066_top_bg.jpg) center top no-repeat}
        .wb_cts02 {background:#f8f8f8}
        .wb_cts03 {background:#F3EFE4;}
        .wb_cts04 {background:#f8f8f8}
        .wb_cts05 {background:#f8f8f8}
        .wb_cts06 {background:#242424;padding-bottom:100px;}
        .wb_cts07 {background:#DBC8B7;}

        .skybanner {position:fixed;top:200px;right:0;width:290px;z-index:11;}
        .skybanner2{position:fixed;top:500px;right:0;width:290px;z-index:11;}         
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">      
        <div class="skybanner">
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/1067" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1067_skybanner.png" title="첨삭지도반" >
            </a>
        </div>  
    
        <div class="skybanner2">
            <a href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/157982" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2019/11/1067_skybanner2.png" title="수강학고 합격하기" >
            </a>
        </div>
      
        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1066_top.jpg" title="" />       
        </div>    

        <div class="evtCtnsBox wb_cts03" id="live">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1066_01.jpg" usemap="#Map" border="0" />
            <map name="Map" id="Map">
                <area shape="rect" coords="658,469,946,568" href="https://www.instagram.com/zenithenglishhan/" target="_blank" />
                <area shape="rect" coords="655,580,950,679" href="https://www.youtube.com/channel/UCPmdjTx3UUKCFt40KtRRdUQ" target="_blank" />
            </map>          
        </div>

        <div class="evtCtnsBox wb_cts07" >
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1066_02.jpg" title="" />    
         
        </div>

        <div class="evtCtnsBox wb_cts04" id="cts04">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1066_04.png" usemap="#Map1066a" title="제니스영어 커리큘럼" border="0" />
            <map name="Map1066a" id="Map1066a">
                <area shape="rect" coords="337,672,391,698" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154891" target="_blank" />
                <area shape="rect" coords="338,786,389,810" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154897" target="_blank" />
                <area shape="rect" coords="336,846,391,870" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145823" target="_blank" />
                <area shape="rect" coords="340,905,388,930" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157580" target="_blank" />
                <area shape="rect" coords="335,979,390,1002" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146100" target="_blank" />
                <area shape="rect" coords="534,608,584,630" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145623" target="_blank" />
                <area shape="rect" coords="533,666,583,692" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/156740" target="_blank" />
                <area shape="rect" coords="528,723,589,750" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154900" target="_blank" />
                <area shape="rect" coords="533,803,583,828" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/156355" target="_blank" />
                <area shape="rect" coords="531,891,583,917" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157579" target="_blank" />
                <area shape="rect" coords="732,672,785,694" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157581" target="_blank" />
                <area shape="rect" coordsf="733,843,784,867" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/145826" target="_blank" />
                <area shape="rect" coords="731,978,785,1005" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146969" target="_blank" />
                <area shape="rect" coords="934,622,990,647" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146742" target="_blank" />
                <area shape="rect" coords="937,714,988,737" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/157582" target="_blank" />
                <area shape="rect" coords="936,804,990,827" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146966" target="_blank" />
                <area shape="rect" coords="937,889,989,915" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/147110" target="_blank" />
                <area shape="rect" coords="934,980,992,1002" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154901" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1066_05.png"title="학습비법패키지수강신청" usemap="#Map1066b" border="0" />
            <map name="Map1066b" id="Map1066b">
                <area shape="rect" coords="837,356,1044,409" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/157982" target="_blank" alt="맞춤형 패키지" title="맞춤형 패키지" />
                <area shape="rect" coords="54,844,231,893" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150364" target="_blank" alt="기본이론" title="01.기본이론" />
                <area shape="rect" coords="267,844,437,895" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150363" target="_blank" alt="심화실전예비" title="02.심화,실전예비" />
                <area shape="rect" coords="475,843,651,896" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150362" target="_blank" alt="문제해결스킬업" title="03.문제해결스킬업" />
                <area shape="rect" coords="687,843,860,896" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/156673" target="_blank" alt="실전실력다지기" title="04.실전실력다지기" />
                <area shape="rect" coords="893,842,1072,895" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/147104" target="_blank" alt="파이널" title="05.지방직" />
            </map>        
            {{--
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1066_06.gif" title="학습비법패키지수강신청" usemap="#Map1066c" border="0" />
            <map name="Map1066c" id="Map1066c">
                <area shape="rect" coords="682,37,1066,114" href="https://pass.willbes.net/promotion/index/cate/3019/code/1193" target="_blank" />
            </map>
            --}}
        </div>
    </div>
    <!-- End Container -->

    <script>
      
    </script>

@stop