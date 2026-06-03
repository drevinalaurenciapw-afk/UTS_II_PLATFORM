<?php

class Monitoring extends Model {

    private $table = "riwayat_monitoring";

    // =====================
    // GET ALL
    // =====================
    public function getAllMonitoring()
    {
        $result = $this->db->query("
            SELECT * FROM {$this->table}
            ORDER BY id DESC
        ");

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // =====================
    // GET LATEST
    // =====================
    public function getLatest()
    {
        $result = $this->db->query("
            SELECT * FROM {$this->table}
            ORDER BY created_at DESC
            LIMIT 1
        ");

        return $result->fetch_assoc();
    }

    // =====================
    // COUNT ALL
    // =====================
    public function countAll()
    {
        $result = $this->db->query("
            SELECT COUNT(*) as total 
            FROM {$this->table}
        ");

        $row = $result->fetch_assoc();
        return $row['total'] ?? 0;
    }

    // =====================
    // RATA SUHU (FIX FINAL)
    // =====================
    public function getRataSuhu()
    {
    $result = $this->db->query("
        SELECT AVG(suhu) AS rata_suhu
        FROM riwayat_monitoring
    ");

    $data = $result->fetch_assoc();
    return (float) $data['rata_suhu'];
    }

    // =====================
    // RATA AQI (FIX FINAL)
    // =====================
    public function getRataAqi()
    {
    $result = $this->db->query("
        SELECT AVG(aqi) AS rata_aqi
        FROM riwayat_monitoring
    ");

    $data = $result->fetch_assoc();
    return (float) $data['rata_aqi'];
    }

    // =====================
    // INSERT
    // =====================
    public function insert($data)
    {
        return $this->db->query("
            INSERT INTO {$this->table}
            (wilayah, suhu, aqi, kategori, waktu_data, status, created_at)
            VALUES (
                '{$data['wilayah']}',
                '{$data['suhu']}',
                '{$data['aqi']}',
                '{$data['kategori']}',
                '{$data['waktu_data']}',
                '{$data['status']}',
                '{$data['created_at']}'
            )
        ");
    }

    // =====================
    // DELETE
    // =====================
    public function delete($id)
    {
        return $this->db->query("
            DELETE FROM {$this->table}
            WHERE id = $id
        ");
    }

    // =====================
    // API IQAIR
    // =====================
    public function getIqAirJakarta()
    {
        $apiKey = IQAIR_API_KEY;

        $url = "http://api.airvisual.com/v2/city?city=Jakarta&state=Jakarta&country=Indonesia&key=" . $apiKey;

        $response = @file_get_contents($url);

        if (!$response) return null;

        return json_decode($response, true);
    }
}