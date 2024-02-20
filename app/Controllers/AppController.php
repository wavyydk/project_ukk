<?php
namespace App\Controllers;


class AppController extends BaseController{

    private $user;
    private $foto;
    private $album;
    private $like;
    private $komentar;
    private $session;

    public function __construct(){
        $this->user = new \App\Models\user();
        $this->foto = new \App\Models\foto();
        $this->album = new \App\Models\album();
        $this->like = new \App\Models\like();
        $this->komentar = new \App\Models\komentar();
        $this->session = \Config\Services::session();

        if($this->session->user_id == null){
            $this->session->setFlashdata('pesan',"Login Dulu");
            header("location:".base_url('login'));
            exit();
        }
    }
    public function template(){
        $rows1 = $this->album
                ->orderBy("album_id","asc")
                ->FindAll();

        $data = ([
            "rows1" => $rows1
        ]);
        return view("template",$data);
    }
    public function template2($id){

        $rows = $this->foto
                ->orderBy("judul_foto","asc")
                ->like("album_id",$id)
                ->FindAll();
        
        $rows1 = $this->album
                ->orderBy("album_id","asc")
                ->FindAll();        
        
        $data  = ([
            "rows"  => $rows,
            "rows1"  => $rows1
        ]);

        return view("home",$data);
    }
    public function home(){
        $judul_foto =  $this->request->getVar("judul_foto");
        if ($judul_foto == null) {
            $rows = $this->foto
            ->orderBy("judul_foto","asc")
            ->FindAll();
        }
        else{
            $rows = $this->foto
                ->orderBy("judul_foto","asc")
                ->like("judul_foto",$judul_foto)
                ->FindAll();
        }
        $rows1 = $this->album
                ->orderBy("album_id","asc")
                ->FindAll();        
        
        $data  = ([
            "rows"  => $rows,
            "rows1"  => $rows1
        ]);

        return view("home",$data);
    }
    public function upload(){
        $rows1 = $this->album
                ->orderBy("album_id","asc")
                ->FindAll();
        $rows2 = $this->user
                ->orderBy("user_id","asc")
                ->FindAll();
                
        $data = ([
            "rows1" => $rows1,
            "rows2" => $rows2,
        ]);
        return view("upload",$data);
    }
    public function profil(){
        $username = $this->user
            ->where("user_id", session()->get("user_id"))
            ->first();

        $data = [
                "username"  => $username
                // "isUploader" => $isUploader // Tambahkan flag isUploader
            ];
        return view("profil", $data);
    }
    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
    public function upload_foto(){
        $judul_foto = $this->request->getpost("judul_foto");
        $deskripsi_foto = $this->request->getpost("deskripsi_foto");
        $tanggal_unggah = date("Y-m-d");
        $album_id = $this->request->getpost("album_id");
        $user_id = $this->session->user_id;
        
        $lokasi_file = $this->request->getFile("lokasi_file");
        $namafoto = $user_id."_".$lokasi_file->getRandomName();

        $lokasi_file->move("assets/foto",$namafoto);

        $this->foto->insert([
            "judul_foto"            => $judul_foto,
            "deskripsi_foto"     => $deskripsi_foto,
            "tanggal_unggah"    => $tanggal_unggah,
            "album_id"       => $album_id,
            "user_id"         => $user_id,
            "lokasi_file"          => $namafoto
        ]);

        return redirect()->to(base_url("home"));
    }
    public function edit_foto(){
        $foto_id   = $this->request->getPost("foto_id");
        $judul_foto = $this->request->getpost("judul_foto");
        $deskripsi_foto = $this->request->getpost("deskripsi_foto");
        $tanggal_unggah = date("Y-m-d");
        $album_id = $this->request->getpost("album_id");
        $user_id = $this->session->user_id;
        
        if ($this->request->getFile("lokasi_file")->getName() != null) {
            $lokasi_file = $this->request->getFile("lokasi_file");
            $namafoto = $user_id."_".$lokasi_file->getRandomName();

            $lokasi_file->move("assets/foto",$namafoto);

            $this->foto
            ->where("foto_id",  $foto_id)
            ->set([
                "judul_foto"            => $judul_foto,
                "deskripsi_foto"     => $deskripsi_foto,
                "tanggal_unggah"    => $tanggal_unggah,
                "album_id"       => $album_id,
                "user_id"         => $user_id,
                "lokasi_file"          => $namafoto

            ])->update();
        }else{
            $this->foto
            ->where("foto_id",$foto_id)
            ->set([
                "judul_foto"            => $judul_foto,
                "deskripsi_foto"     => $deskripsi_foto,
                "tanggal_unggah"    => $tanggal_unggah,
                "album_id"       => $album_id,
                "user_id"         => $user_id,

            ])->update();
        }
        

        return redirect()->to(base_url("home"));
    }
    public function preview($foto_id)
    {
        $userId = session()->user_id;
        // Ambil data foto berdasarkan foto_id
        $foto = $this->foto
            ->join("user", "user.user_id = foto.user_id", "left")
            ->where("foto_id", $foto_id)
            ->first();
        
        // Ambil data komentar berdasarkan foto_id
        $komentars = $this->komentar
                         ->where("foto_id",$foto_id)
                         ->findall();

        $rows1  = $this->album
                        ->where("album_id",$foto_id)
                        ->findall();

        $usernames = array();

        foreach ($komentars as $komen) {
            $user_id = $komen->user_id;
            $user = $this->user
                ->where("user_id", $user_id)
                ->first();

            $username = $user->username;

            $usernames[] = $username;
        }
    
        $like = $this->like->where("foto_id" , $foto_id)->countAllResults();

        $isLiked = $this->like->where('user_id', $userId)->where("foto_id", $foto_id)->countAllResults() >0;
    
        // Data yang akan dikirimkan ke view
        $data = [
            "foto" => $foto,
            "komentars" => $komentars,
            "like"  =>  $like,
            "isLiked"  => $isLiked,
            "usernames"  => $usernames,
            "rows1"    => $rows1
        ];
    
        // Tampilkan view "preview" dengan data yang telah diambil
        return view("preview", $data);
    }
    
