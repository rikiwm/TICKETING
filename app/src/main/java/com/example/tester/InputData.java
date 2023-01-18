/*
 * Copyright (c)
 */

package com.example.tester;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.tester.api.ApiClient;
import com.example.tester.api.ApiInterface;
import com.example.tester.model.Pesan.ResponsModelPesan;
import com.google.android.material.textfield.TextInputEditText;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class InputData extends AppCompatActivity {
    String[] strAsal = { "C", "Data structures",
            "Interview prep", "Algorithms",
            "DSA with java", "OS" };

    String[] strTujuan = { "C", "Data structures",
            "Interview prep", "Algorithms",
            "DSA with java", "OS" };
    String[] strKelas = { "C", "Data structures",
            "Interview prep", "Algorithms",
            "DSA with java", "OS" };



    EditText nama, usia, hp;
    Button btnsave, btnTampildata, btnupdate,btndelete;
    ProgressDialog pd;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_input_data);

        nama = (EditText) findViewById(R.id.edt_nama);
        usia = (TextInputEditText) findViewById(R.id.inputTanggal);
        hp = (EditText) findViewById(R.id.inputTelepon);
        btnupdate =(Button) findViewById(R.id.btnUpdate);
        btnsave = (Button) findViewById(R.id.btnCheckout);

        Intent data = getIntent();
        final String kdorder = data.getStringExtra("kd_order");
        if(kdorder != null) {
            btnsave.setVisibility(View.GONE);
            btnupdate.setVisibility(View.VISIBLE);
            nama.setText(data.getStringExtra("nama_order"));
            usia.setText(data.getStringExtra("umur"));
            hp.setText(data.getStringExtra("no_hp"));
        }

        pd = new ProgressDialog(this);


        btnupdate.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pd.setMessage("update ....");
                pd.setCancelable(false);
                pd.show();

                ApiInterface api = ApiClient.getClient().create(ApiInterface.class);
                Call<ResponsModelPesan> update = api.updateData
                        (kdorder,nama.getText().toString(),usia.getText().toString(),hp.getText().toString());
                update.enqueue(new Callback<ResponsModelPesan>() {
                    @Override
                    public void onResponse(Call<ResponsModelPesan> call, Response<ResponsModelPesan> response) {
                        Log.d("Retro", "Response");
                        Toast.makeText(InputData.this,response.body().getPesan(),Toast.LENGTH_SHORT).show();
                        pd.hide();
                    }

                    @Override
                    public void onFailure(Call<ResponsModelPesan> call, Throwable t) {
                        pd.hide();
                        Log.d("Retro", "OnFailure");

                    }
                });
            }
        });

        btnsave.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                pd.setMessage("send data ... ");
                pd.setCancelable(false);
                pd.show();

                String snama = nama.getText().toString();
                String sumur = usia.getText().toString();
                String shp = hp.getText().toString();
                ApiInterface api = ApiClient.getClient().create(ApiInterface.class);

                Call<ResponsModelPesan> sendbio = api.sendData(snama,sumur,shp);
                sendbio.enqueue(new Callback<ResponsModelPesan>() {
                    @Override
                    public void onResponse(Call<ResponsModelPesan> call, Response<ResponsModelPesan> response) {
                        pd.hide();
                        Log.d("RETRO", "response : " + response.body().toString());
                        String kode = response.body().getKode();

                        if(kode.equals("1"))
                        {
                            Toast.makeText(InputData.this, "Data berhasil disimpan", Toast.LENGTH_SHORT).show();
                        }else
                        {
                            Toast.makeText(InputData.this, "Data Error tidak berhasil disimpan", Toast.LENGTH_SHORT).show();

                        }
                    }

                    @Override
                    public void onFailure(Call<ResponsModelPesan> call, Throwable t) {
                        pd.hide();
                        Log.d("RETRO", "Falure : " + "Gagal Mengirim Request");
                    }
                });
            }
        });
    }
}
