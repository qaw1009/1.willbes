<form id="url_form" name="url_form" method="GET">
    @foreach($arr_input as $key => $val)
        <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
    @endforeach
</form>
<div class="willbes-Lec-Tit NG bd-none tx-black pt-zero">· 심층상담예약</div>
<div class="counsel_infoBox tx-black GM mt40">
    <img src="{{ img_url('counsel/willbes_counsel.jpg') }}">
    <div class="LeclistTable">
        <table cellspacing="0" cellpadding="0" class="listTable bdt-gray bdb-gray tx-gray">
            <colgroup>
                <col style="width: 125px;">
                <col style="width: 660px;">
                <col style="width: 155px;">
            </colgroup>
            <tbody>
            <tr class="userInfoBox">
                <th><strong>캠퍼스 선택</strong></th>
                <td class="w-list tx-left pl20">
                    <select id="s_campus" name="s_campus" title="campus" class="seleCampus" onchange="goUrl('s_campus',this.value)" @if($arr_base['depth'] > 1) disabled @endif>
                        <option value="">캠퍼스 선택</option>
                        @foreach($arr_base['campus'] as $row)
                            <option value="{{$row['CampusCcd']}}" @if(element('s_campus',$arr_input) == $row['CampusCcd']) selected @endif>{{$row['CampusCcdName']}}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <button type="submit" onclick="" class="mem-Btn combine-Btn bg-blue bd-dark-blue">
                        <span><strong>나의 예약현황</strong></span>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="willbes-counsel_step step mt60 mb50 NG c_both">
    <ul>
        <li @if($arr_base['depth'] == 1) class="active" @endif><div class="num">01</div>상담일자/시간선택</li>
        <li class="arrow"><img src="{{ img_url('counsel/icon_arrow_step.png') }}"></li>
        <li @if($arr_base['depth'] == 2) class="active" @endif><div class="num">02</div>사전정보입력</li>
        <li class="arrow"><img src="{{ img_url('counsel/icon_arrow_step.png') }}"></li>
        <li @if($arr_base['depth'] == 3) class="active" @endif><div class="num">03</div>상담예약확인</li>
    </ul>
    <div class="info-Box info-Box{{$arr_base['depth']}} NG">
        <dl>
            <dt>{!! $arr_base['comment'] !!}</dt>
            {{--<dt>
                · 상담은 월 ~ 토요일 오전 10시부터 오후 5시까지 진행됩니다.<br/>
                · 원하시는 상담일자를 선택하여 예약가능 버튼을 클릭해 주세요.<br/>
                · 예약이 마감된 경우 또는 상담시간 이외 시간대는 예약신청이 불가능 합니다. (예약취소 발생시 ‘ 예약가능 ’ 버튼 재활성화)<br/>
                · 예약하기를 신청하신후 반드시 사전정보 입력을 해 주셔야 상담신청이 완료됩니다.<br/>
            </dt>--}}
        </dl>
    </div>
</div>