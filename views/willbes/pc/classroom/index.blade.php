@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer">
        <div class="widthAuto c_both">
            @include('willbes.pc.layouts.partial.site_tab_menu')
            <div class="Depth">
                @include('willbes.pc.layouts.partial.site_route_path')
            </div>
        </div>

        <div class="ActIndex MyInfo widthAutoFull">
            <div class="widthAuto p_re">
                <div class="Content p_re">
                    <div class="will-Tit NG">나의 <span class="tx-light-blue">학습</span>/혜택 <span class="tx-light-blue">정보</span></div>
                    <div class="MyLecInfoBox NG">
                        <ul>
                            <li class="line">
                                <div class="Tit tx-light-blue NSK">온라인강좌<br/>현황</div>
                                <div class="TableInfo">
                                    <dl>
                                        <dt><div class="subTit">무한PASS</div><div><a class="tx-blue" href="{{front_url('/classroom/pass/index')}}">{{$data['pass_cnt']}}</a>개</div></dt>
                                        <dt><div class="subTit">수강중</div><div><a class="tx-blue" href="{{front_url('/classroom/on/list/ongoing')}}">{{$data['ing_cnt']}}</a>개</div></dt>
                                        <dt><div class="subTit">수강대기</div><div><a class="tx-blue" href="{{front_url('/classroom/on/list/standby')}}">{{$data['standby_cnt']}}</a>개</div></dt>
                                    </dl>
                                </div>
                            </li>
                            <li class="line sm">
                                <div class="Tit tx-light-blue NSK">학원강좌<br/>현황</div>
                                <div class="TableInfo">
                                    <dl>
                                        <dt><div class="subTit">수강신청</div><div><a class="tx-blue" href="{{front_url('/classroom/off/list/ongoing')}}">{{$data['off_cnt']}}</a>개</div></dt>
                                    </dl>
                                </div>
                            </li>
                            <li>
                                <div class="Tit tx-light-blue NSK">포인트<br/>현황</div>
                                <div class="TableInfo">
                                    <dl>
                                        <dt><div class="subTit">강좌</div><div><a class="tx-blue" href="{{front_url('/classroom/point/index?tab=lecture&stab=save')}}">{{number_format($data['lecture_point'],0)}}</a>P</div></dt>
                                        <dt><div class="subTit">교재</div><div><a class="tx-blue" href="{{front_url('/classroom/point/index?tab=book&stab=save')}}">{{number_format($data['book_point'],0)}}</a>P</div></dt>
                                    </dl>
                                </div>
                            </li>
                            <li class="sm">
                                <div class="Tit tx-light-blue NSK">쿠폰<br/>현황</div>
                                <div class="TableInfo">
                                    <dl>
                                        <dt><div class="subTit">쿠폰</div><div><a class="tx-blue" href="{{front_url('/classroom/coupon/index')}}">{{$data['coupon_cnt']}}</a>장</div></dt>
                                    </dl>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="MyInfoBox">
                        <div class="willbes-listTable MyInfoBoxList widthAutoFull">
                            <div class="will-Tit NG">최근 받은 쪽지 <a class="f_right" href="{{front_url('/classroom/message/index')}}"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                            <ul class="List-Table GM tx-gray">
                                @forelse($data['msg_list'] as $row)
                                    <li>
                                        <a href="#none" class="btn-crm-view" data-send-Idx="{{$row['SendIdx']}}">
                                            {{hpSubString($row['Content'],0,23,'...')}}{!!($row['IsReceive'] == 'Y') ? '' : '<img src="'.img_url('mypage/icon_N.png').'">'!!}
                                        </a>
                                    </li>
                                @empty
                                    <li>수신된 쪽지가 없습니다.</li>
                                @endforelse
                            </ul>
                        </div>
                        <div class="willbes-listTable MyInfoBoxList widthAutoFull">
                            <div class="will-Tit NG">나의 학습 기기 (무한PASS) <a class="f_right" href="{{front_url('/classroom/pass/')}}"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                            <ul class="List-Table GM myTablet tx-gray">
                                @forelse($data['device_list'] as $row)
                                    @if($row['DeviceType'] == 'P')
                                        <li>PC <span class="tx-bright-gray">({{str_replace('-','.',$row['RegDatm'])}} 등록)</span></li>
                                    @else
                                        <li>모바일 <span class="tx-bright-gray">({{str_replace('-','.',$row['RegDatm'])}} 등록)</span></li>
                                    @endif
                                @empty
                                    <li>등록된 기기가 없습니다.</li>
                                    <li><span class="tx-bright-gray">( ID당 2개만 등록가능 )</span></li>
                                @endforelse
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="Quick-Top">
                    {!! banner('내강의실_우측퀵', 'Quick-Bnr', $__cfg['SiteCode'], '0') !!}
                    {{-- 서포터즈 회원인 경우 배너 노출 --}}
                    @if (empty($data['supporters']) === false)
                        <a href="{{ ($data['supporters']['SiteCode'] == '2001') ? 'https://police.local.willbes.net' : 'https://pass.local.willbes.net' }}/supporters/home/index">
                            <img class="mt10" src="https://static.willbes.net/public/images/willbes/mypage/banner_supporters.jpg">
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="widthAuto">
            <div class="Content p_re">
                <div class="Mypage_PASS_Index c_both">
                    <div class="ActIndex ActIndex1 mt70">
                        <div class="willbes-listTable widthAuto940 f_inherit">
                            <div class="will-Tit NG">최근 <span class="tx-light-blue">수강강좌</span> <span class="will-subTit">가장 최근 수강한 <span class="tx-blue">3</span>개의 강좌리스트가 노출됩니다.</span></div>
                            <div class="willbes-Lec-Table NG d_block">
                                <table cellspacing="0" cellpadding="0" class="lecTable">
                                    <colgroup>
                                        <col style="width: 125px;">
                                        <col style="width: 140px;">
                                        <col style="width: 675px;">
                                    </colgroup>
                                    <tbody>
                                    @forelse($data['ing_list'] as $row)
                                        <tr>
                                            <td class="w-list NGEB">
                                                @if($row['LearnPatternCcd'] == '615004')
                                                    <a href="{{ site_url('/classroom/on/view/ongoing/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}"><img src="{{ img_url('mypage/icon_name1.png') }}"></a>
                                                @elseif($row['LearnPatternCcd'] == '615003')
                                                    <a href="{{ site_url('/classroom/on/view/ongoing/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}"><img src="{{ img_url('mypage/icon_name2.png') }}"></a>
                                                @else
                                                    <a href="{{ site_url('/classroom/on/view/ongoing/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}"><img src="{{ img_url('mypage/icon_name3.png') }}"></a>
                                                @endif

                                            </td>
                                            <td class="w-percent">
                                                <div class="round">
                                                    진도율<br/>
                                                    <span class="tx-blue">{{$row['StudyRate']}}%</span>
                                                </div>
                                            </td>
                                            <td class="w-data tx-left pl25">
                                                <dl class="w-info">
                                                    <dt>
                                                        {{$row['SiteGroupName']}}<span class="row-line">|</span>
                                                        {{$row['SubjectName']}}<span class="row-line">|</span>
                                                        {{$row['wProfName']}}교수님
                                                        <span class="NSK ml15 nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                                    </dt>
                                                </dl><br/>
                                                <div class="w-tit">
                                                    @if($row['LearnPatternCcd'] == '615004')
                                                        <a href="{{ site_url('/classroom/pass/view/ongoing/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                                    @else
                                                        <a href="{{ site_url('/classroom/on/view/ongoing/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                                    @endif
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}일</span>({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                                </dl>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
                                <!-- lecTable -->
                            </div>
                            <!--willbes-Lec-Table -->
                        </div>
                    </div>
                    <div class="ActIndex ActIndex2 mt50">
                        <div class="willbes-listTable willbes-info willbes-info widthAuto445 f_left">
                            <div class="will-Tit NSK">나의 <span class="tx-light-blue">상담내역</span>
                                <a class="f_right" href="{{front_url('/classroom/qna/index?tab=counsel')}}"><img src="{{ img_url('prof/icon_add.png') }}"></a>
                            </div>
                            <ul class="List-Table GM tx-gray">
                                @if(empty($data['counsel']) === true)
                                    <li>등록된 상담 내용이 없습니다.</li>
                                @else
                                    @foreach($data['counsel'] as $row)
                                        <li>
                                            <a href="{{front_url('/classroom/qna/show?board_idx='.$row['BoardIdx'].'&tab=counsel')}}">{{$row['Title']}}</a>
                                            <span class="aBox {{($row['ReplyStatusCcd'] == '621004') ? 'answerBox' : 'waitBox'}} NSK">{{($row['ReplyStatusCcd'] == '621004') ? '답변완료' : '답변대기'}}</span>
                                            <span class="date">{{$row['RegDatm']}}</span>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="willbes-listTable willbes-info willbes-info widthAuto445 f_left ml50">
                            <div class="will-Tit NSK">나의 <span class="tx-light-blue">학습Q&A</span>
                                <a class="f_right" href="{{front_url('/classroom/profQna/index?tab=professor')}}"><img src="{{ img_url('prof/icon_add.png') }}"></a>
                            </div>
                            <ul class="List-Table GM tx-gray">
                                @if(empty($data['qna']) === true)
                                    <li>등록된 학습 Q&A 내용이 없습니다.</li>
                                @else
                                    @foreach($data['qna'] as $row)
                                        <li>
                                            <a href="{{front_url('/classroom/profQna/show?board_idx='.$row['BoardIdx'].'&prof_idx='.$row['ProfIdx'].'&subject_idx='.$row['SubjectIdx'])}}">{{$row['Title']}}</a>
                                            <span class="aBox {{($row['ReplyStatusCcd'] == '621004') ? 'answerBox' : 'waitBox'}} NSK">{{($row['ReplyStatusCcd'] == '621004') ? '답변완료' : '답변대기'}}</span>
                                            <span class="date">{{$row['RegDatm']}}</span>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="ActIndex ActIndex3 mt50">
                        <div class="willbes-listTable willbes-info willbes-info860 widthAuto940 f_left">
                            <div class="will-Tit NSK">공지<span class="tx-light-blue">사항</span> <a class="f_right" href="{{front_url('/support/notice/index')}}"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                            <ul class="List-Table GM tx-gray">
                                @if(empty($data['notice']) === true)
                                    <li>등록된 공지 내용이 없습니다.</li>
                                @else
                                    @foreach($data['notice'] as $row)
                                        <li><a href="{{front_url('/support/notice/show?board_idx='.$row['BoardIdx'])}}">{{$row['Title']}}</a><span class="date">{{$row['RegDatm']}}</span></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Mypage_PASS_Index -->
            </div>
        </div>
    </div>
    <div id="MEMOPASS"></div>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-crm-view').click(function () {
                var ele_id = 'MEMOPASS';
                var data = {
                    'ele_id' : ele_id,
                    'show_onoff' : 'off',
                    'send_idx' : $(this).data('send-Idx')
                };
                sendAjax('{{ site_url('/classroom/message/show') }}', data, function(ret) {
                    $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
                }, showAlertError, false, 'GET', 'html');
            });
        });
    </script>
@stop