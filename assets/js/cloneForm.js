function addRincian(sl_coa) {
    var idf = document.getElementById("idf").value;
    stre = "<div class='form-group'  id='srow" + idf + "'><div class='controls'>";
    //stre=stre+"<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
    //stre=stre+" <div class='col-md-6 col-sm-6 col-xs-12'>";
    //stre=stre+sl_coa;
    //stre=stre+"</div>";
    stre = stre + " <div class='col-xs-4'>";
    stre = stre + "<input placeholder='Tahun' type='text' class='form-control' name='tahun[]'/>";
    stre = stre + "</div>";
    stre = stre + " <div class='col-xs-4'>";
    stre = stre + "<input placeholder='Anggaran' type='text' id='idf' class='form-control' name='anggaran[]'/>";
    stre = stre + "</div>";

    stre = stre + "<div class='col-xs-1'> <button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick='removeFormField(\"#srow" + idf + "\"); return false;'><i class='glyphicon glyphicon-remove'></i>X</button></div> </div>";
    $("#divAkun").append(stre);
    idf = (idf - 1) + 2;
    document.getElementById("idf").value = idf;
}

function addNew(sl_coa) {
    var ids = document.getElementById("ids").value;
    stre = "<div class='form-group' id='srow" + ids + "'><div class='controls'>";
    stre = stre + "<div class='col-xs-4'>";
    stre = stre + "<input placeholder='Kegiatan Baru' type='text' class='form-control' name='user_type' />";
    stre = stre + "</div>";

    stre = stre + "<div class='col-xs-1'> <button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick='removeFormField(\"#srow" + ids + "\"); return false;'><i class='glyphicon glyphicon-remove'></i>X</button></div> </div>";

    $("#divKeg").append(stre);
    ids = (ids - 1) + 2;
    document.getElementById("ids").value = ids;
}

function addFiat(sl_coa) {
    var idf3 = document.getElementById("idf3").value;
    stre = "<div class='form-group' id='srow" + idf3 + "'><div class='controls'>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>No. Fiat</label>";
    stre = stre + "<input type='text' class='form-control' name='no_fiat[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Tanggal Fiat</label>";
    stre = stre + "<input type='text' id='input-tanggal7' class='form-control' name='tgl_fiat[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Jumlah Fiat Bayar</label>";
    stre = stre + "<input type='text' class='form-control' name='total[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Keterangan</label>";
    stre = stre + "<input type='text' class='form-control' name='status_rc[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Tanggal Cash Out</label>";
    stre = stre + "<input type='date' class='form-control' name='tgl_rc[]' />";
    stre = stre + "</div>";

    stre = stre + "<div class='col-xs-1'> <button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick='removeFormField(\"#srow" + idf3 + "\"); return false;'><i class='glyphicon glyphicon-remove'></i>X</button></div> </div>";
    $("#divFiat").append(stre);
    idf3 = (idf3 - 1) + 2;
    document.getElementById("idf3").value = idf3;
}

function addFiatnonIT(sl_coa) {
    var idf5 = document.getElementById("idf5").value;
    stre = "<div class='form-group' id='srow" + idf5 + "'><div class='controls'>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>No. Fiat</label>";
    stre = stre + "<input type='text' class='form-control' name='no_fiat[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Tanggal Fiat</label>";
    stre = stre + "<input type='date' class='form-control' name='tgl_fiat[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Jumlah Fiat Bayar</label>";
    stre = stre + "<input type='text' class='form-control' name='total[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Nilai Tabanan</label>";
    stre = stre + "<input type='text' class='form-control' name='nilai_tabanan[]'/>";
    stre = stre + "</div>"
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Keterangan</label>";
    stre = stre + "<input type='text' class='form-control' name='status_rc[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Tanggal Cash Out</label>";
    stre = stre + "<input type='date' class='form-control' name='tgl_rc[]' />";
    stre = stre + "</div>";

    stre = stre + "<div class='col-xs-1'> <button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick='removeFormField(\"#srow" + idf5 + "\"); return false;'><i class='glyphicon glyphicon-remove'></i>X</button></div> </div>";
    $("#divFiatexplnonIT").append(stre);
    idf5 = (idf5 - 1) + 2;
    document.getElementById("idf5").value = idf5;
}

