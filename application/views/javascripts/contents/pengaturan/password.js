$(function () {
    $.validator.setDefaults({
        submitHandler: function () {
            const current_password = $("#current_password");
            const password = $("#password");
            const password_confirm = $("#password_confirm");
            // cek password lama
            $.LoadingOverlay("show");
            $.ajax({
                method: 'post',
                url: '<?= base_url() ?>pengaturan/password/cek_password',
                data: {
                    current_password: current_password.val()
                },
            }).done((data) => {
                if (data) {
                    $.LoadingOverlay("show");
                    $.ajax({
                        method: 'post',
                        url: '<?= base_url() ?>pengaturan/password/update_password',
                        data: {
                            new_password: password.val()
                        },
                    }).done((data) => {
                        if (data) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Success. Password has been changed'
                            })
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Password failed to change'
                            })
                        }
                        current_password.val("");
                        password.val("");
                        password_confirm.val("");

                        current_password.removeClass('is-invalid');
                        password.removeClass('is-invalid');
                        password_confirm.removeClass('is-invalid');

                    }).fail(($xhr) => {
                        Toast.fire({
                            icon: 'error',
                            title: $xhr
                        })
                    }).always(function () {
                        $.LoadingOverlay("hide");
                    })
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Wrong current password '
                    })
                    current_password.focus();
                    current_password.addClass('is-invalid');
                }
            }).fail(($xhr) => {
                Toast.fire({
                    icon: 'error',
                    title: $xhr
                })
            }).always(function () {
                $.LoadingOverlay("hide");
            })
        }
    });
    $('#quickForm').validate({
        rules: {
            current_password: {
                required: true,
                minlength: 6
            },
            password: {
                required: true,
                minlength: 6
            },
            password_confirm: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },
            password_confirm: {
                required: "Please provide password confirmation",
                equalTo: "Confirm password is not equal"
            }

        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        }
    });

    $("#password_visibility").change(function () {
        if (this.checked) {
            $("#current_password").attr("type", "text");
            $("#password").attr("type", "text");
            $("#password_confirm").attr("type", "text");
        } else {
            $("#current_password").attr("type", "password");
            $("#password").attr("type", "password");
            $("#password_confirm").attr("type", "password");
        }

    })
});
