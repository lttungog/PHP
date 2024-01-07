<?php 

    $sinhVien = array (
        array ("ten" => "Nguyen Van A","tuoi" => 20, "diem" => 85),
        array ("ten" => "Tran Thi B","tuoi"=> 20, "diem" => 75 ),
        array ("ten" => "Le Van C","tuoi"=> 22, "diem" => 90)
    );

    foreach ($sinhVien as $sv) {
        echo "Tên: ". $sv["ten"] ."<br>";
        echo "Tuổi: ". $sv["tuoi"] ."<br>";
        echo "Điểm: ". $sv["diem"] ."<br>";

        if ($sv["diem"] >= 80) {
            echo "Danh gia: Xuat sac<br>";
        } elseif ($sv["diem"] >= 70) {
            echo "Danh gia: Kha<br>";
        } elseif ($sv["diem"] >= 60) {
            echo "Danh gia: Trung binh <br>";
        } else {
            echo "Danh gia: Yeu<br>";
        }

        echo "<hr>";
    }

    $tongDiem = 0;
    foreach ($sinhVien as $sv) {
        $tongDiem += $sv["diem"];
    }

    $diemTrungBinh = $tongDiem / count($sinhVien);

    echo "Diem trung binh cua lop la: ". $diemTrungBinh;
?>