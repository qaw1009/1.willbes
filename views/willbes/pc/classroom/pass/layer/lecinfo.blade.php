<div class="lecDetailWrap p_re mt30 mb60">
    <ul class="tabWrap tabDepth2">
        <li><a href="#ch1{{$data['ProdCode']}}">강좌상세정보</a></li>
        <li><a href="#ch2{{$data['ProdCode']}}">강좌목차</a></li>
    </ul>
    <div class="w-btn">
        <a class="bg-blue bd-dark-blue NSK" href="javascript:;" onclick="fnAppend('{{$data['ProdCode']}}');">현재 강좌추가</a>
    </div>
    <div class="tabBox mt30">
        <div id="ch1{{$data['ProdCode']}}" class="tabLink">
            <table cellspacing="0" cellpadding="0" class="classTable under-gray bdt-gray tx-gray">
                <colgroup>
                    <col style="width: 105px;">
                    <col width="*">
                </colgroup>
                <tbody>
                @foreach($data['ProdContents'] as $row)
                <tr>
                    <td class="w-list bg-light-white">
                        {{$row['ContentTypeCcdName']}}
                        @if($row['ContentTypeCcd'] == '633001')
                            <br/><span class="tx-red">(필독)</span>
                        @endif
                    </td>
                    <td class="w-data tx-left pl25">{!! $row['Content'] !!}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div id="ch2{{$data['ProdCode']}}" class="tabLink">
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable upper-black under-gray tx-gray">
                    <colgroup>
                        <col style="width: 50px;">
                        <col style="width: 365px;">
                        <col style="width: 120px;">
                    </colgroup>
                    <thead>
                    <tr>
                        <th>No<span class="row-line">|</span></th>
                        <th>강의명<span class="row-line">|</span></th>
                        <th>강의시간</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($data['LectureUnits'] as $row)
                    <tr>
                        <td class="w-no">{{$row['wUnitNum']}}회 {{$row['wUnitLectureNum']}}강</td>
                        <td class="w-list tx-left pl20">{{$row['wUnitName']}}</td>
                        <td class="w-time">{{$row['wRuntime']}}분</td>
                    </tr>
                    @empty
                        <tr>
                            <td class="w-no" colspan="3">개설된 목차가 없습니다.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>