<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;
use App\Contact;
use DB;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
    
    $id = auth()->user()->id;
    $contacts = Contact::where('userId', $id)->orderBy("id","desc")->paginate(4);
 return view("show",['contacts' => $contacts]);

            }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $id = auth()->user()->id;
   
        $request->validate([
   
   'name' => 'required',
   'email' => 'required',
   'phone' => 'required',
  'cover_image' => 'image|nullable|max:1999'


        ]);

if($request->hasFile('cover_image')){
//get filename with extension

    $filenameWithtxt = $request->file('cover_image')->getClientOriginalName();
    //get just filename

    $filename =pathinfo($filenameWithtxt,PATHINFO_FILENAME);

    //get just ext
    $extension = $request->file('cover_image')->getClientOriginalExtension();

    //filename to store

    $fileNameToStore = $filename . '_' . time(). '.'. $extension;

    //uploadimage

    $path = $request->file('cover_image')->storeAs('public/cover_image',$fileNameToStore);

}

else{


    $fileNameToStore = "noimage.jpeg";
}

$contact = new Contact;
$contact->name = $request->input('name');
$contact->email = $request->input('email');
$contact->phone = $request->input('phone');
$contact->userId = auth()->user()->id;
$contact->cover_image = $fileNameToStore;

$contact->save();


return redirect('/contacts')->with('contactAdded','Contact created.');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        



            }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
$contact = Contact::findOrFail($id);


return view("edit",["contact" => $contact]);




        }


     


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

   
$this->validate($request,[
   
   'name' => 'required',
   'email' => 'required',
   'phone' => 'required',
  'cover_image' => 'image|nullable|max:1999'


        ]);

if($request->hasFile('cover_image')){
//get filename with extension

    $filenameWithtxt = $request->file('cover_image')->getClientOriginalName();
    //get just filename

    $filename =pathinfo($filenameWithtxt,PATHINFO_FILENAME);

    //get just ext
    $extension = $request->file('cover_image')->getClientOriginalExtension();

    //filename to store

    $fileNameToStore = $filename . '_' . time(). '.'. $extension;

    //uploadimage

    $path = $request->file('cover_image')->storeAs('public/cover_image',$fileNameToStore);

}


 $contact = Contact::findOrFail('id'); 



 $contact->name = $request->input('name');

$contact->email = $request->input('email');
$contact->phone = $request->input('phone');

if($request->hasFile('cover_image'))
{



    $contact->cover_image = $fileNameToStore;
}



$contact->save();


 //return redirect('contacts');
return redirect('/contacts')->with('success','contact updated.');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
$contact = Contact::find($id);

if($contact->delete()) {



return redirect("contacts")->with("contactAdded","Your contact has been deleted successfully");
}

            }
}
