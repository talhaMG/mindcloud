<script src="<?=g('js_root')?>node/node_modules/socket.io/node_modules/socket.io-client/dist/socket.io.js"></script>
<script>
    // Connect socket
    // Local
    //var socket = io.connect(window.location.protocol + '<?=$_SERVER['HTTP_HOST']?>' + ':3000');

    //Demo
    var socket = io.connect(window.location.protocol + 'dev-webdesignservices.com' + ':9004');
    
    //var socket = io.connect('https://www.skypsychics.com:8080');
    //var socket = io.connect(window.location.protocol + 'dev-webdesignservices.com' + ':3000');
    

    // Pass event "new user" to server
    socket.emit('new user','<?=$this->session->userdata['logged_in_front']['id']?>',function (data) {
    });

    // After execute message at client end, server send event to client
    socket.on( 'new message', function( data ) {

        // Create date object
        //alert('Sender ID');
        var current_date = new Date();

        // Append message
        // Text message
        if(data.type=='text'){
            // Content Render With Emoji
            var output = '';
            output += '<div class="messageBox">';
            output += '<div class="col-md-1 col-xs-1 col-sm-1 no-margin">';
            output += '<img src="'+data.sender_image+'" /></div>';
            output += '<div class="col-md-11 col-xs-11 col-sm-11 no-margin">';
            output += '<div class="chatBG">';
            output += '<h3>'+data.sending_time+'</h3>';
            output += '<p>'+data.message+'</p>';
            output += '</div></div></div>';
            $('#new-chat_container-'+data.sender_id).append(output);

            //wdtEmojiBundle.render(data.message);
            //$('#new-chat_container-'+data.sender_id).append('<div class="row"><div class="col-md-12 col-sm-12 col-xs-12"><div class="leftBox"><div class="chatingBox boxBlue"><span class=\'chatingBox-sender\'>'+output+'</span></div><div class="chatDate">'+data.name+'| '+current_date.getFullYear() + '-' + ('0' + (current_date.getMonth()+1)).slice(-2) + '-' + ('0' + current_date.getDate()).slice(-2) + ' ' + current_date.getHours() + ':' + current_date.getMinutes() + ':' + current_date.getSeconds()+'</div></div></div></div>');

            // MESSAGE ALERT START
            if(data.message.length > 25) {
                data_message = data.message.substr(0,25) ;
                data_message += '....';
            }
            else {
                data_message = data.message;
            }

            var toastr_msg = data_message + " BY " + data.name;
            var toastr_title = 'New Message Received';
            Toastr.success(toastr_msg , toastr_title);
            
            var audio = new Audio('<?=i('message_receive.wav')?>');
            audio.play();
            // MESSAGE ALERT END
        }
        // Photo
        else if(data.type=='photo'){
            var output = '';
            output += '<div class="messageBox">';
            output += '<div class="col-md-1 col-xs-1 col-sm-1 no-margin">';
            output += '<img src="'+data.sender_image+'" /></div>';
            output += '<div class="col-md-11 col-xs-11 col-sm-11 no-margin">';
            output += '<div class="chatBG">';
            output += '<h3>'+data.sending_time+'</h3>';
            output += '<p><a href="'+data.photo+'" class=\'fancybox\'><img src="'+data.photo+'" style=\'width:125px\' /></a></p>';
            output += '</div></div></div>';
            $('#new-chat_container-'+data.sender_id).append(output);
            
            var toastr_msg = "Photo sent BY " + data.name;
            var toastr_title = ((user_type == 0) ? 'Answer' : 'Question') + ' Received';
            Toastr.success(toastr_msg , toastr_title);
            
            var audio = new Audio('<?=i('message_receive.wav')?>');
            audio.play();

            if($(".fancybox").length > 0)
            {
                $(".fancybox").fancybox({
                  helpers : {
                    title: {
                      type: 'inside'
                    }
                  },
                  closeBtn : true,
                });
            }
        }

        // File
        else if(data.type=='file'){
            $('#new-chat_container-'+data.sender_id).append('<div class="row"><div class="col-md-12 col-sm-12 col-xs-12"><div class="leftBox"><div class="chatingBox boxBlue"><span class=\'chatingBox-send\'><a href=\''+data.file+'\' download><img src="<?=i('download_icon.png')?>" style="width:125px" /></a></span></div><div class="chatDate">'+data.name+'| '+current_date.getFullYear() + '-' + ('0' + (current_date.getMonth()+1)).slice(-2) + '-' + ('0' + current_date.getDate()).slice(-2) + ' ' + current_date.getHours() + ':' + current_date.getMinutes() + ':' + current_date.getSeconds()+'</div></div></div></div>');
        }


        // // Video
        // else if(data.type=='video'){
        //     $('.user-messages-div-'+data.sender_id).append('<li class="media sender-div"><div class="media-body"><div class="media">' +
        //     '<div class="col-md-1 pull-right"><a href="javascript:void(0)" class="pull-right"><img src="' + data.sender_image + '" alt="img" class="postImg img-circle"></a></div>' +
        //     '<div class="col-md-11 pull-right no-padding"><video width="100%" height="200px" controls preload="metadata"><source src="'+data.video+'"></video><div class="clearfix"></div><small class="">' + data.name +  ' | ' + current_date.getFullYear() + '-' + ('0' + (current_date.getMonth()+1)).slice(-2) + '-' + ('0' + current_date.getDate()).slice(-2) + ' ' + current_date.getHours() + ':' + current_date.getMinutes() + ':' + current_date.getSeconds() + ' </small></div></div></div></li>');
        // }

        // Scroll in last section
        Chat.plugin_scroll_down();

        
    });

    // Receive own message
    socket.on('own message',function(data){

        
        // Create date object
        var current_date = new Date();
        
        // Text message
        if(data.type=='text'){
            
            var output = '';
            output += '<div class="messageBox">';
            output += '<div class="col-md-11 col-xs-11 col-sm-11 no-margin">';
            output += '<div class="chatBGtwo">';
            output += '<h3>'+data.sending_time+'</h3>';
            output += '<p>'+data.message+'</p>';
            output += '</div></div>';
            output += '<div class="col-md-1 col-xs-1 col-sm-1 no-margin">';
            output += '<img src="'+data.sender_image+'" /></div></div>';
            $('#new-chat_container-'+data.sender).append(output);

            //wdtEmojiBundle.render(data.message);
            //$('#new-chat_container-'+data.sender).append('<div class="row"><div class="col-md-12 col-sm-12 col-xs-12"><div class="rightBox"><div class="chatingBox greyBox"><span class=\'chatingBox-send\'>'+output+'</span></div><div class="chatDate">'+data.name+'| '+current_date.getFullYear() + '-' + ('0' + (current_date.getMonth()+1)).slice(-2) + '-' + ('0' + current_date.getDate()).slice(-2) + ' ' + current_date.getHours() + ':' + current_date.getMinutes() + ':' + current_date.getSeconds()+'</div></div></div></div>');
        }

        // Photo
        else if(data.type=='photo'){
            var output = '';
            output += '<div class="messageBox">';
            output += '<div class="col-md-11 col-xs-11 col-sm-11 no-margin">';
            output += '<div class="chatBGtwo">';
            output += '<h3>'+data.sending_time+'</h3>';
            output += '<p><a href="'+data.photo+'" class=\'fancybox\'><img src="'+data.photo+'" style=\'width:125px\' /></a></p>';
            output += '</div></div>';
            output += '<div class="col-md-1 col-xs-1 col-sm-1 no-margin">';
            output += '<img src="'+data.sender_image+'" /></div></div>';
            $('#new-chat_container-'+data.sender).append(output);

            if($(".fancybox").length > 0)
            {
                $(".fancybox").fancybox({
                  helpers : {
                    title: {
                      type: 'inside'
                    }
                  },
                  closeBtn : true,
                });
            }
        }

        // File
        else if(data.type=='file'){
            $('#new-chat_container-'+data.sender).append('<div class="row"><div class="col-md-12 col-sm-12 col-xs-12"><div class="rightBox"><div class="chatingBox greyBox"><span class=\'chatingBox-send\'><a href=\''+data.file+'\' download><img src="<?=i('download_icon.png')?>" style="width:125px" /></a></span></div><div class="chatDate">'+data.name+'| '+current_date.getFullYear() + '-' + ('0' + (current_date.getMonth()+1)).slice(-2) + '-' + ('0' + current_date.getDate()).slice(-2) + ' ' + current_date.getHours() + ':' + current_date.getMinutes() + ':' + current_date.getSeconds()+'</div></div></div></div>');
        }

        // // Video
        // else if(data.type=='video'){
        //     $('.user-messages-div-'+data.sender).append('<li class="media receiver-div"><div class="media-body"><div class="media">' +
        //     '<div class="col-md-1 pull-left"><a href="javascript:void(0)" class="pull-left"><img src="' + data.sender_image + '" alt="img" class="postImg img-circle"></a></div>' +
        //     '<div class="col-md-11 pull-left no-padding "><video width="100%" height="200px" controls preload="metadata"><source src="'+data.video+'"></video><div class="clearfix"></div><small class="">' + data.name +  ' | ' + current_date.getFullYear() + '-' + ('0' + (current_date.getMonth()+1)).slice(-2) + '-' + ('0' + current_date.getDate()).slice(-2) + ' ' + current_date.getHours() + ':' + current_date.getMinutes() + ':' + current_date.getSeconds() + ' </small></div></div></div></li>');
        // }

        // Scroll in last section
        Chat.plugin_scroll_down();
        
    });

    // Receive logged in event
    socket.on('login user',function(data){
        // Change Availability status in chat page
        $('#profile-div-'+data.id).attr('class','fa fa-circle online');
        $('#profile-div-'+data.id).attr('title','Online');

        Toastr.success( data.name+' online' , "" );
        
        // Append to online users list
        // $('.chat-online-users').append('<div class="chatBox chat-box-' + data.id +'"><div class="col-md-4 col-sm-2 col-xs-3">' +
        // '<div class="chatImg"><img src="' + data.profile + '" alt="img" class="postImg img-circle"></div></div>' +
        // '<div class="col-md-6 commentPadding col-sm-8 col-xs-6"><div class="chatName"><a href="javascript:void(0)" class="chat-start" data-id="' + data.id + '">' + data.name + '</a></div></div>' +
        // '<div class="col-md-2 commentPadding col-sm-2 col-xs-3"><div class="clearfix"></div></div></div>');

        // // Remove message btn from fantasy page if logged profile is showing
        // //$('.date-box-'+data.id + ' .bottom-link ul li:eq(3) > a').removeClass('btn-message');

        // // Change Availability status in Fantasy and Speed Dating Page (online)
        // $('.date-box-'+data.id + ' h2 > i').removeClass('deactive').addClass('active');


    });

    // Logout action start
    $('#logout').on('click',function(){
        // Pass event "logout" to server for delete user from socket
        var data = {id:'<?=$this->session->userdata['logged_in_front']['id']?>',name:'<?=$this->session->userdata['logged_in_front']['first_name'] . " " . $this->session->userdata['logged_in_front']['last_name']?>'}; 
        
        socket.emit('logout user',data);
        
        // Get url
        var url = $(this).attr('href');

        window.location = url;

        return false;
    });

    // Receive logout event to all user except sender
    socket.on('logout user',function(data){
        // Change Availability status in chat page
        //$('.chatPeople .profile-div-'+data.id + ' p').html('Offline');
        $('#profile-div-'+data.id).attr('class','fa fa-circle offline');
        $('#profile-div-'+data.id).attr('title','Offline');

        Toastr.error( data.name+' Offline' , "" );

        // Change Availability status in Fantasy Page (offline)
        $('.date-box-'+data.id + ' h2 > i').removeClass('active').addClass('deactive');

        // Remove message btn from fantasy page if logged profile is showing
        //$('.date-box-'+data.id + ' .bottom-link ul li:eq(3) > a').addClass('btn-message');

        // Remove user from online user list in chat page
        $('.chat-box-'+data.id).remove();
    });

    // Logout action end

</script>