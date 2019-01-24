@extends('lcms.layouts.master_popup')

@section('popup_title')
@stop

@section('popup_header')
@endsection

@section('popup_content')
    {{-- activex load --}}
    @include('lms.common.print_cert.print_cert_partial')
    <script type="text/javascript">
        function printBar() {
            {{--
                # ctkprint_bar 설명
                ctkprint_bar.prt_text_L[숫자] => 숫자 = 라인번호 (1~25), L = Left, R = Right
			    입력값 구성 => '내용;글씨체;글씨크기;글씨굵기(true/false);정렬(left/right)';
            --}}
            @if($data['ViewType'] == 'C')
                {{-- 경찰 --}}
                ctkprint_bar.prt_text_L4 = '수강증;궁서;18;true;left';
                ctkprint_bar.prt_text_L8 = "시험일 : {{ $data['TakeDate'] }}" + ";굴림;10;true;left";
                ctkprint_bar.prt_text_L10 = "{{$data['ProdName_Print']}}" + ";굴림;16;true;left";
                ctkprint_bar.prt_text_L14 = "{{$data['CateName']}} / {{$data['TakeMockPart_Name']}} / {{$data['TakeArea_Name']}}" + ";굴림;14;true;left";
                ctkprint_bar.prt_text_L18 = "{{$data['MemName']}}" + ";굴림;16;true;left";
                ctkprint_bar.prt_text_L22 = "응시번호 : {{$data['TakeNumber']}}" + ";굴림;12;true;left";
                ctkprint_bar.prt_text_L24 = "({{$data['MemId']}}) ({{$data['PayMethodCcd_Name']}})" + ";굴림;12;true;left";
                ctkprint_bar.prt_text_L28 = "{{ date('Y-m-d') }}" + ";굴림;10;false;left";

            @elseif($data['ViewType'] == 'G')
                {{-- 공무원 --}}
                {{--
                ctkprint_bar.prt_text_L10 라인에 들어가는 글자길이는 21자리 이상이어야 함
                ctkprint_bar.prt_text_L14 라인에 들아가는 글자길이는 10자리 이상이어야 함
                ctkprint_bar.prt_text_L16 . 18 라인에 들아가는 글자길이는 10자리 이상이어야 함
                --}}
                ctkprint_bar.prt_text_L2 = "                     성명 : {{$data['MemName']}};굴림;10;true;left";
                ctkprint_bar.prt_text_L6 = "                                      응시번호 : {{$data['TakeNumber']}};굴림;8;false;left";
                ctkprint_bar.prt_text_L10 = "        {{str_mb_pad($data['ProdName_Print'],21)}} ;굴림;8;false;left";
                ctkprint_bar.prt_text_L14 = "                           [ {{$data['CateName']}} {{$data['TakeMockPart_Name']}} ];굴림;8;false;left";
                ctkprint_bar.prt_text_L16 = "                          - 선택1 : {{str_mb_pad($data['Subject_Sub'][0],11)}} ;굴림;8;false;left";
                ctkprint_bar.prt_text_L18 = "                          - 선택2 : {{str_mb_pad($data['Subject_Sub'][1],11)}};굴림;8;false;left";
                ctkprint_bar.prt_text_L21 = "                          - 시험일({{$data['TakeDate']}});굴림;8;false;left";
                ctkprint_bar.prt_text_L26 = "      {{ date('Y-m-d') }}" + ";굴림;8;false;left";
            @endif
            // 인쇄 관련 부분 시작
            ctkprint_bar.CT_DOC_Prt = 1;	    // 인쇄 요청 코드
            ctkprint_bar.CT_DOC_Prt2 = 1; 	// 미리보기 코드 (일반 프린터 인쇄)
        }
    </script>
@stop

@section('add_buttons')
    <button type="button" name="_btn_print" class="btn btn-success">프린트</button>
@endsection

@section('popup_footer')
@endsection