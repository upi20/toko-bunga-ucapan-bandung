$(document).ready(function () {
    $("#loader").LoadingOverlay('progress');
    $('#form-login').validate({
        // Rules for form validation
        rules: {
            email: {
                required: true,
                minlength: 3,
                email: true
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
            setBtnLoading('button[type=submit]', 'Kirim')
            $.ajax({
                method: 'post',
                url: '<?= base_url() ?>lupaPassword/sendEmail',
                data: {
                    email: form.email.value,
                },
                success: function (response) {
                    $("#alert").fadeIn();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $("#alert").fadeOut();

                    setToast({ title: "Gagal", body: jqXHR.responseJSON.message, class: "bg-warning" });
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