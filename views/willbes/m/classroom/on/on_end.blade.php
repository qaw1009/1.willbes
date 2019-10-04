@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div id="Sticky" class="sticky-Title">
            <div class="sticky-Grid sticky-topTit">
                <div class="willbes-Tit NGEB p_re">
                    <button type="button" class="goback" onclick="history.back(-1); return false;">
                        <span class="hidden">뒤로가기</span>
                    </button>
                    수강종료강좌
                </div>
            </div>
        </div>

        <div class="lineTabs lecListTabs c_both">
            <ul class="tabWrap lineWrap rowlineWrap lecListWrap two mt-zero">
                <li><a href="#leclist1" class="on">단강좌 <span>{{count($lecList)}}</span></a><span class="row-line">|</span></li>
                <li><a href="#leclist2">패키지강좌 <span>{{count($pkgList)}}</span></a></li>
                {{--
                }}<li><a href="#leclist3">무료강좌 <span>6</span></a><span class="row-line">|</span></li>
                <li><a href="#leclist4">관리자부여 <span>6</span></a></li>
                --}}
            </ul>
            <div class="tabBox lineBox lecListBox">
                
                <div id="leclist1" class="tabContent">
                    <div class="willbes-Txt NGR c_both mt20">
                        <div class="willbes-Txt-Tit NG">· 수강종료강좌 <div class="MoreBtn underline"><a href="#none">닫기 ▲</a></div></div>
                        - 수강종료된 강좌는 재수강 신청만 가능합니다.(수강연장 신청 불가)<br>
                        - 재수강시, 20% 할인된 가격으로 수강할 수 있습니다.<br>
                        - 폐강된 강좌는 재수강신청이 제공되지 않습니다.<br>
                        - 수강기간은 개별 강좌에 따라 다르게 책정되며 수정 될 수 있습니다.
                    </div>
                    <form name="searchFrm" id="searchFrm" action="{{front_app_url('/classroom/on/list/end/', 'www')}}">
                    <div class="paymentDate mt-zero pt20">
                        <div class="payLecList NGR">
                            <strong>기간검색</strong>
                            <input type="text" id="search_start_date" name="search_start_date" value="{{ $arr_input['search_start_date'] or '' }}" title="검색시작일자" class="datepicker" maxlength="10" autocomplete="off" style="width:110px">
                            ~ <input type="text" id="search_end_date" name="search_end_date" value="{{ $arr_input['search_end_date'] or '' }}" title="검색종료일자" class="datepicker" maxlength="10" autocomplete="off" style="width:110px">
                        </div>
                        <ul class="c_both">
                            <li><a href="#none" class="btn-set-search-date" data-period="0-all">전체</a></li>
                            <li><a href="#none" class="btn-set-search-date" data-period="15-days">15일</a></li>
                            <li><a href="#none" class="btn-set-search-date" data-period="1-months">1개월</a></li>
                            <li><a href="#none" class="btn-set-search-date" data-period="3-months">3개월</a></li>
                            <li><a href="#none" class="btn-set-search-date" data-period="6-months">6개월</a></li>
                        </ul>
                        <div class="btnSearch">
                            <a href="#none" id="btn_search">검색</a>
                        </div>
                    </div>
                    <div class="willbes-Lec-Selected NG c_both tx-gray">

                            <select id="sitegroup_ccd" name="sitegroup_ccd" title="process" class="seleProcess width21p">
                                <option selected="selected" value="">과정</option>
                                @foreach($sitegroup_arr as $row )
                                    <option value="{{$row['SiteGroupCode']}}" @if(isset($input_arr['sitegroup_ccd']) && $input_arr['sitegroup_ccd'] == $row['SiteGroupCode']) selected="selected" @endif  >{{$row['SiteGroupName']}}</option>
                                @endforeach
                            </select>
                            {{--
                            <select id="course_ccd" name="course_ccd" title="process" class="seleProcess width21p">
                                <option selected="selected" value="">과정</option>
                                @foreach($course_arr as $row )
                                    <option value="{{$row['CourseIdx']}}" @if(isset($input_arr['course_ccd']) && $input_arr['course_ccd'] == $row['CourseIdx']) selected="selected" @endif  >{{$row['CourseName']}}</option>
                                @endforeach
                            </select>
                            --}}
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
                            <a href="{{front_url('/classroom/on/list/end/')}}"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
                        </div>
                    </div>
                    </form>

                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                        <tbody>
                        @forelse( $lecList as $row )
                            <tr>
                                <td class="w-data tx-left pb-zero">
                                    <dl class="w-info">
                                        <dt>
                                            {{$row['SubjectName']}}<span class="row-line">|</span>
                                            {{$row['wProfName']}}교수님 <span class="NSK ml10 nBox nn{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                        </dt>
                                    </dl>
                                    <div class="w-tit">
                                        {!! ($row['IsRebuy'] > 0) ? '<span class="tx-red">[수강연장]</span> ':'' !!} {{$row['subProdName']}}
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>수강기간 : <span class="tx-black">{{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}}</span></dt>
                                    </dl>
                                    <div class="w-start tx-gray">
                                        <ul class="f_left two">
                                            @if($row['IsRetake'] == 'N')
                                                <li class="btn_white"><a href="javascript:;">재수강불가</a></li>
                                            @else
                                                <li class="btn_blue"><a href="javascript:;" onclick="fnRetake('{{app_to_env_url($row['SiteUrl'])}}','{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}');">재수강신청</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="w-line">-</div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="tx-center">수강종료 강좌가 없습니다.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div id="leclist2" class="tabContent" style="display: none;">
                    <div class="willbes-Txt NGR c_both mt20 @if(get_cookie('moreInfo') == 'off') on @endif">
                        <div class="willbes-Txt-Tit NG">· 패키지강좌수강 유의사항 <div class="MoreBtn underline"><a href="#none">@if(get_cookie('moreInfo') == 'off')열기 ▼@else닫기 ▲@endif</a></div></div>
                        - 패키지 강좌는 수강일변경, 일시정지, 수강연장기능이 제공되지 않습니다.<br/>
                    </div>

                    <div class="paymentWrap">
                        <div class="paymentDate">
                            <div class="payLecList NGR">
                                <strong>기간검색</strong>
                                <span href="#none" onclick="openWin('DATAPICKERPASS')"><input type="text" id="S-DATE" name="S-DATE" maxlength="15" style="width:120px" >
                            ~ <input type="text" id="E-DATE" name="E-DATE" maxlength="15" style="width:120px"></span>
                            </div>
                            <ul class="c_both">
                                <li><a href="#none">전체</a></li>
                                <li><a href="#none">15일</a></li>
                                <li><a href="#none">1개월</a></li>
                                <li><a href="#none">3개월</a></li>
                                <li><a href="#none">6개월</a></li>
                            </ul>
                            <div class="btnSearch">
                                <a href="#none">검색</a>
                            </div>
                        </div>
                    </div>
                    @forelse( $pkgList as $row )
                        <div class="willbes-Open-Table">
                            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                                <tbody>
                                <tr class="bg-light-blue">
                                    <td class="w-data tx-left pb-zero">
                                        <div class="w-tit">
                                            {{$row['ProdName']}}
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>수강기간 : <span class="tx-black">{{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}}</span></dt>
                                        </dl>
                                        <div class="w-start tx-gray">
                                            <ul class="f_left two">
                                                <li class="btn_white"><a href="javascript:;">재수강불가</a></li>
                                                {{--
                                                <li class="btn_blue"><a href="javascript:;" onclick="fnRetake('{{app_to_env_url($row['SiteUrl'])}}','{{$row['OrderIdx']}}','{{$row['ProdCode']}}','');"><span class="bBox blueBox NSK">재수강신청</span></a></li>
                                                --}}
                                            </ul>
                                            <div class="MoreBtn f_right tx-right">
                                                <a href="#none"><img src="{{ img_url('m/mypage/icon_arrow_on.png') }}"></a>
                                            </div>
                                        </div>
                                        <div class="w-line">-</div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable openTable">
                                <tbody>
                                @foreach( $row['subleclist'] as $subrow )
                                    <tr>
                                        <td class="w-data tx-left pb-zero">
                                            <dl class="w-info">
                                                <dt>
                                                    {{$subrow['SubjectName']}}<span class="row-line">|</span>{{$subrow['wProfName']}}교수님
                                                    <span class="NSK ml10 nBox n{{ substr($subrow['wLectureProgressCcd'], -1)+1 }}">{{$subrow['wLectureProgressCcdName']}}</span>
                                                </dt>
                                            </dl>
                                            <div class="w-tit">
                                                {{$subrow['subProdName']}}
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>수강기간 : <span class="tx-black">{{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}}</span></dt>
                                            </dl>
                                            <div class="w-start tx-gray">
                                                <ul class="f_left two">
                                                    <li class="btn_white"><a href="javascript:;">후기등록</a></li>
                                                </ul>
                                            </div>
                                            <div class="w-line">-</div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @empty
                        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                            <tbody>
                            <tr class="bg-light-blue">
                                <td class="w-data tx-center">수강종료된 패키지 강좌가 없습니다.</td>
                            </tr>
                            </tbody>
                        </table>
                    @endforelse
                </div>
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

    <form name="retakeForm" id="retakeForm" method="POST" action="">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="sale_pattern" value="retake" />
        <input type="hidden" name="target_order_idx" id="retake_orderidx" value="" />
        <input type="hidden" name="target_prod_code" id="retake_prodcode" value="" />
        <input type="hidden" name="target_prod_code_sub" id="retake_prodcodesub" value="" />
    </form>
    <script type="text/javascript">
        var $search_form = $('#searchFrm');

        $(document).ready(function() {
            $('#course_ccd,#subject_ccd,#prof_ccd,#sitegroup_ccd').on('change', function (){
                $('#searchFrm').submit();
            });

            // 검색어 입력 후 엔터
            $('#search_text').on('keyup', function() {
                if (window.event.keyCode === 13) {
                }
            });

            // 검색 버튼 클릭
            $search_form.on('click', '#btn_search, .btn-set-search-date', function() {
                $search_form.submit();
            });
        });

        function fnRetake($site, $o, $p, $ps)
        {
            $('#retake_orderidx').val($o);
            $('#retake_prodcode').val($p);
            $('#retake_prodcodesub').val($ps);

            if(window.confirm('재수강 신청하시겠습니까?') == true){
                $('#retakeForm').prop('action', '//'+$site+'/m/cart/store').submit();
            }
        }
    </script>
@stop