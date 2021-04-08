<div class="willbes-Layer-PassBox willbes-Layer-PassBox1100 h800 fix abs">
    <a class="closeBtn" href="#none" onclick="closeWin('supplementLec')">
        <img src="{{ img_url('sub/close.png') }}">
    </a>
    <div>
        <div class="Layer-Tit tx-dark-black NG">보강동영상 신청</div>
        <div class="lecMoreWrap of-hidden h700">
            <div class="PASSZONE-List widthAutoFull">
                <div class="PASSZONE-Lec-Section">
                    <div class="strong mt25 h22">
                        · 회원정보
                    </div>

                    <div class="LeclistTable bdt-gray mt10 mb30 c_both">
                        <table class="listTable passTable-Select under-gray tx-gray">
                            <colgroup>
                                <col style="width: 20%;">
                                <col style="width: 30%;">
                                <col style="width: 20%;">
                                <col style="width: 30%;">
                            </colgroup>
                            </tbody>
                            <tr>
                                <th>회원명</th>
                                <td>{{sess_data('mem_name')}}</td>
                                <th>아이디</th>
                                <td>{{sess_data('mem_id')}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="strong h22">
                        · 강좌정보
                    </div>

                    <div class="LeclistTable bdt-gray mt10 mb30 c_both">
                        <table class="listTable passTable-Select under-gray tx-gray">
                            <colgroup>
                                <col style="width: 20%;">
                                <col style="width: 30%;">
                                <col style="width: 20%;">
                                <col style="width: 30%;">
                            </colgroup>
                            </tbody>
                            @if($lec['LearnPatternCcd'] == '615007')
                            <tr>
                                <th>종합반명</th>
                                <td colspan="3"> {{$lec['ProdName']}}</td>
                            </tr>
                            @endif
                            <tr>
                                <th>과목</th>
                                <td>{{$lec['SubjectName']}}</td>
                                <th>강사명</th>
                                <td>{{$lec['wProfName']}}</td>
                            </tr>
                            <tr>
                                <th>강좌명</th>
                                <td colspan="3"> {{$lec['subProdName']}}</td>
                            </tr>
                            {{--<tr>
                                <th>보강강좌명</th>
                                <td colspan="3" class="tx-blue">{{$bogang_lec['ProdName']}}</td>
                            </tr> --}}
                            </tbody>
                        </table>
                    </div>


                    <div class="strong h22 tx-blue">
                        · 보강동영상 신청하기
                    </div>

                    <div class="LeclistTable bdt-gray mt10 mb30 c_both">
                        <form name="bogangForm" id="bogangForm">
                            {!! csrf_field() !!}
                            {!! method_field('POST') !!}
                            <input type="hidden" name="o" value="{{$lec['OrderIdx']}}" />
                            <input type="hidden" name="op" value="{{$lec['OrderProdIdx']}}" />
                            <input type="hidden" name="p" value="{{$lec['ProdCode']}}" />
                            <input type="hidden" name="ps" value="{{$lec['ProdCodeSub']}}" />
                            <input type="hidden" name="t" value="{{$lec['LearnPatternCcd'] == '615007' ? 'P' : 'S'}}" />
                        <table class="listTable passTable-Select under-gray tx-gray">
                            <colgroup>
                                <col style="width: 20%;">
                                <col>
                            </colgroup>
                            </tbody>
                            <tr>
                                <th>신청현황</th>
                                <td class="w-info tx-left pl10">
                                    [총 신청 가능 개수] {{$lec['SuppAbleCnt']}}개 <span class="row-line">|</span>
                                    [사용개수] {{count($bogang_list)}}개 <span class="row-line">|</span>
                                    [남은개수] {{$lec['SuppAbleCnt'] - count($bogang_list)}}개</td>
                            </tr>
                            @if($lec['SuppAbleCnt'] > count($bogang_list))
                            <tr>
                                <th>수업불참강의</th>
                                <td class="w-info tx-left pl10">
                                    <select id="u" name="u" title="" class="seleProcess">
                                        <option value="">강의선택</option>
                                        @foreach($bogang_curr as $row)
                                            <option value="{{$row['UnitArr']}}">{{$row['UnitName']}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>불참사유</th>
                                <td class="w-info tx-left pl10"><textarea class="h55" name="reason" id='reason' maxlength="100"></textarea></td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="mt10 mb10 lh1_5">
                            ⓘ 주의사항<br>
                            - 보강동영상 1회 신청 시 1회차 신청만 가능합니다.<br>
                            - 보강동영상은 {{$lec['SuppPeriod']}}일 기간으로 제공되며, 수강시작을 하지 않으면 7일 이후에 자동으로 수강시작됩니다.<br>
                            - 신청한 보강동영상은 내강의실 > 학원강좌 > 보강동영상 메뉴에서 확인 가능합니다.<br>
                        </div>
                        @if($lec['SuppAbleCnt'] > count($bogang_list))
                            <div class="bBox d_block btnAuto250 mt20 tx-white tx14 strong blueBox"><a href="javascript:;" onclick="fnTake();">보강동영상 신청 ></a></div>
                        @endif
                        </form>
                    </div>

                    <div class="strong h22">
                        [보강동영상 신청이력]
                    </div>

                    <div class="LeclistTable bdt-gray mt10 mb30 c_both">
                        <table class="listTable passTable-Select under-gray tx-gray">
                            <colgroup>
                                <col style="width: 10%;">
                                <col style="width: 20%;">
                                <col style="width: 15%;">
                                <col>
                            </colgroup>
                            <thead>
                            <tr>
                                <th>NO</th>
                                <th>신청일</th>
                                <th>신청자</th>
                                <th>불참사유</th>
                            </tr>
                            </thead>
                            </tbody>
                            @foreach($bogang_list as $key => $row)
                            <tr>
                                <td>{{count($bogang_list) - $key}}</td>
                                <td>{{$row['OrderDate']}}</td>
                                <td>{{sess_data('mem_name')}}</td>
                                <td>{{$row['AdminEtcReason']}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- PASSZONE-List -->
        </div>
    </div>
</div>
<script>
    function fnTake()
    {
        if($.trim($('#reason').val().trim()) == ''){
            alert('불참사유를 입력해주십시요.');
            return;
        }

        if($('#u').val() == ''){
            alert('신청할 회차를 선택해주십시요.');
            return;
        }

        url = "{{ site_url("/classroom/off/takeBogang/") }}";
        data = $('#bogangForm').serialize();

        sendAjax(url,
            data,
            function(d){
                alert(d.ret_msg);
                fnBogang('{{$lec['OrderIdx']}}', '{{$lec['OrderProdIdx']}}', '{{$lec['ProdCode']}}', '{{$lec['ProdCodeSub']}}', '{{$lec['LearnPatternCcd'] == '615007' ? 'P' : 'S'}}')
            },
            function(ret, status){
                alert(ret.ret_msg);
            }, true, 'POST', 'json');
    }
</script>