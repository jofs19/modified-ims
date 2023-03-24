<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class AdminProfileController extends Controller
{

    public function AdminCalendar(){
        return view('admin.calendar');
    }

    public function AdminProfile()
    {
		$id = Auth::user()->id;
		$adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function AdminProfileEdit()
    {
		$id = Auth::user()->id;
		$editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    // public function AdminProfileStore(Request $request){

    //     $admin_id = Auth::user()->id;
    //     $old_image = Admin::find($admin_id)->profile_photo_path;

    //     if($request->hasFile('profile_photo_path')){
    //         $image = $request->file('profile_photo_path');
    //         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    //         Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
    //         $save_url = 'upload/admin_images/'.$name_gen;
    //         $update = Admin::find($admin_id);
    //         $update->profile_photo_path = $save_url;
    //         $update->save();
    //         if($old_image != 'upload/admin_images/no_image.jpg'){
    //             unlink($old_image);
    //         }
    //     }else{
    //         $update = Admin::find($admin_id);
    //         $update->name = $request->name;
    //         $update->email = $request->email;
    //         $update->phone = $request->phone;
    //         $update->save();
    //     }
    //     $notification = array(
	// 		'message' => 'Admin User Updated Successfully',
	// 		'alert-type' => 'info'
	// 	);
	// 	return redirect()->route('all.admin.user')->with($notification);


    // }

    public function AdminProfileStore(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        // $data->name = $request->name;
        // $data->email = $request->email;
        // $data->phone = $request->phone;
        // $data->address = $request->address;

        $request->validate([
            'profile_photo_path' => 'image|mimes:jpg,png,jpeg,gif,svg',

        ]);

        if ($request->file('profile_photo_path')) {


        $image = $request->file('profile_photo_path');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/admin_images/'.$name_gen);
        $save_url = 'upload/admin_images/'.$name_gen;


        User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'profile_photo_path' => $save_url,
        ]);




        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);


        }else{

            User::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);


        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);

        }
        // $data->save();


    } // End Mehtod


    // public function AdminProfileStore(Request $request)
    // {
	// 	$id = Auth::user()->id;
	// 	$data = Admin::find($id);
    //     $data->name = $request->name;
    //     $data->email = $request->email;

    //     // $image = $request->file('profile_photo_path');
    // 	// $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    // 	// Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
    // 	// $save_url = 'upload/admin_images/'.$name_gen;


    //     if ($request->file('profile_photo_path')) {
    //         $file = $request->file('profile_photo_path');
    //         @unlink(public_path('upload/admin_images/' . $data->profile_photo_path));
    //         $filename = date('YmdHi').$file->getClientOriginalExtension();
    //         $file->move(public_path('upload/admin_images'), $filename);
    //         $data['profile_photo_path'] = $filename;
    //     }
    //     $data->save();

    //     $notification = array(
    //         'message' => 'Profile Updated Successfully',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('admin.profile')->with($notification);

    // }//end method

    public function AdminChangePassword(){
        return view('admin.admin_change_password');
    }



    public function AdminUpdateChangePassword(Request $request){
        // $validateData = $request->validate([
        //     'old_password' => 'required',
        //     'password' => 'required|confirmed',
        //     'new_password_confirmation' => 'required'

        // ]);


        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $admin = Admin::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            // $notification = array(
            //     'message' => 'Password Updated Successfully',
            //     'alert-type' => 'success'
            // );
            return redirect()->route('admin.logout');
        } else {
            $notification = array(
                'message' => 'Old Password is incorrect',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    } //end method

    public function AllUsers(){
		$users = User::latest()->get();
		return view('backend.user.all_user',compact('users'));
	}

    public function DeleteUser($id){
		$user = User::findOrFail($id);
		// $img = $userimg->profile_photo_path;
		// unlink($img);
        $user->delete();
		 $notification = array(
		   'message' => 'User Deleted Successfully',
		   'alert-type' => 'error'
	   );

	   return redirect()->back()->with($notification);
	} // end method




}

// public function AdminUpdateChangePassword(Request $request){

//     $validateData = $request->validate([
//         'oldpassword' => 'required',
//         'password' => 'required|confirmed',
//     ]);

//     $hashedPassword = Auth::user()->password;
//     if (Hash::check($request->oldpassword,$hashedPassword)) {
//         $admin = Admin::find(Auth::id());
//         $admin->password = Hash::make($request->password);
//         $admin->save();
//         Auth::logout();
//         return redirect()->route('admin.logout');
//     }else{
//         return redirect()->back();
//     }


// }// end method
