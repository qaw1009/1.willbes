<div class="col-md-6">
    <h4><strong>메모관리</strong></h4>
</div>
<div class="col-md-6 text-right">
</div>
<div class="col-md-12">
    <form class="form-horizontal form-label-left" id="regi_memo_form" name="regi_memo_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="order_idx" value="{{ $idx }}"/>
        <input type="hidden" name="memo_type" value="normal"/>
        <div class="item">
            <textarea id="order_memo" name="order_memo" class="form-control" rows="3" title="메모" required="required" placeholder="메모 내용을 입력해 주십시오."></textarea>
        </div>
        <button class="btn btn-sm btn-primary mt-5">메모저장</button>
    </form>
</div>
<div class="col-md-12">
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
        </tbody>
    </table>
</div>