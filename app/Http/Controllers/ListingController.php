<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    public function index(Request $request){
        return view('listings.index')->with('listings' , Listing::latest()->filter(request(['tag',
        'search']))->Paginate(4));
    }

    public function show(Listing $listing){
        return view('listings.show')->with('listing' , $listing); 
    }

    public function create(){
        return view('listings.create');
    }

    public function store(Request $request){
      $formValidate = $request->validate([
          'title'=>'required|max:255',
          'company'=>'required',
          'location'=>'required',
          'email'=> 'required|email',
          'website'=>'required',
          'tags'=>'required',
          'description'=>'required|max:255'
      ]);
      if($request->hasFile('logo')){
        $formValidate['logo'] = $request->file('logo')->store('logos','public');
      } 
      $formValidate['user_id'] = auth()->id();

      Listing::create($formValidate);
      Session :: flash('success','Listing created successfully!');
      return redirect()->route('save-listings');
    }

    //Show Edit Form
    public function edit(Listing $listing){
      return view('listings.edit',['listing'=> $listing]);
    }

    //Update Listing Data 
    public function update(Request $request,Listing $listing){
      $formValidate= $request->validate([
        'title'=>'required',
        'company'=>'required',
        'location'=>'required',
        'email'=>['required','email'],
        'website'=>'required',
        'tags'=>'required',
        'description'=>'required'
      ]);
      if($request->hasFile('logo')){
        $formValidate['logo']=$request->file('logo')->store('logos','public');
      }
     $listing->update($formValidate);
     Session :: flash('success','Listing updated successfully!');
     return back();
    }

    //Delete Listing
    public function destroy(Listing $listing)
    {
        $listing->delete();
        Session :: flash('success','Listing deleted successfully!');
        return back();
    }

     //Manage Listings
     public function manage(){
       $user_id = auth()->user()->id;
      $listing = Listing::where('user_id', $user_id)->get();
      return view('listings.manage',['listings'=>$listing]);
    }
  
}
