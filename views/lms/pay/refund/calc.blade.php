@extends('lcms.layouts.master_modal')

@section('layer_title')
    환불산출금액확인
@stop

@section('layer_header')
    <form class="form-horizontal" id="_refund_check_form" name="_refund_check_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
@endsection

@section('layer_content')
    <div class="row">
        <div class="col-md-12">
            <p class="pl-5"><i class="fa fa-check-square-o"></i> 환불상품정보</p>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered">
                <colgroup>
                    <col width="25%"/>
                    <col width="25%"/>
                    <col width="25%"/>
                    <col width="25%"/>
                </colgroup>
                <tbody>
                    <tr>
                        <td class="bg-odd">강좌명</td>
                        <td colspan="3">온라인 강좌 | <div class="blue inline-block">단강좌</div> 단강좌명</td>
                    </tr>
                    <tr class="bg-odd">
                        <td>수강상태</td>
                        <td>수강한 강의 / 전체 강의</td>
                        <td>수강한 기간 / 전체 수강기간</td>
                        <td>수강료(정상가) / 결제금액</td>
                    </tr>
                    <tr>
                        <td><span class="red">수강중</span></td>
                        <td><span class="red">2강</span> / 40강</td>
                        <td><span class="red">20일</span> / 50일</td>
                        <td>60,000원 / <span class="red">50,000원</span></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center">
                <h4>[환불금액 산출] 50,000원 (결제금액) - (1,500원 * 2강) = <span class="red">47,000원</span></h4>
            </div>
        </div>
        <div class="col-md-12 mt-10">
            <div class="pl-20 pt-20 bdt-line">
                <p>
                    <input type="radio" id="is_approval" name="" class="flat" value=""/>
                    전체 <span class="blue">수강기간</span> 대비 강좌 정상가의 <span class="blue">1일</span> 이용 대금 : 60,000원 / 50일 = <span class="blue">1,200원</span>
                </p>
                <p>
                    <input type="radio" id="is_approval" name="" class="flat" value=""/>
                    전체 <span class="blue">강의수</span> 대비 강좌 정상가의 <span class="blue">1강</span> 이용 대금 : 60,000원 / 40강 = <span class="blue">1,500원</span>
                </p>
            </div>
        </div>
        <div class="col-md-12 mt-10">
            <div class="pl-20 pt-20 bdt-line">
                <p><i class="fa fa-check"></i> 수강한 강의는 해당 회차 클릭 조건으로 카운트 됩니다.</p>
                <p><i class="fa fa-check"></i> 수강한 기간은 수강시작일부터 오늘까지 기준으로 카운트 됩니다.</p>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
    </form>
@endsection