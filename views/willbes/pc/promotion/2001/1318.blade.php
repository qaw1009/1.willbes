@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')


<!-- Container-->
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
.top_bg {background:url(https://static.willbes.net/public/images/promotion/2019/07/1318_top_bg.jpg) no-repeat center top;}
.top_bg .check{
    position:absolute; width:1000px; left:50%; top:845px; margin-left:-500px; z-index:1;font-size:14px;text-align:center;line-height:1.5;
    letter-spacing:-1px;
}
.check2{
    position:absolute; width:1000px; left:50%; top:865px; margin-left:-500px; z-index:1;font-size:14px;text-align:center;line-height:1.5;
    letter-spacing:-1px;
}

.top_bg span {position:absolute; z-index:5;}
.top_bg .img03 {width:521px; top:405px; left:50%; margin-left:-20px; animation:img3 0.5s ease-in;-webkit-animation:img3 0.5s ease-in;}
@@keyframes img3{
    from{margin-left:-560px; opacity: 0;}
    to{margin-left:-20px; opacity: 1; transform:rotate(720deg);}
}
@@-webkit-keyframes img3{
    from{margin-left:-560px; opacity: 0;}
    to{margin-left:-20px; opacity: 1; transform:rotate(720deg);}
}

.evtCtnsBox .check label{color:#a6a8a7;font-size:16px;}
.evtCtnsBox .check input {border: 2px solid #000;margin-right: 8px;height: 17px; width: 17px;} 
.evtCtnsBox .check a {display: inline-block; padding:5px 20px; color: #0f3a30;background: #d7d7d7;border-radius:20px; margin-left:20px}
.evtCtnsBox .check a:hover {color: #fff;background: #000;}

.check2 label {color:#a6a8a7;font-size:16px;}
.check2 input {border: 2px solid #000;margin-right: 8px;height: 17px; width: 17px;} 
.check2 a {display: inline-block; padding:5px 20px; color: #22403b;background: #d7d7d7;border-radius:20px; margin-left:20px}
.check2 a:hover {color: #fff;background: #000;}

.evt01 {background:url(https://static.willbes.net/public/images/promotion/2019/07/1316_top_bg.jpg) repeat center top;}
.evt02 {background:#121d1a;}
.evt03 {background:#2c2c2c;}
.evt04 {background:#f5f5f5;}
.evt04 .check{position:absolute;width: 800px;left:50%;top:970px;margin-left:-400px;z-index:1;font-size:14px; text-align:center;line-height:1.5; letter-spacing:-1px;}
.evt04 .check label{color:#a5aeb5;}
.evt05 {background:#ececec;}
.evt06 {background:#424242;}
</style>


    <div class="evtContent NGR" id="evtContainer">  
        <div class="evtCtnsBox top_bg">  
        <img src="https://static.willbes.net/public/images/promotion/2019/07/1318_top.jpg" alt="김원욱 형법 T-PASS" usemap="#Map1318a" border="0">
            <map name="Map1318a" id="Map1318a">
                <area shape="rect" coords="313,765,811,830" href="javascript:go_PassLecture(1);" target="_blank" alt="수강신청 이용약관동의"/>
            </map>
            <span class="img03"><img src="https://static.willbes.net/public/images/promotion/2019/07/1318_t_pass.png" alt="T-PASS"></span>

            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 김원욱 형법 T-PASS 이용안내를 모두 확인하였고, 이에 동의합니다. 
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
        </div>  


        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1318_01.jpg" alt="들리는 강의 김원욱 형법">  
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1318_02.jpg" alt="김원욱 형법 공부방법"> 
        </div>

		<div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1318_03.jpg" alt="고득점은 시간문제"> 
        </div>

        <div class="evtCtnsBox evt05">
        <img src="https://static.willbes.net/public/images/promotion/2019/07/1318_04.jpg" alt="수강신청" usemap="#Map1318b" border="0" >
            <map name="Map1318b" id="Map1318b">
                <area shape="rect" coords="137,739,986,847" href="javascript:go_PassLecture(1);" target="_blank" alt="수강신청 이용약관동의"/>
            </map>
            <div class="check2">
                <label>
                    <input type="checkbox" name="ischk" value="Y">
                    페이지 하단 김원욱 형법 T-PASS 이용안내를 모두 확인하였고, 이에 동의합니다. 
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
        </div>
        <div class="evtCtnsBox evt06" id="careful">
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
                lUrl = "https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/155450";
            }
            location.href = lUrl;
        }

        function goDesc(tab){
            location.href = '#careful';
        }
    </script>


@stop