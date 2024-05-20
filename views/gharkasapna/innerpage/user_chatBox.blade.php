@extends('gharkasapna.layouts.innerpages_app')
@section('content')

<style>
    .list-item.pt5.active {
        background: darksalmon;
    }

    .no-properties-found {
        text-align: center;
        margin-top: 50px;
    }

    .no-properties-found h1 {
        font-size: 24px;
        color: #000;
        font-weight: bold;
    }
</style>


<div class="row align-items-center pb40">
    <div class="col-lg-12">
        <div class="dashboard_title_area">
            <h2>Messages</h2>
            <p class="text">We are glad to see you again!</p>
        </div>
    </div>
</div>
<div class="row mb40">
    <div class="col-lg-6 col-xl-5 col-xxl-4">
        <div class="message_container">
            <div class="inbox_user_list">
                <div class="iu_heading pr35">
                    <div class="chat_user_search">
                        <form class="d-flex align-items-center">
                            <button class="btn" type="submit"><span class="flaticon-search"></span></button>
                            <input class="form-control" type="search" placeholder="Serach" aria-label="Search">
                        </form>
                    </div>
                </div>
                <div class="chat-member-list pr20">
                    @php $uniqueVendors = $vendorList->unique('vendor_id'); @endphp
                    @foreach($uniqueVendors as $member)
                    <div class="list-item pt5">
                        <a class="member-details" data-name="{{ $member->vendor->name }}" data-image="{{ asset('public/assets/profile-img/'. $member->vendor->image) }}" data-preview="{{ ($member->property->looking_to == 'pg') ? $member->property->pg_name : $member->property->property_name }}" data-id="{{$member->vendor->id}}" data-status="{{$member->vendor->status}}">
                            <div class="d-flex align-items-center position-relative">
                                <img class="img-fluid float-start rounded-circle mr10" src="{{ asset('public/assets/profile-img/'. $member->vendor->image) }}" alt="ms1.png">
                                <div class="d-sm-flex">
                                    <div class="d-inline-block">
                                        <div class="fz14 fw600 dark-color ff-heading mb-0">{{$member->vendor->name}}</div>
                                        <p class="preview">{{$member->vendor->city}}</p>

                                    </div>
                                    <div class="iul_notific">
                                        <!-- <small>35 mins</small> -->
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-6 col-xl-7 col-xxl-8 show-msg {{ request()->segment(1) == 'u-msg' ? '' : 'd-none' }}">

        <div class="no-properties-found">
            <h1>Please select a member from the list to start a chat.</h1>
        </div>
    </div>

    <div class="col-lg-6 col-xl-7 col-xxl-8 msg {{ request()->segment(1) == 'u-msg' ? 'd-none' : '' }}">
        <div class="message_container mt30-md">
            <div class="user_heading px-0 mx30">
                <div class="wrap">
                    <span class="text-success" id="delete-msg"></span>
                    <span class="contact-status online"></span>
                    <img class="img-fluid vendorimg mr10" src="{{asset('public/assets/images/inbox/ms3.png')}}" alt="ms3.png">
                    <div class="meta d-sm-flex justify-content-sm-between align-items-center">
                        <div class="authors">
                            <h6 class="name mb-0">Arlene McCoy</h6>
                            <p class="preview vendor-status">Active</p>
                        </div>
                        <div>
                            <!-- <a class="text-decoration-underline fz14 fw600 dark-color ff-heading" href="#">Delete Conversation</a> -->
                            <a class="text-decoration-underline fz14 fw600 dark-color ff-heading" data-bs-toggle="modal" data-bs-target="#deleteconversationModal" id="delete-conversation">Delete Conversation</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="inbox_chatting_box" id="chating-container">
                <ul class="chatting_content">
                    <li class="sent float-start">
                        <div class="d-flex align-items-center mb15">
                            <img class="img-fluid rounded-circle align-self-start mr10" src="{{asset('public/assets/images/inbox/ms4.png')}}" alt="ms4.png">
                            <div class="title fz14">Albert Flores <small class="ml10">35 mins</small></div>
                        </div>
                        <p>The chat feature is currently under development. Stay tuned for updates!</p>
                    </li>
                </ul>
            </div>
            <div class="mi_text">
                <div class="message_input">
                    <!-- <form class="d-flex align-items-center"> -->
                    <input class="form-control" type="search" id="msg-box" placeholder="Type a Message" aria-label="Search">
                    <button class="btn ud-btn btn-thm" id="send-msg">Send Message<i class="fal fa-arrow-right-long"></i></button>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>

