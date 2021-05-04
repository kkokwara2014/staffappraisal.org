<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function qualificationfile($filename){
        $file = public_path('storage/qualifications/'.$filename);
        $name = basename($file);
        return response()->download($file, $name);
    }
    public function protmotionfile($filename){
        $file = public_path('storage/protmotions/'.$filename);
        $name = basename($file);
        return response()->download($file, $name);
    }
    public function profmembershipfile($filename){
        $file = public_path('storage/profmembership/'.$filename);
        $name = basename($file);
        return response()->download($file, $name);
    }
    public function publicationfile($filename){
        $file = public_path('storage/publications/'.$filename);
        $name = basename($file);
        return response()->download($file, $name);
    }
    public function productionfile($filename){
        $file = public_path('storage/productions/'.$filename);
        $name = basename($file);
        return response()->download($file, $name);
    }
}
