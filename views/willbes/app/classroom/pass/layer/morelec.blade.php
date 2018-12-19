@extends('willbes.app.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div id="Sticky" class="sticky-Title">
            <div class="sticky-Grid sticky-topTit">
                <div class="willbes-Tit NGEB p_re">
                    <button type="button" class="goback" onclick="history.back(-1); return false;">
                        <span class="hidden">뒤로가기</span>
                    </button>
                    무한 PASS 강좌추가
                </div>
            </div>
        </div>

        <div class="willbes-Txt NGR c_both mt20">
            - 체크박스 선택 후 '강좌추가' 버튼을 클릭하시면 수강이 가능합니다.<br/>
            - 강좌상세정보는 PC 버전에서만 확인할 수 있습니다.
        </div>
        <div class="willbes-Lec-Selected NG tx-gray">
            <form name="lecForm" id="lecForm" metho="GET">
                <input type="hidden" name="OrderIdx" id="OrderIdx" value="{{$passinfo['OrderIdx']}}" />
                <input type="hidden" name="ProdCode" id="ProdCode" value="{{$passinfo['ProdCode']}}" />
                <select id="subject_ccd" name="subject_ccd" title="lec" class="seleProcess width24p" onchange="fnSubmit();">
                    <option selected="selected" value="">과목</option>
                    @foreach($subject_arr as $row )
                        <option value="{{$row['SubjectIdx']}}" @if(isset($input_arr['subject_ccd']) && $input_arr['subject_ccd'] == $row['SubjectIdx']) selected="selected" @endif >{{$row['SubjectName']}}</option>
                    @endforeach
                </select>
                <select id="prof_ccd" name="prof_ccd" title="Prof" class="seleProf width24p ml1p" onchange="fnSubmit();">
                    <option selected="selected" value="">교수님</option>
                    @foreach($prof_arr as $row )
                        <option value="{{$row['wProfIdx']}}" @if(isset($input_arr['prof_ccd']) && $input_arr['prof_ccd'] == $row['wProfIdx']) selected="selected" @endif >{{$row['wProfName']}}</option>
                    @endforeach
                </select>
                <select id="course_ccd" name="course_ccd" title="process" class="seleType width50p ml1p" onchange="fnSubmit();">
                    <option selected="selected" value="">학습유형</option>
                    @foreach($course_arr as $row )
                        <option value="{{$row['CourseIdx']}}" @if(isset($input_arr['course_ccd']) && $input_arr['course_ccd'] == $row['CourseIdx']) selected="selected" @endif  >{{$row['CourseName']}}</option>
                    @endforeach
                </select>

                <div class="willbes-Lec-Search NG width100p mt1p">
                    <div class="inputBox width90p p_re">
                        <input type="text" id="search_text" name="search_text" class="labelSearch width100p" value="@if(isset($input_arr['search_text'])){{$input_arr['search_text']}}@endif" placeholder="강좌명" maxlength="30">
                        <button type="button" onclick="fnSubmit();" class="search-Btn">
                            <span class="hidden">검색</span>
                        </button>
                    </div>
                    <div class="resetBtn width10p">
                        <a href="javascript:;" onclick="fnReset();"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
                    </div>
                </div>
            </form>
        </div>
        <div class="lineTabs lecListTabs c_both">
            <div class="lecAllChk">
                <input type="checkbox" id="check_all" name="check_all" class="goods_chk" onchange="fnAll(this)"><label>전체선택</label>
            </div>
            <form name="addForm" id="addForm">
                <input type="hidden" name="OrderIdx" id="OrderIdx" value="{{$passinfo['OrderIdx']}}" />
                <input type="hidden" name="ProdCode" id="ProdCode" value="{{$passinfo['ProdCode']}}" />
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                    <colgroup>
                        <col style="width: 13%;">
                        <col style="width: 87%;">
                    </colgroup>
                    <tbody>
                    @forelse( $leclist as $key => $row )
                        <tr>
                            <td class="w-chk"><input type="checkbox" id="checkBox" class="goods_chk prodCheck" name="ProdCodeSub[]" value="{{$row['ProdCode']}}" {{$row['IsTake'] == 'Y' ? 'disabled=disabled' : ''}}></td>
                            <td class="w-data tx-left">
                                <dl class="w-info">
                                    <dt>
                                        {{$row['SubjectName']}}
                                        <span class="row-line">|</span>{{$row['wProfName']}}교수님
                                    </dt>
                                </dl>
                                <div class="w-tit">
                                    {{$row['ProdName']}}
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span><span class="row-line">|</span></dt>
                                    <dt>진행여부 : <span class="tx-blue">{{$row['wLectureProgressCcdName']}}</span></dt>
                                </dl>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="w-data tx-center">강좌정보가 없습니다.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </form>
        </div>
        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->

        <div id="Fixbtn" class="Fixbtn two">
            <ul>
                <li class="btn_blue"><a href="javascript:;" onclick="fnAppendLecture();">선택강좌추가</a></li>
                <li class="btn_gray"><a href="{{front_url('/classroom/pass/index/')}}?passidx={{$passinfo['ProdCode']}}">목록</a></li>
            </ul>
        </div>
        <!-- Fixbtn -->
    </div>
    <form name="postForm" id="postForm" >
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        @if(empty($passinfo) == false)
            <input type="hidden" name="OrderIdx" id="OrderIdx" value="{{$passinfo['OrderIdx']}}" />
            <input type="hidden" name="ProdCode" id="ProdCode" value="{{$passinfo['ProdCode']}}" />
        @endif
    </form>
    <!-- End Container -->
    <script>
        function fnAll(obj)
        {
            $('.prodCheck:enabled').prop("checked", $(obj).is(":checked"));
        }

        function fnSubmit()
        {
            url = "{{ front_url("/classroom/pass/ajaxMoreLecture/") }}";
            data = $('#lecForm').serialize();
            $('#lecForm').prop('action', url).submit();
        }

        function fnReset()
        {
            $('#subject_ccd').val('');
            $('#prof_ccd').val('');
            $('#course_ccd').val('');
            $('#search_text').val('');

            $('#lecForm').submit();

        }

        function fnAppendLecture()
        {
            url = "{{ front_url("/classroom/pass/addLecture/") }}";
            data = $('#addForm').serialize();

            if($(".prodCheck:checked").length == 0 ){
                alert("추가할 강의를 선택해주십시요.");
                return;
            }

            sendAjax(url,
                data,
                function(ret){
                    alert('강의가 추가 되었습니다.');
                    location.replace('{{front_url('/classroom/pass/index/')}}?passidx={{$passinfo['ProdCode']}}');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'json');
        }
    </script>
@stop