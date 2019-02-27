<form id="url_form" name="url_form" method="GET">
    @foreach($arr_input as $key => $val)
        <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
    @endforeach
</form>
<div class="willbes-Lec-Tit NG bd-none tx-black pt-zero">· 심층상담예약</div>

<div id="RESERVEPASS"></div>

<div class="willbes-counsel_step step mt40 NG c_both">
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
        </dl>
    </div>
</div>
<div class="counsel_infoBox tx-black GM mb50">
    <div class="LeclistTable">
        <table cellspacing="0" cellpadding="0" class="listTable bdb-gray tx-gray">
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
                    <button type="button" class="mem-Btn combine-Btn bg-blue bd-dark-blue" onclick="javascript:mySchedule();">
                        <span><strong>나의 예약현황</strong></span>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    function mySchedule() {
        var is_login = '{{sess_data('is_login')}}';
        var s_campus = $('#s_campus option:selected').val();
        var ele_id = 'RESERVEPASS';
        var data = {
            'ele_id': ele_id,
            's_campus': s_campus
        };

        if (is_login != true) {
            alert('로그인 후 이용해 주세요.');
            return false;
        }

        if (s_campus == '') {
            alert('캠퍼스를 선택해 주세요.');
            return false;
        }

        sendAjax('{{ front_url('/consultManagement/showMySchedule/') }}', data, function (ret) {
            $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
        }, showAlertError, false, 'GET', 'html');
    }


    /*$(document).ready(function() {
        $('.btn-my-schedule').click(function () {
            var is_login = '{{sess_data('is_login')}}';
            var s_campus = $('#s_campus option:selected').val();
            var ele_id = 'RESERVEPASS';
            var data = {
                'ele_id': ele_id,
                's_campus': s_campus
            };

            if (is_login != true) {
                alert('로그인 후 이용해 주세요.');
                return false;
            }

            if (s_campus == '') {
                alert('캠퍼스를 선택해 주세요.');
                return false;
            }

            sendAjax('{{ front_url('/consultManagement/showMySchedule/') }}', data, function (ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            }, showAlertError, false, 'GET', 'html');
        });

    });*/
</script>