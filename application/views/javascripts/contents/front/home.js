$(document).ready(function () {
    $('.rupiah').each(function () {
        this.innerHTML = `Rp. ${format_rupiah(this.innerText)}`;
    })
})

