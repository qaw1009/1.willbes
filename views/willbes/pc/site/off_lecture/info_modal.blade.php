<a class="closeBtn" href="#none" onclick="closeWin('{{ $ele_id }}')">
    <img src="{{ img_url('sub/close.png') }}">
</a>
<div class="Layer-Tit tx-dark-black NG">
    {{$data['ProdName']}}
</div>
<div class="lecDetailWrap">
    <div class="classInfo">
        <dl class="w-info NG" >
            <dt>
                개강일~종강일 : <span class="tx-blue">{{ date('m/d', strtotime($data['StudyStartDate'])) }} ~ {{ date('m/d', strtotime($data['StudyEndDate'])) }}</span>
                &nbsp;&nbsp;
                {{$data['WeekArrayName']}}({{$data['Amount']}}회차)
            </dt>
            <dt><span class="row-line">|</span></dt>
            <dt>수강형태 : <span class="tx-blue">{{$data['StudyPatternCcdName']}}</span></dt>
            <dt class="NGR ml15">
                <span class="acadBox n{{ substr($data['StudyApplyCcd'], -1) }}">{{ $data['StudyApplyCcdName'] }}</span>
            </dt>

        </dl>
    </div>
    <div class="classInfoTable">
        <table cellspacing="0" cellpadding="0" class="classTable under-black tx-gray">
            <colgroup>
                <col style="width: 140px;">
                <col width="*">
            </colgroup>
            <tbody>
            @if(empty($data['Content5']) != true)
            <tr>
                <td class="w-list bg-light-white">수강대상</td>
                <td class="w-data tx-left pl25">
                    {!! $data['Content5'] !!}
                </td>
            </tr>
            @endif
            <tr>
                <td class="w-list bg-light-white">강좌소개<Br>(강좌구성)</td>
                <td class="w-data tx-left pl25">
                    {!! $data['Content'] !!}
                </td>
            </tr>
            @if(empty($data['Content6']) != true)
            <tr>
                <td class="w-list bg-light-white">강좌효과</td>
                <td class="w-data tx-left pl25">
                    {!! $data['Content6'] !!}
                </td>
            </tr>
            @endif
            @if(empty($data['Content7']) != true)
            <tr>
                <td class="w-list bg-light-white">수강후기</td>
                <td class="w-data tx-left pl25">
                    {!! $data['Content7'] !!}
                </td>
            </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
