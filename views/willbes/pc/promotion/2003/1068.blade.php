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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

		.wb_event{background:#004036 url(https://static.willbes.net/public/images/promotion/2019/12/1068_event_bg.jpg) no-repeat center top; position:relative;}

        .wb_top {background:#e1e1e1 url(https://static.willbes.net/public/images/promotion/2019/12/1068_top_bg.jpg) no-repeat center top; position:relative;}

		.wb_00 {background:#fff url(https://static.willbes.net/public/images/promotion/2020/01/1068_01_bg.jpg) no-repeat center top; position:relative;}


		.wb_01{background:#fff;}

		/*탭(텍스트)*/
		.tabContaier2{width:1000px;margin:0 auto;}
		.tab_area{margin-top:100px;}
        .tabContaier2 li{display: inline;float: left;width:50%;text-align: center;}
        .tabContaier2:after {content:""; display:block; clear:both}
        .tabContaier2 li a{display:block;height: 70px;line-height: 70px;color:#757474;background:#dfdfdf;font-size: 16px;border: 1px solid #8d8d8d;margin-right: 2px;font-size:25px;font-weight:bold;}
        .tabContaier2 li a:hover,
        .tabContaier2 li a.active {color: #fff;background: #2f6c64;border: 3px solid #2f6c64;}

        .wb_cts04 {background:#f4f4f4;position:relative;padding-bottom:150px;}

        .check { position:absolute; bottom:7%; left:50%; margin-left:-490px; width:980px; padding:20px 0px 20px 10px; letter-spacing:3;z-index:5;font-weight:bold;}
        .check label {cursor:pointer; font-size:14px}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#252525; margin-left:50px; border-radius:20px}
        .check a:hover {background:#ffc600; color:#252525}
        
        input[id="cb1"]:checked + label {background-color: red;}

        .wb_tip{background:#fff;padding-bottom:50px;}
		  /*타이머*/
		.time {width:100%; text-align:center; background:#000}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {/*font-size:40px*/}
        .time table td img {width:70%}
        .time .time_txt {font-size:28px; color:#fff; letter-spacing: -1px; font-weight:600}
        .time .time_txt a {font-size:14px; display:block; margin-top:10px; border:1px solid #fff; padding:5px; border-radius:15px}
        .time .time_txt a:hover {background:#fff; color:#000}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time p {text-alig:center}

		.wb_03{background:#27262c;}

		.skybannerB{position: fixed; bottom:0; text-align:center; z-index: 101;width:100%}

	
     
        .wb_cts02 {background:#4c52b4;}
        .wb_cts03 {background:#fff}
        .wb_cts04 {background:#f4f4f4;}
        .wb_cts04 ul {width:100%; margin:0 auto;}]
		
		
		.content_guide_wrap{background:#fff; width:1210px; margin:0 auto; padding:50px 0;}
        .content_guide_wrap .guide_tit{width:1210px;margin:0 auto;text-align:center; }
        .content_guide_wrap .tabs {width:960px; margin:0 auto;}
        .content_guide_wrap .tabs li {display:inline; float:left; width:192px}
        .content_guide_wrap .tabs li a {display:block; text-align:center; height:60px; line-height:60px; font-size:140% !important; border:2px solid #f3f3f3; border-bottom:2px solid #202020; background:#f3f3f3}
        .content_guide_wrap .tabs li a:hover,
        .content_guide_wrap .tabs li a.active {border:2px solid #202020; border-bottom:2px solid #fff; color:#202020; background:#fff; font-weight:600}
        .content_guide_wrap .tabs:after {content:""; display:block; clear:both}
        .content_guide_box{width:960px; margin:0 auto; border:0px solid #202020; border-top:0; padding-top:30px; padding-bottom:30px}
        .content_guide_box table{text-align:center; margin:0 50px; word-break:keep-all; padding:30px}
		
		.LAeventB03 table {background:#fff; width:960px; margin:0 auto; background:#fff} 
		.LAeventB03 p {font-size:1.5em;  color: #000; padding-bottom:20px; padding-top:20px;}
        .LAeventB03 tr {border-bottom:1px solid #ccc}        
        .LAeventB03 tr.st01 {background:#ececec}
        .LAeventB03 tr:hover {background:#f9f9f9}
        .LAeventB03 th,
        .LAeventB03 td {padding:15px 20px; font-size:16px; font-weight:bold;}
        .LAeventB03 th {background:#5f5f5f; color:#fff}
        .LAeventB03 td:nth-child(1) {text-align:center}
        .LAeventB03 td:nth-child(2) {text-align:left}
        .LAeventB03 td:nth-child(3) {color:#2f6c64;}
        .LAeventB03 td:last-child {border:0}
        .LAeventB03 td p {font-size:12px}
		.LAeventB03 table a {padding:10px 15px; color:#fff; background:#2f6c64; font-size:14px; display:block; border-radius:20px 20px 0 20px}
        .LAeventB03 table a.btn2 {color:#666; background:#fff; border:1px solid #666; cursor:default}
        .LAeventB03 table a:hover {background:#252525; color:#fff;}
        .LAeventB03 table a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}
		
		.skybanner {position:fixed;top:200px;right:50px;width:122px;z-index:1000;}

		.wb_02{background:#f4f4f4;}

        .slide_con {position:absolute;left:50%;bottom:175px;width:920px;margin-left:-460px;}
        .slide_con p {position:absolute; top:45%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-24px}
        .slide_con p.rightBtn {right:-24px}
        #slidesImg3 li {display:inline; float:left}
        #slidesImg3 li img {width:100%}
        #slidesImg3:after {content::""; display:block; clear:both}
	
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">	
	
		<div class="skybanner">
            {{--<a href="https://pass.willbes.net/pass/event/show/ongoing?event_idx=391" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/08/1068_skybanner.png" alt=""/></a>--}}
			<a href="#to_go">
				<img src="https://static.willbes.net/public/images/promotion/2020/01/1068_skybanner.png" title="첨삭지도반" title="환승이벤트"  usemap="#EV181030_c8" border="0" />
				<map name="EV181030_c8" id="EV181030_c8">
				<area shape="rect" coords="18,146,106,184" href="#" class="r_btn_tab" data-tab-id="1"/>
				<area shape="rect" coords="14,198,108,253" href="#" class="r_btn_tab" data-tab-id="2"/>
				<area shape="rect" coords="8,269,114,324" href="#" class="r_btn_tab" data-tab-id="3"/>
				<area shape="rect" coords="6,335,114,391" href="#" class="r_btn_tab" data-tab-id="4"/>
				<area shape="rect" coords="12,397,107,459" href="#" class="r_btn_tab" data-tab-id="5"/>
				</map>
			</a>	
        </div>
	
		{{--
		<div class="skybannerB">
            <a href="#evt1">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1068_scroll_btn.png"/>      
            </a>    
        </div>
		--}}    
		{{--
        <div class="evtCtnsBox wb_event">
			<img src="https://static.willbes.net/public/images/promotion/2019/12/1068_top01.gif">
			<img src="https://static.willbes.net/public/images/promotion/2019/12/1068_top02.jpg" usemap="#Map" border="0">
			<map name="Map" id="Map">
				<area shape="rect" coords="175,40,545,194" href="#tabs1" onfocus="this.blur();" onclick="tpassTabClick(this);" class=""/>
				<area shape="rect" coords="586,42,955,199" href="#tabs2" onfocus="this.blur();" onclick="tpassTabClick(this);" class=""/>
			</map>	 
        </div>
		--}}
		
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1068_top.jpg" alt=" 윌비스 농업직 절대지존 장사원교수 ">
        </div>
        <!--WB_top//-->
		
        <div class="evtCtnsBox wb_00">
			<img src="https://static.willbes.net/public/images/promotion/2020/01/1068_01.jpg" alt="">
			<div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_01_Roll1.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_01_Roll2.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_01_Roll3.jpg" alt="" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_01_Roll4.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_arrow_1.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_arrow_2.png"></a></p>
            </div>           
        </div>
		
		{{--
		<div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1068_01.png" alt=""/>
			<div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_01_Roll1.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_01_Roll2.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_01_Roll3.jpg" alt="" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_01_Roll4.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_arrow_1.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_arrow_2.png"></a></p>
            </div>           
        </div>
		--}}

		<div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1068_01.jpg" alt="커리큘럼">
        </div>		

		<div class="evtCtnsBox wb_02" id="to_go">
			<img src="https://static.willbes.net/public/images/promotion/2019/12/1068_02.jpg" alt="수강신청" usemap="#Map1068abc" border="0" />
			<map name="Map1068abc" id="Map1068abc">
				<area shape="rect" coords="51,910,250,950" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/156691" target="_blank" />
				<area shape="rect" coords="317,912,513,947" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/156692" target="_blank" />
				<area shape="rect" coords="587,911,784,950" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/156702" target="_blank" />
				<area shape="rect" coords="854,913,1051,946" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/156703" target="_blank" />
			</map>
        </div>

		{{--	
		<div class="evtCtnsBox wb_cts04"> 		
			<div class="tabContaier2">    
				<ul>    
					<li><a href="#tabs1" id="tabs1_btn" class="active">장사원 농업직 T-PASS </a></li>
					<li><a href="#tabs2" id="tabs2_btn">장사원 농촌지도사 T-PASS </a></li>
				</ul>
			</div> 	
			<div class="tab_area">
				<div id="tabs1" class="tabContents2">
					<img src="https://static.willbes.net/public/images/promotion/2019/12/1068_02_tab1.jpg" usemap="#Map1071aa" border="0" id="evt1"/>
					<map name="Map1071aa" id="Map1071aa">
						<area shape="rect" coords="382,622,530,722" href="javascript:go_PassLecture('159289');" >
						<area shape="rect" coords="785,624,931,722" href="javascript:go_PassLecture('159291');" >
					</map>            
				</div>
				<div id="tabs2" class="tabContents2">       
					<img src="https://static.willbes.net/public/images/promotion/2019/12/1068_02_tab2.jpg" usemap="#Map1071bb"  title="" border="0" id="evt2"/>
					<map name="Map1071bb" id="Map1071bb">
						<area shape="rect" coords="384,620,534,721" href="javascript:go_PassLecture('159293');" >
						<area shape="rect" coords="784,620,935,726" href="javascript:go_PassLecture('159297');" >
					</map>                
				</div>   
			</div>		
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y" id="cb1">
                    페이지 하단 장사원 T-PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful">이용안내확인하기 ↓</a>
            </div>   
        </div>  
		--}}
			
        </div>
	
		{{--
		<div class="evtCtnsBox wb_03" id="careful">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1068_03.jpg" alt="유의사항">
        </div>
		--}}
	
       

        <!--wb_cts01//-->
		
		{{--
        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1068_02.jpg" alt="윌비스 농업직 4관왕! 농업 전공자가 직접 출제한다 " />
        </div>
  
		--}}

		{{--		
        <div class="evtCtnsBox wb_cts03" >
            <ul>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_03.jpg" alt="윌비스 농업직렬 4관왕의 노하우가 집약된 2019 대비 윌비스 학원 강좌"  /></li>
                <li><iframe width="886" height="497" src="https://www.youtube.com/embed/eWPUNzh9zu8?rel=0" frameborder="0" allowfullscreen></iframe></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_03_01.jpg" alt=" "  /></li>
            </ul>
        </div>
		--}}

		{{--      
        <div class="evtCtnsBox wb_cts04" id="event">
			<img src="https://static.willbes.net/public/images/promotion/2019/09/1068_04.jpg" alt="윌비스 2019 농업직/농촌지도사 이론패키지" usemap="#Map1068A" border="0"  />
            <map name="Map1068A" id="Map1068A" >
                <area shape="rect" coords="52,1010,256,1058" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/156691" target="_blank" alt="기본심화이론패키지"  onfocus="this.blur();"/>
                <area shape="rect" coords="319,1012,522,1056" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/156692" target="_blank" alt="7급농업직이론패키지" onfocus="this.blur();"/>
                <area shape="rect" coords="587,1010,792,1057" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/156702" target="_blank" alt="농촌지도사이론패키지" onfocus="this.blur();" />
                <area shape="rect" coords="857,1011,1058,1055" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/156703" target="_blank" alt="농촌지도사" onfocus="this.blur();"/>
              	<area shape="rect" coords="912,1149,1037,1237" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/155776" target="_blank" alt="모의고사패키지" />
            </map>
        </div>
		--}}
       
		<div class="content_guide_wrap" id="tab">
            <p class="guide_tit"><img src="https://static.willbes.net/public/images/promotion/2020/01/1068_05.jpg"> </p>
            <ul class="tabs">
                <li><a href="#tab1" id="menu_tab1" data-tab-id="1">9급 농업직</a></li>
                <li><a href="#tab2" id="menu_tab2" data-tab-id="2">7급 농업직</a></li>
                <li><a href="#tab3" id="menu_tab3" data-tab-id="3">농촌지도사</a></li>
				<li><a href="#tab4" id="menu_tab4" data-tab-id="4">생물학</a></li>
				<li><a href="#tab5" id="menu_tab5" data-tab-id="5">유기농업기능사</a></li>
            </ul>
            <!--9급 농업직-->
            <div class="content_guide_box LAeventB03" id="tab1">
				<p>● 재배학</p>
                <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th>강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
					  <tr>
						<td>재배학</td>
						<td>이론</td>
						<td>2020 장사원 재배학 기본+심화이론</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156359">수강신청</a></td>
					  </tr>
					  <tr>
						<td>재배학</td>
						<td>문제풀이</td>
						<td>2020 장사원 재배학 기출문제풀이</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159040">수강신청</a></td>
					  </tr>
					  <tr>
						<td>재배학</td>
						<td>문제풀이</td>
						<td>2020 장사원 재배학 실전동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159041">수강신청</a></td>
					  </tr>
					  <tr>
						<td>재배학</td>
						<td>문제풀이</td>
						<td>2020 [지방직] 장사원 재배학 실전동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/164503">수강신청</a></td>
					  </tr>
					  <tr>
						<td>재배학</td>
						<td>유료특강</td>
						<td>2020 장사원 재배학 FINAL 마무리 특강</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/162676">수강신청</a></td>
					  </tr>
					  </table>

					  <p>● 식용작물</p>
					  <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th>강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
					  <tr>
					  <tr>
						<td>식용작물</td>
						<td>이론</td>
						<td>2020 장사원 식용작물 기본+심화이론</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156362">수강신청</a></td>
					  </tr>
					  <tr>
						<td>식용작물</td>
						<td>문제풀이</td>
						<td>2020 장사원 식용작물 기출문제풀이</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159042">수강신청</a></td>
					  </tr>
					  <tr>
						<td>식용작물</td>
						<td>문제풀이</td>
						<td>2020 장사원 식용작물 실전동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159043">수강신청</a></td>
					  </tr>
					  <tr>
						<td>식용작물</td>
						<td>문제풀이</td>
						<td>2020 [지방직] 장사원 식용작물 실전동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/164504">수강신청</a></td>
					  </tr>
					  <tr>
						<td>식용작물</td>
						<td>유료특강</td>
						<td>2020 장사원 식용작물 FINAL 마무리 특강</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/162645">수강신청</a></td>
					  </tr>
					</table>
            </div>
            <!--9급 농업직//-->

            <!--7급 농업직-->
            <div class="content_guide_box LAeventB03" id="tab2">
                <p>● 재배학</p>
					  <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th>강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>재배학</td>
					<td>이론</td>
					<td>2020 장사원 재배학 기본+심화이론</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156359">수강신청</a></td>
				  </tr>
				  <tr>
					<td>재배학</td>
					<td>문제풀이</td>
					<td>2020 장사원 재배학 기출문제풀이</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159040">수강신청</a></td>
				  </tr>
				  <tr>
					<td>재배학</td>
					<td>문제풀이</td>
					<td>2020 장사원 재배학 실전동형모의고사</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159041">수강신청</a></td>
				  </tr>
				  <tr>
					<td>재배학</td>
					<td>문제풀이</td>
					<td>2020 [지방직] 장사원 재배학 실전동형모의고사</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/164503">수강신청</a></td>
				  </tr>
				  <tr>
					<td>재배학</td>
					<td>유료특강</td>
					<td>2020 장사원 재배학 FINAL 마무리 특강</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/162676">수강신청</a></td>
				  </tr>
				  </table>
				  <p>● 식용작물</p>
					  <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th>강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>식용작물</td>
					<td>이론</td>
					<td>2020 장사원 식용작물 기본+심화이론</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156362">수강신청</a></td>
				  </tr>
				  <tr>
					<td>식용작물</td>
					<td>문제풀이</td>
					<td>2020 장사원 식용작물 기출문제풀이</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159042">수강신청</a></td>
				  </tr>
				  <tr>
					<td>식용작물</td>
					<td>문제풀이</td>
					<td>2020 장사원 식용작물 실전동형모의고사</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159043">수강신청</a></td>
				  </tr>
				  <tr>
					<td>식용작물</td>
					<td>문제풀이</td>
					<td>2020 [지방직] 장사원 식용작물 실전동형모의고사</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/164504">수강신청</a></td>
				  </tr>
				  <tr>
					<td>식용작물</td>
					<td>유료특강</td>
					<td>2020 장사원 식용작물 FINAL 마무리 특강</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/162645">수강신청</a></td>
				  </tr>
				  </table>
				  <p>● 생물학개론</p>
					  <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th>강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>생물학개론</td>
					<td>이론</td>
					<td>2020 장사원 생물학 이론</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159046">수강신청</a></td>
				  </tr>
				  <tr>
					<td>생물학개론</td>
					<td>문제풀이</td>
					<td>2020 장사원 컨셉 생물학 기출문제풀이 (4월)</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/162051">수강신청</a></td>
				  </tr>
				  </table>
				  <p>● 토양학</p>
					  <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th>강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>토양학</td>
					<td>이론</td>
					<td>2020 장사원 토양학 이론강의</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156365">수강신청</a></td>
				  </tr>
				  <tr>
					<td>토양학</td>
					<td>문제풀이</td>
					<td>2020 장사원 토양학 기출문제풀이</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/157564">수강신청</a></td>
				  </tr>
				</table>
            </div>
            <!--7급 농업직//-->

            <!--농촌지도사-->
            <div class="content_guide_box LAeventB03" id="tab3">
                <p>● 재배학</p>
					  <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th>강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>재배학</td>
					<td>이론</td>
					<td>2020 장사원 재배학 기본+심화이론</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156359">수강신청</a></td>
				  </tr>
				  <tr>
					<td>재배학</td>
					<td>문제풀이</td>
					<td>2020 장사원 재배학 기출문제풀이</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159040">수강신청</a></td>
				  </tr>
				  <tr>
					<td>재배학</td>
					<td>문제풀이</td>
					<td>2020 장사원 재배학 실전동형모의고사</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159041">수강신청</a></td>
				  </tr>
				  <tr>
					<td>재배학</td>
					<td>문제풀이</td>
					<td>2020 [지방직] 장사원 재배학 실전동형모의고사</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/164503">수강신청</a></td>
				  </tr>
				  <tr>
					<td>재배학</td>
					<td>유료특강</td>
					<td>2020 장사원 재배학 FINAL 마무리 특강</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/162676">수강신청</a></td>
				  </tr>
				  </table>
				  <p>● 작물생리학</p>
					  <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th>강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>작물생리학</td>
					<td>이론</td>
					<td>2020 장사원 작물생리학 이론강의</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156693">수강신청</a></td>
				  </tr>
				  <tr>
					<td>작물생리학</td>
					<td>문제풀이</td>
					<td>2020 장사원 작물생리학 기출문제풀이</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159044">수강신청</a></td>
				  </tr>
				  <tr>
					<td>작물생리학</td>
					<td>문제풀이</td>
					<td>2019 장사원 작물생리학 실전 동형모의고사</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/154998">수강신청</a></td>
				  </tr>
				  </table>
				  <p>● 생물학개론</p>
					  <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th>강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>생물학개론</td>
					<td>이론</td>
					<td>2020 장사원 생물학 이론</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159046">수강신청</a></td>
				  </tr>
				  <tr>
					<td>생물학개론</td>
					<td>문제풀이</td>
					<td>2020 장사원 컨셉 생물학 기출문제풀이 (4월)</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/162051">수강신청</a></td>
				  </tr>
				  </table>
				  <p>● 농촌지도론</p>
					  <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th>강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>농촌지도론</td>
					<td>이론</td>
					<td>2020 장사원 농촌지도론 이론강의</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156696">수강신청</a></td>
				  </tr>
				  <tr>
					<td>농촌지도론</td>
					<td>문제풀이</td>
					<td>2020 장사원 농촌지도론 기출문제풀이</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159045">수강신청</a></td>
				  </tr>
				  <tr>
					<td>농촌지도론</td>
					<td>문제풀이</td>
					<td>2019 장사원 농촌지도론 실전 동형모의고사</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/154999">수강신청</a></td>
				  </tr>
				  </table>
				  <p>● 토양학</p>
					  <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th>강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>토양학</td>
					<td>이론</td>
					<td>2020 장사원 토양학 이론강의</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156365">수강신청</a></td>
				  </tr>
				  <tr>
					<td>토양학</td>
					<td>문제풀이</td>
					<td>2020 장사원 토양학 기출문제풀이</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/157564">수강신청</a></td>
				  </tr>
				</table>
            </div>
            <!--농촌지도사//-->
			
			  <!--생물학개론-->
            <div class="content_guide_box LAeventB03" id="tab4">
               <p>● 생물학개론</p>
					  <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th width="433">강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>생물학개론</td>
					<td>이론</td>
					<td>2020 장사원 생물학 이론</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159046">수강신청</a></td>
				  </tr>
				  <tr>
					<td>생물학개론</td>
					<td>문제풀이</td>
					<td>2020 장사원 컨셉 생물학 기출문제풀이 (4월)</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/162051">수강신청</a></td>
				  </tr>
				</table>
            </div>
            <!--생물학개론//-->
			
			  <!--유기농업기능사-->
            <div class="content_guide_box LAeventB03" id="tab5">
                <p>● 유기농업기능사</p>
					  <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th width="433">강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>유기농업기능사</td>
					<td>이론</td>
					<td>2020 장사원 유기농업기능사(필기)</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/158455">수강신청</a></td>
				  </tr>
				</table>
            </div>
            <!--유기농업기능사//-->
        </div>
		<p>&nbsp;</p><p>&nbsp;</p>

		
    </div>
    <!-- End Container -->

	<script type="text/javascript">

		$(document).ready(function() {
				var slidesImg3 = $("#slidesImg3").bxSlider({
					mode:'horizontal',
					auto:true,
					speed:350,
					pause:4000,
					pager:true,
					controls:false,
					minSlides:1,
					maxSlides:1,
					slideWidth:2000,
					slideMargin:0,
					autoHover: true,
					moveSlides:1,
					pager:false,
				});

				$("#imgBannerLeft3").click(function (){
					slidesImg3.goToPrevSlide();
				});

				$("#imgBannerRight3").click(function (){
					slidesImg3.goToNextSlide();
				});
			});
      
        $(document).ready(function(){
            /*영상탭*/
            $(".tabContentsEvt").hide();
            $(".tabContentsEvt:first").show();
            $(".youtubeTab a").click(function(){
                var activeTab = $(this).attr("href");
                var html_str = "";
                if(activeTab == "#ytb01"){
                    html_str = "<iframe src='"+ytb01_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#ytb02"){
                    html_str = "<iframe src='"+ytb02_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#ytb03"){
                    html_str = "<iframe src='"+ytb03_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#ytb04"){
                    html_str = "<iframe src='"+ytb04_url+"' allowfullscreen></iframe>";
                }
                $(".youtubeTab a").removeClass("active");
                $(this).addClass("active");
                $(".tabContentsEvt").hide();
                $(".tabContentsEvt").html('');
                $(activeTab).html(html_str);
                $(activeTab).fadeIn();
                return false;
            });

			

            /*강의탭*/
            var $active, $links = $(this).find('.tabs li a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
            $links.not($active).each(function () {
                $(this.hash).hide()
            });

            $(".r_btn_tab").click(function () {
                var offset = $('.tabs').offset();
                $('html, body').animate({scrollTop : offset.top}, 400);

                var activeTab = $(this).data("tab-id");
                $(".tabs li a").removeClass("active");
                $('#menu_tab'+activeTab).addClass("active");
                $(".content_guide_box").hide();
                $('#tab'+activeTab).fadeIn();
                return false;
            });

            $(".tabs li a").click(function(){
                //var activeTab = $(this).attr("href");
				var activeTab = $(this).data("tab-id");
                $(".tabs li a").removeClass("active");

                $(this).addClass("active");
                //$(activeTab).fadeIn();
				$(".content_guide_box").hide();
                $('#tab'+activeTab).fadeIn();
                return false;
            });			
        });		

    </script>

{{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

    

@stop



