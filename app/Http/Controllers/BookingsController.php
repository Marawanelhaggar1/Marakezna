<?php

namespace App\Http\Controllers;

use App\Http\Requests\booking\createBookingRequest;
use App\Http\Requests\booking\updateBookingRequest;
use App\Http\Resources\bookingResource;
use App\Models\Bookings;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public function index()
    {
        $bookings = Bookings::all();
        return bookingResource::collection($bookings);
    }

    public function getById($id)
    {
        $booking = Bookings::find($id);
        return new bookingResource($booking);
    }

    public function create(createBookingRequest $request)
    {
        $imagePath = $request->getImagePath();
        $booking = $request->createBooking();
        return new bookingResource($booking);
    }

    public function update(updateBookingRequest $request)
    {
        $booking = $request->updateBooking();
        return new bookingResource($booking);
    }

    public function delete($id)
    {
        $booking = Bookings::find($id);
        $booking->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted health Center'
        ]);
    }
}