function addFiatexpl(sl_coa) {
    var idf4 = document.getElementById("idf4").value;
    stre = "<div class='form-group' id='srow" + idf4 + "'><div class='controls'>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>No. Fiat</label>";
    stre = stre + "<input type='text' class='form-control' name='no_fiat[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Tanggal Fiat</label>";
    stre = stre + "<input type='date' class='form-control' name='tgl_fiat[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Jumlah Fiat Bayar</label>";
    stre = stre + "<input type='text' class='form-control' name='total[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Katerangan</label>";
    stre = stre + "<input type='text' class='form-control' name='status_rc[]' />";
    stre = stre + "</div>";
    stre = stre + "<div class='col-xs-8'>";
    stre = stre + "<label>Tanggal Cash Out</label>";
    stre = stre + "<input type='date' class='form-control' name='tgl_rc[]' />";
    stre = stre + "</div>";

    stre = stre + "<div class='col-xs-1'> <button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick='removeFormField(\"#srow" + idf4 + "\"); return false;'><i class='glyphicon glyphicon-remove'></i>X</button></div> </div>";
    $("#divFiatexpl").append(stre);
    idf4 = (idf4 - 1) + 2;
    document.getElementById("idf4").value = idf4;
}

function addSpk(slcoa) {
    var idf2 = document.getElementById("idf2").value;
    stre = "<div class='form-group'  id='srow2" + idf2 + "'><div class='controls'>";
    //stre=stre+"<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
    //stre=stre+" <div class='col-md-6 col-sm-6 col-xs-12'>";
    //stre=stre+sl_coa;
    //stre=stre+"</div>";
    stre = stre + " <div class='col-xs-4'>";
    stre = stre + "<input placeholder='Tahun' type='text' class='form-control' name='tahun_spk[]'   />";
    stre = stre + "</div>";
    stre = stre + " <div class='col-xs-4'>";
    stre = stre + "<input placeholder='Anggaran' type='text' class='form-control' name='anggaran_spk[]'   />";
    stre = stre + "</div>";


    stre = stre + "<div class='col-xs-1'> <button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick='removeFormField(\"#srow2" + idf2 + "\"); return false;'><i class='glyphicon glyphicon-remove'></i>X</button></div> </div>";
    $("#divSpk").append(stre);
    idf2 = (idf2 - 1) + 2;
    document.getElementById("idf2").value = idf2;
}

function addSpkExpl(slcoa) {
    var idf5 = document.getElementById("idf5").value;
    stre = "<div class='form-group'  id='srow2" + idf5 + "'><div class='controls'>";
    //stre=stre+"<label class='control-label col-md-3 col-sm-3 col-xs-12'></label>";
    //stre=stre+" <div class='col-md-6 col-sm-6 col-xs-12'>";
    //stre=stre+sl_coa;
    //stre=stre+"</div>";
    stre = stre + " <div class='col-xs-4'>";
    stre = stre + "<input placeholder='Tahun' type='text' class='form-control' name='tahun_spk[]'   />";
    stre = stre + "</div>";
    stre = stre + " <div class='col-xs-4'>";
    stre = stre + "<input placeholder='Anggaran' type='text' class='form-control' name='anggaran_spk[]'   />";
    stre = stre + "</div>";

    stre = stre + "<div class='col-xs-1'> <button type='button' class='btn btn-danger btn-sm' title='Hapus Rincian !' onclick='removeFormField(\"#srow2" + idf5 + "\"); return false;'><i class='glyphicon glyphicon-remove'></i>X</button></div> </div>";
    $("#divSpkExpl").append(stre);
    idf5 = (idf5 - 1) + 2;
    document.getElementById("idf5").value = idf5;
}

function removeFormField(idf) {
    $(idf).remove();
}