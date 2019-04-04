@extends('lcms.layouts.master')
@section('content')
    <h5>- - 설문을 등록하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        @if($method == 'update')
            <input type="hidden" name="idx" value="{{ $idx }}" />
        @endif
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_title">
                <h2>문항등록</h2>
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

                        <input type="text" id="SqTitle" name="SqTitle" style="width:80%; height:30px;" @if($method == 'update') value="{{ $data['SqTitle'] }}" @endif>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">유형 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <span class="required">*</span> <span style="color:red;">유형설명 - 선택형(단일선택 객관식), 선다형(서술형 여러개), 복수형(다중선택 객관식)</span><br>
                        @if($method == 'update')
                            <select id="Type" name="Type" title="Type" class="seleProcess f_left" onchange="seltype(this);">
                                <option>-유형-</option>
                                <option value="S" @if($data['Type'] == "선택형") selected="selected" @endif>선택형</option>
                                <option value="M" @if($data['Type'] == "선다형") selected="selected" @endif>선다형</option>
                                <option value="T" @if($data['Type'] == "복수형") selected="selected" @endif>복수형</option>
                                <option value="D" @if($data['Type'] == "서술형") selected="selected" @endif>서술형</option>
                            </select>
                        @else
                            <select id="Type" name="Type" title="Type" class="seleProcess f_left" onchange="seltype(this);">
                                <option selected="selected">-유형-</option>
                                <option value="S">선택형</option>
                                <option value="M">선다형</option>
                                <option value="T">복수형</option>
                                <option value="D">서술형</option>
                            </select>
                        @endif
                    </div>
                </div>

                <div class="form-group" id="numgroup" style="display:none;">
                    <label class="control-label col-md-1-1">갯수 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        @if($method == 'update')
                            <select id="Cnt" name="Cnt" title="number" class="seleProcess f_left" onchange="selnum(this)">
                                @for($i = 1; $i <= 25; $i++)
                                <option value='{{ $i }}' @if($lastNum == $i ) selected="selected" @endif>{{ $i }}</option>
                                @endfor
                            </select>
                        @else
                            <select id="Cnt" name="Cnt" title="number" class="seleProcess f_left" onchange="selnum(this)">
                                @for($i = 1; $i <= 25; $i++)
                                <option value='{{ $i }}'>{{ $i }}</option>
                                @endfor
                            </select>
                        @endif

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">설명
                    </label>
                    <div class="col-md-10 form-inline">
                        @if($method == 'update')
                            <textarea id="SqComment" name="SqComment" cols="50" rows="3" class="memoText" style="width:80%;">{{ $data['SqComment'] }}</textarea>
                        @else
                            <textarea id="SqComment" name="SqComment" cols="50" rows="3" class="memoText" style="width:80%;"></textarea>
                        @endif
                    </div>
                </div>

                <div class="form-group" id="hintgroup" style="display:none;">
                    <label class="control-label col-md-1-1">보기 / 힌트</label>
                    <div class="col-md-4 item form-inline">
                        <div id="v1">보기 &nbsp;1 <textarea id="Comment1" name="Comment1" cols="50" rows="1" class="memoText" style="width:80%;">@if($method == 'update') {{ $data['Comment1'] }} @endif</textarea></div>
                        @for($i=2; $i <= 25; $i++)
                            <div id="v{{ $i }}" style="display:none;">보기 &nbsp;{{ $i }} <textarea id="Comment{{ $i }}" name="Comment{{ $i }}" cols="50" rows="1" class="memoText" style="width:80%;">@if($method == 'update') {{ $data['Comment'.$i] }} @endif</textarea></div>
                        @endfor

                    </div>
                    <div class="col-md-4 item form-inline">
                        <div id="h1">힌트 &nbsp;1 <textarea id="Hint1" name="Hint1" cols="50" rows="1" class="memoText" style="width:80%;">@if($method == 'update') {{ $data['Hint1'] }} @endif</textarea></div>
                        @for($i=2; $i <= 25; $i++)
                            <div id="h{{ $i }}" style="display:none;">힌트 &nbsp;{{ $i }} <textarea id="Hint{{ $i }}" name="Hint{{ $i }}" cols="50" rows="1" class="memoText" style="width:80%;">@if($method == 'update') {{ $data['Hint'.$i] }} @endif</textarea></div>
                        @endfor
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-10 item">

                        @if($method == 'update')
                            <select id="SqUseYn" name="SqUseYn" title="Type" class="seleProcess f_left">
                                <option value="Y" @if($data['SqUseYn'] == "Y") selected="selected" @endif>사용</option>
                                <option value="N" @if($data['SqUseYn'] == "N") selected="selected" @endif>미사용</option>
                            </select>
                        @else
                            <select id="SqUseYn" name="SqUseYn" title="Type" class="seleProcess f_left">
                                <option value="Y">사용</option>
                                <option value="N">미사용</option>
                            </select>
                        @endif
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

        $( document ).ready( function() {
            if(method == 'update'){
                var type = "{{ $type }}";
                var lastNum = '{{ $lastNum }}';
                if(type == 'D'){
                    $('#hintgroup').hide();
                    $('#numgroup').hide();
                } else {
                    $('#hintgroup').show();
                    $('#numgroup').show();
                }
                for(var i = 1; i <= lastNum; i++){
                    $('#h' + i).show();
                    $('#v' + i).show();
                }
            }
        });

        //유형선택
        function seltype(obj){
            if(obj.value == 'S'||obj.value == 'M'||obj.value == 'T'){
                $('#hintgroup').show();
                $('#numgroup').show();
            }else{
                $('#hintgroup').hide();
                $('#numgroup').hide();
            }
        }

        //갯수선택
        function selnum(obj){
            for(var i = 1; i <= 25; i++){
                $('#h' + i).hide();
                $('#v' + i).hide();
            }
            for(var i = 1; i <= obj.value; i++){
                $('#h' + i).show();
                $('#v' + i).show();
            }
            var nextnum = obj.value + 1;
            for(var j = nextnum; j <= 25; j++){
                $('#h' + j).hide();
                $('#v' + j).hide();
            }
        }

        // 목록 이동
        $('#goList').on('click', function() {
            location.replace('{{ site_url('/predict/survey/addquestion') }}' + getQueryString());
        });

        // 등록,수정
        $regi_form.submit(function() {
            var _url = '{{ ($method == 'update') ? site_url('/predict/survey/updateQuestion') : site_url('/predict/survey/storeQuestion') }}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.replace('{{ site_url('/predict/survey/addquestion') }}' + getQueryString());
                }
            }, showValidateError, null, false, 'alert');
        });
    </script>
@stop