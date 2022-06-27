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
.evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
/*.evtCtnsBox .wrap a {border:1px solid #000}*/
/*****************************************************************/  

.evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/05/2212_top_bg.jpg) no-repeat center top;}

.evt01, .evt02 {background:#eeeef1}

.evt03 {background:#14192b;}

.evt04 {background:#eeeef1;}

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
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2212_04.jpg" alt="바로가기">       
                <a href="" target="_blank" title="" style="position: absolute;left: 30.55%;top: 24.34%;width: 38.74%;height: 2.56%;z-index: 2;"></a>
                <a href="" target="_blank" title="" style="position: absolute;left: 63.45%;top: 28.04%;width: 17.54%;height: 4.36%;z-index: 2;"></a>
                <a href="" target="_blank" title="" style="position: absolute;left: 30.55%;top: 41.94%;width: 38.74%;height: 2.56%;z-index: 2;"></a>
                <a href="" target="_blank" title="" style="position: absolute;left: 30.55%;top: 59.54%;width: 38.74%;height: 2.56%;z-index: 2;"></a>
                <a href="" target="_blank" title="" style="position: absolute;left: 30.55%;top: 88.14%;width: 38.74%;height: 2.56%;z-index: 2;"></a>  
            </div>   
        </div>                      
              
    </div>
     <!-- End Container -->

     <script>

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

    @stop