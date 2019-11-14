@extends('willbes.pc.layouts.master_popup')

@section('content')
<!-- Popup -->
<div class="Popup ExamBox">
    <div class="popTitBox">
        <div class="pop-Tit NG"><img src="/public/img/willbes//mypage/logo.gif"> 전국 모의고사</div>
        <div class="pop-subTit">{{ $productInfo['ProdName'] }}</div>
    </div>
    <div class="popupContainer">
        <ul class="tabSty {{ (($productInfo['PaperType'] == 'P') ? 'tabSty50' : '') }}">
            <li><a href="javascript:goLink(1);">전체 성적 분석</a></li>
            <li><a href="javascript:goLink(2);">과목별 문항분석</a></li>
            <li class="active"><a href="#none">오답노트</a></li>
        </ul>
        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" id='prodcode' name="prodcode" value="{{ $prodcode }}" />
            <input type="hidden" id='smpidx' name="mpidx" />

        </form>
        <form class="form-horizontal" id="url_form" name="url_form" method="POST" onsubmit="return false;">
            {!! csrf_field() !!}
            <input type="hidden" id='prodcode' name="prodcode" value="{{ $prodcode }}" />
            <input type="hidden" id='mridx' name="mridx" value="{{ $mridx }}" />
            <input type="hidden" id="wrongYn" name="wrongYn" value="N" />
            <input type="hidden" id='umpidx' name="mpidx" />
        </form>
        <!-- //tab -->
        <form id="search_form" name="search_form" method="POST" action="{{ site_url('/classroom/MockResult/winAnswerNote') }}">
            {!! csrf_field() !!}
            <input type="hidden" id='prodcode' name="prodcode" value="{{ $prodcode }}" />
            <input type="hidden" id='mridx' name="mridx" value="{{ $mridx }}" />
            <input type="hidden" name="wrongYn" value="{{ element('wrongYn', $arr_input) }}" />
        <div class="wBx mgT1 mgB1 mt30">
            <table cellspacing="0" cellpadding="0" class="findTb">
                <colgroup>
                    <col style="width: 120px"/>
                    <col width="*">
                </colgroup>
                <tbody>
                <tr>
                    <th>문제선택</th>
                    <td class="pl15">
                        <select class="sele" id="mpidx" name="mpidx" onchange="selAreaAjax()">
                            @foreach($pList as $key => $row)
                            <option value="{{ $key }}" @if( element('mpidx', $arr_input) == $key ) selected @endif>{{ $row }}</option>
                            @endforeach
                        </select>
                        <select class="sele" id="CORRECTYN" name="CORRECTYN">
                            <option value="" @if(element('CORRECTYN', $arr_input) == '') selected @endif>전체문항</option>
                            <option value="Y" @if(element('CORRECTYN', $arr_input) == 'Y') selected @endif>정답문항</option>
                            <option value="N" @if(element('CORRECTYN', $arr_input) == 'N') selected @endif>오답문항</option>
                        </select>
                        <select class="sele" id="QUESTIONYN" name="QUESTIONYN">
                            <option value="Q" @if(element('QUESTIONYN', $arr_input) == 'Q' || element('QUESTIONYN', $arr_input) == '') selected @endif>문제만보기</option>
                            <option value="A" @if(element('QUESTIONYN', $arr_input) == 'A') selected @endif>문제+해설보기</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>영역선택</th>
                    <td class="pl15">
                        <div class="f_left chkWp">
                            <input type="checkbox" id="ID_ALL" name="ID_ALL" value="Y" onClick="checkALL(this)" @if(element('ID_ALL', $arr_input) == 'Y') checked @endif><label for="ID_ALL">전체영역</label>
                            <span id="chkArea"></span>
                        </div>
                        <div class="f_right btnAgR mr20">
                            <a class="btnGray" href="javascript:document.search_form.submit();">조회</a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        </form>
        <div class="btnAgR mgB1 mr20">
            @if(element('wrongYn', $arr_input) == 'Y')
            <a class="btnBlue" id='myNote' href="javascript:myWrongNote('N')">전체문항보기</a>
            @else
            <a class="btnBlue" id='myNote' href="javascript:myWrongNote('Y')">나의오답노트</a>
            @endif
            <a class="btnGray" href="javascript:printPage()">출력하기</a>
        </div>
        <form id="regi_form_add" name="regi_form_add" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            <input type="hidden" id='prodcode' name="ProdCode" value="{{ $prodcode }}" />
            <input type="hidden" name="MrIdx" value="{{ $productInfo['MrIdx'] }}"/>
            <input type="hidden" id='smpidxadd' name="MpIdx" />
            <input type="hidden" id='smqidx' name="MqIdx" />
            <input type="hidden" id='smemo' name="Memo" />
        </form>
        <div class="wBx">
            <ul class="exam-paperList mgB3">
                @foreach($answerNote as $key => $row)
                    @if(element('CORRECTYN', $arr_input) == $row['IsWrong'] || element('CORRECTYN', $arr_input) == "")
                        @if(element('wrongYn', $arr_input) == 'Y')

                            @if($row['MwaIdx'])
                                <li>
                                    <a name="que4" class="no">Q{{ $key + 1 }}.</a>
                                    <span class="que"><img src="{{ $row['QFilePath'] }}{{ $row['file'] }}"></span>
                                    <div id='btn_area' class="btnAgR">
                                        <a href="javascript:noteDelete({{ $row['MqIdx'] }})" class="btnM1 btnlineBlue">문항 삭제 +</a>
                                        <a href="javascript:openMemo({{ $row['MqIdx'] }})" id='memo{{ $row['MqIdx'] }}' class="btnM2 btnGray">메모</a>
                                    </div>
                                    <div class="agR">
                                        <textarea id="m{{ $row['MqIdx'] }}" name="memo{{ $row['MqIdx'] }}" cols="10" rows="1" class="memoText">{{ $row['Memo'] }}</textarea>
                                    </div>

                                </li>

                                @if(element('QUESTIONYN', $arr_input) == 'A')
                                <!-- 해설 -->
                                <li style="display:@if(element('QUESTIONYN', $arr_input) == 'Q') none; @endif">
                                    <a name="que4" class="no">A{{ $key + 1 }}.</a>
                                    <span class="que"><img src="{{ $row['QFilePath'] }}{{ $row['RealExplanFile'] }}"></span>
                                </li>
                                @endif

                            @endif

                        @else
                            <li>
                                <a name="que4" class="no">Q{{ $key + 1 }}.</a>
                                <span class="que"><img src="{{ $row['QFilePath'] }}{{ $row['file'] }}"></span>
                                <div id='btn_area' class="btnAgR">
                                    <a href="javascript:noteAdd({{ $row['MqIdx'] }})" class="btnM1 btnlineBlue">노트에 바로추가 +</a>
                                    <a href="javascript:openMemo({{ $row['MqIdx'] }})" id='memo{{ $row['MqIdx'] }}' class="btnM2 btnGray">메모</a>
                                    <a href="javascript:noteAdd({{ $row['MqIdx'] }})" id='add{{ $row['MqIdx'] }}' class="btnM3 btnGray">메모저장후추가</a>
                                </div>
                                <div class="agR">
                                    <textarea id="m{{ $row['MqIdx'] }}" name="memo{{ $row['MqIdx'] }}" cols="10" rows="1" class="memoText">{{ $row['Memo'] }}</textarea>
                                </div>

                            </li>

                            @if(element('QUESTIONYN', $arr_input) == 'A')
                            <!-- 해설 -->
                            <li style="display:@if(element('QUESTIONYN', $arr_input) == 'Q') none; @endif">
                                <a name="que4" class="no">A{{ $key + 1 }}.</a>
                                <span class="que"><img src="{{ $row['QFilePath'] }}{{ $row['RealExplanFile'] }}"></span>
                            </li>
                            @endif
                        @endif
                    @endif

                @endforeach
            </ul>
        </div>
    </div>
    <!-- //popupContainer -->
