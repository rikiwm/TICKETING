package com.example.tester.api;

import com.example.tester.model.JadwalKapaBarangkek.ResponsModelJadwal;
import com.example.tester.model.Pesan.ResponsModelPesan;
import com.example.tester.model.User.ResponsModelLogin;
import com.example.tester.model.User.ResponsModelRegis;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface ApiInterface{

    @FormUrlEncoded
    @POST("insert.php")
    Call<ResponsModelPesan> sendData(@Field("kode_jadwal") String kode_jadwal,
                                     @Field("nama_order") String nama_order,
                                     @Field("umur") String umur);

    @GET("read.php")
    Call<ResponsModelPesan> getOrder();

    @FormUrlEncoded
    @POST("update.php")
    Call<ResponsModelPesan> updateData(@Field("kd_order") String kode_order,
                                       @Field("kode_jadwal") String kode_jadwal,
                                       @Field("nama_order") String nama_order,
                                       @Field("umur") String umur);

    @FormUrlEncoded
    @POST("delete.php")
    Call<ResponsModelPesan> deleteData(@Field("kd_order") String id);

    @GET("jadwal.php")
    Call<ResponsModelJadwal> getJadwal();

    @FormUrlEncoded
    @POST("register.php")
    Call<ResponsModelRegis> sendRegis(
                                      @Field("nama") String snama,
                                      @Field("email") String semail,
                                      @Field("password") String spass,
                                      @Field("username") String username);

    @FormUrlEncoded
    @GET("login.php")
    Call<ResponsModelLogin> getUserLogin(
                                            @Field("username") String username,
                                            @Field("password") String password);
}