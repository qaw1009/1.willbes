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

        .wb_top {background:#ae9889 url(https://static.willbes.net/public/images/promotion/2019/07/1068_top_bg.jpg) no-repeat center top; position:relative;}


        .wb_cts01 {background:#fff url(https://static.willbes.net/public/images/promotion/2019/07/1068_01_bg.jpg) center bottom no-repeat;}
        .bannerImg3 {position:relative; width:920px; margin:0 auto; padding:10px 0px 124px 0px; }
        .bannerImg3 p {position:absolute; top:35%; width:30px; z-index:1000;}
        .bannerImg3 img {width:100%}
        .bannerImg3 p a {cursor:pointer}
        .bannerImg3 p.leftBtn3 {left:2%}
        .bannerImg3 p.rightBtn3 {right:2%}
        .wb_cts01 ul:after {content:""; display:block; clear:both}

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
        .LAeventB03 td {padding:15px 20px; font-size:16px; font-weight:500;}
        .LAeventB03 th {background:#5f5f5f; color:#fff}
        .LAeventB03 td:nth-child(1) {text-align:center}
        .LAeventB03 td:nth-child(2) {text-align:left}
        .LAeventB03 td:nth-child(3) {color:#5117c9}
        .LAeventB03 td:last-child {border:0}
        .LAeventB03 td p {font-size:12px}
		.LAeventB03 table a {padding:10px 15px; color:#ffd84f; background:#5117c9; font-size:14px; display:block; border-radius:20px 20px 0 20px}
        .LAeventB03 table a.btn2 {color:#666; background:#fff; border:1px solid #666; cursor:default}
        .LAeventB03 table a:hover {background:#252525; color:#fff;}
        .LAeventB03 table a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}
		
		.skybanner {
            position:fixed;
            top:100px;
            right:0;			
            width:122px;
			z-index:1000;
        }
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">	
		<div class="skybanner">
            <a href="https://pass.willbes.net/pass/event/show/ongoing?event_idx=391" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/08/1068_skybanner.png" alt=""/></a>
			<img src="https://static.willbes.net/public/images/promotion/2019/07/1068_skybanner.png" title="첨삭지도반" title="환승이벤트"  usemap="#EV181030_c8" border="0" />
			<map name="EV181030_c8" id="EV181030_c8">
			  <area shape="rect" coords="18,146,106,184" href="#" class="r_btn_tab" data-tab-id="1"/>
			  <area shape="rect" coords="14,198,108,253" href="#" class="r_btn_tab" data-tab-id="2"/>
			  <area shape="rect" coords="8,269,114,324" href="#" class="r_btn_tab" data-tab-id="3"/>
			  <area shape="rect" coords="6,335,114,391" href="#" class="r_btn_tab" data-tab-id="4"/>
			  <area shape="rect" coords="12,397,107,459" href="#" class="r_btn_tab" data-tab-id="5"/>
			</map>
        </div>
		
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1068_top.png" alt=" 윌비스 농업직 절대지존 장사원교수 " usemap="#Map20181030_c1" border="0"  />
            <map name="Map20181030_c1" >
                <area shape="rect" coords="677,909,838,1016" href="#event" onfocus="this.blur();"/>
            </map>
        </div>
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1068_01.png" alt=""/>
            <div class="bannerImg3">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_01_Roll1.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_01_Roll2.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_01_Roll3.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_01_Roll4.jpg" alt=""/></li>
                </ul>
                <p class="leftBtn3"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_arrow_1.png"></a></p>
                <p class="rightBtn3"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_arrow_2.png"></a></p>
            </div>
        </div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1068_02.jpg" alt="윌비스 농업직 4관왕! 농업 전공자가 직접 출제한다 " />
        </div>
        <!--wb_cts02//-->


        <div class="evtCtnsBox wb_cts03" >
            <ul>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_03.jpg" alt="윌비스 농업직렬 4관왕의 노하우가 집약된 2019 대비 윌비스 학원 강좌"  /></li>
                <li><iframe width="886" height="497" src="https://www.youtube.com/embed/eWPUNzh9zu8?rel=0" frameborder="0" allowfullscreen></iframe></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_03_01.jpg" alt=" "  /></li>
            </ul>
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04" id="event">
			<img src="https://static.willbes.net/public/images/promotion/2019/07/1068_04.jpg" alt="윌비스 2019 농업직/농촌지도사 이론패키지" usemap="#Map1068A" border="0"  />
            <map name="Map1068A" id="Map1068A" >
                <area shape="rect" coords="53,1152,257,1200" href="{{ site_url('/package/show/cate/3028/pack/648001/prod-code/150615') }}"  onfocus="this.blur();" target="_blank"/>
                <area shape="rect" coords="317,1155,520,1199" href="{{ site_url('/package/show/cate/3028/pack/648001/prod-code/150634') }}" onfocus="this.blur();" target="_blank"/>
                <area shape="rect" coords="588,1153,793,1200" href="{{ site_url('/package/show/cate/3028/pack/648001/prod-code/150633') }}" onfocus="this.blur();" target="_blank" />
                <area shape="rect" coords="856,1155,1057,1199" href="{{ site_url('/package/show/cate/3028/pack/648001/prod-code/150635') }}" onfocus="this.blur();" target="_blank"/>
              <area shape="rect" coords="912,461,1037,549" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/155776" target="_blank" alt="모의고사패키지" />
            </map>
        </div>
        <!--wb_cts04//-->
		<div class="content_guide_wrap" id="tab">
            <p class="guide_tit"><img src="https://static.willbes.net/public/images/promotion/2019/07/1068_05.jpg" alt="2019 농업직렬 단과 수강신청"> </p>
            <ul class="tabs">
                <li><a href="#tab1" id="menu_tab1">9급 농업직</a></li>
                <li><a href="#tab2" id="menu_tab2">7급 농업직</a></li>
                <li><a href="#tab3" id="menu_tab3">농촌지도사</a></li>
				<li><a href="#tab4" id="menu_tab4">생물학개론</a></li>
				<li><a href="#tab5" id="menu_tab5">유기농업기능사</a></li>
            </ul>
            <!--9급 농업직-->
            <div class="content_guide_box  LAeventB03" id="tab1">
				<p>● 재배학</p>
                <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th width="433">강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
					  <tr>
						<td>재배학</td>
						<td>이론</td>
						<td>2019 장사원 재배학 기본+심화이론</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146366">수강신청</a></td>
					  </tr>
					  <tr>
						<td>재배학</td>
						<td>문제풀이</td>
						<td>2019 장사원 재배학 기출문제풀이</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146812">수강신청</a></td>
					  </tr>
					  <tr>
						<td>재배학</td>
						<td>문제풀이</td>
						<td>2019 장사원 재배학 실전 동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/147057">수강신청</a></td>
					  </tr>
					  <tr>
						<td>재배학</td>
						<td>문제풀이</td>
						<td>2019 (지방직) 장사원 재배학 실전 동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152464">수강신청</a></td>
					  </tr>
					  <tr>
						<td>재배학</td>
						<td>유료특강</td>
						<td>2019 장사원 컨셉 재배학 파이널정리특강</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152218">수강신청</a></td>
					  </tr>
					  </table>
					  <p  style = " font-size:1.5em;  color: #000; padding-bottom:20px; padding-top:20px;">● 식용작물</p>
					  <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th width="433">강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
					  <tr>
					  <tr>
						<td>식용작물</td>
						<td>이론</td>
						<td>2019 장사원 식용작물 기본+심화이론</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146367">수강신청</a></td>
					  </tr>
					  <tr>
						<td>식용작물</td>
						<td>문제풀이</td>
						<td>2019 장사원 식용작물 기출문제풀이</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146811">수강신청</a></td>
					  </tr>
					  <tr>
						<td>식용작물</td>
						<td>문제풀이</td>
						<td>2019 장사원 식용작물 실전 동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/147056">수강신청</a></td>
					  </tr>
					  <tr>
						<td>식용작물</td>
						<td>문제풀이</td>
						<td>2019 (지방직) 장사원 식용작물    실전 동형모의고사</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152465">수강신청</a></td>
					  </tr>
					  <tr>
						<td>식용작물</td>
						<td>유료특강</td>
						<td>2019 장사원 컨셉 식용작물    파이널정리특강</td>
						<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152220">수강신청</a></td>
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
						<th width="433">강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>재배학</td>
					<td>이론</td>
					<td>2019 장사원 재배학 기본+심화이론</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146366">수강신청</a></td>
				  </tr>
				  <tr>
					<td>재배학</td>
					<td>문제풀이</td>
					<td>2019 장사원 재배학 기출문제풀이</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146812">수강신청</a></td>
				  </tr>
				  <tr>
					<td>재배학</td>
					<td>문제풀이</td>
					<td>2019 장사원 재배학 실전    동형모의고사</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/147057">수강신청</a></td>
				  </tr>
				  <tr>
					<td>재배학</td>
					<td>문제풀이</td>
					<td>2019 (지방직) 장사원 재배학 실전    동형모의고사</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152464">수강신청</a></td>
				  </tr>
				  <tr>
					<td>재배학</td>
					<td>유료특강</td>
					<td>2019 장사원 컨셉 재배학    파이널정리특강</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152218">수강신청</a></td>
				  </tr>
				  </table>
				  <p>● 식용작물</p>
					  <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th width="433">강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>식용작물</td>
					<td>이론</td>
					<td>2019 장사원 식용작물 기본+심화이론</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146367">수강신청</a></td>
				  </tr>
				  <tr>
					<td>식용작물</td>
					<td>문제풀이</td>
					<td>2019 장사원 식용작물 기출문제풀이</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146811">수강신청</a></td>
				  </tr>
				  <tr>
					<td>식용작물</td>
					<td>문제풀이</td>
					<td>2019 장사원 식용작물 실전    동형모의고사</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/147056">수강신청</a></td>
				  </tr>
				  <tr>
					<td>식용작물</td>
					<td>문제풀이</td>
					<td>2019 (지방직) 장사원 식용작물    실전 동형모의고사</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152465">수강신청</a></td>
				  </tr>
				  <tr>
					<td>식용작물</td>
					<td>유료특강</td>
					<td>2019 장사원 컨셉 식용작물    파이널정리특강</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152220">수강신청</a></td>
				  </tr>
				  </table>
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
					<td>2019 장사원 생물학개론 이론강의</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146810">수강신청</a></td>
				  </tr>
				  <tr>
					<td>생물학개론</td>
					<td>문제풀이</td>
					<td>2019 장사원 생물학개론 기출문제풀이</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146881">수강신청</a></td>
				  </tr>
				  </table>
				  <p>● 토양학</p>
					  <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th width="433">강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>토양학</td>
					<td>이론</td>
					<td>2019 장사원 토양학 이론강의</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146574">수강신청</a></td>
				  </tr>
				  <tr>
					<td>토양학</td>
					<td>문제풀이</td>
					<td>2019 장사원 토양학 기출문제풀이</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146855">수강신청</a></td>
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
						<th width="433">강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>재배학</td>
					<td>이론</td>
					<td>2019 장사원 재배학 기본+심화이론</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146366">수강신청</a></td>
				  </tr>
				  <tr>
					<td>재배학</td>
					<td>문제풀이</td>
					<td>2019 장사원 재배학 기출문제풀이</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146812">수강신청</a></td>
				  </tr>
				  <tr>
					<td>재배학</td>
					<td>문제풀이</td>
					<td>2019 장사원 재배학 실전    동형모의고사</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/147057">수강신청</a></td>
				  </tr>
				  <tr>
					<td>재배학</td>
					<td>문제풀이</td>
					<td>2019 (지방직) 장사원 재배학 실전    동형모의고사</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152464">수강신청</a></td>
				  </tr>
				  <tr>
					<td>재배학</td>
					<td>유료특강</td>
					<td>2019 장사원 컨셉 재배학    파이널정리특강</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152218">수강신청</a></td>
				  </tr>
				  </table>
				  <p>● 작물생리학</p>
					  <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th width="433">강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>작물생리학</td>
					<td>이론</td>
					<td>2019 장사원 작물생리학 이론강의</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146573">수강신청</a></td>
				  </tr>
				  <tr>
					<td>작물생리학</td>
					<td>문제풀이</td>
					<td>2019 장사원 작물생리학 기출문제풀이</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146853">수강신청</a></td>
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
						<th width="433">강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>생물학개론</td>
					<td>이론</td>
					<td>2019 장사원 생물학개론 이론강의</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146810">수강신청</a></td>
				  </tr>
				  <tr>
					<td>생물학개론</td>
					<td>문제풀이</td>
					<td>2019 장사원 생물학개론 기출문제풀이</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146881">수강신청</a></td>
				  </tr>
				  </table>
				  <p>● 농촌지도론</p>
					  <table>
					  <tr>
						<th width="105">과목</th>
						<th width="72">과정</th>
						<th width="433">강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>농촌지도론</td>
					<td>이론</td>
					<td>2019 장사원 농촌지도론 이론강의</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146572">수강신청</a></td>
				  </tr>
				  <tr>
					<td>농촌지도론</td>
					<td>문제풀이</td>
					<td>2019 장사원 농촌지도론 기출문제풀이</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146854">수강신청</a></td>
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
						<th width="433">강좌명</th>
						<th width="104">수강신청</th>
					  </tr>
				  <tr>
					<td>토양학</td>
					<td>이론</td>
					<td>2019 장사원 토양학 이론강의</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146574">수강신청</a></td>
				  </tr>
				  <tr>
					<td>토양학</td>
					<td>문제풀이</td>
					<td>2019 장사원 토양학 기출문제풀이</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146855">수강신청</a></td>
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
					<td>2019 장사원 생물학개론 이론강의</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146810">수강신청</a></td>
				  </tr>
				  <tr>
					<td>생물학개론</td>
					<td>문제풀이</td>
					<td>2019 장사원 생물학개론 기출문제풀이</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146881">수강신청</a></td>
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
					<td>2018 장사원 유기농업기능사(필기)</td>
					<td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146732">수강신청</a></td>
				  </tr>
				</table>
            </div>
            <!--유기농업기능사//-->
        </div>
		<p>&nbsp;</p><p>&nbsp;</p>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
       /*tab*/
        $(document).ready(function(){
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
                var activeTab = $(this).attr("href");
                $(".tabs li a").removeClass("active");
                $(this).addClass("active");
                $(".content_guide_box").hide();
                $(activeTab).fadeIn();
                return false;
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:920,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });
    </script>
@stop