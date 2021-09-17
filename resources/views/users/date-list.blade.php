<x-user-layout>
    <x-slot name="">
    </x-slot>
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="images/bg/bg6.jpg">
        <div class="container pt-60 pb-60">
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
        <div class="container">
            <form id="search_form">
                @csrf
                <div class="row mt-40">
                    <div class="col-md-6">
                        <h4>날자범위선택</h4>
                        <!-- Datepicker Daterange Markup -->
                        <div id="example-daterange">
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="input-sm form-control" name="start" required/>
                                <span class="input-group-addon">~</span>
                                <input type="text" class="input-sm form-control" name="end" required/>
                            </div>
                            <!-- Datepicker Daterange Script -->
                            <script>
                                $('#example-daterange .input-daterange').datepicker({});
                            </script>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h4>분류선택</h4>
                        <div class="form-group">
                            <select class="form-control" name="symptom_type">
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
                        <button class="member_delete btn btn-success ml-auto" id="search_btn">검색</button>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <h4 class="title">날짜별 항목일람</h4>
                    <div data-example-id="bordered-table" class="bs-example">
                        <table class="table table-bordered" id="dateTable">
                            <thead>
                            <tr>
                                <th width="10%" class="text-center align-middle"></th>
                                <th width="20%" class="text-center align-middle">날자</th>
                                <th width="20%" class="text-center align-middle">분류</th>
                                <th width="25%" class="text-center align-middle">메모</th>
                                <th width="25%" class="text-center align-middle">조작</th>
                            </tr>
                            </thead>
                            <tbody id="date-table">


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        let HOST_URL = '<?= url('')?>';
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
                    $('#dateTable').dataTable({
                        searching: false
                    });
                },
                success: function(response){

                },
            });
            $(document).on('click', '.member_delete', function () {
                let id = $(this).data('id');
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
        })

        $('#search_btn').click(function(){
            event.preventDefault();
            if($('#search_form').valid()){
                var paramObj = new FormData($("#search_form")[0]);

                $.ajax({
                    url: HOST_URL + "/date-table",
                    type: 'post',
                    data: paramObj,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        $('#date-table').html(response);
                        $('#dateTable').dataTable();
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
