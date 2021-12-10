@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

		/************************************************************/
		
		.sky {position:fixed; top:120px; right:10px;z-index:10;}
		.sky a {display:block; margin-bottom:10px}	

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/08/1068_top_bg.jpg) no-repeat center top;}

		.wb_00_01 {background:#273238; padding-top:150px}
		.wb_00_01 iframe {width:945px; height:531px; margin:0 auto}

		.wb_00 {background:url(https://static.willbes.net/public/images/promotion/2021/08/1068_00_bg.jpg) no-repeat center top; position:relative}

		.wb_01{background:#fff;}    

		.wb_01s {background:url(https://static.willbes.net/public/images/promotion/2021/01/0119_add_bg.jpg) no-repeat center top;}

		.wb_02{background:#f4f4f4;}

		.wb_02_01 {background:#fb6250}
		
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
        .LAeventB03 td:nth-child(3) {color:#e85b4a;text-align:left}
        .LAeventB03 td:last-child {border:0}
        .LAeventB03 td p {font-size:12px}
		.LAeventB03 table a {padding:10px 15px; color:#fff; background:#e85b4a; font-size:14px; display:block; border-radius:20px 20px 0 20px}
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

		/*유의사항*/
		.evtInfo {padding:80px 0; background:#e9e9e9; color:#555; font-size:14px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.5}
		.evtInfoBox h4 {font-size:35px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:20px}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type:none; margin-left:20px; margin-bottom:5px}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">	
		<div class="sky" id="QuickMenu">
			@if(time() < strtotime('202112150000'))
			<a href="#transfer">
				<img src="https://static.willbes.net/public/images/promotion/2021/11/1068_sky1.png"/>				
			</a>	
			@endif
			<a href="#to_go">
				<img src="https://static.willbes.net/public/images/promotion/2021/08/1068_sky2.png" usemap="#map1068_sky" border="0" />
				<map name="map1068_sky" id="map1068_sky">
					<area shape="rect" coords="11,121,132,195" href="#" class="r_btn_tab" data-tab-id="1"/>
					<area shape="rect" coords="11,209,131,264" href="#" class="r_btn_tab" data-tab-id="2"/>
					<area shape="rect" coords="11,279,131,332" href="#" class="r_btn_tab" data-tab-id="3"/>
					<area shape="rect" coords="12,344,132,400" href="#" class="r_btn_tab" data-tab-id="4"/>
					<area shape="rect" coords="12,409,131,472" href="#" class="r_btn_tab" data-tab-id="5"/>
				</map>
			</a>			  
        </div>
		
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/1068_top.jpg" alt=" 윌비스 농업직 절대지존 장사원교수 ">
        </div>

		<div class="evtCtnsBox wb_00_01">
			<iframe src="https://www.youtube.com/embed/chEceiSyKOg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <img src="https://static.willbes.net/public/images/promotion/2021/08/1068_01_01.jpg" alt="2명 중 1명은 장사원 수강생">
        </div>
		
        <div class="evtCtnsBox wb_00">
			<img src="https://static.willbes.net/public/images/promotion/2021/08/1068_00.jpg" alt="">
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
            <img src="https://static.willbes.net/public/images/promotion/2021/08/1068_01.jpg" alt="커리큘럼">
        </div>

		{{--
		<div class="evtCtnsBox wb_01s">
			<div class="wrap">
				<img src="https://static.willbes.net/public/images/promotion/2021/01/0119_add.jpg" alt="지금 바로 고민 타파하러 가기">
				<a href="https://pass.willbes.net/promotion/index/cate/3022/code/2028" target="_blank" title="" style="position: absolute; left: 32.05%; top: 77.5%; width: 36.43%; height: 7.03%; z-index: 2;"></a>
			</div>
        </div>	
		--}}

		@if(time() < strtotime('202112150000'))
		<div class="evtCtnsBox wb_02_01" id="transfer">
			<div class="wrap">
				<img src="https://static.willbes.net/public/images/promotion/2021/11/1068_02_01.jpg" alt="재도전.환승 이벤트">
				<a href="javascript:certOpen();" title="인증하기" style="position: absolute;left: 29.85%;top: 77.75%;width: 39.43%;height: 6.53%;z-index: 2;"></a>
				<a href="#notice" title="유의사항" style="position: absolute;left: 42.05%;top: 85.35%;width: 15.43%;height: 4.03%;z-index: 2;"></a>
			</div>
        </div>
		@endif

		<div class="evtCtnsBox wb_02" id="to_go">
			<div class="wrap">
				<img src="https://static.willbes.net/public/images/promotion/2021/10/1068_02_02.jpg" alt=""/>
				<a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/185386" target="_blank" title="" style="position: absolute;left: 5.27%;top: 49.38%;width: 17.5%;height: 2.85%;z-index: 2;"></a>
				<a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/185387" target="_blank" title="" style="position: absolute;left: 29.27%;top: 49.38%;width: 17.5%;height: 2.85%;z-index: 2;"></a>				
				<a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/185390" target="_blank" title="" style="position: absolute;left: 52.57%;top: 49.38%;width: 17.5%;height: 2.85%;z-index: 2;"></a>
				<a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/185391" target="_blank" title="" style="position: absolute;left: 76.47%;top: 49.38%;width: 17.5%;height: 2.85%;z-index: 2;"></a>
				<a href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/186520" target="_blank" title="" style="position: absolute;left: 5.27%;top: 87.08%;width: 17.5%;height: 2.85%;z-index: 2;"></a>
				<a href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/186521" target="_blank" title="" style="position: absolute;left: 29.27%;top: 87.08%;width: 17.5%;height: 2.85%;z-index: 2;"></a>				
				<a href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/186530" target="_blank" title="" style="position: absolute;left: 52.57%;top: 87.08%;width: 17.5%;height: 2.85%;z-index: 2;"></a>
				<a href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/186529" target="_blank" title="" style="position: absolute;left: 76.47%;top: 87.08%;width: 17.5%;height: 2.85%;z-index: 2;"></a>
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
						<td>2022 장사원 재배학 기본+심화이론</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/185329" target="_blank">수강신청</a></td>
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
						<td>2022 장사원 식용작물 기본+심화이론</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/185330" target="_blank">수강신청</a></td>
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
						<td>2022 장사원 재배학 기본+심화이론</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/185329" target="_blank">수강신청</a></td>
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
						<td>2022 장사원 식용작물 기본+심화이론</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/185330" target="_blank">수강신청</a></td>
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
						<td>2022 장사원 토양학 이론강의</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/185331" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>토양학</td>
						<td>문제풀이</td>
						<td>2022 장사원 토양학 기출문제풀이</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/186616" target="_blank">수강신청</a></td>
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
						<td>2022 장사원 재배학 기본+심화이론</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/185329" target="_blank">수강신청</a></td>
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
						<td>2022 장사원 작물생리학 이론강의</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/185388" target="_blank">수강신청</a></td>
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
						<td>2022 장사원 농촌지도론 이론강의</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/185389" target="_blank">수강신청</a></td>
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
						<td>2022 장사원 토양학 이론강의</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/185331" target="_blank">수강신청</a></td>
					</tr>
					<tr>
						<td>토양학</td>
						<td>문제풀이</td>
						<td>2022 장사원 토양학 기출문제풀이</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/186616" target="_blank">수강신청</a></td>
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

		<div class="evtCtnsBox evtInfo" id="notice">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">유의사항</h4>
				<div class="infoTit"><strong>재도전&환승 인증 이벤트 유의사항</strong></div>
				<ul>
					<li>· 본 이벤트는 1아이디당 1회만 참여 가능합니다.</li>
					<li>· 인증 완료 처리는 신청 후, 24시간 이내에 처리됩니다. 단, 주말 및 공휴일 인증 건의 경우 평일 오전 중으로 처리됩니다.</li>               
				</ul>  
				<div class="infoTit"><strong>1) 재도전 인증</strong></div>
				<ul>
					<li>
						- 본인의 이름이 명시된 수험표 또는 윌비스 PASS 수강생의 경우 [내강의실] 페이지 내 이름과 PASS명이 명시된 이미지 캡쳐 후 업로드 시 인증 가능합니다.<br>
						(결제내역을 통한 인증 시, 수강자 이름과 결제 금액, 강좌명이 필수로 기재되어 있어야 합니다.)
					</li>                                    
				</ul>
				<div class="infoTit"><strong>2) 환승 인증</strong></div>
				<ul>					
					<li>- 본인의 이름, 수강내역, 결제내역 등이 명확하게 기재된 수강증 등의 캡쳐를 통해서만 인증이 가능합니다.</li>
					<li>- 본 이벤트는 이벤트 참여자가 본인의 명의로 구매/응시한 내용에 한합니다.</li>
					<li>- 등록 인증 정보는 이벤트 목적 외 용도로 사용되지 않습니다.</li>
					<li>- 발급된 쿠폰의 사용 기간은 3일입니다.</strong></li>
					<li>- 지급된 쿠폰은 현재 페이지에서 판매중인 [2022 농업직 기본·심화 이론 패키지], [2022 7급 농업직 이론 패키지], [2022 농촌지도사 이론 패키지 (경기·인천 外)], [2022 농촌지도사 이론 패키지 (경기·인천)] 명시된 총 4개의 상품 구매 시에만 적용 가능합니다.</strong></li>                     
				</ul>			
			</div>
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

		/* 팝업창 */ 
        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }	

    </script>

	{{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')   

@stop



