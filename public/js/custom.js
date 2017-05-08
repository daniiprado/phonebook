var FormValidation = function () {

    var handleValidation = function () {
        var form1 = $('#RegisterValidation');
        var error1 = $('.text-danger', form1);
        var success1 = $('.text-primary', form1);

        var form2 = $('#EditValidation');
        var error2 = $('.text-danger', form2);
        var success2 = $('.text-primary', form2);

        form1.validate({
            errorElement: 'span',
            errorClass: 'help-block text-danger',
            focusInvalid: true,
            ignore: "",
            rules: {
                full_name: {
                    minlength: 3,
                    required: true
                },
                document: {
                    minlength: 5,
                    maxlength: 11,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    phone: true
                },
            },

            errorPlacement: function (error, element) {
                error.insertAfter(element);
            },

            highlight: function (element) {
                $(element)
                    .closest('.form-group').addClass('has-error');
            },

            unhighlight: function (element) {
                $(element)
                    .closest('.form-group').removeClass('has-error');
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error').addClass('has-success');
            },

            submitHandler: function () {
                success1.show();
                error1.hide();
                var token = $('input[name="_token"]').val();
                var route = form1.attr('action');


                var f = new FormData();
                f.append("name", $('#full_name').val());
                f.append("document", $('#document').val());
                f.append("email", $('#email').val());
                f.append("phone", $('#phone').val());

                $.ajax({
                    url: route,
                    headers: {'X-CSRF-TOKEN': token},
                    cache: false,
                    type: 'POST',
                    contentType:false,
                    data: f,
                    processData:false,

                    success: function(data){
                        console.log(data.data);
                        form1[0].reset();
                        swal({
                                title: data.title,
                                text: data.message,
                                buttonsStyling: false,
                                confirmButtonClass: "btn btn-success",
                                type: data.success,
                            }).then(function () {
                                $('#add-user').modal('hide');
                                location.reload();
                            });
                    },
                    error: function(data){
                        var response = jQuery.parseJSON( data.responseText );

                        if(response.name){
                            $('#field_full_name').removeClass('has-success').addClass('has-error');
                            $('#full_name-error').text(response.name[0]);
                            console.error(response.name[0]);
                        }
                        if(response.document){
                            $('#field_document').removeClass('has-success').addClass('has-error');
                            $('#document-error').text(response.document[0]);
                            console.error(response.document[0]);
                        }
                        if(response.email){
                            $('#field_email').removeClass('has-success').addClass('has-error');
                            $('#email-error').text(response.email[0]);
                            console.error(response.email[0]);
                        }
                        if(response.phone){
                            $('#field_phone').removeClass('has-success').addClass('has-error');
                            $('#phone-error').text(response.phone[0]);
                            console.error(response.phone[0]);
                        }
                    }
                });
            }
        });

        form2.validate({
            errorElement: 'span',
            errorClass: 'help-block text-danger',
            focusInvalid: true,
            ignore: "",
            rules: {
                full_name: {
                    minlength: 3,
                    required: true
                },
                document: {
                    minlength: 5,
                    maxlength: 11,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    phone: true
                },
            },

            errorPlacement: function (error, element) {
                error.insertAfter(element);
            },

            highlight: function (element) {
                $(element)
                    .closest('.form-group').addClass('has-error');
            },

            unhighlight: function (element) {
                $(element)
                    .closest('.form-group').removeClass('has-error');
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error').addClass('has-success');
            },

            submitHandler: function () {
                success2.show();
                error2.hide();
                var token = $('input[name="_token"]').val();
                var route = form2.attr('action');


                var f = new FormData();
                f.append("id", $('input[name="id_user"]').val());
                f.append("name", $('#full_name_edit').val());
                f.append("document", $('#document_edit').val());
                f.append("email", $('#email_edit').val());
                f.append("phone", $('#phone_edit').val());

                $.ajax({
                    url: route,
                    headers: {'X-CSRF-TOKEN': token},
                    cache: false,
                    type: 'POST',
                    contentType:false,
                    data: f,
                    processData:false,

                    success: function(data){
                        form2[0].reset();
                        swal({
                                title: data.title,
                                text: data.message,
                                buttonsStyling: false,
                                confirmButtonClass: "btn btn-success",
                                type: data.success,
                            }).then(function () {
                                $('#edit-user').modal('hide');
                                location.reload();
                            });
                    },
                    error: function(data){
                        var response = jQuery.parseJSON( data.responseText );

                        if(response.name){
                            $('#field_full_name_edit').removeClass('has-success').addClass('has-error');
                            $('#full_name_edit-error').text(response.name[0]);
                            console.error(response.name[0]);
                        }
                        if(response.document){
                            $('#field_document_edit').removeClass('has-success').addClass('has-error');
                            $('#document_edit-error').text(response.document[0]);
                            console.error(response.document[0]);
                        }
                        if(response.email){
                            $('#field_email_edit').removeClass('has-success').addClass('has-error');
                            $('#email_edit-error').text(response.email[0]);
                            console.error(response.email[0]);
                        }
                        if(response.phone){
                            $('#field_phone_edit').removeClass('has-success').addClass('has-error');
                            $('#phone_edit-error').text(response.phone[0]);
                            console.error(response.phone[0]);
                        }
                    }
                });
            }
        });
    };

    return {
        init: function () {
            handleValidation();
        }
    };
}();

