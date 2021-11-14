$(document).ready(function () {
    $("#loader").LoadingOverlay('progress');
    $('#password-visibility').change(function () {
        const password = $('#password')
        const password_confirm = $('#password_confirm')

        // password toggle
        if (this.checked) {
            password.attr('type', 'text')
            password_confirm.attr('type', 'text')
        } else {
            password.attr('type', 'password')
            password_confirm.attr('type', 'password')
        }
    })

    $('#form-login').validate({
        // Rules for form validation
        rules: {
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
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function (form) {
            setBtnLoading('button[type=submit]', 'Reset')
            $.ajax({
                method: 'post',
                url: '<?= base_url() ?>lupaPassword/save_password',
                data: {
                    id: form.id.value,
                    token: form.token.value,
                    password: form.password.value
                },
                success: function (response) {
                    if (response.status == 1) {
                        setToast({ title: "Gagal", body: "Maaf. Password yang anda masukan salah.", class: "bg-warning" });
                        $('#password').val('')

                        $('#password').focus()
                    } else if (response.status == 2) {
                        setToast({ title: "Gagal", body: "Maaf. Akun tidak ditemukan", class: "bg-warning" });
                        $('#email').val('')
                        $('#password').val('')

                        $('#email').focus()
                    } else if (response.status == 3) {
                        setToast({ title: "Gagal", body: "Maaf. Akun anda dinonaktifkan", class: "bg-warning" });
                    } else if (response.status == 4) {
                        setToast({ title: "Gagal", body: "Maaf. Akun anda belum dikonfirmasi", class: "bg-info" });
                    } else if (response.status == 0) {
                        setToast({ title: "Berhasil", body: "Reset Password Berhasil, Silahkan Login", class: "bg-primary" });
                        window.location.href = base_url + 'login';
                    } else {
                        setToast({ title: "Gagal", body: "Koneksi buruk.", class: "bg-warning" });
                    }

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus, errorThrown);
                },
                complete: function () {
                    setBtnLoading('button[type=submit]', '<i class="fas fa-sign-in-alt"></i> Masuk', false);
                }
            })
        }
    });
})

function setToast(data) {
    $(document).Toasts('create', {
        class: data.class,
        title: data.title,
        body: data.body
    })
    setTimeout(() => $("#toastsContainerTopRight").remove(), 5000);
}

function setBtnLoading(element, text, status = true) {
    const el = $(element);
    if (status) {
        el.attr("disabled", "");
        el.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ${text}`);
    } else {
        el.removeAttr("disabled");
        el.html(text);
    }
}