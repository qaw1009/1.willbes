@extends('lcms.layouts.master')
@section('content')
    <h5>- 현장 라이브강의를 학원사이트에서 실시간으로 송출하기 위한 관리 페이지입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>On-AIR정보</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">운영사이트 <span class="required">*</span>
                    </label>
                    <div class="col-md-10">
                        <div class="form-inline inline-block item">
                            {!! html_site_select($data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', (($method == 'PUT') ? 'disabled' : '')) !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">카테고리정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <button type="button" id="btn_category_search" class="btn btn-sm btn-primary">카테고리검색</button>
                        <span id="selected_category" class="pl-10">
                            <span class="pr-10">9급공무원
                                <a href="#none" data-cate-code="" class="selected-category-delete"><i class="fa fa-times red"></i></a>
                                <input type="hidden" name="" value="">
                            </span>
                            <span class="pr-10">7급공무원
                                <a href="#none" data-cate-code="" class="selected-category-delete"><i class="fa fa-times red"></i></a>
                                <input type="hidden" name="" value="">
                            </span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">개강일/회차/요일 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <span class="blue pr-10">[개강일]</span> <input type="text" name="StudyStartDate" id="StudyStartDate" class="form-control datepicker" title="개강일" value='' style="width:100px;" readonly required="required">
                        &nbsp;&nbsp;<span class="blue pr-10 pl-30">[회차]</span> <input type="text" name="Amount" id="Amount" value="" required="required" class="form-control" title="정원"  style="width:60px;" />회
                        &nbsp;&nbsp;<span class="blue pr-10 pl-30">[요일]</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">일</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">월</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">화</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">수</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">목</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">금</span>
                        <input type="checkbox" name="week[]" class="flat" > <span class="day">토</span>
                        &nbsp;
                        <button type="button" id="lecDate" onclick="setLecDate();" class="btn btn-sm btn-primary">적용</button>
                    </div>
                </div>
                <div class="form-group" >
                    <label class="control-label col-md-1-1" >송출기간 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <div class="cal-wrap" style="height:250px; overflow: auto;">
                            <div id="cal_vw" style="width: 1870px;"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">강의시간 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <div class="form-inline">
                            <div class="radio mr-30">
                                <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" checked="checked"/> <label for="is_use_y" class="input-label">바로시작</label>
                                <input type="radio" id="is_use_n" name="is_use" class="flat" value="N"/> <label for="is_use_n" class="input-label">직접입력</label>
                            </div>
                            <select class="form-control" id="" name="" required="required">
                                <option value="">00</option>
                                <option value="">01</option>
                                <option value="">12</option>
                                <option value="">22</option>
                                <option value="">23</option>
                            </select> :
                            <select class="form-control" id="" name="" required="required">
                                <option value="">00</option>
                                <option value="">01</option>
                                <option value="">02</option>
                                <option value="">58</option>
                                <option value="">59</option>
                            </select>

                            &nbsp; ~ &nbsp;&nbsp;

                            <select class="form-control" id="" name="" required="required">
                                <option value="">00</option>
                                <option value="">01</option>
                                <option value="">12</option>
                                <option value="">22</option>
                                <option value="">23</option>
                            </select> :
                            <select class="form-control" id="" name="" required="required">
                                <option value="">00</option>
                                <option value="">01</option>
                                <option value="">02</option>
                                <option value="">58</option>
                                <option value="">59</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">강좌명 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" id="" name="" class="form-control" title="강좌명" required="required" placeholder="" value="">
                    </div>
                    <label class="control-label col-md-1-1 d-line">강의실 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <div class="form-inline item">
                            <input type="text" id="" name="" class="form-control" required="required" title="" value="" style="width: 250px;">
                            <select class="form-control" id="" name="" required="required">
                                <option value="">강의실선택</option>
                                <option value="">강의실선택1</option>
                                <option value="">강의실선택2</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">탭명칭 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item">
                        <input type="text" id="" name="" class="form-control" title="탭명칭" required="required" placeholder="" value="">
                    </div>
                    <label class="control-label col-md-1-1 d-line">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 ml-12-dot item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" checked="checked"/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N"/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">타이틀 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        <div class="title item">
                            <input type="text" id="" name="" class="form-control" title="타이틀" required="required" placeholder="현재 전국캠퍼스에 신광은 경찰팀의 라이브 강의가 실시간 송출 되고 있습니다." value="" style="width: 80%;">
                            <button type="button" id="btn_member_search" class="btn btn-primary mb-0">추가</button>
                        </div>
                        <div class="title item">
                            <input type="text" id="" name="" class="form-control" title="타이틀" required="required" placeholder="" value="" style="width: 80%;">
                            <button type="button" id="btn_member_search" class="btn btn-primary mb-0">삭제</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">교수한마디 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline item">
                        <select class="form-control" id="" name="" required="required" title="교수명">
                            <option alue="">교수명</option>
                            <option value="500145">신광은 경찰팀 [ 500145 ]</option>
                            <option value="500127">강인엽 [ 500127 ]</option>
                            <option value="500085">경찰 [ 500085 ]</option>
                            <option value="500139">공득인 [ 500139 ]</option>
                        </select>
                        <input type="text" id="" name="" class="form-control" title="교수한마디" required="required" placeholder="" value="" style="width: 80%">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">노출내용(좌) <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <div class="radio">
                            <span class="blue pr-10">[타입]</span>
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" checked="checked"/> <label for="is_use_y" class="input-label">영상</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N"/> <label for="is_use_n" class="input-label">이미지</label>
                        </div>
                        <div class="form-inline">
                            <div class="filetype">
                                <input type="text" class="form-control file-text" disabled="">
                                <button class="btn btn-primary mb-0" type="button">파일 선택</button>
                                <span class="file-select file-btn">
                                    <input type="file" name="attachfile" class="form-control input-file" required="required" title="첨부자료"> 
                                </span>
                            </div>
                            <p class="form-control-static ml-10 mr-10">
                                [ <a href="#none" target="_blank">업로드한 이미지 입니다.</a> ]
                            </p>
                            <div class="checkbox">
                                <input type="checkbox" name="attach_delete" value="Y" class="flat"/> <span class="red">삭제</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">노출내용(우) <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item">
                        <div class="radio">
                        <span class="blue pr-10">[타입]</span>
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" checked="checked"/> <label for="is_use_y" class="input-label">영상</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N"/> <label for="is_use_n" class="input-label">이미지</label>
                        </div>
                        <input type="text" id="" name="" class="form-control" title="영상 LINK를 입력하세요." required="required" placeholder="영상 LINK를 입력하세요." value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">관리자명</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">등록일
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">2018-00-00 00:00</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">관리자명</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">수정일
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">2018-00-00 00:00</p>
                    </div>
                </div>
                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>

            <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
            <script src="/public/vendor/cheditor/cheditor.js"></script>
            <script src="/public/js/editor_util.js"></script>
            <script type="text/javascript">
                var $regi_form = $('#regi_form');
                var total;
                var karr;

                function replace(str,s,d){
                    var i=0;
                    while(i > -1){
                        i = str.indexOf(s);
                        str = str.substr(0,i) + d + str.substr(i+1,str.length);
                    }
                    return str;
                }

                function setLecDate() {
                    if($("#StudyStartDate").val() == "") {alert("개강일을 선택해 주세요.");$("#StudyStartDate").focus();return;}
                    if($('#Amount').val() == '') {alert('회차를 입력해 주세요.'); $('#Amount').focus();return;}

                    var result = "";
                    total = 0;
                    karr = 0;

                    if( $("#Amount").val() != "" ) {
                        t = $('input:checkbox[name="week[]"]:checked').length;
                        if (t < 1) {
                            alert('요일을 선택하세요.');
                        } else {
                            var Months = new Array(12, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11);
                            var syy = $("#StudyStartDate").val().substr(0, 4); //연도추출
                            var smm = $("#StudyStartDate").val().substr(5, 2); // 월추출
                            var yy = parseInt(syy, 10); // 연도2자리
                            var mm = parseInt(smm, 10); // 월2자리
                            var ty = 0;
                            var tm = 0;
                            var i = 0;

                            result += "<table border='0' cellpadding='0' cellspacing='0' style='float: left;'><tr>";
                            while (parseInt($("#Amount").val(), 10) > total ) {
                                ty = yy + parseInt((mm + i - 1) / 12);
                                tm = Months[((mm + i) % 12)];
                                result += "<td style='padding:5px;' valign='top'>";
                                result += Calendar(ty, tm);
                                result += "</td>";
                                i++;
                            }
                            result += "</tr></table>";

                            $("#cal_vw").show();
                            $("#cal_vw").html(result);
                        }
                    }
                }

                function Calendar( Year, Month ) {
                    var days = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
                    var weekDay = new Array("일", "월", "화", "수", "목", "금", "토");

                    firstDay = new Date(Year,Month-1,1).getDay();
                    days[1] = (((Year % 4 == 0) && (Year % 100 != 0)) || (Year % 400 == 0)) ? 29 : 28;

                    var output_string = "";
                    output_string += "<table border='0' cellpadding='0' cellspacing='0' width='176'>";
                    output_string += "<tr><td align='center'><b>";
                    output_string += Year + " / " + Month;
                    output_string += "</b></td></tr>";
                    output_string += "</table>";
                    output_string += "<table border='0' cellpadding='0' cellspacing='1' bgcolor='#999999'>";
                    output_string += "<tr align='center' bgcolor='#dadada' height='25'> ";
                    for (var dayNum= 0; dayNum <= 6; dayNum++) {
                        output_string += "<td width='24'>" + weekDay[dayNum] + "</td>";
                    }
                    output_string += "</tr>";

                    var kMonth = (Month < 10) ? "0"+Month : Month;
                    var nDay = 1;

                    for(var i=0; i<6; i++) {
                        output_string += "<tr align='center'>";
                        for(var j=0; j<7; j++) {
                            tarr = i*7+j;
                            if(firstDay <= tarr && days[Month-1] >= nDay ) {
                                var kDay = (nDay < 10) ? "0"+nDay : nDay;
                                var bg_color = "";
                                var frm_value = "";

                                if (
                                    $('input:checkbox[name="week[]"]:eq('+j+')').prop("checked") &&
                                    parseInt( $("#Amount").val(),10) > total &&
                                    parseInt((Year +""+ kMonth +""+ kDay),10)  >= parseInt(replace($("#StudyStartDate").val(), "-", ""),10)
                                ) {
                                    bg_color ="yellow";
                                    frm_value = Year +""+ kMonth +""+ kDay;
                                    total++;
                                } else {
                                    bg_color ="#ffffff";
                                    frm_value = "";
                                }

                                output_string += "<td id='"+ (Year +""+ kMonth +""+ kDay) +"' style='background-color:"+ bg_color +";cursor:hand;cursor:pointer;' width='24' height='20' ";
                                output_string += " onClick=\"javascript:chkDay('"+ parseInt((Year +""+ kMonth +""+ kDay),10)  +"', "+ karr +");\">";
                                output_string += nDay
                                output_string += "<input type='hidden' name='savDay' value='"+ frm_value +"'>";
                                output_string += "</td>";
                                nDay++;
                                karr++;
                            } else {
                                output_string += "<td bgcolor='#ffffff' width='24' height='20'>"+ "&nbsp;" +"</td>";
                            }
                        }
                    }

                    output_string += "</tr>";
                    output_string += "</table>";

                    return output_string;
                }

                function chkDay(clkDay, arr) {
                    var f = document.regi_form;
                    var ele = document.getElementById(clkDay);
                    if( f.savDay[arr].value.length == 0 ) {
                        ele.style.backgroundColor = "yellow";
                        f.savDay[arr].value = clkDay;

                    } else {
                        ele.style.backgroundColor = "#ffffff";
                        f.savDay[arr].value = "";
                    }

                    var t = 0;
                    for(var i=0; i<f.savDay.length; i++) {
                        if( f.savDay[i].value.length > 0 ) {
                            t++;
                        }
                    }
                    $("#Amount").val(t);
                }
            </script>

        </div>
    </div>
@stop