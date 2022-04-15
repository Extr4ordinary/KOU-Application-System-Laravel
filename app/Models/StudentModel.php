<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kreait\Laravel\Firebase\Facades\Firebase;

class StudentModel extends Model
{
    public function up()
    {
        Firebase::firestore();
    }
}
