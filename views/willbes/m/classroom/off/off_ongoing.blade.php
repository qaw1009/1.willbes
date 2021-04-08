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
                                        <div class="NG">강좌구성보기 <a href="javascript:;">▼</a></div>
                                        <ul>
                                            @if(empty($row['subleclist']) == true)
                                                <li>강의가 없습니다.</li>
                                            @else
                                                @foreach($row['subleclist'] as $subrow)
                                                    <li>{{$subrow['subProdName']}}
                                                        @if($subrow['IsDisp'] == 'N')
                                                            <span>인강전환</span>
                                                        @endif
                                                        @if(empty($subrow['SuppProdCode']) == false && $subrow['SuppIsUse'] == 'Y' && $subrow['IsDisp'] != 'N')
                                                            <div class="supplementBtn"><a href="#none" onclick="fnBogang('{{$subrow['OrderIdx']}}', '{{$subrow['OrderProdIdx']}}', '{{$subrow['ProdCode']}}', '{{$subrow['ProdCodeSub']}}', 'P')" >보강동영상 신청</a></div>
                                                        @endif
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
                                <dl class="w-info acad tx-gray">
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

                                        <div class="w-info bg-light-gray pd10 mt10 bdb-bright-gray">
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
                                        @if(empty($row['SuppProdCode']) == false && $row['SuppIsUse'] == 'Y' && $row['IsDisp'] != 'N')
                                            <div class="mb10"><a href="#none" onclick="fnBogang('{{$row['OrderIdx']}}', '{{$row['OrderProdIdx']}}', '{{$row['ProdCode']}}', '{{$row['ProdCodeSub']}}', '')" class="btnStfull03">보강동영상 신청 ></a></div>
                                        @endif

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

        function AssignProf(o,op)
        {
            $('#orderidx').val(o);
            $('#orderprodidx').val(op);
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
    </script>
@stop