@extends('lcms.layouts.master')

@section('content')
    <h5>- 온라인 선수금을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value=""/>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">날짜검색</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="">
                        </div>
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
        <div class="x_content">
            <div class="pull-right mb-10">
                <button class="btn btn-sm btn-success border-radius-reset mr-15 btn-excel"><i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드</button>
            </div>
            <div style="overflow-y: auto; width: 100%;">
                <table id="list_ajax_table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>주문사이트</th>
                            <th>회원명(아이디)</th>
                            <th>결제루트</th>
                            <th>결제수단</th>
                            <th>상품구분</th>
                            <th>강의코드</th>
                            <th>강의명</th>
                            <th>교수명</th>
                            <th>과목명</th>
                            <th>결제금액</th>
                            <th>결제일</th>
                            <th>환불금액</th>
                            <th>결제상태</th>
                            <th>전체금액</th>
                            <th>강의시간 (분)</th>
                            <th>안분율</th>
                            <th>안분금액</th>
                            <th>배분율(%)</th>
                            <th>배분금액</th>
                            <th>수강시작일</th>
                            <th>수강종료일</th>
                            <th>수강종료일(+일시정지+무상)</th>
                            <th>총 일시정지일수</th>
                            <th>무상연장일</th>
                            <th>1차중지기간</th>
                            <th>2차중지기간</th>
                            <th>3차중지기간</th>
                            <th>수강상태</th>
                            <th>수강일수</th>
                            <th>잔여수강일수</th>
                            <th>사용일수</th>
                            <th>잔여금액</th>
                            <th style="border-right-width: 1px;">사용금액</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>6</td>
                            <td>경찰[온라인]</td>
                            <td>홍길동(id)</td>
                            <td>온라인</td>
                            <td>신용카드</td>
                            <td>온라인강좌</td>
                            <td>20180000</td>
                            <td>[기간제패키지] 이론&amp;문제풀이 패키지</td>
                            <td>신광은</td>
                            <td>형사소송법</td>
                            <td>650000</td>
                            <td>2018-00-00 00:00</td>
                            <td>0</td>
                            <td>결제완료</td>
                            <td>650000</td>
                            <td>800</td>
                            <td>1</td>
                            <td>650000</td>
                            <td>30</td>
                            <td>195000</td>
                            <td>2018-01-01</td>
                            <td>2018-10-31</td>
                            <td>2018-11-08</td>
                            <td>5</td>
                            <td>3</td>
                            <td>2018-08-20~2018-08-25</td>
                            <td>2018-08-25~2018-08-30</td>
                            <td></td>
                            <td>수강중</td>
                            <td>360</td>
                            <td>50</td>
                            <td>312</td>
                            <td>127134</td>
                            <td>67866</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>경찰[온라인]</td>
                            <td>김민지(id)</td>
                            <td>온라인</td>
                            <td>실시간계좌이체</td>
                            <td>온라인강좌</td>
                            <td>20180000</td>
                            <td>[운영자패키지] 기본이론&amp;문제풀이 패키지</td>
                            <td>장정훈</td>
                            <td>경찰학개론</td>
                            <td>130000</td>
                            <td>2018-00-00 00:00</td>
                            <td>0</td>
                            <td>결제완료</td>
                            <td>130000</td>
                            <td>550</td>
                            <td>1</td>
                            <td>130000</td>
                            <td>30</td>
                            <td>39000</td>
                            <td>2018-08-01</td>
                            <td>2018-10-31</td>
                            <td>2018-11-05</td>
                            <td>5</td>
                            <td>0</td>
                            <td>2018-08-20~2018-08-25</td>
                            <td></td>
                            <td></td>
                            <td>수강중</td>
                            <td>50</td>
                            <td>33</td>
                            <td>11</td>
                            <td>6721</td>
                            <td>32279</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>경찰[온라인]</td>
                            <td>장승구(id)</td>
                            <td>온라인</td>
                            <td>무통장입금</td>
                            <td>온라인강좌</td>
                            <td>20180000</td>
                            <td>[단강좌] 신광은 제니스영어 실전문법464 (짝수편) (9-10월)</td>
                            <td>신광은</td>
                            <td>영어</td>
                            <td>50000</td>
                            <td>2018-00-00 00:00</td>
                            <td>10000</td>
                            <td>환불완료2018-00-00</td>
                            <td>50000</td>
                            <td>300</td>
                            <td>1</td>
                            <td>50000</td>
                            <td>30</td>
                            <td>15000</td>
                            <td>2018-08-01</td>
                            <td>2018-10-31</td>
                            <td>2018-11-30</td>
                            <td>20</td>
                            <td>10</td>
                            <td>2018-08-10~2018-08-15</td>
                            <td>2018-08-20~2018-08-25</td>
                            <td>2018-09-01~2018-09-10</td>
                            <td>수강종료</td>
                            <td>27</td>
                            <td>3</td>
                            <td>22</td>
                            <td>2475</td>
                            <td>12525</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>경찰[온라인]</td>
                            <td>홍길동(id)</td>
                            <td>온라인</td>
                            <td>신용카드</td>
                            <td>온라인강좌</td>
                            <td>20180000</td>
                            <td>[기간제패키지] 이론&amp;문제풀이 패키지</td>
                            <td>장정훈</td>
                            <td>형사소송법</td>
                            <td>650000</td>
                            <td>2018-00-00 00:00</td>
                            <td>0</td>
                            <td>결제완료</td>
                            <td>650000</td>
                            <td>800</td>
                            <td>1</td>
                            <td>650000</td>
                            <td>30</td>
                            <td>195000</td>
                            <td>2018-01-01</td>
                            <td>2018-10-31</td>
                            <td>2018-11-08</td>
                            <td>5</td>
                            <td>3</td>
                            <td>2018-08-20~2018-08-25</td>
                            <td>2018-08-25~2018-08-30</td>
                            <td></td>
                            <td>수강중</td>
                            <td>360</td>
                            <td>50</td>
                            <td>312</td>
                            <td>127134</td>
                            <td>67866</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>경찰[온라인]</td>
                            <td>김민지(id)</td>
                            <td>온라인</td>
                            <td>실시간계좌이체</td>
                            <td>온라인강좌</td>
                            <td>20180000</td>
                            <td>[운영자패키지] 기본이론&amp;문제풀이 패키지</td>
                            <td>신광은</td>
                            <td>경찰학개론</td>
                            <td>130000</td>
                            <td>2018-00-00 00:00</td>
                            <td>0</td>
                            <td>결제완료</td>
                            <td>130000</td>
                            <td>550</td>
                            <td>1</td>
                            <td>130000</td>
                            <td>30</td>
                            <td>39000</td>
                            <td>2018-08-01</td>
                            <td>2018-10-31</td>
                            <td>2018-11-05</td>
                            <td>5</td>
                            <td>0</td>
                            <td>2018-08-20~2018-08-25</td>
                            <td></td>
                            <td></td>
                            <td>수강중</td>
                            <td>50</td>
                            <td>33</td>
                            <td>11</td>
                            <td>6721</td>
                            <td>32279</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>경찰[온라인]</td>
                            <td>장승구(id)</td>
                            <td>온라인</td>
                            <td>무통장입금</td>
                            <td>온라인강좌</td>
                            <td>20180000</td>
                            <td>[단강좌] 신광은 제니스영어 실전문법464 (짝수편) (9-10월)</td>
                            <td>장정훈</td>
                            <td>영어</td>
                            <td>50000</td>
                            <td>2018-00-00 00:00</td>
                            <td>10000</td>
                            <td>환불완료2018-00-00</td>
                            <td>50000</td>
                            <td>300</td>
                            <td>1</td>
                            <td>50000</td>
                            <td>30</td>
                            <td>15000</td>
                            <td>2018-08-01</td>
                            <td>2018-10-31</td>
                            <td>2018-11-30</td>
                            <td>20</td>
                            <td>10</td>
                            <td>2018-08-10~2018-08-15</td>
                            <td>2018-08-20~2018-08-25</td>
                            <td>2018-09-01~2018-09-10</td>
                            <td>수강종료</td>
                            <td>27</td>
                            <td>3</td>
                            <td>22</td>
                            <td>2475</td>
                            <td>12525</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
