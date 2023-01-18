/*
 * Copyright (c)
 */

package com.example.tester.model.Pesan;

import java.util.List;

public class ResponsModelPesan {
    String  kode, pesan;
    List<DataPesanModel> result;

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

    public List<DataPesanModel> getResult() {
        return result;
    }

    public void setResult(List<DataPesanModel> result) {
        this.result = result;
    }
}
