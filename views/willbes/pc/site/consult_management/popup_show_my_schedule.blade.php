<div id="MySchedule" class="willbes-Layer-PassBox willbes-Layer-PassBox740 h800 abs" style="display: block;">
    <form id="my_regi_form" name="my_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
    </form>
    <a class="closeBtn" href="#none" onclick="closeWin('{{ $arr_input['ele_id'] }}');">
        <img src="{{ img_url('sub/close.png') }}">
    </a>
    <div class="Layer-Tit NG tx-dark-black">나의 <span class="tx-blue">예약현황</span></div>
    <div class="Layer-Cont">
        <div class="Layer-SubTit tx-gray">
            ‘ 예약완료’ 된 상담정보만 확인할 수 있습니다. (‘예약취소’시 확인불가)<br/>
            예약 완료된 상담중 ‘미방문’ 상담 상태가 있을 경우 추가 상담예약이 불가능합니다. (‘미방문’상태 예약취소 후 상담예약가능)
        </div>
        <div class="PASSZONE-Lec-Section">
            <div class="reserveOverflow">
                @if(empty($arr_base['list']) === true)
                    <div class="reserveTableList">
                        <div class="reserveTable tx-gray">
                            <div class="table-row top p_re">
                                <div class="table-cell w-data w-data-span3 tx-left tx-gray pl15">조회된 상담예약이 없습니다.</div>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach($arr_base['list'] as $row)
                        <div class="reserveTableList">
                            <div class="reserveTable tx-gray">
                                <div class="table-row top p_re">
                                    <div class="table-cell w-tit bg-light-white strong"><p>상담예약 일시</p></div>
                                    <div class="table-cell w-data w-data-span3 tx-left tx-gray pl15">
                                                <span>
                                                    <dl>
                                                        <dt class="strong">{{$row['CampusName']}}<span class="row-line">|</span></dt>
                                                        <dt class="strong">{{$row['ConsultDate']}} ({!! $yoil[date('w', strtotime($row['ConsultDate']))] !!}) {{$row['TimeValue']}}</dt>
                                                        <dt class="sList"><span class="row-line" style="float: left; width: 1px;">|</span>[예약상태] 예약완료</dt>
                                                        <dt class="sList">[상담상태] 미방문</dt>
                                                    </dl>
                                                </span>
                                    </div>
                                    <span class="MoreBtn" id="{{$row['CsmIdx']}}" data-id="{{$row['CsmIdx']}}"><a href="#none">보기 ▼</a></span>
                                </div>

                                <span class="table_list" id="table_{{$row['CsmIdx']}}" style="display: none;">
                                    <div class="table-row">
                                        <div class="table-cell w-tit bg-light-white strong"><p>예약상태</p></div>
                                        <div class="table-cell w-data tx-left pl15">
                                            <p>
                                                {!! ($row['IsReg'] == 'Y') ? '예약완료' : '예약취소' !!}
                                                @if($row['IsReg'] == 'Y' && $row['IsConsult'] == 'N')
                                                    <a href="#none" class="btn whiteBox btn-my-cancel" data-csm-id="{{$row['CsmIdx']}}">예약취소</a>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="table-cell w-tit bg-light-white strong"><p>상담상태</p></div>
                                        <div class="table-cell w-data tx-left pl15"><p>{!! ($row['IsConsult'] == 'Y') ? '방문완료' : '미방문' !!}</p></div>
                                    </div>
                                    <div class="table-row">
                                        <div class="table-cell w-tit bg-light-white strong"><p>이름(아이디)</p></div>
                                        <div class="table-cell w-data tx-left pl15"><p>{{$row['MemName']}}({{$row['MemId']}})</p></div>
                                        <div class="table-cell w-tit bg-light-white strong"><p>생년월일</p></div>
                                        <div class="table-cell w-data tx-left pl15"><p>{{$row['BirthDay']}}</p></div>
                                    </div>
                                    <div class="table-row">
                                        <div class="table-cell w-tit bg-light-white strong"><p>연락처</p></div>
                                        <div class="table-cell w-data tx-left pl15"><p>{{$row['MemPhone']}}</p></div>
                                        <div class="table-cell w-tit bg-light-white strong"><p>이메일</p></div>
                                        <div class="table-cell w-data tx-left pl15"><p>{{$row['MemMail']}}</p></div>
                                    </div>
                                    <div class="table-row">
                                        <div class="table-cell w-tit bg-light-white strong"><p>응시직렬</p></div>
                                        <div class="table-cell w-data tx-left pl15"><p>{{$row['SerialName']}}</p></div>
                                        <div class="table-cell w-tit bg-light-white strong"><p>응시지역</p></div>
                                        <div class="table-cell w-data tx-left pl15"><p>{{$row['CandidateAreaName']}}</p></div>
                                    </div>
                                    <div class="table-row">
                                        <div class="table-cell w-tit bg-light-white strong"><p>수험기간</p></div>
                                        <div class="table-cell w-data tx-left pl15"><p>{{$row['ExamPeriodName']}}</p></div>
                                        <div class="table-cell w-tit bg-light-white strong"><p>취약과목</p></div>
                                        <div class="table-cell w-data tx-left pl15"><p>{{$row['SubjectName']}}</p></div>
                                    </div>
                                    <div class="table-row">
                                        <div class="table-cell w-tit bg-light-white strong"><p>수강여부</p></div>
                                        <div class="table-cell w-data w-data-span3 tx-left pl15"><p>{{$row['StudyName']}}</p></div>
                                    </div>
                                    <div class="table-row">
                                        <div class="table-cell w-tit bg-light-white strong"><p>상세정보</p></div>
                                        <div class="table-cell w-data w-data-span3 tx-left pl15">
                                            <p>{!! nl2br($row['Memo']) !!}</p>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var $my_regi_form = $('#my_regi_form');

    $(document).ready(function() {
        $( ".table_list" ).each(function(i) {
            $('.table_list').eq(0).css("display", "block");
            $('.MoreBtn > a').eq(0).text('닫기 ▲');
        });

        $('.MoreBtn').click(function () {
            if($('#table_'+$(this).data('id')).css("display") == "none"){
                $('.table_list').css("display", "none");
                $('.MoreBtn > a').text('보기 ▼');
                $('#table_'+$(this).data('id')).css("display", "block");
                $('#'+$(this).data('id')+' > a').text('닫기 ▲');
            } else {
                $('#table_'+$(this).data('id')).css("display", "none");
                $('.MoreBtn > a').text('보기 ▼');
            }
        });

        $('.btn-my-cancel').click(function () {
            if (!confirm('상담예약을 취소하시겠습니까?')) { return false; }

            var _url = '{{ front_url('/consultManagement/cancel') }}';
            var _data = {
                '{{ csrf_token_name() }}': $my_regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method': 'POST',
                's_campus' : '{{element('s_campus', $arr_input)}}',
                'csm_idx' : $(this).data('csm-id')
            };
            sendAjax(_url, _data, function (ret) {
                alert(ret.ret_msg);
                mySchedule();
            }, showError, false, 'POST');
        });
    });
</script>
