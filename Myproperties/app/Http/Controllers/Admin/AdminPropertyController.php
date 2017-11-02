<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PropertyState;
use App\Models\PropertyType;
use App\Models\Currency;
use App\Models\Property;
use Auth;

class AdminPropertyController extends Controller
{


    public function index() {
        $properties = null;
        if(Auth::user()->super_admin) {
            $properties = Property::latest()->get();
        } else {
            $properties = Property::where('user_id', Auth::id())->latest()->get();
        }
        return view('admin.property.index', ['properties' =>Property::all()]);
    }

    public function add(Request $request) {
    	if($request->isMethod('GET')) {
    		return view('admin.property.add',
                [
                    'property_states' => PropertyState::all(),
                    'property_types' => PropertyType::all(),
                    'currency' => Currency::all()
                ]
            );
    	}
    	elseif ($request->isMethod('POST')) {
            $this->validate($request, [
                'title' => 'required|max:240',
                'description' => 'required',
                'type_id' => 'required',
                'state_id' => 'required',
                'bedroom_count' => 'required',
                'bathroom_count' => 'required',
                'garage_count' => 'required',
                'plot_area' => 'required',
                'construction_area' => 'required',
                'area_unit' => 'required',
                'currency_id' => 'required',
                'street_address' => 'required',
                'street_number' => 'required',
                'city' => 'required',
                'country' => 'required',
                'postal_code' => 'required',
            ]);

            $property = new Property();
            $property->title = $request->title;
            $property->description = $request->description;
            $property->type_id = $request->type_id;
            $property->state_id = $request->state_id;
            $property->bedroom_count = $request->bedroom_count;
            $property->bathroom_count = $request->bathroom_count;
            $property->garage_count = $request->garage_count;
            $property->plot_area = $request->plot_area;
            $property->construction_area = $request->construction_area;
            $property->area_unit = $request->area_unit;
            $property->is_featured = !is_null ($request->is_featured) ? true : false;
            $property->is_public = !is_null ($request->is_public) ? true : false;

            $property->sales = !is_null ($request->sales) ? true : false;
            $property->rental = !is_null ($request->rental) ? true : false;
            $property->current_selling_price = $request->current_selling_price;
            $property->current_rental_price = $request->current_rental_price;
            $property->original_selling_price = $request->original_selling_price;
            $property->original_rental_price = $request->original_rental_price;
            $property->currency_id = $request->currency_id;

            $property->user_id = Auth::id();

            $property->street_address = $request->street_address;
            $property->street_number = $request->street_number;
            $property->city = $request->city;
            $property->region = $request->region;
            $property->country = $request->country;
            $property->postal_code = $request->postal_code;

            $property->save();

    		return redirect()->back()->with('status', 'New Property Created Successfully');
    	}
    	else {
    		return redirect()->back()->with('error', 'Invalid Request');
    	}
    }

    public function edit(Request $request, $id = null) {
        if($request->isMethod('GET')) {
            return view('admin.property.edit',
                [
                    'property_states' => PropertyState::all(),
                    'property_types' => PropertyType::all(),
                    'currency' => Currency::all()
                ]);
        } else {

        }
    }

    public function delete(Request $request) {
        $property = null;
        if(is_null($request->id) || is_null($property = Property::find($request->id)) ) {
            return redirect()->back()->with('error', 'Property not found!');
        }
        $property->delete();

        return redirect()->back()->with('status', 'Property hes been Deleted!');
    }
}
