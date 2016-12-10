<script type="text/javascript">
    $(".timepicker").timepicker({showMeridian:false})

    // Select advance
    $(function () {
        $(".select2").select2();
    });
    
    $( "#form-register").validate({
      rules: {
        field: {
          required : true
        },
        email: {
            required    : true,
            EmailFormat : true
        },
        password : {
            minlength: 8
        },
        password_confirmation : {
          minlength: 8,
          equalTo: "#password"
        },
        emailuser : {
            remote: {
                url: "{{ route('ajax.user.email') }}",
                type: "GET",
                data: {
                    emaildealer: function() { return $('#emaildealer').val(); },
                    iduser: function() { return $('#iduser').val(); }
                },
             }
        },
        emaillecturer : {
            remote: {
                url: "{{ route('ajax.lecturer.email') }}",
                type: "GET",
                data: {
                    emaillecturer: function() { return $('#emaillecturer').val(); },
                    idlecturer: function() { return $('#idlecturer').val(); }
                },
             }
        },
        nidnlecturer : {
            remote: {
                url: "{{ route('ajax.lecturer.nidn') }}",
                type: "GET",
                data: {
                    nidnlecturer: function() { return $('#nidnlecturer').val(); },
                    idlecturer: function() { return $('#idlecturer').val(); }
                },
             }
        },
        namecourses : {
            remote: {
                url: "{{ route('ajax.course.name') }}",
                type: "GET",
                data: {
                    namecourses: function() { return $('#namecourses').val(); },
                    idcourse: function() { return $('#idcourse').val(); }
                },
             }
        },
        code_courses : {
            remote: {
                url: "{{ route('ajax.course.code') }}",
                type: "GET",
                data: {
                    code_courses: function() { return $('#code_courses').val(); },
                    idcourse: function() { return $('#idcourse').val(); }
                },
             }
        },
        code_rooms : {
            remote: {
                url: "{{ route('ajax.room.code') }}",
                type: "GET",
                data: {
                    code_rooms: function() { return $('#code_rooms').val(); },
                    idroom: function() { return $('#idroom').val(); }
                },
             }
        },
        namerooms : {
            remote: {
                url: "{{ route('ajax.room.name') }}",
                type: "GET",
                data: {
                    namerooms: function() { return $('#namerooms').val(); },
                    idroom: function() { return $('#idroom').val(); }
                },
             }
        },
        // courses : {
        //     remote: {
        //         url: "{{ route('ajax.teach.courses') }}",
        //         type: "GET",
        //         data: {
        //             Teachsroom: function() { return $('#Teachsroom').val(); },
        //             idteachs: function() { return $('#idteachs').val(); }
        //         },
        //      }
        // },
      },
        messages: {
            emailuser: {
                remote: "Email already in use!"
            },
            emaillecturer: {
                remote: "Email already in use!"
            },
            nidnlecturer: {
                remote: "Nidn already in use!"
            },
            namecourses: {
                remote: "Courses name already in use!"
            },
            code_courses: {
                remote: "Courses Code already in use!"
            },
            code_rooms: {
                remote: "Rooms Code already in use!"
            },
            namerooms: {
                remote: "Rooms name already in use!"
            }
            // courses: {
            //     remote:"Courses and Lecturer already in use!"
            // }
        },
       invalidHandler: function(event, validator) {
          // 'this' refers to the form
          var errors = validator.numberOfInvalids();
          if (errors) {
            var message = "Periksa kembali field yang wajib diisi";
            $("div.error-message span").html(message).css('color','red');
            $("div.error-message").show();
          } else {
            $("div.error-message").hide();
          }
        }
    });

    $('.to-select').on('change', function () {
        var data = $(this).select2('data')['0']['id'];
        if (data =! false) {
            $(this).next().find('.select2-selection--single').removeClass('error');
            $(this).next().next().hide();
        }
    });

    // create your custom rule
    $.validator.addMethod("EmailFormat", function(value, element) {
        return this.optional( element ) || ( /^[a-z0-9]+([-._][a-z0-9]+)*@([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{2,4}$/.test( value ) && /^(?=.{1,64}@.{4,64}$)(?=.{6,100}$).*/.test( value ) );
    }, 'Please enter valid email address.');

</script>
