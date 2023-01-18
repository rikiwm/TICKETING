package com.example.tester;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.util.Patterns;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RelativeLayout;
import android.widget.Toast;

import com.example.tester.api.ApiClient;
import com.example.tester.api.ApiInterface;
import com.example.tester.model.User.ResponsModelRegis;
import com.google.android.material.snackbar.Snackbar;

import java.util.regex.Pattern;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class RegistrasiActivity extends AppCompatActivity {
    EditText nama, username, email,pass;
    Button btnsave;
    ProgressDialog pd;
    RelativeLayout lyt_linear;
    Pattern pattern_pwd = Pattern.compile("^[a-zA-Z0-9]+$");



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registrasi);

        lyt_linear = findViewById(R.id.rl_111);
        nama = (EditText) findViewById(R.id.register_nama_input);
        username = (EditText) findViewById(R.id.register_username_input);
        email = (EditText) findViewById(R.id.register_mail_input);
        pass = (EditText) findViewById(R.id.register_password_input);
        btnsave = (Button) findViewById(R.id.register_btn);

        pd = new ProgressDialog(this);

        btnsave.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {




                String snama = nama.getText().toString();
                String semail = email.getText().toString();
                String spass = pass.getText().toString();
                String susername = username.getText().toString();

                ApiInterface api = ApiClient.getClient().create(ApiInterface.class);
                Call<ResponsModelRegis> sendbio = api.sendRegis(snama,semail,spass,susername);
                sendbio.enqueue(new Callback<ResponsModelRegis>() {
                    @Override
                    public void onResponse(Call<ResponsModelRegis> call, Response<ResponsModelRegis> response) {

                        Log.d("RETRO", "response : " + response.body().toString());
                        String kode = response.body().getResponse();
                        if(kode.equals("success"))
                        {
                            Toast.makeText(RegistrasiActivity.this, "Register berhasil", Toast.LENGTH_SHORT).show();
                            Intent intent = new Intent(RegistrasiActivity.this, LoginActivity.class);
                            finish();
                            startActivity(intent);
                        } else {
                            Toast.makeText(RegistrasiActivity.this, "OOPS", Toast.LENGTH_SHORT).show();
                        }
                    }

                    @Override
                    public void onFailure(Call<ResponsModelRegis> call, Throwable t) {
                        pd.hide();
                        Log.d("RETRO", "Falure : " + "Gagal Mengirim Request");
                    }
                });
            }
        });
    }
}