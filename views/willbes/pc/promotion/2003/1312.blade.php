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
.evtCtnsBox {width:100%; text-align:center; min-width:1120px; max-width:2000px; margin:0 auto; position:relative;}

/*****************************************************************/  
.evt_top {background:url(https://static.willbes.net/public/images/promotion/2019/07/1312_top_bg.jpg) repeat-x center top;}
.evt_top span.img01 {position:absolute; top:614px; left:50%; margin-left:125px; z-index:10; animation:rubberBand 2s infinite 1s;}
@@keyframes rubberBand{
0%{-webkit-transform:scale3d(1,1,1);transform:scale3d(1,1,1)}
30%{-webkit-transform:scale3d(1.25,.75,1);transform:scale3d(1.25,.75,1)}
40%{-webkit-transform:scale3d(0.75,1.25,1);transform:scale3d(0.75,1.25,1)}
50%{-webkit-transform:scale3d(1.15,.85,1);transform:scale3d(1.15,.85,1)}
65%{-webkit-transform:scale3d(.95,1.05,1);transform:scale3d(.95,1.05,1)}
75%{-webkit-transform:scale3d(1.05,.95,1);transform:scale3d(1.05,.95,1)}
100%{-webkit-transform:scale3d(1,1,1);transform:scale3d(1,1,1)}
}
.evt_top span.img02 {position:absolute; top:1012px; left:50%; margin-left:400px; z-index:10; animation:rubberBand2 1s infinite 1s;}
@@keyframes rubberBand2{
0%{-webkit-transform:scale3d(1,1,1);transform:scale3d(1,1,1)}
50%{-webkit-transform:scale3d(.85,.85,1);transform:scale3d(.85,.85,1)} 
100%{-webkit-transform:scale3d(1,1,1);transform:scale3d(1,1,1)}
}
.sec01 {background:#445974;}
.sec02 {background:#445974 url(https://static.willbes.net/public/images/promotion/2019/07/1312_02_bg.png) no-repeat center top;
    animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
@@keyframes upDown{
0{background-color:#445974}
25%{background-color:#6583aa}
50%{background-color:#65aa9e}
100%{background-color:#90cfa2}
}
@@-webkit-keyframes upDown{
0{background:#445974 url(https://static.willbes.net/public/images/promotion/2019/07/1312_02_bg.png) no-repeat center top}
25%{background:#6583aa url(https://static.willbes.net/public/images/promotion/2019/07/1312_02_bg.png) no-repeat center top}
50%{background:#65aa9e url(https://static.willbes.net/public/images/promotion/2019/07/1312_02_bg.png) no-repeat center top}
100%{background:#90cfa2 url(https://static.willbes.net/public/images/promotion/2019/07/1312_02_bg.png) no-repeat center top }
} 
.sec02_1 {background:#fff;}
.sec03 {background:#e7eaec;}
.sec04 {background:#fcfc68;}
.sec05 {background:#e7eaed;}
.sec06 {padding:100px 0}
</style>


    <div class="evtContent NGR" id="evtContainer">      

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1312_top.jpg" alt="제로백" usemap="#Map1312A" border="0">
            <map name="Map1312A" id="Map1312A">
                <area shape="rect" coords="654,935,1030,1053" href="#none" alt="무료수강하기" />
            </map>
            <span class="img01"><img src="https://static.willbes.net/public/images/promotion/2019/07/1312_top_img01.png" alt="0원"></span>
            <span class="img02"><img src="https://static.willbes.net/public/images/promotion/2019/07/1312_top_img02.png" alt="손가락"></span>
        </div>

        <div class="evtCtnsBox sec01">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1312_01.jpg" alt="수험생들의 고민">
        </div> 

        <div class="evtCtnsBox sec02">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1312_02.png" alt="누구나 조건없이 무료">  
        </div>

        <div class="evtCtnsBox sec02_1">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1312_02_1.gif" alt="제로백의 정체">  
        </div>
        
        <div class="evtCtnsBox sec03">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1312_03.jpg" alt="교수진"> 
        </div>

        <div class="evtCtnsBox sec04">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1312_04.jpg" alt="제로백 교재"> 
        </div>

        <div class="evtCtnsBox sec05">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1312_05.jpg" alt="제로백" usemap="#Map1312B" border="0">
            <map name="Map1312B" id="Map1312B">
                <area shape="rect" coords="652,872,1033,999" href="#none" alt="무료수강하기" />
            </map> 
        </div>  

        <div class="evtCtnsBox sec06">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1312_06.jpg" alt="이용안내"> 
        </div>                
              
    </div>
    <!-- End Container --> 


@stop