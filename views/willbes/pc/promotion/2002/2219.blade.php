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

.sky {position:fixed;top:250px;right:25px;z-index:1;} 

.evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/05/2219_top_bg.jpg) no-repeat center top;}

.evt04 , .evt05 , .evt06 , .evt07 {background:#2d3744;}

.evt_wrap {width:1120px; margin:0 auto; position: relative;}
.evt_wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.25);}

</style> 

    <div class="evtContent NSK" id="evtContainer"> 

        <div class="sky" >
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2178" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/05/2219_sky.png" alt="스카이베너" ></a>
        </div>  

        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2219_top.jpg" alt="6월 추천 강좌">  
        </div>
    
        <div class="evtCtnsBox evt01">            
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2219_01.jpg" alt="문제풀이">
        </div>

        <div class="evtCtnsBox evt02">    
            <div class="evt_wrap">        
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2219_02.jpg" alt="문제풀이 자세히 보기">
                <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2164" target="_blank" title="" style="position: absolute; left: 79.23%; top: 85.13%; width: 18.66%; height: 8.27%; z-index: 2;"></a>
            </div>    
        </div>

        <div class="evtCtnsBox evt03">   
            <div class="evt_wrap">             
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2219_03.jpg" alt="문풀 신청하기">
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1043" target="_blank" title="" style="position: absolute;left: 28.23%;top: 54.13%;width: 12.66%;height: 5.27%;z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1043" target="_blank" title="" style="position: absolute;left: 59.23%;top: 54.13%;width: 12.66%;height: 5.27%;z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2169#apply1" target="_blank" title="" style="position: absolute;left: 59.23%;top: 72.13%;width: 12.66%;height: 5.27%;z-index: 2;"></a>
            </div>    
        </div>

        <div class="evtCtnsBox evt04">            
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2219_04.jpg" alt="기본완성 기출반">
        </div>

        <div class="evtCtnsBox evt05">     
            <div class="evt_wrap">       
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2219_05.jpg" alt="기본반 자세히 보기">
                <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2170" target="_blank" title="" style="position: absolute;left: 62.23%;top: 90.13%;width: 27.66%;height: 8.27%;z-index: 2;"></a>
            </div>    
        </div>

        <div class="evtCtnsBox evt06">        
            <div class="evt_wrap">       
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2219_06.jpg" alt="종합반 수강신청">
                <a href="https://police.willbes.net/pass/offPackage/show/prod-code/181343" target="_blank" title="" style="position: absolute;left: 18.23%;top: 80.13%;width: 25.66%;height: 7.27%;z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/show/prod-code/181342" target="_blank" title="" style="position: absolute;left: 56.23%;top: 80.13%;width: 25.66%;height: 7.27%;z-index: 2;"></a>
            </div>  
        </div>

        <div class="evtCtnsBox evt07">    
            <div class="evt_wrap">        
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2219_07.jpg" alt="단과 수강신청">
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/181339" target="_blank" title="" style="position: absolute;left: 10.23%;top: 69.13%;width: 22.66%;height: 5.27%;z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/181340" target="_blank" title="" style="position: absolute;left: 38.23%;top: 69.13%;width: 22.66%;height: 5.27%;z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/181341" target="_blank" title="" style="position: absolute;left: 66.73%;top: 69.13%;width: 22.66%;height: 5.27%;z-index: 2;"></a>
            </div>
        </div>

    </div>
    <!-- End Container --> 

    <script type="text/javascript">

    </script>
@stop