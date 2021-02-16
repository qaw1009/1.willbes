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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/
        .sky {position:fixed;top:250px;right:25px;z-index:1;}
        .sky a {display:block;padding-top:10px;}

        .wb_police {background:#0A0A0A}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/02/2061_top_bg.jpg) no-repeat center top;}  

        .wb_01 {background:#ffcc01}
        .wb_01 div {width:1120px; margin:0 auto; position:relative}

        .wb_02 {background:#131a2c}

        .wb_03 {padding:150px 0}
        .wb_03 .tableWrap {width:980px; margin:0 auto}
        .wb_03 th,
        .wb_03 td {padding:15px; font-size:18px; text-align:center}
        .wb_03 thead {border-bottom:6px solid #0e1629}
        .wb_03 th {font-weight:bold}
        .wb_03 tbody tr {border-bottom:1px solid #c3c3c3}
        .wb_03 tbody td a {display:block; color:#fff; background:#303cab; padding:15px 0; border-radius:10px}
        .wb_03 tbody td a:hover {background:#ffcc01; color:#000}
        .wb_03 tbody tr.end {background:#f4f4f4}
        .wb_03 tbody tr.end a {background:#844f41;}
        .wb_03 .page {margin-top:30px; font-size:20px; color:#6c6c6c; line-height:30px}
        .wb_03 .page a {display:inline-block; margin:0 20px; width:30px; border:1px solid #ccc; color:#ccc}
        .wb_03 .page a:hover {color:#000; border:1px solid #000;}
        .wb_03 .myGroup {width:980px; margin:50px auto 0; text-align:left}
        .wb_03 .myGroup div {color:#0e1629; font-size:38px}
        .wb_03 .myGroup ul {border:8px solid #0e1629; background:#f3f3f3; padding:30px 0; margin-top:50px}
        .wb_03 .myGroup ul:after {content:''; display:block; clear:both}
        .wb_03 .myGroup li {display:inline; float:left; width:33.33333%; border-right:1px solid #d9d9d9; text-align:center; font-size:17px}
        .wb_03 .myGroup li:last-child {border:0}
        .wb_03 .myGroup p {margin-bottom:10px}
        .wb_03 .myGroup span {line-height:110px; font-size:60px}
        .wb_03 .myGroup li:nth-child(1) span {color:#c2272d;}
        
        .evtInfo {padding:80px 0; background:#333; color:#f0f0f0; font-size:16px;}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.5}
        .evtInfoBox li {list-style: decimal; margin-left:20px; margin-bottom:10px;}
        .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
        .evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox .only {color:#E80000;vertical-align:top;}

        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
            background-color: #f2f2f2;
        }
        .b-close {
            position: absolute;
            right: 0;
            top: 0;
            width:24px; height:24px; line-height:24px; text-align:center; font-size:16px;
            display: inline-block;
            cursor: pointer;
            background:#333; color:#fff;
        }
        .Pstyle .content {height:auto; width:auto; width:300px; padding:30px; font-size:14px}
        .Pstyle .content .title {background:#f8b912; color:#202c52; font-size:18px; padding:15px; text-align:center; margin-bottom:20px}
        .Pstyle .content li {margin-bottom:5px}
        .Pstyle .content li:nth-child(1) {color:#c84100; font-size:18px; font-weight:bold; margin-bottom:10px}
        .Pstyle .content li input {width:100%; border:1px solid #000; height:36px;}
        .Pstyle .content .making,
        .Pstyle .content .check {margin-top:20px}
        .Pstyle .content .making a {display:block; background:#1f2b51; color:#fff; font-size:16px; padding:15px; text-align:center; border-radius:10px }
        .Pstyle .content .check a {display:block; background:#3b46b0; color:#fff; font-size:14px; padding:10px; text-align:center; border-radius:10px; width:60%; margin:0 auto }
    </style>


    <div id="evtContainer" class="evtContent NSK">       
        <div class="evtCtnsBox wb_police" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg"  alt="신광은 경찰학원" />            
		</div>     

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2061_top.gif"  alt="친구추천 이벤트"/>
		</div>

        <div class="evtCtnsBox wb_01">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/02/2061_01.jpg"  alt="그룹 개설하기"/>
                <a href="javascript:go_popup()" title="그룹개설하기" style="position: absolute; left: 22.68%; top: 53.42%; width: 53.57%; height: 12.58%; z-index: 2;"></a>
                <a href="http://cafe.daum.net/policeacademy" target="_blank" title="경사모" style="position: absolute; left: 18.84%; top: 72.41%; width: 21.52%; height: 13.36%; z-index: 2;"></a>
                <a href="https://cafe.naver.com/polstudy" target="_blank" title="경꿈사" style="position: absolute; left: 43.04%; top: 72.41%; width: 21.52%; height: 13.36%; z-index: 2;"></a>
                <a href="https://cafe.naver.com/kts9719" target="_blank" title="닥공사" style="position: absolute; left: 67.14%; top: 72.41%; width: 21.52%; height: 13.36%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2061_02.jpg" alt="이벤트 참여 방법"/>
        </div>  
        
        <div class="evtCtnsBox wb_03">
            <div class="tableWrap">
                <table>
                    <col/>
                    <col/>
                    <col/>
                    <col/>
                    <thead>
                        <tr>
                            <th>그룹번호</th>
                            <th>참수리 마크 완성 현황</th>
                            <th>현재 참여 인원</th>
                            <th>참여하기</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>5</td>
                            <td><img src="https://static.willbes.net/public/images/promotion/2021/02/2061_mark_00.png" alt="마크"/></td>
                            <td>0 / 5</td>
                            <td><a href="javascript:go_popup()">참여하기 &gt;</a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><img src="https://static.willbes.net/public/images/promotion/2021/02/2061_mark_04.png" alt="마크"/></td>
                            <td>4 / 5</td>
                            <td><a href="javascript:go_popup()">참여하기 &gt;</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><img src="https://static.willbes.net/public/images/promotion/2021/02/2061_mark_02.png" alt="마크"/></td>
                            <td>2 / 5</td>
                            <td><a href="javascript:go_popup()">참여하기 &gt;</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><img src="https://static.willbes.net/public/images/promotion/2021/02/2061_mark_01.png" alt="마크"/></td>
                            <td>1 / 5</td>
                            <td><a href="javascript:go_popup()">참여하기 &gt;</a></td>
                        </tr>
                        <tr class="end">
                            <td>1</td>
                            <td><img src="https://static.willbes.net/public/images/promotion/2021/02/2061_mark_05.png" alt="마크"/></td>
                            <td>5 / 5</td>
                            <td><a href="javascript:go_popup()">참수리완성</a></td>
                        </tr>
                    </tbody>
                </table>
                <div class="page"><a href="javascript:go_popup()"><</a> 1 / 3 <a href="javascript:go_popup()">></a></div>
                <div class="myGroup">
                    <div class="NSK-Black">내 그룹현황</div>
                    <ul>
                        <li>
                            <p>그룹번호</p>
                            <span class="NSK-Black">2</span>
                        </li>
                        <li>
                            <p>참수리 마크 완성 현황</p>
                            <img src="https://static.willbes.net/public/images/promotion/2021/02/2061_mark_01.png" alt="마크"/>
                        </li>
                        <li>
                            <p>현재 참여 인원</p>
                            <span>1 / 5</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div> 

        <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">이벤트 관련 유의사항</h4>
				<ul>
					<li>본 이벤트는 윌비스신광은경찰 온라인 회원만 참여 가능합니다.
                    <li>이벤트는 동일 ID 당 한 번만 참여 가능하며, 할인쿠폰도 회원 ID 당 최대 1회만 제공됩니다. 
                    <li>한 번 그룹을 개설하거나 그룹에 참여한 경우, 그룹을 탈퇴하거나 변경하실 수 없습니다.
                    <li>그룹의 비밀번호는 그룹장만이 설정 가능하며, 비밀번호 분실 시 재확인이 어렵습니다.
                    <li>해당 그룹 만들기 이벤트 상품의 할인혜택은 [윌비스 신광은경찰 PASS] 에 한하여 적용됩니다. 
                    <li>그룹은 생성된 시점으로부터 다음날 자정까지 유지됩니다. 그룹 기한 마감 후, 생성된 그룹은 사라지며 모집된 인원만큼의 쿠폰이 자동 지급됩니다.
                    <li>지급된 쿠폰은 '내강의실 > 결제관리 > 쿠폰/수강권관리' 에서 확인 가능합니다.
                    <li>할인 쿠폰의 유효기간은 최대 5일 이며, 5일 이후 만료됩니다.
                    <li>그룹 만들기 이벤트의 혜택은 당사 사정에 따라 중도 변경될 수 있습니다. </li>  
				</ul>
			</div>
		</div>      

        <!--레이어팝업-->
        <div id="popup" class="Pstyle NSK">
            <span class="b-close NSK-Black">X</span>
            <div class="content">
                <div class="group">
                    <div class="title NSK-Black">새로운 그룹 개설하기</div>
                    <ul>
                        <li>개설될 그룹 번호 : 4</li>
                        <li><input type="password" placeholder="그룹 비밀번호 숫자 4자리" maxlength="4"></li>
                        <li><input type="password" placeholder="그룹 비밀번호 숫자 4자리 확인" maxlength="4"></li>
                    </ul>
                    <div class="making"><a href="#none">그룹 개설하기 ></a></div>
                </div>

                <br>
                <br>
                <br>

                <div class="group">
                    <div class="title NSK-Black">그룹 참여하기</div>
                    <ul>
                        <li>참여 그룹 번호 : 4</li>
                        <li><input type="password" placeholder="그룹 비밀번호 숫자 4자리" maxlength="4"></li>
                    </ul>
                    <div class="making"><a href="#none">그룹 참여하기 ></a></div>
                </div>              
                

                <br>
                <br>
                <br>

                <div class="group">
                    이미 참여한 회원입니다.
                    <div class="check"><a href="#none">확인</a></div>
                </div>

                <br>
                <br>
                <br>

                <div class="group">
                    로그인 후 이용해 주십시오.
                    <div class="check"><a href="#none">확인</a></div>
                </div>

                <br>
                <br>
                <br>

                <div class="group">
                    해당 쿠폰은 자동 지급될 예정입니다.
                    <div class="check"><a href="#none">확인</a></div>
                </div>

                <br>
                <br>
                <br>

                <div class="group">
                    해당 그룹에 참여할 수 없습니다.
                    <div class="check"><a href="#none">확인</a></div>
                </div>

            </div>
        </div> 
	</div>
    <!-- End Container -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        /*레이어팝업*/
        function go_popup() {
            $('#popup').bPopup();
        }
    </script>
@stop