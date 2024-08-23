<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use App\Models\PropertyPhoto;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{

    public function updateBookingStatus(Request $request, $id)
{
    $booking = Booking::findOrFail($id);
    $booking->status = $request->input('status');
    $booking->save();

    return redirect()->back()->with('success', 'Booking status updated successfully.');
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::with('bookings')->get();;
        return view('frontend.admin.property_create', compact('properties'));
    }



    /**
     * Show the form for creating a new resource or editing an existing one.
     */
    public function manage(Property $property = null)
    {
        $properties = Property::all();
        return view('frontend.admin.property_admin', compact('properties', 'property'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'address' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price_per_day' => 'required|numeric',
            'availability' => 'boolean',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if( auth()->id()){

            $property = Property::create([
                'user_id' => auth()->id(),
                'title' => $request->title,
                'description' => $request->description,
                'address' => $request->address,
                'location' => $request->location,
                'price_per_day' => $request->price_per_day,
                'availability' => $request->has('availability') ? $request->availability : true,
            ]);

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('property_photos', 'public');
                    PropertyPhoto::create([
                        'property_id' => $property->id,
                        'photo_url' => $path,
                    ]);
                }
            }

            return redirect()->route('property_admin')->with('success', 'Property created successfully.');
        }else{
            return redirect()->route('property_admin')->withErrors('Error', 'cant  create Propertyyou need to login.');

        }
    }

    public function indexbooking()
    {
        $bookings = Booking::with('property', 'renter')->get();
        return view('frontend.admin.dashboardB', compact('bookings'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'address' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price_per_day' => 'required|numeric',
            'availability' => 'boolean',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $property->update($request->only([
            'title',
            'description',
            'address',
            'location',
            'price_per_day',
            'availability'
        ]));

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('property_photos', 'public');
                PropertyPhoto::create([
                    'property_id' => $property->id,
                    'photo_url' => $path,
                ]);
            }
        }

        return redirect()->route('property_admin')->with('success', 'Property updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('property_admin')->with('success', 'Property deleted successfully.');
    }
    //getting data for home
    public function home()
    {
        $properties = Property::with(['user', 'amenities'])->paginate(6);
        return view('frontend.home' , compact('properties'));

<<<<<<< HEAD
    }
    // data for one property
    public function property( string $id)
    {
        // $property = Property::find($id);
        $property = Property::with('user')->findOrFail($id);
        $countOfReview = Review::where('property_id', $id)->count();
        $reviews = Review::with('renter')->where('property_id', $id)->get();
        // dd($reviews); // This will dump the $reviews variable to see its contents

        // $properties = Property::with('amenities')->paginate(6);
        return view('frontend.property-details' , compact( 'property' ,'countOfReview','reviews'));

    }
=======
    }   
    // data for one property
    public function property( string $id)
    {
        // Fetch the property with related user
        $property = Property::with('user')->findOrFail($id);
    
        // Count the number of reviews for the property
        $countOfReview = Review::where('property_id', $id)->count();
    
        // Fetch all reviews related to the property along with renter details
        $reviews = Review::with('renter')->where('property_id', $id)->get();
    
        // Pass all data to the view
        return view('frontend.property-details', compact('property', 'countOfReview', 'reviews'));
    }
    
>>>>>>> 7623fbae4da8337e8c3976aeec59dbd28727c61a
    // listing all property
    public function AllProperty( )
    {
        $properties = Property::with(['user', 'amenities'])->get();
        return view('frontend.property' , compact('properties'));

    }
    public function addComment(Request $request  , $id)
    {
        $validatedData = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'renter_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);
<<<<<<< HEAD
        $review = new Review();
        $review -> property_id = $validatedData['property_id'];
        $review -> renter_id = $validatedData['property_id'];
        $review -> rating = $validatedData['rating'];
        $review -> comment = $validatedData['comment'];
        $review->save();
        // $properties = Property::with(['user', 'amenities'])->get();

        return redirect()->route('viewProperty', $id)->with('success', 'Review submitted successfully!');
=======
        if(Auth::id()){
            $review = new Review();
            $review -> property_id = $validatedData['property_id'];
            $review -> renter_id = $validatedData['renter_id'];
            $review -> rating = $validatedData['rating'];
            $review -> comment = $validatedData['comment'];
            $review->save();

            return redirect()->route('viewProperty', $id)->with('success', 'Review submitted successfully!');
        }else {
            return redirect()->route('viewProperty', $id)->withErrors('Error', 'Login to add comment');

        }
        // $properties = Property::with(['user', 'amenities'])->get();

>>>>>>> 7623fbae4da8337e8c3976aeec59dbd28727c61a

    }
}
