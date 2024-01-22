<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students
{
    private static $students = [
        [ 
            "id" => "1",
            "nis" => "12345678",
            "nama" => "Cia",
            "tanggal_lahir" => "18-12-2006",
            "kelas" => "11 PPLG 2",
            "alamat" => "Gebog"
        ],
        [
            "id" => "2",
            "nis" => "23456789",
            "nama" => "Xavier",
            "tanggal_lahir" => "18-1-2006",
            "kelas" => "11 PPLG 2",
            "alamat" => "Jekulo"
        ],
        [
            "id" => "3",
            "nis" => "34567891",
            "nama" => "Ximeno",
            "tanggal_lahir" => "18-2-2006",
            "kelas" => "11 PPLG 2",
            "alamat" => "Dawe"
        ],
        [
            "id" => "4",
            "nis" => "45678912",
            "nama" => "Xarah",
            "tanggal_lahir" => "18-3-2006",
            "kelas" => "11 PPLG 2",
            "alamat" => "Bae"
        ],
        [
            "id" => "5",
            "nis" => "12345678",
            "nama" => "Caca",
            "tanggal_lahir" => "18-4-2006",
            "kelas" => "11 PPLG 2",
            "alamat" => "Jati"
        ]
        ];

        public static function all()
        {
            return self::$students;
        }
}