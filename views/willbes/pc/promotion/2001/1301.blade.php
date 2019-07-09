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
.top_bg {background:url(https://static.willbes.net/public/images/promotion/2019/07/1301_top_bg.jpg) no-repeat center top;}
.top_bg .check{
    position:absolute; width:1000px; left:50%; top:850px; margin-left:-500px; z-index:1;font-size:14px;text-align:center;line-height:1.5;
    letter-spacing:-1px;
}

.top_bg span {position:absolute; z-index:5;}
.top_bg .img03 {width:521px; top:405px; left:50%; margin-left:-560px; animation:img3 0.5s ease-in;-webkit-animation:img3 0.5s ease-in;}
@@keyframes img3{
    from{margin-left:0; opacity: 0;}
    to{margin-left:-560px; opacity: 1; transform:rotate(720deg);}
}
@@-webkit-keyframes img3{
    from{margin-left:0; opacity: 0;}
    to{margin-left:-560px; opacity: 1; transform:rotate(720deg);}
}

.evtCtnsBox .check label{color:#fff;font-size:16px;}
.evtCtnsBox .check input {border: 2px solid #000;margin-right: 8px;height: 17px; width: 17px;} 
.evtCtnsBox .check a {display: inline-block; padding:5px 20px; color: #111528;background: #d7d7d7;border-radius:20px; margin-left:20px}
.evtCtnsBox .check a:hover {color: #fff;background: #000;}

.evt01 {background:url(https://static.willbes.net/public/images/promotion/2019/07/1301_01_bg.jpg) repeat center top;}
.evt02 {background:#fff;}
.evt03 {background:url(https://static.willbes.net/public/images/promotion/2019/07/1301_03_bg.jpg) no-repeat center top;}
.evt04 {background:#ececec}
.evt04 .check{
    position:absolute;width: 800px;left:50%;top:970px;margin-left:-400px;z-index:1;font-size:14px; text-align:center;line-height:1.5;
    letter-spacing:-1px;
}
.evt04 .check label{color:#333}
.evt05 {background:#555}

</style>


    <div class="evtContent NGR" id="evtContainer">  
        <div class="evtCtnsBox top_bg">  
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1301_top.jpg" alt="오원유철태진 한국사" usemap="#Map1301a" border="0">
            <map name="Map1301a" id="Map1301a">
                <area shape="rect" coords="316,767,804,829" href="javascript:go_PassLecture(1);" target="_blank" alt="수강신청"/>
            </map>
            <span class="img03"><img src="https://static.willbes.net/public/images/promotion/2019/07/1301_top_img03.png" alt="수 많은 합격생이 증명"></span>

            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1301_01.jpg" alt="수 많은 합격생이 증명">
        </div>  

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1301_02.jpg" alt="커리큘럼">  
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1301_03.jpg" alt="실전 모의고사"> 
        </div>
        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1301_04.jpg" alt="수강신청" usemap="#Map1301b" border="0">
            <map name="Map1301b" id="Map1301b">
                <area shape="rect" coords="123,851,990,950" href="javascript:go_PassLecture(1);" target="_blank" alt="수강신청" />
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
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1301_05.jpg" alt="실전 모의고사"> 
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
                lUrl = "https://police.willbes.net/periodPackage/show/cate/3008/pack/648001/prod-code/155372";
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