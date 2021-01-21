@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1278px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1278px; position:relative;}

        /************************************************************/

        .btnBox a {width:500px; margin:0 auto; display:inline-block; color:#1c1c1c; background:#d96b30; font-size:30px; font-weight:bold; height:80px; line-height:80px; border-radius:40px;}
        .btnBox a:hover {background:#fff;}
    
        .evtCtnsBox input[type=checkbox] {width:20px; height:20px; vertical-align:middle}

        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2021/01/2034_top_bg.jpg) no-repeat center top;}

        .event01 {background:#1c1c1c; padding-bottom:100px}

        .event02 {background:#e3e4e6}

        .event03 {background:#425cbb; position:relative}
        .event03 .btnBox {position:absolute; bottom:100px; left:50%; margin-left:-210px; z-index:10}
        .event03 .btnBox a {color:#fff; background:#222;}
        .event03 .btnBox a:hover {color:#222; background:#fff;}

        .event04 {background:#e3e4e6; padding:100px 0;}
        .event04Box {width:1100px; margin:0 auto; background:#fff; padding:50px}
        .event04Box h4 {font-size:64px; font-weight:bold; margin-bottom:50px; text-align:center; color:#474747}
        .event04Box h5 {font-size:24px; color:#49569e; text-align:left; padding-bottom:10px; border-bottom:2px solid #49569e; margin:50px 0 20px}
        .event04Box h5 span {font-size:14px; color:#474747; margin-left:20px; font-weight:normal}
        .event04-txt01 {text-align:left; line-height:1.3}
        .event04-txt01 ul {border:1px solid #e4e4e4; padding:20px; height:150px; overflow-y:auto; margin-bottom:10px}
        .event04 li {margin-bottom:10px; list-style-type:decimal; margin-left:20px; text-align:left; font-size:14px}

        .evt_table{margin-bottom:30px;}
        .evt_table table{width:100%; border:1px solid #c1c1c1}
        .evt_table table tr{border-bottom:1px solid #c1c1c1}
        .evt_table table tr:last-of-type{border-bottom:1px solid #c1c1c1}
        .evt_table table thead th,
        .evt_table table tbody th{background:#f5f5f5; color:#333; font-size:16px; font-weight:300; border-bottom:1px solid #c1c1c1; padding:10px}
        .evt_table table tbody td{padding:0 10px; font-size:14px; color:#000; font-weight:300; text-align:left; padding:10px}
        .evt_table table tbody td:last-of-type{border-right:0}
        .evt_table table tbody td.num{color:#999; font-weight:200}
        .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; vertical-align:middle}
        .evt_table input[type=file] {height:30px; color:#494a4d; vertical-align:middle;}

        .evt_tableA {margin-bottom:30px;}
        .evt_tableA table{width:100%;}
        .evt_tableA table tr{border-bottom:1px solid #c1c1c1}
        .evt_tableA table tr:last-of-type{border-bottom:1px solid #c1c1c1}
        .evt_tableA table th {color:#fff; background:#49569e; font-size:16px; font-weight:300; padding:15px 0; text-align:center;}
        .evt_tableA table tbody td{padding:0 10px; font-size:14px; color:#000; text-align:center; padding:10px}
        .evt_tableA table tbody td:nth-child(4){color:#C00; text-align:left}
        .evt_tableA table tbody td:last-child {text-align:left}

        .event04 .btnBox a {color:#fff; background:#49569e;}
        .event04 .btnBox a:hover {background:#27305e;}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}

        .event09 {background:#222; padding:80px 0; line-height:1.4}
        .event09Box {width:1100px; margin:0 auto; padding:50px; background:#f0f1f2; text-align:left; letter-spacing:normal}
        .event09Box {background:#fff; border-bottom:2px solid #49569e}

    </style>

    <div class="p_re evtContent NSK">
        <div class="evtCtnsBox ev01">
        <div class="eventWrap eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2021/01/2034_top.jpg" alt="인강무료체험"/>
        </div>

        <div class="eventWrap event01">
        	<img src="https://static.willbes.net/public/images/promotion/2021/01/2034_01.gif" alt="인강무료체험"/>
            <div class="btnBox">
            	<a href="https://ssam.willbes.net/promotion/index/cate/3137/code/1973" target="_blank">과목별 설명회 자세히 보기</a>
            </div>
        </div>

        <div class="eventWrap event02">
        	<img src="https://static.willbes.net/public/images/promotion/2021/01/2034_02.jpg" alt="인강무료체험"/>
        </div>

        <div class="eventWrap event03">
        	<img src="https://static.willbes.net/public/images/promotion/2021/01/2034_03.jpg" alt="인강무료체험"/>
            <div class="btnBox">
            	<a href="{{ front_url('support/review/index') }}">합격수기 자세히 보기</a>
            </div>
        </div>

        <div class="eventWrap event04">
            <form name="regi_form_register" id="regi_form_register">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <input type="hidden" name="file_chk" value="Y"/>
                <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
                <input type="hidden" id="register_name" name="register_name" value="{{ sess_data('mem_name') }}" readonly="readonly"/>

                <div class="event04Box">
            	<h4>인강 무료체험 신청하기</h4>
                <h5>이벤트참여 대상자</h5>
                <ul></ul>
                	<li><strong>대학(원)의 재학생</strong> (* 재학생 인증파일 제출이 가능한 분)</li>
				  <li><strong>윌비스 임용고시학원에 수강등록이 처음인 분</strong> (* 환불강의 포함)</li>                    
                </ul>
              <h5 class="mT20">이벤트참여에 따른 사전 동의사항 <span>* 재학생 인증 서류에는 성명/학교/학과/학번이 반드시 기재되어 있어야 합니다. (미 충족시 반려될 수 있습니다.)</span></h5>
                <div class="event04-txt01 mB50">
                	<ul>
                    	<li>개인정보 수집 이용 목적 <br> 
                            - 본 이벤트의 대상자(대학교(원)의 재학생) 확인 및 각종 문의사항 응대<br>
                            - 통계분석 및 기타 마케팅에 활용 <br>
                            - 윌비스 임용고시학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공 </li>
                        <li>개인정보 수집 항목 <br>
                            - 필수항목 : 성명, 본사ID, 연락처, 재학중인 학교와 학과(학부), 재학생임을 인증할 수 있는 서류(재학증명서, 성적증명서 등)  </li>
                        <li>개인정보 이용기간 및 보유기간<br>
                            - 본사의 이용 목적 달성되었거나, 신청자의 해지요청 및 삭제요청 시 바로 파기</li> 
                        <li>신청자의 개인정보 수집 및 활용 동의 거부 시<br>
                            - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다. </li>
                        <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.</li>
                        <li>이벤트 진행에 따른 저작물에 대한 저작권은 ㈜윌비스에 귀속됩니다.</li>
                    </ul>
                    <input name="is_chk" type="checkbox" value="Y" id="is_chk"/> <label for="is_chk"> 이벤트참여에 따른 개인정보 및 마케팅 활용 동의하기(필수)</label>
				</div>

              	<h5>재학생 인증 <span>* 윌비스임용의 본 이벤트의 대상자는 임용시험준비를 시작하는 대학교(원)의 재학생입니다.</span></h5>
                <div class="evt_table">
                	<table>
                      <col width="15%" />
                      <col width="20%" />
                      <col width="15%" />
                      <col width="15%"/>
                      <col width="15%" />
                      <col  />
                      <tbody>
                      <tr>
                        <th>이름</th>
                        <td>{{ sess_data('mem_name') }}</td>
                        <th>윌비스ID</th>
                        <td>{{sess_data('mem_id')}}</td>
                        <th>연락처</th>
                        <td><input type="text" id="register_tel" name="register_tel" value="{{ sess_data('mem_phone') }}" maxlength="11" style="width:90%" /></td>
                      </tr>
                      <tr>
                        <th>대학교(원) / <br />
						(학부)학과</th>
                        <td>
                        <input type="text" id="register_data1" name="register_data1" maxlength="50" style="width:90%" />
                        </td>
                        <th>재학생인증<br />파일</th>
                        <td colspan="3">
                        <input type="file" id="attach_file" name="attach_file" style="width:60%"/>&nbsp;&nbsp;
                        <a onclick="javascript:del_file();"><img src="https://static.willbes.net/public/images/promotion/2021/01/2034_btn_del.png" style="vertical-align:middle !important" alt="삭제"></a> <br />
                        *파일의 크기는 2MB까지 업로드 가능, 이미지파일 (jpg, png등) 또는 PDF 파일 첨부
                        </td>
                      </tr>
                      </tbody>
                    </table>
                </div>
              	<h5 class="mB0">강좌 선택<span>* 윌비스임용의 본 이벤트에서 진행하고 있는 인강무료체험은 강좌는 3강좌(교육학1, 전공2)까지만 가능합니다.</span></h5>
                <div class="evt_tableA">
                    <table>
                        <col style="width: 50px"/>
                        <col style="width: 100px"/>
                        <col style="width: 80px"/>
                        <col />
                        <col style="width: 80px"/>
                        <col style="width: 120px"/>
                        <col style="width: 250px"/>
                        <tr>
                            <th>선택</th>
                            <th>과목명</th>
                            <th>교수명</th>
                            <th>강좌명</th>
                            <th>강의수</th>
                            <th>직강시기</th>
                            <th>교재명</th>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][1]['ErIdx'] or ''}}"></td>
                            <td>교육학</td>
                            <td>이인재</td>
                            <td>{{ $arr_base['register_list'][1]['Name'] or ''}}</td>
                            <td>12강</td>
                            <td>2020년 1~2월 </td>
                            <td>모둠 이인재 교육학 논술[이론편]</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][2]['ErIdx'] or ''}}"></td>
                            <td>교육학</td>
                            <td>이인재</td>
                            <td>{{ $arr_base['register_list'][2]['Name'] or ''}}</td>
                            <td>13강</td>
                            <td>2020년 3~4월</td>
                            <td>모둠 이인재 교육학 논술[이론편]</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][3]['ErIdx'] or ''}}"></td>
                            <td>전공국어</td>
                            <td>권보민</td>
                            <td>{{ $arr_base['register_list'][3]['Name'] or ''}}</td>
                            <td>8강</td>
                            <td>2020년 1~2월 </td>
                            <td>프린트</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][4]['ErIdx'] or ''}}"></td>
                            <td>전공국어</td>
                            <td>권보민</td>
                            <td>{{ $arr_base['register_list'][4]['Name'] or ''}}</td>
                            <td>4강</td>
                            <td>2020년 3~4월</td>
                            <td>프린트</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][5]['ErIdx'] or ''}}"></td>
                            <td>전공영어</td>
                            <td>김유석</td>
                            <td>{{ $arr_base['register_list'][5]['Name'] or ''}}</td>
                            <td>9강</td>
                            <td>2020년 1~2월 </td>
                            <td>영미시의 이해 4판 (2020년판)</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][6]['ErIdx'] or ''}}"></td>
                            <td>전공영어</td>
                            <td>김유석</td>
                            <td>{{ $arr_base['register_list'][6]['Name'] or ''}}</td>
                            <td>5강</td>
                            <td>2020년 1~2월 </td>
                            <td>Power Reading Skills 4th&nbsp;</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][7]['ErIdx'] or ''}}"></td>
                            <td>전공영어</td>
                            <td>김유석</td>
                            <td>{{ $arr_base['register_list'][7]['Name'] or ''}}</td>
                            <td>6강</td>
                            <td>2020년 3~4월</td>
                            <td>영미단편소설의 이해 (2020년판)</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][8]['ErIdx'] or ''}}"></td>
                            <td>전공영어</td>
                            <td>김유석</td>
                            <td>{{ $arr_base['register_list'][8]['Name'] or ''}}</td>
                            <td>5강</td>
                            <td>2020년 3~4월</td>
                            <td>Power Prose Writing&nbsp;(프린트 제공)</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][9]['ErIdx'] or ''}}"></td>
                            <td>전공영어</td>
                            <td>김영문</td>
                            <td>{{ $arr_base['register_list'][9]['Name'] or ''}}</td>
                            <td>3강</td>
                            <td>2020년 1~2월 </td>
                            <td>2020) 김영문 영어학개론</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][10]['ErIdx'] or ''}}"></td>
                            <td>전공영어</td>
                            <td>김영문</td>
                            <td>{{ $arr_base['register_list'][10]['Name'] or ''}}</td>
                            <td>4강</td>
                            <td>2020년 3~4월</td>
                            <td>2020) 김영문 영어학개론</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][11]['ErIdx'] or ''}}"></td>
                            <td>전공영어</td>
                            <td>공훈</td>
                            <td>{{ $arr_base['register_list'][11]['Name'] or ''}}</td>
                            <td>4강</td>
                            <td>2020년 1~2월 </td>
                            <td>2020) 공훈 영어학</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][12]['ErIdx'] or ''}}"></td>
                            <td>영어교육론</td>
                            <td>공훈</td>
                            <td>{{ $arr_base['register_list'][12]['Name'] or ''}}</td>
                            <td>4강</td>
                            <td>2020년 1~2월 </td>
                            <td>Principles of Language Learning and Teaching (6판)</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][13]['ErIdx'] or ''}}"></td>
                            <td>전공영어</td>
                            <td>공훈</td>
                            <td>{{ $arr_base['register_list'][13]['Name'] or ''}}</td>
                            <td>4강</td>
                            <td>2020년 3~4월</td>
                            <td>Teaching By    Principles</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][14]['ErIdx'] or ''}}"></td>
                            <td>영어교육론</td>
                            <td>공훈</td>
                            <td>{{ $arr_base['register_list'][14]['Name'] or ''}}</td>
                            <td>4강</td>
                            <td>2020년 3~4월</td>
                            <td>Appliend English    Phonology</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][15]['ErIdx'] or ''}}"></td>
                            <td>전공수학</td>
                            <td>김철홍</td>
                            <td>{{ $arr_base['register_list'][15]['Name'] or ''}}</td>
                            <td>25강</td>
                            <td>2020년 1~2월 </td>
                            <td>미분기하학</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][16]['ErIdx'] or ''}}"></td>
                            <td>수학교육론</td>
                            <td>박태영</td>
                            <td>{{ $arr_base['register_list'][16]['Name'] or ''}}</td>
                            <td>6강</td>
                            <td>2020년 1~2월 </td>
                            <td>수학교육신론 1,2</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][17]['ErIdx'] or ''}}"></td>
                            <td>수학교육론</td>
                            <td>박태영</td>
                            <td>{{ $arr_base['register_list'][17]['Name'] or ''}}</td>
                            <td>5강</td>
                            <td>2020년 3~4월</td>
                            <td>수학교육과정과 교재연구 / 자료</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][18]['ErIdx'] or ''}}"></td>
                            <td>도덕윤리</td>
                            <td>김병찬</td>
                            <td>{{ $arr_base['register_list'][18]['Name'] or ''}}</td>
                            <td>14강</td>
                            <td>2020년 1~2월 </td>
                            <td>서양·동양·한국윤리 (2020년 개정판)</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][19]['ErIdx'] or ''}}"></td>
                            <td>도덕윤리</td>
                            <td>김병찬</td>
                            <td>{{ $arr_base['register_list'][19]['Name'] or ''}}</td>
                            <td>14강</td>
                            <td>2020년 3~4월</td>
                            <td>응용윤리·정치·사회사상 (2020년 개정판)</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][20]['ErIdx'] or ''}}"></td>
                            <td>전공음악</td>
                            <td>다이애나</td>
                            <td>{{ $arr_base['register_list'][20]['Name'] or ''}}</td>
                            <td>22강</td>
                            <td>2020년 1~2월 </td>
                            <td>마인드뱁(한끝맵)/종음셋/한줄정리(기본)</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][21]['ErIdx'] or ''}}"></td>
                            <td>전공음악</td>
                            <td>다이애나</td>
                            <td>{{ $arr_base['register_list'][21]['Name'] or ''}}</td>
                            <td>8강</td>
                            <td>2020년 1~2월 </td>
                            <td>연주자를 위한 조성음악 분석 1,2</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][22]['ErIdx'] or ''}}"></td>
                            <td>전공역사</td>
                            <td>최용림</td>
                            <td>{{ $arr_base['register_list'][22]['Name'] or ''}}</td>
                            <td>17강</td>
                            <td>2020년 1~2월 </td>
                            <td>전공역사 이론서</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][23]['ErIdx'] or ''}}"></td>
                            <td>전공역사</td>
                            <td>최용림</td>
                            <td>{{ $arr_base['register_list'][23]['Name'] or ''}}</td>
                            <td>16강</td>
                            <td>2020년 3~4월</td>
                            <td>임용역사 기출한자</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][24]['ErIdx'] or ''}}"></td>
                            <td>전기전자통신</td>
                            <td>최우영</td>
                            <td>{{ $arr_base['register_list'][24]['Name'] or ''}}</td>
                            <td>18강</td>
                            <td>2020년 1~2월 </td>
                            <td>기초전기전자</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][25]['ErIdx'] or ''}}"></td>
                            <td>정보컴퓨터</td>
                            <td>송광진</td>
                            <td>{{ $arr_base['register_list'][25]['Name'] or ''}}</td>
                            <td>6강</td>
                            <td>2020년 1~3월</td>
                            <td>알기 쉽게 풀어가는 정보컴퓨터 일반과정 Ⅰ,Ⅱ</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][26]['ErIdx'] or ''}}"></td>
                            <td>전공중국어</td>
                            <td>정경미</td>
                            <td>{{ $arr_base['register_list'][26]['Name'] or ''}}</td>
                            <td>26강</td>
                            <td>2020년 1~2월 </td>
                            <td>중국어 어학 기본이론서</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="register_chk[]" value="{{ $arr_base['register_list'][27]['ErIdx'] or ''}}"></td>
                            <td>전공중국어</td>
                            <td>정경미</td>
                            <td>{{ $arr_base['register_list'][27]['Name'] or ''}}</td>
                            <td>23강</td>
                            <td>2020년 1~2월 </td>
                            <td>中国现当代文学史教程외    2종</td>
                        </tr>
                    </table>
                </div>
                <div class="tR">* 강의 신청전 페이지 하단의 유의사항을 반드시 확인하시기 바랍니다. </div>
                <div class="btnBox mt20">
                    <a onclick="javascript:fn_submit();">신청하기</a>
                </div>                 

            </div>
          </form>
        </div><!--//event04-->


        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">[필독] 인강무료체험 이벤트 유의사항</h4>
                <ul>
                    <li>본 이벤트는 교원임용시험을 처음 도전하는 대학교(원) 재학생만 참여 가능한 이벤트 입니다.(기존 수강생은 참여할 수 없습니다)<br />
                        - 본 이벤트는 상단의 “재학생 인증창”에 학교명과 학과명을 표기하고, 인증서류를 스캔하여 전송하는 절차를 진행한 후 참여 가능합니다.<br />
                        - 재학생임을 인증하는 서류로 학생증은 인정되지 않으며, 1개월 이내 발급된 재학증명서, 성적증명서 등 본인이 현재 재학생임을 입증하는 서류여야 합니다.</li>
                    <li>강의제공방식<br />
                        - 재학생 인증절차 후, 체험하고자 하는 강의를 신청하시면 됩니다. (강의는 최대 2개까지만 가능하며, 교육학 1강좌, 전공 1강좌로 제한됩니다)<br />
                        - 강좌별 강의체험기간은 14일이며, 강의시간은 1배수 형태로 제공됩니다.  (※ 1배수란? 강의진행 시간만큼만 재생이 가능합니다) <br />
                        - 일정기간 심사 후, 개별 ID에 신청하신 과목의 2주분량의 강의가 2주간 제공됩니다. </li>
                    <li>본 체험이벤트는 재학중인 학과와 관련된 강좌만 제공받을 수 있습니다. (교육학은 공통)</li>
                    <li>본 인강체험이벤트는 중등과정만 진행됩니다. (유치원, 초등은 진행되지 않습니다)</li>
                    <li>강의체험에 필요한 교재는 별도로 구매하셔야 합니다. </li>
                    <li>무료체험강의는 양도 및 매매가 불가능하며, 위반시 처벌받을 수 있습니다. </li>
                </ul>
            </div>
        </div>

    </div>
    <!-- End Container -->

    <script>
        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            @if(empty($register_count) === false)
                alert('등록된 신청자 정보가 있습니다.');
                return;
            @endif

            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';
            var subject_name = '';
            var subject_name1 = '';
            var subject_name2 = '';

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('이벤트참여에 따른 개인정보 및 마케팅 활용에 동의하셔야 합니다.');
                $regi_form_register.find('input[name="is_chk"]').focus();
                return;
            }

            if (!$regi_form_register.find('input[name="register_tel"]').val()) {
                alert('연락처를 입력해 주세요.');
                $regi_form_register.find('input[name="register_tel"]').focus();
                return;
            }

            if (!$regi_form_register.find('input[name="register_data1"]').val()) {
                alert('학교 및 학과를 입력해 주세요.');
                $regi_form_register.find('input[name="register_data1"]').focus();
                return;
            }

            if (!$regi_form_register.find('input[name="attach_file"]').val()) {
                alert('재학생 인증 파일을 첨부해 주세요.');
                $regi_form_register.find('input[name="attach_file"]').focus();
                return;
            }

            if ($regi_form_register.find('input[name="register_chk[]"]:checked').length != 2) {
                alert('강좌를 2개까지 선택해 주세요.');
                return;
            }

            $regi_form_register.find("input[name^='register_chk']:checked").each(function(k,v) {
                subject_name = $(this).parent().next().text();
                if(subject_name != '교육학'){ // 전공
                    subject_name = subject_name.substr(0,2);
                }

                if(k==0){
                    subject_name1 = subject_name;
                }else{
                    subject_name2 = subject_name;
                }
            });

            if(subject_name1 == subject_name2){
                alert('강좌는 교육학 1개, 전공강좌 2개 총 3개까지 선택 가능합니다.');
                return;
            }

            if (!confirm('신청하시겠습니까?')) { return; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

        function del_file(){
            if(confirm("첨부파일을 삭제 하시겠습니까?")) {
                $("#attach_file").val("");
                return;
            }
        }
    </script>
@stop