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
                        <h2 class="title">갤러리 상세</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container pt-10">
            <div class="row">
                <div class="col-md-6">
                    <h4>날짜</h4>
                    <!-- Datepicker Daterange Markup -->
                    <div id="example-daterange">
                        <p class="">{{date('Y-m-d', strtotime($record['created_at']))}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>분류</h4>
                    <div class="form-group">
                        <p class="">{{convertSymptomType($record['symptom_type'])}}</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <h4>메모</h4>
                    <div class="form-group">
                        <p class="">메모제목: {{isset($record['comment']) ? $record['comment']['title'] : ''}}</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <p class="">메모내용: {{isset($record['comment']) ? $record['comment']['content']: ''}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-line-bottom">
                        <h4 class="heading-title">구강전제</h4>
                    </div>

                    <!-- Portfolio Gallery Grid -->
                    <div class="gallery-isotope default-animation-effect grid-8 gutter-small clearfix" data-lightbox="gallery">
                        <!-- Portfolio Item Start -->
                        @php($part_1 = false)
                            @for($j = 0; $j < count($record['image']); $j++)
                                @if($record['image'][$j]['part_type'] === 1)
                                    @php($part_1 = true)
                                    <div class="gallery-item">
                                        <div class="thumb">
                                            <img class="img-fullwidth" src="{{$record['image'][$j]['img_url']}}" alt="project">
                                            <div class="overlay-shade"></div>
                                            <div class="text-holder">
                                                <div class="title text-center">
                                                    <?php echo convertPosId(1, $record['image'][$j]['pos_id']) ?>
                                                </div>
                                            </div>
                                            <div class="icons-holder">
                                                <div class="icons-holder-inner">
                                                    <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                        <a href="{{$record['image'][$j]['img_url']}}" data-lightbox-gallery="gallery"
                                                           title="구강전체"><i class="fa fa-picture-o"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endfor
                    </div>
                    <!-- End Portfolio Gallery Grid -->
                    @if($part_1 === false)
                        <p class="text-center">현시할 이미지가 없습니다.</p>
                    @endif

                    <div class="separator separator-rouned">
                        <i class="fa fa-cog"></i>
                    </div>

                    <div class="heading-line-bottom">
                        <h4 class="heading-title">치아의 앞면</h4>
                    </div>

                    <!-- Portfolio Gallery Grid -->
                    <div class="gallery-isotope default-animation-effect grid-8 gutter-small clearfix" data-lightbox="gallery">
                        @php($part_2 = false)
                            @for($j = 0; $j < count($record['image']); $j++)
                                @if($record['image'][$j]['part_type'] === 2)
                                @php($part_2 = true)
                                    <div class="gallery-item">
                                        <div class="thumb">
                                            <img class="img-fullwidth" src="{{$record['image'][$j]['img_url']}}" alt="project">
                                            <div class="overlay-shade"></div>
                                            <div class="text-holder">
                                                <div class="title text-center">
                                                    <?php echo convertPosId(2, $record['image'][$j]['pos_id']) ?>
                                                </div>
                                            </div>
                                            <div class="icons-holder">
                                                <div class="icons-holder-inner">
                                                    <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                        <a href="{{$record['image'][$j]['img_url']}}" data-lightbox-gallery="gallery"
                                                           title=" <?php echo convertPosId(2, $record['image'][$j]['pos_id']) ?>"><i class="fa fa-picture-o"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endfor

                    </div>
                    <!-- End Portfolio Gallery Grid -->
                    @if($part_2 === false)
                        <p class="text-center">현시할 이미지가 없습니다.</p>
                    @endif
                    <div class="separator separator-rouned">
                        <i class="fa fa-cog"></i>
                    </div>

                    <div class="heading-line-bottom">
                        <h4 class="heading-title">치아의 안쪽</h4>
                    </div>

                    <!-- Portfolio Gallery Grid -->
                    <div class="gallery-isotope default-animation-effect grid-8 gutter-small clearfix" data-lightbox="gallery">
                        @php($part_3 = false)
                            @for($j = 0; $j < count($record['image']); $j++)
                                @if($record['image'][$j]['part_type'] === 3)
                                @php($part_3 = true)
                                    <div class="gallery-item">
                                        <div class="thumb">
                                            <img class="img-fullwidth" src="{{$record['image'][$j]['img_url']}}" alt="project">
                                            <div class="overlay-shade"></div>
                                            <div class="text-holder">
                                                <div class="title text-center">
                                                    <?php echo convertPosId(3, $record['image'][$j]['pos_id']) ?>
                                                </div>
                                            </div>
                                            <div class="icons-holder">
                                                <div class="icons-holder-inner">
                                                    <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                        <a href="{{$record['image'][$j]['img_url']}}" data-lightbox-gallery="gallery"
                                                           title=" <?php echo convertPosId(3, $record['image'][$j]['pos_id']) ?>"><i class="fa fa-picture-o"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endfor
                    </div>
                    <!-- End Portfolio Gallery Grid -->
                    @if($part_3 === false)
                        <p class="text-center">현시할 이미지가 없습니다.</p>
                    @endif
                    <div class="separator separator-rouned">
                        <i class="fa fa-cog"></i>
                    </div>

                    <div class="heading-line-bottom">
                        <h4 class="heading-title">어금니 씹는 면</h4>
                    </div>

                    <!-- Portfolio Gallery Grid -->
                    <div class="gallery-isotope default-animation-effect grid-8 gutter-small clearfix" data-lightbox="gallery">
                        @php($part_4 = false)
                            @for($j = 0; $j < count($record['image']); $j++)
                                @if($record['image'][$j]['part_type'] === 4)
                                @php($part_4 = true)
                                    <div class="gallery-item">
                                        <div class="thumb">
                                            <img class="img-fullwidth" src="{{$record['image'][$j]['img_url']}}" alt="project">
                                            <div class="overlay-shade"></div>
                                            <div class="text-holder">
                                                <div class="title text-center">
                                                    <?php echo convertPosId(4, $record['image'][$j]['pos_id']) ?>
                                                </div>
                                            </div>
                                            <div class="icons-holder">
                                                <div class="icons-holder-inner">
                                                    <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                        <a href="{{$record['image'][$j]['img_url']}}" data-lightbox-gallery="gallery"
                                                           title=" <?php echo convertPosId(4, $record['image'][$j]['pos_id']) ?>"><i class="fa fa-picture-o"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endfor
                    </div>
                    <!-- End Portfolio Gallery Grid -->
                    @if($part_4 === false)
                        <p class="text-center">현시할 이미지가 없습니다.</p>
                    @endif
                    <div class="separator separator-rouned">
                        <i class="fa fa-cog"></i>
                    </div>

                    <div class="heading-line-bottom">
                        <h4 class="heading-title">기타부위</h4>
                    </div>

                    <!-- Portfolio Gallery Grid -->
                    <div class="gallery-isotope default-animation-effect grid-8 gutter-small clearfix" data-lightbox="gallery">
                        @php($part_5 = false)
                            @for($j = 0; $j < count($record['image']); $j++)
                                @if($record['image'][$j]['part_type'] === 5)
                                @php($part_5 = true)
                                    <div class="gallery-item">
                                        <div class="thumb">
                                            <img class="img-fullwidth" src="{{$record['image'][$j]['img_url']}}" alt="project">
                                            <div class="overlay-shade"></div>
                                            <div class="text-holder">
                                                <div class="title text-center">
                                                    <?php echo convertPosId(5, $record['image'][$j]['pos_id']) ?>
                                                </div>
                                            </div>
                                            <div class="icons-holder">
                                                <div class="icons-holder-inner">
                                                    <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                        <a href="{{$record['image'][$j]['img_url']}}" data-lightbox-gallery="gallery"
                                                           title="<?php echo convertPosId(5, $record['image'][$j]['pos_id']) ?>">
                                                            <i class="fa fa-picture-o"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endfor
                    </div>
                    <!-- End Portfolio Gallery Grid -->
                    @if($part_5 === false)
                        <p class="text-center">현시할 이미지가 없습니다.</p>
                    @endif
                    <div class="separator separator-rouned">
                        <i class="fa fa-cog"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style type="text/css">
        .nivo-lightbox-image img{
            width: 600px !important;
        }
        .nivo-lightbox-theme-default .nivo-lightbox-nav:hover{
            background-color: transparent !important;
        }
    </style>
</x-user-layout>
