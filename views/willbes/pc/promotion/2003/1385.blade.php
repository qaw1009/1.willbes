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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/08/1385_top_bg.jpg) no-repeat center top;}

        /* txt_motion */
		.wb_top > div {width:1120px; margin:0 auto; position:relative;}
		.wb_top > div span {position:absolute; width:120px; z-index: 1;}
		.wb_top > div span.txt1 {top:52px; left:320px; animation:slidein1 0.2s ease-in; -webkit-animation:slidein1 0.2s ease-in;}
		.wb_top > div span.txt2 {top:63px; left:320px; animation:slidein2 0.4s ease-in; -webkit-animation:slidein2 0.4s ease-in;}
		.wb_top > div span.txt3 {top:140px; left:300px; animation:slidein3 0.6s ease-in; -webkit-animation:slidein3 0.6s ease-in;}
		.wb_top > div span.txt4 {top:185px; left:320px; animation:slidein4 0.8s ease-in; -webkit-animation:slidein4 0.8s ease-in;}
		@@keyframes slidein1 {from {left:605px; opacity: 0;}to {left:150px; opacity: 1}}
		@@keyframes slidein2 {from {left:605px; opacity: 0;}to {left:150; opacity: 1}}
		@@keyframes slidein3 {from {left:605px; opacity: 0;}to {left:150; opacity: 1}}
		@@keyframes slidein4 {from {left:605px; opacity: 0;}to {left:150; opacity: 1}}

		/* txt_motion */
		.time {width:100%; text-align:center; background:#000}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {font-size:40px}
        .time table td img {width:70%}
        .time .time_txt {font-size:24px; color:#f2f2f2; letter-spacing: -1px; font-weight:bold}
        .time .time_txt span {color:#ead4b5; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#ead4b5}
        50%{color:#ff6600}
        to{color:#ead4b5}
        }
        @@-webkit-keyframes upDown{
        from{color:#ead4b5}
        50%{color:#ff6600}
        to{color:#ead4b5}
        } 
     
        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2019/08/1385_02_bg.jpg) no-repeat center top;}          
     
        .wb_cts03{position:relative;background:#e8dcc7;}
        label.check3 {top:955px; left:675px; background-color: #fff; outline:2px solid #15365d; width:20px;height:20px;}
        label.check4 {top:955px; left:675px; background-color: #fff; outline:2px solid #15365d; width:20px;height:20px;}
		input + label {position:absolute; z-index:1; width:30px; height:30px; outline:5px solid #15365d; background:#fff}
		input:checked + label:after {position: relative;content: '\2714';font-size: 30px;}
		input:checked + label.check3:after{font-size: 20px;}	
        input:checked + label.check4:after{font-size: 20px;}		
        input {display:none}	
  	 

        .tabContaier{width:100%; text-align:center; padding-bottom:20px;}
        .tabContaier ul {width:1124px;margin:0 auto;}		
        .tabContaier li {display:inline; float:left;}	
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContaier ul:after {content:""; display:block; clear:both}


    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >            
               
            <div>
                <span class="txt1"><img src="https://static.willbes.net/public/images/promotion/2019/08/1385_txt1.png"></span>
                <span class="txt2"><img src="https://static.willbes.net/public/images/promotion/2019/08/1385_txt2.png"></span>
                <span class="txt3"><img src="https://static.willbes.net/public/images/promotion/2019/08/1385_txt3.png"></span>
                <span class="txt4"><img src="https://static.willbes.net/public/images/promotion/2019/08/1385_txt4.png"></span> 
            </div>      
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1385_top.jpg" alt="김동진 법원팀 순환별 패키지" />   
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1385_01.jpg" alt="순환별로 자세히 보기" usemap="#Map1385a" border="0"/>
            <map name="Map1385a" id="Map1385a">
                <area shape="rect" coords="898,667,1023,716" href="https://pass.willbes.net/promotion/index/cate/3035/code/1089" target="_blank"alt="예비순환" />
                <area shape="rect" coords="120,870,241,917" href="https://pass.willbes.net/promotion/index/cate/3035/code/1241" target="_blank"alt="1순환" />
                <area shape="rect" coords="897,1070,1020,1115" href="https://pass.willbes.net/promotion/index/cate/3035/code/1273" target="_blank"alt="2순환" />
                <area shape="rect" coords="119,1269,237,1314" href="https://pass.willbes.net/promotion/index/cate/3035/code/1381" target="_blank"alt="3순환" />
                <area shape="rect" coords="900,1480,1015,1527" href="javascript:alert('준비중입니다.');" alt="4순환" />
                <area shape="rect" coords="114,1678,241,1726" href="javascript:alert('준비중입니다.');" alt="5순환" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts02">            
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1385_02.jpg" alt="김동진 배상"> 
        </div>

        <div class="evtCtnsBox wb_cts03">            
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1385_03.jpg" alt="패키지 수강신청 안내"/>
            <div class="tabContaier">  
                <ul class="NGEB">
                    <li>
                        <a class="active" href="#tab1"><img src="https://static.willbes.net/public/images/promotion/2019/08/1385_03_tab1_off.jpg" class="off" />
                        <img src="https://static.willbes.net/public/images/promotion/2019/08/1385_03_tab1_on.jpg" class="on"  /></a>
                    </li>
                    <li>
                        <a href="#tab2"><img src="https://static.willbes.net/public/images/promotion/2019/08/1385_03_tab2_off.jpg"  class="off"  />
                        <img src="https://static.willbes.net/public/images/promotion/2019/08/1385_03_tab2_on.jpg"  class="on" /></a>
                    </li>           
                </ul>
                <div class="tabContents" id="tab1">
                    <img src="https://static.willbes.net/public/images/promotion/2019/08/1385_03_tab1_c1.jpg" alt="6개월" usemap="#1385b" border="0" />
                    <map name="1385b" id="1385b">
                        <area shape="rect" coords="270,332,444,399" href="javascript:go_product('https://pass.willbes.net/package/show/cate/3035/pack/648001/prod-code/156547',1)" alt="1~3순환 법과목 패키지" />
                        <area shape="rect" coords="680,330,861,400" href="javascript:go_product('https://pass.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/156550',1)" alt="3~5순환 전과목 패키지" />
                        <area shape="rect" coords="733,454,876,487" href="#careful" alt="이용안내 확인하기" />
                    </map>
                    <input name="is_chk" type="checkbox" value="Y" id="chk1"><label for="chk1" class="check3"></label>
                </div>
                <div class="tabContents" id="tab2">
                    <img src="https://static.willbes.net/public/images/promotion/2019/08/1385_03_tab2_c2.jpg" alt="12개월" usemap="#1385c" border="0" />
                    <map name="1385c" id="1385c">
                        <area shape="rect" coords="180,343,296,391" href="javascript:go_product('https://pass.willbes.net/package/show/cate/3035/pack/648001/prod-code/152392',2)" alt="1순환 수강신청" />
                        <area shape="rect" coords="339,342,458,390" href="javascript:go_product('https://pass.willbes.net/package/show/cate/3035/pack/648001/prod-code/153859',2)" alt="2순환 수강신청" />
                        <area shape="rect" coords="507,343,627,393" href="javascript:go_product('https://pass.willbes.net/package/show/cate/3035/pack/648001/prod-code/156534',2)" alt="3순환 수강신청" />
                        <area shape="rect" coords="732,455,878,490" href="#careful" alt="이용안내 확인하기" />
                    </map>
                    <input name="is_chk" type="checkbox" value="Y" id="chk2"><label for="chk2" class="check4"></label>
                </div>
            </div>             
        </div>

        <div class="evtCtnsBox wb_cts04" id="careful">            
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1385_04.jpg" alt="순환별 패캐지 이용안내"/>
           
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function(){
            $(".tabContents").hide();
            $(".tabContents:first").show();
            $(".tabContaier ul li a").click(function(){
            var activeTab = $(this).attr("href");
            $(".tabContaier ul li a").removeClass("active");
            $(this).addClass("active");
            $(".tabContents").hide();
            $(activeTab).fadeIn();
            return false;
            });
        });

        function go_product(url,num) {
            if(String(num) != ""){
                if (!$("input:checkbox[id='chk"+num+"']").is(":checked")) {
                    alert("이용안내를 동의하셔야 신청이 가능합니다.");
                    $("input:checkbox[id='chk"+num+"']").focus();
                    return;
                }
            }
            if(url != '') {
                var win = window.open(url, '_blank');
                win.focus();
            }
        }

    </script>
@stop