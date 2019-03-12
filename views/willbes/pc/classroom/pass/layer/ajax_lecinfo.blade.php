<div id="ch1-{{$ProdCode}}" class="tabLink">
    <table cellspacing="0" cellpadding="0" class="classTable under-gray bdt-gray tx-gray">
        <colgroup>
            <col style="width: 105px;">
            <col width="*">
        </colgroup>
        <tbody>
        @foreach($ProdContents as $sub_row)
            <tr>
                <td class="w-list bg-light-white">
                    {{$sub_row['ContentTypeCcdName']}}
                    @if($sub_row['ContentTypeCcd'] == '633001')
                        <br/><span class="tx-red">(필독)</span>
                    @endif
                </td>
                <td class="w-data tx-left pl25">{!! $sub_row['Content'] !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div id="ch2-{{$ProdCode}}" class="tabLink">
    <div class="LeclistTable">
        <table cellspacing="0" cellpadding="0" class="listTable upper-black under-gray tx-gray">
            <colgroup>
                <col style="width: 65px;">
                <col style="width: 370px;">
                <col style="width: 100px;">
            </colgroup>
            <thead>
            <tr>
                <th>No<span class="row-line">|</span></th>
                <th>강의명<span class="row-line">|</span></th>
                <th>강의시간</th>
            </tr>
            </thead>
            <tbody>
            @forelse($LectureUnits as $sub_row)
                <tr>
                    <td class="w-no">{{$sub_row['wUnitNum']}}회 {{$sub_row['wUnitLectureNum']}}강</td>
                    <td class="w-list tx-left pl20">{{$sub_row['wUnitName']}}</td>
                    <td class="w-time">{{$sub_row['wRuntime']}}분</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">개설된 목차가 없습니다.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>