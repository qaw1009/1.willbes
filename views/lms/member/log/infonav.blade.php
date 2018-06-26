<div class="x_panel mt-0">
    <div class="x_content">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>회원번호</th>
                <th>아이디</th>
                <th>회원이름</th>
                <th>생년월일</th>
                <th>전화번호</th>
                <td>이메일</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$data['MemIdx']}}</td>
                <td>{{$data['MemId']}}</td>
                <td>{{$data['MemName']}}</td>
                <td>{{$data['BirthDay']}} ({{ $data['Sex'] == 'M' ? '남' : '여' }})</td>
                <td>{{$data['Phone']}}</td>
                <td>{{$data['Mail']}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>