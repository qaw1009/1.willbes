@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
<style type="text/css">
.evtContent { 
    position:relative;            
    width:100% !important;
    margin-top:20px !important;
    padding:0 !important;
    background:#fff;
}	
.evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
/*****************************************************************/  

.evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/05/2212_top_bg.jpg) no-repeat center top;}

.evt01, .evt02 {background:#eeeef1}

.evt03 {background:#14192b;}

.evt04 {background:#eeeef1;}
.evt04 .wrap {width:1120px; margin:0 auto;position:relative;}
.evt04 .wrap a:hover {background:rgba(0,0,0,.25)} 

</style>

    <div class="evtContent NSK" id="evtContainer"> 

        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2212_top.jpg" alt="w지문연습">  
        </div>

        <div class="evtCtnsBox evt01">            
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2212_01.jpg" alt="법원직 2~5위">
        </div>     

        <div class="evtCtnsBox evt02">            
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2212_02.jpg" alt="지문연습+모의고사+강의연계">
        </div>  
        
        <div class="evtCtnsBox evt03">            
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2212_03.jpg" alt="수강생 만족도">
        </div>   

        <div class="evtCtnsBox evt04">            
            <div class="wrap"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2212_04.jpg" alt="바로가기">       
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&course_idx=1412" target="_blank" title="" style="position: absolute; left: 18.55%; top: 27.14%; width: 19.54%; height: 4.86%; z-index: 2;"></a>
                <a href="https://www.youtube.com/watch?v=Y0NgcFSokU8" target="_blank" title="" style="position: absolute; left: 63.55%; top: 27.14%; width: 19.54%; height: 4.86%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2087" target="_blank" title="" style="position: absolute; left: 31.55%; top: 52.14%; width: 19.54%; height: 4.86%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/promotion/index/cate/3059/code/2119" target="_blank" title="" style="position: absolute; left: 31.55%; top: 75.14%; width: 19.54%; height: 4.86%; z-index: 2;"></a>  
            </div>   
        </div>                      
              
    </div>
     <!-- End Container -->

     <script>

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

    @stop