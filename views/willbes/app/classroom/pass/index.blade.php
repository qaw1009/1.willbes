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
                    무한 PASS존
                </div>
            </div>
        </div>

        <div class="willbes-Line">이용중인 무한 PASS ({{count($passlist)}})</div>
        <div class="willbes-Lec-Selected NG c_both tx-gray">
            <form name="searchFrm1" id="searchFrm1" action="{{front_app_url('/classroom/pass/index', 'www')}}" onsubmit="">
                <select id="passidx" name="passidx" class="seleName width74p ml1p" >
                    @if(empty($passlist) == true)
                        <option value="">무한PASS를 선택해주십시요.</option>
                    @else
                        @foreach($passlist as $row )
                            <option value="{{$row['OrderProdIdx']}}" @if(isset($passinfo['OrderProdIdx']) && $passinfo['OrderProdIdx'] == $row['OrderProdIdx']) selected="selected" @endif>{{$row['ProdName']}}</option>
                        @endforeach
                    @endif
                </select>
            </form>
        </div>
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
            <tbody>
            <tr>
                <td class="w-data tx-left">
                    @if(empty($passinfo) == false)
                        <div class="w-tit">
                            {{$passinfo['ProdName']}}
                        </div>
                        <dl class="w-info tx-gray">
                            <dt>
                                [수강기간] <span class="tx-blue">{{str_replace('-', '.', $passinfo['LecStartDate'])}}~{{str_replace('-', '.', $passinfo['RealLecEndDate'])}}</span>
                                <span class="tx-black">(잔여기간<span class="tx-pink">{{$passinfo['remainDays']}}일</span>)</span>
                            </dt>
                        </dl>
                    @endif
                    <div class="InfoBtn btn_white mt10"><a href="javascript:;" onclick="fnMyDevice();">등록기기정보 <span>▶</span></a></div>
                </td>
            </tr>
            </tbody>
        </table>
        @if(empty($passinfo) == false)
        <div class="AddlecMore">
            <a href="javascript:;" onclick="fnMoreLec('{{$passinfo['OrderIdx']}}','{{$passinfo['ProdCode']}}');"><img src="{{ img_url('m/mypage/icon_add_black.png') }}"> 강좌추가</a>
        </div>
        @endif
        <div class="willbes-Lec-Selected NG c_both tx-gray">
            <form name="searchFrm2" id="searchFrm2" action="{{front_app_url('/classroom/pass/index', 'www')}}" onsubmit="">
                <input type="hidden" name="sitecode" value="{{(empty($input_arr['sitecode']) == true) ? '' : $input_arr['sitecode']}}" >
                <input type="hidden" name="passidx" value="{{(empty($passinfo) == true) ? '' : $passinfo['OrderProdIdx']}}" >
                <select id="subject_ccd" name="subject_ccd" title="lec" class="seleLec width29n5p">
                    <option value="">과목</option>
                    @foreach($subject_arr as $row )
                        <option value="{{$row['SubjectIdx']}}" @if(isset($input_arr['subject_ccd']) && $input_arr['subject_ccd'] == $row['SubjectIdx']) selected="selected" @endif >{{$row['SubjectName']}}</option>
                    @endforeach
                </select>
                <select id="prof_ccd" name="prof_ccd" title="Prof" class="seleProf width29n5p ml1p">
                    <option value="">교수님</option>
                    @foreach($prof_arr as $row )
                        <option value="{{$row['wProfIdx']}}" @if(isset($input_arr['prof_ccd']) && $input_arr['prof_ccd'] == $row['wProfIdx']) selected="selected" @endif >{{$row['wProfName']}}</option>
                    @endforeach
                </select>
                <select id="course_ccd" name="course_ccd" title="process" class="seleType width29n5p ml1p">
                    <option value="">학습유형</option>
                    @foreach($course_arr as $row )
                        <option value="{{$row['CourseIdx']}}" @if(isset($input_arr['course_ccd']) && $input_arr['course_ccd'] == $row['CourseIdx']) selected="selected" @endif  >{{$row['CourseName']}}</option>
                    @endforeach
                </select>
                <div class="resetBtn width8p ml1p">
                    <a href="javascript:;" onclick="$('#searchFrm1').submit();"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
                </div>
            </form>
        </div>
        <div class="lineTabs lecListTabs c_both bdt-m-gray">
            <ul class="tabWrap lineWrap rowlineWrap lecListWrap three mt-zero">
                <li><a href="#leclist1" class="on">수강중강좌 <span>{{count($leclist_ing)}}</span></a><span class="row-line">|</span></li>
                <li><a href="#leclist2">즐겨찾기강좌 <span>{{count($leclist_like)}}</span></a><span class="row-line">|</span></li>
                <li><a href="#leclist3">숨긴강좌 <span>{{count($leclist_nodisp)}}</span></a></li>
            </ul>
            <div class="tabBox lineBox lecListBox">
                <div id="leclist1" class="tabContent">
                    <div class="lecTxt">* 모바일에서 수강완료강좌는 수강중 강좌에서 확인할 수 있습니다.</div>
                    <div class="btnBox mb20">
                        @if(empty($leclist_ing) == false)
                            <div class="InfoBtn btn_white bdr-none"><a href="javascript:;" onclick="fnLike('all',null);" style="padding: 0;"><img src="{{ img_url('m/mypage/icon_star_off.png') }}"></a></div>
                            <div class="InfoBtn btn_white"><a href="javascript:;" onclick="fnHide('all',null);">숨기기</a></div>
                        @endif
                    </div>
                    <form name='ingForm' id='ingForm' >
                        @if(empty($passinfo) == false)
                            <input type='hidden' name='OrderIdx' value='{{$passinfo['OrderIdx']}}' />
                            <input type='hidden' name='ProdCode' value='{{$passinfo['ProdCode']}}' />
                            <input type='hidden' name='OrderProdIdx' value='{{$passinfo['OrderProdIdx']}}' />
                            <input type='hidden' name='ProdCodeSub[]' id="ProdCodeSub_ing" value='' />
                        @endif
                        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                            <colgroup>
                                <col style="width: 13%;">
                                <col style="width: 87%;">
                            </colgroup>
                            <tbody>
                            @forelse( $leclist_ing as $row )
                                <tr>
                                    <td class="w-chk"><input type="checkbox" id="ProdCodeSub_liked" name="ProdCodeSub[]" class="goods_chk" value="{{$row['ProdCodeSub']}}" ></td>
                                    <td class="w-data tx-left">
                                        <dl class="w-info">
                                            <dt>
                                                {{$row['SubjectName']}}<span class="row-line">|</span>{{$row['wProfName']}}교수님
                                                <span class="NSK ml5 nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                            </dt>
                                        </dl>
                                        <div class="w-tit">
                                            <a href="{{ front_url('/classroom/pass/view/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span><span class="row-line">|</span></dt>
                                            <dt>진도율 : <span class="tx-blue">{{$row['StudyRate']}}%</span><span class="row-line">|</span></dt>
                                            <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}</span>일<span class="row-line">|</span></dt>
                                            <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                        </dl>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="tx-center">수강중 강좌 정보가 없습니다.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </form>
                </div>
                <div id="leclist2" class="tabContent"  style="display: none;">
                    <div class="lecTxt">* 모바일에서 수강완료강좌는 수강중 강좌에서 확인할 수 있습니다.</div>
                    <div class="btnBox mb20">
                        @if(empty($leclist_like) == false)
                            <div class="InfoBtn btn_white"><a href="javascript:;" onclick="fnUnLike('all', null);">즐겨찾기취소</a></div>
                        @endif
                    </div>
                    <form name='likedForm' id='likedForm' >
                        @if(empty($passinfo) == false)
                            <input type='hidden' name='OrderIdx' value='{{$passinfo['OrderIdx']}}' />
                            <input type='hidden' name='ProdCode' value='{{$passinfo['ProdCode']}}' />
                            <input type='hidden' name='OrderProdIdx' value='{{$passinfo['OrderProdIdx']}}' />
                            <input type='hidden' name='ProdCodeSub[]' id='ProdCodeSub_liked' value='' />
                        @endif
                        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                            <colgroup>
                                <col style="width: 13%;">
                                <col style="width: 87%;">
                            </colgroup>
                            <tbody>
                            @forelse( $leclist_like as $row )
                                <tr>
                                    <td class="w-chk"><input type="checkbox" id="ProdCodeSub_liked" name="ProdCodeSub[]" class="goods_chk" value="{{$row['ProdCodeSub']}}" ></td>
                                    <td class="w-data tx-left pl2p">
                                        <dl class="w-info">
                                            <dt>
                                                {{$row['SubjectName']}}<span class="row-line">|</span>{{$row['wProfName']}}교수님
                                                <span class="NSK ml5 nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                            </dt>
                                        </dl>
                                        <div class="w-tit">
                                            <a href="{{ front_url('/classroom/pass/view/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span><span class="row-line">|</span></dt>
                                            <dt>진도율 : <span class="tx-blue">{{$row['StudyRate']}}%</span><span class="row-line">|</span></dt>
                                            <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}</span>일<span class="row-line">|</span></dt>
                                            <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                        </dl>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="tx-center">즐겨찾기 강좌 정보가 없습니다.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </form>
                </div>
                <div id="leclist3" class="tabContent" style="display: none;">
                    <div class="lecTxt">* 모바일에서 수강완료강좌는 수강중 강좌에서 확인할 수 있습니다.</div>
                    <div class="btnBox mb20">
                        @if(empty($leclist_ing) == false)
                            <div class="InfoBtn btn_white"><a href="javascript:;" onclick="fnUnHide('all', null);">숨김해제</a></div>
                        @endif
                    </div>
                    <form name='hiddenForm' id='hiddenForm' >
                        @if(empty($passinfo) == false)
                            <input type='hidden' name='OrderIdx' value='{{$passinfo['OrderIdx']}}' />
                            <input type='hidden' name='ProdCode' value='{{$passinfo['ProdCode']}}' />
                            <input type='hidden' name='OrderProdIdx' value='{{$passinfo['OrderProdIdx']}}' />
                            <input type='hidden' name='ProdCodeSub[]' id="ProdCodeSub_hide" value='' />
                        @endif
                        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                            <colgroup>
                                <col style="width: 13%;">
                                <col style="width: 87%;">
                            </colgroup>
                            <tbody>
                            @forelse( $leclist_nodisp as $row )
                                <tr>
                                    <td class="w-chk"><input type="checkbox" id="ProdCodeSub_liked" name="ProdCodeSub[]" class="goods_chk" value="{{$row['ProdCodeSub']}}" ></td>
                                    <td class="w-data tx-left">
                                        <dl class="w-info">
                                            <dt>
                                                {{$row['SubjectName']}}<span class="row-line">|</span>{{$row['wProfName']}}교수님
                                                <span class="NSK ml5 nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                            </dt>
                                        </dl>
                                        <div class="w-tit">
                                            <a href="{{ front_url('/classroom/pass/view/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span><span class="row-line">|</span></dt>
                                            <dt>진도율 : <span class="tx-blue">{{$row['StudyRate']}}%</span><span class="row-line">|</span></dt>
                                            <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}</span>일<span class="row-line">|</span></dt>
                                            <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                        </dl>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="tx-center">숨김 강좌 정보가 없습니다.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </form>
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
    <form name="postForm" id="postForm" method="post">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        @if(empty($passinfo) == false)
            <input type="hidden" name="OrderIdx" id="OrderIdx" value="{{$passinfo['OrderIdx']}}" />
            <input type="hidden" name="ProdCode" id="ProdCode" value="{{$passinfo['ProdCode']}}" />
        @endif
    </form>
    <script type="text/javascript">
        var bookprice = 0;
        $(document).ready(function() {
            $('#passidx,#sitecode').on('change', function (){
                $('#searchFrm1').submit();
            });

            $('#course_ccd,#subject_ccd,#prof_ccd,#orderby').on('change', function (){
                $('#searchFrm2').submit();
            });

            $('#course_ccd_bok,#subject_ccd_book,#prof_ccd_book').on('change', function (){
                fnBookSubmit();
            });

            // 검색어 입력 후 엔터
            $('#search_text').on('keyup', function() {
                if (window.event.keyCode === 13) {

                }
            });
        });

        function fnAppendLecture()
        {
            url = "{{ front_url("/classroom/pass/addLecture/") }}";
            data = $('#addForm').serialize();

            sendAjax(url,
                data,
                function(ret){
                    alert(ret.ret_msg);
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'json');
        }

        function fnMoreLec()
        {
            url = "{{ front_url("/classroom/pass/ajaxMoreLecture/") }}";
            data = $('#postForm').serialize();

            $("#postForm").prop('action', url).submit();
        }

        function fnMoreBook()
        {
            url = "{{ front_url("/classroom/pass/ajaxMoreBook/") }}";
            data = $('#postForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    $("#book-table").html(d).end();
                    bookprice = 0;
                    openWin('MoreBook');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'html');
        }

        function fnMyDevice()
        {
            url = "{{ front_url("/classroom/pass/layerMyDevice/") }}";
            document.location.href = url;
        }

        function fnLike(code, obj)
        {
            url = "{{ front_url("/classroom/pass/set/like/") }}";

            if(code == 'all'){
                $("#ProdCodeSub_ing").val('');
            } else {
                $("#ProdCodeSub_ing").val(code);
            }

            data = $('#ingForm').serialize();

            sendAjax(url, data, function(ret){
                    alert(ret.ret_msg);
                    if(code == 'all'){
                        location.reload();
                    } else {

                    }
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'json');
        }

        function fnUnLike(code, obj)
        {
            url = "{{ front_url("/classroom/pass/unset/like/") }}";

            if(code == 'all'){
                $("#ProdCodeSub_liked").val('');
            } else {
                $("#ProdCodeSub_liked").val(code);
            }

            data = $('#likedForm').serialize();

            sendAjax(url, data, function(ret){
                    alert(ret.ret_msg);
                    if(code == 'all'){
                        location.reload();
                    } else {
                        $(obj).parent().parent().remove();
                    }
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'json');
        }

        function fnHide(code, obj)
        {
            url = "{{ front_url("/classroom/pass/set/hide/") }}";

            if(code == 'all'){
                $("#ProdCodeSub_ing").val('');
            } else {
                $("#ProdCodeSub_ing").val(code);
            }

            data = $('#ingForm').serialize();

            sendAjax(url, data, function(ret){
                    alert(ret.ret_msg);
                    if(code == 'all'){
                        location.reload();
                    } else {
                        $(obj).parent().parent().remove();
                    }
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'json');
        }

        function fnUnHide(code, obj)
        {
            url = "{{ front_url("/classroom/pass/unset/hide/") }}";

            if(code == 'all'){
                $("#ProdCodeSub_hide").val('');
            } else {
                $("#ProdCodeSub_hide").val(code);
            }

            data = $('#hiddenForm').serialize();

            sendAjax(url, data, function(ret){
                    alert(ret.ret_msg);
                    if(code == 'all'){
                        location.reload();
                    } else {
                        $(obj).parent().parent().remove();
                    }
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'json');
        }

        function fnBookSubmit()
        {
            url = "{{ front_url("/classroom/pass/ajaxMoreBook/") }}";
            data = $('#bookForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    $("#book-table").html(d).end();
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'html');
        }
        function fnPay()
        {
            if($(".bookorder").length > 0){
                $("#is_pay").val('Y');
                $("#bookOrderForm").submit();
            } else {
                alert("주문할 교재를 선택해주십시요.");
            }
        }

        function fnCart()
        {
            if($(".bookorder").length > 0){
                $("#is_pay").val('N');
                $("#bookOrderForm").submit();
            } else {
                alert("주문할 교재를 선택해주십시요.");
            }
        }
    </script>
@stop