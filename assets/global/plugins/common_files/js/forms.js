// Script in this form
//- Contact us Ajax Script
//- Newsletter Ajax Script
//- Signup Ajax Script
//- Signin Ajax Script
//- Advisor Signin Ajax Script
//- Forgot Password Ajax Script
//- Reset Password Ajax Script
//- Update User Information Ajax 
//- Update About Ajax Scrip
//- Change Password Ajax Script
//- Update address Ajax Script
//- Update Contact Info Ajax Script
//- Security Setting Script
//- Account Activate Script
//- Customer Review Script


var Form = function () {
  //var baseUrl = base_url;


  var urls = {
    // General Method
    newsletter: base_url + "newsletter",
    contact_us: base_url + "contact_us/send",

    //custom to site reqquirement
    advertisment: base_url + "advertisment/post_ads",
    partnership_inquiry: base_url + "partner/send",
    quiz: base_url + "quiz/ajax_quiz_evaluation",
    comments: base_url + "comment/comment",
    verify: base_url + "verify/validate_certificate",
    evaluation: base_url + "course/ajax_save_evaluation",  //course evaluation

    // Account Script
    signup: base_url + "ajax-save-signup",
    signin: base_url + "signin",
    forgot_password: base_url + "account/forgot_password",
    reset_password: base_url + "account/reset_password/process",
    update_profile: base_url + "account/profile/update",
    update_about: base_url + "account/profile/ajax-update-about",
    update_contact_info: base_url + "account/profile/ajax-contact-info-save",
    update_address: base_url + "account/profile/ajax-update-address-save",
    change_password: base_url + "account/profile/ajax-change-password",
    course_review: base_url + "contact_us/review",
    tutorial_review: base_url + "contact_us/tutorial_review",
    form_cto: base_url + "contact_us/ajax_formsend",
    tool_business_multi: base_url + "contact_us/tool_business_multi_formsend",
    tool_vp: base_url + "contact_us/tool_vp_formsend",
    tools_smp: base_url + "contact_us/tool_smp_formsend",
    tools_cjdg: base_url + "contact_us/tool_cjdg_formsend",
    tools_mc: base_url + "contact_us/tool_mc_formsend",
    tools_osf: base_url + "contact_us/tool_osf_formsend",
    tool_swot: base_url + "contact_us/tool_swot_formsend",
    tool_pmmt: base_url + "contact_us/tool_pmmt_formsend",
    tool_fm_income: base_url + "contact_us/tool_income_formsend",
    tool_lts: base_url + "contact_us/tool_lts_formsend",
    tool_ids: base_url + "contact_us/tool_ids_formsend",
    tool_fm_bss : base_url + "contact_us/tool_bss_formsend",
    tool_fm_cfs : base_url + "contact_us/tool_cfs_formsend",
    tool_fm_beps : base_url + "contact_us/tool_beps_formsend",
    tool_fm_dcvm : base_url + "contact_us/tool_dcvm_formsend",
    //account_activate_process : base_url + "account/active_account/process",
    //review : base_url + "customer_review",
  };

  var value;

  return {

    //main function to initiate the module
    init: function () {
      // call instance variable
      //this.value = $("#order_id").val();

      // call default function
      //this.method();
    },




    contact_us: function (form) {
      // Disable the submit button to prevent repeated clicks:
      $('#forms-contact_us-btn').prop('disabled', true);
      var data = form.serialize();
      response = AjaxRequest.fire(urls.contact_us, data);
      // return false;  
      $('#forms-contact_us-btn').prop('disabled', false);

      if (response.status) {

        Toastr.success(response.msg.desc, 'Success');
        $("#forms-contact_us").find('input[type=text],input[type=email],textarea').val('');
        //FOR GOOGLE CAPTCHA RESET:
        grecaptcha.reset();
        $(".openBtn").click();
        return false;
      }
      else {
        Toastr.error(response.msg.desc, 'Error');
        //Toastr.error('Error Found please try again','Error');
        return false;
      }
      return false;
    },


    course_review: function (form) {
      // Disable the submit button to prevent repeated clicks:
      $('#forms-review_us-btn').prop('disabled', true);
      var data = form.serialize();
      response = AjaxRequest.fire(urls.course_review, data);
      // return false;  
      $('#forms-review_us-btn').prop('disabled', false);

      if (response.status) {

        Toastr.success(response.msg.desc, 'Success');
        $("#forms-review_us").find('input[type=text],input[type=email],textarea').val('');
        //FOR GOOGLE CAPTCHA RESET:
        // grecaptcha.reset();
        //  $(".openBtn").click();
        return false;
      }
      else {
        Toastr.error(response.msg.desc, 'Error');
        //Toastr.error('Error Found please try again','Error');
        return false;
      }
      return false;
    },

    tutorial_review: function (form) {
      // Disable the submit button to prevent repeated clicks:
      $('#forms-tutorial-review_us-btn').prop('disabled', true);
      var data = form.serialize();
      response = AjaxRequest.fire(urls.tutorial_review, data);
      // return false;  
      $('#forms-tutorial-review_us-btn').prop('disabled', false);

      if (response.status) {

        Toastr.success(response.msg.desc, 'Success');
        $("#forms-tutorial-review_us").find('input[type=text],input[type=email],textarea').val('');
        //FOR GOOGLE CAPTCHA RESET:
        // grecaptcha.reset();
        //  $(".openBtn").click();
        return false;
      }
      else {
        Toastr.error(response.msg.desc, 'Error');
        //Toastr.error('Error Found please try again','Error');
        return false;
      }
      return false;
    },

    form_cto: function (form) {


      $('#forms-tool_builder-btn1').prop('disabled', true);
      $('#forms-tool_builder-btn2').prop('disabled', true);
      $('#forms-tool_builder-btn3').prop('disabled', true);
      $('#forms-tool_builder-btn4').prop('disabled', true);
      $('#forms-tool_builder-btn5').prop('disabled', true);
      $('#forms-tool_builder-btn6').prop('disabled', true);
      $('#forms-tool_builder-btn7').prop('disabled', true);
      $('#forms-tool_builder-btn8').prop('disabled', true);
      $('#forms-tool_builder-btn9').prop('disabled', true);

      var data = form.serialize();
      response = AjaxRequest.fire(urls.form_cto, data);

      $('#forms-tool_builder-btn1').prop('disabled', false);
      $('#forms-tool_builder-btn2').prop('disabled', false);
      $('#forms-tool_builder-btn3').prop('disabled', false);
      $('#forms-tool_builder-btn4').prop('disabled', false);
      $('#forms-tool_builder-btn5').prop('disabled', false);
      $('#forms-tool_builder-btn6').prop('disabled', false);
      $('#forms-tool_builder-btn7').prop('disabled', false);
      $('#forms-tool_builder-btn8').prop('disabled', false);
      $('#forms-tool_builder-btn9').prop('disabled', false);


      // return false;

      if (response.status) {

        Toastr.success(response.msg.desc, 'Go To Next Step');
        $("#form-send_us").find('input[type=text],input[type=email],textarea').val('');

        return false;
      }
      else {
        Toastr.error(response.msg.desc, 'Error');

        return false;
      }
      return false;
    },


    tool_business_multi: function (form) {


      $('#form-tool-builder-multi-btn1').prop('disabled', true);
      $('#form-tool-builder-multi-btn2').prop('disabled', true);
      $('#form-tool-builder-multi-btn3').prop('disabled', true);
      $('#form-tool-builder-multi-btn4').prop('disabled', true);
      $('#form-tool-builder-multi-btn5').prop('disabled', true);
      $('#form-tool-builder-multi-btn6').prop('disabled', true);
      $('#form-tool-builder-multi-btn7').prop('disabled', true);
      $('#form-tool-builder-multi-btn8').prop('disabled', true);
      $('#form-tool-builder-multi-btn9').prop('disabled', true);

      var data = form.serialize();
      response = AjaxRequest.fire(urls.tool_business_multi, data);

      $('#form-tool-builder-multi-btn1').prop('disabled', false);
      $('#form-tool-builder-multi-btn2').prop('disabled', false);
      $('#form-tool-builder-multi-btn3').prop('disabled', false);
      $('#form-tool-builder-multi-btn4').prop('disabled', false);
      $('#form-tool-builder-multi-btn5').prop('disabled', false);
      $('#form-tool-builder-multi-btn6').prop('disabled', false);
      $('#form-tool-builder-multi-btn7').prop('disabled', false);
      $('#form-tool-builder-multi-btn8').prop('disabled', false);
      $('#form-tool-builder-multi-btn9').prop('disabled', false);

      // return false ;

      if (response.status) {

        Toastr.success(response.msg.desc, 'Go To Next Step');
        $("#regForm").find('input[type=text],input[type=email],textarea').val('');

        return false;
      }
      else {
        Toastr.error(response.msg.desc, 'Error');

        return false;
      }
      return false;
    },


    tool_vp: function (form) {


      $('#forms-tool_builder-btn1').prop('disabled', true);
      $('#forms-tool_builder-btn2').prop('disabled', true);

      var data = form.serialize();
      response = AjaxRequest.fire(urls.tool_vp, data);

      $('#forms-tool_builder-btn1').prop('disabled', false);
      $('#forms-tool_builder-btn2').prop('disabled', false);

      // return false ;

      if (response.status) {

        Toastr.success(response.msg.desc, 'Go To Next Step');
        $("#form-vp").find('input[type=text],input[type=email],textarea').val('');

        return false;
      }
      else {
        Toastr.error(response.msg.desc, 'Error');

        return false;
      }
      return false;
    },

    tool_swot: function (form) {


      $('#forms-tool_builder-btn1').prop('disabled', true);


      var data = form.serialize();
      response = AjaxRequest.fire(urls.tool_swot, data);

      $('#forms-tool_builder-btn1').prop('disabled', false);


      // return false ;

      if (response.status) {

        Toastr.success(response.msg.desc, 'Go To Next Step');
        $("#form-send_swot").find('input[type=text],input[type=email],textarea').val('');

        return false;
      }
      else {
        Toastr.error(response.msg.desc, 'Error');

        return false;
      }
      return false;
    },


    tools_smp: function (form) {


      $('#forms-tool_builder-btn1').prop('disabled', true);


      var data = form.serialize();
      response = AjaxRequest.fire(urls.tools_smp, data);

      $('#forms-tool_builder-btn1').prop('disabled', false);


      // return false ;

      if (response.status) {

        Toastr.success(response.msg.desc, 'Go To Next Step');
        $("#form-smp").find('input[type=text],input[type=email],textarea').val('');

        return false;
      }
      else {
        Toastr.error(response.msg.desc, 'Error');

        return false;
      }
      return false;
    },



    tools_cjdg: function (form) {


      $('#forms-tool_builder-btn1').prop('disabled', true);
      $('#forms-tool_builder-btn2').prop('disabled', true);
      $('#forms-tool_builder-btn3').prop('disabled', true);

      var data = form.serialize();
      response = AjaxRequest.fire(urls.tools_cjdg, data);

      $('#forms-tool_builder-btn1').prop('disabled', false);
      $('#forms-tool_builder-btn2').prop('disabled', false);
      $('#forms-tool_builder-btn3').prop('disabled', false);

      // return false ;

      if (response.status) {

        Toastr.success(response.msg.desc, 'Go To Next Step');
        $("#form-cjdg").find('input[type=text],input[type=email],textarea').val('');

        return false;
      }
      else {
        Toastr.error(response.msg.desc, 'Error');

        return false;
      }
      return false;
    },

    tools_mc: function (form) {


      $('#forms-tool_builder-btn1').prop('disabled', true);

      var data = form.serialize();
      response = AjaxRequest.fire(urls.tools_mc, data);

      $('#forms-tool_builder-btn1').prop('disabled', false);


      // return false ;

      if (response.status) {

        Toastr.success(response.msg.desc, 'Go To Next Step');
        $("#form-mcmc").find('input[type=text],input[type=email],textarea').val('');

        return false;
      }
      else {
        Toastr.error(response.msg.desc, 'Error');

        return false;
      }
      return false;
    },

    tools_osf: function (form) {


      $('#forms-tool_builder-btn1').prop('disabled', true);

      var data = form.serialize();
      response = AjaxRequest.fire(urls.tools_osf, data);

      $('#forms-tool_builder-btn1').prop('disabled', false);


      // return false ;

      if (response.status) {

        Toastr.success(response.msg.desc, 'Go To Next Step');
        $("#form-osf").find('input[type=text],input[type=email],textarea').val('');

        return false;
      }
      else {
        Toastr.error(response.msg.desc, 'Error');

        return false;
      }
      return false;
    },





    tool_fm_income: function (form) {


      $('#forms-tool_builder-btn1').prop('disabled', true);

      var data = form.serialize();
      response = AjaxRequest.fire(urls.tool_fm_income, data);

      $('#forms-tool_builder-btn1').prop('disabled', false);

      // return false ;

      if (response.status) {

        Toastr.success(response.msg.desc, 'Go To Next Step');
        $("#form-income").find('input[type=text],input[type=email],textarea').val('');

        return false;
      }
      else {
        Toastr.error(response.msg.desc, 'Error');

        return false;
      }
      return false;
    },


    tool_pmmt: function (form) {


      $('#forms-tool_builder-btn1').prop('disabled', true);
      $('#forms-tool_builder-btn2').prop('disabled', true);

      var data = form.serialize();
      response = AjaxRequest.fire(urls.tool_pmmt, data);

      $('#forms-tool_builder-btn1').prop('disabled', false);
      $('#forms-tool_builder-btn2').prop('disabled', false);

      // return false;

      if (response.status) {

        Toastr.success(response.msg.desc, 'Go To Next Step');
        $("#form-pmmt").find('input[type=text],input[type=email],textarea').val('');

        return false;
      }
      else {
        Toastr.error(response.msg.desc, 'Error');

        return false;
      }
      return false;
    },


    tool_lts: function (form) {


      $('#forms-tool_builder-btn1').prop('disabled', true);
      $('#forms-tool_builder-btn2').prop('disabled', true);
      $('#forms-tool_builder-btn3').prop('disabled', true);
      $('#forms-tool_builder-btn4').prop('disabled', true);
      $('#forms-tool_builder-btn5').prop('disabled', true);
      $('#forms-tool_builder-btn6').prop('disabled', true);
      $('#forms-tool_builder-btn7').prop('disabled', true);
      $('#forms-tool_builder-btn8').prop('disabled', true);
      $('#forms-tool_builder-btn9').prop('disabled', true);
      $('#forms-tool_builder-btn10').prop('disabled', true);
      $('#forms-tool_builder-btn11').prop('disabled', true);
      $('#forms-tool_builder-btn12').prop('disabled', true);
      $('#forms-tool_builder-btn13').prop('disabled', true);
      $('#forms-tool_builder-btn14').prop('disabled', true);
      $('#forms-tool_builder-btn15').prop('disabled', true);
      $('#forms-tool_builder-btn16').prop('disabled', true);
      $('#forms-tool_builder-btn17').prop('disabled', true);
      var data = form.serialize();
      response = AjaxRequest.fire(urls.tool_lts, data);

      $('#forms-tool_builder-btn1').prop('disabled', false);
      $('#forms-tool_builder-btn2').prop('disabled', false);
      $('#forms-tool_builder-btn3').prop('disabled', false);
      $('#forms-tool_builder-btn4').prop('disabled', false);
      $('#forms-tool_builder-btn5').prop('disabled', false);
      $('#forms-tool_builder-btn6').prop('disabled', false);
      $('#forms-tool_builder-btn7').prop('disabled', false);
      $('#forms-tool_builder-btn8').prop('disabled', false);
      $('#forms-tool_builder-btn9').prop('disabled', false);
      $('#forms-tool_builder-btn10').prop('disabled', false);
      $('#forms-tool_builder-btn11').prop('disabled', false);
      $('#forms-tool_builder-btn12').prop('disabled', false);
      $('#forms-tool_builder-btn13').prop('disabled', false);
      $('#forms-tool_builder-btn14').prop('disabled', false);
      $('#forms-tool_builder-btn15').prop('disabled', false);
      $('#forms-tool_builder-btn16').prop('disabled', false);
      $('#forms-tool_builder-btn17').prop('disabled', false);

      // return false;

      if (response.status) {

        Toastr.success(response.msg.desc, 'Go To Next Step');
        $("#form-lts").find('input[type=text],input[type=email],textarea').val('');

        return false;
      }
      else {
        Toastr.error(response.msg.desc, 'Error');

        return false;
      }
      return false;
    },

    
    tool_ids: function (form) {



      $('#forms-tool_builder-btn1').prop('disabled', true);
      $('#forms-tool_builder-btn2').prop('disabled', true);
      $('#forms-tool_builder-btn3').prop('disabled', true);
      $('#forms-tool_builder-btn4').prop('disabled', true);
      $('#forms-tool_builder-btn5').prop('disabled', true);
      $('#forms-tool_builder-btn6').prop('disabled', true);
      $('#forms-tool_builder-btn7').prop('disabled', true);
      $('#forms-tool_builder-btn8').prop('disabled', true);
      $('#forms-tool_builder-btn9').prop('disabled', true);
      $('#forms-tool_builder-btn10').prop('disabled', true);
      $('#forms-tool_builder-btn11').prop('disabled', true);

      var data = form.serialize();
      response = AjaxRequest.fire(urls.tool_ids, data);
      $('#forms-tool_builder-btn1').prop('disabled', false);
      $('#forms-tool_builder-btn2').prop('disabled', false);
      $('#forms-tool_builder-btn3').prop('disabled', false);
      $('#forms-tool_builder-btn4').prop('disabled', false);
      $('#forms-tool_builder-btn5').prop('disabled', false);
      $('#forms-tool_builder-btn6').prop('disabled', false);
      $('#forms-tool_builder-btn7').prop('disabled', false);
      $('#forms-tool_builder-btn8').prop('disabled', false);
      $('#forms-tool_builder-btn9').prop('disabled', false);
      $('#forms-tool_builder-btn10').prop('disabled', false);
      $('#forms-tool_builder-btn11').prop('disabled', false);

      // return false;

      if (response.status) {

        Toastr.success(response.msg.desc, 'Go To Next Step');
        $("#form-ids").find('input[type=text],input[type=email],textarea').val('');

        return false;
      }
      else {
        Toastr.error(response.msg.desc, 'Error');

        return false;
      }
      return false;
    },
    tool_fm_bss : function(form) {
                  

      $('#forms-tool_builder-btn1').prop('disabled', true);  
      
      var data = form.serialize();
      response = AjaxRequest.fire(urls.tool_fm_bss, data) ;

      $('#forms-tool_builder-btn1').prop('disabled', false);   

      // return false ;
      
      if(response.status){
          
          Toastr.success(response.msg.desc,'Go To Next Step');  
          $("#form-income").find('input[type=text],input[type=email],textarea').val('');

          return false;
      }
      else{
          Toastr.error(response.msg.desc,'Error');
        
          return false;
      }
      return false;
    },
    tool_fm_cfs : function(form) {
                            

      $('#forms-tool_builder-btn1').prop('disabled', true);  
      
      var data = form.serialize();
      response = AjaxRequest.fire(urls.tool_fm_cfs, data) ;

      $('#forms-tool_builder-btn1').prop('disabled', false);   

      // return false ;
      
      if(response.status){
          
          Toastr.success(response.msg.desc,'Go To Next Step');  
          $("#form-income").find('input[type=text],input[type=email],textarea').val('');

          return false;
      }
      else{
          Toastr.error(response.msg.desc,'Error');
        
          return false;
      }
      return false;
  },



    evaluation: function (form) {
      // Disable the submit button to prevent repeated clicks:
      $('#forms-evaluation-btn').prop('disabled', true);
      var data = form.serialize();
      response = AjaxRequest.fire(urls.evaluation, data);
      $('#forms-evaluation-btn').prop('disabled', false);

      if (response.status) {
        Toastr.success(response.msg, 'Success');
        window.location = response.url;
        return false;
      }
      else {
        Toastr.error(response.msg.desc, 'Error');
        return false;
      }
      return false;
    },

    verify: function (form) {
      // Disable the submit button to prevent repeated clicks:
      $('#verify-btn').prop('disabled', true);

      var data = form.serialize();
      response = AjaxRequest.fire(urls.verify, data);
      // return false;    
      $('#verify-btn').prop('disabled', false);
      if (response.status) {
        Toastr.success(response.msg, 'Success');
        window.location = response.url;
        return false;
      }
      else {
        Toastr.error(response.msg, 'Error');
        return false;
      }
      // return false;
    },


    quiz: function (form) {

      // Disable the submit button to prevent repeated clicks:
      $('#forms-quiz-btn').prop('disabled', true);

      var data = form.serialize();
      response = AjaxRequest.fire(urls.quiz, data);
      // return false;  
      $('#forms-quiz-btn').prop('disabled', false);
      deleteAllCookies();
      window.location = response.url;
      return false;
    },

    comments: function (form) {
      // Disable the submit button to prevent repeated clicks:
      $('#forms-comments-btn').prop('disabled', true);

      var data = form.serialize();
      response = AjaxRequest.fire(urls.comments, data);
      // return false;    

      $('#forms-comments-btn').prop('disabled', false);
      if (response.status) {
        Toastr.success(response.msg.desc, 'Success');
        // $("#forms-comment").find('input[type=text],input[type=email],textarea').val('');
        return false;
      }
      else {
        Toastr.error(response.msg.desc, 'Error');
        //Toastr.error('Error Found please try again','Error');
        return false;
      }
      // return false;
    },

    //for file upload
    advertisment: function (form) {

      // Disable the submit button to prevent repeated clicks:
      $('#forms-advertisment-btn').prop('disabled', true);

      var data = new FormData(document.getElementById('forms-advertisment'));
      response = FileUploadScript.fire(urls.advertisment, data, 'json');

      $('#forms-advertisment-btn').prop('disabled', false);

      // console.log(response);            
      // return false; //debugging

      if (response.status == 0) {
        Toastr.error(response.msg.desc, 'Error');
        return false;
      }
      else if (response.status == 1) {

        Toastr.success(response.msg.desc, '');
        $("#forms-advertisment").find('input[type=text],input[type=email],textarea,input[type=file],select').val('');
        $("#profile-img-tag").attr("src", base_url + "assets/front_assets/images/wordpress.jpg");
        //FOR GOOGLE CAPTCHA RESET:
        // grecaptcha.reset();
        $("#file").text("Upload your photos");
        // console.log(response);
        window.setTimeout(function () {
          window.location = response.msg.url;
        }, 1000);

        return false;
      }
      else {
        Toastr.error('Error Found please try again', 'Error');
        return false;
      }
    },

    newsletter: function (form) {
      // Disable the submit button to prevent repeated clicks:
      form.find('#forms-newsletter-btn').prop('disabled', true);

      var data = form.serialize();

      response = AjaxRequest.fire(urls.newsletter, data);

      // BTN Disabled
      form.find('#forms-newsletter-btn').prop('disabled', false);

      if (response.status == 0) {
        Toastr.error(response.txt, 'Error');
        return false;
      }
      else if (response.status == 1) {
        form.find('input[type=email],input[type=text]').val('');
        Toastr.success(response.txt, '');
        return false;
      }
      else {
        Toastr.error('Error Found please try again', 'Error');
        return false;
      }
    },

    signup: function (form) {
      form.find('#signup-btn').prop('disabled', true);

      var data = form.serialize();
      var s = AjaxRequest.fire(urls.signup, data);

      // return false;    //for debugging

      if (s.status) {
        form.find('#signup-btn').prop('disabled', false);

        form[0].reset();

        Toastr.success(s.msg.desc, s.msg.title, { positionClass: "toast-bottom-right" });

        if (s.redirect.status) {
          // setTimeout(function(){
          //     window.location.href = s.redirect.link;
          // },4000);
          //must verify link first

        }

      }
      else {
        //$("#signup-form_loading").show();
        form.find('#signup-btn').prop('disabled', false);
        Toastr.error(s.msg.desc, s.msg.title, { positionClass: "toast-bottom-right" });
      }
      return false;
    },



    forgot_password: function (form) {
      // Disable the submit button to prevent repeated clicks:
      form.find('#forgot_password-btn').prop('disabled', true);
      var data = form.serialize();
      var s = AjaxRequest.fire(urls.forgot_password, data);

      if (s.status) {

        form.find('#forgot_password-btn').prop('disabled', false);
        form[0].reset();

        Toastr.success(s.msg.desc, s.msg.title, { positionClass: "toast-bottom-right" });
        $('#myModal-forgot_password .close').trigger('click');

      }
      else {
        form.find('#forgot_password-btn').prop('disabled', false);
        Toastr.error(s.msg.desc, s.msg.title, { positionClass: "toast-bottom-right" });
      }

    },

    reset_password: function (form) {
      // Disable the submit button to prevent repeated clicks:
      form.find('#reset_password-btn').prop('disabled', true);
      var data = form.serialize();
      var s = AjaxRequest.fire(urls.reset_password, data);

      if (s.status) {

        form.find('#reset_password-btn').prop('disabled', false);
        form[0].reset();
        Toastr.success(s.msg.desc, s.msg.title, { positionClass: "toast-bottom-right" });

        // Location Redirection {START}
        window.location.href = base_url + "account/dashboard?msgtype=success&msg=" + s.msg.desc;
      }
      else {
        form.find('#reset_password-btn').prop('disabled', false);
        Toastr.error(s.msg.desc, s.msg.title, { positionClass: "toast-bottom-right" });
      }
    },


    signin: function (form) {
      // Disable the submit button to prevent repeated clicks:
      form.find('#signin-btn').prop('disabled', true);

      var data = form.serialize();
      var s = AjaxRequest.fire(urls.signin, data);

      // return false;    //for debugging
      if (s.status) {

        form.find('#signin-btn').prop('disabled', false);
        form[0].reset();

        Toastr.success(s.msg.desc, s.msg.title, { positionClass: "toast-bottom-right" });

        window.location = 'account-area';
        // if(s.redirect.status)
        // window.location.href = "<?=l('account/dashboard')?>?msgtype=success&msg="+s.msg.desc;
        // else
        //     window.location.href = "<?=l('account/dashboard')?>?msgtype=success&msg="+s.msg.desc;

      }
      else {
        form.find('#signin-btn').prop('disabled', false);
        Toastr.error(s.msg.desc, s.msg.title, { positionClass: "toast-bottom-right" });
      }

      return false;
    },




    update_profile: function (form) {

      var data = new FormData(document.getElementById('forms-update_profile'));

      // Submit action
      var response = FileUploadScript.fire(urls.update_profile, data, 'json');

      if (response.status) {
        Toastr.success(response.msg.desc, response.msg.title, 'toast-bottom-left');

        //location.reload();
        window.location.href = response.msg.url + '?msg=' + response.msg.desc + '&msgtype=success';
        return false;
      }
      else {
        Toastr.error(response.msg.desc, response.msg.title, 'toast-bottom-left');
        return false;
      }
    },


    update_about: function (form) {

      var data = new FormData(document.getElementById('update-about-form'));

      // Submit action
      var response = FileUploadScript.fire(urls.update_about, data, 'json');

      if (response.status) {
        Toastr.success(response.msg.desc, response.msg.title, 'toast-bottom-left');

        // Reload After 3sec
        setTimeout(function () { location.reload(); }, 3000);

        return false;
      }
      else {
        Toastr.error(response.msg.desc, response.msg.title, 'toast-bottom-left');
        return false;
      }
    },

    update_address: function (form) {

      // Disable the submit button to prevent repeated clicks:
      form.find('#update-address_info-btn').prop('disabled', true);
      var data = form.serialize();
      var response = AjaxRequest.fire(urls.update_address, data);

      if (response.status) {
        Toastr.success(response.msg.desc, response.msg.title, 'toast-bottom-left');

        return false;
      }
      else {
        Toastr.error(response.msg.desc, response.msg.title, 'toast-bottom-left');
        return false;
      }
    },


    update_contact_info: function (form) {

      // Disable the submit button to prevent repeated clicks:
      form.find('#update-contact_info-btn').prop('disabled', true);
      var data = form.serialize();
      var response = AjaxRequest.fire(urls.update_contact_info, data);

      if (response.status) {
        form.find('#update-contact_info-btn').prop('disabled', false);
        Toastr.success(response.msg.desc, response.msg.title, 'toast-bottom-left');
        return false;
      }
      else {
        form.find('#update-contact_info-btn').prop('disabled', false);
        Toastr.error(response.msg.desc, response.msg.title, 'toast-bottom-left');
        return false;
      }
    },


    change_password: function (form) {

      // Disable the submit button to prevent repeated clicks:
      form.find('#update-change_password-btn').prop('disabled', true);

      var data = form.serialize();
      var response = AjaxRequest.fire(urls.change_password, data);

      if (response.status) {
        form.find('#update-change_password-btn').prop('disabled', false);

        Toastr.success(response.msg.desc, response.msg.title, 'toast-bottom-left');

        $("#update-change_password-form .form-control").val('');

        window.location.reload();

        return false;
      }
      else {
        form.find('#update-change_password-btn').prop('disabled', false);
        Toastr.error(response.msg.desc, response.msg.title, 'toast-bottom-left');
        return false;
      }
    },


    tool_fm_beps : function(form) {
                            

      $('#forms-tool_builder-btn1').prop('disabled', true);  
      
      var data = form.serialize();
      response = AjaxRequest.fire(urls.tool_fm_beps, data) ;

      $('#forms-tool_builder-btn1').prop('disabled', false);   

      // return false ;
      
      if(response.status){
          
          Toastr.success(response.msg.desc,'Go To Next Step');  
          $("#form-beps").find('input[type=text],input[type=email],textarea').val('');

          return false;
      }
      else{
          Toastr.error(response.msg.desc,'Error');
        
          return false;
      }
      return false;
  },



      tool_fm_dcvm : function(form) {
                                  

          $('#forms-tool_builder-btn1').prop('disabled', true);  
          
          var data = form.serialize();
          response = AjaxRequest.fire(urls.tool_fm_dcvm, data) ;

          $('#forms-tool_builder-btn1').prop('disabled', false);   

          // return false ;
          
          if(response.status){
              
              Toastr.success(response.msg.desc,'Go To Next Step');  
              $("#form-beps").find('input[type=text],input[type=email],textarea').val('');

              return false;
          }
          else{
              Toastr.error(response.msg.desc,'Error');
            
              return false;
          }
          return false;
      },



  }; // End of class return

}(); // End of Script



