$(document).ready(function () {
    $("#loader").LoadingOverlay('progress');
    $('#password-visibility').change(function () {
        const password = $('#password')

        // password toggle
        if (this.checked) {
            password.attr('type', 'text')
        } else {
            password.attr('type', 'password')
        }
    })

    $('#form-login').validate({
        // Rules for form validation
        rules: {
            token: {
                required: true,
            }
        },

        // Messages for form validation
        messages: {
            token: {
                required: 'Tolong masukan Token'
            },
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
            setBtnLoading('button[type=submit]', 'Login')
            $.ajax({
                method: 'post',
                url: '<?= base_url() ?>login/login_token',
                data: {
                    token: form.token.value
                },
                success: function (response) {
                    switch (response.status) {
                        case 0:
                            setToast({ title: "Gagal", body: "Maaf. Token yang anda masukan tidak valid.", class: "bg-warning" });
                            $('#token').focus();
                            break;

                        case 1:
                            setToast({ title: "Berhasil", body: "Login Sukses", class: "bg-primary" });
                            window.location.href = base_url + 'dashboard';
                            break;

                        default:
                            setToast({ title: "Gagal", body: "Koneksi buruk.", class: "bg-warning" });
                            break;
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(textStatus, errorThrown);
                },
                complete: function () {
                    setBtnLoading('button[type=submit]', 'Login', false);
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