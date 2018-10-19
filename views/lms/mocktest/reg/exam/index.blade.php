@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 구성을 위해 과목별 문제, 정답, 해설을 등록하는 메뉴입니다.</h5>
    <form class="form-horizontal searching" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_def_site_tabs($siteCodeDef, 'tabs_site_code', 'tab', false) !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        {!! html_site_select($siteCodeDef, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-5" id="sc_cateD1" name="sc_cateD1">
                            <option value="">카테고리</option>
                            @foreach($cateD1 as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}" @if(isset($_GET['sc_cateD1']) && $_GET['sc_cateD1'] == $row['CateCode']) selected @endif>{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="sc_cateD2" name="sc_cateD2">
                            <option value="">직렬</option>
                            @foreach($cateD2 as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}" @if(isset($_GET['sc_cateD2']) && $_GET['sc_cateD2'] == $row['CateCode']) selected @endif>{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="sc_subject" name="sc_subject">
                            <option value="">과목</option>
                            @foreach($subject as $row)
                                <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}" @if(isset($_GET['sc_subject']) && $_GET['sc_subject'] == $row['SubjectIdx']) selected @endif>{{ $row['SubjectName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="sc_professor" name="sc_professor">
                            <option value="">교수</option>
                            @foreach($professor as $row)
                                <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}" @if(isset($_GET['sc_professor']) && $_GET['sc_professor'] == $row['ProfIdx']) selected @endif>{{ $row['wProfName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="sc_year" name="sc_year">
                            <option value="">연도</option>
                            @for($i=(date('Y')+1); $i>=2005; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <select class="form-control mr-5" id="sc_round" name="sc_round">
                            <option value="">회차</option>
                            @foreach(range(1, 20) as $i)
                                <option value="{{$i}}">{{$i}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="sc_use" name="sc_use">
                            <option value="">사용여부</option>
                            <option value="Y" @if(isset($_GET['sc_use']) && $_GET['sc_use'] == 'Y') selected @endif>사용</option>
                            <option value="N" @if(isset($_GET['sc_use']) && $_GET['sc_use'] == 'N') selected @endif>미사용</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">통합검색</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" style="width:300px;" id="sc_fi" name="sc_fi" value="{{ @$_GET['sc_fi'] }}"> 명칭, 코드 검색 가능
                    </div>
                    <div class="col-md-5 text-right">
                        {{--<button type="submit" class="btn btn-primary" id="btn_search"><i class="fa fa-spin fa-refresh"></i> 검색</button>--}}
                        <button type="button" class="btn btn-default" id="searchInit">초기화</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th rowspan="2" class="text-center">선택</th>
                        <th rowspan="2" class="text-center">NO</th>
                        <th rowspan="2" class="text-center hide">사이트</th>
                        <th rowspan="2" class="text-center hide">카테고리</th>
                        <th rowspan="2" class="text-center hide">직렬</th>
                        <th rowspan="2" class="text-center">카테고리</th>
                        <th rowspan="2" class="text-center">과목</th>
                        <th rowspan="2" class="text-center">교수</th>
                        <th rowspan="2" class="text-center">연도</th>
                        <th rowspan="2" class="text-center">회차</th>
                        <th rowspan="2" class="text-center">과목별문제지명</th>
                        <th rowspan="2" class="text-center">지문수</th>
                        <th rowspan="2" class="text-center">문항수</th>
                        <th rowspan="2" class="text-center">문제등록옵션</th>
                        <th colspan="2" class="text-center">응시현황</th>
                        <th rowspan="2" class="text-center">사용여부</th>
                        <th rowspan="2" class="text-center">문제보기</th>
                        <th rowspan="2" class="text-center">등록자</th>
                        <th rowspan="2" class="text-center">등록일</th>
                    </tr>
                    <tr>
                        <th class="text-center">ON</th>
                        <th class="text-center">OFF</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td class="text-center"><input type="radio" class="flat" name="target" value="{{ $row['MaIdx'] }}"></td>
                            <td class="text-center"></td>
                            <td class="text-center hide">{{ $row['SiteCode'] }}</td>
                            <td class="text-center hide">@if($moData_cate1){{ implode(' ', $moData_cate1) }}@endif</td>
                            <td class="text-center hide">@if($moData_cate2){{ implode(' ', $moData_cate2) }}@endif</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td><span class="underline-link act-edit">[]</span></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>

                            <td class="text-center"></td>
                            <td class="text-center"></td>

                            <td class="text-center" data-search="{{ $row['IsUse'] }}">
                                @if($row['IsUse'] == 'Y') <span>사용</span> @elseif($row['IsUse'] == 'N') <span class="red">미사용</span> @endif
                            </td>
                            <th class="text-center"><span class="underline-link">미리보기</span></th>
                            <td class="text-center">{{ $row['wAdminName'] }}</td>
                            <td class="text-center">{{ $row['RegDatm'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_form = $('#list_form');
        var $list_table = $('#list_table');

        $(document).ready(function() {
            // 수정으로 이동
            $('.act-edit').on('click', function () {
                var query = '?' + $search_form.serialize();
                location.href = '{{ site_url('/mocktest/regExam/edit/') }}' + $(this).closest('tr').find('[name=target]').val() + query;
            });

            // 복사
            function copyAreaData() {
                if( !$list_form.find('[name="target"]:checked').val() ) { alert('복사할 문제영역을 선택해 주세요.'); return false; }
                if (!confirm("복사하시겠습니까?")) return false;

                var _url = '{{ site_url('/mocktest/baseRange/copyData') }}';
                var data = {
                    '{{ csrf_token_name() }}' : $list_form.find('[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'POST',
                    'idx': $list_form.find('[name="target"]:checked').val()
                };
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/mocktest/baseRange') }}' + '?' + $search_form.serialize());
                    }
                }, showValidateError, false, 'POST');
            }


            // 검색 Select 메뉴
            $search_form.find('#sc_cateD1').chained('#search_site_code');
            $search_form.find('#sc_cateD2').chained('#sc_cateD1');
            $search_form.find('#sc_subject').chained('#search_site_code');
            $search_form.find('#sc_professor').chained('#search_site_code');

            // 검색 초기화
            $('#searchInit').on('click', function () {
                $search_form.find('[name^=sc_]:not(#search_site_code)').each(function () {
                    $(this).val('');
                });
                $search_form.find('#sc_cateD1').trigger('change');
                $datatable.draw();
            });

            // DataTables
            $datatable = $list_table.DataTable({
                ajax: false,
                paging: false,
                searching: true,
                info: true,
                language: {
                    "info": "[ 총 _END_ / _MAX_건 ]",
                },
                dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>t",
                buttons: [
                    { text: '<i class="fa fa-copy mr-5"></i> 복사', className: 'btn btn-sm btn-primary mr-15 act-copy', action: copyAreaData },
                    { text: '<i class="fa fa-pencil mr-5"></i> 문제등록', className: 'btn btn-sm btn-success', action: function(e, dt, node, config) {
                        location.href = '{{ site_url('/mocktest/regExam/create') }}' + '?' + $search_form.serialize();
                    }}
                ]
            });
            datatableSearching();
        });

        // DataTable Search
        function datatableSearching() {
            // $datatable
            //     .search($search_form.find('#sc_fi').val())
            //     .column(2).search($search_form.find('#search_site_code').val())
            //     .column(3).search($search_form.find('#sc_cateD1').val())
            //     .column(4).search($search_form.find('#sc_cateD2').val())
            //     .column(6).search($search_form.find('#sc_subject').val())
            //     .column(7).search($search_form.find('#sc_subject').val())
            //     .column(10).search($search_form.find('#sc_use').val())
            //     .draw();
            //
            // // NO필드 처리
            // var len = $list_table.find('tbody > tr').length;
            // $list_table.find('tbody > tr').each(function () {
            //     $(this).find('td:eq(1)').text(len--);
            // });
        }
    </script>
@stop
