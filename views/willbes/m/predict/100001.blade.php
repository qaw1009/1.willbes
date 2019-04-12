@extends('html.m.layouts.master')

@section('content')
    <!-- Container -->
    <form class="form-table" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" id="GroupCcd" name="GroupCcd" >
        <input type="hidden" name="SiteCode" value="2001" />
        <input type="hidden" name="ProdCode" value="{{ $idx }}" />
        <input type="hidden" name="mode" value="{{ $mode }}" />
        @if($mode == 'MOD')
            <input type="hidden" name="PrIdx" value="{{ $data['PrIdx'] }}" />
        @endif
        <input type="hidden" id="TakeMockPart" name="TakeMockPart" value="{{ $data['TakeMockPart'] }}" />

        <div id="Container" class="Container NG c_both">
            <div class="predictWrap">
                <div class="willbes-Tit">
                    합격예측 풀서비스 <span class="NGEB">사전예약</span>
                </div>
                <div class="marktxt2">빠르고 간편한 모바일 전용 채점 서비스 입니다.</div>
                <div class="tg-note">
                    <div class="tg-tit"> <a href="#none">채점 시 유의사항<img src="{{ img_url('m/mypage/icon_arrow_off_white.png') }}"></a></div>
                    <div class="tg-cont">
                        <ul>
                            <li>
                                성적 신뢰도를 위해 최초채점을 제외하고 2회까지만 재채점을 통해 수정이 가능합니다.
                            </li>
                            <li>
                                채점하는 방식은 본인의 상황에 맞게 선택할 수 있습니다.<br />
                                - '일반채점' : 문제창에서 바로 문제를 확인하면서 OMR 정답지에 답을 체크 (PC)<br />
                                - '빠른채점'은 시험지를 다운받아 문제를 풀어본 후, 문항별 선택 번호만 입력 (PC/모바일)<br />
                                - '직접입력'은 별도 채점 없이 본인의 점수를 직접 입력 (PC/모바일)
                            </li>
                            <li>
                                채점 후 ‘완료’ 버튼을 반드시 눌러야 전형정보 관리에 성적이 반영됩니다.
                            </li>
                            <li>
                                기본정보는 사전예약 기간에만(~4/26) 수정이 가능하며, 본 서비스 오픈 후에는(4/27~) 수정이 불가합니다.
                            </li>
                            <li>
                                자세한 합격예측 분석 데이터는 PC버전에서 확인 가능합니다.
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- //tg-note -->

                <div class="markMbtn2">
                    <a href="#none">기본정보입력</a>
                    <a href="javascript:alert('4월27일(토) 오픈예정입니다.')" class="btn2">채점 및 성적확인</a>
                    {{-- 27일부터 보이는 버튼
                    <a href="javascript:alert('기본정보를 저장하고 채점해주세요.');" class="btn2">채점 및 성적확인</a>
                    --}}
                </div>

                <h4 class="markingTit1">기본정보입력</h4>
                <form name="frm"  id="frm" action="" method="post">
                    <table cellspacing="0" cellpadding="0" class="table_type">
                        <col width="20%" />
                        <col width="*" />
                        <tr>
                            <th>직렬(직류)</th>
                            <td>
                                <select title="응시직렬" onChange="selSerial(this.value,'')" @if($mode=='MOD') disabled @endif>
                                    <option value="">응시직렬</option>
                                    @if($mode == 'NEW')
                                        @foreach($serial as $val)
                                            <option value="{{ $val['Ccd'] }}">{{ $val['CcdName'] }}</option>
                                        @endforeach
                                    @else
                                        @foreach($serial as $val)
                                            <option value="{{ $val['Ccd'] }}" @if($data['TakeMockPart'] == $val['Ccd']) selected @endif>{{ $val['CcdName'] }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <input type="hidden" id="TakeArea" name="TakeArea" @if($mode == 'MOD') value="{{ $data['TakeArea'] }}" @endif/>
                                <span id="area1">
                                    <select title="지역구분" onChange="selArea(this.value)">
                                        <option value="">지역구분</option>
                                        @if($mode == 'NEW')
                                            @foreach($area as $val)
                                                @if($val['Ccd'] != '712018')
                                                    <option value="{{ $val['Ccd'] }}">{{ $val['CcdName'] }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach($area as $val)
                                                @if($val['Ccd'] != '712018')
                                                    <option value="{{ $val['Ccd'] }}" @if($data['TakeArea'] == $val['Ccd']) selected @endif>{{ $val['CcdName'] }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </span>
                                <span id="area2" style="display:none;"  onChange="selArea(this.value,'')">
                                    <select title="지역구분">
                                        <option value="">지역구분</option>
                                        <option value="712001">서울</option>
                                    </select>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>응시과목</th>
                            <td>
                                {{--직렬/지역 선택 전--}}
                                직렬(지역)구분을 선택해주세요.
                                {{--직렬/지역 선택 후--}}
                                <div>
                                    <p>공통과목 : <span id="karea1"></span></p>
                                    <p id="sel3">선택과목(3과목)를 체크해주세요.</p>
                                    <ul class="sel_info" id="karea2">

                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>가산점 여부</th>
                            <td>
                                <ul class="sel_info">
                                    <li><input type="radio" name="AddPoint" id="AddPoint1" value="5" @if($mode == 'MOD' && $data['AddPoint'] == '5') checked @endif /> <label for="AddPoint1">5점</label></li>
                                    <li><input type="radio" name="AddPoint" id="AddPoint2" value="4" @if($mode == 'MOD' && $data['AddPoint'] == '4') checked @endif /> <label for="AddPoint2">4점</label></li>
                                    <li><input type="radio" name="AddPoint" id="AddPoint3" value="3" @if($mode == 'MOD' && $data['AddPoint'] == '3') checked @endif /> <label for="AddPoint3">3점</label></li>
                                    <li><input type="radio" name="AddPoint" id="AddPoint4" value="2" @if($mode == 'MOD' && $data['AddPoint'] == '2') checked @endif /> <label for="AddPoint4">2점</label></li>
                                    <li><input type="radio" name="AddPoint" id="AddPoint5" value="1" @if($mode == 'MOD' && $data['AddPoint'] == '1') checked @endif /> <label for="AddPoint5">1점</label></li>
                                    <li><input type="radio" name="AddPoint" id="AddPoint6" value="0" @if($mode == 'MOD' && $data['AddPoint'] == '0') checked @endif /> <label for="AddPoint6">없음</label></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>시험응시번호</th>
                            <td>
                                <label>
                                    <input type="text" name="TakeNumber" id="TakeNumber" maxlength="5" @if($mode == 'MOD') value="{{ $data['TakeNumber'] }}" @endif />
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th>신광은팀<br />수강 </th>
                            <td>
                                <ul class="sel_info">
                                    <li><input type="radio" name="LectureType" id="LectureType1" value="1" @if($mode == 'MOD' && $data['LectureType'] == '1') checked @endif /> <label for="LectureType1">온라인강의</label></li>
                                    <li><input type="radio" name="LectureType" id="LectureType2" value="2" @if($mode == 'MOD' && $data['LectureType'] == '2') checked @endif /> <label for="LectureType2">학원강의</label></li>
                                    <li><input type="radio" name="LectureType" id="LectureType3" value="3" @if($mode == 'MOD' && $data['LectureType'] == '3') checked @endif /> <label for="LectureType3">온라인+학원강의</label></li>
                                    <li><input type="radio" name="LectureType" id="LectureType4" value="4" @if($mode == 'MOD' && $data['LectureType'] == '4') checked @endif /> <label for="LectureType4">미수강</label></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>시험<br />준비 기간 </th>
                            <td>
                                <ul class="sel_info">
                                    <li><input type="radio" name="Period" id="Period1" value="1" @if($mode == 'MOD' && $data['Period'] == '1') checked @endif /> <label for="Period1">6개월 이하</label></li>
                                    <li><input type="radio" name="Period" id="Period2" value="2" @if($mode == 'MOD' && $data['Period'] == '2') checked @endif /> <label for="Period2">1년 이하</label></li>
                                    <li><input type="radio" name="Period" id="Period3" value="3" @if($mode == 'MOD' && $data['Period'] == '3') checked @endif /> <label for="Period3">2년 이하</label></li>
                                    <li><input type="radio" name="Period" id="Period4" value="4" @if($mode == 'MOD' && $data['Period'] == '4') checked @endif /> <label for="Period4">2년 이상</label></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>* 응시표 인증파일 - (jpg, gif, png 파일만 등록 가능)</th>
                            <td>
                                <input type="file" name="RealConfirmFile" id="RealConfirmFile" style="width:300px">
                                @if($mode == 'MOD' && !empty($data['ConfirmFile']))
                                    &nbsp;<a href="{{ $filepath.$data['RealConfirmFile'] }}" target="_blank" class="blue underline-link">{{ $data['ConfirmFile'] }}</a>
                                @endif
                            </td>
                        </tr>
                    </table>
                </form>

                <div class="markSbtn1">
                    <a href="javascript:js_submit();">@if($mode == 'MOD')수정@else저장@endif</a>
                </div>
            </div>
            <!-- predictWrap //-->

            <div class="goTopbtn">
                <a href="javascript:link_go();">
                    <img src="{{ img_url('m/main/icon_top.png') }}">
                </a>
            </div>
            <!-- Topbtn -->

        </div>
    </form>
    <!-- End Container -->

    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var mode = '{{ $mode }}';

        $( document ).ready( function() {
            if(mode == 'MOD'){
                selSerial('{{ $data['TakeMockPart'] }}', '{{ $data['SubjectCode'] }}');
            }
        });

        function selchk(obj){
            var cknum = $("input:checkbox[id=Ssubject]:checked").length;
            if(cknum == 4){
                alert('선택과목은 3개까지 선택할 수 있습니다.');
                obj.checked = false;
                return;
            }
        }

        function selArea(obj){
            $('#TakeArea').val(obj);
        }

        $(function() {
            $('.tg-tit a').click(function() {
                var $lec_buy_table = $('.tg-cont');

                if ($lec_buy_table.is(':hidden')) {
                    $lec_buy_table.show().css('visibility','visible');
                    $('.tg-tit a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_off_white.png');
                } else {
                    $lec_buy_table.hide().css('visibility','hidden');
                    $('.tg-tit a img').attr('src','/public/img/willbes/m/mypage/icon_arrow_on_white.png');
                }
            });
        });

        // 문항정보필드 등록,수정
        function js_submit() {

            if($("#TakeMockPart").val() != '300'){
                if($("input:checkbox[id=Ssubject]:checked").length != 3){
                    alert('선택과목은 3개를 선택해 주세요.');
                    return ;
                }
            }

            var takenum = '';
            takenum = $('#TakeNumber').val();
            takenum = parseInt(takenum);
            if($("#TakeMockPart").val() == '100') {
                if(takenum<10001||takenum>19999) {
                    alert('올바른 응시번호가 아닙니다.');
                    return;
                }
            } else if($("#TakeMockPart").val() == '200') {
                if(takenum<20001||takenum>29999) {
                    alert('올바른 응시번호가 아닙니다.');
                    return;
                }
            } else if($("#TakeMockPart").val() == '300') {
                if(takenum<30001||takenum>39999) {
                    alert('올바른 응시번호가 아닙니다.');
                    return;
                }
            } else {
                if(takenum<40001||takenum>49999) {
                    alert('올바른 응시번호가 아닙니다.');
                    return;
                }
            }

            var _url = '';
            if(mode == 'NEW'){
                _url = '{{ site_url('/predict/store') }}';
            } else {
                _url = '{{ site_url('/predict/update') }}';
            }
            //
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.href= '{{ site_url('/m/promotion/index/cate/3001/code/1187') }}';
                }
            }, showValidateError, null, false, 'alert');
        }

        function selSerial(num, num2){
            $("#TakeMockPart").val(num);
            if(num != ''){
                $('#GroupCcd').val(num);
            } else {
                $('#GroupCcd').val('');
                $('#karea1').html('');
                $('#karea2').html('');
            }

            if(num == '300'){
                $('#sel3').hide();
            } else {
                $('#sel3').show();
            }

            if(num == '400'){
                $('#area1').hide();
                $('#area2').show();
            } else {
                $('#area1').show();
                $('#area2').hide();
            }

            if(num != null){
                url = "{{ site_url("/predict/getSerialAjax") }}";
                data = $('#regi_form').serialize();

                sendAjax(url,
                    data,
                    function(d){
                        if(num2 != ''){
                            var arrnum2 = num2.split(',');
                            var str = '';
                            var str2 = '';
                            for(var i=0; i < d.data.length; i++){
                                if(d.data[i].Type == 'P'){
                                    if(i == 0){
                                        str += d.data[i].CcdName + "<input type='hidden' name='Psubject[]' value='" + d.data[i].Ccd + "' /> ";
                                    } else {
                                        str += "," + d.data[i].CcdName + "<input type='hidden' name='Psubject[]' value='" + d.data[i].Ccd + "' /> ";
                                    }
                                } else {
                                    var chkyn = '';
                                    for (var j = 0; j < arrnum2.length; j++) {
                                        if(d.data[i].Ccd == arrnum2[j]){
                                            chkyn = 'checked';
                                        }
                                    }
                                    str2 += "<li><input type='checkbox' name='Ssubject[]' id='Ssubject' value='" + d.data[i].Ccd + "' onClick='selchk(this)'"+ chkyn +"><label for='Ssubject"+i+"'>" + d.data[i].CcdName + "</label></li>";
                                }
                            }

                            $('#karea1').html(str);
                            $('#karea2').html(str2);
                        } else {
                            var str = '';
                            var str2 = '';
                            for(var i=0; i < d.data.length; i++){
                                if(d.data[i].Type == 'P'){
                                    if(i == 0){
                                        str += d.data[i].CcdName + "<input type='hidden' name='Psubject[]' value='" + d.data[i].Ccd + "' /> ";
                                    } else {
                                        str += "," + d.data[i].CcdName + "<input type='hidden' name='Psubject[]' value='" + d.data[i].Ccd + "' /> ";
                                    }
                                } else {
                                    str2 += "<li><input type='checkbox' name='Ssubject[]' id='Ssubject' value='" + d.data[i].Ccd + "' onClick='selchk(this)'><label for='Ssubject"+i+"'>" + d.data[i].CcdName + "</label></li>";
                                }
                            }

                            $('#karea1').html(str);
                            $('#karea2').html(str2);
                        }
                    },
                    function(ret, status){
                        //alert(ret.ret_msg);
                    }, true, 'POST', 'json');
            }
        }
    </script>
@stop