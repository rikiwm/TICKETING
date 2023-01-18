/*
 * Copyright (c)
 */

package com.example.tester.Adapter;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import com.example.tester.InputData;
import com.example.tester.R;
import com.example.tester.model.Pesan.DataPesanModel;

import java.util.List;

public class AdapterDataPesan extends RecyclerView.Adapter<AdapterDataPesan.HolderData> {

private List<DataPesanModel> mList ;
private Context ctx;

    public  AdapterDataPesan (Context ctx, List<DataPesanModel> mList)
    {
        this.ctx = ctx;
        this.mList = mList;
    }
    @Override
    public HolderData onCreateViewHolder(ViewGroup parent, int viewType) {
        View layout = LayoutInflater.from(parent.getContext()).inflate(R.layout.list_history,parent, false);
        HolderData holder = new HolderData(layout);
        return holder;
    }

    @Override
    public void onBindViewHolder(HolderData holder, int position) {
        DataPesanModel dm = mList.get(position);
        holder.jadwal.setText(dm.getKode_jadwal());
        holder.nama.setText(dm.getNama_order());
        holder.umur.setText(dm.getUmur());
        holder.hp.setText(dm.getNo_hp());
        holder.tgl_cau.setText(dm.getTgl_berangkat());
        holder.dm = dm;
    }

    @Override
    public int getItemCount() {
        return mList.size();
    }

    class HolderData extends RecyclerView.ViewHolder{
        TextView jadwal,nama, umur, hp,tgl_cau;
        DataPesanModel dm;
        public HolderData (View v) {
            super(v);

            nama = (TextView) v.findViewById(R.id.tvNama);
            umur = (TextView) v.findViewById(R.id.tvUmur);
            jadwal = (TextView) v.findViewById(R.id.tvKodeJadwal);
            hp = (TextView) v.findViewById(R.id.tvHp);
            tgl_cau = (TextView) v.findViewById(R.id.tvDate);

            v.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Intent goInput = new Intent(ctx, InputData.class);
                    goInput.putExtra("kd_order", dm.getKd_order());
                    goInput.putExtra("kode_jadwal", dm.getKode_jadwal());
                    goInput.putExtra("nama_order", dm.getNama_order());
                    goInput.putExtra("umur", dm.getUmur());
                    goInput.putExtra("no_hp", dm.getNo_hp());
                    goInput.putExtra("tgl_berangkat", dm.getTgl_berangkat());

                    ctx.startActivity(goInput);
                }
            });
        }
    }

}
