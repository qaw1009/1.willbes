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
.top_bg {background:url(https://static.willbes.net/public/images/promotion/2019/09/1392_top_bg.jpg) no-repeat center top;position:relative;}
.top_bg .check{position:absolute;width: 1000px;left:62%;top:900px;margin-left:-500px;z-index:1;font-size:14px;text-align:center;line-height:1.5;
              letter-spacing:-1px;}
.top_bg .check label{color:#fff;font-size:16px;}
.top_bg .check input {border: 2px solid #000;margin-right: 8px;height: 17px; width: 17px;} 
.top_bg .check a {display: inline-block; padding: 5px 20px; color: #fff;background: #000;border-radius: 20px;}

.sec01,.sec03{background:#fff;}
.sec01{position:relative;}
.youtubeGod{position:absolute;width:858px; height:484px; left:50%; top:312px; margin-left:-429px;}
.youtubeGod iframe {width:858px; height:484px;}

.sec02{background:#eef1f5;}

.sec05 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1392_05_bg.jpg) no-repeat center top;position:relative;}
.sec05 .check{position:absolute;width: 1000px;left:45%;top:750px;margin-left:-500px;z-index:1;font-size:14px;text-align:center;line-height:1.5;
              letter-spacing:-1px;}
.sec05 .check label{color:#fff;font-size:16px;}
.sec05 .check input {border: 2px solid #000;margin-right: 8px;height: 17px; width: 17px;} 
.sec05 .check a {display: inline-block; padding: 5px 20px; color: #fff;background: #000;border-radius: 20px;}

.sec06 {background:#424242}
</style>


    <div class="evtContent NGR" id="evtContainer">  
        <div class="evtCtnsBox top_bg">           
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1392_top.jpg" alt="오태진 한국사" usemap="#Map1296a" border="0">
            <map name="Map1296a" id="Map1296a">
            <area shape="rect" coords="825,759,1055,879" href="javascript:go_PassLecture(1);" target="_blank" alt="수강신청"/>
            </map>     
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 오태진 한국사 T-PASS 이용안내를 모두 확인하였고, 이에 동의합니다   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
        </div>
        <div class="evtCtnsBox sec01">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1392_01.jpg" alt="수 많은 합격생이 증명">
            <div class="youtubeGod">
                <iframe src="https://www.youtube.com/embed/LCziQy4uv94" frameborder="0" allowfullscreen=""></iframe> 
            </div>
        </div>     
        <div class="evtCtnsBox sec02">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1392_02.jpg" alt="커리큘럼">  
        </div>
        <div class="evtCtnsBox sec04">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1392_04.jpg" alt="실전 모의고사"> 
        </div>
        <div class="evtCtnsBox sec05">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1392_05.jpg" alt="수강신청" usemap="#Map1296b" border="0">
            <map name="Map1296b" id="Map1296b">
            <area shape="rect" coords="171,441,716,735" href="javascript:go_PassLecture(1);" target="_blank" alt="수강신청" />
            </map> 
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 오태진 한국사 T-PASS 이용안내를 모두 확인하였고, 이에 동의합니다   
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
        </div>    
        <div class="evtCtnsBox sec06" id="careful"> 
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1333_03.jpg" alt="이용안내 및 유의사항"> 
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
                lUrl = "{{ site_url('/periodPackage/show/cate/3008/pack/648001/prod-code/155240') }}";
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