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
                        <li><a href="#Mypagetab1" id="tab1" class="on">단과반 ({{count($list)}})</a></li>
                        <li><a href="#Mypagetab2" id="tab2">종합반 ({{count($pkglist)}})</a></li>
                    </ul>
                </div>
                <div id="Mypagetab1">
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
                                            </dt>
                                        </dl>
                                        <div class="w-tit">{{$row['subProdName']}}</div>
                                        @if(in_array($row['SiteCode'], ['2010','2011','2013']))
                                            <dl class="w-info">
                                                <dt>
                                                    (수강증번호 : {{$row['CertNo']}})
                                                </dt>
                                            </dl>
                                        @endif
                                        {{-- TODO : 좌석배정 개발 --}}
                                        @if (empty($listLectureRoom[$row['ProdCode']]) === false)
                                            <input type="hidden" id="order_idx_N_{{ $key }}" value="{{ $listLectureRoom[$row['ProdCode']]['OrderIdx'] }}">
                                            <input type="hidden" id="order_prod_idx_N_{{ $key }}" value="{{ $listLectureRoom[$row['ProdCode']]['OrderProdIdx'] }}">
                                            <input type="hidden" id="lr_code_N_{{ $key }}" value="{{ $listLectureRoom[$row['ProdCode']]['LrCode'] }}">
                                            <input type="hidden" id="lr_unit_code_N_{{ $key }}" value="{{ $listLectureRoom[$row['ProdCode']]['LrUnitCode'] }}">
                                            <input type="hidden" id="prod_code_N_{{ $key }}" value="{{ $listLectureRoom[$row['ProdCode']]['ProdCodeMaster'] }}">
                                            <input type="hidden" id="prod_code_sub_N_{{ $key }}" value="{{ $listLectureRoom[$row['ProdCode']]['ProdCodeSub'] }}">
                                            <ul class="seatsection">
                                                <li>
                                                    <button id="btn_assign_seat_N_{{ $key }}" onclick="AssignSeat('N','{{ $key }}','{{
                                                                        (($listLectureRoom[$row['ProdCode']]['SeatChoiceStartDate'] <= date('Y-m-d')
                                                                        && date('Y-m-d') <= $listLectureRoom[$row['ProdCode']]['SeatChoiceEndDate']) ? 'Y' : 'N')}}')">좌석선택 ></button>
                                                </li>
                                                <li>[강의실명] <span>{{ $listLectureRoom[$row['ProdCode']]['LectureRoomName'] }} | {{ $listLectureRoom[$row['ProdCode']]['UnitName'] }}</span></li>
                                                <li>[좌석번호]
                                                    <span class="tx-red">
                                                        {!! ((empty($listLectureRoom[$row['ProdCode']]['LrrursIdx']) === true) ?
                                                        "<span class='tx-red'>미선택</span>" : "<span>{$listLectureRoom[$row['ProdCode']]['MemSeatNo']}</span>") !!}
                                                        {!! ($listLectureRoom[$row['ProdCode']]['MemSeatStatusCcd'] == '728003') ? "<span class='tx-red'>[퇴실]</span>" : "" !!}
                                                    </span>
                                                </li>
                                                <li>[좌석선택기간] {{ $listLectureRoom[$row['ProdCode']]['SeatChoiceStartDate'] }} ~ {{ $listLectureRoom[$row['ProdCode']]['SeatChoiceEndDate'] }}</li>
                                            </ul>
                                        @endif
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

                <div id="Mypagetab2">
                    {{--
                    <div class="willbes-Lec-Selected willbes-Mypage-Selected tx-gray">
                        <div class="willbes-Lec-Search GM f_right">
                            <div class="inputBox p_re">
                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강좌명을 검색해 주세요" maxlength="30">
                                <button type="submit" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    --}}

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
                                    </td>
                                    {{-- <td class="w-period">{{str_replace('-', '.', $row['StudyStartDate'])}} <br>
                                        ~ {{str_replace('-', '.', $row['StudyEndDate'])}}</td> --}}
                                    @if($row['PackTypeCcd'] == '648003')
                                        <td class="w-answer p_re">
                                            <a href="javascript:;" onclick="AssignProf('{{$row['OrderIdx']}}','{{$row['OrderProdIdx']}}')"><span class="bBox blueBox">강사선택하기</span></a>
                                            {{-- TODO : 좌석배정 개발 --}}
                                            @if (empty($pkgLectureRoom[$row['ProdCode']]) === false)
                                            <a href="javascript:;" class="onoffSeatBox" data-seat-box-id="{{$key}}"><span class="bBox blackBox">좌석선택하기</span></a>
                                            @endif
                                        </td>
                                    @else
                                        <td class="w-answer p_re">
                                            <a href="#none" onclick="$('willbes-Layer-lecList').hide();openWin('lecList{{$row['OrderProdIdx']}}')"><span class="bBox grayBox">강좌구성보기</span></a>
                                            @if (empty($pkgLectureRoom[$row['ProdCode']]) === false)
                                                <a href="javascript:;" class="onoffSeatBox" data-seat-box-id="{{$key}}"><span class="bBox blackBox">좌석선택하기</span></a>
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
                                                                    <li>{{$subrow['subProdName']}}</li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                </tr>

                                {{-- TODO : 좌석배정 개발 --}}
                                <tr class="seat-box" id="seat_box_{{$key}}" style="display: none;">
                                    <td colspan="3"class="w-data tx-left pl10 bg-light-gray ">
                                        @if (empty($row['subleclist']) === false)
                                            @foreach($row['subleclist'] as $sub_key => $sub_row)
                                                @if (empty($pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]) === false)
                                                    <input type="hidden" id="order_idx_Y_{{ $sub_key }}" value="{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['OrderIdx'] }}">
                                                    <input type="hidden" id="order_prod_idx_Y_{{ $sub_key }}" value="{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['OrderProdIdx'] }}">
                                                    <input type="hidden" id="lr_code_Y_{{ $sub_key }}" value="{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['LrCode'] }}">
                                                    <input type="hidden" id="lr_unit_code_Y_{{ $sub_key }}" value="{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['LrUnitCode'] }}">
                                                    <input type="hidden" id="prod_code_Y_{{ $sub_key }}" value="{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['ProdCodeMaster'] }}">
                                                    <input type="hidden" id="prod_code_sub_Y_{{ $sub_key }}" value="{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['ProdCodeSub'] }}">
                                                    <div class="mb10">
                                                        <dl class="w-info">
                                                            <dt>
                                                                {{$sub_row['CourseName']}}<span class="row-line">|</span>{{$sub_row['SubjectName']}}<span class="row-line">|</span>
                                                                {{$sub_row['wProfName']}} 교수님 <span class="row-line">|</span> {{$sub_row['subProdName']}}
                                                            </dt>
                                                        </dl>
                                                        <ul class="seatsection">
                                                            <li>
                                                                <button id="btn_assign_seat_Y_{{ $sub_key }}" onclick="AssignSeat('Y','{{ $sub_key }}','{{
                                                                        (($pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['SeatChoiceStartDate'] <= date('Y-m-d')
                                                                        && date('Y-m-d') <= $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['SeatChoiceEndDate']) ? 'Y' : 'N')}}')">좌석선택 ></button>
                                                            </li>
                                                            <li>[강의실명] <span>{{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['LectureRoomName'] }} | {{ $pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['UnitName'] }}</span></li>
                                                            <li>[좌석번호]
                                                                <span class="tx-red">
                                                                    {!! ((empty($pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['LrrursIdx']) === true) ?
                                                                    "<span class='tx-red'>미선택</span>" : "<span>{$pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['MemSeatNo']}</span>") !!}
                                                                    {!! ($pkgLectureRoom[$sub_row['ProdCode']][$sub_row['ProdCodeSub']]['MemSeatStatusCcd'] == '728003') ? "<span class='tx-red'>[퇴실]</span>" : "" !!}
                                                                </span>
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
            <div id="seatChoice" class="willbes-Layer-PassBox willbes-Layer-PassBox1100 abs">
            </div>

            <!-- willbes-Leclist -->
        </div>
        {!! banner('내강의실_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
    <form name="postForm" id="postForm" >
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
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
            $('#course_ccd,#subject_ccd,#prof_ccd,#orderby,#sitegroup_ccd').on('change', function (){
                $('#searchFrm').submit();
            });

            // 검색어 입력 후 엔터
            $('#search_text').on('keyup', function() {
                if (window.event.keyCode === 13) {

                }
            });

            //좌석선택
            $('.onoffSeatBox').on('click', function () {
                $('#seat_box_'+$(this).data('seat-box-id')).toggle();
            });

            @if($tab != '')
            $('a[id^=tab]').removeClass('on');
            $('#tab{{$tab}}').addClass('on');
            $('#tab{{$tab}}').get(0).click();
            @endif
        });

        function AssignProf(o,op)
        {
            $("#profChoice").html('');
            $('#orderidx').val(o);
            $('#orderprodidx').val(op);

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

        function AssignSeat(pkg_yn, no, flag)
        {
            if (flag != 'Y') {
                alert('좌석 선택 기간이 아닙니다.');
                $("#btn_assign_seat_"+pkg_yn+'_'+no).prop("disabled",true);
                return;
            }
            $("#seatChoice").html('');
            $('#pkg_yn').val(pkg_yn);

            $('#choice_box_no').val(no);
            $('#orderidx').val($("#order_idx_"+pkg_yn+'_'+no).val());
            $('#orderprodidx').val($("#order_prod_idx_"+pkg_yn+'_'+no).val());
            $('#lr_code').val($("#lr_code_"+pkg_yn+'_'+no).val());
            $('#lr_unit_code').val($("#lr_unit_code_"+pkg_yn+'_'+no).val());
            $('#prod_code').val($("#prod_code_"+pkg_yn+'_'+no).val());
            $('#prod_code_sub').val($("#prod_code_sub_"+pkg_yn+'_'+no).val());

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
    </script>
@stop