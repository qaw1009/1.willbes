<h5>- </h5>
<form class="form-horizontal" id="search_form_cert" name="search_form_cert" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    <input type="hidden" name="search_member_idx" value="{{$memIdx}}" />
    <div class="x_panel">
        <div class="x_content">
            <div class="form-group">
                <label class="control-label col-md-1" for="search_type">인증검색</label>
                <div class="col-md-11 form-inline">
                    <select class="form-control" id="search_category" name="search_category">
                        <option value="">카테고리</option>
                        @foreach($arr_category as $row)
                            <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                        @endforeach
                    </select>

                    <select class="form-control" id="search_type" name="search_type">
                        <option value="">인증구분</option>
                        @foreach($CertType_ccd as $key=>$val)
                            <option value="{{ $key }}" @if($key == $arr_search['search_type']) selected @endif>{{ $val }}</option>
                        @endforeach
                    </select>

                    <select class="form-control" id="search_condition" name="search_condition">
                        <option value="">인증조건</option>
                        @foreach($CertCondition_ccd as $key=>$val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>

                    <input type="text" class="form-control" id="search_cert" name="search_cert" style="width:150px;"> 인증코드, 회차명 검색 가능
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-1" for="search_is_use">조건검색</label>
                <div class="col-md-11 form-inline">

                    <select class="form-control" id="search_no" name="search_no">
                        <option value="">회차</option>
                        @for($i=1;$i<=10;$i++)
                            <option value="{{$i}}" @if($i == $arr_search['search_no']) selected @endif>{{$i}}</option>
                        @endfor
                    </select>

                    <select class="form-control" id="search_approval" name="search_approval">
                        <option value="">승인여부</option>
                        <option value="A">미승인</option>
                        <option value="Y">승인</option>
                        <option value="N">취소</option>
                    </select>

                    <select class="form-control" id="search_order" name="search_order">
                        <option value="">구매여부</option>
                        <option value="Y">Y</option>
                        <option value="N">N</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 text-center">
            <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
        </div>
    </div>
</form>

<div class="x_panel mt-10">
    <p>※ '승인'시, 인증전용 무한패스 구매 권한이 회원에게 부여됩니다.('취소' 시 인증전용 무한패스 구매 불가)</p>
    <div class="x_content">
        <table id="list_table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>선택</th>
                <th>NO</th>
                <th>운영사이트</th>
                <th>카테고리</th>
                <th>인증코드</th>
                <th>인증구분</th>
                <th>회차 - 회차명</th>
                <th>응시직렬</th>
                <th>회원명</th>
                <th>상세<br>정보</th>
                <th>첨부</th>
                <th>등록일</th>
                <th>승인자</th>
                <th>승인일</th>
                <th>승인취소자</th>
                <th>승인취소일</th>
                <th>승인<br>여부</th>
                <th>구매여부</th>

                <th>기간연장<Br>(연장일)</th>
                <th>추가정보</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    var $datatable;
    var $search_form = $('#search_form_cert');
    var $list_table = $('#list_table');

    $(document).ready(function() {
        // $search_form.find('select[name="search_category"]').chained("#search_site_code");

        // 페이징 번호에 맞게 일부 데이터 조회
        $datatable = $list_table.DataTable({
            serverSide: true,
            ajax: {
                'url' : '{{ site_url('/site/cert/apply/listAjax') }}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            columns: [
                {'data' : null, 'render' : function(data,type,row,meta) {
                        return '<input type="checkbox" id="checkIdx'+data.CaIdx+ '" name="checkIdx[]" class="flat target-crm-member" value="'+data.CaIdx+'" data-mem-idx="'+data.MemIdx+'" data-approval="' + (data.ApprovalStatus ) + '"/>';
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                {'data' : 'SiteName'},
                {'data' : 'CateName'},
                {'data' : 'CertIdx'},
                {'data' : 'CertTypeCcd_Name'},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return data.No +' - '+ data.CertTitle;
                    }},
                {'data' : null,  'render' : function(data,type,row,meta) {
                        return data.TakeKind_Name !=null ? data.TakeKind_Name:data.TakeKind;
                    },'name' : 'TakeKind'},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return ''+data.MemName+'('+data.MemId+')</u></a><BR>'+data.Phone+'('+data.SmsRcvStatus+')';
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<a href="javascript:;" class="btn-info btn-sm btn-primary border-radius-reset" data-idx="'+ data.CaIdx+ '">확인</a>';
                    }},
                {'data' : null, 'render' : function(data,type,row,meta) {
                        return $return =  data.AttachFileName != null ? '<a class="btn-attachFile glyphicon glyphicon-file" href="{{site_url('/site/cert/apply/download/')}}?filename=' + encodeURIComponent(data.AttachFilePath + data.AttachFileName) + '&filename_ori=' + encodeURIComponent(data.AttachFileReal) + '" target="_blank"></a>' : '';
                    }},
                {'data' : 'RegDatm'},
                {'data' : 'ApprovalAdmin_Name'},
                {'data' : 'ApprovalDatm'},
                {'data' : 'CancelAdmin_Name'},
                {'data' : 'CancelDatm'},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        if(data.ApprovalStatus == 'A') {
                            return '미승인';
                        } else if(data.ApprovalStatus == 'Y') {
                            return '승인';
                        } else if(data.ApprovalStatus == 'N') {
                            return '<span class="red">취소</span>';
                        }
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return (data.orderCount != "0") ? 'Y' : '<span class="red">N</span>';
                    }},

                {'data' : null, 'render' : function(data, type, row, meta) {
                        return data.ExtendStatus;//data.ExtendStatus+ (data.ExtendStatus=='Y' ? '<Br>'+data.ExtendDatm : '');
                    },'name' : 'Extend'},

                {'data' : null, 'render' : function(data, type, row, meta) {
                        str = '';
                        if(data.AddContent1 != null && data.AddContent1 != '') {
                            str = data.AddContent1;
                            if(data.AddContent2 != null && data.AddContent2 != '') {
                                str  += '<BR>' + data.AddContent2;
                            }
                        }
                        return str;
                    },'name' : 'AddContent'},

            ]
        });


        //상세정보
        $list_table.on('click', '.btn-info', function() {
            $('.btn-info').setLayer({
                'url' : '{{ site_url('/site/cert/apply/info/') }}' + $(this).data('idx'),
                'width' : 750
            });
        });

        init_datatable();
    });
</script>

