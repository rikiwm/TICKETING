/*
 * Copyright (c)
 */

package com.example.tester;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.app.AppCompatDelegate;
import androidx.cardview.widget.CardView;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;
import androidx.viewpager.widget.ViewPager;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;

import com.example.tester.Adapter.AdapterDataJadwal;
import com.example.tester.Adapter.AdapterDataPesan;
import com.example.tester.Adapter.ViewImageAdapter;
import com.example.tester.api.ApiClient;
import com.example.tester.api.ApiInterface;
import com.example.tester.model.JadwalKapaBarangkek.DataJadwalModel;
import com.example.tester.model.JadwalKapaBarangkek.ResponsModelJadwal;
import com.example.tester.model.Pesan.DataPesanModel;
import com.example.tester.model.Pesan.ResponsModelPesan;
import com.google.android.material.bottomnavigation.BottomNavigationView;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity {
    ViewPager mViewPager;
    ImageView logout,btnTampildata;
    ProgressDialog pd;
    int[] images = {R.drawable.ic_baner, R.drawable.logo1, R.drawable.logo2, R.drawable.cruise_ship};

    ViewImageAdapter mViewImageAdapter;
    ApiInterface mApiInterface;
     RecyclerView mRecyclerView,mRecyclerView1;
     RecyclerView.Adapter mAdapter,mAdapter1;
     RecyclerView.LayoutManager mLayoutManager,mManager;
     List<DataJadwalModel> mItems1 = new ArrayList<>();

    BottomNavigationView bottomNavigationView;


    public static MainActivity ma;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        AppCompatDelegate.setCompatVectorFromResourcesEnabled(true);

        bottomNavigationView = findViewById(R.id.bottomNavigationView);
//        bottomNavigationView.setOnNavigationItemSelectedListener(this);
//        bottomNavigationView.setSelectedItemId(R.id.person);

        mViewPager = (ViewPager)findViewById(R.id.viewPagerMain);
        mViewImageAdapter = new ViewImageAdapter(MainActivity.this, images);
        mViewPager.setAdapter(mViewImageAdapter);

        logout=(ImageView)findViewById(R.id.imagelog);
        CardView card=(CardView) findViewById(R.id.cvPesawat);

        mRecyclerView = (RecyclerView) findViewById(R.id.recyclerView);
        mLayoutManager = new LinearLayoutManager(this);
        mRecyclerView.setLayoutManager(mLayoutManager);
        mApiInterface = ApiClient.getClient().create(ApiInterface.class);
        ma=this;

        btnTampildata = (ImageView) findViewById(R.id.imageProfile);

        pd = new ProgressDialog(this);
        mRecyclerView1 = (RecyclerView) findViewById(R.id.rvSchedule);
        mManager = new LinearLayoutManager(this, LinearLayoutManager.VERTICAL, false);
        mRecyclerView1.setLayoutManager(mManager);

        pd.setMessage("Loading ...");
        pd.setCancelable(false);
        pd.show();

        ApiInterface api = ApiClient.getClient().create(ApiInterface.class);
        Call<ResponsModelJadwal> getdata = api.getJadwal();
        getdata.enqueue(new Callback<ResponsModelJadwal>() {

            @Override
            public void onResponse(Call<ResponsModelJadwal> call, Response<ResponsModelJadwal> response) {
                pd.hide();
                Log.d("RETRO", "RESPONSE : " + response.body().getKode());
                mItems1 = response.body().getResult();

                mAdapter1 = new AdapterDataJadwal(MainActivity.this,mItems1);
                mRecyclerView1.setAdapter(mAdapter1);
                mAdapter1.notifyDataSetChanged();

            }

            @Override
            public void onFailure(Call<ResponsModelJadwal> call, Throwable t) {
                pd.hide();
                Log.d("RETRO", "FAILED : respon gagal");

            }
        });


        btnTampildata.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i= new Intent(MainActivity.this, HistoryActivity.class);
                startActivity(i);
            }
        });
        card.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(MainActivity.this, InputData.class);
                startActivity(i);
            }
        });

        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();

            }
        });
    }

}


