tableid1 = '#appointment_table1';
tableid2 = '#appointment_table2';


var error = '<span style="font-size: small; color: #f6cf57;">';
var success = '<span style="font-size: small; color: green;">';


$(window).load(asyncFunction);

function asyncFunction() {
    // formValidation();
    try { emailValidator(); } catch { };
    try { phoneValidator(); } catch { };
    try { passwordMatch(); } catch { };
    try { DTFunction(); } catch { };
    // try { ratingModal(); } catch { };

}

// $(window).load(function () {
//     $(".preloader").fadeOut("fast");
// });

function DTFunction() {
    $(tableid1).DataTable({
        columnDefs: [
            { orderable: false, searchable: false, targets: [9] }
        ]
    });

    $(tableid2).DataTable({
        columnDefs: [
            { orderable: false, searchable: false, targets: [9] }
        ]
    });
}

// function formValidation() {
//     $('#register').on('click', asyncFunction);
// }

function emailValidator() {
    $('#email').on('keyup', function () {

        var e_mail = $(this).val();

        $.ajax({
            url: '../config/dbconfig.php',
            method: "POST",
            data: {
                email: e_mail
            },
            success: function (data) {
                function validateEmail($e_mail) {
                    var emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i;
                    return emailReg.test($e_mail);
                }

                if (!validateEmail(e_mail)) {
                    $('#emailValidator').html(error + 'Not a valid email</span>');
                    $('.field input[type="email"]').css("outline-color", "#f6cf57");
                    $('#register').attr("disabled", true);
                }
                if (data != 0) {
                    $('#emailValidator').html(error + 'Email is already registered</span>');
                    $('.field input[type="email"]').css("outline-color", "#f6cf57");
                    $('#register').attr("disabled", true);
                } else if (validateEmail(e_mail)) {
                    $('#emailValidator').html(success + 'Valid email</span> ');
                    $('.field input[type="email"]').css("outline-color", "green");
                    $('#register').attr("disabled", false);
                }
            }
        })

    });
}

// ^[A-Z]{4,13}-[0-9]{2}-[0-9]{4}$

function phoneValidator() {
    $('#phone').on('keyup', function () {

        var thisphone = $(this).val();

        $.ajax({
            url: '../config/dbconfig.php',
            method: "POST",
            data: {
                phone: thisphone
            },
            success: function (data) {

                function validatePhone($thisphone) {
                    var phoneregex = /^(?:\+88|88)?(01[3-9]\d{8})$/;
                    // console.log(phoneT.test($phone));
                    return phoneregex.test($thisphone);

                }

                if (!validatePhone(thisphone)) {
                    $('#phoneValidator').html(error + 'Not a valid phone</span>');
                    $('.field input[type="phone"]').css("outline-color", "#f6cf57");
                    $('#register').attr("disabled", true);
                }
                if (data != 0) {
                    $('#phoneValidator').html(error + 'Not available</span>');
                    $('.field input[type="phone"]').css("outline-color", "#f6cf57");
                    $('#register').attr("disabled", true);
                } else if (validatePhone(thisphone)) {
                    $('#phoneValidator').html(success + 'Valid phone</span>');
                    $('.field input[type="phone"]').css("outline-color", "green");
                    $('#register').attr("disabled", false);
                }
            }
        })

    });
}

function passwordMatch() {
    $('#password, #confirmpassword').on('keyup', function () {
        if ($('#password').val() == $('#confirmpassword').val()) {
            $('#message').html(success + 'Password is matched</span>');
            $('.field input[type="password"]').css("outline-color", "green");
            $('#register').attr("disabled", false);
        } else if ($('#confirmpassword').val().length > 0) {
            $('#message').html(error + 'Password is not matching</span>');
            $('.field input[type="password"]').css("outline-color", "#f6cf57");
            $('#register').attr("disabled", true);
        }
    });
}
// function ratingModal() {

//     var rating_data = 0;

//     $('#add_review').on("click", function () {
//         $('#review_modal').modal('show');
//     });

//     $(document).on('mouseenter', '.submit_star', function () {
//         var rating = $(this).data('rating');
//         reset_background();
//         for (var count = 1; count <= rating; count++) {
//             $('#submit_star_' + count).addClass('text-warning');
//         }
//     });

//     function reset_background() {
//         for (var count = 1; count <= 5; count++) {
//             $('#submit_star_' + count).addClass('star-light');
//             $('#submit_star_' + count).removeClass('text-warning');
//         }
//     }

//     $(document).on('mouseleave', '.submit_star', function () {
//         reset_background();
//         for (var count = 1; count <= rating_data; count++) {
//             $('#submit_star_' + count).removeClass('star-light');
//             $('#submit_star_' + count).addClass('text-warning');
//         }
//     });

//     $(document).on('click', '.submit_star', function () {
//         rating_data = $(this).data('rating');
//     });

//     $('#save_review').on("click", function () {
//         $.ajax({
//             url: "submit_rating.php",
//             method: "POST",
//             data: {
//                 rating_data: rating_data
//             },
//             success: function (data) {
//                 $('#review_modal').modal('hide');
//                 alert(data);
//             }
//         })

//     });
// }