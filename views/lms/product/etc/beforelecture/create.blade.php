@extends('lcms.layouts.master')

@section('content')

    @php
        $disabled = '';
        if($method == 'PUT') {
            $disabled = "disabled";
        }

    @endphp

    <h5>- 임용 선수강좌 정보를 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>선수강좌정보</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}

                <input type="hidden" name="BlIdx" id="BlIdx" value="{{$BlIdx}}"/>

                <div class="form-group">
                    <label class="control-label col-md-2" for="site_code">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', $disabled) !!}
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-md-2">선수강좌유형 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <div class="radio">
                            <input type="radio" name="LecType" class="flat" value="N" title="선수강좌유형" @if( $method == 'POST' || $data['LecType']=='N')checked="checked"@endif required="required"/> 일반
                            &nbsp;
                            <input type="radio" name="LecType" class="flat" value="S" title="선수강좌유형" @if( $data['LecType']=='S')checked="checked"@endif required="required"/> 수강생전용
                        </div>
                    </div>
                    <label class="control-label col-md-2">유효기간 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item">
                        <div class="item inline-block">
                            <input type="text" name="ValidPeriodStartDate" id="ValidPeriodStartDate" value="@if($method==='PUT'){{$data['ValidPeriodStartDate']}}@endif" class="form-control datepicker" title="유효기간" style="width:100px;" readonly required="required">
                            &nbsp;~&nbsp;
                            <input type="text" name="ValidPeriodEndDate" id="ValidPeriodEndDate" value="@if($method==='PUT'){{$data['ValidPeriodEndDate']}}@endif"  class="form-control datepicker" title="유효기간" style="width:100px;" readonly required="required">
                        </div>
                    </div>
                </div>

                <div class="form-group" >
                    <label class="control-label col-md-2" >대상강좌  <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <p><button type="button" class="btn btn-sm btn-primary ml-5" id="tarAdd">강좌검색</button></p>
                        <div id="tarGroup">
                            @foreach($data_product as $row)
                                @if($row['BeforeLectureGroup'] === 'T')
                                    <span id="tarList{{$row['ProdCode']}}">
                                        <input name="ProdCode[]" type="hidden" value="{{$row['ProdCode']}}">
                                        <input name="BeforeLectureGroup[]" type="hidden" value="T"> [{{$row['ProdTypeCcd_Name']}}]{{$row['ProdName']}} ({{number_format($row['RealSalePrice'],0)}}원)
                                        <a onclick="rowDelete('tarList{{$row['ProdCode']}}')" href="javascript:;">
                                            <i class="fa fa-times red"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group" >
                    <label class="control-label col-md-2" >조건강좌(필수)  <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <p><button type="button" class="btn btn-sm btn-primary ml-5" id="essAdd">강좌검색</button>
                            &nbsp;&nbsp;
                            <input type="radio" name="ConditionType" id="ConditionType1" required="required" value="AND" class="flat" @if($method == 'POST' || $data['ConditionType']=='AND')checked="checked"@endif> AND
                            &nbsp;
                            <input type="radio" name="ConditionType" id="ConditionType2" required="required" value="AND" class="flat" @if($data['ConditionType']=='OR')checked="checked"@endif> OR
                        </p>
                        <div id="essGroup">
                            @foreach($data_product as $row)
                                @if($row['BeforeLectureGroup'] === 'E')
                                    <span id="essList{{$row['ProdCode']}}">
                                        <input name="ProdCode[]" type="hidden" value="{{$row['ProdCode']}}">
                                        <input name="BeforeLectureGroup[]" type="hidden" value="E"> [{{$row['ProdTypeCcd_Name']}}]{{$row['ProdName']}}
                                        <a onclick="rowDelete('essList{{$row['ProdCode']}}')" href="javascript:;">
                                            <i class="fa fa-times red"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>


        <div id="view_option1">

                <div class="form-group" >
                    <label class="control-label col-md-2" >조건강좌(선택)  <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <p><button type="button" class="btn btn-sm btn-primary ml-5" id="choAdd">강좌검색</button></p>
                        <div id="choGroup">
                            @foreach($data_product as $row)
                                @if($row['BeforeLectureGroup'] === 'C')
                                    <span id="choList{{$row['ProdCode']}}">
                                        <input name="ProdCode[]" type="hidden" value="{{$row['ProdCode']}}">
                                        <input name="BeforeLectureGroup[]" type="hidden" value="C"> [{{$row['ProdTypeCcd_Name']}}]{{$row['ProdName']}}
                                        <a onclick="rowDelete('choList{{$row['ProdCode']}}')" href="javascript:;">
                                            <i class="fa fa-times red"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group" >
                    <label class="control-label col-md-2" >선수강좌할인(필수)
                    </label>
                    <div class="col-md-6 form-inline item">
                        <p><button type="button" class="btn btn-sm btn-primary ml-5"  onclick="trAdd('ess')">필드추가</button></p>
                        <table class="table table-striped table-bordered" id="essTable" width="100%">
                            <tr>
                                <th>조건</th>
                                <th>할인금액</th>
                                <th>삭제</th>
                            </tr>

                            @if(empty($data_sale_ess) === true)
                            <tr id="essTrId1">
                                <input type="hidden" name="SaleBeforeLectureGroup[]" value="E">
                                <td>필수 조건 강좌 중 <input type="number" name="DiscNum[]" id="DiscNum1" class="form-control" value="" style="width: 50px;">개 수강시</td>
                                <td><input type="number" name="DiscRate[]" id="DiscRate1" class="form-control" value="" style="width: 50px;">
                                    <select name="DiscType[]" id="DiscType1" class="form-control">
                                        <option value="R"  selected="selected">%</option>
                                        <!--option value="P" selected="selected">-</option//-->
                                    </select>&nbsp;
                                </td>
                                <td></td>
                            </tr>
                            @else

                                @foreach($data_sale_ess as $row)
                                <tr id="essTrId{{$loop->index}}">
                                    <input type="hidden" name="SaleBeforeLectureGroup[]" value="E">
                                    <td>필수 조건 강좌 중 <input type="number" name="DiscNum[]" id="DiscNum{{$loop->index}}" class="form-control" value="{{$row['DiscNum']}}" style="width: 50px;">개 수강시</td>
                                    <td><input type="number" name="DiscRate[]" id="DiscRate{{$loop->index}}" class="form-control" value="{{$row['DiscRate']}}" style="width: 50px;">
                                        <select name="DiscType[]" id="DiscType{{$loop->index}}" class="form-control">
                                            <option value="R"   @if($row['DiscType'] === 'R')selected="selected"@endif>%</option>
                                            <!--option value="P" selected="selected">-</option//-->
                                        </select>&nbsp;
                                    </td>
                                    <td>@if($loop->index !== 1)<a onclick="rowDelete('essTrId{{$loop->index}}')" href="javascript:;"><i class="fa fa-times red"></i></a>@endif</td>
                                </tr>
                                @endforeach

                            @endif

                        </table>
                    </div>
                </div>
                <div class="form-group" >
                    <label class="control-label col-md-2" >선수강좌할인(선택)
                    </label>
                    <div class="col-md-6 form-inline item">
                        <p><button type="button" class="btn btn-sm btn-primary ml-5" onclick="trAdd('cho')">필드추가</button></p>
                        <table class="table table-striped table-bordered" id="choTable">
                            <tr>
                                <th>조건</th>
                                <th>할인금액</th>
                                <th>삭제</th>
                            </tr>

                            @if(empty($data_sale_cho) === true)

                            <tr id="choTrId1">
                                <input type="hidden" name="SaleBeforeLectureGroup[]" value="C">
                                <td>선택 조건 강좌 중 <input type="number" name="DiscNum[]" id="DiscNum1" class="form-control" value="" style="width: 50px;">개 수강시</td>
                                <td><input type="number" name="DiscRate[]" id="DiscRate1" class="form-control" value="" style="width: 50px;">
                                    <select name="DiscType[]" id="DiscType1" class="form-control">
                                        <option value="R" selected="selected">%</option>
                                    <!--option value="P" selected="selected">-</option//-->
                                    </select>&nbsp;
                                </td>
                                <td></td>
                            </tr>

                            @else

                                @foreach($data_sale_cho as $row)
                                <tr id="choTrId{{$loop->index}}">
                                    <input type="hidden" name="SaleBeforeLectureGroup[]" value="C">
                                    <td>선택 조건 강좌 중 <input type="number" name="DiscNum[]" id="DiscNum{{$loop->index}}" class="form-control" value="{{$row['DiscNum']}}" style="width: 50px;">개 수강시</td>
                                    <td><input type="number" name="DiscRate[]" id="DiscRate{{$loop->index}}" class="form-control" value="{{$row['DiscRate']}}" style="width: 50px;">
                                        <select name="DiscType[]" id="DiscType{{$loop->index}}" class="form-control">
                                            <option value="R"   @if($row['DiscType'] === 'R')selected="selected"@endif>%</option>
                                            <!--option value="P" selected="selected">-</option//-->
                                        </select>&nbsp;
                                    </td>
                                    <td>@if($loop->index !== 1)<a onclick="rowDelete('choTrId{{$loop->index}}')" href="javascript:;"><i class="fa fa-times red"></i></a>@endif</td>
                                </tr>
                                @endforeach

                            @endif

                        </table>
                    </div>
                </div>

        </div>

                <div class="form-group" id="view_option2" style="display:none;">
                    <label class="control-label col-md-2">중복허용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="IsDup" class="flat" value="N" required="required" title="중복허용여부" @if($method == 'POST' || $data['IsDup'] == 'N')checked="checked"@endif/> 중복불가
                            &nbsp;&nbsp;
                            <input type="radio" name="IsDup" class="flat" value="Y" required="required" title="중복허용여부" @if($data['IsDup'] == 'Y')checked="checked"@endif/> 중복허용

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="IsUse">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline item" >
                        <div class="radio">
                            <input type="radio" name="IsUse" class="flat" value="Y" required="required" title="사용여부" @if($data['IsUse']=='Y')checked="checked"@endif/> 사용
                            &nbsp; <input type="radio" name="IsUse" class="flat" value="N" @if($method == 'POST' || $data['IsUse']=='N')checked="checked"@endif/> 미사용
                        </div>
                    </div>
                </div>

                @if($method === 'PUT')
                    <div class="form-group">
                        <label class="control-label col-md-2">등록자
                        </label>
                        <div class="col-md-3">
                            <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                        </div>
                        <label class="control-label col-md-2">등록일
                        </label>
                        <div class="col-md-4">
                            <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">최종 수정자
                        </label>
                        <div class="col-md-3">
                            <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                        </div>
                        <label class="control-label col-md-2">최종 수정일
                        </label>
                        <div class="col-md-4">
                            <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                        </div>
                    </div>
                @endif

                <div class="ln_solid"></div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>


        </div>
    </div>
    <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
    <script src="/public/vendor/cheditor/cheditor.js"></script>
    <script src="/public/js/editor_util.js"></script>

    <script type="text/javascript">

        var $regi_form = $('#regi_form');

        $(document).ready(function() {

            var prev_val;
            $('#site_code').focus(function () {
                prev_val = $(this).val();
            }).change(function () {
                //alert(prev_val)
                if (prev_val == "") {
                    $('#site_code').blur();
                    return;
                }
                $(this).blur();
                if (confirm("사이트 변경으로 인해 입력된 값이 초기화 됩니다. 변경하시겠습니까?")) {

                    /*
                    $("#selected_category").html("");
                    $("#teacherDivision tbody").remove();
                    $("#lecList tbody").remove();
                    sitecode_chained($(this).val());    //과정.과목 재조정
                    */
                    location.reload();
                } else {
                    $(this).val(prev_val);
                    return false;
                }
            });

            //강좌검색
            $('#tarAdd,#essAdd,#choAdd').on('click', function(e) {
                var id = e.target.getAttribute('id');
                if($("#site_code").val() == "") {alert("운영사이트를 선택해 주세요.");$("#site_code").focus();return;}
                $('#'+id).setLayer({
                    'url' : '{{ site_url('common/searchLectureBlend/')}}'+'?site_code='+$("#site_code").val()+'&LearnPatternCcd=615001&locationid='+id.replace('Add','')
                    ,'width' : 1300
                })
            });

            // ajax submit
            $regi_form.submit(function() {

                var _url = '{{ site_url('/product/etc/beforeLecture/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/product/etc/beforeLecture/') }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {

                if($regi_form.find("#tarGroup span").length == 0) {
                    alert('대상강좌를 선택하여 주십시오.');$('#tarAdd').focus();return;
                }
                if($regi_form.find("#essGroup span").length == 0) {
                    alert('조건강좌(필수)를 선택하여 주십시오.');$('#essAdd').focus();return;
                }

                return true;
            }


            $('#btn_list').click(function() {
                location.replace('{{ site_url('/product/etc/beforeLecture/') }}' + getQueryString());
            });


            //강좌유형
            $regi_form.on('ifChecked', 'input[name="LecType"]', function () {
                lectypechange($(this).val());
            });

            function lectypechange(strval) {
                if (strval == 'N') { //일반
                    $('#view_option1').show();
                    $('#view_option2').hide();
                } else {
                    $('#view_option1').hide();
                    $('#view_option2').show();
                }
            }
            @if($data['LecType'])
            lectypechange('{{$data['LecType']}}');
            @endif




        });

        function rowDelete(strRow) {
            $('#'+strRow).remove();
        }

        function trAdd(strId) {

            var nowRowCnt = ($('#regi_form').find("#"+strId+"Table tr")).length - 1;
            var seq = nowRowCnt+1;

            if(strId == 'ess') {
                strId_title = '필수';
                strId_val = 'E';
            } else if(strId == 'cho') {
                strId_title = '선택';
                strId_val = 'C';
            }

            $(document).find("#"+strId+"Table").append(
                "<tr id='"+strId+"TrId"+seq+"'>"
                +"     <input type='hidden' name='SaleBeforeLectureGroup[]' value='"+strId_val+"'>"
                +"      <td>"+strId_title+" 조건 강좌 중 <input type='number' name='DiscNum[]' id='DiscNum"+seq+"' class='form-control' value='' style='width: 50px;'>개 수강시</td>"
                +"      <td><input type='number' name='DiscRate[]' id='DiscRate"+seq+"' class='form-control' value='' style='width: 50px;'>"
                +"          <select name='DiscType[]' id='DiscType"+seq+"' class='form-control'>"
                +"              <option value='R'>%</option>"
                //+"              <option value='P'>-</option>"
                +"          </select>"
                +"      </td>"
                +"      <td><a href='javascript:;' onclick=\"rowDelete(\'"+strId+"TrId"+seq+"')\"><i class=\"fa fa-times red\"></i></a></td>"
                +"</tr>"

            );

        }

    </script>

@stop
