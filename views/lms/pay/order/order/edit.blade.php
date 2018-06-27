@extends('lcms.layouts.master')

@section('content')
    <h5>- 온라인결제(PG사), 학원방문결제, 0원결제, 제휴사결제로 진행한 전체 결제현황을 확인할 수 있습니다.</h5>
    <div class="x_panel">
        <div class="x_content">
            {!! form_errors() !!}
            <div class="row">
                <div class="col-md-6">
                    <h4><strong>회원정보</strong></h4>
                </div>
                <div class="col-md-6 text-right">
                    <button class="btn btn-sm btn-primary mr-10 btn-message">쪽지발송</button>
                    <button class="btn btn-sm btn-primary mr-10 btn-sms">SMS발송</button>
                    <button class="btn btn-sm bg-dark mr-0 btn-auto-login">자동로그인</button>
                </div>
                <div class="col-md-12">
                    <table id="list_mem_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>회원번호</th>
                            <th>회원가입일</th>
                            <th>회원명 (성별)</th>
                            <th>아이디</th>
                            <th>휴대폰번호 (수신여부)</th>
                            <th>E-mail주소 (수신여부)</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>00000 (온라인경찰)</td>
                                <td>2018-00-00 00:00:00</td>
                                <td><u>홍길동 (여)</u></td>
                                <td>ABCD</td>
                                <td>010-0000-0000 (Y)</td>
                                <td>ABCD@hanmail.net (Y)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="ln_solid mt-5"></div>
            <div class="row">
                <div class="col-md-6">
                    <h4><strong>주문기본정보</strong></h4>
                </div>
                <div class="col-md-6 text-right">
                </div>
                <div class="col-md-12">
                    <table id="list_order_table" class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                            <th class="bg-odd">주문번호</th>
                            <td class="bg-white-only"><a class="blue">2018000000</a> 온라인경찰 (e)</td>
                            <th class="bg-odd">결제루트</th>
                            <td class="bg-white-only">온라인결제</td>
                            <th class="bg-odd">결제완료일</th>
                            <td class="bg-white-only">2018-00-00 00:00:00</td>
                        </tr>
                        <tr>
                            <th class="bg-odd">실결제금액</th>
                            <td class="bg-white-only">675,000원</td>
                            <th class="bg-odd">포인트사용금액</th>
                            <td class="bg-white-only">2,000p (잔액 10,000p)</td>
                            <th class="bg-odd">결제상태</th>
                            <td class="bg-white-only">결제완료</td>
                        </tr>
                        <tr>
                            <th class="bg-odd">결제수단</th>
                            <td class="bg-white-only" colspan="5">신용카드 (현대카드, 일시불) <button class="btn btn-xs btn-success ml-20 mb-0">매출전표</button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h4><strong>주문상세내역</strong></h4>
                </div>
                <div class="col-md-6 text-right">
                </div>
                <div class="col-md-12">
                    <table id="list_order_detail_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th rowspan="2" class="pb-30">상품구분</th>
                            <th rowspan="2" class="pb-30">상품명</th>
                            <th rowspan="2" class="pb-30">수강(배송)상태</th>
                            <th rowspan="2" class="pb-30">결제금액</th>
                            <th rowspan="2" class="pb-30">결제상태</th>
                            <th rowspan="2" class="pb-30">송장번호</th>
                            <th rowspan="2" class="pb-30">쿠폰적용</th>
                            <th colspan="3" style="border-width: 1px; border-left: 0; border-bottom: 0;">환불정보</th>
                        </tr>
                        <tr>
                            <th>환불금액</th>
                            <th>환불자</th>
                            <th>환불완료일</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>온라인강좌</td>
                            <td><a class="blue">[운영자패키지]</a> 패키지명</td>
                            <td>수강중<br/>2018-00-00</td>
                            <td>500,000</td>
                            <td>환불완료-지결</td>
                            <td>0000000000</td>
                            <td>Y</td>
                            <td><a class="red">-50,000</a></td>
                            <td>관리자명</td>
                            <td>2018-00-00 00:00:00</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="10" class="text-center bg-info">
                                <strong>[총 실결제금액] <span class="blue">670,500</span> (포인트 사용: 2,000) <span class="red pl-20">[총 환불금액] -100,000</span> = [남은금액] 570,500</strong>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="ln_solid mt-5"></div>
            <div class="row">
                <div class="col-md-6">
                    <h4><strong>관리자결제정보</strong></h4>
                </div>
                <div class="col-md-6 text-right">
                </div>
                <div class="col-md-12">
                    <table id="list_admin_pay_table" class="table table-striped table-bordered">
                        <tbody>
                        <tr>
                            <th class="bg-odd">상품구분</th>
                            <td class="bg-white-only">0원결제 | 온라인강좌(회차등록) | <a class="blue">[단강좌]</a> 강좌명</td>
                        </tr>
                        <tr>
                            <th class="bg-odd">제공정보</th>
                            <td class="bg-white-only">[수강시작일] 2018-00-00 &nbsp; [수강제공기간] 2일 &nbsp; [결제금액] 0원 &nbsp; [제휴사] 해당없음</td>
                        </tr>
                        <tr>
                            <th class="bg-odd">회차정보</th>
                            <td class="bg-white-only">
                                <table id="list_lecture_unit_table" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>강의명</th>
                                        <th>촬영일</th>
                                        <th>자료</th>
                                        <th>강의시간</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>2강</td>
                                        <td>강의명</td>
                                        <td>2018-00-00</td>
                                        <td><a href="#none"><i class="fa fa-floppy-o"></i></a></td>
                                        <td>70분</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th class="bg-odd">배송정보</th>
                            <td class="bg-white-only">
                                <p>[이름] 홍길동</p>
                                <p>[주소] 경기도 성남시 중원구 도촌북로 78, 휴먼시아 509동 503호</p>
                                <p>[휴대폰번호] 010-0000-0000</p>
                                <p>[전화번호] 02-0000-0000</p>
                                <p>[배송시 요청사항] 부재시 경비실에 맡겨주세요.</p>
                                <p>[배송료] 2,500원</p>
                                <p>[배송료 입금정보]</p>
                            </td>
                        </tr>
                        <tr>
                            <th class="bg-odd">부여사유</th>
                            <td class="bg-white-only">관리자테스트부여</td>
                        </tr>
                        <tr>
                            <th class="bg-odd">부여자</th>
                            <td class="bg-white-only">관리자명</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="ln_solid mt-5"></div>
            <div class="row">
                <div class="col-md-6">
                    <h4><strong>메모관리</strong></h4>
                </div>
                <div class="col-md-6 text-right">
                </div>
                <div class="col-md-12">
                    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        <input type="hidden" name="idx" value="{{ $idx }}"/>
                        <textarea id="memo" name="memo" class="form-control" rows="3" title="메모" placeholder="메모 내용을 입력해 주십시오."></textarea>
                        <button class="btn btn-sm btn-primary mt-5">메모저장</button>
                    </form>
                </div>
                <div class="col-md-12 mt-20">
                    <table id="list_memo_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>메모내용</th>
                            <th>등록자</th>
                            <th>등록일</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>메모 내용이 출력됩니다.</td>
                            <td>관리자명</td>
                            <td>2018-00-00 00:00:00</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="text-center">
                <button class="btn btn-primary" type="button" id="btn_list">목록</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/pay/order/order/index') }}' + getQueryString());
            });
        });
    </script>
@stop
