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
