/*
 * Form Validation
 */
$(function () {
  jQuery.validator.addMethod(
    "noSpace",
    function (value, element) {
      var length = $.trim(value).length;
      if (length == 0) {
        return false;
      } else {
        return true;
      }
    },
    "No space please and don't leave it empty"
  );

  $("#course_vali").validate({
    rules: {
      name: {
        required: true,
      },
      title: {
        required: true,
      },
      description: {
        required: true,
      },
      duration: {
        required: true,
      },
      price: {
        required: true,
      },
      // image1: {
      //   required: true,
      // },
      pincode: {
        required: false,
      },
    },
    messages: {
      name: {
        required: "This field is required",
      },
      title: {
        required: "This field is required",
      },

      description: {
        required: "This field is required",
      },
      duration: {
        required: "This field is required",
      },
      price: {
        required: "This field is required",
      },
      // image1: {
      //   required: "This field is required",
      // },
      
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      var placement = $(element).data("error");
      if (placement) {
        $(placement).append(error);
      } else {
        error.insertAfter(element);
      }
    },
  });

  // $("#edit_course").validate({
  //   rules: {
  //     name: {
  //       required: true,
  //     },
  //     title: {
  //       required: true,
  //     },
  //     description: {
  //       required: true,
  //     },
  //     duration: {
  //       required: true,
  //     },
  //     price: {
  //       required: true,
  //     },
  //   },
  //   messages: {
  //     name: {
  //       required: "This field is required",
  //     },
  //     title: {
  //       required: "This field is required",
  //     },

  //     description: {
  //       required: "This field is required",
  //     },
  //     duration: {
  //       required: "This field is required",
  //     },
  //     price: {
  //       required: "This field is required",
  //     },
  //   },
  //   errorElement: "div",
  //   errorPlacement: function (error, element) {
  //     var placement = $(element).data("error");
  //     if (element.attr("name") == "description") {
  //       error.appendTo(element.parent("div"));
  //     } else if (placement) {
  //       $(placement).append(error);
  //     } else {
  //       error.insertAfter(element);
  //     }
  //   },
  // });

  $("#add_coursevdeo").validate({
    rules: {
      name: {
        required: true,
      },
      title: {
        required: true,
      },
      description: {
        required: true,
      },
      image1: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "This field is required",
      },
      title: {
        required: "This field is required",
      },

      description: {
        required: "This field is required",
      },
      image1: {
        required: "This field is required",
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      var placement = $(element).data("error");
      if (placement) {
        $(placement).append(error);
      } else {
        error.insertAfter(element);
      }
    },
  });

  
  $("#add_user").validate(
    {
    rules: {
      name: {
        required: true,
      },
      last_name: {
        required: true,
      },
      email: {
        required: true,
      },
      password: {
        required: true,
      },
      mobile_number: {
        required: true,
      },
      date_of_birth: {
        required: true,
      },
      gender: {
        required: true,
      },
      pincode: {
        required: true,
      },
      occupation: {
        required: true,
      },
      education: {
        required: true,
      },
      hobby: {
        required: true,
      },
      heard_about_us: {
        required: true,
      },
      area_of_interest: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "This field is required",
      },
      last_name: {
        required: "This field is required",
      },
      email: {
        required: "This field is required",
      },
      date_of_birth: {
        required: "This field is required",
      },
      password: {
        required: "This field is required",
      },
      mobile_number: {
        required: "This field is required",
      },
      gender: {
        required: "This field is required",
      },
      pincode: {
        required: "This field is required",
      },
      occupation: {
        required: "This field is required",
      },
      education: {
        required: "This field is required",
      },
      hobby: {
        required: "This field is required",
      },
      heard_about_us: {
        required: "This field is required",
      },
      area_of_interest: {
        required: "This field is required",
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      var placement = $(element).data("error");
      if (placement) {
        $(placement).append(error);
      } else {
        error.insertAfter(element);
      }
    },
  });
  $("#edit_user").validate({
    rules: {
      name: {
        required: true,
      },
      last_name: {
        required: true,
      },
      email: {
        required: true,
      
      },
      mobile_number: {
        required: true,
      },
      date_of_birth: {
        required: true,
      },
      gender: {
        required: true,
      },
      pincode: {
        required: true,
      },
      occupation: {
        required: true,
      },
      education: {
        required: true,
      },
      hobby: {
        required: true,
      },
      heard_about_us: {
        required: true,
      },
      area_of_interest: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "This field is required",
      },
      last_name: {
        required: "This field is required",
      },
      email: {
        required: "This field is required",
        // remote: "Email already exists",
      },
      mobile_number: {
        required: "This field is required",
      },
      date_of_birth: {
        required: "This field is required",
      },
      gender: {
        required: "This field is required",
      },
      pincode: {
        required: "This field is required",
      },
      occupation: {
        required: "This field is required",
      },
      education: {
        required: "This field is required",
      },
      hobby: {
        required: "This field is required",
      },
      heard_about_us: {
        required: "This field is required",
      },
      area_of_interest: {
        required: "This field is required",
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      var placement = $(element).data("error");
      if (placement) {
        $(placement).append(error);
      } else {
        error.insertAfter(element);
      }
    },
  });

  $("#add_ad_reg").validate({
    rules: {
      name: {
        required: true,
      },
      last_name: {
        required: true,
      },
      email_id: {
        noSpace: true,
        required: true,
        remote: {
          url: BASE_URL + "backend/Ajax/CheckExistingAdminEmail",
          type: "post",
          data: {
            email_id: function () {
              return $("#email_id").val();
            },
          
          },
        },
      },
      date_of_birth: {
        required: true,
      },
      mobile_number: {
        required: true,
      },
      gender: {
        required: true,
      },
      pincode: {
        required: true,
      },
      occupation: {
        required: true,
      },
      education: {
        required: true,
      },
      hobby: {
        required: true,
      },
      heard_about_us: {
        required: true,
      },
      area_of_interest: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "This field is required",
      },
      last_name: {
        required: "This field is required",
      },
      email_id: {
        required: "This field is required",
        remote: "Email already exists",
      },
      date_of_birth: {
        required: "This field is required",
      },
      mobile_number: {
        required: "This field is required",
      },
      gender: {
        required: "This field is required",
      },
      pincode: {
        required: "This field is required",
      },
      occupation: {
        required: "This field is required",
      },
      education: {
        required: "This field is required",
      },
      hobby: {
        required: "This field is required",
      },
      heard_about_us: {
        required: "This field is required",
      },
      area_of_interest: {
        required: "This field is required",
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      var placement = $(element).data("error");
      if (placement) {
        $(placement).append(error);
      } else {
        error.insertAfter(element);
      }
    },
  });
  $("#edit_reg").validate({
    rules: {
      name: {
        required: true,
      },
      last_name: {
        required: true,
      },
      email_id: {
        noSpace: true,
        required: true,
        remote: {
          url: BASE_URL + "backend/Ajax/CheckExistingAdminEmail",
          type: "post",
          data: {
            email_id: function () {
              return $("#email_id").val();
            },
            id: function () {
              return $("#id").val();
            },
          },
        },
      },
      mobile_number: {
        required: true,
      },
      date_of_birth: {
        required: true,
      },
      gender: {
        required: true,
      },
      pincode: {
        required: true,
      },
      occupation: {
        required: true,
      },
      education: {
        required: true,
      },
      hobby: {
        required: true,
      },
      heard_about_us: {
        required: true,
      },
      area_of_interest: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "This field is required",
      },
      last_name: {
        required: "This field is required",
      },
      email_id: {
        required: "This field is required",
        remote: "Email already exists",
      },
      mobile_number: {
        required: "This field is required",
      },
      date_of_birth: {
        required: "This field is required",
      },
      gender: {
        required: "This field is required",
      },
      pincode: {
        required: "This field is required",
      },
      occupation: {
        required: "This field is required",
      },
      education: {
        required: "This field is required",
      },
      hobby: {
        required: "This field is required",
      },
      heard_about_us: {
        required: "This field is required",
      },
      area_of_interest: {
        required: "This field is required",
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      var placement = $(element).data("error");
      if (placement) {
        $(placement).append(error);
      } else {
        error.insertAfter(element);
      }
    },
  });
  $("#manager_reg").validate({
    rules: {
     
      first_name: {
        required: true,
      },
      password: {
        required: true,
      },
      email_id: {
        noSpace: true,
        required: true,
        remote: {
          url: BASE_URL + "backend/Ajax/CheckExistingAdminEmail",
          type: "post",
          data: {
            // email_id:$("#email_id").val(),
            // id:$("#id").val(),
            email_id: function () {
              return $("#email_id").val();
            },
            id: function () {
              return $("#id").val();
            },
           
            
          },
        },
      },
      permissions: {
        required: true,
      },
    },
    messages: {
  
      first_name: {
        required: "This field is required",
      },
      password: {
        required: "This field is required",
      },
      email_id: {
        required: "This field is required",
        remote: "Email already exists",
      },
      permissions: {
        required: "This field is required",
      },
    
    
    },
    
    errorElement: "div",
    errorPlacement: function (error, element) {
      // console.log(element.attr('id'));
    //   console.log($("permission_error"));
    //   id = $(element).attr("id");
    //   // console.log(id);
    //   if (id == "permissions") {
    //     // custom placement
    //     console.log('hi');
    //     error.insertAfter($("#permission_error").wrap('<li/>'));
    // }
    select2label=$('.select_2_error');
        if(element.hasClass('permissions')){
          error.insertAfter(element.next('.permissions')).addClass('mt-2 text-danger');
          select2label.html(error);
        }
        else{
          error.addClass('mt-2 text-danger');
          error.insertAfter(element);
        }

      
      // var placement = $(element).data("error");
      // if (element.hasClass('permissions')) {
      //   label.insertAfter(element.next('.select2-container')).addClass('mt-2 text-danger');
      //   select2label = label
      // } else {
      //   label.addClass('mt-2 text-danger');
      //   label.insertAfter(element);
      // }
      // if (placement) {
      //   $(placement).append(error);
      // } else {
      //   error.insertAfter(element);
      // }
    },
  });


  $("#manager_upd").validate({
    rules: {
     
      first_name: {
        required: true,
      },
      password: {
        required: false,
      },
      email_id: {
        noSpace: true,
        required: true,
        remote: {
          url: BASE_URL + "backend/Ajax/CheckExistingAdminEmail",
          type: "post",
          data: {
            // email_id:$("#email_id").val(),
            // id:$("#id").val(),
            email_id: function () {
              return $("#email_id").val();
            },
            id: function () {
              return $("#id").val();
            },
           
            
          },
        },
      },
      permissions: {
        required: true,
      },
   
   
    },
    messages: {
  
      first_name: {
        required: "This field is required",
      },
      password: {
        required: "This field is required",
      },
      email_id: {
        required: "This field is required",
        remote: "Email already exists",
      },
      permissions: {
        required: "This field is required",
      },
    
    
    },
    
    errorElement: "div",
    errorPlacement: function (error, element) {
      // console.log(element.attr('id'));
    //   console.log($("permission_error"));
    //   id = $(element).attr("id");
    //   // console.log(id);
    //   if (id == "permissions") {
    //     // custom placement
    //     console.log('hi');
    //     error.insertAfter($("#permission_error").wrap('<li/>'));
    // }
    select2label=$('.select_2_error');
        if(element.hasClass('permissions')){
          error.insertAfter(element.next('.permissions')).addClass('mt-2 text-danger');
          select2label.html(error);
        }
        else{
          error.addClass('mt-2 text-danger');
          error.insertAfter(element);
        }

      
      // var placement = $(element).data("error");
      // if (element.hasClass('permissions')) {
      //   label.insertAfter(element.next('.select2-container')).addClass('mt-2 text-danger');
      //   select2label = label
      // } else {
      //   label.addClass('mt-2 text-danger');
      //   label.insertAfter(element);
      // }
      // if (placement) {
      //   $(placement).append(error);
      // } else {
      //   error.insertAfter(element);
      // }
    },
  });

  $("#edit_coursevideo").validate({
    rules: {
      name: {
        required: true,
      },
      title: {
        required: true,
      },
      description: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "This field is required",
      },
      title: {
        required: "This field is required",
      },

      description: {
        required: "This field is required",
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      var placement = $(element).data("error");
      if (element.attr("name") == "description") {
        error.appendTo(element.parent("div"));
      } else if (placement) {
        $(placement).append(error);
      } else {
        error.insertAfter(element);
      }
    },
  });

  $("#add_school").validate({
    rules: {
      name: {
        required: true,
        noSpace: true,
      },
      password: {
        required: true,
        noSpace: true,
      },
      email_id: {
        noSpace: true,
        required: true,
        remote: {
          url: BASE_URL + "backend/Ajax/CheckExisting",
          type: "post",
          data: {
            type: $('[name="type"]').val(),
          },
        },
      },
      mobile: {
        required: true,
        minlength: 10,
        maxlength: 10,
        remote: {
          url: BASE_URL + "backend/Ajax/CheckExisting",
          type: "post",
          data: {
            type: $('[name="type"]').val(),
          },
        },
      },
    },
    messages: {
      name: {
        required: "This field is required",
      },
      password: {
        required: "This field is required",
      },
      email_id: {
        required: "This field is required",
        remote: "Email already exists",
      },
      mobile: {
        required: "This field is required",
        remote: "Mobile Number already exists",
        minlength: "Invalid Number",
        maxlength: "Invalid Number",
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      var placement = $(element).data("error");
      if (placement) {
        $(placement).append(error);
      } else {
        error.insertAfter(element);
      }
    },
  });

  $("#edit_school").validate({
    rules: {
      name: {
        required: true,
        noSpace: true,
      },
      email_id: {
        noSpace: true,
        required: true,
        remote: {
          url: BASE_URL + "backend/Ajax/CheckExisting",
          type: "post",
          data: {
            id: $('[name="id"]').val(),
            type: $('[name="type"]').val(),
          },
        },
      },
      mobile: {
        required: true,
        minlength: 10,
        maxlength: 10,
        remote: {
          url: BASE_URL + "backend/Ajax/CheckExisting",
          type: "post",
          data: {
            id: $('[name="id"]').val(),
            type: $('[name="type"]').val(),
          },
        },
      },
    },
    messages: {
      name: {
        required: "This field is required",
      },
      email_id: {
        required: "This field is required",
        remote: "Email already exists",
      },
      mobile: {
        required: "This field is required",
        remote: "Mobile Number already exists",
        minlength: "Invalid Number",
        maxlength: "Invalid Number",
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      var placement = $(element).data("error");
      if (element.attr("name") == "description") {
        error.appendTo(element.parent("div"));
      } else if (placement) {
        $(placement).append(error);
      } else {
        error.insertAfter(element);
      }
    },
  });

  $("#add_student").validate({
    rules: {
      first_name: {
        required: true,
        noSpace: true,
      },
      last_name: {
        required: true,
        noSpace: true,
      },
      student_code: {
        required: true,
        noSpace: true,
        remote: {
          url: BASE_URL + "backend/Ajax/CheckExisting",
          type: "post",
          data: {
            type: $('[name="type"]').val(),
          },
        },
      },
      father_mobile: {
        required: true,
        number: true,
        minlength: 10,
        maxlength: 10,
        remote: {
          url: BASE_URL + "backend/Ajax/CheckExisting",
          type: "post",
          data: {
            type: $('[name="type"]').val(),
          },
        },
      },
      password: {
        required: true,
      },
    },
    messages: {
      first_name: {
        required: "This field is required",
      },
      last_name: {
        required: "This field is required",
      },
      student_code: {
        required: "This field is required",
        remote: "Student Code already exists",
      },
      father_mobile: {
        required: "This field is required",
        number: "only number are allowed",
        minlength: "invalid number",
        maxlength: "invalid number",
        remote: "Father's Mobile No already exists",
      },
      password: {
        required: "This field is required",
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      var placement = $(element).data("error");
      if ($(element).is("select")) {
        element.next().after(error); // special placement for select elements
      } else {
        error.insertAfter(element);
      }
    },
  });
  $("#edit_student").validate({
    rules: {
      first_name: {
        required: true,
        noSpace: true,
      },
      last_name: {
        required: true,
        noSpace: true,
      },
      student_code: {
        required: true,
        noSpace: true,
        remote: {
          url: BASE_URL + "backend/Ajax/CheckExisting",
          type: "post",
          data: {
            id: $('[name="id"]').val(),
            type: $('[name="type"]').val(),
          },
        },
      },
      father_mobile: {
        required: true,
        number: true,
        minlength: 10,
        maxlength: 10,
        remote: {
          url: BASE_URL + "backend/Ajax/CheckExisting",
          type: "post",
          data: {
            id: $('[name="id"]').val(),
            type: $('[name="type"]').val(),
          },
        },
      },
      password: {
        required: true,
      },
    },
    messages: {
      first_name: {
        required: "This field is required",
      },
      last_name: {
        required: "This field is required",
      },
      student_code: {
        required: "This field is required",
        remote: "Student Code already exists",
      },
      father_mobile: {
        required: "This field is required",
        number: "only number are allowed",
        minlength: "invalid number",
        maxlength: "invalid number",
        remote: "Father's Mobile No already exists",
      },
      password: {
        required: "This field is required",
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      var placement = $(element).data("error");
      if ($(element).is("select")) {
        element.next().after(error); // special placement for select elements
      } else {
        error.insertAfter(element);
      }
    },
  });

  $("#add_feeds").validate({
    rules: {
      title: {
        required: true,
        noSpace: true,
      },
      description: {
        noSpace: true,
        required: true,
      },
      media: {
        required: true,
      },
      feed_type: {
        required: true,
      },
    },
    messages: {
      title: {
        required: "This field is required",
      },
      description: {
        required: "This field is required",
      },
      feed_type: {
        required: "This field is required",
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      var placement = $(element).data("error");
      if (element.attr("name") == "feed_type") {
        error.appendTo(element.parent("div"));
      } else if ($(element).is("select")) {
        element.next().after(error); // special placement for select elements
      } else {
        error.insertAfter(element);
      }
    },
  });

  $("#edit_feeds").validate({
    rules: {
      title: {
        required: true,
        noSpace: true,
      },
      description: {
        noSpace: true,
        required: true,
      },
      feed_type: {
        required: true,
      },
    },
    messages: {
      title: {
        required: "This field is required",
      },
      description: {
        required: "This field is required",
      },
      feed_type: {
        required: "This field is required",
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      var placement = $(element).data("error");
      if (element.attr("name") == "feed_type") {
        error.appendTo(element.parent("div"));
      } else if (placement) {
        $(placement).append(error);
      } else {
        error.insertAfter(element);
      }
    },
  });

  $("#add_event").validate({
    rules: {
      title: {
        required: true,
        noSpace: true,
      },
      description: {
        noSpace: true,
        required: true,
      },
      media: {
        required: true,
      },
      event_type: {
        required: true,
      },
    },
    messages: {
      title: {
        required: "This field is required",
      },
      description: {
        required: "This field is required",
      },
      event_type: {
        required: "This field is required",
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      var placement = $(element).data("error");
      if (
        element.attr("name") == "event_type" ||
        element.attr("name") == "school_name"
      ) {
        error.appendTo(element.parent("div"));
      } else if ($(element).is("select")) {
        element.next().after(error); // special placement for select elements
      } else {
        error.insertAfter(element);
      }
    },
  });

  $("#edit_event").validate({
    rules: {
      title: {
        required: true,
        noSpace: true,
      },
      description: {
        noSpace: true,
        required: true,
      },
      event_type: {
        required: true,
      },
    },
    messages: {
      title: {
        required: "This field is required",
      },
      description: {
        required: "This field is required",
      },
      event_type: {
        required: "This field is required",
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      var placement = $(element).data("error");
      if (element.attr("name") == "event_type") {
        error.appendTo(element.parent("div"));
      } else if (placement) {
        $(placement).append(error);
      } else {
        error.insertAfter(element);
      }
    },
  });

  $("#add_lob").validate({
    rules: {
      name: {
        required: true,
        noSpace: true,
        remote: {
          url: BASE_URL + "backend/Ajax/CheckExisting",
          type: "post",
          data: {
            type: $('[name="type"]').val(),
          },
        },
      },
    },
    messages: {
      name: {
        required: "This field is required",
        remote: "Name already exists",
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      if (element.attr("name") == "state") {
        console.log(element.parent("div"));
        error.appendTo(element.parent("div"));
      } else {
        error.insertAfter(element);
      }
    },
  });

  $("#edit_lob").validate({
    rules: {
      name: {
        required: true,
        noSpace: true,
        remote: {
          url: BASE_URL + "backend/Ajax/CheckExisting",
          type: "post",
          data: {
            id: $('[name="id"]').val(),
            type: $('[name="type"]').val(),
          },
        },
      },
    },
    messages: {
      name: {
        required: "This field is required",
        remote: "Name already exists",
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      var placement = $(element).data("error");
      if (element.attr("name") == "state") {
        console.log(element.parent("div"));
        error.appendTo(element.parent("div"));
      } else {
        error.insertAfter(element);
      }
    },
  });

  $("#add_lob_que").validate({
    rules: {
      name: {
        required: true,
        noSpace: true,
        // remote: {
        //     url: BASE_URL + 'backend/Ajax/CheckExisting',
        //     type: 'post',
        //     data: {
        //         'type': $('[name="type"]').val()
        //     }
        // }
      },
    },
    messages: {
      name: {
        required: "This field is required",
        // remote: 'Name already exists',
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      if (element.attr("name") == "state") {
        console.log(element.parent("div"));
        error.appendTo(element.parent("div"));
      } else {
        error.insertAfter(element);
      }
    },
  });

  $("#edit_lob_que").validate({
    rules: {
      name: {
        required: true,
        noSpace: true,
        // remote: {
        //     url: BASE_URL + 'backend/Ajax/CheckExisting',
        //     type: 'post',
        //     data: {
        //         'id': $('[name="id"]').val(),
        //         'type': $('[name="type"]').val()
        //     }
        // }
      },
    },
    messages: {
      name: {
        required: "This field is required",
        // remote: 'Name already exists',
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      var placement = $(element).data("error");
      if (element.attr("name") == "state") {
        console.log(element.parent("div"));
        error.appendTo(element.parent("div"));
      } else {
        error.insertAfter(element);
      }
    },
  });

  $("#add_common_que").validate({
    rules: {
      name: {
        required: true,
        noSpace: true,
        // remote: {
        //     url: BASE_URL + 'backend/Ajax/CheckExisting',
        //     type: 'post',
        //     data: {
        //         'type': $('[name="type"]').val()
        //     }
        // }
      },
    },
    messages: {
      name: {
        required: "This field is required",
        // remote: 'Name already exists',
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      if (element.attr("name") == "state") {
        console.log(element.parent("div"));
        error.appendTo(element.parent("div"));
      } else {
        error.insertAfter(element);
      }
    },
  });

  $("#edit_common_que").validate({
    rules: {
      name: {
        required: true,
        noSpace: true,
        // remote: {
        //     url: BASE_URL + 'backend/Ajax/CheckExisting',
        //     type: 'post',
        //     data: {
        //         'id': $('[name="id"]').val(),
        //         'type': $('[name="type"]').val()
        //     }
        // }
      },
    },
    messages: {
      name: {
        required: "This field is required",
        // remote: 'Name already exists',
      },
    },
    errorElement: "div",
    errorPlacement: function (error, element) {
      var placement = $(element).data("error");
      if (element.attr("name") == "state") {
        console.log(element.parent("div"));
        error.appendTo(element.parent("div"));
      } else {
        error.insertAfter(element);
      }
    },
  });
});
