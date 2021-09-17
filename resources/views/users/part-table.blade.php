@foreach($data as $index => $item)
    <tr>
        <th scope="row" style="width: 60px !important;">
            <div class="gallery-isotope default-animation-effect grid-1 gutter-small clearfix" data-lightbox="gallery">
                <!-- Portfolio Item Start -->
                <div class="gallery-item">
                    <div class="thumb">
                        <img class="img-fullwidth" src="{{$item['img_url']}}" alt="project">
                        <div class="overlay-shade"></div>
                        <div class="text-holder">
                            <div class="title text-center"> <?php echo convertPosId($item['part_type'], $item['pos_id']) ?></div>
                        </div>
                        <div class="icons-holder">
                            <div class="icons-holder-inner">
                                <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                    <a href="{{$item['img_url']}}" data-lightbox-gallery="gallery" title="{{convertPartType($item['part_type'])}}"><i class="fa fa-picture-o"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Portfolio Item End -->
            </div>

        </th>
        <td class="text-center align-middle" style="vertical-align: middle">{{date('Y-m-d', strtotime($item['created_at']))}}</td>
        <td class="text-center align-middle" style="vertical-align: middle">{{convertSymptomType($item['record']['symptom_type'])}}</td>
        <td class="text-center align-middle" style="vertical-align: middle">{{convertPartType($item['part_type'])}}</td>
        <td class="text-center align-middle" style="vertical-align: middle">
            <?php echo convertPosId($item['part_type'], $item['pos_id']) ?>
        </td>
    </tr>
@endforeach
