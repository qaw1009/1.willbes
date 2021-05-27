@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

		/************************************************************/
		.evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 5px 20px rgba(0,0,0,.5); border-radius:6px}
		
		.skybanner {position:fixed; top:100px; right:10px; z-index:10;}
		.skybanner a {display:block; margin-bottom:5px}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/09/1068_top_bg.jpg) no-repeat center top;}

		.wb_00 {background:url(https://static.willbes.net/public/images/promotion/2020/01/1068_01_bg.jpg) no-repeat center top; position:relative}

		.wb_01{background:#fff;}    
		
		.wb_01_01 {background:url(https://static.willbes.net/public/images/promotion/2021/03/1068_01_01_bg.jpg) no-repeat center top;}
		.wb_01_01 div {width:1120px; margin:0 auto; position:relative;}

		.wb_01s {background:url(https://static.willbes.net/public/images/promotion/2021/01/0119_add_bg.jpg) no-repeat center top;}

		.wb_02{background:#f4f4f4;}  
		
		.content_guide_wrap {background:#fff; width:1210px; margin:0 auto; padding:50px 0 100px;}
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
        .LAeventB03 td:nth-child(2) {text-align:center}
        .LAeventB03 td:nth-child(3) {color:#2f6c64;text-align:left}
        .LAeventB03 td:last-child {border:0}
        .LAeventB03 td p {font-size:12px}
		.LAeventB03 table a {padding:10px 15px; color:#fff; background:#2f6c64; font-size:14px; display:block; border-radius:20px 20px 0 20px}
        .LAeventB03 table a.btn2 {color:#666; background:#fff; border:1px solid #666; cursor:default}
        .LAeventB03 table a:hover {background:#252525; color:#fff;}
        .LAeventB03 table a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}			

        .slide_con {position:absolute;left:50%;bottom:175px;width:920px;margin-left:-460px;}
        .slide_con p {position:absolute; top:45%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-24px}
        .slide_con p.rightBtn {right:-24px}
        #slidesImg3 li {display:inline; float:left}
        #slidesImg3 li img {width:100%}
		#slidesImg3:after {content::""; display:block; clear:both}
		
		.check { position:absolute; bottom:7%; left:50%; margin-left:-490px; width:980px; padding:20px 0px 20px 10px; letter-spacing:3;z-index:5;font-weight:bold;}
        .check label {cursor:pointer; font-size:14px}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#252525; margin-left:50px; border-radius:20px}
        .check a:hover {background:#ffc600; color:#252525}
        
        input[id="cb1"]:checked + label {background-color: red;}
	
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">	
		<div class="skybanner">   
			<a href="https://pass.willbes.net/promotion/index/cate/3022/code/2028" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1068_sky02.png" alt="이론패키지" >
            </a> 
			<a href="https://pass.willbes.net/promotion/index/cate/3028/code/2029" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1068_sky03.png" alt="5과목 패키지" >
            </a>   
			<a href="#to_go"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1068_sky04.png" alt="실전동형모고 패키지" >
            </a> 
			<a href="#to_go">
				<img src="https://static.willbes.net/public/images/promotion/2021/03/1068_sky01.png" usemap="#map1068_sky" border="0" />
				<map name="map1068_sky" id="map1068_sky">
					<area shape="rect" coords="18,146,106,184" href="#" class="r_btn_tab" data-tab-id="1"/>
					<area shape="rect" coords="14,198,108,253" href="#" class="r_btn_tab" data-tab-id="2"/>
					<area shape="rect" coords="8,269,114,324" href="#" class="r_btn_tab" data-tab-id="3"/>
					<area shape="rect" coords="6,335,114,391" href="#" class="r_btn_tab" data-tab-id="4"/>
					<area shape="rect" coords="12,397,107,459" href="#" class="r_btn_tab" data-tab-id="5"/>
				</map>
			</a>			  
        </div>
		
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1068_top.jpg" alt=" 윌비스 농업직 절대지존 장사원교수 ">
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

		<div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1068_01.jpg" alt="커리큘럼">
        </div>

		<div class="evtCtnsBox wb_01_01">	
			<div class="wrap">	
				<img src="https://static.willbes.net/public/images/promotion/2021/03/1068_01_01.jpg" alt="농업직 패키지">
				<a href="https://pass.willbes.net/promotion/index/cate/3028/code/2029" title="바로가기" target="_blank" style="position: absolute; left: 31.43%; top: 81.34%; width: 36.43%; height: 6.96%; z-index: 2;"></a>
			</div>
        </div>		

		<div class="evtCtnsBox wb_01s">
			<div class="wrap">
				<img src="https://static.willbes.net/public/images/promotion/2021/01/0119_add.jpg" alt="지금 바로 고민 타파하러 가기">
				<a href="https://pass.willbes.net/promotion/index/cate/3022/code/2028" target="_blank" title="" style="position: absolute; left: 32.05%; top: 77.5%; width: 36.43%; height: 7.03%; z-index: 2;"></a>
			</div>
        </div>	

		<div class="evtCtnsBox wb_02" id="to_go">
			<div class="wrap">
				<img src="https://static.willbes.net/public/images/promotion/2021/05/1068_02.jpg" alt="수강신청"/>
				<a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/182740" target="_blank" title="" style="position: absolute; left: 76.88%; top: 24.94%; width: 13.3%; height: 4.28%; z-index: 2;"></a>
				<a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/171517" target="_blank" title="" style="position: absolute; left: 76.88%; top: 35.22%; width: 13.3%; height: 4.28%; z-index: 2;"></a>
				<a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/171522" target="_blank" title="" style="position: absolute; left: 76.88%; top: 45.56%; width: 13.3%; height: 4.28%; z-index: 2;"></a>
				<a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/171775" target="_blank" title="" style="position: absolute; left: 4.11%; top: 83.84%; width: 18.57%; height: 2.97%; z-index: 2;"></a>
				<a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/171777" target="_blank" title="" style="position: absolute; left: 27.86%; top: 83.84%; width: 18.57%; height: 2.97%; z-index: 2;"></a>
				<a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/180881" target="_blank" title="" style="position: absolute; left: 51.96%; top: 83.84%; width: 18.57%; height: 2.97%; z-index: 2;"></a>
				<a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/179668" target="_blank" title="" style="position: absolute; left: 75.63%; top: 83.84%; width: 18.57%; height: 2.97%; z-index: 2;"></a>
			</div>
		</div>
		       
		<div class="content_guide_wrap NSK" id="tab">
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
						<td>2021 장사원 재배학 기본+심화이론</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/171040" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>재배학</td>
						<td>문제풀이</td>
						<td>2021 장사원 재배학 기출문제풀이</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/177260" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>재배학</td>
						<td>문제풀이</td>
						<td>2021 장사원 재배학 실전동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/179643" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>재배학</td>
						<td>문제풀이</td>
						<td>2021 [지방직] 장사원 재배학 실전동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180351" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>재배학</td>
						<td>유료특강</td>
						<td>2021 장사원 재배학 FINAL 마무리 특강</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180349" target="_blank">수강신청</a></td>
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
						<td>2021 장사원 식용작물 기본+심화이론</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/171041" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>식용작물</td>
						<td>문제풀이</td>
						<td>2021 장사원 식용작물 기출문제풀이</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/177261" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>식용작물</td>
						<td>문제풀이</td>
						<td>2021 장사원 식용작물 실전동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/179644" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>식용작물</td>
						<td>문제풀이</td>
						<td>2021 [지방직] 장사원 식용작물 실전동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180352" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>식용작물</td>
						<td>유료특강</td>
						<td>2021 장사원 식용작물 FINAL 마무리 특강</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180350" target="_blank">수강신청</a></td>
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
						<td>2021 장사원 재배학 기본+심화이론</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/171040" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>재배학</td>
						<td>문제풀이</td>
						<td>2021 장사원 재배학 기출문제풀이</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/177260" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>재배학</td>
						<td>문제풀이</td>
						<td>2021 장사원 재배학 실전동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/179643" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>재배학</td>
						<td>문제풀이</td>
						<td>2021 [지방직] 장사원 재배학 실전동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180351" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>재배학</td>
						<td>유료특강</td>
						<td>2021 장사원 재배학 FINAL 마무리 특강</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180349" target="_blank">수강신청</a></td>
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
						<td>2021 장사원 식용작물 기본+심화이론</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/171041" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>식용작물</td>
						<td>문제풀이</td>
						<td>2021 장사원 식용작물 기출문제풀이</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/177261" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>식용작물</td>
						<td>문제풀이</td>
						<td>2021 장사원 식용작물 실전동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/179644" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>식용작물</td>
						<td>문제풀이</td>
						<td>2021 [지방직] 장사원 식용작물 실전동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180352" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>식용작물</td>
						<td>유료특강</td>
						<td>2021 장사원 식용작물 FINAL 마무리 특강</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180350" target="_blank">수강신청</a></td>
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
						<td>2021 장사원 생물학 이론</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/177262" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>생물학개론</td>
						<td>문제풀이</td>
						<td>2021 장사원 컨셉 생물학 기출</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180354" target="_blank">수강신청</a></td>
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
						<td>2021 장사원 토양학 이론강의</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/171042" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>토양학</td>
						<td>문제풀이</td>
						<td>2021 장사원 토양학 기출문제풀이</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/174434" target="_blank">수강신청</a></td>
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
						<td>2021 장사원 재배학 기본+심화이론</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/171040" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>재배학</td>
						<td>문제풀이</td>
						<td>2021 장사원 재배학 기출문제풀이</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/177260" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>재배학</td>
						<td>문제풀이</td>
						<td>2021 장사원 재배학 실전동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/179643" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>재배학</td>
						<td>문제풀이</td>
						<td>2021 [지방직] 장사원 재배학 실전동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180351" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>재배학</td>
						<td>유료특강</td>
						<td>2021 장사원 재배학 FINAL 마무리 특강</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180349" target="_blank">수강신청</a></td>
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
						<td>2021 장사원 작물생리학 이론강의</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/171771" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>작물생리학</td>
						<td>문제풀이</td>
						<td>2021 장사원 작물생리학 기출문제풀이</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/178552" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>작물생리학</td>
						<td>문제풀이</td>
						<td>2021 장사원 작물생리학 실전동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/182723" target="_blank">수강신청</a></td>
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
						<td>2021 장사원 생물학 이론</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/177262" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>생물학개론</td>
						<td>문제풀이</td>
						<td>2021 장사원 컨셉 생물학 기출</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180354" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>생물학개론</td>
						<td>문제풀이</td>
						<td>2021 장사원 생물학 실전동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/182722" target="_blank">수강신청</a></td>
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
						<td>2021 장사원 농촌지도론 이론강의</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/171773" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>농촌지도론</td>
						<td>문제풀이</td>
						<td>2021 장사원 농촌지도론 기출문제풀이</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/178553" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>농촌지도론</td>
						<td>문제풀이</td>
						<td>2021 장사원 농촌지도론 실전동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/182724" target="_blank">수강신청</a></td>
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
						<td>2021 장사원 토양학 이론강의</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/171042" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>토양학</td>
						<td>문제풀이</td>
						<td>2021 장사원 토양학 기출문제풀이</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/174434" target="_blank">수강신청</a></td>
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
						<td>2021 장사원 생물학 이론</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/177262" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>생물학개론</td>
						<td>문제풀이</td>
						<td>2021 장사원 컨셉 생물학 기출</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/180354" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>생물학개론</td>
						<td>문제풀이</td>
						<td>2021 장사원 생물학 실전동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/182722" target="_blank">수강신청</a></td>
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
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/158455" target="_blank">수강신청</a></td>
					</tr>
				</table>
            </div>
            <!--유기농업기능사//-->
        </div>
		
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



