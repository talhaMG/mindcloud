
var Toastr = function () {
    
    return {

        success: function (msg , title , options) {
            this.show(msg , title , "success" , options);
        },

        info: function (msg , title , options) {
            this.show(msg , title , "info" , options);
        },

        warning: function (msg , title , options) {
            this.show(msg , title , "warning" , options);
        },

        error: function (msg , title , options) {
            this.show(msg , title , "error" , options);
        },

        show: function (msg , title , type , options) {
                
                if(!options)
                    var options = {} ;

                toastr.options.positionClass = options.positionClass || "toast-bottom-left";

                if (options.showDuration) {
                    toastr.options.showDuration = options.showDuration;
                }

                if (options.hideDuration) {
                    toastr.options.hideDuration = options.hideDuration;
                }

                if (options.timeOut) {
                    toastr.options.timeOut = options.timeOut;
                }

                if (options.extendedTimeOut) {
                    toastr.options.extendedTimeOut = options.extendedTimeOut;
                }

                if (options.showEasing) {
                    toastr.options.showEasing = options.showEasing;
                }

                if (options.hideEasing) {
                    toastr.options.hideEasing = options.hideEasing;
                }

                if (options.showMethod) {
                    toastr.options.showMethod = options.showMethod;
                }

                if (options.hideMethod) {
                    toastr.options.hideMethod = options.hideMethod;
                }

                var $toast = toastr[type](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;

            // body...
        },
    };

}();

// Ajax Script Contains Helpers
var AjaxRequest = function () {
    
    var ajaxParams = {} ;

    return {
    
        //main function to initiate the module
        init: function () {
            // Right now, nothing to autoload
            return true;
            //initPickers();
        },

        setAjaxParam: function(name, value) {
            ajaxParams[name] = value;
        },

        load: function(url, data , target_obj) {
            response = this.fire(url, data) ;
            if(response.status == 1){
                target_obj.html(response.txt);
            }
        },

        fire: function(url, data) {
            var to_return = "";
            reqObj = this;
           //Metronic.blockUI("body");

            $.ajax({
                url: url,
                type: "POST",
                data: data,
                async: false,  // Has to be false to be able to return response
                dataType: "json",  // Has to be false to be able to return response
                success: function(response) {
                    to_return = response;
                    hide_preload ();

                },
                complete: function (response) {
                    //Metronic.unblockUI("body");
                },
                beforeSend: function (response) {
                    show_preload ();
                },
            });  // JQUERY Native Ajax End

            this.response = to_return;
            return to_return;

        }, // End of ajaxRequest

    }; // End of class return

}(); // End of AdminScript



// File Upload k lay
var FileUploadScript = function () {
    
    var ajaxParams = {} ;

    return {
    
        //main function to initiate the module
        init: function () {
            // Right now, nothing to autoload
            return true;
            //initPickers();
        },

        setAjaxParam: function(name, value) {
            ajaxParams[name] = value;

        },

        load: function(url, data , target_obj) {
            response = this.fire(url, data) ;
            if(response.status == 1){
                target_obj.html(response.txt);
            }
        },

        fire: function(url, data, type) {
            var to_return = "";
            reqObj = this;
            
            jQuery.ajax({
                url: url,
                type: "POST",
                data: data,
                enctype: 'multipart/form-data',
                processData: false,  // tell jQuery not to process the data
                contentType: false,   // tell jQuery not to set contentType
                dataType: type,
                async: false,  
                success: function(response) {
                    to_return = response;
                    // console.log(response);
                    hide_preload ();

                },
                complete: function (response) {
                    //Metronic.unblockUI("body");
                },
                beforeSend: function (response) {
                    show_preload ();
                },
            });  // JQUERY Native Ajax End
            //return false;
            this.response = to_return;
            return this.response;
            //this.response = to_return;
           // return to_return;

        }, // End of ajaxRequest        

    }; // End of class return

}(); // End of AdminScript



/*
*/

/*
################################################
Loading END Script
################################################
*/
/*    
$(window).on('load',function(){
    hide_preload ();
});

$(document).ready(function () {
    $('#preloader').click(function(){
        hide_preload ();
    });
});
*/

$('#preloader').click(function(){
    hide_preload();
});

function hide_preload () {
    $('#preloader').fadeOut(1000,function(){
        // page loaded
    });

}
function show_preload () {
    $('#preloader').fadeIn(100);
}
/*
################################################
Loading END Script
################################################
*/

/*
################################################
Progress Bar loading END Script
################################################
*/

// function run_progress_bar()
// {
//     NProgress.start();
//     NProgress.done();
// }

// NProgress.start();
// NProgress.done();


/*
################################################
Progress Bar loading END Script
################################################
*/





/*
################################################
Prevent a Google Maps iframe from capturing the mouse's scrolling wheel behavior START
################################################
*/

 $(document).ready(function () {

    // you want to enable the pointer events only on click;

    $('#map_canvas1').addClass('scrolloff'); // set the pointer events to none on doc ready
    $('#canvas1').on('click', function () {
        $('#map_canvas1').removeClass('scrolloff'); // set the pointer events true on click
    });

    // you want to disable pointer events when the mouse leave the canvas area;

    $("#map_canvas1").mouseleave(function () {
        $('#map_canvas1').addClass('scrolloff'); // set the pointer events to none when mouse leaves the map area
    });
});


/*
################################################
Prevent a Google Maps iframe from capturing the mouse's scrolling wheel behavior END
################################################
*/




/*
################################################
zabuto_calendar PLUG-IN START SCRIPT
Link : http://zabuto.com/dev/calendar/examples/display_settings.html
################################################
*/
  $(document).ready(function () {
    if($("#my-calendar").length > 0)
    {
       $("#my-calendar").zabuto_calendar({
          cell_border: true,
          today: true,
          show_days: false,
          weekstartson: 0,
          action: function () {
              return myDateFunction(this.id, false);
          },
          ajax: {
            url: base_url+"event/get_event"
          },
          /*
          legend: [
            //{type: "text", label: "Special event", badge: "00"},
            //{type: "block", label: "Regular event", classname: "purple"},
            //{type: "spacer"},
            // {type: "text", label: "Bad"},
            // {type: "list", list: ["grade-1", "grade-2", "grade-3", "grade-4"]},
            // {type: "text", label: "Good"}
          ],
          */
          // action_nav: function () {
          //     return myNavFunction(this.id);
          // },
          nav_icon: {
            prev: '<i class="fa fa-chevron-circle-left" style="color:black"></i>',
            next: '<i class="fa fa-chevron-circle-right" style="color:black"></i>'
          }
        });
    }
  });




  function myDateFunction(id , status)
  {
    //var date = $("#"+id).text();
   // id = id.replace('zabuto_calendar_e4p_', '');
    var data = id.split('_');
    var date = data[3];

    window.location = base_url+"event?date="+date;

    //console.log(date);
  }

/*
################################################
zabuto_calendar PLUG-IN END SCRIPT
Link : http://zabuto.com/dev/calendar/examples/display_settings.html
################################################
*/
  

$(document).ready(function() {
    if($('.my_tooltip').length > 0) {
        $('.my_tooltip').tooltipster();
    }
});





$(document).ready(function() {
    if($("#bike-bike_description").length > 0) {
        CKEDITOR.replace( 'bike-bike_description');
    }
});



// $(function() {
//     $('.my_is_numeric-div').on('keydown', '.my_is_numeric-value', function(e){
//         -1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()
//     });
// })

$('.my_is_numeric-value').change(function(){
    var checknumber = $(this).val();

    if(jQuery.isNumeric(checknumber) == false){
        Toastr.error( 'Field allow just numeric value' , "" );
        $(this).val('');
        $(this).focus();
        return;
    }
});



function blurElement(element, size)
{
    var filterVal = 'blur('+size+'px)';
    $(element)
        .css('filter',filterVal)
        .css('webkitFilter',filterVal)
        .css('mozFilter',filterVal)
        .css('oFilter',filterVal)
        .css('msFilter',filterVal);
}

$('.hide_content').each(function() {
    blurElement('.hide_content',2)
});




var Modal = function () {
    return {
        //main function to initiate the module
        init: function () {
        
        },

        //main function to initiate the module
        load: function (title,html) {
            $("#myModal-custom .modal-title").text(title);
            $("#myModal-custom .modal-body").html(html);
            $("#myModal-custom").modal();
        },
     }; // End of class return
}(); // End of Script

