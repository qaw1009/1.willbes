@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">

            <div class="willbes-Mypage-ONLINEZONE c_both">
                <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <span class="MoreBtn"><a href="#none">유의사항안내 @if(get_cookie('moreInfo') == 'off')보기 ▼@else닫기 ▲@endif</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black @if(get_cookie('moreInfo') == 'off') off @endif">
                        <tbody>
                        <tr @if(get_cookie('moreInfo') == 'off') style="display: none; !important" @endif>
                            <td>
                                <div class="Tit">수강종료강좌</div>
                                <div class="Txt">
                                    - 수강종료된 강좌는 재수강 신청만 가능합니다.(수강연장 신청 불가)<br/>
                                    - 재수강시, 20% 할인된 가격으로 수강할 수 있습니다.<br/>
                                    - 폐강된 강좌는 재수강신청이 제공되지 않습니다.<br/>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Mypage-ONLINEZONE -->
            <div class="willbes-Mypage-Tabs mt40">
                <form name="searchFrm" id="searchFrm" action="{{app_url('/classroom/on/list/end/', 'www')}}" onsubmit="">
                    <div class="willbes-Lec-Selected willbes-Mypage-Selected willbes-Mypage-Selected-Search tx-gray">
                        <span class="w-data">
                            기간검색 &nbsp;
                            <input type="text" id="search_start_date" name="search_start_date" value="{{ $input_arr['search_start_date'] or '' }}" title="검색시작일자" class="iptDate datepicker" maxlength="10" autocomplete="off"/> ~&nbsp;
                            <input type="text" id="search_end_date" name="search_end_date" value="{{ $input_arr['search_end_date'] or '' }}" title="검색종료일자" class="iptDate datepicker" maxlength="10" autocomplete="off"/>
                        </span>
                        <span class="w-month">
                            <ul>
                                <li><a class="btn-set-search-date" data-period="0-all" style="cursor:pointer;">전체</a></li>
                                <li><a class="btn-set-search-date" data-period="1-months" style="cursor:pointer;">1개월</a></li>
                                <li><a class="btn-set-search-date" data-period="3-months" style="cursor:pointer;">3개월</a></li>
                                <li><a class="btn-set-search-date" data-period="6-months" style="cursor:pointer;">6개월</a></li>
                            </ul>
                        </span>
                        <div class="willbes-Lec-Search GM f_right">
                            <select id="course_ccd" name="course_ccd" title="process" class="seleProcess f_left">
                                <option selected="selected" value="">과정</option>
                                @foreach($course_arr as $row )
                                    <option value="{{$row['CourseIdx']}}" @if(isset($input_arr['course_ccd']) && $input_arr['course_ccd'] == $row['CourseIdx']) selected="selected" @endif  >{{$row['CourseName']}}</option>
                                @endforeach
                            </select>
                            <div class="inputBox p_re">
                                <input type="text" id="search_text" name="search_text" class="labelSearch" value="@if(isset($input_arr['search_text'])){{$input_arr['search_text']}}@endif" placeholder="강좌명을 검색해 주세요" maxlength="30"  style="width: 220px;">
                                <button type="submit" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="DetailWrap c_both">
                    <ul class="tabWrap tabDepthPass">
                        <li><a href="#Mypagetab1" class="on">단강좌 ({{count($lecList)}})</a></li>
                        <li><a href="#Mypagetab2">패키지강좌 ({{count($pkgList)}})</a></li>
                    </ul>
                    <div class="tabBox">
                        <div id="Mypagetab1" class="tabLink">
                            <div class="willbes-Lec-Table pt20 NG d_block">
                                <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                    <colgroup>
                                        <col style="width: 120px;">
                                        <col style="width: 700px;">
                                        <col style="width: 120px;">
                                    </colgroup>
                                    <tbody>
                                    @forelse( $lecList as $row )
                                        <tr>
                                            <td class="w-percent">진도율<br/>
                                                <span class="tx-blue">{{$row['StudyRate']}}%</span>
                                            </td>
                                            <td class="w-data tx-left pl10">
                                                <dl class="w-info">
                                                    <dt>
                                                        {{$row['SubjectName']}}<span class="row-line">|</span>
                                                        {{$row['wProfName']}}교수님
                                                        <span class="NSK ml15 nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                                    </dt>
                                                </dl><br/>
                                                <div class="w-tit">
                                                    {{$row['subProdName']}}
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : {{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                @if($row['IsRetake'] == 'N')
                                                    <span class="bBox whiteBox NSK">재수강불가</span>
                                                @else
                                                    <a href="javascript:;" onclick="fnRetake('{{app_to_env_url($row['SiteUrl'])}}','{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}');"><span class="bBox blueBox NSK">재수강신청</span></a>
                                                @endif
                                                <a href="javascript:;" onclick="fnPostscript('{{$row['SiteCode']}}', '{{$row['CateCode']}}', '{{$row['ProdCodeSub']}}', '{{$row['SubjectIdx']}}', '{{$row['subProdName']}}', '{{$row['ProfIdx']}}' );"><span class="bBox whiteBox NSK">후기등록</span></a>
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
                        </div>
                        <div id="Mypagetab2" class="tabLink">

                            @forelse( $pkgList as $row )
                                <div class="willbes-Lec-Table willbes-Package-Table pt20 NG d_block">
                                    <table cellspacing="0" cellpadding="0" class="packTable lecTable bdt-dark-gray">
                                        <colgroup>
                                            <col style="width: 820px;">
                                            <col style="width: 120px;">
                                        </colgroup>
                                        <tbody>
                                        <tr class="bg-light-blue">
                                            <td class="w-data tx-left pl30">
                                                <div class="w-tit">
                                                    {{$row['ProdName']}}
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>수강기간 : {{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}}</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                                    <dt class="MoreBtn"><a href="javascript:;">강좌 열기 ▼</a></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                @if($row['IsRetake'] == 'N')
                                                    <span class="bBox whiteBox NSK">재수강불가</span>
                                                @else
                                                    <span class="bBox whiteBox NSK">재수강불가</span>
                                                <!-- <a href="javascript:;" onclick="fnRetake('','{{$row['OrderIdx']}}','{{$row['ProdCode']}}','');"><span class="bBox blueBox NSK">재수강신청</span></a> -->
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table cellspacing="0" cellpadding="0" class="packInfoTable lecTable">
                                        <colgroup>
                                            <col style="width: 120px;">
                                            <col style="width: 700px;">
                                            <col style="width: 120px;">
                                        </colgroup>
                                        <tbody>
                                        @foreach( $row['subleclist'] as $subrow )
                                            <tr class="replyTxt">
                                                <td class="w-percent">진도율<br/>
                                                    <span class="tx-blue">{{$subrow['StudyRate']}}%</span>
                                                </td>
                                                <td class="w-data tx-left pl10">
                                                    <dl class="w-info">
                                                        <dt>
                                                            {{$subrow['SubjectName']}}<span class="row-line">|</span>
                                                            {{$subrow['wProfName']}}교수님
                                                            <span class="NSK ml15 nBox n{{ substr($subrow['wLectureProgressCcd'], -1)+1 }}">{{$subrow['wLectureProgressCcdName']}}</span>
                                                        </dt>
                                                    </dl><br/>
                                                    <div class="w-tit">
                                                        {{$subrow['subProdName']}}
                                                    </div>
                                                    <dl class="w-info tx-gray">
                                                        <dt>강의수 : <span class="tx-black">{{$subrow['wUnitLectureCnt']}}강</span></dt>
                                                        <dt><span class="row-line">|</span></dt>
                                                        <dt>수강기간 : {{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}}</dt>
                                                        <dt><span class="row-line">|</span></dt>
                                                        <dt>최종학습일 : <span class="tx-black">{{ $subrow['lastStudyDate'] == '' ? '학습이력없음' : $subrow['lastStudyDate'] }}</span></dt>
                                                    </dl>
                                                </td>
                                                <td class="w-answer">
                                                    <a href="javascript:;" onclick="fnPostscript('{{$row['SiteCode']}}', '{{$row['CateCode']}}', '{{$row['ProdCodeSub']}}', '{{$row['SubjectIdx']}}', '{{$row['subProdName']}}', '{{$row['ProfIdx']}}' );"><span class="bBox whiteBox NSK">후기등록</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @empty
                                <div class="willbes-Lec-Table willbes-Package-Table pt20 NG d_block">
                                    <table cellspacing="0" cellpadding="0" class="packTable lecTable bdt-dark-gray">
                                        <colgroup>
                                            <col style="width: 820px;">
                                            <col style="width: 120px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td colspan="2" class="tx-center">수강종료 강좌가 없습니다.</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <!-- willbes-Mypage-Tabs -->
            <div id="WrapReply"></div>
        </div>
        {!! banner('내강의실_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>

    <form name="retakeForm" id="retakeForm" method="POST" action="">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="sale_pattern" value="retake" />
        <input type="hidden" name="target_order_idx" id="retake_orderidx" value="" />
        <input type="hidden" name="target_prod_code" id="retake_prodcode" value="" />
        <input type="hidden" name="target_prod_code_sub" id="retake_prodcodesub" value="" />
    </form>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#course_ccd,#subject_ccd,#prof_ccd').on('change', function (){
                $('#searchFrm').submit();
            });

            // 검색어 입력 후 엔터
            $('#search_text').on('keyup', function() {
                if (window.event.keyCode === 13) {

                }
            });
        });


        function fnRetake($site, $o, $p, $ps)
        {
            $('#retake_orderidx').val($o);
            $('#retake_prodcode').val($p);
            $('#retake_prodcodesub').val($ps);

            if(window.confirm('재수강 신청하시겠습니까?') == true){
                $('#retakeForm').prop('action', '//'+$site+'/cart/store').submit();
            }
        }


        function fnPostscript(sitecode, catecode, prodcode, subjectidx, prodname, profidx)
        {
            var is_login = '{{sess_data('is_login')}}';
            var ele_id = 'WrapReply';
            var data = {
                'ele_id' : ele_id,
                'show_onoff' : 'on',
                'site_code' : sitecode,
                'cate_code' : catecode,
                'prod_code' : prodcode,
                'subject_idx' : subjectidx,
                'subject_name' : encodeURIComponent(prodname),
                'prof_idx' : profidx
            };

            if ($(this).data('write-type') == 'on' && is_login != true) {
                alert('로그인 후 이용해 주세요.');
                return false;
            }

            sendAjax('{{ front_url('/support/studyComment/') }}', data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            }, showAlertError, false, 'GET', 'html');
        }
    </script>
@stop