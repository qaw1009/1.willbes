<a class="closeBtn" href="#none" onclick="closeWin('{{ $ele_id }}');">
    <img src="{{ img_url('gnb/close.png') }}">
</a>
<table cellspacing="0" cellpadding="0" class="productTable tx-gray">
    <colgroup>
        <col style="width: 65px;">
        <col style="width: 455px;">
    </colgroup>
    <tbody>
    @foreach($results['list'] as $idx => $row)
        <tr>
            <td>{{ $row['ReprWProfName'] }}<span class="row-line">|</span></td>
            <td class="tx-left pl20">
                @if($results['data']['LearnPatternCcd'] == $arr_learn_pattern_ccd['admin_package'] && $results['data']['PackTypeCcd'] == $arr_admin_package_type_ccd['choice'])
                    {{-- 운영자 선택형 패키지 --}}
                    [{{ $row['IsEssential'] == 'Y' ? '필수' : '선택' }}]
                @elseif($results['data']['LearnPatternCcd'] == $arr_learn_pattern_ccd['user_package'])
                    {{-- 사용자 패키지 --}}
                    [20% - 할인정보 추가 필요]
                @endif
                {{ $row['ProdNameSub'] }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>