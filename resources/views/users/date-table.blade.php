<table class="table table-bordered" id="dateTable">
    <thead>
    <tr>
        <th width="10%" class="text-center align-middle"></th>
        <th width="20%" class="text-center align-middle">날짜</th>
        <th width="20%" class="text-center align-middle">분류</th>
        <th width="25%" class="text-center align-middle">메모</th>
        <th width="25%" class="text-center align-middle">조작</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $index => $item)
        <tr>
            <th scope="row" class="text-center align-middle" style="vertical-align: middle">{{$index + 1}}</th>
            <td class="text-center align-middle" style="vertical-align: middle">{{date('Y-m-d', strtotime($item['created_at']))}}</td>
            <td class="text-center align-middle" style="vertical-align: middle">{{convertSymptomType($item['symptom_type'])}}</td>
            <td class="text-center align-middle" style="vertical-align: middle">{{$item['comment']['title']}}</td>
            <td class="text-center align-middle" style="vertical-align: middle">
                <a class="btn btn-primary ml-auto" href="{{route('date-detail', $item['id'])}}">상세보기</a>
                <button class="member_delete btn btn-danger ml-auto" data-id="{{$item['id']}}">삭제</button>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>

