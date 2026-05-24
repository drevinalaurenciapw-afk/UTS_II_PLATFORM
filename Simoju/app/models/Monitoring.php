<?php

class Monitoring extends Model
{
    public function simpanRiwayat(
        $wilayah,
        $suhu,
        $aqi,
        $kategori
    )
    {
        $query = "
        INSERT INTO riwayat_monitoring
        (
            wilayah,
            suhu,
            aqi,
            kategori,
            waktu_data
        )
        VALUES
        (
            '$wilayah',
            '$suhu',
            '$aqi',
            '$kategori',
            NOW()
        )";

        return $this->db->query($query);
    }

    public function getRiwayat()
    {
        return $this->db->query(
            "SELECT * FROM riwayat_monitoring
             ORDER BY id DESC
             LIMIT 20"
        );
    }
}