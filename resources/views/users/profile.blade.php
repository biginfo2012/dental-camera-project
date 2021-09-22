<x-user-layout>
    <x-slot name="">
    </x-slot>
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="">
        <div class="container pt-60 pb-0">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img id="img_avatar" src="{{ (isset($user->avatar) ? $user->avatar : asset('images/blog/author.jpg'))}}" class="avatar brround avatar-xl"/>

                    </div>
                    <div class="col-md-12 text-center">
                        <h2 class="title">프로필</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container pt-0">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="heading-line-bottom">
                        <h4 class="heading-title">프로필변경</h4>
                    </div>
                    <form id="modify" action="" enctype="multipart/form-data" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('auth.name') }}</label>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}" required oninvalid="this.setCustomValidity('이름을 입력해주십시오.')">
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('auth.email') }}</label>
                                <input type="email" name="email" class="form-control" value="{{$user->email}}" required oninvalid="this.setCustomValidity('이메일을 입력해주십시오.')">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('auth.pw') }}</label>
                                <input type="password" id="password" name="password" class="form-control" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('passwords.confirm_pw') }}</label>
                                <input type="password" id="confirm_password" name="password_confirmation" class="form-control" value="">
                                <span id='message'></span>
                            </div>
                        </div>
{{--                        <div class="row">--}}
{{--                            <div class="form-group col-md-6">--}}
{{--                                <label>{{ __('auth.pw') }}</label>--}}
{{--                                <input type="password" class="form-control">--}}
{{--                            </div>--}}
{{--                            <div class="form-group col-md-6">--}}
{{--                                <label>{{ __('passwords.confirm_pw') }}</label>--}}
{{--                                <input type="password" class="form-control">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="exampleInputFile">프로필 이미지변경</label>
                                <input type="file" id="avatar">
{{--                                <p class="help-block">Example block-level help text here.</p>--}}
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="modify_btn" class="btn btn-dark btn-theme-colored ml-3 mt-15 mb-15">{{ __('auth.modify') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <style type="text/css">
        .avatar-xl {
            width: 4rem;
            height: 4rem;
            line-height: 4rem;
            font-size: 1.75rem;
        }
        .brround {
            border-radius: 50%;
        }
        .avatar {
            width: 10rem;
            height: 10rem;
            line-height: 2rem;
            display: inline-block;
            background: #ff7088 no-repeat center/cover;
            position: relative;
            text-align: center;
            color: #fff;
            font-weight: 600;
            vertical-align: bottom;
            font-size: .875rem;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
    </style>
    <script type="text/javascript">
        let HOST_URL = '<?= url('')?>';
        $(document).ready(function(){
            $("#modify").validate({
            });
        });
        $('#avatar').change(function () {
            var files = $('#avatar')[0].files;
            // FileReader support
            if (FileReader && files && files.length) {
                var fr = new FileReader();
                fr.onload = function () {
                    document.getElementById('img_avatar').src = fr.result;
                }
                fr.readAsDataURL(files[0]);
            }
        })
        $('#password, #confirm_password').on('keyup', function () {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('#message').html('암호가 일치합니다.').css('color', 'green');
            } else
                $('#message').html('암호가 일치하지 않습니다.').css('color', 'red');
        });
        $('#modify_btn').click(function(){
            event.preventDefault();
            if($('#modify').valid()){

                let pw = $('[name=password]').val();
                let con_pw = $('[name=password_confirmation]').val();
                if(pw !== ''){
                    if(con_pw === ''){
                        $('[name=password_confirmation]').parent().addClass('has-error');
                        return;
                    }
                    else{
                        if(pw !== con_pw){
                            $('[name=password_confirmation]').parent().addClass('has-error');
                            return
                        }
                    }
                }
                $('[name=password_confirmation]').parent().removeClass('has-error');
                var paramObj = new FormData($("#modify")[0]);

                var files = $('#avatar')[0].files;
                //paramObj.append("talent",JSON.stringify($("select[name=talent]").val()));
                if(files.length > 0 ){
                    paramObj.append('file',files[0]);
                }

                $.ajax({
                    url: HOST_URL + "/modify",
                    type: 'post',
                    data: paramObj,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        if(response.status === true){
                            console.log(response);
                            toastr.success("변경성공");
                        }else{
                            toastr.error("실패")
                        }
                    },
                });
            }

        })
    </script>
</x-user-layout>
