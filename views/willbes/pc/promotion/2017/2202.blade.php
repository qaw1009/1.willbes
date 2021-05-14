@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
  
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2021/05/2202_top_bg.jpg) no-repeat center top;}
        .event01 {padding-bottom:100px}
        .event01 .tabs {width:1030px; margin:0 auto 10px}
        .event01 .tabs li {display:inline; float:left; width:33.3333%}
        .event01 .tabs a {display:block; text-align:center; background:#9f9f9f; color:#fff; height:80px; line-height:80px; margin-right:10px; font-size:28px}
        .event01 .tabs a.active,
        .event01 .tabs a:hover {background:#292929;}
        .event01 .tabs li:last-child a {margin:0}
        .event01 .tabs:after {content:''; display:block; clear:both}
        .event01 .title {color:#383838; font-size:30px; margin-bottom:40px}
        .event01 .evt_table {width:1030px; margin:50px auto 0; border:1px solid #333; padding:50px}
        .evt_table table{width:100%;border-top:1px solid #e9e9e9}
        .evt_table table tr {border-bottom:1px solid #e9e9e9}
        .evt_table table th,
        .evt_table table td {margin:10px 0; font-size:16px; color:#666}
        .evt_table table th {background:#f9f9f9; color:#000;}
        .evt_table table td{text-align:left; padding:15px}
        .evt_table label {margin-right:10px; line-height:28px;}
        .evt_table input {vertical-align:middle}
        .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; background:#f5f5f5; vertical-align:middle; width:80%; margin-bottom:5px}
        .evt_table td input[type=text]:last-child {margin-bottom:0}
        .evt_table input[type=checkbox] {height:20px; width:20px}
        .evt_table td li {display:inline-block; float:left; width:50%; margin-bottom:10px}
        .evt_table td a {height:28px; line-height:28px; display:inline-block; background:#42425b; color:#fff; padding:0 10px; margin-left:5px}
        .evt_table .btns {margin-top:40px}
        .evt_table .btns a {display:inline-block; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#42425b; margin:0 10px; border-radius:40px; padding:0 50px}
        .evt_table .btns a:hover {background:#fe544a}

        .event01 .txtinfo {width:1030px; margin:0 auto; color:#fff; background:#42425b; line-height:1.5; padding:50px; text-align:left; font-size:14px}
        .txtinfo .addbtn { display:inline-block; padding:0 20px; background:#ffe401; color:#42425b; border-radius:10px }

        .event02 {background:#ffe400}

        .event03 {background:#42425b; padding-bottom:100px}
        .event03 .urlWrap {width:1030px; margin:0 auto}
        .urlWrap .urladd {padding:20px; background:#2e2e3c; color:#fff; margin:40px auto 20px; font-size:14px}
        .urlWrap .urladd input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; background:#f5f5f5; vertical-align:middle; width:70%; margin:0 10px; color:#000}
        .urlWrap .urladd a {display:inline-block; height:28px; line-height:28px; color:#2e2e3c; background:#ffc943; padding:0 20px; vertical-align:middle}
        .urlWrap .evt_table {width:100%; background-color:#fff !important; padding:20px 0}
        .urlWrap .evt_table table td {font-size:14px; text-align:center}
        .urlWrap .evt_table table td:nth-child(2) {text-align:left}
        .urlWrap .txtinfo {line-height:1.4; text-align:left; font-size:16px; margin-top:50px; color:#fff}
        .urlWrap .txtinfo h4 {font-size:30px; margin-bottom:20px; font-weight:bold}
        .urlWrap .txtinfo li {list-style-type: disc; margin-left:20px; margin-bottom:5px}

        .event04 {background:#e1e1e1}

        .evtBox {width:1120px; margin:0 auto; position:relative}
        .evtBox a:hover {background:rgba(0,0,0,.2)}
    </style>

    <div class="p_re evtContent NSK">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2021/05/2202_top.jpg" alt="비대면 실전 모의고사"/>
        </div>

        <div class="evtCtnsBox event01">
        	<img src="https://static.willbes.net/public/images/promotion/2021/05/2202_01_00.jpg" alt="실전모의고사 응시"/>
            <ul class="tabs NSK-Black">
                <li><a href="#tab01">1. 실전 감각 기르기</a></li>
                <li><a href="#tab02">2. 현재 나의 위치 파악</a></li>
                <li><a href="#tab03">3. 취약점 파악 및 보완</a></li>
            </ul>
            <div id="tab01" class="tabCts">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2202_01_01.jpg" alt="실전 감각 기르기"/>
            </div>
            <div id="tab02" class="tabCts">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2202_01_02.jpg" alt="현재 나의 위치 파악"/>
            </div>
            <div id="tab03" class="tabCts">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2202_01_03.jpg" alt="취약점 파악 및 보완"/>
            </div>

            <form name="regi_form_register" id="regi_form_register">
                <div class="evt_table">
                    <div class="title NSK-Black">실전 모의고사 신청하기</div>
                    <table border="0" cellspacing="2" cellpadding="2">
                        <col width="15%" />
                        <col width="35%" />
                        <col width="15%" />
                        <col  />
                        <tbody>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <td>
                                    * 로그인 후 자동 노출
                                </td>
                                <th>
                                    이름
                                </th>
                                <td>
                                    * 로그인 후 자동 노출
                                </td>
                            </tr>
                            <tr>
                                <th>연락처</th>
                                <td colspan="3"><input type="text" placeholder="- 없이 숫자만 입력"></td>
                            </tr>
                            <tr>
                                <th>과목</th>
                                <td colspan="3">
                                    <ul>
                                        <li><label><input type="checkbox"/> 교육학 - 이인재 교수</label></li>
                                        <li><label><input type="checkbox"/> 교육학 - 홍의일 교수</label></li>
                                        <li><label><input type="checkbox"/> 국어 - 송원영/권보민 교수</label></li>
                                        <li><label><input type="checkbox"/> 수학 - 김철홍/박태영 교수</label></li>
                                        <li><label><input type="checkbox"/> 도덕윤리 - 김병찬 교수</label></li>
                                        <li><label><input type="checkbox"/> 전기 - 최우영 교수</label></li>
                                        <li><label><input type="checkbox"/> 전자 - 최우영 교수</label></li>
                                        <li><label><input type="checkbox"/> 역사 - 최용림 교수</label></li>
                                        <li><label><input type="checkbox"/> 정보컴퓨터 - 송광진/장순선 교수</label></li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="btns">
                        <a href="javascript:void(0);" onclick="fn_submit();">실전 모의고사 바로결제하기 ></a>
                    </div>
                </div>
            </form>

            <div class="txtinfo">
                <div class="tx18 mb20">모의고사 유의사항  (신청자 필독~!!)</div>
                <div>
                - 교육학, 전공 관계 없이 과목별 응시료는 각 10,000원입니다. (ex. 교육학 10,000원 / 전공 10,000원 / 교육학+전공 20,000원)<br>
                - 교육학, 전공 관계 없이 응시하고자 하는 과목을 신청하시면 됩니다.<br>
                - ’문제지/답지(발송)+해설지(등록)’가 기본으로 제공됩니다. 해설 강의 및 채점 등의 서비스는 과목별로 차이가 있으니 아래 상세 내용을 반드시 확인하시기 바랍니다. <br>
                - 결제 비용은 ‘문제 출제+인쇄+답안지+배송료‘를 포함하며, 채점 및 첨삭은 서비스가 가능한 과목의 경우에만 진행됩니다. <br>
                - 모의고사 배송 주소는 결제 시 입력 가능합니다.<br>
                - 결제 후 배송지 수정은 배송 전까지 [내강의실>결제관리>주문/배송조회]에서 가능합니다. <a href="https://www.willbes.net/classroom/order/index" target="_blank" class="addbtn">배송지 수정></a><br>
                <br>
                ※ 과목 별 채점 및 해설 강의 촬영<br>
                - 교육학 이인재 (채점x, 해설강의 o), 교육학 홍의일 (전원 채점 o, 해설강의 x) <br>
                - 국어 송원영, 권보민 (부분 채점 o, 국어/문학 교육론 파트만 ‘결제 기준‘ 선착순 100명 채점 진행됨, 문법은 채점 x /100명 마감 시, 마감 안내 예정, 해설강의 o) <br>
                - 수학 김철홍, 박태영 (‘결제 기준’ 선착순 100명 채점 진행/100명 마감 시, 마감 안내 예정, 해설강의 o)<br>
                - 도덕윤리 (채점x, 해설강의x, 해설 답안 제공)-전기/전자 최우영 (채점x, 해설강의o, 해설 답안 제공)<br>
                - 역사(제출자 전원 채점 진행, 해설강의o)<br>
                - 정컴(제출자 전원 채점 진행, 해설강의o)<br>
                <br>
                ▶ 채점 대상자 분들은 답안을 스캔하시어 메일로 전송해주시면 됩니다. 채점 대상자에게는 별도의 상세 문자 안내가 나갈 예정입니다. <br>
                (해상도가 떨어지는 관계로 촬영본은 인정하지 않음 / 채점은 6월 13일까지 도착한 메일에 한해 진행됩니다. 이후 도착분은 무효 처리)<br>
                <br>
                ※ 모의고사 진행 안내<br>
                - 문제 발송은 6월 7일~9일 사이 과목별로 진행됩니다. 신청 마감 이후 과목별로 상세 안내할 예정입니다.<br>
                - 답안 회수는 채점이 진행되는 과목에 대해서만 진행됩니다. 채점 진행이 없는 과목은 별도로 회수를 하지 않습니다.<br>
                - 해설 강의 촬영은 과목별로 차이가 있으니, 위 과목별 상세 내용을 반드시 확인해주시기 바랍니다.
                </div>
            </div>
        </div>        

        <div class="evtCtnsBox event02">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2202_02.jpg" alt="소문내기 이벤트"/>            
        </div> 

        <div class="evtCtnsBox event03">
            <div class="evtBox">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/2202_03.jpg" alt="이벤트 참여방법"/>
                <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운" style="position: absolute; left: 60.63%; top: 82.92%; width: 16.79%; height: 8.39%; z-index: 2;"></a>
                <a href="#none" title="주소복사하기" style="position: absolute; left: 77.68%; top: 82.92%; width: 16.79%; height: 8.39%; z-index: 2;"></a>
            </div>
            <div class="urlWrap">
                <div class="urladd">홍보 URL 남기기 <input type="text"><a href="#none">주소입력</a></div>
                <div class="evt_table pd20">
                    <table>
                        <col width="8%" />
                        <col  />
                        <col width="10%" />
                        <col width="8%" />
                        <col width="14%" />
                        <tbody>
                            <tr>
                                <td>5</td>
                                <td>https://ssam.local.willbes.net/promotion/index/cate/3140/code/2202</td>
                                <td></td>
                                <td>작*자</td>
                                <td>2021-05-07</td>                            
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>https://ssam.local.willbes.net/promotion/index/cate/3140/code/2202</td>
                                <td></td>
                                <td>작*자</td>
                                <td>2021-05-07</td>                            
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>https://ssam.local.willbes.net/promotion/index/cate/3140/code/2202</td>
                                <td><a href="#none">삭제</a></td>
                                <td>홍길동</td>
                                <td>2021-05-07</td>                            
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>https://ssam.local.willbes.net/promotion/index/cate/3140/code/2202</td>
                                <td></td>
                                <td>작*자</td>
                                <td>2021-05-07</td>                            
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>https://ssam.local.willbes.net/promotion/index/cate/3140/code/2202</td>
                                <td></td>
                                <td>작*자</td>
                                <td>2021-05-07</td>                            
                            </tr>
                        </tbody>
                    </table>

                    <div class="Paging">
                        <ul>
                            <li class="Prev"><a href="#none"><img src="/public/img/willbes/paging/paging_prev.png"> </a></li>
                            <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                            <li><a href="#none">2</a><span class="row-line">|</span></li>
                            <li><a href="#none">3</a><span class="row-line">|</span></li>
                            <li><a href="#none">4</a><span class="row-line">|</span></li>
                            <li><a href="#none">5</a><span class="row-line">|</span></li>
                            <li><a href="#none">6</a><span class="row-line">|</span></li>
                            <li><a href="#none">7</a><span class="row-line">|</span></li>
                            <li><a href="#none">8</a><span class="row-line">|</span></li>
                            <li><a href="#none">9</a><span class="row-line">|</span></li>
                            <li><a href="#none">10</a></li>
                            <li class="Next"><a href="#none"><img src="/public/img/willbes/paging/paging_next.png"> </a></li>
                        </ul>
                    </div>
                </div>  
                <div class="txtinfo">
                    <h4>유의사항</h4>
                    <ul>
                        <li>Sns는 페이스북, 인스타그램, 카카오스토리, 트위터가 해당되며, 카페의 경우 정상적으로 운영 및 활동이 진행되는 곳이어야 합니다. <br>
                        (검색 창에 ‘교원 임용’ 검색 시, 상단에 노출되는 카페)</li>
                        <li>모의고사 이벤트 안내 링크 또는 캡처된 이미지가 포함되어 있을 경우에만 이벤트 참여로 인정됩니다.</li>
                        <li>윌비스 모의고사와 관계가 없는 글이 등록되거나, 삭제 및 비공개로 설정 되어 있는 경우에는 당첨에서 제외될 수 있습니다.</li>
                        <li>당첨자는 6월 1일 게시판을 통해 공지합니다.</li>
                        <li>이벤트 상품은 6월 10일 기프티콘으로 지급될 예정이며, 회원 가입시 등록한 휴대폰 번호로 발송됩니다.<br>
                        (번호가 변경된 경우, 6월 9일까지 수정해 주셔야 합니다.)</li>
                    </ul>                    
                </div>              
            </div>            
        </div>

        <div class="evtCtnsBox event04">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2202_04.jpg"/>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">  
        $(document).ready(function(){
            $('.tabs').each(function(){
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

                    e.preventDefault()}
                )}
            )}
        );
    </script>

@stop