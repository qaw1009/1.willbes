@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 제일 아래쪽에 있는 인원수를 확인해주세요.</h5>
    <div id='iarea' style="border:2px solid black; width:100%; height:500px;">

    </div>
    <div class="x_panel">
        <div class="x_title mb-20">
            <h2 class="red">모의고사랜덤회원정답등록(이 페이지는 테스트를 위한 페이지로 랜덤회원이 랜덤정답을 입력합니다.)</h2>
        </div>
        <div class="x_content">


            <table class="table table-bordered modal-table">
                <tr>
                    <th class="red">랜덤 입력회원수</th>
                    <td colspan="3"><input type="text" id='people' name="people" value="1"/></td>
                </tr>
            </table>
            <div class="form-group text-center">
                <button type="button" class="btn btn-success mr-10" onClick="createIframe()">랜덤데이터저장</button>
                <button class="btn btn-primary" style="position:absolute; right:0;" type="button" id="goList">목록</button>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        var iform = "<iframe src='/mocktest/regGoods/fakeCreate/{{ $prodcode }}?q={{ $q }}&mode=multi' style='width:400px; height:100px;'>";

        function createIframe(){
            var cnt = $('#people').val();
            for(var i=0; i < cnt; i++){
                var tempIarea = $('#iarea').html();
                $('#iarea').html(tempIarea + iform);
            }
        }
    </script>
@stop