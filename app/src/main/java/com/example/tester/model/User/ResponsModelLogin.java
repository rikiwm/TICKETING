package com.example.tester.model.User;

import com.example.tester.model.Pesan.DataPesanModel;

import java.util.List;

public class ResponsModelLogin {

    public ResponsModelLogin loginresponse;

    String succes, success;
    List<DataLoginModel> result;

    public String getSucces() {
        return succes;
    }

    public void setSucces(String succes) {
        this.succes = succes;
    }

    public String getSuccess() {
        return success;
    }

    public void setSuccess(String success) {
        this.success = success;
    }

    public List<DataLoginModel> getResult() {
        return result;
    }

    public void setResult(List<DataLoginModel> result) {
        this.result = result;
    }
}

