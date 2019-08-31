@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
    <link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">

    <div class="sub_warp">
        <form class="form-table" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" id="GroupCcd" name="GroupCcd" >
            <input type="hidden" name="SiteCode" value="2001" />
            <input type="hidden" name="PredictIdx" value="{{ $idx }}" />
            <input type="hidden" name="mode" value="{{ $mode }}" />
            <input type="hidden" id="PrIdx" name="PrIdx" value="{{ $data['PrIdx'] }}" />
            <input type="hidden" id="TakeMockPart" name="TakeMockPart" value="{{ $data['TakeMockPart'] }}" />

            <div class="sub3_1">
                <h2>기본정보 입력 </h2>
                <div>
                    <table class="boardTypeB">
                        <col width="20%"/>
                        <col width="" />
                        <tr>
                            <th>직렬(지역) 구분</th>
                            <td class="tx-left">
                                <select style="width:120px" onchange="selSerial(this.value,'')" @if($mode=='MOD') disabled @endif >
                                    <option value="">응시직렬</option>
                                    @foreach($serial as $key => $val)
                                        <option value="{{ $key }}" {{ ($data['TakeMockPart'] == $key) ? 'selected="selected"' : '' }}>{{ $val }}</option>
                                    @endforeach
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
                                <span id="area2" style="display:none;">
                                <select title="지역구분" onChange="selArea(this.value,'')">
                                    <option value="">지역구분</option>
                                    <option value="712001" @if(empty($data['TakeArea']) === false && $data['TakeArea'] == 712001) selected @endif>서울</option>
                                </select>
                            </span>
                                <span class="txtRed">※ 응시직렬은 최초 선택/저장 후 수정 불가</span>
                            </td>
                        </tr>
                        <tr id="sel_subject">
                            <th>응시과목</th>
                            <td class="tx-left" id="sel_sbj_info">
                                직렬(지역)구분을 선택해주세요.
                                {{--입력후--}}
                                <div><strong>공통과목 : </strong> <span id="karea1"></span></div>
                                <strong>선택과목(3과목) : </strong>
                                <ul id="karea2">

                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>가산점 여부 </th>
                            <td class="tx-left">
                                <li><input type="radio" name="AddPoint" id="AddPoint1" value="5" @if($mode == 'MOD' && $data['AddPoint'] == '5') checked @endif /> <label for="AddPoint1">5점</label></li>
                                <li><input type="radio" name="AddPoint" id="AddPoint2" value="4" @if($mode == 'MOD' && $data['AddPoint'] == '4') checked @endif /> <label for="AddPoint2">4점</label></li>
                                <li><input type="radio" name="AddPoint" id="AddPoint3" value="3" @if($mode == 'MOD' && $data['AddPoint'] == '3') checked @endif /> <label for="AddPoint3">3점</label></li>
                                <li><input type="radio" name="AddPoint" id="AddPoint4" value="2" @if($mode == 'MOD' && $data['AddPoint'] == '2') checked @endif /> <label for="AddPoint4">2점</label></li>
                                <li><input type="radio" name="AddPoint" id="AddPoint5" value="1" @if($mode == 'MOD' && $data['AddPoint'] == '1') checked @endif /> <label for="AddPoint5">1점</label></li>
                                <li><input type="radio" name="AddPoint" id="AddPoint6" value="0" @if($mode == 'MOD' && $data['AddPoint'] == '0') checked @endif /> <label for="AddPoint6">없음</label></li>
                            </td>
                        </tr>
                        <tr>
                            <th>응시번호</th>
                            <td class="tx-left">
                                <input type="text" name="TakeNumber" id="TakeNumber" maxlength="5" @if($mode == 'MOD') value="{{ $data['TakeNumber'] }}" @endif />
                            </td>
                        </tr>
                        <tr>
                            <th>신광은 경찰팀 수강</th>
                            <td class="tx-left">
                                <li><input type="radio" name="LectureType" id="LectureType1" value="1" @if($mode == 'MOD' && $data['LectureType'] == '1') checked @endif /> <label for="LectureType1">온라인강의</label></li>
                                <li><input type="radio" name="LectureType" id="LectureType2" value="2" @if($mode == 'MOD' && $data['LectureType'] == '2') checked @endif /> <label for="LectureType2">학원강의</label></li>
                                <li><input type="radio" name="LectureType" id="LectureType3" value="3" @if($mode == 'MOD' && $data['LectureType'] == '3') checked @endif /> <label for="LectureType3">온라인+학원강의</label></li>
                                <li><input type="radio" name="LectureType" id="LectureType4" value="4" @if($mode == 'MOD' && $data['LectureType'] == '4') checked @endif /> <label for="LectureType4">미수강</label></li>
                            </td>
                        </tr>
                        <tr>
                            <th>시험준비기간</th>
                            <td class="tx-left">
                                <li><input type="radio" name="Period" id="Period1" value="1" @if($mode == 'MOD' && $data['Period'] == '1') checked @endif /> <label for="Period1">6개월 이하</label></li>
                                <li><input type="radio" name="Period" id="Period2" value="2" @if($mode == 'MOD' && $data['Period'] == '2') checked @endif /> <label for="Period2">1년 이하</label></li>
                                <li><input type="radio" name="Period" id="Period3" value="3" @if($mode == 'MOD' && $data['Period'] == '3') checked @endif /> <label for="Period3">2년 이하</label></li>
                                <li><input type="radio" name="Period" id="Period4" value="4" @if($mode == 'MOD' && $data['Period'] == '4') checked @endif /> <label for="Period4">2년 이상</label></li>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="btns">
                    @if($mode != 'MOD')
                        <a href="javascript:js_submit();">저장</a>
                    @endif
                </div>
            </div>
        </form>

        <div class="sub3_1">
            <h2>성적 입력/확인</h2>
            {{--성적채점--}}
            <div>
                @if($scoreIs == 'N')
                    <div class="sub3_1_txt" id="maskArea" style="display:none;">
                        <div>
                            <p>
                                {{--4월 27일 11시40분까지--}}
                                {{--<img src="https://static.willbes.net/public/images/promotion/2019/04/1211_txt1.png" alt="시험 종료 후 1~2시간 내에 오픈될 예정입니다."></p>--}}

                                {{--4월 27일 11시40분이후--}}
                                <img src="https://static.willbes.net/public/images/promotion/2019/04/1211_txt2.png" alt="먼저 기본정보를 입력 및 저장 해 주세요">

                            </p>
                        </div>
                    </div>

                    <ul class="tabSt1">
                        <li><a id='t1' href="javascript:tabSel(1)" class="active">일반채점</a></li>
                        <li><a id='t2' href="javascript:tabSel(2)">빠른채점 <img src="https://static.willbes.net/public/images/promotion/2019/04/1211_iconHot.gif" alt="추천"/></a></li>
                        <li><a id='t3' href="javascript:tabSel(3)">직접입력</a></li>
                    </ul>
                    <input type="hidden" id="selType" value="1"/>

                    <div  id='gradeArea1'>
                        <div class="mt10 mb10">
                            {{--일반채점--}}
                            <span id="text_1">'일반채점'은 문제창에서 바로 문제를 확인하면서 OMR 정답지에 답을 체크하는 방식입니다.<br /></span>
                            {{--빠른채점--}}
                            <span id="text_2">'빠른채점'은 시험지를 다운받아 문제를 풀어본 후, 문항별 선택 번호만 입력하는 방식입니다.<br /></span>
                            {{--직접입력--}}
                            <span id="text_3">'직접입력'은 별도 채점 없이 본인의 점수를 직접 입력하는 방식입니다.<br /></span>
                            * 아크로뱃 리더 프로그램 설치 필요 <a href="https://get.adobe.com/reader/?loc=kr" target="_blank">[설치하기]</a>
                        </div>
                        <table class="boardTypeB">
                            <col width="25%" />
                            <col width="25%" />
                            <col width="25%" />
                            <col width="25%" />
                            <tr>
                                <th scope="col">과목</th>
                                <th scope="col">채점</th>
                                <th scope="col">원점수</th>
                                <th scope="col">조정점수</th>
                            </tr>
                            @foreach($subject_list as $key => $val)
                                <tr>
                                    <td>{{ $val['CcdName'] }}</td>
                                    @if($loop->first)<td rowspan="5"><a href="javascript:popWindow({{ $idx }})" class="type1">채점하기 ▶</a></td>@endif
                                    <td>미입력</td>
                                    <td>미입력</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @else
                    {{--성적확인--}}
                    <div id='gradeArea2'>
                        <table class="boardTypeB">
                            <col width="25%" />
                            <col width="25%" />
                            <col width="25%" />
                            <col width="25%" />
                            <tr>
                                <th scope="col">과목</th>
                                <th scope="col">성적확인</th>
                                <th scope="col">원점수</th>
                                <th scope="col">조정점수</th>
                            </tr>

                            @foreach($subject_list as $key => $val)
                                <tr>
                                    <td>{{ $val['CcdName'] }}</td>
                                    @if($loop->first)<td rowspan="5"><a href="javascript:resultPop({{ $idx }})" class="type1">확인 ▶</a></td>@endif
                                    <td>{{ (empty($scoredata['PpIdx'][$key]) === true ? '미입력' : $scoredata['score'][$key]) }}</td>
                                    <td>
                                        {{(empty($scoredata['PpIdx'][$key]) === true) ? '미입력' :  (empty($scoredata['addscore'][$key]) === true ? '집계중' : $scoredata['addscore'][$key])}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="btns">
                            <a href="javascript:moveMyPredict();">나의 합격예측 바로가기 &gt;</a>
                            <a href="javascript:examDeleteAjax();" class="btn2">재 채점하기 &gt;</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <script>
            var $regi_form = $('#regi_form');
            var mode = '{{ $mode }}';
            var win = '';
            var openYn = '{{ $openYn }}';
            var scoreType = '{{ $scoreType }}';

            $( document ).ready( function() {
                $("#text_2").hide();
                $("#text_3").hide();

                if(mode == 'MOD'){
                    selSerial('{{ $data['TakeMockPart'] }}', '{{ $data['SubjectCode'] }}');
                }

                if(openYn == 'N' || $('#PrIdx').val() == ''){
                    $('#maskArea').show();
                }
            });

            function moveMyPredict(){
                {{--alert('안정화 작업중입니다!');--}}
                parent.location.replace('{{ front_url('/promotion/index/cate/3001/code/1353') }}');
            }

            function examDeleteAjax() {
                if (confirm('채점취소시 기존의 성적모든데이터는 삭제됩니다. \n 채점취소 하시겠습니까?')) {
                    var _url = '{{ front_url('/predict/examDeleteAjax') }}';
                    ajaxSubmit($regi_form, _url, function (ret) {
                        if (ret.ret_cd) {
                            alert(ret.ret_msg);
                            location.reload();
                        }
                    }, showValidateError, null, false, 'alert');
                }
            }

            function tabSel(num){
                $('#selType').val(num);
                $('#t1').removeClass('active');
                $('#t2').removeClass('active');
                $('#t3').removeClass('active');
                $("#text_1").hide();
                $("#text_2").hide();
                $("#text_3").hide();

                $('#t'+num).addClass('active');
                $("#text_"+num).show();
            }

            function popWindow(PredictIdx){
                var type = $('#selType').val();
                var _url = "";
                var width = "";
                var height = "";

                if (win == '') {
                    if(type == 1){
                        _url = '{{ front_url('/predict/popwin1/?PredictIdx=') }}' + PredictIdx + '&pridx='+$('#PrIdx').val();
                        width = 1300;
                        height = 900;
                    } else if(type == 2){
                        _url = '{{ front_url('/predict/popwin2/?PredictIdx=') }}' + PredictIdx + '&pridx='+$('#PrIdx').val();
                        width = 680;
                        height = 700;
                    } else {
                        _url = '{{ front_url('/predict/popwin3/?PredictIdx=') }}' + PredictIdx + '&pridx='+$('#PrIdx').val();
                        width = 600;
                        height = 420;
                    }
                    win = window.open(_url, 'predictpop', 'width=' + width + ', height=' + height + ', scrollbars=yes, resizable=yes');
                    win.focus();
                }else{
                    if(win.closed){
                        if(type == 1){
                            _url = '{{ front_url('/predict/popwin1/?PredictIdx=') }}' + PredictIdx + '&pridx='+$('#PrIdx').val();
                            width = 1300;
                            height = 900;
                        } else if(type == 2){
                            _url = '{{ front_url('/predict/popwin2/?PredictIdx=') }}' + PredictIdx + '&pridx='+$('#PrIdx').val();
                            width = 680;
                            height = 700;
                        } else {
                            _url = '{{ front_url('/predict/popwin3/?PredictIdx=') }}' + PredictIdx + '&pridx='+$('#PrIdx').val();
                            width = 600;
                            height = 420;
                        }
                        win = window.open(_url, 'predictpop', 'width=' + width + ', height=' + height + ', scrollbars=yes, resizable=yes');
                        win.focus();
                    } else {
                        //alert('팝업떠있음');
                    }
                }
            }

            function resultPop(PredictIdx){
                if(scoreType == 'DIRECT'){
                    alert('점수를 직접입력한 경우, 정오표를 제공하지 않습니다.');
                    return ;
                }
                _url = '{{ front_url('/predict/popwin4/?PredictIdx=') }}' + PredictIdx + '&pridx='+$('#PrIdx').val();
                width = 1300;
                height = 900;
                win = window.open(_url, 'resultpop', 'width=' + width + ', height=' + height + ', scrollbars=yes, resizable=yes');
                win.focus();
            }

            function selchk(obj){
                var cknum = $("input[name='Ssubject[]']:checked").length;
                if(cknum == 4){
                    alert('선택과목은 3개까지 선택할 수 있습니다.');
                    obj.checked = false;
                    return;
                }
            }

            function selArea(obj){
                $('#TakeArea').val(obj);
            }

            // 문항정보필드 등록,수정
            function js_submit() {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','N') !!}
                if($("#TakeMockPart").val() != '800'){
                    if($("input[name='Ssubject[]']:checked").length != 3){
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
                } else if($("#TakeMockPart").val() == '800') {
                    if(takenum<50001||takenum>59999) {
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
                    _url = '{{ site_url('/predict/storeV2') }}';
                } else {
                    _url = '{{ site_url('/predict/updateV2') }}';
                }

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        //$('#PrIdx').val(ret.ret_data.dt.idx);
                        alert(ret.ret_msg);
                        location.reload();
                    }
                }, showValidateError, null, false, 'alert');
            }

            function selSerial(num,num2){
                $("#TakeMockPart").val(num);
                if(num != ''){
                    $('#GroupCcd').val(num);
                } else {
                    $('#GroupCcd').val('');
                    $('#karea1').html('');
                    $('#karea2').html('');
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
                                        str2 += "<li><input type='checkbox' name='Ssubject[]' id='Ssubject"+i+"' value='" + d.data[i].Ccd + "' onClick='selchk(this)'"+ chkyn +"><label for='Ssubject"+i+"'>" + d.data[i].CcdName + "</label></li>";
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
                                        str2 += "<li><input type='checkbox' name='Ssubject[]' id='Ssubject"+i+"' value='" + d.data[i].Ccd + "' onClick='selchk(this)'><label for='Ssubject"+i+"'>" + d.data[i].CcdName + "</label></li>";
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