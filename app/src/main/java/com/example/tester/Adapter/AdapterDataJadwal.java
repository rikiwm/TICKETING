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

import com.example.tester.R;
import com.example.tester.model.JadwalKapaBarangkek.DataJadwalModel;

import java.util.List;

public class AdapterDataJadwal extends RecyclerView.Adapter<AdapterDataJadwal.HolderData> {

        private List<DataJadwalModel> mList1 ;
        private Context ctx;

public  AdapterDataJadwal (Context ctx, List<DataJadwalModel> mList)
        {
        this.ctx = ctx;
        this.mList1 = mList;
        }

        @Override
    public AdapterDataJadwal.HolderData onCreateViewHolder(ViewGroup parent, int viewType) {
        View layout = LayoutInflater.from(parent.getContext()).inflate(R.layout.jadwal_kapal,parent, false);
            AdapterDataJadwal.HolderData holder = new AdapterDataJadwal.HolderData(layout);
        return holder;
    }

    @Override
    public void onBindViewHolder(HolderData holder, int position) {
        DataJadwalModel dj = mList1.get(position);
        holder.jam.setText(dj.getJam_berangkat());
        holder.dewasa.setText(dj.getHarga_dewasa());
        holder.anak.setText(dj.getHarga_anak());
        holder.kursi.setText(dj.getJml_kursi_pesan());
        holder.dj = dj;
    }

    @Override
    public int getItemCount() {
        return mList1.size();
    }

    class HolderData extends RecyclerView.ViewHolder{
        TextView jam,dewasa, anak, kursi;
        DataJadwalModel dj;
        public HolderData (View v) {
            super(v);

            jam = (TextView) v.findViewById(R.id.tvJam);
            dewasa = (TextView) v.findViewById(R.id.tvDewasa);
            anak = (TextView) v.findViewById(R.id.tvAnak);
            kursi = (TextView) v.findViewById(R.id.tvKursi);

//            v.setOnClickListener(new View.OnClickListener() {
//                @Override
//                public void onClick(View v) {
//                    Intent goInput = new Intent(ctx, InputData.class);
//                    goInput.putExtra("kd_order", dj.getKd_order());
//                    goInput.putExtra("kode_jadwal", dj.getKode_jadwal());
//                    goInput.putExtra("nama_order", dj.getNama_order());
//                    goInput.putExtra("umur", dj.getUmur());
//                    goInput.putExtra("no_hp", dj.getNo_hp());
//                    goInput.putExtra("tgl_berangkat", dj.getTgl_berangkat());
//
//                    ctx.startActivity(goInput);
//                }
//            });
        }
    }

}
