<?php

namespace App\Http\Controllers;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function index(Request $request)
    {
        
        $documentos= Document::select('id','id_postulant','nombre_doc','documento_doc')
                                        ->where('id_postulant','LIKE',$date)
                                        ->get();                                       
        
        return view('postulant.index', compact('documentos'));
    }
    public function store(Request $request)
    {
        
            

        $newDocument = new Document();                 
        $newDocument->id_postulant = $request->id_postulant; 
        $newDocument->nombre_doc = $request->nombre_doc;     

        if( $request->hasfile('documento_doc')){
            $file = $request->file('documento_doc');
            $destinationPath = 'images/documentos/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('documento_doc')->move($destinationPath, $filename);
            $newDocument->documento_doc = $destinationPath . $filename;

        } 
        $newDocument->save();       

        return redirect()->route('postulants.index')        
            ->with('success3', 'Documento Ingresado .');       
    }
    
    public function destroy($id)
    {
        $document = Document::find($id)->delete();

        return redirect()->route('postulants.index')
            ->with('success', 'Documento eliminado satisfactoriamente');
    }
}
