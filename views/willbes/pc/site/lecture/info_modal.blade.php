<a class="closeBtn" href="#none" onclick="closeWin('{{ $ele_id }}')">
    <img src="{{ img_url('sub/close.png') }}">
</a>

<div class="Layer-Tit tx-dark-black NG">
    {{ $data['lecture']['ProdName'] }}
</div>
<div class="lecDetailWrap">
    <ul class="tabWrap tabDepth1 NG">
        <li><a id="hover1" href="#ch1">강좌상세정보</a></li>
        <li><a id="hover2" href="#ch2">교재상세정보 (총 {{ count($data['salebooks']) }}권)</a></li>
    </ul>
    <div class="tabBox">
        <div id="ch1" class="tabLink">
            <div class="classInfo">
                <dl class="w-info NG">
                    <dt>강의수 : <span class="tx-blue">{{ $data['lecture']['wUnitLectureCnt'] }}강@if(empty($data['lecture']['wScheduleCount'])==false)/{{$data['lecture']['wScheduleCount']}}강@endif</span></dt>
                    <dt><span class="row-line">|</span></dt>
                    <dt>수강기간 : <span class="tx-blue">{{ $data['lecture']['StudyPeriod'] }}일</span></dt>
                    <dt class="NSK ml15">
                        <span class="nBox n1">{{ $data['lecture']['MultipleApply'] === "1" ? '무제한' : $data['lecture']['MultipleApply'].'배수'}}</span>
                        <span class="nBox n{{ substr($data['lecture']['wLectureProgressCcd'], -1)+1 }}">{{ $data['lecture']['wLectureProgressCcdName'] }}</span>
                    </dt>
                </dl>
            </div>
            <div class="classInfoTable">
                <table cellspacing="0" cellpadding="0" class="classTable under-gray tx-gray">
                    <colgroup>
                        <col style="width: 140px;">
                        <col width="*">
                    </colgroup>
                    <tbody>
                    @foreach($data['contents'] as $idx => $row)
                        <tr>
                            <td class="w-list bg-light-white">
                                강좌{{ $row['ContentTypeCcdName'] }}
                                @if($row['ContentTypeCcd'] == '633001')
                                    <br/><span class="tx-red">(필독)</span>
                                @endif
                            </td>
                            <td class="w-data tx-left pl25">
                                {!! $row['Content'] !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="ch2" class="tabLink">
            <div class="bookWrap">
                @foreach($data['salebooks'] as $idx => $row)
                    <div class="bookInfo">
                        <div class="bookImg">
                            <img src="{{ $row['wAttachImgPath'] }}{{ $row['wAttachImgOgName'] }}" width="200" height="250">
                        </div>
                        <div class="bookDetail">
                            <div class="book-Tit tx-dark-black NG">{{ $row['ProdBookName'] }}</div>
                            <div class="book-Author tx-gray">
                                <ul>
                                    <li>분야 : {{ $row['BookCateName'] }} <span class="row-line">|</span></li>
                                    <li>저자 : {{ $row['wAuthorNames'] }} <span class="row-line">|</span></li>
                                    <li>출판사 : {{ $row['wPublName'] }} <span class="row-line">|</span></li>
                                    <li>판형/쪽수 : {{ $row['wEditionSize'] }} / {{ $row['wPageCnt'] }}</li>
                                </ul>
                                <ul>
                                    <li>출판일 : {{ $row['wPublDate'] }} <span class="row-line">|</span></li>
                                    <li>교재비 : <strong class="tx-light-blue">{{ number_format($row['RealSalePrice']) }}원</strong>
                                        (↓{{ $row['SaleRate'] . $row['SaleRateUnit'] }})
                                        <strong class="tx-{{ $row['wSaleCcd'] == '112001' ? 'light-blue' : 'red' }}">[{{ $row['wSaleCcdName'] }}]</strong>
                                    </li>
                                </ul>
                            </div>
                            <div class="bookBoxWrap">
                                <ul class="tabWrap tabDepth2">
                                    <li><a href="#info1{{ $idx }}" class="on">교재소개</a></li>
                                    <li><a href="#info2{{ $idx }}">교재목차</a></li>
                                </ul>
                                <div class="tabBox">
                                    <div id="info1{{ $idx }}" class="tabContent">
                                        <div class="book-TxtBox tx-gray">
                                            {!! $row['wBookDesc'] !!}
                                        </div>
                                        @if(empty($data['lecture']['ProdBookMemo']) === false)<div class="caution-txt tx-red">{{ $data['lecture']['ProdBookMemo'] }}</div>@endif
                                    </div>
                                    <div id="info2{{ $idx }}" class="tabContent">
                                        <div class="book-TxtBox tx-gray">
                                            {!! $row['wTableDesc'] !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script src="/public/js/willbes/tabs.js"></script>