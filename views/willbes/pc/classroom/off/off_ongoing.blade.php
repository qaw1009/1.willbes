@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="willbes-Leclist c_both">
                <div class="c_both mb30">
                    <ul class="tabWrap tabDepthPass">
                        <li><a href="#Mypagetab1" id="tab1" class="on">종합반 ({{count($pkglist)}})</a></li>
                        <li><a href="#Mypagetab2" id="tab2">단과반 ({{count($list)}})</a></li>
                    </ul>
                </div>
                <div id="_top"></div>
                <div id="Mypagetab1">
                    <div class="willbes-Lec-Table NG d_block c_both">
                        <table cellspacing="0" cellpadding="0" class="lecTable acadTable bdt-dark-gray">
                            <colgroup>
                                <col>
                                {{-- <col style="width: 140px;"> --}}
                                <col style="width: 120px;">
                            </colgroup>
                            <tbody>
                            @forelse( $pkglist as $key => $row )
                                <tr>
                                    <td class="w-data tx-left pl10">
                                        <div class="w-tit">{{$row['ProdName']}}</div>
                                        @if(in_array($row['SiteCode'], ['2010','2011','2013']))
                                            <dl class="w-info">
                                                <dt>
                                                    (수강증번호 : {{$row['CertNo']}})
                                                </dt>
                                            </dl>
                                        @endif
                                        @if($row['PackTypeCcd'] == '648003')
                                            <div class="lookover profLook"><a href="javascript:;" onclick="ViewAssignProf('{{$row['OrderIdx']}}','{{$row['OrderProdIdx']}}')">강사선택현황보기 ></a></div>
                                        @endif
                                    </td>
                                    {{-- <td class="w-period">{{str_replace('-', '.', $row['StudyStartDate'])}} <br>
                                        ~ {{str_replace('-', '.', $row['StudyEndDate'])}}</td> --}}
                                    @if($row['PackTypeCcd'] == '648003')
                                        <td class="w-answer p_re">
                                            <a href="javascript:;" onclick="AssignProf('{{$row['OrderIdx']}}','{{$row['OrderProdIdx']}}')"><span class="bBox blueBox">강사선택하기</span></a>
                                            @if (empty($pkgLectureRoom[$row['ProdCode']]) === false)
                                                <a href="javascript:;" class="onoffSeatBox" data-seat-box-id="{{$key}}"><span class="bBox blackBox">좌석선택하기</span></a>
                                            @endif

                                            @if (empty($isPkgCorrectAssignment[$key]) === false && $isPkgCorrectAssignment[$key]['isCorrectAssignment'] === true)
                                                <a href="#none"><span class="onoffCorrectAssignmentBox bBox red-line-Box" data-correct-assignment-box-id="{{$key}}">온라인첨삭</span></a>
                                            @endif
                                        </td>
                                    @else
                                        <td class="w-answer p_re">
                                            {{-- <a href="#none" onclick="$('willbes-Layer-lecList').hide();openWin('lecList{{$row['OrderProdIdx']}}')"><span class="bBox grayBox">강좌구성보기</span></a> --}}
                                            <div class="MoreBtn mt0"><a href="#none" onclick="$('#more_lec_{{$key}}').toggle()" class="bBox grayBox">강좌구성 보기</a></div>
                                            @if (empty($pkgLectureRoom[$row['ProdCode']]) === false)
                                                <a href="javascript:;" class="onoffSeatBox" data-seat-box-id="{{$key}}"><span class="bBox blackBox">좌석선택하기</span></a>
                                            @endif
                                            @if (empty($isPkgCorrectAssignment[$key]) === false && $isPkgCorrectAssignment[$key]['isCorrectAssignment'] === true)
                                                <a href="#none"><span class="onoffCorrectAssignmentBox bBox red-line-Box" data-correct-assignment-box-id="{{$key}}">온라인첨삭</span></a>
                                            @endif

                                            <div id="lecList{{$row['OrderProdIdx']}}" class="willbes-Layer-lecList">
                                                <a class="closeBtn" href="#none" onclick="closeWin('lecList{{$row['OrderProdIdx']}}')">
                                                    <img src="{{ img_url('prof/close.png') }}">
                                                </a>
                                                <div class="Layer-Cont">
                                                    <div class="Layer-SubTit tx-gray">
                                                        <ul>
                                                            @if(empty($row['subleclist']) == true)
                                                                <li>강의가 없습니다.</li>
                                                            @else
                                                                @foreach($row['subleclist'] as $subrow)
                                                                    <li>{{$subrow['subProdName']}}
                                                                        <div>
                                                                        @if($subrow['isbook'] == 'Y')
                                                                            @if($subrow['IsDisp'] == 'N')
                                                                                <a href="#none" onclick="alert('인강으로 전환된 강좌로 교재구매가 불가능합니다');">교재구매</a>
                                                                            @else
                                                                                <a href="#none" onclick="fnBookLayer('{{$subrow['ProdCode']}}','{{$subrow['ProdCodeSub']}}');">교재구매</a>
                                                                            @endif
                                                                        @endif
                                                                        @if($subrow['IsDisp'] == 'N')
                                                                            <span class="oBox changeBox ml5 NG">인강전환</span>
                                                                        @endif
                                                                        @if(empty($subrow['SuppProdCode']) == false && $subrow['SuppIsUse'] == 'Y' && $subrow['IsDisp'] != 'N')
                                                                            <a href="#none" onclick="fnBogang('{{$subrow['OrderIdx']}}', '{{$subrow['OrderProdIdx']}}', '{{$subrow['ProdCode']}}', '{{$subrow['ProdCodeSub']}}', 'P')" class="blue">보강/복습동영상신청 ></a>
                                                                        @endif
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                                @if($row['PackTypeCcd'] == '648003')
                                @else
                                <tr style="display: none;" id="more_lec_{{$key}}">
                                    <td colspan="3">
                                        <div class="all-list-box">
                                            @if(empty($row['subleclist']) == true)
                                            <div class="all-list">
                                                <dl class="w-info">
                                                    <dt></dt>
                                                </dl>
                                                <div class="w-tit"></div>
                                                <div class="lookover">
                                                </div>
                                                <div class="all-schedule">
                                                </div>
                                            </div>
                                            @else
                                                @foreach($row['subleclist'] as $subrow)
                                            <div class="all-list">
                                                <dl class="w-info">
                                                    <dt>
                                                        {{$subrow['CourseName']}}<span class="row-line">|</span>
                                                        {{$subrow['SubjectName']}}<span class="row-line">|</span>
                                                        {{$subrow['wProfName']}} 교수님
                                                        @if($subrow['IsDisp'] == 'N')
                                                            <span class="oBox changeBox ml10 NSK">인강전환</span>
                                                        @endif
                                                    </dt>
                                                </dl>
                                                <div class="w-tit"><span class="tx-blue">{{ $subrow['StudyPatternCcdName'] }}</span> {{$subrow['subProdName']}}</div>
                                                <div class="lookover">
                                                    @if($subrow['isbook'] == 'Y')
                                                        @if($subrow['IsDisp'] == 'N')
                                                            <a href="#none" onclick="alert('인강으로 전환된 강좌로 교재구매가 불가능합니다');" class="buyBook">교재구매</a>
                                                        @else
                                                            <a href="#none" onclick="fnBookLayer('{{$subrow['ProdCode']}}','{{$subrow['ProdCodeSub']}}')" class="buyBook">교재구매 ></a>
                                                        @endif
                                                    @endif
                                                    @if(empty($subrow['SuppProdCode']) == false && $subrow['SuppIsUse'] == 'Y' && $subrow['IsDisp'] != 'N')
                                                        <a href="#none" onclick="fnBogang('{{$subrow['OrderIdx']}}', '{{$subrow['OrderProdIdx']}}', '{{$subrow['ProdCode']}}', '{{$subrow['ProdCodeSub']}}', 'P')" class="supplement">보강/복습동영상신청 ></a>
                                                    @endif
                                                </div>
                                                <div class="all-schedule">
                                                    {{str_replace('-', '.', $subrow['StudyStartDate'])}} ~ {{str_replace('-', '.', $subrow['StudyEndDate'])}}<br>
                                                    {{$subrow['WeekArrayName']}} {{$subrow['Amount']}}회차
                                                </div>
                                            </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endif

                                <tr class="seat-box" id="seat_box_{{$key}}" style="display: none;">
                                    <td colspan="3"class="w-data tx-left pl10 bg-light-gray ">
                                        @if (empty($row['subleclist']) === false)
                                            @foreach($row['subleclist'] as $sub_key => $sub_row)
                                                @if (empty($pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]) === false)
                                                    <input type="hidden" id="order_idx_Y_{{ $key }}_{{ $sub_key }}" value="{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['OrderIdx'] }}">
                                                    <input type="hidden" id="order_prod_idx_Y_{{ $key }}_{{ $sub_key }}" value="{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['OrderProdIdx'] }}">
                                                    <input type="hidden" id="lr_code_Y_{{ $key }}_{{ $sub_key }}" value="{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['LrCode'] }}">
                                                    <input type="hidden" id="lr_unit_code_Y_{{ $key }}_{{ $sub_key }}" value="{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['LrUnitCode'] }}">
                                                    <input type="hidden" id="prod_code_Y_{{ $key }}_{{ $sub_key }}" value="{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['ProdCodeMaster'] }}">
                                                    <input type="hidden" id="prod_code_sub_Y_{{ $key }}_{{ $sub_key }}" value="{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['ProdCodeSub'] }}">
                                                    <div class="mb10">
                                                        <dl class="w-info">
                                                            <dt>
                                                                {{$sub_row['CourseName']}}<span class="row-line">|</span>{{$sub_row['SubjectName']}}<span class="row-line">|</span>
                                                                {{$sub_row['wProfName']}} 교수님 <span class="row-line">|</span> {{$sub_row['subProdName']}}
                                                            </dt>
                                                        </dl>
                                                        <ul class="seatsection">
                                                            <li>
                                                                <button id="btn_assign_seat_Y_{{ $key }}_{{ $sub_key }}" onclick="AssignSeat('Y','{{ $key }}','{{ $sub_key }}','{{
                                                                        (($pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['SeatChoiceStartDate'] <= date('Y-m-d')
                                                                        && date('Y-m-d') <= $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['SeatChoiceEndDate']) ? 'Y' : 'N')}}')">좌석선택 ></button>
                                                            </li>
                                                            <li>[강의실명] <span>{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['LectureRoomName'] }} | {{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['UnitName'] }}</span></li>
                                                            <li id="seat_id_{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['OrderIdx'] }}_{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['LrUnitCode'] }}">
                                                                [좌석번호]
                                                                {!! ((empty($pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['LrrursIdx']) === true) ?
                                                                "<span class='tx-red'>미선택</span>" : "<span>{$pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['MemSeatNo']}</span>") !!}
                                                                {!! ($pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['MemSeatStatusCcd'] == '728003') ? "<span class='tx-red'>[퇴실]</span>" : "" !!}
                                                            </li>
                                                            <li>[좌석선택기간]
                                                                {{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['SeatChoiceStartDate'] }}
                                                                ~ {{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['SeatChoiceEndDate'] }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>

                                {{-- 온라인첨삭 BOX --}}
                                <tr class="seat-box" id="correct_assignment_box_{{$key}}" style="display: none;">
                                    <td colspan="3"class="w-data tx-left pl10 bg-light-gray ">
                                        @if (empty($row['subleclist']) === false)
                                            @foreach($row['subleclist'] as $sub_key => $sub_row)
                                                @if (in_array('731001',explode(',',$sub_row['OptionCcds'])) === true)
                                                    <div class="mb10">
                                                        <dl class="w-info">
                                                            <dt>
                                                                {{$sub_row['CourseName']}}<span class="row-line">|</span>{{$sub_row['SubjectName']}}<span class="row-line">|</span>
                                                                {{$sub_row['wProfName']}} 교수님 <span class="row-line">|</span> {{$sub_row['subProdName']}}
                                                            </dt>
                                                        </dl>
                                                        <div class="lookover"><a href="#none" onclick="assignmentBoardModal('{{ $sub_row['ProdCodeSub'] }}')">온라인첨삭 &gt;</a></div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="tx-center">수강신청 강좌 정보가 없습니다.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="Mypagetab2">
                    <form name="searchFrm" id="searchFrm" action="{{app_url('/classroom/off/list/ongoing/', 'www')}}" onsubmit="">
                        <div class="willbes-Lec-Selected willbes-Mypage-Selected tx-gray">
                            <select id="sitegroup_ccd" name="sitegroup_ccd" title="process" class="seleProcess">
                                <option selected="selected" value="">과정</option>
                                @foreach($sitegroup_arr as $row )
                                    <option value="{{$row['SiteGroupCode']}}" @if(isset($input_arr['sitegroup_ccd']) && $input_arr['sitegroup_ccd'] == $row['SiteGroupCode']) selected="selected" @endif  >{{$row['SiteGroupName']}}</option>
                                @endforeach
                            </select>
                        {{--
                        <select id="course_ccd" name="course_ccd" title="process" class="seleProcess">
                            <option selected="selected" value="">과정</option>
                            @foreach($course_arr as $row )
                            <option value="{{$row['CourseIdx']}}" @if(isset($input_arr['course_ccd']) && $input_arr['course_ccd'] == $row['CourseIdx']) selected="selected" @endif  >{{$row['CourseName']}}</option>
                            @endforeach
                                </select>
                                --}}
                            <select id="subject_ccd" name="subject_ccd" title="lec" class="seleLec">
                                <option selected="selected" value="">과목</option>
                                @foreach($subject_arr as $row )
                                    <option value="{{$row['SubjectIdx']}}" @if(isset($input_arr['subject_ccd']) && $input_arr['subject_ccd'] == $row['SubjectIdx']) selected="selected" @endif >{{$row['SubjectName']}}</option>
                                @endforeach
                            </select>
                            <select id="prof_ccd" name="prof_ccd" title="Prof" class="seleProf">
                                <option selected="selected" value="">교수님</option>
                                @foreach($prof_arr as $row )
                                    <option value="{{$row['wProfIdx']}}" @if(isset($input_arr['prof_ccd']) && $input_arr['prof_ccd'] == $row['wProfIdx']) selected="selected" @endif >{{$row['wProfName']}}</option>
                                @endforeach
                            </select>
                            <select id="orderby" name="orderby" title="Laststudy" class="seleStudy">
                                <option value="OrderDate^ASC" @if(isset($input_arr['orderby']) && $input_arr['orderby'] == 'OrderDate^ASC') selected="selected" @endif>신청일순</option>
                                <option value="StudyStartDate^ASC" @if(isset($input_arr['orderby']) && $input_arr['orderby'] == 'StudyStartDate^ASC') selected="selected" @endif>개강일순</option>
                                <option value="StudyEndDate^ASC" @if(isset($input_arr['orderby']) && $input_arr['orderby'] == 'StudyEndDate^ASC') selected="selected" @endif>종료임박순</option>
                            </select>
                            <div class="willbes-Lec-Search GM f_right">
                                <div class="inputBox p_re">
                                    <input type="text" id="search_text" name="search_text" class="labelSearch" value="@if(isset($input_arr['search_text'])){{$input_arr['search_text']}}@endif" placeholder="강좌명을 검색해 주세요" maxlength="30">
                                    <button type="submit" class="search-Btn">
                                        <span>검색</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="willbes-Lec-Table NG d_block c_both">
                        <table cellspacing="0" cellpadding="0" class="lecTable acadTable bdt-dark-gray">
                            <colgroup>
                                <col>
                                <col style="width: 140px;">
                                <col style="width: 120px;">
                            </colgroup>
                            <tbody>
                            @forelse( $list as $key => $row )
                                <tr>
                                    <td class="w-data tx-left pl10">
                                        <dl class="w-info">
                                            <dt>
                                                {{$row['CourseName']}}<span class="row-line">|</span>
                                                </span>{{$row['SubjectName']}}<span class="row-line">|</span>
                                                {{$row['wProfName']}} 교수님
                                                {{--
                                                <span class="NSK ml15 nBox n{{ substr($row['AcceptStatusCcd'], -1)+1 }}">{{$row['AcceptStatusCcdName']}}</span>
                                                --}}
                                                @if($row['IsDisp'] == 'N')
                                                    <span class="oBox changeBox ml10 NSK">인강전환</span>
                                                @endif
                                            </dt>
                                        </dl>
                                        <div class="w-tit"><span class="tx-blue">{{ $row['StudyPatternCcdName'] }}</span> {{$row['subProdName']}}</div>
                                        @if(in_array($row['SiteCode'], ['2010','2011','2013']))
                                            <dl class="w-info">
                                                <dt>
                                                    (수강증번호 : {{$row['CertNo']}})
                                                </dt>
                                            </dl>
                                        @endif

                                        @if (empty($listLectureRoom[$row['ProdCode']]) === false)
                                            <input type="hidden" id="order_idx_N_0_{{ $key }}" value="{{ $listLectureRoom[$row['ProdCode']]['OrderIdx'] }}">
                                            <input type="hidden" id="order_prod_idx_N_0_{{ $key }}" value="{{ $listLectureRoom[$row['ProdCode']]['OrderProdIdx'] }}">
                                            <input type="hidden" id="lr_code_N_0_{{ $key }}" value="{{ $listLectureRoom[$row['ProdCode']]['LrCode'] }}">
                                            <input type="hidden" id="lr_unit_code_N_0_{{ $key }}" value="{{ $listLectureRoom[$row['ProdCode']]['LrUnitCode'] }}">
                                            <input type="hidden" id="prod_code_N_0_{{ $key }}" value="{{ $listLectureRoom[$row['ProdCode']]['ProdCodeMaster'] }}">
                                            <input type="hidden" id="prod_code_sub_N_0_{{ $key }}" value="{{ $listLectureRoom[$row['ProdCode']]['ProdCodeSub'] }}">
                                            <ul class="seatsection">
                                                <li>
                                                    <button id="btn_assign_seat_N_0_{{ $key }}" onclick="AssignSeat('N','0','{{ $key }}','{{
                                                                        (($listLectureRoom[$row['ProdCode']]['SeatChoiceStartDate'] <= date('Y-m-d')
                                                                        && date('Y-m-d') <= $listLectureRoom[$row['ProdCode']]['SeatChoiceEndDate']) ? 'Y' : 'N')}}')">좌석선택 ></button>
                                                </li>
                                                <li>[강의실명] <span>{{ $listLectureRoom[$row['ProdCode']]['LectureRoomName'] }} | {{ $listLectureRoom[$row['ProdCode']]['UnitName'] }}</span></li>
                                                <li id="seat_id_{{ $listLectureRoom[$row['ProdCode']]['OrderIdx'] }}_{{ $listLectureRoom[$row['ProdCode']]['LrUnitCode'] }}">
                                                    [좌석번호]
                                                    {!! ((empty($listLectureRoom[$row['ProdCode']]['LrrursIdx']) === true) ?
                                                    "<span class='tx-red'>미선택</span>" : "<span>{$listLectureRoom[$row['ProdCode']]['MemSeatNo']}</span>") !!}
                                                    {!! ($listLectureRoom[$row['ProdCode']]['MemSeatStatusCcd'] == '728003') ? "<span class='tx-red'>[퇴실]</span>" : "" !!}
                                                </li>
                                                <li>[좌석선택기간] {{ $listLectureRoom[$row['ProdCode']]['SeatChoiceStartDate'] }} ~ {{ $listLectureRoom[$row['ProdCode']]['SeatChoiceEndDate'] }}</li>
                                            </ul>
                                        @endif
                                            <div class="lookover">
                                            @if (in_array('731001',explode(',',$row['OptionCcds'])) === true)
                                                <a href="#none" onclick="assignmentBoardModal('{{ $row['ProdCode'] }}')">온라인첨삭 &gt;</a>
                                            @endif
                                            @if($row['isbook'] == 'Y')
                                                @if($row['IsDisp'] == 'N')
                                                    <a href="#none" onclick="alert('인강으로 전환된 강좌로 교재구매가 불가능합니다');" class="buyBook">교재구매</a>
                                                @else
                                                    <a href="#none" onclick="fnBookLayer('{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}')" class="buyBook">교재구매 ></a>
                                                @endif
                                            @endif
                                            @if(empty($row['SuppProdCode']) == false && $row['SuppIsUse'] == 'Y' && $row['IsDisp'] != 'N')
                                                <a href="#none" onclick="fnBogang('{{$row['OrderIdx']}}', '{{$row['OrderProdIdx']}}', '{{$row['ProdCode']}}', '{{$row['ProdCodeSub']}}', '')" class="supplement">보강/복습동영상신청 ></a>
                                            @endif
                                            </div>
                                    </td>
                                    <td class="w-period">{{str_replace('-', '.', $row['StudyStartDate'])}} <br>
                                        ~ {{str_replace('-', '.', $row['StudyEndDate'])}}</td>
                                    <td class="w-schedule">
                                        {{$row['WeekArrayName']}}<br/>
                                        {{$row['Amount']}}회차
                                    </td>
                                    {{-- <td class="w-answer">
                                        @if($row['StudyStartDate'] > date('Y-m-d', time()))
                                            {{str_replace('-', '.', $row['StudyStartDate'])}}<br/>
                                            개강
                                        @else
                                            진행중
                                        @endif
                                    </td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="tx-center">수강신청 강좌 정보가 없습니다.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="profChoice" class="willbes-Layer-PassBox willbes-Layer-PassBox1100 abs">
            </div>
            <div id="profLook" class="willbes-Layer-Black">
            </div>
            <div id="seatChoice" class="willbes-Layer-PassBox willbes-Layer-PassBox1100 abs">
            </div>
            <div id="assignmentListChoice" class="willbes-Layer-PassBox willbes-Layer-PassBox1100 abs">
            </div>
            <div id="assignmentCreateChoice" class="willbes-Layer-PassBox willbes-Layer-PassBox1100 abs">
            </div>
            <div id="MoreBook" class="willbes-Layer-PassBox willbes-Layer-PassBox800 h1100 abs" style="height:600px !important;">
            </div>
            <div id="supplementLec" class="willbes-Layer-Black">
            </div>
            <div id="protect" class="willbes-Layer-Black">
                <div class="willbes-Layer-CartBox">
                    <a class="closeBtn" href="#none" onclick="closeWin('protect')">
                        <img src="{{ img_url('cart/close_cart.png') }}">
                    </a>
                    <div class="Layer-Tit NG bg-blue"> 개인정보활용 및 환불정책 안내</div>
                    <div class="Layer-Cont">
                        <table cellspacing="0" cellpadding="0" class="couponTable under-gray bdt-light-gray tx-gray">
                            <colgroup>
                                <col style="width: 120px;">
                                <col>
                            </colgroup>
                            <tbody>
                            <tr>
                                <th>개인정보활용 안내</th>
                                <td class="tx-left">
                                    윌비스는 고객의 개인정보보호를 소중하게 생각하고, 고객의 개인정보를 보호하기 위하여 항상 최선을 다해 노력하고 있습니다.<br>
                                    윌비스는 개인정보보호 관련 주요 법률인「정보통신망 이용촉진 및 정보보호 등에 관한 법률」을 비롯한 모든 개인정보보호 관련 법률을 준수하고 있습니다.<br>
                                    또한, 윌비스는「개인정보처리방침」을 제정하여 이를 준수하고 있으며, 윌비스의「개인정보처리방침」을 홈페이지에 공개하여 고객이 언제나 용이하게 열람할 수 있도록 하고 있습니다.<br>
                                    윌비스의「개인정보처리방침」은 관련 법률 및 지침의 변경 또는 내부 운영 방침의 변경에 따라 변경될 수 있습니다.<br>
                                    윌비스의「개인정보처리방침」이 변경될 경우 변경된 사항을 홈페이지를 통하여 공지합니다.<br>
                                    윌비스 개인정보처리방침은 아래와 같은 내용을 담고 있습니다.<br>
                                    <br>
                                    <div><a href="https://www.willbes.net/company/protect" target="_blank" class="tx-blue">[윌비스 개인정보 취급방침 보기 →]</a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="tx-left">
                                    <div class="chkBoxAgree">
                                        <input type="checkbox" id="protect_check01" name="protect_check01" onchange="protectCheck();">
                                        <label for="protect_check01">위 개인정보활용 안내사항을 모두 읽었으며 동의합니다. (필수)</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>환불정책 안내</th>
                                <td class="tx-left">
                                    <p class="tx14">⊙  한림법학원 실강종합반 환불정책</p>
                                    (학원설립및과외교습에관한법률 제18조 및 동시행령 제18조에 근거함)<br>
                                    <br>
                                    - 환불시 강의료 정산 = 총 등록(결제) 금액 - 퇴원일까지 진행된 강의 수강료*<br>
                                    * 퇴원일까지 진행된 강의 수강료 기준: 단과 수강료 기준 1회당 가격 X 진행된 강의 횟수<br>
                                    - 강의 개강일 기준 총 회차의 50% 이상이 진행된 경우 해당강의는 전회차 수강료로 정산됩니다.<br>
                                    - 종합반 반 변경은 불가하며, 기존 종합반 탈퇴 후 재가입하셔야 합니다. (탈퇴 시 상기 환불정책 준수)<br>
                                    <br>
                                    <div><a href="https://www.willbes.net/company/protect" target="_blank" class="tx-blue">[윌비스 이용약관 보기 →]</a></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="tx-left">
                                    <div class="chkBoxAgree">
                                        <input type="checkbox" id="protect_check02" name="protect_check02" onchange="protectCheck();">
                                        <label for="protect_check02">위 환불정책 안내사항을 모두 읽었으며 동의합니다. (필수)</label>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="allBtn">
                            위 개인정보 활용 및 환불정책 안내사항을 모두 읽었으며 동의합니다.
                            <a href="#none" onclick="protectCheckAll();">전체동의</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- willbes-Leclist -->
        </div>
        {!! banner('내강의실_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
    <form name="postForm" id="postForm" >
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="choice_box_p_no" id="choice_box_p_no" value="" />
        <input type="hidden" name="choice_box_no" id="choice_box_no" value="" />
        <input type="hidden" name="orderidx" id="orderidx" value="" />
        <input type="hidden" name="orderprodidx" id="orderprodidx" value="" />

        <input type="hidden" name="pkg_yn" id="pkg_yn" value="" />
        <input type="hidden" name="prod_code" id="prod_code" value="" />
        <input type="hidden" name="prod_code_sub" id="prod_code_sub" value="" />
        <input type="hidden" name="lr_code" id="lr_code" value="" />
        <input type="hidden" name="lr_unit_code" id="lr_unit_code" value="" />

    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#assignmentCreateChoice").html('');

            $('#course_ccd,#subject_ccd,#prof_ccd,#orderby,#sitegroup_ccd').on('change', function (){
                $('#searchFrm').submit();
            });

            // 검색어 입력 후 엔터
            $('#search_text').on('keyup', function() {
                if (window.event.keyCode === 13) { }
            });

            //좌석선택
            $('.onoffSeatBox').on('click', function () {
                $('#seat_box_'+$(this).data('seat-box-id')).toggle();
            });

            //온라인첨삭Box
            $('.onoffCorrectAssignmentBox').on('click', function () {
                $('#correct_assignment_box_'+$(this).data('correct-assignment-box-id')).toggle();
            });

            @if($tab != '')
            $('a[id^=tab]').removeClass('on');
            $('#tab{{$tab}}').addClass('on');
            $('#tab{{$tab}}').get(0).click();
            @endif
        });


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

        function AssignProf_submit(popup)
        {
            let domains = location.hostname.split('.');
            let domain = '.' + domains[domains.length - 2] + '.' + domains[domains.length - 1];

            $.cookie('_wb_client_protect_' + assign_o + '_' + assign_op, 'done', {
                domain: domain,
                path: '/',
                expires: 365
            });

            if(popup !== false){
                alert('개인정보활용 및 환불정책 안내에 동의하셨습니다. 강사를 선택해 주세요.');
            }

            $("#protect").hide();

            $("#profChoice").html('');
            $('#orderidx').val(assign_o);
            $('#orderprodidx').val(assign_op);

            url = "{{ site_url("/classroom/off/AssignProf/") }}";
            data = $('#postForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    $("#profChoice").html(d).end();
                    openWin('profChoice')
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'html');
        }


        function ViewAssignProf(o,op)
        {
            $("#profChoice").html('');
            $('#orderidx').val(o);
            $('#orderprodidx').val(op);

            url = "{{ site_url("/classroom/off/ViewAssignProf/") }}";
            data = $('#postForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    $("#profLook").html(d).end();
                    openWin('profLook')
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'html');
        }


        function AssignSeat(pkg_yn, p_no, no, flag)
        {
            if (flag != 'Y') {
                alert('좌석 선택 기간이 아닙니다.');
                $("#btn_assign_seat_"+pkg_yn+'_'+no).prop("disabled",true);
                return;
            }
            var offset = $("#_top").offset();
            $('html, body').animate({scrollTop : offset.top}, 400);

            $("#seatChoice").html('');
            $('#pkg_yn').val(pkg_yn);

            $('#choice_box_p_no').val(p_no);
            $('#choice_box_no').val(no);
            $('#orderidx').val($("#order_idx_"+pkg_yn+'_'+p_no+'_'+no).val());
            $('#orderprodidx').val($("#order_prod_idx_"+pkg_yn+'_'+p_no+'_'+no).val());
            $('#lr_code').val($("#lr_code_"+pkg_yn+'_'+p_no+'_'+no).val());
            $('#lr_unit_code').val($("#lr_unit_code_"+pkg_yn+'_'+p_no+'_'+no).val());
            $('#prod_code').val($("#prod_code_"+pkg_yn+'_'+p_no+'_'+no).val());
            $('#prod_code_sub').val($("#prod_code_sub_"+pkg_yn+'_'+p_no+'_'+no).val());

            var url = "{{ site_url("/classroom/off/AssignSeat/") }}";
            var data = $('#postForm').serialize();
            sendAjax(url,
                data,
                function(d){
                    $("#seatChoice").html(d).end();
                    openWin('seatChoice')
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'POST', 'html');
        }


        function assignmentBoardModal(prod_code)
        {
            $("#assignmentListChoice").html('');
            $('#prod_code').val(prod_code);

            var url = "{{ site_url("/classroom/assignmentProduct/") }}";
            var data = $('#postForm').serialize();
            sendAjax(url,
                data,
                function(d){
                    $("#assignmentListChoice").html(d).end();
                    openWin('assignmentListChoice')
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'POST', 'html');
        }

        function fnBookLayer(ProdCode, ProdCodeSub)
        {
            url = "{{ site_url("/classroom/off/layerBooklist/") }}";
            data = "ProdCode="+ProdCode+"&ProdCodeSub="+ProdCodeSub;

            sendAjax(url,
                data,
                function(d){
                    $("#MoreBook").html(d).end();
                    openWin('MoreBook');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'html');
        }

        function fnBogang(o, op, p, ps, t)
        {
            url = "{{ site_url("/classroom/off/layerBogang/") }}";
            data = "o="+o+"&op="+op+"&p="+p+"&ps="+ps+"&t="+t;

            sendAjax(url,
                data,
                function(d){
                    $("#supplementLec").html(d).end();
                    openWin('supplementLec');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'html');
        }
    </script>
@stop