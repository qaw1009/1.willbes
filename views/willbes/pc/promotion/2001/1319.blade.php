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
.top_bg {background:#c8dbe6 url(https://static.willbes.net/public/images/promotion/2019/07/1319_top_bg.jpg) no-repeat center top; height:950px; overflow:hidden}
.top_bg .topImg {position:absolute; width:1120px; left:50%; top:0; margin-left:-560px; z-index:2;}
.top_bg .img03 {position:absolute; width:900px; height:900px;  left:50%; top:-36px; margin-left:-338px; z-index:1; overflow:hidden; 
background:url(https://static.willbes.net/public/images/promotion/2019/07/1319_top_img.png) no-repeat center center; 
animation:img3 2s infinite; -webkit-animation:img3 2s infinite;
}
@@keyframes img3{
    from{transform:rotate(0deg);}
    to{transform:rotate(360deg);}
}
@@-webkit-keyframes img3{
    from{transform:rotate(0deg);}
    to{transform:rotate(360deg);}
}
.top_bg .check{
    position:absolute; width:1000px; left:50%; top:870px; margin-left:-500px; z-index:5;font-size:14px;text-align:center;line-height:1.5;
    letter-spacing:-1px; 
}

.evtCtnsBox .check label{color:#fff;font-size:16px;}
.evtCtnsBox .check input {border: 2px solid #000;margin-right: 8px;height: 17px; width: 17px;} 
.evtCtnsBox .check a {display: inline-block; padding:5px 20px; color: #111528;background: #d7d7d7;border-radius:20px; margin-left:20px}
.evtCtnsBox .check a:hover {color: #fff;background: #000;}

.evt01 {background:#071220;}
.evt02 {background:#fff;}
.evt03 {background:#f5f5f5}
.evt04 {background:#d9e8f1}
.evt04 .check{
    position:absolute;width: 800px;left:50%;top:840px;margin-left:-400px;z-index:1;font-size:14px; text-align:center;line-height:1.5;
    letter-spacing:-1px;
}
.evt04 .check label{color:#333}
.evt05 {background:#424242}

</style>


    <div class="evtContent NGR" id="evtContainer">  
        <div class="evtCtnsBox top_bg">  
            <div class="topImg">
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1319_top.png" alt="원유철 한국사" usemap="#Map1319a" border="0">
                <map name="Map1319a" id="Map1319a">
                    <area shape="rect" coords="314,784,802,846" href="javascript:go_PassLecture(1);" target="_blank" alt="수강신청"/>
                </map>
            </div>
            <span class="img03"></span>

            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1319_01.jpg" alt="수 많은 합격생이 증명">
        </div>  

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1319_02.jpg" alt="커리큘럼">  
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1319_03.jpg" alt="실전 모의고사"> 
        </div>
        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1319_04.jpg" alt="수강신청" usemap="#Map1319b" border="0">
            <map name="Map1319b" id="Map1319b">
                <area shape="rect" coords="313,738,804,799" href="javascript:go_PassLecture(1);" target="_blank" alt="수강신청" />
            </map> 
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
        </div>
        <div class="evtCtnsBox evt05" id="careful">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1333_03.jpg" alt="실전 모의고사"> 
        </div>    
                        
              
    </div>
    <!-- End Container --> 

    <script type="text/javascript">
        function go_PassLecture(no){

            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            var lUrl;
            if(no == 1){
                lUrl = "https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/155449";
            }
            location.href = lUrl;
        }

        function goDesc(tab){
            location.href = '#careful';
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop