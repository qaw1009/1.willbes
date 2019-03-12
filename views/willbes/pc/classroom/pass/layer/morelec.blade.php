<script>
    data = [@foreach( $leclist as $key => $row )
        '<tr>'+
    '<td class="btnClose"><a href="javascript:;" onclick="fnDel(this);"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></td>'+
    '<td class="w-info passzone">'+
    '<dl class="w-info">'+
    '<dt>{{$row['SubjectName']}}</dt>'+
    '<dt><span class="row-line">|</span></dt>'+
    '<dt>{{$row['wProfName']}}</dt>'+
    '</dl><br/>'+
    '<div class="w-tit tx-left">{{$row['ProdName']}}</div>'+
    '<dl class="w-info">'+
    '<dt>강의수 : {{$row['wUnitLectureCnt']}}강</dt>'+
    '<dt><span class="row-line">|</span></dt>'+
    '<dt>진행여부 : <span class="{{$row['wLectureProgressCcd'] == '105001' ? 'tx-red' : 'tx-light-blue'}}">{{$row['wLectureProgressCcdName']}}</span></dt>'+
    '</dl>'+
    '<input type="hidden" name="ProdCodeSub[]" value="{{$row['ProdCode']}}" />' +
    '</td>'+
    '</tr>' ,
        @endforeach ''];
</script>
<form name="lecForm" id="lecForm" metho="GET" onsubmit="return false;">
    <ul class="passzoneInfo tx-gray NGR">
        <li>· '무한PASS존'에서 수강하기 위한 강좌를 추가하는 메뉴입니다.</li>
        <li>· '수강할 강좌 검색' 후 체크박스를 클릭하시면, 우측 '강좌 선택내역'에 선택한 강좌가 추가됩니다.</li>
        <li>· '강좌선택내역'에서 강좌 확인 후 '강좌추가' 버튼을 클릭하면 수강이 가능합니다.</li>
        <li>·  강좌명 클릭시 '강좌상세정보' 영역에서 정보를 확인할 수 있습니다.</li>
    </ul>
    <div class="willbes-Lec-Selected tx-gray">
        <div class="willbes-Lec-Selected-Grid">
            <select id="subject_ccd" name="subject_ccd" title="lec" class="seleLec" onchange="fnSubmit();">
                <option selected="selected" value="">과목</option>
                @foreach($subject_arr as $row )
                    <option value="{{$row['SubjectIdx']}}" @if(isset($input_arr['subject_ccd']) && $input_arr['subject_ccd'] == $row['SubjectIdx']) selected="selected" @endif >{{$row['SubjectName']}}</option>
                @endforeach
            </select>
            <select id="prof_ccd" name="prof_ccd" title="Prof" class="seleProf" onchange="fnSubmit();">
                <option selected="selected" value="">교수님</option>
                @foreach($prof_arr as $row )
                    <option value="{{$row['wProfIdx']}}" @if(isset($input_arr['prof_ccd']) && $input_arr['prof_ccd'] == $row['wProfIdx']) selected="selected" @endif >{{$row['wProfName']}}</option>
                @endforeach
            </select>
            <select id="course_ccd" name="course_ccd" title="process" class="seleProcess" onchange="fnSubmit();">
                <option selected="selected" value="">학습유형</option>
                @foreach($course_arr as $row )
                    <option value="{{$row['CourseIdx']}}" @if(isset($input_arr['course_ccd']) && $input_arr['course_ccd'] == $row['CourseIdx']) selected="selected" @endif  >{{$row['CourseName']}}</option>
                @endforeach
            </select>
            <div class="willbes-Lec-Search GM f_right">
                <div class="inputBox p_re">
                    <input type="text" id="search_text" name="search_text" class="labelSearch" value="@if(isset($input_arr['search_text'])){{$input_arr['search_text']}}@endif" placeholder="강좌명" maxlength="30">
                    <button type="button" onclick="fnSubmit();" class="search-Btn">
                        <span>검색</span>
                    </button>
                </div>
                <div class="subBtn f_right"><a href="javascript:;" onclick="fnReset();">초기화</a></div>
            </div>
        </div>
        <div class="Search-Result">
            <div class="Total">총 {{count($leclist)}}건</div>
            <div class="chkBox">
                <label><input type="checkbox" id="take" name="take" value="Y" class="goods_chk" {{$input_arr['take'] == 'Y' ? 'checked' : ''}}> 수강중강좌 제외</label>
            </div>
        </div>
    </div>
    <div class="PASSZONE-Lec-Wrap">
        <div class="LeclistTable" id="">
            <table cellspacing="0" cellpadding="0" class="listTable under-gray tx-gray">
                <colgroup>
                    <col style="width: 50px;">
                    <col style="width: 55px;">
                    <col style="width: 55px;">
                    <col style="width: 80px;">
                    <col style="width: 320px;">
                </colgroup>
                <thead>
                <tr>
                    <th><input type="checkbox" id="check_all" name="check_all" class="goods_chk" onchange="fnAll(this)"><span class="row-line">|</span></th>
                    <th>과목명<span class="row-line">|</span></th>
                    <th>교수명<span class="row-line">|</span></th>
                    <th>학습유형<span class="row-line">|</span></th>
                    <th>강좌명</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $leclist as $key => $row )
                    <tr class="replyList passzone-Leclist" onclick="fnViewInfo({{$row['ProdCode']}})">
                        <td><input type="checkbox" id="checkBox" class="goods_chk prodCheck" value="{{$key}}" {{$row['IsTake'] == 'Y' ? 'disabled=disabled' : ''}}></td>
                        <td class="w-sbj">{{$row['SubjectName']}}</td>
                        <td class="w-prof">{{$row['wProfName']}}</td>
                        <td class="w-type">{{$row['CourseName']}}</td>
                        <td class="w-info passzone">
                            <div class="w-tit tx-left">{{$row['ProdName']}}</div>
                            <dl class="w-info">
                                <dt>강의수 : {{$row['wUnitLectureCnt']}}강</dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>진행여부 : <span class="{{$row['wLectureProgressCcd'] == '105001' ? 'tx-red' : 'tx-light-blue'}}">{{$row['wLectureProgressCcdName']}}</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt class="tx-black"><a href="#none" ><img src="{{ img_url('sub/icon_detail.gif') }}" style="margin: -4px 5px 0 0;">강좌상세정보</a></dt>
                            </dl>
                        </td>
                    </tr>
                    <tr class="replyTxt passzone-Lecinfo">
                        <td colspan="5">
                            <div class="lecDetailWrap p_re mt30 mb60">
                                <ul class="tabWrap tabDepth2">
                                    <li><a href="#ch1-{{$row['ProdCode']}}" class="on">강좌상세정보</a></li>
                                    <li><a href="#ch2-{{$row['ProdCode']}}">강좌목차</a></li>
                                </ul>
                                <div class="w-btn">
                                    <a class="bg-blue bd-dark-blue NSK" href="javascript:;" onclick="@if($row['IsTake'] == 'Y') alert('이미 등록한 강좌입니다.'); @else fnAppend({{$key}}); @endif">현재 강좌추가</a>
                                </div>
                                <div class="tabBox mt30" id="info-{{$row['ProdCode']}}">

                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="tx-center">강좌정보가 없습니다.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <input type="hidden" name="OrderIdx" id="OrderIdx" value="{{$passinfo['OrderIdx']}}" />
    <input type="hidden" name="ProdCode" id="ProdCode" value="{{$passinfo['ProdCode']}}" />
</form>
<script src="/public/js/willbes/tabs.js?ver={{time()}}"></script>
<script src="/public/js/willbes/sub.js?ver={{time()}}"></script>
<script>
    function fnAppend(idx)
    {
        $('#addTable > tbody:last').append(data[idx]);
    }

    function fnDel(obj)
    {
        $(obj).parent().parent().remove();
    }

    function fnAll(obj)
    {
        if($(obj).is(":checked")) {
            $(".prodCheck").each(function(){
               if(!$(this).is(":disabled")){
                   $(this).prop("checked", true);
                   $('#addTable > tbody:last').append(data[$(this).val()]);
               }
            });
        } else {
            $(".prodCheck").each(function(){
                $(this).prop("checked", false);
            });
        }
    }

    function fnSubmit()
    {
        url = "{{ site_url("/classroom/pass/ajaxMoreLecture/") }}";
        data = $('#lecForm').serialize();

        sendAjax(url,
            data,
            function(d){
                $("#lecList").html(d).end();
            },
            function(ret, status){
                alert(ret.ret_msg);
            }, false, 'GET', 'html');
    }

    function fnReset()
    {
        url = "{{ site_url("/classroom/pass/ajaxMoreLecture/") }}";
        data = $('#postForm').serialize();

        sendAjax(url,
            data,
            function(d){
                $("#lecList").html(d).end();
            },
            function(ret, status){
                alert(ret.ret_msg);
            }, false, 'GET', 'html');
    }

    $(".prodCheck").on("change", function(){
        if($(this).is(":checked")){
            $('#addTable > tbody:last').append(data[$(this).val()]);
        }
    });

    function fnViewInfo(prodcode)
    {
        url = "{{ site_url("/classroom/pass/ajaxLecInfo") }}";
        data = 'prodcode='+prodcode;

        sendAjax(url,
            data,
            function(d){
                $('#info-'+prodcode).html(d).end();
            },
            function(ret, status){
                alert(ret.ret_msg);
            }, false, 'GET', 'html');
    }
</script>