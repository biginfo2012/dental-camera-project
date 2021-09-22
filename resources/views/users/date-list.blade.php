<x-user-layout>
    <x-slot name="">
    </x-slot>
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="">
        <div class="container pt-20 pb-10">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title">촬영 날짜별 보기</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container pt-0">
            <form id="search_form" class="" style="margin-top: -30px">
                @csrf
                <div class="row mt-40">
                    <div class="col-md-6">
                        <h4>날짜범위선택</h4>
                        <!-- Datepicker Daterange Markup -->
{{--                        <div class="form-group mb-10">--}}
{{--                            <input class="form-control required date-picker" type="text" placeholder="" aria-required="true">--}}
{{--                        </div>--}}
{{--                        <div class="form-group mb-10">--}}
{{--                            <input class="form-control required date-picker" type="text" placeholder="" aria-required="true">--}}
{{--                        </div>--}}
                        <div id="example-daterange">
                            <div class="input-daterange input-group" id="datepicker">
                                <input class="form-control date-picker" name="start" type="text" placeholder="">
                                <span class="input-group-addon">~</span>
                                <input class="form-control date-picker" name="end" type="text" placeholder="">
                            </div>
                            <!-- Datepicker Daterange Script -->
                            <script>
                                $('.date-picker').datepicker({});
                            </script>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <h4>분류선택</h4>
                        <div class="form-group">
                            <select class="form-control" name="symptom_type">
                                <option value="">전체</option>
                                <option value="1">구강질환</option>
                                <option value="2">심미개선</option>
                                <option value="3">골격/배열</option>
                                <option value="4">재치료/재성형</option>
                                <option value="5">어린이 구강</option>
                                <option value="6">기타</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h4>메모</h4>
                        <div class="form-group">
                            <input type="text" class="form-control" name="memo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-8 col-md-4 text-right">
                        <button class="btn btn-success ml-auto" id="search_btn">검색</button>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <h4 class="title">날짜별 항목일람</h4>
                    <div data-example-id="bordered-table" class="bs-example" id="date-table">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="margin-top: 35vh">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">삭제</h4>
                </div>
                <div class="modal-body">
                    데이터를 삭제하시겠습니까?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                    <button type="button" id="del_btn" class="btn btn-danger btn-flat">확인</button>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        .pa{
            text-align: center;
            margin-top: -20px;
        }
        .bottom{
            position: absolute;
            top: 45px;
            right: 15px;
        }

    </style>
    <script type="text/javascript">
        let HOST_URL = '<?= url('')?>';
        let table, id;
        $(document).ready(function () {
            let token = $('[name=_token]').val();
            console.log(token)
            $.ajax({
                url: HOST_URL + "/date-table",
                type: 'post',
                data: {'_token' : token},
                dataType: 'json',
                complete: function(r){
                    $('#date-table').html(r.responseText);
                    table = $('#dateTable').dataTable({
                        "dom": '<"top"i>rt<"bottom"fl><"pa"p><"clear">',
                        "searching": false,
                        "columnDefs": [
                            { "width": "5%" },
                            { "width": "20%" },
                            { "width": "25%" },
                            { "width": "25%" },
                            { "width": "25%" },
                        ],
                        "language": {
                            "decimal":        "",
                            "emptyTable":     "현시가능한 자료가 없습니다.",
                            "info":           "_TOTAL_개의 자료중에_START_~_END_가 현시됩니다.",
                            "infoEmpty":      "0~0의0을 표시",
                            "infoFiltered":   "(filtered from _MAX_ total entries)",
                            "infoPostFix":    "",
                            "thousands":      ",",
                            "lengthMenu":     " _MENU_ ",
                            "loadingRecords": "로드중...",
                            "processing":     "처리중...",
                            "search":         "검색:",
                            "zeroRecords":    "일치하는 검색자료가 없습니다.",
                            "paginate": {
                                "first":      "처음에",
                                "last":       "마지막",
                                "next":       "다음",
                                "previous":   "이전"
                            },
                            "aria": {
                                "sortAscending":  ": ",
                                "sortDescending": ": "
                            }
                        }
                    });
                },
                success: function(response){

                },
            });
            $('#del_btn').click(function () {
                $('#delModal').modal('hide');
                $.ajax({
                    url: HOST_URL + "/record-delete/" + id,
                    type: 'post',
                    data: {'_token' : token},
                    dataType: 'json',
                    success: function(response){
                        if(response.status === true){
                            toastr.success("삭제성공");
                            window.location.reload()
                        }else{
                            toastr.error("실패")
                        }
                    },
                });
            })
            $(document).on('click', '.member_delete', function () {
                event.preventDefault();
                id = $(this).data('id');
                $('#delModal').modal('show');
            })
        })

        $('#search_btn').click(function(){
            event.preventDefault();
            if($('#search_form').valid()){
                var paramObj = new FormData($("#search_form")[0]);
                //$('#date-table').empty();
                $.ajax({
                    url: HOST_URL + "/date-table",
                    type: 'post',
                    data: paramObj,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        $('#date-table').html(response);
                        $('#dateTable').dataTable({
                            "dom": '<"top"i>rt<"bottom"fl><"pa"p><"clear">',
                            "searching": false,
                            "columnDefs": [
                                { "width": "5%" },
                                { "width": "20%" },
                                { "width": "25%" },
                                { "width": "25%" },
                                { "width": "25%" },
                            ],
                            "language": {
                                "decimal":        "",
                                "emptyTable":     "현시가능한 자료가 없습니다.",
                                "info":           "_TOTAL_개의 자료중에_START_~_END_가 현시됩니다.",
                                "infoEmpty":      "0~0의0을 표시",
                                "infoFiltered":   "(filtered from _MAX_ total entries)",
                                "infoPostFix":    "",
                                "thousands":      ",",
                                "lengthMenu":     " _MENU_ ",
                                "loadingRecords": "로드중...",
                                "processing":     "처리중...",
                                "search":         "검색:",
                                "zeroRecords":    "일치하는 검색자료가 없습니다.",
                                "paginate": {
                                    "first":      "처음에",
                                    "last":       "마지막",
                                    "next":       "다음",
                                    "previous":   "이전"
                                },
                                "aria": {
                                    "sortAscending":  ": ",
                                    "sortDescending": ": "
                                }
                            }
                        });
                        // if(response.status === true){
                        //     console.log(response);
                        //     toastr.success("변경성공");
                        // }else{
                        //     toastr.error("실패")
                        // }
                    },
                });
            }
        })
    </script>
</x-user-layout>
