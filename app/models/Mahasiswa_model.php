<?php

class Mahasiswa_model
{
    // private $mhs = [
    //     [
    //         "id_mahasiswa_pt" => "18.14.1.0001",
    //         "nm_pd" => "ANDI ALFIAN",
    //         "nama_prodi" => "Informatika"
    //     ],
    //     [
    //         "id_mahasiswa_pt" => "18.14.1.0002",
    //         "nm_pd" => "HARIS SAKURUDIN",
    //         "nama_prodi" => "Informatika"
    //     ],
    //     [
    //         "id_mahasiswa_pt" => "18.14.1.0003",
    //         "nm_pd" => "MUHAMAD HIKAYAT",
    //         "nama_prodi" => "Informatika"
    //     ],
    //     [
    //         "id_mahasiswa_pt" => "18.14.1.0004",
    //         "nm_pd" => "RIZKI ALAM RAMDHANI",
    //         "nama_prodi" => "Informatika"
    //     ],
    // ];


    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllMahasiswa()
    {
        // return $this->mhs;

        // $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        // $this->stmt->execute();
        // return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa VALUES ('',:nama, :npm, :nama_prodi)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('npm', $data['npm']);
        $this->db->bind('nama_prodi', $data['nama_prodi']);
        $this->db->execute();

        return $this->db->rowCount();
        // return 0;
    }
    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id= :id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
        // return 0;
    }
    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET nama= :nama, npm= :npm, nama_prodi= :nama_prodi 
                    WHERE id= :id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('npm', $data['npm']);
        $this->db->bind('nama_prodi', $data['nama_prodi']);
        $this->db->execute();

        return $this->db->rowCount();
        // return 0;
    }
    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
