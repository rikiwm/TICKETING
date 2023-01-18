/*
 * Copyright (c)
 */

package com.example.tester.model.JadwalKapaBarangkek;

import com.example.tester.model.Pesan.DataPesanModel;

import java.util.List;

public class ResponsModelJadwal {

    String  kode, pesan;
    List<DataJadwalModel> result;

    public String getKode() {
        return kode;
    }

    public void setKode(String kode) {
        this.kode = kode;
    }

    public String getPesan() {
        return pesan;
    }

    public void setPesan(String pesan) {
        this.pesan = pesan;
    }

    public List<DataJadwalModel> getResult() {
        return result;
    }

    public void setResult(List<DataJadwalModel> result) {
        this.result = result;
    }
}
