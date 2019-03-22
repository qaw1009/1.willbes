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
            position:relative;            
            width:100% !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}

        /************************************************************/

        .wb_mp4 {margin:0 auto; background:#000;}

        .menu {background:#252525;}

        .layer {width:100%;height:1070px; -ms-overflow:hidden}
        .video {width:100%; height:1070px; margin:0 auto; overflow:hidden;position:relative; opacity:0.4; box-shadow:0px rgba(0,0,0,0.4); background:#000}
        .pngimg {width:1210px; margin:0 auto; position:relative; top:-1070px}
        .pngimg-real {width:1210px; height:1070px; position:absolute;top:0}		

        .wb_01 {background:#2b3541}

        .wb_02 {background:#ede0b3 url(http://file3.willbes.net/new_cop/2018/09/EV180910_p3_bg.jpg) no-repeat center top;}	
        .wb_02 iframe {width:854px; height:480px; margin:0 auto;}

        .wb_03 {background:#ede0b3 url(http://file3.willbes.net/new_cop/2018/09/EV180910_p5_bg1.jpg) no-repeat center top}
        .wb_03 p {text-align:center; margin-top:90px}	

        /* 탭 */
        .tabWrapT {width:900px; margin:20px auto}
        .tabWrapT .tabmenuT li {display:inline; float:left; margin-right:5px}
        .tabWrapT .tabmenuT li a {display:block; height:36px; line-height:36px; padding:0 20px;  border:1px solid #ebebeb; background:#ebebeb; color:#27262c}
        .tabWrapT .tabmenuT li a:hover,
        .tabWrapT .tabmenuT li a.active {border-bottom:1px solid #fff; background:#fff;}	
        .tabWrapT .tabmenuT:after {content:""; display:block; clear:both}
        .tabWrapT .tabCts {min-height:750px; padding:20px; border:1px solid #ebebeb; margin-top:-1px}
        .tabWrapT .tabCts  table {width:100%}
        .tabWrapT .tabCts  td  { color:#272727; text-align:left; line-height:1.9; } /*padding:3px 5px;*/
        .tabWrapT .tabCts  td a {color:#707070}
        .tabWrapT .tabCts  td a:hover {color:#ec6b00} 
        .tabWrapT .tabCts .day {text-align:center; font-weight:bold}	
            
        .wb_04 {background:#bcbeb3;}
    </style>


<div class="evtContent" id="evtContainer">     

    <div class="evtCtnsBox wb_mp4" id="main">
		<div class="layer">
			<div class="video">
				<video style="margin:0px auto; width:100%;" autoplay="" loop="" muted="">
					<source src="http://file3.willbes.net/new_cop/EV180910.mp4" type="video/mp4"></source>
				</video>
			</div>
			<div class="pngimg">
				<div class="pngimg-real">
					<img src="http://file3.willbes.net/new_cop/2018/09/EV180910_p1_1.png" alt="메인" />
				</div>
			</div>
		</div>
	</div>    
    
	<div class="evtCtnsBox menu">
		<a href="#none"><img src="http://file3.willbes.net/new_cop/2018/09/EV180910_menu1_on.gif" alt="주요 매스컴이 극찬하는"></a>
        <a href="{{ site_url('/promotion/index/cate/3001/code/1021') }}"><img src="http://file3.willbes.net/new_cop/2018/09/EV180910_menu2_off.gif"  alt="영향력 있는 언론이 주목하는"/ ></a>
	</div>

	<div class="evtCtnsBox wb_01">
		<img src="http://file3.willbes.net/new_cop/2018/09/EV180910_p2_1.png" alt="역사" />
	</div>

   	<div class="evtCtnsBox wb_02" >
		<img src="http://file3.willbes.net/new_cop/2018/09/EV180910_p3_1.png" alt="카피1" /><Br />
		    <iframe src="https://www.youtube.com/embed/w4UEEXbPdY8?list=PLl65lsiDN8NNIu2ui43t531uWKHOJJiTV&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe><Br />
		<img src="http://file3.willbes.net/new_cop/2018/09/EV180910_p3_2.png" alt="카피2" />
	</div>

	<div class="evtCtnsBox wb_03">    	
		<img src="http://file3.willbes.net/new_cop/2018/09/EV180910_p4_1.png" alt="언론1" /><Br />
		<img src="http://file3.willbes.net/new_cop/2018/09/EV180910_p4_3.png" alt="방송" usemap="#Map190221_c" border="0" /><Br />
        <map name="Map190221_c" >
          <area shape="rect" coords="488,477,716,508" href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank" alt="신광은경찰TV 유튜브채널" />
        </map>
        
        <img src="http://file3.willbes.net/new_cop/2018/09/EV180910_p4_4.png" alt="방송" />
              
        <div class="tabWrapT">
        	<ul class="tabmenuT">
            	<li><a href="#tab1">뉴스원</a></li>
                <li><a href="#tab2">연합뉴스</a></li>
                <li><a href="#tab3">그 외 언론사</a></li>
            </ul>
            <div id="tab1" class="tabCts">
            	<table>
                    <col width="13%" />
                    <col width="35%" />
                    <col width="15%" />
                    <col width="37%" />
				<tr>
               	  <td class="day">2018-08-03</td><td><a href="http://news1.kr/photos/view/?3238587" target="_blank">경찰 채용 시험까지 '29일'</a></td>
					<td class="day">2018-08-31</td><td><a href="http://news1.kr/photos/view/?3279354" target="_blank">경찰 채용 시험 D-1, 수업 듣는 수험생들</a></td>
				</tr>
 
				<tr>
                	<td class="day">2018-08-03</td><td><a href="http://news1.kr/photos/view/?3238564" target="_blank">경찰을 꿈꾸는 청년들</a></td>
                 	<td class="day">2018-08-31</td><td><a href="http://news1.kr/photos/view/?3279337" target="_blank">경찰공무원 필기시험 D-1 '마지막까지 최선을 다해야죠'</a></td>  
				
				</tr>
				<tr>
                	<td class="day">2018-08-03</td><td><a href="http://news1.kr/photos/view/?3238562" target="_blank">경찰 채용시험 앞둔 수험생들</a></td>
                 	<td class="day">2018-08-31</td><td><a href="http://news1.kr/photos/view/?3279347" target="_blank">경찰공무원 필기시험 D-1 '마지막 점검'</a></td>  
				
				</tr>
				<tr>
                	<td class="day">2018-08-03</td><td><a href="http://news1.kr/photos/view/?3238563" target="_blank">경찰 채용시험 '한 달 앞으로'</a></td>
                 	<td class="day">2018-08-31</td><td><a href="http://news1.kr/photos/view/?3279333" target="_blank">시험 하루 앞두고 마지막 점검하는 수험생들</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-03</td><td><a href="http://news1.kr/photos/view/?3238581" target="_blank">폭염 잊은 경찰공무원 수험생 열기</a></td>
                 	<td class="day">2018-08-31</td><td><a href="http://news1.kr/photos/view/?3279338" target="_blank">경찰 채용 시험 D-1, 자율학습하는 수험생들</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-03</td><td><a href="http://news1.kr/photos/view/?3238585" target="_blank">폭염 잊은 공시생들…'경찰이 되야지'</a></td>
                	<td class="day">2018-08-31</td><td><a href="http://news1.kr/photos/view/?3279340" target="_blank">경찰 채용 시험 D-1 '긴장되네'</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-03</td><td><a href="http://news1.kr/photos/view/?3238583" target="_blank">폭염보다 뜨거운 취업열기</a></td>
                	<td class="day">2018-08-31</td><td><a href="http://news1.kr/photos/view/?3279349" target="_blank">경찰 채용 시험 D-1 '시간이 없다'</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-20</td><td><a href="http://news1.kr/photos/view/?3260873" target="_blank">경찰 채용 시험 D-12 '뜨거운 열기'</a></td>
                	<td class="day">2018-08-31</td><td><a href="http://news1.kr/photos/view/?3279352" target="_blank">경찰공무원 필기시험 D-1 '마지막까지 열심히'</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-20</td><td><a href="http://news1.kr/photos/view/?3260883" target="_blank">다가오는 시험 일자에 '긴장'</a></td>
                    <td class="day">2018-09-23</td><td><a href="http://news1.kr/photos/view/?3315007" target="_blank">추석 연휴에도 심화 수업 들어요</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-20</td><td><a href="http://news1.kr/photos/view/?3260877" target="_blank">경찰공무원 시험 D-12 '집중하는 수험생들'</a></td>
                	<td class="day">2018-09-23</td><td><a href="http://news1.kr/photos/view/?3315008" target="_blank">추석 연휴, 쉴 틈 없는 노량진</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-20</td><td><a href="http://news1.kr/photos/view/?3260885" target="_blank">경찰 시험 D-12 '긴장 속 수업'</a></td>
                	<td class="day">2018-09-23</td><td><a href="http://news1.kr/photos/view/?3315019" target="_blank">쉴 틈 없이 공부해야죠</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-20</td><td><a href="http://news1.kr/photos/view/?3260886" target="_blank">경찰공무원 될꺼야'… 무더위속 열공하는 수험생들</a></td>
                	<td class="day">2018-09-23</td><td><a href="http://news1.kr/photos/view/?3315018" target="_blank">추석 연휴 잊은 노량진 학원가</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-20</td><td><a href="http://news1.kr/photos/view/?3260867" target="_blank">경찰공무원 수업에 집중</a></td>
                	<td class="day">2018-09-23</td><td><a href="http://news1.kr/photos/view/?3315015" target="_blank">추석 연휴에도 쉴 틈 없어요</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-20</td><td><a href="http://news1.kr/photos/view/?3260862" target="_blank">경찰 시험 앞둔 수험생들 '1분1초 집중'</a></td>
                	<td class="day">2018-09-23</td><td><a href="http://news1.kr/photos/view/?3315014" target="_blank">추석 연휴, 심화 수업 듣는 경찰 공무원 수험생들</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-20</td><td><a href="http://news1.kr/photos/view/?3260865" target="_blank">다가오는 경찰공무원 시험</a></td>
                	<td class="day">2018-09-23</td><td><a href="http://news1.kr/photos/view/?3315020" target="_blank">수험서 보며 집중</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-20</td><td><a href="http://news1.kr/photos/view/?3260872" target="_blank">경찰 공무원 시험 D-12</a></td>
                	<td class="day">2018-09-23</td><td><a href="http://news1.kr/photos/view/?3315021" target="_blank">추석 연휴, 쉴 틈이 없다</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-20</td><td><a href="http://news1.kr/photos/view/?3260869" target="_blank">뜨거운 경찰공무원 열기</a></td>
                	<td class="day">2018-09-26</td><td><a href="http://news1.kr/photos/view/?3316311" target="_blank">추석 연휴에도 '열공'하는 공시생</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-20</td><td><a href="http://news1.kr/photos/view/?3260878" target="_blank">더워도 열공</a></td>
                	<td class="day">2018-09-26</td><td><a href="http://news1.kr/photos/view/?3316313" target="_blank">추석 연휴에도 최선을 다하는 공시생</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-20</td><td><a href="http://news1.kr/photos/view/?3260884" target="_blank">경찰 시험 앞두고 '열공'</a></td>
                	<td class="day">2018-09-26</td><td><a href="http://news1.kr/photos/view/?3316312" target="_blank">추석 연휴 마지막날…'열공'하는 공시생</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-20</td><td><a href="http://news1.kr/photos/view/?3260868" target="_blank">경찰공무원 시험 '자신과의 싸움'</a></td>
                	<td class="day">2018-09-26</td><td><a href="http://news1.kr/photos/view/?3316316" target="_blank">명절 잊은 공시생</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-20</td><td><a href="http://news1.kr/photos/view/?3260876" target="_blank">다가오는 경찰 채용 시험 '집중'</a></td>
                	<td class="day">2018-09-26</td><td><a href="http://news1.kr/photos/view/?3316317" target="_blank">대졸 실업자 54만명…명절 반납한 공시생</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-28</td><td><a href="http://news1.kr/photos/view/?3273956" target="_blank">끝까지 최선을 다한다' 경찰공무원 시험 D-4</a></td>
                	<td class="day">2018-09-26</td><td><a href="http://news1.kr/photos/view/?3316318" target="_blank">명절에도 '열공'하는 공시생</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-28</td><td><a href="http://news1.kr/photos/view/?3273961" target="_blank">경찰공무원 시험 나흘 앞으로</a></td>
                	<td class="day">2018-09-26</td><td><a href="http://news1.kr/photos/view/?3316315" target="_blank">대졸 실업자 54만명 돌파…추석 연휴에도 '열공'하는..</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-28</td><td><a href="http://news1.kr/photos/view/?3273962" target="_blank">경찰공무원 필기시험 나흘 앞으로… '최선을 다한다'</a></td>
                	<td class="day">2018-09-26</td><td><a href="http://news1.kr/photos/view/?3316322" target="_blank">추석 연휴 마지막날…책과 함께 보내는 공시생</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-28</td><td><a href="http://news1.kr/photos/view/?3273960" target="_blank">경찰공무원 필기시험 D-4 '포기는 없다'</a></td>
                	<td class="day">2019-02-06</td><td><a href="http://news1.kr/photos/view/?3498578" target="_blank">설 연휴 반납…'열공' 공시생들</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-28</td><td><a href="http://news1.kr/photos/view/?3273958" target="_blank">나흘 앞으로 다가온 경찰공무원 필기시험</a></td>
                	<td class="day">2019-02-06</td><td><a href="http://news1.kr/photos/view/?3498572" target="_blank">설 연휴 반납한 공시생들...'열공중'</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-28</td><td><a href="http://news1.kr/photos/view/?3273952" target="_blank">경찰채용 시험 D-4</a></td>
                	<td class="day">2019-02-06</td><td><a href="http://news1.kr/photos/view/?3498573" target="_blank">공부만이 살길이다'</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-28</td><td><a href="http://news1.kr/photos/view/?3273954" target="_blank">경찰공무원의 꿈을 위해</a></td>
                	<td class="day">2019-02-06</td><td><a href="http://news1.kr/photos/view/?3498568" target="_blank">설 연휴에도 공부… 쉴 틈 없어요'</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-28</td><td><a href="http://news1.kr/photos/view/?3273951" target="_blank">경찰 채용 시험까지 D-4</a></td>
                	<td class="day">2019-02-06</td><td><a href="http://news1.kr/photos/view/?3498562" target="_blank">설 연휴 잊은 공시생들</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-28</td><td><a href="http://news1.kr/photos/view/?3273957" target="_blank">나흘 앞으로 다가온 경찰공무원 시험</a></td>
                	<td class="day">2019-02-06</td><td><a href="http://news1.kr/photos/view/?3498585" target="_blank">설 연휴에도 최선 다하는 공시생들</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-28</td><td><a href="http://news1.kr/articles/?3410815" target="_blank">내년 경찰·교사 등 공무원 3.6만명 충원...</a></td>
                	<td class="day">2019-02-06</td><td><a href="http://news1.kr/photos/view/?3498580" target="_blank">합격의 꿈을 향해' 연휴 잊은 공시생들</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-31</td><td><a href="http://news1.kr/photos/view/?3279353" target="_blank">내일 경찰 시험 합격해야죠</a></td>
                	<td class="day">2019-02-06</td><td><a href="http://news1.kr/photos/view/?3498571" target="_blank">합격 향한 의지 불태우는 공시생들</a></td>  
				</tr>
				<tr>
                	<td class="day">2018-08-31</td><td><a href="http://news1.kr/photos/view/?3279350" target="_blank">경찰 채용 시험 D-1 '무조건 합격한다'</a></td>
                    </tr>
                </table>
            </div>
            <div id="tab2" class="tabCts">
            	<table>
                    <col width="13%" />
                    <col width="35%" />
                    <col width="15%" />
                    <col width="37%" />
				<tr>
                	<td class="day">2017-01-15</td><td><a href="https://www.yna.co.kr/view/PYH20170115077300013?section=search" target="_blank">추위를 이기자</a></td>
                	<td class="day">2017-02-01</td><td><a href="https://www.yna.co.kr/view/PYH20170201281900013?section=search" target="_blank">열공모드</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-15</td><td><a href="https://www.yna.co.kr/view/PYH20170115077400013?section=search" target="_blank">강추위 이기는 공부 열기</a></td>  
                 	<td class="day">2017-02-01</td><td><a href="https://www.yna.co.kr/view/PYH20170201281400013?section=search" target="_blank">추위 잊고 열공</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-15</td><td><a href="https://www.yna.co.kr/view/PYH20170115077500013?section=search" target="_blank">어두움 속에서</a></td>  
                 	<td class="day">2017-02-01</td><td><a href="https://www.yna.co.kr/view/PYH20170201281200013?section=search" target="_blank">수험생들이여, 기지개를 켜라</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-15</td><td><a href="https://www.yna.co.kr/view/PYH20170115077600013?section=search" target="_blank">기다리며 공부하며</a></td>  
                	<td class="day">2017-02-01</td><td><a href="https://www.yna.co.kr/view/PYH20170201283000013?section=search" target="_blank">강추위 잊은 경찰학원 수험생들</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-15</td><td><a href="https://www.yna.co.kr/view/PYH20170115078300013?section=search" target="_blank">한파를 이기는 공부 열기</a></td>  
                	<td class="day">2017-02-01</td><td><a href="https://www.yna.co.kr/view/PYH20170201282900013?section=search" target="_blank">발디딜 틈이 없다</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-15</td><td><a href="https://www.yna.co.kr/view/PYH20170115077800013?section=search" target="_blank">캔커피의 도움</a></td>  
                	<td class="day">2017-02-01</td><td><a href="https://www.yna.co.kr/view/PYH20170201282700013?section=search" target="_blank">그야말로 꽉 들어찬 강의실</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-15</td><td><a href="https://www.yna.co.kr/view/PYH20170115077900013?section=search" target="_blank">자리 배정 위해 새벽에 나온 공무원 준비생들</a></td>  
                	<td class="day">2017-02-01</td><td><a href="https://www.yna.co.kr/view/PYH20170201282500013?section=search" target="_blank">계단에서 열공</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-15</td><td><a href="https://www.yna.co.kr/view/PYH20170115078200013?section=search" target="_blank">새벽 공부</a></td>  
                	<td class="day">2017-10-09</td><td><a href="https://www.yna.co.kr/view/PYH20171009128500013?section=search" target="_blank">황금연휴'는 없다…노량진 학원가 공부열기</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-15</td><td><a href="https://www.yna.co.kr/view/PYH20170115078400013?section=search" target="_blank">줄지어 앉은 경찰 준비 공시생들</a></td>  
                	<td class="day">2017-10-09</td><td><a href="https://www.yna.co.kr/view/PYH20171009129300013?section=search" target="_blank">황금연휴' 마지막 날, 공부열기로 뜨거운 노량진</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-28</td><td><a href="https://www.yna.co.kr/view/PYH20170128043200013?section=search" target="_blank">설에도 취업준비중</a></td>  
                	<td class="day">2017-10-09</td><td><a href="https://www.yna.co.kr/view/PYH20171009129200013?input=1196m" target="_blank">황금연휴' 사라진 노량진</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-28</td><td><a href="https://www.yna.co.kr/view/PYH20170128044500013?section=search" target="_blank">설 명절도 취업준비</a></td>  
                	<td class="day">2017-10-09</td><td><a href="https://www.yna.co.kr/view/PYH20171009129100013?input=1196m" target="_blank">황금연휴' 먹는건가요?...뜨거운 공부열기</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-28</td><td><a href="https://www.yna.co.kr/view/PYH20170128044700013?section=search" target="_blank">설 명절 취업준비생 문제풀이</a></td>  
                	<td class="day">2018-08-03</td><td><a href="https://www.yna.co.kr/view/PYH20180803087300013?input=1196m" target="_blank">폭염 못지않은 경찰준비 열기</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-28</td><td><a href="https://www.yna.co.kr/view/PYH20170128044200013?section=search" target="_blank">설 명절 단어암기</a></td>  
                	<td class="day">2018-08-03</td><td><a href="https://www.yna.co.kr/view/PYH20180803087600013?input=1196m" target="_blank">폭염보다 뜨거운 경찰시험 준비 열기</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-28</td><td><a href="https://www.yna.co.kr/view/PYH20170128045100013?section=search" target="_blank">설 명절 경찰학 공부</a></td>  
                	<td class="day">2018-08-03</td><td><a href="https://www.yna.co.kr/view/PYH20180803087900013?input=1196m" target="_blank">경찰시험, 앞으로 D-29</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-28</td><td><a href="https://www.yna.co.kr/view/PYH20170128045600013?section=search" target="_blank">취업준비생 강의실 수칙</a></td>  
                	<td class="day">2018-09-19</td><td><a href="https://www.yna.co.kr/view/PYH20180919050600013?input=1196m" target="_blank">경찰공무원 수험생, 명절 연휴를 앞두고</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-28</td><td><a href="https://www.yna.co.kr/view/PYH20170128096400013?section=search" target="_blank">쉬는 시간에도 열공</a></td>  
                	<td class="day">2018-09-19</td><td><a href="https://www.yna.co.kr/view/PYH20180919050900013?input=1196m" target="_blank">명절 연휴 대신 '열공' 모드</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-28</td><td><a href="https://www.yna.co.kr/view/PYH20170128096300013?section=search" target="_blank">설에도 취업준비</a></td>  
                	<td class="day">2018-09-19</td><td><a href="https://www.yna.co.kr/view/PYH20180919051900013?input=1196m" target="_blank">노량진 '공시생' 명절 연휴를 앞두고</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-28</td><td><a href="https://www.yna.co.kr/view/PYH20170128096200013?section=search" target="_blank">수업 들어가는 종종걸음</a></td>  
                	<td class="day">2018-09-19</td><td><a href="https://www.yna.co.kr/view/PYH20180919052900013?input=1196m" target="_blank">명절 연휴 앞둔 노량진 경찰학원</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-02-01</td><td><a href="https://www.yna.co.kr/view/PYH20170201282400013?section=search" target="_blank">문제지의 빼곡한 메모</a></td>  
                	<td class="day">2018-09-22</td><td><a href="https://www.yna.co.kr/view/AKR20180921181000004?input=1195m" target="_blank">명절은 남의 일' 추석연휴도 취업특강·스터디로 보내는..</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-02-01</td><td><a href="https://www.yna.co.kr/view/PYH20170201282300013?section=search" target="_blank">강의실 가득 메운 경찰학원 수험생들</a></td>  
                	<td class="day">2018-11-07</td><td><a href="https://www.yna.co.kr/view/AKR20181107075500002?input=1195m" target="_blank">경제활동 안하는 4명 중 1명은 대졸…비중 상승세</a></td>
                    </tr>
 				<tr>
                	<td class="day">2017-02-01</td><td><a href="https://www.yna.co.kr/view/PYH20170201282100013?section=search" target="_blank">경찰로 가는 길</a></td>
                	<td class="day"></td><td></td>
                    </tr>
                </table>
            </div>
            <div id="tab3" class="tabCts">
                <table>
                    <col width="13%" />
                    <col width="35%" />
                    <col width="15%" />
                    <col width="37%" />
				<tr>
                	<td class="day">2016-10-06</td><td><a href="http://www.newsmaker.or.kr/news/articleView.html?idxno=32887" target="_blank">경찰공무원 교육의 질적 향상을 도모하다</a></td>
                	<td class="day">2018-08-03</td><td><a href="https://news.naver.com/main/read.nhn?mode=LSD&mid=sec&sid1=100&oid=001&aid=0010250065" target="_blank">폭염 못지않은 경찰준비 열기</a></td>
                </tr>
 				<tr>
                	<td class="day">2017-01-15</td><td><a href="https://www.yna.co.kr/view/PYH20170115078000013?input=1196m" target="_blank">자리 배정 위해 새벽에 나온 공무원 준비생들</a></td> 
                	<td class="day">2018-08-03</td><td><a href="https://news.naver.com/main/read.nhn?mode=LSD&mid=sec&sid1=100&oid=001&aid=0010250074" target="_blank">경찰시험, 앞으로 D-29</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-28</td><td><a href="https://news.naver.com/main/read.nhn?mode=LSD&mid=sec&sid1=102&oid=001&aid=0008992391" target="_blank">설에도 취업준비중</a></td> 
                	<td class="day">2018-08-15</td><td><a href="http://www.kyeongin.com/main/view.php?key=20180815010004765" target="_blank">체감실업률 11.8%, 2015년 집계 이후 최고</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-28</td><td><a href="https://news.naver.com/main/read.nhn?mode=LSD&mid=sec&sid1=102&oid=001&aid=0008992400" target="_blank">설 명절도 취업준비</a></td> 
                	<td class="day">2018-08-17</td><td><a href="http://www.dt.co.kr/contents.html?article_no=2018081702100158053001&ref=naver" target="_blank">고용쇼크 6개월' 실업자 7개월째 100만 넘어</a></td>
                    </tr>
				<tr>
                	<td class="day">2017-01-28</td><td><a href="https://news.naver.com/main/read.nhn?mode=LSD&mid=sec&sid1=102&oid=001&aid=0008992405" target="_blank">설 명절 경찰학 공부</a></td> 
                	<td class="day">2018-08-17</td><td><a href="http://news.mk.co.kr/newsRead.php?year=2018&no=516319" target="_blank">취업자 5000명↑…0.0%대 '제자리걸음'</a></td>
                </tr>
				<tr>
                	<td class="day">2017-01-29</td><td><a href="http://www.iusm.co.kr/news/articleView.html?idxno=714553" target="_blank">설 명절 단어암기</a></td> 
                	<td class="day">2018-08-20</td><td><a href="http://www.munhwa.com/news/view.html?no=2018082001070218066001" target="_blank">경찰공무원 '좁은 문'</a></td>
                </tr>
				<tr>
                	<td class="day">2017-01-30</td><td><a href="http://www.iusm.co.kr/news/articleView.html?idxno=714637" target="_blank">쉬는 시간에도 열공</a></td> 
                	<td class="day">2018-08-20</td><td><a href="http://www.fntoday.co.kr/news/articleView.html?idxno=168083" target="_blank">경찰공무원 될꺼야'… 무더위속 열공하는 수험생들</a></td>
                </tr>
				<tr>
                	<td class="day">2017-02-06</td><td><a href="http://www.newsmaker.or.kr/news/articleView.html?idxno=71278" target="_blank">수준별 맞춤 학습으로 경찰공무원 합격 이끌다</a></td> 
                	<td class="day">2018-09-19</td><td><a href="https://news.naver.com/main/read.nhn?mode=LSD&mid=sec&sid1=102&oid=001&aid=0010353742" target="_blank">경찰공무원 수험생, 명절 연휴를 앞두고</a></td>
                </tr>
				<tr>
                	<td class="day">2017-03-06</td><td><a href="http://www.sportsseoul.com/news/read/489044" target="_blank">실무중심을 바탕으로 한 차별화된 티칭 노하우</a></td> 
                	<td class="day">2018-09-19</td><td><a href="https://news.naver.com/main/read.nhn?mode=LSD&mid=sec&sid1=102&oid=001&aid=0010353743" target="_blank">명절 연휴 대신 '열공' 모드</a></td>
                </tr>
				<tr>
                	<td class="day">2017-03-14</td><td><a href="http://www.lec.co.kr/news/articleView.html?idxno=43769" target="_blank">올 2차 경찰시험 대비 효율적 프로그램은</a></td> 
                	<td class="day">2018-09-19</td><td><a href="http://www.news2day.co.kr/111294" target="_blank">추석 풍속도 대변화, 고향 대신 '열공'과 '여행'이 화두</a></td>
                </tr>
				<tr>
                	<td class="day">2017-05-30</td><td><a href="https://www.ytn.co.kr/_ln/0103_201705301731590423" target="_blank">절호의 기회다… 노량진 고시촌 '화색'</a></td> 
                	<td class="day">2018-09-19</td><td><a href="http://www.jjn.co.kr/news/articleView.html?idxno=755095#092a" target="_blank">명절연휴 대신 '열공' 모드</a></td>
                </tr>
				<tr>
                	<td class="day">2017-06-02</td><td><a href="http://news.hankyung.com/article/201706015151g?nv=o" target="_blank">공공부문 채용확대? 절호의 기회 VS 공시낭인 우려</a></td> 
                	<td class="day">2018-09-21</td><td><a href="http://www.asiatoday.co.kr/view.php?key=20180920010012221" target="_blank">추석 피하고픈’N포세대 ‘부담스러운’신중년...</a></td>
                </tr>
				<tr>
                	<td class="day">2017-06-05</td><td><a href="https://news.sbs.co.kr/news/endPage.do?news_id=N1004231224&plink=ORI&cooper=NAVER" target="_blank">바늘구멍' 공무원 취업 문 열리나. 노량진 학원가..'</a></td> 
                	<td class="day">2018-09-22</td><td><a href="http://www.kyeongin.com/main/view.php?key=20180922010008195" target="_blank">추석임에도 청년들로 북적이는 노량진 학원가…</a></td>
                </tr>
				<tr>
                	<td class="day">2017-06-06</td><td><a href="https://news.sbs.co.kr/news/endPage.do?news_id=N1004231488&plink=ORI&cooper=NAVER" target="_blank">공무원 증원 정책에 수강문의 30%↑…노량진 '들썩'</a></td> 
                	<td class="day">2018-09-22</td><td><a href="http://news.mt.co.kr/mtview.php?no=2018092014315639256" target="_blank">평일이랑 뭐가 달라요'…공시생의 '추석'</a></td>
                </tr>
				<tr>
                	<td class="day">2017-06-07</td><td><a href="http://view.asiae.co.kr/news/view.htm?idxno=2017060710251942849" target="_blank">공무원 채용 확대에 노량진 일대 '들썩들썩'</a></td> 
                	<td class="day">2018-09-22</td><td><a href="http://www.ujnews.co.kr/news/articleView.html?idxno=425359" target="_blank">명절은 남의일' 추석연휴도 취업특강·스터디로 보내는..</a></td>
                </tr>
				<tr>
                	<td class="day">2017-07-25</td><td><a href="http://www.lec.co.kr/news/articleView.html?idxno=45034" target="_blank">노량진 수험가, 신(神)이라 불리는 신광은 강사를...</a></td> 
                	<td class="day">2018-09-23</td><td><a href="https://www.youtube.com/watch?v=w4UEEXbPdY8&index=3&list=PLl65lsiDN8NNIu2ui43t531uWKHOJJiTV&t=0s" target="_blank"> '바늘구멍' 취업난 속 추석 맞은 노량진 공시촌</a></td>
                </tr>
				<tr>
                	<td class="day">2017-10-09</td><td><a href="https://news.naver.com/main/read.nhn?mode=LSD&mid=sec&sid1=102&oid=001&aid=0009592545" target="_blank">황금연휴'는 없다…노량진 학원가 공부열기</a></td> 
                	<td class="day">2018-10-31</td><td><a href="http://go.seoul.co.kr/news/newsView.php?id=20181031020001&wlog_tag3=naver" target="_blank">보건교사 더 뽑는다며?…간호사들도 노량진으로</a></td>
                </tr>
				<tr>
                	<td class="day">2017-10-09</td><td><a href="https://news.naver.com/main/read.nhn?mode=LSD&mid=sec&sid1=102&oid=001&aid=0009592549" target="_blank">황금연휴' 먹는건가요?...뜨거운 공부열기</a></td> 
                	<td class="day">2018-11-01</td><td><a href="http://snaptime.edaily.co.kr/2018/11/%ea%b3%b5%eb%ac%b4%ec%9b%90%ec%8b%9c%ed%97%98%ea%b3%84-%ec%8a%a4%ed%83%80%ea%b0%95%ec%82%ac%ea%b0%80-%eb%93%a4%eb%a0%a4%ec%a3%bc%eb%8a%94-%ea%bf%80%ed%8c%81%ec%9d%80/" target="_blank">공무원시험계 '스타강사'가 들려주는 꿀팁은</a></td>
                </tr>
				<tr>
                	<td class="day">2017-10-09</td><td><a href="https://news.naver.com/main/read.nhn?mode=LSD&mid=sec&sid1=102&oid=001&aid=0009592552" target="_blank">황금연휴' 마지막 날, 공부열기로 뜨거운 노량진</a></td> 
                	<td class="day">2018-11-07</td><td><a href="https://www.sedaily.com/NewsView/1S73IBSRR5" target="_blank">일 하지도, 일할 계획도 없다는 4명 중 1명은 대졸</a></td>
                </tr>
				<tr>
                	<td class="day">2017-10-09</td><td><a href="http://www.idaegu.co.kr/news/articleView.html?idxno=233743" target="_blank">연휴에도 뜨거운 학원</a></td> 
                	<td class="day">2018-12-17</td><td><a href="http://www.dailygrid.net/news/articleView.html?idxno=113721" target="_blank">동작경찰서-윌비스 신광은 경찰팀, 모범 청소년 장학금..</a></td>
                </tr>
				<tr>
                	<td class="day">2017-10-10</td><td><a href="https://www.sedaily.com/NewsView/1OM8ZKS3YS" target="_blank">靑의 반격'공무원 81만명 채용, 재정부담 오히려 감소'</a></td> 
                	<td class="day">2018-12-30</td><td><a href="http://www.asiatoday.co.kr/view.php?key=20181230010018410" target="_blank">노량진 경찰학원 가보니…‘추가채용 대비 구슬땀’</a></td>
                </tr>
				<tr>
                	<td class="day">2017-10-15</td><td><a href="https://www.sedaily.com/NewsView/1OMBAA2WMT" target="_blank">6개월 내 합격자 5.5%... 12년 장수생도</a></td> 
                	<td class="day">2019-01-14</td><td><a href="http://photo.chosun.com/site/data/html_dir/2019/01/14/2019011400641.html?utm_source=naver&utm_medium=original&utm_campaign=photo" target="_blank">미세먼지도 막을 수 없는 공시생들의 밤샘 자리잡기</a></td>
                </tr>
				<tr>
                    <td class="day">2018-02-15</td>
                    <td><a href="http://www.edaily.co.kr/news/read?newsId=01564566619110848&mediaCodeNo=257&OutLnkChk=Y" target="_blank">설이요? 특강 있어요…연휴 잊은 노량진 학원가</a></td>
                    <td class="day">2019-02-06</td>
                    <td><a href="http://news1.kr/photos/view/?3498561" target="_blank"> '꼭 합격합니다'</a></td>
                </tr>
				<tr>
                    <td class="day">2018-08-03</td>
                    <td><a href="https://news.naver.com/main/read.nhn?mode=LSD&mid=sec&sid1=100&oid=001&aid=0010250070" target="_blank">폭염보다 뜨거운 경찰시험 준비 열기</a></td>
                    <td class="day"></td>
                    <td></td>
				</tr>
                  </table>
            </div>          
        </div>

        <img src="http://file3.willbes.net/new_cop/2018/09/EV180910_p4_2.png" alt="" />
	</div>
    
	<div class="evtCtnsBox wb_04" >
		<img src="http://file3.willbes.net/new_cop/2018/09/EV180910_p5.png" alt="02" usemap="#pass">
		<map name="pass" id="pass">
			<area shape="rect" coords="372,913,839,980" href="{{ site_url('/member/join/?ismobile=0&sitecode=2000') }}" onfocus='this.blur()' alt="신광은경찰" target="_blank">
		</map>
	</div> 
       
</div>
<!-- End Container -->


<script type="text/javascript">	
    /*tab*/
	$(document).ready(function(){
	$('.tabmenuT').each(function(){
		var $active, $content, $links = $(this).find('a');
		$active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
		$active.addClass('active');
	
		$content = $($active[0].hash);
	
		$links.not($active).each(function () {
		$(this.hash).hide()});
	
		// Bind the click event handler
		$(this).on('click', 'a', function(e){
		$active.removeClass('active');
		$content.hide();
	
		$active = $(this);
		$content = $(this.hash);
	
		$active.addClass('active');
		$content.show();
	
		e.preventDefault()})})}
	);
    
</script>

@stop