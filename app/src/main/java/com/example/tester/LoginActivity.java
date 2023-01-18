package com.example.tester;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.util.Log;
import android.util.Patterns;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;


import com.example.tester.api.ApiClient;
import com.example.tester.api.ApiInterface;
import com.example.tester.model.User.ResponsModelLogin;
import com.example.tester.model.User.ResponsModelRegis;
import com.google.android.material.snackbar.Snackbar;

import java.util.regex.Pattern;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class LoginActivity extends AppCompatActivity {

    private EditText etUname, etPass;
    private Button btnlogin;
    private TextView tvreg, skip_txt;
    String email, password;
    RelativeLayout rl_pwd;
    LinearLayout ll_lay;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        ll_lay = findViewById(R.id.ll_lay);
        etUname = (EditText) findViewById(R.id.edtUsername);
        etPass = (EditText) findViewById(R.id.edtPass);
        btnlogin = (Button) findViewById(R.id.login_btn);

        TextView txtDaftar= (TextView) findViewById(R.id.txtdaftar );

        txtDaftar.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Intent intent = new Intent(LoginActivity.this, RegistrasiActivity.class);
                    startActivity(intent);
                }
            });

         btnlogin.setOnClickListener(new View.OnClickListener() {
         @Override
         public void onClick(View v) {
//             String semail = etUname.getText().toString();
//             String spass = etPass.getText().toString();
//
//             ApiInterface api = ApiClient.getClient().create(ApiInterface.class);
//             Call<ResponsModelLogin> get = api.getUserLogin(semail,spass);
//             get.enqueue(new Callback<ResponsModelLogin>() {
//                 @Override
//                 public void onResponse(Call<ResponsModelLogin> call, Response<ResponsModelLogin> response) {
//
//                     Log.d("RETRO", "response : " + response.body().toString());
//                     String kode = response.body().getSucces();
//                     if(kode.equals("succes"))
//                     {
//                         Toast.makeText(LoginActivity.this, "Register berhasil", Toast.LENGTH_SHORT).show();
             Intent intent = new Intent(LoginActivity.this, MainActivity.class);
             finish();
             startActivity(intent);
//                     } else {
//                         Toast.makeText(LoginActivity.this, "OOPS", Toast.LENGTH_SHORT).show();
//                     }
//                 }
//
//                 @Override
//                 public void onFailure(Call<ResponsModelLogin> call, Throwable t) {
//
//                     Log.d("RETRO", "Falure : " + "Gagal Mengirim Request");
//                 }
//             });
         }
         });

    }
}