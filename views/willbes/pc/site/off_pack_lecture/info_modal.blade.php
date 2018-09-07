<a class="closeBtn" href="#none" onclick="closeWin('{{ $ele_id }}')">
    <img src="{{ img_url('sub/close.png') }}">
</a>
<div class="Layer-Tit tx-dark-black NG">
    {{$data['ProdName']}}
</div>
<div class="lecDetailWrap">
    <div class="classInfo">
        <dl class="w-info NG">
            <dt>개강월 : <span class="tx-blue">{{$data['SchoolStartYear']}}-{{$data['SchoolStartMonth']}}</span></dt>
            <dt><span class="row-line">|</span></dt>
            <dt>수강형태 : <span class="tx-blue">{{$data['StudyPatternCcdName']}}</span></dt>

        </dl>
    </div>
    <div class="classInfoTable">
        <table cellspacing="0" cellpadding="0" class="classTable under-black tx-gray">
            <colgroup>
                <col style="width: 140px;">
                <col width="*">
            </colgroup>
            <tbody>
            <tr>
                <td class="w-list bg-light-white">강좌정보</td>
                <td class="w-data tx-left pl25">
                    {!! $data['Content'] !!}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
