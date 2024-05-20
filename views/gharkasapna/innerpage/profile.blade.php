@extends('gharkasapna.layouts.innerpages_app')
@section('content')


<div class="row align-items-center pb40">
    <div class="col-lg-12">
        <div class="dashboard_title_area">
            <h2>{{ucfirst(session()->get('name'))}}</h2>
            <p class="text">We are glad to see you again!</p>
            <div id="deleteMessage"></div>


  

            @if(session('success'))

            <div class="col-lg-6 success-mesg">
                <div class="ui-content">
                    <div class="message-alart-style1">
                        <div class="alert alart_style_four alert-dismissible fade show mb20" role="alert">Success: {{ session('success') }}
                            <i class="far fa-xmark btn-close" data-bs-dismiss="alert" aria-label="Close"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endif


            @if(session('error'))
            <div class="alert alert-danger" id="error-alert">
                {{ session('error') }}
            </div>
            @endif

        </div>
    </div>
</div>

<form class="form-style1" action="{{route('update.user')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xl-12">
            <div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
                <div class="col-xl-7">
                    <div class="profile-box position-relative d-md-flex align-items-end mb50">
                        <div class="profile-img position-relative overflow-hidden bdrs12 mb20-sm">
                            <?php if (session()->get('image')) { ?>
                                <img class="w-100" id="profile-img" src="{{ asset('public/assets/profile-img/' . session()->get('image')) }}" style="height: 214px;">
                                <a href="#" class="tag-del delete-profile" data-bs-toggle="modal" data-bs-target="#deleteProfileModal" data-profileid="{{session()->get('id')}}" data-username="{{ session()->get('name') }}"><span class="fas fa-trash-can"></span></a>
                            <?php } else { ?>
                                <img class="w-100" id="profile-img" src="{{ asset('public/assets/images/listings/profile-1.jpg') }}" style="height: 214px;">
                            <?php } ?>


                        </div>
                        <div class="profile-content ml30 ml0-sm">
                            <label for="photo-upload" class="ud-btn btn-white2 mb30">
                                Upload Profile Files<input id="photo-upload" type="file" name="profile_img" id="profile-input" multiple style="display: none;" onchange="previewImage(event)">
                                <i class="fal fa-arrow-right-long"></i>
                            </label>
                            <p id="image-name"></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            <div class="mb20">
                                <label class="heading-color ff-heading fw600 mb10">Username</label><br>
                                <input type="text" class="form-control" name="user_name" placeholder="Your Name" value="{{ session()->get('name')}}">
                            </div>
                        </div>
                        <!-- <div class="col-sm-6 col-xl-4">
                            <div class="mb20">
                                <label class="heading-color ff-heading fw600 mb10">Email</label><br>
                                <input type="email" class="form-control"  placeholder="Your Name" value="{{ session()->get('email') }}">
                            </div>
                        </div> -->
                        <div class="col-sm-6 col-xl-4">
                            <div class="mb20">
                                <label class="heading-color ff-heading fw600 mb10">Phone</label><br>
                                <input type="text" class="form-control" name="user_phone" value="{{session()->get('phone')}}" readonly>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-4">
                            <div class="mb20">
                                <label class="heading-color ff-heading fw600 mb10">City</label><br>
                                <input type="text" class="form-control" name="city" value="{{session()->get('city')}}" placeholder="Enter youe city">
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-4">
                            <div class="mb20">
                                <label class="heading-color ff-heading fw600 mb10">Address</label><br>
                                <input type="text" class="form-control" name="address" value="{{session()->get('address')}}" placeholder="Enter your address">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb10">
                                <label class="heading-color ff-heading fw600 mb10">About me</label>
                                <textarea cols="30" rows="4" name="description" placeholder="There are many variations of passages.">{{session()->get('description')}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-end">
                                <button class="ud-btn btn-dark" type="submit">Update Profile<i class="fal fa-arrow-right-long"></i></button>
                            </div>
                        </div>
                    </div>
</form>
</div>
</div>

<div class="ps-widget bgc-white bdrs12 default-box-shadow2 p30 mb30 overflow-hidden position-relative">
    <h4 class="title fz17 mb30">CHANGE PHONE NUMBER</h4>
    <form class="form-style1">
        <div class="row">
            <div class="col-sm-6 col-xl-4">
                <div class="mb20">
                    <label class="heading-color ff-heading fw600 mb10">Old Phone</label><br>
                    <input type="text" class="form-control" value="{{session()->get('phone')}}" readonly>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="mb20">
                    <label class="heading-color ff-heading fw600 mb10">New Phone</label><br>
                    <input type="text" class="form-control" placeholder="Your Name">
                </div>
            </div>
            <div class="col-md-12">
                <div class="text-end">
                    <a class="ud-btn btn-dark" href="page-contact.html">Change Number<i class="fal fa-arrow-right-long"></i></a>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>


<div class="modal fade" id="deleteProfileModal" tabindex="-1" aria-labelledby="deleteProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="modal-title" id="deleteModalLabel">Remove Profile Image</h4>
                <p class="mb-4">Are you sure you want to remove the image of <strong><span id="userName"></span></strong>?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="ud-btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="ud-btn btn btn-danger " id="confirmDelete" style="color:#fff">Remove</button>
            </div>
        </div>
    </div>
</div>



@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    function previewImage(event) {
        const input = event.target;
        const imageName = input.files[0].name;
        const preview = document.getElementById('profile-img');
        const imageNameDisplay = document.getElementById('image-name');
        imageNameDisplay.textContent = `Image Name: ${imageName}`;
        const reader = new FileReader();
        reader.onload = function() {
            preview.src = reader.result;
        }
        reader.readAsDataURL(input.files[0]);
        const imageFile = $('#profile-input').prop('files')[0];
    }
</script>

<script>
    $(document).ready(function() {
        $('.delete-profile').click(function() {
            var profileId = $(this).data('profileid');
            var username = $(this).data('username');

            $('#deleteProfileModal #userName').text(username);
            $('#deleteProfileModal #confirmDelete').data('profileid', profileId);
        });

        $('#confirmDelete').click(function() {
            var profileId = $(this).data('profileid');

            $.ajax({
                url: "{{ route('user.profiledelete')}}",
                method: 'POST',
                data: {
                    profileId: profileId,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    if (response === 'success') {

                        $('#deleteMessage').html('<div class="alert alert-success" role="alert">Profile image has been successfully removed!</div>');

                        setTimeout(function() {
                            $('#deleteProfileModal').modal('hide');
                        }, 2000);

                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });

            $('#deleteProfileModal').modal('hide');
        });
    });
</script>