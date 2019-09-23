<div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h510 fix">
    <a class="closeBtn" href="#none" onclick="closeWin('{{ $ele_id }}')">
        <img src="{{ img_url('m/calendar/close.png') }}">
    </a>
    <h4>
        {{$data['lecture']['ProdName']}}
    </h4>
    <div class="LecDetailBox">
        <h5>강좌상세정보</h5>
        <dl class="w-info tx-gray">
            <dt>
                강의수 <span class="tx-blue">{{ $data['lecture']['wUnitLectureCnt'] }}강@if($data['lecture']['wLectureProgressCcd'] != '105002' && empty($data['lecture']['wScheduleCount'])==false)/{{$data['lecture']['wScheduleCount']}}강@endif
                </span><span class="row-line ml10">|</span>
                수강기간 <span class="tx-blue">{{$data['lecture']['StudyPeriod']}}일</span>
                <span class="NSK ml10 nBox n1">{{ $data['lecture']['MultipleApply'] === "1" ? '무제한' : $data['lecture']['MultipleApply'].'배수'}}</span>
                <span class="NSK nBox n{{ substr($data['lecture']['wLectureProgressCcd'], -1)+1 }}">{{ $data['lecture']['wLectureProgressCcdName'] }}</span>
            </dt>
        </dl>
        @foreach($data['contents'] as $idx => $row)
                <h5>강좌{{ $row['ContentTypeCcdName'] }}
                    @if($row['ContentTypeCcd'] == '633001')
                        <br/><span class="tx-red">(필독)</span>
                    @endif
                </h5>
                <div class="tx-dark-gray">
                    {!! $row['Content'] !!}
                </div>
        @endforeach
    </div>
</div>
<div class="dim" onclick="closeWin('{{ $ele_id }}')"></div>