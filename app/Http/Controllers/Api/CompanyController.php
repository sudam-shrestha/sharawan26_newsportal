<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{

    public function company()
    {
        $company = Company::first();
        if ($company) {
            return new CompanyResource($company);
        }
        return response()->json([
            'success' => false,
            'message' => 'company not found'
        ]);
    }

    public function delete($id)
    {
        $company = Company::find($id);
        if ($company) {
            $company->delete();
            return response()->json([
                'success' => true,
                'message' => 'Company deleted successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Page not found'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        // return $request;

        $validator = Validator::make($request->all(), [
            "name" => "required|max:50",
            "email" => "required|email",
            "phone" => "required|digits:10",
            "logo" => "required|image|mimes:jpg,png,jpeg,avif|max:1024"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ],422);
        }

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->facebook = $request->facebook;
        $company->instagram = $request->instagram;
        $file = $request->logo;
        if ($file) {
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $file_name);
            $company->logo = "images/$file_name";
        }
        $company->save();

        return response()->json([
            'success' => true,
            'message' => 'Company added successfully'
        ]);
    }
}
