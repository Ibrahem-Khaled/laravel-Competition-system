<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use App\Models\View;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $allUsers = User::where('role', 'user')->get()->count();
        $UsersWinnerCont = User::whereHas('competitions')->get()->count();

        View::create([
            'ip' => request()->ip(),
            'device' => request()->header('User-Agent'),
            'browser' => request()->header('User-Agent'),
            'platform' => request()->header('User-Agent'),
        ]);

        return view('home', compact('allUsers', 'UsersWinnerCont'));
    }
    public function selectRamadanUsers()
    {
        return view('select-ramadan-users');
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric|digits:10|unique:users,phone',
            'city' => 'required',
        ], [
            'name.required' => 'يرجى إدخال اسم المستخدم.',
            'phone.required' => 'يرجى إدخال رقم الهاتف.',
            'phone.numeric' => 'يجب أن يكون رقم الهاتف رقمًا.',
            'phone.digits' => 'يجب أن يتكون رقم الهاتف من 10 أرقام.',
            'phone.unique' => 'رقم الهاتف موجود بالفعل.',
            'city.required' => 'يرجى إدخال اسم المدينة.'
        ]);

        User::create($request->all());
        return redirect()->back()->with('success', 'تم إضافة المستخدم بنجاح.');
    }

    // جلب مستخدم عشوائي
    public function getRandomUser()
    {
        // جلب مستخدم عشوائي من قاعدة البيانات
        $randomUser = User::inRandomOrder()->first();

        // إذا لم يتم العثور على مستخدم
        if (!$randomUser) {
            return response()->json([
                'success' => false,
                'message' => 'لا يوجد مستخدمين متاحين.'
            ], 404);
        }

        // إرجاع بيانات المستخدم
        return response()->json([
            'success' => true,
            'user' => [
                'id' => $randomUser->id,
                'name' => $randomUser->name,
                'email' => $randomUser->email,
                'phone' => $randomUser->formatted_phone, // إذا كنت تستخدم Accessor لتنسيق رقم الهاتف
                'avatar' => $randomUser->avatar_url // إذا كنت تستخدم Accessor لعرض الصورة
            ]
        ]);
    }

    public function questions(User $user)
    {
        $questions = Question::all();
        return view('questions', compact('questions', 'user'));
    }
}
