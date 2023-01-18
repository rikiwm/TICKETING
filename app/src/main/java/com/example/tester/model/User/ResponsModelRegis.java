package com.example.tester.model.User;

import com.example.tester.model.Pesan.DataPesanModel;
import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

import java.util.List;

public class ResponsModelRegis {
    @SerializedName("response")
    @Expose
    private String response;
    public String getResponse() {
        return response;
    }

    public void setResponse(String response) {
        this.response = response;
    }
}
