@extends('lcms.layouts.master_modal')
@section('layer_title')
    {{ "인증 신청 상세정보" }}
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>

        {!! csrf_field() !!}

        @endsection

        @section('layer_content')
            {!! form_errors() !!}

            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" >운영사이트</label>
                <div class="col-md-4">
                    <p class="form-control-static">{{$data['SiteName']}}</p>
                </div>
                <label class="control-label col-md-2" >카테고리</label>
                <div class="col-md-4">
                    <p class="form-control-static">{{$data['CateName']}}</p>
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" >인증구분</label>
                <div class="col-md-4">
                    <p class="form-control-static">{{$data['CertTypeCcd_Name']}}</p>
                </div>
                <label class="control-label col-md-2" >인증회차</label>
                <div class="col-md-4 form-inline item" >
                    <p class="form-control-static">{{$data['No']}}</p>
                </div>
            </div>

            @if($data['CertTypeCcd'] ==='684001' || $data['CertTypeCcd'] ==='684003'){{-- 경찰승진인증, 경찰MOU인증 --}}
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" >소속</label>
                <div class="col-md-4">
                    <p class="form-control-static"><b>{{$data['Affiliation']}}</b></p>
                </div>
                <label class="control-label col-md-2" >직위/직급</label>
                <div class="col-md-4 form-inline item" >
                    <p class="form-control-static"><b>{{$data['Position']}} @if($data['CertTypeCcd'] ==='684003') (재직구분 : {{$data['WorkType']}}) @endif</b></p>
                </div>
            </div>
            @elseif($data['CertTypeCcd'] ==='684002') {{-- 제대군인인증 --}}
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" >군무기관명</label>
                <div class="col-md-4">
                    <p class="form-control-static"><b>{{$data['Affiliation']}}</b></p>
                </div>
                <label class="control-label col-md-2" >군별</label>
                <div class="col-md-4 form-inline item" >
                    <p class="form-control-static"><b>{{$data['WorkType']}}</b></p>
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" >계급</label>
                <div class="col-md-4">
                    <p class="form-control-static"><b>{{$data['Position']}}</b></p>
                </div>
                <label class="control-label col-md-2" >군번</label>
                <div class="col-md-4 form-inline item" >
                    <p class="form-control-static"><b>{{$data['EtcContent']}}</b></p>
                </div>
            </div>
            @elseif($data['CertTypeCcd'] ==='684005') {{-- 수험표인증 --}}
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" >응시직렬</label>
                <div class="col-md-4">
                    <p class="form-control-static"><b>{{ empty($data['TakeKind_Name']) ? $data['TakeKind'] : $data['TakeKind_Name']}}</b></p>
                </div>
                <label class="control-label col-md-2" >응시지역</label>
                <div class="col-md-4 form-inline item" >
                    <p class="form-control-static"><b>{{ empty($data['TakeArea_Name']) ? $data['TakeArea'] : $data['TakeArea_Name']}}</b></p>
                </div>
            </div>
            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2" >응시번호</label>
                <div class="col-md-4">
                    <p class="form-control-static"><b>{{$data['TakeNo']}}</b></p>
                </div>
                <label class="control-label col-md-2" >추가정보</label>
                <div class="col-md-4">
                    <p class="form-control-static"><b>@if(empty($data['AddContent1']) == false){{$data['AddContent1']}} - {{$data['AddContent2']}}@endif</b></p>
                </div>

            </div>
            @endif

            <div class="form-group form-group-sm item">
                <label class="control-label col-md-2">신청자 </label>
                <div class="col-md-4">
                    <p class="form-control-static"><b>{{ $data['MemName'] }} ({{ $data['MemId'] }} )</b></p>
                </div>
                <label class="control-label col-md-2">신청일</label>
                <div class="col-md-4">
                    <p class="form-control-static"><b>{{ $data['RegDatm'] }}</b></p>
                </div>
            </div>


            <script type="text/javascript">

            </script>
        @stop


        @section('layer_footer')
    </form>
@endsection