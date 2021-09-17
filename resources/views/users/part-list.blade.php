<x-user-layout>
    <x-slot name="">
    </x-slot>
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="">
        <div class="container pt-60 pb-60">
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
        <div class="container">
            <form id="search_form">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <h4>날자범위선택</h4>
                        <!-- Datepicker Daterange Markup -->
                        <div id="example-daterange">
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="input-sm form-control" name="start"/>
                                <span class="input-group-addon">~</span>
                                <input type="text" class="input-sm form-control" name="end"/>
                            </div>
                            <!-- Datepicker Daterange Script -->
                            <script>
                                $('#example-daterange .input-daterange').datepicker({});
                            </script>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h4>분류선택</h4>
                        <div class="form-group">
                            <select class="form-control" id="symptom_type" name="symptom_type">
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
                                <option value="1">윗니 오른쪽</option>
                                <option value="2">윗니 앞니</option>
                                <option value="3">윗니 왼쪽</option>
                                <option value="4">아랫니 오른쪽</option>
                                <option value="5">아랫니 앞니</option>
                                <option value="6">아랫니 왼쪽</option>
                            </select>
                            <select class="form-control type" id="type_3">
                                <option value="1">윗니 오른쪽</option>
                                <option value="2">윗니 앞니</option>
                                <option value="3">윗니 왼쪽</option>
                                <option value="4">아랫니 오른쪽</option>
                                <option value="5">아랫니 앞니</option>
                                <option value="6">아랫니 왼쪽</option>
                            </select>
                            <select class="form-control type" id="type_4">
                                <option value="1">윗니 오른쪽</option>
                                <option value="2">윗니 왼쪽</option>
                                <option value="3">아랫니 오른쪽</option>
                                <option value="4">아랫니 왼쪽</option>
                            </select>
                            <select class="form-control type" id="type_5">
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
                        <button class="member_delete btn btn-success ml-auto" id="search_btn">검색</button>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <h4 class="title">날짜별 항목일람</h4>
                    <div data-example-id="bordered-table" class="bs-example">
                        <table class="table table-bordered" id="partTable">
                            <thead>
                            <tr>
                                <th width="" class="text-center" style="width: 60px !important;">이미지</th>
                                <th width="25%" class="text-center">날자</th>
                                <th width="20%" class="text-center">분류</th>
                                <th width="25%" class="text-center">부위</th>
                                <th width="25%" class="text-center">상세부위</th>
                            </tr>
                            </thead>
                            <tbody id="part-table">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style type="text/css">
        .nivo-lightbox-image img{
            width: 600px !important;
        }
    </style>
    <script type="text/javascript">
        let HOST_URL = '<?= url('')?>';
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
                        searching: false
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
        })
        $('#part_type').change(function () {
            let val = $(this).val();
            console.log(val)
            if(val !== '1'){
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
                        $('#partTable').dataTable();
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