$(document).ready(function () {
  Form.init();
});





$(function () {
  var $form = $('#form-send_us1');
  $form.submit(function (event) {
    Form.form_cto($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-send_us2');
  $form.submit(function (event) {
    Form.form_cto($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-send_us3');
  $form.submit(function (event) {
    Form.form_cto($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-send_us4');
  $form.submit(function (event) {
    Form.form_cto($form);
    return false;
  });
}); $(function () {
  var $form = $('#form-send_us5');
  $form.submit(function (event) {
    Form.form_cto($form);
    return false;
  });
}); $(function () {
  var $form = $('#form-send_us6');
  $form.submit(function (event) {
    Form.form_cto($form);
    return false;
  });
}); $(function () {
  var $form = $('#form-send_us7');
  $form.submit(function (event) {
    Form.form_cto($form);
    return false;
  });
}); $(function () {
  var $form = $('#form-send_us8');
  $form.submit(function (event) {
    Form.form_cto($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-send_us9');
  $form.submit(function (event) {
    Form.form_cto($form);
    return false;
  });
});



//   for bms multi form 


$(function () {
  var $form = $('#regForm10');
  $form.submit(function (event) {
    Form.tool_business_multi($form);
    return false;
  });
});
$(function () {
  var $form = $('#regForm11');
  $form.submit(function (event) {
    Form.tool_business_multi($form);
    return false;
  });
});
$(function () {
  var $form = $('#regForm12');
  $form.submit(function (event) {
    Form.tool_business_multi($form);
    return false;
  });
});
$(function () {
  var $form = $('#regForm13');
  $form.submit(function (event) {
    Form.tool_business_multi($form);
    return false;
  });
}); $(function () {
  var $form = $('#regForm14');
  $form.submit(function (event) {
    Form.tool_business_multi($form);
    return false;
  });
}); $(function () {
  var $form = $('#regForm15');
  $form.submit(function (event) {
    Form.tool_business_multi($form);
    return false;
  });
}); $(function () {
  var $form = $('#regForm16');
  $form.submit(function (event) {
    Form.tool_business_multi($form);
    return false;
  });
}); $(function () {
  var $form = $('#regForm17');
  $form.submit(function (event) {
    Form.tool_business_multi($form);
    return false;
  });
});
$(function () {
  var $form = $('#regForm18');
  $form.submit(function (event) {
    Form.tool_business_multi($form);
    return false;
  });
});


//   for bms multi form end 


//   for business vp


$(function () {
  var $form = $('#form-vp1');
  $form.submit(function (event) {
    Form.tool_vp($form);
    return false;
  });
});

$(function () {
  var $form = $('#form-vp2');
  $form.submit(function (event) {
    Form.tool_vp($form);
    return false;
  });
});




//   for business vp end



//   for business mc

$(function () {
  var $form = $('#form-mcmc1');
  $form.submit(function (event) {
    Form.tools_mc($form);
    return false;
  });
});

//   for business cjdg

$(function () {
  var $form = $('#form-cjdg1');
  $form.submit(function (event) {
    Form.tools_cjdg($form);
    return false;
  });
});



$(function () {
  var $form = $('#form-cjdg2');
  $form.submit(function (event) {
    Form.tools_cjdg($form);
    return false;
  });
});

$(function () {
  var $form = $('#form-cjdg3');
  $form.submit(function (event) {
    Form.tools_cjdg($form);
    return false;
  });
});

//   for business cjdg Ends

//   for business osf


$(function () {
  var $form = $('#form-osf');
  $form.submit(function (event) {
    Form.tools_osf($form);
    return false;
  });
});
//   for swot tool


$(function () {
  var $form = $('#form-send_swot1');
  $form.submit(function (event) {
    Form.tool_swot($form);
    return false;
  });
});


$(function () {
  var $form = $('#form-smp');
  $form.submit(function (event) {
    Form.tools_smp($form);
    return false;
  });
});



//   for swot tool end



//   for pmmt tool


$(function () {
  var $form = $('#form-pmmt1');
  $form.submit(function (event) {
    Form.tool_pmmt($form);
    return false;
  });
});

$(function () {
  var $form = $('#form-pmmt2');
  $form.submit(function (event) {
    Form.tool_pmmt($form);
    return false;
  });
});



//   for pmmt tool end



//   for fm_income tool


$(function () {
  var $form = $('#form-income');
  $form.submit(function (event) {
    Form.tool_fm_income($form);
    return false;
  });
});



//   for fm_income tool end

//   for fm_lts tool


$(function () {
  var $form = $('#form-lts1');
  $form.submit(function (event) {
    Form.tool_lts($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-lts2');
  $form.submit(function (event) {
    Form.tool_lts($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-lts3');
  $form.submit(function (event) {
    Form.tool_lts($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-lts4');
  $form.submit(function (event) {
    Form.tool_lts($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-lts5');
  $form.submit(function (event) {
    Form.tool_lts($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-lts6');
  $form.submit(function (event) {
    Form.tool_lts($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-lts7');
  $form.submit(function (event) {
    Form.tool_lts($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-lts8');
  $form.submit(function (event) {
    Form.tool_lts($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-lts9');
  $form.submit(function (event) {
    Form.tool_lts($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-lts10');
  $form.submit(function (event) {
    Form.tool_lts($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-lts11');
  $form.submit(function (event) {
    Form.tool_lts($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-lts12');
  $form.submit(function (event) {
    Form.tool_lts($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-lts13');
  $form.submit(function (event) {
    Form.tool_lts($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-lts14');
  $form.submit(function (event) {
    Form.tool_lts($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-lts15');
  $form.submit(function (event) {
    Form.tool_lts($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-lts16');
  $form.submit(function (event) {
    Form.tool_lts($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-lts17');
  $form.submit(function (event) {
    Form.tool_lts($form);
    return false;
  });
});

//   for fm_ids tool

//   for fm_cfs tool


$(function() {
  var $form = $('#form-cfs');
  $form.submit(function(event) {
    Form.tool_fm_cfs($form);
    return false;
  });
});  

 

//   for fm_cfs tool end


//   for fm_bss tool


$(function() {
  var $form = $('#form-bss');
  $form.submit(function(event) {
    Form.tool_fm_bss($form);
    return false;
  });
});  

 

//   for fm_bss tool end



$(function () {
  var $form = $('#form-ids1');
  $form.submit(function (event) {
    Form.tool_ids($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-ids2');
  $form.submit(function (event) {
    Form.tool_ids($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-ids3');
  $form.submit(function (event) {
    Form.tool_ids($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-ids4');
  $form.submit(function (event) {
    Form.tool_ids($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-ids5');
  $form.submit(function (event) {
    Form.tool_ids($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-ids6');
  $form.submit(function (event) {
    Form.tool_ids($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-ids7');
  $form.submit(function (event) {
    Form.tool_ids($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-ids8');
  $form.submit(function (event) {
    Form.tool_ids($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-ids9');
  $form.submit(function (event) {
    Form.tool_ids($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-ids10');
  $form.submit(function (event) {
    Form.tool_ids($form);
    return false;
  });
});
$(function () {
  var $form = $('#form-ids11');
  $form.submit(function (event) {
    Form.tool_ids($form);
    return false;
  });
});

//   for fm_ids tool end

//   for fm_cfs tool


$(function() {
  var $form = $('#form-cfs');
  $form.submit(function(event) {
    Form.tool_fm_cfs($form);
    return false;
  });
});  

 

//   for fm_cfs tool end


//   for fm_beps tool


$(function() {
  var $form = $('#form-beps');
  $form.submit(function(event) {
    Form.tool_fm_beps($form);
    return false;
  });
});  

 

//   for fm_beps tool end



//   for fm_dcvm tool


$(function() {
  var $form = $('#form-dcvm');
  $form.submit(function(event) {
    Form.tool_fm_dcvm($form);
    return false;
  });
});  

 

//   for fm_dcvm tool end


//   for fm_bss tool


$(function() {
  var $form = $('#form-bss');
  $form.submit(function(event) {
    Form.tool_fm_bss($form);
    return false;
  });
});  

 

//   for fm_bss tool end


/*###########
Contact us Ajax Script Start
###########*/
$(function () {
  var $form = $('#forms-contact_us');
  $form.submit(function (event) {
    Form.contact_us($form);
    return false;
  });
});

$(function () {
  var $form = $('#forms-review_us');
  $form.submit(function (event) {
    Form.course_review($form);
    return false;
  });
});

$(function () {
  var $form = $('#forms-tutorial-review_us');
  $form.submit(function (event) {
    Form.tutorial_review($form);
    return false;
  });
});


$(function () {
  var $form = $('#forms-partnership_inquiry');
  $form.submit(function (event) {
    Form.partnership_inquiry($form);
    return false;
  });
});

// $('#file').change(function(e) {
//                 var fileName  = e.target.files[0].name;
//                 // console.log(fileName);
//                 $("#filespan").text(fileName);
//             });

/*###########
Contact us Ajax Script END
###########*/

/*###########
Resume Ajax Script Start  + Advertismenty
###########*/
// $(function() {
//     var $form = $('#forms-resume');
//     $form.submit(function(event) {
//       Form.resume($form);
//       return false;
//     });
//   });
$(function () {
  var $form = $('#forms-advertisment');
  $form.submit(function (event) {
    Form.advertisment($form);
    return false;
  });
});


$('#file-input').change(function (e) {
  var fileName = e.target.files[0].name;
  // console.log(fileName);
  $("#filespan").text(fileName);
});


$("#resume-btn").click(function () {
  Toastr.error("Please Login To Proceed", 'Error');
  window.location = base_url + "/login";
  return false;
});

$("#post_job-btn").click(function () {
  Toastr.error("Please Login To Proceed", 'Error');

  setInterval(function () {
    window.location = base_url + "/login";
    return false;
  }, 3000);
});



/*###########
Resume Ajax Script END
###########*/


/*###########
JOBS FILTERS Script Start
###########*/

// // CATEGORY FILTER  AJAX VIEW
// $(".cid").click(function()
// {

// //  var arr = [];
// //  $("input:checkbox[class=bid]:checked").each(function () {   
// //  //           console.log($(this).attr("id") +   " Value: " + $(this).val());
// //  arr.push($(this).val());
// // });

// //  if (arr.length > 0) {

// //   $("input:checkbox[class=bid]").removeAttr('checked');
// //     // $("input:checkbox[class=cid]:checked").removeAttr('checked');
// //   }


//   var form_size = $("#category_form").serialize();
//   $("#loader_img").show();
//   $.ajax({
//     type: "POST",
//     url: base_url+"jobs/category_wise",
//     data:  form_size,
//     dataType: "json",

//     success: function(response)
//     {
//       $("#loader_img").hide();
//       $("#recentJobs").html(response.data);
//       // $("#grid").html(response.grid_data);
//     },    

//     beforeSend: function()
//     {
//       // Loader.show();
//       $("#loader_img").show();
//     }

//   });

// });

// // sid

// // SKILLS FILTER  AJAX VIEW
// $(".sid").click(function()
// {

//  var arr = [];
//  $("input:checkbox[class=rid]:checked").each(function () {   
//  //           console.log($(this).attr("id") +   " Value: " + $(this).val());
//  arr.push($(this).val());
// });

//  if (arr.length > 0) {

//   $("input:checkbox[class=rid]").removeAttr('checked');
//   // $("input:checkbox[class=cid]:checked").removeAttr('checked');
//   }


//   var form_size = $("#skills_form").serialize();

//     $("#loader_img").show();
//   $.ajax({
//     type: "POST",
//     url: base_url+"jobs/skills_search",
//     data:  form_size,
//     dataType: "json",

//     success: function(response)
//     {
//            $("#loader_img").hide();
//       $("#recentJobs").html(response.data);
//       // $("#grid").html(response.grid_data);
//     },    

//     beforeSend: function()
//     {
//       // Loader.show();
//            $("#loader_img").show();
//     }

//   });

// });

// //AJAX SALLARY RANGE
// $(".rid").click(function()
// {

// //  var arr = [];
// //  $("input:checkbox[class=bid]:checked").each(function () {   
// //  //           console.log($(this).attr("id") +   " Value: " + $(this).val());
// //  arr.push($(this).val());
// // });

// //  if (arr.length > 0) {

// //   $("input:checkbox[class=bid]").removeAttr('checked');
// //     // $("input:checkbox[class=cid]:checked").removeAttr('checked');
// //   }


//   var form_range = $("#form_salaryrange").serialize();
//   $.ajax({
//     type: "POST",
//     url: base_url+"jobs/ajax_salaryrange",
//     data:  form_range,
//     dataType: "json",

//     success: function(response)
//     {

//       $("#loader_img").hide();
//       $("#recentJobs").html(response.data);
//       // $("#grid").html(response.grid_data);
//     },    

//     beforeSend: function()
//     {
//       // Loader.show();
//       $("#loader_img").show();
//     }

//   });

// });

/*###########
JOBS FILTERS Script Start
###########*/


/*###########
Newsletter Ajax Script Start
###########*/
$(function () {
  var $form = $('#forms-newsletter');
  $form.submit(function (event) {
    Form.newsletter($form);
    return false;
  });
});

/*###########
Newsletter Ajax Script END
###########*/




/*###########
Signup Ajax Script Start
###########*/
$(function () {

  var $form = $('#forms-signup');
  $form.submit(function (event) {
    Form.signup($form);
    return false;
  });

});

if ($("#user_password").length > 0) {
  var password = document.getElementById("user_password")
  var confirm_password = document.getElementById("user_confirm_password");

  function validatePassword() {

    if (password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Passwords Don't Match");
    }
    else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
}

/*###########
Signup Ajax Script END
###########*/



/*###########
Signin Ajax Script START
###########*/
$(function () {
  var $form = $('#forms-signin');
  $form.submit(function (event) {
    Form.signin($form);
    return false;
  });
});



/*###########
Signin Ajax Script END
###########*/


/*###########
Forgot Password Ajax Script START
###########*/
$(function () {
  var $form = $('#forms-forgot_password');
  $form.submit(function (event) {
    Form.forgot_password($form);
    return false;
  });
});

$("body").on('click', '#forgot_password-callmodal', function () {
  $("#loginsec2").modal('toggle');

  setTimeout(function () {
    $("#myModal-forgot_password").modal();
  }, 500);
});
//$("#forgot_password").click(function(){
// $(".forgot_password").click(function(){
//     $("#myModal .close").trigger('click');


//     setTimeout(function(){
//         $("#myModal-forgot_password").modal();
//     },500);
// });




/*###########
Forgot Password Ajax Script END
###########*/


/*###########
Reset Password Ajax Script START
###########*/
jQuery(document).ready(function () {
  jQuery("#reset_password-btn").click(function () {
    var $form = $('#forms-reset_password');
    Form.reset_password($form);
  });

});

/*###########
Reset Password Ajax Script END
###########*/



/*###########
Update User Information Ajax Script START
###########*/
$(function () {
  var $form = $('#forms-update_profile');
  $form.submit(function (event) {
    Form.update_profile($form);
    return false;
  });
});

/*###########
Update User Information Ajax Script END
###########*/


/*###########
Update About Ajax Script START
###########*/
$(function () {
  var $form = $('#update-about-form');
  $form.submit(function (event) {
    Form.update_about($form);
    return false;
  });
});

/*###########
Update About Ajax Script END
###########*/


/*###########
Change Password Ajax Script START
###########*/
$(function () {
  var $form = $('#update-change_password-form');
  $form.submit(function (event) {
    Form.change_password($form);
    return false;
  });
});

/*###########
Change Password Ajax Script END
###########*/


/*###########
Update address Ajax Script START
###########*/
$(function () {
  var $form = $('#update-address_info-form');
  $form.submit(function (event) {
    Form.update_address($form);
    return false;
  });
});

/*###########
Update address Ajax Script END
###########*/


/*###########
Update Contact Info Ajax Script START
###########*/
$(function () {
  var $form = $('#update-contact_info-form');
  $form.submit(function (event) {
    Form.update_contact_info($form);
    return false;
  });
});

/*###########
Update Contact Info Ajax Script END
###########*/



/*###########
WEBSITE APP SCRIPT START
###########*/


$(function () {
  var $form = $('#forms-verify');
  $form.submit(function (event) {
    Form.verify($form);
    return false;
  });
});

$(function () {
  var $form = $('#form-quiz');
  $form.submit(function (event) {
    Form.quiz($form);
    return false;
  });
});

var timeoutHandle;
function countdown(minutes, stat) {
  var seconds = 60;
  var mins = minutes;

  if (getCookie("minutes") && getCookie("seconds") && stat) {
    var seconds = parseInt(getCookie("seconds"));
    var mins = parseInt(getCookie("minutes"));

  }

  function tick() {

    var counter = document.getElementById("timer");
    setCookie("minutes", mins, 10);
    setCookie("seconds", seconds, 10);
    var current_minutes = mins - 1;
    seconds--;
    counter.innerHTML =
      current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
    //save the time in cookie



    if (seconds > 0) {
      timeoutHandle = setTimeout(tick, 1000);
    } else {

      if (mins > 1) {
        setTimeout(function () { countdown(parseInt(mins) - 1, false); }, 1000);
      }
      $('#form-quiz').submit();

    }
  }
  tick();
}
function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires=" + d.toGMTString();
  document.cookie = cname + "=" + cvalue + "; " + expires;
}
function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') c = c.substring(1);
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
function deleteAllCookies() {
  var cookies = document.cookie.split(";");

  for (var i = 0; i < cookies.length; i++) {
    var cookie = cookies[i];
    var eqPos = cookie.indexOf("=");
    var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
    document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
  }
}
window.onload = function startingTimer() {
  //countdown(prompt("Enter how many minutes you want to count down:"),true);
  var course_quiz_timer = $("#course_quiz_timer").val();
  course_quiz_timer = parseInt(course_quiz_timer);

  countdown(course_quiz_timer, true);
  //   countdown(2,true);
}



$(function () {
  var $form = $('#forms-comments');
  $form.submit(function (event) {
    Form.comments($form);
    return false;
  });
});

$(function () {
  var $form = $('#forms-evaluation');
  $form.submit(function (event) {
    Form.evaluation($form);
    return false;
  });
});


$("body").on('click', '.c_detail', function () {
  var datalink = $(this).attr("data-link");
  var data_package = $(this).attr("data-package-link");

  $("#detail_page").attr("href", datalink);
  $("#course_package").attr("href", data_package);
});


$("body").on('click', '.cpackage', function () {

  var id = $(this).attr('data-id');
  var type = $(this).attr('data-type');

  $("#cardpayment").attr("data-id", id);
  $("#cardpayment").attr("data-type", type);

  $("#paypal").attr("data-id", id);
  $("#paypal").attr("data-type", type);

  // var data = {id:id,type:type}
  // var url = base_url+"course/ajax_saveOrder";
  // response = AjaxRequest.fire(url, data) ;  

  $("#PaymentMethodModal").modal('show');
});


$("body").on('click', '.course_lecture', function () {

  var id = $(this).attr('data-id');
  var data = { id: id }
  var url = base_url + "account/courses/ajax_getlectures";
  response = AjaxRequest.fire(url, data);

  $("#listing").html(response.data);
  $("#modal_lecture").modal('show');
});


$("body").on('click', '.payment-btn', function () {

  var id = $(this).attr("data-id");
  var type = $(this).attr("data-type");
  var payment = $(this).attr("data-payment");

  var data = { id: id, type: type, payment: payment }
  var url = base_url + "course/ajax_saveOrder";
  response = AjaxRequest.fire(url, data);

  if (response.status == 1) {
    window.location.href = response.url;
  }
  else {
    Toastr.error(response.msg.desc, 'Error');
  }
  return false;
});


//home page packages
$("body").on('click', '.package-book-btn-valid', function () {

  window.location = base_url + "business-advertisment?msgtype=error&msg=Please first fill up the advertisment request.";
  return false;

});




$("body").on('click', '#btn_applyjob', function () {

  var jobid = $(this).attr("data-job-id");
  var data = { jobid: jobid }
  var url = base_url + "jobs/ajax_login_check";
  response = AjaxRequest.fire(url, data);


  if (response.status == 0) {
    window.location.href = response.url;
  }
  else {
    if (response.msg.status == 1) {
      Toastr.success(response.msg.txt, 'Success');
    } else {
      Toastr.error(response.msg.txt, 'Note');
    }
  }
  // hide_preload();
  return false;
});

/*###########
WEBSITE APP SCRIPT END
###########*/


// function playVid() { 
//     var vid = document.getElementById("video_preview"); 
//     vid.play(); 
// }

// function pauseVid() { 
//     var vid = document.getElementById("video_preview"); 
//     vid.pause(); 
// }

// $("body").on('click','.view_this_speaker_video',function(){
//     var src = $(this).attr("data-url");
//     var title = $(this).attr("data-title");

//     //var html = '<video width="100%" controls>';
//     var html = '<video id="video_preview" width="100%" controls>';
//     html += '<source src="'+src+'" type="video/mp4">';
//     //html += '<source src="mov_bbb.ogg" type="video/ogg">';
//     html += 'Your browser does not support HTML5 video.';
//     html += '</video>';

//     Modal.load(title,html);
//     playVid();
// });

// $("body").on('click','.close',function(){

//     var data = {set_cookie:1};
//     var cookie_url = base_url+"home/setcookie";
//     response = AjaxRequest.fire(cookie_url, data) ;    
//        hide_preload();
//      if( response.status ) {
//                 return false;
//             }

// });



/**
    Image Change Function for about us START
*/
function readURL(input) {
  var filename = input.files[0]['name'];

  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#profile-img-tag').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#profile-img").change(function () {
  readURL(this);
});


//***Image Change Function for about us END*/