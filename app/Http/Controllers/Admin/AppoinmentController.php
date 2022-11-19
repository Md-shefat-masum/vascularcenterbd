<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appoinment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Throwable;

class AppoinmentController extends Controller
{
    public function all(Request $request){
        $paginate = $request->paginate;
        $key = $request->key;
        $orderBy = $request->orderBy;
        $orderByColumn = $request->orderByColumn;
        $query = Appoinment::orderBy($orderByColumn,$orderBy);
        
        if($key && strlen($key) > 0){
            $keys = [
                'id',
                'name',
                'email',
                'phone',
                'topic',
                'chember',
                'time',
                'date',
                'message',
                'status',
                'created_at',
                'updatd_at',
            ];
            $query->where(function ($q) use ($key, $db_col) {
                foreach ($db_col as $sl => $col) {
                    if ($col == 'created_at' || $col == 'updatd_at') {
                        if (User::orWhereDate($col, 'LIKE', "%$key%")->exists()){
                            $q->orWhereDate($col, "$key");
                        }
                    } else if (User::where($col, 'LIKE', "%$key%")->exists()) {
                        if ($sl > 0) {
                            $q->orWhere($col, 'LIKE', "%$key%");
                        } else {
                            $q->where($col, 'LIKE', "%$key%");
                        }
                    } else {

                    }
                }
            });
            
        }
        
        $data = $query->paginate($paginate);
        return $data;
    }
    
    public function index(Request $request)
    {
        
        return view('admin.appoinment.index');
    }

    public function create()
    {
        return view('admin.appoinment.create');
    }

    public function edit(Appoinment $appoinment)
    {
        return view('admin.appoinment.edit',compact('appoinment'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'phone' => ['required'],
            'topic' => ['required'],
            'time' => ['required'],
            'date' => ['required'],
        ]);

        $service = Appoinment::create($request->except('image'));

        if ($request->hasFile('image')) {
            // $path = Storage::put('uploads/file_manager',$request->file('fm_file'));
            try {
                $file = $request->file('image');
                $path = Storage::put('uploads/appoinment',$file);
            } catch (Throwable $e) {
                // report($e);
                // return response()->json($e->getMessage(), 500);
            }
            $service->image = $path;
        }

        $service->save();

        return redirect()->back()->with('success','data uploaded successfully.');
    }

    public function update(Request $request, Appoinment $appoinment)
    {
        $appoinment->fill($request->except('image'));

        if ($request->hasFile('image')) {
            // $path = Storage::put('uploads/file_manager',$request->file('fm_file'));
            try {
                $file = $request->file('image');
                $path = Storage::put('uploads/appoinment',$file);
            } catch (Throwable $e) {
                // report($e);
                // return response()->json($e->getMessage(), 500);
            }
            $appoinment->image = $path;
        }

        $appoinment->save();

        return redirect()->back()->with('success','data uploaded successfully.');
    }

    public function destroy(Appoinment $appoinment)
    {
        $appoinment->delete();
        return redirect()->back()->with('success','data deleted successfully.');
    }
}
