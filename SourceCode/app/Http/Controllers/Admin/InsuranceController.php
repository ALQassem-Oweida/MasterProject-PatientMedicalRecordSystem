<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JordanCoInsurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $InsuranceCo = JordanCoInsurance::paginate(3);
        return view('admin.InsuranceCoList', ['InsuranceCo' => $InsuranceCo]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $InsuranceCo = JordanCoInsurance::where('name', 'like', "%$query%")->paginate(3);
        return view('admin.InsuranceCoList', ['InsuranceCo' => $InsuranceCo]);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|min:2|max:100',
            'email'   => 'required|email|min:5|max:100',
            'insurance_type'        => 'required|string|min:2|max:40',
            'website'        => 'required|url',
            'address'        => 'required|string|min:10|max:200',
            'phone'        => 'required|regex:/^[0-9]{10,15}$/',
            'foundation_year'        => 'required|integer|between:1900,2099',
            'image'           => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $file_name = $request->name . '_' . time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('InsuranceCoimages'), $file_name);

        $company = new JordanCoInsurance();

        $company->name = $request->name;
        $company->email = $request->email;
        $company->insurance_type = $request->insurance_type;
        $company->website = $request->website;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->foundation_year = $request->foundation_year;
        $company->image = $file_name;

        $company->save();

        return redirect()->back()->with('success', 'Comapny Data Add successfully');
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

        $request->validate([
            'name'          => 'required|string|min:2|max:100',
            'email'   => 'required|email|min:5|max:100',
            'insurance_type'        => 'required|string|min:2|max:40',
            'website'        => 'required|url',
            'address'        => 'required|string|min:10|max:200',
            'phone'        => 'required|regex:/^[0-9]{10,15}$/',
            'foundation_year'        => 'required|integer|between:1900,2099',
            'image'           => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);


        if ($request->image != "") {
            $file_name = $request->name . '_' . time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('InsuranceCoimages'), $file_name);
        } else {
            $file_name = $request->hidden_img;
        }

        JordanCoInsurance::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'insurance_type' => $request->insurance_type,
            'website' => $request->website,
            'address' => $request->address,
            'phone' => $request->phone,
            'foundation_year' => $request->foundation_year,
            'image' => $file_name,

        ]);

        return redirect()->back()->with('success', 'Comapny Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comapnyDestroy = JordanCoInsurance::find($id);
        $comapnyDestroy->destroy($id);
        return redirect()->back()->with('success', 'Comapny Data deleted successfully');
    }
}
