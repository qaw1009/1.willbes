@php
    header('Access-Control-Allow-Origin:https://'.app_to_env_url('www.willbes.net'));
@endphp
<a class="closeBtn" href="#none" onclick="closeWin('{{ $ele_id }}')">
    <img src="{{ img_url('sub/close.png') }}">
</a>
<div class="Layer-Tit tx-dark-black NG">{{$data['lecture']['ProdName']}}</div>
<div class="lecDetailWrap">
    <div class="classInfo">
        <dl class="w-info NG">
            <dt>개강일 : <span class="tx-blue">{{$data['lecture']['StudyStartDateYM']}}</span></dt>
            <dt><span class="row-line">|</span></dt>
            <dt>수강기간 : <span class="tx-blue">{{$data['lecture']['StudyPeriod']}}일</span></dt>
            <dt class="NSK ml15">
                <span class="nBox n1">{{ $data['lecture']['MultipleApply'] === "1" ? '무제한' : $data['lecture']['MultipleApply'].'배수'}}</span>
            </dt>
        </dl>
    </div>
    <div class="classInfoTable">
        <table cellspacing="0" cellpadding="0" class="classTable tx-gray">
            <colgroup>
                <col style="width: 140px;">
                <col width="*">
            </colgroup>
            <tbody>
        @foreach($data['contents'] as $idx => $row)
            @if($row['ContentTypeCcd'] != '633004')
                <tr>
                    <td class="w-list bg-light-white">
                        패키지{{ $row['ContentTypeCcdName'] }}
                        @if($row['ContentTypeCcd'] == '633001')
                            <br/><span class="tx-red">(필독)</span>
                        @endif
                    </td>
                    <td class="w-data tx-left pl25">
                        {!! $row['Content'] !!}
                    </td>
                </tr>
            @endif
        @endforeach
            </tbody>
        </table>
    </div>
</div>