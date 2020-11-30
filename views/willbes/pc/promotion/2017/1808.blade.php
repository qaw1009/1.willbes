@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
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
        .btnBox {width:100%; text-align:center}
        .btnBox a {width:420px; margin:0 auto; display:inline-block; color:#fff; background:#b9689d; font-size:24px; font-weight:bold; height:60px; line-height:60px; border-radius:30px; border-bottom:3px solid #682c53; text-align:center}
        .btnBox a:hover {background:#682c53;}

        .eventWrap {width:100%; min-width:1278px; margin:0 auto; text-align:center; font-size:14px; line-height:1.4}
        .eventWrap input[type=checkbox] {width:20px; height:20px; vertical-align:middle}

        .eventTop {background:url("https://static.willbes.net/public/images/promotion/2020/09/200608_top_bg.jpg") repeat-x center top;}

        .event01 {background:url("https://static.willbes.net/public/images/promotion/2020/09/200608_01_bg.jpg") repeat-x center top;}

        .event02 {background:url("https://static.willbes.net/public/images/promotion/2020/09/200608_02_bg.jpg") repeat-x center top;}

        .event03 {background:#633aa6; padding:80px 0;}
        .event03Box {width:1197px; margin:0 auto; background:#fff; padding:50px 0; border-radius:50px}
        .event03Box h4 {font-size:64px; font-weight:bold; margin-bottom:50px; text-align:center; color:#474747}
        .event03Box h5 {font-size:24px; color:#633aa6; text-align:left; padding-bottom:10px; border-bottom:1px solid #633aa6; margin-bottom:20px}
        .event03Box h5 span {font-size:14px; color:#474747; margin-left:20px; font-weight:normal}
        .event03Box h5 strong {color:#633aa6;}
        .event03-txt01 {text-align:left; font-size:14px; width:1050px; margin:20px auto}
        .event03-txt01 ul.info {border:1px solid #e4e4e4; padding:20px; height:150px; overflow-y:auto; margin-bottom:10px}
        .event03-txt01 ul.info li {margin-bottom:10px; list-style-type:decimal; margin-left:20px}

        .event03Box .tabs li {display:inline; float:left; width:50%;}
        .event03Box .tabs li a {display:block; font-size:20px; font-weight:bold; height:60px; line-height:60px; text-align:center; border-bottom:4px solid #fff; background:#bbb; color:#633aa6}
        .event03Box .tabs li:nth-child(1) a {border-right:2px solid #fff}
        .event03Box .tabs li:nth-child(2) a {border-left:2px solid #fff}
        .event03Box .tabs li a:hover,
        .event03Box .tabs li a.active {background:#633aa6; color:#fff; border-bottom:4px solid #633aa6}
        .event03Box .tabs:after {content:""; display:block; clear:both}

        .event03 .btnBox a {width:300px; margin:0 auto; color:#fff; background:#633aa6; font-size:24px; font-weight:bold; height:70px; line-height:70px; border-radius:40px; border-bottom:5px solid #4d2d81; text-align:center}
        .event03 .btnBox a:hover {background:#53abc8;}

        .event04 {background:#232664;}

        .evt_table{margin-bottom:30px;}
        .evt_table table{width:100%; border:1px solid #c1c1c1}
        .evt_table table tr{border-bottom:1px solid #c1c1c1}
        .evt_table table tr:last-of-type{border-bottom:1px solid #c1c1c1}
        .evt_table table thead th,
        .evt_table table tbody th{background:#f6f6f6; color:#333; font-size:16px; font-weight:300; border-bottom:1px solid #c1c1c1; padding:8px}
        .evt_table table tbody td{font-size:14px; color:#000; font-weight:300; text-align:left; padding:8px; border-right:1px solid #c1c1c1;}
        .evt_table table tbody td:last-of-type{border-right:0}
        .evt_table table tbody td.num{color:#999; font-weight:200}
        .evt_table input[type=text] {height:28px; padding:0 10px; color:#494a4d; border:1px solid #b8b8b8; vertical-align:middle}
        .evt_table input[type=file] {height:30px; color:#494a4d; vertical-align:middle}

        .evt_tableA {margin-bottom:30px;}
        .evt_tableA table{width:100%;}
        .evt_tableA table tr{border-bottom:1px solid #c1c1c1}
        .evt_tableA table tr:last-of-type{border-bottom:1px solid #c1c1c1}
        .evt_tableA table thead th,
        .evt_tableA table tbody th{background:#633aa6; font-size:16px; font-weight:300; text-align:center; color:#fff; padding:10px 0;}
        .evt_tableA table tbody td{font-size:14px; color:#000; text-align:center; padding:8px; border-right:1px solid #c1c1c1}
        .evt_tableA table tbody td:last-child {text-align:left; border-right:0}
        .evt_tableA table tbody td.tx-left {text-align:left}
        .evt_tableA table tbody td strong {color:#F00}
        .evt_tableA table tbody td span {border:1px solid #633aa6; color:#633aa6; padding:3px 0; display:block; margin-top:5px}

        .tabCts {padding:30px; background:#fff; font-size:14px}
        .tabCts div {color:#000; font-size:18px; font-weight:bold; margin-bottom:10px}
        .tabCts li { list-style:decimal; margin-left:20px; margin-bottom:10px}

        .programPage a {background:#fff; color:#343434}
        .programPage a:hover,
        .programPage a.active{background:#333; color:#fff}   
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="eventWrap eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2020/09/200608_top.jpg" alt="환승이벤트"/>
        </div>

        <div class="eventWrap event01">
        	<img src="https://static.willbes.net/public/images/promotion/2020/09/200608_01.jpg" alt="환승이벤트"/>
        </div>

        <div class="eventWrap event02">
        	<img src="https://static.willbes.net/public/images/promotion/2020/09/200608_02.jpg" alt="환승이벤트"/>
        </div>

        <div class="eventWrap event03">
            <form name="regi_form_register" id="regi_form_register">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <input type="hidden" name="file_chk" value="Y"/>
                <input type="hidden" id="register_name" name="register_name" value="{{ sess_data('mem_name') }}" readonly="readonly"/>

                <div class="event03Box">
                    <img src="https://static.willbes.net/public/images/promotion/2020/09/200608_03.jpg" alt="환승이벤트"/>
                    <div class="event03-txt01 mB50">
                        <ul class="info">
                            <li>
                            개인정보 수집 이용 목적  <br />
                            - 본 이벤트의 대상자(타학원 수강이력이 있는 수험생) 확인 및 각종 문의사항 응대<br />
                            - 통계분석 및 기타 마케팅에 활용<br />
                            - 윌비스 임용고시학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공<br />
                            </li>
                            <li>개인정보 수집 항목<br />
                            - 필수항목 : 성명, 윌비스 임용 ID, 연락처, 타학원의 수강이력 인증파일 </li>
                            <li>개인정보 이용기간 및 보유기간<br />
                            - 본사의 이용 목적 달성되었거나, 신청자의 해지요청 및 삭제요청 시 바로 파기 </li>
                            <li>신청자의 개인정보 수집 및 활용 동의 거부 시<br />
                            - 개인정보 수집에 동의하지 않으시는 경우 수강료 할인 및 기타 서비스 이용에 제한이 있을 수 있습니다.</li>
                            <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.</li>
                            <li>이벤트 진행에 따른 저작물에 대한 저작권은 ㈜윌비스에 귀속됩니다.</li>
                        </ul>
                        <input name="is_chk" type="checkbox" value="Y" id="is_chk"/> <label for="is_chk"> 이벤트참여에 따른 개인정보 및 마케팅활용 동의하기(필수)</label>

                        <h5 class="mt50">타학원 수강이력 인증 <span>* 타학원 수강이력 인증 파일은 수강기간이 명시되어 있는 <strong>수강증과 수강확인증</strong>만 가능합니다.</span></h5>
                        <div class="evt_table">
                            <table>
                                <col width="190" />
                                <col width="180" />
                                <col width="150" />
                                <col width="200" />
                                <col width="150" />
                                <col width="180" />
                                <tbody>
                                    <tr>
                                        <th>이름</th>
                                        <td>{{ sess_data('mem_name') }}</td>
                                        <th>윌비스ID</th>
                                        <td>{{ sess_data('mem_id') }}</td>
                                        <th>연락처</th>
                                        <td><input type="text" id="register_tel" name="register_tel" value="{{ sess_data('mem_phone') }}" maxlength="11" /></td>
                                    </tr>
                                    <tr>
                                        <th>타학원 수강이력<br> 인증파일</th>
                                        <td colspan="5">
                                            <input type="file" id="attach_file" name="attach_file" style="width:60%"/>&nbsp;&nbsp;
                                            <a href="javascript:del_file();"><img src="https://static.willbes.net/public/images/promotion/2020/09/200608_btn_del.png" style="vertical-align:middle !important" alt="삭제"></a> *10MB 이하의 이미지 파일(png, jpg, gif, bmp)
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" id="event_code" name="event_code" value="200429"/>
                        </div>

                        <h5 class="mT50">강좌선택<span>* 윌비스임용의 환승할인 이벤트는 인강만 진행하고 있습니다. (강의신청시, 확인해 주시기 바랍니다)</span></h5>

                        <div id="tab01">
                            <div class="evt_tableA">
                                <table>
                                    <col width="8%">
                                    <col width="7%">
                                    <col width="5%">
                                    <col/>
                                    <col width="6%">
                                    <col width="16%">
                                    <col width="24%">
                                    <thead>
                                        <tr>
                                            <th>과목명</th>
                                            <th>교수명</th>
                                            <th>선택</th>
                                            <th>강좌명</th>
                                            <th>기간</th>
                                            <th>수강료</th>
                                            <th>교재명</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $prof_idx = ''; @endphp
                                        @if(empty($arr_base['register_prof_group_data']) === false)
                                            @foreach($arr_base['register_prof_group_data'] as $subject_idx => $group_data)
                                                @if(empty($group_data) === false)
                                                    @foreach($group_data as $key => $row)
                                                        <tr>
                                                            @if($key == 0)
                                                                <td rowspan="{{ count($group_data) }}">{{ $row['SubjectName'] }}</td>
                                                            @endif
                                                            @if($prof_idx != $row['ProfIdx'])
                                                                <td rowspan="{{ $row['prod_count'] }}">{{ $row['ProfNickName'] }}</td>
                                                                @php $prof_idx = $row['ProfIdx']; @endphp
                                                            @endif
                                                            <td><input type="checkbox" name="register_chk[]" value="{{ $row['ErIdx'] }}"></td>
                                                            <td class="tx-left">{{ $row['ProdName'] }}</td>
                                                            <td>{{ $row['StudyPeriod'] }}일</td>
                                                            <td>
                                                                @if(empty($row['ProdPriceData']) === false)
                                                                    @foreach($row['ProdPriceData'] as $price_row)
                                                                        {{ number_format($price_row['SalePrice'], 0) }} →
                                                                        <strong>{{ number_format($price_row['RealSalePrice'], 0) }}원</strong>   
                                                                        <span>{{ number_format($price_row['SalePrice'] - $price_row['RealSalePrice'], 0) }}원 할인</span>
                                                                    @endforeach
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(empty($row['ProdBookData']) === false)
                                                                    @foreach($row['ProdBookData'] as $book_row)
                                                                        {{ $book_row['ProdBookName'] }} <br/>
                                                                    @endforeach
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="btnBox">
                                <a href="javascript:fn_submit();">신청하기</a>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div><!--//event04-->

        <div class="eventWrap event04">
        	<img src="https://static.willbes.net/public/images/promotion/2020/09/200608_04.jpg" alt="인강무료체험"/>
        </div>
    </div>
    <!-- End Container -->

    <script>
        var $regi_form_register = $('#regi_form_register');

        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            @if($register_count > 0)
                alert('등록된 신청자 정보가 있습니다.');
                return;
            @endif

            var _url = '{!! front_url('/event/registerStore') !!}';

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

            if (!$regi_form_register.find('input[name="attach_file"]').val()) {
                alert('재학생 인증 파일을 첨부해 주세요.');
                $regi_form_register.find('input[name="attach_file"]').focus();
                return;
            }

            if ($regi_form_register.find('input[name="register_chk[]"]:checked').length == 0) {
                alert('강좌를 선택해 주세요.');
                return;
            }

            if ($regi_form_register.find('input[name="register_chk[]"]:checked').length > 3) {
                alert('강좌를 3개까지 선택해 주세요.');
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