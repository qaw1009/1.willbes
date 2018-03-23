@extends('lcms.layouts.master_modal')
@section('layer_title')
    정렬변경
@stop
@section('layer_header')
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        @endsection

        @section('layer_content')
            {!! form_errors() !!}
            <h5>- 정렬할 FAQ 구분을 선택해 주세요.</h5>
            <div class="x_panel">
                <div class="x_content">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="">FAQ 구분</label>
                        <div class="col-md-5">
                            <select class="form-control" required="required" id="" name="" title="FAQ구분">
                                @foreach($faqGroupTypeCcd as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="x_panel mt-10">
                <div class="x_content">
                    <table id="list_ajax_table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>구분</th>
                                <th>분류</th>
                                <th>제목</th>
                                <th>정렬</th>
                                <th>사용</th>
                            </tr>
                        </thead>
                        <tbody class="selector" style="cursor:n-resize">
                            @for($i = 1; $i <= 10; $i++)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>

            <script src="/public/vendor/jquery/v.1.12.1/jquery-ui.js"></script>
            <script type="text/javascript">
                var $regi_form = $('#regi_form');

                $(document).ready(function() {
                    (function(){
                        var start_index;
                        $('.selector').sortable({
                            item: $('.selector'),
                            start: function(event, ui) {
                                //console.log('start point : ' + ui.item.position().top);

                                start_index = ui.item.index();

                                console.log(start_index);
                            },
                            end: function(event, ui) {
                                console.log('end point : ' + ui.item.position().top);
                            }
                        });
                    })();

                    /*$('.selector').sortable({
                        item: $('.selector'),
                        start: function(event, ui) {
                            console.log('start point : ' + ui.item.position().top);
                        },
                        end: function(event, ui) {
                            console.log('end point : ' + ui.item.position().top);
                        }
                    });*/

                });
            </script>
        @stop

        @section('add_buttons')
            <button type="submit" class="btn btn-success">Submit</button>
        @endsection

        @section('layer_footer')
    </form>
@endsection