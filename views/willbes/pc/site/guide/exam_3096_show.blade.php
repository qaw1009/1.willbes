@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="w-Guide">
                <h3 class="NSK-Black">시험일정 및 응시자격</h3>
                <h4 class="NGR mt20">2019년 5급공채/외교관후보자 1차시험(PSAT)접수기간 및 시험일정</h4>
                <div>
                    <table cellspacing="0" cellpadding="0" class="table-Guided">
                        <colgroup>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead>
                            <tr>
                                <th>시험명</th>
                                <th>접수 및 취소기간</th>
                                <th>구분</th>
                                <th>시험장소 공고일</th>
                                <th>시험일</th>
                                <th>합격자 발표일</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="2">PSAT</td>
                                <td>접수기간 : 2.4 ~ 2.6<br>
                                (취소마감일 2.9. 21:00)</td>
                                <td rowspan="2">제1차시험</td>
                                <td rowspan="2">3.1</td>
                                <td rowspan="2">3.9</td>
                                <td rowspan="2">4.8</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt10 tx-blue">
                    ※ 시험장소 공고 등 시험시행과 관련된 사항은 사이버국가고시센터(http://gosi.kr)에만 공고하며, 합격자 명단은 합격자 발표일에 게시합니다.<Br>
                    ※ 시험성적 안내 일정은 사이버국가고시센터(http://gosi.kr)에 게시하며, 시험성적은 본인에 한하여 사이버국가고시센터(http://gosi.kr)에서 확인할 수 있습니다.
                </div>

                <h4 class="NGR mt20">응시원서접수(인터넷접수만 가능)</h4>
                <h5 class="NGR">가. 접수방법 및 시간</h5>
                <ul class="st01">
                    <li>접수방법 : 사이버국가고시센터(www.gosi.kr)에 접속하여 접수할 수 있습니다.</li>
                    <li>접수시간 : 2020.2.4.(화) 09:00 ~ .2.6.(목) 21:00 (기간 중 24시간 접수)</li>
                    <li>기 타 : 응시수수료(10,000원) 외에소정의처리비용(휴대폰?카드결제, 계좌이체비용)이소요됩니다. 
                        <div class="tx-blue">※ 저소득층 해당자( 국민기초생활보장법 에 따른 수급자 또는 한부모가족지원법 에 따른 지원대상자)는 응시수수료가 면제됩니다.<br>
                        ※ 응시원서 접수 시 등록용 사진파일(JPG, PNG)이 필요하며 접수 완료 후 변경이 불가합니다. </div>
                    </li>
                </ul>
                <h5 class="NGR">나. 원서접수 유의사항 </h5>
                <ul class="st01">
                    <li>접수기간에는 기재사항(응시직렬, 응시지역, 선택과목, 지방인재 여부 등)을 수정할 수 있으나, 접수기간이 종료된 후에는 수정할 수 없습니다.</li> 
                    <li>선발예정인원이 10명 이상인 모집단위(5급 공채 지역별 구분모집 분야는 제외)에서 지방인재채용목표제를 적용 받고자 하는 자는 응시원서에 지방인재 여부를 표기·확인하고, 본인의 학력사항을 정확하게 기재해야 합니다.</li>
                    <li>장애인 등 응시자는 본인의 장애유형에 맞는 편의지원을 신청할 수 있으며, 장애유형별 편의제공 기준 및 절차, 구비서류 등은 응시원서 접수 시 사이버국가고시센터(www.gosi.kr)에서 반드시 확인하시기 바랍니다. <br>
                        ※ 2020년부터 장애인 편의지원 관련 점자문제지는 2017년 개정된 ｢한국 점자 규정(문화체육관광부고시 제2017-15호)｣에 따라 제공합니다.</li>
                    <li>응시자는 응시원서에 표기한 응시지역(서울, 부산, 대구, 광주, 대전)에서만 제1차시험에 응시할 수 있으며, 제2‧3차시험은 서울‧경기에서 실시할 예정입니다.(변경 시 추후 별도 공고할 예정)</li>
                    <li>지역별 구분모집 응시자도 2020년부터는 제1차시험 응시지역(시험 볼 장소)이 제한되지 않으며, 응시원서에 표기한 지역에서 제1차시험에 응시할 수 있습니다.</li>
                    <li>원서접수 취소마감일 21:00까지 취소한 자에 한하여 응시수수료를 환불해 드립니다.</li>
                    <li>인사혁신처에서 동일 날짜에 시행하는 5급 공채시험 및 외교관후보자 선발시험에는 복수로 응시원서를 제출할 수 없습니다.</li>                
                </ul>
                <h5 class="NGR">다. 외교관후보자 선발시험(지역외교) 제1차시험 합격자 서류전형 등록</h5>
                <ul class="st01">
                    <li>등록기간 : 2020.3.31.(화) 09:00 ∼ 4.9.(목) 18:00</li> 
                    <li>등록방법 : 사이버국가고시센터(www.gosi.kr)를 통해 증빙서류 사본 등을 온라인으로 등록합니다.(자세한 방법은 제1차시험 합격자 발표 시 공고할 예정임) </li>                
                </ul>           
            </div> 
        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
@stop