    public function delete($foto_id){
        $this->foto
        ->where("foto_id",$foto_id)->delete();
        return redirect()->to(base_url("home"));
    }
    
    public function like($id)
    {   
        $userId = session()->user_id;

        if ($userId) {
            $like = $this->like->where('foto_id', $id)->where('user_id', $userId)->first();

            if ($like) {
                $this->like->where('foto_id', $id)->where('user_id', $userId)->delete();
            }else {
                $this->like->insert(['foto_id' => $id, 'user_id' => $userId]);
            }

            return redirect()->to(base_url("foto/".$id."/preview"));
        }
        
    }
    public function komen()
    {
        // Ambil data dari form
        $foto_id = $this->request->getPost("id"); // atau $this->request->getVar("id");
        $isi_komentar = $this->request->getPost("isi_komentar");
        $tanggal_komentar = date("Y-m-d");
        $user_id = $this->request->getPost("username");
    
        // Misalkan user_id diambil dari sesi atau autentikasi
        $user_id = session()->get("user_id"); // Gantilah ini sesuai dengan cara Anda mendapatkan user_id
    
        // Insert data komentar ke dalam database
        $this->komentar->insert([
            "foto_id" => $foto_id,
            "user_id" => $user_id,
            "isi_komentar" => $isi_komentar,
            "tanggal_komentar" => $tanggal_komentar,
            
        ]);
    
        // Redirect kembali ke halaman foto preview
        return redirect()->to(base_url("foto/".$foto_id."/preview"));
    }
    public function add_album(){
        $nama_album         = $this->request->getpost("nama_album");
        $deskripsi          = $this->request->getpost("deskripsi");
        $tanggal_dibuat     = date("Y-m-d");
        $user_id            = $this->session->user_id;

        $album_id = $this->request->getpost("album_id");
        if (empty($album_id)) {
            $album_id = null;
        }

        $this->album->insert([
            "nama_album"        => $nama_album,
            "deskripsi"         => $deskripsi,
            "tanggal_dibuat"    => $tanggal_dibuat,
            "user_id"           => $user_id,
            "album_id"          => $album_id,
        ]);

        return redirect()->to(base_url("home"));

    }
    
}