</div>
<!-- End Popup -->
<script type="text/javascript">
    var MalArr = {!! json_encode($MalArr) !!};
    var firstChk = 'Y';
    var $regi_form_add = $('#regi_form_add');
    var wrongYn = '{{ element('wrongYn', $arr_input) }}';

    $(document).ready(function() {
        selAreaAjax();
        if($('.exam-paperList > li').size() == 0){
            if(wrongYn == 'N'){
                var str = '- 검색된 문항이 없습니다. -';
            } else {
                var str = '- 등록된 오답노트가 없습니다. -';
            }
            $('.exam-paperList').html("<li style='text-align:center; font-weight:bold; width:100%'>" + str +"</li>");
        }
    });

    function openMemo(num){
        var $textarea_layer = $('#m'+num);
        var $btn2_layer = $('#memo'+num);
        var $btn3_layer = $('#add'+num);

        $btn2_layer.hide();
        $btn3_layer.css('display','inline-block');
        $textarea_layer.css('display','inline-block');
    }

    //전체선택/해제
    function checkALL(obj){
        if(obj.checked == true){
            $('input:checkbox[id=MalIdx]').prop('checked','checked');
        }else{
            $('input:checkbox[id=MalIdx]').prop('checked','');
        }
    }

    // 나의오답노트 추가
    function noteAdd(mqidx){
        $('#smpidxadd').val($('#mpidx option:selected').val());
        $('#smqidx').val(mqidx);
        $('#smemo').val($('#m'+mqidx).val());

        var _url = '{{ front_url('/classroom/MockResult/noteAddAjax') }}';
        ajaxSubmit($regi_form_add, _url, function(ret) {
            if(ret.ret_cd) {
                alert(ret.ret_msg);
            }
        }, showValidateError, null, false, 'alert');
    }

    function noteDelete(mqidx){
        $('#smpidxadd').val($('#mpidx option:selected').val());
        $('#smqidx').val(mqidx);

        var _url = '{{ front_url('/classroom/MockResult/noteDeleteAjax') }}';
        ajaxSubmit($regi_form_add, _url, function(ret) {
            if(ret.ret_cd) {
                alert(ret.ret_msg);
                location.reload();
            }
        }, showValidateError, null, false, 'alert');
    }

    function myWrongNote(yn){
        $('#umpidx').val($('#mpidx option:selected').val());
        $('#wrongYn').val(yn);
        var link ="{{ site_url('/classroom/MockResult/winAnswerNote') }}";
        document.url_form.action = link;
        document.url_form.submit();
    }

    function selAreaAjax(){
        //체크해제
        if(firstChk != 'Y'){
            $('input:checkbox[id=ID_ALL]').prop('checked','');
            $('input:checkbox[id=MalIdx]').prop('checked','');
        }

        $('#smpidx').val($('#mpidx option:selected').val());

        url = "{{ site_url("/classroom/MockResult/selAreaAjax") }}";
        data = $('#regi_form').serialize();

        sendAjax(url,
            data,
            function(d){
                var str = '';

                for(var i=0; i < d.data.length; i++){
                    if(firstChk == 'Y'){
                        var checked = "";
                        for(var j=0; j < MalArr.length; j++){
                            if(d.data[i].MalIdx == MalArr[j]) checked = "checked";
                        }
                    }
                    str += "<input type='checkbox' id='MalIdx' name='MalIdx[]' value='"+d.data[i].MalIdx+"'"+checked+"><label for='MalIdx"+i+"'>"+d.data[i].AreaName+"</label>";
                }

                $('#chkArea').html(str);
                firstChk = 'N';
            },
            function(ret, status){
                alert(ret.ret_msg);
            }, true, 'POST', 'json');

    }

    function goLink(type){
        // 성적데이터가 없어 탭이동불가
        if( '{{ $submission }}' == 'N' ){
            alert('성적데이터가 처리되지 않아 성적 확인이 불가능합니다.');
            return ;
        }
        //값이 세팅되면 시작
        if(type == 1){
            var link = "{{ site_url('/classroom/MockResult/winStatTotal') }}";
            document.url_form.action = link;
        }else{
            var link ="{{ site_url('/classroom/MockResult/winStatSubject') }}";
            document.url_form.action = link;
        }
        document.url_form.submit();
    }

    //인쇄
    function printPage(){
        var initBody;
        window.onbeforeprint = function(){
            initBody = $('#widthFrame').html();
            $('[id*=btn_area]').hide();
            $('textarea').css('width','100%');
            $('textarea').attr('rows','5');
            document.body.innerHTML =  $('.exam-paperList').html();
        };
        window.onafterprint = function(){
            $('[id*=btn_area]').show();
            $('textarea').css('width','395px');
            $('textarea').attr('rows','1');
            document.body.innerHTML = initBody;
        };
        window.print();
    }
</script>

@stop
