var rupiah1 = document.getElementById('rupiah1');
rupiah1.addEventListener('keyup', function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah1() untuk mengubah angka yang di ketik menjadi format angka
    rupiah1.value = formatRupiah1(this.value);
});

/* Fungsi formatRupiah1 */
function formatRupiah1(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah1 = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah1 += separator + ribuan.join('.');
    }

    rupiah1 = split[1] != undefined ? rupiah1 + ',' + split[1] : rupiah1;
    return prefix == undefined ? rupiah1 : (rupiah1 ? +rupiah1 : '');
}

var rupiah2 = document.getElementById('rupiah2');
rupiah2.addEventListener('keyup', function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah1() untuk mengubah angka yang di ketik menjadi format angka
    rupiah2.value = formatRupiah2(this.value);
});

/* Fungsi formatRupiah1 */
function formatRupiah2(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah2 = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah2 += separator + ribuan.join('.');
    }

    rupiah2 = split[1] != undefined ? rupiah2 + ',' + split[1] : rupiah2;
    return prefix == undefined ? rupiah2 : (rupiah2 ? +rupiah2 : '');
}

var rupiah3 = document.getElementById('rupiah3');
rupiah3.addEventListener('keyup', function(e) {
    rupiah3.value = formatRupiah3(this.value);
});

function formatRupiah3(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah3 = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah3 += separator + ribuan.join('.');
    }

    rupiah3 = split[1] != undefined ? rupiah3 + ',' + split[1] : rupiah3;
    return prefix == undefined ? rupiah3 : (rupiah3 ? +rupiah3 : '');
}

var rupiah4 = document.getElementById('rupiah4');
rupiah4.addEventListener('keyup', function(e) {
    rupiah4.value = formatRupiah4(this.value);
});

function formatRupiah4(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah4 = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah4 += separator + ribuan.join('.');
    }

    rupiah4 = split[1] != undefined ? rupiah4 + ',' + split[1] : rupiah4;
    return prefix == undefined ? rupiah4 : (rupiah4 ? +rupiah4 : '');
}

var rupiah5 = document.getElementById('rupiah5');
rupiah5.addEventListener('keyup', function(e) {
    rupiah5.value = formatRupiah5(this.value);
});

function formatRupiah5(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah5 = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah5 += separator + ribuan.join('.');
    }

    rupiah5 = split[1] != undefined ? rupiah5 + ',' + split[1] : rupiah5;
    return prefix == undefined ? rupiah5 : (rupiah5 ? +rupiah5 : '');
}

var rupiah6 = document.getElementById('rupiah6');
rupiah6.addEventListener('keyup', function(e) {
    rupiah6.value = formatRupiah6(this.value);
});

function formatRupiah6(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah6 = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah6 += separator + ribuan.join('.');
    }

    rupiah6 = split[1] != undefined ? rupiah6 + ',' + split[1] : rupiah6;
    return prefix == undefined ? rupiah6 : (rupiah6 ? +rupiah6 : '');
}

var rupiah7 = document.getElementById('rupiah7');
rupiah7.addEventListener('keyup', function(e) {
    rupiah7.value = formatRupiah7(this.value);
});

function formatRupiah7(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah7 = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah7 += separator + ribuan.join('.');
    }

    rupiah7 = split[1] != undefined ? rupiah7 + ',' + split[1] : rupiah7;
    return prefix == undefined ? rupiah7 : (rupiah7 ? +rupiah7 : '');
}

var idf = document.getElementById('idf');
idf.addEventListener('keyup', function(e) {
    idf.value = formatRupiah4(this.value);
});

function formatRupiah4(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        idf = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        idf += separator + ribuan.join('.');
    }

    idf = split[1] != undefined ? idf + ',' + split[1] : idf;
    return prefix == undefined ? idf : (idf ? +idf : '');
}