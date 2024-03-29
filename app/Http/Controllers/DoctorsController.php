<?php

namespace App\Http\Controllers;

use App\Http\Requests\doctors\createDoctorRequest;
use App\Http\Requests\doctors\updateDoctorRequest;
use App\Http\Resources\doctorsResource;
use App\Http\Resources\healthCenterResource;
use App\Http\Resources\specializationResource;
use App\Models\Doctors;
use App\Models\HealthCenter;
use App\Models\Specialization;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function index()
    {
        $doctor = Doctors::where('view', null)->orWhere('view', 1)->orderBy('sort')->get();
        return doctorsResource::collection($doctor);
    }

    public function Paginate()
    {
        $doctor = Doctors::where('view', null)->orWhere('view', 1)->orderBy('sort')->paginate(12);
        return doctorsResource::collection($doctor);
    }

    public function getForAdmin()
    {
        $healthCenter = Doctors::orderBy('sort')->get();
        return doctorsResource::collection($healthCenter);
    }
    public function getById($id)
    {
        $doctor = Doctors::find($id);
        return new doctorsResource($doctor);
    }

    public function create(createDoctorRequest $request)
    {
        $doctor = $request->createDoctor();
        return new doctorsResource($doctor);
    }

    public function update(updateDoctorRequest $request)
    {
        $doctor = $request->updateDoctor();
        return new doctorsResource($doctor);
    }

    public function delete($id)
    {
        $doctor = Doctors::find($id);
        $doctor->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted health Center'
        ]);
    }

    public function getFeaturedDoctors()
    {
        $doctors = Doctors::where('featured', 1)->orderBy('sort')->get();
        return doctorsResource::collection($doctors);
    }

    public function getDoctorBySpecialty($id)
    {
        $doctors = Doctors::where('specialization_id', $id)->orderBy('sort')->get();
        return doctorsResource::collection($doctors);
    }

    public function getDoctorByCenter($id)
    {
        $doctors =
            Doctors::whereHas('healthCenter', function ($query) use ($id) {
                $query->where('health_centers.id', $id);
            })->orderBy('sort')->get();
        return doctorsResource::collection($doctors);
    }

    public function getDoctorByCenterAndSpecialty($center_id, $specialty_id)
    {
        $doctors = Doctors::whereHas('healthCenter', function ($query) use ($center_id) {
            $query->where('health_centers.id', $center_id);
        })->where('specialization_id', $specialty_id)->orderBy('sort')
            ->get();
        return doctorsResource::collection($doctors);
    }

    public function search(Request $request)
    {
        $items = [];
        $search = $request->input('search');
        $locale = app()->getLocale();

        if ($locale == 'Ar') {
            $specialization = Specialization::where('specialtyAr', 'like', '%' . $search . '%')->get();
            $doctor = Doctors::where('nameAr', 'like', '%' . $search . '%')->get();
            $center = HealthCenter::where('nameAr', 'like', '%' . $search . '%')->get();
        } else {
            $specialization = Specialization::where('specialtyEn', 'like', '%' . $search . '%')->get();
            $doctor = Doctors::where('nameEn', 'like', '%' . $search . '%')->get();
            $center = HealthCenter::where('nameEn', 'like', '%' . $search . '%')->get();
        }

        $items = [
            'specialty' => specializationResource::collection($specialization),
            'doctor' => doctorsResource::collection($doctor),
            'center' => healthCenterResource::collection($center),
        ];

        return $items;
    }
}
