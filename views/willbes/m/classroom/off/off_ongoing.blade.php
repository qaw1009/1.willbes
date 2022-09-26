@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            수강신청강좌
        </div>
        <div class="lineTabs lecListTabs c_both">
            <ul class="tabWrap lineWrap rowlineWrap lecListWrap two mt-zero">
                <li><a href="#leclist1" class="on">종합반 <span>{{count($pkglist)}}</span></a><span class="row-line">|</span></li>
                <li><a href="#leclist2">단과반 <span>{{count($list)}}</span></a></li>
            </ul>

            <div id="leclist1" class="tabContent">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                    <tbody>
                    @forelse( $pkglist as $key => $row )
                        <tr>
                            <td class="w-data tx-left">
                                <div class="w-tit">{{$row['ProdName']}}</div>
                                @if(in_array($row['SiteCode'], ['2010','2011','2013']))
                                    <ul class="w-info acad tx-gray">
                                        <li>(수강증번호 : {{$row['CertNo']}})</li>
                                    </ul>
                                @endif

                                @if(in_array($row['SiteCode'], ['2002']))
                                    <div class="btnblue02 mt5"><a href="javascript:void(0);" onclick="fnCertificate('Package', '{{$row['OrderIdx']}}', '{{$row['OrderProdIdx']}}', '{{$row['ProdCode']}}', '');">수강증 보기 ></a></div>
                                @endif

                                @if($row['PackTypeCcd'] == '648003')
                                    <div class="btnblue02 mt5"><a href="javascript:;" onclick="ViewAssignProf('{{$row['OrderIdx']}}','{{$row['OrderProdIdx']}}')">강사선택현황보기 ></a></div>
                                @endif

                                @if($row['PackTypeCcd'] == '648003')
                                        <div class="mt10">
                                            <a href="javascript:;" onclick="AssignProf('{{$row['OrderIdx']}}','{{$row['OrderProdIdx']}}')" class="btnSt01 mr10">강사선택</a>
                                            {{-- todo : local, DEV 환경에서만 노출 --}}
                                            @if(ENVIRONMENT == 'local' || ENVIRONMENT == 'development')
                                                @if (empty($pkgLectureRoom[$row['ProdCode']]) === false)
                                                    <a href="javascript:;" class="btnSt02 mr10 onoffSeatBox" data-seat-box-id="{{$key}}">좌석선택</a>
                                                @endif
                                                @if (empty($isPkgCorrectAssignment[$key]) === false && $isPkgCorrectAssignment[$key]['isCorrectAssignment'] === true)
                                                    <a href="javascript:;" class="btnSt03 onoffCorrectAssignmentBox" data-correct-assignment-box-id="{{$key}}">온라인첨삭</a>
                                                @endif
                                            @endif
                                        </div>
                                @else
                                    {{-- todo : local, DEV 환경에서만 노출 --}}
                                    @if(ENVIRONMENT == 'local' || ENVIRONMENT == 'development')
                                        <div class="mt10">
                                            @if (empty($pkgLectureRoom[$row['ProdCode']]) === false)
                                                <a href="javascript:;" class="btnSt02 mr10 onoffSeatBox" data-seat-box-id="{{$key}}">좌석선택</a>
                                            @endif
                                            @if (empty($isPkgCorrectAssignment[$key]) === false && $isPkgCorrectAssignment[$key]['isCorrectAssignment'] === true)
                                                <a href="javascript:;" class="btnSt03 onoffCorrectAssignmentBox" data-correct-assignment-box-id="{{$key}}">온라인첨삭</a>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="w-lecList mt10">
                                        <div class="NG tx14">강좌구성보기 <a href="javascript:;" class="moreBtn">▼</a></div>
                                        <ul>
                                            @if(empty($row['subleclist']) == true)
                                                <li>강의가 없습니다.</li>
                                            @else
                                                @foreach($row['subleclist'] as $subrow)
                                                    <li>
                                                        <div>{{$subrow['SubjectName']}}<span class="row-line">|</span>{{$subrow['wProfName']}} 교수님</div>
                                                        <div class="w-tit">
                                                            <span class="tx-blue">{{ $subrow['StudyPatternCcdName'] }}</span> {{$subrow['subProdName']}}
                                                            @if($subrow['IsDisp'] == 'N')
                                                                <span>인강전환</span>
                                                            @endif
                                                        </div>
                                                        <div class="w-info acad tx-gray">
                                                            수강기간 : {{str_replace('-', '.', $subrow['StudyStartDate'])}} ~ {{str_replace('-', '.', $subrow['StudyEndDate'])}}<br>
                                                            요일/회차 : {{$subrow['WeekArrayName']}} {{$subrow['Amount']}}회차 <span class="row-line">|</span>
                                                            @if($subrow['StudyStartDate'] > date('Y-m-d', time()))
                                                                {{str_replace('-', '.', $subrow['StudyStartDate'])}} 개강
                                                            @else
                                                                진행중
                                                            @endif
                                                        </div>
                                                        <div class="supplementBtn">
                                                            @if(empty($subrow['SuppProdCode']) == false && $subrow['SuppIsUse'] == 'Y' && $subrow['IsDisp'] != 'N')
                                                                <a href="javascript:void(0);" onclick="fnBogang('{{$subrow['OrderIdx']}}', '{{$subrow['OrderProdIdx']}}', '{{$subrow['ProdCode']}}', '{{$subrow['ProdCodeSub']}}', 'P')">보강/복습동영상 신청 ></a>
                                                            @endif
                                                            @if(in_array($subrow['SiteCode'], ['2018']))
                                                                <a href="javascript:void(0);" onclick="fnCertificate('Package', '{{$subrow['OrderIdx']}}', '{{$subrow['OrderProdIdx']}}', '{{$subrow['ProdCode']}}', '{{$subrow['ProdCodeSub']}}');" class="type2">수강증 보기 ></a>
                                                            @endif
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                @endif

                                {{-- 좌석box --}}
                                <div class="w-info bg-light-gray pd10 mt10 bdb-bright-gray seat-box" id="seat_box_{{$key}}" style="display: none;">
                                    @if (empty($row['subleclist']) === false)
                                        @foreach($row['subleclist'] as $sub_key => $sub_row)
                                            @if (empty($pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]) === false)
                                                <input type="hidden" id="order_idx_Y_{{ $key }}_{{ $sub_key }}" value="{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['OrderIdx'] }}">
                                                <input type="hidden" id="order_prod_idx_Y_{{ $key }}_{{ $sub_key }}" value="{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['OrderProdIdx'] }}">
                                                <input type="hidden" id="lr_code_Y_{{ $key }}_{{ $sub_key }}" value="{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['LrCode'] }}">
                                                <input type="hidden" id="lr_unit_code_Y_{{ $key }}_{{ $sub_key }}" value="{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['LrUnitCode'] }}">
                                                <input type="hidden" id="prod_code_Y_{{ $key }}_{{ $sub_key }}" value="{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['ProdCodeMaster'] }}">
                                                <input type="hidden" id="prod_code_sub_Y_{{ $key }}_{{ $sub_key }}" value="{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['ProdCodeSub'] }}">

                                                @if($loop->first === false) <div class="mt20"></div> @endif
                                                <div>{{$sub_row['CourseName']}} <span class="row-line">|</span>{{$sub_row['SubjectName']}}<span class="row-line">|</span>{{$sub_row['wProfName']}}</div>
                                                <div class="w-tit mb10">{{$sub_row['subProdName']}}</div>
                                                <ul>
                                                    <li>[강의실명] <span class="tx-light-blue">{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['LectureRoomName'] }}</span>
                                                        <span class="row-line">|</span>
                                                        <span class="tx-light-blue">{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['UnitName'] }}</span><li>
                                                    <li>[좌석번호]
                                                        <span class="tx-light-blue">
                                                        {!! ((empty($pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['LrrursIdx']) === true) ?
                                                                    "<span class='tx-red'>미선택</span>" : "<span>{$pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['MemSeatNo']}</span>") !!}
                                                            {!! ($pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['MemSeatStatusCcd'] == '728003') ? "<span class='tx-red'>[퇴실]</span>" : "" !!}
                                                    </span>
                                                    <li>
                                                    <li>[좌석선택기간]
                                                        {{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['SeatChoiceStartDate'] }}
                                                        ~ {{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['SeatChoiceEndDate'] }}
                                                    <li>
                                                </ul>
                                                <div class="mt10">
                                                    <a href="javascript:;" class="btnStfull01" onclick="AssignSeat('Y','{{ $key }}','{{ $sub_key }}','{{
                                                    (($pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['SeatChoiceStartDate'] <= date('Y-m-d')
                                                    && date('Y-m-d') <= $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['SeatChoiceEndDate']) ? 'Y' : 'N')}}')">좌석선택 >
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>

                                {{-- 온라인첨삭box --}}
                                <div class="w-info bg-light-gray pd10 mt10 bdb-bright-gray seat-box" id="correct_assignment_box_{{$key}}" style="display: none;">
                                    @if (empty($row['subleclist']) === false)
                                        @foreach($row['subleclist'] as $sub_key => $sub_row)
                                            @if (in_array('731001',explode(',',$sub_row['OptionCcds'])) === true)
                                                @if($loop->first === false) <div class="mt20"></div> @endif
                                                <div>
                                                    {{$sub_row['CourseName']}} <span class="row-line">|</span>
                                                    {{$sub_row['SubjectName']}}<span class="row-line">|</span>
                                                    {{$sub_row['wProfName']}}<span class="row-line">|</span>
                                                    {{$sub_row['subProdName']}}
                                                </div>
                                                <div class="mt10"><a href="javascript:;" class="btnStfull02 btn-assignment" data-prod-code="{{ $sub_row['ProdCodeSub'] }}">온라인첨삭 ></a></div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="w-data tx-center">수강신청 강좌가 없습니다.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div id="leclist2" class="tabContent">
                <form name="searchFrm" id="searchFrm" action="{{front_url('/classroom/off/list/ongoing/')}}" onsubmit="">
                    <div class="willbes-Lec-Selected NG c_both tx-gray">
                        <select id="sitegroup_ccd" name="sitegroup_ccd" title="process" class="seleProcess width21p">
                            <option selected="selected" value="">과정</option>
                            @foreach($sitegroup_arr as $row )
                                <option value="{{$row['SiteGroupCode']}}" @if(isset($input_arr['sitegroup_ccd']) && $input_arr['sitegroup_ccd'] == $row['SiteGroupCode']) selected="selected" @endif  >{{$row['SiteGroupName']}}</option>
                            @endforeach
                        </select>
                        <select id="subject_ccd" name="subject_ccd" title="lec" class="seleLec width21p ml1p">
                            <option selected="selected" value="">과목</option>
                            @foreach($subject_arr as $row )
                                <option value="{{$row['SubjectIdx']}}" @if(isset($input_arr['subject_ccd']) && $input_arr['subject_ccd'] == $row['SubjectIdx']) selected="selected" @endif >{{$row['SubjectName']}}</option>
                            @endforeach
                        </select>
                        <select id="prof_ccd" name="prof_ccd" title="Prof" class="seleProf width45p ml1p">
                            <option selected="selected" value="">교수님</option>
                            @foreach($prof_arr as $row )
                                <option value="{{$row['wProfIdx']}}" @if(isset($input_arr['prof_ccd']) && $input_arr['prof_ccd'] == $row['wProfIdx']) selected="selected" @endif >{{$row['wProfName']}}</option>
                            @endforeach
                        </select>
                        <div class="resetBtn width10p ml1p">
                            <a href="{{front_url('/classroom/off/list/ongoing')}}"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
                        </div>
                    </div>
                </form>
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                    <tbody>
                    @forelse( $list as $key => $row )
                        <tr>
                            <td class="w-data tx-left">
                                @if($row['IsDisp'] == 'N')
                                    <div class="OTclass mr10"><span class="red">인강전환</span></div>
                                @endif
                                <dl class="w-info">
                                    <dt>
                                        {{$row['SubjectName']}}<span class="row-line">|</span>{{$row['wProfName']}}교수님
                                        <span class="NSK ml10 nBox n{{ substr($row['AcceptStatusCcd'], -1)+1 }}">{{$row['AcceptStatusCcdName']}}</span>
                                    </dt>
                                </dl>
                                <div class="w-tit">
                                    <span class="tx-blue">{{ $row['StudyPatternCcdName'] }}</span>
                                    {{$row['subProdName']}}
                                </div>
                                <dl class="w-info acad tx-gray mb10">
                                    @if(in_array($row['SiteCode'], ['2010','2011','2013']))
                                        <dt>
                                            (수강증번호 : {{$row['CertNo']}})<span class="row-line">|</span>
                                        </dt>
                                    @endif
                                    <dt>
                                        수강기간 : {{str_replace('-', '.', $row['StudyStartDate'])}} ~ {{str_replace('-', '.', $row['StudyEndDate'])}}<span class="row-line">|</span>
                                    </dt>
                                    <dt>요일/회차 : {{$row['WeekArrayName']}} {{$row['Amount']}}회차<span class="row-line">|</span>
                                        @if($row['StudyStartDate'] > date('Y-m-d', time()))
                                            {{str_replace('-', '.', $row['StudyStartDate'])}}<br/>
                                            개강
                                        @else
                                            진행중
                                        @endif
                                    </dt>
                                </dl>

                                {{-- todo : local, DEV 환경에서만 노출 --}}
                                @if(ENVIRONMENT == 'local' || ENVIRONMENT == 'development')
                                    {{-- 단강좌 좌석선택 --}}
                                    @if (empty($listLectureRoom[$row['ProdCode']]) === false)
                                        <input type="hidden" id="order_idx_N_0_{{ $key }}" value="{{ $listLectureRoom[$row['ProdCode']]['OrderIdx'] }}">
                                        <input type="hidden" id="order_prod_idx_N_0_{{ $key }}" value="{{ $listLectureRoom[$row['ProdCode']]['OrderProdIdx'] }}">
                                        <input type="hidden" id="lr_code_N_0_{{ $key }}" value="{{ $listLectureRoom[$row['ProdCode']]['LrCode'] }}">
                                        <input type="hidden" id="lr_unit_code_N_0_{{ $key }}" value="{{ $listLectureRoom[$row['ProdCode']]['LrUnitCode'] }}">
                                        <input type="hidden" id="prod_code_N_0_{{ $key }}" value="{{ $listLectureRoom[$row['ProdCode']]['ProdCodeMaster'] }}">
                                        <input type="hidden" id="prod_code_sub_N_0_{{ $key }}" value="{{ $listLectureRoom[$row['ProdCode']]['ProdCodeSub'] }}">

                                        <div class="w-info bg-light-gray pd10 bdb-bright-gray">
                                            <ul class="mb10">
                                                <li>[강의실명]
                                                    <span class="tx-light-blue">{{ $listLectureRoom[$row['ProdCode']]['LectureRoomName'] }}</span>
                                                    <span class="row-line">|</span>
                                                    <span class="tx-light-blue">{{ $listLectureRoom[$row['ProdCode']]['UnitName'] }}</span>
                                                <li>
                                                <li>[좌석번호]
                                                    <span class="tx-light-blue">
                                                        {!! ((empty($listLectureRoom[$row['ProdCode']]['LrrursIdx']) === true) ?
                                                            "<span class='tx-red'>미선택</span>" : "<span>{$listLectureRoom[$row['ProdCode']]['MemSeatNo']}</span>") !!}
                                                        {!! ($listLectureRoom[$row['ProdCode']]['MemSeatStatusCcd'] == '728003') ? "<span class='tx-red'>[퇴실]</span>" : "" !!}
                                                    </span>
                                                <li>
                                                <li>[좌석선택기간] {{ $listLectureRoom[$row['ProdCode']]['SeatChoiceStartDate'] }} ~ {{ $listLectureRoom[$row['ProdCode']]['SeatChoiceEndDate'] }}<li>
                                            </ul>
                                            <div class="mb10">
                                                <a href="javascript:;" class="btnStfull01" onclick="AssignSeat('N','0','{{ $key }}','{{
                                                    (($listLectureRoom[$row['ProdCode']]['SeatChoiceStartDate'] <= date('Y-m-d')
                                                    && date('Y-m-d') <= $listLectureRoom[$row['ProdCode']]['SeatChoiceEndDate']) ? 'Y' : 'N')}}')">좌석선택 ></a>
                                            </div>
                                        </div>
                                    @endif

                                    {{-- 단강좌 온라인 첨삭 --}}
                                    @if (in_array('731001',explode(',',$row['OptionCcds'])) === true)
                                        <div class="pd10 mt10">
                                            <a href="javascript:;" class="btnStfull02 btn-assignment" data-prod-code="{{ $row['ProdCode'] }}">온라인첨삭 ></a>
                                        </div>
                                    @endif
                                @endif

                                @if(empty($row['SuppProdCode']) == false && $row['SuppIsUse'] == 'Y' && $row['IsDisp'] != 'N')
                                    <div class="mb10"><a href="#none" onclick="fnBogang('{{$row['OrderIdx']}}', '{{$row['OrderProdIdx']}}', '{{$row['ProdCode']}}', '{{$row['ProdCodeSub']}}', '')" class="btnStfull03">보강/복습동영상 신청 ></a></div>
                                @endif

                                @if(in_array($row['SiteCode'], ['2002', '2018']))
                                    <div class="mb10"><a href="javascript:void(0);" onclick="fnCertificate('Lecture', '{{$row['OrderIdx']}}', '{{$row['OrderProdIdx']}}', '{{$row['ProdCode']}}', '{{$row['ProdCodeSub']}}');" class="btnStfull04">수강증 보기 ></a></div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="w-data tx-center">수강신청 강좌가 없습니다.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>


        </div>
        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->

        <div id="protect" class="willbes-Layer-Black NG">
            <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h510 fix">
                <a class="closeBtn" href="#none" onclick="closeWin('protect')">
                    <img src="{{ img_url('m/calendar/close.png') }}">
                </a>
                <h4>개인정보활용 및 환불정책 안내</h4>
                <div class="protectBox">
                    <div class="protectBoxWrap">
                        <h5>개인정보활용 안내</h5>
                        <div class="tx-dark-gray protectBoxSm">
                            윌비스는 고객의 개인정보보호를 소중하게 생각하고, 고객의 개인정보를 보호하기 위하여 항상 최선을 다해 노력하고 있습니다.<br>
                            윌비스는 개인정보보호 관련 주요 법률인「정보통신망 이용촉진 및 정보보호 등에 관한 법률」을 비롯한 모든 개인정보보호 관련 법률을 준수하고 있습니다.<br>
                            또한, 윌비스는「개인정보처리방침」을 제정하여 이를 준수하고 있으며, 윌비스의「개인정보처리방침」을 홈페이지에 공개하여 고객이 언제나 용이하게 열람할 수 있도록 하고 있습니다.<br>
                            윌비스의「개인정보처리방침」은 관련 법률 및 지침의 변경 또는 내부 운영 방침의 변경에 따라 변경될 수 있습니다.<br>
                            윌비스의「개인정보처리방침」이 변경될 경우 변경된 사항을 홈페이지를 통하여 공지합니다.<br>
                            윌비스 개인정보처리방침은 아래와 같은 내용을 담고 있습니다.<br>
                            <br>
                            <div><a href="https://www.willbes.net/company/protect" target="_blank" class="tx-blue">[윌비스 개인정보 취급방침 보기 →]</a></div>
                        </div>
                        <div class="chkBoxAgree">
                            <input type="checkbox" id="protect_check01" name="protect_check01" onchange="protectCheck();">
                            <label for="protect_check01">위 개인정보활용 안내사항을 모두 읽었으며 동의합니다. (필수)</label>
                        </div>

                        <h5 class="mt20">환불정책 안내</h5>
                        <div class="tx-dark-gray protectBoxSm">
                            <p class="tx14">⊙ 한림법학원 실강종합반 환불정책</p>
                            (학원설립및과외교습에관한법률 제18조 및 동시행령 제18조에 근거함)<br>
                            <br>
                            - 환불시 강의료 정산 = 총 등록(결제) 금액 - 퇴원일까지 진행된 강의 수강료*<br>
                            * 퇴원일까지 진행된 강의 수강료 기준: 단과 수강료 기준 1회당 가격 X 진행된 강의 횟수<br>
                            - 강의 개강일 기준 총 회차의 50% 이상이 진행된 경우 해당강의는 전회차 수강료로 정산됩니다.<br>
                            - 종합반 반 변경은 불가하며, 기존 종합반 탈퇴 후 재가입하셔야 합니다. (탈퇴 시 상기 환불정책 준수)<br>
                            <br>
                            <div><a href="https://www.willbes.net/company/protect" target="_blank" class="tx-blue">[윌비스 이용약관 보기 →]</a></div>
                        </div>
                        <div class="chkBoxAgree">
                            <input type="checkbox" id="protect_check02" name="protect_check02" onchange="protectCheck();">
                            <label for="protect_check02">위 환불정책 안내사항을 모두 읽었으며 동의합니다. (필수)</label>
                        </div>
                    </div>

                    <div class="allBtn">
                        위 개인정보 활용 및 환불정책 안내사항을 모두 읽었으며 동의합니다.
                        <a href="#none" onclick="protectCheckAll();">전체동의</a>
                    </div>
                </div>


            </div>

            <div class="dim" onclick="closeWin('InfoForm')"></div>
        </div>

    </div>
    <!-- End Container -->
    <form name="postForm" id="postForm" method="post">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="orderidx" id="orderidx" value="" />
        <input type="hidden" name="orderprodidx" id="orderprodidx" value="" />
    </form>

    <form name="bogangForm" id="bogangForm" method="get">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="o" id="o" value="" />
        <input type="hidden" name="op" id="op" value="" />
        <input type="hidden" name="p" id="p" value="" />
        <input type="hidden" name="ps" id="ps" value="" />
        <input type="hidden" name="t" id="t" value="" />
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#course_ccd,#subject_ccd,#prof_ccd,#sitegroup_ccd').on('change', function (){
                $('#searchFrm').submit();
            });

            // 검색어 입력 후 엔터
            $('#search_text').on('keyup', function() {
                if (window.event.keyCode === 13) {
                }
            });

            //좌석선택Box on/off
            $('.onoffSeatBox').on('click', function () {
                $('#seat_box_'+$(this).data('seat-box-id')).toggle();
            });

            //온라인첨삭Box on/off
            $('.onoffCorrectAssignmentBox').on('click', function () {
                $('#correct_assignment_box_'+$(this).data('correct-assignment-box-id')).toggle();
            });

            //온라인첨삭
            $('.btn-assignment').on('click', function () {
                location.href = "{{ front_url("/classroom/assignmentProduct?prod_code=") }}" + $(this).data("prod-code");
            });
        });

        function ViewAssignProf(o,op){
            $('#orderidx').val(o);
            $('#orderprodidx').val(op);
            $("#postForm").attr("action", "{{ front_url("/classroom/off/ViewAssignProf/") }}").submit();
        }

        let assign_o = '';
        let assign_op = '';

        function AssignProf(o,op)
        {
            assign_o = o;
            assign_op = op;

            if($.cookie('_wb_client_protect_' + o + '_' + op) === 'done'){
                AssignProf_submit(false);
                return;
            }

            $("#protect_check01").prop('checked', false);
            $("#protect_check02").prop('checked', false);
            $("#protect").show();
        }

        function protectCheck()
        {
            if($("#protect_check01").is(':checked') === true && $("#protect_check02").is(':checked') === true){
                setTimeout(AssignProf_submit, 100);
            }
        }

        function protectCheckAll()
        {
            $("#protect_check01").prop('checked', true);
            $("#protect_check02").prop('checked', true);
            setTimeout(AssignProf_submit, 100);
        }

        function AssignProf_submit(popup = false)
        {
            let domains = location.hostname.split('.');
            let domain = '.' + domains[domains.length - 2] + '.' + domains[domains.length - 1];

            $.cookie('_wb_client_protect_' + assign_o + '_' + assign_op, 'done', {
                domain: domain,
                path: '/',
                expires: 365
            });

            if(popup === true){
                alert('개인정보활용 및 환불정책 안내에 동의하셨습니다. 강사를 선택해 주세요.');
            }

            $('#orderidx').val(assign_o);
            $('#orderprodidx').val(assign_op);
            $("#postForm").attr("action", "{{ front_url("/classroom/off/AssignProf/") }}").submit();
        }

        function AssignSeat(pkg_yn, p_no, no, flag)
        {
            if (flag != 'Y') {
                alert('좌석 선택 기간이 아닙니다.');
                return;
            }
            var params = '?orderidx='+$("#order_idx_"+pkg_yn+'_'+p_no+'_'+no).val();
            params += '&orderprodidx='+$("#order_prod_idx_"+pkg_yn+'_'+p_no+'_'+no).val();
            params += '&pkg_yn='+pkg_yn;
            params += '&prod_code='+$("#prod_code_"+pkg_yn+'_'+p_no+'_'+no).val();
            params += '&prod_code_sub='+$("#prod_code_sub_"+pkg_yn+'_'+p_no+'_'+no).val();
            params += '&lr_code='+$("#lr_code_"+pkg_yn+'_'+p_no+'_'+no).val();
            params += '&lr_unit_code='+$("#lr_unit_code_"+pkg_yn+'_'+p_no+'_'+no).val();
            location.href = "{{ front_url("/classroom/off/assignSeat") }}" + params;
        }

        function fnBogang(o, op, p, ps, t)
        {
            $('#o').val(o);
            $('#op').val(op);
            $('#p').val(p);
            $('#ps').val(ps);
            $('#t').val(t);
            $("#bogangForm").attr("action", "{{ front_url("/classroom/off/layerBogang/") }}").submit();
        }

        function fnCertificate(t, o, op, p, ps)
        {
            var params = 'o=' + o + '&op=' + op + '&p=' + p + '&ps=' + ps;
            location.href = '{{ front_url('/classroom/certificate/off') }}' + t + '?' + params;
        }
    </script>
@stop