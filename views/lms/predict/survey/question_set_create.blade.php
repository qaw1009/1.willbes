@extends('lcms.layouts.master')
@section('content')
    <h5>- 설문을 등록하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        @if($method == 'update')
            <input type="hidden" name="idx" value="{{ $idx }}" />
        @endif
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_title">
                <h2>문항세트등록</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다. <br>

                </div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1">제목 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">

                        <input type="text" id="SqsTitle" name="SqsTitle" style="width:80%; height:30px;" onKeyup='previewMake()' @if($method == 'update') value="{{ $data2[0]['SqsTitle'] }}" @endif>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">설명
                    </label>
                    <div class="col-md-10 form-inline">
                        @if($method == 'update')
                            <textarea id="SqsComment" name="SqsComment" cols="50" rows="3" class="memoText" style="width:80%;">{{ $data2[0]['SqsComment'] }}</textarea>
                        @else
                            <textarea id="SqsComment" name="SqsComment" cols="50" rows="3" class="memoText" style="width:80%;"></textarea>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-10 item">

                        @if($method == 'update')
                            <select id="SqsUseYn" name="SqsUseYn" title="Type" class="seleProcess f_left">
                                <option value="Y" @if($data2[0]['SqsUseYn'] == "Y") selected="selected" @endif>사용</option>
                                <option value="N" @if($data2[0]['SqsUseYn'] == "N") selected="selected" @endif>미사용</option>
                            </select>
                        @else
                            <select id="SqsUseYn" name="SqsUseYn" title="Type" class="seleProcess f_left">
                                <option value="Y">사용</option>
                                <option value="N">미사용</option>
                            </select>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-1 item"></div>
                    <div class="col-md-11 item">
                        <span class="required" style="margin-left:50px;">*</span> <span style="color:red;">그룹번호는 설문 묶음을 만들기위한 숫자입니다.(같은 숫자를 넣으면 묶음이 됩니다.)</span><br>
                        <span class="required" style="margin-left:60px;">-</span> <span style="color:red;">문항담기 → 그룹번호변경 → 그룹텍스트 순서로 입력하세요. 그룹번호를 수정하면 그룹텍스트는 초기화됩니다.</span>
                    </div>
                    <label class="control-label col-md-1-1" for="is_use_y">문항추가<span class="required">*</span></label>
                    <div class="col-md-4 item" style="border:3px solid black; height:500px; overflow-y:auto;">

                        <input type="hidden" id="cartIn" style="width:100%;"/>
                        <table border=1 cellspacing="1" cellpadding="5" class="lecTable" style="margin-top:5px; text-align: center;">
                            <colgroup>
                                <col style="width: 675px;">
                                <col style="width: 300px;">
                                <col style="width: 670px;">
                                <col style="width: 300px;">
                            </colgroup>
                            <tbody>
                            <tr>
                                <th style="text-align: center;">문항명</th>
                                <th style="text-align: center;">문항수</th>
                                <th style="text-align: center;">유형</th>
                                <th style="text-align: center;">이동</th>
                            </tr>
                            @foreach($data as $key => $val)
                                <tr>
                                    <td><div id='title{{ $val['SqIdx'] }}' style="margin-top:5px;">{{ $val['SqTitle'] }}</div></td>
                                    <td><div id='cnt{{ $val['SqIdx'] }}' style="margin-top:5px;">{{ $val['Cnt'] }}</div></td>
                                    <td><div id='type{{ $val['SqIdx'] }}' style="margin-top:5px;">{{ $val['Type'] }}</div></td>
                                    <td><button class="btn btn-primary" type="button" onClick="cart('{{ $val['SqIdx'] }}' , null)">문항담기</button></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-1 item" style="text-align:center; color:red; font-weight:bold;">
                        <div style="margin-top:150px;">
                            <h3> → </h3><br>
                            <h3> → </h3><br>
                            <h3> → </h3><br>

                        </div>
                    </div>

                    <div class="col-md-4 item" style="border:1px solid gray; height:500px; text-align:center; padding:1px; background-color:black;">
                        <div class="col-md-2 item" style="border:1px solid black; height:20px; font-weight: bold; background-color:white;">
                            그룹번호
                        </div>
                        <div class="col-md-4 item" style="border:1px solid black; height:20px; font-weight: bold; background-color:white;">
                            질문명
                        </div>
                        <div class="col-md-2 item" style="border:1px solid black; height:20px; font-weight: bold; background-color:white;">
                            문항수
                        </div>
                        <div class="col-md-2 item" style="border:1px solid black; height:20px; font-weight: bold; background-color:white;">
                            문항타입
                        </div>
                        <div class="col-md-2 item" style="border:1px solid black; height:20px; font-weight: bold; background-color:white;">
                            삭제
                        </div>


                        <div class="col-md-2 item" style="border:1px solid black; height:475px; background-color:white;" id="r2">

                        </div>
                        <div class="col-md-4 item" style="border:1px solid black; height:475px; background-color:white;" id="r3">

                        </div>
                        <div class="col-md-2 item" style="border:1px solid black; height:475px; background-color:white;" id="r4">

                        </div>
                        <div class="col-md-2 item" style="border:1px solid black; height:475px; background-color:white;" id="r5">

                        </div>
                        <div class="col-md-2 item" style="border:1px solid black; height:475px; background-color:white;" id="r6">

                        </div>

                    </div>
                    <div class="col-md-2 item" id="r7"></div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use_y">그룹텍스트<span class="required">*</span></label>
                    <div class="col-md-10 item" >
                        <div id="grtxt"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use_y">미리보기</label>
                    <div class="col-md-10 item" >
                        <div style="border:3px solid black; width:80%; padding:40px;">
                            <div style="margin:10px 0px 10px 20px; text-align:center;" id="pvtitle"></div>
                            <div id="pview" style="margin-top:20px;"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="goList">목록</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        var $regi_form = $('#regi_form');
        var method = '{{ $method }}';
        var currentnum = 1;
        var priviewnum = 1;
        var arrGroupTitle = {!! json_encode($arrGroupTitle) !!};
        var arrGroupNumber = {!! json_encode($arrGroupNumber) !!};
        var arrKey = {!! json_encode($arrKey) !!};

        $( document ).ready( function() {
            for(var i=0; i < arrKey.length; i++){
                cart(arrKey[i], arrGroupNumber[i]);
            }

            groupTextMake();
            previewMake();

            //종료후 실행
            $.when(groupTextMake(), previewMake()).done(function(){
                for(var i=0; i < arrGroupTitle.length; i++){
                    var v = i + 1;
                    $('#g'+v).val(arrGroupTitle[i]);
                    $('#gt'+v).val(arrGroupTitle[i]);
                }
            });
        });

        function cart(sqidx, add){

            var useYn = cartCheck(sqidx);
            var vnum = 0;
            if(add == null){
                vnum = currentnum;
            } else {
                vnum = add;
            }

            if(useYn == 'N') {

                var tempR2 = $('#r2').html();
                tempR2 = tempR2 + "<div id='r2" + sqidx + "'>Q<input type='text' id='GroupNumber"+ sqidx +"' name='GroupNumber[]' value=" + vnum + " style='width:25px;' onKeyup='groupTextMake()' /></div>";
                $('#r2').html(tempR2);

                var tempR3 = $('#r3').html();
                tempR3 = tempR3 + "<div id='r3" + sqidx + "'><input type='text' id='title"+ sqidx +"' name='temptitle[]' value='" + $('#title' + sqidx).html() + "' style='width:150px;' disabled/>";
                tempR3 = tempR3 + "<input type='hidden' name='SubTitle[]' value='" + $('#title' + sqidx).html() + "' style='width:150px;' /></div>";
                $('#r3').html(tempR3);

                var tempR4 = $('#r4').html();
                tempR4 = tempR4 + "<div id='r4" + sqidx + "'><input type='text' value='" + $('#cnt' + sqidx).html() + "'  style='width:40px;' disabled /></div>";
                $('#r4').html(tempR4);
                var tempR5 = $('#r5').html();
                tempR5 = tempR5 + "<div id='r5" + sqidx + "'><input type='text' value='" + $('#type' + sqidx).html() + "' style='width:60px;' disabled /></div>";
                $('#r5').html(tempR5);
                var tempR6 = $('#r6').html();
                tempR6 = tempR6 + "<div id='r6" + sqidx + "' style='margin-top:5px;'><button class='btn btn-primary' type='button' onClick='cartDel(" + sqidx + ")'>삭제</button></div>";
                $('#r6').html(tempR6);

                var tempR7 = $('#r7').html();
                tempR7 = tempR7 + "<div id='r7" + sqidx + "'><input type='hidden' id='sq"+ sqidx +"' name='SqIdx[]' value=" + sqidx + " style='width:25px;' /></div>";
                $('#r7').html(tempR7);

                var cartIn = $('#cartIn').val();
                cartIn = cartIn + sqidx + ',';
                $('#cartIn').val(cartIn);

                currentnum++;

                groupTextMake();
            } else {
                alert('이미 담겨있습니다.');
                return ;
            }
        }

        function cartCheck(cknum){
            var cartInnumber = $('#cartIn').val();
            var arrCart = cartInnumber.split(',');
            for(var i=0; i < arrCart.length; i++){
                if(arrCart[i] == cknum){
                    return 'Y';
                }
            }
            return 'N';
        }

        function groupTextMake(){
            var obj = $("input[name='GroupNumber[]']");
            var objtxt = $("input[name='temptitle[]']");
            var gtxt = '';
            var tempval = '';
            for(var i=0; i < obj.size(); i++){
                var cobj = obj[i];
                var tobj = objtxt[i];

                if(tempval != cobj.value) {
                    gtxt = gtxt + 'Q' + cobj.value + " . <input type='text' id='g" + cobj.value + "' name='GroupTitle[]' value='" + tobj.value + "' style='width:80%' onKeyup='previewChange(" + cobj.value + ",this)' /><input type='hidden' name='Group[]' value='" + cobj.value + "' /><br>";
                }

                tempval = cobj.value;
                priviewnum++;
            }
            $('#grtxt').html(gtxt);

            previewMake();
        }

        function previewChange(idx,obj){
            $('#gt'+idx).val(obj.value);
        }

        function previewMake(){
            var obj = $("input[name='GroupNumber[]']");
            var objtxt = $("input[name='temptitle[]']");
            var gtxt = '';
            var tempval = '';
            for(var i=0; i < obj.size(); i++){
                var cobj = obj[i];
                var tobj = objtxt[i];

                if(tempval != cobj.value) {
                    gtxt = gtxt + 'Q' + cobj.value + ". <input type='text' id='gt" + cobj.value + "' value='" + tobj.value + "' style='width:80%' disabled/><br>";
                }
                gtxt = gtxt + " -" + tobj.value + "<br> ※ 문항내용 : ~ <br><br>";
                tempval = cobj.value;
            }

            $('#pvtitle').html($('#SqsTitle').val());
            $('#pvtitle').css('font-size','20px');
            $('#pview').html(gtxt);
        }

        function reCartIn(cknum){
            var restr = '';
            var cartInnumber = $('#cartIn').val();
            var arrCart = cartInnumber.split(',');
            var cartLeng = arrCart.length - 1;
            for(var i=0; i < cartLeng; i++){
                if(arrCart[i] != cknum){
                    restr = restr + arrCart[i] + ',';
                }
            }

            $('#cartIn').val(restr);
        }

        function cartDel(idx){
            $('#r1'+idx).remove();
            $('#r2'+idx).remove();
            $('#r3'+idx).remove();
            $('#r4'+idx).remove();
            $('#r5'+idx).remove();
            $('#r6'+idx).remove();
            $('#r7'+idx).remove();
            // 장바구니배열 초기화
            reCartIn(idx);
            groupTextMake();
            previewMake();
        }

        // 목록 이동
        $('#goList').on('click', function() {
            location.replace('{{ site_url('/predict/survey/addquestionset') }}' + getQueryString());
        });

        // 등록,수정
        $regi_form.submit(function() {
            var _url = '{{ ($method == 'update') ? site_url('/predict/survey/updateQuestionSet') : site_url('/predict/survey/storeQuestionSet') }}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.replace('{{ site_url('/predict/survey/addquestionset') }}' + getQueryString());
                }
            }, showValidateError, null, false, 'alert');
        });
    </script>
@stop