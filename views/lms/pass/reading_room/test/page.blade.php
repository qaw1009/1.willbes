@extends('lcms.layouts.master')

@section('content')
    <h5>- 독서실 상품을 등록하고 현황을 확인하여 좌석을 배정하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form_submit" name="search_form_submit" method="POST" onsubmit="return true;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">운영사이트</label>
                    <div class="col-md-3 form-inline">
                        {!! html_site_select($post_data['search_site_code'], 'search_site_code', 'search_site_code', '', '운영 사이트', '', '', false) !!}
                    </div>
                    <label class="control-label col-md-1" for="search_value">캠퍼스</label>
                    <div class="col-md-3 form-inline">
                        <select class="form-control" id="search_campus_ccd" name="search_campus_ccd">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_reading_room">독서실명</label>
                    <div class="col-md-3 form-inline">
                        <select class="form-control" id="search_reading_room" name="search_reading_room">
                            <option value="">독서실명</option>
                            <option value="1">1층A</option>
                        </select>
                    </div>
                    <label class="control-label col-md-1">독서실정보</label>
                    <div class="col-md-4 form-control-static">
                        <span class="blue">[예치금]</span>10,000원<span class="mr-10"></span>
                        <span class="blue">[판매가]</span>10,000원<span class="mr-10"></span>
                        <span class="blue">[강의실]</span>101호
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">사용중/총좌석</label>
                    <div class="col-md-3 form-control-static">
                        50 / 150
                    </div>
                    <label class="control-label col-md-1">잔여석</label>
                    <div class="col-md-3 form-control-static">
                        50 / 150
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-xs-12 text-center">
            <button type="button" class="btn btn-primary btn-search" id="btn_search_submit"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
            <button type="button" class="btn btn-default" id="btn_reset_submit">검색초기화</button>
        </div>
    </div>

    <div class="x_panel">
        <div class="x_content">
            <div class="form-group form-group-sm">
                <div class="col-md-12">
                    • '미사용' 좌석 선택 시 신규배정<br>
                    • '사용중' 좌석 선택 시 다른 독서실/좌석으로 이동 배정 가능 (단, 동일 운영사이트와 캠퍼스내에서만 이동 가능)
                </div>
            </div>

            <!-- New.Ver -->
            <script>
                $(function() {
                    $('.n_mem_seat li').css("width","calc(100% / 7)");
                    $('.n_mem_seat tr td').css("width","calc(100% / 9)");
                });
            </script>
            <div class="form-group form-group-sm">
                <div class="col-md-12 form-inline">
                    <div class="n_mem_seat_info">
                        <ul class="clearfix-r">
                            <li><span class="color-box btn-default">-</span> 미사용</li>
                            <li><span class="color-box btn-info">-</span> 사용중</li>
                            <li><span class="color-box btn-warning">-</span> 대기</li>
                            <li><span class="color-box btn-success">-</span> 홀드</li>
                            <li><span class="color-box btn-danger">-</span> 고장</li>
                        </ul>
                    </div>
                    <ul class="n_mem_seat">
                        <li><button type="button" class="btn btn-info create-seat-modal" data-seat-num="1" data-member-idx="100001">1<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info modify-seat-modal" data-seat-num="2" data-member-idx="100002">2<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info">3<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info">4<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info">5<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info">6<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-default">7<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-warning">8<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-default">9<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-success">10<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-warning">11<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info">12<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info">13<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info">14<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-default">15<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info">16<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-default">17<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-info">18<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-danger">19<br/>회원명</button></li>
                        <li><button type="button" class="btn btn-default">20<br/>회원명</button></li>
                    </ul>
                    <div class="n_mem_seat">
                        <table cellspacing="0" cellpadding="0" id="n_mem_seat_list" class="table" style="font-size: 12px;">
                            <tbody>
                                <tr>
                                    <td><button type="button" class="btn btn-info create-seat-modal" data-seat-num="1" data-member-idx="100001">1<br/>회원명</button></td>
                                    <td><button type="button" class="btn btn-info modify-seat-modal" data-seat-num="2" data-member-idx="100002">2<br/>회원명</button></td>
                                    <td><button type="button" class="btn btn-info">3<br/>회원명</button></td>
                                    <td><button type="button" class="btn btn-info">4<br/>회원명</button></td>
                                    <td><button type="button" class="btn btn-info">5<br/>회원명</button></td>
                                    <td><button type="button" class="btn btn-info">6<br/>회원명</button></td>
                                    <td><button type="button" class="btn btn-default">7<br/>회원명</button></td>
                                    <td><button type="button" class="btn btn-warning">8<br/>회원명</button></td>
                                    <td><button type="button" class="btn btn-default">9<br/>회원명</button></td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-success">10<br/>회원명</button></td>
                                    <td><button type="button" class="btn btn-warning">11<br/>회원명</button></td>
                                    <td><button type="button" class="btn btn-info">12<br/>회원명</button></td>
                                    <td><button type="button" class="btn btn-info">13<br/>회원명</button></td>
                                    <td><button type="button" class="btn btn-info">14<br/>회원명</button></td>
                                    <td><button type="button" class="btn btn-default">15<br/>회원명</button></td>
                                    <td><button type="button" class="btn btn-info">16<br/>회원명</button></td>
                                    <td><button type="button" class="btn btn-default">17<br/>회원명</button></td>
                                    <td><button type="button" class="btn btn-info">18<br/>회원명</button></td>                   
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-danger">19<br/>회원명</button></td>
                                    <td><button type="button" class="btn btn-default">20<br/>회원명</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
             <!-- End New.Ver -->

            <div class="form-group form-group-sm">
                <div class="col-md-12 form-inline">
                    <table cellspacing="0" cellpadding="0" id="mem_seat_list" class="table" style="font-size: 12px;">
                        <colgroup>
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                        </colgroup>
                        <thead>
                        <tr>
                            <th colspan="10">
                                <ul class="clearfix-r">
                                    <li><span class="color-box btn-default">-</span> 미사용</li>
                                    <li><span class="color-box btn-info">-</span> 사용중</li>
                                    <li><span class="color-box btn-warning">-</span> 대기</li>
                                    <li><span class="color-box btn-success">-</span> 홀드</li>
                                    <li><span class="color-box btn-danger">-</span> 고장</li>
                                </ul>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><button type="button" class="btn btn-info create-seat-modal" data-seat-num="1" data-member-idx="100001">1<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info modify-seat-modal" data-seat-num="2" data-member-idx="100002">2<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">3<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">4<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">5<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">6<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">7<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-warning">8<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">9<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-success">10<br/>회원명</button></td>
                        </tr>
                        <tr>
                            <td><button type="button" class="btn btn-warning">11<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">12<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">13<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">14<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">15<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">16<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">17<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-info">18<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-danger">19<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">20<br/>회원명</button></td>
                        </tr>
                        <tr>
                            <td><button type="button" class="btn btn-default">141<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">142<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">143<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">144<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">145<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">146<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">147<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-default">148<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-success">149<br/>회원명</button></td>
                            <td><button type="button" class="btn btn-danger">150<br/>회원명</button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    <script type="text/javascript">
        var $search_form_submit = $('#search_form_submit');
        var $list_table = $('#mem_seat_list');

        var _tempUrlParams;
        (window.onpopstate = function () {
            var match,
                pl     = /\+/g,  // Regex for replacing addition symbol with a space
                search = /([^&=]+)=?([^&]*)/g,
                decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
                query  = window.location.search.substring(1);

            _tempUrlParams = '';
            while (match = search.exec(query))
                _tempUrlParams += decode(match[1]) + '=' + decode(match[2]) + '&';
        })();

        $(document).ready(function() {
            // site-code에 매핑되는 select box 자동 변경
            $search_form_submit.find('select[name="search_campus_ccd"]').chained("#search_site_code");

            // 좌석변경
            $list_table.on('click', '.modify-seat-modal', function() {
                $('.modify-seat-modal').setLayer({
                    "url" : "<?php echo static::e(site_url('/pass/readingRoom/regist/testPopup')); ?>/" + $(this).data('seat-num'),
                    "width" : "1200",
                    "modal_id" : "modal_html"
                });
            });
        });

        $('#btn_search_submit').click(function() {
            $search_form_submit.submit();
        });

        $('#btn_reset_submit').click(function() {
            location.replace('{{ site_url('/pass/readingRoom/regist/assignManageList') }}/' + {{$idx}} + '?' + _tempUrlParams);
        });
    </script>
@stop