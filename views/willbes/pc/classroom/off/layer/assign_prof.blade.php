<form class="form-horizontal" id="_prof_assign_form" name="_prof_assign_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="order_idx" value="{{ $pkginfo['OrderIdx'] }}"/>
    <input type="hidden" name="order_prod_idx" value="{{ $pkginfo['OrderProdIdx'] }}"/>
    <input type="hidden" name="prod_code" value="{{ $pkginfo['ProdCode'] }}"/>
    <input type="hidden" name="prod_code_sub" value=""/>

<a class="closeBtn" href="#none" onclick="closeWin('profChoice')">
    <img src="{{ img_url('sub/close.png') }}">
</a>
<div class="Layer-Tit tx-dark-black NG">강사선택하기</div>
<div class="lecMoreWrap of-hidden h590">
    <div class="PASSZONE-List widthAutoFull">
        <div class="lecTitle NG">
            {{$pkginfo['ProdName']}}
        </div>
        @if($pkginfo['IsUnPaid'] == 'Y')
            <div class="strong mt25 mb10 tx-gray">· 주문정보</div>
            <div class="LeclistTable bdt-gray">
                <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                    <colgroup>
                        <col style="width: 8%;">
                        <col style="width: 15%;">
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 15%;">
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>결제일</th>
                        <th>결제금액</th>
                        <th>환불금액</th>
                        <th>미납금액</th>
                        <th>주문번호</th>
                        <th>비고</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th colspan="7">[총 기결제금액] <strong class="tx-blue">{{ number_format($unpaid_data['tRealPayPrice']) }}원</strong>
                            [총 기환불금액] {{ number_format($unpaid_data['tRefundPrice']) }}원 | 
                            [총 미납금액] <strong class="tx-red">{{ number_format($unpaid_data['tRealUnPaidPrice']) }}원</strong> </th>
                    </tr>
                    @foreach($unpaidinfo as $row)
                        <tr>
                            <td>{{ $loop->remaining }}</td>
                            <td>{{$row['CompleteDatm']}}</td>
                            <td>{{number_format($row['RealPayPrice'])}}</td>
                            <td>{{number_format($row['RefundPrice'])}}</td>
                            <td>{{number_format($row['RealUnPaidPrice'])}}</td>
                            <td><a href="{{front_url('/classroom/order/show')}}?order_no={{$row['OrderNo']}}" class="tx-blue" target="_blank">{{$row['OrderNo']}}</a></td>
                            <td>{{$row['UnPaidMemo']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <div class="PASSZONE-Lec-Section">
            <div class="strong mt25 tx-gray h22 mb30">
                · 수강할 강사를 선택해주세요. <br>
                · 강사 선택 및 변경은 강사선택기간에만 가능하며, 기간이 지난 이후에는 변경이 불가능합니다.
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
                            <col style="width: 5%;">
                            <col style="width: 10%;">
                            <col>
                            <col style="width: 15%;">
                            <col style="width: 12%;">
                            <col style="width: 15%;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>과정</th>
                            <th>과목</th>
                            <th>선택</th>
                            <th>교수</th>
                            <th>단과반명</th>
                            <th>개강일~종강일 </th>
                            <th>요일(회차)</th>
                            <th>강사선택기간</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($prod_data as $row)
                            <tr>
                                <td class="row_{{ $key }}_course_name">{{ $row['CourseName'] }}</td>
                                <td class="row_{{ $key }}_subject_name">{{ $row['SubjectName'] }}<span style="display:none;">{{ $row['CourseIdx'] }}</span></td>
                                <td><input type="checkbox" name="prod_code_sub_{{ $key }}_{{ $row['CourseIdx'] }}_{{ $row['SubjectIdx'] }}"
                                       class="flat prod-code-sub essSubGroup-{{ $key }}_{{ $row['CourseIdx'] }}_{{ $row['SubjectIdx'] }}" value="{{ $row['ProdCodeSub'] }}"
                                        {{ in_array($row['ProdCodeSub'], $pkginfo['OrderSubProdCodes']) === true ? 'checked="checked"' : '' }}
                                        {{ $row['IsChoice'] == 'Y' ? '' : 'Disabled' }}
                                           onclick="checkOnly('.essSubGroup-{{ $key }}_{{ $row['CourseIdx'] }}_{{ $row['SubjectIdx'] }}', this.value);" /></td>
                                <td>{{ $row['wProfName'] }}</td>
                                <td>{{ $row['ProdNameSub'] }}</td>
                                <td>{{ $row['StudyStartDate'] }}<br/>~{{ $row['StudyEndDate'] }}</td>
                                <td>{{ $row['WeekArrayName'] }}({{ $row['Amount'] }})</td>
                                <td>{{ $row['ProfChoiceStartDate'] }}<br/>~{{ $row['ProfChoiceEndDate'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
            @if($notassign == true)
                {{--
                <div class="btnAuto130 mt20 tx-white tx14 strong"><button type="button" onclick="alert('환불된 강좌입니다.');" class="bBox grayBox">적용</button></div>
                --}}
            @else
                <div class="btnAuto130 mt20 tx-white tx14 strong"><button type="submit" class="bBox blueBox">적용</button></div>
            @endif
            <br/>
        </div>
    </div>
    <!-- PASSZONE-List -->
</div>
</form>
<script>
    $(document).ready(function() {
        var $_assign_form = $('#_prof_assign_form');

        $_assign_form.submit(function() {
@if(empty($sublec['ess']) == false) {{-- 필수과목 --}}
    @foreach($sublec['ess'] as $row)
        @if($row['IsChoice'] == 'Y') {{-- 선택가능일때 과목별로 1개씩 선택 --}}

            if($('input[name^=prod_code_sub_ess_{{$row['CourseIdx']}}_{{$row['SubjectIdx']}}]:checked').length != 1){
                alert("필수과목 {{$row['CourseName']}} 과정의 {{$row['SubjectName']}} 과목을 선택해주십시요.");
                return;
            }
        @endif
    @endforeach
@endif
@if(empty($sublec['choice']) == false) {{-- 선택과목 --}}
    @foreach($sublec['choice'] as $row)
        @if($row['IsChoice'] == 'Y') {{-- 선택가능 --}}
            @if($pkginfo['PackSelCount'] > 0) {{-- 선택과목 갯수가 있을때 코스별로 갯수 선택 --}}

            if($('input[name^=prod_code_sub_choice_{{$row['CourseIdx']}}]:checked').length != {{$pkginfo['PackSelCount']}}){
                alert("선택과목 {{$row['CourseName']}} 과정을 {{$pkginfo['PackSelCount']}}개 선택해주십시요.");
                return;
            }
            @else {{-- 선택과목 갯수가 없을때 과목별로 1개씩 선택 --}}

            if($('input[name^=prod_code_sub_choice_{{$row['CourseIdx']}}_{{$row['SubjectIdx']}}]:checked').length != 1){
                alert("선택과목 {{$row['CourseName']}} 과정의 {{$row['SubjectName']}} 과목을 선택해주십시요.");
                return;
            }
            @endif
        @endif
    @endforeach
@endif

            var _url = '{{ front_url('/classroom/off/AssignProfStore') }}';
            var prod_code_sub = '';

            $_assign_form.find('.prod-code-sub').each(function() {
                if($(this).is(':checked') === true && $(this).is(':enabled') === true) {
                    prod_code_sub += ',' + $(this).val();
                }
            });
            $_assign_form.find('input[name="prod_code_sub"]').val(prod_code_sub.substr(1));

            var data = $_assign_form.serialize();

            if(prod_code_sub == ""){
                alert("강사 선택기간이 아니거나 선택하지 않은 강사가 있습니다.");
                return;
            }

            sendAjax(_url,
                data,
                function(d){
                    alert(d.ret_msg);
                    /*AssignProf('{{$pkginfo['OrderIdx']}}','{{$pkginfo['OrderProdIdx']}}');*/
                    location.reload();
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, true, 'POST', 'json');

        });

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
</script>