</div>
</div>


<div class="modal fade" id="deleteconversationModal" tabindex="-1" aria-labelledby="deleteconversationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="modal-title" id="deleteconversationModalLabel">Remove All Messages</h4>
                <p class="mb-4">Are you sure you want to delete all messages with <strong><span id="userName"></span></strong> ? Please note that once deleted, this chat cannot be restored.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="ud-btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="ud-btn btn btn-danger " id="confirmDelete" style="color:#fff">Remove</button>
            </div>
        </div>
    </div>
</div>


@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    $(document).ready(function() {

        $('#msg-box').keypress(function(event) {
            if (event.keyCode == 13) {
                event.preventDefault(); 
                $('#send-msg').click(); 
            }
        });

        $('.member-details').on('click', function() {
            var visitedUrls = [];
            // alert('The chat feature is currently under development. Stay tuned for updates!');
            // return;
            var vendorID = $(this).attr('data-id');
            var vendorName = $(this).attr('data-name');
            var imgSrc = $(this).attr('data-image');
            var propertyName = $(this).attr('data-preview');
            var loginstatus = $(this).attr('data-status');

            var setstatus = (loginstatus == '0') ? 'Inactive' : 'Active';

            localStorage.setItem('selectedVendorID', vendorID);
            localStorage.setItem('selectedVendorName', vendorName);
            localStorage.setItem('selectedImgSrc', imgSrc);
            localStorage.setItem('status', loginstatus);


            $('.msg').removeClass('d-none');
            $('.show-msg').addClass('d-none');
            $('.list-item').removeClass('active');
            $(this).closest('.list-item').addClass('active');

            $('.name').text(vendorName);
            $('.vendorimg').attr('src', imgSrc);
            $('.vendor-status').text(setstatus);
            var sessionImage = "{{ session()->get('image') }}";
            var imagePath = "{{ asset('public/assets/profile-img/') }}/" + sessionImage;
            $('#send-msg').data('vendorID', vendorID);
            $('#send-msg').data('vendorName', vendorName);
            $('#send-msg').data('imgSrc', imgSrc);
            fetchNewMessages(vendorID, vendorName, imgSrc);
            $('#delete-conversation').data('deleteID', vendorID);
            $('#delete-conversation').data('deleteName', vendorName);


            var shortenedName = vendorName.substring(0, 3);
            var currentUrl = window.location.href;
            var createUrl = '/u-msg-' + shortenedName;
            if (!visitedUrls.includes(createUrl)) {
                history.pushState(null, null, createUrl);
                visitedUrls.push(createUrl);
            }

            $.ajax({
                url: "{{route('user.chat')}}",
                method: "POST",
                data: {
                    vendorID: vendorID,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    console.log(response);

                    if (response.chatData.length > 0) {
                        var chatContainer = $('#chating-container ul.chatting_content');
                        chatContainer.empty();
                        response.chatData.forEach(function(message) {
                            var liClass = message.sender_id == response.sessionUserID ? 'reply float-end' : 'sent float-start';
                            var displayName = message.sender_id == response.sessionUserID ? 'You' : vendorName;
                            var displayImage = message.sender_id == response.sessionUserID ? imagePath : imgSrc;
                            var timeDifference = moment(message.created_at).fromNow();
                            var listItem = '<li class="' + liClass + '">' +
                                '<div class="d-flex align-items-center mb15">' +
                                '<img class="img-fluid rounded-circle align-self-start mr10" src="' + displayImage + '">' +
                                '<div class="title fz14">' + displayName + ' <small class="ml10"> ' + timeDifference + ' </small> </div>' +
                                '</div>' +
                                '<p>' + message.message + '</p>' +
                                '</li>';
                            chatContainer.append(listItem);
                        });

                    } else {
                        var chatContainer = $('#chating-container ul.chatting_content');
                        chatContainer.empty();
                    }

                },
                error: function(xhr, status, error) {
                    console.log("Ajax Error", error);
                }
            });
        });

        setInterval(function() {
            var vendorID = localStorage.getItem('selectedVendorID');
            var vendorName = localStorage.getItem('selectedVendorName');
            var imgSrc = localStorage.getItem('selectedImgSrc');
            fetchNewMessages(vendorID, vendorName, imgSrc);
        }, 5000);



        $('#send-msg').on('click', function() {

            var vendorID = $(this).data('vendorID');
            var msg = $('#msg-box').val();
            var vendorName = $(this).data('vendorName');
            var imgSrc = $(this).data('imgSrc');
            var sessionImage = "{{ session()->get('image') }}";
            var imagePath = "{{ asset('public/assets/profile-img/') }}/" + sessionImage;


            if (msg.trim() == '') {
                return;
            }

            $.ajax({
                url: "{{ route('send.user.msg')}}",
                method: "POST",
                data: {
                    vendorID: vendorID,
                    msg: msg,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#msg-box').val('');
                    console.log(response);
                    if (response.chatData.length > 0) {
                        var chatContainer = $('#chating-container ul.chatting_content');
                        chatContainer.empty();
                        response.chatData.forEach(function(message) {
                            var liClass = message.sender_id == response.sessionUserID ? 'reply float-end' : 'sent float-start';
                            var displayName = message.sender_id == response.sessionUserID ? 'You' : vendorName;
                            var displayImage = message.sender_id == response.sessionUserID ? imagePath : imgSrc;
                            var timeDifference = moment(message.created_at).fromNow();
                            var listItem = '<li class="' + liClass + '">' +
                                '<div class="d-flex align-items-center mb15">' +
                                '<img class="img-fluid rounded-circle align-self-start mr10" src="' + displayImage + '">' +
                                '<div class="title fz14">' + displayName + ' <small class="ml10"> ' + timeDifference + ' </small> </div>' +
                                '</div>' +
                                '<p>' + message.message + '</p>' +
                                '</li>';
                            chatContainer.append(listItem);
                        });

                    } else {
                        var chatContainer = $('#chating-container ul.chatting_content');
                        chatContainer.empty();
                    }

                    $('.inbox_chatting_box').animate({
                        scrollTop: $('.inbox_chatting_box').get(0).scrollHeight
                    }, 1500);
                },
                error: function(xhr, status, error) {
                    console.log("Ajax Error", error);
                }
            });
        });

        $('#delete-conversation').on('click', function() {

            var deleteID = $(this).data('deleteID');
            var deleteName = $(this).data('deleteName');
            $('#deleteconversationModal #userName').text(deleteName);
            $('#deleteconversationModal #confirmDelete').data('deleteID', deleteID);

            $('#confirmDelete').click(function() {
                var deleteID = $(this).data('deleteID');

                $.ajax({
                    url: "{{route('delete.user.msg')}}",
                    method: "POST",
                    data: {
                        deleteID: deleteID,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.success) {

                            $('#delete-msg').text('Messages deleted successfully !');
                            // var chatContainer = $('#chating-container ul.chatting_content');
                            // chatContainer.empty();
                            $('.reply.float-end').empty();
                            setTimeout(function() {
                                $('#deleteconversationModal').modal('hide');
                                $('#delete-msg').fadeOut();
                            }, 1000);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("AJax Error", error);
                    }
                });
            });

        });



        var sessionImage = "{{ session()->get('image') }}";
        var imagePath = "{{ asset('public/assets/profile-img/') }}/" + sessionImage;

        function fetchNewMessages(vendorID, vendorName, imgSrc) {

            $.ajax({

                url: "{{route('user.chat')}}",
                method: "POST",
                data: {
                    vendorID: vendorID,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    console.log(response);

                    if (response.chatData.length > 0) {
                        var chatContainer = $('#chating-container ul.chatting_content');
                        chatContainer.empty();
                        response.chatData.forEach(function(message) {
                            var liClass = message.sender_id == response.sessionUserID ? 'reply float-end' : 'sent float-start';
                            var displayName = message.sender_id == response.sessionUserID ? 'You' : vendorName;
                            var displayImage = message.sender_id == response.sessionUserID ? imagePath : imgSrc;
                            var timeDifference = moment(message.created_at).fromNow();
                            var listItem = '<li class="' + liClass + '">' +
                                '<div class="d-flex align-items-center mb15">' +
                                '<img class="img-fluid rounded-circle align-self-start mr10" src="' + displayImage + '">' +
                                '<div class="title fz14">' + displayName + ' <small class="ml10"> ' + timeDifference + ' </small> </div>' +
                                '</div>' +
                                '<p>' + message.message + '</p>' +
                                '</li>';
                            chatContainer.append(listItem);
                        });

                    } else {
                        var chatContainer = $('#chating-container ul.chatting_content');
                        chatContainer.empty();
                    }


                    $('.inbox_chatting_box').animate({
                        scrollTop: $('.inbox_chatting_box').get(0).scrollHeight
                    }, 1500);


                },
                error: function(xhr, status, error) {
                    console.log("Ajax Error", error);
                }
            });
        }

    });

    $(document).ready(function() {

        var vendorID = localStorage.getItem('selectedVendorID');
        var vendorName = localStorage.getItem('selectedVendorName');
        var imgSrc = localStorage.getItem('selectedImgSrc');
        var loginstatus = localStorage.getItem('status');
        $('#send-msg').data('vendorID', vendorID);
        $('#send-msg').data('vendorName', vendorName);
        $('#send-msg').data('imgSrc', imgSrc);

        var setstatus = (loginstatus == '0') ? 'Inactive' : 'Active';


        $('.list-item').removeClass('active');
        $('[data-id="' + vendorID + '"]').closest('.list-item').addClass('active');


        $('.name').text(vendorName);
        $('.vendorimg').attr('src', imgSrc);
        $('.vendor-status').text(setstatus);
        var sessionImage = "{{ session()->get('image') }}";
        var imagePath = "{{ asset('public/assets/profile-img/') }}/" + sessionImage;


        if (vendorID && vendorName && imgSrc) {
            var chatContainer = $('#chating-container ul.chatting_content');
            chatContainer.empty();


            $.ajax({

                url: "{{route('user.chat')}}",
                method: "POST",
                data: {
                    vendorID: vendorID,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    console.log(response);

                    if (response.chatData.length > 0) {
                        var chatContainer = $('#chating-container ul.chatting_content');
                        chatContainer.empty();
                        response.chatData.forEach(function(message) {
                            var liClass = message.sender_id == response.sessionUserID ? 'reply float-end' : 'sent float-start';
                            var displayName = message.sender_id == response.sessionUserID ? 'You' : vendorName;
                            var displayImage = message.sender_id == response.sessionUserID ? imagePath : imgSrc;
                            var timeDifference = moment(message.created_at).fromNow();
                            var listItem = '<li class="' + liClass + '">' +
                                '<div class="d-flex align-items-center mb15">' +
                                '<img class="img-fluid rounded-circle align-self-start mr10" src="' + displayImage + '">' +
                                '<div class="title fz14">' + displayName + ' <small class="ml10"> ' + timeDifference + ' </small> </div>' +
                                '</div>' +
                                '<p>' + message.message + '</p>' +
                                '</li>';
                            chatContainer.append(listItem);
                        });

                    } else {
                        var chatContainer = $('#chating-container ul.chatting_content');
                        chatContainer.empty();
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Ajax Error", error);
                }
            });

        }
    });
</script>