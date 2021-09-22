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
                        <h2 class="title">촬영 부위별 보기</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container pt-0">
            <form id="search_form">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <h4>날짜범위선택</h4>
                        <!-- Datepicker Daterange Markup -->
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
                    <div class="col-md-3">
                        <h4>분류선택</h4>
                        <div class="form-group">
                            <select class="form-control" id="symptom_type" name="symptom_type">
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
                    <div class="col-md-3">
                        <h4>부위선택</h4>
                        <div class="form-group">
                            <select class="form-control" id="part_type" name="part_type">
                                <option value="">전체</option>
                                <option value="1">구강전체</option>
                                <option value="2">치아의 앞면</option>
                                <option value="3">치아의 안쪽</option>
                                <option value="4">어금니 씹는 면</option>
                                <option value="5">기타</option>
                            </select>
                        </div>
                    </div>
                    <div id="pos_id" class="col-md-2" style="display: none">
                        <h4>상세부위선택</h4>
                        <div class="form-group">
                            <select class="form-control type" id="type_2">
                                <option value="">전체</option>
                                <option value="1">윗니 오른쪽</option>
                                <option value="2">윗니 앞니</option>
                                <option value="3">윗니 왼쪽</option>
                                <option value="4">아랫니 오른쪽</option>
                                <option value="5">아랫니 앞니</option>
                                <option value="6">아랫니 왼쪽</option>
                            </select>
                            <select class="form-control type" id="type_3">
                                <option value="">전체</option>
                                <option value="1">윗니 오른쪽</option>
                                <option value="2">윗니 앞니</option>
                                <option value="3">윗니 왼쪽</option>
                                <option value="4">아랫니 오른쪽</option>
                                <option value="5">아랫니 앞니</option>
                                <option value="6">아랫니 왼쪽</option>
                            </select>
                            <select class="form-control type" id="type_4">
                                <option value="">전체</option>
                                <option value="1">윗니 오른쪽</option>
                                <option value="2">윗니 왼쪽</option>
                                <option value="3">아랫니 오른쪽</option>
                                <option value="4">아랫니 왼쪽</option>
                            </select>
                            <select class="form-control type" id="type_5">
                                <option value="">전체</option>
                                <option value="1">혀</option>
                                <option value="2">볼살</option>
                                <option value="3">입천정</option>
                                <option value="4">기타</option>
                            </select>
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
                    <h4 class="title">부위별 항목일람</h4>
                    <div data-example-id="bordered-table" class="bs-example" id="part-table">

                    </div>
                </div>
            </div>
        </div>
    </section>
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
        .nivo-lightbox-image img{
            width: 600px !important;
        }
        .pa{
            text-align: center;
            margin-top: -20px;
        }
        .bottom{
            position: absolute;
            top: 45px;
            right: 15px;
        }
        .nivo-lightbox-theme-default .nivo-lightbox-nav:hover{
            background-color: transparent !important;
        }
    </style>
    <script type="text/javascript">
        let HOST_URL = '<?= url('')?>';
        let id;

        $(document).ready(function () {
            let token = $('[name=_token]').val();
            console.log(token)
            $.ajax({
                url: HOST_URL + "/part-table",
                type: 'post',
                data: {'_token' : token},
                dataType: 'json',
                complete: function(r){
                    $('#part-table').html(r.responseText);
                    $('#partTable').dataTable({
                        "dom": '<"top"i>rt<"bottom"fl><"pa"p><"clear">',
                        "searching": false,
                        "language": {
                            "decimal":        "",
                            "emptyTable":     "현시가능한 자료가 없습니다.",
                            "info":           "_TOTAL_개의 자료중에_START_~_END_가 현시됩니다.",
                            "infoEmpty":      "0~0의0을 표시",
                            "infoFiltered":   "(filtered from _MAX_ total entries)",
                            "infoPostFix":    "",
                            "thousands":      ",",
                            "lengthMenu":     "_MENU_ ",
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
                    $('a[data-lightbox-gallery]').nivoLightbox({
                        effect: 'fadeScale',
                        afterShowLightbox: function () {
                            var $nivo_iframe = $('.nivo-lightbox-content > iframe');
                            if ($nivo_iframe.length > 0) {
                                var src = $nivo_iframe.attr('src');
                                $nivo_iframe.attr('src', src + '?autoplay=1');
                            }
                        }
                    })
                },
                success: function(response){

                },
            });

            $('#del_btn').click(function () {
                $('#delModal').modal('hide');
                $.ajax({
                    url: HOST_URL + "/img-delete/" + id,
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
        $('#part_type').change(function () {
            let val = $(this).val();
            console.log(val)
            if(val !== '1' && val !== ""){
                $('#pos_id').show();
                $('.type').each(function () {
                    $(this).hide();
                })
                let id = '#type_' + val;
                $(id).show();
            }
            else{
                $('#pos_id').hide();
            }
        })
        $('#search_btn').click(function(){
            event.preventDefault();
            if($('#search_form').valid()){
                var paramObj = new FormData($("#search_form")[0]);
                let part_type = $('#part_type').val();
                let id = '#type_' + part_type;
                let pos_id = $(id).val();
                paramObj.append('pos_id',pos_id);
                $.ajax({
                    url: HOST_URL + "/part-table",
                    type: 'post',
                    data: paramObj,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        $('#part-table').html(response);
                        $('#partTable').dataTable({
                            "dom": '<"top"i>rt<"bottom"fl><"pa"p><"clear">',
                            "searching": false,
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
                        $('a[data-lightbox-gallery]').nivoLightbox({
                            effect: 'fadeScale',
                            afterShowLightbox: function () {
                                var $nivo_iframe = $('.nivo-lightbox-content > iframe');
                                if ($nivo_iframe.length > 0) {
                                    var src = $nivo_iframe.attr('src');
                                    $nivo_iframe.attr('src', src + '?autoplay=1');
                                }
                            }
                        })
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
