<div class="willbes-Layer-PassBox willbes-Layer-PassBox1100 h800 fix abs">
    <a class="closeBtn" href="#none" onclick="closeWin('profLook')">
        <img src="{{ img_url('sub/close.png') }}">
    </a>
    <div class="Layer-Tit tx-dark-black NG">강사선택현황</div>
    <div class="lecMoreWrap of-hidden h700">
        <div class="PASSZONE-List widthAutoFull">
            <div class="lecTitle NG">
                {{$pkginfo['ProdName']}}
            </div>

            <div class="PASSZONE-Lec-Section">
                <div class="strong mt25 tx-gray h22 mb10">
                    · 최종 선택한 과목 및 강사에 대한 현황을 확인하실 수 있습니다.
                </div>

                <div class="c_both mb20">
                    <ul class="tabWrap tabDepthPass" id="selTab">
                        <li><a href="#tab_ess" class="on">필수과목</a></li>
                        <li><a href="#tab_choice">선택과목</a></li>
                    </ul>
                </div>

                @foreach($sublec as $key => $prod_data)
                    <div class="LeclistTable bdt-gray mt25 mb30 c_both {{ $key == 'ess' ? 'active' : '' }}" id="tab_{{ $key }}">
                        <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                            <colgroup>
                                <col style="width: 10%;">
                                <col style="width: 10%;">
                                <col style="width: 8%;">
                                <col style="width: 8%;">
                                <col>
                                <col style="width: 20%;">
                                <col style="width: 10%;">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>과정</th>
                                <th>과목</th>
                                <th>교수</th>
                                <th>수강형태</th>
                                <th>단과반명</th>
                                <th>개강일~종강일</th>
                                <th>요일(회차)</th>
                                <th>교재구매</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($prod_data as $row)
                                <tr>
                                    <td class="row_{{ $key }}_course_name">{{ $row['CourseName'] }}<span style="display:none;">{{ $row['CourseIdx'] }}</span></td>
                                    <td class="row_{{ $key }}_subject_name">{{ $row['SubjectName'] }}<span style="display:none;">{{ $row['CourseIdx'] }}_{{ $row['SubjectIdx'] }}</span></td>
                                    <td>{{ $row['wProfName'] }}</td>
                                    <td>{{ $row['StudyPatternCcdName'] }}</td>
                                    <td>{{ $row['ProdNameSub'] }}</td>
                                    <td>{{ $row['StudyStartDate'] }}<br/>~{{ $row['StudyEndDate'] }}</td>
                                    <td>{{ $row['WeekArrayName'] }}({{ $row['Amount'] }})</td>
                                    <td>
                                        @if($row['isbook'] == 'Y')
                                            <a href="#none" onclick="fnBookLayer('{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}')" class="buyBook">교재구매</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
                <div class="btnAuto130 mt20 tx-white tx14 strong"><a href="#none" onclick="closeWin('profLook')" class="bBox blueBox">닫기</a></div>
            </div>
        </div>
        <!-- PASSZONE-List -->
    </div>
</div>
<script>
    $(document).ready(function() {
        bindTab('#selTab');
        setRowspan('row_ess_course_name');
        setRowspan('row_ess_subject_name');
        setRowspan('row_choice_course_name');
        setRowspan('row_choice_subject_name');
    });


    function bindTab(obj){
        $(obj).each(function () {
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
            $content = $($active[0].hash);
            $links.not($active).each(function () {
                $(this.hash).hide().css('display', 'none');
            });

            $(this).on('click', 'a', function (e) {
                $active.removeClass('on');
                $content.hide().css('display', 'none');

                $active = $(this);
                $content = $(this.hash);

                $active.addClass('on');
                $content.show().css('display', 'block');

                e.preventDefault();
            });
        });
    }

    function fnBookLayer(ProdCode, ProdCodeSub)
    {
        url = "{{ site_url("/classroom/off/layerBooklist/") }}";
        data = "ProdCode="+ProdCode+"&ProdCodeSub="+ProdCodeSub;

        sendAjax(url,
            data,
            function(d){
                closeWin('profLook');
                $("#MoreBook").html(d).end();
                openWin('MoreBook');
            },
            function(ret, status){
                alert(ret.ret_msg);
            }, false, 'GET', 'html');
    }
</script>