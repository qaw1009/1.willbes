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

.sky {position:fixed;top:250px;right:10px;z-index:1;}
.sky li{margin-bottom:10px;}

.evt_top {background:#000308 url(https://static.willbes.net/public/images/promotion/2020/05/1635_top_bg.jpg) no-repeat center top;position:relative;}
.evt_top span {position:absolute; bottom:111.5px; left:50%; margin-left:-193px; z-index:10}
.evt_top .check{position:absolute;width: 1000px;left:62%;top:900px;margin-left:-500px;z-index:1;font-size:14px;text-align:center;line-height:1.5;
              letter-spacing:-1px;}
.evt_top .check label{color:#fff;font-size:16px;}
.evt_top .check input {border: 2px solid #000;margin-right: 8px;height: 17px; width: 17px;} 
.evt_top .check a {display: inline-block; padding: 5px 20px; color: #fff;background: #000;border-radius: 20px;}

.evt03{background:#e3cc90;}

.evt04{background:#f5f6f7;}

</style>

    <div class="evtContent NGR" id="evtContainer">  

        <ul class="sky">
            <li>
                <a href="#apply">
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1635_sky01.png" alt="봉투 모의고사 신청하기">
                </a>
            </li>   
            <li>
                <a href="https://police.willbes.net/pass/campus/show/code/605003?tab=map" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2020/05/1635_sky02.png" alt="학원 방문결제 신청하기">
                </a>
            </li>      
        </ul>

        <div class="evtCtnsBox evt_top">           
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1635_top.jpg" alt="해양경찰 봉투모의고사" >            
            <span>
                <img src="https://static.willbes.net/public/images/promotion/2020/05/1635_top_btn.gif">                
            </span>    
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1635_01.jpg" alt="5회분">
        </div> 

         <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1635_02.jpg" alt="경쟁자보다 빠른 합격">
        </div>   

         <div class="evtCtnsBox evt03" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1635_03.jpg" alt="봉투모의고사 신청하기" usemap="#Map1635a" border="0">
            <map name="Map1635a" id="Map1635a">
                <area shape="rect" coords="249,671,446,725" href="https://police.willbes.net/pass/offLecture/show/cate/3016/prod-code/164663" target="_blank" />
                <area shape="rect" coords="674,670,870,723" href="https://police.willbes.net/pass/offLecture/show/cate/3016/prod-code/164323" target="_blank" />
            </map>
        </div>   

         <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1635_04.jpg" alt="유의사항">
        </div>      
       
    </div>
    <!-- End Container --> 

    <script type="text/javascript">
   
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop