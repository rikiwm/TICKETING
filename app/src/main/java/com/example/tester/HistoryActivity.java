/*
 * Copyright (c)
 */

package com.example.tester;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.app.ProgressDialog;
import android.os.Bundle;
import android.util.Log;

import com.example.tester.Adapter.AdapterDataPesan;
import com.example.tester.api.ApiClient;
import com.example.tester.api.ApiInterface;
import com.example.tester.model.Pesan.DataPesanModel;
import com.example.tester.model.Pesan.ResponsModelPesan;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class HistoryActivity extends AppCompatActivity {
    private RecyclerView mRecycler;
    private RecyclerView.Adapter mAdapter;
    private RecyclerView.LayoutManager mManager;
    private List<DataPesanModel> mItems = new ArrayList<>();
    ProgressDialog pd;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_history);

        pd = new ProgressDialog(this);
        mRecycler = (RecyclerView) findViewById(R.id.rvHistory);
        mManager = new LinearLayoutManager(this, LinearLayoutManager.VERTICAL, false);
        mRecycler.setLayoutManager(mManager);

        pd.setMessage("Loading ...");
        pd.setCancelable(false);
        pd.hide();

        ApiInterface api = ApiClient.getClient().create(ApiInterface.class);
        Call<ResponsModelPesan> getdata = api.getOrder();
        getdata.enqueue(new Callback<ResponsModelPesan>() {
            @Override
            public void onResponse(Call<ResponsModelPesan> call, Response<ResponsModelPesan> response) {
                pd.hide();
                Log.d("RETRO", "RESPONSE : " + response.body().getKode());
                mItems = response.body().getResult();

                mAdapter = new AdapterDataPesan(HistoryActivity.this,mItems);
                mRecycler.setAdapter(mAdapter);
                mAdapter.notifyDataSetChanged();

            }

            @Override
            public void onFailure(Call<ResponsModelPesan> call, Throwable t) {
                pd.hide();
                Log.d("RETRO", "FAILED : respon gagal");

            }
        });

    }
}
