<a class="closeBtn" href="#none" onclick="closeWin('{{$ele_id}}')">
    <img src="{{ img_url('sub/close.png') }}">
</a>
<div class="Layer-Tit tx-dark-black NG">윌비스 <span class="tx-blue">전국모의고사</span></div>
<div class="passzoneTitInfo tx-light-blue tx-center NG mt20">{{$mock_data['ProdName']}}</div>
<div class="PASSZONE-List widthAutoFull">
    <div class="PASSZONE-Lec-Section">
        <div class="LeclistTable">
            <table cellspacing="0" cellpadding="0" class="listTable userMemoTable mockpopupTable under-gray bdt-gray tx-gray GM">
                <colgroup>
                    <col style="width: 20%;"/>
                    <col style="width: 30%;"/>
                    <col style="width: 20%;"/>
                    <col style="width: 30%;"/>
                </colgroup>
                <tbody>
                <tr>
                    <th class="w-tit">이름(아이디)</th>
                    <td class="w-list" colspan="3">{{sess_data('mem_name')}}({{sess_data('mem_id')}})</td>
                </tr>
                <tr>
                    <th class="w-tit">응시형태</th>
                    <td class="w-list"> {{$mock_data['TakeFormsCcd_Name']}}</td>
                    <th class="w-tit">응시분야</th>
                    <td class="w-list">{{$mock_data['CateName']}}</td>
                </tr>
                <tr>
                    <th class="w-tit">응시지역</th>
                    <td class="w-list">
                        @if($mock_data['TakeFormsCcd'] == '690001')
                            전국
                        @else
                                @if(empty($mock_area) == false)
                                    @foreach($mock_area as $row)
                                        @if($row['Ccd'] == $cart_info['take_area'])
                                            {{$row['CcdName']}}
                                        @endif
                                    @endforeach
                                @endif
                        @endif
                    </td>
                    <th class="w-tit">응시번호</th>
                    <td class="w-list tx-bright-gray">결제후 응시번호 확인 가능</td>
                </tr>
                <tr>
                    <th class="w-tit">시험응시일</th>
                    <td class="w-list" colspan="3">{{$mock_data['TakeStartDatm']}} ~ {{$mock_data['TakeEndDatm']}}</td>
                </tr>
                <tr>
                    <th class="w-tit">응시직렬</th>
                    <td class="w-list" colspan="3">
                        @if(empty($mock_part) == false)
                            @foreach($mock_part as $row)
                                @if($row['Ccd'] == $cart_info['take_part'])
                                    {{$row['CcdName']}}
                                @endif
                            @endforeach
                        @endif

                    </td>
                </tr>
                <tr>
                    <th class="w-tit">응시필수과목</th>
                    <td class="w-list" colspan="3">
                        @php
                            $pre = '';
                        @endphp
                        @if(empty($subject_ess) == false)
                            @foreach($subject_ess as $row)
                                @if(empty($pre) == false),@endif
                                    {{$row['SubjectName']}}
                                @php $pre='Y' @endphp
                            @endforeach
                        @endif

                    </td>
                </tr>
                <tr>
                    <th class="w-tit">응시선택과목</th>
                    <td class="w-list" colspan="3">
                        @if(empty($subject_sub) == false)
                            [선택과목1]
                            @foreach($subject_sub as $row)
                                @if( trim($row['MpIdx'].'|'.$row['SubjectIdx']) == trim($cart_info['subject_sub'][0]) ){{$row['SubjectName']}}@endif
                            @endforeach
                            &nbsp;&nbsp;

                            [선택과목2]
                            @foreach($subject_sub as $row)
                                @if( trim($row['MpIdx'].'|'.$row['SubjectIdx']) == trim($cart_info['subject_sub'][1]) ){{$row['SubjectName']}}@endif
                            @endforeach
                        @else
                            선택과목 없음
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="w-tit">가산점</th>
                    <td class="w-list" colspan="3">
                        @if(empty($mock_addpoint) == false)
                            @foreach($mock_addpoint as $row)
                                @if($row['CcdValue'] == $cart_info['add_point'])
                                <label>{{$row['CcdName']}}</label>
                                @endif
                            @endforeach
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <ul class="passzoneListInfo BG tx-gray GM mt20">
        <li class="txt">· 나의 전국 모의고사 접수현황은 내강의실 > 모의고사관리 > 접수현황 메뉴에서 확인 가능합니다.</li>
        <li class="txt">· 나의 전국 모의고사 성적결과는 내강의실 > 모의고사관리 > 성적결과 메뉴에서 확인 가능합니다.</li>
        <li class="txt">· 단, 해당 모의고사 응시완료 시에만 성적결과 보기 및 문제/해설 다운로드가 가능합니다.</li>
    </ul>
    <ul class="passzoneListInfo tx-gray GM mt20 mb20">
        <li class="tit strong">[온라인 모의고사 유의사항]</li>
        <li class="txt">· 온라인 모의고사(응시형태가 Online인 경우)는 내강의실 > 모의고사관리 > 온라인 모의고사 응시 메뉴에서<br/>
            &nbsp; 응시해 주시기 바랍니다.</li>
        <li class="txt">· 시험응시 기간 동안 지정된 시간에만 응시 가능합니다.</li>
    </ul>
</div>

