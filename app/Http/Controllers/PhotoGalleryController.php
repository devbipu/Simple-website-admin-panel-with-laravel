<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhotoTable;
use Illuminate\Support\Facades\Storage;

class PhotoGalleryController extends Controller
{

    // gallery page show
    function photoGalleryPage(){
        return view('admin.photoGallery');
    }

    //get and show all photo
    function uploadPhoto(Request $req){
        //$file = $req->input('file');
        $storeFile = $req->file('photo')->store('public');
        $photoName = explode('/',$storeFile)[1];
        $host = $_SERVER['HTTP_HOST'];
        $location = 'http://'.$host.'/storage/'.$photoName;
        
        $dbRes = PhotoTable::insert([
            'img_url' => $location
        ]);

        return $storeFile;
    }

    function allPhotoUrl(){
        $dbRes = PhotoTable::take(4)->get();
        return $dbRes;
    }


    function getPhotoUrlById(Request $req){
        $firstId = $req->id;
        $lastId = $firstId + 24;
        $getPhoto = PhotoTable::where('id', '>', $firstId)->where('id', '<=', $lastId)->get();

        if($getPhoto){
            return $getPhoto;
        }else{
            return 0;
        }
    }

    // Delete by id 
    function deletePhotoById(Request $req){
        $pId = $req->input('pid');
        $pPath = $req->input('pPath');
        $pNameArray = explode('/',$pPath);

        $pName = end($pNameArray);

        $dbDelete = PhotoTable::where('id', '=', $pId)->delete();
        $fileDelete = Storage::delete('public/'.$pName);

        if($dbDelete == true){
            return 1;
        }else{
            return 0;
        }
    }
}
